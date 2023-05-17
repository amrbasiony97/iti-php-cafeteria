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
}