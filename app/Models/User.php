<?php

class User
{
    private static $table = 'users';
    
    static function getAll()
    {
        return Database::select(self::$table);
    }

    static function validateCreate()
    {
        $errors = [];

        // Validate name
        Validate::empty($_POST['name'], $errors, 'Name is required');

        // Validate email
        Validate::email($_POST['email'], $errors);
        Validate::unique(
            $_POST['email'], 
            $errors, 
            'Email already exists', 
            "SELECT * FROM users WHERE email = ?"
        );        

        // Validate password
        Validate::password($_POST['password'], $errors);
        
        // Validate room number & ext
        Validate::number_nullable($_POST['room_number'], $errors, 'Room number must be a number');
        Validate::number_nullable($_POST['ext'], $errors, 'Ext must be a number');

        // Validate image
        $image = Validate::image($errors);

        return [
            'errors' => $errors,
            'fileTmp' => $image['fileTmp'],
            'imgPath' => $image['imgPath']
        ];
    }
}