<?php 
    header("Content-Type: application/json");
    include "../dbconfig.php";
    
    $data = json_decode(file_get_contents("php://input"), true);
    
    if (isset($data['user_id'])) {
        $userId = $data['user_id'];
        $username = $data['username'];
        $email = $data['email'];
        $password = $data['password'];
        $cpassword = $data['cpassword'];
        $usertype = $data['usertype'];

        $sql = "UPDATE `login` SET 
                `username`='$username', 
                `email`='$email', 
                `password`='$password', 
                `cpassword`='$cpassword', 
                `usertype`='$usertype'
                WHERE `user_id`='$userId'";

        $result = $conn->query($sql);
        if ($result === true) {
            echo json_encode(["success" => true, "message" => "User updated successfully"]);
        } else {
            echo json_encode(["success" => false, "message" => "Failed to update the User!"]);
        }
    }
?>