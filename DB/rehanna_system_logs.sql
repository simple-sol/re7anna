-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2014 at 04:24 PM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rehanna_system_logs`
--
CREATE DATABASE IF NOT EXISTS `rehanna_system_logs` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `rehanna_system_logs`;

-- --------------------------------------------------------

--
-- Table structure for table `login_logs`
--

CREATE TABLE IF NOT EXISTS `login_logs` (
  `login_id` int(11) NOT NULL,
  `login_date` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `login_ip` varchar(20) NOT NULL,
  `operation_status` tinyint(7) NOT NULL,
  `is_logged` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `register_logs`
--

CREATE TABLE IF NOT EXISTS `register_logs` (
  `register_id` int(11) NOT NULL,
  `register_date` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `register_ip` varchar(20) NOT NULL,
  `operation_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `rehanna_factory_manufature_orders_logs`
--

CREATE TABLE IF NOT EXISTS `rehanna_factory_manufature_orders_logs` (
  `manufacture_id` int(11) NOT NULL AUTO_INCREMENT,
  `manufacture_date` int(11) NOT NULL,
  `manufacture_status` int(3) NOT NULL,
  `manufacture_comment` text NOT NULL,
  PRIMARY KEY (`manufacture_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `rehanna_market_sales_logs`
--

CREATE TABLE IF NOT EXISTS `rehanna_market_sales_logs` (
  `sales_id` int(11) NOT NULL AUTO_INCREMENT,
  `sales_date` int(11) NOT NULL,
  `sales_status` int(11) NOT NULL,
  `sales_comment` int(11) NOT NULL,
  PRIMARY KEY (`sales_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
