<?php
include 'config.php';


if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Fetch user-posted projects
$projects_sql = "SELECT * FROM projects WHERE user_id = ?";
$projects_stmt = $conn->prepare($projects_sql);
$projects_stmt->bind_param("i", $user_id);
$projects_stmt->execute();
$projects_result = $projects_stmt->get_result();

// Fetch user-applied jobs
$applied_sql = "SELECT p.* FROM projects p JOIN bids b ON p.id = b.project_id WHERE b.user_id = ?";
$applied_stmt = $conn->prepare($projects_sql);
$applied_stmt->bind_param("i", $user_id);
$applied_stmt->execute();
$applied_result = $applied_stmt->get_result();

// Fetch projects posted by the user
$sql = "SELECT * FROM projects WHERE user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$projects = $stmt->get_result();
?>


<!DOCTYPE html>
<html>
<head>
    <title>User Profile</title>
    <link rel="stylesheet" href="styles.css">
    <style>
    body {
        font-family: 'IBM Plex Sans', sans-serif;
        background-color: #F4F7FC;
        background-color: #1A2B47;
        margin-top: 8%;
        padding: 1%;
    }        
       table {
    width: 100%;
    border-collapse: collapse;
    border-radius: 10px;
    overflow: hidden;
    background: white;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border: 1px solid #ddd;
}
        th, td {
            padding: 14px 18px;
            text-align: left;
            color: #333;
            border-bottom: 1px solid #ddd;
        }
        th {
            font-weight: bold;
            text-transform: uppercase;
        }
        tr:hover {
            background: #36A8F0;
            transition: 0.2s ease-in-out;
        }
        .details {
            display: none;
            margin-top: 10px;
            padding: 10px;
            border: 1px solid #ccc;
            background-color: #f9f9f9;
            line-height:1.5;
        }
        
    </style>
    <script>
        function toggleDetails(id) {
            const details = document.getElementById('details-' + id);
            details.style.display = details.style.display === 'none' ? 'block' : 'none';
        }
    </script>
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
    <h1 style="color: #36A8F0">Your Projects Bids</h1>

    <?php if ($projects_result->num_rows > 0): ?>
        <?php while ($project = $projects_result->fetch_assoc()): ?>
            

            <?php
            $project_id = $project['id'];
            $bids_sql = "SELECT * FROM bids WHERE project_id = ?";
            $bids_stmt = $conn->prepare($bids_sql);
            $bids_stmt->bind_param("i", $project_id);
            $bids_stmt->execute();
            $bids_result = $bids_stmt->get_result();
            $total_bids = $bids_result->num_rows;
?>
 <h2 style="color: #ffae00">Project: <?php echo htmlspecialchars($project['project_title']); ?> </h2> <h2 style="color: #36A8F0;">Total Bids: <?php echo $total_bids; ?></h2>
            

            <?php if ($bids_result->num_rows > 0): ?>
                <table>
                    <tr>
                        <th>FREELANCER NAME</th>
                        <th>E-Mail</th>
                        <th>BID AMOUNT (₹)</th>
                        <th>RESUME</th>
                        <th>PORTFOLIO</th>
                    </tr>
                    <?php while ($bid = $bids_result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($bid['name']); ?></td>
                            <td><?php echo htmlspecialchars($bid['email']); ?></td>
                            <td><?php echo htmlspecialchars($bid['bid_amount']); ?></td>
                            <td><a href="view_resume.php?file=<?php echo urlencode($bid['resume']); ?>" target="_blank">View Resume</a>
                            </td>
                            <td><a href="<?php echo htmlspecialchars($bid['portfolio']); ?>" target="_blank">View Portfolio</a></td>
                        </tr>
                    <?php endwhile; ?>
                </table>
            <?php else: ?>
                <p>No bids for this project yet.</p>
            <?php endif; ?>

        <?php endwhile; ?>
    <?php else: ?>
        <p>No projects posted yet.</p>
    <?php endif; ?>

    <h1 style="color: #36A8F0">Your Posted Project</h1>
    <?php if ($applied_result->num_rows > 0): ?>
        <table>
            <tr>
                <th>Title</th>
                <th>Budget (₹)</th>
                <th>Action</th>
            </tr>
            <?php while ($job = $applied_result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($job['project_title']); ?></td>
                    <td><?php echo htmlspecialchars($job['budget']); ?></td>
                    <td><button onclick="toggleDetails(<?php echo $job['id']; ?>)">View Full Details</button></td>
                </tr>
                <tr>
                    <td colspan="3">
                        <div id="details-<?php echo $job['id']; ?>" class="details" >
                            <strong>DESCRIPTION:</strong> <?php echo nl2br(htmlspecialchars($job['project_description'])); ?><br><br>
                            <strong>DEADLINE:</strong> <?php echo htmlspecialchars($job['bid_deadline']); ?><br><br>
                            <strong>SKILLS REQUIRED:</strong> <?php echo htmlspecialchars($job['skills']); ?>
                        </div>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
    <?php else: ?>
        <p>No jobs applied yet.</p>
    <?php endif; ?>
    

</body>
</html>