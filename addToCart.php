<?php
session_start();
header("Content-Type: application/json");
include "dbconfig.php";

if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] !== true) {
    echo json_encode(["success" => false, "message" => "Login is necessary to add products to the cart."]);
    exit();
}
$userId = $_SESSION['user_id'];

    try {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $product_id = $_POST['product_id'];
            $quantity = $_POST['quantity'];
            $price = $_POST['price'];

            // chek if the user already has an active cart
            $sql = "SELECT `cart_id` FROM `Carts` WHERE `user_id` = $userId ORDER BY `created_at` DESC LIMIT 1";
            $result = $conn->query($sql);
            $cart = $result->fetch_assoc();

            if (!$cart) {
                // If no cart exits create a new cart for the user
                $sql = "INSERT INTO `carts` (`user_id`) VALUES ($userId)";
                $result = $conn->query($sql);
                // get the last inserted cart ID
                $cartId = $conn->insert_id;
            } else {
                // use the existing cart ID
                $cartId = $cart['cart_id'];
            }
            // check if the product is already in the user's cart
            $stmt = $conn->prepare("SELECT * FROM `Cart_Items` WHERE `cart_id` = ? AND `product_id` = ?");
            $stmt->bind_param("ii", $cartId, $product_id);
            $stmt->execute();
            $result = $stmt->get_result();
            $existingItem = $result->fetch_assoc();
            if ($existingItem) {
                //if the product is already in the cart, update the quantity and price.
                $stmt = $conn->prepare("UPDATE `Cart_Items` SET `quantity` = `quantity` + ?, `price` = (? * (`quantity`)) WHERE `cart_id` = ? AND `product_id` = ?");
                $stmt->bind_param("idii", $quantity, $price, $cartId, $product_id);
                $stmt->execute();
            } else {
                // if the product is not in the cart, insert a new record
                $stmt = $conn->prepare("INSERT INTO `Cart_Items` (`cart_id`, `product_id`, `quantity`, `price`) VALUES (?, ?, ?, (? * ?))");
                $stmt->bind_param("iiidi", $cartId, $product_id, $quantity, $price, $quantity);
                $stmt->execute();
            }
            if ($result == true) {
                echo json_encode(["success" => true, "message" => "Product added to cart successfully!"]);
            } else {
                echo json_encode(["success" => false, "message" => "Failed to add product to cart."]);
            }
        } else {
            echo json_encode(["success" => false, "message" => "Invalid request"]);
        }
    } catch (Exception $e) {
        echo json_encode(["success" => false, "message" => "Database error: " . $e->getMessage()]);
    }
?>