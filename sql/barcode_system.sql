-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2021 at 08:14 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `barcode_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `ACCOUNT_ID` int(5) NOT NULL,
  `EMAIL` varchar(255) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL,
  `PERMISSION` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`ACCOUNT_ID`, `EMAIL`, `PASSWORD`, `PERMISSION`) VALUES
(1, 'khalid', '1234', 'admin'),
(2, 'reji', '1234', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `houses`
--

CREATE TABLE `houses` (
  `house_id` int(5) NOT NULL,
  `villa_no` varchar(255) NOT NULL,
  `house_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `houses`
--

INSERT INTO `houses` (`house_id`, `villa_no`, `house_type`) VALUES
(1, 'Canary # 1', 'D'),
(2, 'Canary # 2', 'D'),
(3, 'Canary # 3', 'D'),
(4, 'Canary # 4', 'C'),
(5, 'Canary # 5', 'B'),
(6, 'Canary # 6', 'B'),
(7, 'Canary # 7', 'D'),
(8, 'Canary # 8', 'D'),
(9, 'Canary # 9', 'D'),
(10, 'Canary # 10', 'D'),
(11, 'Canary # 11', 'B'),
(12, 'Canary # 12', ''),
(13, 'Canary # 13', ''),
(14, 'Canary # 14', 'D'),
(15, 'Canary # 15', 'D'),
(16, 'Canary # 16', ''),
(17, 'Canary # 17', ''),
(18, 'Canary # 18', 'B'),
(19, 'Canary # 19', 'C'),
(20, 'Canary # 20', 'C'),
(21, 'Canary # 21', ''),
(22, 'Reico # 1', 'C'),
(23, 'Reico # 2', 'C'),
(24, 'Reico # 3', 'B'),
(25, 'Reico # 4', 'D'),
(26, 'Reico # 5', 'D'),
(27, 'Reico # 6', 'D'),
(28, 'Reico # 7', 'D'),
(29, 'Reico # 8', 'C'),
(30, 'Reico # 9', 'C'),
(31, 'Reico # 10', 'C'),
(32, 'Reico # 11', 'C'),
(33, 'Reico # 12', 'B'),
(34, 'Reico # 13', 'B'),
(35, 'Reico # 14', 'C'),
(36, 'Reico # 15', ''),
(37, 'Reico # 16', 'D'),
(38, 'Reico # 17', ''),
(39, 'Reico # 18', ''),
(40, 'Reico # 19', 'C'),
(41, 'Reico # 20', 'D'),
(42, 'Reico # 21', ''),
(43, 'Reico # 22', ''),
(44, 'Reico # 23', 'C'),
(45, 'Reico # 24', 'D'),
(46, 'Reico # 25', 'D'),
(47, 'Reico # 26', 'D'),
(48, 'Reico # 27', 'C'),
(49, 'Reico # 28', 'D'),
(50, 'Reico # 29', 'C'),
(51, 'Reico # 30', ''),
(52, 'Reico # 31', 'D'),
(53, 'Reico # 32', ''),
(54, 'Reico # 33', 'D'),
(55, 'Reico # 34', 'C'),
(56, 'Reico # 35', 'C'),
(57, 'Movenpick # 1', 'C'),
(58, 'Movenpick # 2', ''),
(59, 'Movenpick # 3', 'D'),
(60, 'Movenpick # 4', ''),
(61, 'Movenpick # 5', 'D'),
(62, 'Movenpick # 6', 'C'),
(63, 'Movenpick # 7', 'C'),
(64, 'Movenpick # 8', ''),
(65, 'Movenpick # 9', 'B'),
(66, 'Movenpick # 10', 'C'),
(67, 'Movenpick # 11', 'D'),
(68, 'Movenpick # 12', 'D'),
(69, 'Movenpick # 13', ''),
(70, 'Movenpick # 14', 'D'),
(71, 'Movenpick # 15', 'D'),
(72, 'Movenpick # 16', 'D'),
(73, 'Movenpick # 17', 'D'),
(74, 'Movenpick # 18', 'C'),
(75, 'Movenpick # 19', 'D'),
(76, 'Movenpick # 20', ''),
(77, 'Movenpick # 21', ''),
(78, 'Movenpick # 22', 'D'),
(79, 'Movenpick # 23', ''),
(80, 'Twitter # 1', ''),
(81, 'Twitter # 2', 'C'),
(82, 'Twitter # 3', 'B'),
(83, 'Twitter # 4', ''),
(84, 'Twitter # 5', 'D'),
(85, 'Twitter # 6', 'D'),
(86, 'Twitter # 7', 'D'),
(87, 'Twitter # 8', 'D'),
(88, 'Twitter # 9', ''),
(89, 'Twitter # 10', ''),
(90, 'Twitter # 11', 'C'),
(91, 'Twitter # 12', 'D'),
(92, 'Twitter # 13', ''),
(93, 'Twitter # 14', ''),
(94, 'Twitter # 15', ''),
(95, 'Twitter # 16', 'C'),
(96, 'Twitter # 17', 'D'),
(97, 'Twitter # 18', 'D'),
(98, 'Twitter # 19', 'D'),
(99, 'Twitter # 20', 'D'),
(100, 'Twitter # 21', 'D'),
(101, 'Twitter # 22', 'D'),
(102, 'Twitter # 23', 'D'),
(103, 'Twitter # 24', 'D'),
(104, 'Twitter # 25', 'D'),
(105, 'Twitter # 26', 'C'),
(106, 'Four Seasons # 1', 'D'),
(107, 'Four Seasons # 2', 'D'),
(108, 'Four Seasons # 3', 'D'),
(109, 'Four Seasons # 4', 'D'),
(110, 'Four Seasons # 5', ''),
(111, 'Four Seasons # 6', 'A'),
(112, 'Four Seasons # 7', ''),
(113, 'Four Seasons # 8', 'D'),
(114, 'Four Seasons # 9', ''),
(115, 'Four Seasons # 10', 'C'),
(116, 'Four Seasons # 11', ''),
(117, 'Four Seasons # 12', ''),
(118, 'Four Seasons # 13', 'D'),
(119, 'Four Seasons # 14', ''),
(120, 'Four Seasons # 15', ''),
(121, 'Four Seasons # 16', ''),
(122, 'Four Seasons # 17', 'D'),
(123, 'Four Seasons # 18', 'C'),
(124, 'Four Seasons # 19', 'D'),
(125, 'Four Seasons # 20', ''),
(126, 'Four Seasons # 21', 'D'),
(127, 'Four Seasons # 22', ''),
(128, 'Four Seasons # 23', ''),
(129, 'Four Seasons # 24', 'B'),
(130, 'Four Seasons # 25', ''),
(131, 'Four Seasons # 26', 'D'),
(132, 'Sky # 1', 'D'),
(133, 'Sky # 2', 'D'),
(134, 'Sky # 3', 'D'),
(135, 'Sky # 4', 'D'),
(136, 'Sky # 5', 'B'),
(137, 'Sky # 6', 'B'),
(138, 'Sky # 7', 'D'),
(139, 'Sky # 8', 'D'),
(140, 'Sky # 9', 'D'),
(141, 'Sky # 10', ''),
(142, 'Sky # 11', ''),
(143, 'Sky # 12', 'D'),
(144, 'Sky # 13', 'C'),
(145, 'Sky # 14', 'D'),
(146, 'Sky # 15', ''),
(147, 'Sky # 16', 'A'),
(148, 'Sky # 17', ''),
(149, 'Sky # 18', ''),
(150, 'Sky # 19', 'D'),
(151, 'Sky # 20', 'D'),
(152, 'Sky # 21', 'D'),
(153, 'Sky # 22', ''),
(154, 'Sky # 23', 'D'),
(155, 'Sky # 24', 'D'),
(156, 'Sky # 25', ''),
(157, 'Hyundai # 1', ''),
(158, 'Hyundai # 2', ''),
(159, 'Hyundai # 3', 'F'),
(160, 'Hyundai # 4', 'F'),
(161, 'Hyundai # 5', 'F'),
(162, 'Hyundai # 6', 'F'),
(163, 'Hyundai # 7', 'F'),
(164, 'Hyundai # 8', 'F'),
(165, 'Hyundai # 9', 'F'),
(166, 'Hyundai # 10', 'F'),
(167, 'Hyundai # 11', ''),
(168, 'Hyundai # 12', 'F'),
(169, 'Hyundai # 13', 'F'),
(170, 'Hyundai # 14', 'F'),
(171, 'Hyundai # 15', 'F'),
(172, 'Hyundai # 16', ''),
(173, 'Hyundai # 17', 'F'),
(174, 'Hyundai # 18', 'F'),
(175, 'Hyundai # 19', 'F'),
(176, 'Hyundai # 20', 'F'),
(177, 'Hyundai # 21', 'F'),
(178, 'Hyundai # 22', 'F'),
(179, 'Hyundai # 23', 'F'),
(180, 'Hyundai # 24', 'F'),
(181, 'Kingdom Avenue # 1', 'G'),
(182, 'Kingdom Avenue # 2', 'G'),
(183, 'Kingdom Avenue # 3', 'G'),
(184, 'Kingdom Avenue # 4', 'G'),
(185, 'Kingdom Avenue # 5', 'G'),
(186, 'Kingdom Avenue # 6', 'G'),
(187, 'Kingdom Avenue # 7', 'G'),
(188, 'Kingdom Avenue # 8', ''),
(189, 'Kingdom Avenue # 9', 'G'),
(190, 'Kingdom Avenue # 10', ''),
(191, 'Kingdom Avenue # 11', 'G'),
(192, 'Kingdom Avenue # 12', ''),
(193, 'Kingdom Avenue # 13', 'G'),
(194, 'Kingdom Avenue # 14', ''),
(195, 'Kingdom Avenue # 15', 'G'),
(196, 'Kingdom Avenue # 16', 'G'),
(197, 'Kingdom Avenue # 17', 'G'),
(198, 'Kingdom Avenue # 18', 'G'),
(199, 'Kingdom Avenue # 19', ''),
(200, 'Kingdom Avenue # 20', 'G'),
(201, 'Kingdom Avenue # 21', ''),
(202, 'Kingdom Avenue # 22', 'G'),
(203, 'Kingdom Avenue # 23', 'G'),
(204, 'Kingdom Avenue # 24', 'G'),
(205, 'Kingdom Avenue # 25', ''),
(206, 'Kingdom Avenue # 26', ''),
(207, 'Kingdom Avenue # 27', ''),
(208, 'Kingdom Avenue # 28', 'G'),
(209, 'Kingdom Avenue # 29', ''),
(210, 'Kingdom Avenue # 30', ''),
(211, 'Kingdom Avenue # 31', ''),
(212, 'Kingdom Avenue # 32', 'G'),
(213, 'Kingdom Avenue # 33', 'G'),
(214, 'Kingdom Avenue # 34', 'G'),
(215, 'Kingdom Center # 1', 'D'),
(216, 'Kingdom Center # 2', 'C'),
(217, 'Kingdom Center # 3', ''),
(218, 'Kingdom Center # 4', 'C'),
(219, 'Kingdom Center # 5', 'C'),
(220, 'Kingdom Center # 6', 'D'),
(221, 'Kingdom Center # 7', 'B'),
(222, 'Kingdom Center # 8', 'D'),
(223, 'Kingdom Center # 9', ''),
(224, 'Kingdom Center # 10', 'D'),
(225, 'Kingdom Center # 11', 'D'),
(226, 'Kingdom Center # 12', 'D'),
(227, 'Kingdom Center # 13', 'B'),
(228, 'Kingdom Center # 14', 'B'),
(229, 'Kingdom Center # 15', 'D'),
(230, 'Kingdom Center # 16', 'C'),
(231, 'Kingdom Center # 17', 'D'),
(232, 'Kingdom Center # 18', ''),
(233, 'Kingdom Center # 19', 'C'),
(234, 'Kingdom Center # 20', 'D'),
(235, 'Kingdom Center # 21', 'C'),
(236, 'Kingdom Center # 22', ''),
(237, 'Kingdom Center # 23', ''),
(238, 'Kingdom Center # 24', 'B'),
(239, 'Kingdom Center # 25', ''),
(240, 'Kingdom Center # 26', 'C'),
(241, 'Plaza # 1', 'F'),
(242, 'Plaza # 2', 'F'),
(243, 'Plaza # 3', 'F'),
(244, 'Plaza # 4', ''),
(245, 'Plaza # 5', ''),
(246, 'Plaza # 6', 'F'),
(247, 'Plaza # 7', ''),
(248, 'Plaza # 8', 'F'),
(249, 'Plaza # 9', 'F'),
(250, 'Plaza # 10', ''),
(251, 'Plaza # 11', 'F'),
(252, 'Plaza # 12', 'F'),
(253, 'Plaza # 13', ''),
(254, 'Plaza # 14', 'F'),
(255, 'Plaza # 15', 'F'),
(256, 'Plaza # 16', 'F'),
(257, 'Plaza # 17', 'F'),
(258, 'Plaza # 18', ''),
(259, 'Plaza # 19', 'F'),
(260, 'Plaza # 20', ''),
(261, 'Plaza # 21', 'F'),
(262, 'Plaza # 22', ''),
(263, 'Plaza # 23', 'F'),
(264, 'Plaza # 24', 'F'),
(265, 'George # 1', 'C'),
(266, 'George # 2', ''),
(267, 'George # 3', ''),
(268, 'George # 4', 'A'),
(269, 'George # 5', 'C'),
(270, 'George # 6', ''),
(271, 'George # 7', ''),
(272, 'George # 8', 'D'),
(273, 'George # 9', 'B'),
(274, 'George # 10', 'B'),
(275, 'George # 11', 'D'),
(276, 'George # 12', 'D'),
(277, 'George # 13', ''),
(278, 'George # 14', 'B'),
(279, 'George # 15', 'C'),
(280, 'George # 16', ''),
(281, 'George # 17', ''),
(282, 'George # 18', 'D'),
(283, 'George # 19', 'A'),
(284, 'George # 20', 'C'),
(285, 'George # 21', ''),
(286, 'George # 22', 'D'),
(287, 'George # 23', ''),
(288, 'George # 24', 'D'),
(289, 'Daewoo # 1', 'F'),
(290, 'Daewoo # 2', ''),
(291, 'Daewoo # 3', 'F'),
(292, 'Daewoo # 4', 'F'),
(293, 'Daewoo # 5', 'F'),
(294, 'Daewoo # 6', 'F'),
(295, 'Daewoo # 7', 'F'),
(296, 'Daewoo # 8', 'F'),
(297, 'Daewoo # 9', 'F'),
(298, 'Daewoo # 10', 'F'),
(299, 'Daewoo # 11', 'F'),
(300, 'Daewoo # 12', 'F'),
(301, 'Fairmont # 1', 'D'),
(302, 'Fairmont # 2', 'D'),
(303, 'Fairmont # 3', ''),
(304, 'Fairmont # 4', ''),
(305, 'Fairmont # 5', 'C'),
(306, 'Fairmont # 6', 'A'),
(307, 'Fairmont # 7', ''),
(308, 'Fairmont # 8', 'C'),
(309, 'Fairmont # 9', 'D'),
(310, 'Fairmont # 10', ''),
(311, 'Fairmont # 11', 'B'),
(312, 'Fairmont # 12', 'D'),
(313, 'Fairmont # 13', 'D'),
(314, 'Fairmont # 14', 'B'),
(315, 'Fairmont # 15', 'B'),
(316, 'Fairmont # 16', ''),
(317, 'Fairmont # 17', 'C'),
(318, 'Fairmont # 18', 'C'),
(319, 'Fairmont # 19', 'D'),
(320, 'Fairmont # 20', 'A'),
(321, 'Fairmont # 21', 'C'),
(322, 'Fairmont # 22', 'D'),
(323, 'Fairmont # 23', ''),
(324, 'Fairmont # 24', ''),
(325, 'Fairmont # 25', 'D'),
(326, 'Citigroup # 1', ''),
(327, 'Citigroup # 2', 'G'),
(328, 'Citigroup # 3', 'G'),
(329, 'Citigroup # 4', 'G'),
(330, 'Citigroup # 5', ''),
(331, 'Citigroup # 6', 'G'),
(332, 'Citigroup # 7', ''),
(333, 'Citigroup # 8', 'G'),
(334, 'Citigroup # 9', 'G'),
(335, 'Citigroup # 10', ''),
(336, 'Citigroup # 11', 'G'),
(337, 'Citigroup # 12', 'G'),
(338, 'Citigroup # 13', ''),
(339, 'Citigroup # 14', ''),
(340, 'Citigroup # 15', ''),
(341, 'Citigroup # 16', ''),
(342, 'Citigroup # 17', 'G'),
(343, 'Citigroup # 18', ''),
(344, 'Citigroup # 19', 'G'),
(345, 'Guesthouse # 1', ''),
(346, 'Guesthouse # 2', ''),
(347, 'Guesthouse # 3', ''),
(348, 'Guesthouse # 4', ''),
(349, 'Guesthouse # 5', ''),
(350, 'Guesthouse # 6', ''),
(351, 'Guesthouse # 7', ''),
(352, 'Guesthouse # 8', ''),
(353, 'Guesthouse # 9', ''),
(354, 'Guesthouse # 10', ''),
(355, 'Guesthouse # 11', ''),
(356, 'Guesthouse # 12', ''),
(357, 'Guesthouse # 13', ''),
(358, 'Guesthouse # 14', ''),
(359, 'Guesthouse # 15', ''),
(360, 'Guesthouse # 16', ''),
(361, 'Guesthouse # 17', ''),
(362, 'Guesthouse # 18', ''),
(363, 'Guesthouse # 19', ''),
(364, 'Guesthouse # 20', ''),
(365, 'Guesthouse # 21', ''),
(366, 'Guesthouse # 22', ''),
(367, 'Guesthouse # 23', ''),
(368, 'Guesthouse # 24', ''),
(369, 'Guesthouse # 25', ''),
(370, 'Guesthouse # 26', ''),
(371, 'Guesthouse # 27', ''),
(372, 'Guesthouse # 28', ''),
(373, 'Guesthouse # 29', ''),
(374, 'Guesthouse # 30', ''),
(375, 'Guesthouse # 31', ''),
(376, 'Guesthouse # 32', ''),
(377, 'Guesthouse # 33', ''),
(378, 'Guesthouse # 34', ''),
(379, 'Guesthouse # 35', ''),
(380, 'Guesthouse # 36', ''),
(381, 'Guesthouse # 37', ''),
(382, 'Guesthouse # 38', ''),
(383, 'Guesthouse # 39', ''),
(384, 'Guesthouse # 40', ''),
(385, 'Guesthouse # 41', ''),
(386, 'Guesthouse # 42', '');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `serial_no` int(5) NOT NULL,
  `appliances` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `invoice_no` varchar(255) NOT NULL,
  `warranty_date` date NOT NULL,
  `quantity` int(5) NOT NULL,
  `user` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`serial_no`, `appliances`, `type`, `date`, `invoice_no`, `warranty_date`, `quantity`, `user`) VALUES
(123456, 'Refrigerator', 'B', '2021-12-30', '0497', '2026-12-30', 14, 2),
(1234324, 'tv', 'A', '0000-00-00', '1234', '0000-00-00', 100, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`ACCOUNT_ID`);

--
-- Indexes for table `houses`
--
ALTER TABLE `houses`
  ADD PRIMARY KEY (`house_id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`serial_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `ACCOUNT_ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `houses`
--
ALTER TABLE `houses`
  MODIFY `house_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=387;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
