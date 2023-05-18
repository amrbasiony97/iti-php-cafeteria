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
    }
    public function store()
    {
    }

    public function edit()
    {
    }

    public function update()
    {
    }

    public function destroy()
    {
    }
}
