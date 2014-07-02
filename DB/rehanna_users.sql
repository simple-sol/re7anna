-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2014 at 04:10 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rehanna_users`
--

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE IF NOT EXISTS `login_attempts` (
  `sys_users_id` int(11) NOT NULL AUTO_INCREMENT,
  `attempts` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  PRIMARY KEY (`sys_users_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `login_attempts`
--

INSERT INTO `login_attempts` (`sys_users_id`, `attempts`, `time`) VALUES
(1, 7, 1404030743),
(2, 9, 1404049275);

--
-- Triggers `login_attempts`
--
DROP TRIGGER IF EXISTS `Block_check`;
DELIMITER //
CREATE TRIGGER `Block_check` AFTER UPDATE ON `login_attempts`
 FOR EACH ROW BEGIN

IF NEW.`attempts` >= 7
THEN
UPDATE `rehanna_sys_users` SET `is_blocked` = 1
WHERE `sys_users_id` = NEW.`sys_users_id`;
END IF;

END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `rehanna_customer`
--

CREATE TABLE IF NOT EXISTS `rehanna_customer` (
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
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `rehanna_customer`
--

INSERT INTO `rehanna_customer` (`customer_id`, `customer_name`, `customer_phone`, `customer_job`, `customer_age`, `customer_gender`, `customer_married`, `customer_job_period`, `customer_favorites_category`, `customer_favorites_type`, `customer_favorites_concentration`) VALUES
(1, '', '0', '', '30', 'male', 0, 'day', 'casual', 'fruits', 'medium'),
(2, '', '0', '', '-20', 'male', 0, 'day', 'casual', 'fruits', 'light'),
(3, '', '1202220620', 'mental', '20', 'male', 0, 'day', 'casual', 'fruits', 'light'),
(4, '', '01202220620', 'muscular', '50', 'female', 0, 'day', 'classic', 'organic', 'light'),
(5, 'سوسو حسين', '01203330630', 'mental', '30', 'female', 0, 'day', 'casual', 'flowers', 'light'),
(6, 'نتبنبتنلنبت ننتن', '01003778899', 'mental', '50', 'female', 0, 'night', 'classic', 'organic', 'medium');

-- --------------------------------------------------------

--
-- Table structure for table `rehanna_employee`
--

CREATE TABLE IF NOT EXISTS `rehanna_employee` (
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
  PRIMARY KEY (`emp_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `rehanna_employee`
--

INSERT INTO `rehanna_employee` (`emp_id`, `emp_name`, `emp_email`, `emp_job_id`, `emp_salary`, `emp_address`, `emp_married`, `has_kids`, `emp_gender`, `emp_birthdate`, `emp_certificate`) VALUES
(1, 'محمد جابر', 'eng.muhammedgaber@yahoo.com', 3, 1800, '3 ش ابن الوز عوام', 1, 0, 2, '25 December- 2013', 'بكالويوس حاسبات ومعلومات'),
(2, 'محمود شعبان حسن', 'abo.shaban10@yahoo.com', 1, 700, 'باروط بنى سويف', 2, 0, 1, '10 September- 2013', 'بكالريوس تربية رياضية ');

-- --------------------------------------------------------

--
-- Table structure for table `rehanna_owners`
--

CREATE TABLE IF NOT EXISTS `rehanna_owners` (
  `owner_id` int(7) NOT NULL AUTO_INCREMENT,
  `owner_name` varchar(100) NOT NULL,
  `owner_proportion` double NOT NULL,
  PRIMARY KEY (`owner_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `rehanna_owners`
--

INSERT INTO `rehanna_owners` (`owner_id`, `owner_name`, `owner_proportion`) VALUES
(1, 'احمد حسين', 50.2),
(2, 'هيثم ممدوح', 30.5),
(3, 'رامى ممدوح', 10.7);

-- --------------------------------------------------------

--
-- Table structure for table `rehanna_sys_users`
--

CREATE TABLE IF NOT EXISTS `rehanna_sys_users` (
  `sys_users_id` int(7) NOT NULL AUTO_INCREMENT,
  `sys_users_name` varchar(255) NOT NULL,
  `sys_users_password` varchar(50) NOT NULL,
  `sys_users_type` tinyint(1) NOT NULL,
  `is_blocked` int(1) NOT NULL,
  PRIMARY KEY (`sys_users_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `rehanna_sys_users`
--

INSERT INTO `rehanna_sys_users` (`sys_users_id`, `sys_users_name`, `sys_users_password`, `sys_users_type`, `is_blocked`) VALUES
(1, 'mohammed', 'e10adc3949ba59abbe56e057f20f883e', 1, 0),
(2, 'hellboy', '9a57acad6a57183e32968f137dcdb4b2', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `rehanna_traders`
--

CREATE TABLE IF NOT EXISTS `rehanna_traders` (
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
-- Dumping data for table `rehanna_traders`
--

INSERT INTO `rehanna_traders` (`trader_id`, `trader_company`, `trader_company_address`, `trader_type`, `trader_category`, `Creditor`, `Debtor`) VALUES
(1, 'الفجر', 'بنى سويف -مصر', 'customer', 'Wholesaler', 0, 0),
(2, 'عهدى الفجر', 'بنى سويف -مصر', 'supplier', 'Wholesaler', 0, 0),
(3, 'يبابتةلةىبالاي', ' fkn d,dt  dgggdg', 'both', 'Wholesaler', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `rehanna_users_privileges`
--

CREATE TABLE IF NOT EXISTS `rehanna_users_privileges` (
  `privilege_id` int(11) NOT NULL AUTO_INCREMENT,
  `page_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `privilege_type` int(11) NOT NULL,
  PRIMARY KEY (`privilege_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`127.0.0.1` EVENT `event_test` ON SCHEDULE EVERY 1 DAY STARTS '2014-04-05 12:17:21' ENDS '2014-04-25 14:23:38' ON COMPLETION PRESERVE DISABLE COMMENT 'event' DO INSERT INTO `rehanna_products`.`perfumes_brand` (`brand_id`, `brand_name`, `brand_company`) VALUES (NULL, 'd', '3')$$

DELIMITER ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
