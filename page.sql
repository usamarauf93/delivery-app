-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 13, 2020 at 01:28 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `delivery_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`) VALUES
(1, 'Super Admin', 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `active` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `active`) VALUES
(1, 'Bandages, dressings or band-aid/plasters', b'1'),
(2, 'Over the counter medicine (adults)', b'1'),
(3, 'Over the counter medicine (children)', b'1'),
(4, 'Prescription medicine (adults)', b'1'),
(5, 'Prescription medicine (children)', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `contact`, `email`, `password`, `address`) VALUES
(1, 'usama rauf', '0323-2837557', 'usamarauf93@gmail.com', '0b41a7e68abb4b3d258408d12f0e7962', '22 New Orleans Rd'),
(2, 'tet=st test', '0323-2837557', 'admin@admin.com', '0b41a7e68abb4b3d258408d12f0e7962', 'parkview'),
(3, 'test', '0323-283755', 'test@gmail.com', 'c514c91e4ed341f263e458d44b3bb0a7', 'demo address');

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE `page` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`id`, `title`, `data`) VALUES
(1, 'Home', 'Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero\'s De Finibus Bonorum et Malorum for use in a type specimen book.'),
(2, 'About', 'Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero\'s De Finibus Bonorum et Malorum for use in a type specimen book.');

-- --------------------------------------------------------

--
-- Table structure for table `pickup_order`
--

CREATE TABLE `pickup_order` (
  `id` bigint(20) NOT NULL,
  `customer_id` bigint(20) DEFAULT NULL,
  `pickup_notes` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `rating` bigint(20) DEFAULT NULL,
  `created_datetime` bigint(20) DEFAULT NULL,
  `updated_datetime` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pickup_order`
--

INSERT INTO `pickup_order` (`id`, `customer_id`, `pickup_notes`, `status`, `rating`, `created_datetime`, `updated_datetime`) VALUES
(15, 1, 'please fuck', 'new', 0, 1597180664, 1597180664),
(16, 1, 'please deliver', 'delivered', 5, 1597188847, 1597188847),
(17, 1, 'delivery asap', 'delivered', 3, 1597269539, 1597269539),
(18, 3, 'send details of shiping', 'new', 0, 1597270595, 1597270595),
(19, 1, 'dsadsadsadsa', 'delivered', 2, 1597271459, 1597271459);

-- --------------------------------------------------------

--
-- Table structure for table `pickup_order_detail`
--

CREATE TABLE `pickup_order_detail` (
  `id` bigint(20) NOT NULL,
  `pickup_order_id` bigint(20) DEFAULT NULL,
  `retailer_id` bigint(20) DEFAULT NULL,
  `retailer_order_id` bigint(20) DEFAULT NULL,
  `pickup_data` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `pickup_datetime` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pickup_order_detail`
--

INSERT INTO `pickup_order_detail` (`id`, `pickup_order_id`, `retailer_id`, `retailer_order_id`, `pickup_data`, `status`, `pickup_datetime`) VALUES
(3, 15, 1, 77, 'kolo', 'new', 1597190880),
(4, 15, 2, 88, 'lolu', 'new', 1597277280),
(5, 16, 3, 8877, 'biscuit', 'delivered', 1597372380),
(6, 16, 4, 46464, 'chocolate', 'delivered', 1597372380),
(7, 17, 1, 55, 'grocery', 'delivered', 1597366680),
(8, 17, 3, 789, 'tech', 'delivered', 1597366680),
(9, 18, 3, 87, 'koko', 'new', 1597972560),
(10, 18, 2, 78, 'moko', 'new', 1597972560),
(11, 19, 5, 777, 'dsajndlaks', 'delivered', 1597282200);

-- --------------------------------------------------------

--
-- Table structure for table `retailer`
--

CREATE TABLE `retailer` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `active` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `retailer`
--

INSERT INTO `retailer` (`id`, `name`, `contact`, `email`, `address`, `active`) VALUES
(1, 'Don Bosco ', '2651515655', 'don@mail.com', '22 standford street NY', b'1'),
(2, 'Carfore', '0325454545', 'carfore@shop.com', '71 Newgersy ', b'1'),
(3, 'usama rauf 2', '0323-283755', 'usamarauf932@gmail.com', 'Atlanta', b'1'),
(4, 'retailer sdemo', '0323-283755', 'usamarauf93@gmail.com', 'Atlanta', b'1'),
(5, 'test retailer', '032644454546', 'testretailer@gmail.com', '32 wallstreet', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `retailer_category`
--

CREATE TABLE `retailer_category` (
  `id` bigint(20) NOT NULL,
  `retailer_id` bigint(20) DEFAULT NULL,
  `category_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `retailer_category`
--

INSERT INTO `retailer_category` (`id`, `retailer_id`, `category_id`) VALUES
(1, 2, 1),
(2, 1, 4),
(3, 1, 5),
(4, 2, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pickup_order`
--
ALTER TABLE `pickup_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `pickup_order_detail`
--
ALTER TABLE `pickup_order_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pickup_order_id` (`pickup_order_id`),
  ADD KEY `retailer_id` (`retailer_id`);

--
-- Indexes for table `retailer`
--
ALTER TABLE `retailer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `retailer_category`
--
ALTER TABLE `retailer_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `retailer_id` (`retailer_id`),
  ADD KEY `category_id` (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `page`
--
ALTER TABLE `page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pickup_order`
--
ALTER TABLE `pickup_order`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `pickup_order_detail`
--
ALTER TABLE `pickup_order_detail`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `retailer`
--
ALTER TABLE `retailer`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `retailer_category`
--
ALTER TABLE `retailer_category`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pickup_order`
--
ALTER TABLE `pickup_order`
  ADD CONSTRAINT `pickup_order_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`);

--
-- Constraints for table `pickup_order_detail`
--
ALTER TABLE `pickup_order_detail`
  ADD CONSTRAINT `pickup_order_detail_ibfk_1` FOREIGN KEY (`pickup_order_id`) REFERENCES `pickup_order` (`id`),
  ADD CONSTRAINT `pickup_order_detail_ibfk_2` FOREIGN KEY (`retailer_id`) REFERENCES `retailer` (`id`);

--
-- Constraints for table `retailer_category`
--
ALTER TABLE `retailer_category`
  ADD CONSTRAINT `retailer_category_ibfk_1` FOREIGN KEY (`retailer_id`) REFERENCES `retailer` (`id`),
  ADD CONSTRAINT `retailer_category_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
