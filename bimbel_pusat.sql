-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2018 at 04:12 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bimbel_pusat`
--

-- --------------------------------------------------------

--
-- Table structure for table `cabang`
--

CREATE TABLE `cabang` (
  `kode` char(10) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cabang`
--

INSERT INTO `cabang` (`kode`, `kota`, `nama`, `alamat`) VALUES
('ML1', 'Malang', 'Malang Adoh', 'Jln. Adoh Pokok 2');

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `kode` char(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `mapel` varchar(30) NOT NULL,
  `id_cabang` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`kode`, `nama`, `email`, `no_hp`, `mapel`, `id_cabang`) VALUES
('YA', 'Yusuf Alli', 'yaaaaa@gmail.com', '087737373737', 'Matematika', 'ML1');

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `kode` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `sekolah` varchar(50) NOT NULL,
  `nama_ortu` varchar(100) NOT NULL,
  `no_hp_ortu` varchar(20) NOT NULL,
  `id_program` char(10) NOT NULL,
  `id_cabang` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pendaftaran`
--

INSERT INTO `pendaftaran` (`kode`, `nama`, `alamat`, `email`, `no_hp`, `sekolah`, `nama_ortu`, `no_hp_ortu`, `id_program`, `id_cabang`) VALUES
(3, 'Teguh ', 'asasas sdsdsdsdsdsd dsdsdsdd sdsdsdsdsdsd', 'sds@gmail.ov', '1111', 'Boyolangu', 'Harjo', '5555', 'SBMPTN', 'ML1'),
(4, 'Reynald', 'Tanggung', 're@gamil.com', '048494949491', 'Boyolangu', 'Su', '089273373737', 'SBMPTN', 'ML1'),
(5, 'Lukman', 'Turen', 'lukmantya@gmail.com', '089776332226', 'SMK Turen', 'Sidiq', '0812233232323', 'SBMPTN', 'ML1'),
(6, 'Aldi', 'Ngujang', 'aldi@gmail.com', '087363636363', 'Boyolangu', 'Sidiq', '085838383833', 'SBMPTN', 'ML1'),
(7, 'Dofa', 'Kiping', 'dofareng@gmail.com', '0852237373737', 'Boyolangu', 'Hadi', '0876636626262', 'XIR', 'ML1'),
(8, 'Acun2', 'Malang', 'acun@gmail.com', '09999299999', 'Malang', 'Harjo', '029292929', 'SBMPTN', 'ML1');

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE `program` (
  `kode` char(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tingkat` varchar(20) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `harga` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`kode`, `nama`, `tingkat`, `keterangan`, `harga`) VALUES
('SBMPTN', 'Paket SBMPTN', '12', 'ini paket sbm', '90000'),
('XIR', 'Paket Kelas 11 Regular', '11 SMA', 'Regular Kelas XI SMA', '1200000');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `kode` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `id_cabang` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cabang`
--
ALTER TABLE `cabang`
  ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`kode`),
  ADD KEY `id_cabang` (`id_cabang`);

--
-- Indexes for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`kode`),
  ADD KEY `id_cabang` (`id_cabang`),
  ADD KEY `id_program` (`id_program`);

--
-- Indexes for table `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`kode`),
  ADD KEY `id_cabang` (`id_cabang`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `kode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `kode` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `guru`
--
ALTER TABLE `guru`
  ADD CONSTRAINT `guru_ibfk_1` FOREIGN KEY (`id_cabang`) REFERENCES `cabang` (`kode`);

--
-- Constraints for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD CONSTRAINT `pendaftaran_ibfk_1` FOREIGN KEY (`id_cabang`) REFERENCES `cabang` (`kode`),
  ADD CONSTRAINT `pendaftaran_ibfk_2` FOREIGN KEY (`id_cabang`) REFERENCES `cabang` (`kode`),
  ADD CONSTRAINT `pendaftaran_ibfk_3` FOREIGN KEY (`id_cabang`) REFERENCES `cabang` (`kode`),
  ADD CONSTRAINT `pendaftaran_ibfk_4` FOREIGN KEY (`id_cabang`) REFERENCES `cabang` (`kode`),
  ADD CONSTRAINT `pendaftaran_ibfk_5` FOREIGN KEY (`id_program`) REFERENCES `program` (`kode`);

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`id_cabang`) REFERENCES `cabang` (`kode`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
