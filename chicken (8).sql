-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2016 at 08:46 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `chicken`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `name`) VALUES
(1, 'admin@gmail.com', 'admin', 'shabir');

-- --------------------------------------------------------

--
-- Table structure for table `flock`
--

CREATE TABLE IF NOT EXISTS `flock` (
  `f_id` int(11) NOT NULL,
  `f_no` varchar(50) DEFAULT NULL,
  `f_name` varchar(50) DEFAULT NULL,
  `f_date` varchar(30) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `rate` varchar(30) NOT NULL,
  `total_bird` varchar(30) NOT NULL,
  `total_weight` varchar(30) NOT NULL DEFAULT '0',
  `actual_weight` varchar(30) NOT NULL,
  `paid_flock` varchar(30) NOT NULL DEFAULT '0',
  `per_bird_weight` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `flock`
--

INSERT INTO `flock` (`f_id`, `f_no`, `f_name`, `f_date`, `status`, `rate`, `total_bird`, `total_weight`, `actual_weight`, `paid_flock`, `per_bird_weight`) VALUES
(1, NULL, NULL, '27-11-2016 ', 0, '4400', '31620', '-37862', '1800', '2899100', '1.8'),
(2, NULL, NULL, '28-11-2016 ', 1, '4600', '15200', '-11975', '27360', '1495427', '1.8');

-- --------------------------------------------------------

--
-- Table structure for table `visit`
--

CREATE TABLE IF NOT EXISTS `visit` (
  `visit_id` int(11) NOT NULL,
  `fkf_id` int(20) NOT NULL,
  `empty_weight` varchar(30) NOT NULL,
  `vehicle_number` varchar(20) NOT NULL,
  `driver_name` varchar(50) NOT NULL,
  `driver_cnic` varchar(20) NOT NULL,
  `loaded_weight` varchar(30) NOT NULL,
  `rate` varchar(30) NOT NULL,
  `advance` int(30) NOT NULL,
  `balance` varchar(30) NOT NULL,
  `chicken_weight` varchar(30) DEFAULT '0',
  `broker_name` varchar(30) DEFAULT NULL,
  `paid_visit` varchar(30) NOT NULL DEFAULT '0',
  `visit_status` varchar(20) NOT NULL,
  `v_status` tinyint(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `visit`
--

INSERT INTO `visit` (`visit_id`, `fkf_id`, `empty_weight`, `vehicle_number`, `driver_name`, `driver_cnic`, `loaded_weight`, `rate`, `advance`, `balance`, `chicken_weight`, `broker_name`, `paid_visit`, `visit_status`, `v_status`) VALUES
(1, 1, '1105', '1976', 'noor rehman', '0315962333', '1985', '4400', 119600, '-119600', '22', 'tajamul pehlwan fateh jhang', '0', '1', 1),
(3, 1, '1120', '1181', 'FAZAL REHMAN', '03339343647', '2120', '4400', 110000, '0', '25', 'TAJAMUL PEHLWAN', '0', '1', 1),
(4, 1, '1190', '1628', 'AMANULLAH', '03157446031', '2190', '4400', 110000, '0', '25', 'TAJAMULPEHLWAN', '0', '1', 1),
(5, 1, '1135', '0356', 'IMRAN', '03109347001', '1920', '4400', 80000, '0', '19.625', 'TAJAMUL PALWAN', '6350', '2', 1),
(7, 1, '1965', '7507', 'FAIZUR REHMAN', '03139767285', '3365', '4400', 154000, '0', '35', 'TAJAMUL PALAWAN', '2200', '1', 1),
(9, 1, '1035', '1265', 'TAJ MOHAMMAD', '03065907236', '2055', '4400', 110000, '0', '25.5', 'TAJAMUL PALWAN', '2200', '2', 1),
(10, 1, '1080', '3353', 'NOR ZALI', '03161917228', '2080', '4400', 110000, '0', '25', 'TAJAMUL PALAWAN', '0', '1', 1),
(11, 1, '1130', '3590', 'IMRAN', '03368660552', '2135', '4400', 110000, '0', '25.125', 'TAJAMUL PALAWAN', '550', '2', 1),
(12, 1, '1085', '8468', 'ZAHIR KHAN', '03159424616', '2025', '4400', 103400, '0', '23.5', 'TAJAMUL PALAWAN', '0', '1', 1),
(13, 1, '1010', '2308', 'SHAHID', '03108341266', '1870', '4400', 90000, '0', '21.5', 'JAMEEL PALAWAN', '4600', '2', 1),
(15, 1, '1035', '2719', 'SHAHZAIB', '03159362407', '2170', '4400', 120000, '0', '28.375', 'TAJAMUL PALWAN', '4850', '2', 1),
(16, 1, '940', '2516', 'FAROOQ', '03134363647', '1855', '4400', 96800, '0', '22.875', 'TAJAMUL PALWAN', '3850', '2', 1),
(17, 1, '2195', '1556', 'JALIL', '0302', '3825', '4400', 123000, '0', '40.75', 'TAJAMUL PALWAN', '56300', '2', 1),
(18, 1, '1030', '0951', 'NIAZ ALI', '03134284215', '1870', '4400', 88000, '0', '21', 'TAJAMUL PALWAN', '4400', '2', 1),
(19, 1, '1070', '1466', 'FAZLIWAHAB', '03339094691', '1995', '4400', 101200, '0', '23.125', 'TAJAMUL PALWAN', '550', '2', 1),
(21, 1, '990', '1753', 'HAZRAT HUSSAIN', '03025947760', '1670', '4400', 74800, '0', '17', 'TAJAMUL PALWAN', '0', '1', 1),
(22, 1, '2095', '6804', 'REHMAN', '03015020010', '3405', '4400', 132000, '0', '32.75', 'TAJAMUL PALWAN', '12100', '2', 1),
(23, 1, '1055', '2632', 'BILAL', '03130026282', '1960', '4400', 96800, '2750', '22.625', 'TAJAMUL PALWAN', '0', '1', 1),
(24, 1, '1060', '9308', 'HAZRAT NABI', '03159094774', '1880', '4400', 88000, '0', '20.5', 'TAJAMUL PALWAN', '2200', '2', 1),
(25, 1, '1030', '0775', 'AURANGZEB', '03159687487', '2055', '4400', 0, '112750', '25.625', 'TAJAMUL PALWAN', '0', '1', 1),
(26, 1, '1085', '1272', 'MANSOOR', '03149957002', '1915', '4400', 94400, '-3100', '20.75', 'TAJAMUL PALWAN', '0', '1', 1),
(27, 1, '1125', '1268', 'WARIS KHAN', '03005870498', '2045', '4400', 99000, '0', '23', 'TAJAMUL PALWAN', '2200', '2', 1),
(28, 1, '1015', '2016A', 'AHMAD', '03332929173', '1775', '4400', 83600, '0', '19', 'TAJAMUL PALWAN', '0', '1', 1),
(29, 1, '1040', '2016B', 'DOLAT KHAN', '03044419788', '1960', '4400', 88000, '0', '23', 'TAJAMUL PALWAN', '13200', '2', 1),
(30, 1, '1195', '9143', 'MIRZA', '03129155838', '1840', '4400', 70950, '0', '16.125', 'TAJAMUL PALWAN', '0', '1', 1),
(32, 1, '1145', '7378', 'HAIDER ALI', '03367855323', '1835', '4400', 74800, '0', '17.25', 'TAJAMUL PALWAN', '1100', '2', 1),
(33, 1, '1150', '0582', 'BAKHTIYAR', '03443000019', '2005', '4400', 88000, '0', '21.375', 'TAJAMUL PALWAN', '6050', '2', 1),
(34, 1, '1025', '1894', 'KHAN HAIDER', '03134504449', '1760', '4400', 80850, '0', '18.375', 'TAJAMUL PALWAN', '0', '1', 1),
(35, 1, '1065', '1225', 'ABDUL MATEEN', '03005883700', '1785', '4400', 79200, '0', '18', 'TAJAMUL PALWAN', '0', '1', 1),
(36, 2, '1070', '4068', 'IRFAN', '03459222103', '2110', '4600', 119600, '0', '26', 'TAJAMUL PALWAN', '0', '1', 1),
(38, 2, '1195', '9143', 'MIRZA', '03129155838', '1990', '4600', 50000, '0', '19.875', 'TAJAMUL PALWAN', '41425', '2', 1),
(39, 2, '1120', '8173', 'ISRAR', '03000576368', '2120', '4600', 115000, '0', '25', 'TAJAMUL PALWAN', '0', '1', 1),
(41, 2, '1115', '0582', 'BAKHTIYAR', '0344300019', '2020', '4600', 100000, '0', '22.625', '', '4075', '2', 1),
(42, 2, '940', '2516', 'FAROOQ', '03134363647', '1895', '4600', 100000, '9825', '23.875', 'TAJAMUL PALWAN', '19650', '1', 1),
(43, 2, '1085', '8468', 'ZAHIR', '03159424616', '2005', '4600', 105800, '-105800', '23', 'TAJAMUL PALWAN', '87777', '1', 1),
(44, 2, '1035', '2719', 'SHAHZAIB', '03159362407', '2080', '4600', 115000, '0', '26.125', 'TAJAMUL PALWAN', '5175', '2', 1),
(45, 2, '1055', '2632', 'BILAL', '03130026282', '1925', '4600', 96600, '3450', '21.75', 'TAJAMUL PALWAN', '0', '1', 1),
(46, 2, '2195', '1556', 'JALIL', '03469378165', '3650', '4600', 161000, '0', '36.375', 'TAJAMUL PALWAN', '6325', '2', 1),
(47, 2, '1045', '1763', 'ZUBAIRALI', '', '2085', '4600', 110400, '0', '26', 'TAJAMUL PALWAN', '9200', '2', 1),
(48, 2, '2005', '4393', 'RAFAKAT', '03169621513', '3105', '4600', 110400, '0', '27.5', 'TAJAMUL PALWAN', '16100', '2', 1),
(49, 2, '1130', '0356', 'IMRAN', '031093470001', '2190', '4600', 115000, '0', '26.5', '', '6900', '2', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `flock`
--
ALTER TABLE `flock`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `visit`
--
ALTER TABLE `visit`
  ADD PRIMARY KEY (`visit_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `flock`
--
ALTER TABLE `flock`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `visit`
--
ALTER TABLE `visit`
  MODIFY `visit_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=50;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
