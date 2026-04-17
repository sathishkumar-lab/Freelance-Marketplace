<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles.css">
  <title>Freelance Landing Page</title>
  <style>
    /* General Styles */
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background-color: #162447;
      color: #fff;
    }
    .logo {
      font-size: 1.5rem;
      color: #00a99d;
      font-weight: bold;
    }

    .nav-links {
      list-style: none;
      display: flex;
      gap: 1rem;
    }

    .nav-links li a {
      text-decoration: none;
      color: #000;
      padding: 0.5rem 1rem;
      border-radius: 5px;
      font-weight: bold;
    }

    .btn-primary {
      background-color: #ffae00;
      color: #000;
    }

    /* Hero Section Styles */
    .hero-section {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 60px;
      
    }

    .hero-text {
      max-width: 50%;
      margin-top: 50px;
    }

    .hero-text h1 {
      font-size: 70px;
      margin-bottom: 1rem;
    }

    .hero-text p {
      margin-bottom: 2rem;
      font-size: 1.2rem;
    }

    .btn-cta {
      text-decoration: none;
      padding: 0.75rem 1.5rem;
      background-color: #ffae00;
      color: #000;
      border-radius: 5px;
      font-weight: bold;
    }

    .hero-image {
      max-width: fit-content;
      
    }

    .hero-image img {
      width: 100%;
      max-width: 500px;
      height: 400px;
      margin-top: 90px;
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
  
  <main class="hero-section">
    <div class="hero-text">
      <h1 >Post a <span style="color: #36A8F0;">job today, </span><br> <span style="color: #36A8F0;">hire</span> tomorrow</h1>
      <p>Connect with talent that gets you, and hire them to take your business to the next level.</p>
      <a href="postjob.php" class="btn-cta">Get Started</a>
    </div>
    <div class="hero-image">
      <img src="rocket.png" alt="Rocket Illustration">
    </div>
  </main>
</body>
</html>
