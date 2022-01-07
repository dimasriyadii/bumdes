-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2021 at 03:42 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `desa`
--

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id_kegiatan` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `isi` text NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `tanggal` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`id_kegiatan`, `judul`, `isi`, `gambar`, `tanggal`) VALUES
(1, 'asdasdasdasd123123 fard', 'asdfsdfdsfdsf2312321321321', '161438064_716366549032408_7107217014467464618_n.jpg', '2021-03-20'),
(2, 'asdasdasdasd', '<p>a</p>\r\n', '2020211020thWhatsApp Image 2021-03-19 at 8.25.48 AM (2).jpeg', '2021-03-20'),
(4, 'faasd', '<p>asdasd</p>\r\n', '2020211106th153034055_762081308022274_8143273071408626104_n.jpg', '2021-03-20'),
(5, 'asdasdasdasd123123 fard', 'asdfsdfdsfdsf2312321321321', '161438064_716366549032408_7107217014467464618_n.jpg', '2021-03-20'),
(6, 'asdasdasdasd', '<p>a</p>\r\n', '2020211020thWhatsApp Image 2021-03-19 at 8.25.48 AM (2).jpeg', '2021-03-20'),
(7, 'faasd', '<p>asdasd</p>\r\n', '2020211106th153034055_762081308022274_8143273071408626104_n.jpg', '2021-03-20'),
(8, 'asdasdasdasd123123 fard', 'asdfsdfdsfdsf2312321321321', '161438064_716366549032408_7107217014467464618_n.jpg', '2021-03-20'),
(9, 'asdasdasdasd', '<p>a</p>\r\n', '2020211020thWhatsApp Image 2021-03-19 at 8.25.48 AM (2).jpeg', '2021-03-20'),
(10, 'faasd', '<p>asdasd</p>\r\n', '2020211106th153034055_762081308022274_8143273071408626104_n.jpg', '2021-03-20'),
(11, 'asdasdasdasd123123 fard', 'asdfsdfdsfdsf2312321321321', '161438064_716366549032408_7107217014467464618_n.jpg', '2021-03-20'),
(12, 'asdasdasdasd', '<p>a</p>\r\n', '2020211020thWhatsApp Image 2021-03-19 at 8.25.48 AM (2).jpeg', '2021-03-20'),
(13, 'faasd', '<p>asdasd</p>\r\n', '2020211106th153034055_762081308022274_8143273071408626104_n.jpg', '2021-03-20'),
(14, 'asdasdasdasd123123 fard', 'asdfsdfdsfdsf2312321321321', '161438064_716366549032408_7107217014467464618_n.jpg', '2021-03-20'),
(15, 'asdasdasdasd', '<p>a</p>\r\n', '2020211020thWhatsApp Image 2021-03-19 at 8.25.48 AM (2).jpeg', '2021-03-20'),
(16, 'faasd', '<p>asdasd</p>\r\n', '2020211106th153034055_762081308022274_8143273071408626104_n.jpg', '2021-03-20'),
(17, 'asdasdasdasd123123 fard', 'asdfsdfdsfdsf2312321321321', '161438064_716366549032408_7107217014467464618_n.jpg', '2021-03-20'),
(18, 'asdasdasdasd', '<p>a</p>\r\n', '2020211020thWhatsApp Image 2021-03-19 at 8.25.48 AM (2).jpeg', '2021-03-20'),
(19, 'faasd', '<p>asdasd</p>\r\n', '2020211106th153034055_762081308022274_8143273071408626104_n.jpg', '2021-03-20'),
(20, 'asdasdasdasd123123 fard', 'asdfsdfdsfdsf2312321321321', '161438064_716366549032408_7107217014467464618_n.jpg', '2021-03-20'),
(21, 'asdasdasdasd', '<p>a</p>\r\n', '2020211020thWhatsApp Image 2021-03-19 at 8.25.48 AM (2).jpeg', '2021-03-20'),
(22, 'faasd', '<p>asdasd</p>\r\n', '2020211106th153034055_762081308022274_8143273071408626104_n.jpg', '2021-03-20'),
(23, 'asdasdasdasd123123 fard', 'asdfsdfdsfdsf2312321321321', '161438064_716366549032408_7107217014467464618_n.jpg', '2021-03-20'),
(24, 'asdasdasdasd', '<p>a</p>\r\n', '2020211020thWhatsApp Image 2021-03-19 at 8.25.48 AM (2).jpeg', '2021-03-20');

-- --------------------------------------------------------

--
-- Table structure for table `kerjasama`
--

CREATE TABLE `kerjasama` (
  `id_kerjasama` int(11) NOT NULL,
  `namausaha` varchar(100) NOT NULL,
  `proposalusaha` varchar(200) NOT NULL,
  `foto` varchar(500) NOT NULL,
  `kegiatanusaha` varchar(500) NOT NULL,
  `email` varchar(100) NOT NULL,
  `tanggal` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kerjasama`
--

INSERT INTO `kerjasama` (`id_kerjasama`, `namausaha`, `proposalusaha`, `foto`, `kegiatanusaha`, `email`, `tanggal`) VALUES
(5, 'fardin', '2020210933thBerkas Permohonan.pdf', 'fardin2020210933thilovepdf_merged.pdf', 'as', 'nuridilfitriidris@gmail.com', '20-Mar-2021');

-- --------------------------------------------------------

--
-- Table structure for table `pelunasan_pinjaman`
--

CREATE TABLE `pelunasan_pinjaman` (
  `id_pelunasan` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `bayarke` varchar(100) NOT NULL,
  `lanjutpinjam` varchar(10) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `sisapinjam` varchar(100) NOT NULL,
  `tanggal` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelunasan_pinjaman`
--

INSERT INTO `pelunasan_pinjaman` (`id_pelunasan`, `nama`, `bayarke`, `lanjutpinjam`, `nik`, `sisapinjam`, `tanggal`) VALUES
(3, 'LAODE MUH ZULFARDINSYAH', '10', 'Tidak', '7602012104650001', '2', '20-Mar-2021'),
(4, 'Nama Sendiri', '10', 'Ya', '7602012104650001', '2', '20-Mar-2021');

-- --------------------------------------------------------

--
-- Table structure for table `permohonan_pinjaman`
--

CREATE TABLE `permohonan_pinjaman` (
  `id_perpinjaman` int(11) NOT NULL,
  `nama` varchar(500) NOT NULL,
  `nokk` varchar(500) NOT NULL,
  `alamat` varchar(500) NOT NULL,
  `nik` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `nohp` varchar(500) NOT NULL,
  `jmlpengajuan` varchar(500) NOT NULL,
  `fotousaha` varchar(500) NOT NULL,
  `fotoketusaha` varchar(500) NOT NULL,
  `tanggal` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `permohonan_pinjaman`
--

INSERT INTO `permohonan_pinjaman` (`id_perpinjaman`, `nama`, `nokk`, `alamat`, `nik`, `email`, `nohp`, `jmlpengajuan`, `fotousaha`, `fotoketusaha`, `tanggal`) VALUES
(10, 'LAODE MUH ZULFARDINSYAH', '7602012104650001', 'galesong utara', '7602012104650001', 'laode@gmail.com', '085240330927', '1', '2020210928thBerkas Permohonan.pdf', '2020210928thakun simpkb_LAODE.pdf', '20-Mar-2021');

-- --------------------------------------------------------

--
-- Table structure for table `profil`
--

CREATE TABLE `profil` (
  `id_profil` int(10) NOT NULL,
  `isiprofil` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profil`
--

INSERT INTO `profil` (`id_profil`, `isiprofil`) VALUES
(1, '<p>Visi misi di isi disni</p>\r\n'),
(2, '2003202108213519032021060338Struktur_2019-03-27-11-49-29_SOTK-LIPI---2019-.jpg'),
(3, '<p style=\"text-align:center\"><strong>SUSUNAN PENGURUS BADAN USAHA MILIK DESA</strong></p>\r\n\r\n<p style=\"text-align:center\"><strong>(BUMDes) &ldquo;BAJI PA&rsquo;MAI&rdquo;</strong></p>\r\n\r\n<p style=\"text-align:center\"><strong>DESA TAMALATE KEC. GALESONG UTARA KAB. TAKALAR</strong></p>\r\n\r\n<p><br />\r\nKOMISARIS&nbsp; &nbsp; &nbsp; &nbsp; : KEPALA DESA<br />\r\nPENGAWAS&nbsp; &nbsp; &nbsp; &nbsp;: BPD DESA TAMALATE<br />\r\nKETUA&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : SUMAWATI, S.Ag<br />\r\nWAKIL KETUA&nbsp;&nbsp; &nbsp;: MUH NUR KHAER AHMAD<br />\r\nSEKRETARIS&nbsp; &nbsp; &nbsp;: HIJAR<br />\r\nBENDAHARA&nbsp; &nbsp; &nbsp;: BUDAYA<br />\r\nANGGOTA&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : 1. KEPALA UNIT USAHA SPP : SAHARIA<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 2. KEPALA UNIT USAHA UMUM : NURAENI&nbsp;&nbsp; &nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Link <a href=\"https://drive.google.com/file/d/1VWAjWfjdoDm4hdPlGmz5KfPu_knL6KIV/view?usp=sharing\" target=\"_blank\">Download SK Disini</a></p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` char(4) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `level` enum('Administrator','Sapras','TKJ','TAV','TPHP','TBSM','TKR','TLAS','DPIB') NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `nama_lengkap`, `level`, `gambar`) VALUES
('1', 'admin', '66b65567cedbc743bda3417fb813b9ba', 'admin', 'Administrator', '2003202115222896686852_2978769578877591_8410887008976633856_n.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id_kegiatan`);

--
-- Indexes for table `kerjasama`
--
ALTER TABLE `kerjasama`
  ADD PRIMARY KEY (`id_kerjasama`);

--
-- Indexes for table `pelunasan_pinjaman`
--
ALTER TABLE `pelunasan_pinjaman`
  ADD PRIMARY KEY (`id_pelunasan`);

--
-- Indexes for table `permohonan_pinjaman`
--
ALTER TABLE `permohonan_pinjaman`
  ADD PRIMARY KEY (`id_perpinjaman`);

--
-- Indexes for table `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`id_profil`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id_kegiatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `kerjasama`
--
ALTER TABLE `kerjasama`
  MODIFY `id_kerjasama` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pelunasan_pinjaman`
--
ALTER TABLE `pelunasan_pinjaman`
  MODIFY `id_pelunasan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `permohonan_pinjaman`
--
ALTER TABLE `permohonan_pinjaman`
  MODIFY `id_perpinjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `profil`
--
ALTER TABLE `profil`
  MODIFY `id_profil` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
