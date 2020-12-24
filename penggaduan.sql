-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2018 at 06:11 PM
-- Server version: 5.5.39
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pengaduanakpol`
--

-- --------------------------------------------------------

--
-- Table structure for table `cover`
--

CREATE TABLE IF NOT EXISTS `cover` (
  `id_cover` int(15) DEFAULT NULL,
  `cover` varchar(50) DEFAULT NULL,
  `tittle` varchar(50) DEFAULT NULL,
  `waktu` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cover`
--

INSERT INTO `cover` (`id_cover`, `cover`, `tittle`, `waktu`) VALUES
(1519716498, 'ranu1519716498.jpg', 'Hj Nina Kurniasih', '2018-02-27');

-- --------------------------------------------------------

--
-- Table structure for table `info_akpol`
--

CREATE TABLE IF NOT EXISTS `info_akpol` (
  `id` int(15) NOT NULL,
  `info` text,
  `tema` text NOT NULL,
  `tanggal_info` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `gambar` varchar(50) NOT NULL,
  `link` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `info_akpol`
--

INSERT INTO `info_akpol` (`id`, `info`, `tema`, `tanggal_info`, `gambar`, `link`) VALUES
(1518292110, 'Masyarakat Desa Jagabaya Kabupaten Bogor memblokade jalan raya Jagabaya akibat jalan yang rusak parah, Senin (25/12/2017).\r\n\r\nTuntuan masyarakat hanya ingin pemerintah setempat memperbaiki jalan raya yang sudah bertahun-tahun dibiarkan rusak parah sehingga menghambat aktivitas warga setempat.\r\n\r\nMenurut juru bicara bicara masyarakat setempat, Dwi Cahyo dan Ishak, masyarakat hanya menuntut perbaikan jalan yang merupakan jalan provisi di wilayah Parung Panjang Kabupaten Bogor.\r\n\r\n"Kami hanya menuntut agar jalan provinsi Parung Panjang ini dilakukan pengecoran sehingga awet dan tidak mudah hancur dengan kendaraan truk yang setiap hari lewat. Masyarakat di wilayah ini jelas terganggu aktivitasnya akibat jalan rusak parah," ungkap Dwi Cahyo.\r\n\r\nMenurut masyarakat, jalan rusak sudah dua tahun, namun sebelumnya, setiap diperbaiki, tidak ada satu tahun, jalan kembali rusak parah. Karena itulah, masyarakat minta pemerintah kabupaten untuk melakukan pengecoran supaya jalan tetap kuat.\r\n\r\nSementara Ishak mengatakan masyarakat Desa Jagabaya Kabupaten Bogor bakal melakukan pengblokadean jika  pemerintah kabupaten setempat tidak menghiraukan permintaan masyarakat.\r\n\r\n"Kami akan melakukan blokade jalan jika aspirasi kami tidak diperhatikan. Kami ingin jalan provinsi ini dilakukan pengecoran supaya tahan dengan kendaraan besar," tandasnya.\r\n\r\nMasyarakat Desa Jagabaya Kabupaten Bogor sempat melakukan konvoi ke kantor kecamatan Parung Panjang.\r\n\r\nAkibatnya adanya pemblokadean jalan,  Polsek Parung Panjang turun tangan untuk menengahi permintaan masyarakat tersebut.                    ', 'Masyarakat Desa Jagabaya Kabupaten Bogor Blokade Jalan', '2018-03-09 21:04:05', 'admin1518292110.jpg', '#'),
(1518296522, 'Sekretaris Camat didampingin, Bapak Egi Gunadhi Wibhawa, dalam melakukan pembukaan sosialisai Penyuluhan Pencagahan Dan Penanganan Kenakalan Remaja Dan Bahaya Penyalahgunaan Narkoba, yang dilaksanakan di Aula Kantor Kecamatan Parungpanjang,', 'PENYULUHAN PENCEGAHAN DAN PENANGANAN KENAKALAN REMAJA', '2018-03-10 21:02:02', 'admin1518296521.JPG', '');

-- --------------------------------------------------------

--
-- Table structure for table `jawaban`
--

CREATE TABLE IF NOT EXISTS `jawaban` (
  `id_laporan` char(10) DEFAULT NULL,
  `id_admin` char(10) DEFAULT NULL,
  `jawaban` text,
  `waktu` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jawaban`
--

INSERT INTO `jawaban` (`id_laporan`, `id_admin`, `jawaban`, `waktu`) VALUES
('1520096624', '1517819648', '                    ok', '2018-03-03 17:08:45'),
('1520174220', '1517819648', '                    ok gan', '2018-03-04 14:37:50'),
('1520220703', '1517819648', '                    Ok saya akan segera ke tindak lanjuti', '2018-03-05 03:37:42');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_laporan`
--

CREATE TABLE IF NOT EXISTS `jenis_laporan` (
  `id_jenis` char(50) NOT NULL,
  `Jenis` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_laporan`
--

INSERT INTO `jenis_laporan` (`id_jenis`, `Jenis`) VALUES
('1519014176', 'Bencana'),
('1519016937', 'Infrastruktur'),
('1519611797', 'Sarana dan Prasarana'),
('1519611816', 'Kriminal'),
('1519632403', 'Pencurian'),
('1519632422', 'Kecelakaan');

-- --------------------------------------------------------

--
-- Table structure for table `laporan`
--

CREATE TABLE IF NOT EXISTS `laporan` (
  `id_laporan` char(10) NOT NULL,
  `id_client` char(10) DEFAULT NULL,
  `Jenis_Laporan` char(50) DEFAULT NULL,
  `Subjek` varchar(50) NOT NULL,
  `Laporan` text,
  `Jawaban` text NOT NULL,
  `tanggal_lapor` date NOT NULL,
  `Status` enum('Sudah Dibaca','Belum Dibaca','DiTutup') DEFAULT NULL,
  `Bukti` varchar(50) DEFAULT NULL,
  `status_keadaan` enum('1','0') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laporan`
--

INSERT INTO `laporan` (`id_laporan`, `id_client`, `Jenis_Laporan`, `Subjek`, `Laporan`, `Jawaban`, `tanggal_lapor`, `Status`, `Bukti`, `status_keadaan`) VALUES
('1520096624', '1520095877', '1519014176', 'kebakaran', '<p>ada kebakaran</p>', '                    ok', '2018-02-03', 'DiTutup', NULL, '0'),
('1520174220', '1520095877', '1519611797', 'Kebakaran ', '<p>ada kebakaran coy</p>', '                    ok gan', '2018-03-04', 'Sudah Dibaca', NULL, '1'),
('1520220703', '1520220696', '1519014176', 'Kebakaran', '<p>Ada kebakaran di jalan tanjung selatan</p>', '                    Ok saya akan segera ke tindak lanjuti', '2018-03-05', 'Sudah Dibaca', 'uji1520220772.png', '1');

--
-- Triggers `laporan`
--
DELIMITER //
CREATE TRIGGER `jawaban` AFTER UPDATE ON `laporan`
 FOR EACH ROW INSERT INTO jawaban SET 
	id_laporan=old.id_laporan,
	`jawaban`=new.`jawaban`, 
	waktu=now()
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `profil_akpol`
--

CREATE TABLE IF NOT EXISTS `profil_akpol` (
  `Nama_instansi` varchar(50) NOT NULL,
  `Visi_misi` text NOT NULL,
  `No_hp` varchar(13) NOT NULL,
  `website` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profil_akpol`
--

INSERT INTO `profil_akpol` (`Nama_instansi`, `Visi_misi`, `No_hp`, `website`) VALUES
('PARUNG PANJANG', '<p><u>Visi</u><br><br>Menciptakan pemerintahan desa yang bersih, solid, tertib, bijak, kondusif dan bermartabat<br><br><u>Misi</u><br><br>1.  &nbsp; &nbsp;  Bangkit dan bekerja<br>2.  &nbsp; &nbsp;  Membangun bersama agar desa Parungpanjang menjadi lebih baik, lebih maju dan lebih sejahtera secara merata<br>3.  &nbsp; &nbsp;  Serta menciptakan suasana kerukunan, kekeluargaan dan persaudaraan yang harmonis dan dinamis<br></p>', '089507626758', 'parungpanjang.co.id');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` char(10) NOT NULL,
  `Nama` varchar(20) DEFAULT NULL,
  `Alamat` text,
  `Email` varchar(20) DEFAULT NULL,
  `Nohp` char(13) DEFAULT NULL,
  `Jenis_Kelamin` enum('Laki-Laki','Perempuan') DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `sandi` varchar(50) NOT NULL,
  `level` enum('Client','Admin') DEFAULT NULL,
  `status` char(2) NOT NULL,
  `status_keadaan` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `Nama`, `Alamat`, `Email`, `Nohp`, `Jenis_Kelamin`, `username`, `password`, `sandi`, `level`, `status`, `status_keadaan`) VALUES
('1517819648', 'Ranu pirmansyah', 'Bogor', 'ranu@gmail.com', '(089) 507-172', 'Laki-Laki', 'ranu', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'Admin', '1', '1'),
('1519721280', 'Jaka', 'Bogor', 'jak@gmail.com', '087217177819', 'Laki-Laki', 'jaka', '9d83066da00b7c7fa9de34117f488653', 'jaka', 'Client', '0', '0'),
('1520095877', 'ucup', 'Bogor', 'ucup@gmail.com', '089271888', 'Laki-Laki', 'ucup', '1e17778d0d8217b035daffba02c06054', 'ucup', 'Client', '0', '1'),
('1520161544', 'udin', 'bogor', 'udin@gmail.com', '087217718818', 'Laki-Laki', 'udin', '398aa60d5a7e93438f4d172687f1583a', 'ucuin', 'Client', '1', '1'),
('1520161730', 'kita', 'Bogor', 'kita@gmail.com', '089182181', 'Laki-Laki', 'kita', '6076173423b73340576f830474030f42', 'kita', 'Admin', '0', '1'),
('1520220696', 'ranu ji', 'Bogor Parungpanjang', 'ranu@gmail.com', '089507626758', 'Laki-Laki', 'uji', '33efc1b29076ff76df1fbe545de4c2b1', 'uji', 'Client', '1', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jawaban`
--
ALTER TABLE `jawaban`
 ADD KEY `id_laporan` (`id_laporan`), ADD KEY `id_admin` (`id_admin`);

--
-- Indexes for table `jenis_laporan`
--
ALTER TABLE `jenis_laporan`
 ADD PRIMARY KEY (`id_jenis`), ADD KEY `id_jenis` (`id_jenis`);

--
-- Indexes for table `laporan`
--
ALTER TABLE `laporan`
 ADD PRIMARY KEY (`id_laporan`), ADD KEY `Jenis_Laporan` (`Jenis_Laporan`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD KEY `id` (`id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jawaban`
--
ALTER TABLE `jawaban`
ADD CONSTRAINT `jawaban_ibfk_2` FOREIGN KEY (`id_admin`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `jawaban_ibfk_3` FOREIGN KEY (`id_laporan`) REFERENCES `laporan` (`id_laporan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `laporan`
--
ALTER TABLE `laporan`
ADD CONSTRAINT `laporan_ibfk_1` FOREIGN KEY (`Jenis_Laporan`) REFERENCES `jenis_laporan` (`id_jenis`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
