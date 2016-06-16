-- phpMyAdmin SQL Dump
-- version 4.2.5
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Jun 19, 2015 at 09:19 AM
-- Server version: 5.5.38
-- PHP Version: 5.5.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `phonegap_demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `phonegap_login`
--

CREATE TABLE `phonegap_login` (
`reg_id` int(1) NOT NULL,
  `reg_date` varchar(20) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `phonegap_login`
--
ALTER TABLE `phonegap_login`
 ADD PRIMARY KEY (`reg_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `phonegap_login`
--
ALTER TABLE `phonegap_login`
MODIFY `reg_id` int(1) NOT NULL AUTO_INCREMENT;