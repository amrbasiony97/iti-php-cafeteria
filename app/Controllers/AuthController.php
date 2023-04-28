<?php

class AuthController
{
    public function register()
    {
        var_dump(User::getAll());
    }

    public function login()
    {
        $count = Database::insert('users', [
            'name' => 'Amr Basiony',
            'email' => 'amrbasiony97@gmail.com',
            'password' => 'password123',
            'room_no' => '101',
            'ext' => 123,
            'image' => 'image1.jpg'
        ]);

        if ($count) {
            echo 'User created successfully';
        }
        else {
            echo 'Error creating user';
        }
    }

}