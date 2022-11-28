-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2022 at 10:08 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `digitalcafeteria_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `Id` int(11) NOT NULL,
  `Name` varchar(256) NOT NULL,
  `Price` int(11) NOT NULL,
  `Category` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`Id`, `Name`, `Price`, `Category`) VALUES
(1, 'Parata', 15, 'KASUNDI'),
(2, 'Dal', 20, 'KASUNDI'),
(3, 'Bhaji', 20, 'KASUNDI'),
(4, 'Khichuri', 60, 'KASUNDI'),
(5, 'Chicken Curry', 50, 'KASUNDI'),
(6, 'Fried Rice', 70, 'KASUNDI'),
(7, 'Chicken Chili Onion', 90, 'KASUNDI'),
(8, 'Coca Cola', 20, 'KASUNDI'),
(9, 'Chocolate Brownie', 60, 'CAFEZ'),
(10, 'Doughnut', 60, 'CAFEZ'),
(11, 'Cold Coffee', 50, 'CAFEZ'),
(12, 'Papaya Juice', 30, 'CAFEZ'),
(13, 'Watermelon Juice', 40, 'CAFEZ'),
(14, 'Coca Cola', 20, 'CAFEZ'),
(15, 'Regular Coffee', 25, 'NESCAFE'),
(16, 'Cappuccino', 40, 'NESCAFE'),
(17, 'Regular Tea', 15, 'NESCAFE'),
(18, 'Red Tea', 10, 'NESCAFE');

-- --------------------------------------------------------

--
-- Table structure for table `receipt`
--

CREATE TABLE `receipt` (
  `Id` int(11) NOT NULL,
  `MenuId` int(11) NOT NULL,
  `UserId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `receipt`
--

INSERT INTO `receipt` (`Id`, `MenuId`, `UserId`) VALUES
(1, 8, 3),
(2, 8, 3),
(3, 8, 3),
(4, 8, 3),
(5, 8, 3),
(6, 8, 3);

-- --------------------------------------------------------

--
-- Table structure for table `users_tb`
--

CREATE TABLE `users_tb` (
  `Id` int(11) NOT NULL,
  `UserName` varchar(256) NOT NULL,
  `NsuEmail` varchar(256) NOT NULL,
  `NsuId` varchar(20) NOT NULL,
  `ContactNumber` int(11) NOT NULL,
  `Password` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_tb`
--

INSERT INTO `users_tb` (`Id`, `UserName`, `NsuEmail`, `NsuId`, `ContactNumber`, `Password`) VALUES
(3, 'Sayma Mahmud', 'sayma.mahmud@northsouth.edu', '1912773042', 1863834786, '$2y$10$6oQ/b.GXjkrf5xmbeAqsi.rza85aQJFyLq8DX7HSxZqE7ZT6fVYeO'),
(4, 'Fardeen Ashraf', 'fardeen.ashraf@northsouth.edu', '2010361', 1628816556, '$2y$10$4JvwZdGYONxu0AeDVllC9OXlEzLaiCaLIEq4GcoTc7FvUNDwXoPwq'),
(5, 'Rumana Rashid', 'rumana101@northsouth.edu', '171198730', 1711369778, '$2y$10$ZQe2h3nUkA4SNTqglSUmNespiXbHkJQbVSjWfr5c8FCAHNYEa07bS'),
(6, 'Nahid ', 'sayma@northsouth.edu', '1345678', 1628816456, '$2y$10$hPeByEEclYSVXfH8C0Yk2OXXle4xIspYEbCARQgYMI6unmAxK7kuy');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `receipt`
--
ALTER TABLE `receipt`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `UserId` (`UserId`),
  ADD KEY `MenuId` (`MenuId`);

--
-- Indexes for table `users_tb`
--
ALTER TABLE `users_tb`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `receipt`
--
ALTER TABLE `receipt`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users_tb`
--
ALTER TABLE `users_tb`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `receipt`
--
ALTER TABLE `receipt`
  ADD CONSTRAINT `receipt_ibfk_1` FOREIGN KEY (`UserId`) REFERENCES `users_tb` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `receipt_ibfk_2` FOREIGN KEY (`MenuId`) REFERENCES `menu` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
