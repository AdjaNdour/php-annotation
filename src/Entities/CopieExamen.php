<?php

namespace App\Entities;

class CopieExamen extends AbstractDocument
{
    private float $noteBrute;
    private float $noteFinale;
    private bool $penaliteAppliquee;
    private \DateTime $dateLimite;


    public function __construct(
        \DateTime $dateDepot,
        float $noteBrute,
        bool $penaliteAppliquee,
        \DateTime $dateLimite,
        ?int $id = null
    ) {
        parent::__construct($dateDepot, $id);
        $this->verifierNoteBrute($noteBrute);
        $this->noteBrute = $noteBrute;
        $this->penaliteAppliquee = $penaliteAppliquee;
        $this->dateLimite = $dateLimite;
    }
    //-----------------------------------------------------------------------------

    public function getNoteBrute(): float
    {
        return $this->noteBrute;
    }

    public function setNoteBrute(float $noteBrute): void
    {
        $this->noteBrute = $noteBrute;
    }
    //-----------------------------------------------------------------------------

     public function calculerNoteFinale(): float
    {
        return $this->penaliteAppliquee ? $this->noteBrute - 2 : $this->noteBrute;
    }

    public function setNoteFinale(): void
    {
        $this->noteFinale = $this->calculerNoteFinale();
    }
    
    //-----------------------------------------------------------------------------

    private function verifierNoteBrute(float $noteBrute): void
    {
        if ($noteBrute < 0 || $noteBrute > 20) {
            throw new \InvalidArgumentException('La note doit être comprise entre 0 et 20.');
        }
    }
    
    public function getNoteFinale(): float
    {
        return $this->noteFinale;
    }

    //-----------------------------------------------------------------------------
    public function getPenaliteAppliquee(): bool
    {
        return $this->penaliteAppliquee;
    }

    public function setPenaliteAppliquee(bool $penaliteAppliquee): void
    {
        $this->penaliteAppliquee = $penaliteAppliquee;
    }

    //-----------------------------------------------------------------------------
    public function getDateLimite(): \DateTime
    {
        return $this->dateLimite;
    }

    public function setDateLimite(\DateTime $dateLimite): void
    {
        $this->dateLimite = $dateLimite;
    }
}
