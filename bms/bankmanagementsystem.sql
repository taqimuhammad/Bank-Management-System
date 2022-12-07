
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `bankmanagementsystem`
--
CREATE DATABASE IF NOT EXISTS `bankmanagementsystem` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `bankmanagementsystem`;

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

DROP TABLE IF EXISTS `account`;
CREATE TABLE `account` (
  `acc_ID` int(11) NOT NULL,
  `acc_type` varchar(255) NOT NULL,
  `balance` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `adminid` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Stand-in structure for view `alldata`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `alldata`;
CREATE TABLE `alldata` (
`customer_name` varchar(255)
,`phone` varchar(255)
,`balance` int(10)
,`acc_type` varchar(255)
,`branch_ID` int(10)
,`bank_Name` varchar(255)
);

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

DROP TABLE IF EXISTS `bank`;
CREATE TABLE `bank` (
  `bank_ID` int(10) NOT NULL,
  `bank_Name` varchar(255) NOT NULL,
  `branch_ID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `bankstatement`
--

DROP TABLE IF EXISTS `bankstatement`;
CREATE TABLE `bankstatement` (
  `acc_ID` int(13) NOT NULL,
  `username` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `transaction` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

DROP TABLE IF EXISTS `bill`;
CREATE TABLE `bill` (
  `bill_ID` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `acc_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

DROP TABLE IF EXISTS `branch`;
CREATE TABLE `branch` (
  `branch_ID` int(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `acc_ID` int(10) NOT NULL,
  `loan_ID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE `customer` (
  `customer_ID` varchar(13) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `age` int(2) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `acc_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Triggers `customer`
--
DROP TRIGGER IF EXISTS `bankStatement`;
DELIMITER $$
CREATE TRIGGER `bankStatement` AFTER INSERT ON `customer` FOR EACH ROW INSERT INTO `bankstatement` VALUES(NEW.acc_ID,NEW.customer_name,NOW(),"Insertion")
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `loan`
--

DROP TABLE IF EXISTS `loan`;
CREATE TABLE `loan` (
  `loan_ID` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `acc_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `transfer`
--

DROP TABLE IF EXISTS `transfer`;
CREATE TABLE `transfer` (
  `transfer_ID` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `acc_ID_sender` int(11) NOT NULL,
  `acc_ID_receiver` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure for view `alldata`
--
DROP TABLE IF EXISTS `alldata`;

DROP VIEW IF EXISTS `alldata`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `alldata`  AS SELECT `customer`.`customer_name` AS `customer_name`, `customer`.`phone` AS `phone`, `account`.`balance` AS `balance`, `account`.`acc_type` AS `acc_type`, `branch`.`branch_ID` AS `branch_ID`, `bank`.`bank_Name` AS `bank_Name` FROM (((`customer` join `account` on(`customer`.`acc_ID` = `account`.`acc_ID`)) join `branch` on(`account`.`acc_ID` = `branch`.`acc_ID`)) join `bank` on(`branch`.`branch_ID` = `bank`.`branch_ID`))  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`acc_ID`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminid`);

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`bank_ID`),
  ADD KEY `branch_ID` (`branch_ID`);

--
-- Indexes for table `bankstatement`
--
ALTER TABLE `bankstatement`
  ADD PRIMARY KEY (`acc_ID`);

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`bill_ID`),
  ADD KEY `acc_ID` (`acc_ID`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`branch_ID`),
  ADD KEY `acc_ID` (`acc_ID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_ID`),
  ADD KEY `acc_ID` (`acc_ID`);

--
-- Indexes for table `loan`
--
ALTER TABLE `loan`
  ADD PRIMARY KEY (`loan_ID`),
  ADD KEY `acc_ID` (`acc_ID`);

--
-- Indexes for table `transfer`
--
ALTER TABLE `transfer`
  ADD PRIMARY KEY (`transfer_ID`),
  ADD KEY `acc_ID_sender` (`acc_ID_sender`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `bank_ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `branch_ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transfer`
--
ALTER TABLE `transfer`
  MODIFY `transfer_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bank`
--
ALTER TABLE `bank`
  ADD CONSTRAINT `bank_ibfk_1` FOREIGN KEY (`branch_ID`) REFERENCES `branch` (`branch_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `bill_ibfk_1` FOREIGN KEY (`acc_ID`) REFERENCES `account` (`acc_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `branch`
--
ALTER TABLE `branch`
  ADD CONSTRAINT `branch_ibfk_1` FOREIGN KEY (`acc_ID`) REFERENCES `account` (`acc_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`acc_ID`) REFERENCES `account` (`acc_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `loan`
--
ALTER TABLE `loan`
  ADD CONSTRAINT `loan_ibfk_1` FOREIGN KEY (`acc_ID`) REFERENCES `account` (`acc_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transfer`
--
ALTER TABLE `transfer`
  ADD CONSTRAINT `transfer_ibfk_1` FOREIGN KEY (`acc_ID_sender`) REFERENCES `account` (`acc_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

