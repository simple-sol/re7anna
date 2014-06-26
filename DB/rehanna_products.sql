-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2014 at 04:25 PM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rehanna_products`
--
CREATE DATABASE IF NOT EXISTS `rehanna_products` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `rehanna_products`;

-- --------------------------------------------------------

--
-- Table structure for table `manufacture_components`
--

CREATE TABLE IF NOT EXISTS `manufacture_components` (
  `components_id` int(11) NOT NULL AUTO_INCREMENT,
  `components_name` varchar(255) NOT NULL,
  PRIMARY KEY (`components_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `perfumes_brand`
--

CREATE TABLE IF NOT EXISTS `perfumes_brand` (
  `brand_id` int(7) NOT NULL AUTO_INCREMENT,
  `brand_name` varchar(255) NOT NULL,
  `brand_company` int(3) NOT NULL,
  PRIMARY KEY (`brand_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `perfumes_brand`
--

INSERT INTO `perfumes_brand` (`brand_id`, `brand_name`, `brand_company`) VALUES
(1, 'd', 3);

-- --------------------------------------------------------

--
-- Table structure for table `perfume_company`
--

CREATE TABLE IF NOT EXISTS `perfume_company` (
  `company_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(255) NOT NULL,
  PRIMARY KEY (`company_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `perfume_manufacture_standard`
--

CREATE TABLE IF NOT EXISTS `perfume_manufacture_standard` (
  `standard_id` int(7) NOT NULL AUTO_INCREMENT,
  `manufacture_id` int(7) NOT NULL,
  `component_id` int(7) NOT NULL,
  `component_precentage` double NOT NULL,
  PRIMARY KEY (`standard_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `rehanna_factory_manufature_orders`
--

CREATE TABLE IF NOT EXISTS `rehanna_factory_manufature_orders` (
  `manufacturer_order_id` int(11) NOT NULL AUTO_INCREMENT,
  `manufacturer order_date` int(11) NOT NULL,
  `manufacturer order_type` int(11) NOT NULL,
  `manufacturer order_number` int(11) NOT NULL,
  `manufacturer order_comander` int(11) NOT NULL,
  `manufacturezr order_executor` int(11) NOT NULL,
  PRIMARY KEY (`manufacturer_order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `rehanna_factory_products`
--

CREATE TABLE IF NOT EXISTS `rehanna_factory_products` (
  `factory_Products_id` int(11) NOT NULL AUTO_INCREMENT,
  `factory_product_name` varchar(255) NOT NULL,
  PRIMARY KEY (`factory_Products_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `rehanna_manufacture`
--

CREATE TABLE IF NOT EXISTS `rehanna_manufacture` (
  `manufacture_id` int(7) NOT NULL AUTO_INCREMENT,
  `manufacture_name` varchar(255) NOT NULL,
  `manufacture_type` enum('market','factory') NOT NULL,
  PRIMARY KEY (`manufacture_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `rehanna_manufactures_types`
--

CREATE TABLE IF NOT EXISTS `rehanna_manufactures_types` (
  `type_id` int(11) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `rehanna_markets`
--

CREATE TABLE IF NOT EXISTS `rehanna_markets` (
  `market_id` int(11) NOT NULL AUTO_INCREMENT,
  `market_name` int(11) NOT NULL,
  `market_address` int(11) NOT NULL,
  `market_type` tinyint(3) NOT NULL,
  PRIMARY KEY (`market_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `rehanna_markets`
--

INSERT INTO `rehanna_markets` (`market_id`, `market_name`, `market_address`, `market_type`) VALUES
(1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `rehanna_market_sales`
--

CREATE TABLE IF NOT EXISTS `rehanna_market_sales` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_components` int(11) NOT NULL,
  `product_price` double NOT NULL,
  `Product_seller` int(7) NOT NULL,
  `rerhanna_market` int(3) NOT NULL,
  `Product_sales_date` int(11) NOT NULL,
  `product_buyer` int(7) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `rehanna_perfums`
--

CREATE TABLE IF NOT EXISTS `rehanna_perfums` (
  `perfum_id` int(7) NOT NULL AUTO_INCREMENT,
  `perfum_brand` int(11) NOT NULL,
  `perfum_name` varchar(200) NOT NULL,
  `perfum_category` enum('casual','classic') NOT NULL,
  `perfum_concentration` enum('light','medium','strong','super_strong') NOT NULL,
  `perfum_type` enum('fruits','flowers','woods','spices','organic') NOT NULL,
  `perfum_suitable_age` enum('-20','20','30','40','50') NOT NULL,
  `perfum_suitable_job` enum('mental','muscular') NOT NULL,
  `perfum_suitable_period` enum('day','night','both') NOT NULL,
  PRIMARY KEY (`perfum_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `rehanna_sales_component`
--

CREATE TABLE IF NOT EXISTS `rehanna_sales_component` (
  `sales_component_id` int(11) NOT NULL AUTO_INCREMENT,
  `component_id` int(11) NOT NULL,
  `component_value` double NOT NULL,
  `sales_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  PRIMARY KEY (`sales_component_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `rehanna_stores`
--

CREATE TABLE IF NOT EXISTS `rehanna_stores` (
  `store_id` int(11) NOT NULL AUTO_INCREMENT,
  `store_name` int(11) NOT NULL,
  `store_address` int(11) NOT NULL,
  `store_type` tinyint(3) NOT NULL,
  PRIMARY KEY (`store_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
