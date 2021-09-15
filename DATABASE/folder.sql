-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2021 at 08:10 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `folder`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `user_id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`user_id`, `firstname`, `lastname`, `email`, `username`, `password`) VALUES
(1, 'Billy', 'Revellame', 'revellame28@gmail.com', 'bluedcoffee', 'admin'),
(2, 'Clark', 'Banaag', 'banaaghub.com', 'clarkpogi', 'a1Bz20ydqelm8m1wql7c6f5bdc16b3748b481fb5ea98bd4ace'),
(3, 'admin', 'admin', 'admin@admin.com', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`) VALUES
(1, 'Raspberry Pi'),
(2, 'Arduino'),
(3, 'Gizduino'),
(4, 'Sensor'),
(5, 'Module'),
(6, 'Capacitor'),
(7, 'Resistor'),
(8, 'Transistor'),
(9, 'Others'),
(10, 'Banana Pi');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`user_id`, `username`, `message`, `created_on`) VALUES
(1, 'chinyere', 'hi', '2020-12-16 18:50:20'),
(2, 'paschal', 'hi', '2020-12-21 10:07:15'),
(3, 'paschal', 'hell', '2020-12-23 22:07:17'),
(4, 'paschal', ';jhikolp;\r\n\r\n', '2020-12-23 22:07:37');

-- --------------------------------------------------------

--
-- Table structure for table `chat_message`
--

CREATE TABLE `chat_message` (
  `user_id` int(11) NOT NULL,
  `to_user_id` int(11) NOT NULL,
  `from_user_id` int(11) NOT NULL,
  `chat_message` text COLLATE utf8mb4_bin NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `chat_message`
--

INSERT INTO `chat_message` (`user_id`, `to_user_id`, `from_user_id`, `chat_message`, `timestamp`, `status`) VALUES
(1, 2, 6, '', '2021-01-23 22:03:09', 1),
(2, 1, 6, '', '2021-01-23 22:04:28', 1),
(3, 1, 6, '', '2021-01-23 22:05:40', 1),
(4, 1, 6, 'hi', '2021-01-23 22:06:27', 1),
(5, 1, 6, '', '2021-01-23 22:06:27', 1),
(6, 1, 6, 'hello', '2021-01-23 22:27:36', 1),
(7, 1, 6, 'hi', '2021-01-23 22:30:39', 1),
(8, 3, 6, 'hello', '2021-01-23 22:31:28', 1),
(9, 9, 7, 'hi', '2021-01-23 22:40:11', 1),
(10, 3, 7, 'hi', '2021-01-23 22:40:46', 1),
(11, 6, 7, 'hi\n', '2021-01-23 22:40:55', 1),
(12, 1, 7, 'hello', '2021-01-23 22:41:14', 1),
(13, 2, 7, 'ghh', '2021-01-23 22:41:32', 1),
(14, 1, 7, 'h', '2021-01-23 22:44:17', 1),
(15, 2, 7, 'me', '2021-01-23 22:44:40', 1),
(16, 3, 7, 'hi', '2021-01-23 22:46:57', 1),
(17, 9, 7, 'hello', '2021-01-23 22:47:13', 1),
(18, 1, 7, 'hi', '2021-01-23 23:30:41', 1),
(19, 1, 7, 'h', '2021-01-23 23:32:58', 1),
(20, 1, 7, '', '2021-01-23 23:33:41', 1),
(21, 1, 7, '', '2021-01-23 23:33:44', 1),
(22, 1, 7, 'go', '2021-01-23 23:44:41', 1),
(23, 2, 7, 'name name', '2021-01-23 23:46:14', 1),
(24, 1, 6, 'h\n', '2021-01-23 23:51:08', 1),
(25, 7, 6, 'me\n', '2021-01-23 23:53:30', 1),
(26, 7, 6, 'me\n', '2021-01-23 23:54:01', 1),
(27, 7, 6, 'me\n', '2021-01-23 23:54:41', 1),
(28, 7, 6, 'me\n', '2021-01-23 23:55:04', 1),
(29, 4, 6, 'hi', '2021-01-23 23:55:27', 1),
(30, 1, 6, 'jeje', '2021-01-24 00:00:48', 1),
(31, 1, 6, 'jeje', '2021-01-24 05:41:38', 1),
(32, 1, 6, 'jeje', '2021-01-24 05:41:51', 1),
(33, 1, 6, 'hi', '2021-01-24 05:42:24', 1),
(34, 1, 6, 'hi', '2021-01-24 05:42:24', 1),
(35, 1, 6, 'hello', '2021-01-24 17:09:32', 1),
(36, 1, 6, 'hi', '2021-01-26 02:09:22', 1),
(37, 3, 6, 'hello', '2021-01-27 17:30:55', 1),
(38, 1, 6, 'hello', '2021-01-28 03:22:40', 1),
(39, 1, 6, 'hello me', '2021-01-28 03:23:02', 1),
(40, 1, 6, 'hi', '2021-01-29 06:19:04', 1),
(41, 1, 6, 'h', '2021-01-29 06:51:29', 1),
(42, 1, 6, 'koo', '2021-01-29 06:55:09', 1),
(43, 1, 6, 'koo', '2021-01-29 06:55:09', 1),
(44, 1, 6, 'koo', '2021-01-29 06:55:09', 1),
(45, 1, 6, 'koo', '2021-01-29 06:55:10', 1),
(46, 3, 6, 'h', '2021-01-29 06:57:31', 1),
(47, 1, 6, 'n', '2021-01-29 12:42:57', 1),
(48, 7, 6, 'm', '2021-01-29 12:43:50', 1),
(49, 7, 6, 'm', '2021-01-29 12:44:15', 1),
(50, 7, 6, 'm', '2021-01-29 12:44:42', 1),
(51, 7, 6, 'm', '2021-01-29 12:45:13', 1),
(52, 7, 6, 'm', '2021-01-29 12:45:39', 1),
(53, 7, 6, 'm', '2021-01-29 12:46:01', 1),
(54, 6, 6, 'h', '2021-01-29 12:46:32', 0),
(55, 6, 7, 'chi is here', '2021-01-29 12:48:19', 1),
(56, 6, 7, 'chi is here', '2021-01-29 12:48:42', 1),
(57, 6, 7, 'chi is here', '2021-01-29 12:49:08', 1),
(58, 6, 7, 'chi is here', '2021-01-29 12:49:38', 1),
(59, 6, 7, 'chi is here', '2021-01-29 12:50:00', 1),
(60, 3, 7, '', '2021-01-29 12:50:40', 1),
(61, 3, 7, 'hn', '2021-01-29 12:50:40', 1),
(62, 1, 7, 'nm', '2021-01-29 12:51:02', 1),
(63, 6, 7, 'nm', '2021-01-29 12:51:24', 1),
(64, 6, 7, 'nm', '2021-01-29 12:51:47', 1),
(65, 6, 7, 'nm', '2021-01-29 12:52:08', 1),
(66, 6, 7, 'nm', '2021-01-29 12:52:31', 1),
(67, 6, 7, 'nm', '2021-01-29 12:52:54', 1),
(68, 6, 7, 'nm', '2021-01-29 12:53:23', 1),
(69, 3, 7, 'nm', '2021-01-29 12:53:43', 1),
(70, 3, 7, 'nm', '2021-01-29 12:53:43', 1),
(71, 3, 7, 'nm', '2021-01-29 12:53:43', 1),
(72, 3, 7, 'nm', '2021-01-29 12:53:43', 1),
(73, 1, 7, 'n', '2021-01-29 19:32:29', 1),
(74, 2, 7, 'k', '2021-01-29 19:32:44', 1),
(75, 6, 7, 'm', '2021-01-29 19:33:16', 1),
(76, 6, 7, 'm', '2021-01-29 19:33:38', 1),
(77, 6, 7, 'm', '2021-01-29 19:33:55', 1),
(78, 6, 7, 'm', '2021-01-29 19:34:12', 1),
(79, 6, 7, 'm', '2021-01-29 19:34:29', 1),
(80, 8, 7, 'mm', '2021-01-29 19:34:47', 1),
(81, 8, 7, 'mm', '2021-01-29 19:34:47', 1),
(82, 6, 7, 'nm', '2021-01-29 19:34:48', 1),
(83, 6, 7, 'nm', '2021-01-29 19:35:07', 1),
(84, 6, 7, 'nm', '2021-01-29 19:35:27', 1),
(85, 6, 7, 'nm', '2021-01-29 19:35:46', 1),
(86, 6, 7, 'nm', '2021-01-29 19:36:04', 1),
(87, 6, 7, 'nm', '2021-01-29 19:36:27', 1),
(88, 6, 7, 'nm', '2021-01-29 19:36:45', 1),
(89, 6, 7, 'nm', '2021-01-29 19:37:08', 1),
(90, 6, 7, 'nm', '2021-01-29 19:37:28', 1),
(91, 2, 7, 'm', '2021-01-29 19:41:51', 1),
(92, 6, 7, 'n', '2021-01-29 19:41:57', 1),
(93, 1, 7, 'mm,', '2021-01-29 19:43:59', 1),
(94, 8, 7, 'nm', '2021-01-29 19:44:09', 1),
(95, 9, 7, 'mmmm', '2021-01-29 19:44:41', 1),
(96, 10, 7, 'mm', '2021-01-29 19:49:35', 1),
(97, 6, 7, '', '2021-01-29 19:49:49', 1),
(98, 2, 7, '', '2021-01-29 19:50:10', 1),
(99, 6, 7, '', '2021-01-29 19:50:27', 1),
(100, 6, 7, '', '2021-01-29 19:52:40', 1),
(101, 5, 7, 'm', '2021-01-29 19:52:54', 1),
(102, 6, 7, 'm', '2021-01-29 19:53:15', 1),
(103, 4, 7, 'mm', '2021-01-29 19:53:36', 1),
(104, 6, 7, ' mm', '2021-01-29 19:54:01', 1),
(105, 1, 7, 'mmm', '2021-01-29 19:54:16', 1),
(106, 8, 7, 'mm,', '2021-01-29 20:00:50', 1),
(107, 10, 7, 'm,,', '2021-01-29 20:01:01', 1),
(108, 9, 7, '  mnmm', '2021-01-29 20:01:18', 1),
(109, 9, 7, '  mnmm', '2021-01-29 20:01:34', 1),
(110, 9, 7, '  mnmm', '2021-01-29 20:01:35', 1),
(111, 9, 7, '  mnmm', '2021-01-29 20:01:36', 1),
(112, 9, 7, '  mnmm', '2021-01-29 20:01:38', 1),
(113, 9, 7, '  mnmm', '2021-01-29 20:01:40', 1),
(114, 9, 7, ',mmmmmmmmm', '2021-01-29 20:01:48', 1),
(115, 9, 7, ',mmmmmmmmm', '2021-01-29 20:01:50', 1),
(116, 9, 7, ',mmmmmmmmm', '2021-01-29 20:01:50', 1),
(117, 9, 7, ',mmmmmmmmm', '2021-01-29 20:01:50', 1),
(118, 9, 7, ',mmmmmmmmm', '2021-01-29 20:01:51', 1),
(119, 9, 7, ',mmmmmmmmm', '2021-01-29 20:01:51', 1),
(120, 9, 7, ',mmmmmmmmm', '2021-01-29 20:01:51', 1),
(121, 9, 7, ',mmmmmmmmm', '2021-01-29 20:01:51', 1),
(122, 9, 7, ',mmmmmmmmm', '2021-01-29 20:01:52', 1),
(123, 9, 7, ',mmmmmmmmm', '2021-01-29 20:01:52', 1),
(124, 9, 7, ',mmmmmmmmm', '2021-01-29 20:01:52', 1),
(125, 9, 7, ',mmmmmmmmm', '2021-01-29 20:01:53', 1),
(126, 9, 7, ',mmmmmmmmm', '2021-01-29 20:01:53', 1),
(127, 9, 7, ',mmmmmmmmm', '2021-01-29 20:01:53', 1),
(128, 9, 7, ',mmmmmmmmm', '2021-01-29 20:01:53', 1),
(129, 9, 7, ',mmmmmmmmm', '2021-01-29 20:01:53', 1),
(130, 9, 7, ',mmmmmmmmm', '2021-01-29 20:01:53', 1),
(131, 9, 7, ',mmmmmmmmm', '2021-01-29 20:01:54', 1),
(132, 9, 7, ',mmmmmmmmm', '2021-01-29 20:01:54', 1),
(133, 9, 7, ',mmmmmmmmm', '2021-01-29 20:01:54', 1),
(134, 9, 7, ',mmmmmmmmm', '2021-01-29 20:01:54', 1),
(135, 9, 7, ',mmmmmmmmm', '2021-01-29 20:01:55', 1),
(136, 9, 7, ',mmmmmmmmm', '2021-01-29 20:01:55', 1),
(137, 9, 7, ',mmmmmmmmm', '2021-01-29 20:01:55', 1),
(138, 9, 7, ',mmmmmmmmm', '2021-01-29 20:01:55', 1),
(139, 9, 7, ',mmmmmmmmm', '2021-01-29 20:01:55', 1),
(140, 9, 7, ',mmmmmmmmm', '2021-01-29 20:01:55', 1),
(141, 9, 7, ',mmmmmmmmm', '2021-01-29 20:01:56', 1),
(142, 9, 7, ',mmmmmmmmm', '2021-01-29 20:01:56', 1),
(143, 9, 7, ',mmmmmmmmm', '2021-01-29 20:01:56', 1),
(144, 9, 7, ',mmmmmmmmm', '2021-01-29 20:01:56', 1),
(145, 9, 7, ',mmmmmmmmm', '2021-01-29 20:01:56', 1),
(146, 9, 7, ',mmmmmmmmm', '2021-01-29 20:01:56', 1),
(147, 9, 7, ',mmmmmmmmm', '2021-01-29 20:01:57', 1),
(148, 9, 7, ',mmmmmmmmm', '2021-01-29 20:01:57', 1),
(149, 9, 7, ',mmmmmmmmm', '2021-01-29 20:01:57', 1),
(150, 9, 7, ',mmmmmmmmm', '2021-01-29 20:01:57', 1),
(151, 9, 7, ',mmmmmmmmm', '2021-01-29 20:01:57', 1),
(152, 9, 7, ',mmmmmmmmm', '2021-01-29 20:01:58', 1),
(153, 9, 7, ',mmmmmmmmm', '2021-01-29 20:01:58', 1),
(154, 9, 7, ',mmmmmmmmm', '2021-01-29 20:01:58', 1),
(155, 9, 7, ',mmmmmmmmm', '2021-01-29 20:01:58', 1),
(156, 9, 7, ',mmmmmmmmm', '2021-01-29 20:01:58', 1),
(157, 9, 7, ',mmmmmmmmm', '2021-01-29 20:01:59', 1),
(158, 9, 7, ',mmmmmmmmm', '2021-01-29 20:01:59', 1),
(159, 9, 7, ',mmmmmmmmm', '2021-01-29 20:01:59', 1),
(160, 9, 7, ',mmmmmmmmm', '2021-01-29 20:01:59', 1),
(161, 9, 7, ',mmmmmmmmm', '2021-01-29 20:01:59', 1),
(162, 9, 7, ',mmmmmmmmm', '2021-01-29 20:02:00', 1),
(163, 9, 7, ',mmmmmmmmm', '2021-01-29 20:02:00', 1),
(164, 9, 7, ',mmmmmmmmm', '2021-01-29 20:02:00', 1),
(165, 9, 7, ',mmmmmmmmm', '2021-01-29 20:02:00', 1),
(166, 9, 7, ',mmmmmmmmm', '2021-01-29 20:02:00', 1),
(167, 9, 7, ',mmmmmmmmm', '2021-01-29 20:02:01', 1),
(168, 9, 7, ',mmmmmmmmm', '2021-01-29 20:02:01', 1),
(169, 9, 7, ',mmmmmmmmm', '2021-01-29 20:02:01', 1),
(170, 9, 7, ',mmmmmmmmm', '2021-01-29 20:02:01', 1),
(171, 9, 7, ',mmmmmmmmm', '2021-01-29 20:02:01', 1),
(172, 9, 7, ',mmmmmmmmm', '2021-01-29 20:02:01', 1),
(173, 9, 7, ',mmmmmmmmm', '2021-01-29 20:02:02', 1),
(174, 9, 7, ',mmmmmmmmm', '2021-01-29 20:02:02', 1),
(175, 9, 7, ',mmmmmmmmm', '2021-01-29 20:02:02', 1),
(176, 9, 7, ',mmmmmmmmm', '2021-01-29 20:02:02', 1),
(177, 9, 7, ',mmmmmmmmm', '2021-01-29 20:02:02', 1),
(178, 9, 7, ',mmmmmmmmm', '2021-01-29 20:02:03', 1),
(179, 9, 7, ',mmmmmmmmm', '2021-01-29 20:02:03', 1),
(180, 9, 7, ',mmmmmmmmm', '2021-01-29 20:02:03', 1),
(181, 9, 7, ',mmmmmmmmm', '2021-01-29 20:02:03', 1),
(182, 9, 7, ',mmmmmmmmm', '2021-01-29 20:02:03', 1),
(183, 9, 7, ',mmmmmmmmm', '2021-01-29 20:02:04', 1),
(184, 9, 7, ',mmmmmmmmm', '2021-01-29 20:02:04', 1),
(185, 9, 7, ',mmmmmmmmm', '2021-01-29 20:02:04', 1),
(186, 9, 7, ',mmmmmmmmm', '2021-01-29 20:02:04', 1),
(187, 9, 7, ',mmmmmmmmm', '2021-01-29 20:02:04', 1),
(188, 9, 7, ',mmmmmmmmm', '2021-01-29 20:02:04', 1),
(189, 9, 7, ',mmmmmmmmm', '2021-01-29 20:02:05', 1),
(190, 9, 7, ',mmmmmmmmm', '2021-01-29 20:02:05', 1),
(191, 9, 7, ',mmmmmmmmm', '2021-01-29 20:02:05', 1),
(192, 9, 7, ',mmmmmmmmm', '2021-01-29 20:02:05', 1),
(193, 9, 7, ',mmmmmmmmm', '2021-01-29 20:02:05', 1),
(194, 9, 7, ',mmmmmmmmm', '2021-01-29 20:02:06', 1),
(195, 9, 7, ',mmmmmmmmm', '2021-01-29 20:02:06', 1),
(196, 9, 7, ',mmmmmmmmm', '2021-01-29 20:02:06', 1),
(197, 9, 7, ',mmmmmmmmm', '2021-01-29 20:02:06', 1),
(198, 9, 7, ',mmmmmmmmm', '2021-01-29 20:02:06', 1),
(199, 9, 7, ',mmmmmmmmm', '2021-01-29 20:02:07', 1),
(200, 9, 7, ',mmmmmmmmm', '2021-01-29 20:02:07', 1),
(201, 9, 7, ',mmmmmmmmm', '2021-01-29 20:02:07', 1),
(202, 9, 7, 'mm', '2021-01-29 20:02:15', 1),
(203, 8, 7, 'mm', '2021-01-29 20:02:27', 1),
(204, 6, 7, 'mmn', '2021-01-29 20:02:38', 1),
(205, 6, 7, 'nm', '2021-01-29 20:14:53', 1),
(206, 6, 7, 'NN', '2021-01-29 20:33:58', 1),
(207, 6, 7, 'mm', '2021-01-29 20:46:53', 1),
(208, 1, 7, 'mm', '2021-01-29 20:49:19', 1),
(209, 7, 6, 'm', '2021-01-29 20:55:15', 1),
(210, 7, 6, 'm', '2021-01-29 20:57:43', 1),
(211, 8, 7, 'm', '2021-01-29 20:58:08', 1),
(212, 7, 6, 'nm😜', '2021-01-29 20:59:02', 1),
(213, 8, 7, 'm', '2021-01-29 21:00:20', 1),
(214, 8, 7, '🖤', '2021-01-29 21:01:03', 1),
(215, 6, 7, 'm', '2021-01-29 21:02:39', 1),
(216, 6, 7, 'm', '2021-01-29 21:02:45', 1),
(217, 6, 7, 'm', '2021-01-29 21:02:47', 1),
(218, 9, 7, 'm', '2021-01-29 21:02:56', 1),
(219, 6, 7, 'bvbnj🤪', '2021-01-29 21:04:44', 1),
(220, 3, 6, ' nmm', '2021-01-29 21:05:08', 1),
(221, 7, 6, 'mnm', '2021-01-29 21:05:39', 1),
(222, 8, 7, 'mm', '2021-01-29 21:06:14', 1),
(223, 8, 7, 'break', '2021-01-29 21:06:29', 1),
(224, 7, 6, 'mn', '2021-01-29 21:06:43', 1),
(225, 7, 13, 'n', '2021-01-29 21:40:56', 1),
(226, 7, 13, 'm', '2021-01-29 21:41:10', 1),
(227, 8, 13, '  n', '2021-01-29 21:41:26', 1),
(228, 8, 13, '😝', '2021-01-29 21:41:35', 1),
(229, 4, 13, 'nnnn', '2021-01-29 21:41:51', 1),
(230, 9, 13, 'n', '2021-01-29 21:43:24', 1),
(231, 4, 6, 'b', '2021-01-29 23:07:58', 1),
(232, 7, 6, 'jk', '2021-01-29 23:55:22', 1),
(233, 1, 13, 'nm', '2021-01-29 23:55:49', 1),
(234, 7, 13, 'nm', '2021-01-29 23:56:25', 1),
(235, 1, 13, 'mm', '2021-01-30 00:13:54', 1),
(236, 7, 13, 'nm', '2021-01-30 00:17:08', 1),
(237, 8, 13, 'n', '2021-01-30 00:17:41', 1),
(238, 8, 13, '😍😝😛', '2021-01-30 00:18:00', 1),
(239, 8, 13, ' mmm', '2021-01-30 00:21:02', 1),
(240, 7, 13, 'nn', '2021-01-30 00:21:34', 1),
(241, 3, 13, 'cv', '2021-01-30 00:22:50', 1),
(242, 4, 13, 'cf', '2021-01-30 00:23:04', 1),
(243, 4, 13, 'ddd', '2021-01-30 00:23:29', 1),
(244, 7, 13, 'cdff', '2021-01-30 00:24:40', 1),
(245, 3, 13, 'ccc', '2021-01-30 00:32:10', 1),
(246, 7, 13, 'ccc', '2021-01-30 00:32:32', 1),
(247, 8, 7, 'c', '2021-01-30 00:33:33', 1),
(248, 7, 13, '😌', '2021-01-30 00:34:19', 1),
(249, 2, 13, 'xx', '2021-01-30 00:35:38', 1),
(250, 2, 13, '😂', '2021-01-30 00:35:49', 1),
(251, 7, 13, 'xxx', '2021-01-30 00:35:58', 1),
(252, 8, 13, '', '2021-01-30 00:45:56', 1),
(253, 1, 13, 'jj', '2021-01-30 00:54:17', 1),
(254, 2, 13, 'm', '2021-01-30 01:02:55', 1),
(255, 1, 13, 'kk', '2021-01-30 05:15:05', 1),
(256, 1, 13, 'kk', '2021-01-30 05:15:11', 1),
(257, 2, 13, 'm', '2021-01-30 05:15:33', 1),
(258, 2, 13, 'nm', '2021-01-30 05:21:48', 1),
(259, 1, 13, 'jn', '2021-01-30 05:22:15', 1),
(260, 3, 13, 'nm', '2021-01-31 05:13:05', 1),
(261, 2, 6, 'nnnn', '2021-02-10 14:05:26', 1),
(262, 6, 6, 'Is this Avaliable', '2021-02-16 07:30:36', 1),
(263, 13, 13, 'Is this Avaliable', '2021-02-16 07:31:47', 1),
(264, 6, 6, 'Is this Avaliable', '2021-02-16 07:33:14', 1),
(265, 0, 0, 'Is this Avaliable', '2021-02-16 07:41:01', 1),
(266, 0, 0, 'Is this Avaliable', '2021-02-16 07:41:34', 1),
(267, 0, 0, 'Is this Avaliable', '2021-02-16 07:43:25', 1),
(268, 0, 6, 'Is this Avaliable', '2021-02-16 07:55:53', 1),
(269, 6, 6, 'Is this Avaliable', '2021-02-16 07:57:11', 1),
(270, 13, 6, 'Is this Avaliable', '2021-02-16 07:58:05', 1),
(271, 13, 6, 'h', '2021-02-16 07:59:08', 1),
(272, 7, 6, 'Is this Avaliable', '2021-02-16 08:06:43', 1),
(273, 6, 6, 'Is this Avaliable', '2021-02-16 08:43:06', 1),
(274, 13, 6, 'hb nn', '2021-02-16 08:43:25', 1),
(275, 6, 6, 'Is this Avaliable', '2021-02-16 22:21:56', 1),
(276, 7, 6, 'huil', '2021-02-16 22:28:54', 1),
(277, 6, 6, 'Is this Avaliable', '2021-02-17 20:28:36', 1),
(278, 6, 6, 'Is this Avaliable', '2021-02-27 06:51:51', 1),
(279, 2, 6, 'nmnbm', '2021-02-27 22:10:46', 1),
(280, 6, 6, 'Is this Avaliable', '2021-03-04 20:42:32', 1),
(281, 6, 6, 'Is this Avaliable', '2021-03-04 20:42:42', 1),
(282, 6, 6, 'Is this Avaliable', '2021-03-04 20:42:42', 1),
(283, 6, 6, 'Is this Avaliable', '2021-03-26 20:02:27', 1),
(284, 13, 6, 'Is this Avaliable', '2021-03-26 20:04:29', 1),
(285, 6, 0, 'Is this Avaliable', '2021-03-26 21:08:51', 1),
(286, 6, 6, 'Is this Avaliable', '2021-03-26 21:09:44', 1),
(287, 6, 6, 'Is this Avaliable', '2021-03-26 23:01:41', 1),
(288, 6, 6, 'Is this Avaliable', '2021-03-26 23:05:10', 1),
(289, 6, 6, 'Is this Avaliable', '2021-03-26 23:09:33', 1),
(290, 6, 6, 'Is this Avaliable', '2021-03-26 23:15:06', 1),
(291, 6, 6, 'Is this Avaliable', '2021-03-26 23:43:16', 1),
(292, 6, 6, 'Is this Avaliable', '2021-03-26 23:45:04', 1),
(293, 6, 6, 'Is this Avaliable', '2021-03-26 23:47:57', 1),
(294, 6, 6, 'Is this Avaliable', '2021-03-26 23:47:57', 1),
(295, 6, 6, 'Is this Avaliable', '2021-03-30 19:59:02', 1),
(296, 6, 6, 'Is this Avaliable', '2021-03-30 19:59:02', 1),
(297, 6, 6, 'Is this Avaliable', '2021-03-30 20:02:39', 1),
(298, 6, 6, 'Is this Avaliable', '2021-03-30 20:02:39', 1),
(299, 6, 6, 'Is this Avaliable', '2021-03-30 20:05:28', 1),
(300, 6, 6, 'Is this Avaliable', '2021-03-30 20:05:28', 1),
(301, 6, 6, 'Is this Avaliable', '2021-03-31 18:04:02', 1),
(302, 6, 6, 'Is this Avaliable', '2021-03-31 18:04:02', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `contact_id` int(11) NOT NULL,
  `name` varchar(250) COLLATE utf8mb4_bin NOT NULL,
  `email` varchar(250) COLLATE utf8mb4_bin NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `message` text COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`contact_id`, `name`, `email`, `phone`, `message`) VALUES
(1, 'name', 'pad@gmail.com', '08130062780', 'what'),
(2, 'name', 'pad@gmail.com', '08130062780', 'what');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cust_id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `middlename` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `address` varchar(300) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `group_chat`
--

CREATE TABLE `group_chat` (
  `user_id` int(11) NOT NULL,
  `chat_txt` text NOT NULL,
  `time` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `log_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `action` varchar(100) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`log_id`, `user_id`, `action`, `date`) VALUES
(1, 1, 'added a new product 12 of flmjkrmklm', '2017-11-04 18:25:35'),
(2, 1, 'added a new product 34 of gdrgneknkl', '2017-11-04 18:26:04'),
(3, 1, 'added a new product 78 of bdkj', '2017-11-04 18:26:48'),
(4, 0, 'added a new product 133 of Arduino Meta', '2017-11-05 13:00:22'),
(5, 1, 'added a new product 477 of Sugo Peanuts', '2017-11-05 18:15:15'),
(6, 0, 'added a new product 123 of kmyygk', '2017-11-06 11:21:42'),
(7, 5, 'has logged in the system at ', '2017-11-06 21:53:21'),
(8, 1, '(Administrator) has logged in the system at ', '2017-11-06 21:56:17'),
(9, 5, 'has logged in the system at ', '2017-11-06 22:25:17'),
(10, 1, '(Administrator) has logged in the system at ', '2017-11-06 22:25:38'),
(11, 2, '(Administrator) has logged in the system at ', '2017-11-06 23:22:24'),
(12, 5, 'has logged in the system at ', '2017-11-07 00:08:10'),
(13, 1, '(Administrator) has logged in the system at ', '2017-11-07 10:14:23'),
(14, 1, '(Administrator) has logged in the system at ', '2017-11-07 10:33:43'),
(15, 1, '(Administrator) has logged in the system at ', '2017-11-07 10:36:37'),
(16, 1, '(Administrator) has logged in the system at ', '2017-11-07 10:39:08'),
(17, 1, '(Administrator) has logged in the system at ', '2017-11-07 10:39:41'),
(18, 4, 'has logged in the system at ', '2017-11-07 11:04:22'),
(19, 1, '(Administrator) has logged in the system at ', '2017-11-07 11:04:30'),
(20, 4, 'has logged in the system at ', '2017-11-07 11:44:36'),
(21, 4, 'has logged in the system at ', '2017-11-07 18:32:28'),
(22, 1, '(Administrator) has logged in the system at ', '2017-11-07 18:32:49'),
(23, 4, 'has logged in the system at ', '2017-11-07 18:34:55'),
(24, 1, '(Administrator) has logged in the system at ', '2017-11-07 18:39:23'),
(25, 1, 'added a new product 33 of San Marino Corned Tuna', '2017-11-07 18:40:25'),
(26, 1, 'added a new product 453 of 4535', '2017-11-07 18:43:34'),
(27, 1, '(Administrator) has logged in the system at ', '2017-11-07 19:16:29'),
(28, 1, '(Administrator) has logged in the system at ', '2017-11-07 19:17:07'),
(29, 4, 'has logged in the system at ', '2017-11-07 19:27:49'),
(30, 1, '(Administrator) has logged in the system at ', '2017-11-07 19:28:00'),
(31, 1, 'added 2 of Arduino Metad', '2017-11-07 19:28:43'),
(32, 1, '(Administrator) has logged in the system at ', '2017-11-07 22:40:11'),
(33, 1, 'added a new product 2 of 540 microfarad capacitor', '2017-11-07 22:42:03'),
(34, 1, '(Administrator) has logged in the system at ', '2017-11-07 23:43:49'),
(35, 4, 'has logged in the system at ', '2017-11-08 12:31:38'),
(36, 1, '(Administrator) has logged in the system at ', '2017-11-08 12:45:41'),
(37, 1, '(Administrator) has logged in the system at ', '2017-11-08 13:46:56'),
(38, 4, 'has logged in the system at ', '2017-11-08 13:56:15'),
(39, 4, 'has logged in the system at ', '2017-11-08 14:39:44'),
(40, 1, '(Administrator) has logged in the system at ', '2017-11-08 14:54:05'),
(41, 1, 'added 5 of 540 microfarad capacitor', '2017-11-08 15:04:55'),
(42, 4, 'has logged in the system at ', '2017-11-08 15:21:00'),
(43, 1, '(Administrator) has logged in the system at ', '2017-11-08 15:29:08'),
(44, 1, '(Administrator) has logged in the system at ', '2017-11-08 15:34:28'),
(45, 1, '(Administrator) has logged in the system at ', '2017-11-08 15:38:21'),
(46, 6, 'has logged in the system at ', '2017-11-08 19:29:55'),
(47, 1, '(Administrator) has logged in the system at ', '2017-11-08 19:32:24'),
(48, 6, 'has logged in the system at ', '2017-11-08 20:13:57'),
(49, 6, 'has logged in the system at ', '2017-11-08 20:20:43'),
(50, 1, '(Administrator) has logged in the system at ', '2017-11-08 20:46:23'),
(51, 6, 'has logged in the system at ', '2017-11-08 20:59:18'),
(52, 1, '(Administrator) has logged in the system at ', '2017-11-08 21:32:10'),
(53, 6, 'has logged in the system at ', '2017-11-08 21:34:41'),
(54, 1, '(Administrator) has logged in the system at ', '2017-11-08 21:39:31'),
(55, 1, 'added a new product 34 of Arduino Uno', '2017-11-08 21:40:51'),
(56, 6, 'has logged in the system at ', '2017-11-08 22:18:15'),
(57, 6, 'has logged in the system at ', '2017-11-08 22:19:58'),
(58, 1, '(Administrator) has logged in the system at ', '2017-11-08 22:56:12'),
(59, 6, 'has logged in the system at ', '2017-11-08 22:59:17'),
(60, 6, 'has logged in the system at ', '2017-11-09 15:21:55'),
(61, 6, 'has logged in the system at ', '2017-11-09 15:45:14'),
(62, 6, 'has logged in the system at ', '2017-11-09 15:46:39'),
(63, 6, 'has logged in the system at ', '2017-11-09 15:57:59'),
(64, 6, 'has logged in the system at ', '2017-11-09 16:34:47'),
(65, 6, 'has logged in the system at ', '2017-11-09 17:02:52'),
(66, 6, 'has logged in the system at ', '2017-11-09 19:54:15'),
(67, 6, 'has logged in the system at ', '2017-11-09 21:21:45'),
(68, 1, '(Administrator) has logged in the system at ', '2017-11-10 00:23:49'),
(69, 6, 'has logged in the system at ', '2017-11-10 00:24:25'),
(70, 1, '(Administrator) has logged in the system at ', '2017-11-10 00:54:01'),
(71, 6, 'has logged in the system at ', '2017-11-10 00:54:22'),
(72, 4, 'has logged in the system at ', '2017-11-10 01:38:17'),
(73, 6, 'has logged in the system at ', '2017-11-10 11:00:43'),
(74, 6, 'has logged in the system at ', '2017-11-10 23:53:20'),
(75, 6, 'has logged in the system at ', '2017-11-11 00:00:46'),
(76, 6, 'has logged in the system at ', '2017-11-11 00:10:29'),
(77, 6, 'has logged in the system at ', '2017-11-11 00:26:10'),
(78, 1, '(Administrator) has logged in the system at ', '2017-11-11 01:38:51'),
(79, 6, 'has logged in the system at ', '2017-11-12 01:36:32'),
(80, 6, 'has logged in the system at ', '2017-11-12 21:22:19'),
(81, 1, '(Administrator) has logged in the system at ', '2017-11-12 21:25:48'),
(82, 1, '(Administrator) has logged in the system at ', '2017-11-12 21:26:22'),
(83, 2, '(Administrator) has logged in the system at ', '2017-11-12 21:29:04'),
(84, 6, 'has logged in the system at ', '2017-11-12 21:45:12'),
(85, 2, '(Administrator) has logged in the system at ', '2017-11-12 21:47:14'),
(86, 6, 'has logged in the system at ', '2017-11-12 23:14:12'),
(87, 1, '(Administrator) has logged in the system at ', '2017-11-12 23:19:55'),
(88, 6, 'has logged in the system at ', '2017-11-12 23:22:32'),
(89, 6, 'has logged in the system at ', '2017-11-13 00:17:25'),
(90, 1, '(Administrator) has logged in the system at ', '2017-11-13 00:28:25'),
(91, 1, 'added a new product 150 of Arduino Uno Rec3-1', '2017-11-13 00:31:30'),
(92, 1, 'added a new product 400 of Aruino Mega', '2017-11-13 00:32:19'),
(93, 1, 'added a new product 344 of Arduino Uno 2', '2017-11-13 00:33:17'),
(94, 1, 'added a new product 234 of Raspberry Pi 3', '2017-11-13 00:34:22'),
(95, 1, 'added a new product 456 of Flame Sensor', '2017-11-13 00:35:28'),
(96, 6, 'has logged in the system at ', '2017-11-13 00:38:32'),
(97, 1, '(Administrator) has logged in the system at ', '2017-11-13 08:45:06'),
(98, 6, 'has logged in the system at ', '2017-11-13 08:47:34'),
(99, 1, '(Administrator) has logged in the system at ', '2017-11-13 08:53:46'),
(100, 7, 'has logged in the system at ', '2017-11-13 08:56:45'),
(101, 1, '(Administrator) has logged in the system at ', '2017-11-13 10:40:50'),
(102, 6, 'has logged in the system at ', '2017-11-13 10:42:37'),
(103, 1, '(Administrator) has logged in the system at ', '2017-11-13 10:55:02'),
(104, 6, 'has logged in the system at ', '2017-11-13 10:55:19'),
(105, 1, '(Administrator) has logged in the system at ', '2017-11-13 11:15:27'),
(106, 6, 'has logged in the system at ', '2017-11-13 11:15:38'),
(107, 1, '(Administrator) has logged in the system at ', '2017-11-13 11:31:48'),
(108, 6, 'has logged in the system at ', '2017-11-13 11:55:12'),
(109, 1, '(Administrator) has logged in the system at ', '2017-11-13 11:57:27'),
(110, 6, 'has logged in the system at ', '2017-11-13 11:59:22'),
(111, 1, '(Administrator) has logged in the system at ', '2017-11-13 12:00:16'),
(112, 6, 'has logged in the system at ', '2017-11-13 12:04:41'),
(113, 8, 'has logged in the system at ', '2017-11-13 13:05:00'),
(114, 2, '(Administrator) has logged in the system at ', '2017-11-13 13:16:17'),
(115, 2, 'added a new product 700 of Sensor', '2017-11-13 13:20:38'),
(116, 2, 'added 900 of Arduino Uno 2', '2017-11-13 13:20:57'),
(117, 6, 'has logged in the system at ', '2017-11-13 19:58:52'),
(118, 8, 'has logged in the system at ', '2017-11-13 20:00:59'),
(119, 1, '(Administrator) has logged in the system at ', '2017-11-13 20:01:58'),
(120, 1, '(Administrator) has logged in the system at ', '2017-11-13 21:47:41'),
(121, 6, 'has logged in the system at ', '2017-11-13 21:49:55'),
(122, 1, '(Administrator) has logged in the system at ', '2017-11-13 21:52:28'),
(123, 1, '(Administrator) has logged in the system at ', '2017-11-14 16:01:08'),
(124, 6, 'has logged in the system at ', '2017-11-17 01:43:42'),
(125, 6, 'has logged in the system at ', '2017-11-17 02:15:46'),
(126, 8, 'has logged in the system at ', '2017-11-21 20:19:39'),
(127, 8, 'has logged in the system at ', '2017-11-25 23:31:53'),
(128, 9, 'has logged in the system at ', '2018-10-12 19:52:39'),
(129, 9, 'has logged in the system at ', '2018-10-13 01:18:49'),
(130, 9, 'added a new product 26 of X9 THOR - Gaming Mouse', '2018-10-13 01:32:00'),
(131, 9, 'has logged in the system at ', '2018-10-13 01:50:19'),
(132, 6, 'has logged in the system at ', '2020-12-17 02:17:30'),
(133, 7, 'has logged in the system at ', '2020-12-17 02:22:16'),
(134, 6, 'has logged in the system at ', '2020-12-17 04:08:59'),
(135, 6, 'has logged in the system at ', '2020-12-17 05:57:27'),
(136, 6, 'has logged in the system at ', '2020-12-17 05:57:32'),
(137, 6, 'has logged in the system at ', '2020-12-17 05:57:33'),
(138, 6, 'has logged in the system at ', '2020-12-17 05:57:34'),
(139, 7, 'has logged in the system at ', '2020-12-17 05:57:43'),
(140, 6, 'has logged in the system at ', '2020-12-17 05:57:52'),
(141, 6, 'has logged in the system at ', '2020-12-17 05:58:28'),
(142, 6, 'has logged in the system at ', '2020-12-17 05:58:30'),
(143, 6, 'has logged in the system at ', '2020-12-17 05:58:34'),
(144, 6, 'has logged in the system at ', '2020-12-17 05:58:35'),
(145, 6, 'has logged in the system at ', '2020-12-17 05:59:46'),
(146, 6, 'has logged in the system at ', '2020-12-17 05:59:48'),
(147, 6, 'has logged in the system at ', '2020-12-17 06:00:36'),
(148, 6, 'has logged in the system at ', '2020-12-17 06:00:37'),
(149, 6, 'has logged in the system at ', '2020-12-17 06:01:05'),
(150, 6, 'has logged in the system at ', '2020-12-17 06:01:28'),
(151, 6, 'has logged in the system at ', '2020-12-17 06:02:18'),
(152, 6, 'has logged in the system at ', '2020-12-17 06:02:19'),
(153, 6, 'has logged in the system at ', '2020-12-17 06:02:54'),
(154, 6, 'has logged in the system at ', '2020-12-17 06:12:09'),
(155, 6, 'has logged in the system at ', '2020-12-17 06:20:30'),
(156, 6, 'has logged in the system at ', '2020-12-17 06:21:29'),
(157, 8, 'has logged in the system at ', '2020-12-18 06:18:12'),
(158, 6, 'has logged in the system at ', '2020-12-18 10:11:28'),
(159, 6, 'has logged in the system at ', '2020-12-18 10:24:50'),
(160, 6, 'has logged in the system at ', '2020-12-18 10:27:27'),
(161, 6, 'has logged in the system at ', '2020-12-18 10:46:22'),
(162, 6, 'has logged in the system at ', '2020-12-18 10:49:04'),
(163, 7, 'has logged in the system at ', '2020-12-18 11:00:17'),
(164, 6, 'has logged in the system at ', '2020-12-18 11:01:59'),
(165, 6, 'has logged in the system at ', '2020-12-18 11:01:59'),
(166, 6, 'has logged in the system at ', '2020-12-18 11:04:10'),
(167, 6, 'has logged in the system at ', '2020-12-18 11:11:21'),
(168, 6, 'has logged in the system at ', '2020-12-18 11:21:04'),
(169, 7, 'has logged in the system at ', '2020-12-18 11:21:42'),
(170, 0, 'has logged in the system at ', '2020-12-18 11:41:21'),
(171, 0, 'has logged in the system at ', '2020-12-18 11:41:24'),
(172, 0, 'has logged in the system at ', '2020-12-18 11:41:26'),
(173, 0, 'has logged in the system at ', '2020-12-18 11:42:03'),
(174, 6, 'has logged in the system at ', '2020-12-18 11:42:15'),
(175, 7, 'has logged in the system at ', '2020-12-18 11:50:42'),
(176, 6, 'has logged in the system at ', '2020-12-18 22:50:02'),
(177, 6, 'has logged in the system at ', '2020-12-19 00:47:52'),
(178, 6, 'has logged in the system at ', '2020-12-19 00:50:09'),
(179, 7, 'has logged in the system at ', '2020-12-19 00:53:14'),
(180, 6, 'has logged in the system at ', '2020-12-19 00:54:51'),
(181, 7, 'has logged in the system at ', '2020-12-19 12:39:45'),
(182, 6, 'has logged in the system at ', '2020-12-19 12:44:06'),
(183, 6, 'has logged in the system at ', '2020-12-19 13:34:27'),
(184, 6, 'has logged in the system at ', '2020-12-19 16:42:30'),
(185, 7, 'has logged in the system at ', '2020-12-19 18:26:20'),
(186, 6, 'has logged in the system at ', '2020-12-20 02:34:24'),
(187, 7, 'has logged in the system at ', '2020-12-20 03:01:15'),
(188, 6, 'has logged in the system at ', '2020-12-20 03:05:09'),
(189, 7, 'has logged in the system at ', '2020-12-20 03:07:43'),
(190, 6, 'has logged in the system at ', '2020-12-20 06:30:44'),
(191, 6, 'has logged in the system at ', '2020-12-21 16:59:03'),
(192, 7, 'has logged in the system at ', '2020-12-22 17:57:43'),
(193, 7, 'has logged in the system at ', '2020-12-22 18:05:52'),
(194, 6, 'has logged in the system at ', '2020-12-23 16:48:45'),
(195, 6, 'has logged in the system at ', '2020-12-23 16:59:16'),
(196, 7, 'has logged in the system at ', '2020-12-23 17:01:44'),
(197, 6, 'has logged in the system at ', '2020-12-24 05:59:30'),
(198, 6, 'has logged in the system at ', '2020-12-24 17:56:24'),
(199, 6, 'has logged in the system at ', '2020-12-24 18:31:46'),
(200, 7, 'has logged in the system at ', '2020-12-24 18:51:23'),
(201, 6, 'has logged in the system at ', '2020-12-24 18:55:12'),
(202, 6, 'has logged in the system at ', '2020-12-25 00:52:33'),
(203, 6, 'has logged in the system at ', '2020-12-27 21:40:39'),
(204, 6, 'has logged in the system at ', '2020-12-27 21:48:15'),
(205, 6, 'has logged in the system at ', '2020-12-28 09:31:53'),
(206, 7, 'has logged in the system at ', '2020-12-28 22:06:53'),
(207, 6, 'has logged in the system at ', '2020-12-29 15:29:00'),
(208, 7, 'has logged in the system at ', '2020-12-29 17:39:36'),
(209, 6, 'has logged in the system at ', '2020-12-31 00:45:59'),
(210, 7, 'has logged in the system at ', '2020-12-31 00:53:45'),
(211, 6, 'has logged in the system at ', '2021-01-04 16:20:14'),
(212, 6, 'has logged in the system at ', '2021-01-05 12:45:51'),
(213, 7, 'has logged in the system at ', '2021-01-08 20:10:32'),
(214, 6, 'has logged in the system at ', '2021-01-09 15:00:11'),
(215, 6, 'has logged in the system at ', '2021-01-10 21:02:42'),
(216, 6, 'has logged in the system at ', '2021-01-15 12:48:07'),
(217, 6, 'has logged in the system at ', '2021-01-20 11:05:58'),
(218, 7, 'has logged in the system at ', '2021-01-24 06:33:52'),
(219, 7, 'has logged in the system at ', '2021-01-24 06:39:29'),
(220, 6, 'has logged in the system at ', '2021-01-24 07:50:54'),
(221, 6, 'has logged in the system at ', '2021-01-25 00:38:31'),
(222, 6, 'has logged in the system at ', '2021-01-26 11:26:34'),
(223, 7, 'has logged in the system at ', '2021-01-26 22:44:35'),
(224, 6, 'has logged in the system at ', '2021-01-28 00:24:51'),
(225, 6, 'has logged in the system at ', '2021-01-28 01:51:17'),
(226, 7, 'has logged in the system at ', '2021-01-29 20:47:41'),
(227, 6, 'has logged in the system at ', '2021-01-30 04:51:57'),
(228, 7, 'has logged in the system at ', '2021-01-30 04:57:06'),
(229, 6, 'has logged in the system at ', '2021-01-30 04:57:24'),
(230, 13, 'has logged in the system at ', '2021-01-30 05:12:53'),
(231, 13, 'has logged in the system at ', '2021-01-30 05:25:45'),
(232, 6, 'has logged in the system at ', '2021-01-30 05:31:53'),
(233, 13, 'has logged in the system at ', '2021-01-30 08:15:28'),
(234, 7, 'has logged in the system at ', '2021-01-30 08:33:08'),
(235, 6, 'has logged in the system at ', '2021-02-10 21:55:28'),
(236, 6, 'has logged in the system at ', '2021-02-13 14:24:42'),
(237, 6, 'has logged in the system at ', '2021-02-15 06:31:51'),
(238, 6, 'has logged in the system at ', '2021-02-16 12:02:31'),
(239, 6, 'has logged in the system at ', '2021-02-17 06:13:42'),
(240, 6, 'has logged in the system at ', '2021-02-17 10:58:58'),
(241, 6, 'has logged in the system at ', '2021-02-18 04:21:18'),
(242, 6, 'has logged in the system at ', '2021-02-19 04:39:39'),
(243, 6, 'has logged in the system at ', '2021-02-19 06:01:04'),
(244, 6, 'has logged in the system at ', '2021-02-19 10:42:30'),
(245, 6, 'has logged in the system at ', '2021-02-26 01:37:09'),
(246, 6, 'has logged in the system at ', '2021-02-26 05:09:23'),
(247, 6, 'has logged in the system at ', '2021-02-26 22:31:58'),
(248, 6, 'has logged in the system at ', '2021-02-28 06:08:42'),
(249, 6, 'has logged in the system at ', '2021-03-01 07:04:52'),
(250, 6, 'has logged in the system at ', '2021-03-04 08:30:07'),
(251, 6, 'has logged in the system at ', '2021-03-04 08:47:34'),
(252, 6, 'has logged in the system at ', '2021-03-05 02:43:08'),
(253, 6, 'has logged in the system at ', '2021-03-26 04:22:22'),
(254, 6, 'has logged in the system at ', '2021-03-27 05:40:03'),
(255, 6, 'has logged in the system at ', '2021-03-27 05:57:51'),
(256, 6, 'has logged in the system at ', '2021-03-27 16:23:35'),
(257, 6, 'has logged in the system at ', '2021-03-31 03:41:38'),
(258, 6, 'has logged in the system at ', '2021-03-31 04:00:07');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `track_num` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `middlename` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `shipping_add` varchar(500) NOT NULL,
  `order_date` datetime NOT NULL,
  `status` varchar(100) NOT NULL,
  `totalprice` decimal(10,2) NOT NULL,
  `tax` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `order_details_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `prod_qty` int(11) NOT NULL,
  `total_qty` varchar(30) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_id` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`order_details_id`, `prod_id`, `prod_qty`, `total_qty`, `total`, `user_id`, `order_id`) VALUES
(53, 13, 1, '338', '434.00', 6, '1'),
(54, 13, 3, '335', '1302.00', 6, '1'),
(55, 13, 1, '334', '434.00', 6, '1'),
(56, 11, 1, '149', '125.00', 6, '1'),
(57, 12, 1, '397', '155.00', 6, '1'),
(58, 11, 1, '149', '125.00', 6, '1'),
(59, 13, 1, '329', '434.00', 6, '1'),
(60, 13, 1, '328', '434.00', 6, '1'),
(61, 13, 1, '327', '434.00', 6, '1'),
(62, 12, 2, '395', '310.00', 6, '1'),
(63, 13, 2, '325', '868.00', 6, '1'),
(64, 13, 1, '324', '434.00', 6, '1'),
(65, 11, 1, '148', '125.00', 6, '1'),
(66, 13, 1, '323', '434.00', 6, '1'),
(67, 11, 1, '147', '125.00', 6, '1'),
(68, 12, 1, '394', '155.00', 6, '1'),
(69, 12, 1, '393', '155.00', 6, '1'),
(70, 13, 1, '322', '434.00', 7, '1'),
(71, 11, 1, '146', '125.00', 7, '1'),
(72, 13, 1, '321', '434.00', 7, '1'),
(73, 13, 1, '320', '434.00', 7, '1'),
(74, 13, 1, '319', '434.00', 7, '1'),
(75, 13, 1, '318', '434.00', 6, '1'),
(76, 13, 3, '315', '1302.00', 6, '1'),
(77, 13, 1, '314', '434.00', 6, '1'),
(78, 13, 1, '313', '434.00', 6, '1'),
(79, 14, 1, '233', '760.00', 6, '1'),
(80, 13, 1, '311', '434.00', 6, '1'),
(81, 13, 2, '309', '868.00', 6, '1'),
(83, 14, 1, '233', '760.00', 6, '1'),
(84, 13, 1, '308', '434.00', 6, '1'),
(85, 15, 1, '455', '455.00', 6, '1'),
(86, 11, 1, '145', '125.00', 6, '1'),
(87, 13, 1, '306', '434.00', 6, '1'),
(88, 13, 1, '304', '434.00', 6, '1'),
(89, 13, 1, '303', '434.00', 6, '1'),
(90, 13, 1, '302', '434.00', 6, '1'),
(91, 14, 1, '232', '760.00', 6, '1'),
(92, 13, 1, '300', '434.00', 6, '1'),
(93, 14, 10, '222', '7600.00', 8, '1'),
(94, 13, 200, '0', '86800.00', 8, '1'),
(95, 13, 300, '0', '130200.00', 8, '1'),
(96, 11, 1, '144', '125.00', 6, '1'),
(97, 11, 144, '0', '18000.00', 6, '1'),
(98, 15, 1, '454', '455.00', 5, ''),
(99, 15, 1, '454', '455.00', 6, '1'),
(100, 16, 1, '', '1500.00', 6, '1'),
(101, 12, 1, '392', '155.00', 8, '1'),
(102, 12, 1, '391', '155.00', 8, '1'),
(103, 15, 1, '454', '455.00', 8, ''),
(104, 14, 1, '221', '760.00', 9, '1'),
(105, 17, 1, '25', '2200.00', 9, '1'),
(107, 15, 17, '454', '7735.00', 6, '1'),
(110, 0, 1, '', '500.00', 6, '1'),
(111, 1420, 0, '', '0.00', 6, '1'),
(115, 1422, 1, '-1', '1500000.00', 6, '1'),
(116, 1421, 1, '-1', '4500.00', 6, '1'),
(117, 1422, 1, '-1', '1500000.00', 6, '1'),
(119, 1423, 1, '-1', '450.00', 6, '1');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `sales_id` int(11) NOT NULL,
  `payment` decimal(10,2) NOT NULL,
  `payment_date` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `due` decimal(10,2) NOT NULL,
  `status` varchar(50) NOT NULL,
  `or_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `prod_id` int(11) NOT NULL,
  `prod_name` varchar(50) NOT NULL,
  `prod_desc` varchar(500) NOT NULL,
  `prod_qty` int(11) NOT NULL,
  `prod_cost` decimal(10,2) NOT NULL,
  `prod_price` decimal(10,2) NOT NULL,
  `category` varchar(100) NOT NULL,
  `supplier` varchar(100) NOT NULL,
  `prod_serial` varchar(50) NOT NULL,
  `prod_pic1` varchar(500) NOT NULL,
  `prod_pic2` varchar(500) NOT NULL,
  `prod_pic3` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`prod_id`, `prod_name`, `prod_desc`, `prod_qty`, `prod_cost`, `prod_price`, `category`, `supplier`, `prod_serial`, `prod_pic1`, `prod_pic2`, `prod_pic3`) VALUES
(11, 'Arduino Uno Rec3-1', 'Small Arduino Uno Blue', 0, '123.00', '125.00', 'Arduino', 'Alcatroz, Inc.', '1122330099', 'arduino mega 2560-1.jpg', 'Arduino Uno Rev3-1.jpg', '1.png'),
(12, 'Aruino Mega', 'ATMega Arduino', 391, '133.00', '155.00', 'Arduino', 'Alcatroz, Inc.', '341156780', 'Arduinomega2560-3.jpg', 'arduino mega 2560-1.jpg', '2.png'),
(14, 'Raspberry Pi 3', 'Model B+', 221, '700.00', '760.00', 'Raspberry Pi', 'PICC', '45422791', 'raspi2.jpg', 'raspi.jpg', 'raspi3.png'),
(15, 'Flame Sensor', 'Flame Sensor 3 Pins', 454, '450.00', '455.00', 'Sensor', 'QUEZELCO', '456523702', 'flame2.jpg', 'flamesensor1.jpg', 'flamesensor.png'),
(16, 'Sensor', 'Able to sense product', 700, '1500.00', '1500.00', 'Sensor', 'QUEZELCO', '890', 'ultrasonic sensor.png', 'motion sensor2.jpg', 'flamesensor1.jpg'),
(17, 'X9 THOR - Gaming Mouse', '7D Macro Programmable Gaming Mouse, Sensor: A714 Instan, LED: RGB 16.8 million colors, Interface : USB, DPI: 4800dpi, Cable Length: 1.8m nylon braided, Supported OS: Windows Vista, Win7/8/10, Mac OS X 10.5 or later, Linux, Chrome OS', 25, '1000.00', '2200.00', 'Others', 'Alcatroz, Inc.', '1353', 'x9thor.jpg', 'x92.jpg', 'x93.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE `replies` (
  `comment_id` int(11) NOT NULL,
  `parent_comment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `comment` varchar(150) COLLATE utf8mb4_bin NOT NULL,
  `timeCreated` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `replies`
--

INSERT INTO `replies` (`comment_id`, `parent_comment_id`, `user_id`, `post_id`, `comment`, `timeCreated`) VALUES
(11, 0, 13, 1, 'men', '2021-02-01 04:49:05'),
(12, 0, 13, 1, 'men', '2021-02-01 04:49:05'),
(13, 0, 13, 1, 'men', '2021-02-01 04:49:05'),
(14, 0, 13, 1, 'men', '2021-02-01 04:49:05'),
(15, 0, 13, 1, 'men', '2021-02-01 04:49:05'),
(16, 0, 13, 1, 'men', '2021-02-01 04:49:05'),
(17, 0, 13, 1, 'men', '2021-02-01 04:49:06'),
(18, 0, 13, 1, 'men', '2021-02-01 04:49:06');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `sales_id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount_due` decimal(10,2) NOT NULL,
  `date_added` datetime NOT NULL,
  `mode_of_payment` varchar(100) NOT NULL,
  `total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sales_details`
--

CREATE TABLE `sales_details` (
  `sales_details_id` int(11) NOT NULL,
  `sales_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supp_id` int(11) NOT NULL,
  `supp_name` varchar(100) NOT NULL,
  `supp_address` varchar(200) NOT NULL,
  `supp_contact` varchar(50) NOT NULL,
  `supp_email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supp_id`, `supp_name`, `supp_address`, `supp_contact`, `supp_email`) VALUES
(1, 'PICC', 'Manila, Phils.', '(987)-884-12', 'picc@email.moto!'),
(2, 'QUEZELCO', 'Infanta, Quezon', '45643534567879', 'emal'),
(4, 'Alcatroz, Inc.', 'Sta. Mesa Manila', '9435398928', 'none');

-- --------------------------------------------------------

--
-- Table structure for table `temp_trans`
--

CREATE TABLE `temp_trans` (
  `temp_trans_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `trans_id` int(11) NOT NULL,
  `or_no` int(11) NOT NULL,
  `prod_serial` varchar(50) NOT NULL,
  `prod_name` varchar(100) NOT NULL,
  `trans_qty` int(11) NOT NULL,
  `ppi` decimal(10,0) NOT NULL,
  `cust_fullname` varchar(100) NOT NULL,
  `transdate` datetime NOT NULL,
  `tax` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `middlename` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `address` varchar(300) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `birthday_date` varchar(50) NOT NULL,
  `pawn_join_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `firstname`, `middlename`, `lastname`, `address`, `email`, `contact`, `username`, `phone`, `password`, `gender`, `birthday_date`, `pawn_join_date`) VALUES
(1, 'Paschal', 'Nnanna', 'Nwokeocha', '0987', '0987', '0987', '0987', '08120062780', 'a1Bz20ydqelm8m1wql9e1e06ec8e02f0a0074f2fcc6b26303b', 'Male', '01/15/2020', '2020-12-19 11:44:51'),
(2, 'pascah', 'Vincent', 'Ramos', 'Luisiana', 'email@email', '8979677836432', 'pascah', '08130062780', 'a1Bz20ydqelm8m1wql60d6acbd6aa032526c5ebf214719d427', 'Male', '01/15/2020', '2020-12-16 18:12:16'),
(3, 'Chikeze', 'N', 'Boss', 'Louis', 'none', '83954390', 'clarkpogi', '08123062780', 'a1Bz20ydqelm8m1wql7c6f5bdc16b3748b481fb5ea98bd4ace', 'Male', '01/15/2020', '2020-12-19 11:55:30'),
(4, 'John Shalom', 'nwokeocha', 'Barlos', 'jkfhjksdhfjks', 'jerushalombarlos@gmail.com', '8998989', 'chikeze', '08123006780', 'a1Bz20ydqelm8m1wql827ccb0eea8a706c4c34a16891f84e7b', 'Female', '01/15/2020', '2020-12-16 18:12:16'),
(5, 'Halt', 'Jr', 'Den', 'espn', 'harryden@mail.com', '9876543210', 'people', '08123006270', 'a1Bz20ydqelm8m1wqld3915844cde56f2dccfd24c7d34d12f0', 'Female', '01/15/2020', '2020-12-16 18:12:16'),
(6, 'trouble', 'chikwado', 'alliye', 'uburu ai ebonyi', 'pp@gmail.com', 'last last ', 'paschal', '08130062780', 'a1Bz20ydqelm8m1wqlc90bbc012d2e5e9b291846f5e22cc92e', 'Male', '5654-05-05', '2020-12-16 18:17:25'),
(7, 'trouble', 'Nteshi', 'chichi', 'qwer', 'pad@gmail.com', 'well', 'chinyere', '08130062780', 'a1Bz20ydqelm8m1wqlc90bbc012d2e5e9b291846f5e22cc92e', 'Female', '0008-08-08', '2021-01-26 14:47:54'),
(8, 'paschal', 'chikwado', 'nwokeocha', 'uburu ai ebonyi', 'pp@gmail.com', 'last last ', 'paschal1', '08130062780', 'a1Bz20ydqelm8m1wqlc90bbc012d2e5e9b291846f5e22cc92e', 'Male', '2020-12-17', '2020-12-17 22:18:04'),
(9, 'chichi', 'Itenshi', 'Faith', 'uburu ai ebonyi', 'itenshi@gmail.com', '08130062780', 'chichi', '08130062780', 'a1Bz20ydqelm8m1wqlc90bbc012d2e5e9b291846f5e22cc92e', 'Female', '2020-12-18', '2020-12-24 10:02:34'),
(10, 'louia', 'nwizi', 'ob', 'ogbuchi amachi', 'nwizilouis@gmail.com', 'amachi', 'lous', '08130062780', 'a1Bz20ydqelm8m1wql4a277a2c1e913d9b5e1bba0d44d2389c', 'Male', '2020-12-18', '2020-12-27 13:45:09'),
(11, 'paschal', 'pope', 'alliye', 'well', 'well@gmail.com', 'ghjkl', 'louis', '08130062780', 'a1Bz20ydqelm8m1wqlc90bbc012d2e5e9b291846f5e22cc92e', 'Male', '2020-12-19', '2020-12-27 13:48:04'),
(12, 'lord', 'God', 'Father', 'bella', 'bella@gmail.com', 'bello', 'lord', '08130062780', 'a1Bz20ydqelm8m1wql4a277a2c1e913d9b5e1bba0d44d2389c', 'Male', '2021-10-31', '2021-01-29 21:10:51'),
(13, 'lord', 'pope', 'nwokeocha', 'uburu ai ebonyi', 'itenshi1@gmail.com', 'last last ', 'admin', '08130062780', 'a1Bz20ydqelm8m1wql21232f297a57a5a743894a0e4a801fc3', 'Male', '2021-01-14', '2021-01-29 21:12:19');

-- --------------------------------------------------------

--
-- Table structure for table `users_notice`
--

CREATE TABLE `users_notice` (
  `notice_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `notice_txt` varchar(120) NOT NULL,
  `notice_time` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_cover_pic`
--

CREATE TABLE `user_cover_pic` (
  `user_id` int(11) NOT NULL,
  `image` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_cover_pic`
--

INSERT INTO `user_cover_pic` (`user_id`, `image`) VALUES
(1, '999584_496501817111249_1587007043_n.jpg'),
(1, '999584_496501817111249_1587007043_n.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `user_id` int(11) NOT NULL,
  `job` varchar(100) NOT NULL,
  `school_or_collage` varchar(100) NOT NULL,
  `current_city` varchar(100) NOT NULL,
  `hometown` varchar(100) NOT NULL,
  `relationship_status` varchar(30) NOT NULL,
  `phone` varchar(250) NOT NULL,
  `phone_no_priority` varchar(10) NOT NULL,
  `website` varchar(100) NOT NULL,
  `pawn_ID` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_post`
--

CREATE TABLE `user_post` (
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_txt` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `qauntity` int(50) NOT NULL,
  `post_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `priority` varchar(8) NOT NULL,
  `post_pic` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_post`
--

INSERT INTO `user_post` (`post_id`, `user_id`, `post_txt`, `price`, `qauntity`, `post_time`, `priority`, `post_pic`) VALUES
(78, 1, 'Join pawn', '0.00', 0, '0000-00-00 00:00:00', 'Public', ''),
(79, 6, 'dfgf', '0.00', 0, '0000-00-00 00:00:00', 'Public', '1608142683_11088_597121773765299_1063555357605134493_n (1).jpg'),
(80, 6, 'let me post again ooh', '0.00', 0, '0000-00-00 00:00:00', 'Public', '1608142801_2.png'),
(81, 7, 'we', '0.00', 0, '0000-00-00 00:00:00', 'Public', '1608143950_11088_597121773765299_1063555357605134493_n.jpg'),
(82, 7, 'we', '0.00', 0, '0000-00-00 00:00:00', 'Public', '1608143992_11088_597121773765299_1063555357605134493_n.jpg'),
(83, 7, 'sd', '0.00', 0, '0000-00-00 00:00:00', 'Public', '1608144001_11088_597121773765299_1063555357605134493_n (1).jpg'),
(84, 7, 'we', '45.00', 0, '0000-00-00 00:00:00', 'Public', '1608144452_12820_597121673765309_310876763987439355_n.jpg'),
(85, 7, 'we', '45.00', 0, '0000-00-00 00:00:00', 'Public', '1608144493_12820_597121673765309_310876763987439355_n.jpg'),
(86, 7, 'frrr', '7800000.00', 0, '0000-00-00 00:00:00', 'Public', '1608144511_11088_597121773765299_1063555357605134493_n (1).jpg'),
(87, 7, '', '0.00', 0, '0000-00-00 00:00:00', 'Public', '1608146764_11088_597121773765299_1063555357605134493_n.jpg'),
(88, 7, '', '0.00', 0, '0000-00-00 00:00:00', 'Public', '1608146827_11088_597121773765299_1063555357605134493_n.jpg'),
(89, 7, '', '0.00', 0, '0000-00-00 00:00:00', 'Public', '1608146913_12820_597121673765309_310876763987439355_n.jpg'),
(112, 6, 'god forbid', '1000000.00', 0, '0000-00-00 00:00:00', 'Public', '1608193145_301966_1969413523036_500315355_n.jpg'),
(113, 6, 'god forbid', '1000000.00', 0, '0000-00-00 00:00:00', 'Public', '1608193170_301966_1969413523036_500315355_n.jpg'),
(114, 6, 'god forbid', '1000000.00', 0, '0000-00-00 00:00:00', 'Public', '1608193215_301966_1969413523036_500315355_n.jpg'),
(115, 6, 'god forbid', '1000000.00', 0, '0000-00-00 00:00:00', 'Public', '1608193765_301966_1969413523036_500315355_n.jpg'),
(116, 6, 'god forbid', '1000000.00', 0, '0000-00-00 00:00:00', 'Public', '1608195543_301966_1969413523036_500315355_n.jpg'),
(117, 6, 'weesd', '0.00', 0, '0000-00-00 00:00:00', 'Public', ''),
(118, 6, 'weesd', '0.00', 0, '0000-00-00 00:00:00', 'Public', ''),
(119, 6, 'weesd', '0.00', 0, '0000-00-00 00:00:00', 'Public', ''),
(120, 6, 'weesd', '0.00', 0, '0000-00-00 00:00:00', 'Public', ''),
(121, 6, 'weesd', '0.00', 0, '0000-00-00 00:00:00', 'Public', ''),
(122, 6, 'weesd', '0.00', 0, '0000-00-00 00:00:00', 'Public', ''),
(123, 6, 'weesd', '0.00', 0, '0000-00-00 00:00:00', 'Public', ''),
(124, 6, 'weesd', '0.00', 0, '0000-00-00 00:00:00', 'Public', ''),
(125, 6, 'weesd', '0.00', 0, '0000-00-00 00:00:00', 'Public', ''),
(126, 6, 'weesd', '0.00', 0, '0000-00-00 00:00:00', 'Public', ''),
(128, 6, 'weesd', '0.00', 0, '0000-00-00 00:00:00', 'Public', ''),
(129, 6, 'good', '45.00', 0, '0000-00-00 00:00:00', 'Public', ''),
(130, 6, 'good', '45.00', 0, '0000-00-00 00:00:00', 'Public', ''),
(131, 6, 'good', '45.00', 0, '0000-00-00 00:00:00', 'Public', ''),
(132, 6, 'good', '45.00', 0, '0000-00-00 00:00:00', 'Public', ''),
(133, 6, 'god forbid', '1000000.00', 0, '0000-00-00 00:00:00', 'Public', '1608202335_301966_1969413523036_500315355_n.jpg'),
(137, 6, 'we', '0.00', 0, '0000-00-00 00:00:00', 'Public', ''),
(1274, 6, 'added a new photo.', '0.00', 0, '0000-00-00 00:00:00', 'Public', ''),
(1275, 6, 'added a new photo.', '0.00', 0, '0000-00-00 00:00:00', 'Public', ''),
(1276, 6, 'wrtrew', '7800000.00', 0, '0000-00-00 00:00:00', 'Public', '3.png'),
(1277, 6, 'wrtrew', '7800000.00', 0, '0000-00-00 00:00:00', 'Public', '3.png'),
(1278, 6, 'wrtrew', '7800000.00', 0, '0000-00-00 00:00:00', 'Public', '3.png'),
(1279, 6, 'wrtrew', '7800000.00', 0, '0000-00-00 00:00:00', 'Public', '3.png'),
(1327, 8, 'wqetyk', '4552.00', 0, '2020-12-01 08:16:24', 'Public', '1608243512_2.png'),
(1328, 8, 'we move', '0.00', 0, '2020-12-02 08:15:36', 'Public', '3.png'),
(1331, 6, 'wqetyk', '4552.00', 0, '0000-00-00 00:00:00', 'Public', '1608303883_2.png'),
(1332, 7, 'we', '200.00', 0, '0000-00-00 00:00:00', 'Public', '1608366276_module_table_top.png'),
(1333, 7, 'biko let me post what i can see', '400.00', 0, '0000-00-00 00:00:00', 'Public', '1608366570_module_table_top.png'),
(1334, 7, 'what is this', '12.00', 0, '0000-00-00 00:00:00', 'Public', '1608366734_module_table_top.png'),
(1335, 7, 'what is this', '12.00', 0, '0000-00-00 00:00:00', 'Public', '1608367062_module_table_top.png'),
(1336, 7, 'weeeeeee', '4500.00', 0, '0000-00-00 00:00:00', 'Public', '1608367083_module_table_bottom.png'),
(1337, 7, 'when when ', '478.00', 0, '0000-00-00 00:00:00', 'Public', '1608367282_module_table_top.png'),
(1338, 6, 'let me post and see', '456.00', 0, '0000-00-00 00:00:00', 'Public', '1608369085_vlcsnap-error193.png'),
(1339, 6, '', '0.00', 0, '0000-00-00 00:00:00', 'Public', '1608369421_vlcsnap-error193.png'),
(1340, 6, '', '0.00', 0, '0000-00-00 00:00:00', 'Public', '1608369456_vlcsnap-error499.png'),
(1341, 6, 'i will keep posting ', '450.00', 0, '0000-00-00 00:00:00', 'Public', '1608369745_vlcsnap-error193.png'),
(1342, 6, 'i will keep posting ', '450.00', 0, '0000-00-00 00:00:00', 'Public', '1608370218_vlcsnap-error193.png'),
(1343, 7, '', '0.00', 0, '0000-00-00 00:00:00', 'Public', ''),
(1344, 7, '', '0.00', 0, '0000-00-00 00:00:00', 'Public', ''),
(1345, 7, '', '0.00', 0, '0000-00-00 00:00:00', 'Public', 'vlcsnap-error193.png'),
(1346, 7, '', '0.00', 0, '0000-00-00 00:00:00', 'Public', 'vlcsnap-error193.png'),
(1347, 7, '', '0.00', 0, '0000-00-00 00:00:00', 'Public', 'vlcsnap-error193.png'),
(1348, 7, '', '0.00', 0, '0000-00-00 00:00:00', 'Public', 'vlcsnap-error193.png'),
(1349, 7, '', '0.00', 0, '0000-00-00 00:00:00', 'Public', ''),
(1350, 7, '', '0.00', 0, '0000-00-00 00:00:00', 'Public', 'vlcsnap-error193.png'),
(1351, 7, '', '0.00', 0, '0000-00-00 00:00:00', 'Public', 'vlcsnap-error193.png'),
(1352, 7, 'WELL', '400.00', 0, '0000-00-00 00:00:00', 'Public', 'vlcsnap-error193.png'),
(1353, 7, '', '0.00', 0, '0000-00-00 00:00:00', 'Public', 'vlcsnap-error193.png'),
(1354, 7, '', '0.00', 0, '0000-00-00 00:00:00', 'Public', 'vlcsnap-error499.png'),
(1355, 7, '', '0.00', 0, '0000-00-00 00:00:00', 'Public', 'vlcsnap-error499.png'),
(1356, 7, '', '0.00', 0, '0000-00-00 00:00:00', 'Public', 'vlcsnap-error193.png'),
(1357, 7, '', '0.00', 0, '0000-00-00 00:00:00', 'Public', 'vlcsnap-error193.png'),
(1358, 7, '', '0.00', 0, '0000-00-00 00:00:00', 'Public', 'vlcsnap-error193.png'),
(1359, 6, '', '0.00', 0, '0000-00-00 00:00:00', 'Public', 'vlcsnap-error193.png'),
(1360, 6, '', '0.00', 0, '0000-00-00 00:00:00', 'Public', 'vlcsnap-error193.png'),
(1361, 6, '', '0.00', 0, '0000-00-00 00:00:00', 'Public', 'vlcsnap-error499.png'),
(1369, 7, '', '0.00', 0, '0000-00-00 00:00:00', 'Public', 'module_table_bottom.png'),
(1370, 7, '', '0.00', 0, '0000-00-00 00:00:00', 'Public', 'module_table_top.png'),
(1371, 7, '', '0.00', 0, '0000-00-00 00:00:00', 'Public', '11088_597121773765299_1063555357605134493_n (1).jpg'),
(1374, 7, '', '0.00', 0, '0000-00-00 00:00:00', 'Public', '2.png'),
(1375, 6, '', '0.00', 0, '0000-00-00 00:00:00', 'Public', '1608609384_3.png'),
(1376, 6, '', '0.00', 0, '0000-00-00 00:00:00', 'Public', '1608609450_3.png'),
(1377, 6, '', '0.00', 0, '0000-00-00 00:00:00', 'Public', '1608609502_1608114721_11088_597121773765299_1063555357605134493_n.jpg'),
(1378, 6, '', '0.00', 0, '0000-00-00 00:00:00', 'Public', '1608609576_2.png'),
(1379, 6, '', '0.00', 0, '0000-00-00 00:00:00', 'Public', '1608609603_1608193050_301966_1969413523036_500315355_n.jpg'),
(1380, 6, 'holy holy', '200.00', 0, '0000-00-00 00:00:00', 'Public', '1608609662_Arduino Uno Rev3-1.jpg'),
(1381, 6, '', '0.00', 0, '0000-00-00 00:00:00', 'Public', '1608609882_4 rvt.jpg'),
(1382, 6, 'at affordable price ', '100.00', 0, '0000-00-00 00:00:00', 'Public', '1608611099_best16.jpg'),
(1383, 6, 'cool trumpet', '500.00', 0, '0000-00-00 00:00:00', 'Public', '1608611751_1608106623_icon-feedback.png'),
(1384, 6, '100', '100.00', 0, '0000-00-00 00:00:00', 'Private', '1608611833_1608111284_group.png'),
(1385, 6, 'beautiful garden of elden ', '200000.00', 0, '0000-00-00 00:00:00', 'Public', '1608612017_1607263276_bi.jpg'),
(1386, 6, 'wow see ooh buy my pc ', '300000.00', 0, '0000-00-00 00:00:00', 'Public', '1608622587_pc1.PNG'),
(1387, 6, '', '200.00', 0, '0000-00-00 00:00:00', 'Public', '1608713477_chinyere11088_597121773765299_1063555357605134493_n (1).jpg'),
(1389, 6, 'goods', '500.00', 0, '0000-00-00 00:00:00', 'Public', '1608761377_FB_IMG_1452791167540.jpg'),
(1390, 6, 'goods', '500.00', 0, '0000-00-00 00:00:00', 'Public', '1608761378_FB_IMG_1452791167540.jpg'),
(1391, 6, 'vjcxcvhbjnm,', '200.00', 0, '0000-00-00 00:00:00', 'Public', '1609234106_best2.jpg'),
(1392, 6, 'fghjkl', '1500.00', 0, '0000-00-00 00:00:00', 'Public', '1609263833_x93.jpg'),
(1393, 7, 'men this iz wonderful ', '7800.00', 0, '0000-00-00 00:00:00', 'Public', '1610107885_case6.jpg'),
(1394, 6, '', '500.00', 0, '0000-00-00 00:00:00', 'Public', '1610175995_—Pngtree—paper plane icon vector send_5098333.png'),
(1395, 6, 'cool', '1200.00', 0, '0000-00-00 00:00:00', 'Public', '1610176047_favicont.png'),
(1396, 6, 'wise', '4500.00', 0, '0000-00-00 00:00:00', 'Public', '1610359841_orig arduino uno2.jpg'),
(1397, 6, 'wise', '4500.00', 0, '0000-00-00 00:00:00', 'Public', '1610359841_orig arduino uno2.jpg'),
(1398, 7, 'let me even post and know whats up', '5200.00', 0, '0000-00-00 00:00:00', 'Public', '1611676843_1fa1639a4a33eb4f2d04293d8142a1b2.jpg'),
(1411, 6, 'buy me am land for sell ', '20000000.00', 0, '0000-00-00 00:00:00', 'Public', '1611771126_bg3.jpg'),
(1413, 6, 'paschal', '500.00', 0, '0000-00-00 00:00:00', 'Public', '1611791883_2.png'),
(1415, 6, 'we buy ', '1200.00', 0, '0000-00-00 00:00:00', 'Public', '1611795456_best1.jpg'),
(1417, 13, 'bnb', '2758.00', 0, '0000-00-00 00:00:00', 'Public', '1612192064_Arduino Uno Rev3-1.jpg'),
(1418, 13, 'more', '500.00', 0, '0000-00-00 00:00:00', 'Public', '1612192134_arduino mega 2560.jpg'),
(1419, 6, 'nnn', '12.00', 13, '0000-00-00 00:00:00', 'Public', '1613207021_flamesensor1.jpg'),
(1421, 6, 'bnmmmn', '4500.00', 12, '0000-00-00 00:00:00', 'Public', '1613372688_best5.jpg'),
(1425, 6, 'mmmdmm', '415.00', 12, '0000-00-00 00:00:00', 'Public', '1614890598_1610107688_bg1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user_post_comment`
--

CREATE TABLE `user_post_comment` (
  `comment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `timeCreated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_post_comment`
--

INSERT INTO `user_post_comment` (`comment_id`, `user_id`, `post_id`, `comment`, `timeCreated`) VALUES
(2, 13, 1418, 'mile', '2021-02-01 07:44:34'),
(3, 13, 1418, 'paschal', '2021-02-01 08:00:13'),
(4, 13, 1418, 'wow', '2021-02-01 08:38:18'),
(5, 13, 1418, 'what', '2021-02-01 08:38:34'),
(6, 13, 1417, 'dope', '2021-02-01 08:38:55'),
(7, 13, 1417, 'well how much', '2021-02-01 08:54:45'),
(8, 13, 1418, 'good', '2021-02-10 05:58:02'),
(9, 13, 1417, 'cool man', '2021-02-10 06:06:37'),
(10, 13, 1418, 'is this what you where telling me about', '2021-02-12 23:28:35'),
(11, 6, 1413, 'well well', '2021-02-12 23:29:40'),
(12, 6, 1413, 'is fine shaa', '2021-02-12 23:30:34'),
(13, 6, 1413, 'eeh', '2021-02-12 23:31:18'),
(14, 6, 1411, 'n', '2021-02-16 00:02:17'),
(15, 6, 1421, 'mmmmmm', '2021-03-26 21:10:03'),
(16, 6, 1425, 'well ed', '2021-03-26 21:13:19'),
(17, 6, 1419, 'beautiful', '2021-03-26 21:39:56'),
(18, 6, 1419, 'beautiful one', '2021-03-26 21:42:56'),
(19, 6, 1419, 'beautiful two', '2021-03-26 21:44:13'),
(20, 6, 1411, 'na you ooh', '2021-03-26 21:46:05'),
(21, 6, 1415, 'e bam shah', '2021-03-26 21:46:50'),
(22, 6, 1425, 'last hourly', '2021-03-26 23:56:12');

-- --------------------------------------------------------

--
-- Table structure for table `user_post_status`
--

CREATE TABLE `user_post_status` (
  `status_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_profile_pic`
--

CREATE TABLE `user_profile_pic` (
  `profile_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `image` varchar(150) NOT NULL,
  `timeCreated` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_profile_pic`
--

INSERT INTO `user_profile_pic` (`profile_id`, `user_id`, `image`, `timeCreated`) VALUES
(21, 1, 'b4.jpg', '2021-01-08 11:53:00'),
(22, 2, '1608147413_11088_597121773765299_1063555357605134493_n.jpg', '2021-01-07 11:53:00'),
(23, 3, 'b4.jpg', '2021-01-05 11:53:00'),
(24, 4, '1608602115_4 rvt.jpg', '2021-01-05 11:53:00'),
(25, 5, '1608628800_FB_IMG_1452791774140.jpg', '2021-01-04 11:53:00'),
(26, 8, '1608629427_1608622587_pc1.PNG', '2021-01-06 11:53:00'),
(27, 9, '1609822831_best1.jpg', '2021-01-07 11:53:00'),
(28, 10, '1609823012_FB_IMG_15788987950987721.jpg', '2021-01-08 11:53:00'),
(29, 6, '1610107688_bg1.jpg', '2021-01-08 12:08:08'),
(30, 7, '1610107911_4 rvt.jpg', '2021-01-08 12:11:51'),
(31, 13, '1611970953_best2.jpg', '2021-01-30 01:42:33');

-- --------------------------------------------------------

--
-- Table structure for table `user_status`
--

CREATE TABLE `user_status` (
  `status_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_status`
--

INSERT INTO `user_status` (`status_id`, `user_id`, `status`) VALUES
(1, 6, '2020-12-18 12:21:04'),
(2, 7, '2020-12-18 12:21:42'),
(3, 6, '2020-12-18 12:37:10'),
(4, 6, '2020-12-18 12:41:21'),
(5, 6, '2020-12-18 12:41:24'),
(6, 6, '2020-12-18 12:41:26'),
(7, 6, '2020-12-18 12:42:03'),
(8, 6, '2020-12-18 12:42:15'),
(10, 7, '2020-12-18 12:50:42'),
(11, 7, '2020-12-18 13:53:14'),
(12, 6, '2020-12-19 04:38:50'),
(13, 7, '2020-12-19 08:42:06'),
(14, 6, '0000-00-00 00:00:00'),
(15, 6, '0000-00-00 00:00:00'),
(16, 6, '2020-12-19 10:26:11'),
(17, 7, '2020-12-19 18:34:17'),
(18, 6, '2020-12-19 19:01:03'),
(19, 7, '2020-12-19 19:05:03'),
(20, 6, '2020-12-19 19:07:31'),
(21, 7, '2020-12-19 22:30:39'),
(22, 6, '2020-12-21 08:44:17'),
(23, 6, '2020-12-22 10:05:41'),
(24, 7, '2020-12-24 10:28:43'),
(25, 7, '2020-12-23 08:29:24'),
(26, 6, '2020-12-23 09:21:08'),
(27, 6, '2020-12-23 09:01:23'),
(28, 7, '2020-12-23 09:21:03'),
(29, 6, '2020-12-23 22:19:10'),
(30, 6, '2020-12-24 10:29:39'),
(31, 6, '2020-12-24 10:51:11'),
(32, 7, '2020-12-24 10:55:04'),
(33, 6, '2020-12-24 12:12:44'),
(34, 6, '2020-12-24 16:52:43'),
(35, 6, '2020-12-27 13:43:19'),
(36, 6, '2020-12-27 17:37:25'),
(37, 6, '2020-12-28 14:05:57'),
(38, 7, '2020-12-28 17:50:35'),
(39, 6, '2020-12-29 17:48:02'),
(40, 7, '2020-12-29 17:48:04'),
(41, 6, '2021-01-04 00:35:55'),
(42, 7, '2020-12-30 19:35:48'),
(43, 6, '2021-01-04 16:16:56'),
(44, 6, '2021-01-08 12:10:19'),
(45, 7, '2021-01-09 07:09:44'),
(46, 6, '2021-01-09 07:00:11'),
(47, 6, '2021-01-13 05:34:52'),
(48, 6, '2021-01-20 02:58:56'),
(49, 6, '2021-01-23 22:39:15'),
(50, 7, '2021-01-23 22:33:52'),
(51, 7, '2021-01-23 23:46:43'),
(52, 6, '2021-01-24 06:17:25'),
(53, 6, '2021-01-26 02:23:57'),
(54, 6, '2021-01-26 14:44:25'),
(55, 7, '2021-01-26 16:04:07'),
(56, 6, '2021-01-27 17:49:57'),
(57, 6, '2021-01-29 12:46:33'),
(58, 7, '2021-01-29 20:57:11'),
(59, 6, '2021-01-29 20:56:40'),
(60, 7, '2021-01-29 21:18:52'),
(61, 6, '2021-01-29 21:09:35'),
(62, 13, '2021-01-29 21:18:43'),
(63, 13, '2021-02-04 04:38:08'),
(64, 6, '2021-01-30 00:00:40'),
(65, 13, '2021-01-30 00:32:48'),
(66, 7, '2021-02-01 05:11:33'),
(67, 6, '2021-02-10 14:09:46'),
(68, 6, '2021-02-13 11:32:32'),
(69, 6, '2021-02-15 09:10:58'),
(70, 6, '2021-02-16 10:02:07'),
(71, 6, '2021-02-17 01:45:23'),
(72, 6, '2021-02-17 03:03:24'),
(73, 6, '2021-02-18 02:14:18'),
(74, 6, '2021-02-18 22:00:11'),
(75, 6, '2021-02-18 22:01:25'),
(76, 6, '2021-02-19 11:35:52'),
(77, 6, '2021-02-25 18:49:09'),
(78, 6, '2021-02-25 23:10:11'),
(79, 6, '2021-02-27 07:29:51'),
(80, 6, '2021-02-27 23:35:01'),
(81, 6, '2021-02-28 23:11:32'),
(82, 6, '2021-03-04 00:40:59'),
(83, 6, '2021-03-04 00:53:57'),
(84, 6, '2021-03-04 21:06:20'),
(85, 6, '2021-03-26 21:39:51'),
(86, 6, '2021-03-26 21:54:02'),
(87, 6, '2021-03-27 00:16:00'),
(88, 6, '2021-03-27 09:13:10'),
(89, 6, '2021-03-31 18:10:10'),
(90, 6, '2021-03-31 18:10:29');

-- --------------------------------------------------------

--
-- Table structure for table `user_status_product`
--

CREATE TABLE `user_status_product` (
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` decimal(10,2) NOT NULL,
  `product_type` varchar(255) NOT NULL,
  `product_desc` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `product_pic` varchar(255) NOT NULL,
  `status` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_status_product`
--

INSERT INTO `user_status_product` (`product_id`, `user_id`, `product_name`, `product_price`, `product_type`, `product_desc`, `location`, `product_pic`, `status`) VALUES
(1, 6, '', '0.00', '', '', '', '', '2021-01-21 06:35:42'),
(2, 6, '', '0.00', '', '', '', '', '2021-01-21 06:35:42'),
(3, 6, '', '0.00', '', '', '', '', '2021-01-21 06:35:42'),
(4, 6, '', '0.00', '', '', '', '', '2021-01-21 06:35:42'),
(5, 6, '', '0.00', '', '', '', '', '2021-01-21 06:35:42'),
(6, 6, '', '0.00', '', '', '', '', '2021-01-21 06:35:42'),
(7, 6, '', '0.00', '', '', '', '', '2021-01-21 06:35:42'),
(8, 6, '', '0.00', '', '', '', '', '2021-01-21 06:35:42'),
(9, 6, '', '0.00', '', '', '', '', '2021-01-21 06:35:42'),
(10, 6, '', '0.00', '', '', '', '', '2021-01-21 06:35:42'),
(11, 6, 'vv', '0.00', 'ffd', 'fg', 'erf', '', '2021-01-21 06:35:42'),
(12, 6, 'gh', '20.00', 'hjk', 'jkk', 'lkp', '', '2021-01-21 06:35:42'),
(13, 6, 'gh', '20.00', 'hjk', 'jkk', 'lkp', '', '2021-01-21 06:35:42'),
(14, 6, 'gh', '200.00', 'rty', 'fg', 'd', '', '2021-01-21 06:35:42'),
(15, 6, 'gh', '200.00', 'rty', 'fg', 'd', '1610454606_', '2021-01-21 06:35:42'),
(16, 6, 'gh', '200.00', 'rty', 'fg', 'd', '', '2021-01-21 06:35:42'),
(17, 6, 'gh', '200.00', 'rty', 'fg', 'd', '1610454741_', '2021-01-21 06:35:42'),
(18, 6, 'hjj', '200.00', 'dd', 'df', 'edfg', '1610454942_1.png', '2021-01-21 06:35:42'),
(19, 6, 'ghj', '2300.00', 'fghjkl', 'cvbnm,', 'dfghj', '1610455010_2.png', '2021-01-21 06:35:42'),
(20, 6, 'dfg', '4500.00', 'ghjkl', 'bhjkook', 'Abakaliki', '1610455212_best14.jpg', '2021-01-21 06:35:42'),
(21, 6, 'dfg', '4500.00', 'ghjkl', 'bhjkook', 'Abakaliki', '1610455529_best14.jpg', '2021-01-21 06:35:42'),
(22, 6, 'dfg', '2002.00', 'hjk', 'cvbnm', 'Abakaliki', '1610455584_bg1.jpg', '2021-01-21 06:35:42'),
(23, 6, 'sdfs', '3500.00', 'erty', 'sdss', 'Lagos', '1610455868_FB_IMG_1452791913131.jpg', '2021-01-21 06:35:42'),
(24, 6, 'sdfs', '3500.00', 'erty', 'sdss', 'Lagos', '1610455955_FB_IMG_1452791913131.jpg', '2021-01-21 06:35:42'),
(25, 6, 'dfg', '200.00', 'hjk', 'cvbnm', 'Abakaliki', '1610456226_motion sensor2.jpg', '2021-01-21 06:35:42'),
(26, 6, 'fgf', '2300.00', '12', 'cvbnm', 'Abakaliki', '1610768763_pc1.PNG', '2021-01-21 06:35:42'),
(27, 6, 'ear wring', '2500.00', '18', 'cool', 'Abakaliki', '1610888237_best16.jpg', '2021-01-21 06:35:42'),
(28, 6, 'football', '2000.00', '11', 'fghjkl;w;mc', 'Abakaliki', '1610901675_best5.jpg', '2021-01-21 06:35:42'),
(29, 6, 'rice', '2500.00', '50', 'hecter ai rice', 'Abakaliki', '1611209729_1607263730_blue.jpg', '2021-01-21 06:35:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `chat_message`
--
ALTER TABLE `chat_message`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cust_id`);

--
-- Indexes for table `group_chat`
--
ALTER TABLE `group_chat`
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_details_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`prod_id`);

--
-- Indexes for table `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `comment_replies_ibfk_1` (`user_id`),
  ADD KEY `replies_ibfk_2` (`post_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`sales_id`);

--
-- Indexes for table `sales_details`
--
ALTER TABLE `sales_details`
  ADD PRIMARY KEY (`sales_details_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supp_id`);

--
-- Indexes for table `temp_trans`
--
ALTER TABLE `temp_trans`
  ADD PRIMARY KEY (`temp_trans_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`trans_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `users_notice`
--
ALTER TABLE `users_notice`
  ADD PRIMARY KEY (`notice_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user_cover_pic`
--
ALTER TABLE `user_cover_pic`
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user_post`
--
ALTER TABLE `user_post`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user_post_comment`
--
ALTER TABLE `user_post_comment`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `user_post_comment_ibfk_2` (`post_id`);

--
-- Indexes for table `user_post_status`
--
ALTER TABLE `user_post_status`
  ADD PRIMARY KEY (`status_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user_profile_pic`
--
ALTER TABLE `user_profile_pic`
  ADD PRIMARY KEY (`profile_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user_status`
--
ALTER TABLE `user_status`
  ADD PRIMARY KEY (`status_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user_status_product`
--
ALTER TABLE `user_status_product`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `chat_message`
--
ALTER TABLE `chat_message`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=303;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cust_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=259;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `order_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `replies`
--
ALTER TABLE `replies`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `sales_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sales_details`
--
ALTER TABLE `sales_details`
  MODIFY `sales_details_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `temp_trans`
--
ALTER TABLE `temp_trans`
  MODIFY `temp_trans_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `trans_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users_notice`
--
ALTER TABLE `users_notice`
  MODIFY `notice_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_post`
--
ALTER TABLE `user_post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1426;

--
-- AUTO_INCREMENT for table `user_post_comment`
--
ALTER TABLE `user_post_comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `user_post_status`
--
ALTER TABLE `user_post_status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `user_profile_pic`
--
ALTER TABLE `user_profile_pic`
  MODIFY `profile_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `user_status`
--
ALTER TABLE `user_status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `user_status_product`
--
ALTER TABLE `user_status_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `group_chat`
--
ALTER TABLE `group_chat`
  ADD CONSTRAINT `group_chat_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `replies`
--
ALTER TABLE `replies`
  ADD CONSTRAINT `comment_replies_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `users_notice`
--
ALTER TABLE `users_notice`
  ADD CONSTRAINT `users_notice_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `user_cover_pic`
--
ALTER TABLE `user_cover_pic`
  ADD CONSTRAINT `user_cover_pic_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `user_info`
--
ALTER TABLE `user_info`
  ADD CONSTRAINT `user_info_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `user_post`
--
ALTER TABLE `user_post`
  ADD CONSTRAINT `user_post_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `user_post_comment`
--
ALTER TABLE `user_post_comment`
  ADD CONSTRAINT `user_post_comment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_post_comment_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `user_post` (`post_id`);

--
-- Constraints for table `user_post_status`
--
ALTER TABLE `user_post_status`
  ADD CONSTRAINT `user_post_status_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_post_status_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user_post` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `user_profile_pic`
--
ALTER TABLE `user_profile_pic`
  ADD CONSTRAINT `user_profile_pic_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `user_status`
--
ALTER TABLE `user_status`
  ADD CONSTRAINT `user_status_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
