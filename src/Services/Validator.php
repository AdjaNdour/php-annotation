<?php
namespace App\DTO;

class validator
{
    public static function validateFloat(string|float|null $value): float
    {
        if (!is_numeric($value)) {
            throw new \InvalidArgumentException('La valeur doit être numérique.');
        }
        return (float) $value;
    }
  
    public static function validateDate(string $date): \DateTimeImmutable
    {
        $dateTime = \DateTimeImmutable::createFromFormat('Y-m-d', $date);
        if (!$dateTime || $dateTime->format('Y-m-d') !== $date) {
            throw new \InvalidArgumentException('Format de date invalide. Utilisez le format YYYY-MM-DD.');
        }
        return $dateTime;
    }

}
