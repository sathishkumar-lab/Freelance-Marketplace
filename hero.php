<?php
include 'config.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles.css">
  <title>Freelance Landing Page</title>
  <style>
    body {
      margin: 50px 0px;
      font-family: 'IBM Plex Sans', sans-serif;
      background-color: #1A2B47;
      color: white;
    }
    .hero {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 50px;
      background-color: #1A2B47;
      color: white;
    }

    .hero .text {
      max-width: 50%;
    }

    .hero .text h1 {
      margin: 0;
      color: #36A8F0;
    }

    .hero .text h3 {
      margin: 20px 0;
      line-height: 1.5;
    }

    .hero .text .btn {
      background-color: #ffae00;
      color: black;
      padding: 15px 30px;
      border: none;
      border-radius: 5px;
      font-size: 16px;
      font-weight: bold;
      cursor: pointer;
    }

    .hero .image {
      max-width: 40%;
    }

    .services {
      padding: 50px;
      background-color: white;
      color: black;
      text-align: center;
    }

    .services h2 {
      font-size: 32px;
      margin-bottom: 20px;
    }
    

    .services .service-list {
      display: flex;
      justify-content: center;
      gap: 20px;
    }

    .services .service {
      flex: 1;
      padding: 20px;
      background-color: #ddd;
      border-radius: 10px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      overflow: hidden;
      cursor: pointer;
      transition: transform 0.3s ease;
    }
    .services .img{
      width: 100%;
      height: 100%;
      object-fit: cover;
      filter: brightness(0.7);
      transition: filter 0.3s ease;
    }
    .service span {
      position: absolute;
      bottom: 10px;
      left: 50%;
      transform: translateX(-50%);
      font-size: 24px;
      font-weight: bold;
      color:white;
      width:100%;
      opacity: 0;
      transition: opacity 0.3s ease, transform 0.3s ease;
      margin-bottom: 98px;
      
    }
    .hovered {
      transform: scale(1.1);
    }
    .hovered img {
      filter: brightness(1);
    }
    .hovered span {
      opacity: 1;
      transform: translateX(-50%) translateY(-10px);
    }
    .info {
      display: flex;
      align-items: center;
      justify-content: space-around;
      padding: 30px 30px 30px 0px;
      background-color: #1A2B47;
      color: white;
    }

    .info .image {
      max-width: 40%;
    }

    .info .text {
      max-width: 50%;
      
    }

    .info .text h1{
      color: #ffae00;
    
      font-size: 28px;
    }

    .info .text ul {
      list-style: none;
      padding: 0;
    }

    .info .text ul li {
      margin: 24px 0;
      display: flex;
      align-items: center;
      font-size:larger;
    }

    .info .text ul li::before {
      content: none;
      margin-right: 10px;
      color: #ffae00;
    }
    .rect{
      border-style: solid;
      border-color:  white;
      border-width: thin;
      height: 30px;
      width: fit-content;
      padding-right: 12px;
      padding-left: 6px;
      border-radius: 8px;
      display: flex;
      align-items: center;
      
    }
    a{
      text-decoration: none;
      color: black;
    }
    svg{
      padding-right: 15px;
    }
    .btn {
      background-color: #ffae00;
      color: black;
      padding: 15px 30px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-size: 18px;
      margin-top:12px;
      margin-left:28px;
      
    }
     /* Testimonial Heading */
     .testimonial-heading {
      text-align: center;
      font-size: 36px;
      font-weight: bold;
      color: #ffae00;
      text-transform: uppercase;
      margin-top: 60px;
    }
    /* Glassy Testimonial Section */
    .testimonial-wrapper {
      display: flex;
      align-items: center;
      justify-content: center;
      position: relative;
      width: 100%;
      height: 80vh;
      text-align: center;
    }
    .testimonial-container {
      width: 80%;
      max-width: 900px;
    }
    .testimonial {
      background: rgba(255, 255, 255, 0.2);
      backdrop-filter: blur(10px);
      padding: 60px;
      border-radius: 10px;
      text-align: center;
      box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
      font-size: 26px;
      color: white;
      transition: opacity 0.5s ease-in-out;
    }
    .testimonial .author {
      margin-top: 15px;
      font-weight: bold;
      color: #ffae00;
      font-size: 22px;
    }
    .stars {
      color: #ffae00;
      margin-top: 10px;
      font-size: 24px;
    }
    .nav-btn {
      background-color: rgba(255, 252, 252, 0.3);
      border: none;
      padding: 15px;
      cursor: pointer;
      font-size: 24px;
      color: white;
      border-radius: 50%;
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
    }
    .prev-btn { left: 10px; }
    .next-btn { right: 10px; }
  </style>
   
    
  </style>
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

  <section class="hero">
    <div class="text">
      <div class="rect">
      <h4>&#128075;&nbsp;Hi, <?php echo $_SESSION['username']; ?>!</h4>
      </div>
      <h1 style="font-size: 60px;">Find the perfect<br>Freelance services for<br>your business</h1>
      <h3>Work with talented people at the most affordable price to get the<br>most of your time and cost.</h3>
      <button class="btn" style="margin-left:0px;" ><a href="signinpage.php">Sign up</a></button>
    </div>
    <div class="image">
      <!-- Placeholder for Image -->
      <img src="hero1.png" alt="Creative freelancer at work" style="width: 100%; border-radius: 10px;">
    </div>
  </section>

  <section class="services">
    <h2>Most Popular Service</h2><br>
    <div class="service-list">
      <div class="service">
        <img src="web.png" alt="Creative freelancer at work" style="width: 100%; border-radius: 10px;">
        <span>Web Development</span>
      </div>
      <div class="service">
        <img src="logo.png" alt="Creative freelancer at work" style="width: 100%; border-radius: 10px;">
        <span>Logo Design</span>
      </div>
      <div class="service">
        <img src="uiux.png" alt="Creative freelancer at work" style="width: 100%; border-radius: 10px;">
        <span>UI/UX Designing</span>
      </div>
      <div class="service">
        <img src="video.png" alt="Creative freelancer at work" style="width: 100%; border-radius: 10px;">
        <span>Video Editing</span>
      </div>
    </div>
  </section>
  <script>
    // Get all service cards
    const services = document.querySelectorAll('.service');

    // Add hover effects using JavaScript
    services.forEach(card => {
      card.addEventListener('mouseenter', () => {
        card.classList.add('hovered');
      });

      card.addEventListener('mouseleave', () => {
        card.classList.remove('hovered');
      });
    });
  </script>

  <section class="info">
    <div class="image">
      <!-- Placeholder for Image -->
      <img src="heroimage2.png" alt="Freelancer at desk" style="width: 100%; border-radius: 10px;">
    </div>
    <div class="text">
      <h1 style="font-size: 60px; letter-spacing:5px; color:#ffae00; margin-bottom:12px; margin-top:8px; margin-left:28px; ">Find Your Next Freelancer</h1>
      <ul style="font-size: 20px; font-weight: 500; line-height:normal; margin-left:28px;">
        
        <li><svg xmlns="http://www.w3.org/2000/svg" height="38px" viewBox="0 -960 960 960" width="38px" fill="#FFFFFF"><path d="M280-280h84l240-238-86-86-238 238v86Zm352-266 42-44q6-6 6-14t-6-14l-56-56q-6-6-14-6t-14 6l-44 42 86 86ZM200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h168q13-36 43.5-58t68.5-22q38 0 68.5 22t43.5 58h168q33 0 56.5 23.5T840-760v560q0 33-23.5 56.5T760-120H200Zm0-80h560v-560H200v560Zm280-590q13 0 21.5-8.5T510-820q0-13-8.5-21.5T480-850q-13 0-21.5 8.5T450-820q0 13 8.5 21.5T480-790ZM200-200v-560 560Z"/></svg>No Cost to Join</li>
        <li><svg xmlns="http://www.w3.org/2000/svg" height="38px" viewBox="0 -960 960 960" width="38px" fill="#FFFFFF"><path d="M200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h560q33 0 56.5 23.5T840-760v560q0 33-23.5 56.5T760-120H200Zm0-80h560v-560H200v560Zm0-560v560-560Zm163 450 117-71 117 71-31-133 104-90-137-11-53-126-53 126-137 11 104 90-31 133Z"/></svg>Post a job and hire top talent</li>
        <li><svg xmlns="http://www.w3.org/2000/svg" height="38px" viewBox="0 -960 960 960" width="38px" fill="#FFFFFF"><path d="M480-320q48 0 85.5-28.5T620-422H340q17 45 54.5 73.5T480-320ZM380-480q25 0 42.5-17.5T440-540q0-25-17.5-42.5T380-600q-25 0-42.5 17.5T320-540q0 25 17.5 42.5T380-480Zm200 0q25 0 42.5-17.5T640-540q0-25-17.5-42.5T580-600q-25 0-42.5 17.5T520-540q0 25 17.5 42.5T580-480ZM305-704l112-145q12-16 28.5-23.5T480-880q18 0 34.5 7.5T543-849l112 145 170 57q26 8 41 29.5t15 47.5q0 12-3.5 24T866-523L756-367l4 164q1 35-23 59t-56 24q-2 0-22-3l-179-50-179 50q-5 2-11 2.5t-11 .5q-32 0-56-24t-23-59l4-165L95-523q-8-11-11.5-23T80-570q0-25 14.5-46.5T135-647l170-57Zm49 69-194 64 124 179-4 191 200-55 200 56-4-192 124-177-194-66-126-165-126 165Zm126 135Z"/></svg>Work with the best</li>
      </ul>
      <button class="btn">Get Started</button>
    </div>
  </section>
    <!-- Glassy Testimonial Section -->
    <div class="testimonial-heading">What Our Users Say</div>
  <div class="testimonial-wrapper">
    <button class="nav-btn prev-btn" onclick="changeTestimonial(-1)">&#10094;</button>
    <div class="testimonial-container">
      <div class="testimonial" id="testimonial">
        <p id="testimonial-text">"This platform has helped me connect with amazing freelancers and complete projects efficiently! The quality of work I have received is outstanding, and I highly recommend this service to anyone looking to hire top professionals. The process was smooth, and the freelancers were very skilled in their respective fields."</p>
        <div class="stars" id="testimonial-stars">★★★★★</div>
        <div class="author" id="testimonial-author">- John Doe, Startup Founder</div>
      </div>
    </div>
    <button class="nav-btn next-btn" onclick="changeTestimonial(1)">&#10095;</button>
  </div>

  <script>
    const testimonials = [
      { text: "This platform has helped me connect with amazing freelancers and complete projects efficiently! The quality of work I have received is outstanding, and I highly recommend this service to anyone looking to hire top professionals.", stars: "★★★★★", author: "- John Doe, Startup Founder" },
      { text: "Freelancers here are top-notch! The hiring process was seamless and stress-free. I was able to find the perfect candidate for my project within hours.", stars: "★★★★☆", author: "- Sarah Williams, Business Owner" },
      { text: "Great platform with excellent support! I found the perfect developer for my project, and the results were beyond my expectations.", stars: "★★★★★", author: "- Mark Smith, Entrepreneur" },
      { text: "User-friendly and reliable! I always find quality work and skilled professionals here. The entire process from posting jobs to hiring is very intuitive.", stars: "★★★★★", author: "- Emily Johnson, Project Manager" },
      { text: "Highly recommend! This platform made hiring freelancers super easy and efficient. The features and support are excellent.", stars: "★★★★★", author: "- Alex Brown, Business Consultant" },
      { text: "Best freelance platform I have used! The customer support is fantastic, and the overall experience has been incredibly positive.", stars: "★★★★★", author: "- Daniel Wilson, CEO" },
      { text: "The best sites are those from where you got them. Go to their profiles and after getting work review them. It will benefit them by increasing their clients and your wish will also be fulfilled.", stars: "★★★★☆", author: "-Abdullah Bashir, freelancer" },
      { text: "freelance marketplace is a solid choice for anyone in the freelance industry, providing a seamless connection between skilled professionals and those in need of their services. Whether you’re starting or are an experienced freelancer, freelance marketplace offers a great opportunity to grow your career and find rewarding projects.", stars :"★★★★★", author:"Antonyo, Entrepreneur"},
      { text: "Still not tired it yet, I hope it works",stars: "★★★★☆", author: "-Ann Rashad,proffessor"},
      { text: "Perfect freelancing website! I recommend everyone to get start due to the excellent opportunities which are available.",stars: "★★★★★", author: "emillie,-freelancer"},
      { test: "A very good website that can reach all ages who want to find work here it is very easy to use",stars:"★★★★★",author: "bruce wayn,freelance writer"},
      { test: "Good experience it was excellent and awesome",stars: "★★★★☆", author: "meave wills,freelancer"}
    ];
    
    let currentTestimonial = 0;
    function changeTestimonial(direction) {
      currentTestimonial += direction;
      if (currentTestimonial < 0) currentTestimonial = testimonials.length - 1;
      if (currentTestimonial >= testimonials.length) currentTestimonial = 0;
      
      document.getElementById('testimonial-text').innerText = testimonials[currentTestimonial].text;
      document.getElementById('testimonial-stars').innerText = testimonials[currentTestimonial].stars;
      document.getElementById('testimonial-author').innerText = testimonials[currentTestimonial].author;
    }
    
    setInterval(() => changeTestimonial(1), 5000);
  </script>
</body>
</html>

