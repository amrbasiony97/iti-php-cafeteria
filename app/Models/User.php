<?php

class User
{
    private static $table = 'users';
    
    static function getAll()
    {
        return Database::select(self::$table);
    }

    private static function getEmail($id)
    {
        $connection = Database::connect();
        $stmt = $connection->prepare("SELECT email FROM users WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch()['email'];
    }

    public static function getImage($id)
    {
        $connection = Database::connect();
        $stmt = $connection->prepare("SELECT image FROM users WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch()['image'];
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
        Validate::match_password($_POST['password'], $_POST['password2'], $errors);

        // Validate room number & ext
        Validate::number_nullable($_POST['room_number'], $errors, 'Room number must be a number');
        Validate::number_nullable($_POST['ext'], $errors, 'Ext must be a number');

        // Validate image
        $image = Validate::image($errors);

        // Validate Secret
        Validate::empty($_POST['secret'], $errors, 'Secret is required');

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

        // Validate email
        Validate::email($_POST['email'], $errors);
        Validate::unique(
            $_POST['email'], 
            $errors, 
            'Email already exists', 
            "SELECT * FROM users WHERE email = ?",
            self::getEmail($_POST['id'])
        );        

        // Validate password
        if (!empty($_POST['password'])) {
            Validate::password($_POST['password'], $errors);
        }
        Validate::match_password($_POST['password'], $_POST['password2'], $errors);
        
        
        // Validate room number & ext
        Validate::number_nullable($_POST['room_number'], $errors, 'Room number must be a number');
        Validate::number_nullable($_POST['ext'], $errors, 'Ext must be a number');

        // Validate image
        $image = Validate::image($errors, self::getImage($_POST['id']));

        return [
            'errors' => $errors,
            'fileTmp' => $image['fileTmp'],
            'imgPath' => $image['imgPath']
        ];
    }

    static function validateLoginData(){
        $errors = [];

        Validate::empty($_POST['email'], $errors, 'Email field required...!');
        Validate::empty($_POST['password'], $errors, 'Password field required...!');

        Validate::email($_POST['email'], $errors, 'Email must be in email format "example@example.com"...!');
        Validate::password($_POST['password'], $errors, 'Password field required...!');

        return [
            'errors' => $errors,
        ];
    }

    static function validateEmail(){
        $errors = [];

        Validate::empty($_POST['email'], $errors, 'Email field required...!');
        Validate::email($_POST['email'], $errors, 'Must be a real email...!');

        return [
            'errors' => $errors
        ];
    }

    static function validateSecret(){
        $errors = [];

        Validate::empty($_POST['secret'], $errors, 'Secret Key field required...!');

        return [
            'errors' => $errors
        ];
    }

    static function validateNewPassword(){
        $errors = [];

        Validate::empty($_POST['password'], $errors, 'Password Field Required...!');
        Validate::password($_POST['password'], $errors, 'Password Must be strong Password...!');
        Validate::empty($_POST['password2'], $errors, 'Confirmed Password Required...!');
        Validate::match_password($_POST['password'], $_POST['password2'], $errors, 'Confirmed Password Required...!');
        
        return [
            'errors' => $errors
        ];
    }
}