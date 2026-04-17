<?php
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

// Initialize search query
$search_query = '';
$results = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $search_query = isset($_POST['search_query']) ? trim($_POST['search_query']) : '';

    // Prevent SQL injection
    $search_query = $conn->real_escape_string($search_query);

    // Search projects by title
    $sql = "SELECT * FROM jobs WHERE project_title LIKE '%$search_query%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $results[] = $row; // Store all matching rows
        }
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
    <title>Review Projects</title>
    <style>
        /* Your existing CSS styles */
        body {
      margin: 50px 0px;
      
      font-family: 'IBM Plex Sans', sans-serif;
      background-color: #1A2B47;
      color: white;
    }
        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
        }
        .card {
            background-color: #253353;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        .card h2 {
            margin: 0 0 15px;
        }
        .card p{
            margin-top: 5px ;
            margin-bottom: 16px;
            display: -webkit-box;
            -webkit-line-clamp: 2; /* Number of lines to display */
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
            line-height: 1.5;
           
        }
        .tags{
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            margin-bottom: 16px;
        }
        .tags span {
            background-color: #4ac6ff;
            padding: 5px 10px;
            border-radius: 5px;
            color: black;
        }
        button {
            background-color: #ffae00;
            color: black;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .search-bar {
            display: flex;
            align-items: center;
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            margin-top: 8%;
            height: 50px;
            width: 700px;
            padding: 8px 16px;
            margin-bottom: 2%;
        }
        .search-bar input[type="text"] {
            border: none;
            padding: 10px 15px;
            width: calc(100% - 90px);
            font-size: 18px;
            font-weight: bold;
            outline: none;
            color: #333;
        }
        .search-bar button {
            background-color:  #ffae00;
            border: none;
            padding: 0 20px;
            color: white;
            cursor: pointer;
            outline: none;
            transition: background-color 0.3s ease;
            height: 100%;
        }
        .search-bar button:hover {
            background-color: #FFA500;
        }
        .card1{
            display: flex;
            justify-content: space-between;
            align-items: first baseline;
        }
        li{
            list-style:none; 
            display: flex;
            align-items:center; 
            width:max-content;
            color: black;
            background-color: white;
            padding: 0px 8px;
            border-radius: 8px;
            height: 35px; 
        }
        .card{
            transition: transform 0.5s ease-in-out;
        }
        .card:hover{
            transform :scale(1.05);
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
<link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
<header>
    <div class="logo"><i>.Freelance</i></div>
    <nav>
      <a href="hero.php">Home</a>
      <a href="posts.php">Find Work</a>
      <a href="profile.php">Profile</a>
      <a href="postjob1.php"><button class="cta">Post Project</button></a>
    </nav>
  </header>
        <center>
        <div class="search-bar">
        <input type="text" id="search" placeholder="Work Title, Keyword" oninput=search(this.value)>
        <button><svg xmlns="http://www.w3.org/2000/svg" height="32px" viewBox="0 -960 960 960" width="40px" fill="#FFFFFF"><path d="M80-143.33v-309.34h309.33v309.34H80ZM146.67-210h176v-176h-176v176Zm74-354 220-356 220 356h-440ZM340-630.67h201.33L440.67-793.33 340-630.67ZM867.67-48 765-150.67Q743.33-136 717.76-128q-25.58 8-53.76 8-74.33 0-125.17-50.83Q488-221.67 488-296t50.83-125.17Q589.67-472 664-472t125.17 50.83Q840-370.33 840-296q0 27.33-7.35 51.83-7.34 24.5-20.98 45.5L915-95.33 867.67-48ZM664.06-186.67q45.94 0 77.61-31.72 31.66-31.72 31.66-77.67 0-45.94-31.72-77.61-31.72-31.66-77.67-31.66-45.94 0-77.61 31.72-31.66 31.72-31.66 77.67 0 45.94 31.72 77.61 31.72 31.66 77.67 31.66ZM322.67-386Zm118-244.67Z"/></svg></button>
        </div>
        </center>
    
        <div id="results"></div>
<script>
  $(document).ready(function () {
            function fetchProjects(query = "") {
                $.ajax({
                    url: "searchingresults.php",
                    method: "POST",
                    data: { query: query },
                    success: function (data) {
                        $("#results").html(data);
                    }
                });
            }

            $("#search").on("input", function () {
                let searchText = $(this).val();
                fetchProjects(searchText);
            });

            fetchProjects(); // Load all projects initially
        });

    </script>
</body>
</html>
