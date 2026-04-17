<?php
session_start();

// Database connection
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'freelancer_db';

$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if 'id' is passed in the URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $project_id = $_GET['id'];

    // Query to fetch project details
    $sql = "SELECT * FROM projects WHERE id = $project_id";
    $result = $conn->query($sql);

    // Check if the project exists
    if ($result->num_rows > 0) {
        $project = $result->fetch_assoc();
    } else {
        die("Project not found.");
    }
} else {
    die("Invalid project ID.");
}

// Handle Bid Submission
if (isset($_POST['bids'])) {
    $project_id = $_POST['project_id'];
    $bidder_id = $_SESSION['user_id'] ?? 0; // Fallback if user_id isn't set
    $name = $_POST['name'];
    $email = $_SESSION['email'] ?? $_POST['email']; // Use session email or form input
    $bid_amount = $_POST['bid_amount'];
    $location = $_POST['location'];
    $portfolio = $_POST['portfolio'];
    $resume = $_FILES['resume']['name'];

    // File upload handling
    $target_dir = "uploads/";
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0755, true); // Create uploads directory if not exists
    }
    $target_file = $target_dir . basename($resume);

    if (move_uploaded_file($_FILES["resume"]["tmp_name"], $target_file)) {
        // Insert bid into the database
        $stmt = $conn->prepare("INSERT INTO bids (project_id, bidder_id, name, email, bid_amount, location, resume, portfolio) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("iisssdss", $project_id, $bidder_id, $name, $email, $bid_amount, $location, $resume, $portfolio);

       
    } else {
        echo "Error uploading file.";
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Project Details</title>
    <style>
        
        body {
      margin: 50px 0px;
      
      font-family: 'IBM Plex Sans', sans-serif;
      background-color: #1A2B47;
      color: white;
    }
        .container {
            max-width: 90%;
            margin: 8% auto;
            padding: 20px;
            background:#f2f2f2e8;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            display: flex;
            flex-direction: row;
            color: black;
            font-weight:bolder;
            height: auto;
           
        }
    
        .left{
            display: flex;
            flex-direction: column;
            width: 55%;
            justify-content: center;
            line-height: 0;
            align-items: center;
        }
        .right{
            border-left: 5px solid black;
            padding-left:25px;  
        }
        h1 {
            color: #007BFF;
            font-size: 28px;
        }
        p {
            margin: 10px 0;
            line-height: 1.6;
        }
        .tags {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 15px;
        }
        .tags span {
            background-color: #007BFF;
            color: white;
            padding: 8px 12px;
            border-radius: 5px;
            font-size: 14px;
        }
        .back-btn {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 15px;
            background-color: #ffae00;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .back-btn:hover {
            background-color:rgb(211, 138, 3);
        }
        

        .modal {
        display: none;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.5);
    }
    .modal-content {
        background-color: white;
        margin: 10% auto;
        padding: 20px;
        border-radius: 10px;
        width: 40%;
        position: relative;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }
    .modal label{
        color: black;
    }
    
  
    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
        cursor: pointer;
    }
    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }

    .form-container {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            padding: 20px;
            width: 45%;
            height: 450px;
            overflow-y: auto;
        }

        .form-container h2 {
            margin-bottom: 20px;
            text-align: center;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .form-group input {
            width: 95%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 20px;
        }

        .form-group input[type="submit"] {
            background-color: #ffae00;
            color:rgb(0, 0, 0);
            border: none;
            cursor: pointer;
            font-weight: bold;
            width: 100%;
        }

        .form-group input[type="submit"]:hover {
            background-color: rgb(211, 138, 3);
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
  <div id="cards">
    <div class="container">

    
        <div class="left">
        <h2><strong>₹<?php echo htmlspecialchars($project['budget']); ?></strong> </h2>
        
        <h2><strong><?php echo htmlspecialchars($project['timeline']); ?></strong> </h2>
        <a href="" class="back-btn" style="padding: 20px 12px;"><strong>Bid now</strong></a>
    </div>
    <div class="right">
        <h1><?php echo htmlspecialchars($project['project_title']); ?></h1>
        <p><strong>Description:<br></strong> <?php echo nl2br(htmlspecialchars($project['project_description'])); ?></p>
        
        <p><strong>Skills Required:</strong></p>
        <div class="tags">
            <?php
            $skills = explode(',', $project['skills']);
            foreach ($skills as $skill) {
                echo '<span>' . htmlspecialchars(trim($skill)) . '</span>';
            }
            ?>
        </div>
        <a href="posts.php" class="back-btn"><strong>Back to Projects</strong></a>
        </div>
    </div>
        </div>
 
    <!-- Modal for Bid Form -->
<div id="bidModal" class="modal">
    <div class="modal-content">
        <h2 style="color: black; " ><b><center>Bid for Project</center></b></h2>
        <form method="POST" enctype="multipart/form-data">
            <?php echo $_GET['project_id']; ?>
            <div class="form-group">
                <label for="name">Name<span style="color: red;">*</span></label>
                <input type="text" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">E-mail<span style="color: red;">*</span></label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="bid_amount">Bid Amount (₹)<span style="color: red;">*</span></label>
                <input type="text" name="bid_amount" required>
            </div>
            <div class="form-group">
                <label for="location">Location<span style="color: red;">*</span></label>
                <input type="text" name="location" required>
            </div>
            <div class="form-group">
                <label for="resume">Resume<span style="color: red;">*</span></label>
                <input type="file" name="resume" required>
            </div>
            <div class="form-group">
                <label for="portfolio">Portfolio</label>
                <input type="text" name="portfolio" name="portfolio">
            </div>
            <div class="form-group">
            <button type="submit" name="bid">Place Bid</button>
            </div>
        </form>
    </div>
</div>

<script>
    // Get modal element
    const modal = document.getElementById('bidModal');
    const bidButton = document.querySelector('.back-btn'); // "Bid Now" button
    const closeModal = document.querySelector('.close'); // Close button

    // Open modal
    bidButton.addEventListener('click', (e) => {
        e.preventDefault();
        modal.style.display = 'block';
    });

    // Close modal
    closeModal.addEventListener('click', () => {
        modal.style.display = 'none';
    });

    // Close modal on outside click
    window.addEventListener('click', (event) => {
        if (event.target === modal) {
            modal.style.display = 'none';
        }
    });


</script>

</body>
</html>
