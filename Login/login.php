<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Registration</title>
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
    />
    <link
    <link
    href="https://fonts.googleapis.com/css2?family=Jost:wght@300;400;500;700&family=Poppins:wght@200;300;400;600&family=Quicksand:wght@300;400;500;600;700&family=Urbanist:wght@300;400;600;700;800;900&display=swap"
    rel="stylesheet"
  />
  <link rel="stylesheet" href="login.css">
    <script src="login.js" defer></script>
</head>
<body class="mainContainer">
    <div class="wrapper container">
        <span class="icon-close">
            <i class="fa-solid fa-xmark"></i>
        </span>

        <!-- Login Form Start -->
        <div class="form-box login">
            <h2>Login</h2>
            <form action="#">
                <div class="input-box">
                    <span class="icon"><i class="fa-solid fa-envelope"></i></span>
                    <input type="email" required> 
                    <label>Email</label>
                </div>
                <div class="input-box">
                    <span class="icon"><i class="fa-solid fa-lock"></i></span>
                    <input type="password" required> 
                    <label>Password</label>
                </div>
                <div class="remember-forgot">
                    <label>
                        <input type="checkbox"> Remember me 
                    </label>
                    <a href="#">Forget Password?</a>
                </div>
                <button type="submit" class="btn">Login</button>
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
            <form action="#">
                <div class="input-box">
                    <span class="icon"><i class="fa-solid fa-user"></i></span>
                    <input type="text" name="user" required> 
                    <label>Username</label>
                </div>    
                <div class="input-box">
                    <span class="icon"><i class="fa-solid fa-envelope"></i></span>
                    <input type="email" name="email" required> 
                    <label>Email</label>
                </div>
                <div class="input-box">
                    <span class="icon"><i class="fa-solid fa-lock"></i></span>
                    <input type="password" name="password" required> 
                    <label>Password</label>
                </div>
                <div class="input-box">
                    <span class="icon"><i class="fa-solid fa-lock"></i></i></span>
                    <input type="password" name="password" required> 
                    <label>Confirm Password</label>
                </div>
                <div class="remember-forgot">
                    <label>
                        <input type="checkbox"> I agree to the terms and conditions
                    </label>
                </div>
                <button type="submit" class="btn">Register</button>
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
