<?php

namespace App\Repositories;
use App\Repositories\Database;

abstract class HelperBase
{

    private ?\PDO $pdo;

    protected function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo ?? Database::connexionDB();
    }

    protected function query(string $sql, bool $single = true): mixed
    {
        $query = $this->pdo->query($sql);
        return $single ? $query->fetch() : $query->fetchAll();
    }

    private function prepare(string $sql, array $datas = []): \PDOStatement
    {
        $statement = $this->pdo->prepare($sql);
        $statement->execute($datas);
        return $statement;
    }

    protected function executeQuery(string $sql, array $datas = [], bool $single = true): mixed
    {
        $statement = $this->prepare($sql, $datas);

        return $single ? $statement->fetch() : $statement->fetchAll();
    }

    protected function executeUpdate(string $sql, array $datas = []): int|string
    {
        $statement = $this->prepare($sql, $datas);
        return str_starts_with(strtoupper(trim($sql)), 'INSERT') ? $this->pdo->lastInsertId() : $statement->rowCount();
    }

    protected function getAllData(string $tableName): array
    {
        return $this->query("SELECT * FROM $tableName ORDER BY id DESC", false);
    }

    protected function getLastId(string $tableName): int
    {
        $result = $this->query("SELECT id FROM $tableName ORDER BY id DESC LIMIT 1");
        return (int) ($result->id ?? 0);
    }
}
