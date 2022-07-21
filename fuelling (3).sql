-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 21, 2022 at 08:09 PM
-- Server version: 8.0.29
-- PHP Version: 8.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fuelling`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int NOT NULL,
  `admin_full_names` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `admin_phone_number` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `admin_email_address` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `admin_residence` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `admin_station_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_full_names`, `admin_phone_number`, `admin_email_address`, `admin_residence`, `admin_station_id`) VALUES
(1, 'john doe', '0722220000', 'johndoe@gmail.com', 'this is the address', 1),
(2, 'kf jfjjjff', '0788990000', 'jfjjjfjfj@gmail.com', 'this his address', 1),
(3, 'ededede', '9900993333', 'dedededrfrf@gmail.com', 'this is thekekekedde', 3),
(4, 'dededede', '0777999000', 'dedededede@gmail.com', 'jbkkjn', 1),
(5, 'dededeplk', '0788001122', 'checkingadmin@gmail.com', 'yes correct', 3),
(6, 'shawn shawn', '0722993300', 'shawnshawn@gmail.com', 'kileleshwa', 3);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employee_id` int NOT NULL,
  `employee_first_name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `employee_other_names` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `employee_id_number` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `employee_email_address` varchar(5000) COLLATE utf8mb4_general_ci NOT NULL,
  `employee_residence` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `residence_next_of_kin_full_names` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `employee_next_of_kin_phone_number` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `employee_phone_number` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `employee_station_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_id`, `employee_first_name`, `employee_other_names`, `employee_id_number`, `employee_email_address`, `employee_residence`, `residence_next_of_kin_full_names`, `employee_next_of_kin_phone_number`, `employee_phone_number`, `employee_station_id`) VALUES
(3, 'deedd', 'deded', '99883310', 'deded@gmail.com', 'this is my place                                    ', 'odkdk', '0733009911', '0722001122', 1),
(4, 'dedececece', 'ededed', '88881234', 'rootjndjnd@gmail.com', 'edededede', 'dedemdemd', '0788881239', '0788881234', 1);

-- --------------------------------------------------------

--
-- Table structure for table `fuel_tank`
--

CREATE TABLE `fuel_tank` (
  `fuel_tank_id` int NOT NULL,
  `fuel_tank_ref` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `fuel_tank_capacity` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `tank_station_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fuel_tank`
--

INSERT INTO `fuel_tank` (`fuel_tank_id`, `fuel_tank_ref`, `fuel_tank_capacity`, `tank_station_id`) VALUES
(2, 'tank ABCD', '8009', 1),
(6, 'chekcd', '8999', 1);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `login_id` int NOT NULL,
  `login_username` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `login_rank` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `login_admin` int DEFAULT NULL,
  `login_employee` int DEFAULT NULL,
  `login_password` varchar(50) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`login_id`, `login_username`, `login_rank`, `login_admin`, `login_employee`, `login_password`) VALUES
(2, 'adminadmin', 'admin', 1, NULL, '5f4dcc3b5aa765d61d8327deb882cf99'),
(4, 'dededede', 'employee', NULL, 3, '5f4dcc3b5aa765d61d8327deb882cf99'),
(5, 'adminadmdintwo', 'admin', 2, NULL, '5f4dcc3b5aa765d61d8327deb882cf99'),
(6, 'johnadmin', 'admin', 3, NULL, '5f4dcc3b5aa765d61d8327deb882cf99'),
(7, 'adminadmintwo', 'admin', 4, NULL, '5f4dcc3b5aa765d61d8327deb882cf99'),
(8, 'usedadmin', 'admin', 5, NULL, '5f4dcc3b5aa765d61d8327deb882cf99'),
(9, 'shawnshawn01', 'admin', 6, NULL, '5f4dcc3b5aa765d61d8327deb882cf99'),
(10, 'xidmidmosmkmdmdmcdc', 'employee', NULL, 4, '0d4fcdb17e60f7b42e818d943445a449');

-- --------------------------------------------------------

--
-- Table structure for table `stations`
--

CREATE TABLE `stations` (
  `station_id` int NOT NULL,
  `station_email` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `station_mobile` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `station_desc` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `station_name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `station_location` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stations`
--

INSERT INTO `stations` (`station_id`, `station_email`, `station_mobile`, `station_desc`, `station_name`, `station_location`) VALUES
(1, 'station@gmail.com', '0722001100', 'we deladjd', 'station updated', 'this is the dlocekeke'),
(3, 'kkjjii@gmail.com', '0788998888', 'we sell petrol only', 'dede', 'kdkdkdk');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `supplier_id` int NOT NULL,
  `supplier_name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `supplier_company` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `supplier_email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `supplier_phone_number` varchar(50) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`supplier_id`, `supplier_name`, `supplier_company`, `supplier_email`, `supplier_phone_number`) VALUES
(1, 'elija elija', 'company name is updated', 'elijahs@gmail.com', '0722991100'),
(2, 'my neq', 'new company updated', 'company@gmail.com', '0899332299');

-- --------------------------------------------------------

--
-- Table structure for table `supplies`
--

CREATE TABLE `supplies` (
  `supply_id` int NOT NULL,
  `supply_supplier_id` int DEFAULT NULL,
  `supply_capacity` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `supply_total_cost` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `supply_fuel_tank_id` int NOT NULL,
  `supply_date` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `supply_comments` varchar(500) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supplies`
--

INSERT INTO `supplies` (`supply_id`, `supply_supplier_id`, `supply_capacity`, `supply_total_cost`, `supply_fuel_tank_id`, `supply_date`, `supply_comments`) VALUES
(2, 2, '5000', '500000', 2, '2022-07-20', 'good staged and takedn'),
(3, 1, '700', '7000', 2, '2022-07-20', 'new record');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD KEY `admin_station_id` (`admin_station_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_id`),
  ADD KEY `employee_station_id` (`employee_station_id`);

--
-- Indexes for table `fuel_tank`
--
ALTER TABLE `fuel_tank`
  ADD PRIMARY KEY (`fuel_tank_id`),
  ADD KEY `tank_station_id` (`tank_station_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`login_id`),
  ADD KEY `login_admin` (`login_admin`),
  ADD KEY `login_employee` (`login_employee`);

--
-- Indexes for table `stations`
--
ALTER TABLE `stations`
  ADD PRIMARY KEY (`station_id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `supplies`
--
ALTER TABLE `supplies`
  ADD PRIMARY KEY (`supply_id`),
  ADD KEY `supply_fuel_tank_id` (`supply_fuel_tank_id`),
  ADD KEY `supply_supplier_id` (`supply_supplier_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employee_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `fuel_tank`
--
ALTER TABLE `fuel_tank`
  MODIFY `fuel_tank_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `login_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `stations`
--
ALTER TABLE `stations`
  MODIFY `station_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `supplier_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `supplies`
--
ALTER TABLE `supplies`
  MODIFY `supply_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`admin_station_id`) REFERENCES `stations` (`station_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`employee_station_id`) REFERENCES `stations` (`station_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `fuel_tank`
--
ALTER TABLE `fuel_tank`
  ADD CONSTRAINT `fuel_tank_ibfk_1` FOREIGN KEY (`tank_station_id`) REFERENCES `stations` (`station_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`login_admin`) REFERENCES `admin` (`admin_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `login_ibfk_2` FOREIGN KEY (`login_employee`) REFERENCES `employee` (`employee_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `supplies`
--
ALTER TABLE `supplies`
  ADD CONSTRAINT `supplies_ibfk_1` FOREIGN KEY (`supply_fuel_tank_id`) REFERENCES `fuel_tank` (`fuel_tank_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `supplies_ibfk_2` FOREIGN KEY (`supply_supplier_id`) REFERENCES `suppliers` (`supplier_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
