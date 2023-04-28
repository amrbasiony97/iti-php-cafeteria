<?php

class HomeController extends Controller
{
    public function index()
    {
        View::load('Home/index');
    }
}