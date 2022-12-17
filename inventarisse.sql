-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2022 at 03:14 AM
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
-- Database: `inventarisse`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `barang_id` int(12) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jumlah` int(20) NOT NULL,
  `lab_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`barang_id`, `nama`, `jumlah`, `lab_id`) VALUES
(1, 'Mouse', 20, 1),
(2, 'Dus Kabel UTP Cat 5e', 3, 2),
(3, 'Arduino', 7, 1),
(6, 'Keyboard', 5, 1),
(16, 'Headset', 25, 1),
(17, 'Kabel UTP Cat6', 30, 1);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `nim` varchar(11) NOT NULL,
  `user_id` int(10) NOT NULL,
  `prodi` varchar(255) NOT NULL,
  `angkatan` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`nim`, `user_id`, `prodi`, `angkatan`) VALUES
('20520241020', 1, 'Pendidikan Teknik Informatika', '2020'),
('20520241026', 3, 'Pendidikan Teknik Informatika', '2020');

-- --------------------------------------------------------

--
-- Table structure for table `employee_lab`
--

CREATE TABLE `employee_lab` (
  `lab_id` int(10) NOT NULL,
  `nim` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee_lab`
--

INSERT INTO `employee_lab` (`lab_id`, `nim`) VALUES
(1, '20520241020'),
(2, '20520241026');

-- --------------------------------------------------------

--
-- Table structure for table `history_barang`
--

CREATE TABLE `history_barang` (
  `history_id` int(20) NOT NULL,
  `barang_id` int(12) NOT NULL,
  `keterangan` varchar(20) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `history_barang`
--

INSERT INTO `history_barang` (`history_id`, `barang_id`, `keterangan`, `jumlah`, `tanggal`) VALUES
(1, 3, 'Barang Rusak', -3, '2022-11-29'),
(2, 1, 'Barang Masuk', 5, '2022-11-29'),
(3, 3, 'Barang Rusak', 20, '2022-11-29'),
(4, 16, 'Barang Masuk', 25, '2022-11-29'),
(5, 17, 'Barang Masuk', 30, '2022-11-29');

-- --------------------------------------------------------

--
-- Table structure for table `lab`
--

CREATE TABLE `lab` (
  `lab_id` int(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `gedung` varchar(30) NOT NULL,
  `koordinator` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lab`
--

INSERT INTO `lab` (`lab_id`, `nama`, `gedung`, `koordinator`) VALUES
(1, 'Lab Telekomunikasi', 'IDB', 'Dr. Drs. Pramudi Utomo, M.Si.'),
(2, 'Lab Jaringan Komputer', 'IDB', 'Purno Tri Aji, M.Eng.');

-- --------------------------------------------------------

--
-- Table structure for table `pinjam`
--

CREATE TABLE `pinjam` (
  `pinjam_id` int(12) NOT NULL,
  `barang_id` int(12) NOT NULL,
  `jumlah_pinjam` int(50) NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `nama_peminjam` varchar(50) NOT NULL,
  `alasan` varchar(255) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `presensi`
--

CREATE TABLE `presensi` (
  `nim` varchar(11) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu_tiba` time NOT NULL,
  `waktu_pulang` time NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(30) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telpon` varchar(13) NOT NULL,
  `role` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `nama`, `email`, `telpon`, `role`) VALUES
(1, 'fathanh004', 'fathan123', 'Fathan Hidayatullah', 'fathanhidayatullah004@gmail.com', '08895954173', 'employee'),
(2, 'admin1', 'admin123', 'Akun Admin 1', 'admin1@google.com', '081235677132', 'admin'),
(3, 'feisal', 'feisal123', 'Feisal Dharma Yudha', 'feisaldharmayudha123@gmail.com', '08994641133', 'employee');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`barang_id`),
  ADD KEY `lab_id` (`lab_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`nim`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `employee_lab`
--
ALTER TABLE `employee_lab`
  ADD PRIMARY KEY (`lab_id`,`nim`),
  ADD KEY `nim` (`nim`),
  ADD KEY `lab_id` (`lab_id`);

--
-- Indexes for table `history_barang`
--
ALTER TABLE `history_barang`
  ADD PRIMARY KEY (`history_id`),
  ADD KEY `barang_id` (`barang_id`);

--
-- Indexes for table `lab`
--
ALTER TABLE `lab`
  ADD PRIMARY KEY (`lab_id`);

--
-- Indexes for table `pinjam`
--
ALTER TABLE `pinjam`
  ADD PRIMARY KEY (`pinjam_id`),
  ADD KEY `barang_id` (`barang_id`);

--
-- Indexes for table `presensi`
--
ALTER TABLE `presensi`
  ADD PRIMARY KEY (`nim`,`tanggal`),
  ADD KEY `nim` (`nim`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `barang_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `history_barang`
--
ALTER TABLE `history_barang`
  MODIFY `history_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pinjam`
--
ALTER TABLE `pinjam`
  MODIFY `pinjam_id` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`lab_id`) REFERENCES `lab` (`lab_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employee_lab`
--
ALTER TABLE `employee_lab`
  ADD CONSTRAINT `employee_lab_ibfk_1` FOREIGN KEY (`lab_id`) REFERENCES `lab` (`lab_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `employee_lab_ibfk_2` FOREIGN KEY (`nim`) REFERENCES `employee` (`nim`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `history_barang`
--
ALTER TABLE `history_barang`
  ADD CONSTRAINT `history_barang_ibfk_1` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`barang_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pinjam`
--
ALTER TABLE `pinjam`
  ADD CONSTRAINT `pinjam_ibfk_1` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`barang_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `presensi`
--
ALTER TABLE `presensi`
  ADD CONSTRAINT `presensi_ibfk_2` FOREIGN KEY (`nim`) REFERENCES `employee` (`nim`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
