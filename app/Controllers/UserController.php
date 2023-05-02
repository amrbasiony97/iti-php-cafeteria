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
        Validate::request_method('POST');
        $validate = User::validateCreate();

        if (!empty($validate['errors'])) {
            View::redirect('User/create', [
                'errors' => $validate['errors'],
                'data' => $_POST
            ]);
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
            View::redirect('User/index', [
                'users' => User::getAll(),
                'success' => 'User created successfully'
            ]);
        }
        else {
            View::redirect('User/create', [
                'errors' => ['User not created']
            ]);
        }
    }

    public function show($id)
    {
        View::load('User/show', [
            'user' => Database::select_one('users', $id)
        ]);
    }

    public function edit($id)
    {
        View::load('User/edit', [
            'user' => Database::select_one('users', $id)
        ]);
    }

    public function update()
    {
        Validate::request_method('POST');
        $validate = User::validateEdit();

        if (!empty($validate['errors'])) {
            View::redirect('User/edit', [
                'errors' => $validate['errors'],
                'user' => $_POST
            ]);
        }
        else {
            $file = $validate['imgPath'];
            $imgPath = end(explode('/', $file));
            $result = Database::update('users', $_POST['id'], [
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
            View::redirect('User/index', [
                'users' => User::getAll(),
                'success' => 'User updated successfully'
            ]);
        }
        else {
            View::redirect('User/index', [
                'users' => User::getAll(),
                'success' => 'User not updated'
            ]);
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