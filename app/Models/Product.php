<?php

class Product
{
    private static $table = 'products';

    static function getAll()
    {
        return Database::select(self::$table);
    }

    private static function getName($id)
    {
        $connection = Database::connect();
        $stmt = $connection->prepare("SELECT name FROM ". self::$table ." WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch()['name'];
    }

    public static function getImage($id)
    {
        $connection = Database::connect();
        $stmt = $connection->prepare("SELECT image FROM ". self::$table ." WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch()['image'];
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

        // Validate category
        Validate::exists(
            'categories', 
            $_POST['category'], 
            $errors, 
            'Category does not exist'
        );

        // Validate image
        $image = Validate::image($errors, 'products');
        
        return [
            'errors' => $errors,
            'fileTmp' => $image['fileTmp'],
            'imgPath' => $image['imgPath']
        ];
    }

    static function validateEdit()
    {
        $errors = [];

        // Validate name
        Validate::empty($_POST['name'], $errors, 'Name is required');
        Validate::unique(
            $_POST['name'],
            $errors,
            'Product already exists',
            "SELECT * FROM products WHERE name = ?",
            self::getName($_POST['id'])
        );

        // Validate price
        Validate::positiveNumber($_POST['price'], $errors, 'Price');

        // Validate category
        Validate::exists(
            'categories', 
            $_POST['category'], 
            $errors, 
            'Category does not exist'
        );

        // Validate image
        $image = Validate::image($errors, 'products', self::getImage($_POST['id']));

        return [
            'errors' => $errors,
            'fileTmp' => $image['fileTmp'],
            'imgPath' => $image['imgPath']
        ];
    }
}
