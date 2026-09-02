<?php

namespace App\Services;

use App\DTO\SoumettreCopieDTO;
use App\Entities\CopieExamen;
use App\Repositories\CopieExamenRepositoryInterface;
use App\Services\CalculNoteInterface;

class SoumissionCopieService
{
    public function __construct(
        private CalculNoteInterface $calculateur,
        private CopieExamenRepositoryInterface $repository
    ) {}

    public function soumettre(SoumettreCopieDTO $dto): CopieExamen
    {
        $noteFinale = $this->calculateur->calculerNote($dto->noteBrute, $dto->dateDepot, $dto->dateLimite);

        $copie = new CopieExamen($dto->dateDepot, $dto->noteBrute, $noteFinale, $dto->dateLimite);
        return $this->repository->save($copie);
    }
}
