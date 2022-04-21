-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 27, 2018 at 08:24 AM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `perpus`
--

-- --------------------------------------------------------

--
-- Table structure for table `identitas`
--

CREATE TABLE IF NOT EXISTS `identitas` (
  `id_identitas` int(5) NOT NULL AUTO_INCREMENT,
  `nama_aplikasi` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tlp` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `denda` varchar(10) NOT NULL,
  PRIMARY KEY (`id_identitas`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `identitas`
--

INSERT INTO `identitas` (`id_identitas`, `nama_aplikasi`, `email`, `tlp`, `alamat`, `denda`) VALUES
(1, 'Aneka Perpus', 'aneka_web@yahoo.co.id', '085694871343', 'Kalibata Selatan 1b No. 36', '1500');

-- --------------------------------------------------------

--
-- Table structure for table `katalogbuku`
--

CREATE TABLE IF NOT EXISTS `katalogbuku` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `judul` varchar(250) NOT NULL,
  `pengarang` varchar(250) NOT NULL,
  `th_terbit` varchar(4) NOT NULL,
  `kd_penerbit` char(4) NOT NULL,
  `isbn` varchar(25) NOT NULL,
  `kd_kategori` char(4) NOT NULL,
  `jumlah_buku` int(2) NOT NULL,
  `jum_temp` int(4) NOT NULL,
  `rak_buku` varchar(50) NOT NULL,
  `tgl_masuk` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `katalogbuku`
--

INSERT INTO `katalogbuku` (`id`, `judul`, `pengarang`, `th_terbit`, `kd_penerbit`, `isbn`, `kd_kategori`, `jumlah_buku`, `jum_temp`, `rak_buku`, `tgl_masuk`) VALUES
(1, 'Al-Quranku Keren: Al-Kafirun - Menghargai Perbedaan Agama', 'Bambang Q-Anees', '2010', 'P08', '9789793782270', 'K01', 40, 39, 'Agama Islam', '2018-09-05'),
(2, 'Kamus Agama Islam (Kamus Bergambar)', 'Pipin Asropudin', ' 201', 'P06', '9789790272859', 'K01', 25, 25, 'Agama Islam', '2018-09-05'),
(3, 'Gerbang Agama-Agama Nusantara', 'Rusmin Tumanggor', '2017', 'P02', '9786029402858', 'K01', 23, 23, 'Agama Islam', '2018-09-27'),
(4, 'Persaudaraan Agama-Agama', 'Waryono Abdul Ghafur', '2016', 'P03', '9786024410049', 'K01', 23, 22, 'Agama Islam', '2018-09-27'),
(5, 'Membangun Peradaban Indonesia', 'Firdaus Syam', '2016', 'P09', '9789790771178', 'K03', 15, 15, 'Bahasa Indonesia', '2018-09-27');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `kd_kategori` char(3) NOT NULL,
  `nm_kategori` varchar(50) NOT NULL,
  PRIMARY KEY (`kd_kategori`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`kd_kategori`, `nm_kategori`) VALUES
('K01', 'Agama Islam'),
('K02', 'Matematika'),
('K03', 'Bahasa Indonesia'),
('K04', 'Bahasa Inggris'),
('K05', 'Ekonomi'),
('K06', 'Fisika'),
('K07', 'Sosiologi'),
('K08', 'Sejarah'),
('K09', 'Biologi'),
('K10', 'Geografi'),
('K11', 'Kimia'),
('K12', 'Pemograman Android'),
('K13', 'Pemograman Web'),
('K14', 'Pemograman Desktop'),
('K15', 'Komputer'),
('K16', 'Jaringan Komputer'),
('K17', 'Rekayasa Perangkat Lunak'),
('K18', 'Sistem Informasi');

-- --------------------------------------------------------

--
-- Table structure for table `penerbit`
--

CREATE TABLE IF NOT EXISTS `penerbit` (
  `kd_penerbit` char(3) NOT NULL,
  `nm_penerbit` varchar(30) NOT NULL,
  PRIMARY KEY (`kd_penerbit`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penerbit`
--

INSERT INTO `penerbit` (`kd_penerbit`, `nm_penerbit`) VALUES
('P01', 'Erlangga'),
('P02', 'Komunitas Bambu '),
('P03', 'Mizan'),
('P04', 'Elex Media Komputindo'),
('P05', 'Republika '),
('P06', 'Titian Ilmu'),
('P08', 'Simbiosa Rekatama Media'),
('P09', 'Gema Insani');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE IF NOT EXISTS `siswa` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `nisn` varchar(20) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `jk` varchar(10) NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id`, `nisn`, `nama`, `jk`, `kelas`, `tanggal_lahir`, `alamat`) VALUES
(1, '2018000001', 'Dedi Apriadi', 'Laki-laki', 'X RPL 1', '2004-06-07', 'Jl. Kalibata Selatan 1b'),
(2, '2018000002', 'Deni Putra', 'Laki-laki', 'X RPL 1', '2008-03-01', 'Ps. Minggu'),
(3, '2018000003', 'Suhendar', 'Laki laki', 'X RPL 1', '2009-05-05', 'Kalibata Selatan');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE IF NOT EXISTS `transaksi` (
  `no_pinjam` char(6) NOT NULL,
  `judul` varchar(250) NOT NULL,
  `nisn` varchar(20) NOT NULL,
  `tgl_pinjam` varchar(15) NOT NULL,
  `tgl_kembali` varchar(15) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`no_pinjam`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`no_pinjam`, `judul`, `nisn`, `tgl_pinjam`, `tgl_kembali`, `status`) VALUES
('TP0001', 'Al-Quranku Keren: Al-Kafirun - Menghargai Perbedaan Agama', '2018000001', '27-09-2018', '04-10-2018', 'Pinjam'),
('TP0002', 'Persaudaraan Agama-Agama', '2018000002', '27-09-2018', '04-10-2018', 'Pinjam');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` enum('Administrator','Karyawan') NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `telp` varchar(20) NOT NULL,
  `gender` enum('Laki laki','Perempuan') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`, `level`, `alamat`, `telp`, `gender`) VALUES
(1, 'Anekaweb', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator', 'Kalibata Selatan 1b', '085694871343', 'Laki laki');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
