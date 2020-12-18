-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2017 at 03:21 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-shoper`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(10) NOT NULL,
  `admin_user` varchar(100) NOT NULL,
  `admin_pass` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_user`, `admin_pass`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(10) NOT NULL,
  `brand_title` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(6, 'LEVI''S'),
(7, 'PUMA'),
(8, 'RAYMOND'),
(9, 'PETER ENGLEND'),
(10, 'STYLES');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `p_id` int(10) NOT NULL,
  `ip_add` varchar(255) NOT NULL,
  `qty` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(10) NOT NULL,
  `cat_title` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(6, 'JEANS'),
(7, 'SHIRT'),
(8, 'T-SHIRT'),
(9, 'TROUSER'),
(10, 'SHORT TOP'),
(11, 'LONG TOP');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `custom_id` int(10) NOT NULL,
  `custom_name` varchar(100) NOT NULL,
  `custom_email` varchar(30) NOT NULL,
  `custom_password` varchar(100) NOT NULL,
  `custom_country` text NOT NULL,
  `custom_city` text NOT NULL,
  `custom_mob` varchar(255) NOT NULL,
  `custom_address` text NOT NULL,
  `custom_image` text NOT NULL,
  `custom_ip` int(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`custom_id`, `custom_name`, `custom_email`, `custom_password`, `custom_country`, `custom_city`, `custom_mob`, `custom_address`, `custom_image`, `custom_ip`) VALUES
(31, 'Sumeet ', 'sumeetbhardwaj88@gmail.com', '123456', 'India', 'Bhiwani', '9813313393', 'Bhiwani', '$_12_(58).JPG', 0);

-- --------------------------------------------------------

--
-- Table structure for table `customer_order`
--

CREATE TABLE `customer_order` (
  `order_id` int(10) NOT NULL,
  `custom_id` int(10) NOT NULL,
  `due_amount` int(100) NOT NULL,
  `invoice_no` int(100) NOT NULL,
  `total_products` int(100) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `order_status` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_order`
--

INSERT INTO `customer_order` (`order_id`, `custom_id`, `due_amount`, `invoice_no`, `total_products`, `order_date`, `order_status`) VALUES
(142, 31, 10000, 1361630809, 2, '2017-06-06 01:06:32', 'Panding'),
(141, 31, 7500, 1606937814, 2, '2017-06-04 13:42:44', 'Panding');

-- --------------------------------------------------------

--
-- Table structure for table `humnes_cats`
--

CREATE TABLE `humnes_cats` (
  `hum_id` int(10) NOT NULL,
  `hum_title` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `humnes_cats`
--

INSERT INTO `humnes_cats` (`hum_id`, `hum_title`) VALUES
(10, 'MENS'),
(11, 'WOMENS'),
(12, 'KIDS');

-- --------------------------------------------------------

--
-- Table structure for table `pandding_order`
--

CREATE TABLE `pandding_order` (
  `order_id` int(10) NOT NULL,
  `custom_id` int(10) NOT NULL,
  `invoice_no` int(100) NOT NULL,
  `product_id` int(10) NOT NULL,
  `qty` int(10) NOT NULL,
  `order_status` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pandding_order`
--

INSERT INTO `pandding_order` (`order_id`, `custom_id`, `invoice_no`, `product_id`, `qty`, `order_status`) VALUES
(124, 31, 1361630809, 21, 1, 'Panding'),
(123, 31, 1606937814, 27, 1, 'Panding');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(10) NOT NULL,
  `invoice_No` int(10) NOT NULL,
  `amount` int(10) NOT NULL,
  `payment_method` text NOT NULL,
  `tr` int(10) NOT NULL,
  `code` int(10) NOT NULL,
  `date` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pro_id` int(10) NOT NULL,
  `pro_hum` int(10) NOT NULL,
  `pro_cat` int(10) NOT NULL,
  `pro_brand` int(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `pro_title` text NOT NULL,
  `pro_img1` text NOT NULL,
  `pro_img2` text NOT NULL,
  `pro_img3` text NOT NULL,
  `pro_price` int(10) NOT NULL,
  `pro_desc` text NOT NULL,
  `status` text NOT NULL,
  `pro_keyword` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pro_id`, `pro_hum`, `pro_cat`, `pro_brand`, `date`, `pro_title`, `pro_img1`, `pro_img2`, `pro_img3`, `pro_price`, `pro_desc`, `status`, `pro_keyword`) VALUES
(20, 10, 6, 6, '2017-06-01 07:20:39', 'JEANS ', '$_12_(14).JPG', '$_12_(13).JPG', '$_12_(15).JPG', 3500, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', 'on', 'JEANS MEN LEVIS '),
(21, 10, 8, 6, '2017-06-01 07:23:07', 'T-SHIRT', '$_12_(57).JPG', '$_12_(58).JPG', '$_12_(56).JPG', 4000, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.\r\n', 'on', 'T-SHIRT MEN LEVIS'),
(22, 11, 6, 6, '2017-06-01 07:24:41', 'JEANS', '$_12_(97).JPG', '$_12_(96).JPG', '$_12_(98).JPG', 3000, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.\r\n', 'on', 'JEANS WOMEN LEVIS '),
(23, 11, 10, 6, '2017-06-01 07:27:04', 'SHORT TOP', 'Lara-Karen-Short-Slv-Top-With-Cut--Cold-Shoulder-5632-3241691-4-pdp_slider_l.jpg', 'Lara-Karen-Short-Slv-Top-With-Cut--Cold-Shoulder-5630-3241691-2-pdp_slider_l.jpg', 'Lara-Karen-Short-Slv-Top-With-Cut--Cold-Shoulder-5631-3241691-3-pdp_slider_l.jpg', 1500, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.\r\n', 'on', 'SHORT TOP WOMEN LEVIS'),
(24, 10, 7, 6, '2017-06-01 07:29:01', 'SHIRT', '$_12_(90).JPG', '$_12_(89).JPG', '$_12_(91).JPG', 1300, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.\r\n', 'on', 'SHIRT FORMAL MEN LEVIS SIMPL'),
(25, 11, 11, 6, '2017-06-01 07:30:26', 'LONG TOP', '$_0.JPG', '$_0(3.JPG', '$_0(2.JPG', 5000, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.\r\n', 'on', 'LONG TOP WOMEN LEVIS RED'),
(26, 11, 9, 7, '2017-06-01 07:41:27', 'TROUSER', 'Levi-s-Navy-Blue-Solid-Mid-Rise-Skinny-Jeans-6641-2614002-2-pdp_slider_l.jpg', 'Levi-s-Navy-Blue-Solid-Mid-Rise-Skinny-Jeans-6642-2614002-3-pdp_slider_l.jpg', 'Levi-s-Navy-Blue-Solid-Mid-Rise-Skinny-Jeans-6643-2614002-4-pdp_slider_l.jpg', 1250, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', 'on', 'TROUSER WOMEN PUMA BLACK'),
(27, 11, 11, 9, '2017-06-01 07:42:43', 'LONG TOP', '$_16(4.JPG', '$_16.JPG', '$_16(2.JPG', 6000, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', 'on', 'LONG TOP WOMEN PUMA WHITE'),
(28, 11, 9, 8, '2017-06-01 07:58:26', 'TROUSER', 'Only-Off-White-Solid-Chinos-3958-3520402-2-pdp_slider_l.jpg', 'Only-Off-White-Solid-Chinos-3958-3520402-3-pdp_slider_l.jpg', 'Only-Off-White-Solid-Chinos-3959-3520402-4-pdp_slider_l.jpg', 800, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', 'on', 'TROUSER WOMEN RAYMOND WHITE'),
(29, 12, 6, 9, '2017-06-01 17:50:28', 'KIDS WEARS', 's1.jpg', 's2.jpg', 's3.jpg', 1500, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', 'on', 'KIDS WEAR KURTA PAYJAMA JEANS PETER ENGLEND'),
(30, 10, 7, 10, '2017-06-06 01:11:29', 'SHIRT', '$_12_(76).JPG', '$_12_(77).JPG', '$_12_(78).JPG', 12000, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', 'on', 'SHIRT FORMAL MEN STYLE SIMPL'),
(31, 10, 8, 9, '2017-06-06 01:12:52', 'T-SHIRT', '$_12_(64).JPG', '$_12_(66).JPG', '$_12_(67).JPG', 2500, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', 'on', 'T-SHIRT MEN PETER ENGLEND'),
(32, 11, 9, 9, '2017-06-06 01:14:57', 'TROUSER', 'Dorothy-Perkins-Mono-Floral-Wide-Crop-Trouser-0045-0709991-2-pdp_slider_l.jpg', 'Dorothy-Perkins-Mono-Floral-Wide-Crop-Trouser-0045-0709991-3-pdp_slider_l.jpg', 'Dorothy-Perkins-Mono-Floral-Wide-Crop-Trouser-0046-0709991-4-pdp_slider_l.jpg', 1000, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', 'on', 'TROUSER WOMEN PETER ENGLEND');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`custom_id`);

--
-- Indexes for table `customer_order`
--
ALTER TABLE `customer_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `humnes_cats`
--
ALTER TABLE `humnes_cats`
  ADD PRIMARY KEY (`hum_id`);

--
-- Indexes for table `pandding_order`
--
ALTER TABLE `pandding_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pro_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `custom_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `customer_order`
--
ALTER TABLE `customer_order`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;
--
-- AUTO_INCREMENT for table `humnes_cats`
--
ALTER TABLE `humnes_cats`
  MODIFY `hum_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `pandding_order`
--
ALTER TABLE `pandding_order`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;
--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pro_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
