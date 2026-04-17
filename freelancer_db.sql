-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2026 at 02:42 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

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
(31, 13, 33, 'freelancer 1', 'freelancer1@gmail.com', 25000.00, '0', 'freelancer1.pdf', 'https://freelance-128.webflow.io/', '2026-04-17 12:40:34');

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
(13, 32, 'Logo and Brand Identity Design for Local Cafe', 'We are launching a new local cafe and are in need of a creative and experienced designer to help us build a complete brand identity from the ground up. The design should capture the cozy, welcoming, and community-driven vibe of the cafe, while also standing out with a modern and professional aesthetic.\r\n\r\nThe core objective is to design a logo that reflects the personality and warmth of the cafe, accompanied by a cohesive visual identity. This includes defining the brand\'s color palette, typography guidelines, and creating essential branding materials such as business cards and letterheads.\r\n\r\nThe branding will be used across various platforms including signage, packaging, social media, and digital marketing materials. The visual identity should feel friendly and approachable but also clean and versatile for long-term use.\r\n\r\nKey Responsibilities:\r\nDesign a unique and memorable logo that represents the cafe’s ambiance and values.\r\n\r\nCreate a color palette that aligns with the mood and style of the cafe.\r\n\r\nDevelop typography guidelines that pair well with the brand’s tone and visuals.\r\n\r\nDesign business cards, letterheads, and other basic brand collateral.\r\n\r\nDeliver all assets in high-resolution and editable formats.\r\n\r\nIdeal Skills:\r\nExperience in logo and brand identity design\r\n\r\nStrong portfolio showcasing branding projects\r\n\r\nExpertise in Adobe Illustrator and Photoshop\r\n\r\nUnderstanding of color theory and typography\r\n\r\nAbility to communicate design concepts and iterate based on feedback', 'Logo Design, Adobe Illustrator, Visual Identity, Typography, Color Theory', '20,000 – 35,000', '2–3 weeks', '2027-05-17', 'Open', '2026-04-17 12:10:45'),
(14, 32, 'E-commerce Website Development for Clothing Brand', 'We are launching a new online clothing brand and are looking for an experienced web developer to build a fully functional e-commerce website. The website should provide a smooth shopping experience with modern design and secure payment integration.\r\n\r\nThe goal is to create a responsive, user-friendly platform where customers can browse products, filter categories, add items to cart, and complete secure purchases. The design should reflect a stylish and trendy fashion identity while maintaining professional standards.\r\n\r\nThe platform must support product management, order tracking, and customer account features. The final website should be optimized for speed, SEO, and mobile devices.\r\n\r\nKey Responsibilities\r\nDevelop a responsive e-commerce website\r\nIntegrate secure payment gateways\r\nCreate product management dashboard\r\nImplement shopping cart and checkout system\r\nEnsure SEO and performance optimization\r\nIdeal Skills\r\nExperience in e-commerce development\r\nKnowledge of HTML, CSS, JavaScript, PHP or Laravel\r\nPayment gateway integration\r\nDatabase management\r\nResponsive web design', 'Web Development, E-commerce Development, PHP/Laravel, MySQL, Payment Integration', '25,000 – 45,000', '3 months', '2027-05-17', 'Open', '2026-04-17 12:19:47'),
(15, 32, 'Social Media Marketing Campaign for Startup', 'We are a newly established startup seeking a digital marketing expert to plan and execute a strategic social media campaign. The objective is to build brand awareness, increase engagement, and generate quality leads.\r\n\r\nThe campaign should include content planning, creative post design, caption writing, and audience targeting strategies. The tone should be modern, engaging, and aligned with our brand identity.\r\n\r\nPerformance tracking and analytics reporting will be required to measure campaign success.\r\n\r\nKey Responsibilities\r\nDevelop monthly content calendar\r\nDesign creative posts and ad banners\r\nManage paid advertising campaigns\r\nMonitor engagement and analytics\r\nOptimize campaigns based on performance\r\nIdeal Skills\r\nSocial media marketing experience\r\nKnowledge of Facebook & Instagram Ads\r\nContent creation skills\r\nAnalytics and reporting\r\nBrand strategy understanding', 'Digital Marketing, Social Media Management, Content Strategy, Paid Advertising', '20,000 – 35,000', '1-2 months', '2027-05-17', 'Open', '2026-04-17 12:21:22'),
(16, 32, 'Professional Video Editing for YouTube Channel', 'We are seeking a skilled video editor to edit educational YouTube content. The goal is to create engaging, high-quality videos with smooth transitions, background music, subtitles, and motion graphics.\r\n\r\nThe editor should enhance the overall viewing experience by adding visual elements that maintain audience interest while keeping the content professional.\r\n\r\nVideos will be 8–12 minutes long and require weekly editing.\r\n\r\nKey Responsibilities\r\nEdit raw footage professionally\r\nAdd background music and effects\r\nCreate engaging intro and outro\r\nAdd subtitles and basic animations\r\nDeliver high-quality HD output\r\nIdeal Skills\r\nExperience in video editing\r\nProficiency in Adobe Premiere Pro or Final Cut Pro\r\nMotion graphics knowledge\r\nAttention to detail', 'Video Editing, Adobe Premiere Pro, Motion Graphics, Audio Editing', '15,000 – 30,000', '1–2 months initial contract', '2027-05-17', 'Open', '2026-04-17 12:22:46'),
(17, 32, 'Brand Identity Design for Tech Startup', 'We are launching a technology startup and require a creative designer to build a strong brand identity. The objective is to create a modern, innovative, and professional visual identity that represents trust and growth.\r\n\r\nThis includes logo design, color palette development, typography guidelines, and basic brand materials such as business cards and social media templates.\r\n\r\nThe branding should be adaptable for both digital and print platforms.\r\n\r\nKey Responsibilities\r\nDesign unique logo concepts\r\nDevelop brand color system\r\nCreate typography guidelines\r\nDesign business cards and social media templates\r\nProvide high-resolution and editable files\r\nIdeal Skills\r\nBranding and logo design experience\r\nStrong portfolio\r\nExpertise in Adobe Illustrator & Photoshop\r\nUnderstanding of modern design trends', 'Logo Design, Branding, Adobe Illustrator, Visual Identity', '20,000 – 25,000', '2–3 weeks', '2027-05-17', 'Open', '2026-04-17 12:25:15');

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
(28, 'vsathish', 'example1@gmail.com', '123456', '2025-04-15 11:04:47'),
(32, 'client 1', 'client1@gmail.com', '$2y$10$DrtNR.In6VFOHo.VTrh1weRynMtauExiZHtGiP3XeRgPwUt03Xn3q', '2026-04-17 12:09:02'),
(33, 'freelancer1', 'freelancer1@gmail.com', '$2y$10$nuJ2NJCQYAQNWLo4lRYcau/nCXF.JPFjsWYIzp1PGIcH23tkxKfbq', '2026-04-17 12:33:18');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

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
