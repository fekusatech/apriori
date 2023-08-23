-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 27, 2023 at 06:48 AM
-- Server version: 5.7.40-log
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `db_fastwork`
--

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `idartikel` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `slug` varchar(50) NOT NULL,
  `isi` longtext NOT NULL,
  `cover` varchar(100) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` enum('aktif','nonaktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`idartikel`, `judul`, `slug`, `isi`, `cover`, `time`, `status`) VALUES
(2, 'Book Cover Deisgn Revolusi', 'book-cover-deisgn-revolusi', '<p>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Cras ultricies ligula sed magna dictum porta. Curabitur aliquet quam id dui posuere blandit. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar quam id dui posuere blandit.\r\n\r\nCurabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Donec rutrum congue leo eget malesuada. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Donec sollicitudin molestie malesuada.</p>', 'post-5.jpg', '2021-06-23 21:16:25', 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `idcart` int(11) NOT NULL,
  `idpembeli` int(11) NOT NULL,
  `idproduk` int(11) NOT NULL,
  `durasi` int(11) NOT NULL,
  `waktu_order` datetime DEFAULT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `confidence`
--

CREATE TABLE `confidence` (
  `kombinasi1` varchar(255) DEFAULT NULL,
  `kombinasi2` varchar(255) DEFAULT NULL,
  `support_xUy` double DEFAULT NULL,
  `support_x` double DEFAULT NULL,
  `confidence` double DEFAULT NULL,
  `lolos` tinyint(4) DEFAULT NULL,
  `min_support` double DEFAULT NULL,
  `min_confidence` double DEFAULT NULL,
  `nilai_uji_lift` double DEFAULT NULL,
  `korelasi_rule` varchar(100) DEFAULT NULL,
  `id_process` int(11) NOT NULL DEFAULT '0',
  `jumlah_a` int(11) DEFAULT NULL,
  `jumlah_b` int(11) DEFAULT NULL,
  `jumlah_ab` int(11) DEFAULT NULL,
  `px` double DEFAULT NULL,
  `py` double DEFAULT NULL,
  `pxuy` double DEFAULT NULL,
  `from_itemset` int(11) DEFAULT NULL COMMENT 'dari itemset 2/3'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `confidence`
--

INSERT INTO `confidence` (`kombinasi1`, `kombinasi2`, `support_xUy`, `support_x`, `confidence`, `lolos`, `min_support`, `min_confidence`, `nilai_uji_lift`, `korelasi_rule`, `id_process`, `jumlah_a`, `jumlah_b`, `jumlah_ab`, `px`, `py`, `pxuy`, `from_itemset`) VALUES
('Antonio Banderas', 'Fantasy', 17.857142857143, 33.928571428571, 52.631578947369, 1, 10, 30, 1.4736842105263, 'korelasi positif', 12, 19, 20, 10, 0.33928571428571, 0.35714285714286, 0.17857142857143, 2),
('Fantasy', 'Antonio Banderas', 17.857142857143, 35.714285714286, 50, 1, 10, 30, 1.4736842105263, 'korelasi positif', 12, 20, 19, 10, 0.35714285714286, 0.33928571428571, 0.17857142857143, 2),
('Fantasy', '1000 Bunga', 17.857142857143, 35.714285714286, 50, 1, 10, 30, 1.4, 'korelasi positif', 12, 20, 20, 10, 0.35714285714286, 0.35714285714286, 0.17857142857143, 2),
('1000 Bunga', 'Fantasy', 17.857142857143, 35.714285714286, 50, 1, 10, 30, 1.4, 'korelasi positif', 12, 20, 20, 10, 0.35714285714286, 0.35714285714286, 0.17857142857143, 2),
('Antonio Banderas', 'Fantasy', 17.857142857143, 33.928571428571, 52.631578947369, 1, 10, 30, 1.4736842105263, 'korelasi positif', 13, 19, 20, 10, 0.33928571428571, 0.35714285714286, 0.17857142857143, 2),
('Fantasy', 'Antonio Banderas', 17.857142857143, 35.714285714286, 50, 1, 10, 30, 1.4736842105263, 'korelasi positif', 13, 20, 19, 10, 0.35714285714286, 0.33928571428571, 0.17857142857143, 2),
('Fantasy', '1000 Bunga', 17.857142857143, 35.714285714286, 50, 1, 10, 30, 1.4, 'korelasi positif', 13, 20, 20, 10, 0.35714285714286, 0.35714285714286, 0.17857142857143, 2),
('1000 Bunga', 'Fantasy', 17.857142857143, 35.714285714286, 50, 1, 10, 30, 1.4, 'korelasi positif', 13, 20, 20, 10, 0.35714285714286, 0.35714285714286, 0.17857142857143, 2),
('Antonio Banderas', 'Fantasy', 17.857142857143, 33.928571428571, 52.631578947369, 1, 10, 30, 1.4736842105263, 'korelasi positif', 14, 19, 20, 10, 0.33928571428571, 0.35714285714286, 0.17857142857143, 2),
('Fantasy', 'Antonio Banderas', 17.857142857143, 35.714285714286, 50, 1, 10, 30, 1.4736842105263, 'korelasi positif', 14, 20, 19, 10, 0.35714285714286, 0.33928571428571, 0.17857142857143, 2),
('Fantasy', '1000 Bunga', 17.857142857143, 35.714285714286, 50, 1, 10, 30, 1.4, 'korelasi positif', 14, 20, 20, 10, 0.35714285714286, 0.35714285714286, 0.17857142857143, 2),
('1000 Bunga', 'Fantasy', 17.857142857143, 35.714285714286, 50, 1, 10, 30, 1.4, 'korelasi positif', 14, 20, 20, 10, 0.35714285714286, 0.35714285714286, 0.17857142857143, 2),
('Antonio Banderas', 'Fantasy', 17.857142857143, 33.928571428571, 52.631578947369, 1, 10, 30, 1.4736842105263, 'korelasi positif', 15, 19, 20, 10, 0.33928571428571, 0.35714285714286, 0.17857142857143, 2),
('Fantasy', 'Antonio Banderas', 17.857142857143, 35.714285714286, 50, 1, 10, 30, 1.4736842105263, 'korelasi positif', 15, 20, 19, 10, 0.35714285714286, 0.33928571428571, 0.17857142857143, 2),
('Fantasy', '1000 Bunga', 17.857142857143, 35.714285714286, 50, 1, 10, 30, 1.4, 'korelasi positif', 15, 20, 20, 10, 0.35714285714286, 0.35714285714286, 0.17857142857143, 2),
('1000 Bunga', 'Fantasy', 17.857142857143, 35.714285714286, 50, 1, 10, 30, 1.4, 'korelasi positif', 15, 20, 20, 10, 0.35714285714286, 0.35714285714286, 0.17857142857143, 2),
('Antonio Banderas', 'Fantasy', 17.857142857143, 33.928571428571, 52.631578947369, 1, 10, 30, 1.4736842105263, 'korelasi positif', 16, 19, 20, 10, 0.33928571428571, 0.35714285714286, 0.17857142857143, 2),
('Fantasy', 'Antonio Banderas', 17.857142857143, 35.714285714286, 50, 1, 10, 30, 1.4736842105263, 'korelasi positif', 16, 20, 19, 10, 0.35714285714286, 0.33928571428571, 0.17857142857143, 2),
('Fantasy', '1000 Bunga', 17.857142857143, 35.714285714286, 50, 1, 10, 30, 1.4, 'korelasi positif', 16, 20, 20, 10, 0.35714285714286, 0.35714285714286, 0.17857142857143, 2),
('1000 Bunga', 'Fantasy', 17.857142857143, 35.714285714286, 50, 1, 10, 30, 1.4, 'korelasi positif', 16, 20, 20, 10, 0.35714285714286, 0.35714285714286, 0.17857142857143, 2);

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE `config` (
  `id_config` int(11) NOT NULL,
  `nama` varchar(254) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nohp` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `no_rek` varchar(100) DEFAULT NULL,
  `pemilik_rek` varchar(100) DEFAULT NULL,
  `bank_rek` varchar(100) DEFAULT NULL,
  `foto_rek` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`id_config`, `nama`, `email`, `nohp`, `alamat`, `no_rek`, `pemilik_rek`, `bank_rek`, `foto_rek`) VALUES
(1, 'GEDUNG PUTRA SOLO', 'puterasolodpp@gmail.com', '0813-6234-6171', 'Jl. Madiosantoso No. 155 A. P.Brayan Darat I Medan', '123455678', 'Admin', 'BCA', 'rekening-BCA.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE `data` (
  `data_id` int(11) NOT NULL,
  `data_tanggal` varchar(100) NOT NULL,
  `data_keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`data_id`, `data_tanggal`, `data_keterangan`) VALUES
(2, '1/2/2022', 'Roti coklat seres, roti durian, roti keju, roti abon gulung, roti butter coklat');

-- --------------------------------------------------------

--
-- Table structure for table `itemset1`
--

CREATE TABLE `itemset1` (
  `atribut` varchar(200) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `support` double DEFAULT NULL,
  `lolos` tinyint(4) DEFAULT NULL,
  `id_process` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `itemset1`
--

INSERT INTO `itemset1` (`atribut`, `jumlah`, `support`, `lolos`, `id_process`) VALUES
('Blue Desire Kw 1', 14, 25, 1, 12),
('Malaikat Subuh', 18, 32.142857142857, 1, 12),
('Harajuku Lovers', 3, 5.3571428571429, 0, 12),
('Antonio Banderas', 19, 33.928571428571, 1, 12),
('Butterfly', 8, 14.285714285714, 0, 12),
('Kenzo In Bali', 10, 17.857142857143, 1, 12),
('Lovely Kw 1', 17, 30.357142857143, 1, 12),
('Exotic Unisex', 4, 7.1428571428571, 0, 12),
('Strawberry', 2, 3.5714285714286, 0, 12),
('Vip For Him', 7, 12.5, 0, 12),
('Melati', 20, 35.714285714286, 1, 12),
('Cool Water Man', 12, 21.428571428571, 1, 12),
('Dolly Girl', 6, 10.714285714286, 0, 12),
('Bulgary Pour Homme Soir', 5, 8.9285714285714, 0, 12),
('Jaguar Vision Kw 1', 3, 5.3571428571429, 0, 12),
('Silver', 17, 30.357142857143, 1, 12),
('Cool Water Man Kw 1', 10, 17.857142857143, 1, 12),
('Heavenly Kiss', 3, 5.3571428571429, 0, 12),
('Vintage', 2, 3.5714285714286, 0, 12),
('Cool Water Lady', 3, 5.3571428571429, 0, 12),
('Aqua Blue Edition Kw 1', 5, 8.9285714285714, 0, 12),
('Aqua Digio Blue Kw 1', 4, 7.1428571428571, 0, 12),
('Bulgary Extreme Kw 1', 17, 30.357142857143, 1, 12),
('Fantasy', 20, 35.714285714286, 1, 12),
('1000 Bunga', 20, 35.714285714286, 1, 12),
('Blue Emotion Kw 1', 20, 35.714285714286, 1, 12),
('Lucious Pink', 5, 8.9285714285714, 0, 12),
('Boss Energise', 3, 5.3571428571429, 0, 12),
('Bubble Gum', 11, 19.642857142857, 1, 12),
('Jimmy Choo Man', 1, 1.7857142857143, 0, 12),
('Essential Sport', 1, 1.7857142857143, 0, 12),
('Bellagio', 4, 7.1428571428571, 0, 12),
('Jovan', 7, 12.5, 0, 12),
('Adidas Fair Play', 6, 10.714285714286, 0, 12),
('White Musk', 6, 10.714285714286, 0, 12),
('Ferrari Man In Red Kw 1', 4, 7.1428571428571, 0, 12),
('Vanilla', 11, 19.642857142857, 1, 12),
('Legend', 1, 1.7857142857143, 0, 12),
('Sexy Gravity', 11, 19.642857142857, 1, 12),
('Chic For Man Kw 1', 1, 1.7857142857143, 0, 12),
('Aigner Black', 5, 8.9285714285714, 0, 12),
('Kasturi Musk', 3, 5.3571428571429, 0, 12),
('Cobra', 1, 1.7857142857143, 0, 12),
('Boss Orange', 4, 7.1428571428571, 0, 12),
('212 Sexy Man', 5, 8.9285714285714, 0, 12),
('Jean Paul Gaultier', 1, 1.7857142857143, 0, 12),
('Gahroudh', 1, 1.7857142857143, 0, 12),
('Charly Silver', 2, 3.5714285714286, 0, 12),
('Eternity Lady', 2, 3.5714285714286, 0, 12),
('Blue Emotion Kw1', 1, 1.7857142857143, 0, 12),
('Sedap Malam', 2, 3.5714285714286, 0, 12),
('Fantasy Kw 1', 1, 1.7857142857143, 0, 12),
('Happy Clinique Woman', 1, 1.7857142857143, 0, 12),
('Christiano Ronaldo', 1, 1.7857142857143, 0, 12),
('Blue Desire Kw 1', 14, 25, 1, 13),
('Malaikat Subuh', 18, 32.142857142857, 1, 13),
('Harajuku Lovers', 3, 5.3571428571429, 0, 13),
('Antonio Banderas', 19, 33.928571428571, 1, 13),
('Butterfly', 8, 14.285714285714, 0, 13),
('Kenzo In Bali', 10, 17.857142857143, 1, 13),
('Lovely Kw 1', 17, 30.357142857143, 1, 13),
('Exotic Unisex', 4, 7.1428571428571, 0, 13),
('Strawberry', 2, 3.5714285714286, 0, 13),
('Vip For Him', 7, 12.5, 0, 13),
('Melati', 20, 35.714285714286, 1, 13),
('Cool Water Man', 12, 21.428571428571, 1, 13),
('Dolly Girl', 6, 10.714285714286, 0, 13),
('Bulgary Pour Homme Soir', 5, 8.9285714285714, 0, 13),
('Jaguar Vision Kw 1', 3, 5.3571428571429, 0, 13),
('Silver', 17, 30.357142857143, 1, 13),
('Cool Water Man Kw 1', 10, 17.857142857143, 1, 13),
('Heavenly Kiss', 3, 5.3571428571429, 0, 13),
('Vintage', 2, 3.5714285714286, 0, 13),
('Cool Water Lady', 3, 5.3571428571429, 0, 13),
('Aqua Blue Edition Kw 1', 5, 8.9285714285714, 0, 13),
('Aqua Digio Blue Kw 1', 4, 7.1428571428571, 0, 13),
('Bulgary Extreme Kw 1', 17, 30.357142857143, 1, 13),
('Fantasy', 20, 35.714285714286, 1, 13),
('1000 Bunga', 20, 35.714285714286, 1, 13),
('Blue Emotion Kw 1', 20, 35.714285714286, 1, 13),
('Lucious Pink', 5, 8.9285714285714, 0, 13),
('Boss Energise', 3, 5.3571428571429, 0, 13),
('Bubble Gum', 11, 19.642857142857, 1, 13),
('Jimmy Choo Man', 1, 1.7857142857143, 0, 13),
('Essential Sport', 1, 1.7857142857143, 0, 13),
('Bellagio', 4, 7.1428571428571, 0, 13),
('Jovan', 7, 12.5, 0, 13),
('Adidas Fair Play', 6, 10.714285714286, 0, 13),
('White Musk', 6, 10.714285714286, 0, 13),
('Ferrari Man In Red Kw 1', 4, 7.1428571428571, 0, 13),
('Vanilla', 11, 19.642857142857, 1, 13),
('Legend', 1, 1.7857142857143, 0, 13),
('Sexy Gravity', 11, 19.642857142857, 1, 13),
('Chic For Man Kw 1', 1, 1.7857142857143, 0, 13),
('Aigner Black', 5, 8.9285714285714, 0, 13),
('Kasturi Musk', 3, 5.3571428571429, 0, 13),
('Cobra', 1, 1.7857142857143, 0, 13),
('Boss Orange', 4, 7.1428571428571, 0, 13),
('212 Sexy Man', 5, 8.9285714285714, 0, 13),
('Jean Paul Gaultier', 1, 1.7857142857143, 0, 13),
('Gahroudh', 1, 1.7857142857143, 0, 13),
('Charly Silver', 2, 3.5714285714286, 0, 13),
('Eternity Lady', 2, 3.5714285714286, 0, 13),
('Blue Emotion Kw1', 1, 1.7857142857143, 0, 13),
('Sedap Malam', 2, 3.5714285714286, 0, 13),
('Fantasy Kw 1', 1, 1.7857142857143, 0, 13),
('Happy Clinique Woman', 1, 1.7857142857143, 0, 13),
('Christiano Ronaldo', 1, 1.7857142857143, 0, 13),
('Blue Desire Kw 1', 14, 25, 1, 14),
('Malaikat Subuh', 18, 32.142857142857, 1, 14),
('Harajuku Lovers', 3, 5.3571428571429, 0, 14),
('Antonio Banderas', 19, 33.928571428571, 1, 14),
('Butterfly', 8, 14.285714285714, 0, 14),
('Kenzo In Bali', 10, 17.857142857143, 1, 14),
('Lovely Kw 1', 17, 30.357142857143, 1, 14),
('Exotic Unisex', 4, 7.1428571428571, 0, 14),
('Strawberry', 2, 3.5714285714286, 0, 14),
('Vip For Him', 7, 12.5, 0, 14),
('Melati', 20, 35.714285714286, 1, 14),
('Cool Water Man', 12, 21.428571428571, 1, 14),
('Dolly Girl', 6, 10.714285714286, 0, 14),
('Bulgary Pour Homme Soir', 5, 8.9285714285714, 0, 14),
('Jaguar Vision Kw 1', 3, 5.3571428571429, 0, 14),
('Silver', 17, 30.357142857143, 1, 14),
('Cool Water Man Kw 1', 10, 17.857142857143, 1, 14),
('Heavenly Kiss', 3, 5.3571428571429, 0, 14),
('Vintage', 2, 3.5714285714286, 0, 14),
('Cool Water Lady', 3, 5.3571428571429, 0, 14),
('Aqua Blue Edition Kw 1', 5, 8.9285714285714, 0, 14),
('Aqua Digio Blue Kw 1', 4, 7.1428571428571, 0, 14),
('Bulgary Extreme Kw 1', 17, 30.357142857143, 1, 14),
('Fantasy', 20, 35.714285714286, 1, 14),
('1000 Bunga', 20, 35.714285714286, 1, 14),
('Blue Emotion Kw 1', 20, 35.714285714286, 1, 14),
('Lucious Pink', 5, 8.9285714285714, 0, 14),
('Boss Energise', 3, 5.3571428571429, 0, 14),
('Bubble Gum', 11, 19.642857142857, 1, 14),
('Jimmy Choo Man', 1, 1.7857142857143, 0, 14),
('Essential Sport', 1, 1.7857142857143, 0, 14),
('Bellagio', 4, 7.1428571428571, 0, 14),
('Jovan', 7, 12.5, 0, 14),
('Adidas Fair Play', 6, 10.714285714286, 0, 14),
('White Musk', 6, 10.714285714286, 0, 14),
('Ferrari Man In Red Kw 1', 4, 7.1428571428571, 0, 14),
('Vanilla', 11, 19.642857142857, 1, 14),
('Legend', 1, 1.7857142857143, 0, 14),
('Sexy Gravity', 11, 19.642857142857, 1, 14),
('Chic For Man Kw 1', 1, 1.7857142857143, 0, 14),
('Aigner Black', 5, 8.9285714285714, 0, 14),
('Kasturi Musk', 3, 5.3571428571429, 0, 14),
('Cobra', 1, 1.7857142857143, 0, 14),
('Boss Orange', 4, 7.1428571428571, 0, 14),
('212 Sexy Man', 5, 8.9285714285714, 0, 14),
('Jean Paul Gaultier', 1, 1.7857142857143, 0, 14),
('Gahroudh', 1, 1.7857142857143, 0, 14),
('Charly Silver', 2, 3.5714285714286, 0, 14),
('Eternity Lady', 2, 3.5714285714286, 0, 14),
('Blue Emotion Kw1', 1, 1.7857142857143, 0, 14),
('Sedap Malam', 2, 3.5714285714286, 0, 14),
('Fantasy Kw 1', 1, 1.7857142857143, 0, 14),
('Happy Clinique Woman', 1, 1.7857142857143, 0, 14),
('Christiano Ronaldo', 1, 1.7857142857143, 0, 14),
('Blue Desire Kw 1', 14, 25, 1, 15),
('Malaikat Subuh', 18, 32.142857142857, 1, 15),
('Harajuku Lovers', 3, 5.3571428571429, 0, 15),
('Antonio Banderas', 19, 33.928571428571, 1, 15),
('Butterfly', 8, 14.285714285714, 0, 15),
('Kenzo In Bali', 10, 17.857142857143, 1, 15),
('Lovely Kw 1', 17, 30.357142857143, 1, 15),
('Exotic Unisex', 4, 7.1428571428571, 0, 15),
('Strawberry', 2, 3.5714285714286, 0, 15),
('Vip For Him', 7, 12.5, 0, 15),
('Melati', 20, 35.714285714286, 1, 15),
('Cool Water Man', 12, 21.428571428571, 1, 15),
('Dolly Girl', 6, 10.714285714286, 0, 15),
('Bulgary Pour Homme Soir', 5, 8.9285714285714, 0, 15),
('Jaguar Vision Kw 1', 3, 5.3571428571429, 0, 15),
('Silver', 17, 30.357142857143, 1, 15),
('Cool Water Man Kw 1', 10, 17.857142857143, 1, 15),
('Heavenly Kiss', 3, 5.3571428571429, 0, 15),
('Vintage', 2, 3.5714285714286, 0, 15),
('Cool Water Lady', 3, 5.3571428571429, 0, 15),
('Aqua Blue Edition Kw 1', 5, 8.9285714285714, 0, 15),
('Aqua Digio Blue Kw 1', 4, 7.1428571428571, 0, 15),
('Bulgary Extreme Kw 1', 17, 30.357142857143, 1, 15),
('Fantasy', 20, 35.714285714286, 1, 15),
('1000 Bunga', 20, 35.714285714286, 1, 15),
('Blue Emotion Kw 1', 20, 35.714285714286, 1, 15),
('Lucious Pink', 5, 8.9285714285714, 0, 15),
('Boss Energise', 3, 5.3571428571429, 0, 15),
('Bubble Gum', 11, 19.642857142857, 1, 15),
('Jimmy Choo Man', 1, 1.7857142857143, 0, 15),
('Essential Sport', 1, 1.7857142857143, 0, 15),
('Bellagio', 4, 7.1428571428571, 0, 15),
('Jovan', 7, 12.5, 0, 15),
('Adidas Fair Play', 6, 10.714285714286, 0, 15),
('White Musk', 6, 10.714285714286, 0, 15),
('Ferrari Man In Red Kw 1', 4, 7.1428571428571, 0, 15),
('Vanilla', 11, 19.642857142857, 1, 15),
('Legend', 1, 1.7857142857143, 0, 15),
('Sexy Gravity', 11, 19.642857142857, 1, 15),
('Chic For Man Kw 1', 1, 1.7857142857143, 0, 15),
('Aigner Black', 5, 8.9285714285714, 0, 15),
('Kasturi Musk', 3, 5.3571428571429, 0, 15),
('Cobra', 1, 1.7857142857143, 0, 15),
('Boss Orange', 4, 7.1428571428571, 0, 15),
('212 Sexy Man', 5, 8.9285714285714, 0, 15),
('Jean Paul Gaultier', 1, 1.7857142857143, 0, 15),
('Gahroudh', 1, 1.7857142857143, 0, 15),
('Charly Silver', 2, 3.5714285714286, 0, 15),
('Eternity Lady', 2, 3.5714285714286, 0, 15),
('Blue Emotion Kw1', 1, 1.7857142857143, 0, 15),
('Sedap Malam', 2, 3.5714285714286, 0, 15),
('Fantasy Kw 1', 1, 1.7857142857143, 0, 15),
('Happy Clinique Woman', 1, 1.7857142857143, 0, 15),
('Christiano Ronaldo', 1, 1.7857142857143, 0, 15),
('Blue Desire Kw 1', 14, 25, 1, 16),
('Malaikat Subuh', 18, 32.142857142857, 1, 16),
('Harajuku Lovers', 3, 5.3571428571429, 0, 16),
('Antonio Banderas', 19, 33.928571428571, 1, 16),
('Butterfly', 8, 14.285714285714, 0, 16),
('Kenzo In Bali', 10, 17.857142857143, 1, 16),
('Lovely Kw 1', 17, 30.357142857143, 1, 16),
('Exotic Unisex', 4, 7.1428571428571, 0, 16),
('Strawberry', 2, 3.5714285714286, 0, 16),
('Vip For Him', 7, 12.5, 0, 16),
('Melati', 20, 35.714285714286, 1, 16),
('Cool Water Man', 12, 21.428571428571, 1, 16),
('Dolly Girl', 6, 10.714285714286, 0, 16),
('Bulgary Pour Homme Soir', 5, 8.9285714285714, 0, 16),
('Jaguar Vision Kw 1', 3, 5.3571428571429, 0, 16),
('Silver', 17, 30.357142857143, 1, 16),
('Cool Water Man Kw 1', 10, 17.857142857143, 1, 16),
('Heavenly Kiss', 3, 5.3571428571429, 0, 16),
('Vintage', 2, 3.5714285714286, 0, 16),
('Cool Water Lady', 3, 5.3571428571429, 0, 16),
('Aqua Blue Edition Kw 1', 5, 8.9285714285714, 0, 16),
('Aqua Digio Blue Kw 1', 4, 7.1428571428571, 0, 16),
('Bulgary Extreme Kw 1', 17, 30.357142857143, 1, 16),
('Fantasy', 20, 35.714285714286, 1, 16),
('1000 Bunga', 20, 35.714285714286, 1, 16),
('Blue Emotion Kw 1', 20, 35.714285714286, 1, 16),
('Lucious Pink', 5, 8.9285714285714, 0, 16),
('Boss Energise', 3, 5.3571428571429, 0, 16),
('Bubble Gum', 11, 19.642857142857, 1, 16),
('Jimmy Choo Man', 1, 1.7857142857143, 0, 16),
('Essential Sport', 1, 1.7857142857143, 0, 16),
('Bellagio', 4, 7.1428571428571, 0, 16),
('Jovan', 7, 12.5, 0, 16),
('Adidas Fair Play', 6, 10.714285714286, 0, 16),
('White Musk', 6, 10.714285714286, 0, 16),
('Ferrari Man In Red Kw 1', 4, 7.1428571428571, 0, 16),
('Vanilla', 11, 19.642857142857, 1, 16),
('Legend', 1, 1.7857142857143, 0, 16),
('Sexy Gravity', 11, 19.642857142857, 1, 16),
('Chic For Man Kw 1', 1, 1.7857142857143, 0, 16),
('Aigner Black', 5, 8.9285714285714, 0, 16),
('Kasturi Musk', 3, 5.3571428571429, 0, 16),
('Cobra', 1, 1.7857142857143, 0, 16),
('Boss Orange', 4, 7.1428571428571, 0, 16),
('212 Sexy Man', 5, 8.9285714285714, 0, 16),
('Jean Paul Gaultier', 1, 1.7857142857143, 0, 16),
('Gahroudh', 1, 1.7857142857143, 0, 16),
('Charly Silver', 2, 3.5714285714286, 0, 16),
('Eternity Lady', 2, 3.5714285714286, 0, 16),
('Blue Emotion Kw1', 1, 1.7857142857143, 0, 16),
('Sedap Malam', 2, 3.5714285714286, 0, 16),
('Fantasy Kw 1', 1, 1.7857142857143, 0, 16),
('Happy Clinique Woman', 1, 1.7857142857143, 0, 16),
('Christiano Ronaldo', 1, 1.7857142857143, 0, 16);

-- --------------------------------------------------------

--
-- Table structure for table `itemset2`
--

CREATE TABLE `itemset2` (
  `atribut1` varchar(200) DEFAULT NULL,
  `atribut2` varchar(200) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `support` double DEFAULT NULL,
  `lolos` tinyint(4) DEFAULT NULL,
  `id_process` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `itemset2`
--

INSERT INTO `itemset2` (`atribut1`, `atribut2`, `jumlah`, `support`, `lolos`, `id_process`) VALUES
('Blue Desire Kw 1', 'Malaikat Subuh', 6, 10.714285714286, 0, 12),
('Blue Desire Kw 1', 'Antonio Banderas', 8, 14.285714285714, 0, 12),
('Blue Desire Kw 1', 'Kenzo In Bali', 5, 8.9285714285714, 0, 12),
('Blue Desire Kw 1', 'Lovely Kw 1', 5, 8.9285714285714, 0, 12),
('Blue Desire Kw 1', 'Melati', 2, 3.5714285714286, 0, 12),
('Blue Desire Kw 1', 'Cool Water Man', 2, 3.5714285714286, 0, 12),
('Blue Desire Kw 1', 'Silver', 4, 7.1428571428571, 0, 12),
('Blue Desire Kw 1', 'Cool Water Man Kw 1', 2, 3.5714285714286, 0, 12),
('Blue Desire Kw 1', 'Bulgary Extreme Kw 1', 7, 12.5, 0, 12),
('Blue Desire Kw 1', 'Fantasy', 7, 12.5, 0, 12),
('Blue Desire Kw 1', '1000 Bunga', 5, 8.9285714285714, 0, 12),
('Blue Desire Kw 1', 'Blue Emotion Kw 1', 6, 10.714285714286, 0, 12),
('Blue Desire Kw 1', 'Bubble Gum', 4, 7.1428571428571, 0, 12),
('Blue Desire Kw 1', 'Vanilla', 1, 1.7857142857143, 0, 12),
('Blue Desire Kw 1', 'Sexy Gravity', 1, 1.7857142857143, 0, 12),
('Malaikat Subuh', 'Antonio Banderas', 9, 16.071428571429, 0, 12),
('Malaikat Subuh', 'Kenzo In Bali', 5, 8.9285714285714, 0, 12),
('Malaikat Subuh', 'Lovely Kw 1', 7, 12.5, 0, 12),
('Malaikat Subuh', 'Melati', 8, 14.285714285714, 0, 12),
('Malaikat Subuh', 'Cool Water Man', 3, 5.3571428571429, 0, 12),
('Malaikat Subuh', 'Silver', 7, 12.5, 0, 12),
('Malaikat Subuh', 'Cool Water Man Kw 1', 2, 3.5714285714286, 0, 12),
('Malaikat Subuh', 'Bulgary Extreme Kw 1', 6, 10.714285714286, 0, 12),
('Malaikat Subuh', 'Fantasy', 6, 10.714285714286, 0, 12),
('Malaikat Subuh', '1000 Bunga', 7, 12.5, 0, 12),
('Malaikat Subuh', 'Blue Emotion Kw 1', 9, 16.071428571429, 0, 12),
('Malaikat Subuh', 'Bubble Gum', 4, 7.1428571428571, 0, 12),
('Malaikat Subuh', 'Vanilla', 3, 5.3571428571429, 0, 12),
('Malaikat Subuh', 'Sexy Gravity', 4, 7.1428571428571, 0, 12),
('Antonio Banderas', 'Kenzo In Bali', 2, 3.5714285714286, 0, 12),
('Antonio Banderas', 'Lovely Kw 1', 8, 14.285714285714, 0, 12),
('Antonio Banderas', 'Melati', 6, 10.714285714286, 0, 12),
('Antonio Banderas', 'Cool Water Man', 4, 7.1428571428571, 0, 12),
('Antonio Banderas', 'Silver', 5, 8.9285714285714, 0, 12),
('Antonio Banderas', 'Cool Water Man Kw 1', 6, 10.714285714286, 0, 12),
('Antonio Banderas', 'Bulgary Extreme Kw 1', 5, 8.9285714285714, 0, 12),
('Antonio Banderas', 'Fantasy', 10, 17.857142857143, 1, 12),
('Antonio Banderas', '1000 Bunga', 7, 12.5, 0, 12),
('Antonio Banderas', 'Blue Emotion Kw 1', 7, 12.5, 0, 12),
('Antonio Banderas', 'Bubble Gum', 6, 10.714285714286, 0, 12),
('Antonio Banderas', 'Vanilla', 2, 3.5714285714286, 0, 12),
('Antonio Banderas', 'Sexy Gravity', 3, 5.3571428571429, 0, 12),
('Kenzo In Bali', 'Lovely Kw 1', 3, 5.3571428571429, 0, 12),
('Kenzo In Bali', 'Melati', 6, 10.714285714286, 0, 12),
('Kenzo In Bali', 'Cool Water Man', 1, 1.7857142857143, 0, 12),
('Kenzo In Bali', 'Silver', 3, 5.3571428571429, 0, 12),
('Kenzo In Bali', 'Cool Water Man Kw 1', 2, 3.5714285714286, 0, 12),
('Kenzo In Bali', 'Bulgary Extreme Kw 1', 6, 10.714285714286, 0, 12),
('Kenzo In Bali', 'Fantasy', 3, 5.3571428571429, 0, 12),
('Kenzo In Bali', '1000 Bunga', 3, 5.3571428571429, 0, 12),
('Kenzo In Bali', 'Blue Emotion Kw 1', 3, 5.3571428571429, 0, 12),
('Kenzo In Bali', 'Bubble Gum', 2, 3.5714285714286, 0, 12),
('Kenzo In Bali', 'Vanilla', 1, 1.7857142857143, 0, 12),
('Kenzo In Bali', 'Sexy Gravity', 1, 1.7857142857143, 0, 12),
('Lovely Kw 1', 'Melati', 7, 12.5, 0, 12),
('Lovely Kw 1', 'Cool Water Man', 3, 5.3571428571429, 0, 12),
('Lovely Kw 1', 'Silver', 2, 3.5714285714286, 0, 12),
('Lovely Kw 1', 'Cool Water Man Kw 1', 2, 3.5714285714286, 0, 12),
('Lovely Kw 1', 'Bulgary Extreme Kw 1', 6, 10.714285714286, 0, 12),
('Lovely Kw 1', 'Fantasy', 7, 12.5, 0, 12),
('Lovely Kw 1', '1000 Bunga', 6, 10.714285714286, 0, 12),
('Lovely Kw 1', 'Blue Emotion Kw 1', 7, 12.5, 0, 12),
('Lovely Kw 1', 'Bubble Gum', 4, 7.1428571428571, 0, 12),
('Lovely Kw 1', 'Vanilla', 2, 3.5714285714286, 0, 12),
('Lovely Kw 1', 'Sexy Gravity', 3, 5.3571428571429, 0, 12),
('Melati', 'Cool Water Man', 6, 10.714285714286, 0, 12),
('Melati', 'Silver', 8, 14.285714285714, 0, 12),
('Melati', 'Cool Water Man Kw 1', 4, 7.1428571428571, 0, 12),
('Melati', 'Bulgary Extreme Kw 1', 6, 10.714285714286, 0, 12),
('Melati', 'Fantasy', 6, 10.714285714286, 0, 12),
('Melati', '1000 Bunga', 6, 10.714285714286, 0, 12),
('Melati', 'Blue Emotion Kw 1', 5, 8.9285714285714, 0, 12),
('Melati', 'Bubble Gum', 3, 5.3571428571429, 0, 12),
('Melati', 'Vanilla', 2, 3.5714285714286, 0, 12),
('Melati', 'Sexy Gravity', 3, 5.3571428571429, 0, 12),
('Cool Water Man', 'Silver', 6, 10.714285714286, 0, 12),
('Cool Water Man', 'Cool Water Man Kw 1', 2, 3.5714285714286, 0, 12),
('Cool Water Man', 'Bulgary Extreme Kw 1', 4, 7.1428571428571, 0, 12),
('Cool Water Man', 'Fantasy', 5, 8.9285714285714, 0, 12),
('Cool Water Man', '1000 Bunga', 4, 7.1428571428571, 0, 12),
('Cool Water Man', 'Blue Emotion Kw 1', 3, 5.3571428571429, 0, 12),
('Cool Water Man', 'Bubble Gum', 0, 0, 0, 12),
('Cool Water Man', 'Vanilla', 3, 5.3571428571429, 0, 12),
('Cool Water Man', 'Sexy Gravity', 1, 1.7857142857143, 0, 12),
('Silver', 'Cool Water Man Kw 1', 5, 8.9285714285714, 0, 12),
('Silver', 'Bulgary Extreme Kw 1', 9, 16.071428571429, 0, 12),
('Silver', 'Fantasy', 8, 14.285714285714, 0, 12),
('Silver', '1000 Bunga', 7, 12.5, 0, 12),
('Silver', 'Blue Emotion Kw 1', 5, 8.9285714285714, 0, 12),
('Silver', 'Bubble Gum', 0, 0, 0, 12),
('Silver', 'Vanilla', 3, 5.3571428571429, 0, 12),
('Silver', 'Sexy Gravity', 4, 7.1428571428571, 0, 12),
('Cool Water Man Kw 1', 'Bulgary Extreme Kw 1', 3, 5.3571428571429, 0, 12),
('Cool Water Man Kw 1', 'Fantasy', 4, 7.1428571428571, 0, 12),
('Cool Water Man Kw 1', '1000 Bunga', 2, 3.5714285714286, 0, 12),
('Cool Water Man Kw 1', 'Blue Emotion Kw 1', 3, 5.3571428571429, 0, 12),
('Cool Water Man Kw 1', 'Bubble Gum', 2, 3.5714285714286, 0, 12),
('Cool Water Man Kw 1', 'Vanilla', 0, 0, 0, 12),
('Cool Water Man Kw 1', 'Sexy Gravity', 0, 0, 0, 12),
('Bulgary Extreme Kw 1', 'Fantasy', 8, 14.285714285714, 0, 12),
('Bulgary Extreme Kw 1', '1000 Bunga', 5, 8.9285714285714, 0, 12),
('Bulgary Extreme Kw 1', 'Blue Emotion Kw 1', 7, 12.5, 0, 12),
('Bulgary Extreme Kw 1', 'Bubble Gum', 2, 3.5714285714286, 0, 12),
('Bulgary Extreme Kw 1', 'Vanilla', 2, 3.5714285714286, 0, 12),
('Bulgary Extreme Kw 1', 'Sexy Gravity', 2, 3.5714285714286, 0, 12),
('Fantasy', '1000 Bunga', 10, 17.857142857143, 1, 12),
('Fantasy', 'Blue Emotion Kw 1', 8, 14.285714285714, 0, 12),
('Fantasy', 'Bubble Gum', 6, 10.714285714286, 0, 12),
('Fantasy', 'Vanilla', 4, 7.1428571428571, 0, 12),
('Fantasy', 'Sexy Gravity', 5, 8.9285714285714, 0, 12),
('1000 Bunga', 'Blue Emotion Kw 1', 4, 7.1428571428571, 0, 12),
('1000 Bunga', 'Bubble Gum', 4, 7.1428571428571, 0, 12),
('1000 Bunga', 'Vanilla', 6, 10.714285714286, 0, 12),
('1000 Bunga', 'Sexy Gravity', 4, 7.1428571428571, 0, 12),
('Blue Emotion Kw 1', 'Bubble Gum', 5, 8.9285714285714, 0, 12),
('Blue Emotion Kw 1', 'Vanilla', 6, 10.714285714286, 0, 12),
('Blue Emotion Kw 1', 'Sexy Gravity', 4, 7.1428571428571, 0, 12),
('Bubble Gum', 'Vanilla', 2, 3.5714285714286, 0, 12),
('Bubble Gum', 'Sexy Gravity', 1, 1.7857142857143, 0, 12),
('Vanilla', 'Sexy Gravity', 4, 7.1428571428571, 0, 12),
('Blue Desire Kw 1', 'Malaikat Subuh', 6, 10.714285714286, 0, 13),
('Blue Desire Kw 1', 'Antonio Banderas', 8, 14.285714285714, 0, 13),
('Blue Desire Kw 1', 'Kenzo In Bali', 5, 8.9285714285714, 0, 13),
('Blue Desire Kw 1', 'Lovely Kw 1', 5, 8.9285714285714, 0, 13),
('Blue Desire Kw 1', 'Melati', 2, 3.5714285714286, 0, 13),
('Blue Desire Kw 1', 'Cool Water Man', 2, 3.5714285714286, 0, 13),
('Blue Desire Kw 1', 'Silver', 4, 7.1428571428571, 0, 13),
('Blue Desire Kw 1', 'Cool Water Man Kw 1', 2, 3.5714285714286, 0, 13),
('Blue Desire Kw 1', 'Bulgary Extreme Kw 1', 7, 12.5, 0, 13),
('Blue Desire Kw 1', 'Fantasy', 7, 12.5, 0, 13),
('Blue Desire Kw 1', '1000 Bunga', 5, 8.9285714285714, 0, 13),
('Blue Desire Kw 1', 'Blue Emotion Kw 1', 6, 10.714285714286, 0, 13),
('Blue Desire Kw 1', 'Bubble Gum', 4, 7.1428571428571, 0, 13),
('Blue Desire Kw 1', 'Vanilla', 1, 1.7857142857143, 0, 13),
('Blue Desire Kw 1', 'Sexy Gravity', 1, 1.7857142857143, 0, 13),
('Malaikat Subuh', 'Antonio Banderas', 9, 16.071428571429, 0, 13),
('Malaikat Subuh', 'Kenzo In Bali', 5, 8.9285714285714, 0, 13),
('Malaikat Subuh', 'Lovely Kw 1', 7, 12.5, 0, 13),
('Malaikat Subuh', 'Melati', 8, 14.285714285714, 0, 13),
('Malaikat Subuh', 'Cool Water Man', 3, 5.3571428571429, 0, 13),
('Malaikat Subuh', 'Silver', 7, 12.5, 0, 13),
('Malaikat Subuh', 'Cool Water Man Kw 1', 2, 3.5714285714286, 0, 13),
('Malaikat Subuh', 'Bulgary Extreme Kw 1', 6, 10.714285714286, 0, 13),
('Malaikat Subuh', 'Fantasy', 6, 10.714285714286, 0, 13),
('Malaikat Subuh', '1000 Bunga', 7, 12.5, 0, 13),
('Malaikat Subuh', 'Blue Emotion Kw 1', 9, 16.071428571429, 0, 13),
('Malaikat Subuh', 'Bubble Gum', 4, 7.1428571428571, 0, 13),
('Malaikat Subuh', 'Vanilla', 3, 5.3571428571429, 0, 13),
('Malaikat Subuh', 'Sexy Gravity', 4, 7.1428571428571, 0, 13),
('Antonio Banderas', 'Kenzo In Bali', 2, 3.5714285714286, 0, 13),
('Antonio Banderas', 'Lovely Kw 1', 8, 14.285714285714, 0, 13),
('Antonio Banderas', 'Melati', 6, 10.714285714286, 0, 13),
('Antonio Banderas', 'Cool Water Man', 4, 7.1428571428571, 0, 13),
('Antonio Banderas', 'Silver', 5, 8.9285714285714, 0, 13),
('Antonio Banderas', 'Cool Water Man Kw 1', 6, 10.714285714286, 0, 13),
('Antonio Banderas', 'Bulgary Extreme Kw 1', 5, 8.9285714285714, 0, 13),
('Antonio Banderas', 'Fantasy', 10, 17.857142857143, 1, 13),
('Antonio Banderas', '1000 Bunga', 7, 12.5, 0, 13),
('Antonio Banderas', 'Blue Emotion Kw 1', 7, 12.5, 0, 13),
('Antonio Banderas', 'Bubble Gum', 6, 10.714285714286, 0, 13),
('Antonio Banderas', 'Vanilla', 2, 3.5714285714286, 0, 13),
('Antonio Banderas', 'Sexy Gravity', 3, 5.3571428571429, 0, 13),
('Kenzo In Bali', 'Lovely Kw 1', 3, 5.3571428571429, 0, 13),
('Kenzo In Bali', 'Melati', 6, 10.714285714286, 0, 13),
('Kenzo In Bali', 'Cool Water Man', 1, 1.7857142857143, 0, 13),
('Kenzo In Bali', 'Silver', 3, 5.3571428571429, 0, 13),
('Kenzo In Bali', 'Cool Water Man Kw 1', 2, 3.5714285714286, 0, 13),
('Kenzo In Bali', 'Bulgary Extreme Kw 1', 6, 10.714285714286, 0, 13),
('Kenzo In Bali', 'Fantasy', 3, 5.3571428571429, 0, 13),
('Kenzo In Bali', '1000 Bunga', 3, 5.3571428571429, 0, 13),
('Kenzo In Bali', 'Blue Emotion Kw 1', 3, 5.3571428571429, 0, 13),
('Kenzo In Bali', 'Bubble Gum', 2, 3.5714285714286, 0, 13),
('Kenzo In Bali', 'Vanilla', 1, 1.7857142857143, 0, 13),
('Kenzo In Bali', 'Sexy Gravity', 1, 1.7857142857143, 0, 13),
('Lovely Kw 1', 'Melati', 7, 12.5, 0, 13),
('Lovely Kw 1', 'Cool Water Man', 3, 5.3571428571429, 0, 13),
('Lovely Kw 1', 'Silver', 2, 3.5714285714286, 0, 13),
('Lovely Kw 1', 'Cool Water Man Kw 1', 2, 3.5714285714286, 0, 13),
('Lovely Kw 1', 'Bulgary Extreme Kw 1', 6, 10.714285714286, 0, 13),
('Lovely Kw 1', 'Fantasy', 7, 12.5, 0, 13),
('Lovely Kw 1', '1000 Bunga', 6, 10.714285714286, 0, 13),
('Lovely Kw 1', 'Blue Emotion Kw 1', 7, 12.5, 0, 13),
('Lovely Kw 1', 'Bubble Gum', 4, 7.1428571428571, 0, 13),
('Lovely Kw 1', 'Vanilla', 2, 3.5714285714286, 0, 13),
('Lovely Kw 1', 'Sexy Gravity', 3, 5.3571428571429, 0, 13),
('Melati', 'Cool Water Man', 6, 10.714285714286, 0, 13),
('Melati', 'Silver', 8, 14.285714285714, 0, 13),
('Melati', 'Cool Water Man Kw 1', 4, 7.1428571428571, 0, 13),
('Melati', 'Bulgary Extreme Kw 1', 6, 10.714285714286, 0, 13),
('Melati', 'Fantasy', 6, 10.714285714286, 0, 13),
('Melati', '1000 Bunga', 6, 10.714285714286, 0, 13),
('Melati', 'Blue Emotion Kw 1', 5, 8.9285714285714, 0, 13),
('Melati', 'Bubble Gum', 3, 5.3571428571429, 0, 13),
('Melati', 'Vanilla', 2, 3.5714285714286, 0, 13),
('Melati', 'Sexy Gravity', 3, 5.3571428571429, 0, 13),
('Cool Water Man', 'Silver', 6, 10.714285714286, 0, 13),
('Cool Water Man', 'Cool Water Man Kw 1', 2, 3.5714285714286, 0, 13),
('Cool Water Man', 'Bulgary Extreme Kw 1', 4, 7.1428571428571, 0, 13),
('Cool Water Man', 'Fantasy', 5, 8.9285714285714, 0, 13),
('Cool Water Man', '1000 Bunga', 4, 7.1428571428571, 0, 13),
('Cool Water Man', 'Blue Emotion Kw 1', 3, 5.3571428571429, 0, 13),
('Cool Water Man', 'Bubble Gum', 0, 0, 0, 13),
('Cool Water Man', 'Vanilla', 3, 5.3571428571429, 0, 13),
('Cool Water Man', 'Sexy Gravity', 1, 1.7857142857143, 0, 13),
('Silver', 'Cool Water Man Kw 1', 5, 8.9285714285714, 0, 13),
('Silver', 'Bulgary Extreme Kw 1', 9, 16.071428571429, 0, 13),
('Silver', 'Fantasy', 8, 14.285714285714, 0, 13),
('Silver', '1000 Bunga', 7, 12.5, 0, 13),
('Silver', 'Blue Emotion Kw 1', 5, 8.9285714285714, 0, 13),
('Silver', 'Bubble Gum', 0, 0, 0, 13),
('Silver', 'Vanilla', 3, 5.3571428571429, 0, 13),
('Silver', 'Sexy Gravity', 4, 7.1428571428571, 0, 13),
('Cool Water Man Kw 1', 'Bulgary Extreme Kw 1', 3, 5.3571428571429, 0, 13),
('Cool Water Man Kw 1', 'Fantasy', 4, 7.1428571428571, 0, 13),
('Cool Water Man Kw 1', '1000 Bunga', 2, 3.5714285714286, 0, 13),
('Cool Water Man Kw 1', 'Blue Emotion Kw 1', 3, 5.3571428571429, 0, 13),
('Cool Water Man Kw 1', 'Bubble Gum', 2, 3.5714285714286, 0, 13),
('Cool Water Man Kw 1', 'Vanilla', 0, 0, 0, 13),
('Cool Water Man Kw 1', 'Sexy Gravity', 0, 0, 0, 13),
('Bulgary Extreme Kw 1', 'Fantasy', 8, 14.285714285714, 0, 13),
('Bulgary Extreme Kw 1', '1000 Bunga', 5, 8.9285714285714, 0, 13),
('Bulgary Extreme Kw 1', 'Blue Emotion Kw 1', 7, 12.5, 0, 13),
('Bulgary Extreme Kw 1', 'Bubble Gum', 2, 3.5714285714286, 0, 13),
('Bulgary Extreme Kw 1', 'Vanilla', 2, 3.5714285714286, 0, 13),
('Bulgary Extreme Kw 1', 'Sexy Gravity', 2, 3.5714285714286, 0, 13),
('Fantasy', '1000 Bunga', 10, 17.857142857143, 1, 13),
('Fantasy', 'Blue Emotion Kw 1', 8, 14.285714285714, 0, 13),
('Fantasy', 'Bubble Gum', 6, 10.714285714286, 0, 13),
('Fantasy', 'Vanilla', 4, 7.1428571428571, 0, 13),
('Fantasy', 'Sexy Gravity', 5, 8.9285714285714, 0, 13),
('1000 Bunga', 'Blue Emotion Kw 1', 4, 7.1428571428571, 0, 13),
('1000 Bunga', 'Bubble Gum', 4, 7.1428571428571, 0, 13),
('1000 Bunga', 'Vanilla', 6, 10.714285714286, 0, 13),
('1000 Bunga', 'Sexy Gravity', 4, 7.1428571428571, 0, 13),
('Blue Emotion Kw 1', 'Bubble Gum', 5, 8.9285714285714, 0, 13),
('Blue Emotion Kw 1', 'Vanilla', 6, 10.714285714286, 0, 13),
('Blue Emotion Kw 1', 'Sexy Gravity', 4, 7.1428571428571, 0, 13),
('Bubble Gum', 'Vanilla', 2, 3.5714285714286, 0, 13),
('Bubble Gum', 'Sexy Gravity', 1, 1.7857142857143, 0, 13),
('Vanilla', 'Sexy Gravity', 4, 7.1428571428571, 0, 13),
('Blue Desire Kw 1', 'Malaikat Subuh', 6, 10.714285714286, 0, 14),
('Blue Desire Kw 1', 'Antonio Banderas', 8, 14.285714285714, 0, 14),
('Blue Desire Kw 1', 'Kenzo In Bali', 5, 8.9285714285714, 0, 14),
('Blue Desire Kw 1', 'Lovely Kw 1', 5, 8.9285714285714, 0, 14),
('Blue Desire Kw 1', 'Melati', 2, 3.5714285714286, 0, 14),
('Blue Desire Kw 1', 'Cool Water Man', 2, 3.5714285714286, 0, 14),
('Blue Desire Kw 1', 'Silver', 4, 7.1428571428571, 0, 14),
('Blue Desire Kw 1', 'Cool Water Man Kw 1', 2, 3.5714285714286, 0, 14),
('Blue Desire Kw 1', 'Bulgary Extreme Kw 1', 7, 12.5, 0, 14),
('Blue Desire Kw 1', 'Fantasy', 7, 12.5, 0, 14),
('Blue Desire Kw 1', '1000 Bunga', 5, 8.9285714285714, 0, 14),
('Blue Desire Kw 1', 'Blue Emotion Kw 1', 6, 10.714285714286, 0, 14),
('Blue Desire Kw 1', 'Bubble Gum', 4, 7.1428571428571, 0, 14),
('Blue Desire Kw 1', 'Vanilla', 1, 1.7857142857143, 0, 14),
('Blue Desire Kw 1', 'Sexy Gravity', 1, 1.7857142857143, 0, 14),
('Malaikat Subuh', 'Antonio Banderas', 9, 16.071428571429, 0, 14),
('Malaikat Subuh', 'Kenzo In Bali', 5, 8.9285714285714, 0, 14),
('Malaikat Subuh', 'Lovely Kw 1', 7, 12.5, 0, 14),
('Malaikat Subuh', 'Melati', 8, 14.285714285714, 0, 14),
('Malaikat Subuh', 'Cool Water Man', 3, 5.3571428571429, 0, 14),
('Malaikat Subuh', 'Silver', 7, 12.5, 0, 14),
('Malaikat Subuh', 'Cool Water Man Kw 1', 2, 3.5714285714286, 0, 14),
('Malaikat Subuh', 'Bulgary Extreme Kw 1', 6, 10.714285714286, 0, 14),
('Malaikat Subuh', 'Fantasy', 6, 10.714285714286, 0, 14),
('Malaikat Subuh', '1000 Bunga', 7, 12.5, 0, 14),
('Malaikat Subuh', 'Blue Emotion Kw 1', 9, 16.071428571429, 0, 14),
('Malaikat Subuh', 'Bubble Gum', 4, 7.1428571428571, 0, 14),
('Malaikat Subuh', 'Vanilla', 3, 5.3571428571429, 0, 14),
('Malaikat Subuh', 'Sexy Gravity', 4, 7.1428571428571, 0, 14),
('Antonio Banderas', 'Kenzo In Bali', 2, 3.5714285714286, 0, 14),
('Antonio Banderas', 'Lovely Kw 1', 8, 14.285714285714, 0, 14),
('Antonio Banderas', 'Melati', 6, 10.714285714286, 0, 14),
('Antonio Banderas', 'Cool Water Man', 4, 7.1428571428571, 0, 14),
('Antonio Banderas', 'Silver', 5, 8.9285714285714, 0, 14),
('Antonio Banderas', 'Cool Water Man Kw 1', 6, 10.714285714286, 0, 14),
('Antonio Banderas', 'Bulgary Extreme Kw 1', 5, 8.9285714285714, 0, 14),
('Antonio Banderas', 'Fantasy', 10, 17.857142857143, 1, 14),
('Antonio Banderas', '1000 Bunga', 7, 12.5, 0, 14),
('Antonio Banderas', 'Blue Emotion Kw 1', 7, 12.5, 0, 14),
('Antonio Banderas', 'Bubble Gum', 6, 10.714285714286, 0, 14),
('Antonio Banderas', 'Vanilla', 2, 3.5714285714286, 0, 14),
('Antonio Banderas', 'Sexy Gravity', 3, 5.3571428571429, 0, 14),
('Kenzo In Bali', 'Lovely Kw 1', 3, 5.3571428571429, 0, 14),
('Kenzo In Bali', 'Melati', 6, 10.714285714286, 0, 14),
('Kenzo In Bali', 'Cool Water Man', 1, 1.7857142857143, 0, 14),
('Kenzo In Bali', 'Silver', 3, 5.3571428571429, 0, 14),
('Kenzo In Bali', 'Cool Water Man Kw 1', 2, 3.5714285714286, 0, 14),
('Kenzo In Bali', 'Bulgary Extreme Kw 1', 6, 10.714285714286, 0, 14),
('Kenzo In Bali', 'Fantasy', 3, 5.3571428571429, 0, 14),
('Kenzo In Bali', '1000 Bunga', 3, 5.3571428571429, 0, 14),
('Kenzo In Bali', 'Blue Emotion Kw 1', 3, 5.3571428571429, 0, 14),
('Kenzo In Bali', 'Bubble Gum', 2, 3.5714285714286, 0, 14),
('Kenzo In Bali', 'Vanilla', 1, 1.7857142857143, 0, 14),
('Kenzo In Bali', 'Sexy Gravity', 1, 1.7857142857143, 0, 14),
('Lovely Kw 1', 'Melati', 7, 12.5, 0, 14),
('Lovely Kw 1', 'Cool Water Man', 3, 5.3571428571429, 0, 14),
('Lovely Kw 1', 'Silver', 2, 3.5714285714286, 0, 14),
('Lovely Kw 1', 'Cool Water Man Kw 1', 2, 3.5714285714286, 0, 14),
('Lovely Kw 1', 'Bulgary Extreme Kw 1', 6, 10.714285714286, 0, 14),
('Lovely Kw 1', 'Fantasy', 7, 12.5, 0, 14),
('Lovely Kw 1', '1000 Bunga', 6, 10.714285714286, 0, 14),
('Lovely Kw 1', 'Blue Emotion Kw 1', 7, 12.5, 0, 14),
('Lovely Kw 1', 'Bubble Gum', 4, 7.1428571428571, 0, 14),
('Lovely Kw 1', 'Vanilla', 2, 3.5714285714286, 0, 14),
('Lovely Kw 1', 'Sexy Gravity', 3, 5.3571428571429, 0, 14),
('Melati', 'Cool Water Man', 6, 10.714285714286, 0, 14),
('Melati', 'Silver', 8, 14.285714285714, 0, 14),
('Melati', 'Cool Water Man Kw 1', 4, 7.1428571428571, 0, 14),
('Melati', 'Bulgary Extreme Kw 1', 6, 10.714285714286, 0, 14),
('Melati', 'Fantasy', 6, 10.714285714286, 0, 14),
('Melati', '1000 Bunga', 6, 10.714285714286, 0, 14),
('Melati', 'Blue Emotion Kw 1', 5, 8.9285714285714, 0, 14),
('Melati', 'Bubble Gum', 3, 5.3571428571429, 0, 14),
('Melati', 'Vanilla', 2, 3.5714285714286, 0, 14),
('Melati', 'Sexy Gravity', 3, 5.3571428571429, 0, 14),
('Cool Water Man', 'Silver', 6, 10.714285714286, 0, 14),
('Cool Water Man', 'Cool Water Man Kw 1', 2, 3.5714285714286, 0, 14),
('Cool Water Man', 'Bulgary Extreme Kw 1', 4, 7.1428571428571, 0, 14),
('Cool Water Man', 'Fantasy', 5, 8.9285714285714, 0, 14),
('Cool Water Man', '1000 Bunga', 4, 7.1428571428571, 0, 14),
('Cool Water Man', 'Blue Emotion Kw 1', 3, 5.3571428571429, 0, 14),
('Cool Water Man', 'Bubble Gum', 0, 0, 0, 14),
('Cool Water Man', 'Vanilla', 3, 5.3571428571429, 0, 14),
('Cool Water Man', 'Sexy Gravity', 1, 1.7857142857143, 0, 14),
('Silver', 'Cool Water Man Kw 1', 5, 8.9285714285714, 0, 14),
('Silver', 'Bulgary Extreme Kw 1', 9, 16.071428571429, 0, 14),
('Silver', 'Fantasy', 8, 14.285714285714, 0, 14),
('Silver', '1000 Bunga', 7, 12.5, 0, 14),
('Silver', 'Blue Emotion Kw 1', 5, 8.9285714285714, 0, 14),
('Silver', 'Bubble Gum', 0, 0, 0, 14),
('Silver', 'Vanilla', 3, 5.3571428571429, 0, 14),
('Silver', 'Sexy Gravity', 4, 7.1428571428571, 0, 14),
('Cool Water Man Kw 1', 'Bulgary Extreme Kw 1', 3, 5.3571428571429, 0, 14),
('Cool Water Man Kw 1', 'Fantasy', 4, 7.1428571428571, 0, 14),
('Cool Water Man Kw 1', '1000 Bunga', 2, 3.5714285714286, 0, 14),
('Cool Water Man Kw 1', 'Blue Emotion Kw 1', 3, 5.3571428571429, 0, 14),
('Cool Water Man Kw 1', 'Bubble Gum', 2, 3.5714285714286, 0, 14),
('Cool Water Man Kw 1', 'Vanilla', 0, 0, 0, 14),
('Cool Water Man Kw 1', 'Sexy Gravity', 0, 0, 0, 14),
('Bulgary Extreme Kw 1', 'Fantasy', 8, 14.285714285714, 0, 14),
('Bulgary Extreme Kw 1', '1000 Bunga', 5, 8.9285714285714, 0, 14),
('Bulgary Extreme Kw 1', 'Blue Emotion Kw 1', 7, 12.5, 0, 14),
('Bulgary Extreme Kw 1', 'Bubble Gum', 2, 3.5714285714286, 0, 14),
('Bulgary Extreme Kw 1', 'Vanilla', 2, 3.5714285714286, 0, 14),
('Bulgary Extreme Kw 1', 'Sexy Gravity', 2, 3.5714285714286, 0, 14),
('Fantasy', '1000 Bunga', 10, 17.857142857143, 1, 14),
('Fantasy', 'Blue Emotion Kw 1', 8, 14.285714285714, 0, 14),
('Fantasy', 'Bubble Gum', 6, 10.714285714286, 0, 14),
('Fantasy', 'Vanilla', 4, 7.1428571428571, 0, 14),
('Fantasy', 'Sexy Gravity', 5, 8.9285714285714, 0, 14),
('1000 Bunga', 'Blue Emotion Kw 1', 4, 7.1428571428571, 0, 14),
('1000 Bunga', 'Bubble Gum', 4, 7.1428571428571, 0, 14),
('1000 Bunga', 'Vanilla', 6, 10.714285714286, 0, 14),
('1000 Bunga', 'Sexy Gravity', 4, 7.1428571428571, 0, 14),
('Blue Emotion Kw 1', 'Bubble Gum', 5, 8.9285714285714, 0, 14),
('Blue Emotion Kw 1', 'Vanilla', 6, 10.714285714286, 0, 14),
('Blue Emotion Kw 1', 'Sexy Gravity', 4, 7.1428571428571, 0, 14),
('Bubble Gum', 'Vanilla', 2, 3.5714285714286, 0, 14),
('Bubble Gum', 'Sexy Gravity', 1, 1.7857142857143, 0, 14),
('Vanilla', 'Sexy Gravity', 4, 7.1428571428571, 0, 14),
('Blue Desire Kw 1', 'Malaikat Subuh', 6, 10.714285714286, 0, 15),
('Blue Desire Kw 1', 'Antonio Banderas', 8, 14.285714285714, 0, 15),
('Blue Desire Kw 1', 'Kenzo In Bali', 5, 8.9285714285714, 0, 15),
('Blue Desire Kw 1', 'Lovely Kw 1', 5, 8.9285714285714, 0, 15),
('Blue Desire Kw 1', 'Melati', 2, 3.5714285714286, 0, 15),
('Blue Desire Kw 1', 'Cool Water Man', 2, 3.5714285714286, 0, 15),
('Blue Desire Kw 1', 'Silver', 4, 7.1428571428571, 0, 15),
('Blue Desire Kw 1', 'Cool Water Man Kw 1', 2, 3.5714285714286, 0, 15),
('Blue Desire Kw 1', 'Bulgary Extreme Kw 1', 7, 12.5, 0, 15),
('Blue Desire Kw 1', 'Fantasy', 7, 12.5, 0, 15),
('Blue Desire Kw 1', '1000 Bunga', 5, 8.9285714285714, 0, 15),
('Blue Desire Kw 1', 'Blue Emotion Kw 1', 6, 10.714285714286, 0, 15),
('Blue Desire Kw 1', 'Bubble Gum', 4, 7.1428571428571, 0, 15),
('Blue Desire Kw 1', 'Vanilla', 1, 1.7857142857143, 0, 15),
('Blue Desire Kw 1', 'Sexy Gravity', 1, 1.7857142857143, 0, 15),
('Malaikat Subuh', 'Antonio Banderas', 9, 16.071428571429, 0, 15),
('Malaikat Subuh', 'Kenzo In Bali', 5, 8.9285714285714, 0, 15),
('Malaikat Subuh', 'Lovely Kw 1', 7, 12.5, 0, 15),
('Malaikat Subuh', 'Melati', 8, 14.285714285714, 0, 15),
('Malaikat Subuh', 'Cool Water Man', 3, 5.3571428571429, 0, 15),
('Malaikat Subuh', 'Silver', 7, 12.5, 0, 15),
('Malaikat Subuh', 'Cool Water Man Kw 1', 2, 3.5714285714286, 0, 15),
('Malaikat Subuh', 'Bulgary Extreme Kw 1', 6, 10.714285714286, 0, 15),
('Malaikat Subuh', 'Fantasy', 6, 10.714285714286, 0, 15),
('Malaikat Subuh', '1000 Bunga', 7, 12.5, 0, 15),
('Malaikat Subuh', 'Blue Emotion Kw 1', 9, 16.071428571429, 0, 15),
('Malaikat Subuh', 'Bubble Gum', 4, 7.1428571428571, 0, 15),
('Malaikat Subuh', 'Vanilla', 3, 5.3571428571429, 0, 15),
('Malaikat Subuh', 'Sexy Gravity', 4, 7.1428571428571, 0, 15),
('Antonio Banderas', 'Kenzo In Bali', 2, 3.5714285714286, 0, 15),
('Antonio Banderas', 'Lovely Kw 1', 8, 14.285714285714, 0, 15),
('Antonio Banderas', 'Melati', 6, 10.714285714286, 0, 15),
('Antonio Banderas', 'Cool Water Man', 4, 7.1428571428571, 0, 15),
('Antonio Banderas', 'Silver', 5, 8.9285714285714, 0, 15),
('Antonio Banderas', 'Cool Water Man Kw 1', 6, 10.714285714286, 0, 15),
('Antonio Banderas', 'Bulgary Extreme Kw 1', 5, 8.9285714285714, 0, 15),
('Antonio Banderas', 'Fantasy', 10, 17.857142857143, 1, 15),
('Antonio Banderas', '1000 Bunga', 7, 12.5, 0, 15),
('Antonio Banderas', 'Blue Emotion Kw 1', 7, 12.5, 0, 15),
('Antonio Banderas', 'Bubble Gum', 6, 10.714285714286, 0, 15),
('Antonio Banderas', 'Vanilla', 2, 3.5714285714286, 0, 15),
('Antonio Banderas', 'Sexy Gravity', 3, 5.3571428571429, 0, 15),
('Kenzo In Bali', 'Lovely Kw 1', 3, 5.3571428571429, 0, 15),
('Kenzo In Bali', 'Melati', 6, 10.714285714286, 0, 15),
('Kenzo In Bali', 'Cool Water Man', 1, 1.7857142857143, 0, 15),
('Kenzo In Bali', 'Silver', 3, 5.3571428571429, 0, 15),
('Kenzo In Bali', 'Cool Water Man Kw 1', 2, 3.5714285714286, 0, 15),
('Kenzo In Bali', 'Bulgary Extreme Kw 1', 6, 10.714285714286, 0, 15),
('Kenzo In Bali', 'Fantasy', 3, 5.3571428571429, 0, 15),
('Kenzo In Bali', '1000 Bunga', 3, 5.3571428571429, 0, 15),
('Kenzo In Bali', 'Blue Emotion Kw 1', 3, 5.3571428571429, 0, 15),
('Kenzo In Bali', 'Bubble Gum', 2, 3.5714285714286, 0, 15),
('Kenzo In Bali', 'Vanilla', 1, 1.7857142857143, 0, 15),
('Kenzo In Bali', 'Sexy Gravity', 1, 1.7857142857143, 0, 15),
('Lovely Kw 1', 'Melati', 7, 12.5, 0, 15),
('Lovely Kw 1', 'Cool Water Man', 3, 5.3571428571429, 0, 15),
('Lovely Kw 1', 'Silver', 2, 3.5714285714286, 0, 15),
('Lovely Kw 1', 'Cool Water Man Kw 1', 2, 3.5714285714286, 0, 15),
('Lovely Kw 1', 'Bulgary Extreme Kw 1', 6, 10.714285714286, 0, 15),
('Lovely Kw 1', 'Fantasy', 7, 12.5, 0, 15),
('Lovely Kw 1', '1000 Bunga', 6, 10.714285714286, 0, 15),
('Lovely Kw 1', 'Blue Emotion Kw 1', 7, 12.5, 0, 15),
('Lovely Kw 1', 'Bubble Gum', 4, 7.1428571428571, 0, 15),
('Lovely Kw 1', 'Vanilla', 2, 3.5714285714286, 0, 15),
('Lovely Kw 1', 'Sexy Gravity', 3, 5.3571428571429, 0, 15),
('Melati', 'Cool Water Man', 6, 10.714285714286, 0, 15),
('Melati', 'Silver', 8, 14.285714285714, 0, 15),
('Melati', 'Cool Water Man Kw 1', 4, 7.1428571428571, 0, 15),
('Melati', 'Bulgary Extreme Kw 1', 6, 10.714285714286, 0, 15),
('Melati', 'Fantasy', 6, 10.714285714286, 0, 15),
('Melati', '1000 Bunga', 6, 10.714285714286, 0, 15),
('Melati', 'Blue Emotion Kw 1', 5, 8.9285714285714, 0, 15),
('Melati', 'Bubble Gum', 3, 5.3571428571429, 0, 15),
('Melati', 'Vanilla', 2, 3.5714285714286, 0, 15),
('Melati', 'Sexy Gravity', 3, 5.3571428571429, 0, 15),
('Cool Water Man', 'Silver', 6, 10.714285714286, 0, 15),
('Cool Water Man', 'Cool Water Man Kw 1', 2, 3.5714285714286, 0, 15),
('Cool Water Man', 'Bulgary Extreme Kw 1', 4, 7.1428571428571, 0, 15),
('Cool Water Man', 'Fantasy', 5, 8.9285714285714, 0, 15),
('Cool Water Man', '1000 Bunga', 4, 7.1428571428571, 0, 15),
('Cool Water Man', 'Blue Emotion Kw 1', 3, 5.3571428571429, 0, 15),
('Cool Water Man', 'Bubble Gum', 0, 0, 0, 15),
('Cool Water Man', 'Vanilla', 3, 5.3571428571429, 0, 15),
('Cool Water Man', 'Sexy Gravity', 1, 1.7857142857143, 0, 15),
('Silver', 'Cool Water Man Kw 1', 5, 8.9285714285714, 0, 15),
('Silver', 'Bulgary Extreme Kw 1', 9, 16.071428571429, 0, 15),
('Silver', 'Fantasy', 8, 14.285714285714, 0, 15),
('Silver', '1000 Bunga', 7, 12.5, 0, 15),
('Silver', 'Blue Emotion Kw 1', 5, 8.9285714285714, 0, 15),
('Silver', 'Bubble Gum', 0, 0, 0, 15),
('Silver', 'Vanilla', 3, 5.3571428571429, 0, 15),
('Silver', 'Sexy Gravity', 4, 7.1428571428571, 0, 15),
('Cool Water Man Kw 1', 'Bulgary Extreme Kw 1', 3, 5.3571428571429, 0, 15),
('Cool Water Man Kw 1', 'Fantasy', 4, 7.1428571428571, 0, 15),
('Cool Water Man Kw 1', '1000 Bunga', 2, 3.5714285714286, 0, 15),
('Cool Water Man Kw 1', 'Blue Emotion Kw 1', 3, 5.3571428571429, 0, 15),
('Cool Water Man Kw 1', 'Bubble Gum', 2, 3.5714285714286, 0, 15),
('Cool Water Man Kw 1', 'Vanilla', 0, 0, 0, 15),
('Cool Water Man Kw 1', 'Sexy Gravity', 0, 0, 0, 15),
('Bulgary Extreme Kw 1', 'Fantasy', 8, 14.285714285714, 0, 15),
('Bulgary Extreme Kw 1', '1000 Bunga', 5, 8.9285714285714, 0, 15),
('Bulgary Extreme Kw 1', 'Blue Emotion Kw 1', 7, 12.5, 0, 15),
('Bulgary Extreme Kw 1', 'Bubble Gum', 2, 3.5714285714286, 0, 15),
('Bulgary Extreme Kw 1', 'Vanilla', 2, 3.5714285714286, 0, 15),
('Bulgary Extreme Kw 1', 'Sexy Gravity', 2, 3.5714285714286, 0, 15),
('Fantasy', '1000 Bunga', 10, 17.857142857143, 1, 15),
('Fantasy', 'Blue Emotion Kw 1', 8, 14.285714285714, 0, 15),
('Fantasy', 'Bubble Gum', 6, 10.714285714286, 0, 15),
('Fantasy', 'Vanilla', 4, 7.1428571428571, 0, 15),
('Fantasy', 'Sexy Gravity', 5, 8.9285714285714, 0, 15),
('1000 Bunga', 'Blue Emotion Kw 1', 4, 7.1428571428571, 0, 15),
('1000 Bunga', 'Bubble Gum', 4, 7.1428571428571, 0, 15),
('1000 Bunga', 'Vanilla', 6, 10.714285714286, 0, 15),
('1000 Bunga', 'Sexy Gravity', 4, 7.1428571428571, 0, 15),
('Blue Emotion Kw 1', 'Bubble Gum', 5, 8.9285714285714, 0, 15),
('Blue Emotion Kw 1', 'Vanilla', 6, 10.714285714286, 0, 15),
('Blue Emotion Kw 1', 'Sexy Gravity', 4, 7.1428571428571, 0, 15),
('Bubble Gum', 'Vanilla', 2, 3.5714285714286, 0, 15),
('Bubble Gum', 'Sexy Gravity', 1, 1.7857142857143, 0, 15),
('Vanilla', 'Sexy Gravity', 4, 7.1428571428571, 0, 15),
('Blue Desire Kw 1', 'Malaikat Subuh', 6, 10.714285714286, 0, 16),
('Blue Desire Kw 1', 'Antonio Banderas', 8, 14.285714285714, 0, 16),
('Blue Desire Kw 1', 'Kenzo In Bali', 5, 8.9285714285714, 0, 16),
('Blue Desire Kw 1', 'Lovely Kw 1', 5, 8.9285714285714, 0, 16),
('Blue Desire Kw 1', 'Melati', 2, 3.5714285714286, 0, 16),
('Blue Desire Kw 1', 'Cool Water Man', 2, 3.5714285714286, 0, 16),
('Blue Desire Kw 1', 'Silver', 4, 7.1428571428571, 0, 16),
('Blue Desire Kw 1', 'Cool Water Man Kw 1', 2, 3.5714285714286, 0, 16),
('Blue Desire Kw 1', 'Bulgary Extreme Kw 1', 7, 12.5, 0, 16),
('Blue Desire Kw 1', 'Fantasy', 7, 12.5, 0, 16),
('Blue Desire Kw 1', '1000 Bunga', 5, 8.9285714285714, 0, 16),
('Blue Desire Kw 1', 'Blue Emotion Kw 1', 6, 10.714285714286, 0, 16),
('Blue Desire Kw 1', 'Bubble Gum', 4, 7.1428571428571, 0, 16),
('Blue Desire Kw 1', 'Vanilla', 1, 1.7857142857143, 0, 16),
('Blue Desire Kw 1', 'Sexy Gravity', 1, 1.7857142857143, 0, 16),
('Malaikat Subuh', 'Antonio Banderas', 9, 16.071428571429, 0, 16),
('Malaikat Subuh', 'Kenzo In Bali', 5, 8.9285714285714, 0, 16),
('Malaikat Subuh', 'Lovely Kw 1', 7, 12.5, 0, 16),
('Malaikat Subuh', 'Melati', 8, 14.285714285714, 0, 16),
('Malaikat Subuh', 'Cool Water Man', 3, 5.3571428571429, 0, 16),
('Malaikat Subuh', 'Silver', 7, 12.5, 0, 16),
('Malaikat Subuh', 'Cool Water Man Kw 1', 2, 3.5714285714286, 0, 16),
('Malaikat Subuh', 'Bulgary Extreme Kw 1', 6, 10.714285714286, 0, 16),
('Malaikat Subuh', 'Fantasy', 6, 10.714285714286, 0, 16),
('Malaikat Subuh', '1000 Bunga', 7, 12.5, 0, 16),
('Malaikat Subuh', 'Blue Emotion Kw 1', 9, 16.071428571429, 0, 16),
('Malaikat Subuh', 'Bubble Gum', 4, 7.1428571428571, 0, 16),
('Malaikat Subuh', 'Vanilla', 3, 5.3571428571429, 0, 16),
('Malaikat Subuh', 'Sexy Gravity', 4, 7.1428571428571, 0, 16),
('Antonio Banderas', 'Kenzo In Bali', 2, 3.5714285714286, 0, 16),
('Antonio Banderas', 'Lovely Kw 1', 8, 14.285714285714, 0, 16),
('Antonio Banderas', 'Melati', 6, 10.714285714286, 0, 16),
('Antonio Banderas', 'Cool Water Man', 4, 7.1428571428571, 0, 16),
('Antonio Banderas', 'Silver', 5, 8.9285714285714, 0, 16),
('Antonio Banderas', 'Cool Water Man Kw 1', 6, 10.714285714286, 0, 16),
('Antonio Banderas', 'Bulgary Extreme Kw 1', 5, 8.9285714285714, 0, 16),
('Antonio Banderas', 'Fantasy', 10, 17.857142857143, 1, 16),
('Antonio Banderas', '1000 Bunga', 7, 12.5, 0, 16),
('Antonio Banderas', 'Blue Emotion Kw 1', 7, 12.5, 0, 16),
('Antonio Banderas', 'Bubble Gum', 6, 10.714285714286, 0, 16),
('Antonio Banderas', 'Vanilla', 2, 3.5714285714286, 0, 16),
('Antonio Banderas', 'Sexy Gravity', 3, 5.3571428571429, 0, 16),
('Kenzo In Bali', 'Lovely Kw 1', 3, 5.3571428571429, 0, 16),
('Kenzo In Bali', 'Melati', 6, 10.714285714286, 0, 16),
('Kenzo In Bali', 'Cool Water Man', 1, 1.7857142857143, 0, 16),
('Kenzo In Bali', 'Silver', 3, 5.3571428571429, 0, 16),
('Kenzo In Bali', 'Cool Water Man Kw 1', 2, 3.5714285714286, 0, 16),
('Kenzo In Bali', 'Bulgary Extreme Kw 1', 6, 10.714285714286, 0, 16),
('Kenzo In Bali', 'Fantasy', 3, 5.3571428571429, 0, 16),
('Kenzo In Bali', '1000 Bunga', 3, 5.3571428571429, 0, 16),
('Kenzo In Bali', 'Blue Emotion Kw 1', 3, 5.3571428571429, 0, 16),
('Kenzo In Bali', 'Bubble Gum', 2, 3.5714285714286, 0, 16),
('Kenzo In Bali', 'Vanilla', 1, 1.7857142857143, 0, 16),
('Kenzo In Bali', 'Sexy Gravity', 1, 1.7857142857143, 0, 16),
('Lovely Kw 1', 'Melati', 7, 12.5, 0, 16),
('Lovely Kw 1', 'Cool Water Man', 3, 5.3571428571429, 0, 16),
('Lovely Kw 1', 'Silver', 2, 3.5714285714286, 0, 16),
('Lovely Kw 1', 'Cool Water Man Kw 1', 2, 3.5714285714286, 0, 16),
('Lovely Kw 1', 'Bulgary Extreme Kw 1', 6, 10.714285714286, 0, 16),
('Lovely Kw 1', 'Fantasy', 7, 12.5, 0, 16),
('Lovely Kw 1', '1000 Bunga', 6, 10.714285714286, 0, 16),
('Lovely Kw 1', 'Blue Emotion Kw 1', 7, 12.5, 0, 16),
('Lovely Kw 1', 'Bubble Gum', 4, 7.1428571428571, 0, 16),
('Lovely Kw 1', 'Vanilla', 2, 3.5714285714286, 0, 16),
('Lovely Kw 1', 'Sexy Gravity', 3, 5.3571428571429, 0, 16),
('Melati', 'Cool Water Man', 6, 10.714285714286, 0, 16),
('Melati', 'Silver', 8, 14.285714285714, 0, 16),
('Melati', 'Cool Water Man Kw 1', 4, 7.1428571428571, 0, 16),
('Melati', 'Bulgary Extreme Kw 1', 6, 10.714285714286, 0, 16),
('Melati', 'Fantasy', 6, 10.714285714286, 0, 16),
('Melati', '1000 Bunga', 6, 10.714285714286, 0, 16),
('Melati', 'Blue Emotion Kw 1', 5, 8.9285714285714, 0, 16),
('Melati', 'Bubble Gum', 3, 5.3571428571429, 0, 16),
('Melati', 'Vanilla', 2, 3.5714285714286, 0, 16),
('Melati', 'Sexy Gravity', 3, 5.3571428571429, 0, 16),
('Cool Water Man', 'Silver', 6, 10.714285714286, 0, 16),
('Cool Water Man', 'Cool Water Man Kw 1', 2, 3.5714285714286, 0, 16),
('Cool Water Man', 'Bulgary Extreme Kw 1', 4, 7.1428571428571, 0, 16),
('Cool Water Man', 'Fantasy', 5, 8.9285714285714, 0, 16),
('Cool Water Man', '1000 Bunga', 4, 7.1428571428571, 0, 16),
('Cool Water Man', 'Blue Emotion Kw 1', 3, 5.3571428571429, 0, 16),
('Cool Water Man', 'Bubble Gum', 0, 0, 0, 16),
('Cool Water Man', 'Vanilla', 3, 5.3571428571429, 0, 16),
('Cool Water Man', 'Sexy Gravity', 1, 1.7857142857143, 0, 16),
('Silver', 'Cool Water Man Kw 1', 5, 8.9285714285714, 0, 16),
('Silver', 'Bulgary Extreme Kw 1', 9, 16.071428571429, 0, 16),
('Silver', 'Fantasy', 8, 14.285714285714, 0, 16),
('Silver', '1000 Bunga', 7, 12.5, 0, 16),
('Silver', 'Blue Emotion Kw 1', 5, 8.9285714285714, 0, 16),
('Silver', 'Bubble Gum', 0, 0, 0, 16),
('Silver', 'Vanilla', 3, 5.3571428571429, 0, 16),
('Silver', 'Sexy Gravity', 4, 7.1428571428571, 0, 16),
('Cool Water Man Kw 1', 'Bulgary Extreme Kw 1', 3, 5.3571428571429, 0, 16),
('Cool Water Man Kw 1', 'Fantasy', 4, 7.1428571428571, 0, 16),
('Cool Water Man Kw 1', '1000 Bunga', 2, 3.5714285714286, 0, 16),
('Cool Water Man Kw 1', 'Blue Emotion Kw 1', 3, 5.3571428571429, 0, 16),
('Cool Water Man Kw 1', 'Bubble Gum', 2, 3.5714285714286, 0, 16),
('Cool Water Man Kw 1', 'Vanilla', 0, 0, 0, 16),
('Cool Water Man Kw 1', 'Sexy Gravity', 0, 0, 0, 16),
('Bulgary Extreme Kw 1', 'Fantasy', 8, 14.285714285714, 0, 16),
('Bulgary Extreme Kw 1', '1000 Bunga', 5, 8.9285714285714, 0, 16),
('Bulgary Extreme Kw 1', 'Blue Emotion Kw 1', 7, 12.5, 0, 16),
('Bulgary Extreme Kw 1', 'Bubble Gum', 2, 3.5714285714286, 0, 16),
('Bulgary Extreme Kw 1', 'Vanilla', 2, 3.5714285714286, 0, 16),
('Bulgary Extreme Kw 1', 'Sexy Gravity', 2, 3.5714285714286, 0, 16),
('Fantasy', '1000 Bunga', 10, 17.857142857143, 1, 16),
('Fantasy', 'Blue Emotion Kw 1', 8, 14.285714285714, 0, 16),
('Fantasy', 'Bubble Gum', 6, 10.714285714286, 0, 16),
('Fantasy', 'Vanilla', 4, 7.1428571428571, 0, 16),
('Fantasy', 'Sexy Gravity', 5, 8.9285714285714, 0, 16),
('1000 Bunga', 'Blue Emotion Kw 1', 4, 7.1428571428571, 0, 16),
('1000 Bunga', 'Bubble Gum', 4, 7.1428571428571, 0, 16),
('1000 Bunga', 'Vanilla', 6, 10.714285714286, 0, 16),
('1000 Bunga', 'Sexy Gravity', 4, 7.1428571428571, 0, 16),
('Blue Emotion Kw 1', 'Bubble Gum', 5, 8.9285714285714, 0, 16),
('Blue Emotion Kw 1', 'Vanilla', 6, 10.714285714286, 0, 16),
('Blue Emotion Kw 1', 'Sexy Gravity', 4, 7.1428571428571, 0, 16),
('Bubble Gum', 'Vanilla', 2, 3.5714285714286, 0, 16),
('Bubble Gum', 'Sexy Gravity', 1, 1.7857142857143, 0, 16),
('Vanilla', 'Sexy Gravity', 4, 7.1428571428571, 0, 16);

-- --------------------------------------------------------

--
-- Table structure for table `itemset3`
--

CREATE TABLE `itemset3` (
  `atribut1` varchar(200) DEFAULT NULL,
  `atribut2` varchar(200) DEFAULT NULL,
  `atribut3` varchar(200) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `support` double DEFAULT NULL,
  `lolos` tinyint(4) DEFAULT NULL,
  `id_process` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `itemset3`
--

INSERT INTO `itemset3` (`atribut1`, `atribut2`, `atribut3`, `jumlah`, `support`, `lolos`, `id_process`) VALUES
('Antonio Banderas', 'Fantasy', '1000 Bunga', 5, 8.9285714285714, 0, 12),
('Antonio Banderas', 'Fantasy', '1000 Bunga', 5, 8.9285714285714, 0, 13),
('Antonio Banderas', 'Fantasy', '1000 Bunga', 5, 8.9285714285714, 0, 14),
('Antonio Banderas', 'Fantasy', '1000 Bunga', 5, 8.9285714285714, 0, 15),
('Antonio Banderas', 'Fantasy', '1000 Bunga', 5, 8.9285714285714, 0, 16);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `idkategori` int(11) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `durasi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`idkategori`, `kategori`, `durasi`) VALUES
(1, 'Gedung', 6),
(2, 'Lapangan', 1);

-- --------------------------------------------------------

--
-- Table structure for table `keluhan`
--

CREATE TABLE `keluhan` (
  `id` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `isi` text NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `keluhan`
--

INSERT INTO `keluhan` (`id`, `judul`, `isi`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Test lagi', 'asdasasdasd asda sdasd', '0', '2023-07-25 16:48:55', NULL),
(2, 'teasdasd', 'a sdasd 1231 2as', '2', '2023-07-25 17:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `process_log`
--

CREATE TABLE `process_log` (
  `id` int(11) NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `min_support` double DEFAULT NULL,
  `min_confidence` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `process_log`
--

INSERT INTO `process_log` (`id`, `start_date`, `end_date`, `min_support`, `min_confidence`) VALUES
(11, '2023-06-01', '2023-07-25', 12, 11),
(12, '2023-06-01', '2023-07-26', 10, 30),
(13, '2023-06-01', '2023-07-26', 10, 30),
(14, '2023-06-01', '2023-07-26', 10, 30),
(15, '2023-06-01', '2023-07-26', 10, 30),
(16, '2023-06-01', '2023-07-26', 10, 30);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `idproduk` int(11) NOT NULL,
  `idkategori` int(11) NOT NULL,
  `namaperumahan` varchar(254) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `deskripsi` longtext NOT NULL,
  `alamat` text NOT NULL,
  `luas` double NOT NULL,
  `embed` text NOT NULL,
  `harga` double NOT NULL,
  `contact_hp` varchar(100) DEFAULT NULL,
  `status` enum('Y','T') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`idproduk`, `idkategori`, `namaperumahan`, `gambar`, `deskripsi`, `alamat`, `luas`, `embed`, `harga`, `contact_hp`, `status`) VALUES
(3, 1, 'Gedung Putra Solo RIAU', 'burung-3.jpg', '<p><cite>Gedung Putra Solo Rantau Parapat adalah gedung dari organisasi Yayasan Persatuan Persaudaraan Putra Solo yang menyediakan Gedung yang bisa digunakan untuk acara konvensional&nbsp;dan juga Lapangan olahraga yang dapat digunakan untuk bermain Badminton. </cite></p>\r\n\r\n<p><cite>FASILITAS : Terdapat ruangan kosong yang dapat dipergunakan sebagai tempat menyimpan segala kebutuhan anda dan juga gedung memfasilitasi kamar mandi yang dapat dipergunakan sebanyak 2 (dua) buah kamar mandi yang terletak&nbsp;dibagian belakang gedung dan juga area parkir yang aman.</cite></p>\r\n\r\n<p><cite>Resepsionis hubungi SUWARNO WA (0812-6831-823)&nbsp;&nbsp;</cite></p>\r\n', 'Jalan Perjuangan No.110, Bagan Silembah, Riau', 340, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.520770916206!2d101.26298307417208!3d1.4612845612091907!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d3746ea14436b7%3A0xeabe23d377c8ad04!2sJl.%20Perjuangan%2C%20Rantau%20Bais%2C%20Kec.%20Tanah%20Putih%2C%20Kabupaten%20Rokan%20Hilir%2C%20Riau!5e0!3m2!1sid!2sid!4v1686112445594!5m2!1sid!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 600000, NULL, 'T'),
(4, 1, 'Gedung Putra Solo PEMATANGSIANTAR', 'burung-4.jpg', '<p><cite>Gedung Putra Solo Rantau Parapat adalah gedung dari organisasi Yayasan Persatuan Persaudaraan Putra Solo yang menyediakan Gedung yang bisa digunakan untuk acara konvensional&nbsp;dan juga Lapangan olahraga yang dapat digunakan untuk bermain Badminton. </cite></p>\r\n\r\n<p><cite>FASILITAS : Terdapat ruangan kosong yang dapat dipergunakan sebagai tempat menyimpan segala kebutuhan anda dan juga gedung memfasilitasi kamar mandi yang dapat dipergunakan sebanyak 2 (dua) buah kamar mandi yang terletak&nbsp;dibagian belakang gedung dan juga area parkir yang aman.</cite></p>\r\n\r\n<p><cite>Resepsionis hubungi SUWARNO WA (0812-6213-113)</cite></p>\r\n', 'Jalan Masjid No. 27, Pematangsiantar', 255, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3984.512053715296!2d99.0448098!3d2.95531480000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x303185a057e186bf%3A0x7fccb83df3ee0164!2sPUTRA%20SOLO%20SPORT!5e0!3m2!1sid!2sid!4v1686111973730!5m2!1sid!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 600000, NULL, 'Y'),
(5, 1, 'Gedung Putra Solo TEBING TINGGI', 'penyewaan-1296355837.jpg', '<p><cite>Gedung Putra Solo Rantau Parapat adalah gedung dari organisasi Yayasan Persatuan Persaudaraan Putra Solo yang menyediakan Gedung yang bisa digunakan untuk acara konvensional&nbsp;dan juga Lapangan olahraga yang dapat digunakan untuk bermain Badminton. </cite></p>\r\n\r\n<p><cite>FASILITAS : Terdapat ruangan kosong yang dapat dipergunakan sebagai tempat menyimpan segala kebutuhan anda dan juga gedung memfasilitasi kamar mandi yang dapat dipergunakan sebanyak 2 (dua) buah kamar mandi yang terletak&nbsp;dibagian belakang gedung dan juga area parkir yang aman.</cite></p>\r\n\r\n<p><cite>Resepsionis hubungi GIMIN&nbsp;WA (0813-6129-0180)</cite></p>\r\n', 'Jalan Madrasah, Tebing Tinggi', 255, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3983.1535879599946!2d99.15272677417123!3d3.3121721521305534!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30316199ecd4b357%3A0xfe69d5eada182f16!2sGedung%20Putra%20Solo!5e0!3m2!1sid!2sid!4v1686112240185!5m2!1sid!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 600000, NULL, 'T'),
(6, 1, 'Gedung Putra Solo BINJAI', 'penyewaan-216250223.jpg', '<p><cite>Gedung Putra Solo Rantau Parapat adalah gedung dari organisasi Yayasan Persatuan Persaudaraan Putra Solo yang menyediakan Gedung yang bisa digunakan untuk acara konvensional&nbsp;dan juga Lapangan olahraga yang dapat digunakan untuk bermain Badminton. </cite></p>\r\n\r\n<p><cite>FASILITAS : Terdapat ruangan kosong yang dapat dipergunakan sebagai tempat menyimpan segala kebutuhan anda dan juga gedung memfasilitasi kamar mandi yang dapat dipergunakan sebanyak 2 (dua) buah kamar mandi yang terletak&nbsp;dibagian belakang gedung dan juga area parkir yang aman.</cite></p>\r\n\r\n<p><cite>Resepsionis hubungi IKUN HARYANTO&nbsp;WA (0852-6003-0633)</cite></p>\r\n', 'Jalan Cendana, Binjai', 255, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3981.8066326029634!2d98.51005377417164!3d3.63158134999935!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30312a24b0ea8ac5%3A0x49f89e03b72137b6!2sputra%20solo%20hall!5e0!3m2!1sid!2sid!4v1686112635886!5m2!1sid!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 600000, NULL, 'T'),
(8, 1, 'Gedung Putra Solo LUBUK PAKAM', 'penyewaan-1872635045.jpg', '<p><cite>Gedung Putra Solo Rantau Parapat adalah gedung dari organisasi Yayasan Persatuan Persaudaraan Putra Solo yang menyediakan Gedung yang bisa digunakan untuk acara konvensional&nbsp;dan juga Lapangan olahraga yang dapat digunakan untuk bermain Badminton. </cite></p>\r\n\r\n<p><cite>FASILITAS : Terdapat ruangan kosong yang dapat dipergunakan sebagai tempat menyimpan segala kebutuhan anda dan juga gedung memfasilitasi kamar mandi yang dapat dipergunakan sebanyak 2 (dua) buah kamar mandi yang terletak&nbsp;dibagian belakang gedung dan juga area parkir yang aman.</cite></p>\r\n\r\n<p><cite>Resepsionis hubungi SUNARDI&nbsp;WA (0812-6529-483)</cite></p>\r\n', 'Jalan Sunda, No. 53, Lubuk Pakam', 255, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3982.099249639794!2d98.86416577417151!3d3.5646231504598793!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3031484488e8b487%3A0x7d6ce716e0a9a7e8!2sJl.%20Sunda%20No.53%2C%20Paluh%20Kemiri%2C%20Kec.%20Lubuk%20Pakam%2C%20Kabupaten%20Deli%20Serdang%2C%20Sumatera%20Utara%2020517!5e0!3m2!1sid!2sid!4v1686113017646!5m2!1sid!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 600000, NULL, 'T'),
(9, 1, 'Gedung Putra Solo ASAHAN', 'penyewaan-1738078715.jpg', '<p><cite>Gedung Putra Solo Rantau Parapat adalah gedung dari organisasi Yayasan Persatuan Persaudaraan Putra Solo yang menyediakan Gedung yang bisa digunakan untuk acara konvensional&nbsp;dan juga Lapangan olahraga yang dapat digunakan untuk bermain Badminton. </cite></p>\r\n\r\n<p><cite>FASILITAS : Terdapat ruangan kosong yang dapat dipergunakan sebagai tempat menyimpan segala kebutuhan anda dan juga gedung memfasilitasi kamar mandi yang dapat dipergunakan sebanyak 2 (dua) buah kamar mandi yang terletak&nbsp;dibagian belakang gedung dan juga area parkir yang aman.</cite></p>\r\n\r\n<p><cite>Resepsionis hubungi SUYAMTO&nbsp;WA (0852-6179-6910)</cite></p>\r\n', 'Jalan Lintas Sumatera, Air Batu, Asahan', 255, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3984.8154359367645!2d99.66881687417093!3d2.8695691548093265!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3040309468a10d89%3A0x91f8239da3ae8192!2sJl.%20Lintas%20Sumatra%2C%20Kec.%20Air%20Batu%2C%20Kabupaten%20Asahan%2C%20Sumatera%20Utara!5e0!3m2!1sid!2sid!4v1686113384189!5m2!1sid!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 600000, NULL, 'T'),
(10, 1, 'Gedung Putra Solo MEDAN', 'penyewaan-198836241.jpg', '<p><cite>Gedung Putra Solo Rantau Parapat adalah gedung dari organisasi Yayasan Persatuan Persaudaraan Putra Solo yang menyediakan Gedung yang bisa digunakan untuk acara konvensional&nbsp;dan juga Lapangan olahraga yang dapat digunakan untuk bermain Badminton. </cite></p>\r\n\r\n<p><cite>FASILITAS : Terdapat ruangan kosong yang dapat dipergunakan sebagai tempat menyimpan segala kebutuhan anda dan juga gedung memfasilitasi kamar mandi yang dapat dipergunakan sebanyak 2 (dua) buah kamar mandi yang terletak&nbsp;dibagian belakang gedung dan juga area parkir yang aman.</cite></p>\r\n\r\n<p><cite>Resepsionis hubungi PAIMAN&nbsp;WA (0813-7531-3726)</cite></p>\r\n', 'Jl. Madiosantoso No. 155 A. P.Brayan Darat I Medan', 255, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3981.8539473710825!2d98.68143747079634!3d3.620838342037765!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3031322098e7aabf%3A0x8b13da8268c605ee!2sGedung%20Yayasan%20Persatuan%20Persaudaraan%20Putra%20Solo%20Di%20Sumatera%20Utara%20(YPPPS-SU)!5e0!3m2!1sid!2sid!4v1686113440612!5m2!1sid!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 600000, NULL, 'T'),
(11, 2, 'Putra Solo Hall RIAU', 'penyewaan-1137928439.jpg', '<p><cite>Gedung Putra Solo Rantau Parapat adalah gedung dari organisasi Yayasan Persatuan Persaudaraan Putra Solo yang menyediakan Gedung yang bisa digunakan untuk acara konvensional&nbsp;dan juga Lapangan olahraga yang dapat digunakan untuk bermain Badminton. </cite></p>\r\n\r\n<p><cite>FASILITAS : Terdapat ruangan kosong yang dapat dipergunakan sebagai tempat menyimpan segala kebutuhan anda dan juga gedung memfasilitasi kamar mandi yang dapat dipergunakan sebanyak 2 (dua) buah kamar mandi yang terletak&nbsp;dibagian belakang gedung dan juga area parkir yang aman.</cite></p>\r\n\r\n<p><cite>Resepsionis hubungi SUWARNO WA (0812-6831-823)</cite></p>\r\n', 'Jalan Perjuangan No.110, Bagan Silembah Riau', 255, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.520770916098!2d101.26298307417208!3d1.4612845612091907!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d3746ea14436b7%3A0xeabe23d377c8ad04!2sJl.%20Perjuangan%2C%20Rantau%20Bais%2C%20Kec.%20Tanah%20Putih%2C%20Kabupaten%20Rokan%20Hilir%2C%20Riau!5e0!3m2!1sid!2sid!4v1686114716609!5m2!1sid!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 50000, NULL, 'T'),
(12, 2, 'Putra Solo Hall ASAHAN', 'penyewaan-518572999.jpg', '<p><cite>Gedung Putra Solo Rantau Parapat adalah gedung dari organisasi Yayasan Persatuan Persaudaraan Putra Solo yang menyediakan Gedung yang bisa digunakan untuk acara konvensional&nbsp;dan juga Lapangan olahraga yang dapat digunakan untuk bermain Badminton. </cite></p>\r\n\r\n<p><cite>FASILITAS : Terdapat ruangan kosong yang dapat dipergunakan sebagai tempat menyimpan segala kebutuhan anda dan juga gedung memfasilitasi kamar mandi yang dapat dipergunakan sebanyak 2 (dua) buah kamar mandi yang terletak&nbsp;dibagian belakang gedung dan juga area parkir yang aman.</cite></p>\r\n\r\n<p><cite>Resepsionis hubungi SUYAMTO WA (0852-6179-6910)</cite></p>\r\n', 'Jalan Lintas Sumatera, Air Batu, Asahan', 255, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3984.8154359367645!2d99.66881687417093!3d2.8695691548093216!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3040309468a10d89%3A0x91f8239da3ae8192!2sJl.%20Lintas%20Sumatra%2C%20Kec.%20Air%20Batu%2C%20Kabupaten%20Asahan%2C%20Sumatera%20Utara!5e0!3m2!1sid!2sid!4v1686114903549!5m2!1sid!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 50000, '082140647578', 'Y'),
(13, 2, 'Putra Solo Hall PEMATANGSIANTAR', 'burung-13.jpg', '<p><cite>Gedung Putra Solo Rantau Parapat adalah gedung dari organisasi Yayasan Persatuan Persaudaraan Putra Solo yang menyediakan Gedung yang bisa digunakan untuk acara konvensional&nbsp;dan juga Lapangan olahraga yang dapat digunakan untuk bermain Badminton. </cite></p>\r\n\r\n<p><cite>FASILITAS : Terdapat ruangan kosong yang dapat dipergunakan sebagai tempat menyimpan segala kebutuhan anda dan juga gedung memfasilitasi kamar mandi yang dapat dipergunakan sebanyak 2 (dua) buah kamar mandi yang terletak&nbsp;dibagian belakang gedung dan juga area parkir yang aman.</cite></p>\r\n\r\n<p><cite>Resepsionis hubungi SUWARNO WA (0812-6213-113)</cite></p>\r\n', 'Jalan Masjid No. 27 Pematangsiantar', 255, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3984.5120344921997!2d99.04223487417092!3d2.9553201543152436!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x303185a057e186bf%3A0x7fccb83df3ee0164!2sPUTRA%20SOLO%20SPORT!5e0!3m2!1sid!2sid!4v1686114997647!5m2!1sid!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 50000, NULL, 'T'),
(14, 2, 'Putra Solo Hall TEBING TINGGI', 'penyewaan-1257304476.jpg', '<p><cite>Gedung Putra Solo Rantau Parapat adalah gedung dari organisasi Yayasan Persatuan Persaudaraan Putra Solo yang menyediakan Gedung yang bisa digunakan untuk acara konvensional&nbsp;dan juga Lapangan olahraga yang dapat digunakan untuk bermain Badminton. </cite></p>\r\n\r\n<p><cite>FASILITAS : Terdapat ruangan kosong yang dapat dipergunakan sebagai tempat menyimpan segala kebutuhan anda dan juga gedung memfasilitasi kamar mandi yang dapat dipergunakan sebanyak 2 (dua) buah kamar mandi yang terletak&nbsp;dibagian belakang gedung dan juga area parkir yang aman.</cite></p>\r\n\r\n<p><cite>Resepsionis hubungi GIMIN WA (0813-6129-0180)</cite></p>\r\n', 'Jalan Madrasah, Tebing Tinggi', 255, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3983.1484991665366!2d99.14951762417118!3d3.3134367521224535!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30316199ecd4b357%3A0xfe69d5eada182f16!2sGedung%20Putra%20Solo!5e0!3m2!1sid!2sid!4v1686115150223!5m2!1sid!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 50000, NULL, 'T'),
(15, 2, 'Putra Solo Hall LUBUK PAKAM', 'penyewaan-1588311427.jpg', '<p><cite>Gedung Putra Solo Rantau Parapat adalah gedung dari organisasi Yayasan Persatuan Persaudaraan Putra Solo yang menyediakan Gedung yang bisa digunakan untuk acara konvensional&nbsp;dan juga Lapangan olahraga yang dapat digunakan untuk bermain Badminton. </cite></p>\r\n\r\n<p><cite>FASILITAS : Terdapat ruangan kosong yang dapat dipergunakan sebagai tempat menyimpan segala kebutuhan anda dan juga gedung memfasilitasi kamar mandi yang dapat dipergunakan sebanyak 2 (dua) buah kamar mandi yang terletak&nbsp;dibagian belakang gedung dan juga area parkir yang aman.</cite></p>\r\n\r\n<p><cite>Resepsionis hubungi SUNARDI WA (0812-6529-483)</cite></p>\r\n', 'Jalan Sunda, No. 53, Lubuk Pakam', 255, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3982.099249639794!2d98.86416577417151!3d3.5646231504598793!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3031484488e8b487%3A0x7d6ce716e0a9a7e8!2sJl.%20Sunda%20No.53%2C%20Paluh%20Kemiri%2C%20Kec.%20Lubuk%20Pakam%2C%20Kabupaten%20Deli%20Serdang%2C%20Sumatera%20Utara%2020517!5e0!3m2!1sid!2sid!4v1686115227682!5m2!1sid!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 50000, NULL, 'T'),
(16, 2, 'Putra Solo Hall BINJAI', 'penyewaan-76391769.jpg', '<p><cite>Gedung Putra Solo Rantau Parapat adalah gedung dari organisasi Yayasan Persatuan Persaudaraan Putra Solo yang menyediakan Gedung yang bisa digunakan untuk acara konvensional&nbsp;dan juga Lapangan olahraga yang dapat digunakan untuk bermain Badminton. </cite></p>\r\n\r\n<p><cite>FASILITAS : Terdapat ruangan kosong yang dapat dipergunakan sebagai tempat menyimpan segala kebutuhan anda dan juga gedung memfasilitasi kamar mandi yang dapat dipergunakan sebanyak 2 (dua) buah kamar mandi yang terletak&nbsp;dibagian belakang gedung dan juga area parkir yang aman.</cite></p>\r\n\r\n<p><cite>Resepsionis hubungi IKUN HARYANTO WA (0852-6003-0633)</cite></p>\r\n', 'Jalan Cendana, Binjai', 255, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3981.8066326029634!2d98.51005377417164!3d3.63158134999935!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30312a24b0ea8ac5%3A0x49f89e03b72137b6!2sputra%20solo%20hall!5e0!3m2!1sid!2sid!4v1686115352350!5m2!1sid!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 50000, NULL, 'T'),
(17, 2, 'Putra Solo Hall MEDAN', 'penyewaan-126329255.jpg', '<p><cite>Gedung Putra Solo Rantau Parapat adalah gedung dari organisasi Yayasan Persatuan Persaudaraan Putra Solo yang menyediakan Gedung yang bisa digunakan untuk acara konvensional&nbsp;dan juga Lapangan olahraga yang dapat digunakan untuk bermain Badminton. </cite></p>\r\n\r\n<p><cite>FASILITAS : Terdapat ruangan kosong yang dapat dipergunakan sebagai tempat menyimpan segala kebutuhan anda dan juga gedung memfasilitasi kamar mandi yang dapat dipergunakan sebanyak 2 (dua) buah kamar mandi yang terletak&nbsp;dibagian belakang gedung dan juga area parkir yang aman.</cite></p>\r\n\r\n<p><cite>Resepsionis hubungi PAIMAN WA (0813-7531-3726)</cite></p>\r\n', 'Jl. Madiosantoso No. 155 A. P.Brayan Darat I Medan', 255, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3981.8539473357423!2d98.68347597417163!3d3.6208383500737145!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3031322098e7aabf%3A0x8b13da8268c605ee!2sGedung%20Yayasan%20Persatuan%20Persaudaraan%20Putra%20Solo%20Di%20Sumatera%20Utara%20(YPPPS-SU)!5e0!3m2!1sid!2sid!4v1686115455624!5m2!1sid!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 50000, NULL, 'T');

-- --------------------------------------------------------

--
-- Table structure for table `promo`
--

CREATE TABLE `promo` (
  `id` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `diskon` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `minim_order` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `promo`
--

INSERT INTO `promo` (`id`, `id_product`, `name`, `keterangan`, `diskon`, `harga`, `minim_order`, `created_at`, `updated_at`) VALUES
(1, 5, 'Diskon 10%', 'Diskon 10% jika order lebih dari 2', 10, NULL, 2, '2023-07-26 03:15:16', '2023-07-26 03:15:16');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `text1` varchar(100) NOT NULL,
  `text2` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `text1`, `text2`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Penyewaan', 'Gedung', 'slide-1.jpeg', '2023-07-25 15:44:37', NULL),
(2, 'Penyewaan', 'Lapangan', 'slide-2.jpeg', '2023-07-25 15:45:31', '2023-07-25 16:12:40'),
(3, 'Murah', 'Dan Berkualitas', 'slide-3.jpeg', '2023-07-25 15:45:31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `idtransaksi` varchar(20) NOT NULL,
  `idpembeli` int(11) NOT NULL,
  `statustransaksi` enum('Belum Bayar','menunggu','diterima','ditolak') NOT NULL,
  `buktibayar` varchar(100) DEFAULT NULL,
  `waktu` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`idtransaksi`, `idpembeli`, `statustransaksi`, `buktibayar`, `waktu`) VALUES
('T20230509213525', 6, 'diterima', '', '2023-05-09 21:35:25'),
('T20230509215755', 7, 'diterima', '', '2023-05-09 21:57:55'),
('T20230607130054', 8, 'diterima', '', '2023-06-07 13:00:54'),
('T20230627162823', 7, 'diterima', '', '2023-06-27 16:28:23'),
('T20230723145604', 10, 'diterima', '', '2023-07-23 14:56:04'),
('T20230723145832', 10, 'diterima', '', '2023-07-23 14:58:32'),
('T20230723151139', 10, 'diterima', '', '2023-07-23 15:11:39'),
('T20230723151217', 10, 'diterima', '', '2023-07-23 15:12:17'),
('T20230723151357', 11, 'diterima', '', '2023-07-23 15:13:57'),
('T20230723151421', 11, 'diterima', '', '2023-07-23 15:14:21'),
('T20230723151538', 11, 'diterima', '', '2023-07-23 15:15:38'),
('T20230727045408', 13, 'menunggu', '', '2023-07-27 04:54:08'),
('T20230727045739', 13, 'menunggu', 'buktibayar-.jpeg', '2023-07-27 04:57:39'),
('T20230727052842', 13, 'menunggu', 'buktibayar-Logo_dashboard.png', '2023-07-27 05:28:42');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_apri`
--

CREATE TABLE `transaksi_apri` (
  `id` int(11) NOT NULL,
  `transaction_date` date DEFAULT NULL,
  `produk` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi_apri`
--

INSERT INTO `transaksi_apri` (`id`, `transaction_date`, `produk`) VALUES
(1, '2023-01-01', 'Bellagio,Essential Sport,Melati,Jimmy Choo Man,Black Intense,White Musk,Silver,Lovely Kw 1,Sexy Gravity,Cool Water Man Kw 1,Vanilla,Exotic Unisex,Aqua Digio Blue Kw 1,Fantasy,Bubble Gum,Legend,Vanilla,Bulgary Pour Homme Soir,Blue Edition Kw 1,Cool Game,Ferrari Man In Red Kw 1'),
(2, '2023-01-02', 'Malaikat Subuh,Still Donna,Flight Of Fancy Kw 1,Dalal,Sedap Malam,Polo Stik,Butterfly,Cool Water Man,Lucious Pink,Vanilla,Lovely Kw 1,Kenzo In Bali,Jovan,Bellagio,Harajuku Lovers,Jaguar Vision Kw 1,Boss Orange,Aigner Black,Boss Energise,Antonio Banderas,Adidas Fair Play'),
(3, '2023-01-03', 'Blue Ice,1000 Bunga,Lovely Kw 1,Bubble Gum,Vip For Him,Dolly Girl,Antonio Banderas,Vintage,Aqua Blue Edition Kw 1,Adidas Fair Play'),
(4, '2023-01-04', 'Kenzo In Bali,1000 Bunga,Melati,1000 Bunga,Flight Of Fancy Kw 1,Vintage'),
(5, '2023-01-05', '1000 Bunga,Bubble Gum,Heavenly Kiss,Antonio Banderas,Antonio Banderas,Blue Edition Kw 1,Sedap Malam'),
(6, '2020-01-06', 'Blue Emotion Kw 1,Lovely Kw 1,Lucious Pink,Aqua Digio Blue Kw 1,Harajuku Lovers'),
(7, '2020-01-07', 'Exotic Unisex,Heavenly Kiss,Kasturi Musk,Essential Sport'),
(8, '2023-02-01', 'Bulgary Pour Homme Soir,Blue Emotion Kw 1,Malaikat Subuh,Bulgary Extreme Kw 1,Blue Emotion Kw 1,Aqua Blue Edition Kw 1'),
(9, '2023-02-02', 'Legend,Melati,Heavenly Kiss,Legend,Boss Orange,Blue Desire Kw 1,Fantasy,Lucious Pink,Blue Desire Kw 1,Aigner Black,Sedap Malam,1000 Bunga'),
(10, '2023-02-03', 'Jaguar Vision Kw 1,Harajuku Lovers,Bellagio,Malaikat Subuh'),
(11, '2023-02-04', 'Manchester United,Legend,Vintage,Bubble Gum,Bulgary Extreme Kw 1,Blue Ice'),
(12, '2023-02-05', 'Legend,Harajuku Lovers,Boss Orange,Blue Ice,Melati,Malaikat Subuh,Jaguar Vision Kw 1,Blue Ice,White Musk'),
(13, '2023-02-06', 'Jaguar Vision Kw 1,Fantasy,Blue Emotion Kw 1,Silver,Boss Orange,Bellagio,Legend,Bubble Gum,Sexy Gravity,Legend'),
(14, '2023-03-07', 'Bulgary Extreme Kw 1,White Musk,Lovely Kw 1,Boss Orange,Lovely Kw 1,Cool Water Man Kw 1,Heavenly Kiss'),
(15, '2023-03-08', 'Blue Emotion Kw 1,Fantasy,Lovely Kw 1,Legend'),
(16, '2023-03-09', 'Kenzo In Bali,Legend,Malaikat Subuh,1000 Bunga,Aigner Black,Legend'),
(17, '2023-03-10', 'Harajuku Lovers,Jaguar Vision Kw 1,Dolly Girl,Malaikat Subuh,Malaikat Subuh,1000 Bunga,Eternity Lady,Melati,Bubble Gum,Blue Ice'),
(18, '2023-03-11', 'Sexy Gravity,Bellagio,Bubble Gum,Bubble Gum,Strawberry,1000 Bunga,Eternity Lady,Bulgary Extreme Kw 1,Dolly Girl,Sexy Gravity,Fantasy'),
(19, '2023-03-12', 'Bulgary Extreme Kw 1,Jaguar Vision Kw 1,Exotic Unisex,Bellagio,Bulgary Extreme Kw 1'),
(20, '2023-03-13', '1000 Bunga,Blue Emotion Kw 1,Bellagio,Bulgary Extreme Kw 1'),
(21, '2023-03-14', 'Vip For Him,Silver,Melati'),
(22, '2023-03-15', 'Bellagio,Melati,Jaguar Vision Kw 1,Melati,Blue Desire Kw 1,Heavenly Kiss,White Musk,Lovely Kw 1,Malaikat Subuh,Lovely Kw 1,Melati'),
(23, '2023-03-16', 'Silver,Bubble Gum,Melati,Bulgary Pour Homme Soir,Blue Emotion Kw 1,Boss Orange'),
(24, '2023-03-17', 'Butterfly,Jaguar Vision Kw 1'),
(25, '2023-03-18', 'Harajuku Lovers,Harajuku Lovers,Blue Ice,Sexy Gravity'),
(26, '2023-03-19', 'Jimmy Choo Man,Malaikat Subuh,1000 Bunga,Bulgary Extreme Kw 1,Boss Orange,Heavenly Kiss,Cool Water Man Kw 1,Blue Emotion Kw 1,Bulgary Pour Homme Soir,Legend'),
(27, '2023-03-20', '1000 Bunga,Silver,Jaguar Vision Kw 1'),
(28, '2023-03-21', 'White Musk,Boss Orange,Sexy Gravity,1000 Bunga,Legend'),
(29, '2023-03-22', 'Malaikat Subuh,Bellagio,Happy Clinique Woman,Blue Ice,Blue Emotion Kw 1,Fantasy,Legend,Sexy Gravity,Boss Orange'),
(30, '2023-03-23', 'Harajuku Lovers,Flight Of Fancy Kw 1,Jaguar Vision Kw 1,Lovely Kw 1,Legend,Lovely Kw 1,Bubble Gum,Jaguar Vision Kw 1'),
(31, '2023-03-24', 'Exotic Unisex,Silver,Fantasy'),
(32, '2023-03-25', 'Malaikat Subuh,Sexy Gravity,Blue Desire Kw 1,Legend,Blue Emotion Kw 1,Aqua Blue Edition Kw 1,Jimmy Choo Man,Fantasy,Melati,Malaikat Subuh'),
(33, '2023-03-26', 'Lovely Kw 1,Silver,Bubble Gum,Antonio Banderas,Bubble Gum'),
(34, '2023-03-27', 'Malaikat Subuh'),
(35, '2023-03-28', 'Antonio Banderas,Silver,Lovely Kw 1,1000 Bunga,Cool Water Man Kw 1,Kasturi Musk,Antonio Banderas,Harajuku Lovers,Bulgary Extreme Kw 1,Kenzo In Bali'),
(36, '2023-03-29', 'Bubble Gum,Vanilla,Butterfly,Silver,Bubble Gum,Silver,Bellagio,Lucious Pink,Harajuku Lovers,Malaikat Subuh,White Musk'),
(37, '2023-03-30', 'Legend,Boss Orange,Legend,Antonio Banderas,1000 Bunga,Bubble Gum,White Musk,Bubble Gum,Silver'),
(38, '2023-03-31', 'Fantasy,Vanilla,Fantasy,Eternity Lady'),
(39, '2023-04-01', 'Jovan,Antonio Banderas,Bulgary Extreme Kw 1,Eternity Lady,Malaikat Subuh,Antonio Banderas'),
(40, '2023-04-02', 'Silver,Bubble Gum,Antonio Banderas,Strawberry,Bubble Gum,Bulgary Extreme Kw 1,Antonio Banderas'),
(41, '2023-04-03', 'Harajuku Lovers,Sexy Gravity,Legend'),
(42, '2023-04-04', 'White Musk,Blue Emotion Kw 1,Vanilla,Butterfly,Silver,Fantasy'),
(43, '2023-04-05', 'Aigner Black,Sexy Gravity,Lovely Kw 1,Dolly Girl,Legend,Sedap Malam,Cool Game'),
(44, '2023-04-06', 'Malaikat Subuh,Fantasy,Vanilla,Jaguar Vision Kw 1,Cool Water Lady,Cool Water Man,Vanilla,Lovely Kw 1,Adidas Fair Play,Jaguar Vision Kw 1,Blue Desire Kw 1,Bubble Gum,Dolly Girl'),
(45, '2023-04-07', '1000 Bunga,Cool Water Man,Lucious Pink,Kasturi Musk,Antonio Banderas,Bellagio,Kenzo In Bali'),
(46, '2023-04-08', 'Fantasy,Antonio Banderas,Blue Ice,Blue Desire Kw 1,Lucious Pink'),
(47, '2023-04-09', 'Sexy Gravity,Butterfly,Malaikat Subuh,Lovely Kw 1'),
(48, '2023-04-10', 'Melati,Antonio Banderas,Antonio Banderas,Lovely Kw 1,Fantasy,Exotic Unisex,Lovely Kw 1,Malaikat Subuh,Aigner Black,Adidas Fair Play,Antonio Banderas'),
(49, '2023-04-11', 'Vanilla,Flight Of Fancy,Boss Orange,Cool Water Man,Vintage,White Musk,Harajuku Lovers,Sexy Gravity'),
(50, '2023-04-12', 'Melati,Vanilla,Bubble Gum,Adidas Fair Play'),
(51, '2023-04-13', 'Antonio Banderas,Silver,Lucious Pink,1000 Bunga,Antonio Banderas'),
(52, '2023-04-14', 'Lovely Kw 1,Bulgary Extreme Kw 1,Antonio Banderas'),
(53, '2023-04-15', 'Antonio Banderas,Bellagio,Bulgary Pour Homme Soir'),
(54, '2023-04-16', 'Fantasy,1000 Bunga,Dolly Girl,Sedap Malam,Malaikat Subuh,Sexy Gravity,Antonio Banderas,Silver,Kenzo In Bali'),
(55, '2023-04-17', 'Lovely Kw 1,Vanilla'),
(56, '2023-04-18', 'Kenzo In Bali,Lovely Kw 1,Vanilla,White Musk'),
(57, '2023-04-19', 'Cool Water Man Kw 1,Melati,Aigner Black,Lovely Kw 1,Bubble Gum,Fantasy,Bulgary Pour Homme Soir,Fantasy,Exotic Unisex,Lucious Pink,Heavenly Kiss,1000 Bunga,Fantasy,Blue Emotion Kw 1'),
(58, '2023-04-20', 'Sexy Gravity,1000 Bunga,Boss Energise,Vanilla,Lovely Kw 1,Happy Clinique Woman,Cool Water Man'),
(59, '2023-04-21', 'Silver,Lovely Kw 1,Bellagio,Blue Desire Kw 1,Kenzo In Bali,Cool Water Man Kw 1,White Musk,Fantasy,Malaikat Subuh'),
(60, '2023-04-22', '1000 Bunga,Antonio Banderas,Vanilla,Bulgary Extreme Kw 1,Boss Energise,Cool Water Man,Bulgary Extreme Kw 1,Flight Of Fancy Kw 1,Malaikat Subuh'),
(61, '2023-04-23', 'Lucious Pink,Dolly Girl,1000 Bunga,Antonio Banderas,Bubble Gum,Jaguar Vision Kw 1,Lucious Pink,Jaguar Vision Kw 1,Bellagio,Fantasy'),
(62, '2023-04-24', '1000 Bunga,Cool Water Man Kw 1,1000 Bunga,Heavenly Kiss,Bellagio,Antonio Banderas,Malaikat Subuh,Eternity Lady,Lucious Pink,Adidas Fair Play'),
(63, '2023-04-25', 'Adidas Fair Play,Boss Energise,Dolly Girl,Vip For Him,Harajuku Lovers,Lovely Kw 1,Vip For Him,Silver,Lovely Kw 1,Silver,Sedap Malam'),
(64, '2023-04-26', 'Antonio Banderas,Silver,Lovely Kw 1,Melati,Sexy Gravity,Bulgary Extreme Kw 1,Antonio Banderas,Vanilla,Vip For Him,Aigner Black'),
(65, '2023-04-27', 'Bulgary Extreme Kw 1,Bubble Gum,Kenzo In Bali,Antonio Banderas,Gahroudh'),
(66, '2023-04-28', 'Bulgary Pour Homme Soir,Harajuku Lovers,Bulgary Extreme Kw 1,Antonio Banderas,Bulgary Extreme Kw 1'),
(67, '2023-04-29', 'Vintage,Vanilla,Antonio Banderas,Kenzo Pour Homme Lady,Harajuku Lovers,Antonio Banderas,Blue Desire Kw 1,Lovely Kw 1,Antonio Banderas,Heavenly Kiss'),
(68, '2023-04-30', 'Malaikat Subuh,Cool Water Man,Jaguar Vision Kw 1,Lovely Kw 1,Cool Water Man Kw 1,Antonio Banderas,Eternity Lady,White Musk,Lovely Kw 1,Malaikat Subuh'),
(69, '2023-05-01', 'Sexy Gravity,Vip For Him,Jaguar Vision Kw 1,Blue Emotion Kw 1,Bulgary Pour Homme Soir,Melati,Bubble Gum,Silver'),
(70, '2023-05-02', 'Vanilla,Bubble Gum,Cool Water Lady,Lucious Pink,Malaikat Subuh,Vanilla,Cool Water Man Kw 1,Bulgary Pour Homme Soir'),
(71, '2023-05-03', '1000 Bunga,Bulgary Pour Homme Soir,Lucious Pink,Antonio Banderas,Jovan,Malaikat Subuh,Blue Desire Kw 1,Blue Desire Kw 1,Fantasy'),
(72, '2023-05-04', 'Bulgary Extreme Kw 1,Kenzo In Bali,Bulgary Extreme Kw 1,Strawberry,Bulgary Pour Homme Soir,Vip For Him,Antonio Banderas'),
(73, '2023-05-05', 'Vanilla,Lucious Pink,Kenzo In Bali'),
(74, '2023-05-06', 'Heavenly Kiss,Cool Water Man,Antonio Banderas,1000 Bunga,Cool Water Man,Essential Sport,Adidas Fair Play,Cool Game,1000 Bunga,Cool Water Man Kw 1,Antonio Banderas'),
(75, '2023-05-07', 'Aqua Blue Edition Kw 1,Melati,Bulgary Extreme Kw 1,Antonio Banderas,Harajuku Lovers,Fantasy,Aqua Blue Edition Kw 1,Butterfly,Eternity Lady,Heavenly Kiss'),
(76, '2023-05-08', 'Bubble Gum,Lovely Kw 1,Lucious Pink,Bellagio,Blue Desire Kw 1,Fantasy,1000 Bunga,Silver,Silver'),
(77, '2023-05-09', 'Melati,Melati,Lovely Kw 1,Bulgary Extreme Kw 1'),
(78, '2023-05-10', 'Strawberry,Malaikat Subuh'),
(79, '2023-05-11', 'Malaikat Subuh,Blue Emotion Kw 1,Bellagio,Fantasy,Antonio Banderas,Lovely Kw 1,Vanilla,Boss Orange,Dolly Girl,Cool Water Man'),
(80, '2023-05-12', 'Boss Orange,Antonio Banderas,Fantasy,Jaguar Vision Kw 1,Antonio Banderas,Bellagio,White Musk'),
(81, '2023-05-13', 'Bubble Gum,Bellagio,Antonio Banderas'),
(82, '2023-05-14', 'Lovely Kw 1,Dolly Girl'),
(83, '2023-05-15', 'Melati,Cool Water Lady,Melati,Bubble Gum'),
(84, '2023-05-16', 'Bellagio,Fantasy,Antonio Banderas,Vip For Him,Bulgary Pour Homme Soir,Vintage,Antonio Banderas'),
(85, '2023-05-17', 'Antonio Banderas,Silver,Melati,Jovan,Aigner Black,Boss Energise,Vanilla,White Musk'),
(86, '2023-05-18', 'Antonio Banderas,Boss Orange,Silver,Blue Emotion Kw 1,Fantasy,Vip For Him,Cool Water Man Kw 1,Vanilla,1000 Bunga,Silver,Heavenly Kiss'),
(87, '2023-05-19', 'Cool Water Man Kw 1,Lovely Kw 1,Cool Water Man Kw 1,Sexy Gravity,Boss Orange'),
(88, '2023-05-20', 'Bulgary Extreme Kw 1,Melati,Antonio Banderas,Eternity Lady,Jaguar Vision Kw 1'),
(89, '2023-05-21', 'Cool Water Man Kw 1,Aigner Black,Kenzo In Bali'),
(90, '2023-05-22', 'Antonio Banderas,Antonio Banderas,Aigner Black,Heavenly Kiss,Antonio Banderas'),
(91, '2023-05-23', 'Antonio Banderas,Lucious Pink,Vanilla,Boss Orange,Vip For Him'),
(92, '2023-05-24', 'Bulgary Pour Homme Soir,Exotic Unisex,Cool Water Man Kw 1,Heavenly Kiss,Essential Sport,Melati,1000 Bunga,Cool Water Man Kw 1,Blue Emotion Kw 1,Sexy Gravity'),
(93, '2023-05-25', 'Bulgary Pour Homme Soir,Silver,Kenzo In Bali,Melati,Bellagio,Antonio Banderas,Adidas Fair Play,Cool Water Man Kw 1'),
(94, '2023-05-26', 'Sexy Gravity,1000 Bunga,Kenzo In Bali,Vip For Him,1000 Bunga,Dolly Girl,Blue Desire Kw 1,Melati,Silver,Bubble Gum,White Musk,Harajuku Lovers,Vip For Him'),
(95, '2023-05-27', 'Adidas Fair Play,Exotic Unisex,Cool Water Man Kw 1,Aqua Digio Blue Kw 1,Vanilla,Silver'),
(96, '2023-05-28', 'Melati,Blue Desire Kw 1,Butterfly,Lovely Kw 1,Harajuku Lovers,Blue Desire Kw 1,Antonio Banderas,Melati,Blue Desire Kw 1,Bubble Gum,Antonio Banderas'),
(97, '2023-05-29', 'Cool Water Man Kw 1,Antonio Banderas,Cool Water Man Kw 1,Cool Water Man,Dolly Girl,Cool Water Man,Lovely Kw 1,Bulgary Extreme Kw 1'),
(98, '2023-05-30', 'Jaguar Vision Kw 1,Cool Water Man Kw 1,Blue Emotion Kw 1,Malaikat Subuh,Silver,Blue Emotion Kw 1,Aqua Digio Blue Kw 1,Jovan,Lucious Pink,Melati'),
(99, '2023-05-31', 'Blue Emotion Kw 1,Harajuku Lovers,Vip For Him,Lovely Kw 1,Harajuku Lovers,Antonio Banderas,Ferrari Man In Red Kw 1,Blue Emotion Kw 1'),
(100, '2023-06-01', 'Blue Desire Kw 1,Malaikat Subuh,Harajuku Lovers,Antonio Banderas,Butterfly,Kenzo In Bali,Lovely Kw 1,Exotic Unisex,Strawberry'),
(101, '2023-06-02', 'Antonio Banderas,Malaikat Subuh,Vip For Him,Melati'),
(102, '2023-06-03', 'Melati,Cool Water Man,Butterfly,Cool Water Man,Dolly Girl'),
(103, '2023-06-04', 'Bulgary Pour Homme Soir,Melati,Jaguar Vision Kw 1,Silver,Malaikat Subuh,Cool Water Man Kw 1'),
(104, '2023-06-05', 'Dolly Girl,Cool Water Man'),
(105, '2023-06-06', 'Heavenly Kiss,Lovely Kw 1,Exotic Unisex,Vintage,Cool Water Lady,Melati'),
(106, '2023-06-07', 'Aqua Blue Edition Kw 1,Aqua Digio Blue Kw 1,Blue Desire Kw 1,Silver,Bulgary Extreme Kw 1,Cool Water Man Kw 1'),
(107, '2023-06-08', 'Aqua Blue Edition Kw 1,Fantasy,Melati,Silver,1000 Bunga,Blue Emotion Kw 1,Lucious Pink,Cool Water Man,Lucious Pink,Malaikat Subuh'),
(108, '2023-06-09', 'Cool Water Man Kw 1,Boss Energise,Lovely Kw 1,Bubble Gum,Heavenly Kiss,Fantasy,Melati,Bulgary Pour Homme Soir,Antonio Banderas'),
(109, '2023-06-10', 'Aqua Blue Edition Kw 1,Jimmy Choo Man,Antonio Banderas,Melati,Antonio Banderas,Cool Water Man,Lovely Kw 1,Cool Water Man Kw 1,Cool Water Man Kw 1'),
(110, '2023-06-11', 'Exotic Unisex,Cool Water Man Kw 1,Essential Sport,Antonio Banderas,Cool Water Man Kw 1,Blue Emotion Kw 1'),
(111, '2023-06-12', 'Silver,Bulgary Extreme Kw 1,Cool Water Man Kw 1,Cool Water Man Kw 1,Blue Emotion Kw 1,Kenzo In Bali,Bellagio'),
(112, '2023-06-13', '1000 Bunga,Cool Water Man Kw 1'),
(113, '2023-06-14', 'Antonio Banderas,Fantasy,Antonio Banderas,Bulgary Extreme Kw 1,Antonio Banderas,Cool Water Man,Kenzo In Bali,Silver,Melati,Cool Water Man Kw 1,Blue Desire Kw 1,Kenzo In Bali'),
(114, '2023-06-15', 'Antonio Banderas,Malaikat Subuh,Blue Emotion Kw 1,Bubble Gum,Fantasy,Cool Water Man Kw 1,Cool Water Man Kw 1'),
(115, '2023-06-16', 'Bulgary Extreme Kw 1,1000 Bunga,Lovely Kw 1,1000 Bunga,Lovely Kw 1,Fantasy,Vip For Him,Cool Water Man'),
(116, '2023-06-17', 'Cool Water Man Kw 1,Antonio Banderas,1000 Bunga,Silver,Fantasy'),
(117, '2023-06-18', 'Lovely Kw 1'),
(118, '2023-06-19', 'Vip For Him,1000 Bunga,Jovan,Adidas Fair Play,Aqua Digio Blue Kw 1,White Musk,Vip For Him'),
(119, '2023-06-20', 'Bulgary Extreme Kw 1,Blue Desire Kw 1,Bulgary Extreme Kw 1,Fantasy,Bubble Gum,Aqua Digio Blue Kw 1,Antonio Banderas'),
(120, '2023-06-21', 'Antonio Banderas,Cool Water Man,1000 Bunga,Antonio Banderas,Lovely Kw 1,Silver,Vip For Him,Malaikat Subuh,Blue Desire Kw 1,Aqua Digio Blue Kw 1,Fantasy,Bulgary Extreme Kw 1,Antonio Banderas,Bulgary Pour Homme Soir,Bulgary Pour Homme Soir'),
(121, '2023-06-22', 'Malaikat Subuh,Ferrari Man In Red Kw 1,Vanilla,Legend,Ferrari Man In Red Kw 1,Blue Emotion Kw 1,Lovely Kw 1,Sexy Gravity,Lovely Kw 1'),
(122, '2023-06-23', '1000 Bunga,1000 Bunga,Bubble Gum,Antonio Banderas,Blue Desire Kw 1'),
(123, '2023-06-24', 'Sexy Gravity,Bulgary Extreme Kw 1,Silver,Bulgary Extreme Kw 1,Jaguar Vision Kw 1,Bulgary Pour Homme Soir'),
(124, '2023-06-25', 'Silver,Boss Energise,Jaguar Vision Kw 1,Bulgary Extreme Kw 1,Sexy Gravity,Blue Emotion Kw 1,Heavenly Kiss,Vanilla,Vip For Him,Adidas Fair Play,Fantasy,Lucious Pink'),
(125, '2023-06-26', 'Malaikat Subuh,Bulgary Extreme Kw 1,Lucious Pink,Melati,Vip For Him,Jovan,Aqua Blue Edition Kw 1,Cool Water Man,Vanilla,Silver,Silver,Blue Emotion Kw 1'),
(126, '2023-06-27', 'Fantasy,Vanilla,Blue Emotion Kw 1,Vanilla,Chic For Man Kw 1,Blue Desire Kw 1'),
(127, '2023-06-28', 'Kenzo In Bali,Blue Emotion Kw 1,Blue Desire Kw 1,White Musk,Jovan,1000 Bunga,Malaikat Subuh,Aigner Black,Ferrari Man In Red Kw 1,Bulgary Extreme Kw 1,Bulgary Extreme Kw 1'),
(128, '2023-06-29', 'Blue Desire Kw 1,Antonio Banderas,Malaikat Subuh,Fantasy,1000 Bunga,Antonio Banderas,Bubble Gum,Lovely Kw 1,Antonio Banderas'),
(129, '2023-06-30', 'Kasturi Musk,Bulgary Extreme Kw 1,Blue Desire Kw 1,Cobra,Fantasy,Vip For Him,Fantasy,Antonio Banderas,Aqua Blue Edition Kw 1,Blue Emotion Kw 1,Cool Water Lady'),
(130, '2023-07-01', 'Bellagio,Melati,Silver,Dolly Girl,Boss Orange,Cool Water Man'),
(131, '2023-07-02', 'Bubble Gum,Vanilla,Vanilla,Ferrari Man In Red Kw 1,212 Sexy Man,Blue Emotion Kw 1,Bubble Gum,Lovely Kw 1,1000 Bunga'),
(132, '2023-07-03', 'Blue Emotion Kw 1,Aigner Black,Vanilla,Cool Water Man'),
(133, '2023-07-04', 'Kenzo In Bali,Kasturi Musk,Melati,212 Sexy Man,Dolly Girl,Fantasy,Melati,Bubble Gum,Sexy Gravity,Sexy Gravity,Bubble Gum'),
(134, '2023-07-05', '1000 Bunga,Fantasy,Bulgary Extreme Kw 1,Cool Water Lady,Silver,212 Sexy Man'),
(135, '2023-07-06', 'Bubble Gum,Melati,Adidas Fair Play,Blue Emotion Kw 1'),
(136, '2023-07-07', '212 Sexy Man,Jovan'),
(137, '2023-07-08', '1000 Bunga,Antonio Banderas,Vanilla,1000 Bunga,White Musk,Malaikat Subuh,Butterfly,Sexy Gravity'),
(138, '2023-07-09', 'Kasturi Musk,Jean Paul Gaultier,Blue Emotion Kw 1,Lucious Pink,Blue Desire Kw 1,Blue Emotion Kw 1'),
(139, '2023-07-10', 'Vanilla,Bubble Gum,Harajuku Lovers,Strawberry,Aigner Black,White Musk,1000 Bunga'),
(140, '2023-07-11', 'Lovely Kw 1,Bulgary Extreme Kw 1,Gahroudh,Butterfly,Melati,1000 Bunga,Boss Orange'),
(141, '2023-07-12', 'Sexy Gravity,Sexy Gravity,Charly Silver,Butterfly,212 Sexy Man,Cool Water Man,Dolly Girl'),
(142, '2023-07-13', 'Butterfly,Antonio Banderas,Sexy Gravity,Sexy Gravity,Boss Orange,Lovely Kw 1,Eternity Lady,Boss Energise,Blue Emotion Kw 1,Blue Desire Kw 1'),
(143, '2023-07-14', 'Silver,Malaikat Subuh,White Musk,Sexy Gravity,Exotic Unisex,Bulgary Pour Homme Soir,Vintage,Adidas Fair Play'),
(144, '2023-07-15', 'Lovely Kw 1,Melati,Malaikat Subuh,Sexy Gravity,Dolly Girl,Fantasy,Antonio Banderas,Blue Emotion Kw 1,Blue Emotion Kw1,1000 Bunga,Fantasy'),
(145, '2023-07-16', 'Jovan,Butterfly,Fantasy,Boss Orange,Silver,Bellagio,1000 Bunga,Vanilla,Antonio Banderas,Cool Water Man,Adidas Fair Play,Jovan'),
(146, '2023-07-17', '1000 Bunga,Sedap Malam,Blue Desire Kw 1,Kenzo In Bali,Fantasy Kw 1,1000 Bunga,Malaikat Subuh,Silver,Silver,Melati'),
(147, '2023-07-18', 'Blue Emotion Kw 1,Antonio Banderas,Bubble Gum,Sedap Malam,Bubble Gum,Happy Clinique Woman,Harajuku Lovers,Malaikat Subuh,Lucious Pink'),
(148, '2023-07-19', 'Malaikat Subuh,Melati,Melati,Bulgary Extreme Kw 1,Kenzo In Bali,Jovan'),
(149, '2023-07-20', '1000 Bunga,Fantasy,Vanilla,Sexy Gravity'),
(150, '2023-07-21', 'Silver,1000 Bunga,Fantasy,Melati,Ferrari Man In Red Kw 1,Ferrari Man In Red Kw 1,Sexy Gravity,Sexy Gravity,Sexy Gravity'),
(151, '2023-07-22', 'Fantasy,Blue Emotion Kw 1,Lovely Kw 1'),
(152, '2023-07-23', 'Eternity Lady,Lovely Kw 1,Adidas Fair Play,Melati,Melati,Bulgary Extreme Kw 1,Aigner Black,Jovan,Kenzo In Bali'),
(153, '2023-07-24', 'Lovely Kw 1,Bulgary Extreme Kw 1,Bubble Gum,Bulgary Extreme Kw 1,Fantasy,Blue Emotion Kw 1,Kenzo In Bali,Blue Desire Kw 1,Malaikat Subuh,Kenzo In Bali,Bulgary Extreme Kw 1'),
(154, '2023-07-25', 'White Musk,White Musk,Melati,Bulgary Extreme Kw 1,Silver,Charly Silver,Antonio Banderas,Bellagio,Silver,Blue Emotion Kw 1,Malaikat Subuh,Blue Emotion Kw 1,Christiano Ronaldo,Aigner Black,Lovely Kw 1'),
(155, '2023-07-26', '1000 Bunga,1000 Bunga,Melati,Melati,Butterfly,Vanilla,Kenzo In Bali'),
(156, '2023-07-27', 'Boss Orange,212 Sexy Man,Butterfly,Fantasy'),
(157, '2023-07-28', 'Blue Desire Kw 1,Blue Emotion Kw 1,White Musk,Harajuku Lovers,Fantasy,1000 Bunga,Dolly Girl'),
(158, '2023-07-29', 'Vanilla,Melati,Cool Water Man,Gahroudh,1000 Bunga,Butterfly,Harajuku Lovers,Adidas Fair Play'),
(159, '2023-07-30', 'Butterfly,Cool Water Man,1000 Bunga,Fantasy,Fantasy,Adidas Fair Play,White Musk,Gahroudh,Fantasy,Cool Water Man,Dolly Girl'),
(160, '2023-07-31', 'Adidas Fair Play,Sexy Gravity,Fantasy,1000 Bunga,Lovely Kw 1,Melati,Melati,Vanilla,Kasturi Musk,Sexy Gravity,Silver,Sedap Malam,Bubble Gum,Blue Emotion Kw 1'),
(161, '2023-08-01', 'Lucious Pink,Melati,Boss Orange,Silver,Bubble Gum,Harajuku Lovers,Vanilla'),
(162, '2023-08-02', 'Bulgary Extreme Kw 1,1000 Bunga,Bulgary Extreme Kw 1,Malaikat Subuh,Sedap Malam,Fantasy'),
(163, '2023-08-03', 'Malaikat Subuh,Vanilla,Kenzo In Bali,Melati,Blue Desire Kw 1,Gahroudh,Happy Clinique Woman,Bulgary Extreme Kw 1'),
(164, '2023-08-04', 'Gahroudh,Eternity Lady,Adidas Fair Play,Melati,Bulgary Extreme Kw 1,Adidas Fair Play,Blue Emotion Kw 1,Fantasy'),
(165, '2023-08-05', 'Sedap Malam,Adidas Fair Play,Sexy Gravity,Lovely Kw 1,Cool Water Man,Kenzo In Bali,Vip For Him'),
(166, '2023-08-06', 'Sexy Gravity,Adidas Fair Play,Harajuku Lovers,Silver,Polo Supreme Oud Kw 1,212 Sexy Man,Fantasy,Harajuku Lovers,White Musk,Blue Emotion Kw 1'),
(167, '2023-08-07', 'Sexy Gravity,Dolly Girl,Adidas Fair Play,1000 Bunga,Malaikat Subuh,Fantasy,Vanilla,Lucious Pink'),
(168, '2023-08-08', 'Sexy Gravity,Sexy Gravity,Adidas Fair Play,Cool Water Lady,Bulgary Extreme Kw 1,Vintage,Dolly Girl,Bubble Gum'),
(169, '2023-08-09', '1000 Bunga,Dolly Girl,Lacoste Land Kw 1,Blue Desire Kw 1,Adiadas Fair Play,White Musk,Adidas Fair Play,Bulgary Extreme Kw 1,Dolly Girl'),
(170, '2023-08-10', 'Adidas Fair Play,Sexy Gravity,Dolly Girl,Adidas Fair Play'),
(171, '2023-08-11', 'Adidas Fair Play,Dolly Girl,Jovan,Sexy Gravity,Dolly Girl,Vanilla,Dolly Girl'),
(172, '2023-08-12', 'Vanilla,Sexy Gravity,Malaikat Subuh,Dolly Girl,Blue Emotion Kw 1,Harajuku Lovers,Bubble Gum'),
(173, '2023-08-13', 'Bulgary Extreme Kw 1,Silver,Dolly Girl,Cool Water Man,Bulgary Extreme Kw 1,Melati,Flight Of Fancy Kw 1'),
(174, '2023-08-14', 'Vanilla,Bubble Gum,Jovan,Cool Water Lady,1000 Bunga,Adidas Fair Play'),
(175, '2023-08-15', 'Bubble Gum,Aqua Blue Edition Kw 1,Adidas Fair Play,Melati'),
(176, '2023-08-16', 'Adidas Fair Play,Bulgary Extreme Kw 1,Hidden Fantasy,Adidas Fair Play'),
(177, '2023-08-17', 'Silver,Cool Water Lady,Dolly Girl,White Musk,212 Sexy Man,Melati,White Musk,Adidas Fair Play,Lovely Kw 1,Dolly Girl,Silver'),
(178, '2023-08-18', 'White Musk,Strawberry,Lovely Kw 1,Bubble Gum,Cool Water Man'),
(179, '2023-08-19', 'Melati,Sedap Malam,Aigner Black,Adidas Fair Play,White Musk,Lovely Kw 1,Sexy Gravity,Kenzo In Bali,Bellagio,Silver'),
(180, '2023-08-20', 'Bellagio,Jasmine Noir,Blue Desire Kw 1,1000 Bunga,Adidas Fair Play'),
(181, '2023-08-21', 'Kenzo In Bali,Blue Desire Kw 1,Lucious Pink,Lovely Kw 1,Fantasy,Silver'),
(182, '2023-08-22', 'Missik Putih Super,Malaikat Subuh,Boss Energise,Bulgary Extreme Kw 1,Vintage,Melati,Eternity Lady,Melati,Bulgary Extreme Kw 1'),
(183, '2023-08-23', 'Melati,1000 Bunga,Ocean Royal,The Brilliant Game,Melati,Boss Energise,Blue Emotion Kw 1'),
(184, '2023-08-24', 'Bulgary Extreme Kw 1,Blue Desire Kw 1,Adidas Fair Play,White Musk,Lovely Kw 1,Jaguar Marc Ii,Lovely Kw 1,Fantasy,Harajuku Lovers'),
(185, '2023-08-25', 'Blue Emotion Kw 1,Adidas Fair Play,Adidas Fair Play,212 Sexy Man,Lovely Kw 1'),
(186, '2023-08-26', 'Kenzo Air,Bellagio,Lovely Kw 1,Vanilla,Vanilla,Vanilla'),
(187, '2023-08-27', 'Blue Desire Kw 1,Blue Desire Kw 1,Adidas Fair Play,Lovely Kw 1,Bubble Gum'),
(188, '2023-08-28', 'Sexy Gravity,Malaikat Subuh,Blue Emotion Kw 1,Silver'),
(189, '2023-08-29', 'Bubble Gum,Malaikat Subuh,Missik Putih Super,Lucious Pink,Sexy Gravity,Bubble Gum,Bubble Gum,Polo Sport Kw 1,Blue Emotion Kw 1'),
(190, '2023-08-30', 'Silver,Polo Sport Kw 1,1000 Bunga,Lucious Pink'),
(191, '2023-08-31', 'Silver,Bulgary Extreme Kw 1,Lucious Pink,Lucious Pink'),
(192, '2023-09-01', 'Bulgary Extreme Kw 1,Silver,Bulgary Pour Homme Soir,Boss Energise,Eternity Lady,Vanilla,Silver,Malaikat Subuh,Malaikat Subuh,Malaikat Subuh'),
(193, '2023-09-02', 'Silver,Melati,Kasturi Musk,Sedap Malam,Melati,Fantasy'),
(194, '2023-09-03', 'Blue Desire Kw 1,Bulgary Extreme Kw 1,Bubble Gum'),
(195, '2023-09-04', 'Melati,Silver,Fantasy,Bulgary Extreme Kw 1,Bubble Gum,Fantasy,Lovely Kw 1,Harajuku Lovers'),
(196, '2023-09-05', 'Blue Emotion Kw 1,White Musk,Boss Energise,Fantasy,Fantasy,Malaikat Subuh'),
(197, '2023-09-06', 'White Musk,Bulgary Extreme Kw 1,Adidas Fair Play,Gahroudh'),
(198, '2023-09-07', 'Bubble Gum,Boss Orange,Melati,Sexy Gravity,Butterfly,Boss Energise,Vintage,Melati,Harajuku Lovers'),
(199, '2023-09-08', 'Silver,Boss Energise,Eternity Lady,Vanilla,Silver,Malaikat Subuh,Malaikat Subuh,Malaikat Subuh'),
(200, '2023-09-09', 'Blue Emotion Kw 1,Boss Energise,Lucious Pink,Bulgary Extreme Kw 1,Adidas Fair Play,Bubble Gum,Silver,Kenzo In Bali,Boss Energise,Strawberry,Bubble Gum,Essential Sport');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_list`
--

CREATE TABLE `transaksi_list` (
  `idtransaksilist` int(11) NOT NULL,
  `idtransaksi` varchar(20) CHARACTER SET utf8mb4 NOT NULL,
  `idproduk` int(11) NOT NULL,
  `durasi` int(11) NOT NULL,
  `waktu_order` datetime DEFAULT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transaksi_list`
--

INSERT INTO `transaksi_list` (`idtransaksilist`, `idtransaksi`, `idproduk`, `durasi`, `waktu_order`, `total`) VALUES
(8, 'T20230509213525', 3, 1, NULL, 700000),
(9, 'T20230509215755', 3, 1, NULL, 700000),
(10, 'T20230607130054', 17, 1, NULL, 50000),
(11, 'T20230627162823', 16, 1, NULL, 50000),
(12, 'T20230723145604', 15, 1, NULL, 50000),
(13, 'T20230723145832', 10, 1, NULL, 600000),
(14, 'T20230723145832', 10, 1, NULL, 600000),
(15, 'T20230723151139', 13, 1, NULL, 50000),
(16, 'T20230723151217', 14, 1, NULL, 50000),
(17, 'T20230723151357', 11, 1, NULL, 50000),
(18, 'T20230723151421', 9, 1, NULL, 600000),
(19, 'T20230723151538', 3, 1, NULL, 600000),
(24, 'T20230727045408', 5, 2, '2023-07-26 20:33:32', 1200000),
(25, 'T20230727045408', 5, 3, '2023-07-27 04:53:32', 1620000),
(26, 'T20230727045739', 6, 1, '2023-07-27 04:57:24', 600000),
(27, 'T20230727052842', 8, 2, '2023-07-27 05:28:23', 1200000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(150) NOT NULL,
  `notelp` varchar(15) NOT NULL,
  `role` enum('pembeli','admin','adminsuper') NOT NULL,
  `aktif` enum('T','Y') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `nama`, `email`, `password`, `notelp`, `role`, `aktif`) VALUES
(2, 'Administrtor', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '082382000703', 'admin', 'Y'),
(6, 'fajar', 'fajar@gmail.com', '202cb962ac59075b964b07152d234b70', '082363702229', 'pembeli', 'Y'),
(7, 'adi', 'adi@gmail.com', '202cb962ac59075b964b07152d234b70', '085372889067', 'pembeli', 'Y'),
(8, 'adi', 'adi1@gmail.com', 'caf1a3dfb505ffed0d024130f58c5cfa', '082145671234', 'pembeli', 'Y'),
(9, 'pimpinan', 'pimpinan@gmail.com', '202cb962ac59075b964b07152d234b70', '082382000703', 'admin', 'Y'),
(10, 'Ahmadi', 'ahmadi@gmail.com', '5e12279ffda7e11a3225660977df2be6', '0822712667', 'pembeli', 'Y'),
(11, 'junaidi', 'junaidi@gmail.com', 'cfd695641ef28fabb0b10ec87ec12fc4', '2039203909', 'pembeli', 'Y'),
(12, 'Febri Kukuh Santoso', 'santosofebrikukuh@gmail.com', '82682943a05de360abb183236c632bd6', '082140647578', 'pembeli', 'Y'),
(13, 'Febri Kukuh Santoso', 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3', '081210910303', 'pembeli', 'Y'),
(15, 'Admin Super', 'adminsuper@gmail.com', '71e23baee837c5d2952f93a29b113cab', '08123456', 'adminsuper', 'Y');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`idartikel`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`idcart`),
  ADD KEY `idcart` (`idcart`),
  ADD KEY `idproduk` (`idproduk`),
  ADD KEY `idpembeli` (`idpembeli`);

--
-- Indexes for table `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`id_config`);

--
-- Indexes for table `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`data_id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`idkategori`);

--
-- Indexes for table `keluhan`
--
ALTER TABLE `keluhan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `process_log`
--
ALTER TABLE `process_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`idproduk`),
  ADD KEY `idkategori` (`idkategori`);

--
-- Indexes for table `promo`
--
ALTER TABLE `promo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_product` (`id_product`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`idtransaksi`),
  ADD KEY `idproduk` (`idpembeli`);

--
-- Indexes for table `transaksi_apri`
--
ALTER TABLE `transaksi_apri`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi_list`
--
ALTER TABLE `transaksi_list`
  ADD PRIMARY KEY (`idtransaksilist`),
  ADD KEY `idtransaksi` (`idtransaksi`),
  ADD KEY `idproduk` (`idproduk`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `idartikel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `idcart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `config`
--
ALTER TABLE `config`
  MODIFY `id_config` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `data`
--
ALTER TABLE `data`
  MODIFY `data_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `idkategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `keluhan`
--
ALTER TABLE `keluhan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `process_log`
--
ALTER TABLE `process_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `idproduk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `promo`
--
ALTER TABLE `promo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transaksi_apri`
--
ALTER TABLE `transaksi_apri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;

--
-- AUTO_INCREMENT for table `transaksi_list`
--
ALTER TABLE `transaksi_list`
  MODIFY `idtransaksilist` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`idproduk`) REFERENCES `produk` (`idproduk`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_3` FOREIGN KEY (`idpembeli`) REFERENCES `user` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_ibfk_2` FOREIGN KEY (`idkategori`) REFERENCES `kategori` (`idkategori`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `promo`
--
ALTER TABLE `promo`
  ADD CONSTRAINT `promo_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `produk` (`idproduk`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_3` FOREIGN KEY (`idpembeli`) REFERENCES `user` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksi_list`
--
ALTER TABLE `transaksi_list`
  ADD CONSTRAINT `transaksi_list_ibfk_1` FOREIGN KEY (`idtransaksi`) REFERENCES `transaksi` (`idtransaksi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_list_ibfk_2` FOREIGN KEY (`idproduk`) REFERENCES `produk` (`idproduk`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;
