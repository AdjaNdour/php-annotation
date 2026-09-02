<?php

namespace App\Repositories;

use App\Entities\CopieExamen;

class PdoCopieExamenRepository extends HelperBase implements CopieExamenRepositoryInterface
{
   public function __construct(\PDO $pdo )
    {
        parent::__construct($pdo);
    }

    public function save(CopieExamen $copie): CopieExamen
    {
        $sql = "INSERT INTO copies_examens (date_creation, note_brute, note_finale, penalite_appliquee, date_limite)
                VALUES (:date_creation, :note_brute, :note_finale, :penalite_appliquee, :date_limite)";
        $datas = [
            'date_creation' => $copie->getDateDepot(),
            'note_brute' => $copie->getNoteBrute(),
            'note_finale' => $copie->getNoteFinale(),
            'penalite_appliquee' => $copie->getPenaliteAppliquee(),
            'date_limite' => $copie->getDateLimite(),
        ];
        $this->executeUpdate($sql, $datas);
        $copie->setId($this->getLastId('copies_examens'));
        return $copie;
    }

    public function findAll(): array
    {
        $sql = "SELECT * FROM copies_examens";
        $results = $this->executeQuery($sql, [], false);
        return array_map(function ($copie) {
            return new CopieExamen(
                $copie['date_creation'],
                $copie['note_brute'],
                $copie['note_finale'],
                $copie['penalite_appliquee'],
                $copie['date_limite']
            );
        }, $results);
    }

    public function findById(int $id): ?CopieExamen
    {
        $sql = "SELECT * FROM copies_examens WHERE id = :id";
        $result = $this->executeQuery($sql, ['id' => $id]);
        if (!$result) {
            return null;
        }
        return new CopieExamen(
            $result['date_creation'],
            $result['note_brute'],
            $result['note_finale'],
            $result['penalite_appliquee'],
            $result['date_limite']
        );
    }
}