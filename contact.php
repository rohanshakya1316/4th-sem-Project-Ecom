<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link
        href="https://fonts.googleapis.com/css2?family=Jost:wght@300;400;500;700&family=Poppins:wght@200;300;400;600&family=Quicksand:wght@300;400;500;600;700&family=Urbanist:wght@300;400;600;700;800;900&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="style.css">
    <title>Contact</title>
</head>

<body>
    <?php include "navBar.php"; ?>
    <section id="contactInfo" class="section-contact">
        <div class="container">
            <h2 class="section-common--heading">Contact Us</h2>
            <p class="section-common--subheading">
                Get in touch with us. We are always here to help you.
            </p>
        </div>

        <div class="container grid grid-two--cols">
            <div class="contact-content">
                <form action="#" method="POST" autocomplete="off">
                    <div class="grid grid-two-cols mb-3">
                        <div>
                            <label for="username">full name</label>
                            <input type="text" name="username" id="username" required autocomplete="off"
                                placeholder="enter full name" />
                            <span style="color:red; font-size: 16px;"><?php echo $errors['user_error'] ?? ''; ?></span>
                        </div>
                        <div>
                            <label for="email">email address</label>
                            <input type="email" name="email" id="email" required autocomplete="off"
                                placeholder="Yourmail@example.com" />
                            <span style="color:red; font-size: 16px;"><?php echo $errors['email_error'] ?? ''; ?></span>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="subject">subject</label>
                        <input type="text" name="subject" id="subject" required autocomplete="off"
                            placeholder="Message Title" />
                    </div>

                    <div class="mb-3">
                        <label for="message">message</label>
                        <textarea name="message" id="message " cols="30" rows="10"
                            placeholder="Ready to help you out anytime."></textarea>
                    </div>

                    <div class="mt-3">
                        <button type="submit" class="btn contact-btn" name="sendMessage">
                            send message
                        </button>
                    </div>
                </form>
            </div>
            <div class="contact-map">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3533.278239506871!2d85.27866572514661!3d27.677794026794913!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb180d0a41d1a9%3A0xc17acb16bf39ea71!2sShahid%20Smarak%20College%2C%20Kirtipur%20Rd%2017%2C%20Kirtipur%2044618!5e0!3m2!1sen!2snp!4v1739809027115!5m2!1sen!2snp"
                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </section>
    <?php include "footer.php"; ?>

</body>

</html>
<?php


include "dbconfig.php";



// $userId = $_SESSION['user_id'];
if (isset($_POST['sendMessage'])) {

    if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] !== true) {
        echo "<script>alert('Login Required to send the message'); </script>";
        echo '<meta http-equiv = "refresh" content = "0; url = index.php"/>';
        // header("location: index.php");
    } else {
        
        $userId = $_SESSION['user_id'];
        
        $fullname = $_POST['username'];
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];

        $errors = [];
        
        // Regular Expressions
        $fullnameRegex = "/^[A-Za-z]{3,16}( [A-Za-z]{3,16}){0,3}$/";
        $emailRegex = "/^[A-Za-z0-9]+(?:[.%_+][A-Za-z0-9]+)*@[A-Za-z0-9]+\.[A-Za-z]{2,}$/";
        
        
        // Fullname validation
        if (empty($fullname)) {
            $errors['user_error'] = "Name cannot be empty!";
        } elseif (!preg_match($fullnameRegex, $fullname)) {
            $errors['user_error'] = "Name Invalid!";
        }
        
        // Email validation
        if (!preg_match($emailRegex, $email)) {
            $errors['email_error'] = "Invalid Email! Enter a valid email address.";
        }
        
        if (empty($errors)) {
            $sql = "INSERT INTO `contactus`(`fullname`, `email`, `subject`, `message`) VALUES ('$fullname','$email','$subject','$message')";
            $result = $conn->query($sql);
            if ($result == true) {
                echo "<script>alert('Thank you for contacting us. We will respond to your message soon.')</script>";
                echo '<meta http-equiv = "refresh" content = "0; url = index.php"/>';
                exit();
            } else {
                echo "<script>alert('Error!, Failed to send message. Try again!');</script>";
            }
        }
    }
}
?>