-- phpMyAdmin SQL Dump
-- version 4.0.10.14
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Aug 16, 2016 at 09:57 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `marufme_pristha`
--

-- --------------------------------------------------------

--
-- Table structure for table `bba`
--

CREATE TABLE IF NOT EXISTS `bba` (
  `id` bigint(20) NOT NULL,
  `title` text NOT NULL,
  `text` text NOT NULL,
  `price` text NOT NULL,
  `phone` text NOT NULL,
  `date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `CSE`
--

CREATE TABLE IF NOT EXISTS `CSE` (
  `id` bigint(20) NOT NULL,
  `title` text NOT NULL,
  `text` text NOT NULL,
  `price` text NOT NULL,
  `phone` text NOT NULL,
  `date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `CSE`
--

INSERT INTO `CSE` (`id`, `title`, `text`, `price`, `phone`, `date`) VALUES
(1, 'Introduction to Algorithms', 'Author:  Charles E. Leiserson', '100', '01630891595', '2016-08-16'),
(2, 'The Art of Computer Programming', 'Author: Donald Knuth', '200', '01630891595', '2016-08-16');

-- --------------------------------------------------------

--
-- Table structure for table `fiction`
--

CREATE TABLE IF NOT EXISTS `fiction` (
  `id` bigint(20) NOT NULL,
  `title` text NOT NULL,
  `text` text NOT NULL,
  `price` text NOT NULL,
  `phone` text NOT NULL,
  `date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `magazine`
--

CREATE TABLE IF NOT EXISTS `magazine` (
  `id` bigint(20) NOT NULL,
  `title` text NOT NULL,
  `text` text NOT NULL,
  `price` text NOT NULL,
  `phone` text NOT NULL,
  `date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mathematics`
--

CREATE TABLE IF NOT EXISTS `mathematics` (
  `id` bigint(20) NOT NULL,
  `title` text NOT NULL,
  `text` text NOT NULL,
  `price` text NOT NULL,
  `phone` text NOT NULL,
  `date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `medical`
--

CREATE TABLE IF NOT EXISTS `medical` (
  `id` bigint(20) NOT NULL,
  `title` text NOT NULL,
  `text` text NOT NULL,
  `price` text NOT NULL,
  `phone` text NOT NULL,
  `date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `others`
--

CREATE TABLE IF NOT EXISTS `others` (
  `id` bigint(20) NOT NULL,
  `title` text NOT NULL,
  `text` text NOT NULL,
  `price` text NOT NULL,
  `phone` text NOT NULL,
  `date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reference`
--

CREATE TABLE IF NOT EXISTS `reference` (
  `id` bigint(20) NOT NULL,
  `title` text NOT NULL,
  `text` text NOT NULL,
  `price` text NOT NULL,
  `phone` text NOT NULL,
  `date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
