<?php 
    header("Content-Type: application/json");
    include "../dbconfig.php";

    if (isset($_GET['user_id'])) {
        $userId = intval($_GET['user_id']);
        
        $sql = "DELETE FROM `login` WHERE `user_id` = '$userId'";
        $result = $conn->query($sql);
        if ($result === true) {
            echo json_encode(["success" => true, "message" => "User deleted successfully!"]);
        } else {
            echo json_encode(["success" => false, "message" => "Failed to delete User!" ]);
        }
    } else {
        echo json_encode(["success" => false, "message" => "Invalid request!"]);
    }
?>