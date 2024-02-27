-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2024 at 02:05 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `galeri`
--

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE `album` (
  `albumid` int(11) UNSIGNED NOT NULL,
  `namaalbum` varchar(225) NOT NULL,
  `deskripsi` varchar(225) NOT NULL,
  `tanggaldibuat` date NOT NULL,
  `iduser` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`albumid`, `namaalbum`, `deskripsi`, `tanggaldibuat`, `iduser`) VALUES
(1, 'Tes', 'asdads', '0000-00-00', 1),
(2, 'Tes', 'asdads', '0000-00-00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `albumfoto`
--

CREATE TABLE `albumfoto` (
  `albumfotoid` int(11) UNSIGNED NOT NULL,
  `albumid` int(11) UNSIGNED NOT NULL,
  `iduser` int(11) UNSIGNED NOT NULL,
  `idfoto` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `albumfoto`
--

INSERT INTO `albumfoto` (`albumfotoid`, `albumid`, `iduser`, `idfoto`) VALUES
(1, 1, 1, 1),
(2, 1, 1, 2),
(3, 1, 1, 11),
(4, 1, 1, 4),
(5, 1, 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `foto`
--

CREATE TABLE `foto` (
  `idfoto` int(11) UNSIGNED NOT NULL,
  `judul` varchar(225) NOT NULL,
  `deskripsi` varchar(225) NOT NULL,
  `tanggalunggahan` date NOT NULL,
  `lokasifoto` varchar(255) NOT NULL,
  `iduser` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `foto`
--

INSERT INTO `foto` (`idfoto`, `judul`, `deskripsi`, `tanggalunggahan`, `lokasifoto`, `iduser`) VALUES
(3, 'asdasd', '', '2024-02-26', '1708921840_c9edf916d319a200390c.jpg', 1),
(6, 'asda', '', '2024-02-26', '1708922878_5c47ffcf0f747802b7a8.jpg', 1),
(7, 'langit', '', '2024-02-26', '1708922916_f8861ddc5d9808d2287d.jpg', 1),
(8, 'asdad', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Est pellentesque elit ullamcorper dignissim cras. Dignissim suspendisse in est ante in nibh mauris cu', '2024-02-26', '1708922931_fcbeeb583903c0bfea2e.jpg', 1),
(9, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Est pellentesque elit ullamcorper dignissim cras. Dignissim suspendisse in est ante in nibh mauris cu', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Est pellentesque elit ullamcorper dignissim cras. Dignissim suspendisse in est ante in nibh mauris cu', '2024-02-26', '1708922946_201ae06f56a249c80d7d.jpg', 1),
(10, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Est pellentesque elit ullamcorper dignissim cras. Dignissim suspendisse in est ante in nibh mauris cu', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Est pellentesque elit ullamcorper dignissim cras. Dignissim suspendisse in est ante in nibh mauris cu', '2024-02-26', '1708922963_57354bf4eae0be75e87a.jpg', 1),
(12, 'tes', '', '2024-02-26', '1708928635_35d08976b24c4da57c7b.jpg', 1),
(13, 'a', '', '2024-02-26', '1708928648_aa685e524842fbdc9b0b.jpg', 1),
(14, 'a', '', '2024-02-26', '1708928655_33b5993b08be291af2cd.jpg', 1),
(15, 'a', '', '2024-02-26', '1708928668_675a7d7dd24e3fa7502e.jpg', 1),
(16, 'a', '', '2024-02-26', '1708928673_ee276c01f952918cac5d.jpg', 1),
(17, 'a', '', '2024-02-26', '1708928678_6d2f3e92a7d40de08e08.jpg', 1),
(18, 'a', '', '2024-02-26', '1708928685_8dfa44dd190f0167e3fb.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `komentarfoto`
--

CREATE TABLE `komentarfoto` (
  `komentarid` int(11) UNSIGNED NOT NULL,
  `fotoid` int(11) UNSIGNED NOT NULL,
  `deskripsi` varchar(225) NOT NULL,
  `tanggalunggahan` date NOT NULL,
  `lokasifoto` varchar(255) NOT NULL,
  `userid` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `komentarfoto`
--

INSERT INTO `komentarfoto` (`komentarid`, `fotoid`, `deskripsi`, `tanggalunggahan`, `lokasifoto`, `userid`) VALUES
(1, 1, 'tes', '0000-00-00', '', 1),
(2, 1, 'tes', '0000-00-00', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `likefoto`
--

CREATE TABLE `likefoto` (
  `likeid` int(11) UNSIGNED NOT NULL,
  `idfoto` int(11) UNSIGNED NOT NULL,
  `iduser` int(11) UNSIGNED NOT NULL,
  `tanggallike` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `likefoto`
--

INSERT INTO `likefoto` (`likeid`, `idfoto`, `iduser`, `tanggallike`) VALUES
(1, 1, 1, '2024-02-26'),
(2, 13, 1, '2024-02-26');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2024-02-13-004024', 'App\\Database\\Migrations\\User', 'default', 'App', 1708912139, 1),
(2, '2024-02-13-004157', 'App\\Database\\Migrations\\Foto', 'default', 'App', 1708912139, 1),
(3, '2024-02-13-004447', 'App\\Database\\Migrations\\Likefoto', 'default', 'App', 1708912139, 1),
(4, '2024-02-13-004926', 'App\\Database\\Migrations\\Komentarfoto', 'default', 'App', 1708912139, 1),
(5, '2024-02-13-005035', 'App\\Database\\Migrations\\Album', 'default', 'App', 1708912139, 1),
(6, '2024-02-13-005759', 'App\\Database\\Migrations\\Albumfoto', 'default', 'App', 1708912139, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `iduser` int(11) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `namalengkap` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`iduser`, `username`, `avatar`, `namalengkap`, `alamat`, `email`, `password`) VALUES
(1, 'Konzz', '/1708930853_de9eff21a28ec5735307.jpg', '', '', 'nanamika1230@gmail.com', '$2y$10$oLoKOq8NlKtl/eXVHswmTeQyO/O0OMX.3kyvAC7ArID5o3CUk6cI6'),
(2, 'Konzz', '', '', '', 'pelergaming1122@gmail.com', '$2y$10$VAvxkPS9k8YVz8utHfo3tOQMfC88OMGJTIix5b/m/ascj2egq2F02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`albumid`);

--
-- Indexes for table `albumfoto`
--
ALTER TABLE `albumfoto`
  ADD PRIMARY KEY (`albumfotoid`);

--
-- Indexes for table `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`idfoto`);

--
-- Indexes for table `komentarfoto`
--
ALTER TABLE `komentarfoto`
  ADD PRIMARY KEY (`komentarid`);

--
-- Indexes for table `likefoto`
--
ALTER TABLE `likefoto`
  ADD PRIMARY KEY (`likeid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `album`
--
ALTER TABLE `album`
  MODIFY `albumid` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `albumfoto`
--
ALTER TABLE `albumfoto`
  MODIFY `albumfotoid` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `foto`
--
ALTER TABLE `foto`
  MODIFY `idfoto` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `komentarfoto`
--
ALTER TABLE `komentarfoto`
  MODIFY `komentarid` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `likefoto`
--
ALTER TABLE `likefoto`
  MODIFY `likeid` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
