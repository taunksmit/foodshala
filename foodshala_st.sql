-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 15, 2020 at 11:03 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodshala_st`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `cust_id` int(11) NOT NULL,
  `cust_name` varchar(100) NOT NULL,
  `cust_contact` varchar(100) NOT NULL,
  `cust_email` varchar(100) NOT NULL,
  `cust_password` varchar(100) NOT NULL,
  `food_choice` varchar(10) NOT NULL,
  `created_dt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`cust_id`, `cust_name`, `cust_contact`, `cust_email`, `cust_password`, `food_choice`, `created_dt`) VALUES
(3, 'Customer1', '999999999', 'cust1@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'veg', '2020-09-15 00:30:32'),
(4, 'Customer2', '999999999', 'cust2@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'nonveg', '2020-09-15 00:30:32');

-- --------------------------------------------------------

--
-- Table structure for table `food_items`
--

CREATE TABLE `food_items` (
  `food_id` int(11) NOT NULL,
  `restaurant_id` int(11) NOT NULL,
  `food_name` varchar(225) NOT NULL,
  `dish_type` varchar(225) NOT NULL,
  `serves` int(11) NOT NULL,
  `picture` varchar(225) NOT NULL,
  `cost` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `food_items`
--

INSERT INTO `food_items` (`food_id`, `restaurant_id`, `food_name`, `dish_type`, `serves`, `picture`, `cost`) VALUES
(15, 7, 'veg biryani', 'veg', 2, 'uploads/vegpulao.jpg', 200),
(13, 6, 'Paneer Butter Masala', 'veg', 4, 'uploads/53098531.jpg', 200),
(14, 6, 'Chicken Biryani', 'nonveg', 2, 'uploads/chichken.jpg', 300),
(16, 6, 'Lassi', 'veg', 1, 'uploads/salted-lassi.jpg', 50),
(17, 7, 'Chole Bhature', 'veg', 1, 'uploads/bhature_recipe_Indian_puffed_bread-500x500.jpg', 100),
(18, 7, 'Egg Curry', 'nonveg', 2, 'uploads/egg.jpg', 150),
(19, 7, 'Daal Fry', 'veg', 2, 'uploads/daal.jpg', 200),
(20, 7, 'Assorted Sweets', 'veg', 5, 'uploads/assortedsweets.jpg', 500),
(21, 6, 'Roti', 'veg', 1, 'uploads/Roti-Recipe-Indian-flatbread-500x500.jpg', 20),
(22, 6, 'Laccha Paratha', 'veg', 2, 'uploads/Lachha-Paratha-3.jpg', 50);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `food_id` int(11) NOT NULL,
  `order_status` varchar(225) NOT NULL,
  `creation_dt` datetime DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `customer_id`, `food_id`, `order_status`, `creation_dt`) VALUES
(21, 3, 15, 'order placed', '2020-09-16 01:36:40'),
(20, 4, 18, 'order placed', '2020-09-16 01:06:37'),
(19, 4, 14, 'order placed', '2020-09-16 01:06:36'),
(18, 3, 15, 'order placed', '2020-09-16 01:04:03'),
(17, 3, 14, 'order placed', '2020-09-16 01:04:03'),
(16, 3, 21, 'order placed', '2020-09-16 01:04:02'),
(15, 3, 16, 'order placed', '2020-09-16 01:04:02'),
(14, 3, 13, 'order placed', '2020-09-16 01:04:02');

-- --------------------------------------------------------

--
-- Table structure for table `restaurants`
--

CREATE TABLE `restaurants` (
  `res_id` int(11) NOT NULL,
  `res_name` varchar(100) NOT NULL,
  `res_owner` varchar(100) NOT NULL,
  `res_contact` varchar(100) NOT NULL,
  `res_email` varchar(100) NOT NULL,
  `res_password` varchar(100) NOT NULL,
  `res_address` varchar(100) NOT NULL,
  `created_dt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `restaurants`
--

INSERT INTO `restaurants` (`res_id`, `res_name`, `res_owner`, `res_contact`, `res_email`, `res_password`, `res_address`, `created_dt`) VALUES
(6, 'Royal Restaurant', 'Doe', '8888888888', 'rest1@gmail.com', 'c33367701511b4f6020ec61ded352059', 'Indira Nagar, Delhi', '2020-09-15 00:31:35'),
(7, 'Khana Khazana', 'John', '9999999999', 'rest2@gmail.com', 'c33367701511b4f6020ec61ded352059', 'Shanti Nagar, Delhi', '2020-09-15 01:11:53');

-- --------------------------------------------------------

--
-- Table structure for table `user_cart`
--

CREATE TABLE `user_cart` (
  `id` int(11) NOT NULL,
  `food_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `added_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`cust_id`);

--
-- Indexes for table `food_items`
--
ALTER TABLE `food_items`
  ADD PRIMARY KEY (`food_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `restaurants`
--
ALTER TABLE `restaurants`
  ADD PRIMARY KEY (`res_id`),
  ADD UNIQUE KEY `res_email` (`res_email`);

--
-- Indexes for table `user_cart`
--
ALTER TABLE `user_cart`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `cust_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `food_items`
--
ALTER TABLE `food_items`
  MODIFY `food_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `restaurants`
--
ALTER TABLE `restaurants`
  MODIFY `res_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_cart`
--
ALTER TABLE `user_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
