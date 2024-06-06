-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 03, 2023 at 05:45 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pakar_diabetes`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_user` varchar(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('Admin','Dokter','User') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_user`, `nama`, `alamat`, `username`, `password`, `level`) VALUES
('D2796', 'adjdj', 'hajha', 'admin', '123', 'Admin'),
('user1282', 'kiko', '1ma', 'kiko', '123', 'User'),
('user6932', 'pasien', 'asd', 'samsul', '123', 'User'),
('user7140', 'handoko bujang', 'bandung', 'handoko ', '123', 'User');

-- --------------------------------------------------------

--
-- Table structure for table `diagnosa`
--

CREATE TABLE `diagnosa` (
  `id_lap` int(10) NOT NULL,
  `id_user` varchar(55) NOT NULL,
  `tgl_diagnosa` date NOT NULL,
  `kd_gejala` varchar(55) NOT NULL,
  `Hiperemesis_Gravidarum` varchar(55) NOT NULL,
  `Preeklampsia` varchar(55) NOT NULL,
  `Kehamilan_Ektopik` varchar(55) NOT NULL,
  `Molahidatidosa` varchar(55) NOT NULL,
  `Plasenta_Previa` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gejala`
--

CREATE TABLE `gejala` (
  `id_g` int(20) NOT NULL,
  `kd_gejala` varchar(20) NOT NULL,
  `gejala` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gejala`
--

INSERT INTO `gejala` (`id_g`, `kd_gejala`, `gejala`) VALUES
(129, 'G01', 'sering merasa lapar'),
(130, 'G02', 'merasa haus'),
(131, 'G03', 'sering buang air kecil'),
(132, 'G04', 'penurunan berat badan'),
(133, 'G05', 'infeksi pada vagina'),
(134, 'G06', 'mudah merasa lelah'),
(135, 'G07', 'kesemutan pada bagian kaki'),
(136, 'G08', 'pandangan kabur'),
(137, 'G09', 'penyembuhan luka lebih lama'),
(138, 'G10', 'permasalahan dalam hubungan seksual'),
(139, 'G11', 'kadar gula dalam urine (setelah melakukan tes urine)'),
(140, 'G12', 'mual'),
(141, 'G13', 'mulut kering'),
(142, 'G14', 'kulit (kelainan pada kulit menjadi kering)'),
(143, 'G15', 'gatal (gatal sekitaran kemaluan)'),
(144, 'G16', 'luka (luka yang sukar sembuh)'),
(145, 'G17', 'keputihan (keputihan karena kelainan pada ginjal kalogi)'),
(146, 'G18', 'bisul (sering muncul bisul ditubuh)'),
(147, 'G19', 'lemah (tubuh cepat terasa lemah)'),
(148, 'G20', 'konsentrasi (konsentrasi mudah terganggu/kurang fokus)'),
(149, 'G21', 'infeksi (mudah terkena infeksi)');

-- --------------------------------------------------------

--
-- Table structure for table `penyakit`
--

CREATE TABLE `penyakit` (
  `id_k` int(11) NOT NULL,
  `kd_penyakit` varchar(20) NOT NULL,
  `penyakit` varchar(50) NOT NULL,
  `solusi` text NOT NULL,
  `bobot` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penyakit`
--

INSERT INTO `penyakit` (`id_k`, `kd_penyakit`, `penyakit`, `solusi`, `bobot`) VALUES
(39, 'P1', 'Gestasional Diabetes Melitus', 'Mengonsumsi makanan bergizi lengkap dan seimbang, terutama sayuran, buah-buahan, dan biji-bijian ,Membatasi konsumsi makanan cepat saji dan makanan atau minuman yang mengandung gula tinggi ,Makan dalam porsi kecil, tetapi lebih sering ,Makan dengan jadwal yang teratur ,Rutin berolahraga baik sebelum atau selama kehamilan sesuai kondisi kesehatan ,Memulai kehamilan dengan berat badan ideal ,Menghindari kenaikan berat badan secara berlebihan selama kehamilan', '0.548076923'),
(40, 'P2', 'Diabetes Pregestasional', 'Perawatan untuk diabetes tipe 1 melibatkan suntikan insulin setiap hari atau penggunaan pompa insulin , serta pemeriksaan gula darah secara teratur. 1 Pusat Pengendalian dan Pencegahan Penyakit. Apa itu diabetes tipe 1?   Penyedia layanan kesehatan Anda akan berdiskusi dengan Anda kapan harus memeriksa gula Anda, seberapa sering, dan berapa tingkat target Anda.  Olahraga teratur, teknik pengurangan stres , perilaku gaya hidup sehat, serta pengendalian tekanan darah dan kolesterol juga penting.', '0.451923077');

-- --------------------------------------------------------

--
-- Table structure for table `relasi`
--

CREATE TABLE `relasi` (
  `ID` int(11) NOT NULL,
  `kd_penyakit` varchar(16) NOT NULL,
  `kd_gejala` varchar(16) NOT NULL,
  `nilai` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `relasi`
--

INSERT INTO `relasi` (`ID`, `kd_penyakit`, `kd_gejala`, `nilai`) VALUES
(69, 'P1', 'G01', '0.47'),
(70, 'P1', 'G02', '0.47'),
(71, 'P1', 'G03', '0.47'),
(72, 'P1', 'G04', '0.46'),
(73, 'P1', 'G05', '0.47'),
(74, 'P1', 'G06', '0.47'),
(75, 'P1', 'G07', '0.47'),
(76, 'P1', 'G08', '0.40'),
(77, 'P1', 'G09', '0.37'),
(78, 'P1', 'G10', '0.32'),
(79, 'P1', 'G11', '0.30'),
(80, 'P1', 'G12', '0.25'),
(81, 'P1', 'G13', '0.23'),
(82, 'P1', 'G14', '0.1'),
(83, 'P1', 'G15', '0.1'),
(84, 'P1', 'G16', '0.1'),
(85, 'P1', 'G17', '0.1'),
(86, 'P1', 'G18', '0.1'),
(87, 'P1', 'G19', '0.1'),
(88, 'P1', 'G20', '0.1'),
(89, 'P1', 'G21', '0.1'),
(90, 'P2', 'G01', '0.1'),
(91, 'P2', 'G02', '0.1'),
(92, 'P2', 'G03', '0.1'),
(93, 'P2', 'G04', '0.47'),
(94, 'P2', 'G05', '0.1'),
(95, 'P2', 'G06', '0.1'),
(96, 'P2', 'G07', '0.1'),
(97, 'P2', 'G08', '0.1'),
(98, 'P2', 'G09', '0.1'),
(99, 'P2', 'G10', '0.1'),
(100, 'P2', 'G11', '0.47'),
(101, 'P2', 'G12', '0.47'),
(102, 'P2', 'G13', '0.40'),
(103, 'P2', 'G14', '0.49'),
(104, 'P2', 'G15', '0.47'),
(105, 'P2', 'G16', '0.49'),
(106, 'P2', 'G17', '0.34'),
(107, 'P2', 'G18', '0.34'),
(108, 'P2', 'G19', '0.30'),
(109, 'P2', 'G20', '0.23'),
(110, 'P2', 'G21', '0.26');

-- --------------------------------------------------------

--
-- Table structure for table `riwayat`
--

CREATE TABLE `riwayat` (
  `id` int(11) NOT NULL,
  `penyakit` varchar(150) NOT NULL,
  `id_user` varchar(55) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `tgl_diagnosa` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `riwayat`
--

INSERT INTO `riwayat` (`id`, `penyakit`, `id_user`, `nama`, `tgl_diagnosa`) VALUES
(24, 'Diabetes Pregestasional', 'user6932', 'pasien', '2023-09-03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `diagnosa`
--
ALTER TABLE `diagnosa`
  ADD PRIMARY KEY (`id_lap`);

--
-- Indexes for table `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`id_g`);

--
-- Indexes for table `penyakit`
--
ALTER TABLE `penyakit`
  ADD PRIMARY KEY (`id_k`);

--
-- Indexes for table `relasi`
--
ALTER TABLE `relasi`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `riwayat`
--
ALTER TABLE `riwayat`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `diagnosa`
--
ALTER TABLE `diagnosa`
  MODIFY `id_lap` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `gejala`
--
ALTER TABLE `gejala`
  MODIFY `id_g` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;
--
-- AUTO_INCREMENT for table `penyakit`
--
ALTER TABLE `penyakit`
  MODIFY `id_k` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `relasi`
--
ALTER TABLE `relasi`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;
--
-- AUTO_INCREMENT for table `riwayat`
--
ALTER TABLE `riwayat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
