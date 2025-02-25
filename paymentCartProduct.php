<?php 
    session_start();
    header("Content-Type: application/json");
    
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
    include "dbconfig.php";

    // checking for the product_id is given or not 
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["product_id"])) {
        $productId = $_POST["product_id"];
        $userId = $_SESSION["user_id"];

        // now fetching the cart_id of the user
        $cartSql =  "SELECT cart_id FROM carts WHERE user_id = $userId";
        $cartResult = $conn->query($cartSql);
        
        if ($cartResult->num_rows > 0) {
            $cartRow = $cartResult->fetch_assoc();
            $cartId = $cartRow['cart_id'];

            // now updating payment staus to the cart_items table. 
            $sql = "UPDATE cart_items  SET payment_status = 'paid' WHERE cart_id = $cartId AND product_id = $productId";
            $result = $conn->query($sql);
            if ($result == TRUE) {
                echo json_encode(["success" => true, "message" => "Payment successfully done!"]);
            } else {
                echo json_encode(["success" => false, "message" => "Payment failed!"]);
            }
        } else {
            echo json_encode(["success" => false, "message" => "Cart not found!"]);
        }
    } else {
        echo json_encode(["success" => false, "message" => "Invalid request!"]);
    }
   
?>