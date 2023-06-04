-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2023 at 02:41 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mvp_01`
--

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `id` int(11) NOT NULL,
  `nik` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tempat` varchar(100) NOT NULL,
  `tl` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telp` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`id`, `nik`, `nama`, `tempat`, `tl`, `gender`, `email`, `telp`) VALUES
(1, '1234561001', 'Dinda', 'Bandung', '11-12-2020', 'Perempuan', 'dindawahyu@upi.edu', '088970803025'),
(4, '7890654001', 'Ayang', 'Bandung', '29-11-2020', 'Perempuan', 'ay@gmail.com', '081321778980'),
(5, '9876576008', 'Zulfan', 'bandung', '04-01-2021', 'Laki-laki', 'jull@gmai.com', '088970803025'),
(6, '1234567009', 'Prilla', 'Seoul', '05-05-2001', 'Perempuan', 'prillarosaria@upi.edu', '081234876235'),
(7, '7135712004', 'Son', 'Canada', '21-02-1994', 'Perempuan', 'chrstjsmn@gmail.com', '081573038425'),
(8, '8478347011', 'Jeno', 'Incheon', '23-12-2000', 'Laki-laki', 'jeno@gmail.com', '08138746239'),
(9, '8795642002', 'Mark', 'Canada', '20-08-1999', 'Laki-laki', 'mark@upi.edu', '08237218473');

--
-- Triggers `pasien`
--
DELIMITER $$
CREATE TRIGGER `format_edit_date` BEFORE UPDATE ON `pasien` FOR EACH ROW BEGIN
    SET NEW.tl = DATE_FORMAT(NEW.tl, '%d-%m-%Y');
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `trg_format_join_date` BEFORE INSERT ON `pasien` FOR EACH ROW BEGIN
    SET NEW.tl = DATE_FORMAT(NEW.tl, '%d-%m-%Y');
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
