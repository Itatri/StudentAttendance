-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 03, 2024 at 05:58 AM
-- Server version: 10.5.20-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id21945515_bansach`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance_records`
--

CREATE TABLE `attendance_records` (
  `attendance_id` int(11) NOT NULL,
  `session_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `status` enum('present','absent','late') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendance_records`
--

INSERT INTO `attendance_records` (`attendance_id`, `session_id`, `student_id`, `status`) VALUES
(4, 13, 35, 'absent'),
(5, 13, 36, 'absent'),
(6, 13, 25, 'absent'),
(7, 13, 30, 'absent'),
(8, 13, 43, 'absent'),
(9, 13, 24, 'absent'),
(10, 13, 18, 'absent'),
(11, 13, 39, 'absent'),
(12, 13, 32, 'late'),
(13, 13, 22, 'absent'),
(14, 13, 34, 'absent'),
(15, 13, 27, 'absent'),
(16, 13, 23, 'absent'),
(17, 13, 41, 'absent'),
(18, 13, 16, 'absent'),
(19, 13, 29, 'absent'),
(20, 13, 19, 'absent'),
(21, 13, 17, 'absent'),
(22, 13, 40, 'absent'),
(23, 13, 38, 'absent'),
(24, 28, 35, 'present'),
(25, 28, 36, 'absent'),
(26, 28, 25, 'absent'),
(27, 28, 30, 'absent'),
(28, 28, 43, 'absent'),
(29, 28, 24, 'absent'),
(30, 28, 18, 'absent'),
(31, 28, 39, 'absent'),
(32, 28, 32, 'absent'),
(33, 28, 22, 'absent'),
(34, 28, 34, 'absent'),
(35, 28, 27, 'absent'),
(36, 28, 23, 'absent'),
(37, 28, 41, 'absent'),
(38, 28, 16, 'absent'),
(39, 28, 29, 'absent'),
(40, 28, 19, 'absent'),
(41, 28, 17, 'absent'),
(42, 28, 40, 'absent'),
(43, 28, 38, 'absent'),
(44, 6, 36, 'absent'),
(45, 6, 25, 'absent'),
(46, 6, 30, 'present'),
(47, 6, 43, 'absent'),
(48, 6, 24, 'absent'),
(49, 6, 18, 'late'),
(50, 6, 39, 'absent'),
(51, 6, 32, 'absent'),
(52, 6, 22, 'late'),
(53, 6, 34, 'absent'),
(54, 6, 27, 'absent'),
(55, 6, 23, 'absent'),
(56, 6, 41, 'absent'),
(57, 6, 16, 'absent'),
(58, 6, 29, 'absent'),
(59, 6, 19, 'absent'),
(60, 6, 17, 'absent'),
(61, 6, 40, 'present'),
(62, 6, 38, 'absent'),
(63, 8, 35, 'present'),
(64, 8, 36, 'absent'),
(65, 8, 25, 'absent'),
(66, 8, 30, 'absent'),
(67, 8, 43, 'absent'),
(68, 8, 24, 'absent'),
(69, 8, 18, 'absent'),
(70, 8, 39, 'absent'),
(71, 8, 32, 'absent'),
(72, 8, 22, 'absent'),
(73, 8, 34, 'absent'),
(74, 8, 27, 'absent'),
(75, 8, 23, 'absent'),
(76, 8, 41, 'absent'),
(77, 8, 16, 'absent'),
(78, 8, 29, 'absent'),
(79, 8, 19, 'absent'),
(80, 8, 17, 'absent'),
(81, 8, 40, 'absent'),
(82, 8, 38, 'absent');

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `class_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `class_name` varchar(100) NOT NULL,
  `semester` varchar(50) DEFAULT NULL,
  `start_day` date NOT NULL,
  `end_day` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`class_id`, `course_id`, `teacher_id`, `class_name`, `semester`, `start_day`, `end_day`) VALUES
(1, 1, 1, 'DB101', 'Spring 2024', '2024-01-10', '2024-05-10'),
(2, 2, 2, 'SE101', 'Fall 2024', '2024-09-10', '2024-12-10'),
(3, 1, 1, 'DB102', 'Spring 2024', '2024-01-10', '2024-05-10'),
(4, 2, 2, 'SE102', 'Fall 2024', '2024-09-10', '2024-12-10'),
(5, 3, 3, 'PH101', 'Spring 2025', '2025-01-10', '2025-05-10');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(100) NOT NULL,
  `course_description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `course_name`, `course_description`) VALUES
(1, 'Database Systems', 'An introduction to database systems, including design and implementation.'),
(2, 'Software Engineering', 'A comprehensive course on software engineering principles and practices.'),
(3, 'Network Security', 'A detailed course on network security principles and practices.');

-- --------------------------------------------------------

--
-- Table structure for table `enrollments`
--

CREATE TABLE `enrollments` (
  `enrollment_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `enrollments`
--

INSERT INTO `enrollments` (`enrollment_id`, `class_id`, `student_id`) VALUES
(59, 4, 35),
(60, 2, 35),
(61, 3, 35),
(62, 1, 35),
(63, 5, 36),
(64, 4, 36),
(65, 2, 36),
(66, 3, 36),
(67, 1, 36),
(68, 5, 25),
(69, 4, 25),
(70, 2, 25),
(71, 3, 25),
(72, 1, 25),
(73, 5, 30),
(74, 4, 30),
(75, 2, 30),
(76, 3, 30),
(77, 1, 30),
(78, 5, 43),
(79, 4, 43),
(80, 2, 43),
(81, 3, 43),
(82, 1, 43),
(83, 5, 24),
(84, 4, 24),
(85, 2, 24),
(86, 3, 24),
(87, 1, 24),
(88, 5, 18),
(89, 4, 18),
(90, 2, 18),
(91, 3, 18),
(92, 1, 18),
(93, 5, 39),
(94, 4, 39),
(95, 2, 39),
(96, 3, 39),
(97, 1, 39),
(98, 5, 32),
(99, 4, 32),
(100, 2, 32),
(101, 3, 32),
(102, 1, 32),
(103, 5, 22),
(104, 4, 22),
(105, 2, 22),
(106, 3, 22),
(107, 1, 22),
(108, 5, 34),
(109, 4, 34),
(110, 2, 34),
(111, 3, 34),
(112, 1, 34),
(113, 5, 27),
(114, 4, 27),
(115, 2, 27),
(116, 3, 27),
(117, 1, 27),
(118, 5, 23),
(119, 4, 23),
(120, 2, 23),
(121, 3, 23),
(122, 1, 23),
(123, 5, 41),
(124, 4, 41),
(125, 2, 41),
(126, 3, 41),
(127, 1, 41),
(128, 5, 16),
(129, 4, 16),
(130, 2, 16),
(131, 3, 16),
(132, 1, 16),
(133, 5, 29),
(134, 4, 29),
(135, 2, 29),
(136, 3, 29),
(137, 1, 29),
(138, 5, 19),
(139, 4, 19),
(140, 2, 19),
(141, 3, 19),
(142, 1, 19),
(143, 5, 17),
(144, 4, 17),
(145, 2, 17),
(146, 3, 17),
(147, 1, 17),
(148, 5, 40),
(149, 4, 40),
(150, 2, 40),
(151, 3, 40),
(152, 1, 40),
(153, 5, 38),
(154, 4, 38),
(155, 2, 38),
(156, 3, 38),
(157, 1, 38);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('leanhquananlao@gmail.com', '$2y$12$YmLEFgFJ36KcnyvSaQzNIuXeiiFat3Td1WswZAk6HyGzxNuhrmo3i', '2024-05-27 02:04:15');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `session_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `session_date` datetime NOT NULL,
  `end_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`session_id`, `class_id`, `session_date`, `end_time`) VALUES
(6, 5, '2024-01-01 07:00:00', '2024-01-01 12:00:00'),
(7, 4, '2024-09-02 05:00:00', '2024-09-02 10:00:00'),
(8, 3, '2024-01-03 09:00:00', '2024-01-03 14:00:00'),
(9, 2, '2024-09-10 05:00:00', '2024-09-10 21:09:29'),
(10, 1, '2024-01-10 07:00:00', '2024-01-10 12:00:00'),
(11, 5, '2024-12-03 07:00:00', '2024-12-03 11:11:57'),
(12, 4, '2024-09-17 12:00:00', '2024-09-17 14:13:11'),
(13, 3, '2024-01-17 07:00:00', '2024-01-17 11:14:03'),
(14, 2, '2024-09-17 12:00:00', '2024-09-17 13:15:13'),
(15, 1, '2024-01-17 07:00:00', '2024-01-17 10:15:40'),
(16, 5, '2024-01-11 15:00:00', '2024-01-11 16:00:00'),
(17, 4, '2024-09-24 13:00:00', '2024-09-24 18:00:00'),
(18, 3, '2024-01-24 14:00:00', '2024-01-24 18:00:00'),
(19, 2, '2024-09-24 12:00:00', '2024-09-24 17:00:00'),
(20, 1, '2024-01-24 16:00:00', '2024-01-24 20:00:00'),
(21, 5, '2025-01-31 11:00:00', '2025-01-31 15:00:00'),
(22, 4, '2024-10-03 11:00:00', '2024-10-03 17:00:00'),
(23, 3, '2024-01-31 10:00:00', '2024-01-31 14:00:00'),
(24, 2, '2024-10-01 14:00:00', '2024-10-01 17:00:00'),
(25, 1, '2024-01-31 09:00:00', '2024-01-31 14:00:00'),
(26, 5, '2025-02-07 09:00:00', '2025-02-07 13:00:00'),
(27, 4, '2024-10-08 12:00:00', '2024-10-08 14:00:00'),
(28, 3, '2024-02-07 09:00:00', '2024-02-07 11:00:00'),
(29, 2, '2024-10-08 07:00:00', '2024-10-08 11:00:00'),
(30, 1, '2024-02-09 12:00:00', '2024-02-09 15:16:44'),
(31, 5, '2025-02-14 00:00:00', '0000-00-00 00:00:00'),
(32, 4, '2024-10-15 00:00:00', '0000-00-00 00:00:00'),
(33, 3, '2024-02-14 00:00:00', '0000-00-00 00:00:00'),
(34, 2, '2024-10-15 00:00:00', '0000-00-00 00:00:00'),
(35, 1, '2024-02-14 00:00:00', '0000-00-00 00:00:00'),
(36, 5, '2025-02-21 00:00:00', '0000-00-00 00:00:00'),
(37, 4, '2024-10-22 00:00:00', '0000-00-00 00:00:00'),
(38, 3, '2024-02-21 00:00:00', '0000-00-00 00:00:00'),
(39, 2, '2024-10-22 00:00:00', '0000-00-00 00:00:00'),
(40, 1, '2024-02-21 00:00:00', '0000-00-00 00:00:00'),
(41, 5, '2025-02-28 00:00:00', '0000-00-00 00:00:00'),
(42, 4, '2024-10-29 00:00:00', '0000-00-00 00:00:00'),
(43, 3, '2024-02-28 00:00:00', '0000-00-00 00:00:00'),
(44, 2, '2024-10-29 00:00:00', '0000-00-00 00:00:00'),
(45, 1, '2024-02-28 00:00:00', '0000-00-00 00:00:00'),
(46, 5, '2025-03-07 00:00:00', '0000-00-00 00:00:00'),
(47, 4, '2024-11-05 00:00:00', '0000-00-00 00:00:00'),
(48, 3, '2024-03-06 00:00:00', '0000-00-00 00:00:00'),
(49, 2, '2024-11-05 00:00:00', '0000-00-00 00:00:00'),
(50, 1, '2024-03-06 00:00:00', '0000-00-00 00:00:00'),
(51, 5, '2025-03-14 00:00:00', '0000-00-00 00:00:00'),
(52, 4, '2024-11-12 00:00:00', '0000-00-00 00:00:00'),
(53, 3, '2024-03-13 00:00:00', '0000-00-00 00:00:00'),
(54, 2, '2024-11-12 00:00:00', '0000-00-00 00:00:00'),
(55, 1, '2024-03-13 00:00:00', '0000-00-00 00:00:00'),
(56, 5, '2025-03-21 00:00:00', '0000-00-00 00:00:00'),
(57, 4, '2024-11-19 00:00:00', '0000-00-00 00:00:00'),
(58, 3, '2024-03-20 00:00:00', '0000-00-00 00:00:00'),
(59, 2, '2024-11-19 00:00:00', '0000-00-00 00:00:00'),
(60, 1, '2024-03-20 00:00:00', '0000-00-00 00:00:00'),
(61, 5, '2025-03-28 00:00:00', '0000-00-00 00:00:00'),
(62, 4, '2024-11-26 00:00:00', '0000-00-00 00:00:00'),
(63, 3, '2024-03-27 00:00:00', '0000-00-00 00:00:00'),
(64, 2, '2024-11-26 00:00:00', '0000-00-00 00:00:00'),
(65, 1, '2024-03-27 00:00:00', '0000-00-00 00:00:00'),
(66, 5, '2025-04-04 00:00:00', '0000-00-00 00:00:00'),
(67, 4, '2024-12-03 00:00:00', '0000-00-00 00:00:00'),
(68, 3, '2024-04-03 00:00:00', '0000-00-00 00:00:00'),
(69, 2, '2024-12-03 00:00:00', '0000-00-00 00:00:00'),
(70, 1, '2024-04-03 00:00:00', '0000-00-00 00:00:00'),
(71, 5, '2025-04-11 00:00:00', '0000-00-00 00:00:00'),
(72, 4, '2024-12-10 00:00:00', '0000-00-00 00:00:00'),
(73, 3, '2024-04-10 00:00:00', '0000-00-00 00:00:00'),
(74, 2, '2024-12-10 00:00:00', '0000-00-00 00:00:00'),
(75, 1, '2024-04-10 00:00:00', '0000-00-00 00:00:00'),
(76, 5, '2025-04-18 00:00:00', '0000-00-00 00:00:00'),
(77, 4, '2024-12-17 00:00:00', '0000-00-00 00:00:00'),
(78, 3, '2024-04-17 00:00:00', '0000-00-00 00:00:00'),
(79, 2, '2024-12-17 00:00:00', '0000-00-00 00:00:00'),
(80, 1, '2024-04-17 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) NOT NULL,
  `date_of_birth` date NOT NULL,
  `gender` enum('male','female','other') NOT NULL,
  `education_level` varchar(50) NOT NULL,
  `training_type` varchar(50) NOT NULL,
  `major` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `user_id`, `first_name`, `last_name`, `date_of_birth`, `gender`, `education_level`, `training_type`, `major`, `address`, `phone_number`, `img`) VALUES
(16, 845135, 'Nguyễn Ngọc', 'Nga', '1999-01-01', 'male', 'Bachelor', 'Full Time', 'Undecided', 'Address1', '0123456781', '1717335887_1.jpg'),
(17, 199957, 'Lê Phương', 'Anh', '1999-01-01', 'male', 'Bachelor', 'Full Time', 'Undecided', 'Address2', '0123456782', '1717335951_2.jpg'),
(18, 192952, 'Đoàn Thị Ngọc', 'Bích', '1999-01-01', 'male', 'Bachelor', 'Full Time', 'Undecided', 'Address3', '0123456783', '1717335972_3.jpg'),
(19, 866480, 'Lê Trí', 'Cường', '1999-01-01', 'female', 'Bachelor', 'Full Time', 'Undecided', 'Address4', '0123456784', '1717336003_4.jpg'),
(20, 726551, 'Nguyễn Ngọc Minh', 'Đan', '1999-01-01', 'male', 'Bachelor', 'Full Time', 'Undecided', 'Address5', '0123456785', '1717336026_5.jpg'),
(21, 6141, 'Trần Tiến', 'Danh', '1999-01-01', 'male', 'Bachelor', 'Full Time', 'Undecided', 'Address6', '0123456786', '1717336050_8.jpg'),
(22, 577711, 'Phạm Minh', 'Đạt', '1999-01-01', 'female', 'Bachelor', 'Full Time', 'Undecided', 'Address7', '0123456787', '1717336071_9.jpg'),
(23, 921234, 'Nguyễn Phương', 'Điền', '1999-01-01', 'male', 'Bachelor', 'Full Time', 'Undecided', 'Address8', '0123456788', '1717336092_10.jpg'),
(24, 304043, 'Lê Nguyễn Thiên', 'Đỉnh', '1999-01-01', 'male', 'Bachelor', 'Full Time', 'Undecided', 'Address9', '0123456789', '1717336110_11.jpg'),
(25, 485715, 'Phạm Minh', 'Duy', '1999-01-01', 'male', 'Bachelor', 'Full Time', 'Undecided', 'Address10', '01234567810', '1717336210_13.png'),
(26, 492186, 'Trần Vương', 'Duy', '1999-01-01', 'female', 'Bachelor', 'Full Time', 'Undecided', 'Address11', '01234567811', '1717336237_13.jpg'),
(27, 980103, 'Nguyễn Thị Thu', 'Hà', '1999-01-01', 'female', 'Bachelor', 'Full Time', 'Undecided', 'Address12', '01234567812', '1717336265_14.jpg'),
(28, 192275, 'Nguyễn Phạm Hoàng', 'Hải', '1999-01-01', 'male', 'Bachelor', 'Full Time', 'Undecided', 'Address13', '01234567813', '1717336292_15.jpg'),
(29, 832297, 'Huỳnh Vũ Anh', 'Hào', '1999-01-01', 'male', 'Bachelor', 'Full Time', 'Undecided', 'Address14', '01234567814', '1717336317_16.jpg'),
(30, 83169, 'Bùi Thị Phước', 'Hiền', '1999-01-01', 'male', 'Bachelor', 'Full Time', 'Undecided', 'Address15', '01234567815', '1717336338_17.jpg'),
(31, 89525, 'Phan Ngọc Hiền', 'Hòa', '1999-01-01', 'male', 'Bachelor', 'Full Time', 'Undecided', 'Address16', '01234567816', '1717336362_18.jpg'),
(32, 952459, 'Trần Minh', 'Hòa', '1999-01-01', 'female', 'Bachelor', 'Full Time', 'Undecided', 'Address17', '01234567817', '1717336388_19.jpg'),
(33, 290986, 'Nguyễn Văn', 'Hoàn', '1999-01-01', 'male', 'Bachelor', 'Full Time', 'Undecided', 'Address18', '01234567818', '1717336416_20.jpg'),
(34, 956596, 'Đoàn Xuân', 'Hợp', '1999-01-01', 'female', 'Bachelor', 'Full Time', 'Undecided', 'Address19', '01234567819', '1717336442_21.jpg'),
(35, 339, 'TRẦN ĐỨC', 'HUY', '1999-01-01', 'female', 'Bachelor', 'Full Time', 'Undecided', 'Address20', '01234567820', '1717336468_25.jpg'),
(36, 963117, 'Phùng Vĩnh', 'Luân', '1999-01-01', 'male', 'Bachelor', 'Full Time', 'Undecided', 'Address21', '01234567821', '1717336505_8.jpg'),
(37, 291203, 'Lê Nguyễn Quang', 'Minh', '1999-01-01', 'male', 'Bachelor', 'Full Time', 'Undecided', 'Address22', '01234567822', '1717336526_10.jpg'),
(38, 864795, 'Nguyễn Duy', 'Tài', '1999-01-01', 'female', 'Bachelor', 'Full Time', 'Undecided', 'Address23', '01234567823', '1717336548_5.jpg'),
(39, 810269, 'Nguyễn Đình', 'Tiến', '1999-01-01', 'male', 'Bachelor', 'Full Time', 'Undecided', 'Address24', '01234567824', '1717336566_3.jpg'),
(40, 611964, 'Lê Minh', 'Tuấn', '1999-01-01', 'female', 'Bachelor', 'Full Time', 'Undecided', 'Address25', '01234567825', '1717336586_13.jpg'),
(41, 334882, 'Lưu Đức', 'Vinh', '1999-01-01', 'male', 'Bachelor', 'Full Time', 'Undecided', 'Address26', '01234567826', '1717336880_20.jpg'),
(42, 855084, 'Nguyễn Hồng Thanh', 'Thiện', '1999-01-01', 'female', 'Bachelor', 'Full Time', 'Undecided', 'Address27', '01234567827', '1717336629_15.jpg'),
(43, 232652, 'Phan Anh', 'Kiệt', '1999-01-01', 'female', 'Bachelor', 'Full Time', 'Undecided', 'Address28', '01234567828', '1717336665_9.jpg'),
(44, 724634, 'Lê Trần Vạn Phát', 'Phát', '1999-01-01', 'female', 'Bachelor', 'Full Time', 'Undecided', 'Address29', '01234567829', '1717336702_1.jpg'),
(45, 674176, 'Bùi Công', 'Tiến', '1999-01-01', 'female', 'Bachelor', 'Full Time', 'Undecided', 'Address30', '01234567830', '1717336920_11.jpg'),
(46, 1, 'John', 'Doe', '1990-01-01', 'male', 'Bachelor', 'Full Time', 'Computer Science', '123 Main St', '1234567890', 'john.jpg'),
(47, 2, 'Jane', 'Smith', '1991-02-02', 'female', 'Bachelor', 'Full Time', 'Engineering', '456 Oak St', '0987654321', 'jane.jpg'),
(48, 3, 'Alice', 'Johnson', '1992-03-03', 'female', 'Master', 'Part Time', 'Business', '789 Pine St', '1357902468', 'alice.jpg'),
(49, 4, 'Bob', 'Williams', '1993-04-04', 'male', 'Bachelor', 'Full Time', 'Physics', '101 Elm St', '9876543210', 'bob.jpg'),
(50, 5, 'Eve', 'Brown', '1994-05-05', 'female', 'PhD', 'Full Time', 'Chemistry', '202 Maple St', '2468013579', 'eve.jpg'),
(51, 6, 'Michael', 'Jones', '1995-06-06', 'male', 'Bachelor', 'Part Time', 'Mathematics', '303 Cedar St', '5678901234', 'michael.jpg'),
(52, 7, 'Emily', 'Garcia', '1996-07-07', 'female', 'Bachelor', 'Full Time', 'Psychology', '404 Birch St', '6789012345', 'emily.jpg'),
(53, 8, 'David', 'Martinez', '1997-08-08', 'male', 'Master', 'Full Time', 'Sociology', '505 Walnut St', '7890123456', 'david.jpg'),
(54, 9, 'Olivia', 'Lopez', '1998-09-09', 'female', 'Bachelor', 'Part Time', 'History', '606 Pine St', '8901234567', 'olivia.jpg'),
(55, 10, 'William', 'Hernandez', '1999-10-10', 'male', 'PhD', 'Full Time', 'English', '707 Oak St', '9012345678', 'william.jpg'),
(56, 11, 'Sophia', 'Gonzalez', '2000-11-11', 'female', 'Bachelor', 'Full Time', 'Biology', '808 Main St', '0123456789', 'sophia.jpg'),
(57, 12, 'James', 'Perez', '2001-12-12', 'male', 'Bachelor', 'Part Time', 'Economics', '909 Elm St', '2345678901', 'james.jpg'),
(58, 13, 'Isabella', 'Rodriguez', '2002-01-13', 'female', 'Master', 'Full Time', 'Political Science', '1011 Maple St', '3456789012', 'isabella.jpg'),
(59, 14, 'Logan', 'Wilson', '2003-02-14', 'male', 'Bachelor', 'Full Time', 'Geology', '1112 Pine St', '4567890123', 'logan.jpg'),
(60, 33998, 'Mia', 'Moore', '2004-03-15', 'female', 'Bachelor', 'Part Time', 'Art', '1213 Oak St', '5678901234', 'mia.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `teacher_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `date_of_birth` date NOT NULL,
  `gender` enum('male','female','other') NOT NULL,
  `education_level` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`teacher_id`, `user_id`, `first_name`, `last_name`, `date_of_birth`, `gender`, `education_level`, `address`, `phone_number`, `img`) VALUES
(1, 338, 'Jane', 'Smith', '1980-05-15', 'male', 'Master', '456 Another St', '0987654321', '1717336754_gv1.jpg'),
(2, 3, 'Alice', 'Johnson', '1975-12-20', 'male', 'PhD', '789 Teacher St', '5556781234', '1717336762_gv2.jpg'),
(3, 4, 'Sarah', 'Miller', '1985-06-06', 'female', 'PhD', '123 Pine St', '1112223333', '1717336771_gv3.png'),
(4, 5, 'David', 'Wilson', '1980-07-07', 'male', 'Master', '456 Oak St', '4445556666', '1717336779_gv4.jpg'),
(5, 6, 'Jessica', 'Taylor', '1978-08-08', 'female', 'PhD', '789 Elm St', '7778889999', '1717336787_gv5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `role` varchar(10) NOT NULL DEFAULT 'student',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`, `role`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(338, 'user1', '$2y$12$DcgJOs57QRDSSB31dfq51OyTwJux9OTLfhbOCAMrcYHgKMHegoqhu', 'user1@example.com', 'TEACHER', NULL, NULL, '2024-05-27 01:53:44', '2024-05-27 01:53:44'),
(339, 'user2', '$2y$12$IwCpbooZLDv2ZjVu4ypQfuy/VLrOJwoImOBU79rppsim9gLfYa0qi', 'user2@example.com', 'STUDENT', NULL, 'fg98AJ3wjPb8W7INHFG6u7faSEJQusdOai2KLGDpbkvRGuBBroqlw28gZPsW', '2024-05-27 01:53:44', '2024-05-27 01:53:44'),
(340, 'user3', '$2y$12$v4IY.DFa6jBNf6fSRgwqXerF1Wb0JDjNVH1mLrFB7pTNtNQcRF3sW', 'leanhquananlao@gmail.com', 'ADMIN', NULL, 'hQlY9pp62Sth3nw77uSInKGYFa9vlD5dAlEQEaeJFXrV0VkVeJIigSJTiBFs', '2024-05-27 01:53:45', '2024-05-27 01:53:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance_records`
--
ALTER TABLE `attendance_records`
  ADD PRIMARY KEY (`attendance_id`),
  ADD KEY `session_id` (`session_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`class_id`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `teacher_id` (`teacher_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `enrollments`
--
ALTER TABLE `enrollments`
  ADD PRIMARY KEY (`enrollment_id`),
  ADD KEY `class_id` (`class_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`session_id`),
  ADD KEY `class_id` (`class_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`teacher_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance_records`
--
ALTER TABLE `attendance_records`
  MODIFY `attendance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `enrollments`
--
ALTER TABLE `enrollments`
  MODIFY `enrollment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=263;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `session_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=341;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
