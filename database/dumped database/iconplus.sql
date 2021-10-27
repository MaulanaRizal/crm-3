-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2021 at 05:53 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iconplus`
--

-- --------------------------------------------------------

--
-- Table structure for table `activation_list`
--

CREATE TABLE `activation_list` (
  `ID_AL` int(11) NOT NULL,
  `ID_AGREEMENT` int(11) DEFAULT NULL,
  `NO_AL` varchar(256) DEFAULT NULL,
  `CRM_STATUS` varchar(256) DEFAULT NULL,
  `SBU` varchar(256) DEFAULT NULL,
  `PEMILIK` varchar(256) DEFAULT NULL,
  `DEKRIPSI` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `activation_request`
--

CREATE TABLE `activation_request` (
  `ID_AR` int(11) NOT NULL,
  `ID_AGREEMENT` int(11) DEFAULT NULL,
  `NO_AR` varchar(256) DEFAULT NULL,
  `TANGGAL_AKTIVASI` date DEFAULT NULL,
  `TANGGAL_PERMINTAAN_AKTIVASI` date DEFAULT NULL,
  `TANGGAL_TERAKTIVASI` date DEFAULT NULL,
  `CRM_STATUS` varchar(256) DEFAULT NULL,
  `PEMILIK` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `addreess`
--

CREATE TABLE `addreess` (
  `ID_ADDRESS` int(11) NOT NULL,
  `ID_OPPORTUNITY` int(11) DEFAULT NULL,
  `NO_ADDRESS` varchar(256) DEFAULT NULL,
  `NAMA` varchar(256) DEFAULT NULL,
  `KATEGORI` varchar(256) DEFAULT NULL,
  `TIPE` varchar(256) DEFAULT NULL,
  `KORDINAT` varchar(256) DEFAULT NULL,
  `CABANG_SBU` varchar(256) DEFAULT NULL,
  `NEGARA` varchar(256) DEFAULT NULL,
  `PROVINSI` varchar(256) DEFAULT NULL,
  `KABUPATEN` varchar(256) DEFAULT NULL,
  `KECAMATAN` varchar(256) DEFAULT NULL,
  `JALAN` varchar(256) DEFAULT NULL,
  `KODE_POST` varchar(256) DEFAULT NULL,
  `ALAMAT` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `agreements`
--

CREATE TABLE `agreements` (
  `ID_AGREEMENT` int(11) NOT NULL,
  `ID_OPPORTUNITY` int(11) NOT NULL,
  `ID_USER` int(11) NOT NULL,
  `NO_AGREEMENT` varchar(256) DEFAULT NULL,
  `TANGGAL_AGREEMENT` date DEFAULT NULL,
  `TANGGAL_MULAI` date DEFAULT NULL,
  `TANGGAL_BERAKHIR` date DEFAULT NULL,
  `IS_RENEWAL` varchar(256) DEFAULT NULL,
  `JENIS_TAGIHAN` varchar(256) DEFAULT NULL,
  `TANGGAL_POTONG` date DEFAULT NULL,
  `TIPE_PERIODE` varchar(256) DEFAULT NULL,
  `PERIODE` int(11) DEFAULT NULL,
  `PER_PERIODE` varchar(256) DEFAULT NULL,
  `JANGKA_WAKTU` varchar(256) DEFAULT NULL,
  `AGREEMENT_TEKS` varchar(256) DEFAULT NULL,
  `HUKUMAN` varchar(256) DEFAULT NULL,
  `AKUN_BANK` varchar(256) DEFAULT NULL,
  `REKENING` varchar(256) DEFAULT NULL,
  `CRM_STATUS` varchar(256) DEFAULT NULL,
  `SBU_OWNER` varchar(256) DEFAULT NULL,
  `PEMILIK` varchar(256) DEFAULT NULL,
  `DESKRIPSI` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `annual_target`
--

CREATE TABLE `annual_target` (
  `ID_ANNUAL` int(11) NOT NULL,
  `ID_SBU` int(11) DEFAULT NULL,
  `ANNUAL_TARGET` varchar(256) NOT NULL,
  `PERIODE` int(11) NOT NULL,
  `CRM_STATUS` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `annual_target`
--

INSERT INTO `annual_target` (`ID_ANNUAL`, `ID_SBU`, `ANNUAL_TARGET`, `PERIODE`, `CRM_STATUS`) VALUES
(17, 1, 'Rp. 100.000.000', 2020, 'Ongoing'),
(18, 1, 'Rp. 1.000.000.000', 2021, 'Ongoing'),
(19, 2, 'Rp. 1', 2020, 'Ongoing'),
(20, 2, 'Rp. 1', 2021, 'Ongoing'),
(21, 2, 'Rp. 12', 2022, 'Ongoing');

-- --------------------------------------------------------

--
-- Table structure for table `bakbb`
--

CREATE TABLE `bakbb` (
  `ID_BAKBB` int(11) NOT NULL,
  `ID_OPPORTUNITY` int(11) DEFAULT NULL,
  `ID_AGREEMENT` int(11) DEFAULT NULL,
  `NO_BAKBB` varchar(256) DEFAULT NULL,
  `TIPE` varchar(256) DEFAULT NULL,
  `OPPORTUNITY` varchar(256) DEFAULT NULL,
  `AGGREMENT_ID` varchar(256) DEFAULT NULL,
  `PEMILIK` varchar(256) DEFAULT NULL,
  `TANGGAL` date DEFAULT NULL,
  `PIHAK_PERTAMA` varchar(256) DEFAULT NULL,
  `PERWAKILAN` varchar(256) DEFAULT NULL,
  `TELEPON` varchar(256) DEFAULT NULL,
  `PIHAK_KEDUA` varchar(256) DEFAULT NULL,
  `PERWAKILAN_PELANGGAN` varchar(256) DEFAULT NULL,
  `TOTAL_PEMASANGAN` int(11) DEFAULT NULL,
  `TOTAL_BIAYA_LANGGANAN` int(11) DEFAULT NULL,
  `TOTAL` int(11) DEFAULT NULL,
  `JUMLAH_HARI_PENAGIHAN` int(11) DEFAULT NULL,
  `JUMLAH_BULAN` int(11) DEFAULT NULL,
  `ALAMAT_PENAGIHAN` varchar(256) DEFAULT NULL,
  `SBU` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `boq`
--

CREATE TABLE `boq` (
  `ID_BOQ` int(11) NOT NULL,
  `ID_PS` int(11) DEFAULT NULL,
  `MATERIAL` varchar(256) DEFAULT NULL,
  `DESKRIPSI` varchar(256) DEFAULT NULL,
  `TIPE_MATERIAL` varchar(256) DEFAULT NULL,
  `BRAND` varchar(256) DEFAULT NULL,
  `QUANTITY` int(11) DEFAULT NULL,
  `HARGA_UNIT` int(11) DEFAULT NULL,
  `SAP` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `leads`
--

CREATE TABLE `leads` (
  `ID_LEADS` int(11) NOT NULL,
  `ID_USER` int(11) DEFAULT NULL,
  `TOPIC` int(11) DEFAULT NULL,
  `NAMA` varchar(256) DEFAULT NULL,
  `PEKERJAAN` varchar(256) DEFAULT NULL,
  `TELEPON` varchar(256) DEFAULT NULL,
  `COORDINAT` varchar(256) DEFAULT NULL,
  `ALAMAT` varchar(256) DEFAULT NULL,
  `PENAWARAN` date DEFAULT NULL,
  `PENAWARAN_KEMBALI` date DEFAULT NULL,
  `AKTIVITAS` varchar(1024) DEFAULT NULL,
  `SUMBER_LEAD` varchar(256) DEFAULT NULL,
  `RATING` varchar(256) DEFAULT NULL,
  `CRM_STATUS` varchar(256) DEFAULT NULL,
  `PEMILIK` varchar(256) DEFAULT NULL,
  `ASSIGN_USER` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `ID_MENU` int(11) NOT NULL,
  `MEN_ID_MENU` int(11) DEFAULT NULL,
  `NAMA_MENU` varchar(256) NOT NULL,
  `ICON` varchar(256) DEFAULT NULL,
  `LINK` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`ID_MENU`, `MEN_ID_MENU`, `NAMA_MENU`, `ICON`, `LINK`) VALUES
(1, NULL, 'Dashboard', '<i class=\"mdi mdi-gauge\"></i>', 'user/dashboard'),
(2, 1, 'Manajemen Menu', '<i class=\'mdi mdi-settings\'>', 'menu'),
(12, 1, 'Pengguna', '<i class=\'mdi mdi-account\'>', 'pengguna'),
(13, 1, 'Target Tahunan', '<i class=\'mdi mdi-chart-bar\'>', 'target_tahunan');

-- --------------------------------------------------------

--
-- Table structure for table `opportunities`
--

CREATE TABLE `opportunities` (
  `ID_OPPORTUNITY` int(11) NOT NULL,
  `NO_OPPORTUNITY` varchar(256) DEFAULT NULL,
  `TOPIC` varchar(256) DEFAULT NULL,
  `TANGGAL` date DEFAULT NULL,
  `TANGGAL_TARGET` date DEFAULT NULL,
  `TIPE_SURVEY` varchar(256) DEFAULT NULL,
  `WAKTU_PEMESANAN` varchar(256) DEFAULT NULL,
  `PENDAPATAN` int(11) DEFAULT NULL,
  `ANGGARAN` int(11) DEFAULT NULL,
  `PROSES_PEMESANAN` varchar(256) DEFAULT NULL,
  `DESKRIPSI` varchar(256) DEFAULT NULL,
  `SITUASI_SEKARANG` varchar(256) DEFAULT NULL,
  `KEBUTUHAN_PELANGGAN` varchar(256) DEFAULT NULL,
  `SOLUSI` varchar(256) DEFAULT NULL,
  `AKTIVITAS` varchar(1024) DEFAULT NULL,
  `KATEGORI` varchar(256) DEFAULT NULL,
  `CRM_STATUS` varchar(256) DEFAULT NULL,
  `SBU` varchar(256) DEFAULT NULL,
  `PEMILIK` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `ID_PRODUCT` int(11) NOT NULL,
  `NAMA_PRODUCT` varchar(256) DEFAULT NULL,
  `SEKALI_PAKAI` varchar(256) DEFAULT NULL,
  `AWAL_PENGGUNAAN` varchar(256) DEFAULT NULL,
  `AKHIR_PENGGUNAAN` varchar(256) DEFAULT NULL,
  `HARGA_DEFAULT` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product_line_item`
--

CREATE TABLE `product_line_item` (
  `ID_PLI` int(11) NOT NULL,
  `NO_PLI` varchar(256) DEFAULT NULL,
  `ID_AR` int(11) DEFAULT NULL,
  `ID_BAKBB` int(11) DEFAULT NULL,
  `ID_PS` int(11) DEFAULT NULL,
  `ID_PA` int(11) DEFAULT NULL,
  `ACT_ID_AL` int(11) DEFAULT NULL,
  `ID_SERVICE` int(11) DEFAULT NULL,
  `ID_PRODUCT` int(11) DEFAULT NULL,
  `ID_SLA` int(11) DEFAULT NULL,
  `ID_AGREEMENT` int(11) DEFAULT NULL,
  `DESKRIPSI` varchar(1024) DEFAULT NULL,
  `BANDWIDTH` varchar(256) DEFAULT NULL,
  `PRICE_UNIT` int(11) DEFAULT NULL,
  `QUANTITY` int(11) DEFAULT NULL,
  `DSICOUNT` int(11) DEFAULT NULL,
  `JUMLAH` int(11) DEFAULT NULL,
  `HJT_NAMA` varchar(256) DEFAULT NULL,
  `HJT_HARGA` int(11) DEFAULT NULL,
  `TV_ADD_ON` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `progress`
--

CREATE TABLE `progress` (
  `ID_PROGRESS` int(11) NOT NULL,
  `ID_PS` int(11) NOT NULL,
  `TANGGAL` date DEFAULT NULL,
  `KENDALA` varchar(256) DEFAULT NULL,
  `DESKRIPSI` varchar(256) DEFAULT NULL,
  `CRM_STATUS` varchar(256) DEFAULT NULL,
  `PEMILIK` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `project_activation`
--

CREATE TABLE `project_activation` (
  `ID_PA` int(11) NOT NULL,
  `ID_OPPORTUNITY` int(11) DEFAULT NULL,
  `NO_PA` varchar(256) DEFAULT NULL,
  `CRM_STATUS` varchar(256) DEFAULT NULL,
  `PEMILIK` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `project_activation_node`
--

CREATE TABLE `project_activation_node` (
  `ID_PA_NODE` int(11) NOT NULL,
  `ID_PA` int(11) DEFAULT NULL,
  `NO_PA_NODE` varchar(256) DEFAULT NULL,
  `CRM_STATUS` varchar(256) DEFAULT NULL,
  `PIC` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `project_initation`
--

CREATE TABLE `project_initation` (
  `ID_INITATION` int(11) NOT NULL,
  `ID_PA_NODE` int(11) DEFAULT NULL,
  `NO_INIATION` varchar(256) DEFAULT NULL,
  `TANGGAL_MULAI` date DEFAULT NULL,
  `KENDALA` varchar(256) DEFAULT NULL,
  `CRM_STATUS` varchar(256) DEFAULT NULL,
  `CREATED_ON` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `project_survey`
--

CREATE TABLE `project_survey` (
  `ID_PS` int(11) NOT NULL,
  `ID_OPPORTUNITY` int(11) DEFAULT NULL,
  `PELANGGAN` varchar(256) DEFAULT NULL,
  `TANGGAL_OPPORTUNITY` date DEFAULT NULL,
  `TANGGAL_TARGET` date DEFAULT NULL,
  `NAMA_SALES` varchar(256) DEFAULT NULL,
  `DESKIPSI` varchar(256) DEFAULT NULL,
  `LEADER` varchar(256) DEFAULT NULL,
  `TANGGAL_SELESAI` date DEFAULT NULL,
  `REMARK` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ps_node`
--

CREATE TABLE `ps_node` (
  `ID_PS` int(11) NOT NULL,
  `NO_PS` varchar(256) DEFAULT NULL,
  `CRM_STATUS` varchar(256) DEFAULT NULL,
  `PIC` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `ID_ROLE` int(11) NOT NULL,
  `CRM_ROLE` varchar(256) NOT NULL,
  `DESKRIPSI` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`ID_ROLE`, `CRM_ROLE`, `DESKRIPSI`) VALUES
(1, 'Admin', 'memiliki peran dalam mengelola pengguna, SBU, Menu , Menambah produk, dll'),
(2, 'Sales', 'Memiliki peran dalam mengelola Lead, Opportunity, Agreement. Role ini bertanggun jawab dalam mencari pelanggan untuk meningkatkan pendapatan perusahaan.'),
(3, 'Aktivasi', 'Memiliki peran dalam mengelola project survey dan project activation, dimana peran ini bertanggun jawab dalam pekerjaan lapangan untuk melakukan pendataan sebelum pemasangan dan pendataan ketika pemasangan.'),
(4, 'Adev', 'Memiliki peran dalam mengelola BAKBB, activation request dan activation list,  , dimana peran ini bertanggun jawab dalam membuat kesepakatan antara perwakilan pihak perusahaan dan pelanggan, mengelola permintaan aktivasi dan mengelola activation list.'),
(5, 'Manager', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.'),
(6, 'General Manager', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.');

-- --------------------------------------------------------

--
-- Table structure for table `role_menu`
--

CREATE TABLE `role_menu` (
  `ID_ROLE` int(11) NOT NULL,
  `ID_MENU` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role_menu`
--

INSERT INTO `role_menu` (`ID_ROLE`, `ID_MENU`) VALUES
(1, 1),
(1, 2),
(1, 12),
(1, 13),
(2, 1),
(2, 12),
(3, 1),
(3, 2),
(4, 1),
(4, 2),
(5, 1),
(5, 2),
(6, 1),
(6, 2),
(6, 13);

-- --------------------------------------------------------

--
-- Table structure for table `sbu`
--

CREATE TABLE `sbu` (
  `ID_SBU` int(11) NOT NULL,
  `SBU_OWNER` varchar(256) NOT NULL,
  `DESKRIPSI` varchar(256) NOT NULL,
  `SBU_REGION` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sbu`
--

INSERT INTO `sbu` (`ID_SBU`, `SBU_OWNER`, `DESKRIPSI`, `SBU_REGION`) VALUES
(1, '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Jakarta'),
(2, '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Cawang');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `ID_SERVICE` int(11) NOT NULL,
  `PELANGGAN` varchar(256) DEFAULT NULL,
  `PRODUCT` varchar(256) DEFAULT NULL,
  `STATUS` varchar(256) DEFAULT NULL,
  `STATUS1` varchar(256) DEFAULT NULL,
  `STATUS2` varchar(256) DEFAULT NULL,
  `STATUS3` varchar(256) DEFAULT NULL,
  `NOTE` varchar(512) DEFAULT NULL,
  `PEMILIK` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sla`
--

CREATE TABLE `sla` (
  `ID_SLA` int(11) NOT NULL,
  `PELANGGAN` varchar(256) DEFAULT NULL,
  `PRODUK` varchar(256) DEFAULT NULL,
  `KATEGORI` varchar(256) DEFAULT NULL,
  `LAST_MILE` varchar(256) DEFAULT NULL,
  `KETERSEDIAAN` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID_USER` int(11) NOT NULL,
  `ID_SBU` int(11) DEFAULT NULL,
  `ID_ROLE` int(11) DEFAULT NULL,
  `CRM_EMAIL` varchar(256) DEFAULT NULL,
  `CRM_PASSWORD` varchar(256) DEFAULT NULL,
  `NAMA_LENGKAP` varchar(256) DEFAULT NULL,
  `TELEPON` varchar(256) DEFAULT NULL,
  `CHANGE_PASSWORD` date DEFAULT NULL,
  `CRM_STATUS` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID_USER`, `ID_SBU`, `ID_ROLE`, `CRM_EMAIL`, `CRM_PASSWORD`, `NAMA_LENGKAP`, `TELEPON`, `CHANGE_PASSWORD`, `CRM_STATUS`) VALUES
(1, 1, 1, 'admin@admin', '5f4dcc3b5aa765d61d8327deb882cf99', 'Admin', '081254996845', NULL, '1'),
(2, 2, 6, 'GM@icon.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'GM Cawang', '441385', NULL, '1'),
(3, 1, 6, 'GM@jakarte.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'GM Jakarta', '43213', NULL, '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activation_list`
--
ALTER TABLE `activation_list`
  ADD PRIMARY KEY (`ID_AL`),
  ADD KEY `FK_RELATIONSHIP_30` (`ID_AGREEMENT`);

--
-- Indexes for table `activation_request`
--
ALTER TABLE `activation_request`
  ADD PRIMARY KEY (`ID_AR`),
  ADD KEY `FK_RELATIONSHIP_34` (`ID_AGREEMENT`);

--
-- Indexes for table `addreess`
--
ALTER TABLE `addreess`
  ADD PRIMARY KEY (`ID_ADDRESS`),
  ADD KEY `FK_RELATIONSHIP_9` (`ID_OPPORTUNITY`);

--
-- Indexes for table `agreements`
--
ALTER TABLE `agreements`
  ADD PRIMARY KEY (`ID_AGREEMENT`),
  ADD KEY `FK_RELATIONSHIP_10` (`ID_USER`),
  ADD KEY `FK_RELATIONSHIP_11` (`ID_OPPORTUNITY`);

--
-- Indexes for table `annual_target`
--
ALTER TABLE `annual_target`
  ADD PRIMARY KEY (`ID_ANNUAL`),
  ADD KEY `ID_SBU` (`ID_SBU`);

--
-- Indexes for table `bakbb`
--
ALTER TABLE `bakbb`
  ADD PRIMARY KEY (`ID_BAKBB`),
  ADD KEY `FK_RELATIONSHIP_21` (`ID_AGREEMENT`),
  ADD KEY `FK_RELATIONSHIP_32` (`ID_OPPORTUNITY`);

--
-- Indexes for table `boq`
--
ALTER TABLE `boq`
  ADD PRIMARY KEY (`ID_BOQ`),
  ADD KEY `FK_RELATIONSHIP_19` (`ID_PS`);

--
-- Indexes for table `leads`
--
ALTER TABLE `leads`
  ADD PRIMARY KEY (`ID_LEADS`),
  ADD KEY `FK_RELATIONSHIP_8` (`ID_USER`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`ID_MENU`),
  ADD KEY `FK_RELATIONSHIP_1` (`MEN_ID_MENU`);

--
-- Indexes for table `opportunities`
--
ALTER TABLE `opportunities`
  ADD PRIMARY KEY (`ID_OPPORTUNITY`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ID_PRODUCT`);

--
-- Indexes for table `product_line_item`
--
ALTER TABLE `product_line_item`
  ADD PRIMARY KEY (`ID_PLI`),
  ADD KEY `FK_RELATIONSHIP_26` (`ID_AR`),
  ADD KEY `FK_RELATIONSHIP_28` (`ID_BAKBB`),
  ADD KEY `FK_RELATIONSHIP_29` (`ID_PS`),
  ADD KEY `FK_RELATIONSHIP_31` (`ID_PA`),
  ADD KEY `FK_RELATIONSHIP_38` (`ACT_ID_AL`),
  ADD KEY `FK_RELATIONSHIP_39` (`ID_SERVICE`),
  ADD KEY `FK_RELATIONSHIP_40` (`ID_PRODUCT`),
  ADD KEY `FK_RELATIONSHIP_41` (`ID_SLA`),
  ADD KEY `FK_RELATIONSHIP_42` (`ID_AGREEMENT`);

--
-- Indexes for table `progress`
--
ALTER TABLE `progress`
  ADD PRIMARY KEY (`ID_PROGRESS`),
  ADD KEY `FK_RELATIONSHIP_20` (`ID_PS`);

--
-- Indexes for table `project_activation`
--
ALTER TABLE `project_activation`
  ADD PRIMARY KEY (`ID_PA`),
  ADD KEY `FK_RELATIONSHIP_37` (`ID_OPPORTUNITY`);

--
-- Indexes for table `project_activation_node`
--
ALTER TABLE `project_activation_node`
  ADD PRIMARY KEY (`ID_PA_NODE`),
  ADD KEY `FK_RELATIONSHIP_36` (`ID_PA`);

--
-- Indexes for table `project_initation`
--
ALTER TABLE `project_initation`
  ADD PRIMARY KEY (`ID_INITATION`),
  ADD KEY `FK_RELATIONSHIP_35` (`ID_PA_NODE`);

--
-- Indexes for table `project_survey`
--
ALTER TABLE `project_survey`
  ADD PRIMARY KEY (`ID_PS`),
  ADD KEY `FK_RELATIONSHIP_33` (`ID_OPPORTUNITY`);

--
-- Indexes for table `ps_node`
--
ALTER TABLE `ps_node`
  ADD PRIMARY KEY (`ID_PS`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`ID_ROLE`);

--
-- Indexes for table `role_menu`
--
ALTER TABLE `role_menu`
  ADD PRIMARY KEY (`ID_ROLE`,`ID_MENU`),
  ADD KEY `FK_RELATIONSHIP_3` (`ID_MENU`);

--
-- Indexes for table `sbu`
--
ALTER TABLE `sbu`
  ADD PRIMARY KEY (`ID_SBU`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`ID_SERVICE`);

--
-- Indexes for table `sla`
--
ALTER TABLE `sla`
  ADD PRIMARY KEY (`ID_SLA`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID_USER`),
  ADD UNIQUE KEY `CRM_EMAIL` (`CRM_EMAIL`),
  ADD KEY `FK_RELATIONSHIP_5` (`ID_ROLE`),
  ADD KEY `FK_RELATIONSHIP_6` (`ID_SBU`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activation_list`
--
ALTER TABLE `activation_list`
  MODIFY `ID_AL` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `activation_request`
--
ALTER TABLE `activation_request`
  MODIFY `ID_AR` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `addreess`
--
ALTER TABLE `addreess`
  MODIFY `ID_ADDRESS` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `agreements`
--
ALTER TABLE `agreements`
  MODIFY `ID_AGREEMENT` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `annual_target`
--
ALTER TABLE `annual_target`
  MODIFY `ID_ANNUAL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `bakbb`
--
ALTER TABLE `bakbb`
  MODIFY `ID_BAKBB` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `boq`
--
ALTER TABLE `boq`
  MODIFY `ID_BOQ` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leads`
--
ALTER TABLE `leads`
  MODIFY `ID_LEADS` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `ID_MENU` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `opportunities`
--
ALTER TABLE `opportunities`
  MODIFY `ID_OPPORTUNITY` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `ID_PRODUCT` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_line_item`
--
ALTER TABLE `product_line_item`
  MODIFY `ID_PLI` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `progress`
--
ALTER TABLE `progress`
  MODIFY `ID_PROGRESS` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_activation`
--
ALTER TABLE `project_activation`
  MODIFY `ID_PA` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_activation_node`
--
ALTER TABLE `project_activation_node`
  MODIFY `ID_PA_NODE` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_initation`
--
ALTER TABLE `project_initation`
  MODIFY `ID_INITATION` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_survey`
--
ALTER TABLE `project_survey`
  MODIFY `ID_PS` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ps_node`
--
ALTER TABLE `ps_node`
  MODIFY `ID_PS` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `ID_ROLE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sbu`
--
ALTER TABLE `sbu`
  MODIFY `ID_SBU` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `ID_SERVICE` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sla`
--
ALTER TABLE `sla`
  MODIFY `ID_SLA` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID_USER` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activation_list`
--
ALTER TABLE `activation_list`
  ADD CONSTRAINT `FK_RELATIONSHIP_30` FOREIGN KEY (`ID_AGREEMENT`) REFERENCES `agreements` (`ID_AGREEMENT`);

--
-- Constraints for table `activation_request`
--
ALTER TABLE `activation_request`
  ADD CONSTRAINT `FK_RELATIONSHIP_34` FOREIGN KEY (`ID_AGREEMENT`) REFERENCES `agreements` (`ID_AGREEMENT`);

--
-- Constraints for table `addreess`
--
ALTER TABLE `addreess`
  ADD CONSTRAINT `FK_RELATIONSHIP_9` FOREIGN KEY (`ID_OPPORTUNITY`) REFERENCES `opportunities` (`ID_OPPORTUNITY`);

--
-- Constraints for table `agreements`
--
ALTER TABLE `agreements`
  ADD CONSTRAINT `FK_RELATIONSHIP_10` FOREIGN KEY (`ID_USER`) REFERENCES `users` (`ID_USER`),
  ADD CONSTRAINT `FK_RELATIONSHIP_11` FOREIGN KEY (`ID_OPPORTUNITY`) REFERENCES `opportunities` (`ID_OPPORTUNITY`);

--
-- Constraints for table `annual_target`
--
ALTER TABLE `annual_target`
  ADD CONSTRAINT `annual_target_ibfk_1` FOREIGN KEY (`ID_SBU`) REFERENCES `sbu` (`ID_SBU`);

--
-- Constraints for table `bakbb`
--
ALTER TABLE `bakbb`
  ADD CONSTRAINT `FK_RELATIONSHIP_21` FOREIGN KEY (`ID_AGREEMENT`) REFERENCES `agreements` (`ID_AGREEMENT`),
  ADD CONSTRAINT `FK_RELATIONSHIP_32` FOREIGN KEY (`ID_OPPORTUNITY`) REFERENCES `opportunities` (`ID_OPPORTUNITY`);

--
-- Constraints for table `boq`
--
ALTER TABLE `boq`
  ADD CONSTRAINT `FK_RELATIONSHIP_19` FOREIGN KEY (`ID_PS`) REFERENCES `ps_node` (`ID_PS`);

--
-- Constraints for table `leads`
--
ALTER TABLE `leads`
  ADD CONSTRAINT `FK_RELATIONSHIP_8` FOREIGN KEY (`ID_USER`) REFERENCES `users` (`ID_USER`);

--
-- Constraints for table `menus`
--
ALTER TABLE `menus`
  ADD CONSTRAINT `FK_RELATIONSHIP_1` FOREIGN KEY (`MEN_ID_MENU`) REFERENCES `menus` (`ID_MENU`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_line_item`
--
ALTER TABLE `product_line_item`
  ADD CONSTRAINT `FK_RELATIONSHIP_26` FOREIGN KEY (`ID_AR`) REFERENCES `activation_request` (`ID_AR`),
  ADD CONSTRAINT `FK_RELATIONSHIP_28` FOREIGN KEY (`ID_BAKBB`) REFERENCES `bakbb` (`ID_BAKBB`),
  ADD CONSTRAINT `FK_RELATIONSHIP_29` FOREIGN KEY (`ID_PS`) REFERENCES `project_survey` (`ID_PS`),
  ADD CONSTRAINT `FK_RELATIONSHIP_31` FOREIGN KEY (`ID_PA`) REFERENCES `project_activation` (`ID_PA`),
  ADD CONSTRAINT `FK_RELATIONSHIP_38` FOREIGN KEY (`ACT_ID_AL`) REFERENCES `activation_list` (`ID_AL`),
  ADD CONSTRAINT `FK_RELATIONSHIP_39` FOREIGN KEY (`ID_SERVICE`) REFERENCES `services` (`ID_SERVICE`),
  ADD CONSTRAINT `FK_RELATIONSHIP_40` FOREIGN KEY (`ID_PRODUCT`) REFERENCES `product` (`ID_PRODUCT`),
  ADD CONSTRAINT `FK_RELATIONSHIP_41` FOREIGN KEY (`ID_SLA`) REFERENCES `sla` (`ID_SLA`),
  ADD CONSTRAINT `FK_RELATIONSHIP_42` FOREIGN KEY (`ID_AGREEMENT`) REFERENCES `agreements` (`ID_AGREEMENT`);

--
-- Constraints for table `progress`
--
ALTER TABLE `progress`
  ADD CONSTRAINT `FK_RELATIONSHIP_20` FOREIGN KEY (`ID_PS`) REFERENCES `ps_node` (`ID_PS`);

--
-- Constraints for table `project_activation`
--
ALTER TABLE `project_activation`
  ADD CONSTRAINT `FK_RELATIONSHIP_37` FOREIGN KEY (`ID_OPPORTUNITY`) REFERENCES `opportunities` (`ID_OPPORTUNITY`);

--
-- Constraints for table `project_activation_node`
--
ALTER TABLE `project_activation_node`
  ADD CONSTRAINT `FK_RELATIONSHIP_36` FOREIGN KEY (`ID_PA`) REFERENCES `project_activation` (`ID_PA`);

--
-- Constraints for table `project_initation`
--
ALTER TABLE `project_initation`
  ADD CONSTRAINT `FK_RELATIONSHIP_35` FOREIGN KEY (`ID_PA_NODE`) REFERENCES `project_activation_node` (`ID_PA_NODE`);

--
-- Constraints for table `project_survey`
--
ALTER TABLE `project_survey`
  ADD CONSTRAINT `FK_RELATIONSHIP_33` FOREIGN KEY (`ID_OPPORTUNITY`) REFERENCES `opportunities` (`ID_OPPORTUNITY`);

--
-- Constraints for table `ps_node`
--
ALTER TABLE `ps_node`
  ADD CONSTRAINT `FK_RELATIONSHIP_17` FOREIGN KEY (`ID_PS`) REFERENCES `project_survey` (`ID_PS`);

--
-- Constraints for table `role_menu`
--
ALTER TABLE `role_menu`
  ADD CONSTRAINT `FK_RELATIONSHIP_3` FOREIGN KEY (`ID_MENU`) REFERENCES `menus` (`ID_MENU`),
  ADD CONSTRAINT `FK_RELATIONSHIP_4` FOREIGN KEY (`ID_ROLE`) REFERENCES `roles` (`ID_ROLE`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `FK_RELATIONSHIP_5` FOREIGN KEY (`ID_ROLE`) REFERENCES `roles` (`ID_ROLE`),
  ADD CONSTRAINT `FK_RELATIONSHIP_6` FOREIGN KEY (`ID_SBU`) REFERENCES `sbu` (`ID_SBU`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
