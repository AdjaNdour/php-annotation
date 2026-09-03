<?php
namespace App\Services;

class Validator
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
        $date = trim($date);
        if ($date === '') {
            throw new \InvalidArgumentException('La date est obligatoire.');
        }

        $formats = ['Y-m-d\TH:i:s','Y-m-d\TH:i','Y-m-d H:i:s','Y-m-d H:i','Y-m-d',];

        foreach ($formats as $format) {
            $dateTime = \DateTimeImmutable::createFromFormat('!' . $format, $date);
            if ($dateTime !== false && $dateTime->format($format) === $date) {
                return $dateTime;
            }
        }

        throw new \InvalidArgumentException('Format de date invalide. Utilisez le format YYYY-MM-DD ou YYYY-MM-DDTHH:MM.');
    }
}
