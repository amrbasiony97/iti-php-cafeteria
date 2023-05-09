<?php
session_start();
class AuthController
{
    public function register()
    {
        var_dump(User::getAll());
    }

    public function login()
    {
        return View::load('Auth/login');
    }

    public function applyLogin(){
        Validate::request_method('POST');
        $validateUserData = User::validateLoginData();

        if(!empty($validateUserData['errors'])){
            View::redirect('Auth/login', ['errors' => $validateUserData['errors'], 'data' => $_POST]);
        }else{
            $query = Database::selectByEmail('users', $_POST['email']);
            if($query){
                if(password_verify($_POST['password'], $query[7])){
                    $userData =[
                        'name'=>$query['name'],
                        'role'=>$query['role'],
                    ]; 

                    $_SESSION['user'] = $userData;
                    header("Location: /iti-php-cafeteria/public/");
                }else{
                    View::redirect('Auth/login', ['errors' => ['Invalid Credentials...!'], 'data' => $_POST]);
                }
            }else{
                View::redirect('Auth/login', ['errors' => ['Invalid Credentials...!'], 'data' => $_POST]);
            }
        }
    }

    public function logout(){
        session_start();
        session_unset();
        session_destroy();

        header("Location: /iti-php-cafeteria/public/auth/login");
    }
}