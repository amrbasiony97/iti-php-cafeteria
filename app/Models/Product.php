<?php

class Product
{
    private static $table = 'products';

    static function getAll()
    {
        return Database::select(self::$table);
    }

    static function getOneProduct($id)
    {
    }

    static function createOneProduct()
    {
        
    }


    static function updateOneProduct($id, $data)
    {
    }

    static function deleteProduct($id)
    {
    }
}
