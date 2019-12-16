-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 23, 2019 at 05:37 AM
-- Server version: 10.3.14-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id7438005_northwaydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(200) NOT NULL,
  `category_img` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category_img`) VALUES
(56, 'Kids Bikes', '1012567282first-bike-street-with-brake.jpg'),
(57, 'Clothing', '1190315668rBVaI1iz1oCAW7CLAAHxq71XxPQ709.jpg'),
(58, 'Footwear', '1185037721p5589046c019722.39796294[1].jpg'),
(59, 'Water Bottles', '316858587397083_3401645.jpg'),
(60, 'Bags', '116242376610918730-1418398512-404106.jpg'),
(61, 'Helmets', '1206487258401927_1619194.jpg'),
(63, 'Saddles', '162483663161772_1_Zoom.jpg'),
(64, 'Frames', '481721187felt_frame.png'),
(65, 'Wrenches', '93893493895034_100pc.jpg'),
(66, 'Covers and Cases', '862723335bbb-patron-case-for-iphone-5-bsm-01.jpg'),
(67, 'Components', '878675934336011_2968795.jpg'),
(69, 'Tires', '179624671312.jpg'),
(72, 'Accessories', '2104560791CEMA-bearing.png'),
(73, 'Bikes', '20858207551582125164gt-aggressor-expert-27.5.jpg'),
(75, 'Lever', '313542274shimano-xtr-sl-m9000-right-with-clamp.jpg'),
(76, 'Crankset', '1526005336main.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` bigint(100) NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `customer_username` varchar(100) NOT NULL,
  `customer_fullname` varchar(200) NOT NULL,
  `customer_password` varchar(100) NOT NULL,
  `customer_contact_number` varchar(100) NOT NULL,
  `customer_address` varchar(200) NOT NULL,
  `customer_shipping_address` varchar(200) NOT NULL,
  `customer_status` varchar(100) NOT NULL,
  `customer_verification_code` varchar(100) NOT NULL,
  `recipient_name` varchar(200) NOT NULL,
  `recipient_address` varchar(200) NOT NULL,
  `recipient_contact_number` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_email`, `customer_username`, `customer_fullname`, `customer_password`, `customer_contact_number`, `customer_address`, `customer_shipping_address`, `customer_status`, `customer_verification_code`, `recipient_name`, `recipient_address`, `recipient_contact_number`) VALUES
(2385248414825742, 'taeyangsolar8@gmail.com', 'Joshua1302617489881474', 'Joshua Concepcion', '', '09055425091', '', '97 St Peter Lfs Veinte Reales Metro Manila Valenzuela', 'Enabled', '', '', '', '0'),
(2385248414825745, 'arnoldbonifacio0119@gmail.com', 'Arnold2351807634834094', 'Arnold Bonifacio', '', '09357995194', '', '117 kabulusan Metro Manila Caloocan', 'Enabled', '', '', '', '0'),
(2385248414825746, 'leoju321@gmail.com', 'pukla', 'leonard', 'VGFuZ2luYW1vam9zaHVhMjE=', '09057014841', '52 San Francisco st. Karuhatan Valenzuela City', '52 San Francisco st karuhatan Metro Manila Valenzuela', 'Enabled', '', 'Joshua', '98 Memorial Metro Manila Makati', '09121232132'),
(2385248414825747, 'armold_bonifacio0119@yahoo.com', 'Arnold2643276919022819', 'Arnold Bonifacio', '', '09357995194', '', '11 Bantex Metro Manila Valenzuela', 'Enabled', '', '', '', '0'),
(2385248414825749, 'taeyangsolar8@gmail.com', 'solar107688402737994834739', 'solar taeyang', '', '09055425091', '', '97 St Mark Marial Metro Manila Malabon', 'Enabled', '', '', '', '0'),
(2385248414825750, 'sample@gmail.com', 'emeline', 'Emeline Sunga', 'RW1lbGluZXN1bmdhMTIzNA==', '09055425091', 'Sa Kanto Valenzuela', 'Sa Kanto Valenzuela', 'Enabled', '', 'Mark Joshua', '', '0'),
(2385248414825751, 'concepcionjoshua90@gmail.com', 'Joshua110694628298845987069', 'Joshua Concepcion', '', '09055425091', '', '97 St Peter LFS Veinte Reales Metro Manila Valenzuela', 'Enabled', '', '', '', '0'),
(2385248414825752, 'concepcionjoshua1998@gmail.com', 'joshua115662100912991211841', 'joshua concepcion', '', '09432432443', '', '32321 Metro Manila Mandaluyong', 'Enabled', '', '', '', '0'),
(2385248414825753, 'arnoldbonifacio0119@gmail.com', 'Iron104220169378579813366', 'Iron Man', '', '09269708928', '', '117 kabulusan 1 Metro Manila Caloocan', 'Enabled', '', 'arnold bonifacio', '', '0'),
(2385248414825754, '', 'Emerson2643059282377959', 'Emerson Garcia', '', '', '', '', 'Enabled', '', '', '', '0'),
(2385248414825755, '', 'Joshua2064941203816413', 'Joshua Concepcion', '', '', '', '', 'Enabled', '', '', '', ''),
(2385248414825756, 'johnlouelreyes3@gmail.com', 'JohnLouel107807261753523477564', 'JohnLouel Reyes', '', '09914725812', 'sample', 'sample Metro Manila Caloocan', 'Enabled', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `customer_order`
--

CREATE TABLE `customer_order` (
  `customer_order_id` int(11) NOT NULL,
  `order_number` varchar(100) NOT NULL,
  `product_code` varchar(100) NOT NULL,
  `customer_quantity` int(11) NOT NULL,
  `customer_session_cart` varchar(200) NOT NULL,
  `customer_payment_method` varchar(100) NOT NULL,
  `customer_order_status` varchar(100) NOT NULL,
  `customer_order_date` date NOT NULL,
  `customer_shipping_address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_order`
--

INSERT INTO `customer_order` (`customer_order_id`, `order_number`, `product_code`, `customer_quantity`, `customer_session_cart`, `customer_payment_method`, `customer_order_status`, `customer_order_date`, `customer_shipping_address`) VALUES
(479, '1', 'Ber-15', 1, '2385248414825752', 'cod', 'Noreceiver', '2019-03-12', '32321 Metro Manila Mandaluyong'),
(480, '2', 'Ber-15', 1, '2385248414825752', 'cod', 'Approved', '2019-03-12', '32321 Metro Manila Mandaluyong'),
(481, '3', 'Ber-15', 1, '2385248414825752', 'cod', 'Delivery', '2019-03-06', '32321 Metro Manila Mandaluyong'),
(482, '4', 'Ber-15', 2, '2385248414825753', 'Paypal', '', '2019-03-12', '117 kabulusan 1 Metro Manila Caloocan'),
(483, '4', 'Gt-12', 2, '2385248414825753', 'Paypal', '', '2019-03-12', '117 kabulusan 1 Metro Manila Caloocan'),
(484, '4', 'Ber-43', 2, '2385248414825753', 'Paypal', '', '2019-03-12', '117 kabulusan 1 Metro Manila Caloocan'),
(485, '5', 'Ber-15', 1, '2385248414825746', 'cod', '', '2019-03-05', '52 San Francisco st karuhatan Metro Manila Valenzuela'),
(486, '6', 'Ber-15', 2, '2385248414825746', 'Paypal', 'Approved', '2019-03-13', '52 San Francisco st karuhatan Metro Manila Valenzuela'),
(487, '7', 'Gt-12', 1, '2385248414825746', 'cod', '', '2019-03-05', '52 San Francisco st karuhatan Metro Manila Valenzuela'),
(488, '8', 'Ber-15', 2, '2385248414825745', 'cod', '', '2019-03-14', '117 kabulusan Metro Manila Caloocan'),
(489, '9', 'Ber-15', 1, '2385248414825746', 'cod', '', '2019-03-15', '98 Memorial Metro Manila Makati'),
(490, '10', 'Ber-15', 1, '2385248414825746', 'cod', 'Approved', '2019-03-15', '52 San Francisco st karuhatan Metro Manila Valenzuela'),
(491, '11', 'Ber-15', 1, '2385248414825746', 'Paypal', '', '2019-03-15', '52 San Francisco st karuhatan Metro Manila Valenzuela'),
(492, '12', 'Ber-15', 1, '2385248414825756', 'cod', '', '2019-04-04', 'sample Metro Manila Caloocan'),
(493, '13', 'Gt-12', 2, '2385248414825751', 'cod', '', '2019-04-04', '97 St Peter LFS Veinte Reales Metro Manila Valenzuela'),
(494, '14', 'Gt-12', 2, '2385248414825749', 'Paypal', '', '2019-04-05', '97 St Mark Marial Metro Manila Malabon'),
(495, '15', 'Ber-15', 2, '2385248414825753', 'cod', '', '2019-04-05', '117 kabulusan 1 Metro Manila Caloocan'),
(496, '16', 'Ber-43', 1, '2385248414825753', 'Paypal', 'Approved', '2019-04-05', '117 kabulusan 1 Metro Manila Caloocan'),
(497, '17', 'Ber-15', 1, '2385248414825753', 'cod', 'Approved', '2019-04-06', '117 kabulusan 1 Metro Manila Caloocan');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `history_id` int(11) NOT NULL,
  `details` varchar(300) NOT NULL,
  `date_` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`history_id`, `details`, `date_`) VALUES
(1073, 'Admin Junio has Login in the system using  Mozilla/5.0 (Linux; Android 5.0.2; ASUS_Z00LD) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.105 Mobile Safari/537.36 last ', 'March 3, 2019, 2:12 pm'),
(1074, 'Admin Junio has add 5 stock of Shimano Ultegra Di2 R8 in the system using  Mozilla/5.0 (Linux; Android 5.0.2; ASUS_Z00LD) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.105 Mobile Safari/537.36 last ', 'March 3, 2019, 2:12 pm'),
(1075, 'Admin  has add 10 stock of Campagnolo Centaur Pair in the system using  Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.119 Safari/537.36 last ', 'March 3, 2019, 2:44 pm'),
(1076, 'Admin  has add 10 stock of Campagnolo Record Left in the system using  Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.119 Safari/537.36 last ', 'March 3, 2019, 2:44 pm'),
(1077, 'Admin  has add 10 stock of Shimano ST-R8020 Ultegra Left Shift Lever (2x11-Speed) in the system using  Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.119 Safari/537.36 last ', 'March 3, 2019, 2:44 pm'),
(1078, 'Admin  has add 10 stock of VCT V1200 ELITE in the system using  Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.119 Safari/537.36 last ', 'March 3, 2019, 2:44 pm'),
(1079, 'Admin  has add 10 stock of Campagnolo Powershift Ergo Brake Lever Hoods in the system using  Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.119 Safari/537.36 last ', 'March 3, 2019, 2:44 pm'),
(1080, 'Admin  has add 10 stock of Campagnolo Veloce 10s Ergopower Road Lever Set in the system using  Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.119 Safari/537.36 last ', 'March 3, 2019, 2:45 pm'),
(1081, 'Admin  has add 10 stock of Bergamont Bergamonster 20 Girl 2017 in the system using  Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.119 Safari/537.36 last ', 'March 3, 2019, 2:45 pm'),
(1082, 'Admin  has add 10 stock of Gt Avalanche Elite 29 in the system using  Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.119 Safari/537.36 last ', 'March 3, 2019, 2:46 pm'),
(1083, 'Admin  has add 10 stock of Gt Palomar Alu 27.5 in the system using  Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.119 Safari/537.36 last ', 'March 3, 2019, 2:46 pm'),
(1084, 'Admin  has add 10 stock of Bergamont Revox 3.0 2017 in the system using  Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.119 Safari/537.36 last ', 'March 3, 2019, 2:46 pm'),
(1085, 'Admin  has add 10 stock of Gt Avalanche Elite 27.5 in the system using  Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.119 Safari/537.36 last ', 'March 3, 2019, 2:47 pm'),
(1086, 'Admin Junio has Login in the system using  Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.81 Safari/537.36 last ', 'March 3, 2019, 5:28 pm'),
(1087, 'Admin Junio update his account setting in the system using  Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.81 Safari/537.36 last ', 'March 3, 2019, 5:31 pm'),
(1088, 'Admin Account has Login in the system using  Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.81 Safari/537.36 last ', 'March 3, 2019, 5:31 pm'),
(1089, 'Admin Account has set order to On Delivery Order #2 in the system using  Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.81 Safari/537.36 last ', 'March 3, 2019, 5:38 pm'),
(1090, 'Admin Account has approved Order #2 in the system using  Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.81 Safari/537.36 last ', 'March 3, 2019, 5:42 pm'),
(1091, 'Admin Account has set order to On Delivery Order #1 in the system using  Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.81 Safari/537.36 last ', 'March 3, 2019, 5:42 pm'),
(1092, 'Admin Account has Login in the system using  Mozilla/5.0 (Linux; Android 7.0; TRT-L21A) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.105 Mobile Safari/537.36 last ', 'March 5, 2019, 6:36 pm'),
(1093, 'Admin Account has add 10 stock of BIKE MOUNT™ FOR ANDROID™ in the system using  Mozilla/5.0 (Linux; Android 7.0; TRT-L21A) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.105 Mobile Safari/537.36 last ', 'March 5, 2019, 6:36 pm'),
(1094, 'Admin Account has add 10 stock of Campagnolo Chorus Ergopower in the system using  Mozilla/5.0 (Linux; Android 7.0; TRT-L21A) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.105 Mobile Safari/537.36 last ', 'March 5, 2019, 6:37 pm'),
(1095, 'Admin Account has add 10 stock of Shimano 105 Brake Shoes Cartridge R55C4 in the system using  Mozilla/5.0 (Linux; Android 7.0; TRT-L21A) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.105 Mobile Safari/537.36 last ', 'March 5, 2019, 6:37 pm'),
(1096, 'Admin Account has add 10 stock of Shimano 11-speed Chain CN-HG601 with Quick-Link in the system using  Mozilla/5.0 (Linux; Android 7.0; TRT-L21A) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.105 Mobile Safari/537.36 last ', 'March 5, 2019, 6:37 pm'),
(1097, 'Admin Account has add 10 stock of Shimano XT PD-M8040 Flat Pedals in the system using  Mozilla/5.0 (Linux; Android 7.0; TRT-L21A) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.105 Mobile Safari/537.36 last ', 'March 5, 2019, 6:37 pm'),
(1098, 'Admin Account has add 10 stock of Selle Smp Well in the system using  Mozilla/5.0 (Linux; Android 7.0; TRT-L21A) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.105 Mobile Safari/537.36 last ', 'March 5, 2019, 6:37 pm'),
(1099, 'Admin Account has add 10 stock of Shimano XT Brake Shoes Cartridge M70CT4 for BR-T78 in the system using  Mozilla/5.0 (Linux; Android 7.0; TRT-L21A) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.105 Mobile Safari/537.36 last ', 'March 5, 2019, 6:38 pm'),
(1100, 'Admin Account has add 10 stock of Selle smp TRK Medium in the system using  Mozilla/5.0 (Linux; Android 7.0; TRT-L21A) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.105 Mobile Safari/537.36 last ', 'March 5, 2019, 6:38 pm'),
(1101, 'Admin Account has add 10 stock of Shimano Pedals SPD PD-A530 black in the system using  Mozilla/5.0 (Linux; Android 7.0; TRT-L21A) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.105 Mobile Safari/537.36 last ', 'March 5, 2019, 6:38 pm'),
(1102, 'Admin Account has add 10 stock of Sci-con Hippo 550 in the system using  Mozilla/5.0 (Linux; Android 7.0; TRT-L21A) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.105 Mobile Safari/537.36 last ', 'March 5, 2019, 6:39 pm'),
(1103, 'Admin Account has add 10 stock of Shimano 105 Brake Shoes Cartridge R55C4 for Direct in the system using  Mozilla/5.0 (Linux; Android 7.0; TRT-L21A) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.105 Mobile Safari/537.36 last ', 'March 5, 2019, 6:39 pm'),
(1104, 'Admin Account has add 10 stock of Schwalbe Insider in the system using  Mozilla/5.0 (Linux; Android 7.0; TRT-L21A) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.105 Mobile Safari/537.36 last ', 'March 5, 2019, 6:39 pm'),
(1105, 'Admin Account has add 10 stock of Shimano XTR SL-M9000 Right With Clamp in the system using  Mozilla/5.0 (Linux; Android 7.0; TRT-L21A) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.105 Mobile Safari/537.36 last ', 'March 5, 2019, 6:40 pm'),
(1106, 'Admin Account has add 10 stock of Schwalbe Nobby Nic HS463 Folding TLE Evo TSC in the system using  Mozilla/5.0 (Linux; Android 7.0; TRT-L21A) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.105 Mobile Safari/537.36 last ', 'March 5, 2019, 6:40 pm'),
(1107, 'Admin Account has add 10 stock of Rymebikes Rex in the system using  Mozilla/5.0 (Linux; Android 7.0; TRT-L21A) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.105 Mobile Safari/537.36 last ', 'March 5, 2019, 6:40 pm'),
(1108, 'Admin Account has add 10 stock of FC-M985 in the system using  Mozilla/5.0 (Linux; Android 7.0; TRT-L21A) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.105 Mobile Safari/537.36 last ', 'March 5, 2019, 6:40 pm'),
(1109, 'Admin Account has add 10 stock of Radon Ratcheting Wrench in the system using  Mozilla/5.0 (Linux; Android 7.0; TRT-L21A) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.105 Mobile Safari/537.36 last ', 'March 5, 2019, 6:41 pm'),
(1110, 'Admin Account has add 10 stock of HOLLOWTECH ll Crankset (3/2/1x11-speed) FC-M9020-2 in the system using  Mozilla/5.0 (Linux; Android 7.0; TRT-L21A) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.105 Mobile Safari/537.36 last ', 'March 5, 2019, 6:41 pm'),
(1111, 'Admin Account has add 10 stock of Radon ECO Torque Wrench 3/8&quot; 20-110 Nm in the system using  Mozilla/5.0 (Linux; Android 7.0; TRT-L21A) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.105 Mobile Safari/537.36 last ', 'March 5, 2019, 6:41 pm'),
(1112, 'Admin Account has add 10 stock of Shimano Rp3 in the system using  Mozilla/5.0 (Linux; Android 7.0; TRT-L21A) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.105 Mobile Safari/537.36 last ', 'March 5, 2019, 6:41 pm'),
(1113, 'Admin Account has add 10 stock of Radon ECO Torque Wrench 1/4&quot; 5-25 Nm in the system using  Mozilla/5.0 (Linux; Android 7.0; TRT-L21A) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.105 Mobile Safari/537.36 last ', 'March 5, 2019, 6:42 pm'),
(1114, 'Admin Account has add 10 stock of Shimano MT5 in the system using  Mozilla/5.0 (Linux; Android 7.0; TRT-L21A) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.105 Mobile Safari/537.36 last ', 'March 5, 2019, 6:42 pm'),
(1115, 'Admin Account has add 10 stock of Radon Ratcheting Wrench-Set in the system using  Mozilla/5.0 (Linux; Android 7.0; TRT-L21A) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.105 Mobile Safari/537.36 last ', 'March 5, 2019, 6:42 pm'),
(1116, 'Admin Account has add 10 stock of Shimano RC9 Sphyre in the system using  Mozilla/5.0 (Linux; Android 7.0; TRT-L21A) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.105 Mobile Safari/537.36 last ', 'March 5, 2019, 6:42 pm'),
(1117, 'Admin Account has add 10 stock of Radon Slide Carbon 160 27.5 Frame black white in the system using  Mozilla/5.0 (Linux; Android 7.0; TRT-L21A) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.105 Mobile Safari/537.36 last ', 'March 5, 2019, 6:42 pm'),
(1118, 'Admin Account has add 10 stock of Shimano Steps Chainring SM-CRE80 for FC-E8000/8050 in the system using  Mozilla/5.0 (Linux; Android 7.0; TRT-L21A) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.105 Mobile Safari/537.36 last ', 'March 5, 2019, 6:43 pm'),
(1119, 'Admin Account has add 10 stock of Radon ZR Team 29 Frame blue white in the system using  Mozilla/5.0 (Linux; Android 7.0; TRT-L21A) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.105 Mobile Safari/537.36 last ', 'March 5, 2019, 6:43 pm'),
(1120, 'Admin Account has add 10 stock of Shimano Steps Crank Arm Set FC-E8000 without Chain in the system using  Mozilla/5.0 (Linux; Android 7.0; TRT-L21A) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.105 Mobile Safari/537.36 last ', 'March 5, 2019, 6:44 pm'),
(1121, 'Admin Account has add 10 stock of Radon ZR Team Lady 26 Frame mint white in the system using  Mozilla/5.0 (Linux; Android 7.0; TRT-L21A) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.105 Mobile Safari/537.36 last ', 'March 5, 2019, 6:44 pm'),
(1122, 'Admin Account has add 10 stock of BLUE ELF 1.0 in the system using  Mozilla/5.0 (Linux; Android 7.0; TRT-L21A) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.105 Mobile Safari/537.36 last ', 'March 5, 2019, 6:44 pm'),
(1123, 'Admin Account has add 10 stock of Radon ZR Race 29 Frame lime blue white in the system using  Mozilla/5.0 (Linux; Android 7.0; TRT-L21A) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.105 Mobile Safari/537.36 last ', 'March 5, 2019, 6:44 pm'),
(1124, 'Admin Account has add 10 stock of HOLLOWTECH ll Crankset FC-M9100-2 in the system using  Mozilla/5.0 (Linux; Android 7.0; TRT-L21A) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.105 Mobile Safari/537.36 last ', 'March 5, 2019, 6:45 pm'),
(1125, 'Admin Account has add 10 stock of Radon Slide 130 29 Frame blue red white in the system using  Mozilla/5.0 (Linux; Android 7.0; TRT-L21A) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.105 Mobile Safari/537.36 last ', 'March 5, 2019, 6:45 pm'),
(1126, 'Admin Account has add 10 stock of Shimano Revoshift Shifter (7-Speed) in the system using  Mozilla/5.0 (Linux; Android 7.0; TRT-L21A) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.105 Mobile Safari/537.36 last ', 'March 5, 2019, 6:45 pm'),
(1127, 'Admin Account has add 10 stock of Radon Slide 150 26 Frame blue lime in the system using  Mozilla/5.0 (Linux; Android 7.0; TRT-L21A) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.105 Mobile Safari/537.36 last ', 'March 5, 2019, 6:45 pm'),
(1128, 'Admin Account has add 10 stock of Shimano Deore BL-T610 Duo V-Brake in the system using  Mozilla/5.0 (Linux; Android 7.0; TRT-L21A) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.105 Mobile Safari/537.36 last ', 'March 5, 2019, 6:45 pm'),
(1129, 'Admin Account has add 10 stock of Radon TORX Wrench Set 9-Pieces long in the system using  Mozilla/5.0 (Linux; Android 7.0; TRT-L21A) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.105 Mobile Safari/537.36 last ', 'March 5, 2019, 6:46 pm'),
(1130, 'Admin Account has add 10 stock of Shimano Duo Shifter TX30 6s in the system using  Mozilla/5.0 (Linux; Android 7.0; TRT-L21A) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.105 Mobile Safari/537.36 last ', 'March 5, 2019, 6:46 pm'),
(1131, 'Admin Account has add 10 stock of Radon 9-piece Hex Key Wrench Set in the system using  Mozilla/5.0 (Linux; Android 7.0; TRT-L21A) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.105 Mobile Safari/537.36 last ', 'March 5, 2019, 6:46 pm'),
(1132, 'Admin Account has add 10 stock of RP5 Cycling shoes in the system using  Mozilla/5.0 (Linux; Android 7.0; TRT-L21A) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.105 Mobile Safari/537.36 last ', 'March 5, 2019, 6:46 pm'),
(1133, 'Admin Account has add 10 stock of Pro Mini Bag in the system using  Mozilla/5.0 (Linux; Android 7.0; TRT-L21A) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.105 Mobile Safari/537.36 last ', 'March 5, 2019, 6:46 pm'),
(1134, 'Admin Account has add 10 stock of HOLLOWTECH II Crankset FC-M9120-1 in the system using  Mozilla/5.0 (Linux; Android 7.0; TRT-L21A) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.105 Mobile Safari/537.36 last ', 'March 5, 2019, 6:47 pm'),
(1135, 'Admin Account has add 10 stock of Prologo Dimension TiroX in the system using  Mozilla/5.0 (Linux; Android 7.0; TRT-L21A) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.105 Mobile Safari/537.36 last ', 'March 5, 2019, 6:47 pm'),
(1136, 'Admin Account has add 10 stock of Shimano Dual Road Calipers R400 in the system using  Mozilla/5.0 (Linux; Android 7.0; TRT-L21A) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.105 Mobile Safari/537.36 last ', 'March 5, 2019, 6:47 pm'),
(1137, 'Admin Account has add 10 stock of Poc Crane Mips in the system using  Mozilla/5.0 (Linux; Android 7.0; TRT-L21A) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.105 Mobile Safari/537.36 last ', 'March 5, 2019, 6:49 pm'),
(1138, 'Admin Account has add 10 stock of Shimano Altus Right RF+ C/OPT in the system using  Mozilla/5.0 (Linux; Android 7.0; TRT-L21A) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.105 Mobile Safari/537.36 last ', 'March 5, 2019, 6:50 pm'),
(1139, 'Admin Account has add 10 stock of Pirelli P Zero Velo 25 in the system using  Mozilla/5.0 (Linux; Android 7.0; TRT-L21A) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.105 Mobile Safari/537.36 last ', 'March 5, 2019, 6:50 pm'),
(1140, 'Admin Account has add 10 stock of HOLLOWTECH ll Crankset FC-M9120-B2 in the system using  Mozilla/5.0 (Linux; Android 7.0; TRT-L21A) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.105 Mobile Safari/537.36 last ', 'March 5, 2019, 6:51 pm'),
(1141, 'Admin Account has add 10 stock of Park Tool TW-5.2 Torque Wrench 2-14 Nm 3/8&quot; in the system using  Mozilla/5.0 (Linux; Android 7.0; TRT-L21A) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.105 Mobile Safari/537.36 last ', 'March 5, 2019, 6:51 pm'),
(1142, 'Admin Account has add 10 stock of Hydraulic Disc Brake Lever for XC Race BL -M9000 in the system using  Mozilla/5.0 (Linux; Android 7.0; TRT-L21A) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.105 Mobile Safari/537.36 last ', 'March 5, 2019, 6:51 pm'),
(1143, 'Admin  has add 10 stock of Park Tool TWS-2 Torx Wrench Set in the system using  Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.119 Safari/537.36 last ', 'March 6, 2019, 9:09 pm'),
(1144, 'Admin  has add 10 stock of Powerbar Bottle in the system using  Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.119 Safari/537.36 last ', 'March 6, 2019, 9:09 pm'),
(1145, 'Admin  has add 10 stock of Msc Lunatika 2 in the system using  Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.119 Safari/537.36 last ', 'March 6, 2019, 9:09 pm'),
(1146, 'Admin  has add 10 stock of BL-M9120 in the system using  Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.119 Safari/537.36 last ', 'March 6, 2019, 9:09 pm'),
(1147, 'Admin  has add 10 stock of Msc Mercury Alu R 29 in the system using  Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.119 Safari/537.36 last ', 'March 6, 2019, 9:10 pm'),
(1148, 'Admin  has add 10 stock of WATER BOTTLE TH04 in the system using  Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.119 Safari/537.36 last ', 'March 6, 2019, 9:10 pm'),
(1149, 'Admin  has add 10 stock of Msc Mercury Alu R 27.5 in the system using  Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.119 Safari/537.36 last ', 'March 6, 2019, 9:10 pm'),
(1150, 'Admin  has add 10 stock of CYCLING SUIT TF30 in the system using  Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.119 Safari/537.36 last ', 'March 6, 2019, 9:10 pm'),
(1151, 'Admin  has add 10 stock of Msc Mercury Carbon R 29 in the system using  Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.119 Safari/537.36 last ', 'March 6, 2019, 9:11 pm'),
(1152, 'Admin  has add 10 stock of Elite Crystal Ombra Bottle - 550ml in the system using  Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.119 Safari/537.36 last ', 'March 6, 2019, 9:11 pm'),
(1153, 'Admin  has add 10 stock of Msc Mercury Carbon 29 in the system using  Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.119 Safari/537.36 last ', 'March 6, 2019, 9:11 pm'),
(1154, 'Admin  has add 10 stock of CYCLING SUIT TF 18 in the system using  Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.119 Safari/537.36 last ', 'March 6, 2019, 9:11 pm'),
(1155, 'Admin  has add 10 stock of Maxxis Minion DHR II in the system using  Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.119 Safari/537.36 last ', 'March 6, 2019, 9:12 pm'),
(1156, 'Admin  has add 10 stock of CYCLING SUIT TF 17 in the system using  Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.119 Safari/537.36 last ', 'March 6, 2019, 9:12 pm'),
(1157, 'Admin  has add 10 stock of Maxxis Crossmark W 26 X 2.10 in the system using  Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.119 Safari/537.36 last ', 'March 6, 2019, 9:12 pm'),
(1158, 'Admin Account has Login in the system using  Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.121 Safari/537.36 last ', 'March 8, 2019, 11:23 am'),
(1159, 'Admin Account has Logout in the system using  Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.121 Safari/537.36 last ', 'March 8, 2019, 11:23 am'),
(1160, 'Admin Account has Login in the system using  Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.121 Safari/537.36 last ', 'March 8, 2019, 11:30 am'),
(1161, 'Admin Account has Login in the system using  Mozilla/5.0 (Linux; Android 5.0.2; ASUS_Z00LD) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.105 Mobile Safari/537.36 last ', 'March 9, 2019, 9:25 pm'),
(1162, 'Admin Account has Login in the system using  Mozilla/5.0 (Linux; U; Android 6.0.1;en_us; Le X520 Build/IEXCNFN5902303111S) AppleWebKit/537.36 (KHTML, like Gecko)Version/4.0 Chrome/49.0.0.0 Mobile Safari/537.36 EUI Browser/1.1.1.18 last ', 'March 10, 2019, 9:40 pm'),
(1163, 'Admin Account has set order to On Delivery Order #6 in the system using  Mozilla/5.0 (Linux; U; Android 6.0.1;en_us; Le X520 Build/IEXCNFN5902303111S) AppleWebKit/537.36 (KHTML, like Gecko)Version/4.0 Chrome/49.0.0.0 Mobile Safari/537.36 EUI Browser/1.1.1.18 last ', 'March 10, 2019, 9:46 pm'),
(1164, 'Admin Account has approved Order #6 in the system using  Mozilla/5.0 (Linux; U; Android 6.0.1;en_us; Le X520 Build/IEXCNFN5902303111S) AppleWebKit/537.36 (KHTML, like Gecko)Version/4.0 Chrome/49.0.0.0 Mobile Safari/537.36 EUI Browser/1.1.1.18 last ', 'March 10, 2019, 9:49 pm'),
(1165, 'Admin Account has add 3 stock of Camelbak Podium Dirt 610ml Bottle in the system using  Mozilla/5.0 (Linux; U; Android 6.0.1;en_us; Le X520 Build/IEXCNFN5902303111S) AppleWebKit/537.36 (KHTML, like Gecko)Version/4.0 Chrome/49.0.0.0 Mobile Safari/537.36 EUI Browser/1.1.1.18 last ', 'March 10, 2019, 9:57 pm'),
(1166, 'Admin Account has Logout in the system using  Mozilla/5.0 (Linux; U; Android 6.0.1;en_us; Le X520 Build/IEXCNFN5902303111S) AppleWebKit/537.36 (KHTML, like Gecko)Version/4.0 Chrome/49.0.0.0 Mobile Safari/537.36 EUI Browser/1.1.1.18 last ', 'March 10, 2019, 10:13 pm'),
(1167, 'Admin Account has Login in the system using  Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.81 Safari/537.36 last ', 'March 11, 2019, 9:35 am'),
(1168, 'Admin Account has set order to On Delivery Order #8 in the system using  Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.81 Safari/537.36 last ', 'March 11, 2019, 9:38 am'),
(1169, 'Admin Account has approved Order #1 in the system using  Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.81 Safari/537.36 last ', 'March 11, 2019, 9:38 am'),
(1170, 'Admin Account has approved Order #8 in the system using  Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.81 Safari/537.36 last ', 'March 11, 2019, 9:39 am'),
(1171, 'Admin Account has return Order #8 in the system using  Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.81 Safari/537.36 last ', 'March 11, 2019, 9:42 am'),
(1172, 'Admin Account has Login in the system using  Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.121 Safari/537.36 last ', 'March 11, 2019, 1:42 pm'),
(1173, 'Admin Account has set order to On Delivery Order #9 in the system using  Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.121 Safari/537.36 last ', 'March 11, 2019, 1:43 pm'),
(1174, 'Admin Account has approved Order #9 in the system using  Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.121 Safari/537.36 last ', 'March 11, 2019, 1:45 pm'),
(1175, 'Admin Account has return Order #9 in the system using  Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.121 Safari/537.36 last ', 'March 11, 2019, 1:45 pm'),
(1176, 'Admin Account has Login in the system using  Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.81 Safari/537.36 last ', 'March 11, 2019, 11:02 pm'),
(1177, 'Admin Account has set order to On Delivery Order #1 in the system using  Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.81 Safari/537.36 last ', 'March 11, 2019, 11:12 pm'),
(1178, 'Admin Account has approved Order #1 in the system using  Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.81 Safari/537.36 last ', 'March 11, 2019, 11:12 pm'),
(1179, 'Admin Account has return Order #1 in the system using  Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.81 Safari/537.36 last ', 'March 11, 2019, 11:13 pm'),
(1180, 'Admin Account has set order to On Delivery Order #2 in the system using  Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.81 Safari/537.36 last ', 'March 11, 2019, 11:19 pm'),
(1181, 'Admin Account has approved Order #2 in the system using  Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.81 Safari/537.36 last ', 'March 11, 2019, 11:19 pm'),
(1182, 'Admin Account has return Order #2 in the system using  Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.81 Safari/537.36 last ', 'March 11, 2019, 11:19 pm'),
(1183, 'Admin Account has Login in the system using  Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.81 Safari/537.36 last ', 'March 12, 2019, 12:25 am'),
(1184, 'Admin Account has Logout in the system using  Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.81 Safari/537.36 last ', 'March 12, 2019, 12:26 am'),
(1185, 'Admin Account has Login in the system using  Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.81 Safari/537.36 last ', 'March 12, 2019, 12:26 am'),
(1186, 'Admin Account has Login in the system using  Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/64.0.3282.140 Safari/537.36 Edge/17.17134 last ', 'March 12, 2019, 12:26 am'),
(1187, 'Admin Account has Login in the system using  Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.121 Safari/537.36 last ', 'March 12, 2019, 5:22 pm'),
(1188, 'Admin Account has set order to On Delivery Order #1 in the system using  Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.121 Safari/537.36 last ', 'March 12, 2019, 5:23 pm'),
(1189, 'Admin Account has move to no receiver of Order #1 in the system using  Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.121 Safari/537.36 last ', 'March 12, 2019, 5:23 pm'),
(1190, 'Admin Account has set order to On Delivery Order #2 in the system using  Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.121 Safari/537.36 last ', 'March 12, 2019, 5:24 pm'),
(1191, 'Admin Account has approved Order #2 in the system using  Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.121 Safari/537.36 last ', 'March 12, 2019, 5:24 pm'),
(1192, 'Admin Account has Login in the system using  Mozilla/5.0 (Linux; Android 7.0; TRT-L21A) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.105 Mobile Safari/537.36 last ', 'March 12, 2019, 9:06 pm'),
(1193, 'Admin Account has mark as read Order #2 in the system using  Mozilla/5.0 (Linux; Android 7.0; TRT-L21A) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.105 Mobile Safari/537.36 last ', 'March 12, 2019, 9:07 pm'),
(1194, 'Admin Account has Login in the system using  Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.81 Safari/537.36 last ', 'March 13, 2019, 2:47 pm'),
(1195, 'Admin Account has mark as read Order #3 in the system using  Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.81 Safari/537.36 last ', 'March 13, 2019, 2:48 pm'),
(1196, 'Admin Account has set order to On Delivery Order #6 in the system using  Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.81 Safari/537.36 last ', 'March 13, 2019, 3:22 pm'),
(1197, 'Admin Account has approved Order #6 in the system using  Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.81 Safari/537.36 last ', 'March 13, 2019, 3:22 pm'),
(1198, 'Admin Account has mark as read Order #6 in the system using  Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.81 Safari/537.36 last ', 'March 13, 2019, 3:24 pm'),
(1199, 'Admin Account has Login in the system using  Mozilla/5.0 (Linux; Android 7.0; TRT-L21A) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.105 Mobile Safari/537.36 last ', 'March 14, 2019, 8:09 pm'),
(1200, 'Admin Account has Login in the system using  Mozilla/5.0 (Linux; Android 7.0; TRT-L21A) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.105 Mobile Safari/537.36 last ', 'March 14, 2019, 8:09 pm'),
(1201, 'Admin Account has Login in the system using  Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.81 Safari/537.36 last ', 'March 15, 2019, 12:14 am'),
(1202, 'Admin Account has set order to On Delivery Order #10 in the system using  Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.81 Safari/537.36 last ', 'March 15, 2019, 12:21 am'),
(1203, 'Admin Account has approved Order #10 in the system using  Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.81 Safari/537.36 last ', 'March 15, 2019, 12:21 am'),
(1204, 'Admin Account has set order to On Delivery Order #3 in the system using  Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.81 Safari/537.36 last ', 'March 15, 2019, 12:22 am'),
(1205, 'Admin Account has Logout in the system using  Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.81 Safari/537.36 last ', 'March 15, 2019, 12:49 am'),
(1206, 'Admin Account has Login in the system using  Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.121 Safari/537.36 last ', 'March 15, 2019, 1:04 pm'),
(1207, 'Admin Account has Login in the system using  Mozilla/5.0 (Linux; Android 5.0.2; ASUS_Z00LD) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.105 Mobile Safari/537.36 last ', 'March 24, 2019, 5:39 pm'),
(1208, 'Admin Account has Logout in the system using  Mozilla/5.0 (Linux; Android 5.0.2; ASUS_Z00LD) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.105 Mobile Safari/537.36 last ', 'March 24, 2019, 5:41 pm'),
(1209, 'Admin Account has Login in the system using  Mozilla/5.0 (Linux; Android 5.0.2; ASUS_Z00LD) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.105 Mobile Safari/537.36 last ', 'April 4, 2019, 11:05 pm'),
(1210, 'Admin Account has added a account of lutianx in the system using  Mozilla/5.0 (Linux; Android 5.0.2; ASUS_Z00LD) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.105 Mobile Safari/537.36 last ', 'April 4, 2019, 11:07 pm'),
(1211, 'Admin Account has Login in the system using  Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.81 Safari/537.36 last ', 'April 5, 2019, 1:39 pm'),
(1212, 'Admin Account has set order to On Delivery Order #16 in the system using  Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.81 Safari/537.36 last ', 'April 5, 2019, 1:41 pm'),
(1213, 'Admin Account has approved Order #16 in the system using  Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.81 Safari/537.36 last ', 'April 5, 2019, 1:42 pm'),
(1214, 'Admin Account has add 5 stock of Bergamont Revox 3.0 2017 in the system using  Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.81 Safari/537.36 last ', 'April 5, 2019, 1:47 pm'),
(1215, 'Admin Account has Login in the system using  Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36 last ', 'April 6, 2019, 2:11 pm'),
(1216, 'Admin Account has set order to On Delivery Order #17 in the system using  Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36 last ', 'April 6, 2019, 2:13 pm'),
(1217, 'Admin Account has approved Order #17 in the system using  Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36 last ', 'April 6, 2019, 2:14 pm'),
(1218, 'Admin Account has mark as read Order #17 in the system using  Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36 last ', 'April 6, 2019, 2:17 pm'),
(1219, 'Admin Account has add 5 stock of Bergamont Bergamonster 20 Girl 2017 in the system using  Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36 last ', 'April 6, 2019, 2:21 pm'),
(1220, 'Admin Account has Logout in the system using  Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36 last ', 'April 6, 2019, 2:33 pm');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `inventory_id` int(11) NOT NULL,
  `product_code` varchar(100) NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`inventory_id`, `product_code`, `stock`) VALUES
(177, '100-61', 0),
(178, 'Ale-62', 0),
(179, 'AMS-82', 0),
(180, 'Att-79', 0),
(183, 'Ber-15', 6),
(184, 'Ber-43', 9),
(185, 'Bla-68', 0),
(186, 'Bla-71', 0),
(187, 'Bla-80', 0),
(188, 'bot-11', 0),
(189, 'Bro-52', 0),
(190, 'BV-8', 0),
(191, 'Cas-63', 0),
(192, 'Cas-64', 0),
(193, 'Che-5', 0),
(194, 'Chi-50', 0),
(195, 'chw-37', 0),
(196, 'Cra-35', 0),
(197, 'Cub-92', 0),
(198, 'Cub-93', 0),
(199, 'Eli-78', 0),
(200, 'Fir-49', 0),
(201, 'Fiz-57', 0),
(202, 'Gia-4', 0),
(203, 'Gir-32', 0),
(204, 'Gt-12', 2),
(205, 'Gt-16', 5),
(206, 'Gt-21', 0),
(207, 'Gt-22', 0),
(208, 'Gt-23', 10),
(209, 'Gt-24', 0),
(210, 'Gt-25', 0),
(211, 'Gt-26', 0),
(212, 'Gt-27', 0),
(213, 'Gt-28', 0),
(214, 'Gt-29', 0),
(215, 'Gt-30', 0),
(216, 'Gt-31', 0),
(217, 'Gt-44', 0),
(218, 'Gt-47', 0),
(219, 'Gt-48', 0),
(220, 'Gt-51', 0),
(221, 'GTC-74', 0),
(222, 'Ita-6', 0),
(223, 'Kas-33', 0),
(224, 'Kas-34', 0),
(225, 'Kok-46', 0),
(226, 'Lap-10', 0),
(227, 'LYC-7', 0),
(228, 'Mav-93', 0),
(229, 'Max-38', 10),
(230, 'Max-65', 10),
(231, 'Msc-17', 10),
(232, 'Msc-18', 10),
(233, 'Msc-19', 10),
(234, 'Msc-20', 10),
(235, 'Msc-73', 10),
(236, 'Par-97', 10),
(237, 'Par-99', 10),
(238, 'Pir-39', 10),
(239, 'Poc-36', 10),
(240, 'Pro-55', 10),
(241, 'Pro-69', 10),
(242, 'Rad-100', 10),
(243, 'Rad-101', 10),
(244, 'Rad-85', 10),
(245, 'Rad-86', 10),
(246, 'Rad-87', 10),
(247, 'Rad-88', 10),
(248, 'Rad-89', 10),
(249, 'Rad-90', 10),
(250, 'Rad-92', 10),
(251, 'Rad-94', 10),
(252, 'Rad-95', 10),
(253, 'Rad-98', 10),
(255, 'Rym-45', 10),
(256, 'Sch-66', 10),
(257, 'Sch-67', 10),
(258, 'Sci-70', 10),
(259, 'Sel-53', 10),
(260, 'Sel-54', 10),
(261, 'Shi-102', 10),
(262, 'Shi-103', 10),
(263, 'Shi-104', 10),
(264, 'Shi-105', 10),
(265, 'Shi-106', 10),
(266, 'Shi-107', 10),
(267, 'Shi-109', 10),
(268, 'Shi-110', 10),
(269, 'Shi-40', 0),
(270, 'Shi-58', 10),
(271, 'Shi-59', 10),
(272, 'Shi-60', 10),
(273, 'Shi-9', 0),
(274, 'Shi-96', 0),
(275, 'Sid-56', 0),
(276, 'Sig-41', 0),
(277, 'Sig-42', 0),
(278, 'Ste-75', 0),
(279, 'Ste-76', 0),
(280, 'Ste-77', 0),
(281, 'Ste-83', 0),
(282, 'Ste-84', 0),
(283, 'Ste-91', 0),
(284, 'Thu-72', 0),
(285, 'Top-92', 0),
(304, 'PHD-110', 0),
(305, 'Shi-111', 10),
(306, 'PHD-112', 0),
(307, 'CUR-113', 0),
(308, 'Shi-114', 0),
(309, 'Shi-115', 10),
(310, 'Shi-116', 10),
(311, 'CUR-117', 0),
(312, 'Shi-118', 10),
(313, 'Shi-119', 0),
(314, 'Shi-120', 10),
(315, 'VCT-121', 0),
(317, 'Shi-123', 10),
(318, 'Shi-124', 10),
(319, 'Shi-125', 0),
(320, 'Shi-126', 0),
(321, 'Shi-127', 0),
(322, 'Cam-128', 10),
(323, 'Cam-129', 10),
(324, 'Cam-130', 10),
(325, 'Cam-131', 10),
(326, 'Cam-132', 10),
(327, 'Shi-133', 5),
(328, 'VCT-134', 10),
(330, 'VCT-136', 0),
(331, 'Shi-136', 0),
(332, 'X-T-136', 0),
(333, 'X-T-135', 0),
(334, 'SH--136', 0),
(335, 'SH--137', 0),
(336, 'RP9-138', 0),
(337, 'SIS-139', 0),
(338, 'Eli-140', 0),
(339, 'RP5-141', 10),
(340, 'Fab-142', 0),
(341, 'Cam-143', 3),
(342, 'Eli-144', 0),
(343, 'JUN-145', 0),
(344, 'Spe-146', 0),
(345, 'JUN-147', 0),
(346, 'Eli-148', 10),
(347, 'JUN-149', 0),
(348, 'Fly-150', 0),
(349, 'Pow-151', 10),
(350, 'BLU-152', 0),
(351, 'BLU-153', 10),
(352, 'Cam-154', 0),
(353, 'SWE-155', 0),
(354, 'RED-156', 0),
(355, 'RED-157', 0),
(356, 'HEL-158', 0),
(357, 'HEL-159', 0),
(358, 'HEL-160', 0),
(359, 'CYC-161', 10),
(360, 'CYC-162', 10),
(361, 'CYC-163', 10),
(362, 'WAT-164', 10),
(363, 'BL--165', 10),
(364, 'Hyd-166', 10),
(365, 'HOL-167', 10),
(366, 'HOL-168', 10),
(367, 'HOL-169', 10),
(368, 'HOL-170', 10),
(369, 'FC--171', 10),
(370, 'BIK-172', 0),
(371, 'BIK-173', 10);

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `notification_id` int(11) NOT NULL,
  `notification_message` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `notification_screenshot` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `notification_username` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `notification_order_no` int(11) NOT NULL,
  `time_frame` timestamp NOT NULL DEFAULT current_timestamp(),
  `notification_type` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `notification_read` varchar(5) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`notification_id`, `notification_message`, `notification_screenshot`, `notification_username`, `notification_order_no`, `time_frame`, `notification_type`, `notification_read`) VALUES
(3, 'sira na pala at puro gasgas', '', 'joshua115662100912991211841', 2, '2019-03-12 09:46:13', 'requestreturn', 'Y'),
(4, 'Follow up product', '', 'joshua115662100912991211841', 3, '2019-03-12 09:52:36', 'followup', 'Y'),
(5, 'Follow up product', '', 'pukla', 5, '2019-03-13 06:57:51', 'followup', 'N'),
(6, 'panget yungnagdala', '', 'pukla', 6, '2019-03-13 07:23:45', 'requestreturn', 'Y'),
(7, 'Follow up product', '', 'pukla', 7, '2019-03-13 07:28:51', 'followup', 'N'),
(9, 'sira yung may ari', '', 'Iron104220169378579813366', 16, '2019-04-05 05:44:04', 'requestreturn', 'N'),
(10, 'Damage', '', 'Iron104220169378579813366', 17, '2019-04-06 06:16:10', 'requestreturn', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_code` varchar(50) NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `product_img` varchar(200) NOT NULL,
  `product_description` varchar(1000) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_price` double NOT NULL,
  `product_discount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_code`, `product_name`, `product_img`, `product_description`, `supplier_id`, `category_id`, `product_price`, `product_discount`) VALUES
('100-61', '100percent Selecteur Barstow Henley', '1482661760100percent-selecteur-barstow-henley.jpg', 'Longsleeve color black', 13, 57, 1320, 39),
('Ale-62', 'Ale Graphics PRR Flowers', '765104766ale-graphics-prr-flowers.jpg', 'Ergonomic Racing Fit\r\n- 3 pockets system with a fourth zippered pocket\r\n- Security Reflex on the back\r\n- Flat seams', 11, 57, 1599, 0),
('AMS-82', 'AMS 100 Super HPC SL 29 Frame', '58878440911351462AMS 100 Super HPC SL 29 Frame.jpg', 'Material: Carbon Super HPC Monocoque Advanced Twin Mold Technology, ARG, ERC, FSP 4-Link, AXH\r\nSeat post: 31.6mm\r\nSeat clamp: 34.9mm\r\nFront deraileur: Direct Mount / cable routing from below\r\nHeadtube', 13, 64, 2670, 70),
('Att-79', 'Attention 27.5 Frame black´n´blue', '520697738935365075Attention 27.5 Frame black´n´blue.jpg', 'Material: Aluminum Lite 6061, AMF, Internal Cable Routing, Easy Mount Kickstand Ready\r\nSeat post: 27.2mm\r\nSeat clamp: 31.8mm\r\nFront deraileur: 31.8mm / cable routing from below\r\nHeadtube diameter: 1 1', 12, 64, 2400, 0),
('Ber-15', 'Bergamont Revox 3.0 2017', '8188075451191039716Bergamont Revox 3.0 2017.jpg', 'Frame : 29\\\' MTB, 6061 alloy super lite tubing, T4/T6 heat treated, 3D-dropout, allround geometry\\r\\nFork : Suntour M3030-A, 29\\\', 1 1/8\\\', 75mm, coil, preload adjust\\r\\nHeadset : BGM Comp,A-Headset, semi in', 13, 73, 13300, 5),
('Ber-43', 'Bergamont Bergamonster 20 Girl 2017', '6946566671551699961bergamont-bergamonster-20-girl-2017.jpg', 'Frame: 20\' Kids, 6061 alloy lite tubing, T4/T6 heat treated, fluid forming, kids geometry\r\n- Fork: BGM 20\' alloy rigid fork\r\n- Headset: BGM, A-Headset, EC34/28.6 | EC 34/30 (1 1/8\')\r\n- Rear Derailleur', 12, 56, 4999, 0),
('BIK-172', 'BIKE MOUNT PLUS™ FOR IPHONE 6/6S', '1054057059BioLogic-BM-Plus-iPhone-6-Portrait-2000w.jpg', 'Fits iPhone 6/6s,\r\n,\r\nHard-shell case protects,\r\nagainst scratches and knocks,\r\nsilicone liner protects from shock,\r\n\r\nSoundPipe™ channels,\r\n in liner redirect audio towards user\r\n\r\nSealed ports for headphones and charge cable', 13, 66, 230, 0),
('BIK-173', 'BIKE MOUNT™ FOR ANDROID™', '10493737322011-BL-photo-BikeMountAndroid-handlebars-WEB.jpg', 'Hard-shell case protects,\\r\\nyour phone against scratches,\\r\\nand knocks\\r\\n\\r\\nTouch-sensitive membrane,\\r\\ngives complete access to applications', 13, 66, 200, 0),
('BL--165', 'BL-M9120', '329956593BL-M9120.jpeg', 'MODEL NO	BL-M9120,\r\nSERIES	XTR M9100 Series,\r\nColor	Series color, -, -,\r\nAverage weight	385 g,\r\nBrake hose (Kit)	SM-BH90-SBM,\r\nBrake hose color (Kit)	Black, -,\r\nBrake Type	Hydraulic disc brake,\r\nClamp band_Open clamp band	X,\r\nCompatible shifting lever mount_I-SPEC EV	X,\r\nFree stroke adjust	X,\r\nFunnel bleeding	X,\r\nHose joint	Straight,\r\nJ-kit option available	X,\r\nLever size (Finger)	2,\r\nOil	SHIMANO Mineral,\r\nReach adjust_Toolless	X,\r\nRecommended brake caliper	BR-M9120,\r\nServo wave mechanism	X,\r\nCompatible shifting lever mount_Clamp band	X,', 14, 75, 180, 0),
('Bla-68', 'Blackburn Outpost Seat Pack Drybag', '1677800972blackburn-outpost-seat-pack-drybag.jpg', 'Volume: 11L / 671 cu in\r\n- Weight: 150g / .33lbs', 15, 60, 399, 0),
('Bla-71', 'Blackburn Local Plus Tube', '1882703259blackburn-local-plus-tube.jpg', 'Choice of 2 different size straps to accommodate a wide variety of frame types. Designed for usage on the top tube, use it either towards the headtube or your seatpost depending on your preference and', 11, 60, 1000, 0),
('Bla-80', 'Black Sin 26 Frame black blue', '16587807082043470878Black Sin 26 Frame black blue.jpg', 'Material: Carbon\r\nSeat post: 27.2mm\r\nSeat clamp: 31.8mm\r\nFront deraileur: 34.9mm (High Clamp Down-Swing) / cable routing from below\r\nHeadtube diameter: Tapered 1 1/8&quot; - 1 1/2&quot; integrated IS4', 15, 64, 2300, 0),
('BLU-152', 'BLUE ELF 2.0', '970446968Trinx-Blue-Elf-2.0.png', 'Frame	Hi-Ten Steel Lady,\r\nSizes	8&quot;,\r\nColors	Red/Black Green?Orange/Grey Yellow?Green/Grey Blue,\r\nFork	TRINX Hi-Ten Steel,\r\nCassette	18T,\r\nChain	Hi-Ten Steel,\r\nBrake	Steel Caliper,\r\nWheel Size	16,\r\nRims	Trinx Steel,\r\nTires	16,\r\nHubs	Trinx,\r\nPedals	Feimin Child,\r\nSaddle	Trinx Child,\r\nHandlebar	Trinx Steel Rise,', 14, 56, 3999, 0),
('BLU-153', 'BLUE ELF 1.0', '1592277639Trinx-Blue-Elf-1.0.png', 'Frame	Hi-Ten Steel Lady,\r\nSizes	8&quot;,\r\nColors	Yellow/Purple Grey?Blue/Rosy Blue?Green/Blue Green,\r\nFork	TRINX Hi-Ten Steel,\r\nCassette	18T,\r\nChain	Hi-Ten Steel,\r\nBrake	Steel Caliper,\r\nWheel Size	14,\r\nRims	Trinx Steel,\r\nTires	14,\r\nHubs	Trinx,\r\nPedals	Feimin Child,\r\nSaddle	Trinx Child,\r\nHandlebar	Trinx Steel Rise,', 14, 56, 3459, 0),
('bot-11', 'bottom bracket parts', '16542690821263558919bottom bracket parts Set IN 26 117.5 shimano.jpg', 'bottom bracket parts Set IN 26 117.5 shimano', 12, 72, 300, 0),
('Bro-52', 'Brooks england Cambium C15 All Weather', '1501716661brooks-england-cambium-c15-all-weather.jpg', 'Length: 283 mm\\r\\n- Width: 140 mm\\r\\n- Height: 52 mm\\r\\n- Weight: 395 g\\r\\n- Frame: Steel', 14, 63, 160, 0),
('BV-8', 'BV Bicycle Handlebar', '7527554751635608618202641857BV Bicycle Handlebar Grips, Double Lock-on Soft Rubber Handle Bar End Holding Locking Grips, for MTB, BMX, Mountain, Downhill, Folding Bike (Out).jpg', 'BV Bicycle Handlebar Grips, Double Lock-on Soft Rubber Handle Bar End Holding Locking Grips, for MTB, BMX, Mountain, Downhill, Folding Bike (Out)', 13, 72, 250, 0),
('Cam-128', 'Campagnolo Chorus Ergopower', '643856009campagnolo-chorus-ergopower.jpg', 'ULTRA-SHIFT? ERGONOMICS,\r\nNEW VARI-CUSHION? BRAKE LEVER HOODS WITH VARIABLE DENSITY AND SURFACE FINISHES,\r\nULTRA-SHIFT? MECHANISM WITH DIFFERENTIATED MAXIMUM NUMBER OF UPSHIFTING CLICKS DEPENDING ON THE STARTING SPROCKET,BRAKE LEVER HOODS AND CABLE HOUSING ARE AVAILABLE AS SPARE PARTS IN RED AND WHITE,\r\nDERAILLEUR CABLE ADJUSTING BARREL,', 14, 75, 4063, 0),
('Cam-129', 'Campagnolo Veloce 10s Ergopower Road Lever Set', '2073570850campagnolo-veloce-10s-ergopower-road-lever-set.jpg', 'POWER-SHIFT™ MECHANISM,\r\nULTRA-SHIFT™ ERGONOMICS,\r\nVARI-CUSHION™ HOOD,\r\nDOUBLE CURVATURE BRAKE LEVER', 14, 75, 355, 0),
('Cam-130', 'Campagnolo Powershift Ergo Brake Lever Hoods', '334916137campagnolo-powershift-ergo-brake-lever-hoods.jpg', 'Recommended use Road cycling,\r\nProduct Type Levers,\r\nFeatures Shifters and brakes', 14, 75, 349, 0),
('Cam-131', 'Campagnolo Record Left', '1307254275campagnolo-record-left.jpg', 'Recommended use Road cycling,\\r\\nProduct Type Levers,\\r\\nFeatures Shifters and brakes', 14, 75, 326, 0),
('Cam-132', 'Campagnolo Centaur Pair', '474367949campagnolo-centaur-pair.jpg', 'Features:,\r\n\r\n- Redesigned right Power-Shift? mechanism,\r\n- Multiple upshifting (up to 3 gears),\r\n- Ergonomic downshift lever position,\r\n- New lip introduced on the Ergopower? body,\r\n- Geometry specifically designed to optimize command/ handlebar interface ,', 14, 67, 1489, 0),
('Cam-143', 'Camelbak Podium Dirt 610ml Bottle', '264895657camelbak-podium-dirt-610ml-bottle-black-EV317488-8500-1.jpg', 'Construction	BPA, BPS &amp; BPF free Trutaste™ Polypropylene with Hydroguard™,\r\nCapacity	610ml,\r\nLid Type	Self-sealing Jet-Valve - Removable,\r\nExtra Features	- Lockout leak proof design,\r\n- Mud Cap,', 11, 59, 320, 0),
('Cam-154', 'Camelbak Podium Ice 610ml Bottle', '67236249camelbak-podium-ice-610ml-bottle-white-EV288341-9000-1.jpg', 'Materials	BPA-Free TruTaste™, Polypropylene. Bite Valve, Material: The Jet Valve™ is made from medical grade, self-sealing silicone\r\nCapacity	610ml\r\nDimensions	7.4cm (W) x 7.4cm (D) x 26.5cm (H)\r\nLid Type	JetValve™ delivers high water flow effortlessly and seals shut automatically \r\nRemoveable nozzle for easy cleaning\r\nWeight	163g / 5.7oz,', 11, 59, 250, 0),
('Cas-63', 'Castelli Aero Race Full Zip', '1736326199castelli-aero-race-full-zip.jpg', 'Women?s-specific version of the Aero Race 5.1 Jersey\r\n- Velocity dimpled fabric on front\r\n- 3D mesh on back to prevent overheating\r\n- Air Mesh arm bands', 11, 57, 1899, 0),
('Cas-64', 'Castelli Climber´S', '875452040castelli-climbers.jpg', 'StradaPro 3D fabric on back provides support to pockets and UPF 16 protection\r\n- 75 g/m2 Flusso 3D fabric on front and shoulders keeps the jersey light and dry\r\n- Internal bustier eliminates problems ', 13, 57, 2099, 0),
('Che-5', 'Cheap riding clothes', '9721182921532138283Cheap riding clothes, Buy Quality cycling jersey short sleeve directly from China jersey short sleeve Suppliers  Cycling Jersey Short Sleeve Pro Teams.jpg', 'Cheap riding clothes, Buy Quality cycling jersey short sleeve directly from China jersey short sleeve Suppliers  Cycling Jersey Short Sleeve Pro Teams', 11, 57, 650, 0),
('Chi-50', 'Chillafish BMXie-RS', '1499773492chillafish-bmxie-rs.jpg', 'lightweight BMX-styled balance bike\r\n- seat adjustable without tools (height from 32cm to 39cm)\r\n- front number plate detachable\r\n- includes decal set for cool customization', 12, 56, 3499, 0),
('chw-37', 'chwalbe Magic Mary HS447 Folding TLE Apex Soft', '492350985schwalbe-magic-mary-hs447-folding-tle-apex-soft.jpg', 'The perfect choice for virtually any track. \r\n- Intermediate tread: maximum braking traction and cornering grip even in extremely muddy terrain thanks to strong shoulder studs and,\r\n- the aggressive, ', 11, 69, 230, 0),
('Cra-35', 'Cratoni C Maniac', '752786171cratoni-c-maniac.jpg', '14 ventilation holes\r\n- Detachable visor \r\n- Chin guard removable with a simple slide mechanism \r\n- Reflectors for better visibility \r\n- Triple height-adjustable\r\n- Strap dividers for easy handling\r\n-', 13, 61, 650, 0),
('Cub-92', 'Cube Stereo 140 C:68 SLT Di2 27.5 Frame zeroblack', '3802349621128233458Stereo 140 C68 SLT Di2 25 Frame zeroblack.jpg', 'Material: Carbon C:68 Monocoque Advanced Twin Mold Technology, ATG, ETC 4-Link, Internal Cable Routing Di2\r\nSeat post: 31.6mm\r\nSeat clamp: 34.9mm\r\nFront deraileur: Direct Mount Di2\r\nHeadtube diameter:', 12, 64, 3420, 0),
('Cub-93', 'Cube Stereo 140 HPA SL 27.5 Frame blue´n´green', '1584624150Stereo 140 HPA SL 27.5 Frame blue´n´green.jpg', 'Material: Aluminum HPA Ultralight, Advanced Hydroform, Triple Butted, ETC 4-Link, ISCG Mount, AXH\r\nSeat post: 31.6mm\r\nSeat clamp: 34.9mm\r\nFront deraileur: Direct Mount / cable routing from below\r\nHead', 13, 64, 2360, 0),
('CUR-113', 'CUR S2300 ELITE', '373891632CUR.png', 'Color : Matt Grey Black/Grey Red, Matt Grey Black/Grey Blue\r\n    Frame : T800 Carbon 27.5&quot;*17&quot;/19&quot;\r\n    Fork : Rockshox SID RL 27.5&quot;, 100 MM, Remote Lock-Out\r\n    Shifter : SRAM TS', 17, 73, 10495, 0),
('CUR-117', 'CUR S1600 ELITE', '2062811981CUR 1600 ELITE.png', 'Color : Matt Black/Blue White, Matt Black/Red White,\\r\\nFrame : TRINX T700 Carbon 27.5&quot;*16&quot;/18&quot;,\\r\\nFork : Rockshox RCNS RL R27.5,\\r\\nShifter : SRAM SL GX EAGLE TRIGGER,\\r\\nFd : -,\\r\\nRd : SRAM RD GX EAGLE,\\r\\nCassett : SRAM CS XG 1275 EAGLE 10-50T,\\r\\nChain : SRAM CN GX EAGLE 12S,\\r\\nBrake : SRAM DB GDRE 160MM,\\r\\nWheel Set : DT X 1900 SPLINE TLC 27.5&quot;,\\r\\nTyre : MAXXIS CROSSMARK 27.5&quot;*2.10&quot;, 60TPI,\\r\\nChainwheel : SRAM FC DESC 6K EAGLE GXP 170L 34T,\\r\\nHub : -,\\r\\nSaddle : SR Cover, Sport,\\r\\nSeatpost: TRINX Carbon,\\r\\nStem : TRINX Carbon,\\r\\nHandlebar : TRINX T700 Carbon Flat', 17, 73, 13700, 0),
('CYC-161', 'CYCLING SUIT TF 17', '1089129109cycling suit tf17.png', 'Material : Upper Garment: 100% basic yarn; Italian elastic fabric, YKK zip. Pants: dacron and spandex, coolmax mat, Italian elastic fabric.,\r\nColor : Grey/Black; Blue/Black,\r\nSize : S--XXXL,\r\nOthers : YKK zip,', 17, 57, 1600, 0),
('CYC-162', 'CYCLING SUIT TF 18', '681033480cycling suit tf18.png', 'Material : Upper Garment: 100% basic yarn; Italian elastic fabric, YKK zip. Pants: dacron and spandex, coolmax mat, Italian elastic fabric.,\r\nColor : Red/Black/White,\r\nSize : S--XXXL,\r\nOthers : YKK zip,', 17, 57, 1599, 0),
('CYC-163', 'CYCLING SUIT TF30', '646483524cycling suit tf30.png', 'Material : Upper Garment: breathable elastic fabric; Pants: windproof and waterproof fabric.,\r\nColor : Blue/Black/Yellow,\r\nSize : S--XXXL,', 17, 57, 1899, 0),
('Eli-140', 'Elite Fly Bottle - 750 ml', '466664387elite-fly-bottle-750-ml-black-EV337405-8500-1.jpg', 'Material	Odorless, soft and durable plastic material,\r\nConstruction	100% BPA Free,\r\nCapacity	750ml,\r\nDimensions	7.4cm Diameter, \r\nLid Type	Push-pull soft valve for maximum ergonomics and ease of opening and closing while cycling,\r\nNotes	- Maximum liquid temperature 40°C,\r\n- Dishwasher Safe,', 11, 59, 250, 0),
('Eli-144', 'Elite Ombra Bottle - 950ml', '168763584elite-ombra-bottle-950ml-clear-red-EV305658-3330-1.jpg', 'Capacity	950ml,\r\nLid Type	Cap- Oversized nozzle that is taste-free,\r\nCompatibility	Will fit any standard 76 mm cage,\r\nExtra Features	100% BPA free and Dishwasher safe,', 11, 59, 350, 0),
('Eli-148', 'Elite Crystal Ombra Bottle - 550ml', '683889675elite-crystal-ombra-bottle-550ml-grey-blue-EV305655-7050-1.jpg', 'Material	Crystal clear K-resin,\r\nCapacity	550ml,\r\nLid Type	Cap features an oversized nozzle that is taste-free,\r\nCompatibility	Will fit any standard 76 mm cage,\r\nExtra Features	100% BPA free and Dishwasher safe,', 11, 59, 350, 0),
('Eli-78', 'Elite C:62 Pro 29 Side-Swing Frame', '19361307871866017156Elite C2 Pro 29 Side-Swing Frame.jpg', 'Material: Carbon C:62 Monocoque Advanced Twin Mold Technology, ARG2, Tapered Headtube, PressFit BB, X12, Integrated Cable Routing\r\nSeat post: 27.2mm\r\nSeat clamp: 31.8mm\r\nFront deraileur: Direct Mount', 12, 64, 2100, 0),
('Fab-142', 'Fabric Gripper Bottle', '868697582fabric-gripper-bottle-black-EV333431-8500-1.jpg', 'Material	BPA Free plastic,\r\nConstruction	Valve: High flow,\r\nMaterial: BPA free,\r\nTexture: Integrated non-slip,\r\nCapacity	600ml,\r\nor\r\n750ml,\r\nLid Type	Screw top lid,\r\nMounting	Standard bottle cage mounting,\r\nExtra Features	Soft squeezable body,', 11, 59, 300, 0),
('FC--171', 'FC-M985', '1317139301FC-M985.jpeg', 'MODEL NO	FC-M985,\r\nSERIES	SHIMANO XTR M980 Series,\r\nColor	Series color,\r\nAverage weight	647.7g (44-30T)631.1g (42-30T)623.6g (40-28T),\r\nBike Type	MTB,\r\nArm adapter	X,\r\nChain line (mm)	48.8,\r\nChain ring combination	44,\r\nCompatible BB type_Outboard	X,\r\nCompatible chain	HG-X 10-speed,\r\nCrank arm length (mm)_170.0	X,\r\nCrank arm length (mm)_172.5	X,\r\nCrank arm length (mm)_175.0	X,\r\nCrank arm length (mm)_180.0	X,\r\nGear arms	4,\r\nOptional chain guard_Without chain / bash guard	X,\r\nP.C.D. (mm)	88,\r\nRear speeds	10,\r\nRecommended BB_Pressfit	SM-BB94-41A,\r\nRecommended BB_Threaded (E-type)	SM-BB93,\r\nRecommended BB_Threaded (normal)	SM-BB93,\r\nThreaded BB shell width_68mm	X,\r\nThreaded BB shell width_73mm	X,\r\nCrank arm fixing bolt_With	X,\r\nQ-factor (mm)	162,', 14, 76, 729, 0),
('Fir-49', 'First bike Street With Brake', '1173236592first-bike-street-with-brake.jpg', 'Height:12 In (With Lowkit?). Maximum Seat Height:17.5 In.', 11, 56, 7000, 0),
('Fiz-57', 'Fizik R5B', '1123850291fizik-r5b.jpg', 'Materials: Microtex/Reflective Heel Cap\r\n- Outsole: Carbon Reinforced Nylon\r\n- Closure System: Boa IP1-A\r\n- Insole: fizi:k Cycling Insole\r\n- Weight: 260 gr', 11, 58, 1299, 0),
('Fly-150', 'Flynt BT.750 Water Bottle 750ml', '1195271417flynt-bt750-water-bottle-750ml-na-EV304548-9999-1.jpg', 'Material	BPA free\r\nDishwasher safe\r\nRecyclable\r\nCapacity	750ml\r\nLid Type	- Hygiene lock membrane lid\r\n- Twist lock closure\r\nExtra Features	5 year guarantee', 11, 59, 321, 0),
('Gia-4', 'Giant Bag Saddle', '8187021842002720357bag giant saddle.jpg', 'Giant Bag Saddle', 13, 60, 349, 0),
('Gir-32', 'Giro Atmos Ii', '32661685giro-atmos-ii.jpg', 'Featherweight webbing with Slimline buckle. \r\nRoll Cage Internal Reinforcement \r\nSpecifications: \r\nWeight 280g', 13, 61, 349, 0),
('Gt-12', 'Gt Avalanche Elite 27.5', '362178078106701062Gt Avalanche Elite 27.5.jpg', 'FRAME All New 6061 T6 aluminum Frame w/ Triple Triangle, Replaceable , Derailleur Hanger, Disc Brake Mounts, and Zerostack tapered 1 1/8-1 1/2 Head Tube, 27.5/29 Design', 13, 73, 12499, 0),
('Gt-16', 'Gt Palomar Alu 27.5', '16880219882005384073Gt Palomar Alu 27.5.jpg', 'a FRAME 6061-T6 Aluminum Triple Triangle Frame, w/ Replaceable Derailleur Hanger, and 1 1/8 Head Tube\r\n27.5 Design\r\nb Fork All Terra CH-525 HLO, 29mm stantions, alloy lower legs 80mm travel', 13, 73, 12000, 0),
('Gt-21', 'Gt Zaskar Carbon Comp 29', '62720070331069085Gt Zaskar Carbon Comp 29.jpg', 'Frame : F.O.C Carbon Frame, Triple Triangle Frame Construction, F.O.C. BB92 Shell, 12x148mm Thru Axle Dropouts, and 1 1/8&quot; to 1 1/2&quot; Tapered Head Tube\r\nFork : RockShox NEW Recon Gold TK 27.5', 11, 73, 14499, 0),
('Gt-22', 'Gt Aggressor Expert 27.5', '1582125164gt-aggressor-expert-27.5.jpg', 'Frame : &quot;NEW 6061-T6 Aluminum Triple Triangle Frame, w/ Replaceable Derailleur Hanger, Disc brake Mounts, and 1 1/8&quot;\r\nHead Tube27.5 DESIGN&quot;\r\nFork : SR Suntour XCT HLO w/ 80mm Travel, QR', 11, 73, 13999, 0),
('Gt-23', 'Gt Avalanche Elite 29', '458661813gt-avalanche-elite-29.jpg', 'FRAME All New 6061 T6 Aluminum Frame, w/ Triple Triangle, Replaceable Derailleur Hanger, Disc Brake Mounts, and Zerostack tapered 1 1/8-1 1/2 Head Tube, 27.5/29 Design\r\nFORK SR Suntour XCR 32 Air RLR', 12, 73, 15000, 0),
('Gt-24', 'Gt Transeo Elite M', '1607044300gt-transeo-elite-m.jpg', 'FRAME GT Transeo Triple Triangle 6061 series allo, smooth welded, and hydroformed (TT,DT), forged drop-outs, chainstay disc mounts, all utility braze ons\r\nFORK SR Suntour NVX-DS HLO 75mm travel, pre-l', 12, 73, 16000, 0),
('Gt-25', 'Gt Zaskar Alu Elite 29', '289843382gt-zaskar-alu-elite-29.jpg', 'FRAME GT Speed Metal, Triple Triangle Double Butted Frame Construction, w/ Post Mount Disc Brake, Replaceable Derailleur Hanger, Forged BB,HT,Dropouts, Tapered 1 1/8&quot; to 1 1/2&quot; HT, 27.5/29&amp;q', 12, 73, 15499, 0),
('Gt-26', 'Gt Zaskar Carbon Expert 29', '275881526gt-zaskar-carbon-expert-29.jpg', 'FRAME F.O.C Carbon Frame, Triple Triangle Frame Construction, F.O.C. BB92 Shell, 12x148mm Thru Axle Dropouts, and 1 1/8&quot; to 1 1/2&quot; Tapered Head Tube, w/ 29 Specific Geometry, Boost 148 rear', 12, 73, 18199, 0),
('Gt-27', 'Gt Zaskar Alu Comp 27.5', '11397742731740158388gt-zaskar-alu-comp-27.5 (1).jpg', 'FRAME GT Speed Metal, Triple Triangle Double Butted Frame Construction, w/ Post Mount Disc Brake, Replaceable Derailleur Hanger, Forged BB, HT, Dropouts, Tapered 1 1/8&quot; to 1 1/2&quot; HT, 27.5/29', 13, 73, 14999, 0),
('Gt-28', 'GT 18 Pantera Sport 27.5+', '1752697253gt-gt-18-pantera-sport-27.5-.jpg', 'FRAME : All New 6061 T6 Aluminum Frame, w/ Triple Triangle?, Replaceable Derailleur Hanger, Disc Brake Mounts, and Zerostack tapered 1 1/8-1 1/2 Head Tube, 27.5+ Design', 12, 73, 17399, 0),
('Gt-29', 'Gt Stomper 24 Ace', '787641114gt-stomper-24-ace.jpg', 'FRAME 24 GT LEgitFit Design, Alloy w Replaceable Hanger.\r\nFORK All Terra, 50mm Travel, 1-18 Threadless Steerer.\r\nChain KMC Z50.\r\nCRANK Prowheel w DOuble Guard, 30T, 130mm', 13, 73, 12500, 0),
('Gt-30', 'Gt Avalanche Sport 29', '1910578195gt-avalanche-sport-29.jpg', 'FRAME All New 6061 T6 Aluminum Frame, w/ Triple Triangle, Replaceable Derailleur Hanger, Disc Bake Mounts, and Zerostack tapered 1 1/8-1 1/2Head Tube, 27.5/29 Design', 11, 73, 16499, 0),
('Gt-31', 'Gt Transeo Comp U', '1652377287gt-transeo-comp-u.jpg', 'FRAME GT Transeo Triple Triangle 6061 series alloy, smooth welded, and hydroformed (TT.DT), forged drop-outs, chainstay disc mounts, all utility braze ons', 13, 73, 12999, 0),
('Gt-44', 'GT 18 Siren', '147245693gt-gt-18-siren-freewheel-girl.jpg', 'FRAME: 20&quot; GT LegitFit Design, Alloy\r\n- FORK: GT Hi-Ten Steel, 1&quot; Threaded Steerer\r\n- CHAIN: KMC Z410A, 1/2&quot; x 1/8&quot;\r\n- CRANK: Forged One-Piece Type, 127mm, 32T\r\n- BOTTOM BRACKET: S', 13, 56, 1500, 0),
('Gt-47', 'GT 18 Vamoose Balance', '1109349894gt-gt-18-vamoose-balance.jpg', 'FRAME: 16&quot; GT LegitFit Design, Hi-Ten Steel\r\n- FORK: GT Hi-Ten Steel, 1&quot; Threaded Steerer\r\n- RIMS: Alloy, 20 hole\r\n- WHEELS TIRES: GT 16 x 1.95&quot; (F/R)\r\n- FRONT HUB: (F) Steel, 20 Hole,', 13, 56, 1450, 0),
('Gt-48', 'GT 18 Outbound Prime', '121719169gt-gt-18-outbound-prime.jpg', 'FRAME: 20&quot; GT LegitFit Design, Alloy w/ Replaceable Hanger\r\n- FORK: GT Hi-Ten Steel, 1-1/8&quot; Threadless Steerer\r\n- CHAIN: KMC Z50\r\n- CRANK: Prowheel w/ Double Guard, 30T, 110mm', 11, 56, 2099, 0),
('Gt-51', 'GT 18 Grunge Coaster', '487095078gt-gt-18-grunge-coaster.jpg', 'FRAME: 20&quot; GT LegitFit Design, Alloy\r\n- FORK: GT Hi-Ten Steel, 1&quot; Threaded Steerer\r\n- CHAIN: KMC Z410A, 1/2&quot; x 1/8&quot;\r\n- CRANK: Forged One-Piece Type, 127mm', 13, 56, 1999, 0),
('GTC-74', 'GTC Pro 29 Side-Swing Frame', '1681775403335721_2967148.jpg', 'Material: Carbon GTC Twin Mold Monocoque Technology, ARG2, Tapered Headtube, PressFit BB, X12, Integrated Cable Routing\r\nSeat post: 27.2mm\r\nSeat clamp: 31.8mm\r\nFront deraileur: Direct Mount Side-Swing', 12, 64, 1559, 0),
('HEL-158', 'HELMET TT 05', '1481222963helmet tt 05.png', 'Material : PC and American EPS,\r\nColor : Black/white;blue/white;red/white;yellow/white;white/black,\r\nOhters : Helmet for road bike riding,with aerodynamics design,', 17, 61, 249, 0),
('HEL-159', 'HELMET TT 06', '716405090HELMET TT 06.png', 'Material : PC and American EPS,\r\nColor:Black/white;Blue/White;Red/White;Yellow/White;White/Black,\r\nSize : Free,\r\nOhters : Helmet for road bike riding,with aerodynamics design,', 17, 61, 349, 0),
('HEL-160', 'HELMET TT 07', '1275702066HELMET TT 07.png', 'Material : PC and American EPS,\r\nColor : Matt( bright) Black/Blue; Matt( bright)Black/Red; Bright Black/Green; Matt Grey/Green,\r\nSize : M?L,', 17, 61, 499, 0),
('HOL-167', 'HOLLOWTECH ll Crankset FC-M9120-B2', '2026213418FC-M9120-B2.jpeg', 'FC-M9120-B2,\r\nSERIES	XTR M9100 Series,\r\nColor	Series color, -,\r\nAverage weight	616 g,\r\nChain line (mm)	51.8,\r\nChain ring combination	38-28T,\r\nCompatible BB type_Outboard	X,\r\nCompatible chain	CN-M9100,\r\nCrank fixing bolt included	X,\r\nCrank arm length (mm)_165.0	X,\r\nCrank arm length (mm)_170.0	X,\r\nCrank arm length (mm)_175.0	X,\r\nGear arms	4 arm,\r\nHOLLOWTECH II	X,\r\nOptional chain guard_Without chain / bash guard	X,\r\nP.C.D. (mm)	Direct,\r\nRear speeds	12,\r\nRecommended BB_Pressfit	SM-BB94-41A,\r\nRecommended BB_Threaded (normal)	SM-BB93,\r\nThreaded BB shell width_68mm	X,\r\nThreaded BB shell width_73mm	X,\r\nQ-factor (mm)	168,', 14, 76, 399, 0),
('HOL-168', 'HOLLOWTECH II Crankset FC-M9120-1', '1589031805FC-M9120-B2.jpeg', 'MODEL NO	FC-M9120-1,\r\nSERIES	XTR M9100 Series,\r\nColor	Series color, -,\r\nAverage weight	558 g (38T) 550 g (36T) 539 g (34T) 534 g (32T) 535 g (30T),\r\nChain line (mm)	52,\r\nChain ring combination	30, 32, 34, 36, 38T,\r\nCompatible BB type_Outboard	X,\r\nCompatible chain	CN-M9100,\r\nCrank fixing bolt included	X,\r\nCrank arm length (mm)_165.0	X,\r\nCrank arm length (mm)_170.0	X,\r\nCrank arm length (mm)_175.0	X,\r\nGear arms	4 arm,\r\nHOLLOWTECH II	X,\r\nOptional chain guard_Without chain / bash guard	X,\r\nP.C.D. (mm)	Direct,\r\nRear speeds	11 (Wide flange) / 12,\r\nRecommended BB_Pressfit	SM-BB94-41A,\r\nRecommended BB_Threaded (normal)	SM-BB93,\r\nThreaded BB shell width_68mm	X,\r\nThreaded BB shell width_73mm	X,\r\nQ-factor (mm)	168,', 14, 76, 419, 0),
('HOL-169', 'HOLLOWTECH ll Crankset FC-M9100-2', '498741768FC-M9100-2.jpeg', 'MODEL NO	FC-M9100-2,\r\nSERIES	XTR M9100 Series,\r\nColor	Series color, -,\r\nAverage weight	597 g,\r\nChain line (mm)	48.8,\r\nChain ring combination	38-28T,\r\nCompatible BB type_Outboard	X,\r\nCompatible chain	CN-M9100,\r\nCrank fixing bolt included	X,\r\nCrank arm length (mm)_165.0	X,\r\nCrank arm length (mm)_170.0	X,\r\nCrank arm length (mm)_175.0	X,\r\nGear arms	4 arm,\r\nHOLLOWTECH II	X,\r\nOptional chain guard_Without chain / bash guard	X,\r\nP.C.D. (mm)	Direct,\r\nRear speeds	12,\r\nRecommended BB_Pressfit	SM-BB94-41A,\r\nRecommended BB_Threaded (normal)	SM-BB93,\r\nThreaded BB shell width_68mm	X,\r\nThreaded BB shell width_73mm	X,\r\nQ-factor (mm)	162,', 14, 76, 499, 0),
('HOL-170', 'HOLLOWTECH ll Crankset (3/2/1x11-speed) FC-M9020-2', '960704892FC-M9020-2.jpeg', 'MODEL NO	FC-M9020-2,\r\nSERIES	SHIMANO XTR M9000 Series,\r\nColor	Series color, -,\r\nAverage weight	667 g (38-28T) 649 g (36-26T) 629 g (34-24T),\r\nChain line (mm)	48.8,\r\nChain ring combination	38-28T 36-26T 34-24T,\r\nCompatible BB type_Outboard	X,\r\nCompatible chain	HG-X11,\r\nCrank fixing bolt included	X,\r\nCrank arm length (mm)_165.0	X,\r\nCrank arm length (mm)_170.0	X,\r\nCrank arm length (mm)_175.0	X,\r\nCrank arm length (mm)_180.0	X,\r\nGear arms	4 arm ***,\r\nHOLLOWGLIDE	X,\r\nHOLLOWTECH II	X,\r\nOptional chain guard_Without chain / bash guard	X,\r\nP.C.D. (mm)	96/64,\r\nRear speeds	11,\r\nRecommended BB_Pressfit	SM-BB94-41A,\r\nRecommended BB_Threaded (normal)	SM-BB93,\r\nThreaded BB shell width_68mm	X,\r\nThreaded BB shell width_73mm	X,\r\nCrank arm fixing bolt_With	X,\r\nQ-factor (mm)	168,', 14, 76, 649, 0),
('Hyd-166', 'Hydraulic Disc Brake Lever for XC Race BL -M9000', '828478100Hydraulic Disc Brake Lever for XC Race.jpeg', 'BL-M9000,\r\nSERIES	SHIMANO XTR M9000 Series,\r\nColor	Series color, -, -,\r\nAverage weight	316 g,\r\nBrake hose (Kit)	SM-BH90-SBM,\r\nBrake hose color (Kit)	Black, -,\r\nBrake Type	Hydraulic disc brake,\r\nClamp band_Open clamp band	X,\r\nFunnel bleeding	X,\r\nHose joint	Straight,\r\nJ-kit option available	X,\r\nLever size (Finger)	2,\r\nOil	SHIMANO Mineral,\r\nReach adjust_Tool	X,\r\nRecommended brake caliper	BR-M9000,\r\nCompatible shifting lever mount_Clamp band	X,\r\nCompatible shifting lever mount_I-SPEC II	X,', 14, 75, 249, 0),
('Ita-6', 'Italy summer sleeves', '6247325361135741883Italy Summer Short Sleeves D\'ITALIA Team Cycling Jersey Quick Dry Pro Bike Wear Breathable.jpg', 'Italy Summer Short Sleeves D\'ITALIA Team Cycling Jersey Quick Dry Pro Bike Wear Breathable', 11, 57, 800, 0),
('JUN-145', 'JUNIOR 4.0', '907633123Trinx-Junior-4.0.png', 'Frame	Alloy Special-Shaped Tubes,\r\nSizes	11&quot;,\r\nColors	Black/Red Grey?Grey/Green Blue?Blue/Orange Blue?Green/White Black,\r\nFork	Trinx Suspension,\r\nTravel	30mm\r\nDrivetrain,\r\nShifter	Shimano ST-EF41,\r\nFront Derailleur	Trinx FD-QD35,\r\nRear Derailleur	Shimano RD-TY21,\r\nCassette	Trinx 14-28T,\r\nChain	Hi-Ten Steel,\r\nBrake	Alloy Mechanical Disc,\r\nChainwheel	24/34/42T*152L,\r\nWheel Size	20,\r\nRims	Trinx Alloy,\r\nTires	20&quot;*2.125&quot;,\r\nHubs	Trinx,\r\nPedals	Feimin Child,\r\nSaddle	Trinx Child,\r\nHandlebar	Trinx Small Rise,', 17, 56, 4599, 0),
('JUN-147', 'JUNIOR 3.0', '1235998097Trinx-Junior-3.0-600x600.png', 'Frame	Alloy Special-Shaped Tubes,\r\nSizes	11&quot;,\r\nColors	Black/Green Yellow?Green/Grey Blue?Red/Black Grey?Blue/Black Red,\r\nFork	Trinx Suspension,\r\nTravel	30mm,\r\nShifter	Shimano SL-RS35,\r\nRear Derailleur	Shimano RD-TY21,\r\nCassette	Trinx 14-28T,\r\nChain	Hi-Ten Steel,\r\nBrake	Trinx V-Brake,\r\nChainwheel	1/2*3/32,\r\nWheel Size	20,\r\nRims	Trinx Alloy,\r\nTires	20,\r\nHubs	Trinx Alloy,\r\nPedals	Feimin Child,\r\nSaddle	Trinx Child,\r\nHandlebar	Trinx Small Rise,', 14, 56, 5249, 0),
('JUN-149', 'JUNIOR 1.0', '1599153582Trinx-Junior-1.0.png', 'Frame	Alloy Special-Shaped Tubes,\r\nSizes	11&quot;,\r\nColors	Blue/White Orange?Green/White Blue?Purple/White Rosy?White/Orange Blue?Red/Black Blue?Black/White Red,\r\nFork	Trinx Suspension,\r\nTravel	30mm,\r\nShifter	Trinx FT-N372,\r\nRear Derailleur	Trinx RD-25B,\r\nCassette	Trinx 14-28T,\r\nChain	Hi-Ten Steel,\r\nBrake	Trinx V-Brake,\r\nChainwheel	1/2*3/32,\r\nWheel Size	20,\r\nRims	Trinx Alloy,\r\nTires	20,\r\nHubs	Trinx,\r\nPedals	Natty Sport,\r\nSaddle	Trinx Sport,\r\nHandlebar	Trinx Small Rise,', 14, 56, 4398.98, 0),
('Kas-33', 'Kask Protone', '1103392963kask-protone.jpg', 'Weight:215 g (M size) - Standards:EN 1078, 1203 Technology:Eco-leather chinstrap:- Chin pad with eco-leather chinstrap The anallergic and washable chinstrap is extremely comfortable and helps to avoid', 11, 61, 500, 0),
('Kas-34', 'Kask Valegro', '88266428kask-valegro.jpg', 'Weight:180 g Technologies:Hyvent:- Structure And Design Of The Shell Implement The Air Flow And Break Up The Exchangeable Heat.\r\nHigh Breathability:- Because The Inner Padding Fiber Speeds Up The Evap', 11, 61, 499, 0),
('Kok-46', 'Kokua Jumper', '172696025kokua-jumper.jpg', 'At 7.5 pounds total, KOKUA LIKEaBIKE Jumper is the lightest in the market! Shipping weight is 13 pounds 8 ounces, 27” x 23” x 6” box.', 11, 56, 1799, 0),
('Lap-10', 'Laplace Q5 Outdoor', '2046358646322565884Laplace Q5 Outdoor Bike Bicycle Riding Helmet - Silvery Grey + Black + White.jpg', 'Laplace Q5 Outdoor Bike Bicycle Riding Helmet - Silvery Grey + Black + White', 11, 61, 650, 0),
('LYC-7', 'LYCAON Handlebar', '4350623112101813297LYCAON Bike Handlebar Grips, Non-Slip Rubber Bicycle Handle Grip with Aluminum Lock,.jpg', 'LYCAON Bike Handlebar Grips, Non-Slip Rubber Bicycle Handle Grip with Aluminum Lock,', 13, 72, 299, 0),
('Mav-93', 'Mavic Traction Stud / Wrench Kit 8.5', '443755344Mavic.jpg', 'Wrench Kit 8.5\r\nWeight: 25g', 12, 65, 350, 0),
('Max-38', 'Maxxis Crossmark W 26 X 2.10', '422989385maxxis-crossmark-w-26-x-2.10.jpg', 'Weight: 625gr\r\n- Size: 26x2.10\r\n- Tingle: WIRE\r\n- TPI: 60\r\n- MAX PSI: 65\r\n- Compost: 70a', 13, 69, 320, 0),
('Max-65', 'Maxxis Minion DHR II', '2100200407maxxis-minion-dhr-ii.jpg', 'Most versatile tread design\r\n- Mud, snow and hardpack performance\r\n- UCI compliant', 16, 69, 320, 0),
('Msc-17', 'Msc Mercury Carbon 29', '973117172msc-mercury-carbon-29.jpg', 'Fork : Rst Blaze 100 Rmt\r\nHeadset : Semi Int 44/56mm Tapered To 1 1/8 Fork\r\nBrakes : Shimano Hydro Altus 180/160\r\nRear Derailleur : Shimano Acera 9v', 13, 73, 10000, 0),
('Msc-18', 'Msc Mercury Carbon R 29', '573677593msc-mercury-carbon-r-29.jpg', 'Fork : Rock Shox Xc30 100 Rmt Tapered\r\nHeadset : Semi Int 44/55mm,1-5-11/8 Tapered\r\nBrakes : Shimano Hydro Acera 180/160\r\nRear Derailleur : Shimano Six 10v\r\nFront Derailleur : Shimano Deore 2v', 13, 73, 11300, 0),
('Msc-19', 'Msc Mercury Alu R 27.5', '16874416001993201055msc-mercury-alu-r-27.5.jpg', 'Mercury 27.5 Alu R (3X10)\r\nHorquilla :\r\nRs Xc30Tk27 100 Bk Tpe Rmt\r\nFrenos:\r\nShimano Hydro 180/160 Altus', 13, 73, 11999, 0),
('Msc-20', 'Msc Mercury Alu R 29', '563485718msc-mercury-alu-r-29.jpg', 'Mercury 29 Alu R (3X10)\r\nHorquilla:\r\nRs Xc30Tk29 100 Bk Tpr Rmt\r\nFrenos\r\nShimano Hydro 180/160 altus\r\nBielas:', 11, 73, 12400, 0),
('Msc-73', 'Msc Lunatika 2', '222888827msc-lunatika-2.jpg', 'Size-S.\r\n2.680 Gr.\r\n+/-5%', 15, 64, 1439, 0),
('Par-97', 'Park Tool TWS-2 Torx Wrench Set', '13322729151059258748Park Tool.jpg', 'Torx\r\nT7\r\nT9\r\nT10\r\nT15\r\nT20\r\nT25\r\nT27\r\nT30\r\nT40', 12, 65, 450, 0),
('Par-99', 'Park Tool TW-5.2 Torque Wrench 2-14 Nm 3/8&quot;', '18466031075273948Park Tools.jpg', '2–14 Newton meter range (17–124 Inch Pounds)\r\nAdjustable in 0.40 Nm increments\r\nRatcheting 3/8&quot; drive\r\nReads and registers for both left hand and right hand threading\r\nDial-adjust system allows d', 13, 65, 500, 0),
('PHD-110', 'PHD P1000 ELITE', '100885637820180228150231_159.png', 'Color : Matt Grey/Blue Black, Matt Black/Purple Yellow\r\n    Frame : TRINX 27.5&quot; Carbon 4-Linkage Suspension, SRAM RC3 Suspension\r\n    Fork : Rockshox RBA, RL 140\r\n    Shifter : SHIMANO XT, SL-M80', 17, 73, 14500, 0),
('PHD-112', 'PHD P1200 ELITE', '15349827082018-NEW-MODEL-P1200-27-5-inch.jpg_350x350.jpg', 'Color : Matt Black/Orange Cyan\r\n    Frame : TRINX 27.5” Carbon 4-Linkage Suspension, FOX FLOAT Suspension\r\n    Fork : FOX FLOAT,27.5,Plus,Travel,140MM,Lock-Out\r\n    Shifter : SRAM X01, EAGLE-12\r\n    F', 17, 73, 10695, 0),
('Pir-39', 'Pirelli P Zero Velo 25', '755128614pirelli-p-zero-velo-25.jpg', 'Road cyclingTire typeClincherWheel diameter28&quot;- 700Black', 11, 69, 400, 0),
('Poc-36', 'Poc Crane Mips', '2093632712poc-crane-mips.jpg', 'MIPS (Multi-Directional Impact Protection System)\r\n- Progressive core, dual density EPS liner\r\n- In-mold construction\r\n- Extra tough outer shell to prevent denting\r\n- Size adjustment system\r\n- Strap a', 11, 61, 899, 0),
('Pow-151', 'Powerbar Bottle', '2112992906powerbar-bottle-black-EV302352-8500-1.jpg', 'Capacity	Comes in 500ml and 750ml,\r\nMounting	Fits comfortably into all standard bottle cages,\r\nNotes	Dish washer friendly,', 11, 59, 230.99, 0),
('Pro-55', 'Prologo Dimension TiroX', '1145636997prologo-dimension-tirox.jpg', '- Size (mm): 245 x 143\r\n- Weight: 179 g', 13, 63, 500, 0),
('Pro-69', 'Pro Mini Bag', '856251545pro-mini-bag.jpg', '- 1 (mini) or 2 (medi / maxi) side compartment(s)\r\n- Reflective logo at the back and at both sides\r\n- Made of environmentally PVC-free material', 15, 60, 499, 0),
('Rad-100', 'Radon 9-piece Hex Key Wrench Set', '2790783891977257271Radonsssss.jpg', '9 piece Hex Key Wrench Set\r\nSize:\r\n1,5mm\r\n2mm\r\n2,5mm\r\n3mm\r\n4mm\r\n5mm\r\n6mm\r\n8mm\r\n10mm\r\nLength: 92 - 232mm\r\nColor\r\ncolored\r\nWeight\r\napprox. 405g', 13, 65, 890, 0),
('Rad-101', 'Radon TORX Wrench Set 9-Pieces long', '696444735Radonssssss.jpg', 'TORX Wrench Set 9-Pieces long\r\nLong version of the Radon Torx Set.\r\nProduct features\r\nMaterial: Tool steel\r\nSize:\r\nT10\r\nT15\r\nT20\r\nT25\r\nT27\r\nT30\r\nT40\r\nT45\r\nT50\r\nColor\r\nblack', 12, 65, 700, 0),
('Rad-85', 'Radon Slide 150 26 Frame blue lime', '29546225Radon.jpg', 'Material: Aluminium, 4-Link, ISCG 03 Mount, X12\r\nSeat post: 31.6mm\r\nSeat clamp: 34.9mm\r\nFront deraileur: Direct Mount / cable routing from below\r\nHeadtube diameter: Tapered 1 1/8&quot; (ZS 44mm)  semi', 15, 64, 5300, 0),
('Rad-86', 'Radon Slide 130 29 Frame blue red white', '2022964114435469820Slide 130 29 Frame blue red white.jpg', 'Material: Aluminium, 4-Link, X12\r\nSeat post: 31.6mm\r\nSeat clamp: 34.9mm\r\nFront deraileur: Direct Mount / cable routing from below\r\nHeadtube diameter: Tapered 1 1/8&quot; (ZS 44mm)  semi-integrated - 1', 13, 64, 4500, 0),
('Rad-87', 'Radon ZR Race 29 Frame lime blue white', '20605561391653448340ZR Race 29 Frame lime blue white.jpg', 'Material: Aluminium, X12\r\nSeat post: 27.2mm\r\nSeat clamp: 31.8mm\r\nFront deraileur: Direct Mount  - Down-Swing / cable routing from below\r\nHeadtube diameter: Tapered 1 1/8&quot; (ZS 44mm)  semi-integrat', 12, 64, 4600, 0),
('Rad-88', 'Radon ZR Team Lady 26 Frame mint white', '1192483744408751517ZR Team Lady 26 Frame mint white.jpg', 'Material: Aluminium\r\nSeat post: 31.6mm\r\nSeat clamp: 34.9mm\r\nFront deraileur: 34.9mm / cable routing from above\r\nHeadtube diameter: 1 1/8&quot; (ZS 44mm) semi-integrated', 14, 64, 3999, 0),
('Rad-89', 'Radon ZR Team 29 Frame blue white', '16060965321657946341ZR Team 29 Frame blue white.jpg', 'Material: Aluminium\r\nSeat post: 30.9mm\r\nSeat clamp: 34.9mm\r\nFront deraileur: 34.9mm / cable routing from below\r\nHeadtube diameter: 1 1/8&quot; (ZS 44mm) semi-integrated', 13, 64, 4300, 0),
('Rad-90', 'Radon Slide Carbon 160 27.5 Frame black white', '15223374031377508351Slide Carbon 160 27.5 Frame black white.jpg', 'Material: Carbon, 4-Link, ISCG 05 Mount, X12\r\nSeat post: 31.6mm\r\nSeat clamp: 34.9mm\r\nFront deraileur: E-Type Low Direct Mount / cable routing from below\r\nHeadtube diameter: Tapered 1 1/8&quot; - 1 1/2', 13, 64, 3400, 0),
('Rad-92', 'Radon Ratcheting Wrench-Set', '630939735Radons.jpg', 'Ratcheting Wrench Set\r\nTwo-way ratchet\r\nPerforated handle for better grip\r\nMaterial\r\nChrome vanadium steel\r\nSize\r\n8mm\r\n9mm\r\n10mm\r\n11mm\r\n12mm\r\n13mm\r\n14mm\r\n15mm', 12, 65, 600, 0),
('Rad-94', 'Radon ECO Torque Wrench 1/4&quot; 5-25 Nm', '1136732404Radonss.jpg', 'ECO Torque Wrench 1/4&quot; 5-25 Nm\r\nRatchet switchable\r\nAdjustment lockable\r\nProduct features\r\nTriggering: right and left\r\nSocket: 1/4&quot;\r\nTorque: 5-25 Nm\r\nLength: 270mm\r\nMaterial\r\nSteel\r\nWeight\r\n', 12, 65, 450, 0),
('Rad-95', 'Radon ECO Torque Wrench 3/8&quot; 20-110 Nm', '214773340Radonsss.jpg', 'Product features\r\nRatchet switchable\r\nAdjustment lockable\r\nTriggering: right and left\r\nSocket: 3/8&quot;\r\nTorque: 20 - 110 Nm\r\nLength: 370mm\r\nMaterial\r\nSteel\r\nWeight\r\n875g', 13, 65, 500, 0),
('Rad-98', 'Radon Ratcheting Wrench', '500372509Radonssss.jpg', 'Ratcheting Wrench\r\nTwo-way ratchet\r\nPerforated handle for better grip\r\nSize (choose variant)\r\n8mm\r\n9mm\r\n10mm\r\n11mm\r\n12mm\r\n13mm\r\n14mm\r\n15mm', 16, 65, 760, 0),
('RED-156', 'RED ELF 2.0', '1923267237red elf 2.0.png', 'Color : Rosy/White, Purple/White, Yellow/Blue,\r\nFrame : TRINX Hi-Ten Steel Children\'s Frame, 16&quot;*9&quot;,\r\nFork : Hi-Ten Steel,\r\nShifter : -,\r\nFd : -,\r\nRd : -,\r\nCassett : TRINX Single Speed, 18T,\r\nChain : KMC Single Speed,\r\nBrake : Front: Side-Pull Brake; Rear: Caplier,\r\nWheel Set : TRINX,\r\nTyre : 16&quot;*2.40,\r\nChainwheel : 28T Conjoined Crank,\r\nHub : TRINX Steel,\r\nSaddle : TRINX Children\'s Seat,\r\nSeatpost: TRINX Steel,\r\nStem : TRINX Steel,\r\nHandlebar : TRINX High Rise,', 17, 56, 3249, 0),
('RED-157', 'RED ELF 1.0', '379837028RED ELF 1.0.png', 'Color : Red/White,White/Blue,Blue/Rosy,\r\nFrame : TRINX Hi-Ten Steel Children\'s Frame, 12&quot;*8&quot;,\r\nFork : Hi-Ten Steel,\r\nShifter : -,\r\nFd : -,\r\nRd : -,\r\nCassett : TRINX Single Speed, 18T,\r\nChain : KMC Single Speed,\r\nBrake : Front: Side-Pull Brake; Rear: Caplier,\r\nWheel Set : TRINX,\r\nTyre : 12&quot;*2.40,\r\nChainwheel : 28T Conjoined Crank,\r\nHub : TRINX Steel,\r\nSaddle : TRINX Children\'s Seat,\r\nSeatpost: TRINX Steel,\r\nStem : TRINX Steel,\r\nHandlebar : TRINX High Rise,', 17, 56, 3899, 0),
('RP5-141', 'RP5 Cycling shoes', '1346122777rp5 SHOES.jpg', 'Make and model: Shimano RP5 SPD-SL road shoe,\r\nSize tested: 48, black,', 14, 58, 999, 0),
('RP9-138', 'RP9 Cycling shoes', '1327692870RP9 SHOES.jpg', 'Available Colours	Black White,\r\nAvailable In (Mens/Womens)	Mens,\r\nWeight (g)	575,\r\nShoe Type	Road,\r\nShoe Compatibility	3 Bolt Cleat,\r\nSole Type	Carbon Fibre,\r\nBreathable	Yes,\r\nHook And Loop Straps	Yes,\r\nShoe Features	3-Hole SPD-SL Compatable,\r\nShoe Lining	Fabric,\r\nShoe Size Tested	43,\r\nWeight Of Pair Tested	575,', 14, 58, 1369, 0),
('Rym-45', 'Rymebikes Rex', '285421565rymebikes-rex.jpg', 'Junior Bicycle BTT 20\'\' Alloy Frame and steel fork Shimano Tourney 6 sp. gripshift  weight 10,6 kg. recommended height 1,20 - 1,35 cm.', 12, 56, 1350, 0),
('Sch-66', 'Schwalbe Nobby Nic HS463 Folding TLE Evo TSC', '1826344056schwalbe-nobby-nic-hs463-folding-tle-evo-tsc.jpg', 'Etrto Size: 27.5 x 3.00\r\n- French Size: 75-584', 13, 69, 299, 0),
('Sch-67', 'Schwalbe Insider', '2068451803schwalbe-insider.jpg', 'Execution: Performance\r\n- Compound: Roller\r\n- Weight: 470 g\r\n- Skin: Lite\r\n- Bar: 4.0-6.5\r\n- Psi: 55-95\r\n- EPI: 67', 14, 69, 199, 0),
('Sci-70', 'Sci-con Hippo 550', '1017089899sci-con-hippo-550.jpg', 'Material Cordura™\r\n\r\n- Fastening Roller 2.1\r\n\r\n- Weight 137 grams\r\n\r\n- Volume 550 cc', 15, 60, 720, 0),
('Sel-53', 'Selle smp TRK Medium', '1051703604selle-smp-trk-medium.jpg', 'Recommended use: City Bike, Touring, Trekking\r\n- Padding level: High\r\n- Padding material: Soft polyurethane\r\n- Cover: SVT\r\n- Body: Co-polymer polypropylene\r\n- Standard frame: Steel', 16, 63, 230, 0),
('Sel-54', 'Selle Smp Well', '1140579080selle-smp-well.jpg', 'Recommended use: Road racing, MTB, Commuter, Single Speed, Spinning, Home Trainer\r\nPadding level: High\r\nPadding material: Soft polyurethane\r\nCover: SVT\r\nBody	Carbon: reinforced nylon 12', 11, 63, 450, 0),
('SH--136', 'SH-R321 Cycling shoes', '616454381Shimano-SH-R321-cycling-shoes-630x420.jpg', 'Superb fit\r\nAdjustable instep height and heat mouldable\r\nGood power transfer,\r\nWeight :268g (size 42),\r\n Colour :Black/White,\r\nDistributor :www.madison.co.uk,', 14, 58, 1299, 0),
('SH--137', 'SH-R171 Cycling shoes', '2036438326shimano-sh-r171-road-shoes.jpg', 'Synthetic,\r\nSynthetic sole,\r\nLightweight carbon fiber composite sole with adjustable cleat mount,\r\nInnovative &quot;Surround&quot; upper pattern provides perfect balance of holding power provides perfect balance of holding power and all-day comfort,\r\nSupple, stretch-resistant synthetic leather and open mesh upper for optimal breathability,\r\nAdaptable mechanical closure system adjusts to various instep height and shapes,\r\nDual-density cup insole for heel bone stability,', 14, 58, 1449, 0),
('Shi-102', 'Shimano 11-speed Chain CN-HG601 with Quick-Link', '1859955669Shimanos.jpg', 'features\r\nUse: Road, MTB, E-Bike\r\nModel: CS-HG601\r\nGroup: 105\r\nGear: 11-speed\r\nType: HG-X11\r\nDirectional design: Yes\r\nChromizing Treatment Link Pin: Yes\r\nPin Link Plate: Grey\r\nRoller Link Plate: SIL-T', 14, 67, 400, 0),
('Shi-103', 'Shimano 105 Brake Shoes Cartridge R55C4', '225044603Shimanoss.jpg', 'Compound: R55C4\r\nGroup: 105\r\nFelgenempfehlung: Aluminium\r\nCartridge-Type: Yes\r\nDry conditions: High (5 of 5)\r\nWet conditions: Below average (2 of 5)\r\nQuietness: Above average (4 of 5)\r\nAnti-Fading: Hi', 14, 67, 240, 0),
('Shi-104', 'Shimano XT PD-M8040 Flat Pedals', '318927668Shimanosss.jpg', 'XT Flat Pedals PD-M8040\r\n2 body size options (S/M and M/L)\r\nFore-aft concave\r\n10 pins on each side\r\nProduct features\r\nUse: MTB All Mountain, Trail, Enduro, BMX\r\nGroup: DEORE XT\r\nModel: PD-M8040\r\nType:', 14, 67, 320, 0),
('Shi-105', 'Shimano XT Brake Shoes Cartridge M70CT4 for BR-T78', '17987294051971992540Shimanossss.jpg', 'features\r\nCompound: M70CT4 (severe)\r\nGroup: XT (V-Brake)\r\nRim-Type: For machined aluminum rim\r\nCartridge-Type: Yes\r\nDry conditions: Above average (4 of 5)\r\nWet conditions: Average (3 of 5)\r\nQuietness:', 14, 67, 340, 0),
('Shi-106', 'Shimano Pedals SPD PD-A530 black', '1072841595Shimanosssss.jpg', 'features\r\nUse: Sport / Touring / Trekking\r\nModel: PD-A530\r\nType: Click\r\nPedal system: SPD / Flat\r\nBinding: Single Sided\r\nMechanism Sealed: Yes\r\nCleat retention adjuster:Yes', 14, 67, 400, 0),
('Shi-107', 'Shimano 105 Brake Shoes Cartridge R55C4 for Direct', '462012510Shimanossssss.jpg', 'Compound: R55C4\r\nGroup: 105 (Direct Mount)\r\nFelgenempfehlung: Aluminium\r\nCartridge-Type: Yes\r\nDry conditions: High (5 of 5)\r\nWet conditions: Below average (2 of 5)\r\nQuietness: Above average (4 of 5)\r\n', 14, 67, 340, 0),
('Shi-109', 'Shimano Steps Crank Arm Set FC-E8000 without Chain', '201169634Shimanossssssss.jpg', 'features\r\nUse: E-Bike MTB\r\nGroup: Shimano Steps\r\nModel: FC-E8000\r\nCrank arm type: Solid\r\nQ-Factor: 177mm\r\nCrank arm length: (choose variant!)\r\nGradation: without chainring\r\nBottom bracket: not include', 14, 67, 350, 0),
('Shi-110', 'Shimano Steps Chainring SM-CRE80 for FC-E8000/8050', '1187371544Shimanosssssssss.jpg', 'features\r\nUse: E-Bike MTB\r\nGroup: Shimano Steps\r\nModel: SM-CRE80\r\nTeeth: (choose variant)\r\nBolt Circle Diameter: 104mm\r\nChain line. 50mm\r\nGear rear: 10/11-speed\r\nGear arms: 4-arm\r\nMounting: Circlip\r\nP', 14, 67, 439, 0),
('Shi-111', 'Shimano XTR SL-M9000 Right With Clamp', '995935367shimano-xtr-sl-m9000-right-with-clamp.jpg', 'Product description Shimano XTR SL-M9000 Right With Clamp\r\nShift Lever, Sl-M9000 Right, Xtr, 11-Speed W|O Ogd, 2050Mm Inner, Black Outer:1800Mm, Ind.Pack.\r\n\r\n\r\n\r\nWith Shimano XTR SL-M9000 Right With C', 14, 75, 4195, 0),
('Shi-114', 'Shimano Deore Right RF+ C/ABRA C/DIS', '1901866854shimano-deore-right-rf--c-abra-c-dis.jpg', 'Features:\r\n\r\n- Light and smooth operation with vivid index\r\n- Optislick cable\r\n- Precise and consistent shifting performance\r\n- Ergonomic lever shape and easy lever access\r\n- Intuitive and readily vis', 14, 75, 1017, 0),
('Shi-115', 'Shimano Altus Right RF+ C/OPT', '1600348317shimano-altus-right-rf--c-opt.jpg', 'Description:\r\nNew shifter control of the Shimano Altus range for 9 speeds. Ergonomic lever of new design, control with clamp and optical display gait indicator. Includes change cable.\r\n\r\nCharacteristi', 14, 75, 585, 0),
('Shi-116', 'Shimano Dual Road Calipers R400', '1885439285shimano-dual-road-calipers-r400.jpg', 'Product description Shimano Dual Road Calipers R400\r\nSHIMANO Brake Lever &quot;Sora&quot; for road handlebar, self-service package only brake lever- no STI-unit, complete with cable and outer casing, ', 14, 75, 1285, 0),
('Shi-118', 'Shimano ST-R8020 Ultegra Left Shift Lever (2x11-Speed)', '1143736750shimano-st-r8020-ultegra-left-shift-lever--2x11-speed-.jpg', 'Shimano Ultegra R8020 brake / shift lever\r\n\r\n\r\nFeatures:\r\n\r\n- More control for the cyclist under all conditions\r\n- Fast and precise shifting\r\n- Improved ergonomics and adaptability\r\n- Application: Roa', 14, 75, 4289, 0),
('Shi-119', 'Shimano Ultegra E-Tube Remote Triathlon Shifter SW', '1028955291shimano-ultegra-e-tube-remote-triathlon-shifter-sw-r671.jpg', 'Shift Switch Set, Sw-R671, Remote Triathlon Shifter(For Tt-Handle), Right And Left, 2 Button Design, W|Electric Wire(Fitted Type, Length 620Mm), Ind.Pack.', 14, 75, 910, 0),
('Shi-120', 'Shimano Duo Shifter TX30 6s', '790448009shimano-duo-shifter-tx30-6s.jpg', 'Shift Lever Set, Sl-Tx30, Tourney 6R&amp;L(Friction) 2050X1800Mm Inner, 600X600X300Mm Black Outer, Ind.Pack.', 14, 75, 696, 0),
('Shi-123', 'Shimano Deore BL-T610 Duo V-Brake', '1503629271shimano-deore-bl-t610-duo-v-brake.jpg', 'Brake Lever Set, Bl-T610, Deore, For Treking 2-Finger.\r\n\r\nW|T-Type Cable 800X900, 1400X1600Mm Black Outer, Black Ind.Pack.', 14, 75, 1105, 0),
('Shi-124', 'Shimano Revoshift Shifter (7-Speed)', '228962918shimano-revoshift-shifter--7-speed-.jpg', 'Features:\r\n\r\n- Improved overall internal geared hub system efficiency\r\n- New and updated design, complementing the NEXUS series\r\n\r\n\r\nSpecifications:\r\n\r\n- SERIES: SHIMANO NEXUS C3000 Series\r\n- Color: Silver, Black, -\r\n- Compatible Internal geared hub Type: NEXUS INTER-7\r\n- Clamping diameter (mm): 22.2\r\n- Max. multiple shifts (Main lever/ rear): 6\r\n- Optical Gear Display: Window\r\n- Rear speeds: 7\r\n- Recommended SL outer cashing: OT-SP40\r\n- SL cable adjust: X\r\n- Shifter type: REVOSHIFT', 14, 75, 522, 0),
('Shi-125', 'Shimano EF500 2A', '1164344454shimano-ef500-2a.jpg', 'Shift|Brake Lever Set,St-Ef500-2A, 3X7Speed,Ez-Fire Plus,2F-Alloy, For V-Brake, Std Sl&amp;Bl Cbl(Black), Black, Ind.Pack.', 14, 75, 1093, 0),
('Shi-126', 'Shimano Ultegra Di2 R8 TT', '420220481shimano-ultegra-di2-r8-tt.jpg', 'Features: \r\n\r\n- Reduced drag through a more aerodynamic design\r\n- Eliminated the switch box of ST-6871 to make the design smaller and shorter\r\n- Intuitive shifting control\r\n- Keep firm when shifting\r\n- Single button on each side of the shift lever only works with Synchronized Shift\r\n- Series color\r\n\r\nSpecifications:\r\n\r\n- 2x11-speed\r\n- Average Weight: 138 g/pair', 14, 75, 1923, 0),
('Shi-127', 'Shimano R8050 Di2 Dual Control Lever (2x11-Speed) Ultegra', '1269021360shimano-r8050-di2-dual-control-lever--2x11-speed--ultegra.jpg', 'Features:\r\n\r\n- Intuitive shifting\r\n- Clearer separation between the shift buttons ensures precise shifting, even when the cyclist is wearing thicker gloves.\r\n- Multi-shift can be switched on or off individually.\r\n- The buttons under the top cover can be programmed to control third-party devices.\r\n- All functions can be customized with SHIMANOs E-Tube app or PC software\r\n\r\n\r\nSpecifications:\r\n\r\n- Application: Road bikes\r\n- Lever setting: Integrated\r\n- Compatible brakes: BR-R8000\r\n- Material Brake lever: Fiberglass composite\r\n- Position: Left\r\n- Gear ratio: Programmable', 14, 75, 729, 0),
('Shi-133', 'Shimano Ultegra Di2 R8', '245269191shimano-ultegra-di2-r8.jpg', 'Features: ,\r\n\r\n- More intuitive shifting operation,\r\n- Updated features and more defined click feeling,\r\n- Clearer separation between shift buttons support quick ,and precise shifting while operating with thick gloves,\r\n- Customizable functionality to match the riders style,\r\n- Each switch has the option for multi-shift ON or OFF,\r\n- E-TUBE PROJECT,\r\n- Programmable function of ST top button remote switch ,for third party cycle computer and shifting,\r\n- More Reach Adjust range,\r\n- Series color,', 14, 75, 624, 0),
('Shi-136', 'Shimano Revoshift RS45', '907226155shimano-revoshift-rs45.jpg', 'Features:,\r\n\r\n- Twist shifter,\r\n- Optical gear display,\r\n- FD/Shifter Compatibility: Mountain Triple,\r\n- Cassette Spacing: 7-Speed,\r\n- Shifter/Derailleur Compatibility: Shimano ,', 14, 75, 697, 0),
('Shi-40', 'Shimano Junction for Around Cockpit Area Dura Ace', '649129075shimano-junction-for-around-cockpit-area-dura-ace.jpg', 'Shifters \r\nClamp', 14, 72, 427, 0),
('Shi-58', 'Shimano RC9 Sphyre', '1081758690shimano-rc9-sphyre.jpg', '- Unified Sole And Upper Construction Sets A New Level Of Fit, Pedaling Stability, Rigidity And Weight Reduction\r\n- Close To Foot Last Shape With A Narrow Bottom, Rounded Heel And Slim Toe Box\r\n- Wide', 11, 58, 1290, 0),
('Shi-59', 'Shimano MT5', '743737619shimano-mt5.jpg', '- Outdoor-style inspired cycling shoes combine the walkability of light hiking shoes with the performance of a MTB shoe\r\n- Glass fiber reinforced shank plate for optimum sole rigidity\r\n- EVA midsole a', 14, 58, 2100, 0),
('Shi-60', 'Shimano Rp3', '1829254747shimano-rp3.jpg', 'Synthetic LeatherLighter, stronger and more durable than natural leathers\r\n- Offset StrapsAsymmetric straps relieve pressure points\r\n- Wider CleatExpands range for mounting cleats\r\n- Compatible withSP', 14, 58, 1900, 0),
('Shi-9', 'Shimano M240L custom', '12283362552075691819Shimano M240L custom-fit bike shoe.jpg', 'Shimano M240L custom-fit bike shoe', 14, 58, 500, 0),
('Shi-96', 'Shimano TL-FC23 Chain Ring Bolt T30 Wrench with 5m', '788096639Shimano.jpg', 'Extremely high precision and rigidity to loosen the firmly tightend bolts\r\nLong reach design for better leverage and access\r\nChrome plated for durability\r\nErgonomic grip', 14, 65, 560, 0);
INSERT INTO `product` (`product_code`, `product_name`, `product_img`, `product_description`, `supplier_id`, `category_id`, `product_price`, `product_discount`) VALUES
('Sid-56', 'Sidi Shoecover Sidi Lycra Wire', '1681810434sidi-shoecover-sidi-lycra-wire.jpg', 'Shoe Green Black', 11, 58, 1100, 0),
('Sig-41', 'Sigma Bracket For Stereo', '1673540913sigma-bracket-for-stereo.jpg', 'Lightning Stereo', 16, 72, 430, 0),
('Sig-42', 'Sigma Wrist Band', '1507752186sigma-wrist-band.jpg', 'Straps', 16, 72, 190, 0),
('SIS-139', 'SIS Elite Fly Team Sky Bottle', '966527249sis-elite-fly-team-sky-bottle-blue-white-EV346295-5090-1.jpg', 'Material	Exclusive odorless, soft and durable plastic material,\r\nConstruction	100% BPA Free,\r\nCapacity	550ml,\r\nDimensions	7.4cm Diameter,\r\n18.5cm Height,\r\nLid Type	Food-grade Polypropylene and food-grade Thermo Plastic Rubber,\r\nExtra Features	- Maximum liquid temperature 40°C\r\n- Dishwasher Safe,\r\nWeight	54g,', 11, 59, 250, 0),
('Spe-146', 'Specialized Purist WaterGate Bottle', '230414027specialized-purist-watergate-bottle-white-EV312010-9000-1.jpg', 'Materials	Easy-to-squeeze LDPE material,\r\nBPA-Free plastic is made from 100% FDA food- grade ,materials, and it\'s printed with non-solvent base (UV Cured), CPSC-approved ink and materials,\r\nCapacity	22oz / 625ml,\r\n26oz / 750ml,\r\nLid Type	Self-sealing Heart Valve™,\r\n100% leak-proof design,\r\nExtra Features	Purist infusion shields the bottle form odor, ,stains, and mold', 11, 59, 321, 0),
('Ste-75', 'Stereo 160 Super HPC Race 27.5 Frame', '1798780180314568_2849141.jpg', 'Material: Carbon Super HPC, Monocoque, Advanced Twin Mold Technology\r\nSeat post: 31.6mm\r\nSeat clamp: 34.9mm\r\nFront deraileur: Direct Mount / cable routing from below\r\nHeadtube diameter: Tapered 1 1/8&', 12, 64, 1800, 0),
('Ste-76', 'Stereo 140 C:68 SLT 29 Frame', '45582514330926474Stereo 140 C68 SLT 29 Frame.jpg', 'Material: Carbon C:68 Monocoque Advanced Twin Mold Technology, ATG, ETC 4-Link, Boost148\r\nSeat post: 31.6mm\r\nSeat clamp: 34.9mm\r\nFront deraileur: No - Only compatible with 1x Shiftingsystem! (1x10-spe', 12, 64, 1600, 0),
('Ste-77', 'Stereo 140 C:62 Race 27.5 Side-Swing Frame', '532498431161725015Stereo 140 C62 Race 275 Side-Swing Frame.jpg', 'Material: Carbon, 4-Link, ISCG 05 Mount, X12\r\nSeat post: 31.6mm\r\nSeat clamp: 34.9mm\r\nFront deraileur: E-Type Low Direct Mount / cable routing from below\r\nHeadtube diameter: Tapered 1 1/8&quot; - 1 1/2', 12, 64, 2550, 0),
('Ste-83', 'Stereo 160 Super HPC 27.5 Frame action team', '388887077353679862Stereo 160 Super HPC 27.5 Frame action team.jpg', 'Material: Carbon Super HPC, Monocoque, Advanced Twin Mold Technology\r\nSeat post: 31.6mm\r\nSeat clamp: 34.9mm\r\nFront deraileur: Direct Mount / cable routing from below\r\nHeadtube diameter: Tapered 1 1/8&', 13, 64, 2230, 0),
('Ste-84', 'Stereo 140 HPA Race 27.5 Frame black´n´flashyellow', '2624828801748497816Stereo 140 HPA Race 27.5 Frame black´n´flashyellow.jpg', 'Material: Aluminum HPA Ultralight, Advanced Hydroform, Triple Butted, ETC 4-Link, ISCG Mount, AXH\r\nSeat post: 31.6mm\r\nSeat clamp: 34.9mm\r\nFront deraileur: Direct Mount / cable routing from below\r\nHead', 13, 64, 3230, 0),
('Ste-91', 'Stereo 140 C:62 Race 27.5 Frame', '8657104451400378075Stereo 140 C62 Race 27 Frame.jpg', 'Material: Carbon C:62 Monocoque Advanced Twin Mold Technology, ATG, ETC 4-Link\r\nSeat post: 31.6mm\r\nSeat clamp: 34.9mm\r\nFront deraileur: Direct Mount / cable routing from below\r\nHeadtube diameter: Tape', 12, 64, 3540, 0),
('SWE-155', 'SWEET GIRL 2.0', '2012112248sweet girl 2.0.png', 'Color : Blue/Purple, Purple/Orange Blue, Rosy/White,\r\nFrame : TRINX Hi-Ten Steel Children\'s Frame, 16&quot;*9&quot;,\r\nFork : Hi-Ten Steel,\r\nShifter : -,\r\nFd : -,\r\nRd : -,\r\nCassett : TRINX Single Speed, 16T,\r\nChain : KMC Single Speed,\r\nBrake : Front: Side-Pull Brake; Rear: Caplier,\r\nWheel Set : TRINX,\r\nTyre : 16&quot;*2.40,\r\nChainwheel : 32T Conjoined Crank,\r\nHub : TRINX Steel,\r\nSaddle : TRINX Children\'s Seat,\r\nSeatpost: TRINX Steel,\r\nStem : TRINX Steel,\r\nHandlebar : TRINX High Rise,', 14, 56, 3399, 0),
('Thu-72', 'Thule Hield Seat Bag', '82970219thule-hield-seat-bag.jpg', 'Dimensions: 9.8 x 14 x 28.5 cm\r\n- Volume: 1 l\r\n- Weight: 0.1 kg\r\n- Material: Nylon', 15, 60, 1199, 0),
('Top-92', 'Topeak Torx Wrench-Set', '1518454863Topeak.jpg', 'Torx® wrench: T7/T9/T10/T15/T20/T25/T27/T30\r\nTool material: chrome-vanadium steel\r\nSize (L x W x H): 16.5 x 6.6 x 1.2 cm', 11, 65, 420, 0),
('VCT-121', 'VCT V1300 ELITE', '916054353VCT V1300 ELITE.png', 'Color : Matt Black/Blue White, Matt Black/Red White,\r\nFrame : TRINX T700 Carbon 27.5&quot;*16&quot;/18&quot;,\r\nFork : Rockshox RCNS RL R27.5,\r\nShifter : SRAM SL GX EAGLE TRIGGER,\r\nFd : -,\r\nRd : SRAM RD GX EAGLE,\r\nCassett : SRAM CS XG 1275 EAGLE 10-50T,\r\nChain : SRAM CN GX EAGLE 12S,\r\nBrake : SRAM DB GDRE 160MM,\r\nWheel Set : DT X 1900 SPLINE TLC 27.5&quot;,\r\nTyre : MAXXIS CROSSMARK 27.5&quot;*2.10&quot;, 60TPI,\r\nChainwheel : SRAM FC DESC 6K EAGLE GXP 170L 34T,\r\nHub : -,\r\nSaddle : SR Cover, Sport,\r\nSeatpost: TRINX Carbon,\r\nStem : TRINX Carbon,\r\nHandlebar : TRINX T700 Carbon Flat,', 17, 73, 10495, 0),
('VCT-134', 'VCT V1200 ELITE', '159221164620180309094020_892.png', 'Color : Matt Black/Red Black, Matt Grey/Black,\r\nFrame : TRINX 27.5&quot;*16&quot;/18&quot; T700 Carbon,\r\nFork : Magnesium Air Remote Lock-Out, Suspension,\r\nTravel: 100MM,\r\nShifter : SHIMANO SLX SL-M7000,\r\nFd : SHIMANO SLX FD-M7020,\r\nRd : SHIMANO SLX RD-M7000,\r\nCassett : CS-M9011 11S 11-42T,\r\nChain : KMC X11-1,\r\nBrake : SHIMANO BR-M425, Hydraulic Disc , RT56, 160MM,\r\nWheel Set : TRINX Alloy Double Wall,\r\nTyre : MAXXIS ARDENT RACE 27.5&quot;*2.0&quot;, 60TPI,\r\nChainwheel : SHIMANO SLX FC-M7000 28/38T*170L,\r\nHub : NOVATEC Alloy Sealed Bearing,\r\nSaddle : SR Sport,\r\nSeatpost: TRINX Carbon,\r\nStem : TRINX Carbon,\r\nHandlebar : TRINX T700 Carbon Flat,', 17, 73, 6999, 0),
('VCT-136', 'VCT V1000 ELITE', '743154297VCT V1000 ELITE.png', 'Color : Matt Black/Green White, Matt Black/Grey BlueMatt Black/Red Grey, Matt Red/Black Yellow,\r\nFrame : TRINX T700 Carbon 27.5&quot;*16&quot;/18&quot;,\r\nFork : 27.5&quot; Magnesium Air Remote Lock-Out Suspension, Travel: 100MM,\r\nShifter : SHIMANO Deore SL-M6000,\r\nFd : SHIMANO Deore FD-M6020,\r\nRd : SHIMANO Deore RD-M610,\r\nCassett : CS-M5010 10S 11-36T,\r\nChain : KMC 10S,\r\nBrake : SHIMANO BR-MT200, Hydraulic Disc, RT-26 160MM,\r\nWheel Set : MAXXIS RACE 27.5&quot;*2.0&quot;, 60TPI,\r\nTyre : TRINX Alloy Double Wall,\r\nChainwheel : PROWHEEL Alloy Monocoque, 28/38T*170L,\r\nHub : NOVATEC Alloy Sealed Bearing,\r\nSaddle : SR Sport,\r\nSeatpost: TRINX Carbon,\r\nStem : TRINX Carbon,\r\nHandlebar : TRINX T700 Carbon Flat,', 17, 73, 7499, 0),
('WAT-164', 'WATER BOTTLE TH04', '1976908014bottle th04.jpg', 'MATERIAL: PP,\r\nVOLUME:   780CC, ?7.4cm, 25cm height,\r\nCOLOR:     White/blue,', 17, 59, 79, 0),
('X-T-135', 'X-TREME X8 ELITE', '1570748293X-TREME X8 ELITE.png', 'Color : Matt Black/Red White,Matt Blue/Black Orange?Matt Black/Green Blue,Matt Black/Brown Blue,\r\nFrame : TRINX Alloy Tri-Butted Smooth Welding 27.5&quot;*16&quot;/18&quot;,\r\nFork : Magnesium Air Remote Lock-Out Suspension, Travel:100MM,\r\nShifter : SHIMANO M7000,\r\nFd : -,\r\nRd : SHIMANO M7000,\r\nCassett : CS-M9011, 11S, 11-46T,\r\nChain : KMC X11,\r\nBrake : SHIMANO BR-MT200,\r\nWheel Set : TRINX Alloy Double Wall,\r\nTyre : MAXXIS ARDENT,RACE,M329P,27.5”*2.0”,60TPI,\r\nChainwheel : PROWHEEL Hollow 36T*170L,\r\nHub : NOVATEC Alloy Double Sealed Bearing,\r\nSaddle : SR Sport,\r\nSeatpost: TRINX Alloy,\r\nStem : TRINX Alloy,\r\nHandlebar : TRINX Alloy,', 17, 73, 10699, 0),
('X-T-136', 'X-TREME X9 ELITE', '592273521X-TREME X9 ELITE.png', 'Color : Matt Black/Red White, Matt Black/Green Matt Grey/Black, Matt Blue/Green Black,\r\nFrame : TRINX Alloy Tri-Butted Smooth Welding 27.5&quot;*16&quot;/18&quot;,\r\nFork : 27.5&quot; Rockshox SID RL, Remote Lock-Out, Suspension, Travel:100MM,\r\nShifter : SRAM SL X01 EAGLE,\r\nFd : -,\r\nRd : SRAM RD X01 EAGLE,\r\nCassett : SRAM CS XG 1295 EAGLE 10-50T, 12S,\r\nChain : SRAM CN X01 EAGLE 12S,\r\nBrake : SRAM DB LVLTLM, 160MM,\r\nWheel Set : DT X1700 SPLINE 27.5&quot;,\r\nTyre : MAXXIS CROSSMARK 27.5&quot;*2.10&quot;, 60TPI, Folding 60TPI,\r\nChainwheel : SRAM FC X01 EAGLE gxp 170L 36T,\r\nHub : -,\r\nSaddle : FIZIK GOBI M5,\r\nSeatpost: TRINX Carbon,\r\nStem : TRINX Carbon,\r\nHandlebar : TRINX T700 Carbon Flat,', 17, 73, 9099, 0);

-- --------------------------------------------------------

--
-- Table structure for table `shipping_fee`
--

CREATE TABLE `shipping_fee` (
  `shipping_id` int(11) NOT NULL,
  `shipping_city` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `shipping_delivery_fee` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `shipping_fee`
--

INSERT INTO `shipping_fee` (`shipping_id`, `shipping_city`, `shipping_delivery_fee`) VALUES
(1, 'Caloocan', 20),
(3, 'Makati', 3),
(4, 'Malabon', 4),
(5, 'Mandaluyong', 5),
(6, 'Manila', 6),
(7, 'Marikina', 7),
(8, 'Muntinlupa', 8),
(9, 'Navotas', 9),
(10, 'Parañaque', 10),
(11, 'Pasay', 12),
(12, 'Pasig', 12),
(13, 'Pateros', 13),
(14, 'Quezon', 14),
(16, 'Taguig', 16),
(17, 'Valenzuela', 17),
(19, 'Juan', 55),
(20, 'Piñas', 60);

-- --------------------------------------------------------

--
-- Table structure for table `stockin`
--

CREATE TABLE `stockin` (
  `stockin_id` int(11) NOT NULL,
  `product_code` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `date_` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stockin`
--

INSERT INTO `stockin` (`stockin_id`, `product_code`, `quantity`, `date_`) VALUES
(598, 'Shi-133', 5, '2019-03-03'),
(599, 'Cam-132', 10, '2019-03-03'),
(600, 'Cam-131', 10, '2019-03-03'),
(601, 'Shi-118', 10, '2019-03-03'),
(602, 'VCT-134', 10, '2019-03-03'),
(603, 'Cam-130', 10, '2019-03-03'),
(604, 'Cam-129', 10, '2019-03-03'),
(605, 'Ber-43', 10, '2019-03-03'),
(606, 'Gt-23', 10, '2019-03-03'),
(607, 'Gt-16', 10, '2019-03-03'),
(608, 'Ber-15', 10, '2019-03-03'),
(609, 'Gt-12', 10, '2019-03-03'),
(610, 'BIK-173', 10, '2019-03-05'),
(611, 'Cam-128', 10, '2019-03-05'),
(612, 'Shi-103', 10, '2019-03-05'),
(613, 'Shi-102', 10, '2019-03-05'),
(614, 'Shi-104', 10, '2019-03-05'),
(615, 'Sel-54', 10, '2019-03-05'),
(616, 'Shi-105', 10, '2019-03-05'),
(617, 'Sel-53', 10, '2019-03-05'),
(618, 'Shi-106', 10, '2019-03-05'),
(619, 'Sci-70', 10, '2019-03-05'),
(620, 'Shi-107', 10, '2019-03-05'),
(621, 'Sch-67', 10, '2019-03-05'),
(622, 'Shi-111', 10, '2019-03-05'),
(623, 'Sch-66', 10, '2019-03-05'),
(624, 'Rym-45', 10, '2019-03-05'),
(625, 'FC--171', 10, '2019-03-05'),
(626, 'Rad-98', 10, '2019-03-05'),
(627, 'HOL-170', 10, '2019-03-05'),
(628, 'Rad-95', 10, '2019-03-05'),
(629, 'Shi-60', 10, '2019-03-05'),
(630, 'Rad-94', 10, '2019-03-05'),
(631, 'Shi-59', 10, '2019-03-05'),
(632, 'Rad-92', 10, '2019-03-05'),
(633, 'Shi-58', 10, '2019-03-05'),
(634, 'Rad-90', 10, '2019-03-05'),
(635, 'Shi-110', 10, '2019-03-05'),
(636, 'Rad-89', 10, '2019-03-05'),
(637, 'Shi-109', 10, '2019-03-05'),
(638, 'Rad-88', 10, '2019-03-05'),
(639, 'BLU-153', 10, '2019-03-05'),
(640, 'Rad-87', 10, '2019-03-05'),
(641, 'HOL-169', 10, '2019-03-05'),
(642, 'Rad-86', 10, '2019-03-05'),
(643, 'Shi-124', 10, '2019-03-05'),
(644, 'Rad-85', 10, '2019-03-05'),
(645, 'Shi-123', 10, '2019-03-05'),
(646, 'Rad-101', 10, '2019-03-05'),
(647, 'Shi-120', 10, '2019-03-05'),
(648, 'Rad-100', 10, '2019-03-05'),
(649, 'RP5-141', 10, '2019-03-05'),
(650, 'Pro-69', 10, '2019-03-05'),
(651, 'HOL-168', 10, '2019-03-05'),
(652, 'Pro-55', 10, '2019-03-05'),
(653, 'Shi-116', 10, '2019-03-05'),
(654, 'Poc-36', 10, '2019-03-05'),
(655, 'Shi-115', 10, '2019-03-05'),
(656, 'Pir-39', 10, '2019-03-05'),
(657, 'HOL-167', 10, '2019-03-05'),
(658, 'Par-99', 10, '2019-03-05'),
(659, 'Hyd-166', 10, '2019-03-05'),
(660, 'Par-97', 10, '2019-03-06'),
(661, 'Pow-151', 10, '2019-03-06'),
(662, 'Msc-73', 10, '2019-03-06'),
(663, 'BL--165', 10, '2019-03-06'),
(664, 'Msc-20', 10, '2019-03-06'),
(665, 'WAT-164', 10, '2019-03-06'),
(666, 'Msc-19', 10, '2019-03-06'),
(667, 'CYC-163', 10, '2019-03-06'),
(668, 'Msc-18', 10, '2019-03-06'),
(669, 'Eli-148', 10, '2019-03-06'),
(670, 'Msc-17', 10, '2019-03-06'),
(671, 'CYC-162', 10, '2019-03-06'),
(672, 'Max-65', 10, '2019-03-06'),
(673, 'CYC-161', 10, '2019-03-06'),
(674, 'Max-38', 10, '2019-03-06'),
(675, 'Cam-143', 3, '2019-03-10'),
(676, 'Ber-15', 5, '2019-04-05'),
(677, 'Ber-43', 5, '2019-04-06');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supplier_id` int(11) NOT NULL,
  `supplier_name` varchar(200) NOT NULL,
  `supplier_address` varchar(500) NOT NULL,
  `supplier_contact` varchar(100) NOT NULL,
  `supplier_contact_person` varchar(244) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplier_id`, `supplier_name`, `supplier_address`, `supplier_contact`, `supplier_contact_person`) VALUES
(11, 'Sport Supplies Center', '#124 Kabulusan 1 Caloocan City, Metro Manila', '09357995194', 'Mr. Jhon Perez'),
(12, 'Metal Products Corp', 'Quezon City', '09125747386', 'Adelaida Harrison'),
(13, 'Bikers Center', 'Caloocan City', '09269717080', 'Mark luke Chan'),
(14, 'Shimano', 'Valenzuela City', '09056542482', 'Jose P Tan'),
(15, 'Giants Bag Corp', 'Quezon City', '0927321532', 'Jose Marie Jimenez'),
(16, 'Sigma Corp.', 'Quezon City', '09051539745', 'Joey Andres'),
(17, 'TRINX CORP.', 'Quezon City', '7584556', 'Ariel C Jockson');

-- --------------------------------------------------------

--
-- Table structure for table `temp_cart`
--

CREATE TABLE `temp_cart` (
  `temp_cart_id` bigint(100) NOT NULL,
  `product_code` varchar(200) NOT NULL,
  `quantity` int(11) NOT NULL,
  `session_cart` varchar(200) NOT NULL,
  `payment_method` varchar(100) NOT NULL,
  `time_frame` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `profile_picture` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_type` varchar(100) NOT NULL,
  `manages` varchar(5) NOT NULL,
  `reports` varchar(5) NOT NULL,
  `order_list` varchar(5) NOT NULL,
  `verify` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `email_add` varchar(200) NOT NULL,
  `verification_code` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `username`, `profile_picture`, `password`, `user_type`, `manages`, `reports`, `order_list`, `verify`, `status`, `email_add`, `verification_code`) VALUES
(2, 'Superuser', 'Man', 'superuser', '9866211944.jpg', 'U3VwZXJ1c2VyMTIzNA==', 'Superuser', '0', '0', '0', '0', 'Enabled', 'keithjuniopukla@gmail.com', ''),
(9, 'Admin', 'Account', 'admin', '624362650admin-image-png-3.png', 'QWRtaW4xMjM0', 'Admin', '0', '0', '0', '0', 'Enabled', 'concepcionjoshua90@gmail.com', ''),
(19, 'Joshua', 'Concepcion', 'lutianx', '', 'YmhtZWw=', 'Staff', '0', '1', '1', '1', 'Enabled', 'sample@gmai.com', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_online`
--

CREATE TABLE `user_online` (
  `session` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_online`
--

INSERT INTO `user_online` (`session`, `time`) VALUES
('6h8bga2u9d0nheio5343duk2tb', 1555990050);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `customer_order`
--
ALTER TABLE `customer_order`
  ADD PRIMARY KEY (`customer_order_id`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`history_id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`inventory_id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`notification_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_code`);

--
-- Indexes for table `shipping_fee`
--
ALTER TABLE `shipping_fee`
  ADD PRIMARY KEY (`shipping_id`);

--
-- Indexes for table `stockin`
--
ALTER TABLE `stockin`
  ADD PRIMARY KEY (`stockin_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `temp_cart`
--
ALTER TABLE `temp_cart`
  ADD PRIMARY KEY (`temp_cart_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` bigint(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2385248414825757;

--
-- AUTO_INCREMENT for table `customer_order`
--
ALTER TABLE `customer_order`
  MODIFY `customer_order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=498;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `history_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1221;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `inventory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=372;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `shipping_fee`
--
ALTER TABLE `shipping_fee`
  MODIFY `shipping_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `stockin`
--
ALTER TABLE `stockin`
  MODIFY `stockin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=678;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `temp_cart`
--
ALTER TABLE `temp_cart`
  MODIFY `temp_cart_id` bigint(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=425;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
