-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 02, 2022 at 06:14 AM
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
  `admin_full_names` varchar(50) NOT NULL,
  `admin_phone_number` varchar(50) NOT NULL,
  `admin_email_address` varchar(50) NOT NULL,
  `admin_residence` varchar(50) NOT NULL,
  `admin_station_id` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_full_names`, `admin_phone_number`, `admin_email_address`, `admin_residence`, `admin_station_id`) VALUES
(1, 'john doe', '0722220000', 'johndoe@gmail.com', 'this is the address', 1);

-- --------------------------------------------------------

--
-- Table structure for table `drivers`
--

CREATE TABLE `drivers` (
  `driver_id` int NOT NULL,
  `driver_phone_number` varchar(50) NOT NULL,
  `driver_capacity` varchar(50) NOT NULL,
  `driver_total_cost` varchar(50) NOT NULL,
  `driver_transaction_code` varchar(50) NOT NULL,
  `driver_payment_method` varchar(50) NOT NULL,
  `driver_refuell_date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employee_id` int NOT NULL,
  `employee_first_name` varchar(50) NOT NULL,
  `employee_other_names` varchar(50) NOT NULL,
  `employee_id_number` varchar(50) NOT NULL,
  `employee_email_address` varchar(5000) NOT NULL,
  `employee_residence` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `residence_next_of_kin_full_names` varchar(50) NOT NULL,
  `employee_next_of_kin_phone_number` varchar(10) NOT NULL,
  `employee_phone_number` varchar(10) NOT NULL,
  `employee_net_salary` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_id`, `employee_first_name`, `employee_other_names`, `employee_id_number`, `employee_email_address`, `employee_residence`, `residence_next_of_kin_full_names`, `employee_next_of_kin_phone_number`, `employee_phone_number`, `employee_net_salary`) VALUES
(1, 'elijah', 'onsongo', '22331122', 'elijah@gmail.com', 'my residence', 'other names', '0722993311', '0722991188', '44000'),
(2, 'shawn', 'shawn', '99887766', 'shawn@gmail.com', 'town center', 'next of kin', '0722001100', '0720192837', '60000');

-- --------------------------------------------------------

--
-- Table structure for table `fuel_tank`
--

CREATE TABLE `fuel_tank` (
  `fuel_tank_id` int NOT NULL,
  `fuel_tank_name` varchar(50) NOT NULL,
  `fuel_tank_capacity` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `fuel_tank`
--

INSERT INTO `fuel_tank` (`fuel_tank_id`, `fuel_tank_name`, `fuel_tank_capacity`) VALUES
(2, 'tank A', '50000');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `login_id` int NOT NULL,
  `login_username` varchar(50) NOT NULL,
  `login_rank` varchar(50) NOT NULL,
  `login_admin` bigint DEFAULT NULL,
  `login_employee` bigint DEFAULT NULL,
  `login_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`login_id`, `login_username`, `login_rank`, `login_admin`, `login_employee`, `login_password`) VALUES
(1, 'intruder', 'employee', NULL, 1, '5f4dcc3b5aa765d61d8327deb882cf99'),
(2, 'adminadmin', 'admin', 1, NULL, '5f4dcc3b5aa765d61d8327deb882cf99'),
(3, 'shawnshawn', 'employee', NULL, 2, '5f4dcc3b5aa765d61d8327deb882cf99');

-- --------------------------------------------------------

--
-- Table structure for table `stations`
--

CREATE TABLE `stations` (
  `station_id` int NOT NULL,
  `station_email` varchar(50) NOT NULL,
  `station_mobile` varchar(50) NOT NULL,
  `station_desc` varchar(50) NOT NULL,
  `station_name` varchar(50) NOT NULL,
  `station_location` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `stations`
--

INSERT INTO `stations` (`station_id`, `station_email`, `station_mobile`, `station_desc`, `station_name`, `station_location`) VALUES
(1, 'station@gmail.com', '0722001100', 'we deladjd', 'station updated', 'this is the dlocekeke');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `supplier_id` int NOT NULL,
  `supplier_name` varchar(50) NOT NULL,
  `supplier_company` varchar(50) NOT NULL,
  `supplier_email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `supplier_phone_number` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`supplier_id`, `supplier_name`, `supplier_company`, `supplier_email`, `supplier_phone_number`) VALUES
(1, 'elija elija', 'company name is updated', 'elijahs@gmail.com', '0722991100');

-- --------------------------------------------------------

--
-- Table structure for table `supplies`
--

CREATE TABLE `supplies` (
  `supply_id` int NOT NULL,
  `supply_supplier_id` bigint UNSIGNED DEFAULT NULL,
  `supply_capacity` varchar(50) NOT NULL,
  `supply_total_cost` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `supply_fuel_tank_id` bigint UNSIGNED NOT NULL,
  `supply_date` varchar(50) NOT NULL,
  `supply_comments` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `supplies`
--

INSERT INTO `supplies` (`supply_id`, `supply_supplier_id`, `supply_capacity`, `supply_total_cost`, `supply_fuel_tank_id`, `supply_date`, `supply_comments`) VALUES
(1, 1, '20000', '80000', 2, '2022-06-30', 'received thanks');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`driver_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `fuel_tank`
--
ALTER TABLE `fuel_tank`
  ADD PRIMARY KEY (`fuel_tank_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`login_id`);

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
  ADD PRIMARY KEY (`supply_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `drivers`
--
ALTER TABLE `drivers`
  MODIFY `driver_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employee_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `fuel_tank`
--
ALTER TABLE `fuel_tank`
  MODIFY `fuel_tank_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `login_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `stations`
--
ALTER TABLE `stations`
  MODIFY `station_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `supplier_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `supplies`
--
ALTER TABLE `supplies`
  MODIFY `supply_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
