<?php
session_start();
header("Content-Type: application/json");

// we are getting the raw JSON data from the reqest
$data = json_decode(file_get_contents("php://input"), true);

// Check if all required fields are present
if (
    isset($data['name']) && isset($data['category']) &&
    isset($data['brand']) && isset($data['price']) &&
    isset($data['stock']) && isset($data['description']) &&
    isset($data['image_path'])
) {
    include "../dbconfig.php";
    // $sql = "INSERT INTO `products`(
    //     `name`,
    //     `category`,
    //     `brand`,
    //     `price`,
    //     `stock`,
    //     `description`,
    //     `image_path`
    // )
    // VALUES(
    //     '" . $data['name'] . "',
    //     '" . $data['category'] . "',
    //     '" . $data['brand'] . "',
    //     '" . $data['price'] . "',
    //     '" . $data['stock'] . "',
    //     '" . $data['description'] . "',
    //     '" . $data['image_path'] . "'
    // )";


    // Prepare the SQL statement
    $stmt = $conn->prepare("INSERT INTO products (name, category, brand, price, stock, description, image_path) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param(
        "sssdsss",
        $data['name'],
        $data['category'],
        $data['brand'],
        $data['price'],
        $data['stock'],
        $data['description'],
        $data['image_path']
    );

    // Execute and send response
    if ($stmt->execute()) {
        echo json_encode(["success" => true, "message" => "Product added successfully!"]);
    } else {
        echo json_encode(["success" => false, "message" => "Error adding product"]);
    }

    // Close connections
    $stmt->close();
    $conn->close();
} else {
    echo json_encode(["success" => true, "message" => "Invalid input"]);
}


?>