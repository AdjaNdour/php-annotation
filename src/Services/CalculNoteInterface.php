<?php

namespace App\Services;

interface CalculNoteInterface
{
    public function calculerNote(float $noteBrute, \DateTimeImmutable $dateDepot, \DateTimeImmutable $dateLimite): float;
}
