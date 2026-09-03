<?php

namespace App\DTO;
use App\Services\Validator;

final class SoumettreCopieDTO
{
    private function __construct(
        public readonly float $noteBrute,
        public readonly \DateTimeImmutable $dateDepot,
        public readonly \DateTimeImmutable $dateLimite
    ) {}

    public static function fromArray(array $data): self
    {
        $noteBrute = Validator::validateFloat($data['noteBrute'] ?? null);
        $dateDepot = Validator::validateDate($data['dateDepot'] ?? '');
        $dateLimite = Validator::validateDate($data['dateLimite'] ?? '');

        return new self($noteBrute, $dateDepot, $dateLimite);
    }
}
