-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2017 at 04:28 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pr_ojek`
--

-- --------------------------------------------------------

--
-- Table structure for table `driver_prefloc`
--

CREATE TABLE `driver_prefloc` (
  `no` int(4) NOT NULL,
  `driverID` int(4) NOT NULL,
  `prefLoc` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `driver_prefloc`
--

INSERT INTO `driver_prefloc` (`no`, `driverID`, `prefLoc`) VALUES
(2, 4, 'Bandung');

-- --------------------------------------------------------

--
-- Table structure for table `driver_review`
--

CREATE TABLE `driver_review` (
  `driverID` int(4) NOT NULL,
  `rating` float NOT NULL,
  `votes` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `driver_review`
--

INSERT INTO `driver_review` (`driverID`, `rating`, `votes`) VALUES
(4, 3.25, 4),
(6, 4.2, 1234);

-- --------------------------------------------------------

--
-- Table structure for table `transaction_history`
--

CREATE TABLE `transaction_history` (
  `transID` int(4) NOT NULL,
  `passengerID` int(4) NOT NULL,
  `driverID` int(4) NOT NULL,
  `pickLoc` varchar(20) NOT NULL,
  `destLoc` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `stars` int(1) NOT NULL,
  `comment` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction_history`
--

INSERT INTO `transaction_history` (`transID`, `passengerID`, `driverID`, `pickLoc`, `destLoc`, `date`, `stars`, `comment`) VALUES
(1, 5, 4, 'Bandung', 'Jakarta', '2017-10-05', 4, 'Aku menyesal :('),
(8, 5, 4, 'Bandung', 'Jakarta', '2017-10-05', 5, NULL),
(9, 5, 4, 'Bandung', 'Jakarta', '0000-00-00', 3, NULL),
(10, 5, 4, 'Bandung', 'Jakarta', '0000-00-00', 1, NULL);

--
-- Triggers `transaction_history`
--
DELIMITER $$
CREATE TRIGGER `rating_and_votes_update` AFTER INSERT ON `transaction_history` FOR EACH ROW BEGIN
	select driverID into @driver from transaction_history WHERE transID=LAST_INSERT_ID();
	SET @count = (SELECT COUNT(stars) FROM transaction_history WHERE driverID=@driver);
    SET @sum = (SELECT SUM(stars) FROM transaction_history WHERE driverID=@driver);
	UPDATE driver_review SET rating=(@sum/@count), votes=@count WHERE driverID = @driver;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `user_data`
--

CREATE TABLE `user_data` (
  `ID` int(4) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `full_name` varchar(30) NOT NULL,
  `email` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `isDriver` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_data`
--

INSERT INTO `user_data` (`ID`, `username`, `password`, `full_name`, `email`, `phone`, `isDriver`) VALUES
(3, 'admin', 'admin', 'admin', 'admin@gmail.com', '085780058876', 'yes'),
(4, 'martin', 'hwhrskxk', 'Martin Lutta Putra', 'asd@gmail.com', '085780058876', 'yes'),
(5, 'lutta', 'hehe', 'Martin Lutta Putra', 'hehe@gmail.com', '085780058876', 'no'),
(6, 'vinjerdim', 'marvin', 'Marvin Jerremy Budiman', 'vinjerdim@gmail.com', '085780000001', 'yes'),
(7, 'patricknugrohoh', 'patrick', 'Patrick Nugroho H.', 'patricnugrohoh@gmail', '085780000002', 'yes'),
(9, 'AAA', 'AAA', 'AAA', 'AAA', 'AAA', 'AAA');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `driver_prefloc`
--
ALTER TABLE `driver_prefloc`
  ADD PRIMARY KEY (`no`),
  ADD KEY `driverID` (`driverID`);

--
-- Indexes for table `driver_review`
--
ALTER TABLE `driver_review`
  ADD PRIMARY KEY (`driverID`);

--
-- Indexes for table `transaction_history`
--
ALTER TABLE `transaction_history`
  ADD PRIMARY KEY (`transID`);

--
-- Indexes for table `user_data`
--
ALTER TABLE `user_data`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID` (`ID`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `driver_prefloc`
--
ALTER TABLE `driver_prefloc`
  MODIFY `no` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transaction_history`
--
ALTER TABLE `transaction_history`
  MODIFY `transID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_data`
--
ALTER TABLE `user_data`
  MODIFY `ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `driver_prefloc`
--
ALTER TABLE `driver_prefloc`
  ADD CONSTRAINT `driver_prefloc_ibfk_1` FOREIGN KEY (`driverID`) REFERENCES `driver_review` (`driverID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `driver_review`
--
ALTER TABLE `driver_review`
  ADD CONSTRAINT `driver_review_ibfk_1` FOREIGN KEY (`driverID`) REFERENCES `user_data` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
