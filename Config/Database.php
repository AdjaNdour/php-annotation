<?php

namespace Config;

abstract class Database
{
    private ?\PDO $pdo = null;

    public function connexionDB(): \PDO
    {
        if ($this->pdo === null) {
            $user = "postgres";
            $password = "kiki";
            $this->pdo = new \PDO(
                "pgsql:host=localhost;port=5432;dbname=annotation",$user,$password,[
                    \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                    \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
                    \PDO::ATTR_EMULATE_PREPARES => false
                ]
            );
        }

        return $this->pdo;
    }
}