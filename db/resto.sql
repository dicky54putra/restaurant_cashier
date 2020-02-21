-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2020 at 02:38 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `resto`
--

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `level_id` int(11) NOT NULL,
  `level_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`level_id`, `level_name`) VALUES
(1, 'admin'),
(2, 'kasir'),
(3, 'waiter'),
(4, 'owner');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `menu_id` int(11) NOT NULL,
  `menu_name` varchar(255) NOT NULL,
  `menu_description` text NOT NULL,
  `menu_price` varchar(50) NOT NULL,
  `menu_status` int(11) NOT NULL,
  `menu_category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Stand-in structure for view `od_view`
-- (See below for the actual view)
--
CREATE TABLE `od_view` (
`od_id` int(11)
,`menu_name` varchar(255)
,`od_total` int(11)
,`od_price` varchar(50)
);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` int(11) NOT NULL,
  `order_customer` varchar(50) NOT NULL,
  `order_tanggal` date NOT NULL,
  `order_status` int(11) NOT NULL,
  `order_code` varchar(50) NOT NULL,
  `table_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `od_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `od_total` int(11) NOT NULL,
  `od_price` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `table`
--

CREATE TABLE `table` (
  `table_id` int(11) NOT NULL,
  `table_no` varchar(50) NOT NULL,
  `table_capacity` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table`
--

INSERT INTO `table` (`table_id`, `table_no`, `table_capacity`) VALUES
(1, '001', '5'),
(2, '002', '6'),
(3, '003', '4');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `trans_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `total_price` varchar(50) NOT NULL,
  `trans_cash` varchar(50) NOT NULL,
  `trans_cash_return` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_username` varchar(50) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `level_id` int(1) NOT NULL,
  `user_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_username`, `user_password`, `level_id`, `user_status`) VALUES
(2, 'dicky', 'diki', '$2y$10$nN7rEG8EfX3iKoO./1hWOuQlKznFDfDMxiN8ZoZgtiLvPThs/X9ly', 4, 1),
(3, 'kasir', 'kasir', '$2y$10$127q2BywzMPAYyX6zSqfzudJvVwYmSR2ElKhQNsMMJRNHCH4g1tlC', 2, 1),
(4, 'Nor Rohmad Dwi S.', 'rohmad', '$2y$10$l2C3yn93MJaRNvGdJmMueukqizG/LrV1bbwLFZLfWAQnQ8Z/I257W', 3, 1),
(5, 'M. Farid Assidqi', 'farid', '$2y$10$.bA5gXkv//WO8AO2cXfTQevpATrcRQe1fMNfVq0rLD7qDzCDXURXq', 2, 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `user_view`
-- (See below for the actual view)
--
CREATE TABLE `user_view` (
`user_id` int(11)
,`user_name` varchar(50)
,`user_username` varchar(50)
,`user_status` int(1)
,`level_name` varchar(50)
);

-- --------------------------------------------------------

--
-- Structure for view `od_view`
--
DROP TABLE IF EXISTS `od_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `od_view`  AS  select `order_detail`.`od_id` AS `od_id`,`menu`.`menu_name` AS `menu_name`,`order_detail`.`od_total` AS `od_total`,`order_detail`.`od_price` AS `od_price` from (`order_detail` join `menu`) where `order_detail`.`menu_id` = `menu`.`menu_id` ;

-- --------------------------------------------------------

--
-- Structure for view `user_view`
--
DROP TABLE IF EXISTS `user_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `user_view`  AS  select `user`.`user_id` AS `user_id`,`user`.`user_name` AS `user_name`,`user`.`user_username` AS `user_username`,`user`.`user_status` AS `user_status`,`level`.`level_name` AS `level_name` from (`user` join `level`) where `user`.`level_id` = `level`.`level_id` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`level_id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`od_id`);

--
-- Indexes for table `table`
--
ALTER TABLE `table`
  ADD PRIMARY KEY (`table_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `level_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `od_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `table`
--
ALTER TABLE `table`
  MODIFY `table_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
