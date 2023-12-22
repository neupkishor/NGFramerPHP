-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/

--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2023 at 11:49 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Main code starts here.

-- --------------------------------------------------------

-- Database: `neup_accounts`
CREATE DATABASE if NOT EXISTS `neup_accounts`;
USE `neup_accounts`;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;


-- --------------------------------------------------------

-- Table structure for table `account_type`
CREATE TABLE IF NOT EXISTS `account_type` (
  `accountId` int(11) NOT NULL,
  `type` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Indexes for table `account_type`
ALTER TABLE `account_type`
  ADD PRIMARY KEY (`accountId`);

-- AUTO_INCREMENT for table `account_type`
ALTER TABLE `account_type`
  MODIFY `accountId` int(11) NOT NULL AUTO_INCREMENT;

-- --------------------------------------------------------

-- Table structure for table `account_neupid`
CREATE TABLE  IF NOT EXISTS `account_neupid` (
  `id` int(11) NOT NULL,
  `neupId` varchar(63) DEFAULT NULL,
  `accountId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Indexes for table `account_neupid`
ALTER TABLE `account_neupid`
  ADD PRIMARY KEY (`id`),
  ADD KEY `accountId` (`accountId`);

-- AUTO_INCREMENT for table `account_neupid`
ALTER TABLE `account_neupid`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

-- Constraints for table `account_neupid`
ALTER TABLE `account_neupid`
  ADD CONSTRAINT `FK_accountNeupid_accountType` FOREIGN KEY (`accountId`) REFERENCES `account_type` (`accountId`);

-- --------------------------------------------------------

-- Table structure for table `account_detail`
CREATE TABLE  IF NOT EXISTS `account_detail` (
  `accountId` int(11) NOT NULL,
  `displayName` varchar(63) DEFAULT NULL,
  `displayImage` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Indexes for table `account_detail`
ALTER TABLE `account_detail`
  ADD PRIMARY KEY (`accountId`);

-- Constraints for table `account_detail`
ALTER TABLE `account_detail`
  ADD CONSTRAINT `FK_accountDetail_accountType` FOREIGN KEY (`accountId`) REFERENCES `account_type` (`accountId`);

-- --------------------------------------------------------

-- Table structure for table `account__indiv_detail`
CREATE TABLE IF NOT EXISTS `account__indiv_detail` (
  `accountId` int(11) NOT NULL,
  `firstName` varchar(63) DEFAULT NULL,
  `middleName` varchar(63) DEFAULT NULL,
  `lastName` varchar(63) DEFAULT NULL,
  `gender` varchar(63) DEFAULT NULL,
  `birthDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Indexes for table `account__indiv_detail`
ALTER TABLE `account__indiv_detail`
  ADD PRIMARY KEY (`accountId`);

-- Constraints for table `account__indiv_detail`
ALTER TABLE `account__indiv_detail`
  ADD CONSTRAINT `FK_accountIndivDetail_accountType` FOREIGN KEY (`accountId`) REFERENCES `account_type` (`accountId`);

-- --------------------------------------------------------

-- Table structure for table `account__brand_detail`
CREATE TABLE IF NOT EXISTS `account__brand_detail` (
  `accountId` int(11) NOT NULL,
  `legalName` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Indexes for table `account__brand_detail`
ALTER TABLE `account__brand_detail`
  ADD PRIMARY KEY (`accountId`);

-- Constraints for table `account__brand_detail`
ALTER TABLE `account__brand_detail`
  ADD CONSTRAINT `FK_accountBrandDetail_accountType` FOREIGN KEY (`accountId`) REFERENCES `account_type` (`accountId`);

-- --------------------------------------------------------

-- Table structure for table `account__dependent_detail`
CREATE TABLE IF NOT EXISTS `account__dependent_detail` (
  `accountId` int(11) NOT NULL,
  `firstName` varchar(63) DEFAULT NULL,
  `middleName` varchar(63) DEFAULT NULL,
  `lastName` varchar(63) DEFAULT NULL,
  `gender` varchar(63) DEFAULT NULL,
  `birthDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Indexes for table `account__dependent_detail`
ALTER TABLE `account__dependent_detail`
  ADD PRIMARY KEY (`accountId`);

-- Constraints for table `account__dependent_detail`
ALTER TABLE `account__dependent_detail`
  ADD CONSTRAINT `FK_accountDependentDetail_accountType` FOREIGN KEY (`accountId`) REFERENCES `account_type` (`accountId`);

-- --------------------------------------------------------

-- Table structure for table `account_manager`
CREATE TABLE IF NOT EXISTS `account_manager` (
  `id` int(11) NOT NULL,
  `accountId` int(11) DEFAULT NULL,
  `managingAccount` int(11) DEFAULT NULL,
  `permission` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Indexes for table `account_manager`
ALTER TABLE `account_manager`
  ADD PRIMARY KEY (`id`);

-- AUTO_INCREMENT for table `account_manager`
ALTER TABLE `account_manager`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

-- Constraints for table `account_manager`
ALTER TABLE `account_manager`
  ADD CONSTRAINT `FK_accountManager_accountType` FOREIGN KEY (`accountId`) REFERENCES `account_type` (`accountId`);
ALTER TABLE `account_manager`
  ADD CONSTRAINT `FK_accountManager_accountIndivDetail` FOREIGN KEY (`managingAccount`) REFERENCES `account__indiv_detail` (`accountId`);

-- --------------------------------------------------------

-- Table structure for table `account_contact`
CREATE TABLE IF NOT EXISTS `account_contact` (
  `id` int(11) NOT NULL,
  `accountId` int(11) DEFAULT NULL,
  `detail` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Indexes for table `account_manager`
ALTER TABLE `account_contact`
  ADD PRIMARY KEY (`id`),
  ADD KEY `accountId` (`accountId`);

-- AUTO_INCREMENT for table `account_contact`
ALTER TABLE `account_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

-- Constraints for table `account_contact`
ALTER TABLE `account_contact`
  ADD CONSTRAINT `FK_accountContact_accountType` FOREIGN KEY (`accountId`) REFERENCES `account_type` (`accountId`);

-- --------------------------------------------------------

-- Table structure for table `auth_credential`
CREATE TABLE IF NOT EXISTS `auth_credential` (
  `accountId` int(11) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `2ndAuth` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Indexes for table `auth_credential`
ALTER TABLE `auth_credential`
  ADD PRIMARY KEY (`accountId`);

-- Constraints for table `auth_credential`
ALTER TABLE `auth_credential`
  ADD CONSTRAINT `FK_authCredential_accountIndivDetail` FOREIGN KEY (`accountId`) REFERENCES `account__indiv_detail` (`accountId`);

-- --------------------------------------------------------

-- Table structure for table `auth_otp`
CREATE TABLE IF NOT EXISTS `auth_otp` (
  `accountId` int(11) NOT NULL,
  `type` varchar(15) DEFAULT NULL,
  `tokenKey` varchar(63) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Indexes for table `auth_otp`
ALTER TABLE `auth_otp`
  ADD PRIMARY KEY (`accountId`);

-- Constraints for table `auth_otp`
ALTER TABLE `auth_otp`
  ADD CONSTRAINT `FK_authOtp_authCredential` FOREIGN KEY (`accountId`) REFERENCES `auth_credential` (`accountId`);

-- --------------------------------------------------------

-- Table structure for table `auth_session`
CREATE TABLE IF NOT EXISTS `auth_session` (
  `id` int(11) NOT NULL,
  `accountId` int(11) DEFAULT NULL,
  `sessionKey` varchar(255) DEFAULT NULL,
  `ipAddress` varchar(255) DEFAULT NULL,
  `userAgent` varchar(255) DEFAULT NULL,
  `isExpired` tinyint(1) DEFAULT NULL,
  `expiresOn` datetime DEFAULT NULL,
  `lastLoggedIn` datetime DEFAULT NULL,
  `loginType` varchar(255) DEFAULT NULL,
  `loginDetail` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Indexes for table `auth_session`
ALTER TABLE `auth_session`
  ADD PRIMARY KEY (`id`),
  ADD KEY `accountId` (`accountId`);

-- AUTO_INCREMENT for table `auth_session`
ALTER TABLE `auth_session`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

-- Constraints for table `auth_session`
ALTER TABLE `auth_session`
  ADD CONSTRAINT `FK_authSession_authCredential` FOREIGN KEY (`accountId`) REFERENCES `auth_credential` (`accountId`);

-- --------------------------------------------------------

COMMIT;

-- --------------------------------------------------------

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
