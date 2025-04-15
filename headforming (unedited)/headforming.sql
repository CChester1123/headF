-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2024 at 05:37 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `headforming`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_checklist`
--

CREATE TABLE `tbl_checklist` (
  `id` int(11) NOT NULL,
  `workorder` varchar(45) DEFAULT NULL,
  `date` varchar(45) DEFAULT NULL,
  `productDesc` text DEFAULT NULL,
  `machineNo` varchar(45) DEFAULT NULL,
  `product` varchar(45) DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL,
  `handle` varchar(45) DEFAULT NULL,
  `machinetobeused` varchar(45) DEFAULT NULL,
  `substrate` varchar(45) DEFAULT NULL,
  `operation` varchar(45) DEFAULT NULL,
  `maintenance` varchar(45) DEFAULT NULL,
  `preinstallremarks` text DEFAULT NULL,
  `arrcuttingforce` varchar(45) DEFAULT NULL,
  `arrsealingtime` varchar(45) DEFAULT NULL,
  `arrcuttingspeed` varchar(45) DEFAULT NULL,
  `arrapproachingposition` varchar(45) DEFAULT NULL,
  `arrsealingpositionspeed` varchar(45) DEFAULT NULL,
  `arrsealingposition` varchar(45) DEFAULT NULL,
  `arrMode` varchar(45) DEFAULT NULL,
  `arrmoldopenspeed` varchar(45) DEFAULT NULL,
  `arrwatertemp` varchar(45) DEFAULT NULL,
  `arrairpressure` varchar(45) DEFAULT NULL,
  `arrupperheatertemp` varchar(45) DEFAULT NULL,
  `arrlowerheatertemp` varchar(45) DEFAULT NULL,
  `arruppermoldtemp` varchar(45) DEFAULT NULL,
  `arrlowermoldtemp` varchar(45) DEFAULT NULL,
  `arrtotalLength` varchar(45) DEFAULT NULL,
  `arrswabheadlength` varchar(45) DEFAULT NULL,
  `arrswabheadwidth` varchar(45) DEFAULT NULL,
  `arrswabheadthickness` varchar(45) DEFAULT NULL,
  `arrswabhandlewidth` varchar(45) DEFAULT NULL,
  `arrswabhandlethickness` varchar(45) DEFAULT NULL,
  `arrswabhandlediameter` varchar(45) DEFAULT NULL,
  `noHandleperHT` varchar(45) DEFAULT NULL,
  `visualInpection` varchar(45) DEFAULT NULL,
  `arractualDataLoop` text DEFAULT NULL,
  `shotproductionremarks` text DEFAULT NULL,
  `InspectedBY` varchar(45) DEFAULT NULL,
  `acknowledge` varchar(45) DEFAULT NULL,
  `maintenancecheced` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `status_maintenance` varchar(45) DEFAULT NULL,
  `status_TL` varchar(45) DEFAULT NULL,
  `selectedoption` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_checklist`
--

INSERT INTO `tbl_checklist` (`id`, `workorder`, `date`, `productDesc`, `machineNo`, `product`, `type`, `handle`, `machinetobeused`, `substrate`, `operation`, `maintenance`, `preinstallremarks`, `arrcuttingforce`, `arrsealingtime`, `arrcuttingspeed`, `arrapproachingposition`, `arrsealingpositionspeed`, `arrsealingposition`, `arrMode`, `arrmoldopenspeed`, `arrwatertemp`, `arrairpressure`, `arrupperheatertemp`, `arrlowerheatertemp`, `arruppermoldtemp`, `arrlowermoldtemp`, `arrtotalLength`, `arrswabheadlength`, `arrswabheadwidth`, `arrswabheadthickness`, `arrswabhandlewidth`, `arrswabhandlethickness`, `arrswabhandlediameter`, `noHandleperHT`, `visualInpection`, `arractualDataLoop`, `shotproductionremarks`, `InspectedBY`, `acknowledge`, `maintenancecheced`, `status`, `status_maintenance`, `status_TL`, `selectedoption`) VALUES
(19, '', 'May 30, 2024', ' LARGE ALPHA SWAB', '1', 'TX714A', 'Start-up qualification', 'PHTX712A', 'Headforming', 'TX0000', 'Single', 'checked', '', '0,20,', '1,3.8,', '2.0,3,', '0.9,1.3,', '1.0,3.0,', '0.1,1.0,', 'Position,Pressure,', '80,', '20,45,', '40,80,', '160,250,', '160,250,', '160,250,', '160,250,', '127,128,127,127,127,127,127', '25.2,26.2,25.8,25.8,25.8,25.8,25.8', '12.2,13.2,13,13,13,13,13', '3.7,4.7,4,4,4,4,4', '4.7,5.7,5,5,5,5,5', '2.5,3.2,3,3,3,3,3', 'NA,NA,N/A,,,,', '26', 'GOOD', 'GOOD,GOOD,,,,GOOD,GOOD,,,,GOOD,GOOD,,,,GOOD,GOOD,,,,GOOD,GOOD,,,,GOOD,GOOD,,,,GOOD,GOOD,,,,GOOD,GOOD,,,,GOOD,GOOD,,,,GOOD,GOOD,,,,GOOD,GOOD,,,,GOOD,GOOD,,,,GOOD,GOOD,,,,GOOD,GOOD,,,,GOOD,GOOD,,,,GOOD,GOOD,,,,GOOD,GOOD,,,,GOOD,GOOD,,,,GOOD,GOOD,,,,GOOD,GOOD,,,,GOOD,GOOD,,,,GOOD,GOOD,,,,GOOD,GOOD,,,,GOOD,GOOD,,,,GOOD,GOOD,,,,GOOD,GOOD,,,', '', ' Chester Allan  Deuda Custodio', '', '', 'Pending', NULL, NULL, 'null'),
(20, '', 'May 30, 2024', ' LARGE ALPHA SWAB', '1', 'TX714A', 'Start-up qualification', 'PHTX712A', 'Headforming', 'TX0000', 'Single', 'checked', '', '0,20,', '1,3.8,', '2.0,3,', '0.9,1.3,', '1.0,3.0,', '0.1,1.0,', 'Position,Pressure,', '80,', '20,45,', '40,80,', '160,250,', '160,250,', '160,250,', '160,250,', '127,128,127,127,127,127,127', '25.2,26.2,26.1,26.1,26.1,26.1,26.1', '12.2,13.2,13.2,13.2,13.2,13.2,13.2', '3.7,4.7,4.7,4.7,4.7,4.7,4.7', '4.7,5.7,4.7,4.7,4.7,4.7,4.7', '2.5,3.2,2.5,2.5,2.5,2.5,2.5', 'NA,NA,2.5,2.5,2.5,2.5,2.5', '26', 'GOOD', 'GOOD,GOOD,,,,GOOD,GOOD,,,,GOOD,GOOD,,,,GOOD,GOOD,,,,GOOD,GOOD,,,,GOOD,GOOD,,,,GOOD,GOOD,,,,GOOD,GOOD,,,,GOOD,GOOD,,,,GOOD,GOOD,,,,GOOD,GOOD,,,,GOOD,GOOD,,,,GOOD,GOOD,,,,GOOD,GOOD,,,,GOOD,GOOD,,,,GOOD,GOOD,,,,GOOD,GOOD,,,,GOOD,GOOD,,,,GOOD,GOOD,,,,GOOD,GOOD,,,,GOOD,GOOD,,,,GOOD,GOOD,,,,GOOD,GOOD,,,,GOOD,GOOD,,,,GOOD,GOOD,,,,GOOD,GOOD,,,', '', ' Chester Allan  Deuda Custodio', '', '', 'Pending', NULL, NULL, 'null'),
(21, '1', 'May 30, 2024', 'MICRO CLEANFOAM SWAB', '3', 'TX757B', 'Start-up qualification', 'PHTX759B', 'Headforming', 'PU FOAM', 'Dual', 'checked', 'NA', '0,10,5', '0.8,4,0.9', '0.5,3,3', '0.6,1.3,1', '0.5,3,3', '0.19,0.59,.59', 'Position,Pressure,Position', '80,75', '20,45,20', '40,80,80', '160,250,250', '160,250,160', '160,250,160', '160,250,250', '69.5,70.5,,,,,', '10.5,11.5,,,,,', '2.7,3.7,,,,,', '2.4,3.4,,,,,', 'NA,NA,,,,,', 'NA,NA,,,,,', '1.7,2.7,,,,,', '68', 'GOOD', ',,GOOD,GOOD,500,,,GOOD,GOOD,450,,,GOOD,GOOD,562,,,GOOD,GOOD,405,,,GOOD,GOOD,450,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,', 'NA', 'QA Personel', '123', '001', 'Pending', NULL, NULL, '[object HTMLInputElement]'),
(22, '11', 'May 31, 2024', 'MICRO CLEANFOAM SWAB', '1', 'TX757B', 'Start-up qualification', 'PHTX759B', 'Headforming', 'PU FOAM', 'Dual', 'checked', 'NA', '0,10,4', '0.8,4,2', '0.5,3,3', '0.6,1.3,1', '0.5,3,2', '0.19,0.59,0.20', 'Position,Pressure,Position', '80,70', '20,45,20', '40,80,45', '160,250,160', '160,250,160', '160,250,200', '160,250,200', '69.5,70.5,70,70,70,69.6,69.59', '10.5,11.5,11,11.5,11.2,11,11', '2.7,3.7,2.8,3.7,3,3,3', '2.4,3.4,3,3,3,3,3', 'NA,NA,NA,NA,NA,NA,NA', 'NA,NA,NA,NA,NA,NA,NA', '1.7,2.7,1.7,1.7,1.7,1.7,1.7', '68', 'GOOD', 'GOOD,N/A,GOOD,GOOD,515,GOOD,N/A,GOOD,GOOD,402,GOOD,N/A,GOOD,GOOD,395,GOOD,N/A,GOOD,GOOD,500,GOOD,N/A,GOOD,GOOD,515,GOOD,N/A,,,,GOOD,N/A,,,,GOOD,N/A,,,,GOOD,N/A,,,,GOOD,N/A,,,,GOOD,N/A,,,,GOOD,N/A,,,,GOOD,N/A,,,,GOOD,N/A,,,,GOOD,N/A,,,,GOOD,N/A,,,,GOOD,N/A,,,,GOOD,N/A,,,,GOOD,N/A,,,,GOOD,N/A,,,,GOOD,N/A,,,,GOOD,N/A,,,,GOOD,N/A,,,,GOOD,N/A,,,,GOOD,N/A,,,,GOOD,N/A,,,,GOOD,N/A,,,,GOOD,N/A,,,,GOOD,N/A,,,,GOOD,N/A,,,,GOOD,N/A,,,,GOOD,N/A,,,,GOOD,N/A,,,,GOOD,N/A,,,,GOOD,N/A,,,,GOOD,N/A,,,,GOOD,N/A,,,,GOOD,N/A,,,,GOOD,N/A,,,,GOOD,N/A,,,,GOOD,N/A,,,,GOOD,N/A,,,,GOOD,N/A,,,,GOOD,N/A,,,,GOOD,N/A,,,,GOOD,N/A,,,,GOOD,N/A,,,,GOOD,N/A,,,,GOOD,N/A,,,,GOOD,N/A,,,,GOOD,N/A,,,,GOOD,N/A,,,,GOOD,N/A,,,,GOOD,N/A,,,,GOOD,N/A,,,,GOOD,N/A,,,,GOOD,N/A,,,,GOOD,N/A,,,,GOOD,N/A,,,,GOOD,N/A,,,,GOOD,N/A,,,,GOOD,N/A,,,,GOOD,N/A,,,,GOOD,N/A,,,,GOOD,N/A,,,,GOOD,N/A,,,,GOOD,N/A,,,,GOOD,N/A,,,', 'NA', 'QA Personel', '123', '001', 'Pending', NULL, NULL, '[object HTMLInputElement]'),
(23, '1', 'June 3, 2024', 'MICRO CLEANFOAM SWAB', '1', 'TX757B', 'Start-up qualification', 'PHTX759B', 'Headforming', 'PU FOAM', 'Dual', 'checked', 'na', '0,10,2', '0.8,4,5', '0.5,3,3', '0.6,1.3,1', '0.5,3,1', '0.19,0.59,0.59', 'Position,Pressure,Position', '80,50', '20,45,20', '40,80,45', '160,250,160', '160,250,160', '160,250,160', '160,250,200', '69.5,70.5,,,,,', '10.5,11.5,,,,,', '2.7,3.7,,,,,', '2.4,3.4,,,,,', 'NA,NA,,,,,', 'NA,NA,,,,,', '1.7,2.7,,,,,', '68', 'GOOD', 'GOOD,N/A,GOOD,GOOD,1,GOOD,N/A,GOOD,GOOD,1,GOOD,N/A,GOOD,GOOD,1,GOOD,N/A,GOOD,GOOD,1,GOOD,N/A,GOOD,GOOD,1,GOOD,N/A,,,,GOOD,N/A,,,,GOOD,N/A,,,,GOOD,N/A,,,,GOOD,N/A,,,,GOOD,N/A,,,,GOOD,N/A,,,,GOOD,N/A,,,,GOOD,N/A,,,,GOOD,N/A,,,,GOOD,N/A,,,,GOOD,N/A,,,,GOOD,N/A,,,,GOOD,N/A,,,,GOOD,N/A,,,,GOOD,N/A,,,,GOOD,N/A,,,,GOOD,N/A,,,,GOOD,N/A,,,,GOOD,N/A,,,,GOOD,N/A,,,,GOOD,N/A,,,,GOOD,N/A,,,,GOOD,N/A,,,,GOOD,N/A,,,,GOOD,N/A,,,,GOOD,N/A,,,,GOOD,N/A,,,,GOOD,N/A,,,,GOOD,N/A,,,,GOOD,N/A,,,,GOOD,N/A,,,,GOOD,N/A,,,,GOOD,N/A,,,,GOOD,N/A,,,,GOOD,N/A,,,,GOOD,N/A,,,,GOOD,N/A,,,,GOOD,N/A,,,,GOOD,N/A,,,,GOOD,N/A,,,,GOOD,N/A,,,,GOOD,N/A,,,,GOOD,N/A,,,,GOOD,N/A,,,,GOOD,N/A,,,,GOOD,N/A,,,,GOOD,N/A,,,,GOOD,N/A,,,,GOOD,N/A,,,,GOOD,N/A,,,,GOOD,N/A,,,,GOOD,N/A,,,,GOOD,N/A,,,,GOOD,N/A,,,,GOOD,N/A,,,,GOOD,N/A,,,,GOOD,N/A,,,,GOOD,N/A,,,,GOOD,N/A,,,,GOOD,N/A,,,,GOOD,N/A,,,,GOOD,N/A,,,', 'na', 'QA Personel', '123', '001', 'Pending', NULL, NULL, '[object HTMLInputElement]'),
(24, '', 'June 3, 2024', ' LARGE ALPHA SWAB', '1', 'TX714A', 'Start-up qualification', 'PHTX712A', 'Headforming', 'TX0000', 'Single', 'checked', '', '0,20,', '1,3.8,', '2.0,3,', '0.9,1.3,', '1.0,3.0,', '0.1,1.0,', 'Position,Pressure,', '80,', '20,45,', '40,80,', '160,250,', '160,250,', '160,250,', '160,250,', '127,128,,,,,', '25.2,26.2,,,,,', '12.2,13.2,,,,,', '3.7,4.7,,,,,', '4.7,5.7,,,,,', '2.5,3.2,,,,,', 'NA,NA,,,,,', '26', 'GOOD', 'GOOD,GOOD,GOOD,GOOD,NA,GOOD,GOOD,GOOD,GOOD,NA,GOOD,GOOD,GOOD,GOOD,NA,GOOD,GOOD,GOOD,GOOD,NA,GOOD,GOOD,GOOD,GOOD,NA,GOOD,GOOD,,,,GOOD,GOOD,,,,GOOD,GOOD,,,,GOOD,GOOD,,,,GOOD,GOOD,,,,GOOD,GOOD,,,,GOOD,GOOD,,,,GOOD,GOOD,,,,GOOD,GOOD,,,,GOOD,GOOD,,,,GOOD,GOOD,,,,GOOD,GOOD,,,,GOOD,GOOD,,,,GOOD,GOOD,,,,GOOD,GOOD,,,,GOOD,GOOD,,,,GOOD,GOOD,,,,GOOD,GOOD,,,,GOOD,GOOD,,,,GOOD,GOOD,,,,GOOD,GOOD,,,', 'NA\n', 'QA Personel', '', '', 'Pending', NULL, NULL, '[object HTMLInputElement]'),
(25, '1', 'June 3, 2024', ' LARGE ALPHA SWAB', '2', 'TX714A', 'Start-up qualification', 'PHTX712A', 'Headforming', 'TX0000', 'Single', 'checked', 'NA', '0,20,2', '1,3.8,1', '2.0,3,3', '0.9,1.3,1', '1.0,3.0,3', '0.1,1.0,1', 'Position,Pressure,Pressure', '80,60', '20,45,20', '40,80,80', '160,250,160', '160,250,160', '160,250,250', '160,250,250', '127,128,,,,,', '25.2,26.2,,,,,', '12.2,13.2,,,,,', '3.7,4.7,,,,,', '4.7,5.7,,,,,', '2.5,3.2,,,,,', 'NA,NA,,,,,', '26', 'GOOD', 'GOOD,GOOD,GOOD,GOOD,NA,GOOD,GOOD,GOOD,GOOD,NA,GOOD,GOOD,GOOD,GOOD,NA,GOOD,GOOD,GOOD,GOOD,NA,GOOD,GOOD,GOOD,GOOD,NA,GOOD,GOOD,,,,GOOD,GOOD,,,,GOOD,GOOD,,,,GOOD,GOOD,,,,GOOD,GOOD,,,,GOOD,GOOD,,,,GOOD,GOOD,,,,GOOD,GOOD,,,,GOOD,GOOD,,,,GOOD,GOOD,,,,GOOD,GOOD,,,,GOOD,GOOD,,,,GOOD,GOOD,,,,GOOD,GOOD,,,,GOOD,GOOD,,,,GOOD,GOOD,,,,GOOD,GOOD,,,,GOOD,GOOD,,,,GOOD,GOOD,,,,GOOD,GOOD,,,,GOOD,GOOD,,,', 'na', 'QA Personel', '', '', 'Pending', NULL, NULL, '[object HTMLInputElement]');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_products2`
--

CREATE TABLE `tbl_products2` (
  `id` int(11) NOT NULL,
  `productname` varchar(45) DEFAULT NULL,
  `productDesc` text DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `handle` varchar(45) DEFAULT NULL,
  `substrate` varchar(45) DEFAULT NULL,
  `cuttingforceRange` varchar(100) DEFAULT NULL,
  `sealingtimeRange` varchar(100) DEFAULT NULL,
  `cuttingspeedRange` varchar(100) DEFAULT NULL,
  `approachingpositionRange` varchar(100) DEFAULT NULL,
  `sealingpositionspeedRange` varchar(45) DEFAULT NULL,
  `sealingpositionRange` varchar(45) DEFAULT NULL,
  `mode` varchar(45) DEFAULT NULL,
  `moldopenspeedRange` varchar(45) DEFAULT NULL,
  `watertempRange` varchar(45) DEFAULT NULL,
  `airpressureRange` varchar(45) DEFAULT NULL,
  `upperheattempRange` varchar(45) DEFAULT NULL,
  `lowerheattempRange` varchar(45) DEFAULT NULL,
  `uppermoldtempRange` varchar(45) DEFAULT NULL,
  `lowermoldtempRange` varchar(45) DEFAULT NULL,
  `totallengthRange` varchar(45) DEFAULT NULL,
  `swabheadlengthRange` varchar(45) DEFAULT NULL,
  `swabheadwidthRange` varchar(45) DEFAULT NULL,
  `swabheadthicknessRange` varchar(45) DEFAULT NULL,
  `swabhandlewidthRange` varchar(45) DEFAULT NULL,
  `swabhandlethicknessRange` varchar(45) DEFAULT NULL,
  `swabheaddiameterRange` varchar(45) DEFAULT NULL,
  `noofsample` varchar(45) DEFAULT NULL,
  `pullTest` varchar(45) DEFAULT NULL,
  `swabheadpullingRange` varchar(45) DEFAULT NULL,
  `swabheadpoppingRange` varchar(45) DEFAULT NULL,
  `pulltestdesc` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_products2`
--

INSERT INTO `tbl_products2` (`id`, `productname`, `productDesc`, `status`, `handle`, `substrate`, `cuttingforceRange`, `sealingtimeRange`, `cuttingspeedRange`, `approachingpositionRange`, `sealingpositionspeedRange`, `sealingpositionRange`, `mode`, `moldopenspeedRange`, `watertempRange`, `airpressureRange`, `upperheattempRange`, `lowerheattempRange`, `uppermoldtempRange`, `lowermoldtempRange`, `totallengthRange`, `swabheadlengthRange`, `swabheadwidthRange`, `swabheadthicknessRange`, `swabhandlewidthRange`, `swabhandlethicknessRange`, `swabheaddiameterRange`, `noofsample`, `pullTest`, `swabheadpullingRange`, `swabheadpoppingRange`, `pulltestdesc`) VALUES
(16, '11', '1', 'Active', '1', '1', '1,1', '1,1', '1,1', '1,11', '1,1', '1,1', 'Position,Pressure', '1', '1,1', '1,1', '1,1', '1,1', '1,1', '1,1', '1,1', '1,1', '1,1', '1,1', '1,1', '1,1', '1,1', '1', '1,2', 'N/A,N/A', 'N/A,N/A', 'Pull Test'),
(17, 'TX714A', ' LARGE ALPHA SWAB', 'Active', 'PHTX712A', 'TX0000', '0,20', '1,3.8', '2.0,3', '0.9,1.3', '1.0,3.0', '0.1,1.0', 'Position,Pressure', '80', '20,45', '40,80', '160,250', '160,250', '160,250', '160,250', '127,128', '25.2,26.2', '12.2,13.2', '3.7,4.7', '4.7,5.7', '2.5,3.2', 'NA,NA', '26', 'NA,NA', 'GOOD,GOOD', 'GOOD,GOOD', 'Pull Test'),
(18, 'TX757B', 'MICRO CLEANFOAM SWAB', 'Active', 'PHTX759B', 'PU FOAM', '0,10', '0.8,4', '0.5,3', '0.6,1.3', '0.5,3', '0.19,0.59', 'Position,Pressure', '80', '20,45', '40,80', '160,250', '160,250', '160,250', '160,250', '69.5,70.5', '10.5,11.5', '2.7,3.7', '2.4,3.4', 'NA,NA', 'NA,NA', '1.7,2.7', '68', '0,350', 'GOOD,GOOD', 'N/A,N/A', 'Pull Test');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `employeeID` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `fullName` varchar(45) DEFAULT NULL,
  `position` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `employeeID`, `password`, `fullName`, `position`, `status`) VALUES
(1, 'ITSupport_Asia', 'UEBzc3cwcmQxMjM=', 'IT Support Access', 'Admin', 'Active'),
(2, '000', 'VGV4d2lwZTIwMjQh', 'Chester Allan', 'TeamLeader', 'Active'),
(3, '001', 'VGV4d2lwZTIwMjQh', 'test', 'Maintenance', 'Active'),
(4, '002', 'VGV4d2lwZTIwMjQh', 'QA Personel', 'QA', 'Active'),
(5, '003', 'VGV4d2lwZTIwMjQh', 'QA manager', 'QA Manager', 'Active'),
(6, '699', 'VGV4d2lwZTIwMjQh', 'test', 'TeamLeader', 'Active'),
(7, '123', 'VGV4d2lwZTIwMjQh', 'Chester', 'TeamLeader', 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_checklist`
--
ALTER TABLE `tbl_checklist`
  ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- Indexes for table `tbl_products2`
--
ALTER TABLE `tbl_products2`
  ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_checklist`
--
ALTER TABLE `tbl_checklist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbl_products2`
--
ALTER TABLE `tbl_products2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
