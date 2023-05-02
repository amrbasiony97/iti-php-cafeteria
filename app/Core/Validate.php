<?php

class Validate
{
    public static function request_method($method)
    {
        if ($_SERVER['REQUEST_METHOD'] != $method) {
            View::redirect('User/index', [
                'errors' => ['Invalid request'],
                'users' => User::getAll()
            ]);
        }
    }

    public static function empty($var, &$errors, $msg)
    {
        if (!isset($var) || empty($var)) {
            array_push($errors, $msg);
        }
    }

    public static function email($email, &$errors)
    {
        self::empty($email, $errors, 'Email is required');
        $emailPattern = "/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix";
        if (
            !preg_match_all($emailPattern, $email) ||      // Method 1
            !filter_var($email, FILTER_VALIDATE_EMAIL)     // Method 2
        ) {
            array_push($errors, 'Email is invalid');
        }
    }

    public static function password($password, &$errors)
    {
        self::empty($password, $errors, 'Password is required');
        $passwordPattern = "/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/";
        if (!preg_match_all($passwordPattern, $password)) {
            array_push($errors, 'Password must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters');
        }
    }

    public static function match_password($password, $confirm_password, &$errors)
    {
        if ($password != $confirm_password) {
            array_push($errors, 'Passwords do not match');
        }
    }

    public static function number($number, &$errors, $msg)
    {
        $numberPattern = '/^[0-9]+$/';
        if (!preg_match_all($numberPattern, $number)) {
            array_push($errors, $msg);
        }
    }

    public static function number_nullable(&$number, &$errors, $msg)
    {
        $numberPattern = '/^[0-9]*$/';
        if (!preg_match_all($numberPattern, $number)) {
            array_push($errors, $msg);
        }
        if (empty($number)) {
            $number = null;
        }
    }

    public static function image(&$errors, $defaultImage = 'default.jpg')
    {
        $fileTmp = $_FILES['image']['tmp_name'];
        $fileType = $_FILES['image']['type'];
        $isImageEmpty = empty($_FILES['image']['full_path']);
        $isImage = explode("/", $fileType)[0] === 'image';
        $extension = '';
        if ($isImageEmpty) {
            $imgPath = $defaultImage;
        }
        else if (!$isImage) {
            array_push($errors, 'Only images are allowed');
        }
        else {
            $file = basename($_FILES['image']['name']);
            $extension = end(explode('.', $file));
        }

        if ($_FILES['image']['size'] > 1024 * 1024 * 2) {
            array_push($errors, 'Image size is too large (max = 2MB)');
        }

        $id = floor(microtime(true) * 1000);
        if (!$isImageEmpty) {
            $fileName = $id . '.' . $extension;
            $imgPath = "images".DS."users".DS.$fileName;
            if (empty($validate['errors']) && $defaultImage != 'default.jpg') {
                $path = UPLOADS.'images'.DS.'users'.DS.$defaultImage;
                unlink($path);
            }
        }

        return [
            'fileTmp' => $fileTmp,
            'imgPath' => $imgPath
        ];
    }

    /**
     * $exceptedVar: when you check if the uniqueness of $var while updating, to exclude it from checking
     */
    public static function unique($var, &$errors, $msg, $query, $exceptedVar = '')
    {
        $connection = Database::connect();
        $stmt = $connection->prepare($query);
        $stmt->execute([$var]);
        $count = $stmt->rowCount();
        if ($count > 0 && $exceptedVar != $var) {
            array_push($errors, $msg);
        }
    }
}