<?php

class HomeController extends Controller
{
    public function index($id = [])
    {
        $data['title'] = "Home Page";
        $data['content'] = "Content of home page";
        View::load('Home/index', $data);
    }

    public function test($arr = [])
    {
        var_dump($arr);
    }
}