-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 10, 2023 at 01:32 PM
-- Server version: 5.7.23-23
-- PHP Version: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `weban82x_c_cube`
--

-- --------------------------------------------------------

--
-- Table structure for table `candidate_education`
--

CREATE TABLE `candidate_education` (
  `id` int(10) NOT NULL,
  `r_id` varchar(100) NOT NULL,
  `class` varchar(100) NOT NULL,
  `institute` varchar(200) NOT NULL,
  `year` varchar(100) NOT NULL,
  `percentage` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `candidate_education`
--

INSERT INTO `candidate_education` (`id`, `r_id`, `class`, `institute`, `year`, `percentage`) VALUES
(0, '18', '4', 'c cube', '2022', '90');

-- --------------------------------------------------------

--
-- Table structure for table `candidate_registre`
--

CREATE TABLE `candidate_registre` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL DEFAULT 'user.png',
  `dob` varchar(255) DEFAULT NULL,
  `date` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `about` text,
  `status` varchar(255) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `user_activation_code` varchar(200) NOT NULL,
  `user_email_status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `candidate_registre`
--

INSERT INTO `candidate_registre` (`id`, `name`, `email`, `mobile`, `img`, `dob`, `date`, `password`, `address`, `about`, `status`, `city`, `state`, `user_activation_code`, `user_email_status`) VALUES
(53, 'Muskan jain', 'muskaanrashujain@gmail.com', '8319218133', 'user.png', NULL, '01/05/2023', 'ccube@46430', NULL, NULL, NULL, NULL, NULL, '', ''),
(55, 'Harsha maravi', 'harshamaravi@gmail.com', '9516354018', 'user.png', NULL, '01/05/2023', 'ccube@17323', NULL, NULL, NULL, NULL, NULL, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `candidate_subscribe`
--

CREATE TABLE `candidate_subscribe` (
  `id` int(10) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sub_nm` varchar(100) NOT NULL,
  `stu_id` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL,
  `payment_id` varchar(200) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `type_sub` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `candidate_subscribe`
--

INSERT INTO `candidate_subscribe` (`id`, `create_date`, `sub_nm`, `stu_id`, `amount`, `date`, `status`, `payment_id`, `name`, `email`, `contact`, `address`, `type_sub`) VALUES
(11, '2023-04-29 15:12:20', '20', '38', '200', '29-04-2023', 'OLD', '789654532@ybl', 'Harsha maravi', 'harshamaravi@gmail.com', '9516354018', '', ''),
(13, '2023-05-02 11:39:06', '20', '55', '200', '02-05-23', 'OLD', 'asd', 'Harsha maravi', 'harshamaravi@gmail.com', '9516354018', 'kolar road', '0');

-- --------------------------------------------------------

--
-- Table structure for table `candidate_test_attempts`
--

CREATE TABLE `candidate_test_attempts` (
  `id` int(10) NOT NULL,
  `s_id` varchar(100) NOT NULL,
  `t_id` varchar(100) NOT NULL,
  `correct` varchar(100) NOT NULL,
  `incorrect` varchar(100) NOT NULL,
  `notattempted` int(11) NOT NULL,
  `t_marks` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `time` varchar(100) NOT NULL,
  `descriptivemark` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `candidate_test_attempts`
--

INSERT INTO `candidate_test_attempts` (`id`, `s_id`, `t_id`, `correct`, `incorrect`, `notattempted`, `t_marks`, `type`, `date`, `time`, `descriptivemark`) VALUES
(1, '1', '1', '1', '0', 0, '1', '', '25/04/2023', '11:31:30pm', '0'),
(2, '1', '1', '1', '0', 0, '1', '', '25/04/2023', '11:32:28pm', '0'),
(3, '1', '1', '1', '2', 0, '0.34', '', '25/04/2023', '11:38:40pm', '0'),
(4, '1', '1', '1', '2', 0, '0.34', '', '25/04/2023', '11:48:56pm', '0'),
(5, '1', '1', '0', '1', 2, '-0.33', '', '25/04/2023', '11:50:35pm', '0'),
(6, '1', '1', '0', '1', 2, '-0.33', '', '25/04/2023', '11:51:43pm', '0'),
(7, '1', '1', '0', '0', 3, '0', '', '25/04/2023', '11:51:52pm', '0'),
(8, '1', '1', '0', '0', 3, '0', '', '25/04/2023', '11:55:13pm', '0'),
(9, '1', '1', '0', '2', 1, '-0.66', '', '25/04/2023', '11:55:24pm', '0'),
(10, '1', '1', '2', '1', 0, '1.67', '', '25/04/2023', '11:56:45pm', '0'),
(11, '1', '1', '2', '1', 0, '1.67', '', '25/04/2023', '11:57:28pm', '0'),
(12, '1', '1', '1', '2', 0, '0.34', '', '25/04/2023', '11:58:00pm', '0'),
(13, '1', '1', '1', '2', 0, '0.34', '', '25/04/2023', '11:59:44pm', '0'),
(14, '1', '1', '1', '2', 0, '0.34', '', '25/04/2023', '11:59:57pm', '0'),
(15, '1', '1', '1', '2', 0, '0.34', '', '26/04/2023', '12:01:12am', '0'),
(16, '1', '1', '0', '2', 1, '-0.66', '', '26/04/2023', '12:01:24am', '0'),
(17, '1', '1', '0', '2', 1, '-0.66', '', '26/04/2023', '12:02:16am', '0'),
(18, '1', '1', '2', '1', 0, '1.67', '', '26/04/2023', '12:02:28am', '0'),
(19, '1', '1', '2', '1', 0, '1.67', '', '26/04/2023', '12:02:50am', '0'),
(20, '1', '1', '0', '2', 1, '-0.66', '', '26/04/2023', '12:03:02am', '0'),
(21, '1', '1', '0', '2', 1, '-0.66', '', '26/04/2023', '12:03:12am', '0'),
(22, '1', '1', '0', '2', 1, '-0.66', '', '26/04/2023', '12:03:46am', '0'),
(23, '1', '1', '1', '2', 0, '0.34', '', '26/04/2023', '12:03:56am', '0'),
(24, '1', '1', '1', '2', 0, '0.34', '', '26/04/2023', '12:04:27am', '0'),
(25, '1', '1', '1', '2', 0, '0.34', '', '26/04/2023', '12:04:38am', '0'),
(26, '1', '1', '1', '2', 0, '0.34', '', '26/04/2023', '11:50:46am', '0'),
(27, '18', '2', '1', '0', 0, '1', '', '29/04/2023', '03:19:09pm', '0');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `city_id` int(11) NOT NULL,
  `city_name` varchar(100) NOT NULL,
  `city_state` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`city_id`, `city_name`, `city_state`) VALUES
(1, 'Kolhapur', 'Maharashtra'),
(2, 'Port Blair', 'Andaman and Nicobar Islands'),
(3, 'Adilabad', 'Andhra Pradesh'),
(4, 'Adoni', 'Andhra Pradesh'),
(5, 'Amadalavalasa', 'Andhra Pradesh'),
(6, 'Amalapuram', 'Andhra Pradesh'),
(7, 'Anakapalle', 'Andhra Pradesh'),
(8, 'Anantapur', 'Andhra Pradesh'),
(9, 'Badepalle', 'Andhra Pradesh'),
(10, 'Banganapalle', 'Andhra Pradesh'),
(11, 'Bapatla', 'Andhra Pradesh'),
(12, 'Bellampalle', 'Andhra Pradesh'),
(13, 'Bethamcherla', 'Andhra Pradesh'),
(14, 'Bhadrachalam', 'Andhra Pradesh'),
(15, 'Bhainsa', 'Andhra Pradesh'),
(16, 'Bheemunipatnam', 'Andhra Pradesh'),
(17, 'Bhimavaram', 'Andhra Pradesh'),
(18, 'Bhongir', 'Andhra Pradesh'),
(19, 'Bobbili', 'Andhra Pradesh'),
(20, 'Bodhan', 'Andhra Pradesh'),
(21, 'Chilakaluripet', 'Andhra Pradesh'),
(22, 'Chirala', 'Andhra Pradesh'),
(23, 'Chittoor', 'Andhra Pradesh'),
(24, 'Cuddapah', 'Andhra Pradesh'),
(25, 'Devarakonda', 'Andhra Pradesh'),
(26, 'Dharmavaram', 'Andhra Pradesh'),
(27, 'Eluru', 'Andhra Pradesh'),
(28, 'Farooqnagar', 'Andhra Pradesh'),
(29, 'Gadwal', 'Andhra Pradesh'),
(30, 'Gooty', 'Andhra Pradesh'),
(31, 'Gudivada', 'Andhra Pradesh'),
(32, 'Gudur', 'Andhra Pradesh'),
(33, 'Guntakal', 'Andhra Pradesh'),
(34, 'Guntur', 'Andhra Pradesh'),
(35, 'Hanuman Junction', 'Andhra Pradesh'),
(36, 'Hindupur', 'Andhra Pradesh'),
(37, 'Hyderabad', 'Andhra Pradesh'),
(38, 'Ichchapuram', 'Andhra Pradesh'),
(39, 'Jaggaiahpet', 'Andhra Pradesh'),
(40, 'Jagtial', 'Andhra Pradesh'),
(41, 'Jammalamadugu', 'Andhra Pradesh'),
(42, 'Jangaon', 'Andhra Pradesh'),
(43, 'Kadapa', 'Andhra Pradesh'),
(44, 'Kadiri', 'Andhra Pradesh'),
(45, 'Kagaznagar', 'Andhra Pradesh'),
(46, 'Kakinada', 'Andhra Pradesh'),
(47, 'Kalyandurg', 'Andhra Pradesh'),
(48, 'Kamareddy', 'Andhra Pradesh'),
(49, 'Kandukur', 'Andhra Pradesh'),
(50, 'Karimnagar', 'Andhra Pradesh'),
(51, 'Kavali', 'Andhra Pradesh'),
(52, 'Khammam', 'Andhra Pradesh'),
(53, 'Koratla', 'Andhra Pradesh'),
(54, 'Kothagudem', 'Andhra Pradesh'),
(55, 'Kothapeta', 'Andhra Pradesh'),
(56, 'Kovvur', 'Andhra Pradesh'),
(57, 'Kurnool', 'Andhra Pradesh'),
(58, 'Kyathampalle', 'Andhra Pradesh'),
(59, 'Macherla', 'Andhra Pradesh'),
(60, 'Machilipatnam', 'Andhra Pradesh'),
(61, 'Madanapalle', 'Andhra Pradesh'),
(62, 'Mahbubnagar', 'Andhra Pradesh'),
(63, 'Mancherial', 'Andhra Pradesh'),
(64, 'Mandamarri', 'Andhra Pradesh'),
(65, 'Mandapeta', 'Andhra Pradesh'),
(66, 'Manuguru', 'Andhra Pradesh'),
(67, 'Markapur', 'Andhra Pradesh'),
(68, 'Medak', 'Andhra Pradesh'),
(69, 'Miryalaguda', 'Andhra Pradesh'),
(70, 'Mogalthur', 'Andhra Pradesh'),
(71, 'Nagari', 'Andhra Pradesh'),
(72, 'Nagarkurnool', 'Andhra Pradesh'),
(73, 'Nandyal', 'Andhra Pradesh'),
(74, 'Narasapur', 'Andhra Pradesh'),
(75, 'Narasaraopet', 'Andhra Pradesh'),
(76, 'Narayanpet', 'Andhra Pradesh'),
(77, 'Narsipatnam', 'Andhra Pradesh'),
(78, 'Nellore', 'Andhra Pradesh'),
(79, 'Nidadavole', 'Andhra Pradesh'),
(80, 'Nirmal', 'Andhra Pradesh'),
(81, 'Nizamabad', 'Andhra Pradesh'),
(82, 'Nuzvid', 'Andhra Pradesh'),
(83, 'Ongole', 'Andhra Pradesh'),
(84, 'Palacole', 'Andhra Pradesh'),
(85, 'Palasa Kasibugga', 'Andhra Pradesh'),
(86, 'Palwancha', 'Andhra Pradesh'),
(87, 'Parvathipuram', 'Andhra Pradesh'),
(88, 'Pedana', 'Andhra Pradesh'),
(89, 'Peddapuram', 'Andhra Pradesh'),
(90, 'Pithapuram', 'Andhra Pradesh'),
(91, 'Pondur', 'Andhra pradesh'),
(92, 'Ponnur', 'Andhra Pradesh'),
(93, 'Proddatur', 'Andhra Pradesh'),
(94, 'Punganur', 'Andhra Pradesh'),
(95, 'Puttur', 'Andhra Pradesh'),
(96, 'Rajahmundry', 'Andhra Pradesh'),
(97, 'Rajam', 'Andhra Pradesh'),
(98, 'Ramachandrapuram', 'Andhra Pradesh'),
(99, 'Ramagundam', 'Andhra Pradesh'),
(100, 'Rayachoti', 'Andhra Pradesh'),
(101, 'Rayadurg', 'Andhra Pradesh'),
(102, 'Renigunta', 'Andhra Pradesh'),
(103, 'Repalle', 'Andhra Pradesh'),
(104, 'Sadasivpet', 'Andhra Pradesh'),
(105, 'Salur', 'Andhra Pradesh'),
(106, 'Samalkot', 'Andhra Pradesh'),
(107, 'Sangareddy', 'Andhra Pradesh'),
(108, 'Sattenapalle', 'Andhra Pradesh'),
(109, 'Siddipet', 'Andhra Pradesh'),
(110, 'Singapur', 'Andhra Pradesh'),
(111, 'Sircilla', 'Andhra Pradesh'),
(112, 'Srikakulam', 'Andhra Pradesh'),
(113, 'Srikalahasti', 'Andhra Pradesh'),
(115, 'Suryapet', 'Andhra Pradesh'),
(116, 'Tadepalligudem', 'Andhra Pradesh'),
(117, 'Tadpatri', 'Andhra Pradesh'),
(118, 'Tandur', 'Andhra Pradesh'),
(119, 'Tanuku', 'Andhra Pradesh'),
(120, 'Tenali', 'Andhra Pradesh'),
(121, 'Tirupati', 'Andhra Pradesh'),
(122, 'Tuni', 'Andhra Pradesh'),
(123, 'Uravakonda', 'Andhra Pradesh'),
(124, 'Venkatagiri', 'Andhra Pradesh'),
(125, 'Vicarabad', 'Andhra Pradesh'),
(126, 'Vijayawada', 'Andhra Pradesh'),
(127, 'Vinukonda', 'Andhra Pradesh'),
(128, 'Visakhapatnam', 'Andhra Pradesh'),
(129, 'Vizianagaram', 'Andhra Pradesh'),
(130, 'Wanaparthy', 'Andhra Pradesh'),
(131, 'Warangal', 'Andhra Pradesh'),
(132, 'Yellandu', 'Andhra Pradesh'),
(133, 'Yemmiganur', 'Andhra Pradesh'),
(134, 'Yerraguntla', 'Andhra Pradesh'),
(135, 'Zahirabad', 'Andhra Pradesh'),
(136, 'Rajampet', 'Andra Pradesh'),
(137, 'Along', 'Arunachal Pradesh'),
(138, 'Bomdila', 'Arunachal Pradesh'),
(139, 'Itanagar', 'Arunachal Pradesh'),
(140, 'Naharlagun', 'Arunachal Pradesh'),
(141, 'Pasighat', 'Arunachal Pradesh'),
(142, 'Abhayapuri', 'Assam'),
(143, 'Amguri', 'Assam'),
(144, 'Anandnagaar', 'Assam'),
(145, 'Barpeta', 'Assam'),
(146, 'Barpeta Road', 'Assam'),
(147, 'Bilasipara', 'Assam'),
(148, 'Bongaigaon', 'Assam'),
(149, 'Dhekiajuli', 'Assam'),
(150, 'Dhubri', 'Assam'),
(151, 'Dibrugarh', 'Assam'),
(152, 'Digboi', 'Assam'),
(153, 'Diphu', 'Assam'),
(154, 'Dispur', 'Assam'),
(156, 'Gauripur', 'Assam'),
(157, 'Goalpara', 'Assam'),
(158, 'Golaghat', 'Assam'),
(159, 'Guwahati', 'Assam'),
(160, 'Haflong', 'Assam'),
(161, 'Hailakandi', 'Assam'),
(162, 'Hojai', 'Assam'),
(163, 'Jorhat', 'Assam'),
(164, 'Karimganj', 'Assam'),
(165, 'Kokrajhar', 'Assam'),
(166, 'Lanka', 'Assam'),
(167, 'Lumding', 'Assam'),
(168, 'Mangaldoi', 'Assam'),
(169, 'Mankachar', 'Assam'),
(170, 'Margherita', 'Assam'),
(171, 'Mariani', 'Assam'),
(172, 'Marigaon', 'Assam'),
(173, 'Nagaon', 'Assam'),
(174, 'Nalbari', 'Assam'),
(175, 'North Lakhimpur', 'Assam'),
(176, 'Rangia', 'Assam'),
(177, 'Sibsagar', 'Assam'),
(178, 'Silapathar', 'Assam'),
(179, 'Silchar', 'Assam'),
(180, 'Tezpur', 'Assam'),
(181, 'Tinsukia', 'Assam'),
(182, 'Amarpur', 'Bihar'),
(183, 'Araria', 'Bihar'),
(184, 'Areraj', 'Bihar'),
(185, 'Arrah', 'Bihar'),
(186, 'Asarganj', 'Bihar'),
(187, 'Aurangabad', 'Bihar'),
(188, 'Bagaha', 'Bihar'),
(189, 'Bahadurganj', 'Bihar'),
(190, 'Bairgania', 'Bihar'),
(191, 'Bakhtiarpur', 'Bihar'),
(192, 'Banka', 'Bihar'),
(193, 'Banmankhi Bazar', 'Bihar'),
(194, 'Barahiya', 'Bihar'),
(195, 'Barauli', 'Bihar'),
(196, 'Barbigha', 'Bihar'),
(197, 'Barh', 'Bihar'),
(198, 'Begusarai', 'Bihar'),
(199, 'Behea', 'Bihar'),
(200, 'Bettiah', 'Bihar'),
(201, 'Bhabua', 'Bihar'),
(202, 'Bhagalpur', 'Bihar'),
(203, 'Bihar Sharif', 'Bihar'),
(204, 'Bikramganj', 'Bihar'),
(205, 'Bodh Gaya', 'Bihar'),
(206, 'Buxar', 'Bihar'),
(207, 'Chandan Bara', 'Bihar'),
(208, 'Chanpatia', 'Bihar'),
(209, 'Chhapra', 'Bihar'),
(210, 'Colgong', 'Bihar'),
(211, 'Dalsinghsarai', 'Bihar'),
(212, 'Darbhanga', 'Bihar'),
(213, 'Daudnagar', 'Bihar'),
(214, 'Dehri-on-Sone', 'Bihar'),
(215, 'Dhaka', 'Bihar'),
(216, 'Dighwara', 'Bihar'),
(217, 'Dumraon', 'Bihar'),
(218, 'Fatwah', 'Bihar'),
(219, 'Forbesganj', 'Bihar'),
(220, 'Gaya', 'Bihar'),
(221, 'Gogri Jamalpur', 'Bihar'),
(222, 'Gopalganj', 'Bihar'),
(223, 'Hajipur', 'Bihar'),
(224, 'Hilsa', 'Bihar'),
(225, 'Hisua', 'Bihar'),
(226, 'Islampur', 'Bihar'),
(227, 'Jagdispur', 'Bihar'),
(228, 'Jamalpur', 'Bihar'),
(229, 'Jamui', 'Bihar'),
(230, 'Jehanabad', 'Bihar'),
(231, 'Jhajha', 'Bihar'),
(232, 'Jhanjharpur', 'Bihar'),
(233, 'Jogabani', 'Bihar'),
(234, 'Kanti', 'Bihar'),
(235, 'Katihar', 'Bihar'),
(236, 'Khagaria', 'Bihar'),
(237, 'Kharagpur', 'Bihar'),
(238, 'Kishanganj', 'Bihar'),
(239, 'Lakhisarai', 'Bihar'),
(240, 'Lalganj', 'Bihar'),
(241, 'Madhepura', 'Bihar'),
(242, 'Madhubani', 'Bihar'),
(243, 'Maharajganj', 'Bihar'),
(244, 'Mahnar Bazar', 'Bihar'),
(245, 'Makhdumpur', 'Bihar'),
(246, 'Maner', 'Bihar'),
(247, 'Manihari', 'Bihar'),
(248, 'Marhaura', 'Bihar'),
(249, 'Masaurhi', 'Bihar'),
(250, 'Mirganj', 'Bihar'),
(251, 'Mokameh', 'Bihar'),
(252, 'Motihari', 'Bihar'),
(253, 'Motipur', 'Bihar'),
(254, 'Munger', 'Bihar'),
(255, 'Murliganj', 'Bihar'),
(256, 'Muzaffarpur', 'Bihar'),
(257, 'Narkatiaganj', 'Bihar'),
(258, 'Naugachhia', 'Bihar'),
(259, 'Nawada', 'Bihar'),
(260, 'Nokha', 'Bihar'),
(261, 'Patna', 'Bihar'),
(262, 'Piro', 'Bihar'),
(263, 'Purnia', 'Bihar'),
(264, 'Rafiganj', 'Bihar'),
(265, 'Rajgir', 'Bihar'),
(266, 'Ramnagar', 'Bihar'),
(267, 'Raxaul Bazar', 'Bihar'),
(268, 'Revelganj', 'Bihar'),
(269, 'Rosera', 'Bihar'),
(270, 'Saharsa', 'Bihar'),
(271, 'Samastipur', 'Bihar'),
(272, 'Sasaram', 'Bihar'),
(273, 'Sheikhpura', 'Bihar'),
(274, 'Sheohar', 'Bihar'),
(275, 'Sherghati', 'Bihar'),
(276, 'Silao', 'Bihar'),
(277, 'Sitamarhi', 'Bihar'),
(278, 'Siwan', 'Bihar'),
(279, 'Sonepur', 'Bihar'),
(280, 'Sugauli', 'Bihar'),
(281, 'Sultanganj', 'Bihar'),
(282, 'Supaul', 'Bihar'),
(283, 'Warisaliganj', 'Bihar'),
(284, 'Ahiwara', 'Chhattisgarh'),
(285, 'Akaltara', 'Chhattisgarh'),
(286, 'Ambagarh Chowki', 'Chhattisgarh'),
(287, 'Ambikapur', 'Chhattisgarh'),
(288, 'Arang', 'Chhattisgarh'),
(289, 'Bade Bacheli', 'Chhattisgarh'),
(290, 'Balod', 'Chhattisgarh'),
(291, 'Baloda Bazar', 'Chhattisgarh'),
(292, 'Bemetra', 'Chhattisgarh'),
(293, 'Bhatapara', 'Chhattisgarh'),
(294, 'Bilaspur', 'Chhattisgarh'),
(295, 'Birgaon', 'Chhattisgarh'),
(296, 'Champa', 'Chhattisgarh'),
(297, 'Chirmiri', 'Chhattisgarh'),
(298, 'Dalli-Rajhara', 'Chhattisgarh'),
(299, 'Dhamtari', 'Chhattisgarh'),
(300, 'Dipka', 'Chhattisgarh'),
(301, 'Dongargarh', 'Chhattisgarh'),
(302, 'Durg-Bhilai Nagar', 'Chhattisgarh'),
(303, 'Gobranawapara', 'Chhattisgarh'),
(304, 'Jagdalpur', 'Chhattisgarh'),
(305, 'Janjgir', 'Chhattisgarh'),
(306, 'Jashpurnagar', 'Chhattisgarh'),
(307, 'Kanker', 'Chhattisgarh'),
(308, 'Kawardha', 'Chhattisgarh'),
(309, 'Kondagaon', 'Chhattisgarh'),
(310, 'Korba', 'Chhattisgarh'),
(311, 'Mahasamund', 'Chhattisgarh'),
(312, 'Mahendragarh', 'Chhattisgarh'),
(313, 'Mungeli', 'Chhattisgarh'),
(314, 'Naila Janjgir', 'Chhattisgarh'),
(315, 'Raigarh', 'Chhattisgarh'),
(316, 'Raipur', 'Chhattisgarh'),
(317, 'Rajnandgaon', 'Chhattisgarh'),
(318, 'Sakti', 'Chhattisgarh'),
(319, 'Tilda Newra', 'Chhattisgarh'),
(320, 'Amli', 'Dadra & Nagar Haveli'),
(321, 'Silvassa', 'Dadra and Nagar Haveli'),
(322, 'Daman and Diu', 'Daman & Diu'),
(323, 'Daman and Diu', 'Daman & Diu'),
(324, 'Asola', 'Delhi'),
(325, 'Delhi', 'Delhi'),
(326, 'Aldona', 'Goa'),
(327, 'Curchorem Cacora', 'Goa'),
(328, 'Madgaon', 'Goa'),
(329, 'Mapusa', 'Goa'),
(330, 'Margao', 'Goa'),
(331, 'Marmagao', 'Goa'),
(332, 'Panaji', 'Goa'),
(333, 'Ahmedabad', 'Gujarat'),
(334, 'Amreli', 'Gujarat'),
(335, 'Anand', 'Gujarat'),
(336, 'Ankleshwar', 'Gujarat'),
(337, 'Bharuch', 'Gujarat'),
(338, 'Bhavnagar', 'Gujarat'),
(339, 'Bhuj', 'Gujarat'),
(340, 'Cambay', 'Gujarat'),
(341, 'Dahod', 'Gujarat'),
(342, 'Deesa', 'Gujarat'),
(343, '\"Dharampur', ' India\"'),
(344, 'Dholka', 'Gujarat'),
(345, 'Gandhinagar', 'Gujarat'),
(346, 'Godhra', 'Gujarat'),
(347, 'Himatnagar', 'Gujarat'),
(348, 'Idar', 'Gujarat'),
(349, 'Jamnagar', 'Gujarat'),
(350, 'Junagadh', 'Gujarat'),
(351, 'Kadi', 'Gujarat'),
(352, 'Kalavad', 'Gujarat'),
(353, 'Kalol', 'Gujarat'),
(354, 'Kapadvanj', 'Gujarat'),
(355, 'Karjan', 'Gujarat'),
(356, 'Keshod', 'Gujarat'),
(357, 'Khambhalia', 'Gujarat'),
(358, 'Khambhat', 'Gujarat'),
(359, 'Kheda', 'Gujarat'),
(360, 'Khedbrahma', 'Gujarat'),
(361, 'Kheralu', 'Gujarat'),
(362, 'Kodinar', 'Gujarat'),
(363, 'Lathi', 'Gujarat'),
(364, 'Limbdi', 'Gujarat'),
(365, 'Lunawada', 'Gujarat'),
(366, 'Mahesana', 'Gujarat'),
(367, 'Mahuva', 'Gujarat'),
(368, 'Manavadar', 'Gujarat'),
(369, 'Mandvi', 'Gujarat'),
(370, 'Mangrol', 'Gujarat'),
(371, 'Mansa', 'Gujarat'),
(372, 'Mehmedabad', 'Gujarat'),
(373, 'Modasa', 'Gujarat'),
(374, 'Morvi', 'Gujarat'),
(375, 'Nadiad', 'Gujarat'),
(376, 'Navsari', 'Gujarat'),
(377, 'Padra', 'Gujarat'),
(378, 'Palanpur', 'Gujarat'),
(379, 'Palitana', 'Gujarat'),
(380, 'Pardi', 'Gujarat'),
(381, 'Patan', 'Gujarat'),
(382, 'Petlad', 'Gujarat'),
(383, 'Porbandar', 'Gujarat'),
(384, 'Radhanpur', 'Gujarat'),
(385, 'Rajkot', 'Gujarat'),
(386, 'Rajpipla', 'Gujarat'),
(387, 'Rajula', 'Gujarat'),
(388, 'Ranavav', 'Gujarat'),
(389, 'Rapar', 'Gujarat'),
(390, 'Salaya', 'Gujarat'),
(391, 'Sanand', 'Gujarat'),
(392, 'Savarkundla', 'Gujarat'),
(393, 'Sidhpur', 'Gujarat'),
(394, 'Sihor', 'Gujarat'),
(395, 'Songadh', 'Gujarat'),
(396, 'Surat', 'Gujarat'),
(397, 'Talaja', 'Gujarat'),
(398, 'Thangadh', 'Gujarat'),
(399, 'Tharad', 'Gujarat'),
(400, 'Umbergaon', 'Gujarat'),
(401, 'Umreth', 'Gujarat'),
(402, 'Una', 'Gujarat'),
(403, 'Unjha', 'Gujarat'),
(404, 'Upleta', 'Gujarat'),
(405, 'Vadnagar', 'Gujarat'),
(406, 'Vadodara', 'Gujarat'),
(407, 'Valsad', 'Gujarat'),
(408, 'Vapi', 'Gujarat'),
(409, 'Vapi', 'Gujarat'),
(410, 'Veraval', 'Gujarat'),
(411, 'Vijapur', 'Gujarat'),
(412, 'Viramgam', 'Gujarat'),
(413, 'Visnagar', 'Gujarat'),
(414, 'Vyara', 'Gujarat'),
(415, 'Wadhwan', 'Gujarat'),
(416, 'Wankaner', 'Gujarat'),
(417, 'Adalaj', 'Gujrat'),
(418, 'Adityana', 'Gujrat'),
(419, 'Alang', 'Gujrat'),
(420, 'Ambaji', 'Gujrat'),
(421, 'Ambaliyasan', 'Gujrat'),
(422, 'Andada', 'Gujrat'),
(423, 'Anjar', 'Gujrat'),
(424, 'Anklav', 'Gujrat'),
(425, 'Antaliya', 'Gujrat'),
(426, 'Arambhada', 'Gujrat'),
(427, 'Atul', 'Gujrat'),
(428, 'Ballabhgarh', 'Hariyana'),
(429, 'Ambala', 'Haryana'),
(430, 'Ambala', 'Haryana'),
(431, 'Asankhurd', 'Haryana'),
(432, 'Assandh', 'Haryana'),
(433, 'Ateli', 'Haryana'),
(434, 'Babiyal', 'Haryana'),
(435, 'Bahadurgarh', 'Haryana'),
(436, 'Barwala', 'Haryana'),
(437, 'Bhiwani', 'Haryana'),
(438, 'Charkhi Dadri', 'Haryana'),
(439, 'Cheeka', 'Haryana'),
(440, 'Ellenabad 2', 'Haryana'),
(441, 'Faridabad', 'Haryana'),
(442, 'Fatehabad', 'Haryana'),
(443, 'Ganaur', 'Haryana'),
(444, 'Gharaunda', 'Haryana'),
(445, 'Gohana', 'Haryana'),
(446, 'Gurgaon', 'Haryana'),
(447, 'Haibat(Yamuna Nagar)', 'Haryana'),
(448, 'Hansi', 'Haryana'),
(449, 'Hisar', 'Haryana'),
(450, 'Hodal', 'Haryana'),
(451, 'Jhajjar', 'Haryana'),
(452, 'Jind', 'Haryana'),
(453, 'Kaithal', 'Haryana'),
(454, 'Kalan Wali', 'Haryana'),
(455, 'Kalka', 'Haryana'),
(456, 'Karnal', 'Haryana'),
(457, 'Ladwa', 'Haryana'),
(458, 'Mahendragarh', 'Haryana'),
(459, 'Mandi Dabwali', 'Haryana'),
(460, 'Narnaul', 'Haryana'),
(461, 'Narwana', 'Haryana'),
(462, 'Palwal', 'Haryana'),
(463, 'Panchkula', 'Haryana'),
(464, 'Panipat', 'Haryana'),
(465, 'Pehowa', 'Haryana'),
(466, 'Pinjore', 'Haryana'),
(467, 'Rania', 'Haryana'),
(468, 'Ratia', 'Haryana'),
(469, 'Rewari', 'Haryana'),
(470, 'Rohtak', 'Haryana'),
(471, 'Safidon', 'Haryana'),
(472, 'Samalkha', 'Haryana'),
(473, 'Shahbad', 'Haryana'),
(474, 'Sirsa', 'Haryana'),
(475, 'Sohna', 'Haryana'),
(476, 'Sonipat', 'Haryana'),
(477, 'Taraori', 'Haryana'),
(478, 'Thanesar', 'Haryana'),
(479, 'Tohana', 'Haryana'),
(480, 'Yamunanagar', 'Haryana'),
(481, 'Arki', 'Himachal Pradesh'),
(482, 'Baddi', 'Himachal Pradesh'),
(483, 'Bilaspur', 'Himachal Pradesh'),
(484, 'Chamba', 'Himachal Pradesh'),
(485, 'Dalhousie', 'Himachal Pradesh'),
(486, 'Dharamsala', 'Himachal Pradesh'),
(487, 'Hamirpur', 'Himachal Pradesh'),
(488, 'Mandi', 'Himachal Pradesh'),
(489, 'Nahan', 'Himachal Pradesh'),
(490, 'Shimla', 'Himachal Pradesh'),
(491, 'Solan', 'Himachal Pradesh'),
(492, 'Sundarnagar', 'Himachal Pradesh'),
(493, 'Jammu', 'Jammu & Kashmir'),
(494, 'Achabbal', 'Jammu and Kashmir'),
(495, 'Akhnoor', 'Jammu and Kashmir'),
(496, 'Anantnag', 'Jammu and Kashmir'),
(497, 'Arnia', 'Jammu and Kashmir'),
(498, 'Awantipora', 'Jammu and Kashmir'),
(499, 'Bandipore', 'Jammu and Kashmir'),
(500, 'Baramula', 'Jammu and Kashmir'),
(501, 'Kathua', 'Jammu and Kashmir'),
(502, 'Leh', 'Jammu and Kashmir'),
(503, 'Punch', 'Jammu and Kashmir'),
(504, 'Rajauri', 'Jammu and Kashmir'),
(505, 'Sopore', 'Jammu and Kashmir'),
(506, 'Srinagar', 'Jammu and Kashmir'),
(507, 'Udhampur', 'Jammu and Kashmir'),
(508, 'Amlabad', 'Jharkhand'),
(509, 'Ara', 'Jharkhand'),
(510, 'Barughutu', 'Jharkhand'),
(511, 'Bokaro Steel City', 'Jharkhand'),
(512, 'Chaibasa', 'Jharkhand'),
(513, 'Chakradharpur', 'Jharkhand'),
(514, 'Chandrapura', 'Jharkhand'),
(515, 'Chatra', 'Jharkhand'),
(516, 'Chirkunda', 'Jharkhand'),
(517, 'Churi', 'Jharkhand'),
(518, 'Daltonganj', 'Jharkhand'),
(519, 'Deoghar', 'Jharkhand'),
(520, 'Dhanbad', 'Jharkhand'),
(521, 'Dumka', 'Jharkhand'),
(522, 'Garhwa', 'Jharkhand'),
(523, 'Ghatshila', 'Jharkhand'),
(524, 'Giridih', 'Jharkhand'),
(525, 'Godda', 'Jharkhand'),
(526, 'Gomoh', 'Jharkhand'),
(527, 'Gumia', 'Jharkhand'),
(528, 'Gumla', 'Jharkhand'),
(529, 'Hazaribag', 'Jharkhand'),
(530, 'Hussainabad', 'Jharkhand'),
(531, 'Jamshedpur', 'Jharkhand'),
(532, 'Jamtara', 'Jharkhand'),
(533, 'Jhumri Tilaiya', 'Jharkhand'),
(534, 'Khunti', 'Jharkhand'),
(535, 'Lohardaga', 'Jharkhand'),
(536, 'Madhupur', 'Jharkhand'),
(537, 'Mihijam', 'Jharkhand'),
(538, 'Musabani', 'Jharkhand'),
(539, 'Pakaur', 'Jharkhand'),
(540, 'Patratu', 'Jharkhand'),
(541, 'Phusro', 'Jharkhand'),
(542, 'Ramngarh', 'Jharkhand'),
(543, 'Ranchi', 'Jharkhand'),
(544, 'Sahibganj', 'Jharkhand'),
(545, 'Saunda', 'Jharkhand'),
(546, 'Simdega', 'Jharkhand'),
(547, 'Tenu Dam-cum- Kathhara', 'Jharkhand'),
(548, 'Arasikere', 'Karnataka'),
(549, 'Bangalore', 'Karnataka'),
(550, 'Belgaum', 'Karnataka'),
(551, 'Bellary', 'Karnataka'),
(552, 'Chamrajnagar', 'Karnataka'),
(553, 'Chikkaballapur', 'Karnataka'),
(554, 'Chintamani', 'Karnataka'),
(555, 'Chitradurga', 'Karnataka'),
(556, 'Gulbarga', 'Karnataka'),
(557, 'Gundlupet', 'Karnataka'),
(558, 'Hassan', 'Karnataka'),
(559, 'Hospet', 'Karnataka'),
(560, 'Hubli', 'Karnataka'),
(561, 'Karkala', 'Karnataka'),
(562, 'Karwar', 'Karnataka'),
(563, 'Kolar', 'Karnataka'),
(564, 'Kota', 'Karnataka'),
(565, 'Lakshmeshwar', 'Karnataka'),
(566, 'Lingsugur', 'Karnataka'),
(567, 'Maddur', 'Karnataka'),
(568, 'Madhugiri', 'Karnataka'),
(569, 'Madikeri', 'Karnataka'),
(570, 'Magadi', 'Karnataka'),
(571, 'Mahalingpur', 'Karnataka'),
(572, 'Malavalli', 'Karnataka'),
(573, 'Malur', 'Karnataka'),
(574, 'Mandya', 'Karnataka'),
(575, 'Mangalore', 'Karnataka'),
(576, 'Manvi', 'Karnataka'),
(577, 'Mudalgi', 'Karnataka'),
(578, 'Mudbidri', 'Karnataka'),
(579, 'Muddebihal', 'Karnataka'),
(580, 'Mudhol', 'Karnataka'),
(581, 'Mulbagal', 'Karnataka'),
(582, 'Mundargi', 'Karnataka'),
(583, 'Mysore', 'Karnataka'),
(584, 'Nanjangud', 'Karnataka'),
(585, 'Pavagada', 'Karnataka'),
(586, 'Puttur', 'Karnataka'),
(587, 'Rabkavi Banhatti', 'Karnataka'),
(588, 'Raichur', 'Karnataka'),
(589, 'Ramanagaram', 'Karnataka'),
(590, 'Ramdurg', 'Karnataka'),
(591, 'Ranibennur', 'Karnataka'),
(592, 'Robertson Pet', 'Karnataka'),
(593, 'Ron', 'Karnataka'),
(594, 'Sadalgi', 'Karnataka'),
(595, 'Sagar', 'Karnataka'),
(596, 'Sakleshpur', 'Karnataka'),
(597, 'Sandur', 'Karnataka'),
(598, 'Sankeshwar', 'Karnataka'),
(599, 'Saundatti-Yellamma', 'Karnataka'),
(600, 'Savanur', 'Karnataka'),
(601, 'Sedam', 'Karnataka'),
(602, 'Shahabad', 'Karnataka'),
(603, 'Shahpur', 'Karnataka'),
(604, 'Shiggaon', 'Karnataka'),
(605, 'Shikapur', 'Karnataka'),
(606, 'Shimoga', 'Karnataka'),
(607, 'Shorapur', 'Karnataka'),
(608, 'Shrirangapattana', 'Karnataka'),
(609, 'Sidlaghatta', 'Karnataka'),
(610, 'Sindgi', 'Karnataka'),
(611, 'Sindhnur', 'Karnataka'),
(612, 'Sira', 'Karnataka'),
(613, 'Sirsi', 'Karnataka'),
(614, 'Siruguppa', 'Karnataka'),
(615, 'Srinivaspur', 'Karnataka'),
(616, 'Talikota', 'Karnataka'),
(617, 'Tarikere', 'Karnataka'),
(618, 'Tekkalakota', 'Karnataka'),
(619, 'Terdal', 'Karnataka'),
(620, 'Tiptur', 'Karnataka'),
(621, 'Tumkur', 'Karnataka'),
(622, 'Udupi', 'Karnataka'),
(623, 'Vijayapura', 'Karnataka'),
(624, 'Wadi', 'Karnataka'),
(625, 'Yadgir', 'Karnataka'),
(626, 'Adoor', 'Kerala'),
(627, 'Akathiyoor', 'Kerala'),
(628, 'Alappuzha', 'Kerala'),
(629, 'Ancharakandy', 'Kerala'),
(630, 'Aroor', 'Kerala'),
(631, 'Ashtamichira', 'Kerala'),
(632, 'Attingal', 'Kerala'),
(633, 'Avinissery', 'Kerala'),
(634, 'Chalakudy', 'Kerala'),
(635, 'Changanassery', 'Kerala'),
(636, 'Chendamangalam', 'Kerala'),
(637, 'Chengannur', 'Kerala'),
(638, 'Cherthala', 'Kerala'),
(639, 'Cheruthazham', 'Kerala'),
(640, 'Chittur-Thathamangalam', 'Kerala'),
(641, 'Chockli', 'Kerala'),
(642, 'Erattupetta', 'Kerala'),
(643, 'Guruvayoor', 'Kerala'),
(644, 'Irinjalakuda', 'Kerala'),
(645, 'Kadirur', 'Kerala'),
(646, 'Kalliasseri', 'Kerala'),
(647, 'Kalpetta', 'Kerala'),
(648, 'Kanhangad', 'Kerala'),
(649, 'Kanjikkuzhi', 'Kerala'),
(650, 'Kannur', 'Kerala'),
(651, 'Kasaragod', 'Kerala'),
(652, 'Kayamkulam', 'Kerala'),
(653, 'Kochi', 'Kerala'),
(654, 'Kodungallur', 'Kerala'),
(655, 'Kollam', 'Kerala'),
(656, 'Koothuparamba', 'Kerala'),
(657, 'Kothamangalam', 'Kerala'),
(658, 'Kottayam', 'Kerala'),
(659, 'Kozhikode', 'Kerala'),
(660, 'Kunnamkulam', 'Kerala'),
(661, 'Malappuram', 'Kerala'),
(662, 'Mattannur', 'Kerala'),
(663, 'Mavelikkara', 'Kerala'),
(664, 'Mavoor', 'Kerala'),
(665, 'Muvattupuzha', 'Kerala'),
(666, 'Nedumangad', 'Kerala'),
(667, 'Neyyattinkara', 'Kerala'),
(668, 'Ottappalam', 'Kerala'),
(669, 'Palai', 'Kerala'),
(670, 'Palakkad', 'Kerala'),
(671, 'Panniyannur', 'Kerala'),
(672, 'Pappinisseri', 'Kerala'),
(673, 'Paravoor', 'Kerala'),
(674, 'Pathanamthitta', 'Kerala'),
(675, 'Payyannur', 'Kerala'),
(676, 'Peringathur', 'Kerala'),
(677, 'Perinthalmanna', 'Kerala'),
(678, 'Perumbavoor', 'Kerala'),
(679, 'Ponnani', 'Kerala'),
(680, 'Punalur', 'Kerala'),
(681, 'Quilandy', 'Kerala'),
(682, 'Shoranur', 'Kerala'),
(683, 'Taliparamba', 'Kerala'),
(684, 'Thiruvalla', 'Kerala'),
(685, 'Thiruvananthapuram', 'Kerala'),
(686, 'Thodupuzha', 'Kerala'),
(687, 'Thrissur', 'Kerala'),
(688, 'Tirur', 'Kerala'),
(689, 'Vadakara', 'Kerala'),
(690, 'Vaikom', 'Kerala'),
(691, 'Varkala', 'Kerala'),
(692, 'Kavaratti', 'Lakshadweep'),
(693, 'Ashok Nagar', 'Madhya Pradesh'),
(694, 'Balaghat', 'Madhya Pradesh'),
(695, 'Betul', 'Madhya Pradesh'),
(696, 'Bhopal', 'Madhya Pradesh'),
(697, 'Burhanpur', 'Madhya Pradesh'),
(698, 'Chhatarpur', 'Madhya Pradesh'),
(699, 'Dabra', 'Madhya Pradesh'),
(700, 'Datia', 'Madhya Pradesh'),
(701, 'Dewas', 'Madhya Pradesh'),
(702, 'Dhar', 'Madhya Pradesh'),
(703, 'Fatehabad', 'Madhya Pradesh'),
(704, 'Gwalior', 'Madhya Pradesh'),
(705, 'Indore', 'Madhya Pradesh'),
(706, 'Itarsi', 'Madhya Pradesh'),
(707, 'Jabalpur', 'Madhya Pradesh'),
(708, 'Katni', 'Madhya Pradesh'),
(709, 'Kotma', 'Madhya Pradesh'),
(710, 'Lahar', 'Madhya Pradesh'),
(711, 'Lundi', 'Madhya Pradesh'),
(712, 'Maharajpur', 'Madhya Pradesh'),
(713, 'Mahidpur', 'Madhya Pradesh'),
(714, 'Maihar', 'Madhya Pradesh'),
(715, 'Malajkhand', 'Madhya Pradesh'),
(716, 'Manasa', 'Madhya Pradesh'),
(717, 'Manawar', 'Madhya Pradesh'),
(718, 'Mandideep', 'Madhya Pradesh'),
(719, 'Mandla', 'Madhya Pradesh'),
(720, 'Mandsaur', 'Madhya Pradesh'),
(721, 'Mauganj', 'Madhya Pradesh'),
(722, 'Mhow Cantonment', 'Madhya Pradesh'),
(723, 'Mhowgaon', 'Madhya Pradesh'),
(724, 'Morena', 'Madhya Pradesh'),
(725, 'Multai', 'Madhya Pradesh'),
(726, 'Murwara', 'Madhya Pradesh'),
(727, 'Nagda', 'Madhya Pradesh'),
(728, 'Nainpur', 'Madhya Pradesh'),
(729, 'Narsinghgarh', 'Madhya Pradesh'),
(730, 'Narsinghgarh', 'Madhya Pradesh'),
(731, 'Neemuch', 'Madhya Pradesh'),
(732, 'Nepanagar', 'Madhya Pradesh'),
(733, 'Niwari', 'Madhya Pradesh'),
(734, 'Nowgong', 'Madhya Pradesh'),
(735, 'Nowrozabad', 'Madhya Pradesh'),
(736, 'Pachore', 'Madhya Pradesh'),
(737, 'Pali', 'Madhya Pradesh'),
(738, 'Panagar', 'Madhya Pradesh'),
(739, 'Pandhurna', 'Madhya Pradesh'),
(740, 'Panna', 'Madhya Pradesh'),
(741, 'Pasan', 'Madhya Pradesh'),
(742, 'Pipariya', 'Madhya Pradesh'),
(743, 'Pithampur', 'Madhya Pradesh'),
(744, 'Porsa', 'Madhya Pradesh'),
(745, 'Prithvipur', 'Madhya Pradesh'),
(746, 'Raghogarh-Vijaypur', 'Madhya Pradesh'),
(747, 'Rahatgarh', 'Madhya Pradesh'),
(748, 'Raisen', 'Madhya Pradesh'),
(749, 'Rajgarh', 'Madhya Pradesh'),
(750, 'Ratlam', 'Madhya Pradesh'),
(751, 'Rau', 'Madhya Pradesh'),
(752, 'Rehli', 'Madhya Pradesh'),
(753, 'Rewa', 'Madhya Pradesh'),
(754, 'Sabalgarh', 'Madhya Pradesh'),
(755, 'Sagar', 'Madhya Pradesh'),
(756, 'Sanawad', 'Madhya Pradesh'),
(757, 'Sarangpur', 'Madhya Pradesh'),
(758, 'Sarni', 'Madhya Pradesh'),
(759, 'Satna', 'Madhya Pradesh'),
(760, 'Sausar', 'Madhya Pradesh'),
(761, 'Sehore', 'Madhya Pradesh'),
(762, 'Sendhwa', 'Madhya Pradesh'),
(763, 'Seoni', 'Madhya Pradesh'),
(764, 'Seoni-Malwa', 'Madhya Pradesh'),
(765, 'Shahdol', 'Madhya Pradesh'),
(766, 'Shajapur', 'Madhya Pradesh'),
(767, 'Shamgarh', 'Madhya Pradesh'),
(768, 'Sheopur', 'Madhya Pradesh'),
(769, 'Shivpuri', 'Madhya Pradesh'),
(770, 'Shujalpur', 'Madhya Pradesh'),
(771, 'Sidhi', 'Madhya Pradesh'),
(772, 'Sihora', 'Madhya Pradesh'),
(773, 'Singrauli', 'Madhya Pradesh'),
(774, 'Sironj', 'Madhya Pradesh'),
(775, 'Sohagpur', 'Madhya Pradesh'),
(776, 'Tarana', 'Madhya Pradesh'),
(777, 'Tikamgarh', 'Madhya Pradesh'),
(778, 'Ujhani', 'Madhya Pradesh'),
(779, 'Ujjain', 'Madhya Pradesh'),
(780, 'Umaria', 'Madhya Pradesh'),
(781, 'Vidisha', 'Madhya Pradesh'),
(782, 'Wara Seoni', 'Madhya Pradesh'),
(783, 'Ahmednagar', 'Maharashtra'),
(784, 'Akola', 'Maharashtra'),
(785, 'Amravati', 'Maharashtra'),
(786, 'Aurangabad', 'Maharashtra'),
(787, 'Baramati', 'Maharashtra'),
(788, 'Chalisgaon', 'Maharashtra'),
(789, 'Chinchani', 'Maharashtra'),
(790, 'Devgarh', 'Maharashtra'),
(791, 'Dhule', 'Maharashtra'),
(792, 'Dombivli', 'Maharashtra'),
(793, 'Durgapur', 'Maharashtra'),
(794, 'Ichalkaranji', 'Maharashtra'),
(795, 'Jalna', 'Maharashtra'),
(796, 'Kalyan', 'Maharashtra'),
(797, 'Latur', 'Maharashtra'),
(798, 'Loha', 'Maharashtra'),
(799, 'Lonar', 'Maharashtra'),
(800, 'Lonavla', 'Maharashtra'),
(801, 'Mahad', 'Maharashtra'),
(802, 'Mahuli', 'Maharashtra'),
(803, 'Malegaon', 'Maharashtra'),
(804, 'Malkapur', 'Maharashtra'),
(805, 'Manchar', 'Maharashtra'),
(806, 'Mangalvedhe', 'Maharashtra'),
(807, 'Mangrulpir', 'Maharashtra'),
(808, 'Manjlegaon', 'Maharashtra'),
(809, 'Manmad', 'Maharashtra'),
(810, 'Manwath', 'Maharashtra'),
(811, 'Mehkar', 'Maharashtra'),
(812, 'Mhaswad', 'Maharashtra'),
(813, 'Miraj', 'Maharashtra'),
(814, 'Morshi', 'Maharashtra'),
(815, 'Mukhed', 'Maharashtra'),
(816, 'Mul', 'Maharashtra'),
(817, 'Mumbai', 'Maharashtra'),
(818, 'Murtijapur', 'Maharashtra'),
(819, 'Nagpur', 'Maharashtra'),
(820, 'Nalasopara', 'Maharashtra'),
(821, 'Nanded-Waghala', 'Maharashtra'),
(822, 'Nandgaon', 'Maharashtra'),
(823, 'Nandura', 'Maharashtra'),
(824, 'Nandurbar', 'Maharashtra'),
(825, 'Narkhed', 'Maharashtra'),
(826, 'Nashik', 'Maharashtra'),
(827, 'Navi Mumbai', 'Maharashtra'),
(828, 'Nawapur', 'Maharashtra'),
(829, 'Nilanga', 'Maharashtra'),
(830, 'Osmanabad', 'Maharashtra'),
(831, 'Ozar', 'Maharashtra'),
(832, 'Pachora', 'Maharashtra'),
(833, 'Paithan', 'Maharashtra'),
(834, 'Palghar', 'Maharashtra'),
(835, 'Pandharkaoda', 'Maharashtra'),
(836, 'Pandharpur', 'Maharashtra'),
(837, 'Panvel', 'Maharashtra'),
(838, 'Parbhani', 'Maharashtra'),
(839, 'Parli', 'Maharashtra'),
(840, 'Parola', 'Maharashtra'),
(841, 'Partur', 'Maharashtra'),
(842, 'Pathardi', 'Maharashtra'),
(843, 'Pathri', 'Maharashtra'),
(844, 'Patur', 'Maharashtra'),
(845, 'Pauni', 'Maharashtra'),
(846, 'Pen', 'Maharashtra'),
(847, 'Phaltan', 'Maharashtra'),
(848, 'Pulgaon', 'Maharashtra'),
(849, 'Pune', 'Maharashtra'),
(850, 'Purna', 'Maharashtra'),
(851, 'Pusad', 'Maharashtra'),
(852, 'Rahuri', 'Maharashtra'),
(853, 'Rajura', 'Maharashtra'),
(854, 'Ramtek', 'Maharashtra'),
(855, 'Ratnagiri', 'Maharashtra'),
(856, 'Raver', 'Maharashtra'),
(857, 'Risod', 'Maharashtra'),
(858, 'Sailu', 'Maharashtra'),
(859, 'Sangamner', 'Maharashtra'),
(860, 'Sangli', 'Maharashtra'),
(861, 'Sangole', 'Maharashtra'),
(862, 'Sasvad', 'Maharashtra'),
(863, 'Satana', 'Maharashtra'),
(864, 'Satara', 'Maharashtra'),
(865, 'Savner', 'Maharashtra'),
(866, 'Sawantwadi', 'Maharashtra'),
(867, 'Shahade', 'Maharashtra'),
(868, 'Shegaon', 'Maharashtra'),
(869, 'Shendurjana', 'Maharashtra'),
(870, 'Shirdi', 'Maharashtra'),
(871, 'Shirpur-Warwade', 'Maharashtra'),
(872, 'Shirur', 'Maharashtra'),
(873, 'Shrigonda', 'Maharashtra'),
(874, 'Shrirampur', 'Maharashtra'),
(875, 'Sillod', 'Maharashtra'),
(876, 'Sinnar', 'Maharashtra'),
(877, 'Solapur', 'Maharashtra'),
(878, 'Soyagaon', 'Maharashtra'),
(879, 'Talegaon Dabhade', 'Maharashtra'),
(880, 'Talode', 'Maharashtra'),
(881, 'Tasgaon', 'Maharashtra'),
(882, 'Tirora', 'Maharashtra'),
(883, 'Tuljapur', 'Maharashtra'),
(884, 'Tumsar', 'Maharashtra'),
(885, 'Uran', 'Maharashtra'),
(886, 'Uran Islampur', 'Maharashtra'),
(887, 'Wadgaon Road', 'Maharashtra'),
(888, 'Wai', 'Maharashtra'),
(889, 'Wani', 'Maharashtra'),
(890, 'Wardha', 'Maharashtra'),
(891, 'Warora', 'Maharashtra'),
(892, 'Warud', 'Maharashtra'),
(893, 'Washim', 'Maharashtra'),
(894, 'Yevla', 'Maharashtra'),
(895, 'Uchgaon', 'Maharastra'),
(896, 'Udgir', 'Maharastra'),
(897, 'Umarga', 'Maharastra'),
(898, 'Umarkhed', 'Maharastra'),
(899, 'Umred', 'Maharastra'),
(900, 'Vadgaon Kasba', 'Maharastra'),
(901, 'Vaijapur', 'Maharastra'),
(902, 'Vasai', 'Maharastra'),
(903, 'Virar', 'Maharastra'),
(904, 'Vita', 'Maharastra'),
(905, 'Yavatmal', 'Maharastra'),
(906, 'Yawal', 'Maharastra'),
(907, 'Imphal', 'Manipur'),
(908, 'Kakching', 'Manipur'),
(909, 'Lilong', 'Manipur'),
(910, 'Mayang Imphal', 'Manipur'),
(911, 'Thoubal', 'Manipur'),
(912, 'Jowai', 'Meghalaya'),
(913, 'Nongstoin', 'Meghalaya'),
(914, 'Shillong', 'Meghalaya'),
(915, 'Tura', 'Meghalaya'),
(916, 'Aizawl', 'Mizoram'),
(917, 'Champhai', 'Mizoram'),
(918, 'Lunglei', 'Mizoram'),
(919, 'Saiha', 'Mizoram'),
(920, 'Dimapur', 'Nagaland'),
(921, 'Kohima', 'Nagaland'),
(922, 'Mokokchung', 'Nagaland'),
(923, 'Tuensang', 'Nagaland'),
(924, 'Wokha', 'Nagaland'),
(925, 'Zunheboto', 'Nagaland'),
(950, 'Anandapur', 'Orissa'),
(951, 'Anugul', 'Orissa'),
(952, 'Asika', 'Orissa'),
(953, 'Balangir', 'Orissa'),
(954, 'Balasore', 'Orissa'),
(955, 'Baleshwar', 'Orissa'),
(956, 'Bamra', 'Orissa'),
(957, 'Barbil', 'Orissa'),
(958, 'Bargarh', 'Orissa'),
(959, 'Bargarh', 'Orissa'),
(960, 'Baripada', 'Orissa'),
(961, 'Basudebpur', 'Orissa'),
(962, 'Belpahar', 'Orissa'),
(963, 'Bhadrak', 'Orissa'),
(964, 'Bhawanipatna', 'Orissa'),
(965, 'Bhuban', 'Orissa'),
(966, 'Bhubaneswar', 'Orissa'),
(967, 'Biramitrapur', 'Orissa'),
(968, 'Brahmapur', 'Orissa'),
(969, 'Brajrajnagar', 'Orissa'),
(970, 'Byasanagar', 'Orissa'),
(971, 'Cuttack', 'Orissa'),
(972, 'Debagarh', 'Orissa'),
(973, 'Dhenkanal', 'Orissa'),
(974, 'Gunupur', 'Orissa'),
(975, 'Hinjilicut', 'Orissa'),
(976, 'Jagatsinghapur', 'Orissa'),
(977, 'Jajapur', 'Orissa'),
(978, 'Jaleswar', 'Orissa'),
(979, 'Jatani', 'Orissa'),
(980, 'Jeypur', 'Orissa'),
(981, 'Jharsuguda', 'Orissa'),
(982, 'Joda', 'Orissa'),
(983, 'Kantabanji', 'Orissa'),
(984, 'Karanjia', 'Orissa'),
(985, 'Kendrapara', 'Orissa'),
(986, 'Kendujhar', 'Orissa'),
(987, 'Khordha', 'Orissa'),
(988, 'Koraput', 'Orissa'),
(989, 'Malkangiri', 'Orissa'),
(990, 'Nabarangapur', 'Orissa'),
(991, 'Paradip', 'Orissa'),
(992, 'Parlakhemundi', 'Orissa'),
(993, 'Pattamundai', 'Orissa'),
(994, 'Phulabani', 'Orissa'),
(995, 'Puri', 'Orissa'),
(996, 'Rairangpur', 'Orissa'),
(997, 'Rajagangapur', 'Orissa'),
(998, 'Raurkela', 'Orissa'),
(999, 'Rayagada', 'Orissa'),
(1000, 'Sambalpur', 'Orissa'),
(1001, 'Soro', 'Orissa'),
(1002, 'Sunabeda', 'Orissa'),
(1003, 'Sundargarh', 'Orissa'),
(1004, 'Talcher', 'Orissa'),
(1005, 'Titlagarh', 'Orissa'),
(1006, 'Umarkote', 'Orissa'),
(1007, 'Karaikal', 'Pondicherry'),
(1008, 'Mahe', 'Pondicherry'),
(1009, 'Pondicherry', 'Pondicherry'),
(1010, 'Yanam', 'Pondicherry'),
(1011, 'Ahmedgarh', 'Punjab'),
(1012, 'Amritsar', 'Punjab'),
(1013, 'Barnala', 'Punjab'),
(1014, 'Batala', 'Punjab'),
(1015, 'Bathinda', 'Punjab'),
(1016, 'Bhagha Purana', 'Punjab'),
(1017, 'Budhlada', 'Punjab'),
(1018, 'Chandigarh', 'Punjab'),
(1019, 'Dasua', 'Punjab'),
(1020, 'Dhuri', 'Punjab'),
(1021, 'Dinanagar', 'Punjab'),
(1022, 'Faridkot', 'Punjab'),
(1023, 'Fazilka', 'Punjab'),
(1024, 'Firozpur', 'Punjab'),
(1025, 'Firozpur Cantt.', 'Punjab'),
(1026, 'Giddarbaha', 'Punjab'),
(1027, 'Gobindgarh', 'Punjab'),
(1028, 'Gurdaspur', 'Punjab'),
(1029, 'Hoshiarpur', 'Punjab'),
(1030, 'Jagraon', 'Punjab'),
(1031, 'Jaitu', 'Punjab'),
(1032, 'Jalalabad', 'Punjab'),
(1033, 'Jalandhar', 'Punjab'),
(1034, 'Jalandhar Cantt.', 'Punjab'),
(1035, 'Jandiala', 'Punjab'),
(1036, 'Kapurthala', 'Punjab'),
(1037, 'Karoran', 'Punjab'),
(1038, 'Kartarpur', 'Punjab'),
(1039, 'Khanna', 'Punjab'),
(1040, 'Kharar', 'Punjab'),
(1041, 'Kot Kapura', 'Punjab'),
(1042, 'Kurali', 'Punjab'),
(1043, 'Longowal', 'Punjab'),
(1044, 'Ludhiana', 'Punjab'),
(1045, 'Malerkotla', 'Punjab'),
(1046, 'Malout', 'Punjab'),
(1047, 'Mansa', 'Punjab'),
(1048, 'Maur', 'Punjab'),
(1049, 'Moga', 'Punjab'),
(1050, 'Mohali', 'Punjab'),
(1051, 'Morinda', 'Punjab'),
(1052, 'Mukerian', 'Punjab'),
(1053, 'Muktsar', 'Punjab'),
(1054, 'Nabha', 'Punjab'),
(1055, 'Nakodar', 'Punjab'),
(1056, 'Nangal', 'Punjab'),
(1057, 'Nawanshahr', 'Punjab'),
(1058, 'Pathankot', 'Punjab'),
(1059, 'Patiala', 'Punjab'),
(1060, 'Patran', 'Punjab'),
(1061, 'Patti', 'Punjab'),
(1062, 'Phagwara', 'Punjab'),
(1063, 'Phillaur', 'Punjab'),
(1064, 'Qadian', 'Punjab'),
(1065, 'Raikot', 'Punjab'),
(1066, 'Rajpura', 'Punjab'),
(1067, 'Rampura Phul', 'Punjab'),
(1068, 'Rupnagar', 'Punjab'),
(1069, 'Samana', 'Punjab'),
(1070, 'Sangrur', 'Punjab'),
(1071, 'Sirhind Fatehgarh Sahib', 'Punjab'),
(1072, 'Sujanpur', 'Punjab'),
(1073, 'Sunam', 'Punjab'),
(1074, 'Talwara', 'Punjab'),
(1075, 'Tarn Taran', 'Punjab'),
(1076, 'Urmar Tanda', 'Punjab'),
(1077, 'Zira', 'Punjab'),
(1078, 'Zirakpur', 'Punjab'),
(1079, 'Bali', 'Rajastan'),
(1080, 'Banswara', 'Rajastan'),
(1081, 'Ajmer', 'Rajasthan'),
(1082, 'Alwar', 'Rajasthan'),
(1083, 'Bandikui', 'Rajasthan'),
(1084, 'Baran', 'Rajasthan'),
(1085, 'Barmer', 'Rajasthan'),
(1086, 'Bikaner', 'Rajasthan'),
(1087, 'Fatehpur', 'Rajasthan'),
(1088, 'Jaipur', 'Rajasthan'),
(1089, 'Jaisalmer', 'Rajasthan'),
(1090, 'Jodhpur', 'Rajasthan'),
(1091, 'Kota', 'Rajasthan'),
(1092, 'Lachhmangarh', 'Rajasthan'),
(1093, 'Ladnu', 'Rajasthan'),
(1094, 'Lakheri', 'Rajasthan'),
(1095, 'Lalsot', 'Rajasthan'),
(1096, 'Losal', 'Rajasthan'),
(1097, 'Makrana', 'Rajasthan'),
(1098, 'Malpura', 'Rajasthan'),
(1099, 'Mandalgarh', 'Rajasthan'),
(1100, 'Mandawa', 'Rajasthan'),
(1101, 'Mangrol', 'Rajasthan'),
(1102, 'Merta City', 'Rajasthan'),
(1103, 'Mount Abu', 'Rajasthan'),
(1104, 'Nadbai', 'Rajasthan'),
(1105, 'Nagar', 'Rajasthan'),
(1106, 'Nagaur', 'Rajasthan'),
(1107, 'Nargund', 'Rajasthan'),
(1108, 'Nasirabad', 'Rajasthan'),
(1109, 'Nathdwara', 'Rajasthan'),
(1110, 'Navalgund', 'Rajasthan'),
(1111, 'Nawalgarh', 'Rajasthan'),
(1112, 'Neem-Ka-Thana', 'Rajasthan'),
(1113, 'Nelamangala', 'Rajasthan'),
(1114, 'Nimbahera', 'Rajasthan'),
(1115, 'Nipani', 'Rajasthan'),
(1116, 'Niwai', 'Rajasthan'),
(1117, 'Nohar', 'Rajasthan'),
(1118, 'Nokha', 'Rajasthan'),
(1119, 'Pali', 'Rajasthan'),
(1120, 'Phalodi', 'Rajasthan'),
(1121, 'Phulera', 'Rajasthan'),
(1122, 'Pilani', 'Rajasthan'),
(1123, 'Pilibanga', 'Rajasthan'),
(1124, 'Pindwara', 'Rajasthan'),
(1125, 'Pipar City', 'Rajasthan'),
(1126, 'Prantij', 'Rajasthan'),
(1127, 'Pratapgarh', 'Rajasthan'),
(1128, 'Raisinghnagar', 'Rajasthan'),
(1129, 'Rajakhera', 'Rajasthan'),
(1130, 'Rajaldesar', 'Rajasthan'),
(1131, 'Rajgarh (Alwar)', 'Rajasthan'),
(1132, 'Rajgarh (Churu', 'Rajasthan'),
(1133, 'Rajsamand', 'Rajasthan'),
(1134, 'Ramganj Mandi', 'Rajasthan'),
(1135, 'Ramngarh', 'Rajasthan'),
(1136, 'Ratangarh', 'Rajasthan'),
(1137, 'Rawatbhata', 'Rajasthan'),
(1138, 'Rawatsar', 'Rajasthan'),
(1139, 'Reengus', 'Rajasthan'),
(1140, 'Sadri', 'Rajasthan'),
(1141, 'Sadulshahar', 'Rajasthan'),
(1142, 'Sagwara', 'Rajasthan'),
(1143, 'Sambhar', 'Rajasthan'),
(1144, 'Sanchore', 'Rajasthan'),
(1145, 'Sangaria', 'Rajasthan'),
(1146, 'Sardarshahar', 'Rajasthan'),
(1147, 'Sawai Madhopur', 'Rajasthan'),
(1148, 'Shahpura', 'Rajasthan'),
(1149, 'Shahpura', 'Rajasthan'),
(1150, 'Sheoganj', 'Rajasthan'),
(1151, 'Sikar', 'Rajasthan'),
(1152, 'Sirohi', 'Rajasthan'),
(1153, 'Sojat', 'Rajasthan'),
(1154, 'Sri Madhopur', 'Rajasthan'),
(1155, 'Sujangarh', 'Rajasthan'),
(1156, 'Sumerpur', 'Rajasthan'),
(1157, 'Suratgarh', 'Rajasthan'),
(1158, 'Taranagar', 'Rajasthan'),
(1159, 'Todabhim', 'Rajasthan'),
(1160, 'Todaraisingh', 'Rajasthan'),
(1161, 'Tonk', 'Rajasthan'),
(1162, 'Udaipur', 'Rajasthan'),
(1163, 'Udaipurwati', 'Rajasthan'),
(1164, 'Vijainagar', 'Rajasthan'),
(1165, 'Gangtok', 'Sikkim'),
(1166, 'Calcutta', 'West Bengal'),
(1167, 'Arakkonam', 'Tamil Nadu'),
(1168, 'Arcot', 'Tamil Nadu'),
(1169, 'Aruppukkottai', 'Tamil Nadu'),
(1170, 'Bhavani', 'Tamil Nadu'),
(1171, 'Chengalpattu', 'Tamil Nadu'),
(1172, 'Chennai', 'Tamil Nadu'),
(1173, 'Chinna salem', 'Tamil nadu'),
(1174, 'Coimbatore', 'Tamil Nadu'),
(1175, 'Coonoor', 'Tamil Nadu'),
(1176, 'Cuddalore', 'Tamil Nadu'),
(1177, 'Dharmapuri', 'Tamil Nadu'),
(1178, 'Dindigul', 'Tamil Nadu'),
(1179, 'Erode', 'Tamil Nadu'),
(1180, 'Gudalur', 'Tamil Nadu'),
(1181, 'Gudalur', 'Tamil Nadu'),
(1182, 'Gudalur', 'Tamil Nadu'),
(1183, 'Kanchipuram', 'Tamil Nadu'),
(1184, 'Karaikudi', 'Tamil Nadu'),
(1185, 'Karungal', 'Tamil Nadu'),
(1186, 'Karur', 'Tamil Nadu'),
(1187, 'Kollankodu', 'Tamil Nadu'),
(1188, 'Lalgudi', 'Tamil Nadu'),
(1189, 'Madurai', 'Tamil Nadu'),
(1190, 'Nagapattinam', 'Tamil Nadu'),
(1191, 'Nagercoil', 'Tamil Nadu'),
(1192, 'Namagiripettai', 'Tamil Nadu'),
(1193, 'Namakkal', 'Tamil Nadu'),
(1194, 'Nandivaram-Guduvancheri', 'Tamil Nadu'),
(1195, 'Nanjikottai', 'Tamil Nadu'),
(1196, 'Natham', 'Tamil Nadu'),
(1197, 'Nellikuppam', 'Tamil Nadu'),
(1198, 'Neyveli', 'Tamil Nadu'),
(1199, 'O\' Valley', 'Tamil Nadu'),
(1200, 'Oddanchatram', 'Tamil Nadu'),
(1201, 'P.N.Patti', 'Tamil Nadu'),
(1202, 'Pacode', 'Tamil Nadu'),
(1203, 'Padmanabhapuram', 'Tamil Nadu'),
(1204, 'Palani', 'Tamil Nadu'),
(1205, 'Palladam', 'Tamil Nadu'),
(1206, 'Pallapatti', 'Tamil Nadu'),
(1207, 'Pallikonda', 'Tamil Nadu'),
(1208, 'Panagudi', 'Tamil Nadu'),
(1209, 'Panruti', 'Tamil Nadu'),
(1210, 'Paramakudi', 'Tamil Nadu'),
(1211, 'Parangipettai', 'Tamil Nadu'),
(1212, 'Pattukkottai', 'Tamil Nadu'),
(1213, 'Perambalur', 'Tamil Nadu'),
(1214, 'Peravurani', 'Tamil Nadu'),
(1215, 'Periyakulam', 'Tamil Nadu'),
(1216, 'Periyasemur', 'Tamil Nadu'),
(1217, 'Pernampattu', 'Tamil Nadu'),
(1218, 'Pollachi', 'Tamil Nadu'),
(1219, 'Polur', 'Tamil Nadu'),
(1220, 'Ponneri', 'Tamil Nadu'),
(1221, 'Pudukkottai', 'Tamil Nadu'),
(1222, 'Pudupattinam', 'Tamil Nadu'),
(1223, 'Puliyankudi', 'Tamil Nadu'),
(1224, 'Punjaipugalur', 'Tamil Nadu'),
(1225, 'Rajapalayam', 'Tamil Nadu'),
(1226, 'Ramanathapuram', 'Tamil Nadu'),
(1227, 'Rameshwaram', 'Tamil Nadu'),
(1228, 'Rasipuram', 'Tamil Nadu'),
(1229, 'Salem', 'Tamil Nadu'),
(1230, 'Sankarankoil', 'Tamil Nadu'),
(1231, 'Sankari', 'Tamil Nadu'),
(1232, 'Sathyamangalam', 'Tamil Nadu'),
(1233, 'Sattur', 'Tamil Nadu'),
(1234, 'Shenkottai', 'Tamil Nadu'),
(1235, 'Sholavandan', 'Tamil Nadu'),
(1236, 'Sholingur', 'Tamil Nadu'),
(1237, 'Sirkali', 'Tamil Nadu'),
(1238, 'Sivaganga', 'Tamil Nadu'),
(1239, 'Sivagiri', 'Tamil Nadu'),
(1240, 'Sivakasi', 'Tamil Nadu'),
(1241, 'Srivilliputhur', 'Tamil Nadu'),
(1242, 'Surandai', 'Tamil Nadu'),
(1243, 'Suriyampalayam', 'Tamil Nadu'),
(1244, 'Tenkasi', 'Tamil Nadu'),
(1245, 'Thammampatti', 'Tamil Nadu'),
(1246, 'Thanjavur', 'Tamil Nadu'),
(1247, 'Tharamangalam', 'Tamil Nadu'),
(1248, 'Tharangambadi', 'Tamil Nadu'),
(1249, 'Theni Allinagaram', 'Tamil Nadu'),
(1250, 'Thirumangalam', 'Tamil Nadu'),
(1251, 'Thirunindravur', 'Tamil Nadu'),
(1252, 'Thiruparappu', 'Tamil Nadu'),
(1253, 'Thirupuvanam', 'Tamil Nadu'),
(1254, 'Thiruthuraipoondi', 'Tamil Nadu'),
(1255, 'Thiruvallur', 'Tamil Nadu'),
(1256, 'Thiruvarur', 'Tamil Nadu'),
(1257, 'Thoothukudi', 'Tamil Nadu'),
(1258, 'Thuraiyur', 'Tamil Nadu'),
(1259, 'Tindivanam', 'Tamil Nadu'),
(1260, 'Tiruchendur', 'Tamil Nadu'),
(1261, 'Tiruchengode', 'Tamil Nadu'),
(1262, 'Tiruchirappalli', 'Tamil Nadu'),
(1263, 'Tirukalukundram', 'Tamil Nadu'),
(1264, 'Tirukkoyilur', 'Tamil Nadu'),
(1265, 'Tirunelveli', 'Tamil Nadu'),
(1266, 'Tirupathur', 'Tamil Nadu'),
(1267, 'Tirupathur', 'Tamil Nadu'),
(1268, 'Tiruppur', 'Tamil Nadu'),
(1269, 'Tiruttani', 'Tamil Nadu'),
(1270, 'Tiruvannamalai', 'Tamil Nadu'),
(1271, 'Tiruvethipuram', 'Tamil Nadu'),
(1272, 'Tittakudi', 'Tamil Nadu'),
(1273, 'Udhagamandalam', 'Tamil Nadu'),
(1274, 'Udumalaipettai', 'Tamil Nadu'),
(1275, 'Unnamalaikadai', 'Tamil Nadu'),
(1276, 'Usilampatti', 'Tamil Nadu'),
(1277, 'Uthamapalayam', 'Tamil Nadu'),
(1278, 'Uthiramerur', 'Tamil Nadu'),
(1279, 'Vadakkuvalliyur', 'Tamil Nadu'),
(1280, 'Vadalur', 'Tamil Nadu'),
(1281, 'Vadipatti', 'Tamil Nadu'),
(1282, 'Valparai', 'Tamil Nadu'),
(1283, 'Vandavasi', 'Tamil Nadu'),
(1284, 'Vaniyambadi', 'Tamil Nadu'),
(1285, 'Vedaranyam', 'Tamil Nadu'),
(1286, 'Vellakoil', 'Tamil Nadu'),
(1287, 'Vellore', 'Tamil Nadu'),
(1288, 'Vikramasingapuram', 'Tamil Nadu'),
(1289, 'Viluppuram', 'Tamil Nadu'),
(1290, 'Virudhachalam', 'Tamil Nadu'),
(1291, 'Virudhunagar', 'Tamil Nadu'),
(1292, 'Viswanatham', 'Tamil Nadu'),
(1293, 'Agartala', 'Tripura'),
(1294, 'Badharghat', 'Tripura'),
(1295, 'Dharmanagar', 'Tripura'),
(1296, 'Indranagar', 'Tripura'),
(1297, 'Jogendranagar', 'Tripura'),
(1298, 'Kailasahar', 'Tripura'),
(1299, 'Khowai', 'Tripura'),
(1300, 'Pratapgarh', 'Tripura'),
(1301, 'Udaipur', 'Tripura'),
(1302, 'Achhnera', 'Uttar Pradesh'),
(1303, 'Adari', 'Uttar Pradesh'),
(1304, 'Agra', 'Uttar Pradesh'),
(1305, 'Aligarh', 'Uttar Pradesh'),
(1306, 'Allahabad', 'Uttar Pradesh'),
(1307, 'Amroha', 'Uttar Pradesh'),
(1308, 'Azamgarh', 'Uttar Pradesh'),
(1309, 'Bahraich', 'Uttar Pradesh'),
(1310, 'Ballia', 'Uttar Pradesh'),
(1311, 'Balrampur', 'Uttar Pradesh'),
(1312, 'Banda', 'Uttar Pradesh'),
(1313, 'Bareilly', 'Uttar Pradesh'),
(1314, 'Chandausi', 'Uttar Pradesh'),
(1315, 'Dadri', 'Uttar Pradesh'),
(1316, 'Deoria', 'Uttar Pradesh'),
(1317, 'Etawah', 'Uttar Pradesh'),
(1318, 'Fatehabad', 'Uttar Pradesh'),
(1319, 'Fatehpur', 'Uttar Pradesh'),
(1320, 'Fatehpur', 'Uttar Pradesh'),
(1321, 'Greater Noida', 'Uttar Pradesh'),
(1322, 'Hamirpur', 'Uttar Pradesh'),
(1323, 'Hardoi', 'Uttar Pradesh'),
(1324, 'Jajmau', 'Uttar Pradesh'),
(1325, 'Jaunpur', 'Uttar Pradesh'),
(1326, 'Jhansi', 'Uttar Pradesh'),
(1327, 'Kalpi', 'Uttar Pradesh'),
(1328, 'Kanpur', 'Uttar Pradesh'),
(1329, 'Kota', 'Uttar Pradesh'),
(1330, 'Laharpur', 'Uttar Pradesh'),
(1331, 'Lakhimpur', 'Uttar Pradesh'),
(1332, 'Lal Gopalganj Nindaura', 'Uttar Pradesh'),
(1333, 'Lalganj', 'Uttar Pradesh'),
(1334, 'Lalitpur', 'Uttar Pradesh'),
(1335, 'Lar', 'Uttar Pradesh'),
(1336, 'Loni', 'Uttar Pradesh'),
(1337, 'Lucknow', 'Uttar Pradesh'),
(1338, 'Mathura', 'Uttar Pradesh'),
(1339, 'Meerut', 'Uttar Pradesh'),
(1340, 'Modinagar', 'Uttar Pradesh'),
(1341, 'Muradnagar', 'Uttar Pradesh'),
(1342, 'Nagina', 'Uttar Pradesh'),
(1343, 'Najibabad', 'Uttar Pradesh'),
(1344, 'Nakur', 'Uttar Pradesh'),
(1345, 'Nanpara', 'Uttar Pradesh'),
(1346, 'Naraura', 'Uttar Pradesh'),
(1347, 'Naugawan Sadat', 'Uttar Pradesh'),
(1348, 'Nautanwa', 'Uttar Pradesh'),
(1349, 'Nawabganj', 'Uttar Pradesh'),
(1350, 'Nehtaur', 'Uttar Pradesh'),
(1351, 'NOIDA', 'Uttar Pradesh'),
(1352, 'Noorpur', 'Uttar Pradesh'),
(1353, 'Obra', 'Uttar Pradesh'),
(1354, 'Orai', 'Uttar Pradesh'),
(1355, 'Padrauna', 'Uttar Pradesh'),
(1356, 'Palia Kalan', 'Uttar Pradesh'),
(1357, 'Parasi', 'Uttar Pradesh'),
(1358, 'Phulpur', 'Uttar Pradesh'),
(1359, 'Pihani', 'Uttar Pradesh'),
(1360, 'Pilibhit', 'Uttar Pradesh'),
(1361, 'Pilkhuwa', 'Uttar Pradesh'),
(1362, 'Powayan', 'Uttar Pradesh'),
(1363, 'Pukhrayan', 'Uttar Pradesh'),
(1364, 'Puranpur', 'Uttar Pradesh'),
(1365, 'Purquazi', 'Uttar Pradesh'),
(1366, 'Purwa', 'Uttar Pradesh'),
(1367, 'Rae Bareli', 'Uttar Pradesh'),
(1368, 'Rampur', 'Uttar Pradesh'),
(1369, 'Rampur Maniharan', 'Uttar Pradesh'),
(1370, 'Rasra', 'Uttar Pradesh'),
(1371, 'Rath', 'Uttar Pradesh'),
(1372, 'Renukoot', 'Uttar Pradesh'),
(1373, 'Reoti', 'Uttar Pradesh'),
(1374, 'Robertsganj', 'Uttar Pradesh'),
(1375, 'Rudauli', 'Uttar Pradesh'),
(1376, 'Rudrapur', 'Uttar Pradesh'),
(1377, 'Sadabad', 'Uttar Pradesh'),
(1378, 'Safipur', 'Uttar Pradesh'),
(1379, 'Saharanpur', 'Uttar Pradesh'),
(1380, 'Sahaspur', 'Uttar Pradesh'),
(1381, 'Sahaswan', 'Uttar Pradesh'),
(1382, 'Sahawar', 'Uttar Pradesh'),
(1383, 'Sahjanwa', 'Uttar Pradesh'),
(1384, '\"Saidpur', ' Ghazipur\"'),
(1385, 'Sambhal', 'Uttar Pradesh'),
(1386, 'Samdhan', 'Uttar Pradesh'),
(1387, 'Samthar', 'Uttar Pradesh'),
(1388, 'Sandi', 'Uttar Pradesh'),
(1389, 'Sandila', 'Uttar Pradesh'),
(1390, 'Sardhana', 'Uttar Pradesh'),
(1391, 'Seohara', 'Uttar Pradesh'),
(1392, '\"Shahabad', ' Hardoi\"'),
(1393, '\"Shahabad', ' Rampur\"'),
(1394, 'Shahganj', 'Uttar Pradesh'),
(1395, 'Shahjahanpur', 'Uttar Pradesh'),
(1396, 'Shamli', 'Uttar Pradesh'),
(1397, '\"Shamsabad', ' Agra\"'),
(1398, '\"Shamsabad', ' Farrukhabad\"'),
(1399, 'Sherkot', 'Uttar Pradesh'),
(1400, '\"Shikarpur', ' Bulandshahr\"'),
(1401, 'Shikohabad', 'Uttar Pradesh'),
(1402, 'Shishgarh', 'Uttar Pradesh'),
(1403, 'Siana', 'Uttar Pradesh'),
(1404, 'Sikanderpur', 'Uttar Pradesh'),
(1405, 'Sikandra Rao', 'Uttar Pradesh'),
(1406, 'Sikandrabad', 'Uttar Pradesh'),
(1407, 'Sirsaganj', 'Uttar Pradesh'),
(1408, 'Sirsi', 'Uttar Pradesh'),
(1409, 'Sitapur', 'Uttar Pradesh'),
(1410, 'Soron', 'Uttar Pradesh'),
(1411, 'Suar', 'Uttar Pradesh'),
(1412, 'Sultanpur', 'Uttar Pradesh'),
(1413, 'Sumerpur', 'Uttar Pradesh'),
(1414, 'Tanda', 'Uttar Pradesh'),
(1415, 'Tanda', 'Uttar Pradesh'),
(1416, 'Tetri Bazar', 'Uttar Pradesh'),
(1417, 'Thakurdwara', 'Uttar Pradesh'),
(1418, 'Thana Bhawan', 'Uttar Pradesh'),
(1419, 'Tilhar', 'Uttar Pradesh'),
(1420, 'Tirwaganj', 'Uttar Pradesh'),
(1421, 'Tulsipur', 'Uttar Pradesh'),
(1422, 'Tundla', 'Uttar Pradesh'),
(1423, 'Unnao', 'Uttar Pradesh'),
(1424, 'Utraula', 'Uttar Pradesh'),
(1425, 'Varanasi', 'Uttar Pradesh'),
(1426, 'Vrindavan', 'Uttar Pradesh'),
(1427, 'Warhapur', 'Uttar Pradesh'),
(1428, 'Zaidpur', 'Uttar Pradesh'),
(1429, 'Zamania', 'Uttar Pradesh'),
(1430, 'Almora', 'Uttarakhand'),
(1431, 'Bazpur', 'Uttarakhand'),
(1432, 'Chamba', 'Uttarakhand'),
(1433, 'Dehradun', 'Uttarakhand'),
(1434, 'Haldwani', 'Uttarakhand'),
(1435, 'Haridwar', 'Uttarakhand'),
(1436, 'Jaspur', 'Uttarakhand'),
(1437, 'Kashipur', 'Uttarakhand'),
(1438, 'kichha', 'Uttarakhand'),
(1439, 'Kotdwara', 'Uttarakhand'),
(1440, 'Manglaur', 'Uttarakhand'),
(1441, 'Mussoorie', 'Uttarakhand'),
(1442, 'Nagla', 'Uttarakhand'),
(1443, 'Nainital', 'Uttarakhand'),
(1444, 'Pauri', 'Uttarakhand'),
(1445, 'Pithoragarh', 'Uttarakhand'),
(1446, 'Ramnagar', 'Uttarakhand'),
(1447, 'Rishikesh', 'Uttarakhand'),
(1448, 'Roorkee', 'Uttarakhand'),
(1449, 'Rudrapur', 'Uttarakhand'),
(1450, 'Sitarganj', 'Uttarakhand'),
(1451, 'Tehri', 'Uttarakhand'),
(1452, 'Muzaffarnagar', 'Uttarpradesh'),
(1453, '\"Adra', ' Purulia\"'),
(1454, 'Alipurduar', 'West Bengal'),
(1455, 'Arambagh', 'West Bengal'),
(1456, 'Asansol', 'West Bengal'),
(1457, 'Baharampur', 'West Bengal'),
(1458, 'Bally', 'West Bengal'),
(1459, 'Balurghat', 'West Bengal'),
(1460, 'Bankura', 'West Bengal'),
(1461, 'Barakar', 'West Bengal'),
(1462, 'Barasat', 'West Bengal'),
(1463, 'Bardhaman', 'West Bengal'),
(1464, 'Bidhan Nagar', 'West Bengal'),
(1465, 'Chinsura', 'West Bengal'),
(1466, 'Contai', 'West Bengal'),
(1467, 'Cooch Behar', 'West Bengal'),
(1468, 'Darjeeling', 'West Bengal'),
(1469, 'Durgapur', 'West Bengal'),
(1470, 'Haldia', 'West Bengal'),
(1471, 'Howrah', 'West Bengal'),
(1472, 'Islampur', 'West Bengal'),
(1473, 'Jhargram', 'West Bengal'),
(1474, 'Kharagpur', 'West Bengal'),
(1475, 'Kolkata', 'West Bengal'),
(1476, 'Mainaguri', 'West Bengal'),
(1477, 'Mal', 'West Bengal'),
(1478, 'Mathabhanga', 'West Bengal'),
(1479, 'Medinipur', 'West Bengal'),
(1480, 'Memari', 'West Bengal'),
(1481, 'Monoharpur', 'West Bengal'),
(1482, 'Murshidabad', 'West Bengal'),
(1483, 'Nabadwip', 'West Bengal'),
(1484, 'Naihati', 'West Bengal'),
(1485, 'Panchla', 'West Bengal'),
(1486, 'Pandua', 'West Bengal'),
(1487, 'Paschim Punropara', 'West Bengal'),
(1488, 'Purulia', 'West Bengal'),
(1489, 'Raghunathpur', 'West Bengal'),
(1490, 'Raiganj', 'West Bengal'),
(1491, 'Rampurhat', 'West Bengal'),
(1492, 'Ranaghat', 'West Bengal'),
(1493, 'Sainthia', 'West Bengal'),
(1494, 'Santipur', 'West Bengal'),
(1495, 'Siliguri', 'West Bengal'),
(1496, 'Sonamukhi', 'West Bengal'),
(1497, 'Srirampore', 'West Bengal'),
(1498, 'Suri', 'West Bengal'),
(1499, 'Taki', 'West Bengal'),
(1500, 'Tamluk', 'West Bengal'),
(1501, 'Tarakeswar', 'West Bengal'),
(1502, 'Chikmagalur', 'Karnataka'),
(1503, 'Davanagere', 'Karnataka'),
(1504, 'Dharwad', 'Karnataka'),
(1505, 'Gadag', 'Karnataka'),
(1506, 'Chennai', 'Tamil Nadu'),
(1507, 'Coimbatore', 'Tamil Nadu'),
(1508, 'Barrackpur', 'unknown'),
(1509, 'Barwani', 'unknown'),
(1510, 'Basna', 'unknown'),
(1511, 'Bawal', 'unknown'),
(1512, 'Beawar', 'unknown'),
(1513, 'Berhampur', 'unknown'),
(1514, 'Bhajanpura', 'unknown'),
(1515, 'Bhandara', 'unknown'),
(1516, 'Bharatpur', 'unknown'),
(1517, 'Bharthana', 'unknown'),
(1518, 'Bhilai', 'unknown'),
(1519, 'Bhilwara', 'unknown'),
(1520, 'Bhinmal', 'unknown'),
(1521, 'Bhiwandi', 'unknown'),
(1522, 'Bhusawal', 'unknown'),
(1523, 'Bidar', 'unknown'),
(1524, 'Bijnaur', 'unknown'),
(1525, 'Bilara', 'unknown'),
(1527, 'Budaun', 'unknown'),
(1528, 'Bulandshahr', 'unknown'),
(1529, 'Burla', 'unknown'),
(1532, 'Chakeri', 'unknown'),
(1533, 'Champawat', 'unknown'),
(1534, 'Chandil', 'unknown'),
(1535, 'Chandrapur', 'unknown'),
(1536, 'Chapirevula', 'unknown'),
(1537, 'Charkhari', 'unknown'),
(1538, 'Charkhi Dadri', 'unknown'),
(1539, 'Chhindwara', 'unknown'),
(1540, 'Chiplun', 'unknown'),
(1541, 'Chitrakoot', 'unknown'),
(1542, 'Churu', 'unknown'),
(1543, 'Dalkhola', 'unknown'),
(1544, 'Damoh', 'unknown'),
(1545, 'Daund', 'unknown'),
(1546, 'Dehgam', 'unknown'),
(1547, 'Devgarh', 'unknown'),
(1548, 'Dhulian', 'unknown'),
(1549, 'Dumdum', 'unknown'),
(1550, 'Dwarka1', 'unknown'),
(1551, 'Etah', 'unknown'),
(1552, 'Faizabad', 'unknown'),
(1553, 'Falna', 'unknown'),
(1554, 'Farrukhabad', 'unknown'),
(1555, 'Fatehgarh', 'unknown'),
(1556, 'Fatehpur Chaurasi', 'unknown'),
(1557, 'Fatehpur Sikri', 'unknown'),
(1558, 'Firozabad', 'unknown'),
(1559, 'Gadchiroli', 'unknown'),
(1560, 'Gandhidham', 'unknown'),
(1561, 'Ganjam', 'unknown'),
(1562, 'Ghatampur', 'unknown'),
(1563, 'Ghatanji', 'unknown'),
(1564, 'Ghaziabad', 'unknown'),
(1565, 'Ghazipur', 'unknown'),
(1566, 'Goa Velha', 'unknown'),
(1567, 'Gokak', 'unknown'),
(1568, 'Gondiya', 'unknown'),
(1569, 'Gorakhpur', 'unknown'),
(1571, 'Guna', 'unknown'),
(1572, 'Hanumangarh', 'unknown'),
(1573, 'Harda', 'unknown'),
(1574, 'Harsawa', 'unknown'),
(1575, 'Hastinapur', 'unknown'),
(1576, 'Hathras', 'unknown'),
(1579, 'Jagadhri', 'unknown'),
(1580, 'Jais', 'unknown'),
(1581, 'Jaitaran', 'unknown'),
(1582, 'Jalgaon', 'unknown'),
(1583, 'Jalore', 'unknown'),
(1584, 'Jhabua', 'unknown'),
(1585, 'Jhalawar', 'unknown'),
(1586, 'Jhunjhunu', 'unknown'),
(1588, 'Junnar', 'unknown'),
(1589, 'Kailaras', 'unknown'),
(1590, 'Kalburgi', 'unknown'),
(1591, 'Kalimpong', 'unknown'),
(1592, 'Kamthi', 'unknown'),
(1593, 'Kanpur', 'unknown'),
(1594, 'Karad', 'unknown'),
(1595, 'Keylong', 'unknown'),
(1596, 'Kheri', 'unknown'),
(1598, 'Khurai', 'unknown'),
(1600, 'Kodad', 'unknown'),
(1601, 'Konnagar', 'unknown'),
(1602, 'Krishnanagar', 'unknown'),
(1603, 'Kuchinda', 'unknown'),
(1605, 'Madhyamgram', 'unknown'),
(1606, 'Mahabaleswar', 'unknown'),
(1608, 'Mahoba', 'unknown'),
(1609, 'Mahwa', 'unknown'),
(1614, 'Manesar', 'unknown'),
(1615, 'Mangalagiri', 'unknown'),
(1616, 'Mira-Bhayandar', 'unknown'),
(1617, 'Mirzapur', 'unknown'),
(1618, 'Mithapur', 'unknown'),
(1619, 'Mohania', 'unknown'),
(1620, 'Mokama', 'unknown'),
(1621, 'Moradabad', 'unknown'),
(1622, 'Mukatsar', 'unknown'),
(1623, 'Nagalapuram', 'unknown');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(12) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `message` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `phone`, `message`, `date`) VALUES
(29, 'muskan jain', 'muskaanrashujain@gmail.com', '54654654654', 'heloo', '01-05-23'),
(30, 'Sharon Chan', 'sharonchan.websolution@outlook.com', '9058899464', 'How are you?\r\n\r\nCan we talk about your Website?', '02-05-23');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `main_course` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `days` int(11) NOT NULL DEFAULT '365',
  `video` enum('0','1') NOT NULL,
  `pdf` enum('0','1') NOT NULL,
  `test` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `main_course`, `name`, `price`, `image`, `description`, `days`, `video`, `pdf`, `test`) VALUES
(20, 1, '3', '200', 'images/250423065107-Phone_Mockup_Template-removebg.png', '', 365, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `course_package`
--

CREATE TABLE `course_package` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_package`
--

INSERT INTO `course_package` (`id`, `name`, `description`) VALUES
(1, 'Package 1', 'Videos + PDF'),
(2, 'Package 2', 'Only Test Series '),
(3, 'Package 3', 'Videos + PDF + Test Series'),
(4, 'Package 4', 'Only PDF');

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `id` int(10) NOT NULL,
  `question` varchar(100) NOT NULL,
  `answer` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `exam_section`
--

CREATE TABLE `exam_section` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `free_pdf`
--

CREATE TABLE `free_pdf` (
  `id` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `file_type` varchar(10) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `year` varchar(10) NOT NULL,
  `month` varchar(10) NOT NULL,
  `day` int(10) NOT NULL,
  `title` varchar(100) NOT NULL,
  `file_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `free_video`
--

CREATE TABLE `free_video` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `url` varchar(100) NOT NULL,
  `pdf` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(10) NOT NULL,
  `username` varchar(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `name`, `password`) VALUES
(1, 'ccube_admin', 'admin', 'Ccube@2023_');

-- --------------------------------------------------------

--
-- Table structure for table `main_courses`
--

CREATE TABLE `main_courses` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `date` varchar(200) NOT NULL,
  `class_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `main_courses`
--

INSERT INTO `main_courses` (`id`, `name`, `image`, `description`, `date`, `class_id`) VALUES
(1, '5th class', 'images/010523035419-5th.jpg', '', '25 Apr,2023', 0),
(2, '6th class', 'images/010523035535-6th.jpg', '', '25 Apr,2023', 0),
(6, '7th class', 'images/010523035525-7th.jpg', '', '26 Apr,2023', 0),
(7, '8th class', 'images/010523035511-8th.jpg', '', '26 Apr,2023', 0),
(8, '9th class', 'images/010523035500-9th.jpg', '', '26 Apr,2023', 0),
(9, '10th class', 'images/010523035449-10th.jpg', '', '26 Apr,2023', 0),
(10, '11th class', 'images/010523035440-11th.jpg', '', '26 Apr,2023', 0),
(11, '12th class', 'images/010523035431-12th.jpg', '', '26 Apr,2023', 0);

-- --------------------------------------------------------

--
-- Table structure for table `our_teachers`
--

CREATE TABLE `our_teachers` (
  `tid` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `qualification` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `our_teachers`
--

INSERT INTO `our_teachers` (`tid`, `created`, `name`, `designation`, `image`, `qualification`) VALUES
(3, '2023-05-02 08:15:25', 'AMIT RAJ SONA', 'DIRECTOR', 'images/030523124621-WhatsApp Image 2023-04-13 at 13.16.47.jpg', ''),
(4, '2023-05-02 08:09:40', 'SHIKHA DEEPTI SONA', 'ASST. DIRECTOR/ TUTOR', 'images/030523124642-WhatsApp Image 2023-04-13 at 13.17.28.jpg', 'B.Sc (Mathematics), M.Sc (Physics), B.Ed, M.A (Edu)'),
(6, '2023-05-04 17:47:30', 'Sandali Singh', 'TUTOR', 'images/040523054730-sandali.jfif', 'B.Sc.(Chemistry honors), M.Sc.(Analytical Chemistry), B.Ed, IIT JAM Qualified');

-- --------------------------------------------------------

--
-- Table structure for table `pdf_category`
--

CREATE TABLE `pdf_category` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `class_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pdf_category`
--

INSERT INTO `pdf_category` (`id`, `name`, `class_id`) VALUES
(11, 'ALL SUBJECTS', 1),
(12, 'ALL SUBJECTS', 2),
(13, 'ALL SUBJECTS', 6),
(14, 'ALL SUBJECTS', 7),
(15, 'Maths', 8),
(17, 'Physics', 8),
(18, 'Chemistry', 8),
(19, 'Biology', 8),
(20, 'Maths            ', 9),
(21, 'Physics', 9),
(22, 'Chemistry', 9),
(23, 'Biology', 9),
(24, 'Maths', 10),
(25, 'Physics', 10),
(26, 'Chemistry', 10),
(27, 'Biology', 10),
(28, 'Maths', 11),
(29, 'Physics', 11),
(30, 'Chemistry', 11),
(31, 'Biology', 11);

-- --------------------------------------------------------

--
-- Table structure for table `query`
--

CREATE TABLE `query` (
  `id` int(10) NOT NULL,
  `date` varchar(255) NOT NULL,
  `query_for` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `qualification` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ranker`
--

CREATE TABLE `ranker` (
  `id` int(11) NOT NULL,
  `name` varchar(200) CHARACTER SET latin1 NOT NULL,
  `image` varchar(200) CHARACTER SET latin1 NOT NULL,
  `date` varchar(200) CHARACTER SET latin1 NOT NULL,
  `class_id` int(11) NOT NULL,
  `result` varchar(220) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ranker`
--

INSERT INTO `ranker` (`id`, `name`, `image`, `date`, `class_id`, `result`) VALUES
(6, 'Khushi Vishwakarma', 'images/ranker/010523021617-Khushi Vishwakarma.jpeg', '01 May,2023', 9, '96.2'),
(7, 'Samiksha Tirkey', 'images/ranker/010523021745-WhatsApp Image 2023-05-01 at 11.34.10 AM.jpeg', '01 May,2023', 9, '93.7'),
(8, 'Sanchika Singh', 'images/ranker/010523022704-WhatsApp Imag.jpeg', '01 May,2023', 9, '92.5'),
(9, 'Ravisha Rane', 'images/ranker/010523022730-WhatsApp Image 2023-05-01 at 11.33.21 AM.jpeg', '01 May,2023', 9, '80.6'),
(10, 'Animesh Mayank', 'images/ranker/200523052256-WhatsApp Image 2023-05-20 at 12.13.12 PM.jpeg', '20 May,2023', 10, '98'),
(11, 'Prakhar Singh', 'images/ranker/200523052855-WhatsApp Image 2023-05-20 at 12.13.13 PM.jpeg', '20 May,2023', 10, '87'),
(12, 'Shreya Srivastava ', 'images/ranker/200523053430-WhatsApp Image 2023-05-20 at 12.13.15 PM (1).jpeg', '20 May,2023', 10, '95'),
(13, 'Yash verma ', 'images/ranker/200523053522-WhatsApp Image 2023-05-20 at 2.44.01 PM.jpeg', '20 May,2023', 10, '87'),
(14, 'Arzoo Vijay Badge ', 'images/ranker/200523053618-WhatsApp Image 2023-05-20 at 12.13.15 PM.jpeg', '20 May,2023', 10, '85'),
(15, 'Anusha  Sahu ', 'images/ranker/200523053733-WhatsApp Image 2023-05-20 at 12.13.14 PM.jpeg', '20 May,2023', 10, '80'),
(16, 'Vaibhav Singh ', 'images/ranker/200523053757-Vaibhav Singh.JPG', '20 May,2023', 10, '76'),
(17, 'Harsh raj ', 'images/ranker/200523053820-WhatsApp Image 2023-05-20 at 2.43.44 PM.jpeg', '20 May,2023', 10, '73.8'),
(19, 'Mahak Sahu ', 'images/ranker/200523053924-WhatsApp Image 2023-05-20 at 2.48.42 PM.jpeg', '20 May,2023', 10, '73');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(10) NOT NULL,
  `date` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `social`
--

CREATE TABLE `social` (
  `id` int(11) NOT NULL,
  `fb` varchar(100) NOT NULL,
  `twitter` varchar(100) NOT NULL,
  `watsapp` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `state_list`
--

CREATE TABLE `state_list` (
  `id` int(10) UNSIGNED NOT NULL,
  `state` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `state_list`
--

INSERT INTO `state_list` (`id`, `state`) VALUES
(1, 'Andaman and Nicobar Islands'),
(2, 'Andhra Pradesh'),
(3, 'ARUNACHAL PRADESH'),
(4, 'ASSAM'),
(5, 'BIHAR'),
(6, 'CHATTISGARH'),
(7, 'CHANDIGARH'),
(8, 'DAMAN AND DIU'),
(9, 'DELHI'),
(10, 'DADRA AND NAGAR HAVELI'),
(11, 'GOA'),
(12, 'GUJARAT'),
(13, 'HIMACHAL PRADESH'),
(14, 'HARYANA'),
(15, 'JAMMU AND KASHMIR'),
(16, 'Jharkhand'),
(17, 'KERALA'),
(18, 'KARNATAKA'),
(19, 'LAKSHADWEEP'),
(20, 'MEGHALAYA'),
(21, 'Maharashtra'),
(22, 'MANIPUR'),
(23, 'MADHYA PRADESH'),
(24, 'MIZORAM'),
(25, 'NAGALAND'),
(26, 'ORISSA'),
(27, 'PUNJAB'),
(28, 'PONDICHERRY'),
(29, 'RAJASTHAN'),
(30, 'SIKKIM'),
(31, 'TAMIL NADU'),
(32, 'TRIPURA'),
(33, 'UTTARAKHAND'),
(34, 'UTTAR PRADESH'),
(35, 'WEST BENGAL'),
(36, 'TELANGANA');

-- --------------------------------------------------------

--
-- Table structure for table `subscription`
--

CREATE TABLE `subscription` (
  `id` int(10) NOT NULL,
  `s_id` varchar(10) NOT NULL,
  `date` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subsciption_type` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `duration` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gallery_image`
--

CREATE TABLE `tbl_gallery_image` (
  `pi_id` int(11) NOT NULL,
  `pi_name` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_gallery_image`
--

INSERT INTO `tbl_gallery_image` (`pi_id`, `pi_name`) VALUES
(141, '154237250722815276_1927047067544931_8618671723213035015_n.webp'),
(143, '193401991522851971_1927045887545049_8744495704626475898_n.webp'),
(145, '134160788722852922_1927044724211832_1015111816815751872_n.webp'),
(146, '5248099422853196_1927046094211695_2366743462303533170_n.webp'),
(149, '81908493922886082_1927047170878254_3595866059460055376_n.webp'),
(150, '3610220022894485_1927044604211844_5569413379313798079_n.webp'),
(151, '184000515423031710_1927046954211609_2101019934901165890_n.webp'),
(153, '40477590541238390_2133100573606245_2298435689571680256_n.webp'),
(154, '28607276241257807_2133100440272925_5057576221584392192_n.webp'),
(155, '179063246041267235_2133109276938708_1938042690251784192_n.webp'),
(156, '196633236141298643_2133099810272988_413198715986116608_n.webp'),
(157, '3456133641329216_2133099650273004_727473503237832704_n.webp'),
(158, '78571965641416241_2133099393606363_9008914973916659712_n.webp'),
(159, '17982613341438894_2133109210272048_935532018387648512_n.webp'),
(160, '133264076244887416_2161822664067369_5685746370086961152_n.webp'),
(161, '84280558544890247_2161662177416751_224128199712309248_n.webp'),
(162, '1307934844895610_2161822337400735_783981357159153664_n.webp'),
(163, '151095304244953702_2161821944067441_8555195560775122944_n.webp'),
(168, '05072023121730350784225_1676590709509105_8545874795781524753_n.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `testseries_subject`
--

CREATE TABLE `testseries_subject` (
  `id` int(11) NOT NULL,
  `testid` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `test_questions`
--

CREATE TABLE `test_questions` (
  `id` int(11) NOT NULL,
  `test_series_id` int(255) NOT NULL,
  `question` text,
  `answer` varchar(150) NOT NULL DEFAULT 'This option is not available in english',
  `option_a` varchar(150) NOT NULL DEFAULT 'This option is not available in english',
  `option_b` varchar(150) NOT NULL DEFAULT 'This option is not available in english',
  `option_c` varchar(150) NOT NULL DEFAULT 'This option is not available in english',
  `option_d` varchar(150) NOT NULL DEFAULT 'This option is not available in english',
  `explanation` text,
  `hindi_question` text,
  `hindi_answer` varchar(100) NOT NULL DEFAULT 'This option is not available in hindi',
  `hindi_option_a` varchar(100) NOT NULL DEFAULT 'This option is not available in hindi',
  `hindi_option_b` varchar(100) NOT NULL DEFAULT 'This option is not available in hindi',
  `hindi_option_c` varchar(100) NOT NULL DEFAULT 'This option is not available in hindi',
  `hindi_option_d` varchar(100) NOT NULL DEFAULT 'This option is not available in hindi',
  `hindi_explanation` text,
  `image_eng` varchar(500) NOT NULL,
  `image_hindi` varchar(500) NOT NULL,
  `exp_image_eng` varchar(500) NOT NULL,
  `exp_image_hindi` varchar(500) NOT NULL,
  `quest_type` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test_questions`
--

INSERT INTO `test_questions` (`id`, `test_series_id`, `question`, `answer`, `option_a`, `option_b`, `option_c`, `option_d`, `explanation`, `hindi_question`, `hindi_answer`, `hindi_option_a`, `hindi_option_b`, `hindi_option_c`, `hindi_option_d`, `hindi_explanation`, `image_eng`, `image_hindi`, `exp_image_eng`, `exp_image_hindi`, `quest_type`) VALUES
(4, 2, '<p>what is spectrum</p>', 'ans1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0');

-- --------------------------------------------------------

--
-- Table structure for table `test_questions_answer`
--

CREATE TABLE `test_questions_answer` (
  `id` int(11) NOT NULL,
  `ques_id` int(11) NOT NULL,
  `eng_option` varchar(500) NOT NULL,
  `hindi_option` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `test_questions_answer`
--

INSERT INTO `test_questions_answer` (`id`, `ques_id`, `eng_option`, `hindi_option`) VALUES
(2, 1, 'sdf', ''),
(3, 1, 'xvxcv', ''),
(4, 2, 'option', ''),
(5, 2, 'option3', ''),
(6, 3, 'sdfsdf', ''),
(7, 3, 'sdfsfsfdsf', ''),
(8, 4, 'op1', ''),
(9, 4, 'op2', ''),
(10, 4, 'op3', '');

-- --------------------------------------------------------

--
-- Table structure for table `test_result`
--

CREATE TABLE `test_result` (
  `id` int(10) NOT NULL,
  `date` varchar(10) NOT NULL,
  `time` varchar(100) NOT NULL,
  `stu_id` varchar(100) NOT NULL,
  `test_id` varchar(100) NOT NULL,
  `quest_id` varchar(100) NOT NULL,
  `answer` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `correct_ans` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `marks` varchar(100) NOT NULL,
  `explanation` text NOT NULL,
  `attempt_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test_result`
--

INSERT INTO `test_result` (`id`, `date`, `time`, `stu_id`, `test_id`, `quest_id`, `answer`, `correct_ans`, `marks`, `explanation`, `attempt_id`) VALUES
(1, '25/04/2023', '11:32:28pm', '1', '1', '1', 'wer | ', 'wer', '+1', '', 2),
(2, '25/04/2023', '11:38:40pm', '1', '1', '1', 'xvxcv | ', 'wer', '-0.33', '', 3),
(3, '25/04/2023', '11:38:40pm', '1', '1', '2', 'correct | ', 'correct', '+1', '', 3),
(4, '25/04/2023', '11:38:40pm', '1', '1', '3', 'sdfsdf | ', 'sdsdf', '-0.33', '', 3),
(5, '25/04/2023', '11:48:56pm', '1', '1', '1', 'xvxcv | ', 'wer', '-0.33', '', 4),
(6, '25/04/2023', '11:48:56pm', '1', '1', '2', 'correct | ', 'correct', '+1', '', 4),
(7, '25/04/2023', '11:48:56pm', '1', '1', '3', 'sdfsfsfdsf | ', 'sdsdf', '-0.33', '', 4),
(8, '25/04/2023', '11:50:35pm', '1', '1', '1', 'xvxcv | ', 'wer', '-0.33', '', 5),
(9, '25/04/2023', '11:50:35pm', '1', '1', '2', '', 'correct', '0', '', 5),
(10, '25/04/2023', '11:50:35pm', '1', '1', '3', '', 'sdsdf', '0', '', 5),
(11, '25/04/2023', '11:51:43pm', '1', '1', '1', 'xvxcv | ', 'wer', '-0.33', '', 6),
(12, '25/04/2023', '11:51:43pm', '1', '1', '2', '', 'correct', '0', '', 6),
(13, '25/04/2023', '11:51:43pm', '1', '1', '3', '', 'sdsdf', '0', '', 6),
(14, '25/04/2023', '11:51:52pm', '1', '1', '1', '', 'wer', '0', '', 7),
(15, '25/04/2023', '11:51:52pm', '1', '1', '2', '', 'correct', '0', '', 7),
(16, '25/04/2023', '11:51:52pm', '1', '1', '3', '', 'sdsdf', '0', '', 7),
(17, '25/04/2023', '11:55:13pm', '1', '1', '1', '', 'wer', '0', '', 8),
(18, '25/04/2023', '11:55:13pm', '1', '1', '2', '', 'correct', '0', '', 8),
(19, '25/04/2023', '11:55:13pm', '1', '1', '3', '', 'sdsdf', '0', '', 8),
(20, '25/04/2023', '11:55:24pm', '1', '1', '1', 'sdf | ', 'wer', '-0.33', '', 9),
(21, '25/04/2023', '11:55:24pm', '1', '1', '2', 'option3 | ', 'correct', '-0.33', '', 9),
(22, '25/04/2023', '11:55:24pm', '1', '1', '3', '', 'sdsdf', '0', '', 9),
(23, '25/04/2023', '11:56:45pm', '1', '1', '1', 'wer | ', 'wer', '+1', '', 10),
(24, '25/04/2023', '11:56:45pm', '1', '1', '2', 'correct | ', 'correct', '+1', '', 10),
(25, '25/04/2023', '11:56:45pm', '1', '1', '3', 'sdfsfsfdsf | ', 'sdsdf', '-0.33', '', 10),
(26, '25/04/2023', '11:57:28pm', '1', '1', '1', 'wer | ', 'wer', '+1', '', 11),
(27, '25/04/2023', '11:57:28pm', '1', '1', '2', 'correct | ', 'correct', '+1', '', 11),
(28, '25/04/2023', '11:57:28pm', '1', '1', '3', 'sdfsfsfdsf | ', 'sdsdf', '-0.33', '', 11),
(29, '25/04/2023', '11:58:00pm', '1', '1', '1', 'wer | ', 'wer', '+1', '', 12),
(30, '25/04/2023', '11:58:00pm', '1', '1', '2', 'option3 | ', 'correct', '-0.33', '', 12),
(31, '25/04/2023', '11:58:00pm', '1', '1', '3', 'sdfsfsfdsf | ', 'sdsdf', '-0.33', '', 12),
(32, '25/04/2023', '11:59:44pm', '1', '1', '1', 'wer | ', 'wer', '+1', '', 13),
(33, '25/04/2023', '11:59:44pm', '1', '1', '2', 'option3 | ', 'correct', '-0.33', '', 13),
(34, '25/04/2023', '11:59:44pm', '1', '1', '3', 'sdfsfsfdsf | ', 'sdsdf', '-0.33', '', 13),
(35, '25/04/2023', '11:59:57pm', '1', '1', '1', 'wer | ', 'wer', '+1', '', 14),
(36, '25/04/2023', '11:59:57pm', '1', '1', '2', 'option | ', 'correct', '-0.33', '', 14),
(37, '25/04/2023', '11:59:57pm', '1', '1', '3', 'sdfsfsfdsf | ', 'sdsdf', '-0.33', '', 14),
(38, '26/04/2023', '12:01:12am', '1', '1', '1', 'wer | ', 'wer', '+1', '', 15),
(39, '26/04/2023', '12:01:12am', '1', '1', '2', 'option | ', 'correct', '-0.33', '', 15),
(40, '26/04/2023', '12:01:12am', '1', '1', '3', 'sdfsfsfdsf | ', 'sdsdf', '-0.33', '', 15),
(41, '26/04/2023', '12:01:24am', '1', '1', '1', '', 'wer', '0', '', 16),
(42, '26/04/2023', '12:01:24am', '1', '1', '2', 'option | ', 'correct', '-0.33', '', 16),
(43, '26/04/2023', '12:01:24am', '1', '1', '3', 'sdfsfsfdsf | ', 'sdsdf', '-0.33', '', 16),
(44, '26/04/2023', '12:02:16am', '1', '1', '1', '', 'wer', '0', '', 17),
(45, '26/04/2023', '12:02:16am', '1', '1', '2', 'option | ', 'correct', '-0.33', '', 17),
(46, '26/04/2023', '12:02:16am', '1', '1', '3', 'sdfsfsfdsf | ', 'sdsdf', '-0.33', '', 17),
(47, '26/04/2023', '12:02:28am', '1', '1', '1', 'wer | ', 'wer', '+1', '', 18),
(48, '26/04/2023', '12:02:28am', '1', '1', '2', 'correct | ', 'correct', '+1', '', 18),
(49, '26/04/2023', '12:02:28am', '1', '1', '3', 'sdfsfsfdsf | ', 'sdsdf', '-0.33', '', 18),
(50, '26/04/2023', '12:02:50am', '1', '1', '1', 'wer | ', 'wer', '+1', '', 19),
(51, '26/04/2023', '12:02:50am', '1', '1', '2', 'correct | ', 'correct', '+1', '', 19),
(52, '26/04/2023', '12:02:50am', '1', '1', '3', 'sdfsfsfdsf | ', 'sdsdf', '-0.33', '', 19),
(53, '26/04/2023', '12:03:02am', '1', '1', '1', 'sdf | ', 'wer', '-0.33', '', 20),
(54, '26/04/2023', '12:03:02am', '1', '1', '2', 'option3 | ', 'correct', '-0.33', '', 20),
(55, '26/04/2023', '12:03:02am', '1', '1', '3', '', 'sdsdf', '0', '', 20),
(56, '26/04/2023', '12:03:12am', '1', '1', '1', 'xvxcv | ', 'wer', '-0.33', '', 21),
(57, '26/04/2023', '12:03:12am', '1', '1', '2', 'option3 | ', 'correct', '-0.33', '', 21),
(58, '26/04/2023', '12:03:12am', '1', '1', '3', '', 'sdsdf', '0', '', 21),
(59, '26/04/2023', '12:03:46am', '1', '1', '1', 'xvxcv | ', 'wer', '-0.33', '', 22),
(60, '26/04/2023', '12:03:46am', '1', '1', '2', 'option3 | ', 'correct', '-0.33', '', 22),
(61, '26/04/2023', '12:03:46am', '1', '1', '3', '', 'sdsdf', '0', '', 22),
(62, '26/04/2023', '12:03:56am', '1', '1', '1', 'wer | ', 'wer', '+1', '', 23),
(63, '26/04/2023', '12:03:56am', '1', '1', '2', 'option3 | ', 'correct', '-0.33', '', 23),
(64, '26/04/2023', '12:03:56am', '1', '1', '3', 'sdfsdf | ', 'sdsdf', '-0.33', '', 23),
(65, '26/04/2023', '12:04:27am', '1', '1', '1', 'wer | ', 'wer', '+1', '', 24),
(66, '26/04/2023', '12:04:27am', '1', '1', '2', 'option3 | ', 'correct', '-0.33', '', 24),
(67, '26/04/2023', '12:04:27am', '1', '1', '3', 'sdfsdf | ', 'sdsdf', '-0.33', '', 24),
(68, '26/04/2023', '12:04:38am', '1', '1', '1', 'wer | ', 'wer', '+1', '', 25),
(69, '26/04/2023', '12:04:38am', '1', '1', '2', 'option3 | ', 'correct', '-0.33', '', 25),
(70, '26/04/2023', '12:04:38am', '1', '1', '3', 'sdfsfsfdsf | ', 'sdsdf', '-0.33', '', 25),
(71, '26/04/2023', '11:50:46am', '1', '1', '1', 'wer | ', 'wer', '+1', '', 26),
(72, '26/04/2023', '11:50:46am', '1', '1', '2', 'option | ', 'correct', '-0.33', '', 26),
(73, '26/04/2023', '11:50:46am', '1', '1', '3', 'sdfsdf | ', 'sdsdf', '-0.33', '', 26),
(74, '29/04/2023', '03:19:09pm', '18', '2', '4', 'ans1 | ', 'ans1', '+1', '', 27);

-- --------------------------------------------------------

--
-- Table structure for table `test_series`
--

CREATE TABLE `test_series` (
  `id` int(10) NOT NULL,
  `date` varchar(100) NOT NULL,
  `test_name` varchar(100) NOT NULL,
  `test_icon` varchar(255) NOT NULL,
  `total_questions` varchar(255) NOT NULL,
  `duration` varchar(100) NOT NULL,
  `positive` varchar(10) NOT NULL,
  `negative` varchar(10) NOT NULL,
  `examtitle` varchar(100) NOT NULL,
  `status` enum('0','1') NOT NULL COMMENT '0 = noshow , 1 = show',
  `descriptive` enum('0','1') NOT NULL,
  `testtype` enum('0','1') NOT NULL,
  `subject_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test_series`
--

INSERT INTO `test_series` (`id`, `date`, `test_name`, `test_icon`, `total_questions`, `duration`, `positive`, `negative`, `examtitle`, `status`, `descriptive`, `testtype`, `subject_id`) VALUES
(2, '29 Apr,2023', '0', 'images/WhatsApp Image 2023-04-27 at 18.15.50.jpg', '50', '60', '1', '0', 'Pre Board', '1', '0', '0', 11),
(3, '31 May,2023', '0', 'images/MATHS TEST 9TH.pdf', '11', '', '1', '0.33', 'MATHS CLASS TEST', '0', '0', '0', 15),
(4, '31 May,2023', '0', 'images/INTEGERS WORKSHEET 7TH.pdf', '38', '', '1', '0.33', 'INTEGERS WORKSHEET', '0', '0', '0', 13),
(5, '31 May,2023', '0', 'images/SANSKRIT CLASS 5TH.pdf', '10', '', '1', '0.33', 'SANSKRIT', '0', '0', '0', 11),
(6, '31 May,2023', '0', 'images/CROPS CLASS8TH.pdf', '33', '', '1', '0.33', 'CROP PRODUCTION & MANAGEMENT WORKSHEET', '0', '0', '0', 14);

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `id` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `course_id` varchar(100) NOT NULL,
  `sub_course` varchar(100) NOT NULL,
  `unit` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `url` varchar(255) NOT NULL,
  `pdf` varchar(255) NOT NULL,
  `section_id` int(11) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`id`, `date`, `course_id`, `sub_course`, `unit`, `name`, `url`, `pdf`, `section_id`, `description`) VALUES
(1, '2023-04-25 23:22:48', '2', '', 2, 'Harsha maravi', 'https://www.youtube.com/watch?v=d-diB65scQU', 'pdf/harsha adhaar.pdf', 0, '<p>CAREER PUBLIC SCHOOL is one of the best private schools in, Korba Chhattisgarh. It was established in the year 1988 under the leadership of Mr.Vishnu Rajoria, Founder Chairman.&nbsp;<br>Mr. Vishnu Rajoria envisioned an institution to impart knowledge that changes the outlook of the future generation. A school that builds character and career too.<br>Over the years, Career Public School, Korba has successfully achieved the founder’s vision and continues to impart an education that establishes individual growth along with contribution to the nation’s growth.<br>Instilling discipline, physical fitness, and the interest to read the school is proud of its achievements. The continues excellent results in board exams, inter-school competitions, and the esteemed alumni are evident examples of the school’s success.<br>This is why Career Public School is regarded as the best private school in Korba, Chhattisgarh.<br>&nbsp;</p><figure class=\"image\"><img src=\"https://www.careerpublicschool.ac.in/assets/img/about.jpg\" alt=\"Career Public School \"></figure><p>One of the many milestones achieved was in the year 2012 when Career Public School was relocated to its current central location in the Korba district of Chhattisgarh. This decision was taken because of the growing demand for quality education by students and parents. Being centrally located makes the school accessible to more students.<br>The school is now affiliated with the Central Board of Secondary Education and achieving excellent academic and extracurricular results under the determined leadership and rich experience of the present Chairman Mr. Manish Rajoria.<br>The school is managed by its Director Prof. Pradeep Jain and a dedicated team of teachers, librarians, staff and management.<br>The school strives hard to provide an enriching experience. Through evolving and creative methods, it aims to make learning an enjoyable experience for young minds. Career Public School, Korba is continuously upgrading and adding new amenities and facilities for its students. The vast expanses of the campus enable students to play various sports and learn in a clean and green environment. The management ensures the safety and well-being of students while on campus and takes this responsibility very seriously.<br>&nbsp;</p><p><strong>Career Public School, Korba endeavors to shape young minds for a better tomorrow.</strong></p>'),
(2, '2023-04-29 15:25:05', '11', '', 0, 'last board exam ques', 'https://www.youtube.com/watch?v=EatzcaVJRMs&list=RDg2eaNeFzw1Q&index=28', 'pdf/DABF - LOGO.pdf', 0, '<p>more description more description more description more description more description more description more description</p>'),
(3, '2023-05-08 19:03:55', '15', '', 1, 'number system', '', 'pdf/Document (1) (27).pdf', 0, '<p>Practice Questions</p>');

-- --------------------------------------------------------

--
-- Table structure for table `web_query`
--

CREATE TABLE `web_query` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` varchar(100) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `web_query`
--

INSERT INTO `web_query` (`id`, `name`, `email`, `message`, `phone`, `date`) VALUES
(1, 'Harsha maravi', 'harshamaravi@gmail.com', 'test 1', '9516354018', '25-04-23'),
(2, 'muskan jain', 'muskaanrashujain@gmail.com', 'hello', '83192183335', '26-04-23'),
(3, 'Sagar Tharku', 'sagar@gmail.com', 'this is testing\r\n', '6265965711', '27-04-23'),
(4, 'RobertNam', 'alfredegov@gmail.com', 'Szia, meg akartam tudni az &aacute;r&aacute;t.', '87129364137', '07-07-23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidate_education`
--
ALTER TABLE `candidate_education`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `candidate_registre`
--
ALTER TABLE `candidate_registre`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `candidate_subscribe`
--
ALTER TABLE `candidate_subscribe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `candidate_test_attempts`
--
ALTER TABLE `candidate_test_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_package`
--
ALTER TABLE `course_package`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_section`
--
ALTER TABLE `exam_section`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `free_pdf`
--
ALTER TABLE `free_pdf`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `free_video`
--
ALTER TABLE `free_video`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `main_courses`
--
ALTER TABLE `main_courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `our_teachers`
--
ALTER TABLE `our_teachers`
  ADD PRIMARY KEY (`tid`);

--
-- Indexes for table `pdf_category`
--
ALTER TABLE `pdf_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `query`
--
ALTER TABLE `query`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ranker`
--
ALTER TABLE `ranker`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social`
--
ALTER TABLE `social`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `state_list`
--
ALTER TABLE `state_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscription`
--
ALTER TABLE `subscription`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_gallery_image`
--
ALTER TABLE `tbl_gallery_image`
  ADD PRIMARY KEY (`pi_id`);

--
-- Indexes for table `testseries_subject`
--
ALTER TABLE `testseries_subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test_questions`
--
ALTER TABLE `test_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test_questions_answer`
--
ALTER TABLE `test_questions_answer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test_result`
--
ALTER TABLE `test_result`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test_series`
--
ALTER TABLE `test_series`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `web_query`
--
ALTER TABLE `web_query`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `candidate_registre`
--
ALTER TABLE `candidate_registre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `candidate_subscribe`
--
ALTER TABLE `candidate_subscribe`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `candidate_test_attempts`
--
ALTER TABLE `candidate_test_attempts`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `city_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1624;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `course_package`
--
ALTER TABLE `course_package`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exam_section`
--
ALTER TABLE `exam_section`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `free_pdf`
--
ALTER TABLE `free_pdf`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `free_video`
--
ALTER TABLE `free_video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `main_courses`
--
ALTER TABLE `main_courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `our_teachers`
--
ALTER TABLE `our_teachers`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pdf_category`
--
ALTER TABLE `pdf_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `query`
--
ALTER TABLE `query`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ranker`
--
ALTER TABLE `ranker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `social`
--
ALTER TABLE `social`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `state_list`
--
ALTER TABLE `state_list`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `subscription`
--
ALTER TABLE `subscription`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_gallery_image`
--
ALTER TABLE `tbl_gallery_image`
  MODIFY `pi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=169;

--
-- AUTO_INCREMENT for table `testseries_subject`
--
ALTER TABLE `testseries_subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `test_questions`
--
ALTER TABLE `test_questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `test_questions_answer`
--
ALTER TABLE `test_questions_answer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `test_result`
--
ALTER TABLE `test_result`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `test_series`
--
ALTER TABLE `test_series`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `web_query`
--
ALTER TABLE `web_query`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
