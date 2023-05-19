<?php
if (!isset($_SESSION['user'])) {
    header("Location: /iti-php-cafeteria/public/auth/login");
}

class CartController
{
    public function index()
    {
        $userId = $_SESSION["user"]["id"];
        try {

            $connection = Database::connect();

            $query = "SELECT  products.image, products.name, products.price,
                cart.totalPrice, cart_items.quantity, cart_items.id as cart_item_id
            FROM products
            INNER JOIN cart_items ON products.id = cart_items.productId
            INNER JOIN cart ON cart.id = cart_items.cartId WHERE cart.userId = $userId;";

            $stmt = $connection->prepare($query);
            $stmt->execute();
            $cart_items = $stmt->fetchAll();

            $totalPrice = $this->estimatingTotalPrice($connection);

            $products = Database::select('products');
            return View::load("Cart/index", [
                "products" => $products,
                "cart_items" => $cart_items, 
                "totalPrice" => $totalPrice
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function create()
    {
        $userId = $_SESSION["user"]["id"];
        try {

            $connection = Database::connect();

            $query = "SELECT  products.image, products.name, products.price,
                cart.totalPrice, cart_items.quantity, cart_items.id as cart_item_id
            FROM products
            INNER JOIN cart_items ON products.id = cart_items.productId
            INNER JOIN cart ON cart.id = cart_items.cartId WHERE cart.userId = $userId;";

            $stmt = $connection->prepare($query);
            $stmt->execute();
            $cart_items = $stmt->fetchAll();

            $totalPrice = $this->estimatingTotalPrice($connection);

            $products = Database::select('products');
            return View::load("Cart/purchase", [
                "products" => $products,
                "cart_items" => $cart_items, 
                "totalPrice" => $totalPrice
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    //API Functions
    public function getAllProducts()
    {
        $order_products_id = $_POST["cart_item_id"];
        $product_count = $_POST["quantity"];

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

        $cart_item_id = $_POST["cart_item_id"];

        try {

            $connection = Database::connect();

            $query = "UPDATE cart_items SET quantity = quantity + 1
                    WHERE id = $cart_item_id";
            $stmt = $connection->prepare($query);
            $stmt->execute();

            //Getting Product Count In Order
            $query = "SELECT quantity FROM cart_items WHERE id = $cart_item_id";
            $stmt = $connection->prepare($query);
            $stmt->execute();
            $item_quantity = $stmt->fetch();

            header('Content-Type: application/json');

            $totalPrice = $this->estimatingTotalPrice($connection);

            $data = array(
                $item_quantity,
                $totalPrice
            );

            echo json_encode($data);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function decrease()
    {
        try {

            $cart_item_id = $_POST["cart_item_id"];

            $connection = Database::connect();

            $query = "UPDATE cart_items SET quantity = quantity - 1
                WHERE id = $cart_item_id";

            $stmt = $connection->prepare($query);
            $stmt->execute();

            //Returning Product Count

            $query = "SELECT quantity FROM cart_items WHERE id = $cart_item_id";
            $stmt = $connection->prepare($query);
            $stmt->execute();
            $quantity = $stmt->fetch();
            header('Content-Type: application/json');

            $totalPrice = $this->estimatingTotalPrice($connection);

            $data = array(
                $quantity,
                $totalPrice
            );

            echo json_encode($data);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function delete()
    {
        $id = $_POST["cart_item_id"];
        if ($id < 0) {
            return View::load("cart", ["errors" => "Invalid product id"]);
        }

        try {
            $connection = Database::connect();
            $query = "SELECT id FROM cart_items WHERE id = $id";
            $statement = $connection->prepare($query);
            $statement->execute();
            $statement->fetch();

            if ($statement == false) {
                return View::load("cart", ["errors" => "Invalid product id"]);
            }

            Database::delete("cart_items", $id);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    private function estimatingTotalPrice($connection)
    {
        $userId = $_SESSION["user"]["id"];
        $query = "SELECT id FROM cart WHERE userId = $userId";
        $stmt = $connection->prepare($query);
        $stmt->execute();
        $cart = $stmt->fetch();


        if (isset($cart['id'])) {
            $query = "SELECT products.price, cart_items.quantity FROM products 
            INNER JOIN cart_items ON products.id = cart_items.productId
            WHERE cart_items.cartId = {$cart['id']} ";
            $stmt = $connection->prepare($query);
            $stmt->execute();
            $productDetails = $stmt->fetchAll();
            $totalPrice = 0;

            foreach ($productDetails as $key => $value) {
                $totalPrice += $value["price"] * $value["quantity"];
            }

            //Estimating Total Price
            $query = "UPDATE cart SET totalPrice = $totalPrice WHERE userId = $userId;";
            $stmt = $connection->prepare($query);
            $stmt->execute();

            return $totalPrice;
        } else {
            return 0;
        }
    }


    public function checkOut()
    {
        $userId = $_SESSION["user"]["id"];

        $connection = Database::connect();

        //Transfering Cart Data into Order Table
        $userCartQuery = "SELECT * FROM cart WHERE userId = $userId";
        $stmt = $connection->prepare($userCartQuery);
        $stmt->execute();
        $userCart = $stmt->fetch();

        $orderQuery = "INSERT INTO orders (user_id, total_price, status) VALUES ({$userCart['userId']},
         {$userCart['totalPrice']}, 'processing' );";
        $stmt = $connection->prepare($orderQuery);
        $stmt->execute();


        //Transfering Cart Items Data into Order Products Table
        $userCartItemsQuery = "SELECT * FROM cart_items WHERE cartId = {$userCart['id']}";
        $stmt = $connection->prepare($userCartItemsQuery);
        $stmt->execute();
        $cartItems = $stmt->fetchAll();

        $orderIdQuery = "SELECT id FROM orders WHERE user_id = $userId";
        $stmt = $connection->prepare($orderIdQuery);
        $stmt->execute();
        $orderId = $stmt->fetch()["id"];

        foreach ($cartItems as $key => $cartItem) {
            $product_count = $cartItem['quantity'];
            var_dump($product_count);
            $product_id = $cartItem['productId'];

            $orderQuery = "INSERT INTO order_products (order_id, product_count, product_id) VALUES ($orderId,
                $product_count , $product_id );";
            $stmt = $connection->prepare($orderQuery);
            $stmt->execute();
            Database::delete("cart_items", $cartItem["id"]);
        }

        //Deleting The Raws
        Database::delete("cart", $userCart["id"]);

        return $this->index();
    }

    public function addProductToCart()
    {
        $productId = $_POST["productId"];
        $userId = $_SESSION["user"]["id"];

        $connection = Database::connect();
        $query = "SELECT id FROM cart WHERE userId = $userId";
        $statement = $connection->prepare($query);
        $statement->execute();
        $cart = $statement->fetch();

        if (isset($cart)) {
            $query = "INSERT INTO cart_items (cartId, productId, quantity) VALUES ({$cart['id']}, $productId, 1)";
            $statement = $connection->prepare($query);
            $statement->execute();
        } else {
            $query = "INSERT INTO cart (userId, totalPrice) VALUES ($userId, 0)";
            $statement = $connection->prepare($query);
            $statement->execute();

            $query = "SELECT id FROM cart WHERE userId = $userId";
            $statement = $connection->prepare($query);
            $statement->execute();
            $cart = $statement->fetch();

            $query = "INSERT INTO cart_items (cartId, productId, quantity) VALUES ({$cart['id']}, $productId, 1)";
            $statement = $connection->prepare($query);
            $statement->execute();
        }
    }
}
