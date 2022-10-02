-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 02, 2022 at 10:02 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hr_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_attendance`
--

CREATE TABLE `tb_attendance` (
  `Id` int(11) NOT NULL,
  `EmployeeCode` varchar(10) DEFAULT NULL,
  `EmployeeName` varchar(200) DEFAULT NULL,
  `AttendanceDate` date DEFAULT NULL,
  `AttendanceStart` datetime DEFAULT NULL,
  `AttendanceEnd` datetime DEFAULT NULL,
  `AttendanceStatus` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_attendance`
--

INSERT INTO `tb_attendance` (`Id`, `EmployeeCode`, `EmployeeName`, `AttendanceDate`, `AttendanceStart`, `AttendanceEnd`, `AttendanceStatus`) VALUES
(1, 'Nv01', 'Trịnh Hoàng Long', NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_department`
--

CREATE TABLE `tb_department` (
  `Id` int(11) NOT NULL,
  `DepartmentCode` varchar(10) NOT NULL,
  `DepartmentName` varchar(200) NOT NULL,
  `DepartmentStatus` int(11) DEFAULT NULL,
  `CreateTime` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_department`
--

INSERT INTO `tb_department` (`Id`, `DepartmentCode`, `DepartmentName`, `DepartmentStatus`, `CreateTime`) VALUES
(1, 'De01', 'IT', 1, '2022-10-02');

-- --------------------------------------------------------

--
-- Table structure for table `tb_employee`
--

CREATE TABLE `tb_employee` (
  `Id` int(11) NOT NULL,
  `EmployeeCode` varchar(10) NOT NULL,
  `EmployeeName` varchar(200) DEFAULT NULL,
  `EmployeeEmail` varchar(200) DEFAULT NULL,
  `EmployeePhone` varchar(11) DEFAULT NULL,
  `EmployeeGender` int(11) DEFAULT NULL,
  `EmployeeAdress` varchar(200) DEFAULT NULL,
  `EmployeeStatus` int(11) DEFAULT NULL,
  `DepartmentCode` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_employee`
--

INSERT INTO `tb_employee` (`Id`, `EmployeeCode`, `EmployeeName`, `EmployeeEmail`, `EmployeePhone`, `EmployeeGender`, `EmployeeAdress`, `EmployeeStatus`, `DepartmentCode`) VALUES
(1, 'Nv01', 'Trịnh Hoàng Long', 'longtrinh29102001@gmail.com', '0397433097', 1, 'Chương Mỹ, Hà Nôi', 1, 'De01');

-- --------------------------------------------------------

--
-- Table structure for table `tb_notify`
--

CREATE TABLE `tb_notify` (
  `Id` int(11) NOT NULL,
  `NotifyName` varchar(200) DEFAULT NULL,
  `NotifyContent` text DEFAULT NULL,
  `CreateTime` datetime DEFAULT NULL,
  `NotifyStatus` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_salary`
--

CREATE TABLE `tb_salary` (
  `Id` int(11) NOT NULL,
  `EmployeeCode` varchar(10) DEFAULT NULL,
  `EmployeeName` varchar(200) DEFAULT NULL,
  `SalaryCoefficients` float DEFAULT NULL,
  `SalaryDay` int(11) DEFAULT NULL,
  `SalaryOT` float DEFAULT NULL,
  `SalarySum` float DEFAULT NULL,
  `SalaryStatus` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_salary`
--

INSERT INTO `tb_salary` (`Id`, `EmployeeCode`, `EmployeeName`, `SalaryCoefficients`, `SalaryDay`, `SalaryOT`, `SalarySum`, `SalaryStatus`) VALUES
(1, 'Nv01', 'Trịnh Hoàng Long', 500000, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `Id` int(11) NOT NULL,
  `UserName` varchar(10) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Level` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`Id`, `UserName`, `Password`, `Level`, `status`) VALUES
(1, 'QL01', 'QL010394797658', 1, 1),
(2, 'NV01', 'NV010397433097', 2, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_attendance`
--
ALTER TABLE `tb_attendance`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tb_department`
--
ALTER TABLE `tb_department`
  ADD PRIMARY KEY (`Id`,`DepartmentCode`);

--
-- Indexes for table `tb_employee`
--
ALTER TABLE `tb_employee`
  ADD PRIMARY KEY (`Id`,`EmployeeCode`);

--
-- Indexes for table `tb_notify`
--
ALTER TABLE `tb_notify`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tb_salary`
--
ALTER TABLE `tb_salary`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_attendance`
--
ALTER TABLE `tb_attendance`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_department`
--
ALTER TABLE `tb_department`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_employee`
--
ALTER TABLE `tb_employee`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_notify`
--
ALTER TABLE `tb_notify`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_salary`
--
ALTER TABLE `tb_salary`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
