<?php


namespace App\Doctrine\Type;

use Doctrine\DBAL\Types\DateTimeType;
use Doctrine\DBAL\Platforms\AbstractPlatform;

class DateTime extends DateTimeType
{
    private $dateTimeFormatString = 'Y-m-d H:i:s.000';

    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        return ($value !== null)
            ? $value->format($this->dateTimeFormatString) : null;
    }

}