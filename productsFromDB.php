<?php
   
   include("dbconfig.php");
   // $servername = "localhost";
    // $username = "root";
    // $password = "";
    // $dbname = "productdatabase";
    // $conn = new mysqli($servername, $username, $password, $dbname);
    // if ($conn->connect_error) {
    //     die("Connection Failed: " .$conn->connect_error);
    // }else {
    //     echo "Connection Successfull!";
    // }

    $sql = "SELECT * FROM products";
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