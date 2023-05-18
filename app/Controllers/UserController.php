<?php
if(!isset($_SESSION['user'])){
    header("Location: /iti-php-cafeteria/public/auth/login");       
}
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
            $hashed = password_hash($_POST['password'], PASSWORD_DEFAULT);

            $result = Database::insert('users', [
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'image' => $imgPath,
                'password' => $hashed,
                'room_number' => $_POST['room_number'],
                'ext' => $_POST['ext'],
                'role' => 'customer'
            ]);

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
            $hashed = password_hash($_POST['password'], PASSWORD_DEFAULT);
            // die($hashed);
            $result = Database::update('users', $_POST['id'], [
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'image' => $imgPath,
                'password' => $hashed,
                'room_number' => $_POST['room_number'],
                'ext' => $_POST['ext'],
                'role' => 'customer'
            ]);


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
    }

    public function destroy()
    {
        Validate::request_method('POST');
        
        $imgPath = User::getImage($_POST['id']);
        $result = Database::delete('users', $_POST['id']);

        if ($result) {
            // Delete image if exists
            if ($imgPath != 'default.jpg') {
                $path = UPLOADS.'images'.DS.'users'.DS.$imgPath;
                unlink($path);
            }
            View::redirect('User/index', [
                'users' => User::getAll(),
                'success' => 'User deleted successfully'
            ]);
        }
        else {
            View::redirect('User/index', [
                'errors' => ['User not found']
            ]);
        }
    }
}