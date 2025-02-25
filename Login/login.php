<?php
session_start();
include "../dbconfig.php";
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $usertype = $_POST['usertype'];

    $sql = "SELECT * FROM `login` WHERE username = '$username' && password = '$password'";

    $result = mysqli_query($conn, $sql);
    $total = mysqli_num_rows($result);
    $userData = mysqli_fetch_assoc($result);
    if ($total == 1 && $userData['usertype'] != "Admin" && $usertype != "Admin") {
        $_SESSION['loggedIn'] = true;
        $_SESSION['user_name'] = $userData['username'];
        $_SESSION['user_id'] = $userData['user_id'];
        header('location:../index.php');
    } else if ($total == 1 && $userData['usertype'] == "Admin" && $usertype == "Admin") {
        $_SESSION['loggedIn'] = true;
        $_SESSION['admin_name'] = $userData['username'];
        $_SESSION['admin_id'] = $userData['user_id'];
        header('location:../Admin_Dashboard/index.php');
    } else {
        echo '<script type="text/javascript">';
        echo 'alert("Login Failed. Invalid Username or password or usertype.");';
        echo '</script>';
    }
}
ob_start();
if (isset($_POST['register'])) {
    // Regular Expressions
    $usernameRegex = "/^[A-Za-z0-9]{3,15}$/";
    $emailRegex = "/^[A-Za-z0-9]+(?:[.%_+][A-Za-z0-9]+)*@[A-Za-z0-9]+\.[A-Za-z]{2,}$/";
    $passwordRegex = "/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/";

    // Get values from POST
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $terms = $_POST['terms'];
    $usertype = $_POST['usertype'];

    $errors = [];

    // Username validation
    if (empty($username)) {
        $errors['user_error'] = "Username cannot be empty!";
    } elseif (!preg_match($usernameRegex, $username)) {
        $errors['user_error'] = "Username Invalid!";
    }

    // Email validation
    if (!preg_match($emailRegex, $email)) {
        $errors['email_error'] = "Invalid Email! Enter a valid email address.";
    }

    // Password validation
    if (!preg_match($passwordRegex, $password)) {
        $errors['pass_error'] = "8 characters, uppercase, lowercase & special characters required!";
    }

    // Confirm Password validation
    if ($cpassword !== $password) {
        $errors['cpass_error'] = "Password and Confirm password should match!";
    }

    // Terms & Conditions validation
    if (!$terms) {
        $errors['check_error'] = "*You must agree to the terms and conditions.";
    }

    if (empty($errors)) {
        echo "Form submitted successfully!";
        // Process the form data (e.g., store it in the database)
        $sql = "INSERT INTO `login`(`username`, `email`, `password`, `cpassword`, `usertype`) VALUES ('$username','$email','$password','$cpassword', '$usertype')";
        $result = $conn->query($sql);
        if ($result == true) {
            echo "<script>confirm('Registration successful! Now, Login Here.')</script>";
            echo '<meta http-equiv = "refresh" content = "0; url = login.php"/>';
            exit();
        } else {
            echo "<script>alert('Error!, Registration failed. Try again!');</script>";
        }
    } else {
        // Show validation errors
        foreach ($errors as $key => $error) {
            echo "<p style='color: red;'>$error</p>";
        }
    }
}
ob_end_flush();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Registration</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link
        href="https://fonts.googleapis.com/css2?family=Jost:wght@300;400;500;700&family=Poppins:wght@200;300;400;600&family=Quicksand:wght@300;400;500;600;700&family=Urbanist:wght@300;400;600;700;800;900&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="login.css">
    <script src="login.js" defer></script>
</head>

<body class="mainContainer">
    <div class="wrapper container">
        <a href="../index.php"><span class="icon-close">
                <i class="fa-solid fa-xmark"></i>
            </span></a>

        <!-- Login Form Start -->
        <div class="form-box login">
            <h2>Login</h2>
            <form name="loginForm" action="" method="POST" autocomplete="off">
                <div class="input-box">
                    <span class="icon"><i class="fa-solid fa-user"></i></span>
                    <input type="text" class="username" name="username" required>
                    <label>Username</label>
                    <span id="loginUser" class="error"></span>
                </div>
                <div class="input-box">
                    <span class="icon"><i class="fa-solid fa-lock"></i></span>
                    <input type="password" class="password" name="password" required>
                    <label>Password</label>
                    <span id="loginPass" class="error"></span>
                </div>
                <div class="remember-forgot">
                    <label>
                        <input type="checkbox"> Remember me
                    </label>
                    <a href="#" onclick="message()">Forget Password?</a>
                </div>
                <div class="role-selection">
                    <select name="usertype">
                        <option value="User" selected>User</option>
                        <option value="Admin">Admin</option>
                    </select>
                </div>
                <button type="submit" class="btn" name="login">Login</button>
                <div class="login-register">
                    <p>Don't have an account?
                        <a href="#" class="register-link">Register</a>
                    </p>
                </div>
            </form>
        </div>
        <!-- Login Form End -->

        <!-- Registration Form Start -->
        <div class="form-box register">
            <h2>Registration</h2>
            <form name="registerForm" action="#" onsubmit="return validateForm()" method="POST" autocomplete="off">
                <div class="input-box">
                    <span class="icon"><i class="fa-solid fa-user"></i></span>
                    <input type="text" id="username" class="username" name="username" required>
                    <label>Username</label>
                    <span id="user_error" class="error"></span>
                </div>
                <div class="input-box">
                    <span class="icon"><i class="fa-solid fa-envelope"></i></span>
                    <input type="email" id="email" name="email" required>
                    <label>Email</label>
                    <span id="email_error" class="error"></span>
                </div>
                <div class="input-box">
                    <span class="icon"><i class="fa-solid fa-lock"></i></span>
                    <input type="password" id="password" name="password" required>
                    <label>Password</label>
                    <span id="pass_error" class="error"></span>
                </div>
                <div class="input-box">
                    <span class="icon"><i class="fa-solid fa-lock"></i></i></span>
                    <input type="password" id="cpassword" name="cpassword" required>
                    <label>Confirm Password</label>
                    <span id="cpass_error" class="error"></span>
                </div>
                <div class=" terms remember-forgot">
                    <label>
                        <input type="checkbox" name="terms"> I agree to the terms and conditions
                    </label>
                    <span id="check_error" class="error" style="color:red;"></span>
                </div>
                <div class="role-selection">
                    <select name="usertype" id="usertype">
                        <option value="User" selected>User</option>
                        <option value="Admin">Admin</option>
                    </select>
                </div>
                <button type="submit" class="btn" name="register">Register</button>
                <div class="login-register">
                    <p>Already have an account?
                        <a href="#" class="login-link">Login</a>
                    </p>
                </div>
            </form>
        </div>
        <!-- Registration Form End -->
    </div>
</body>

</html>