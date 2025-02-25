<?php 
    header("Content-Type: application/json");
    include "../dbconfig.php";

    if (isset($_GET['product_id'])) {
        $productId = intval($_GET['product_id']);
        
        $sql = "DELETE FROM `products` WHERE `product_id` = '$productId'";
        $result = $conn->query($sql);
        if ($result === true) {
            echo json_encode(["success" => true, "message" => "Product deleted successfully!"]);
        } else {
            echo json_encode(["success" => false, "message" => "Failed to delete Product!" ]);
        }
    } else {
        echo json_encode(["success" => false, "message" => "Invalid request!"]);
    }
?>