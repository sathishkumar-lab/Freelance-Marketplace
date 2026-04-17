
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Ensure PHPMailer is installed via Composer

include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $username = $_POST['username'];

    $checkQuery = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($checkQuery);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        echo "<script>alert('Email already registered.'); window.location.href='signinpage.php';</script>";
    } else {
        $insertQuery = "INSERT INTO users (email, password, username) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($insertQuery);
        $stmt->bind_param("sss", $email, $password, $username);
        
        if ($stmt->execute()) {
            sendEmail($email);
            echo "<script>alert('Registration successful. Check your email.'); window.location.href='login.php';</script>";
    } else {
        echo "<script>alert('Error: " . $stmt->error . "');</script>";
    }
    }
}

function sendEmail($email) {
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Change to your SMTP server
        $mail->SMTPAuth = true;
        $mail->Username = 'freelancingmarketplace2@gmail.com'; // Change to your email
        $mail->Password = 'vxra plfk rkju chbu'; // Change to your email password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; // Use SSL
        $mail->Port = 465;

        //$mail->setFrom('freelancingmarketplace2@gmail.com', 'Freelance community');
        $mail->setFrom('freelancingmarketplace2@gmail.com', 'Freelance community');
        $mail->addReplyTo('freelancingmarketplace2@gmail.com');
        $mail->addAddress($email);

        $mail->isHTML(true);
        $mail->Subject = 'Welcome to Freelance community - Registration Successful!';
        $mail->Body = '
        <h2>Dear ' . htmlspecialchars($_POST['username'], ENT_QUOTES, 'UTF-8') . '!</h2>
        <p>Thank you for signing in to .freelance! We are thrilled to have you on board. 🌟<br><br>Your journey towards finding exciting freelance opportunities or talented freelancers starts here. Whether you are looking to showcase your skills or hire the best in the industry, we’re here to support you every step of the way.<br><br>If you have any feedback, questions, or face any issues, feel free to share your reviews and queries directly with us through this email: 
    <a href="mailto:freelancingmarketplace2@gmail.com">freelancingmarketplace2@gmail.com</a>.
    <br>We value your input and are here to help you! 😊<br><br>Happy freelancing!</p>
        <br><br>
        <p>Best Regards,<br>
        <strong>The Freelance Team</strong><br>
        </p>
    ';
        $mail->send();
    } catch (Exception $e) {
        echo "Email could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Freelance Community</title>
    <style>
        /* Reset default browser styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box; 
        }

        /* Basic body styling */
        body {
            font-family: Arial, sans-serif; 
            display: flex; 
            justify-content: center; 
            align-items: center; 
            min-height: 100vh; 
            background-color: #f7f7f7; 
        }

        /* Container for the entire layout */
        .container {
            display: flex;
            width: 100%; 
            height: 100vh; 
            background-color: #ffffff;
        }

        /* Styling for the left section */
        .left-section {
            flex: 1; 
            background-color: #00214d;
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 12px;
            max-width: 35%; 
        }

        /* Styling for the left section's heading */
        .left-section h1 {
            font-size: 3rem;
            margin-bottom: 20px;
        }

        /* Styling for the left section's image */
        .left-section img {
            max-width: 80%;
            height: auto;
            margin-bottom: 20px;
        }

        /* Styling for the left section's paragraph */
        .left-section p {
            font-size: 1.2rem;
            text-align: center;
        }

        /* Styling for the right section */
        .right-section {
            flex: 1; 
            background-color: #ffffff;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 40px;
        }

        /* Styling for the right section's heading */
        .right-section h2 {
            font-size: 1.8rem;
            margin-bottom: 20px;
            text-align: center;
        }

        /* Styling for the registration form */
        form {
            width: 100%;
            max-width: 400px;
            display: flex;
            flex-direction: column;
        }

        /* Styling for each form group (e.g., username, email, password) */
        .form-group {
            margin-bottom: 20px;
            text-align: center; 
        }

        /* Styling for form labels */
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            text-align: left; 
        }

        /* Styling for form input fields */
        form input {
            width: 100%; 
            height: 45px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 10px;
        }
        .terms {
            display: flex;
            align-items: center;
            justify-content:flex-start;
            margin-bottom: 15px;
        }

        .terms input {
            margin-right: 10px;
            width: 16px;
            height: 16px;
        }


        /* Styling for the submit button */
        form button {
            padding: 12px;
            font-size: 1rem;
            color: white;
            background-color: #00214d;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        /* Hover effect for the submit button */
        form button:hover {
            background-color: #004080;
        }

        /* Styling for the login link */
        .login-link {
            margin-top: 10px;
            text-align: center;
        }

        /* Styling for the login link's anchor tag */
        .login-link a {
            color: #233554;
            text-decoration: none;
            font-weight: bold;
        }

        /* Hover effect for the login link */
        .login-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container"> 
        <div class="left-section"> 
            <h1><i>.Freelance</i></h1> 
            <img src="sign in image.png" alt="Community Illustration" width="300" height="600"> 
            <p><b>Online Community For Freelancers</b></p>
        </div>
        <div class="right-section"> 
            <h2>Join & Connect the Fastest Growing</h2>
            <h2 style="margin-bottom: 0px;">Online Community</h2>
            <br><br>
            <form method="POST"> 
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" required>
                </div>
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" name="email" id="email" required> 
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" required> 
                </div>
                <div class="terms">
                    <input type="checkbox" id="terms" required>
                    <label for="terms">I agree to the <a href="terms.php" target="_blank">Terms and Conditions</a></label>
                </div>
                <button type="submit" name="signup">Sign Up</button> 
                <div class="login-link">
                    Already have an account? <a href="login.php">Log in</a> 
                </div>
            </form>
        </div>
    </div>
    <script>
        // Show toast if registration is successful
        <?php if ($registration_success): ?>
            const toast = document.getElementById('toast');
            toast.classList.add('show');
            setTimeout(() => { toast.classList.remove('show'); }, 3000);
        <?php endif; ?>
        </script>
</body>
</html>
