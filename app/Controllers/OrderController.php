<?php
if(!isset($_SESSION['user'])){
    header("Location: /iti-php-cafeteria/public/auth/login");       
}
class OrderController
{
    public function index()
    {
        try {

            $connection = Database::connect();

            $query = "SELECT  products.image, products.name, products.price,
                orders.total_price, order_products.product_count, order_products.id as product_id_inOrder
            FROM products
            INNER JOIN order_products ON products.id = order_products.product_id
            INNER JOIN orders ON orders.id = order_products.order_id WHERE orders.user_id = 2;";

            $stmt = $connection->prepare($query);
            $stmt->execute();
            $order_products = $stmt->fetchAll();

            // var_dump($order_products);
            return View::load("cart", ["products" => $order_products]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    //API Functions
    public function getAllProducts()
    {
        $order_products_id = $_POST["order_products_id"];
        $product_count = $_POST["product_count"];

        try {
            $connection = Database::connect();

            $query = "UPDATE order_products SET product_count = $product_count
                WHERE id = $order_products_id";

            $stmt = $connection->prepare($query);
            $stmt->execute();

            $query = "SELECT  product_count FROM order_products WHERE id = $order_products_id;";

            $stmt = $connection->prepare($query);
            $stmt->execute();
            $products = $stmt->fetch();

            echo json_encode(array($products));
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function increase()
    {

        $order_products_id = $_POST["order_products_id"];

        try {

            $connection = Database::connect();

            $query = "UPDATE order_products SET product_count = product_count + 1
                WHERE id = $order_products_id";

            $stmt = $connection->prepare($query);
            $stmt->execute();

            //Returning Product Count

            $query = "SELECT product_count FROM order_products WHERE id = $order_products_id";
            $stmt = $connection->prepare($query);
            $stmt->execute();
            $product_count = $stmt->fetch();
            header('Content-Type: application/json');

            $data = array(
                $product_count
            );

            echo json_encode($data);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function decrease()
    {
        try {

            $order_products_id = $_POST["order_products_id"];

            $connection = Database::connect();

            $query = "UPDATE order_products SET product_count = product_count - 1
                WHERE id = $order_products_id";

            $stmt = $connection->prepare($query);
            $stmt->execute();

            //Returning Product Count

            $query = "SELECT product_count FROM order_products WHERE id = $order_products_id";
            $stmt = $connection->prepare($query);
            $stmt->execute();
            $product_count = $stmt->fetch();
            header('Content-Type: application/json');

            $data = array(
                $product_count
            );

            echo json_encode($data);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function delete()
    {
        $id = $_POST["order_products_id"];
        if ($id < 0) {
            return View::load("cart", ["errors" => "Invalid product id"]);
        }

        try {
            $connection = Database::connect();
            $query = "SELECT id FROM order_products WHERE id = $id";
            $statement = $connection->prepare($query);
            $statement->execute();
            $statement->fetch();

            if ($statement == false) {
                return View::load("cart", ["errors" => "Invalid product id"]);
            }

            Database::delete("order_products", $id);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
}
