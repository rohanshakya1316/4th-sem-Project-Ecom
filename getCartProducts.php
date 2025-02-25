<?php
session_start();
header("Content-Type: application/json");

include "dbconfig.php";

$userId = $_SESSION["user_id"];

$sql = "SELECT ci.product_id, p.name, p.category, p.image_path, ci.price, ci.quantity, ci.payment_status
        FROM cart_items ci
        JOIN products p ON ci.product_id = p.product_id
        JOIN carts c ON ci.cart_id = c.cart_id
        WHERE c.user_id = $userId";

$result = $conn->query($sql);
// $stmt = $conn->prepare($sql);
// $stmt->bind_param("i", $userId);
// $stmt->execute();
// $result = $stmt->get_result();

$cartProducts = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $cartProducts[] = $row; 
    }
}

echo json_encode($cartProducts);
?>