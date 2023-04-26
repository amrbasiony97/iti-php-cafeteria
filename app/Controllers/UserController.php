<?php

class UserController
{
    public function index()
    {
        var_dump(User::getAll());
    }

    public function store()
    {
        $count = Database::insert('users', [
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
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