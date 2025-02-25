<?php
   
   include("dbconfig.php");
    $sql = "SELECT * FROM products ORDER BY product_id DESC";
    $results = $conn->query($sql);

    $products = [];     // Initializing an array to store the data

    if ($results->num_rows > 0) {
        while ($product = $results->fetch_assoc()) {
            $products[] = $product;
        }
    }
   
    // Now converting the data array to JSON Format
    $encoded_data = json_encode($products, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    file_put_contents('./api/products.json', $encoded_data);

    $conn->close();
?>