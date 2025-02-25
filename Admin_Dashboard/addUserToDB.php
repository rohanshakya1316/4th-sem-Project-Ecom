<?php
header("Content-Type: application/json");
include "../dbconfig.php";

$data = json_decode(file_get_contents("php://input"), true);

if (
    isset($data['username']) && isset($data['email']) &&
    isset($data['password']) && isset($data['cpassword']) &&
    isset($data['usertype'])
) {
    include "../dbconfig.php";
    $username = $data['username'];
    $email = $data['email'];
    $password = $data['password'];
    $cpassword = $data['cpassword'];
    $usertype = $data['usertype'];
    $sql = "INSERT INTO `login`(
                `username`,
                `email`,
                `password`,
                `cpassword`,
                `usertype`
            )
            VALUES(
                '$username',
                '$email',
                '$password',
                '$cpassword',
                '$usertype'
            )";
    $result = $conn->query($sql);
    if ($result === true) {
        echo
            json_encode(["success" => true, "message" => "User added successfully!"]);
    } else {
        echo json_encode([
            "success" => false,
            "message" => "Failed to add
User."
        ]);
    }
} else {
    echo json_encode([
        "success" => false,
        "message" => "Invalid
Request"
    ]);
}
?>
<?php // header("Content-Type: application/json");
// include "../dbconfig.php";

// // Read JSON input
// $data = json_decode(file_get_contents("php://input"), true);
// echo $data;
// // Validate input data
// if (!empty($data) && isset($data['username'], $data['email'], $data['password'], $data['cpassword'],
// $data['usertype'])) {

// $username = $con->real_escape_string($data['username']);
// $email = $con->real_escape_string($data['email']);
// $password = password_hash($data['password'], PASSWORD_BCRYPT); // Secure password hashing
// $cpassword = password_hash($data['cpassword'], PASSWORD_BCRYPT);
// $usertype = $con->real_escape_string($data['usertype']);

// // Ensure passwords match
// if ($data['password'] !== $data['cpassword']) {
// echo json_encode(["success" => false, "message" => "Passwords do not match!"]);
// exit;
// }

// $sql = "INSERT INTO `login` (`username`, `email`, `password`, `cpassword`, `usertype`)
// VALUES ('$username', '$email', '$password', '$cpassword', '$usertype')";

// if ($con->query($sql) === true) {
// echo json_encode(["success" => true, "message" => "User added successfully!"]);
// } else {
// echo json_encode(["success" => false, "message" => "Failed to add User."]);
// }
// } else {
// echo json_encode(["success" => false, "message" => "Invalid Request: Missing required fields."]);
// }
//
?>