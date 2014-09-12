-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 08, 2014 at 02:25 PM
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
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `customer_id` int(7) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `customer_phone` varchar(15) CHARACTER SET utf8 NOT NULL,
  `customer_job` enum('mental','muscular') CHARACTER SET utf8 NOT NULL,
  `customer_age` enum('-20','20','30','40','50') CHARACTER SET utf8 NOT NULL,
  `customer_gender` enum('male','female') CHARACTER SET utf8 NOT NULL,
  `customer_married` tinyint(3) NOT NULL,
  `customer_job_period` enum('day','night','both') CHARACTER SET utf8 NOT NULL,
  `customer_favorites_category` enum('casual','classic') CHARACTER SET utf8 NOT NULL,
  `customer_favorites_type` enum('fruits','flowers','woods','spices','organic') CHARACTER SET utf8 NOT NULL,
  `customer_favorites_concentration` enum('light','medium','strong','super_strong') CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `daily_inventory_levels`
--

CREATE TABLE IF NOT EXISTS `daily_inventory_levels` (
  `date_of_inventory` int(16) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `level_id` int(11) DEFAULT NULL,
  `rate of sales` double DEFAULT NULL,
  PRIMARY KEY (`date_of_inventory`),
  KEY `fk_daily_inventory_levels_products1_idx` (`product_id`),
  KEY `fk_daily_inventory_levels_invenory_level1_idx` (`level_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `discounts`
--

CREATE TABLE IF NOT EXISTS `discounts` (
  `discount_id` int(11) NOT NULL AUTO_INCREMENT,
  `product` int(11) DEFAULT NULL,
  `discount_value` double DEFAULT NULL,
  `start_time` int(16) DEFAULT NULL,
  `end_time` int(16) DEFAULT NULL,
  `discount_reason` int(11) DEFAULT NULL,
  PRIMARY KEY (`discount_id`),
  KEY `fk_discounts_discount_reasons1_idx` (`discount_reason`),
  KEY `fk_discounts_products1_idx` (`product`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `discount_reasons`
--

CREATE TABLE IF NOT EXISTS `discount_reasons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `desc` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE IF NOT EXISTS `employees` (
  `emp_id` int(5) NOT NULL AUTO_INCREMENT,
  `emp_name` varchar(200) CHARACTER SET utf8 NOT NULL,
  `emp_email` varchar(100) CHARACTER SET utf8 NOT NULL,
  `emp_job` int(5) NOT NULL,
  `emp_salary` int(5) NOT NULL,
  `emp_address` varchar(300) CHARACTER SET utf8 NOT NULL,
  `emp_married` tinyint(3) NOT NULL,
  `has_kids` tinyint(3) NOT NULL,
  `emp_gender` tinyint(3) NOT NULL,
  `emp_birthdate` varchar(25) CHARACTER SET utf8 NOT NULL,
  `emp_certificate` varchar(200) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`emp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `invenory_level`
--

CREATE TABLE IF NOT EXISTS `invenory_level` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(100) DEFAULT NULL,
  `desc` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `invoices_state`
--

CREATE TABLE IF NOT EXISTS `invoices_state` (
  `state_id` int(11) NOT NULL AUTO_INCREMENT,
  `state_name` varchar(100) DEFAULT NULL,
  `state_desc` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`state_id`),
  UNIQUE KEY `state_name_UNIQUE` (`state_name`),
  UNIQUE KEY `state_desc_UNIQUE` (`state_desc`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `invoices_transmission`
--

CREATE TABLE IF NOT EXISTS `invoices_transmission` (
  `invoice_id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_date` int(16) DEFAULT NULL,
  `invoice_recipient` int(11) DEFAULT NULL,
  `invoice_creator` int(11) DEFAULT NULL,
  `invoice_reason` varchar(255) DEFAULT NULL,
  `invoice_state` int(11) DEFAULT NULL,
  `parent` int(11) NOT NULL,
  PRIMARY KEY (`invoice_id`),
  KEY `fk_invoices_transmission_invoices_transmission1_idx` (`parent`),
  KEY `fk_invoices_transmission_system_users1_idx` (`invoice_creator`),
  KEY `fk_invoices_transmission_invoices_state1_idx` (`invoice_recipient`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `invoice_transmissions_details`
--

CREATE TABLE IF NOT EXISTS `invoice_transmissions_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `product_quantity` double DEFAULT NULL,
  `invoice` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `product_id_UNIQUE` (`product_id`),
  KEY `fk_invoice_transmissions_details_invoices_transmission1_idx` (`invoice`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `invoice_types`
--

CREATE TABLE IF NOT EXISTS `invoice_types` (
  `id` int(11) NOT NULL,
  `type` varchar(100) DEFAULT NULL,
  `desc` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `markets`
--

CREATE TABLE IF NOT EXISTS `markets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `market_type` int(11) DEFAULT NULL,
  `market_category` int(11) DEFAULT NULL,
  `market_name` varchar(100) DEFAULT NULL,
  `market_mac` varchar(50) DEFAULT NULL,
  `storekeeper` int(11) DEFAULT NULL,
  `market_info` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `messages_type`
--

CREATE TABLE IF NOT EXISTS `messages_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(100) DEFAULT NULL,
  `desc` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `type_UNIQUE` (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `notification_center`
--

CREATE TABLE IF NOT EXISTS `notification_center` (
  `notification_id` int(11) NOT NULL AUTO_INCREMENT,
  `notification_date` int(11) DEFAULT NULL,
  `notification_sender` int(11) DEFAULT NULL,
  `notification_type` int(11) DEFAULT NULL,
  `notification_parent` int(11) DEFAULT NULL,
  `notification_family` int(11) DEFAULT NULL,
  `delivered` tinyint(4) DEFAULT NULL,
  `state` tinyint(4) DEFAULT NULL,
  `notification_details` int(11) DEFAULT NULL,
  PRIMARY KEY (`notification_id`),
  KEY `fk_notification_center_notification_type1_idx` (`notification_type`),
  KEY `fk_notification_center_notification_details1_idx` (`notification_details`),
  KEY `fk_notification_center_system_users1_idx` (`notification_sender`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `notification_details`
--

CREATE TABLE IF NOT EXISTS `notification_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `invoices` int(11) DEFAULT NULL,
  `messages` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_notification_details_invoices_transmissions1_idx` (`invoices`),
  KEY `fk_notification_details_notification_messages1_idx` (`messages`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `notification_messages`
--

CREATE TABLE IF NOT EXISTS `notification_messages` (
  `message_id` int(11) NOT NULL AUTO_INCREMENT,
  `type` int(11) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `message_url` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`message_id`),
  KEY `fk_notification_messages_messages_type1_idx` (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `notification_recivers`
--

CREATE TABLE IF NOT EXISTS `notification_recivers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `notification` int(11) DEFAULT NULL,
  `reciver` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_notification_recivers_notification_center1_idx` (`notification`),
  KEY `fk_notification_recivers_system_users1_idx` (`reciver`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `notification_type`
--

CREATE TABLE IF NOT EXISTS `notification_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(100) DEFAULT NULL,
  `desc` varchar(255) DEFAULT NULL,
  `parent` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `type_UNIQUE` (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `owners`
--

CREATE TABLE IF NOT EXISTS `owners` (
  `owner_id` int(7) NOT NULL AUTO_INCREMENT,
  `owner_name` varchar(100) DEFAULT NULL,
  `owner_proportion` double DEFAULT NULL,
  PRIMARY KEY (`owner_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(150) DEFAULT NULL,
  `product_desc` int(11) DEFAULT NULL,
  `product_type` int(11) DEFAULT NULL,
  `unit_price` double DEFAULT NULL,
  `reorder_level` int(11) DEFAULT NULL,
  `reorder_quantity` double DEFAULT NULL,
  `product_code` varchar(50) DEFAULT NULL,
  `product_add_date` int(16) DEFAULT NULL,
  `last_update_date` int(16) DEFAULT NULL,
  `product_adder` int(11) DEFAULT NULL,
  `is_discounted` bit(2) DEFAULT NULL,
  PRIMARY KEY (`product_id`),
  KEY `fk_products_products_type_idx` (`product_type`),
  KEY `fk_products_products_desc1_idx` (`product_desc`),
  KEY `fk_products_system_users1_idx` (`product_adder`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products_desc`
--

CREATE TABLE IF NOT EXISTS `products_desc` (
  `desc_id` int(11) NOT NULL AUTO_INCREMENT,
  `desc_summary` text,
  `product_desc_info` int(11) DEFAULT NULL,
  PRIMARY KEY (`desc_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `products_type`
--

CREATE TABLE IF NOT EXISTS `products_type` (
  `product_type_code` int(11) NOT NULL AUTO_INCREMENT,
  `products_type_desc` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `product_type_parent_code` int(11) NOT NULL,
  PRIMARY KEY (`product_type_code`),
  UNIQUE KEY `products_type_desc_UNIQUE` (`products_type_desc`),
  KEY `fk_products_type_products_type1_idx` (`product_type_parent_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `product_price_tracing`
--

CREATE TABLE IF NOT EXISTS `product_price_tracing` (
  `trace_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `date` int(16) DEFAULT NULL,
  `old_price` double DEFAULT NULL,
  `new_price` double DEFAULT NULL,
  `change_reason` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`trace_id`),
  KEY `fk_product_price_tracing_products1_idx` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `purchasing_details`
--

CREATE TABLE IF NOT EXISTS `purchasing_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product` int(11) DEFAULT NULL,
  `quantity` double DEFAULT NULL,
  `unit_price` double DEFAULT NULL,
  `invoice-id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_purchasing_details_purchasing_products_invoices1_idx` (`invoice-id`),
  KEY `fk_purchasing_details_products1_idx` (`product`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `purchasing_products_invoices`
--

CREATE TABLE IF NOT EXISTS `purchasing_products_invoices` (
  `invoice_id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_creater` int(11) DEFAULT NULL,
  `invoice_date` int(16) DEFAULT NULL,
  `invoice_value` double DEFAULT NULL,
  `invoice_reason` varchar(255) DEFAULT NULL,
  `supplier` int(11) DEFAULT NULL,
  `invoice_deliver_date` int(16) DEFAULT NULL,
  `state` tinyint(4) DEFAULT NULL,
  `invoice_parent` int(11) NOT NULL,
  PRIMARY KEY (`invoice_id`),
  KEY `fk_purchasing_products_invoices_system_users1_idx` (`invoice_creater`),
  KEY `fk_purchasing_products_invoices_traders1_idx` (`supplier`),
  KEY `fk_purchasing_products_invoices_purchasing_products_invoice_idx` (`invoice_parent`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `repayments`
--

CREATE TABLE IF NOT EXISTS `repayments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `payment_amount` double DEFAULT NULL,
  `payment_date` int(16) DEFAULT NULL,
  `state` tinyint(4) DEFAULT NULL,
  `invoice` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_repayments_purchasing_products_invoices1_idx` (`invoice`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sales_invoices`
--

CREATE TABLE IF NOT EXISTS `sales_invoices` (
  `invoice_id` int(11) NOT NULL,
  `invoice_type` int(11) DEFAULT NULL,
  `sales_date` int(16) DEFAULT NULL,
  `invoice_owner` int(11) DEFAULT NULL,
  `invoice_creator` int(11) DEFAULT NULL,
  `invoice_reason` varchar(255) DEFAULT NULL,
  `state` tinyint(4) DEFAULT NULL,
  `parent_id` int(11) NOT NULL,
  PRIMARY KEY (`invoice_id`),
  KEY `fk_sales_invoices_sales_invoices1_idx` (`parent_id`),
  KEY `fk_sales_invoices_invoice_types1_idx` (`invoice_type`),
  KEY `fk_sales_invoices_customer1_idx` (`invoice_owner`),
  KEY `fk_sales_invoices_system_users1_idx` (`invoice_creator`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sales_invoice_details`
--

CREATE TABLE IF NOT EXISTS `sales_invoice_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product` int(11) DEFAULT NULL,
  `quantity` double DEFAULT NULL,
  `invoice` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_sales_invoice_details_sales_invoices1_idx` (`invoice`),
  KEY `fk_sales_invoice_details_products1_idx` (`product`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `system_users`
--

CREATE TABLE IF NOT EXISTS `system_users` (
  `sys_users_id` int(11) NOT NULL,
  `sys_users_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `sys_users_password` varchar(50) CHARACTER SET utf8 NOT NULL,
  `sys_users_type` tinyint(1) NOT NULL,
  `is_blocked` int(1) NOT NULL,
  `user_info` int(5) NOT NULL,
  PRIMARY KEY (`sys_users_id`),
  KEY `fk_system_sys_users_system_employee1_idx` (`user_info`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `traders`
--

CREATE TABLE IF NOT EXISTS `traders` (
  `trader_id` int(7) NOT NULL AUTO_INCREMENT,
  `trader_company` varchar(100) CHARACTER SET utf8 NOT NULL,
  `trader_company_address` varchar(255) CHARACTER SET utf8 NOT NULL,
  `trader_type` enum('customer','supplier','both') CHARACTER SET utf8 NOT NULL,
  `trader_category` enum('Wholesaler','half inter') CHARACTER SET utf8 NOT NULL,
  `Creditor` double NOT NULL,
  `Debtor` double NOT NULL,
  PRIMARY KEY (`trader_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `daily_inventory_levels`
--
ALTER TABLE `daily_inventory_levels`
  ADD CONSTRAINT `fk_daily_inventory_levels_invenory_level1` FOREIGN KEY (`level_id`) REFERENCES `invenory_level` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_daily_inventory_levels_products1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `discounts`
--
ALTER TABLE `discounts`
  ADD CONSTRAINT `fk_discounts_discount_reasons1` FOREIGN KEY (`discount_reason`) REFERENCES `discount_reasons` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_discounts_products1` FOREIGN KEY (`product`) REFERENCES `products` (`product_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `invoices_transmission`
--
ALTER TABLE `invoices_transmission`
  ADD CONSTRAINT `fk_invoices_transmission_invoices_state1` FOREIGN KEY (`invoice_recipient`) REFERENCES `invoices_state` (`state_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_invoices_transmission_invoices_transmission1` FOREIGN KEY (`parent`) REFERENCES `invoices_transmission` (`invoice_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_invoices_transmission_system_users1` FOREIGN KEY (`invoice_creator`) REFERENCES `system_users` (`sys_users_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `invoice_transmissions_details`
--
ALTER TABLE `invoice_transmissions_details`
  ADD CONSTRAINT `fk_invoice_transmissions_details_invoices_transmission1` FOREIGN KEY (`invoice`) REFERENCES `invoices_transmission` (`invoice_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_invoice_transmissions_details_products1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `notification_center`
--
ALTER TABLE `notification_center`
  ADD CONSTRAINT `fk_notification_center_notification_details1` FOREIGN KEY (`notification_details`) REFERENCES `notification_details` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_notification_center_notification_type1` FOREIGN KEY (`notification_type`) REFERENCES `notification_type` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_notification_center_system_users1` FOREIGN KEY (`notification_sender`) REFERENCES `system_users` (`sys_users_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `notification_details`
--
ALTER TABLE `notification_details`
  ADD CONSTRAINT `fk_notification_details_invoices_transmissions1` FOREIGN KEY (`invoices`) REFERENCES `invoices_transmission` (`invoice_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_notification_details_notification_messages1` FOREIGN KEY (`messages`) REFERENCES `notification_messages` (`message_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `notification_messages`
--
ALTER TABLE `notification_messages`
  ADD CONSTRAINT `fk_notification_messages_messages_type1` FOREIGN KEY (`type`) REFERENCES `messages_type` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `notification_recivers`
--
ALTER TABLE `notification_recivers`
  ADD CONSTRAINT `fk_notification_recivers_notification_center1` FOREIGN KEY (`notification`) REFERENCES `notification_center` (`notification_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_notification_recivers_system_users1` FOREIGN KEY (`reciver`) REFERENCES `system_users` (`sys_users_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_products_products_desc1` FOREIGN KEY (`product_desc`) REFERENCES `products_desc` (`desc_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_products_products_type` FOREIGN KEY (`product_type`) REFERENCES `products_type` (`product_type_code`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_products_system_users1` FOREIGN KEY (`product_adder`) REFERENCES `system_users` (`sys_users_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `products_type`
--
ALTER TABLE `products_type`
  ADD CONSTRAINT `fk_products_type_products_type1` FOREIGN KEY (`product_type_parent_code`) REFERENCES `products_type` (`product_type_code`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `product_price_tracing`
--
ALTER TABLE `product_price_tracing`
  ADD CONSTRAINT `fk_product_price_tracing_products1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `purchasing_details`
--
ALTER TABLE `purchasing_details`
  ADD CONSTRAINT `fk_purchasing_details_products1` FOREIGN KEY (`product`) REFERENCES `products` (`product_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_purchasing_details_purchasing_products_invoices1` FOREIGN KEY (`invoice-id`) REFERENCES `purchasing_products_invoices` (`invoice_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `purchasing_products_invoices`
--
ALTER TABLE `purchasing_products_invoices`
  ADD CONSTRAINT `fk_purchasing_products_invoices_purchasing_products_invoices1` FOREIGN KEY (`invoice_parent`) REFERENCES `purchasing_products_invoices` (`invoice_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_purchasing_products_invoices_system_users1` FOREIGN KEY (`invoice_creater`) REFERENCES `system_users` (`sys_users_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_purchasing_products_invoices_traders1` FOREIGN KEY (`supplier`) REFERENCES `traders` (`trader_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `repayments`
--
ALTER TABLE `repayments`
  ADD CONSTRAINT `fk_repayments_purchasing_products_invoices1` FOREIGN KEY (`invoice`) REFERENCES `purchasing_products_invoices` (`invoice_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sales_invoices`
--
ALTER TABLE `sales_invoices`
  ADD CONSTRAINT `fk_sales_invoices_customer1` FOREIGN KEY (`invoice_owner`) REFERENCES `customer` (`customer_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sales_invoices_invoice_types1` FOREIGN KEY (`invoice_type`) REFERENCES `invoice_types` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sales_invoices_sales_invoices1` FOREIGN KEY (`parent_id`) REFERENCES `sales_invoices` (`invoice_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sales_invoices_system_users1` FOREIGN KEY (`invoice_creator`) REFERENCES `system_users` (`sys_users_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sales_invoice_details`
--
ALTER TABLE `sales_invoice_details`
  ADD CONSTRAINT `fk_sales_invoice_details_products1` FOREIGN KEY (`product`) REFERENCES `products` (`product_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sales_invoice_details_sales_invoices1` FOREIGN KEY (`invoice`) REFERENCES `sales_invoices` (`invoice_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
