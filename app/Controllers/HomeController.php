<?php

class HomeController extends Controller
{
    public function index()
    {
        View::load('Home/index');
    }

    public function about()
    {
        View::load('Home/about');
    }

    public function service()
    {
        View::load('Home/service');
    }

    public function menu()
    {
        View::load('Home/menu');
    }

    public function contact()
    {
        View::load('Home/contact');
    }
}