<?php

require_once dirname(__DIR__) . '/vendor/autoload.php';

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

return [
    'db_driver' => $_ENV['DB_DRIVER'],
    'db_host' => $_ENV['DB_HOST'],
    'db_port' => $_ENV['DB_PORT'],
    'db_database' => $_ENV['DB_DATABASE'],
    'db_username' => $_ENV['DB_USERNAME'],
    'db_password' => $_ENV['DB_PASSWORD'],
];
