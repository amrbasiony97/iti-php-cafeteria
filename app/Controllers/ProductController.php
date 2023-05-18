<?php
if(!isset($_SESSION['user']) || $_SESSION['user']['role'] != 'admin'){
    header("Location: /iti-php-cafeteria/public/Auth/login");       
}

class ProductController
{
    // For Printing all 
    public function index()
    {
        $allProducts = Product::getAll();
        View::load('Product/index', [
            'products' => $allProducts
        ]);
    }

    public function create()
    {
        View::load('Product/create');
    }

    public function store()
    {
        Validate::request_method('POST');
        $validate = Product::validateCreate();
        
        if (!empty($validate['errors'])) {
            View::redirect('Product/create', [
                'errors' => $validate['errors'],
                'data' => $_POST
            ]);
        } else {
            $file = $validate['imgPath'];
            $imgPath = end(explode('/', $file));
            
            $result = Database::insert('products', [
                'name' => $_POST['name'],
                'price' => $_POST['price'],
                'image' => $imgPath,
            ]);

            if ($result) {
                $imgPath = UPLOADS.$validate['imgPath'];
                move_uploaded_file($validate['fileTmp'], $imgPath);
                View::redirect('Product/index', [
                    'products' => Product::getAll(),
                    'success' => 'Product created successfully'
                ]);
            }
            else {
                View::redirect('Product/create', [
                    'errors' => ['Product not created']
                ]);
            }
        }
    }

    public function show($id)
    {
        View::load('Product/show', [
            'product' => Database::select_one('products', $id)
        ]);
    }

    public function edit($id)
    {
        View::load('Product/edit', [
            'product' => Database::select_one('products', $id)
        ]);
    }

    public function update()
    {
        Validate::request_method('POST');
        $validate = Product::validateEdit();

        if (!empty($validate['errors'])) {
            View::redirect('Product/edit', [
                'errors' => $validate['errors'],
                'product' => $_POST
            ]);
        }
        else {
            $file = $validate['imgPath'];
            $imgPath = end(explode('/', $file));

            $queryData = [];
            if (!empty($_POST['name'])) $queryData['name'] = $_POST['name'];
            if (!empty($_POST['price'])) $queryData['price'] = $_POST['price'];
            if (!empty($imgPath)) $queryData['image'] = $imgPath;
            
            $result = Database::update('products', $_POST['id'], $queryData);

            if ($result) {
                $imgPath = UPLOADS.$validate['imgPath'];
                move_uploaded_file($validate['fileTmp'], $imgPath);
                View::redirect('Product/index', [
                    'products' => Product::getAll(),
                    'success' => 'Product updated successfully'
                ]);
            }
            else {
                View::redirect('Product/index', [
                    'products' => Product::getAll(),
                    'success' => 'Product not updated'
                ]);
            }
        }
    }

    public function destroy()
    {
        Validate::request_method('POST');
        
        $imgPath = Product::getImage($_POST['id']);
        $result = Database::delete('products', $_POST['id']);

        if ($result) {
            // Delete image if exists
            if ($imgPath != 'default.jpg') {
                $path = UPLOADS.'images'.DS.'products'.DS.$imgPath;
                unlink($path);
            }
            View::redirect('Product/index', [
                'products' => Product::getAll(),
                'success' => 'Product deleted successfully'
            ]);
        }
        else {
            View::redirect('Product/index', [
                'errors' => ['Product not found']
            ]);
        }
    }
}
