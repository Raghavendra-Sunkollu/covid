-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2021 at 01:59 PM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `covid`
--

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE `details` (
  `firstname` varchar(25) NOT NULL,
  `lastname` varchar(25) NOT NULL,
  `aadhar` bigint(12) NOT NULL,
  `ward` int(3) NOT NULL,
  `address` varchar(100) NOT NULL,
  `pincode` bigint(6) NOT NULL,
  `city` varchar(20) NOT NULL,
  `phone` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`firstname`, `lastname`, `aadhar`, `ward`, `address`, `pincode`, `city`, `phone`) VALUES
('srihari', 'Sunkollu', 44680458, 888, '# 4188,49th Main Road', 560078, 'Bengaluru', 9738021190),
('poothvi', 'pp', 45451246789, 99, '# 4188,49th Main Road', 560078, 'Bengaluru', 9738021190),
('srihari', 'PN', 550769219102, 99, '#137/14/1,34th cross ,jughanahalli,2nd block,rajajinagar', 560010, 'bangalore', 8147077551),
('Raghavendra', 'Sunkollu', 937429628055, 181, '# 4188,49th Main Road', 560078, 'Bengaluru', 9738021190);

-- --------------------------------------------------------

--
-- Table structure for table `previnf`
--

CREATE TABLE `previnf` (
  `aadhar` bigint(12) NOT NULL,
  `status2` varchar(4) NOT NULL,
  `descp` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `previnf`
--

INSERT INTO `previnf` (`aadhar`, `status2`, `descp`) VALUES
(937429628055, 'no', 'no'),
(550769219102, 'no', ''),
(45451246789, 'no', 'no'),
(45451246789, 'no', 'no'),
(44680458, 'yes', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `symptoms`
--

CREATE TABLE `symptoms` (
  `caugh` varchar(4) NOT NULL,
  `cold` varchar(4) NOT NULL,
  `fever` varchar(4) NOT NULL,
  `breath` varchar(4) NOT NULL,
  `tired` varchar(4) NOT NULL,
  `head` varchar(4) NOT NULL,
  `aadhar` bigint(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `symptoms`
--

INSERT INTO `symptoms` (`caugh`, `cold`, `fever`, `breath`, `tired`, `head`, `aadhar`) VALUES
('no', 'no', 'no', 'no', 'no', 'no', 937429628055),
('no', 'no', 'no', 'no', 'no', 'no', 550769219102),
('no', 'no', 'yes', 'yes', 'yes', 'no', 45451246789),
('no', 'no', 'yes', 'yes', 'yes', 'no', 45451246789);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `slno` int(3) NOT NULL,
  `user` varchar(25) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`slno`, `user`, `pass`, `date`) VALUES
(1, 'raghavendra', 'raghu2000', '2020-12-06 09:42:54'),
(7, 'srihari', 'Srihari2000', '2020-12-06 18:43:24'),
(14, 'Raghu', 'Raghu@2000', '2020-12-15 06:10:29'),
(15, 'Raghu', 'Raghu@2000', '2020-12-15 06:21:05'),
(16, 'raghavendra', 'Raghjikjklipofgbvdcg', '2020-12-15 06:21:46'),
(17, 'raghu', 'raghu2000', '2020-12-27 17:56:21');

-- --------------------------------------------------------

--
-- Table structure for table `vacstat`
--

CREATE TABLE `vacstat` (
  `aadhar` bigint(12) NOT NULL,
  `age` int(3) NOT NULL,
  `status1` int(4) NOT NULL,
  `serial` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vacstat`
--

INSERT INTO `vacstat` (`aadhar`, `age`, `status1`, `serial`) VALUES
(44680458, 20, 0, '66666hg'),
(937429628055, 20, 0, 'aaa3456'),
(45451246789, 99, 0, 'aaa34578'),
(550769219102, 20, 0, 'abc123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`aadhar`);

--
-- Indexes for table `previnf`
--
ALTER TABLE `previnf`
  ADD KEY `aadhar` (`aadhar`);

--
-- Indexes for table `symptoms`
--
ALTER TABLE `symptoms`
  ADD KEY `aadhar` (`aadhar`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`slno`);

--
-- Indexes for table `vacstat`
--
ALTER TABLE `vacstat`
  ADD PRIMARY KEY (`serial`),
  ADD KEY `aadhar` (`aadhar`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `slno` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `previnf`
--
ALTER TABLE `previnf`
  ADD CONSTRAINT `previnf_ibfk_1` FOREIGN KEY (`aadhar`) REFERENCES `details` (`aadhar`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `symptoms`
--
ALTER TABLE `symptoms`
  ADD CONSTRAINT `symptoms_ibfk_1` FOREIGN KEY (`aadhar`) REFERENCES `details` (`aadhar`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vacstat`
--
ALTER TABLE `vacstat`
  ADD CONSTRAINT `vacstat_ibfk_1` FOREIGN KEY (`aadhar`) REFERENCES `details` (`aadhar`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
