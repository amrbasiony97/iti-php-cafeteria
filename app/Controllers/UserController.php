<?php

class UserController
{
    public function index()
    {
        View::load('User/index', ['users' => User::getAll()]);
    }

    public function create()
    {
        View::load('User/create');
    }

    public function store()
    {
        $validate = User::validateCreate();

        if (!empty($validate['errors'])) {
            View::load('User/create', ['errors' => $validate['errors']]);
            exit();
        } else {
            $file = $validate['imgPath'];
            $imgPath = end(explode('/', $file));
            $result = Database::insert('users', [
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'image' => $imgPath,
                'password' => $_POST['password'],
                'room_number' => $_POST['room_number'],
                'ext' => $_POST['ext'],
                'role' => 'customer'
            ]);
        }

        if ($result) {
            $imgPath = UPLOADS.$validate['imgPath'];
            move_uploaded_file($validate['fileTmp'], $imgPath);
            View::load('User/index', [
                'users' => User::getAll(),
                'success' => 'User created successfully'
            ]);
        }
        else {
            View::load('User/create', [
                'errors' => ['User not created']
            ]);
        }
    }

    public function show($id)
    {
        View::load('User/show');
    }

    public function edit($id)
    {
        View::load('User/edit');
    }

    public function update($id)
    {
        $count = Database::update('users', $id, [
            'name' => 'Mohamed Ali',
            'email' => 'amrbasiony97@gmail.com',
            'password' => 'password',
            'room_no' => '123',
            'ext' => 456,
            'image' => 'image20.jpg'
        ]);

        if ($count) {
            echo 'User updated successfully';
        }
        else {
            echo 'User not updated';
        }
    }

    public function destroy($id)
    {
        $count = Database::delete('users', $id);

        if ($count) {
            echo 'User deleted successfully';
        }
        else {
            echo 'User not found';
        }
    }
}