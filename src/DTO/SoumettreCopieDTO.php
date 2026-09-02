<?php

namespace App\DTO;

readonly class SoumettreCopieDTO
{
    public \DateTime $dateDepot;
    public float $noteBrute;
    public \DateTime $dateLimite;

    public function __construct(\DateTime $dateDepot, float $noteBrute, \DateTime $dateLimite)
    {
        $this->dateDepot = $dateDepot;
        $this->noteBrute = $noteBrute;
        $this->dateLimite = $dateLimite;
    }
}
