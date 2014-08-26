-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 26, 2014 at 05:59 AM
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

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_notifications`(IN `reciver` INT)
    NO SQL
begin

Select 
    n.notification_time,
    n.notifcation_sender,
    t.product_id,
    t.product_amount,
    t.product_price,
    t.product_description
From
    notification_center n
right join
        transaction_invoice ti
    inner join
        transactions_invoices_details t
    on
        ti.transaction_invoice_id = t.transaction_invoice_id
 on
    n.corresponding_id = ti.transaction_invoice_id and n.is_deliverd=1 and n.notification_receiver=reciver;

end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `get_notifications_messages`(IN `reciver` INT)
    NO SQL
Select 
    n.notification_time,
    n.notifcation_sender,
    m.notification_messages,
    m.notification_messages_url
From
    notification_center n
right join
        notification_messages m
 on
    n.corresponding_id = m.messages_id and n.is_deliverd=1 and n.notification_receiver=reciver$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `discards_payment`
--

CREATE TABLE IF NOT EXISTS `discards_payment` (
  `discard_id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_id` int(11) NOT NULL,
  `discards_amount` double NOT NULL,
  `discards_time` int(16) NOT NULL,
  PRIMARY KEY (`discard_id`) USING BTREE,
  KEY `fk_invoices_payment_purchasing_invoices1_idx` (`invoice_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `discards_products`
--

CREATE TABLE IF NOT EXISTS `discards_products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `discard_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` double NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `fk_invoices_products_purchasing_invoices1_idx` (`discard_id`),
  KEY `fk_invoices_products_time_dimension1_idx` (`price`),
  KEY `fk_discards_products_products1_idx` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `invoices_payment`
--

CREATE TABLE IF NOT EXISTS `invoices_payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_id` int(11) NOT NULL,
  `payment_amount` double NOT NULL,
  `payment_time` int(16) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `fk_invoices_payment_purchasing_invoices1_idx` (`invoice_id`)
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
  PRIMARY KEY (`id`) USING BTREE,
  KEY `fk_invoices_products_purchasing_invoices1_idx` (`invoice_id`),
  KEY `fk_invoices_products_products1_idx` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE IF NOT EXISTS `login_attempts` (
  `attempts_id` int(11) NOT NULL AUTO_INCREMENT,
  `attempts` int(11) NOT NULL,
  `time` int(16) NOT NULL,
  `users_id` int(7) NOT NULL,
  PRIMARY KEY (`attempts_id`),
  KEY `fk_login_attempts_system_sys_users1_idx` (`users_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `login_attempts`
--

INSERT INTO `login_attempts` (`attempts_id`, `attempts`, `time`, `users_id`) VALUES
(1, 7, 1404030743, 0),
(2, 9, 1404049275, 0);

-- --------------------------------------------------------

--
-- Table structure for table `notification_center`
--

CREATE TABLE IF NOT EXISTS `notification_center` (
  `notification_id` int(11) NOT NULL AUTO_INCREMENT,
  `notification_type` int(11) NOT NULL,
  `corresponding_id` int(11) NOT NULL,
  `notification_time` int(16) NOT NULL,
  `notifcation_sender` int(11) NOT NULL,
  `notification_receiver` int(11) NOT NULL,
  `is_deliverd` tinyint(4) NOT NULL,
  `state` tinyint(4) NOT NULL,
  PRIMARY KEY (`notification_id`) USING BTREE,
  KEY `fk_notification_center_notification_type1_idx` (`notification_type`) USING BTREE,
  KEY `fk_notification_center_system_sys_users1_idx` (`notifcation_sender`),
  KEY `fk_notification_center_system_sys_users2_idx` (`notification_receiver`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `notification_center`
--

INSERT INTO `notification_center` (`notification_id`, `notification_type`, `corresponding_id`, `notification_time`, `notifcation_sender`, `notification_receiver`, `is_deliverd`, `state`) VALUES
(1, 1, 1, 2147483647, 1, 2, 0, 0),
(9, 2, 1, 124451224, 1, 2, 1, 0),
(10, 2, 1, 125458415, 1, 2, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `notification_messages`
--

CREATE TABLE IF NOT EXISTS `notification_messages` (
  `messages_id` int(11) NOT NULL,
  `notification_messages` text,
  `notification_messages_url` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`messages_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=16384
/*!50100 PARTITION BY RANGE (messages_id)
(PARTITION p0 VALUES LESS THAN (1000) COMMENT = '' ENGINE = InnoDB,
 PARTITION p1 VALUES LESS THAN (2000) COMMENT = '' ENGINE = InnoDB,
 PARTITION p2 VALUES LESS THAN (3000) COMMENT = '' ENGINE = InnoDB,
 PARTITION p3 VALUES LESS THAN (4000) COMMENT = '' ENGINE = InnoDB,
 PARTITION p4 VALUES LESS THAN (5000) COMMENT = '' ENGINE = InnoDB,
 PARTITION p5 VALUES LESS THAN (6000) COMMENT = '' ENGINE = InnoDB,
 PARTITION p6 VALUES LESS THAN (7000) COMMENT = '' ENGINE = InnoDB,
 PARTITION p7 VALUES LESS THAN (8000) COMMENT = '' ENGINE = InnoDB,
 PARTITION p8 VALUES LESS THAN (9000) COMMENT = '' ENGINE = InnoDB,
 PARTITION p9 VALUES LESS THAN (10000) COMMENT = '' ENGINE = InnoDB,
 PARTITION p10 VALUES LESS THAN (11000) COMMENT = '' ENGINE = InnoDB,
 PARTITION p11 VALUES LESS THAN (12000) COMMENT = '' ENGINE = InnoDB,
 PARTITION p12 VALUES LESS THAN MAXVALUE COMMENT = '' ENGINE = InnoDB) */;

--
-- Dumping data for table `notification_messages`
--

INSERT INTO `notification_messages` (`messages_id`, `notification_messages`, `notification_messages_url`) VALUES
(1, 'i''am here ', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `notification_type`
--

CREATE TABLE IF NOT EXISTS `notification_type` (
  `type_id` int(11) NOT NULL,
  `notification_type` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`type_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notification_type`
--

INSERT INTO `notification_type` (`type_id`, `notification_type`) VALUES
(1, 'invoice'),
(2, 'message');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(100) DEFAULT NULL,
  `product_desc` text,
  `product_add_time` int(16) DEFAULT NULL,
  `product_adder` int(11) DEFAULT NULL,
  PRIMARY KEY (`product_id`),
  KEY `fk_products_system_sys_users1_idx` (`product_adder`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_desc`, `product_add_time`, `product_adder`) VALUES
(1, 'product', 'product2', NULL, 1),
(2, 'product 2', 'just product 2', 1254869100, 1);

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
  `last_added_time` int(16) NOT NULL,
  `products_info_Product_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`products_info_Product_id`) USING BTREE,
  KEY `fk_Products_store_products_info1_idx` (`products_info_Product_id`) USING BTREE,
  KEY `fk_products_store_products1_idx` (`Product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `purchasing_invoices`
--

CREATE TABLE IF NOT EXISTS `purchasing_invoices` (
  `invoice_id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_num` int(11) NOT NULL,
  `total_price` double NOT NULL,
  `contrated_time` int(16) NOT NULL,
  `delivery_time` int(16) NOT NULL,
  `company_id` int(11) NOT NULL,
  PRIMARY KEY (`invoice_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sales_invoices`
--

CREATE TABLE IF NOT EXISTS `sales_invoices` (
  `invoice_id` int(11) NOT NULL AUTO_INCREMENT,
  `stock_id` int(11) NOT NULL,
  `payment_amount` double NOT NULL,
  `invoice_time` int(16) NOT NULL,
  PRIMARY KEY (`invoice_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sales_invoices_info`
--

CREATE TABLE IF NOT EXISTS `sales_invoices_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_id` int(11) NOT NULL,
  `Product_id` int(11) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `Product_price` double NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `one_idx` (`invoice_id`) USING BTREE,
  KEY `fk_sales_invoices_info_products1_idx` (`Product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `system_customer`
--

CREATE TABLE IF NOT EXISTS `system_customer` (
  `customer_id` int(7) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(100) NOT NULL,
  `customer_phone` varchar(15) NOT NULL,
  `customer_job` enum('mental','muscular') NOT NULL,
  `customer_age` enum('-20','20','30','40','50') NOT NULL,
  `customer_gender` enum('male','female') NOT NULL,
  `customer_married` tinyint(3) NOT NULL,
  `customer_job_period` enum('day','night','both') NOT NULL,
  `customer_favorites_category` enum('casual','classic') NOT NULL,
  `customer_favorites_type` enum('fruits','flowers','woods','spices','organic') NOT NULL,
  `customer_favorites_concentration` enum('light','medium','strong','super_strong') NOT NULL,
  `system_sys_users_sys_users_id` int(7) NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `system_customer`
--

INSERT INTO `system_customer` (`customer_id`, `customer_name`, `customer_phone`, `customer_job`, `customer_age`, `customer_gender`, `customer_married`, `customer_job_period`, `customer_favorites_category`, `customer_favorites_type`, `customer_favorites_concentration`, `system_sys_users_sys_users_id`) VALUES
(1, '', '0', '', '30', 'male', 0, 'day', 'casual', 'fruits', 'medium', 0),
(2, '', '0', '', '-20', 'male', 0, 'day', 'casual', 'fruits', 'light', 0),
(3, '', '1202220620', 'mental', '20', 'male', 0, 'day', 'casual', 'fruits', 'light', 0),
(4, '', '01202220620', 'muscular', '50', 'female', 0, 'day', 'classic', 'organic', 'light', 0),
(5, 'سوسو حسين', '01203330630', 'mental', '30', 'female', 0, 'day', 'casual', 'flowers', 'light', 0),
(6, 'نتبنبتنلنبت ننتن', '01003778899', 'mental', '50', 'female', 0, 'night', 'classic', 'organic', 'medium', 0);

-- --------------------------------------------------------

--
-- Table structure for table `system_employee`
--

CREATE TABLE IF NOT EXISTS `system_employee` (
  `emp_id` int(5) NOT NULL AUTO_INCREMENT,
  `emp_name` varchar(200) NOT NULL,
  `emp_email` varchar(100) NOT NULL,
  `emp_job_id` int(5) NOT NULL,
  `emp_salary` int(5) NOT NULL,
  `emp_address` varchar(300) NOT NULL,
  `emp_married` tinyint(1) NOT NULL,
  `has_kids` tinyint(3) NOT NULL,
  `emp_gender` tinyint(1) NOT NULL,
  `emp_birthdate` varchar(25) NOT NULL,
  `emp_certificate` varchar(200) NOT NULL,
  `system_sys_users_sys_users_id` int(7) NOT NULL,
  PRIMARY KEY (`emp_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `system_employee`
--

INSERT INTO `system_employee` (`emp_id`, `emp_name`, `emp_email`, `emp_job_id`, `emp_salary`, `emp_address`, `emp_married`, `has_kids`, `emp_gender`, `emp_birthdate`, `emp_certificate`, `system_sys_users_sys_users_id`) VALUES
(1, 'محمد جابر', 'eng.muhammedgaber@yahoo.com', 3, 1800, '3 ش ابن الوز عوام', 1, 0, 2, '25 December- 2013', 'بكالويوس حاسبات ومعلومات', 0),
(2, 'محمود شعبان حسن', 'abo.shaban10@yahoo.com', 1, 700, 'باروط بنى سويف', 2, 0, 1, '10 September- 2013', 'بكالريوس تربية رياضية ', 0);

-- --------------------------------------------------------

--
-- Table structure for table `system_owners`
--

CREATE TABLE IF NOT EXISTS `system_owners` (
  `owner_id` int(7) NOT NULL AUTO_INCREMENT,
  `owner_name` varchar(100) NOT NULL,
  `owner_proportion` double NOT NULL,
  PRIMARY KEY (`owner_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `system_owners`
--

INSERT INTO `system_owners` (`owner_id`, `owner_name`, `owner_proportion`) VALUES
(1, 'احمد حسين', 50.2),
(2, 'هيثم ممدوح', 30.5),
(3, 'رامى ممدوح', 10.7);

-- --------------------------------------------------------

--
-- Table structure for table `system_pages`
--

CREATE TABLE IF NOT EXISTS `system_pages` (
  `page_id` int(11) NOT NULL AUTO_INCREMENT,
  `page_name` varchar(255) NOT NULL,
  PRIMARY KEY (`page_id`),
  UNIQUE KEY `page_name` (`page_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `system_phones`
--

CREATE TABLE IF NOT EXISTS `system_phones` (
  `phone_id` int(11) NOT NULL AUTO_INCREMENT,
  `owner_type` int(2) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `owner_phone` varchar(15) NOT NULL,
  `phone_type` int(3) NOT NULL,
  PRIMARY KEY (`phone_id`),
  KEY `fk_system_phones_system_employee1_idx` (`owner_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `system_sys_users`
--

CREATE TABLE IF NOT EXISTS `system_sys_users` (
  `sys_users_id` int(7) NOT NULL AUTO_INCREMENT,
  `sys_users_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `sys_users_password` varchar(50) CHARACTER SET utf8 NOT NULL,
  `sys_users_type` tinyint(1) NOT NULL,
  `is_blocked` int(1) NOT NULL,
  `user_info` int(5) NOT NULL,
  PRIMARY KEY (`sys_users_id`),
  KEY `fk_system_sys_users_system_employee1_idx` (`user_info`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `system_sys_users`
--

INSERT INTO `system_sys_users` (`sys_users_id`, `sys_users_name`, `sys_users_password`, `sys_users_type`, `is_blocked`, `user_info`) VALUES
(1, 'mohammed', 'e10adc3949ba59abbe56e057f20f883e', 1, 0, 0),
(2, 'hellboy', '9a57acad6a57183e32968f137dcdb4b2', 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `system_traders`
--

CREATE TABLE IF NOT EXISTS `system_traders` (
  `trader_id` int(7) NOT NULL AUTO_INCREMENT,
  `trader_company` varchar(100) NOT NULL,
  `trader_company_address` varchar(255) NOT NULL,
  `trader_type` enum('customer','supplier','both') NOT NULL,
  `trader_category` enum('Wholesaler','half inter') NOT NULL,
  `Creditor` double NOT NULL,
  `Debtor` double NOT NULL,
  PRIMARY KEY (`trader_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `system_traders`
--

INSERT INTO `system_traders` (`trader_id`, `trader_company`, `trader_company_address`, `trader_type`, `trader_category`, `Creditor`, `Debtor`) VALUES
(1, 'الفجر', 'بنى سويف -مصر', 'customer', 'Wholesaler', 0, 0),
(2, 'عهدى الفجر', 'بنى سويف -مصر', 'supplier', 'Wholesaler', 0, 0),
(3, 'يبابتةلةىبالاي', ' fkn d,dt  dgggdg', 'both', 'Wholesaler', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `system_users_privileges`
--

CREATE TABLE IF NOT EXISTS `system_users_privileges` (
  `privilege_id` int(11) NOT NULL AUTO_INCREMENT,
  `page_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `privilege_type` int(11) NOT NULL,
  PRIMARY KEY (`privilege_id`),
  KEY `fk_system_users_privileges_system_sys_users1_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `transactions_invoices_details`
--

CREATE TABLE IF NOT EXISTS `transactions_invoices_details` (
  `transactions_invoices_details_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `product_amount` int(11) DEFAULT NULL,
  `product_price` double DEFAULT NULL,
  `product_description` text,
  `transaction_invoice_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`transactions_invoices_details_id`) USING BTREE,
  KEY `fk_transactions_invoices_details_products1_idx` (`product_id`),
  KEY `fk_transactions_invoices_details_transaction_invoice1_idx` (`transaction_invoice_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `transactions_invoices_details`
--

INSERT INTO `transactions_invoices_details` (`transactions_invoices_details_id`, `product_id`, `product_amount`, `product_price`, `product_description`, `transaction_invoice_id`) VALUES
(1, 1, 1, 10, 'adasd tgfdx hfghgfhfg hfh fdgd d ', 1),
(2, 2, 2, 12, 'xfgdfgfgh dh gsf dgd fhfg jhgsafd g ydg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `transaction_invoice`
--

CREATE TABLE IF NOT EXISTS `transaction_invoice` (
  `transaction_invoice_id` int(11) NOT NULL AUTO_INCREMENT,
  `transaction_time` int(16) DEFAULT NULL,
  `transaction_amount` int(11) DEFAULT NULL,
  `transaction_creator` int(11) DEFAULT NULL,
  PRIMARY KEY (`transaction_invoice_id`) USING BTREE
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `transaction_invoice`
--

INSERT INTO `transaction_invoice` (`transaction_invoice_id`, `transaction_time`, `transaction_amount`, `transaction_creator`) VALUES
(1, 1245879585, 120, 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `discards_products`
--
ALTER TABLE `discards_products`
  ADD CONSTRAINT `fk_discards_products_discards_payment1` FOREIGN KEY (`discard_id`) REFERENCES `discards_payment` (`discard_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_discards_products_products1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `invoices_payment`
--
ALTER TABLE `invoices_payment`
  ADD CONSTRAINT `fk_invoices_payment_purchasing_invoices1` FOREIGN KEY (`invoice_id`) REFERENCES `purchasing_invoices` (`invoice_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `invoices_products`
--
ALTER TABLE `invoices_products`
  ADD CONSTRAINT `fk_invoices_products_products1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_invoices_products_purchasing_invoices1` FOREIGN KEY (`invoice_id`) REFERENCES `purchasing_invoices` (`invoice_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD CONSTRAINT `fk_login_attempts_system_sys_users1` FOREIGN KEY (`users_id`) REFERENCES `system_sys_users` (`sys_users_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `notification_center`
--
ALTER TABLE `notification_center`
  ADD CONSTRAINT `fk_notification_center_notification_type1` FOREIGN KEY (`notification_type`) REFERENCES `notification_type` (`type_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_notification_center_system_sys_users1` FOREIGN KEY (`notifcation_sender`) REFERENCES `system_sys_users` (`sys_users_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_notification_center_system_sys_users2` FOREIGN KEY (`notification_receiver`) REFERENCES `system_sys_users` (`sys_users_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_products_system_sys_users1` FOREIGN KEY (`product_adder`) REFERENCES `system_sys_users` (`sys_users_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `products_store`
--
ALTER TABLE `products_store`
  ADD CONSTRAINT `fk_products_store_products1` FOREIGN KEY (`Product_id`) REFERENCES `products` (`product_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sales_invoices_info`
--
ALTER TABLE `sales_invoices_info`
  ADD CONSTRAINT `fk_sales_invoices_info_products1` FOREIGN KEY (`Product_id`) REFERENCES `products` (`product_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `invoices_invoices_info` FOREIGN KEY (`invoice_id`) REFERENCES `sales_invoices` (`invoice_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `system_customer`
--
ALTER TABLE `system_customer`
  ADD CONSTRAINT `fk_system_customer_system_phones1` FOREIGN KEY (`customer_id`) REFERENCES `system_phones` (`owner_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_system_customer_system_sys_users1` FOREIGN KEY (`customer_id`) REFERENCES `system_sys_users` (`user_info`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `system_owners`
--
ALTER TABLE `system_owners`
  ADD CONSTRAINT `fk_system_owners_system_phones1` FOREIGN KEY (`owner_id`) REFERENCES `system_phones` (`owner_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_system_owners_system_sys_users1` FOREIGN KEY (`owner_id`) REFERENCES `system_sys_users` (`user_info`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `system_phones`
--
ALTER TABLE `system_phones`
  ADD CONSTRAINT `fk_system_phones_system_employee1` FOREIGN KEY (`owner_id`) REFERENCES `system_employee` (`emp_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `system_sys_users`
--
ALTER TABLE `system_sys_users`
  ADD CONSTRAINT `fk_system_sys_users_system_employee1` FOREIGN KEY (`user_info`) REFERENCES `system_employee` (`emp_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `system_traders`
--
ALTER TABLE `system_traders`
  ADD CONSTRAINT `fk_system_traders_system_phones1` FOREIGN KEY (`trader_id`) REFERENCES `system_phones` (`owner_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_system_traders_system_sys_users1` FOREIGN KEY (`trader_id`) REFERENCES `system_sys_users` (`user_info`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `system_users_privileges`
--
ALTER TABLE `system_users_privileges`
  ADD CONSTRAINT `fk_system_users_privileges_system_sys_users1` FOREIGN KEY (`user_id`) REFERENCES `system_sys_users` (`sys_users_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `transactions_invoices_details`
--
ALTER TABLE `transactions_invoices_details`
  ADD CONSTRAINT `fk_transactions_invoices_details_transaction_invoice1` FOREIGN KEY (`transaction_invoice_id`) REFERENCES `transaction_invoice` (`transaction_invoice_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_transactions_invoices_details_products1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
