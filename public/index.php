<?php

require_once dirname(__DIR__) . '/vendor/autoload.php';

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$config = [
    'driver'      => $_ENV['DB_DRIVER'],
    'host'        => $_ENV['DB_HOST'],
    'port'        => $_ENV['DB_PORT'],
    'database'    => $_ENV['DB_DATABASE'],
    'username'    => $_ENV['DB_USERNAME'],
    'password'    => $_ENV['DB_PASSWORD'],
    'db_driver'   => $_ENV['DB_DRIVER'],
    'db_host'     => $_ENV['DB_HOST'],
    'db_port'     => $_ENV['DB_PORT'],
    'db_database' => $_ENV['DB_DATABASE'],
    'db_username' => $_ENV['DB_USERNAME'],
    'db_password' => $_ENV['DB_PASSWORD'],
];

if (defined('ROUTER_RUNNING')) {
    return $config;
}

define('ROUTER_RUNNING', true);

require_once dirname(__DIR__) . '/src/Router/route.php';

return $config;
