-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2025 at 12:48 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `freelancer_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `bids`
--

CREATE TABLE `bids` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `bidder_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `bid_amount` decimal(10,2) NOT NULL,
  `location` varchar(255) NOT NULL,
  `resume` varchar(255) DEFAULT NULL,
  `portfolio` varchar(255) DEFAULT NULL,
  `bid_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bids`
--

INSERT INTO `bids` (`id`, `project_id`, `bidder_id`, `name`, `email`, `bid_amount`, `location`, `resume`, `portfolio`, `bid_date`) VALUES
(13, 1, 5, 'Sathish Kumar V', 'SathishKumar@gmail.com', 25000.00, '0', 'sathishkumar.pdf', 'https://www.bangmedia.com.au/work?tab=service&service=All', '2025-02-25 09:33:47'),
(16, 3, 1, 'Ganeshkumar S', 'ganeshkumar@gmail.com', 20000.00, '0', 'ganeshkumar.pdf', 'https://www.kyliemalcolm.com/website-design', '2025-02-26 23:30:08'),
(17, 2, 8, 'Deva Prakash', 'devanshprakash@gmail.com', 18000.00, '0', 'deva.pdf', 'https://www.devanshprakash.com/', '2025-02-26 23:44:34'),
(18, 7, 1, 'suriya A', 'suriya@gmail.com', 10000.00, '0', 'sk.pdf', 'https://www.rayraylab.com/', '2025-02-27 00:20:15'),
(19, 1, 1, 'sainath', 'sainath12@gmail.com', 23452.00, '0', 'sai.pdf', 'https://dstanimirov.com/', '2025-03-02 23:10:08'),
(20, 1, 1, 'Rajavelan A', 'rajavelan5678@gmail.com', 23452.00, '0', 'raja.pdf', 'https://www.lonzovisuals.com/404', '2025-04-01 04:35:55'),
(21, 2, 1, 'varun vishal', 'markariani@gmail.com', 19500.00, '0', 'varun.pdf', 'https://markariani.com/', '2025-04-01 04:37:14');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `project_title` varchar(255) NOT NULL,
  `project_description` text NOT NULL,
  `skills` varchar(255) NOT NULL,
  `budget` varchar(100) NOT NULL,
  `timeline` varchar(100) NOT NULL,
  `bid_deadline` date NOT NULL,
  `status` varchar(50) DEFAULT 'Open',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `user_id`, `project_title`, `project_description`, `skills`, `budget`, `timeline`, `bid_deadline`, `status`, `created_at`) VALUES
(1, 1, 'Logo and Brand Identity Design for Local Cafe', 'I’m looking for a creative logo and complete brand identity for a new local cafe. The logo should be modern and fresh, capturing the cozy and 	welcoming vibe of the cafe. Along with the logo, you will create branding materials like a color palette, typography guidelines, and a business card 	design.\r\n\r\nKey Responsibilities:\r\n\r\n1. Design a logo that represents the cafe\'s unique atmosphere and values.\r\n2. Create a color scheme and typography style that matches the brand’s personality.\r\n3. Develop business card designs, letterheads, and other basic branding materials.\r\n\r\nIdeal Skills:\r\n\r\n1. Experience in logo and brand identity design.\r\n2. Strong portfolio showcasing branding projects.\r\n3. Ability to communicate design concepts effectively.\r\n4.Your designs should reflect the friendly and inviting nature of the cafe, while maintaining a professional touch.', 'Adobe Illustrator / Photoshop, Logo Design, Visual Identity Design, Typography, Color Theory', '20,000 - 35,000', '2-3 weeks', '2025-02-26', 'Open', '2025-02-24 04:40:54'),
(2, 5, 'WordPress Website for Portfolio', 'I need a WordPress developer to create a portfolio website that showcases my work as a photographer. The website should be visually appealing, easy 	to navigate, and feature a gallery for showcasing my photos. It should also include an about section, contact form, and a blog.\r\n\r\nKey Responsibilities:\r\n	\r\n1. Build a custom WordPress theme or customize an existing theme to meet the design needs.\r\n2. Create a gallery that allows easy uploading and display of high-quality images.\r\n3. Ensure the website is responsive and optimized for both desktop and mobile.\r\n\r\nIdeal Skills:\r\n\r\n1. Experience with WordPress theme development or customization.\r\n2. Proficiency in HTML, CSS, and basic PHP.\r\n3. Knowledge of SEO best practices for WordPress.\r\n4. The website should be clean, professional, and visually showcase my photography in the best possible way.\r\n', 'WordPress Development, HTML, CSS, PHP, Responsive , Web Design, SEO for WordPress', ' 15,000-25,000', '2-3 weeks', '2025-02-28', 'Open', '2025-02-25 10:00:08'),
(3, 5, ' E-commerce Website for Small Business', 'We are seeking an experienced web developer to create an e-commerce website for a small online store. The site should have a smooth shopping 	experience, secure payment gateway integration, product catalog, and an easy-to-use admin panel to manage orders.\r\n\r\nKey Responsibilities:\r\n\r\n1. Set up an online store using platforms like WooCommerce or Shopify.\r\n2. Integrate secure payment gateways and ensure the checkout process is smooth.\r\n3. Design product pages with product details, pricing, and images.\r\n4. Ensure the website is mobile-friendly and fully responsive.\r\n\r\nIdeal Skills:\r\n\r\n1. Experience in setting up e-commerce websites (WooCommerce, Shopify, etc.).\r\n2. Proficiency in HTML/CSS and JavaScript.\r\n3. Knowledge of secure payment integrations.\r\n4. The website must be functional and user-friendly, providing customers with a smooth online shopping experience.', 'HTML / CSS, JavaScript, Payment Gateway Integration, Responsive Web Design, SEO, User Experience (UX)', ' 35,000 - 50,000', '4-5 weeks', '2025-03-08', 'Open', '2025-02-25 10:10:27');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `created_at`) VALUES
(1, 'vsathish', 'vsathish@gmail.com', '$2y$10$auPxlNFG9PhtgT.t5rNduOtTtmrwkozz30xlkeARYccl8QCLWadJ2', '2025-02-24 03:48:07'),
(5, 'karthi', 'karthi@gmail.com', '$2y$10$HTNfyXJoS0.SIhjnowAJPO/djnoq7evHaxlh5aoTcsbFapM7bGXjq', '2025-02-24 05:14:02'),
(15, 'karthi', 'skarthikn19@gmail.com', '$2y$10$oPm14lvNohE17bGREX4piOFG1CCr6mOlKbxJSRWlNIIkThI784qru', '2025-04-01 03:09:09'),
(22, 'Sathish Kumar', 'vsathishsk183@gmail.com', '$2y$10$s/QHvxMW5HOM0vJVH4ijDu8nOKc.ZF.PptPjwdNJV1sd2mERD847.', '2025-04-07 10:43:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bids`
--
ALTER TABLE `bids`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bids`
--
ALTER TABLE `bids`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
