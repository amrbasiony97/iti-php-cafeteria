<?php
// if(!isset($_SESSION['user'])){
//     header("Location: /iti-php-cafeteria/public/auth/login");       
// }
class HomeController extends Controller
{
    public function index()
    {
        View::load('Home/index');
    }

    public function test($arr = [])
    {
        var_dump($arr);
    }
}