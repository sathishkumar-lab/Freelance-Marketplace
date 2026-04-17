<?php
include 'config.php';
$registration_success = false;

if (isset($_POST['signup'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
    if ($conn->query($sql) === TRUE) {
        $registration_success = true;
    } else {
        echo "Error: " . $conn->error;
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
