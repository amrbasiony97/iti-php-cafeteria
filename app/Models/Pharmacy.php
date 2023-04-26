<?php

class Pharmacy
{
    private static $table = 'pharmacies';
    
    static function getAll()
    {
        return Database::select(self::$table);
    }
}