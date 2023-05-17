<?php

class UserController
{
    public function index()
    {
        var_dump(User::getAll());
    }
}