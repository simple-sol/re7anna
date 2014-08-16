-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2014 at 01:19 AM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `foc_system`
--
CREATE DATABASE IF NOT EXISTS `foc_system` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `foc_system`;

-- --------------------------------------------------------

--
-- Table structure for table `invoices_payment`
--

CREATE TABLE IF NOT EXISTS `invoices_payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_id` int(11) NOT NULL,
  `payment_amount` double NOT NULL,
  `payment_date` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `invoices_products`
--

CREATE TABLE IF NOT EXISTS `invoices_products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `notification_center`
--

CREATE TABLE IF NOT EXISTS `notification_center` (
  `notification_id` int(11) NOT NULL AUTO_INCREMENT,
  `notification_type` int(11) NOT NULL,
  `corresponding_id` int(11) NOT NULL,
  `notification_date` int(11) NOT NULL,
  `notification_time` int(11) NOT NULL,
  `notifcation_sender` int(11) NOT NULL,
  `notification_receiver` int(11) NOT NULL,
  `is_deliverd` tinyint(4) NOT NULL,
  `state` tinyint(4) NOT NULL,
  `notification_type_type_id` int(11) NOT NULL,
  PRIMARY KEY (`notification_id`),
  KEY `fk_notification_center_notification_type_idx` (`notification_type_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `notification_type`
--

CREATE TABLE IF NOT EXISTS `notification_type` (
  `type_id` int(11) NOT NULL,
  `notification_type` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products_info`
--

CREATE TABLE IF NOT EXISTS `products_info` (
  `Product_id` int(11) NOT NULL AUTO_INCREMENT,
  `Product_name` varchar(100) NOT NULL,
  `Product_desc` text NOT NULL,
  `Product_add_date` int(11) NOT NULL,
  `product_adder` int(11) NOT NULL,
  PRIMARY KEY (`Product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `products_store`
--

CREATE TABLE IF NOT EXISTS `products_store` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `store_id` int(11) NOT NULL,
  `Product_id` int(11) NOT NULL,
  `product_quatity` int(11) NOT NULL,
  `description` text CHARACTER SET utf8 NOT NULL,
  `last_added_date` int(11) NOT NULL,
  `products_info_Product_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`products_info_Product_id`),
  KEY `fk_Products_store_products_info1_idx` (`products_info_Product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `purchasing_invoices`
--

CREATE TABLE IF NOT EXISTS `purchasing_invoices` (
  `invoice_id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_num` int(11) NOT NULL,
  `total_price` double NOT NULL,
  `contrated_date` int(11) NOT NULL,
  `delivery_date` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  PRIMARY KEY (`invoice_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sales_invoices`
--

CREATE TABLE IF NOT EXISTS `sales_invoices` (
  `invoice_id` int(11) NOT NULL AUTO_INCREMENT,
  `stock_id` int(11) NOT NULL,
  `payment_amount` double NOT NULL,
  `invoice_time` int(11) NOT NULL,
  `invoice_date` int(11) NOT NULL,
  `sales_invoices_info_id` int(11) NOT NULL,
  PRIMARY KEY (`invoice_id`),
  KEY `fk_sales_invoices_sales_invoices_info1_idx` (`sales_invoices_info_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sales_invoices_info`
--

CREATE TABLE IF NOT EXISTS `sales_invoices_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_id` int(11) NOT NULL,
  `good_id` int(11) NOT NULL,
  `good_quantity` int(11) NOT NULL,
  `good_price` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `notification_center`
--
ALTER TABLE `notification_center`
  ADD CONSTRAINT `fk_notification_center_notification_type` FOREIGN KEY (`notification_type_type_id`) REFERENCES `notification_type` (`type_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sales_invoices`
--
ALTER TABLE `sales_invoices`
  ADD CONSTRAINT `fk_sales_invoices_sales_invoices_info1` FOREIGN KEY (`sales_invoices_info_id`) REFERENCES `sales_invoices_info` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
