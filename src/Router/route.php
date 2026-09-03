<?php

use FastRoute\RouteCollector;
use App\Controllers\CopieExamenController;
use App\Repositories\Database;
use App\Repositories\PdoCopieExamenRepository;
use App\Services\CalculNoteAvecRetardService;
use App\Services\SoumissionCopieService;

if (!isset($controller)) {
    $pdo = Database::connexionDB();
    $repository = new PdoCopieExamenRepository($pdo);
    $calculateur = new CalculNoteAvecRetardService();
    $service = new SoumissionCopieService($calculateur, $repository);
    $controller = new CopieExamenController($service, $repository);
}

$dispatcher = FastRoute\simpleDispatcher(
    function (RouteCollector $r) use ($controller) {

        $r->addRoute('GET', '/', [$controller, 'liste']);
        
        $r->addRoute('GET', '/copies', [$controller, 'liste']);

        $r->addRoute('GET', '/copies/create', [$controller, 'showFormulaire']);

        $r->addRoute('POST', '/copies', [$controller, 'enregistrer']);

        $r->addRoute('GET', '/copies/{id:\d+}', [$controller, 'showDetail']);
    }
);


$httpMethod = $_SERVER['REQUEST_METHOD'] ?? 'GET';

$uri = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?? '/';
if ($uri !== '/' && str_ends_with($uri, '/')) {
    $uri = rtrim($uri, '/');
}

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);

switch ($routeInfo[0]) {

    case FastRoute\Dispatcher::NOT_FOUND:

        http_response_code(404);
        echo 'Page introuvable';
        break;

    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:

        http_response_code(405);
        echo 'Méthode non autorisée';
        break;

    case FastRoute\Dispatcher::FOUND:

        $handler = $routeInfo[1];
        $vars = $routeInfo[2];

        $handler(...array_values($vars));

        break;
}
