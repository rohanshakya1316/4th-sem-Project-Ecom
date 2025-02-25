<?php 
    session_start();
    include "dbconfig.php";
    
    if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] !== true) {
        echo json_encode(["success" => false, "message" => "Login is necessary to add products to the cart."]);
        exit();
    }

    $userId = $_SESSION['user_id'];
    $sql = "SELECT COUNT(quantity) AS totalItems FROM cart_items JOIN carts ON cart_items.cart_id = carts.cart_id WHERE carts.user_id = $userId";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    $totalItems = $row['totalItems'] ?? 0;
    
    echo json_encode(["success" => true, "totalItems" => $totalItems]);
?>