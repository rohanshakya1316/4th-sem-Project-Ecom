<?php
   session_start();
   
   include "dbconfig.php";
   
   $userId = $_SESSION['user_id'];
    $sql = "SELECT 
            p.name, 
            p.category, 
            p.image_path, 
            p.stock,
            p.product_id,
            ci.price, 
            ci.quantity,
            ci.payment_status
            FROM cart_items ci
            JOIN products p ON ci.product_id = p.product_id
            JOIN carts c ON ci.cart_id = c.cart_id
            JOIN login l ON c.user_id = l.user_id
            WHERE l.user_id = $userId;";
    $results = $conn->query($sql);

    $cartProducts = [];     // Initializing an array to store the data

    if ($results->num_rows > 0) {
        while ($cartProduct = $results->fetch_assoc()) {
            $cartProducts[] = $cartProduct;
        }
    }
   
    // Now converting the data array to JSON Format
    $encoded_data = json_encode($cartProducts, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    file_put_contents('./api/cartProducts.json', $encoded_data);

    $conn->close();
?>