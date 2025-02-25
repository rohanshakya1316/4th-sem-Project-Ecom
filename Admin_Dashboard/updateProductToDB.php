<?php 
    header("Content-Type: application/json");
    include "../dbconfig.php";
    
    $data = json_decode(file_get_contents("php://input"), true);
    
    if (isset($data['product_id'])) {
        $productId = $data['product_id'];
        $name = $data['name'];
        $category = $data['category'];
        $brand = $data['brand'];
        $price = $data['price'];
        $stock = $data['stock'];
        $description = $data['description'];
        $image_path = $data['image_path'];

        $sql = "UPDATE `products` SET 
                `name`='$name', 
                `category`='$category', 
                `brand`='$brand', 
                `price`='$price', 
                `stock`='$stock', 
                `description`='$description',
                `image_path`='$image_path'
                WHERE `product_id`='$productId'";

        $result = $conn->query($sql);
        if ($result === true) {
            echo json_encode(["success" => true, "message" => "Product updated successfully"]);
        } else {
            echo json_encode(["success" => false, "message" => "Failed to update the Product!"]);
        }
    }
?>