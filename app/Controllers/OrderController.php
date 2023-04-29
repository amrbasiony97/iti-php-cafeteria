<?php

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
            INNER JOIN orders ON orders.id = order_products.order_id WHERE orders.user_id = 4;";

            $stmt = $connection->prepare($query);
            $stmt->execute();
            $order_products = $stmt->fetchAll();

            // var_dump($order_products);
            return View::load("cart", ["products" => $order_products]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function increase()
    {
    }

    public function delete()
    {
        $id = $_POST["id"];
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
