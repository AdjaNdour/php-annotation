<?php

namespace App\Services;

use App\Services\CalculNoteInterface;

class CalculNoteAvecRetardService implements CalculNoteInterface
{
    
    public function calculerNote(float $noteBrute, \DateTimeImmutable $dateDepot, \DateTimeImmutable $dateLimite): float
    {
        if ($dateDepot > $dateLimite) {
            $noteBrute -= 2;
        }
        if ($noteBrute < 0) {
            $noteBrute = 0;
        }
        return $noteBrute;
    }
}
