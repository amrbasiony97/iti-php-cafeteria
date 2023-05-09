<?php
if(!isset($_SESSION['user'])){
    header("Location: /iti-php-cafeteria/public/auth/login");       
}

class ProductController
{
    // For Printing all 
    public function index()
    {
        $allProducts = Product::getAll();
        // var_dump($allProducts);
        // echo "This is Index For Product" ;
        View::load('Product/index', $data =  [
            'allData' => $allProducts
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
