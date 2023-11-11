-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2023 at 09:22 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `as_university`
--

-- --------------------------------------------------------

--
-- Table structure for table `as_banner`
--

CREATE TABLE `as_banner` (
  `ban_id` int(11) NOT NULL,
  `ban_title` varchar(200) NOT NULL,
  `ban_subtitle` text NOT NULL,
  `ban_button` varchar(30) NOT NULL,
  `ban_url` varchar(200) NOT NULL,
  `ban_image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `as_banner`
--

INSERT INTO `as_banner` (`ban_id`, `ban_title`, `ban_subtitle`, `ban_button`, `ban_url`, `ban_image`) VALUES
(1, 'Quibusdam aliquam au', 'Animi obcaecati vol', 'Culpa accusamus reru', 'https://fb.com', 'banner-1698984713-4511.JPEG'),
(2, 'Eos eum alias itaque', 'Sapiente enim elit ', 'Est aute et ut archi', 'https://fb.com', 'banner-1699028750-1794.webp');

-- --------------------------------------------------------

--
-- Table structure for table `as_blog`
--

CREATE TABLE `as_blog` (
  `blog_id` int(11) NOT NULL,
  `blog_title` varchar(200) NOT NULL,
  `blog_subtitle` varchar(500) NOT NULL,
  `blog_btn` varchar(30) NOT NULL,
  `blog_url` varchar(50) NOT NULL,
  `blog_image` varchar(50) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `as_blog`
--

INSERT INTO `as_blog` (`blog_id`, `blog_title`, `blog_subtitle`, `blog_btn`, `blog_url`, `blog_image`, `role_id`) VALUES
(1, 'Skills To Develop Your Child Memory', 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.', 'Read More', 'https://fb.com', 'blog-1699200491-4731.jpg', 2),
(2, 'Skills To Develop Your Child Memory', 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.', 'Read More', 'https://fb.com', 'blog-1699200546-4434.jpg', 1),
(3, 'Skills To Develop Your Child Memory', 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.', 'Read More', 'https://fb.com', 'blog-1699200572-3579.jpg', 2),
(4, 'Skills To Develop Your Child Memory', 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.', 'Read More', 'https://fb.com', 'blog-1699200604-1749.jpg', 1),
(5, 'Skills To Develop Your Child Memory', 'Far far away, behind the word mountains, far from the countries Vokalia.', 'Read More', 'https://fb.com', 'blog-1699200621-1807.jpg', 1),
(6, 'Skills To Develop Your Child Memory', 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.', 'Read More', 'https://fb.com', 'blog-1699200636-3492.jpg', 2),
(7, 'Aliquip similique mo', 'Ut eaque voluptatum ', 'Nostrud eius pariatu', 'Nam iste et eligendi', '', 4),
(8, 'Aliquip similique mo', 'Ut eaque voluptatum ', 'Nostrud eius pariatu', 'Nam iste et eligendi', '', 4),
(9, 'Aliquid quia volupta', 'Natus qui aut verita', 'Odio non eveniet ni', 'Vero quidem harum fa', '', 2),
(10, 'Voluptatem Quo omni', 'Praesentium qui dolo', 'Sit excepteur corru', 'Nostrum aspernatur a', '', 1),
(11, 'Voluptatem Quo omni', 'Praesentium qui dolo', 'Sit excepteur corru', 'Nostrum aspernatur a', '', 1),
(12, 'Aute facilis et elit', 'Id est quis in mole', 'Consequatur velit no', 'Aut pariatur Enim a', '', 3),
(13, 'Aute facilis et elit', 'Id est quis in mole', 'Consequatur velit no', 'Aut pariatur Enim a', '', 3),
(14, 'Aute facilis et elit', 'Id est quis in mole', 'Consequatur velit no', 'Aut pariatur Enim a', '', 3),
(15, 'Aute facilis et elit', 'Id est quis in mole', 'Consequatur velit no', 'Aut pariatur Enim a', '', 3),
(16, 'Aute facilis et elit', 'Id est quis in mole', 'Consequatur velit no', 'Aut pariatur Enim a', '', 3),
(17, 'Mollitia dolorem con', 'Atque nisi amet nul', 'Et eligendi aut quid', 'Voluptatum ut nostru', '', 1),
(18, 'Magna pariatur Dolo', 'Necessitatibus ut er', 'Molestiae sapiente m', 'Omnis quas Nam labor', '', 2),
(19, 'Veritatis ex in opti', 'Vero accusamus ut te', 'Ut reprehenderit fu', 'Esse sint culpa et ', '', 3),
(20, 'Veritatis ex in opti', 'Vero accusamus ut te', 'Ut reprehenderit fu', 'Esse sint culpa et ', '', 3),
(21, 'Veritatis ex in opti', 'Vero accusamus ut te', 'Ut reprehenderit fu', 'Esse sint culpa et ', '', 3);

-- --------------------------------------------------------

--
-- Table structure for table `as_contact`
--

CREATE TABLE `as_contact` (
  `con_id` int(11) NOT NULL,
  `con_name` varchar(50) NOT NULL,
  `con_email` varchar(50) NOT NULL,
  `con_subj` varchar(255) NOT NULL,
  `con_mess` text NOT NULL,
  `con_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `as_contact`
--

INSERT INTO `as_contact` (`con_id`, `con_name`, `con_email`, `con_subj`, `con_mess`, `con_time`) VALUES
(1, 'Iola Romero', 'locosupise@mailinator.com', 'Laboris et ea et exe', 'Quos at quas est id', '0000-00-00 00:00:00'),
(2, 'Venus Mueller', 'jacogilude@mailinator.com', 'Ullamco sed in sint ', 'xt ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', '0000-00-00 00:00:00'),
(3, 'Venus Mueller', 'jacogilude@mailinator.com', 'Ullamco sed in sint ', 'xt ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', '0000-00-00 00:00:00'),
(4, '&lt;h1&gt;Emma Mcclain&lt;/h1&gt;', 'jile@mailinator.com', 'Qui ducimus laborewerwrwerwrrr fsfdsfsd', 'Porro itaque earum ofsdfsfsfsf fsdfsfsdfsfsfdsfewer', '0000-00-00 00:00:00'),
(5, 'Uriel Noble', 'ruhy@mailinator.com', 'Voluptates excepteur', 'Vel voluptatem nece', '2023-11-02 07:02:19'),
(6, 'Uriel Noble', 'ruhy@mailinator.com', 'Voluptates excepteur', 'Vel voluptatem nece', '2023-11-02 07:05:19'),
(7, 'Uriel Noble', 'ruhy@mailinator.com', 'Voluptates excepteur', 'Vel voluptatem nece', '2023-11-02 07:09:15'),
(8, 'Martina Vang', 'sero@mailinator.com', 'Quo sunt aut maiore', 'Iusto ut voluptas sa', '2023-11-08 06:02:52');

-- --------------------------------------------------------

--
-- Table structure for table `as_content`
--

CREATE TABLE `as_content` (
  `content_id` int(11) NOT NULL,
  `page_id` int(11) NOT NULL,
  `content_title` varchar(200) NOT NULL,
  `content_subtitle` text NOT NULL,
  `content_details` text NOT NULL,
  `content_image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `as_content`
--

INSERT INTO `as_content` (`content_id`, `page_id`, `content_title`, `content_subtitle`, `content_details`, `content_image`) VALUES
(1, 1, 'What We Offer', 'On her way she met a copy. The copy warned the Little Blind Text, that where it came from it would have been rewritten a thousand times and everything that was left from its origin would be the word.', '', 'about.jpg'),
(2, 1, 'Fox University', '', '<p>Separated they live in. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>\r\n<p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth. </p>', ''),
(4, 1, 'Our Courses', 'Separated they live in. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country', '', ''),
(5, 1, 'Certified Teachers', 'Separated they live in. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country', '', ''),
(6, 1, 'Request A Quote', 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.', '', ''),
(7, 1, 'Recent Blog', 'Separated they live in. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country', '', ''),
(8, 1, 'Student Says About Us', 'Separated they live in. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `as_course`
--

CREATE TABLE `as_course` (
  `course_id` int(11) NOT NULL,
  `course_teacher` varchar(50) NOT NULL,
  `course_seat` varchar(30) NOT NULL,
  `course_duration` varchar(30) NOT NULL,
  `course_title` varchar(50) NOT NULL,
  `course_details` text NOT NULL,
  `course_btn` varchar(30) NOT NULL,
  `course_btn_url` varchar(50) NOT NULL,
  `course_banner` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `as_course`
--

INSERT INTO `as_course` (`course_id`, `course_teacher`, `course_seat`, `course_duration`, `course_title`, `course_details`, `course_btn`, `course_btn_url`, `course_banner`) VALUES
(1, 'Asif Khan', '50 Seats', '3 Months', 'Website Design', 'Separated they live in. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country.', 'Apply Now', 'https://fb.com', 'course-1699123185-4085.jpg'),
(2, 'Arwaa Ahmed', '45 Seats', '2 Months', 'Digital Marketing', 'Separated they live in. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country.', 'Apply Now', 'https://fb.com', 'course-1699123351-4488.jpg'),
(3, 'Sonia Akter', '60 Seats', '4 Months', 'Data Entry', 'Separated they live in. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country.', 'Apply Now', 'https://fb.com', 'course-1699123409-2420.jpg'),
(4, 'Sabit Islam', '30 Seats', '2 Months', 'Lead Generation', 'Separated they live in. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country.', 'Apply Now', 'https://fb.com', 'course-1699123479-3377.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `as_course_list`
--

CREATE TABLE `as_course_list` (
  `course_list_id` int(11) NOT NULL,
  `course_list_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `as_course_list`
--

INSERT INTO `as_course_list` (`course_list_id`, `course_list_name`) VALUES
(1, 'Art Lesson'),
(2, 'Language Lesson'),
(3, 'Music Lesson'),
(4, 'Sports'),
(5, 'Other Lesson');

-- --------------------------------------------------------

--
-- Table structure for table `as_feature`
--

CREATE TABLE `as_feature` (
  `feat_id` int(11) NOT NULL,
  `feat_title` varchar(50) NOT NULL,
  `feat_subtitle` varchar(300) NOT NULL,
  `feat_icon` varchar(30) NOT NULL,
  `feat_bg` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `as_feature`
--

INSERT INTO `as_feature` (`feat_id`, `feat_title`, `feat_subtitle`, `feat_icon`, `feat_bg`) VALUES
(1, 'Certified Teachers', 'Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.', 'flaticon-teacher', 'bg-darken'),
(2, 'Special Education', 'Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.', 'flaticon-reading', 'bg-primary'),
(3, 'Book &amp; Library', 'Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.', 'flaticon-books', 'bg-darken'),
(4, 'Sport Clubs', 'Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.', 'flaticon-diploma', 'bg-primary');

-- --------------------------------------------------------

--
-- Table structure for table `as_gallery`
--

CREATE TABLE `as_gallery` (
  `gallery_id` int(11) NOT NULL,
  `gallery_url` varchar(50) NOT NULL,
  `gallery_image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `as_gallery`
--

INSERT INTO `as_gallery` (`gallery_id`, `gallery_url`, `gallery_image`) VALUES
(1, 'Voluptatum magna dis', 'gallery-1699547456-4821.jpg'),
(2, 'Cumque sint consequa', 'gallery-1699547497-2303.jpg'),
(3, 'Omnis illum minim e', 'gallery-1699547514-2540.jpg'),
(4, 'Esse corporis eligen', 'gallery-1699547524-2825.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `as_offer`
--

CREATE TABLE `as_offer` (
  `offer_id` int(11) NOT NULL,
  `offer_icon` varchar(30) NOT NULL,
  `offer_title` varchar(50) NOT NULL,
  `offer_subtitle` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `as_offer`
--

INSERT INTO `as_offer` (`offer_id`, `offer_icon`, `offer_title`, `offer_subtitle`) VALUES
(1, 'flaticon-security', 'Safety First', 'Far far away, behind the word mountains, far from the countries Vokalia.'),
(2, 'flaticon-reading', 'Regular Classes', 'Far far away, behind the word mountains, far from the countries Vokalia.'),
(3, 'flaticon-diploma', 'Certified Teachers', 'Far far away, behind the word mountains, far from the countries Vokalia.'),
(4, 'flaticon-education', 'Sufficient Classrooms', 'Far far away, behind the word mountains, far from the countries Vokalia.'),
(5, 'flaticon-jigsaw', 'Creative Lessons', 'Far far away, behind the word mountains, far from the countries Vokalia.'),
(6, 'flaticon-kids', 'Sports Facilities', 'Far far away, behind the word mountains, far from the countries Vokalia.');

-- --------------------------------------------------------

--
-- Table structure for table `as_page`
--

CREATE TABLE `as_page` (
  `page_id` int(11) NOT NULL,
  `page_title` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `as_page`
--

INSERT INTO `as_page` (`page_id`, `page_title`) VALUES
(1, 'Home'),
(2, 'About'),
(3, 'Courses'),
(4, 'Staff'),
(5, 'Blog'),
(6, 'Contant');

-- --------------------------------------------------------

--
-- Table structure for table `as_quote`
--

CREATE TABLE `as_quote` (
  `quote_id` int(11) NOT NULL,
  `quote_fname` varchar(50) NOT NULL,
  `quote_lname` varchar(50) NOT NULL,
  `quote_phone` varchar(20) NOT NULL,
  `quote_mess` text NOT NULL,
  `course_list_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `as_quote`
--

INSERT INTO `as_quote` (`quote_id`, `quote_fname`, `quote_lname`, `quote_phone`, `quote_mess`, `course_list_id`) VALUES
(1, 'Asif', 'Khan', '01516788837', 'testing purpose.', 2),
(2, 'Garrett Long', 'Orson Salinas', '+1 (579) 472-4457', 'Expedita rerum est i', 4),
(3, 'Garrett Long', 'Orson Salinas', '+1 (579) 472-4457', 'Expedita rerum est i', 4),
(4, 'Garrett Long', 'Orson Salinas', '+1 (579) 472-4457', 'Expedita rerum est i', 4);

-- --------------------------------------------------------

--
-- Table structure for table `as_review`
--

CREATE TABLE `as_review` (
  `rev_id` int(11) NOT NULL,
  `rev_name` varchar(50) NOT NULL,
  `rev_designation` varchar(50) NOT NULL,
  `rev_text` text NOT NULL,
  `rev_image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `as_review`
--

INSERT INTO `as_review` (`rev_id`, `rev_name`, `rev_designation`, `rev_text`, `rev_image`) VALUES
(1, 'Mark Huff', 'Mother', 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.', 'review-1699467940-3001.jpg'),
(2, 'Stuart Stanley', 'Designer', 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.', 'review-1699467983-3156.jpg'),
(3, 'Mark Huff', 'Developer', 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.', 'review-1699468030-3267.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `as_role`
--

CREATE TABLE `as_role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `as_role`
--

INSERT INTO `as_role` (`role_id`, `role_name`) VALUES
(2, 'Admin'),
(3, 'Author'),
(4, 'Editor'),
(1, 'SuperAdmin');

-- --------------------------------------------------------

--
-- Table structure for table `as_teacher`
--

CREATE TABLE `as_teacher` (
  `teacher_id` int(11) NOT NULL,
  `teacher_name` varchar(50) NOT NULL,
  `teacher_designation` varchar(50) NOT NULL,
  `teacher_details` text NOT NULL,
  `teacher_image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `as_teacher`
--

INSERT INTO `as_teacher` (`teacher_id`, `teacher_name`, `teacher_designation`, `teacher_details`, `teacher_image`) VALUES
(1, 'Stella Smith', 'ART TEACHER', 'I am an ambitious workaholic, but apart from that, pretty simple person.', 'teacher-1699114641-2463.jpg'),
(2, 'Monshe Henderson', 'SCIENCE TEACHER', 'I am an ambitious workaholic, but apart from that, pretty simple person.', 'teacher-1699118186-3567.jpg'),
(3, 'Mitch Parker', 'ENGLISH TEACHER', 'I am an ambitious workaholic, but apart from that, pretty simple person.', 'teacher-1699118236-3584.jpg'),
(4, 'Bianca Wilson', 'TEACHER', 'I am an ambitious workaholic, but apart from that, pretty simple person.', 'teacher-1699118272-2348.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `as_user`
--

CREATE TABLE `as_user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_phone` varchar(20) NOT NULL,
  `user_email` varchar(30) NOT NULL,
  `user_username` varchar(30) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `role_id` int(11) NOT NULL,
  `user_photo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `as_user`
--

INSERT INTO `as_user` (`user_id`, `user_name`, `user_phone`, `user_email`, `user_username`, `user_password`, `role_id`, `user_photo`) VALUES
(3, 'bdCalling IT Ltd', '02115458452123', 'sabinaaktherbdc@gmail.com', 'bdcalling', '1ce927f875864094e3906a4a0b5ece68', 4, 'user-1698492902-3594.png'),
(8, 'Asif Ahamed', '01516788837', 'asifshezan7@gmail.com', 'asadmin', 'b706835de79a2b4e80506f582af3676a', 1, 'user-1698488094-3856.jpg'),
(9, 'xxx', '01303056044', 'xxx@gmail.com', 'xxx', '202cb962ac59075b964b07152d234b70', 1, 'user-1698639051-3905.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `as_banner`
--
ALTER TABLE `as_banner`
  ADD PRIMARY KEY (`ban_id`);

--
-- Indexes for table `as_blog`
--
ALTER TABLE `as_blog`
  ADD PRIMARY KEY (`blog_id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `as_contact`
--
ALTER TABLE `as_contact`
  ADD PRIMARY KEY (`con_id`);

--
-- Indexes for table `as_content`
--
ALTER TABLE `as_content`
  ADD PRIMARY KEY (`content_id`),
  ADD KEY `page_id` (`page_id`);

--
-- Indexes for table `as_course`
--
ALTER TABLE `as_course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `as_course_list`
--
ALTER TABLE `as_course_list`
  ADD PRIMARY KEY (`course_list_id`);

--
-- Indexes for table `as_feature`
--
ALTER TABLE `as_feature`
  ADD PRIMARY KEY (`feat_id`);

--
-- Indexes for table `as_gallery`
--
ALTER TABLE `as_gallery`
  ADD PRIMARY KEY (`gallery_id`);

--
-- Indexes for table `as_offer`
--
ALTER TABLE `as_offer`
  ADD PRIMARY KEY (`offer_id`);

--
-- Indexes for table `as_page`
--
ALTER TABLE `as_page`
  ADD PRIMARY KEY (`page_id`);

--
-- Indexes for table `as_quote`
--
ALTER TABLE `as_quote`
  ADD PRIMARY KEY (`quote_id`),
  ADD KEY `course_list_id` (`course_list_id`);

--
-- Indexes for table `as_review`
--
ALTER TABLE `as_review`
  ADD PRIMARY KEY (`rev_id`);

--
-- Indexes for table `as_role`
--
ALTER TABLE `as_role`
  ADD PRIMARY KEY (`role_id`),
  ADD UNIQUE KEY `role_name` (`role_name`);

--
-- Indexes for table `as_teacher`
--
ALTER TABLE `as_teacher`
  ADD PRIMARY KEY (`teacher_id`);

--
-- Indexes for table `as_user`
--
ALTER TABLE `as_user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `as_banner`
--
ALTER TABLE `as_banner`
  MODIFY `ban_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `as_blog`
--
ALTER TABLE `as_blog`
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `as_contact`
--
ALTER TABLE `as_contact`
  MODIFY `con_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `as_content`
--
ALTER TABLE `as_content`
  MODIFY `content_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `as_course`
--
ALTER TABLE `as_course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `as_course_list`
--
ALTER TABLE `as_course_list`
  MODIFY `course_list_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `as_feature`
--
ALTER TABLE `as_feature`
  MODIFY `feat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `as_gallery`
--
ALTER TABLE `as_gallery`
  MODIFY `gallery_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `as_offer`
--
ALTER TABLE `as_offer`
  MODIFY `offer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `as_page`
--
ALTER TABLE `as_page`
  MODIFY `page_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `as_quote`
--
ALTER TABLE `as_quote`
  MODIFY `quote_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `as_review`
--
ALTER TABLE `as_review`
  MODIFY `rev_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `as_role`
--
ALTER TABLE `as_role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `as_teacher`
--
ALTER TABLE `as_teacher`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `as_user`
--
ALTER TABLE `as_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `as_blog`
--
ALTER TABLE `as_blog`
  ADD CONSTRAINT `as_blog_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `as_role` (`role_id`);

--
-- Constraints for table `as_content`
--
ALTER TABLE `as_content`
  ADD CONSTRAINT `as_content_ibfk_1` FOREIGN KEY (`page_id`) REFERENCES `as_page` (`page_id`);

--
-- Constraints for table `as_quote`
--
ALTER TABLE `as_quote`
  ADD CONSTRAINT `as_quote_ibfk_1` FOREIGN KEY (`course_list_id`) REFERENCES `as_course_list` (`course_list_id`);

--
-- Constraints for table `as_user`
--
ALTER TABLE `as_user`
  ADD CONSTRAINT `as_user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `as_role` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
