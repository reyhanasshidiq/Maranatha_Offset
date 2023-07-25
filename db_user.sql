-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2023 at 04:46 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_user`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `username` varchar(50) NOT NULL,
  `password` varchar(800) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`username`, `password`, `email`, `name`) VALUES
('dimas17', '$2y$10$jyA9uDOR7RHvQhH/ra8grOoLyzUXbs2lVB.Jy7aRn74i.iLZpjjh2', 'dimasteguhr@gmail.com', 'Dimas Teguh Ramadhani'),
('reyhan14', '$2y$10$CXmPwatHAnHk3TyLCnkuu.pLkwUX5cUpC8k.9ODbvcFAXI5zwiHuK', 'reyhanashiddiqjayasasmita@gmail.com', 'Reyhan Asshidiq'),
('rodi1234', '$2y$10$gndyJ5w1k7HkU.FuNOp7wuPrtfEM22Cpu91ES8F25YstORPAXHuk.', 'rodi@gmail.com', 'rodi'),
('tes123', '$2y$10$onZ/1DVQUVQ2ww7rxGrUzOCGMB311niiG0Oxdweadkg4dxqMICMxe', 'tes@gmail.com', 'tes'),
('yudha11', '$2y$10$fnuPxeTsuoE7JxfgLCiTAOv2lnc.tDiwDXR4RBG/TMkuzvD3OQBN6', 'handiyudha801@gmail.com', 'Handi Yudha');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
