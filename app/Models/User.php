<?php

class User
{
    private static $table = 'users';
    
    static function getAll()
    {
        return Database::select(self::$table);
    }
}