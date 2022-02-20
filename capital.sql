-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 20, 2022 at 12:42 PM
-- Server version: 8.0.24
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `capital`
--

-- --------------------------------------------------------

--
-- Table structure for table `o_email_log`
--

DROP TABLE IF EXISTS `o_email_log`;
CREATE TABLE IF NOT EXISTS `o_email_log` (
  `id` int NOT NULL AUTO_INCREMENT,
  `subject` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` blob NOT NULL,
  `user_id` int NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `o_email_log`
--

INSERT INTO `o_email_log` (`id`, `subject`, `content`, `user_id`, `email`, `status`, `created_on`, `created_by`) VALUES
(1, 'Account Created', '', 1, 'test@sfd.df', 0, '2022-02-01 23:12:53', 0),
(2, 'Account Created', '', 1, 'test@sfd.df', 0, '2022-02-20 10:37:19', 0),
(3, 'Account Created', '', 1, 'test@sfd.df', 0, '2022-02-20 10:37:25', 0),
(4, 'Account Created', '', 1, 'test@sfd.df', 0, '2022-02-20 10:38:31', 0),
(5, 'Account Created', '', 1, 'test@sfd.df', 1, '2022-02-20 11:15:10', 0),
(6, 'Account Created', '', 1, 'test@sfd.df', 1, '2022-02-20 11:23:38', 0),
(7, 'Account Created', '', 1, 'test@sfd.df', 1, '2022-02-20 11:25:09', 0),
(8, 'Account Created', 0x5a474e6b5979426b5932526a, 1, 'test@sfd.df', 1, '2022-02-20 12:10:10', 0),
(9, 'Account Created', 0x5a474e6b5979426b5932526a65794a6d626d46745a534936496d3568625755694c434a73626d46745a534936496d466962323976496977695a573168615777694f694a305a584e3051484e6d5a43356b5a694a39, 1, 'test@sfd.df', 1, '2022-02-20 12:10:44', 0),
(10, 'Account Created', 0x5a474e6b5979426b5932526a44517037496d5a755957316c496a6f69626d46745a534973496d78755957316c496a6f6959574a76623238694c434a6c6257467062434936496e526c6333524163325a6b4c6d526d496e303d, 1, 'test@sfd.df', 1, '2022-02-20 12:11:09', 0),
(11, 'Account Created', 0x5a474e6b5979426b5932526a436e73695a6d3568625755694f694a755957316c4969776962473568625755694f694a68596d397662794973496d567459576c73496a6f696447567a6445427a5a6d51755a47596966513d3d, 1, 'test@sfd.df', 1, '2022-02-20 12:15:15', 0),
(12, 'Account Created', 0x5a474e6b5979426b5932526a44517037496d5a755957316c496a6f69626d46745a534973496d78755957316c496a6f6959574a76623238694c434a6c6257467062434936496e526c6333524163325a6b4c6d526d496e303d, 1, 'test@sfd.df', 1, '2022-02-20 12:15:40', 0),
(13, 'Account Created', 0x5a474e6b5979426b5932526a44516f38596e492b65794a6d626d46745a534936496d3568625755694c434a73626d46745a534936496d466962323976496977695a573168615777694f694a305a584e3051484e6d5a43356b5a694a39, 1, 'test@sfd.df', 1, '2022-02-20 12:16:02', 0),
(14, 'Account Created', 0x5a474e6b5979426b5932526a44516f38596e492b44517037496d5a755957316c496a6f69626d46745a534973496d78755957316c496a6f6959574a76623238694c434a6c6257467062434936496e526c6333524163325a6b4c6d526d496e303d, 1, 'test@sfd.df', 1, '2022-02-20 12:20:29', 0),
(15, 'Account Created', 0x5a474e6b5979426b5932526a44516f38596e492b44517037496d5a755957316c496a6f69626d46745a534973496d78755957316c496a6f6959574a76623238694c434a6c6257467062434936496e526c6333524163325a6b4c6d526d496e303d, 1, 'test@sfd.df', 1, '2022-02-20 12:27:42', 0),
(16, 'Account Created', 0x5a474e6b5979426b5932526a44516f38596e492b44517037496d5a755957316c496a6f69626d46745a534973496d78755957316c496a6f6959574a76623238694c434a6c6257467062434936496e526c6333524163325a6b4c6d526d496e303d, 1, 'test@sfd.df', 1, '2022-02-20 12:28:05', 0),
(17, 'Account Created', 0x5a474e6b5979426b5932526a44516f38596e492b44517037496d5a755957316c496a6f69626d46745a534973496d78755957316c496a6f6959574a76623238694c434a6c6257467062434936496e526c6333524163325a6b4c6d526d496e303d, 1, 'test@sfd.df', 1, '2022-02-20 12:33:09', 0),
(18, 'Account Created', 0x5a474e6b5979426b5932526a44516f38596e492b44517037496d5a755957316c496a6f69626d46745a534973496d78755957316c496a6f6959574a76623238694c434a6c6257467062434936496e526c6333524163325a6b4c6d526d496e303d, 1, 'test@sfd.df', 1, '2022-02-20 12:37:56', 0),
(19, 'Account Created', 0x5a474e6b5979426b5932526a44516f38596e492b44517037496d5a755957316c496a6f69626d46745a534973496d78755957316c496a6f6959574a76623238694c434a6c6257467062434936496e526c6333524163325a6b4c6d526d496e303d, 1, 'test@sfd.df', 1, '2022-02-20 12:41:28', 0),
(20, 'Account Created', 0x5a474e6b5979426b5932526a44516f38596e492b44517037496d5a755957316c496a6f69626d46745a534973496d78755957316c496a6f6959574a76623238694c434a6c6257467062434936496e526c6333524163325a6b4c6d526d496e303d, 1, 'test@sfd.df', 1, '2022-02-20 12:41:45', 0);

-- --------------------------------------------------------

--
-- Table structure for table `o_notify`
--

DROP TABLE IF EXISTS `o_notify`;
CREATE TABLE IF NOT EXISTS `o_notify` (
  `id` int NOT NULL AUTO_INCREMENT,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alert` tinyint NOT NULL,
  `email` tinyint NOT NULL,
  `sms` tinyint NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `o_notify`
--

INSERT INTO `o_notify` (`id`, `type`, `alert`, `email`, `sms`) VALUES
(1, 'user register', 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `o_users`
--

DROP TABLE IF EXISTS `o_users`;
CREATE TABLE IF NOT EXISTS `o_users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(254) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `f_name` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `l_name` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `status` int NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int NOT NULL,
  `modified_on` datetime NOT NULL,
  `modified_by` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  KEY `emial` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `o_users`
--

INSERT INTO `o_users` (`id`, `email`, `password`, `f_name`, `l_name`, `country`, `city`, `status`, `created_on`, `created_by`, `modified_on`, `modified_by`) VALUES
(1, 'm.abooali@hotmail.com', '~Q!w2e3r4', 'Milad', 'Abooali', 'IR', 'Shiraz', 0, '2022-01-30 11:16:38', 0, '0000-00-00 00:00:00', 0),
(5, 'm.abooali@hotmail.com5', '~Q1w2e3r4', 'Milad', 'Abooali', 'IR', 'Shiraz', 0, '2022-01-30 11:16:38', 0, '0000-00-00 00:00:00', 0),
(6, 'm.abooasli@hotmail.coms', '~Q1w2e3r4', 'Milad', 'Abooali', 'IR', 'Shiraz', 0, '2022-01-30 11:16:38', 0, '0000-00-00 00:00:00', 0),
(7, 'm.abooagli@hotmail.com', '~Q1w2e3r4', 'Milad', 'Abooali', 'IR', 'Shiraz', 0, '2022-01-30 11:16:38', 0, '0000-00-00 00:00:00', 0),
(8, 'test@test.com', '~Q1w2e3r4', 'Milad', 'Abooali', 'IR', 'Shiraz', 0, '2022-01-30 11:16:38', 0, '0000-00-00 00:00:00', 0),
(9, 'test@terst.com', '$2y$10$vNjtb1L1p3ZjBJMfVgCkxuYdMc5C.7fBVrRb.5PKwdQM.GUuLJv/.', 'Milad', 'Abooali', 'IR', 'Shiraz', 0, '2022-01-30 11:16:38', 0, '0000-00-00 00:00:00', 0),
(10, 'gtest@terst.com', '$2y$10$Ovlb/ontx1xiwNDOxdcWq.0aWDx5AiuOWSKsJJLqN1w4puG24yUZa', 'Milad', 'Abooali', 'IR', 'Shiraz', 0, '2022-01-30 11:16:38', 0, '0000-00-00 00:00:00', 0),
(11, 'test@foo.com', '$2y$10$gly.SyG69AjgCFV2uugEf.HiuOzA6BG8sXfcQeNgWLde7PTLRmrZ6', 'Milad', 'Abooali', 'IR', 'Shiraz', 0, '2022-01-30 11:16:38', 0, '0000-00-00 00:00:00', 0),
(12, 'dfdsf@dsfdfdf.df', '$2y$10$nthpV1y4ahro2Dx5SIzbC.kdmReBNnviMJV66Fk4Frlnf2IB9vlTG', 'Ali', 'Test', 'FK', 'ffefe', 0, '2022-01-30 12:28:29', 0, '0000-00-00 00:00:00', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
