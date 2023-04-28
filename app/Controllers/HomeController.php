<?php

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