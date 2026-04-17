<?php
include 'config.php';

if (isset($_POST['post_job'])) {
    $user_id = $_SESSION['user_id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $skills = $_POST['skills'];
    $budget = $_POST['budget'];
    $timeline = $_POST['timeline'];
    $bid_deadline = $_POST['bid_deadline'];

    // Prepare the SQL statement
    $sql = "INSERT INTO projects (user_id, project_title, project_description, skills, budget, timeline, bid_deadline) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";

    // Prepare and bind parameters
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("issssss", $user_id, $title, $description, $skills, $budget, $timeline, $bid_deadline);

    // Execute and check success
    if ($stmt->execute()) {
        header("Location: postjob.php?status=success&message=" . urlencode("Job posted successfully!"));
        exit();
    } else {
        header("Location: postjob.php?status=error&message=" . urlencode("Error: " . $stmt->error));
        exit();
    }

    // Close statement
    $stmt->close();
}

// Close connection
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Post a Job</title>
    <script>
        // JavaScript to display popup messages
        window.onload = function () {
            const urlParams = new URLSearchParams(window.location.search);
            const status = urlParams.get('status');
            const message = urlParams.get('message');
            if (status && message) {
                alert(decodeURIComponent(message));
            }
        };
    </script>
    <style>
       
        body {
  margin: 50px 0px;
  font-family: 'IBM Plex Sans', sans-serif;
  background-color: #1A2B47;
  color: white;
}
header{
    z-index: 1000;
}
        /* Main Content */
        .main-content {
            max-width: 50;
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            padding: 0px 24px;
            
        }
        form{
            margin-left: 1%;
        }

        form h1 {
            font-size: 57px;
            font-weight: bold;
            margin-top: 75px;
            margin-bottom: 0px;
        }

        form p {
            font-size: 20px;
            margin-bottom: 30px;
            color: #d9d9d9;
        }

        .form-group{
            margin-bottom: 25px;
        }

        form label {
            display: block;
            font-size: 20px;
            
        }

        form input,
        form textarea {
            width: 700px;
            padding: 20px;
            border-radius: 5px;
            border: none;
            font-size: 20px;
            font-weight: bold;
        }

        form textarea {
            height: 220px;
            resize: none;
            line-height: 1.5;
        }

        .next-button {
            margin-left: 540px;
            background-color: #ffae00;
            border: none;
            padding: 15px 30px;
            color: #000;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
            font-weight: bold;
            display: block;
            margin-top: 35px;
            width: 200px;
        }

        .main-content img {
            width: 35%;
            margin-left: 65%;                     
            position:fixed;
            padding: 0px;
            height: 100%;
        }
    </style>
</head>
<body>
<header>

    <div class="logo"><i>.Freelance</i></div>
    <nav>
      <a href="hero.php">Home</a>
      <a href="posts.php">Find Work</a>
      <a href="profile.php">Profile</a>
      <a href="postjob1.php"><button class="cta">Post Project</button></a>
    
    </nav>
  </header>
  
    <main class="main-content">
    <img src="PROJECT.gif" alt="Project Discussion"/>
   
        <form  method="POST">
       
        <h1>Tell us what you need done</h1>
        <p>Enter the project details briefly, what you want</p>
            <div class="form-group">
                <label for="title"><h3>Project Title</h3></label>
                <input type="text" placeholder="UI/UX Design for Online Shopping" type="text" name="title" required>
            </div>
            <div class="form-group">
                <label for="description"><h3>Project Description</h3></label>
                <textarea placeholder="I'm looking for a UI/UX designer to enhance user engagement..." name="description" required></textarea>
            </div>
            <div class="form-group">
                <label for="skills"><h3>What skills are required?</h3></label>
                <input type="text" placeholder="Enter up to 5 skills" name="skills" required>
            </div>
            <div class="form-group">
                <label for="budget"><h3>What is your estimated budget?</h3></label>
                <input type="text" placeholder="Enter your budget" name="budget" required>
            </div>
            <div class="form-group">
                <label for="timeline"><h3>Project Timeline</h3></label>
                <input type="text"placeholder="Enter your timeline" name="timeline" required>
            </div>
            <div class="form-group">
                <label for="bid_deadline"><h3>Project DeadLine</h3></label>
                <input type="date" placeholder="Enter your Deadline" name="bid_deadline" required>
            </div>
            <button class="next-button" type="submit" name="post_job">Post Job</button>      
        </form>  
    </main>
    <script>
    window.onload = function () {
        const urlParams = new URLSearchParams(window.location.search);
        const status = urlParams.get('status');
        const message = urlParams.get('message');
        if (status && message) {
            alert(decodeURIComponent(message));
            // Remove parameters after showing the alert
            window.history.replaceState({}, document.title, window.location.pathname);
        }
    };
</script>

</body>
</html>
