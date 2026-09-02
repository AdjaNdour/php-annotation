<?php

namespace App\Repositories;

final class Database
{
    private static ?\PDO $pdo = null;

    private function __construct() {}

    public static function connexionDB(): \PDO
    {
        if (self::$pdo === null) {

            $config = require dirname(dirname(__DIR__)) . '/public/index.php';

            $dsn = sprintf(
                '%s:host=%s;port=%s;dbname=%s',
                $config['driver'],
                $config['host'],
                $config['port'],
                $config['database']
            );

            self::$pdo = new \PDO(
                $dsn,
                $config['username'],
                $config['password'],
                [
                    \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                    \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
                    \PDO::ATTR_EMULATE_PREPARES => false
                ]
            );
        }

        return self::$pdo;
    }

    public static function deconnexionDB(): void
    {
        self::$pdo = null;
    }
}
