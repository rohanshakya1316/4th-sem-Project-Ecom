<?php 
header("Content-Type: application/json");
include "../dbconfig.php";

if (isset($_GET['user_id'])) {
    $userId = intval($_GET['user_id']);
    $sql = "SELECT * FROM `login` WHERE `user_id` = '$userId'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo json_encode($result->fetch_assoc()); 
    } else {
        echo json_encode(["success" => false, "message" => "User not found!"]);
    }
}
?>