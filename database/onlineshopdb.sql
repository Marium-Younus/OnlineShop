-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2019 at 10:57 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlineshopdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `image` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `image`) VALUES
(1, 111),
(2, 112);

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `id` int(11) NOT NULL,
  `orderId` varchar(50) NOT NULL,
  `userId` int(11) NOT NULL,
  `date` date NOT NULL,
  `discount` decimal(10,2) DEFAULT NULL,
  `total` decimal(10,2) NOT NULL,
  `payment` int(11) NOT NULL,
  `address` varchar(100) NOT NULL,
  `notes` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bills`
--

INSERT INTO `bills` (`id`, `orderId`, `userId`, `date`, `discount`, `total`, `payment`, `address`, `notes`) VALUES
(3, 't4v6wjn5rf', 3, '2019-09-18', NULL, '69.85', 1, '2748  Fallon Drive, Thorndale, Canada', 'Test Order'),
(8, 'eke1mvlkogt', 3, '2019-08-20', NULL, '50.00', 1, '2748  Fallon Drive, Thorndale, Canada', ''),
(9, 'vz7tjb0zxhr', 3, '2019-10-15', NULL, '48.00', 2, '2748  Fallon Drive, Thorndale, Canada', ''),
(14, 'v3kgxenp41', 8, '2019-03-03', NULL, '387.20', 1, '1147  Leslie Street, Newmarket, Canada', ''),
(15, '0lu3y4oo8fkd', 4, '2019-07-17', NULL, '195.15', 2, '3925  Hamilton Street, Clarence Creek, Canada', ''),
(16, 'ywlgbybn3me', 6, '2019-06-12', NULL, '12.00', 1, '4036  th Street, Wetaskiwin, Canada', ''),
(17, 'rdrq0ml0lsg', 7, '2019-11-02', NULL, '161.00', 2, '4957  St. Paul Street, Fort Erie, Canada', ''),
(18, 'bb8u8cpkjy4', 5, '2019-05-28', NULL, '116.45', 2, '729  rue des ï¿½glises Est, Morin Heights, Canada', ''),
(19, 'cflrzqrucrh', 7, '2019-02-28', NULL, '106.95', 2, '4957  St. Paul Street, Fort Erie, Canada', ''),
(20, 'stn444dpg3', 7, '2019-01-28', NULL, '93.70', 2, '4957  St. Paul Street, Fort Erie, Canada', ''),
(21, '1e72j7ntdj9', 7, '2019-04-28', NULL, '51.95', 2, '4957  St. Paul Street, Fort Erie, Canada', ''),
(22, 'ikwhih33ibs', 7, '2019-09-28', NULL, '323.95', 2, '4957  St. Paul Street, Fort Erie, Canada', ''),
(23, 'nihpqjt3j8', 4, '2019-10-28', NULL, '347.50', 2, '3925  Hamilton Street, Clarence Creek, Canada', ''),
(24, 'w8d40cu7k4', 4, '2019-11-28', NULL, '24.00', 2, '3925  Hamilton Street, Clarence Creek, Canada', ''),
(25, 'l00za82os9e', 5, '2019-10-29', NULL, '216.00', 2, '729  rue des ï¿½glises Est, Morin Heights, Canada', ''),
(26, 'f6guye21pjv', 5, '2019-10-29', NULL, '14.95', 2, '729  rue des ï¿½glises Est, Morin Heights, Canada', ''),
(28, '8l9lzmktpqq', 8, '2019-11-03', NULL, '131.00', 1, '1147  Leslie Street, Newmarket, Canada', ''),
(30, '9fkql798ojg', 4, '2019-11-03', NULL, '155.40', 2, '3925  Hamilton Street, Clarence Creek, Canada', '');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `prodId` int(11) NOT NULL,
  `prodAmt` int(11) NOT NULL,
  `total` float(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `UserId`, `prodId`, `prodAmt`, `total`) VALUES
(77, 4, 5, 1, 39.00);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Makeup'),
(2, 'Jewelry');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `prodId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `body` varchar(200) NOT NULL,
  `created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `prodId`, `userId`, `body`, `created`) VALUES
(1, 30, 4, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', '2019-10-02'),
(2, 24, 7, 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2019-10-02'),
(3, 30, 4, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', '2019-10-04'),
(4, 30, 7, 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo', '2019-10-17'),
(10, 35, 3, 'Testing Comment', '2019-10-27'),
(14, 32, 8, 'Lorem ipsum dolor set amet', '2019-11-03'),
(15, 32, 8, 'Lorem ipsum dolor set amet', '2019-11-03'),
(16, 35, 4, 'Lorem ipsum?', '2019-11-04'),
(17, 31, 4, 'Lorem Ipsum!!', '2019-11-04'),
(18, 28, 4, 'Dolor sit amet?', '2019-11-04'),
(19, 22, 4, 'Dolor sit amet!!', '2019-11-04'),
(20, 14, 4, 'Lorem ipsum?', '2019-11-04');

-- --------------------------------------------------------

--
-- Table structure for table `empinfo`
--

CREATE TABLE `empinfo` (
  `Id` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `PhoneNumber` varchar(50) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `City` varchar(50) NOT NULL,
  `Country` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `empinfo`
--

INSERT INTO `empinfo` (`Id`, `UserId`, `FirstName`, `LastName`, `PhoneNumber`, `Address`, `City`, `Country`) VALUES
(1, 1, 'Jenny', 'Yoel', '5197913058', '255  Goyeau Ave', 'Windsor', 'Canada'),
(2, 2, 'Maria', 'Sharapova', '9058017999', '1503  Lynden Road', 'Windsor', 'Canada');

-- --------------------------------------------------------

--
-- Table structure for table `gender`
--

CREATE TABLE `gender` (
  `id` int(11) NOT NULL,
  `gender` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gender`
--

INSERT INTO `gender` (`id`, `gender`) VALUES
(1, 'Female'),
(2, 'Male'),
(3, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created` date NOT NULL,
  `status` tinyint(1) NOT NULL,
  `path` varchar(50) NOT NULL,
  `imgCategory` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `name`, `created`, `status`, `path`, `imgCategory`) VALUES
(1, 'parallax-07.jpg', '2019-07-04', 0, 'images/layout/', 1),
(2, 'slide04.jpg', '2019-10-01', 0, 'images/layout/', 2),
(9, 'banner-10.jpg', '2019-10-10', 0, 'images/layout/', 2),
(10, 'slide12.jpg', '2019-10-10', 0, 'images/layout/', 2),
(11, 'slide02.jpg', '2019-10-01', 0, 'images/layout/', 2),
(14, 'banner-09.jpg', '2019-10-21', 0, 'images/layout/', 7),
(15, 'parallax-07.jpg', '2019-10-21', 0, 'images/products/', 3),
(33, 'intro01.jpg', '2019-10-21', 1, '../public/images/', 3),
(34, 'intro02.jpg', '2019-10-21', 1, '../public/images/', 3),
(35, 'empty.png', '2019-10-21', 1, 'images/layout/', 3),
(36, 'logo-1-wt-slogan.png', '2019-10-21', 1, 'images/layout/', 7),
(37, 'parallax-03.jpg', '2019-10-21', 1, 'images/layout/', 7),
(38, 'parallax-10.jpg', '2019-10-21', 1, 'images/products/', 3),
(39, '31.jpg', '2019-10-02', 1, 'images/layout/', 7),
(40, '19.jpg', '2019-10-02', 1, 'images/layout/', 7),
(41, '20.jpg', '2019-10-09', 1, 'images/layout/', 7),
(42, 'barrette01.png', '2019-08-31', 1, 'images/products/', 3),
(43, 'barrette02.png', '2019-10-01', 1, 'images/products/', 3),
(44, 'blush01.jpg', '2019-10-01', 1, 'images/products/', 3),
(45, 'blush02.jpg', '2019-10-02', 1, 'images/products/', 3),
(46, 'blush03.jpg', '2019-10-01', 1, 'images/products/', 3),
(47, 'bracelet01.png', '2019-10-01', 1, 'images/products/', 3),
(48, 'bracelet02.png', '2019-10-08', 1, 'images/products/', 3),
(49, 'bracelet03.png', '2019-10-08', 1, 'images/products/', 3),
(50, 'bronzer01.jpg', '2019-10-08', 1, 'images/products/', 3),
(51, 'bronzer02.jpg', '2019-10-01', 1, 'images/products/', 3),
(52, '', '2019-10-23', 1, 'images/products/', 3),
(53, 'bronzer03.jpg', '2019-10-23', 1, 'images/products/', 3),
(54, 'brow01.jpg', '2019-10-23', 1, 'images/products/', 3),
(55, 'brow02.jpg', '2019-10-23', 1, 'images/products/', 3),
(56, 'brow03.jpg', '2019-10-23', 1, 'images/products/', 3),
(57, 'concealer01.jpg', '2019-10-23', 1, 'images/products/', 3),
(58, 'concealer02.jpg', '2019-10-23', 1, 'images/products/', 3),
(59, 'concealer03.jpg', '2019-10-23', 1, 'images/products/', 3),
(60, 'earrings01.png', '2019-10-23', 1, 'images/products/', 3),
(61, 'earrings02.png', '2019-10-23', 1, 'images/products/', 3),
(62, 'earrings03.png', '2019-10-23', 1, 'images/products/', 3),
(63, 'esh01.jpg', '2019-10-23', 1, 'images/products/', 3),
(64, 'esh02.jpg', '2019-10-23', 1, 'images/products/', 3),
(65, 'esh03.jpg', '2019-10-23', 1, 'images/products/', 3),
(66, 'foundation01.jpg', '2019-10-23', 1, 'images/products/', 3),
(67, 'foundation02.jpg', '2019-10-23', 1, 'images/products/', 3),
(68, 'foundation03.jpg', '2019-10-23', 1, 'images/products/', 3),
(69, 'highlight01.jpg', '2019-10-23', 1, 'images/products/', 3),
(70, 'highlight02.jpg', '2019-10-23', 1, 'images/products/', 3),
(71, 'highlight03.jpg', '2019-10-23', 1, 'images/products/', 3),
(72, 'jewelry.jpg', '2019-10-23', 1, 'images/products/', 3),
(73, 'liner01.jpg', '2019-10-23', 1, 'images/products/', 3),
(74, 'liner02.jpg', '2019-10-23', 1, 'images/products/', 3),
(75, 'liner03.jpg', '2019-10-23', 1, 'images/products/', 3),
(76, 'lips01.jpg', '2019-10-23', 1, 'images/products/', 3),
(77, 'lips02.jpg', '2019-10-23', 1, 'images/products/', 3),
(78, 'mascara01.jpg', '2019-10-23', 1, 'images/products/', 3),
(79, 'mascara02.jpg', '2019-10-23', 1, 'images/products/', 3),
(80, 'mascara03.jpg', '2019-10-23', 1, 'images/products/', 3),
(81, 'neck01.png', '2019-10-23', 1, 'images/products/', 3),
(82, 'neck02.png', '2019-10-23', 1, 'images/products/', 3),
(83, 'neck03.png', '2019-10-23', 1, 'images/products/', 3),
(84, 'necklace01.jpg', '2019-10-23', 1, 'images/products/', 3),
(85, 'necklace02.jpg', '2019-10-23', 1, 'images/products/', 3),
(86, 'necklace03.jpg', '2019-10-23', 1, 'images/products/', 3),
(87, 'necklace04.jpg', '2019-10-23', 1, 'images/products/', 3),
(88, 'primer01.jpg', '2019-10-23', 1, 'images/products/', 3),
(89, 'ring01.png', '2019-10-01', 1, 'images/products/', 3),
(90, 'ring02.png', '2019-10-01', 1, 'images/products/', 3),
(91, 'setting01.jpg', '2019-10-24', 1, 'images/products/', 3),
(92, 'setting02.jpg', '2019-10-24', 1, 'images/products/', 3),
(93, 'primer03.jpg', '2019-10-24', 1, 'images/products/', 3),
(94, 'lips01.jpg', '2019-10-24', 1, 'images/products/', 3),
(95, 'lips02.jpg', '2019-10-24', 1, 'images/products/', 3),
(96, 'lips03.jpg', '2019-10-24', 1, 'images/products/', 3),
(97, 'liner02.jpg', '2019-10-24', 1, 'images/products/', 3),
(98, 'brow01.jpg', '2019-10-24', 1, 'images/products/', 3),
(99, 'jewelry.jpg', '2019-10-31', 1, 'images/products/', 3),
(100, 'item-cart-01.jpg', '2019-10-31', 1, 'images/products/', 3),
(101, 'necklace03.jpg', '2019-11-01', 1, 'images/layout/', 7),
(102, 'necklace02.jpg', '2019-11-01', 1, 'images/layout/', 7),
(103, 'necklace03.jpg', '2019-11-01', 1, 'images/layout/', 7),
(104, 'necklace02.jpg', '2019-11-01', 1, 'images/layout/', 7),
(105, '15.jpg', '2019-11-01', 1, 'images/layout/', 7),
(106, '30.jpg', '2019-11-01', 1, 'images/layout/', 7),
(107, '15.jpg', '2019-11-01', 1, 'images/layout/', 7),
(108, '15.jpg', '2019-11-01', 1, 'images/layout/', 7),
(109, '30.jpg', '2019-11-01', 1, 'images/layout/', 7),
(110, '15.jpg', '2019-11-01', 1, 'images/layout/', 7),
(111, '30.jpg', '2019-11-01', 1, 'images/layout/', 7),
(112, '15.jpg', '2019-11-01', 1, 'images/layout/', 7);

-- --------------------------------------------------------

--
-- Table structure for table `imgcategory`
--

CREATE TABLE `imgcategory` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `imgcategory`
--

INSERT INTO `imgcategory` (`id`, `name`) VALUES
(1, 'parallax'),
(2, 'slider'),
(3, 'product'),
(4, 'intro'),
(5, 'sale'),
(6, 'seasonal'),
(7, 'layout');

-- --------------------------------------------------------

--
-- Table structure for table `imglink`
--

CREATE TABLE `imglink` (
  `id` int(11) NOT NULL,
  `imgId` int(11) NOT NULL,
  `ProdId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `imglink`
--

INSERT INTO `imglink` (`id`, `imgId`, `ProdId`) VALUES
(6, 44, 1),
(7, 45, 2),
(8, 46, 3),
(9, 63, 4),
(10, 64, 5),
(11, 65, 6),
(12, 57, 7),
(13, 58, 8),
(14, 59, 9),
(15, 54, 10),
(16, 55, 10),
(17, 56, 12),
(18, 73, 13),
(19, 74, 14),
(20, 75, 14),
(21, 66, 16),
(22, 67, 17),
(23, 68, 18),
(24, 69, 19),
(25, 70, 20),
(26, 71, 21),
(27, 50, 22),
(28, 51, 23),
(29, 53, 24),
(30, 74, 25),
(31, 73, 26),
(32, 78, 30),
(33, 79, 31),
(34, 88, 32),
(35, 47, 36),
(36, 48, 37),
(37, 60, 38),
(38, 61, 39),
(39, 81, 40),
(40, 83, 41),
(41, 89, 43),
(42, 90, 42),
(43, 92, 35),
(44, 92, 34),
(45, 93, 33),
(46, 94, 29),
(47, 95, 28),
(48, 96, 27),
(49, 75, 15),
(50, 56, 11),
(51, 100, 45);

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `id` int(11) NOT NULL,
  `prodId` int(11) NOT NULL,
  `upper` int(11) NOT NULL,
  `lower` int(11) NOT NULL,
  `current` int(11) NOT NULL,
  `lastUpdated` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `prodId`, `upper`, `lower`, `current`, `lastUpdated`) VALUES
(3, 30, 25, 5, 14, '2019-10-28'),
(4, 2, 25, 5, 12, '2019-10-28'),
(5, 38, 15, 5, 13, '2019-10-28'),
(6, 24, 25, 5, 13, '2019-11-03'),
(8, 12, 25, 8, 20, '2019-10-31'),
(9, 11, 25, 5, 25, '2019-08-01'),
(10, 25, 25, 5, 23, '2019-10-29'),
(11, 43, 25, 5, 23, '2019-10-28'),
(12, 8, 25, 5, 20, '2019-10-31'),
(13, 31, 25, 5, 25, '2019-08-01'),
(14, 15, 25, 5, 25, '2019-08-01'),
(15, 14, 25, 5, 25, '2019-08-01'),
(16, 28, 25, 5, 25, '2019-10-31'),
(17, 39, 15, 5, 13, '2019-10-28'),
(19, 13, 25, 5, 25, '2019-08-01'),
(20, 20, 25, 5, 25, '2019-08-01'),
(21, 6, 25, 5, 25, '2019-08-01'),
(22, 36, 15, 5, 14, '2019-10-28'),
(23, 1, 25, 5, 25, '2019-08-01'),
(24, 22, 25, 5, 25, '2019-08-01'),
(25, 34, 25, 5, 25, '2019-08-01'),
(26, 35, 25, 5, 21, '2019-11-03'),
(27, 40, 15, 5, 12, '2019-10-28'),
(28, 41, 15, 5, 14, '2019-10-28'),
(29, 5, 25, 5, 25, '2019-08-01'),
(30, 3, 25, 5, 25, '2019-08-01'),
(31, 17, 25, 5, 25, '2019-08-01'),
(32, 42, 15, 5, 12, '2019-11-03'),
(33, 32, 25, 5, 18, '2019-10-29'),
(34, 7, 25, 5, 25, '2019-08-01'),
(35, 27, 25, 5, 24, '2019-10-28'),
(36, 16, 25, 5, 25, '2019-08-01'),
(37, 33, 25, 5, 25, '2019-08-01'),
(38, 9, 25, 5, 25, '2019-08-01'),
(39, 21, 25, 5, 24, '2019-10-28'),
(40, 19, 25, 5, 25, '2019-08-01'),
(41, 23, 25, 5, 25, '2019-08-01'),
(42, 18, 25, 5, 25, '2019-08-01'),
(43, 29, 25, 5, 12, '2019-10-28'),
(44, 4, 25, 5, 23, '2019-11-03'),
(45, 37, 15, 5, 14, '2019-10-28');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `orderId` varchar(50) NOT NULL,
  `UserId` int(11) NOT NULL,
  `prodId` int(11) NOT NULL,
  `prodAmt` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `orderStatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `orderId`, `UserId`, `prodId`, `prodAmt`, `total`, `orderStatus`) VALUES
(10, 't4v6wjn5rf', 3, 39, 1, '24.00', 1),
(11, 't4v6wjn5rf', 3, 35, 1, '33.00', 1),
(12, 't4v6wjn5rf', 3, 29, 1, '13.00', 1),
(14, 'eke1mvlkogt', 3, 34, 2, '50.00', 1),
(15, 'vz7tjb0zxhr', 3, 39, 2, '48.00', 1),
(18, 'v3kgxenp41', 8, 29, 1, '13.00', 4),
(19, 'v3kgxenp41', 8, 28, 1, '19.00', 3),
(20, 'v3kgxenp41', 8, 31, 1, '17.00', 5),
(21, 'v3kgxenp41', 8, 30, 1, '23.00', 1),
(22, 'v3kgxenp41', 8, 39, 4, '96.00', 1),
(23, 'v3kgxenp41', 8, 33, 3, '108.00', 1),
(24, 'v3kgxenp41', 8, 41, 1, '45.00', 1),
(25, 'v3kgxenp41', 8, 35, 2, '66.00', 1),
(26, '0lu3y4oo8fkd', 4, 28, 1, '19.00', 4),
(27, '0lu3y4oo8fkd', 4, 43, 2, '31.00', 3),
(28, '0lu3y4oo8fkd', 4, 24, 4, '100.00', 1),
(29, '0lu3y4oo8fkd', 4, 41, 1, '45.00', 1),
(30, 'ywlgbybn3me', 6, 42, 1, '12.00', 1),
(31, 'rdrq0ml0lsg', 7, 30, 7, '161.00', 1),
(32, 'bb8u8cpkjy4', 5, 36, 1, '51.00', 3),
(33, 'bb8u8cpkjy4', 5, 25, 1, '15.00', 4),
(34, 'bb8u8cpkjy4', 5, 27, 1, '15.00', 4),
(35, 'bb8u8cpkjy4', 5, 32, 1, '36.00', 4),
(36, 'cflrzqrucrh', 7, 40, 1, '29.00', 4),
(37, 'cflrzqrucrh', 7, 29, 6, '78.00', 3),
(38, 'stn444dpg3', 7, 30, 1, '23.00', 4),
(39, 'stn444dpg3', 7, 38, 1, '20.00', 4),
(40, 'stn444dpg3', 7, 37, 1, '35.00', 4),
(41, 'stn444dpg3', 7, 21, 1, '15.00', 1),
(42, '1e72j7ntdj9', 7, 30, 1, '23.00', 1),
(43, '1e72j7ntdj9', 7, 40, 1, '29.00', 3),
(44, 'ikwhih33ibs', 7, 40, 1, '29.00', 1),
(45, 'ikwhih33ibs', 7, 39, 1, '24.00', 1),
(46, 'ikwhih33ibs', 7, 2, 9, '180.00', 4),
(47, 'ikwhih33ibs', 7, 29, 7, '91.00', 4),
(48, 'nihpqjt3j8', 4, 38, 1, '20.00', 1),
(49, 'nihpqjt3j8', 4, 28, 17, '327.00', 3),
(50, 'w8d40cu7k4', 4, 39, 1, '24.00', 1),
(51, 'l00za82os9e', 5, 32, 6, '216.00', 1),
(52, 'f6guye21pjv', 5, 25, 1, '15.00', 1),
(53, '8l9lzmktpqq', 8, 4, 1, '31.00', 1),
(54, '8l9lzmktpqq', 8, 24, 4, '100.00', 1),
(55, '8l9lzmktpqq', 8, 4, 1, '31.00', 1),
(56, '8l9lzmktpqq', 8, 24, 4, '100.00', 1),
(57, '9fkql798ojg', 4, 42, 2, '24.00', 1),
(58, '9fkql798ojg', 4, 35, 4, '131.40', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orderstatus`
--

CREATE TABLE `orderstatus` (
  `id` int(11) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderstatus`
--

INSERT INTO `orderstatus` (`id`, `status`) VALUES
(1, 'Pending'),
(2, 'Accepted'),
(3, 'En route'),
(4, 'Delivered'),
(5, 'Declined'),
(6, 'Returned');

-- --------------------------------------------------------

--
-- Table structure for table `paymentmethod`
--

CREATE TABLE `paymentmethod` (
  `id` int(11) NOT NULL,
  `method` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paymentmethod`
--

INSERT INTO `paymentmethod` (`id`, `method`) VALUES
(1, 'Credit/Debit Card'),
(2, 'Cash On Delivery');

-- --------------------------------------------------------

--
-- Table structure for table `productrating`
--

CREATE TABLE `productrating` (
  `id` int(11) NOT NULL,
  `prodId` int(11) NOT NULL,
  `upvotes` int(11) DEFAULT NULL,
  `downvotes` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `category` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `detail` varchar(250) NOT NULL,
  `tags` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `category`, `price`, `detail`, `tags`) VALUES
(1, 'Just Peachy', 18, '16.00', 'MELTING POWDER BLUSH INFUSED WITH PEACH AND SWEET FIG MILK', 'peach pink blush rouge'),
(2, 'Blush Bliss Palette', 18, '20.00', 'Four new, Amazonian clay 12-hour blushes to make every single skin tone glow, housed in a showstoppi', 'peach pink blush rouge palette combo'),
(3, 'MOSAIC GLOW BLUSH', 18, '42.00', 'A MOSAIC BLUSH ACCENTED WITH HIGHLIGHTER AND BRONZER TO CREATE MULTI-DIMENSIONAL LOOKS.', 'blush set glow highlight'),
(4, 'winter wonderglam', 2, '31.00', 'This ultra-luxe value set features your full-glam faves packed in one place! 24 multi-finish shadow ', 'eyes shadows winter collection multiple'),
(5, 'METAL CREME MULTI-USE PALETTE', 2, '39.00', 'Create your own drama with a limited-edition palette of six subversive, multi-use creams in a soft-f', 'eyes shadows winter collection multiple metallic m'),
(6, 'IGNITED EYESHADOW PALETTE', 2, '59.00', 'Tempt with illumination. Captivate with color. Set off seduction with a limited-edition lineup of 12', 'eyes shadows winter collection multiple metallic m'),
(7, 'RADIANT CREAMY CONCEALER', 27, '12.00', 'Buildable. Blendable. Hydrating. Radiant. Coveted by artists and editors for its ability to correct,', 'medium coverage concealer '),
(8, 'dairy free', 27, '21.14', 'A CREASE-PROOF, LONG-LASTING CONCEALER STICK THAT BLENDS BEAUTIFULLY ON SKIN TO CAMOUFLAGE UNDER EYE', 'full coverage creamy cream base concealer'),
(9, 'SOFT MATTE COMPLETE CONCEALER', 27, '30.00', 'A FULL COVERAGE CONCEALER THAT BLURS, CONCEALS, AND SMOOTHS IMPERFECTIONS WITH A SOFT-FOCUS EFFECT. ', 'full coverage matte powder base concealer'),
(11, 'BROW PERFECTOR', 21, '11.39', 'AN ESSENTIAL EYEBROW TOOL FOR FILLING, SHAPING AND DEFINING BROWS', 'brow definition shaping pen filling sharp'),
(12, 'BROW GEL', 21, '24.00', 'A GLOSSY, EASY GLIDING GEL TO HELP TAME, TIDY, AND GROOM EYEBROWS', 'brow setting set tame lasting'),
(13, 'HIGH-PIGMENT LONGWEAR EYELINER', 20, '24.00', 'A HIGHLY PIGMENTED, GEL-LIKE EYELINER PENCIL THAT DELIVERS LONG-LASTING, 12-HOUR WEAR IN 16 MATTE-TO', 'eyeliner pencil pigmented longwear'),
(14, 'EYELINER STYLO', 20, '28.00', 'A HIGH-INTENSITY FELT-TIP LIQUID EYELINER PEN THAT LASTS FOR UP TO 24 HOURS.', 'eyeliner pencil pigmented longwear'),
(15, 'EYELINER PENCIL', 20, '11.00', 'A SMOOTH, BLENDABLE EYELINER PENCIL THAT GLIDES ON EASILY FOR PRECISION, DEFINITION, AND LASH-THICKE', 'eyeliner pencil pigmented longwear'),
(16, 'SHEER GLOW FOUNDATION', 4, '47.00', 'A sheer, buildable foundation with a natural-looking finish that immaculately evens skin tone. Compl', 'foundation face light coverage longwear base'),
(17, 'NATURAL RADIANT LONGWEAR FOUNDATION', 4, '49.00', 'A UNIQUELY LIGHTWEIGHT FOUNDATION THAT PROVIDES 16 HOURS OF FADE-RESISTANT WEAR WITH BUILDABLE, MEDI', 'foundation face full coverage longwear base'),
(18, 'VELVET MATTE FOUNDATION STICK', 4, '45.00', 'AN ARTISTRY ESSENTIAL FOR CREATING A UNIVERSAL, NATURAL GLOW. POWERED BY THE COMPLEXION BRIGHTENING ', 'foundation face full coverage longwear matte base'),
(19, 'STAR SCENE CHEEK PALETTE', 5, '42.00', 'A LIMITED-EDITION STUDIO 54 CHEEK PALETTE FEATURING TWO BLUSHES AND ONE HIGHLIGHTER.', 'highlight palette shimmer sheen cheek'),
(20, 'HIGHLIGHTING POWDER', 5, '23.00', 'No glitter. Just glow. Highlighting hits a new high with the new Highlighting Powder. This uncomprom', 'highlight palette shimmer sheen cheek glow dewy'),
(21, 'Starburst LIQUID HIGHLIGHTER', 5, '15.45', 'Glide it. Gloss it. Go for it. Turn on the iconic, universally flattering glow with four new ways to', 'highlight palette shimmer sheen cheek glow dewy'),
(22, 'LAGUNA LIQUID BRONZER', 19, '40.00', 'A BRONZING FLUID IN THE ICONIC LAGUNA SHADE. SHEER AND ULTRA-VERSATILE, THIS WEIGHTLESS FORMULA CONT', 'bronze contour sunkissed tanning'),
(23, 'SUN WASH DIFFUSING BRONZER', 19, '15.00', 'A NEW DIFFUSING BRONZER THAT CAPTURES THE LIGHT AND BLURS IMPERFECTIONS WITH A SOFT-FOCUS EFFECT. EN', 'matte bronze contour sunkissed tanning'),
(24, 'BRONZING POWDER', 19, '25.00', 'CREATES ALLOVER WARMTH AND NATURAL-LOOKING GLOW. CAN BE USED TO CONTOUR, OR TO CREATE OR ENHANCE THE', 'matte bronze contour sunkissed tanning'),
(25, 'Casablanca', 1, '14.95', 'Pigment. Performance. Passion. Perfection. The first of its kind. The last word on lipstick.', 'lipstick bullet red pigment moisturizing'),
(27, 'Scarlet', 1, '14.95', 'Pigment. Performance. Passion. Perfection. The first of its kind. The last word on lipstick.', 'lipstick bullet red pigment moisturizing'),
(28, 'FULL VINYL LIP LACQUER', 1, '19.25', 'Go to extremes with new Full Vinyl Lip Lacquer. Lips take a dip in mirror-like shine. Creamy formula', 'liquid lipstick red pigment moisturizing'),
(29, 'VELVET MATTE LIP PENCIL', 1, '13.00', 'THIS CULT-FAVORITE LIP PENCIL INSTANTLY SATURATES LIPS WITH RICH PIGMENTS AND A VELVETY MATTE FINISH', 'liquid lippencil red pigment moisturizing'),
(30, 'AUDACIOUS MASCARA', 3, '23.00', 'A BUILDABLE, ALL-IN-ONE MASCARA WITH AN EXCLUSIVE, LASH-CATCHING BRUSH THAT SEPARATES, LENGTHENS, AN', 'mascara lashes voluminous lengthening'),
(31, 'EXPLICIT CONTENT', 3, '17.25', 'Disco. Decadence. The ultimate indulgence. Feel the beat of Studio 54 with a limited-edition collect', 'mascara lashes voluminous lengthening'),
(32, 'RADIANCE PRIMER SPF 35', 26, '36.00', 'A RADIANT PRIMER THAT PREPARES SKIN FOR MAKEUP APPLICATION BY INSTANTLY REVIVING DULL, FATIGUED SKIN', 'primer face pore reducing smoothing'),
(33, 'SMOOTH &amp; PROTECT PRIMER SPF 50', 26, '36.00', 'A SMOOTHING PRIMER THAT PREPARES SKIN FOR MAKEUP APPLICATION BY MINIMIZING THE LOOK OF PORES, FINE L', 'primer face pore reducing smoothing sun protection'),
(34, 'LIGHT REFLECTING LOOSE SETTING POWDER', 22, '25.00', 'Light Reflecting Setting Powder locks your makeup in place with a weightless finish that is undetect', 'setting powder matte finishing longwear'),
(35, 'LIGHT REFLECTING PRESSED SETTING POWDER', 22, '32.85', 'AVAILABLE IN TWO SHADES, THIS WEIGHTLESS PRESSED POWDER CREATES A SHEER, LUMINOUS FINISH THAT APPEAR', 'setting powder matte finishing longwear'),
(36, 'JUSTE UN CLOU BRACELET', 28, '50.55', 'This chunky chain bracelet has an innovative secret--five of its sleek gold links open so you can add charms to them.', 'bracelet jewelry jewellery bangles accessory'),
(37, 'ETINCELLE DE CARTIER', 28, '35.00', 'It\'s easy-on, easy-off with this magnetic hinged bangle, the latest addition to our popular Contempo Collection. Simple, clean design ideal for stacking or wearing alone.', 'bracelet jewelry jewellery bangles accessory'),
(38, 'Twinkled Star Earrings', 25, '20.25', 'Freshwater pearls add a regal effect to these sparkling earrings inspired by the Alcazar Palace in Seville, Spain', 'ears earring jewelry jewellery accessory'),
(39, 'Halo Eclipse Leverback Earrings', 25, '24.00', 'Intensely blue hand-painted enamel encircles twilight-hued Swarovski crystals for starry effect on these leverback earrings', 'ears earring jewelry jewellery accessory'),
(40, 'Meridian Necklace', 23, '28.95', 'A touch of gold on each barrel station of pave Swarovski lends warmth to this fine jewelry-like collection. Wear this necklace and expect compliments.', 'neck necklace jewelry jewellery accessory'),
(41, 'Meridian Petite Station Necklace', 23, '45.00', 'An instant classic, this silver beaded necklace offers the refinement of the Meridian Collection motif for a fine jewelry feel.', 'neck necklace jewelry jewellery accessory'),
(42, 'Neptune\'s Ring', 24, '12.00', 'Inspired by the mystery of planet Neptune, our designer created this cleverly \"stacked\" ring. Its rings are fused together, with a narrow base for comfort. A chic, hip look! Mixed metals gives it ultimate versatility.', 'rings ring jewelry jewellery accessory'),
(43, 'Christo Queen Wide Ring', 24, '15.45', 'Match your Queen Christo Cuff bracelet with a metalwork ring echoing the same design! (Sorry, not compatible with leather inserts.)', 'rings ring jewelry jewellery accessory');

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE `replies` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `commentId` int(11) NOT NULL,
  `body` varchar(200) NOT NULL,
  `created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `replies`
--

INSERT INTO `replies` (`id`, `userId`, `commentId`, `body`, `created`) VALUES
(1, 8, 2, 'Duis aute irure dolor in.', '2019-10-16'),
(2, 6, 2, 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. ', '2019-10-23'),
(3, 4, 4, 'Lorem?', '2019-11-04'),
(4, 8, 16, 'Dolor sit amet', '2019-11-04'),
(5, 8, 10, 'Test reply', '2019-11-04');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `Id` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`Id`, `Name`) VALUES
(1, 'Admin'),
(2, 'Employee'),
(3, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `image` varchar(50) NOT NULL,
  `exc` varchar(50) DEFAULT NULL,
  `title` varchar(50) NOT NULL,
  `detail` varchar(50) DEFAULT NULL,
  `btn` varchar(50) NOT NULL,
  `src` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `image`, `exc`, `title`, `detail`, `btn`, `src`) VALUES
(1, '104', 'New!', 'Jewelry', 'Lorem Ipsum Solor Sit Amet', 'Browse', 'products.php?page=2'),
(2, '40', '', 'Soft Neutrals', 'Lorem Ipsum Solor ', 'Shop Now', 'products.php?page=1'),
(3, '41', 'New!', 'Glamorous', 'Lorem Ipsum Solor ', 'Shop Now', 'products.php?page=1');

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`id`, `name`, `category`) VALUES
(1, 'Lipstick', 1),
(2, 'Eyeshadow', 1),
(3, 'Mascara', 1),
(4, 'Foundation', 1),
(5, 'Highlight', 1),
(18, 'Blush', 1),
(19, 'Bronzer', 1),
(20, 'Eyeliner', 1),
(21, 'Eyebrow', 1),
(22, 'Setting', 1),
(23, 'Necklace', 2),
(24, 'Ring', 2),
(25, 'Earring', 2),
(26, 'Primer', 1),
(27, 'Concealer', 1),
(28, 'Bracelets', 2),
(29, 'Barrette', 2);

-- --------------------------------------------------------

--
-- Table structure for table `userinfo`
--

CREATE TABLE `userinfo` (
  `Id` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) DEFAULT NULL,
  `Gender` int(11) NOT NULL,
  `PhoneNumber` varchar(50) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `City` varchar(50) NOT NULL,
  `Country` varchar(50) NOT NULL,
  `PostalCode` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userinfo`
--

INSERT INTO `userinfo` (`Id`, `UserId`, `FirstName`, `LastName`, `Gender`, `PhoneNumber`, `Address`, `City`, `Country`, `PostalCode`) VALUES
(1, 3, 'Jane', 'Doe', 1, '5194616530', '2748  Fallon Drive', 'Thorndale', 'Canada', 'G0J0V2'),
(2, 4, 'Anna', 'Wintour', 1, '6134882746', '3925  Hamilton Street', 'Clarence Creek', 'Canada', 'K0A1N0'),
(3, 5, 'Arya', 'Stark', 1, '4502267813', '729  rue des Eglises Est', 'Morin Heights', 'Canada', 'J0R1H0'),
(4, 6, 'Jon', 'Stalinskti', 2, '7803124931', '4036  th Street', 'Wetaskiwin', 'Canada', 'T9A1N8'),
(5, 7, 'Ciel', 'Phantomhive', 2, '2893218049', '4957  St. Paul Street', 'Fort Erie', 'Canada', 'L2A1P3'),
(6, 8, 'Inej', NULL, 1, '9058363556', '1147  Leslie Street', 'Newmarket', 'Canada', 'L3Y2A3'),
(9, 9, 'Test', 'Test', 1, '1232353556', 'Test', 'Test', 'Test', 'RET123');

-- --------------------------------------------------------

--
-- Table structure for table `userroles`
--

CREATE TABLE `userroles` (
  `id` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `RoleId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userroles`
--

INSERT INTO `userroles` (`id`, `UserId`, `RoleId`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 3),
(4, 4, 3),
(5, 5, 3),
(6, 6, 3),
(7, 7, 3),
(8, 8, 3),
(11, 9, 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Id` int(11) NOT NULL,
  `UserName` varchar(50) NOT NULL,
  `PasswordHash` varchar(100) NOT NULL,
  `Email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Id`, `UserName`, `PasswordHash`, `Email`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com'),
(2, 'employee', 'employee', 'emp@gmail.com'),
(3, 'user', 'user', 'user@gmail.com'),
(4, 'anna', 'user', 'anna@gmail.com'),
(5, 'arya', 'user', 'arya@gmail.com'),
(6, 'jon', 'user', 'jon@gmail.com'),
(7, 'ciel', 'user', 'ciel@gmail.com'),
(8, 'inej', 'user', 'inej@gmail.com'),
(9, 'test', 'user', 'test@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `orderId` (`orderId`),
  ADD KEY `userId` (`userId`),
  ADD KEY `payment` (`payment`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prodId` (`prodId`),
  ADD KEY `UserId` (`UserId`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`),
  ADD KEY `prodId` (`prodId`);

--
-- Indexes for table `empinfo`
--
ALTER TABLE `empinfo`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `UserId` (`UserId`);

--
-- Indexes for table `gender`
--
ALTER TABLE `gender`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `imgCategory` (`imgCategory`);

--
-- Indexes for table `imgcategory`
--
ALTER TABLE `imgcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `imglink`
--
ALTER TABLE `imglink`
  ADD PRIMARY KEY (`id`),
  ADD KEY `imgId` (`imgId`),
  ADD KEY `ProdId` (`ProdId`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `prodId` (`prodId`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `UserId` (`UserId`),
  ADD KEY `orderStatus` (`orderStatus`);

--
-- Indexes for table `orderstatus`
--
ALTER TABLE `orderstatus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paymentmethod`
--
ALTER TABLE `paymentmethod`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productrating`
--
ALTER TABLE `productrating`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prodId` (`prodId`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category` (`category`);

--
-- Indexes for table `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`),
  ADD KEY `commentId` (`commentId`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category` (`category`);

--
-- Indexes for table `userinfo`
--
ALTER TABLE `userinfo`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `UserId` (`UserId`),
  ADD KEY `Gender` (`Gender`);

--
-- Indexes for table `userroles`
--
ALTER TABLE `userroles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `RoleId` (`RoleId`),
  ADD KEY `UserId` (`UserId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `empinfo`
--
ALTER TABLE `empinfo`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `gender`
--
ALTER TABLE `gender`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `imgcategory`
--
ALTER TABLE `imgcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `imglink`
--
ALTER TABLE `imglink`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `orderstatus`
--
ALTER TABLE `orderstatus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `paymentmethod`
--
ALTER TABLE `paymentmethod`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `productrating`
--
ALTER TABLE `productrating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `replies`
--
ALTER TABLE `replies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `userinfo`
--
ALTER TABLE `userinfo`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `userroles`
--
ALTER TABLE `userroles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bills`
--
ALTER TABLE `bills`
  ADD CONSTRAINT `bills_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `userinfo` (`UserId`),
  ADD CONSTRAINT `bills_ibfk_2` FOREIGN KEY (`payment`) REFERENCES `paymentmethod` (`id`);

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`prodId`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`UserId`) REFERENCES `userinfo` (`UserId`);

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `userinfo` (`UserId`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`prodId`) REFERENCES `products` (`id`);

--
-- Constraints for table `empinfo`
--
ALTER TABLE `empinfo`
  ADD CONSTRAINT `empinfo_ibfk_1` FOREIGN KEY (`UserId`) REFERENCES `users` (`Id`);

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_3` FOREIGN KEY (`imgCategory`) REFERENCES `imgcategory` (`id`);

--
-- Constraints for table `inventory`
--
ALTER TABLE `inventory`
  ADD CONSTRAINT `inventory_ibfk_1` FOREIGN KEY (`prodId`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`UserId`) REFERENCES `users` (`Id`),
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`orderStatus`) REFERENCES `orderstatus` (`id`);

--
-- Constraints for table `productrating`
--
ALTER TABLE `productrating`
  ADD CONSTRAINT `productrating_ibfk_1` FOREIGN KEY (`prodId`) REFERENCES `products` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category`) REFERENCES `subcategory` (`id`);

--
-- Constraints for table `replies`
--
ALTER TABLE `replies`
  ADD CONSTRAINT `replies_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `userinfo` (`UserId`),
  ADD CONSTRAINT `replies_ibfk_2` FOREIGN KEY (`commentId`) REFERENCES `comment` (`id`);

--
-- Constraints for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD CONSTRAINT `subcategory_ibfk_1` FOREIGN KEY (`category`) REFERENCES `categories` (`id`);

--
-- Constraints for table `userinfo`
--
ALTER TABLE `userinfo`
  ADD CONSTRAINT `userinfo_ibfk_1` FOREIGN KEY (`UserId`) REFERENCES `users` (`Id`),
  ADD CONSTRAINT `userinfo_ibfk_2` FOREIGN KEY (`Gender`) REFERENCES `gender` (`id`);

--
-- Constraints for table `userroles`
--
ALTER TABLE `userroles`
  ADD CONSTRAINT `userroles_ibfk_1` FOREIGN KEY (`RoleId`) REFERENCES `roles` (`Id`),
  ADD CONSTRAINT `userroles_ibfk_2` FOREIGN KEY (`UserId`) REFERENCES `users` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
