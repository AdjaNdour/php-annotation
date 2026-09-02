<?php

namespace App\Repositories;

use App\Entities\CopieExamen;

interface CopieExamenRepositoryInterface
{
    public function save(CopieExamen $copie): CopieExamen;
    public function findById(int $id): ?CopieExamen;
    public function findAll(): array;
}
