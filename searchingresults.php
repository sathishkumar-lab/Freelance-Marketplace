<?php
// Database connection
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'freelancer_db';

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$query = isset($_POST['query']) ? trim($_POST['query']) : '';

$sql = "SELECT * FROM projects WHERE project_title LIKE ? AND bid_deadline>=CURDATE()";
$stmt = $conn->prepare($sql);
$search = "%$query%";
$stmt->bind_param("s", $search);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<div class="container">';
        echo '<div class="card">';
        echo '<div class="card1">';
        echo '<b><h2>' . htmlspecialchars($row['project_title']) . '</h2></b>';
        echo '<ol>';
        echo '<li>';
        echo '<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000">';
            echo '<path d="m612-292 56-56-148-148v-184h-80v216l172 172ZM480-80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-400Zm0 320q133 0 226.5-93.5T800-480q0-133-93.5-226.5T480-800q-133 0-226.5 93.5T160-480q0 133 93.5 226.5T480-160Z"/>';
            echo '</svg>';
        echo '<b><h3>&nbsp;' . htmlspecialchars($row['bid_deadline']) . '</h3></b>';
        echo '</li>';
        echo '</ol>';
        echo '</div>';
        echo '<b><h2 style="color: skyblue;">₹' . htmlspecialchars($row['budget']) . '</h2></b>';
        echo '<b><p>' . htmlspecialchars($row['project_description']) . '</p></b>';
        
        echo '<div class="tags">';
        $skills = explode(',', $row['skills']);
        foreach ($skills as $skill) {
            echo '<span>' . htmlspecialchars(trim($skill)) . '</span>';
        }
        echo '</div>';
        
        echo '<a href="jobdetails.php?id=' . $row['id'] . '"><button>View Details</button></a>';
        echo '</div>';
        echo '</div>';
    }
} else {
    
    echo '<p><b><center> No projects found.</center></b></p>';
}

$stmt->close();
$conn->close();
?>