<?php

namespace App\Controllers;

use App\DTO\SoumettreCopieDTO;
use App\Repositories\CopieExamenRepositoryInterface;
use App\Services\SoumissionCopieService;

class CopieExamenController
{
    public function __construct(
        private SoumissionCopieService $service,
        private CopieExamenRepositoryInterface $repository
    ) {
    }

    public function liste(): void
    {
        $copies = $this->repository->findAll();

        require dirname(__DIR__, 2) . '/Templates/copies/liste.php';
    }

    public function enregistrer(): void
    {
        try {
            $dto = SoumettreCopieDTO::fromArray([
                'noteBrute' => $_POST['noteBrute'],
                'dateDepot' => $_POST['dateDepot'],
                'dateLimite' => $_POST['dateLimite'],
            ]);

            $this->service->soumettre($dto);

            header('Location: /copies');
            exit;

        } catch (\Throwable $e) {
            http_response_code(400);

            $message = $e->getMessage();

            require dirname(__DIR__, 2) . '/Templates/copies/page-erreur.php';
        }
    }

    public function showDetail(int $id): void
    {
        $copie = $this->repository->findById($id);

        if ($copie === null) {
            http_response_code(404);

            $message = 'Copie introuvable.';

            require dirname(__DIR__, 2) . '/Templates/copies/page-erreur.php';

            return;
        }

        require dirname(__DIR__, 2) . '/Templates/copies/detail.php';
    }

    public function showFormulaire(): void
    {
        require dirname(__DIR__, 2) . '/Templates/copies/formulaire.php';
    }
}