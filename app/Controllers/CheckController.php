<?php
if (!isset($_SESSION['user'])) {
    header("Location: /iti-php-cafeteria/public/auth/login");
}

class CheckController
{
    public function index()
    {
        $allChecks  =  Database::select('orders');
        View::load('Check/index', $data =  [
            'allChecks' => $allChecks
        ]);
    }

    public function create()
    {
        View::load('Product/create');
    }
    public function store()
    {
        $target_dir = "uploads/images/products/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if (isset($_POST["submit"])) {
            $check = getimagesize($_FILES["image"]["tmp_name"]);
            if ($check !== false) {
                $uploadOk = 1;
            } else {
                die("File is not an image.");
            }
        }
        if (file_exists($target_file)) {
            die("Sorry, file already exists.");
        }
        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
        ) {
            die("Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
        }
        if ($uploadOk == 0) {
            die("Sorry, your file was not uploaded.");
        } else {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                echo "The file " . htmlspecialchars(basename($_FILES["image"]["name"])) . " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }


        $result = Database::insert('products', [
            'name' => $_POST['productName'],
            'price' => $_POST['price'],
            'image' => $_FILES["image"]["name"],
        ]);

        $allProducts = Product::getAll();
        View::load('Product/index', $data =  [
            'allData' => $allProducts
        ]);
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
        $target_dir = "uploads/images/products/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if (isset($_POST["submit"])) {
            $check = getimagesize($_FILES["image"]["tmp_name"]);
            if ($check !== false) {
                $uploadOk = 1;
            } else {
                die("File is not an image.");
            }
        }
        if (file_exists($target_file)) {
            die("Sorry, file already exists.");
        }
        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
        ) {
            die("Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
        }
        if ($uploadOk == 0) {
            die("Sorry, your file was not uploaded.");
        } else {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                echo "The file " . htmlspecialchars(basename($_FILES["image"]["name"])) . " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }

        $queryData = [];
        if (!empty($_POST['name'])) $queryData['name'] = $_POST['name'];
        if (!empty($_POST['price'])) $queryData['price'] = $_POST['price'];
        $queryData['image'] = $_FILES["image"]["name"];

        $result = Database::update('products', $_POST['id'], $queryData);

        $allProducts = Product::getAll();
        View::load('Product/index', $data =  [
            'allData' => $allProducts
        ]);
    }

    public function destroy()
    {
    }
}
