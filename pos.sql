-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2017 at 07:32 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pos`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `cat_name` varchar(30) NOT NULL,
  `cat_desc` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `cat_name`, `cat_desc`) VALUES
(1, 'Pencils', 'Pencils'),
(2, 'Books', 'sdf55'),
(3, 'Pens', 'sdfsdf');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `item_display_name` varchar(100) NOT NULL,
  `sup_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `barcode` varchar(50) NOT NULL,
  `manufacture_id` int(11) NOT NULL,
  `buy_price` decimal(10,0) NOT NULL,
  `sell_price` decimal(10,0) NOT NULL,
  `quantity` int(11) NOT NULL,
  `reorder_level` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `discount_type` int(11) NOT NULL,
  `net_amount` decimal(10,0) NOT NULL,
  `price_changable` int(11) NOT NULL DEFAULT '0',
  `calc_item` int(11) NOT NULL DEFAULT '0',
  `image_url` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_id`, `item_name`, `item_display_name`, `sup_id`, `cat_id`, `barcode`, `manufacture_id`, `buy_price`, `sell_price`, `quantity`, `reorder_level`, `discount`, `discount_type`, `net_amount`, `price_changable`, `calc_item`, `image_url`) VALUES
(1, 'Pencil HB Nataraj', 'Pencil HB Nataraj', 5, 1, '11223312', 0, '5', '10', 1, 1, 0, 2, '10', 1, 1, 0),
(2, 'CR 200pg Book', 'CR 200pg Book', 5, 2, '34545', 0, '120', '160', 1, 1, 0, 2, '160', 1, 1, 0),
(3, '200pg EXcersice Book', '200pg EXcersice Book', 5, 2, '456456', 456456, '150', '200', 1, 1, 11, 2, '179', 1, 1, 0),
(4, 'Pencil HB Nataraj', '160pg Book', 5, 2, '1122331245', 0, '110', '160', 1, 1, 10, 1, '150', 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `sup_id` int(11) NOT NULL,
  `sup_name` varchar(50) NOT NULL,
  `dealer` varchar(50) NOT NULL,
  `nic` varchar(20) NOT NULL,
  `address` varchar(150) NOT NULL,
  `tel` varchar(15) NOT NULL,
  `fax` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`sup_id`, `sup_name`, `dealer`, `nic`, `address`, `tel`, `fax`, `email`) VALUES
(2, 'Apple Phone 6', 'ADS Silva', '652321545v', '', '011-6473698', '', ''),
(3, 'dfgdfg', 'dfgdfg', 'dfgdfg', '', '345345', '345345', '345@dfg.fg'),
(4, 'Tea Bags', 'dfg', 'hjkhjk', 'hjkhjksdfsdf', '8678', '678678', 'jhkhjk@fgdg.fg'),
(5, 'hfgh', 'fgh', 'fgh', '', '345345', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`sup_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
