<?php

class Product
{
    private static $table = 'products';

    static function getAll()
    {
        return Database::select(self::$table);
    }

    static function validateCreate()
    {
        $errors = [];

        // Validate name
        Validate::empty($_POST['name'], $errors, 'Name is required');
        Validate::unique(
            $_POST['name'],
            $errors,
            'Product already exists',
            "SELECT * FROM products WHERE name = ?"
        );

        // Validate price
        Validate::positiveNumber($_POST['price'], $errors, 'Price');

        // Validate image
        $image = Validate::image($errors, 'products');
        
        return [
            'errors' => $errors,
            'fileTmp' => $image['fileTmp'],
            'imgPath' => $image['imgPath']
        ];
    }
}
