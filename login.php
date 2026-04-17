<?php
include 'config.php';




if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = $conn->query("SELECT * FROM users WHERE email='$email'");
    $user = $result->fetch_assoc();

    if ($user && password_verify($password, $user['password'])) {
        session_start();
        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['username'] = $user['username'];

        

        // Redirect after successful login
        header("Location: hero.php");
        exit;
    } else {
        echo "<script>alert('Invalid login');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        /* Reset default browser styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box; 
        }

        /* Body styling */
        body {
            margin: 0;
            font-family: 'IBM Plex Sans', sans-serif; 
            display: flex; 
            justify-content: center; 
            align-items: center; 
            height: 100vh; 
            background-color: #f4f4f4; 
            text-align: center; 
        }

        /* Container for the entire layout */
        .container {
            display: flex;
            width: 100%; 
            height: 100%; 
            max-width: 100%; 
            background-color: white; 
        }

        /* Styling for the left section */
        .left-section {
            flex: 1; 
            background-color: #00214d;
            color: white;
            padding: 2px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            max-width: 35%; 
        }

        /* Styling for the left section's heading */
        .left-section h1 {
            font-size: 36px;
            margin-bottom: 20px;
            color: #00d1b2; 
        }

        /* Styling for the left section's image */
        .left-section img {
            max-width: 100%;
            height: auto;
        }

        /* Styling for the left section's paragraph */
        .left-section p {
            margin-top: 20px;
            font-size: 18px; 
            text-align: center; 
        }

        /* Styling for the right section */
        .right-section {
            flex: 1; 
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center; 
        }

        /* Styling for the right section's heading */
        .right-section h2 {
            font-size: 24px;
            margin-bottom: 5px; 
        }

        /* Styling for the right section's paragraph */
        .right-section p {
            font-size: 17px; 
            margin-top: 10px; 
        }

        /* Styling for each form group (e.g., email, password) */
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
            padding: 0px 185px; 
            margin-top: 15px; 
        }

        /* Styling for form input fields */
        .form-group input {
            width: 440px; 
            height: 45px;
            padding: 10px 10px;
            border: 1px solid #ccc;
            border-radius: 10px; 
        }

        /* Styling for the submit button */
        .btn {
            background-color: #00214d;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            width: 55%; 
            font-size: 16px;
            margin-top: 20px;
            height: 45px; 
        }

        /* Hover effect for the submit button */
        .btn:hover {
            background-color: #004080; 
        }

        /* Styling for the signup link */
        .signup-link {
            text-align: center;
            margin-top: 0px;
            font-size: 14px; 
        }

        /* Styling for the signup link's anchor tag */
        .signup-link a {
            color: #00214d;
            text-decoration: none; 
        }

        /* Hover effect for the signup link */
        .signup-link a:hover {
            text-decoration: underline; 
        }
    </style>
</head>
<body>
    <div class="container"> 
        <div class="left-section"> 
            <h1 style="font-size: 50px; letter-spacing:5px;"><i>.Freelance</i></h1> 
            <img src="login.png" alt="Partnership Illustration" width="350" height="700"> 
            <p style="font-size: 25px; letter-spacing:2px; "><b>Partnership for Your Growth</b></p>
        </div>

        <div class="right-section"> 
            <h2>WELCOME BACK EXCLUSIVE MEMBER</h2>
            <p>LOG IN TO CONTINUE</p>
            <form action="login.php" method="POST">
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="text" name="email" placeholder="E-mail" required> 
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" placeholder="Password" required> 
                </div>
                <button type="submit" class="btn" name="login">Proceed to my Account</button> 
                <div class="signup-link">
                    <b><p style="font-size: 15px;">Don’t have an account? <a href="signinpage.php">Sign in</a></p></b>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
