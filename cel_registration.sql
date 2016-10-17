-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2016 at 12:57 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cel_registration`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `Id` varchar(50) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `gpass` varchar(50) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Id`, `Name`, `Password`, `gpass`) VALUES
('cmd@celindia.co.in', 'Nalin', '2c50ff43dc6e25abd21e21486d38b791', 'REDBLUEGREEN');

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE IF NOT EXISTS `log` (
  `serial` int(100) NOT NULL AUTO_INCREMENT,
  `email` varchar(30) NOT NULL,
  `name` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  UNIQUE KEY `serial` (`serial`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`serial`, `email`, `name`, `date`, `time`) VALUES
(1, 'prashant@gmail.com', 'Prashant Singh', '2016-10-17', '03:36:52'),
(2, 'prashant@gmail.com', 'Prashant Singh', '2016-10-17', '03:39:49'),
(3, 'yatharth@gmail.com', 'Yatharth Singhal', '2016-10-17', '03:57:46'),
(4, 'sonali@gmail.com', 'Sonali Mittal', '2016-10-17', '04:11:53'),
(5, 'yatharth@gmail.com', 'Yatharth Singhal', '2016-10-17', '04:22:40');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE IF NOT EXISTS `register` (
  `Fname` varchar(20) NOT NULL,
  `Lname` varchar(20) NOT NULL,
  `Id` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Division` varchar(20) NOT NULL,
  `Verified` varchar(1) NOT NULL DEFAULT '0',
  `Approved` varchar(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`Fname`, `Lname`, `Id`, `Password`, `Division`, `Verified`, `Approved`) VALUES
('Aditya', 'Joshi', 'aditya@gmail.com', '8b019af0a1de935cc5e76d804967d51a', 'FAD', '0', '0'),
('Advika', 'Gupta', 'advika@gmail.com', 'b57b3c96809aa1c418e2491cc40fab1a', 'SPD', '1', '0'),
('Archit', 'Vishnoi', 'archit@gmail.com', 'bbd3808391123961ae31dc63b9f7f2c6', 'MMD', '1', '1'),
('Bhavyam', 'Goyal', 'bhavyam@gmail.com', '48cf7eb901352684693db2108b99f203', 'MED', '1', '0'),
('Dwaipayan', 'Saha', 'dopu@gmail.com', '7f6458209e8630236945bea70a1cf812', 'HRD', '1', '0'),
('Hamza', 'Khan', 'hamza@gmail.com', '28936322a5eb164c9ced5a0166f93f15', 'SPV', '1', '1'),
('Nitin', 'Shrivastava', 'nitin@gmail.com', '321187022244b2e2ef92eb573fa11178', 'SPV', '0', '0'),
('Parv', 'Saxena', 'parv@gmail.com', '6b1e8e4ab110e3094ab39b41e9e93343', 'FAD', '0', '0'),
('Prashant', 'Singh', 'prashant@gmail.com', '739841660ed89466b7f6652e3d5676a7', 'HRD', '1', '1'),
('Rahul', 'Kedia', 'rahul@gmail.com', '2acb7811397a5c3bea8cba57b0388b79', 'MMD', '0', '0'),
('Siddarth', 'Chauhan', 'siddharth@gmail.com', '4352a1c6b093e1ffadf57ce91302d3ca', 'FAD', '0', '0'),
('Sonali', 'Mittal', 'sonali@gmail.com', 'c8f8588cad16f44a22f0fb216691f666', 'ECD', '1', '1'),
('Sumit', 'Garg', 'sumit@gmail.com', 'f9598c2dd34ad2c3f75c05278b6f442f', 'SPD', '0', '0'),
('Utkarsh', 'Shekhar', 'utkarsh@gmail.com', '6f99e6afb88838e4993748741efea383', 'MED', '0', '0'),
('Yatharth', 'Singhal', 'yatharth@gmail.com', '6813fcec7a474459451c7615759ee526', 'HRD', '1', '1');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
