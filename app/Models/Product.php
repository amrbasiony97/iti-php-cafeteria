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
        $connection = Database::connect();
        $stmt = $connection->prepare("SELECT * FROM products WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(); // TODO
    }

    static function createOneProduct($tableName, $productRecord)
    {
        // TODO

    }


    static function updateOneProduct($tableName, $id, $data)
    {
        $result = DataBase::update($tableName, $id, $data);
    }

    static function deleteProduct($tableName, $id)
    {
        $result  = Database::delete($tableName, $id);
    }
}
