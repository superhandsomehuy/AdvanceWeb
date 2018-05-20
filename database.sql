-- phpMyAdmin SQL Dump
-- version 4.0.10.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 20, 2018 at 10:28 PM
-- Server version: 5.1.73
-- PHP Version: 7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `advanceweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `ad_email` varchar(100) NOT NULL,
  `ad_password` varchar(100) NOT NULL,
  `ad_name` varchar(100) NOT NULL,
  `ad_dob` date NOT NULL,
  `ad_street` varchar(100) NOT NULL,
  `ad_suburb` varchar(50) NOT NULL,
  `ad_state` varchar(20) NOT NULL,
  `ad_country` varchar(30) NOT NULL,
  `ad_postcode` int(10) NOT NULL,
  `ad_phone` int(20) NOT NULL,
  PRIMARY KEY (`ad_email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ad_email`, `ad_password`, `ad_name`, `ad_dob`, `ad_street`, `ad_suburb`, `ad_state`, `ad_country`, `ad_postcode`, `ad_phone`) VALUES
('saoud@shopping.com', '68c6c49ff31bc508f250371fad1a61e9693d691c', 'Saoud Nazir', '2018-05-01', '61 Spencer St', 'Melbourne', 'VIC', 'Australia', 3000, 412599903);

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE IF NOT EXISTS `brands` (
  `b_name` varchar(100) NOT NULL,
  `b_address` varchar(100) NOT NULL,
  `b_phone` int(20) NOT NULL,
  `b_email` varchar(100) NOT NULL,
  PRIMARY KEY (`b_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`b_name`, `b_address`, `b_phone`, `b_email`) VALUES
('Armani', 'Westfield Doncaster', 123142123, 'armani@armani'),
('Levi''s', 'Westfield Doncaster', 124123123, 'lewis@lewis.com'),
('Zara', 'Westfield Doncaster', 123456, 'zara@zara.com');

-- --------------------------------------------------------

--
-- Table structure for table `cards`
--

CREATE TABLE IF NOT EXISTS `cards` (
  `c_email` varchar(100) NOT NULL,
  `card_num` int(11) NOT NULL,
  `exp_month` int(11) NOT NULL,
  `exp_year` int(11) NOT NULL,
  `card_cvv` int(11) NOT NULL,
  KEY `c_email` (`c_email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cards`
--

INSERT INTO `cards` (`c_email`, `card_num`, `exp_month`, `exp_year`, `card_cvv`) VALUES
('saoud@gmail.com', 1234, 12, 12, 123),
('test@gmail.com', 2147483647, 12, 1234, 456),
('test@abc.com.au.aaaa', 123, 12, 123, 123),
('manhhuyvo@gmail.com', 123, 12, 12, 134),
('huy_is_testing@gmail.com', 11, 11, 1111, 111),
('huynowtest@gmail.com', 123456789, 12, 1234, 123);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `c_email` varchar(100) NOT NULL,
  `p_id` int(5) NOT NULL,
  KEY `c_email` (`c_email`),
  KEY `p_id` (`p_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `c_email` varchar(100) NOT NULL,
  `c_password` varchar(100) NOT NULL,
  `c_name` varchar(100) NOT NULL,
  `c_dob` date NOT NULL,
  `c_street` varchar(100) NOT NULL,
  `c_suburb` varchar(50) NOT NULL,
  `c_state` varchar(20) NOT NULL,
  `c_country` varchar(30) NOT NULL,
  `c_postcode` int(4) NOT NULL,
  `c_phone` int(20) NOT NULL,
  PRIMARY KEY (`c_email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`c_email`, `c_password`, `c_name`, `c_dob`, `c_street`, `c_suburb`, `c_state`, `c_country`, `c_postcode`, `c_phone`) VALUES
('huynowtest@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Manh Huy', '1111-11-12', '', 'abc', '', 'abc', 1234, 914091988),
('huy_is_testing@gmail.com', 'a9993e364706816aba3e25717850c26c9cd0d89d', 'Huy', '1111-11-11', '', 'Carlton', '', 'Australia', 3053, 452597206),
('manhhuyvo@gmail.com', 'a9993e364706816aba3e25717850c26c9cd0d89d', 'a', '1111-12-12', '', 'AQWE', '', 'das', 1234, 123),
('saoud@gmail.com', '68c6c49ff31bc508f250371fad1a61e9693d691c', 'Huy', '2018-05-17', '740 Spencer', 'Melbourne', 'VIC', 'Australia', 3000, 987654321),
('test@abc.com.au.aaaa', '68c6c49ff31bc508f250371fad1a61e9693d691c', 'Saoud', '1212-12-12', '', 'ABC XYZ', '', '123', 1234, 132132),
('test@gmail.com', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'Manh Huy Vo', '1997-06-20', '746 swanston st', 'Carlton', '', 'Australia', 3053, 452597206);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `o_id` int(5) NOT NULL AUTO_INCREMENT,
  `c_email` varchar(100) NOT NULL,
  `p_id` int(5) NOT NULL,
  `o_date` date NOT NULL,
  `o_status` varchar(30) NOT NULL,
  `o_price` int(10) NOT NULL,
  PRIMARY KEY (`o_id`),
  UNIQUE KEY `o_id` (`o_id`),
  KEY `c_email` (`c_email`),
  KEY `p_id` (`p_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`o_id`, `c_email`, `p_id`, `o_date`, `o_status`, `o_price`) VALUES
(1, 'saoud@gmail.com', 1, '2018-05-21', 'Delivered', 123),
(4, 'saoud@gmail.com', 2, '2018-05-11', 'Pending', 120),
(5, 'saoud@gmail.com', 2, '2018-05-09', 'Pending', 123),
(6, 'saoud@gmail.com', 1, '2018-05-09', 'Pending', 123),
(7, 'saoud@gmail.com', 1, '2018-05-09', 'Delivered', 123),
(8, 'saoud@gmail.com', 1, '2018-05-09', 'Delivered', 123);

-- --------------------------------------------------------

--
-- Table structure for table `o_p`
--

CREATE TABLE IF NOT EXISTS `o_p` (
  `p_id` int(5) NOT NULL,
  `o_id` int(5) NOT NULL,
  KEY `o_id` (`o_id`),
  KEY `p_id` (`p_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `p_id` int(5) NOT NULL,
  `p_name` varchar(100) NOT NULL,
  `p_size` varchar(3) NOT NULL,
  `p_color` varchar(20) NOT NULL,
  `p_price` int(10) NOT NULL,
  `p_stock` varchar(20) NOT NULL,
  `b_name` varchar(100) NOT NULL,
  `p_image` varchar(1000) NOT NULL,
  `p_date_add` date NOT NULL,
  `p_category` varchar(20) DEFAULT NULL,
  `p_clicks` int(11) NOT NULL,
  PRIMARY KEY (`p_id`),
  KEY `b_name` (`b_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`p_id`, `p_name`, `p_size`, `p_color`, `p_price`, `p_stock`, `b_name`, `p_image`, `p_date_add`, `p_category`, `p_clicks`) VALUES
(1, 'Zara T-Shirt', 'M', 'Blue', 100, '10', 'Zara', '0001.jpg', '2018-05-20', 'Men', 12),
(2, 'Armani T-Shirt', 'L', 'White', 120, '10', 'Armani', '0002.jpg', '2018-05-20', 'Men', 23),
(3, 'Levi''s T-Shirt', 'XXL', 'White', 50, '10', 'Levi''s', '0003.jpg', '2018-05-20', 'Men', 2435),
(4, 'Armani T-Shirt', 'L', 'Blue', 70, '10', 'Armani', '0004.jpg', '2018-05-20', 'Men', 12),
(5, 'Zara Skirt', 'L', 'Black', 150, '10', 'Zara', '1112.jpg', '2018-05-20', 'Women', 234),
(6, 'Armani Skirt', 'M', 'Black', 50, '10', 'Armani', '1113.jpg', '2018-05-20', 'Women', 567),
(7, 'Fancy Skirt', 'S', 'Green', 40, '10', 'Zara', '1114.jpg', '2018-05-20', 'Women', 5645);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cards`
--
ALTER TABLE `cards`
  ADD CONSTRAINT `cards_ibfk_1` FOREIGN KEY (`c_email`) REFERENCES `customer` (`c_email`);

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`c_email`) REFERENCES `customer` (`c_email`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`p_id`) REFERENCES `products` (`p_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`c_email`) REFERENCES `customer` (`c_email`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`p_id`) REFERENCES `products` (`p_id`);

--
-- Constraints for table `o_p`
--
ALTER TABLE `o_p`
  ADD CONSTRAINT `o_p_ibfk_1` FOREIGN KEY (`o_id`) REFERENCES `orders` (`o_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `o_p_ibfk_2` FOREIGN KEY (`p_id`) REFERENCES `products` (`p_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`b_name`) REFERENCES `brands` (`b_name`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
