<?php 
    header("Content-Type:appliation/json");
    include "../dbconfig.php";  
    
    if (isset($_GET['product_id'])) {
        $productId = intval($_GET['product_id']);
        $sql = "SELECT * FROM products WHERE `product_id` = $productId";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo json_encode($result->fetch_assoc());
        } else {
            echo json_encode(["success" => false, "message" => "Product not found!"]);
        }
    }
?>