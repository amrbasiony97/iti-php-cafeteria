<?php

class Product
{
    private static $table = 'products';
    
    static function getAll()
    {
        return Database::select(self::$table);
    }
}