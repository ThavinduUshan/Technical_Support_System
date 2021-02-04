-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2021 at 04:25 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tech_support`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `adminId` int(11) NOT NULL,
  `adminName` varchar(128) NOT NULL,
  `adminEmail` varchar(128) NOT NULL,
  `adminPwd` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`adminId`, `adminName`, `adminEmail`, `adminPwd`) VALUES
(1, 'ucsc', 'ucsc@gmail.com', '$2y$10$9FW86I/gwTU0rNtB7BeBmelLWxeOD7zSPQRPfMspyIyermRO/RF/.'),
(2, 'Thavindu', 'thavindu@gmail.com', '$2y$10$3xYdg0b6cODGyghygO4QRO4gBkGCQYmjCjA0WnFiyz1qAG/xysqoq'),
(3, 'admin', 'admin@site.com', '$2y$10$M6A6AYzsZTS.Xu9vL.6kdOi/k5mjJHGo7Owgz7kO8/GcvhY8qhAyW');

-- --------------------------------------------------------

--
-- Table structure for table `issues`
--

CREATE TABLE `issues` (
  `usersId` int(11) DEFAULT NULL,
  `issuesId` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `description` longtext NOT NULL,
  `status` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `issues`
--

INSERT INTO `issues` (`usersId`, `issuesId`, `title`, `description`, `status`) VALUES
(2, 2, 'Error message is showing when running!', 'Below error message is showing when I start the program\r\nERROR_INVALID_FUNCTION\r\nPlease resolve this as soon as possible.\r\nThanks.', 'pending'),
(6, 3, 'Some functions are not working', 'After the installation, I cheked the software and I found that some functions are not working properly.', 'pending'),
(3, 6, 'Installation error!', 'Incorrect function. [ERROR_INVALID_FUNCTION (0x1)]', 'pending'),
(3, 8, 'Runtime error 2!', 'I also get this error code when running!\r\nThe system cannot find the file specified. [ERROR_FILE_NOT_FOUND (0x2)]', 'pending'),
(4, 9, 'Machine get stuck', 'On running time, machine get stuck', 'pending'),
(4, 10, 'Cant find the solution panel', 'I can\'t find the solution panel on the program!.', 'pending'),
(4, 11, 'I got the below error when running!', 'Session Expired. Check the value of the Authorization HTTP request header.', 'pending'),
(5, 12, 'I got the following error!', 'The OAuth token was received in the query string, which this API forbids for response formats other than JSON or XML. If possible, try sending the OAuth token in the Authorization header instead.', 'pending'),
(5, 13, 'BAD_REQUEST (400)', 'The content type of the request data or the content type of a part of a multipart request is not supported.', 'pending'),
(6, 14, 'keyInvalid', 'The API key provided in the request is invalid, which means the API server is unable to check the quota limit for the application making the request. Use the Google Developers Console to find your API key or to obtain one.', 'pending'),
(12, 15, '401 Unauthorized', 'This error displays \" The 401 status code, or an Unauthorized error\"', 'pending'),
(12, 16, '504 Gateway Timeout', 'This error shows when software is running!', 'pending'),
(14, 17, 'The HTTP 403 Forbidden ', 'The HTTP 403 Forbidden ', 'pending'),
(17, 18, 'I got this error!', 'The HTTP 403 Forbidden client error status response code indicates that the server understood the request but refuses to authorize it.', 'pending'),
(17, 19, 'How do i fix error 403', 'I got this error!', 'pending'),
(20, 20, 'Error code 400', 'Resource type requested does not exist (e.g. if you requested \'miletsone\' instead of \'milestone\').', 'pending'),
(20, 21, 'HTTP 200K', 'The HTTP 200 OK success status response code indicates that the request has succeeded. ... The meaning of a success depends on the HTTP request method: GET :', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `usersId` int(11) NOT NULL,
  `usersName` varchar(128) NOT NULL,
  `usersEmail` varchar(128) NOT NULL,
  `usersPhone` varchar(128) NOT NULL,
  `usersPwd` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`usersId`, `usersName`, `usersEmail`, `usersPhone`, `usersPwd`) VALUES
(1, 'ucsc', 'ucsc@gmail.com', '0112233456', '$2y$10$5i0AJIgMsCQzaZdOVDDsm.uqYtIX9a6k0vjYzEyl1gOzcRoLt5ThG'),
(2, 'Thavindu', 'thavindu@gmail.com', '0129876453', '$2y$10$RNToThaSuCsbU6yjFQ67cebVmNYxZXmJtJLG9nIfc2IBHDdBhfA8C'),
(3, 'Kamani', 'kamani123@gamil.com', '0786543768', '$2y$10$eZADowFtBV1EwUptXZkh..YJ6P/f/S22tJMmb.IR4YIf0xAg5o3QO'),
(4, 'Selvanathan', 'selavanathang.98@gmail.com', '098789325', '$2y$10$FHWsUIU/97C7Y1vxvN4tQuOtNc8yL9Vo/1FAopar4pJtppsePZi/m'),
(5, 'Sameera', 'sameera.gallage@gmail.com', '0326785456', '$2y$10$nbXVVGSMvVCe1tHE5FH1OOVodLfvBN0TwDX2sV8qq6HJY7WbHSjju'),
(6, 'Kamil', 'selvamkamil@gmail.com', '0786754345', '$2y$10$.N3wMzatiHbxTPJYhoLP6uA/TLiiekmXda5bcG2QC3eHHeeoKcH4S'),
(10, 'Lalana', 'kalindu.lalana@gmail.com', '0776534234', '$2y$10$rIrwg6YBqw6MzTRILfGKluFixXoHI5z8KkNLpschBhEElpNVGOQH2'),
(11, 'Srimali', 'Srimaliperera80@gmail.com', '0765786798', '$2y$10$LG5tMo86ERNA9AkaLjrVceuGKPnsR8N7C4ZyKNsW/jUXijWU.oHMe'),
(12, 'Hamza', 'Hamzareeza@company.com', '0978656780', '$2y$10$dFK5dnYM9Dt5iL4m5Tym0eaaAKGJSdGD5LY9fx24K8SlDh2Rz.kGe'),
(13, 'kasun', 'kasunsiriwardana@gmail.com', '0874321123', '$2y$10$KSHtj1jZT/eMd5oPDHkotO3H/m9RvEVjDqj0T..BjV/QBqpLynmPe'),
(14, 'Natarajan', 'Natarajan@nataraja.com', '0998654345', '$2y$10$8rkro7cgpSZgIAO0y9Qa0OPaauqcpOHRwmCKiPXLizV06OjiKMr1e'),
(15, 'reshan', 'reshan987@gmail.com', '0776543789', '$2y$10$Jb6TutylWFT9rubpIhggVu8glvlfjg2rqv5SPKGpNxm4fJIaEyf3e'),
(16, 'parakram', 'parakramsilva65@gmail.com', '0765434789', '$2y$10$8zfY.mJhH5DHgCjoL3tIeuNdggrgAB4OybFLyjkG65vYy.0iP1DEy'),
(17, 'Thilina', 'thilinavp@gmail.com', '0754367542', '$2y$10$pnRMbxKzQDQHHkK/B.o/cuGztjIWWwb5vYJR6Myuvg72ZhtxYeG9i'),
(18, 'vidumini', 'vidumini.98@gmail.com', '0776432123', '$2y$10$dRWr4W74WBCcz8zu4ShiF..Ak41AZy2HPJjlOo1vkDoeC6OBSDe7O'),
(19, 'subramaniam', 'subramaniamgill@user.com', '0785432124', '$2y$10$Z1zFNGmQWq3Gvi61mCcI7OzFYin.gRns266vfNXvpt.MF3MD4gGEO'),
(20, 'lakshani', 'lakshanigunawardhane@gmail.com', '0764567832', '$2y$10$w4v4M2xltJp.GKofnB.vfug93BkKOQsKD79EFrBcWxLVE5zXxmaZO');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `issues`
--
ALTER TABLE `issues`
  ADD PRIMARY KEY (`issuesId`),
  ADD KEY `usersId` (`usersId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`usersId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `issues`
--
ALTER TABLE `issues`
  MODIFY `issuesId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `usersId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `issues`
--
ALTER TABLE `issues`
  ADD CONSTRAINT `issues_ibfk_1` FOREIGN KEY (`usersId`) REFERENCES `users` (`usersId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
