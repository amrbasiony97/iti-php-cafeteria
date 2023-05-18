<?php

class AuthController
{
    public function login()
    {
        return View::load('Auth/login');
    }

    public function applyLogin()
    {
        Validate::request_method('POST');
        $validateUserData = User::validateLoginData();

        if (!empty($validateUserData['errors'])) {
            View::redirect('Auth/login', ['errors' => $validateUserData['errors'], 'data' => $_POST]);
        } else {
            $query = Database::selectByEmail('users', $_POST['email']);
            if ($query) {
                if (password_verify($_POST['password'], $query['password'])) {
                    $userData = [
                        'id' => $query['id'],
                        'name' => $query['name'],
                        'role' => $query['role'],
                        'image' => $query['image'],
                    ];

                    session_start();
                    $_SESSION['user'] = $userData;

                    if ($_SESSION['user']['role'] == 'admin') {
                        View::redirect('User/index', ['users' => User::getAll()]);
                    }
                    else if ($_SESSION['user']['role'] == 'customer') {
                        View::redirect('Order/index');
                    }
                    else {
                        header("Location: /iti-php-cafeteria/public/");
                    }
                } else {
                    View::redirect('Auth/login', ['errors' => ['Invalid Credentials...!'], 'data' => $_POST]);
                }
            } else {
                View::redirect('Auth/login', ['errors' => ['Invalid Credentials...!'], 'data' => $_POST]);
            }
        }
    }

    public function logout()
    {
        session_start();
        session_unset();
        session_destroy();

        header("Location: /iti-php-cafeteria/public/auth/login");
    }
}
