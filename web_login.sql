-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2023 at 01:56 PM
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
-- Database: `web_login`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_donatur`
--

CREATE TABLE `data_donatur` (
  `id` int(11) NOT NULL,
  `nama_donatur` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` date NOT NULL,
  `phone` varchar(32) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `instansi` varchar(255) NOT NULL,
  `jumlah` varchar(255) NOT NULL,
  `MoU` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_donatur`
--

INSERT INTO `data_donatur` (`id`, `nama_donatur`, `email`, `is_active`, `date_created`, `phone`, `jabatan`, `instansi`, `jumlah`, `MoU`) VALUES
(1, 'Taufiqq', 'fuungspot@gmail.com', 1, '2023-01-03', '085175408518', 'CEO', 'SDGs Unhas', '10.000.000.000,00', '1/UN21.17/MOU /2013');

-- --------------------------------------------------------

--
-- Table structure for table `data_kelompok`
--

CREATE TABLE `data_kelompok` (
  `id` int(11) NOT NULL,
  `nama_kelompok` varchar(128) NOT NULL,
  `ketua` varchar(255) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_kelompok`
--

INSERT INTO `data_kelompok` (`id`, `nama_kelompok`, `ketua`, `email`, `image`, `is_active`, `date_created`, `phone`, `alamat`) VALUES
(1, 'Kepmawa', 'Taufiq', 'fuungt@gmail.com', 'default.jpg', 1, 1680612751, '081281758506', 'Jalan Andi Magga Amirullah No. 138 Sengkang, Sulawes Selatan');

-- --------------------------------------------------------

--
-- Table structure for table `progress`
--

CREATE TABLE `progress` (
  `id` int(11) NOT NULL,
  `name` varchar(125) NOT NULL,
  `email` varchar(125) NOT NULL,
  `image` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `progress`
--

INSERT INTO `progress` (`id`, `name`, `email`, `image`) VALUES
(1, 'Taufiq Fadillah', 'fuungt@localhost.com', 'IMG-20230430-WA0046.jpg,Picture13.png,Picture12.png,Picture9.png,Picture7.png');

-- --------------------------------------------------------

--
-- Table structure for table `proposal`
--

CREATE TABLE `proposal` (
  `id` int(11) NOT NULL,
  `full_name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `address` varchar(128) NOT NULL,
  `phone` varchar(32) NOT NULL,
  `nomoridentitas` varchar(32) NOT NULL,
  `fotoidentitas` varchar(125) NOT NULL,
  `jeniskelamin` varchar(255) NOT NULL,
  `namakm` varchar(125) NOT NULL,
  `addresskm` varchar(125) NOT NULL,
  `emailkm` varchar(125) NOT NULL,
  `phonekm` varchar(32) NOT NULL,
  `nomoridentitaskm` varchar(32) NOT NULL,
  `fotoidentitaskm` varchar(125) NOT NULL,
  `namakt` varchar(125) NOT NULL,
  `addresskt` varchar(125) NOT NULL,
  `emailkt` varchar(125) NOT NULL,
  `phonekt` varchar(32) NOT NULL,
  `nomoridentitaskt` varchar(32) NOT NULL,
  `fotoidentitaskt` varchar(125) NOT NULL,
  `jeniskelaminkt` varchar(125) NOT NULL,
  `namapb` varchar(125) NOT NULL,
  `addresspb` varchar(125) NOT NULL,
  `emailpb` varchar(125) NOT NULL,
  `phonepb` varchar(32) NOT NULL,
  `nomoridentitaspb` varchar(32) NOT NULL,
  `fotoidentitaspb` varchar(125) NOT NULL,
  `nomorkkpb` varchar(32) NOT NULL,
  `fotokkpb` varchar(125) NOT NULL,
  `jeniskelaminpb` varchar(125) NOT NULL,
  `fileproposal` varchar(125) NOT NULL,
  `deskripsi` varchar(512) DEFAULT NULL,
  `filedokumentasi` varchar(512) NOT NULL,
  `date_created` date NOT NULL,
  `status` int(11) NOT NULL,
  `email_pengirim` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `proposal`
--

INSERT INTO `proposal` (`id`, `full_name`, `email`, `address`, `phone`, `nomoridentitas`, `fotoidentitas`, `jeniskelamin`, `namakm`, `addresskm`, `emailkm`, `phonekm`, `nomoridentitaskm`, `fotoidentitaskm`, `namakt`, `addresskt`, `emailkt`, `phonekt`, `nomoridentitaskt`, `fotoidentitaskt`, `jeniskelaminkt`, `namapb`, `addresspb`, `emailpb`, `phonepb`, `nomoridentitaspb`, `fotoidentitaspb`, `nomorkkpb`, `fotokkpb`, `jeniskelaminpb`, `fileproposal`, `deskripsi`, `filedokumentasi`, `date_created`, `status`, `email_pengirim`) VALUES
(1, 'Taufiq Fadillah', 'admin@taufiqproject.my.id', 'Jl. Menjangan 50c', '085175408518', '7319999999999999', 'microsoft_PNG.png', 'Laki-laki', 'Coba Kelompok', 'Jl. Menjangan 50c', 'admin@taufiqproject.my.id', '085175408518', '7319999999999999', 'note-loader.gif', 'Coba ketua', 'Jl. Menjangan 50c', 'admin@taufiqproject.my.id', '085175408518', '7319999999999999', 'microsoft_PNG1.png', 'Perempuan', 'Taufiq Fadillah', 'Jl. Menjangan 50c', 'admin@taufiqproject.my.id', '085175408518', '7319999999999999', 'microsoft_PNG2.png', '7319999999999999', 'microsoft_PNG3.png', 'Laki-laki', 'key_website_features.pdf', '', 'Tofi-01.png,4_Langkah_pembuatan_website.jpg,A4_-_3.png,A4_-_2.png,https___www_taufiqproject_my_id_.png,modern-laptop-mockup-with-airpods_(3).png,modern-laptop-mockup-with-airpods_(2).png,modern-laptop-mockup-with-airpods.png', '2023-07-30', 3, 'admin@taufiqproject.my.id');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `last_login` bigint(20) NOT NULL,
  `date_created` int(11) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `instagram` varchar(255) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `bio` varchar(512) NOT NULL,
  `kota` varchar(255) NOT NULL,
  `provinsi` varchar(255) NOT NULL,
  `pos` int(25) NOT NULL,
  `token` varchar(512) NOT NULL,
  `proposal_access` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `last_login`, `date_created`, `phone`, `address`, `twitter`, `instagram`, `facebook`, `bio`, `kota`, `provinsi`, `pos`, `token`, `proposal_access`) VALUES
(1, 'Novia Auliyah', 'aulyanovia@gmail.com', 'default.jpg', '$2y$10$SI.FjUSpr0OHCwzGxZg0Qe3/p2NthxjeCBz0YcXZ7fQ/NuqeGXC12', 2, 1, 0, 1658045017, '085175408518', 'Jalan Andi Magga Amirullah No. 138 Sengkang, Sulawes Selatan', '', '', '', '', 'Sengkang', 'Sulawesi Selatan', 99013, '', 1),
(2, 'Demo', 'demo@localhost.com', 'default.jpg', '$2y$10$BIx230v.UHEiIpu3jfH8HuB1wwpOi.Tin01UBTfGp6Qkjfiy2KYke', 3, 1, 0, 1658859603, '', '', '', '', '', '', '', '', 0, '', 0),
(3, 'Taufiq Fadillah', 'fuungt@localhost.com', '14615630_161639977628503_2504814953804788724_o.jpg', '$2y$10$/4KwFAbc3ImNXqpIvxvCVeRJFH3psjp8Q1pOBydSvzuQWHMZ8l7QK', 1, 1, 0, 1680514615, '081281758506', 'Jalan Andi Magga Amirullah No. 138 Sengkang, Sulawes Selatan', 'https://twitter.com/twfiqf', 'https://www.instagram.com/twfq_f/', 'https://www.facebook.com/twfqf/', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing so', 'Sengkang', 'Sulawesi Selatan', 99013, '', 1),
(4, 'Testing', 'fuungspot@gmail.com', 'default.jpg', '$2y$10$hTo0XT5.jdyYaKT8P5RwceyPawy.thkKCFwj.nERBNdJ4o6TOHc3C', 2, 1, 1, 1684891279, '', '', '', '', '', '', '', '', 0, '', 0),
(5, 'Taufiq Project', 'admin@taufiqproject.my.id', 'default.jpg', '$2y$10$DHvvuKxhITGuZu9kvTHEgOrIt/AOKrlLBlu7B67SLLvPQ8KUqijb2', 2, 1, 0, 1690690075, '081281758506', 'Jalan Andi Magga Amirullah No. 138 Sengkang, Sulawes Selatan', '', '', '', '', 'Sengkang', 'Sulawesi Selatan', 99013, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 1, 3),
(4, 3, 2),
(5, 1, 2),
(6, 3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Menu'),
(4, 'Donatur');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'administrator'),
(2, 'member'),
(3, 'donatur');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 2, 'My Profile', 'user', 'fas fa-fw fa-user', 1),
(3, 2, 'Edit Profile', 'user/edit', 'fas fa-fw fa-user-edit', 1),
(4, 3, 'Menu Management', 'menu', 'fas fa-fw fa-folder-open', 1),
(5, 3, 'Submenu Management', 'menu/submenu', 'fas fa-fw fa-folder-plus', 1),
(7, 1, 'Role', 'admin/role', 'fas fa-fw fa-user-lock', 1),
(8, 2, 'Change Password', 'user/changepassword', 'fas fa-fw fa-key', 1),
(9, 1, 'All Users', 'admin/allusers', 'fas fa-fw fa-users', 1),
(12, 2, 'Proposal', 'user/proposal', 'fas fa-fw fa-pencil-alt', 1),
(13, 2, 'Laporan', 'user/laporan', 'fas fa-file-signature', 1),
(14, 1, 'Data Donatur', 'admin/datadonatur', 'fas fa-user-friends', 1),
(15, 1, 'Data Donasi', 'admin/datadonasi', 'fas fa-donate', 1),
(20, 1, 'Data Kerjasama', 'admin/datakerjasama', 'fas fa-people-arrows', 1),
(21, 1, 'Data Kelompok Masyarakat', 'admin/datakelompok', 'fas fa-people-carry', 1),
(22, 2, 'Input Progress', 'user/progress', 'fas fa-tasks', 1),
(23, 1, 'Data Proposal', 'admin/proposal', 'fas fa-file-archive', 1),
(24, 13, 'Dashboard Donatur', 'donatur/dashboard', 'fas fa-chart-line', 1),
(26, 4, 'Dashboard Donatur', 'donatur', 'fas fa-chart-line', 1),
(27, 4, 'Data Proposal', 'donatur/proposal', 'fas fa-file-signature', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`) VALUES
(1, '', 'zKw5TqEsSyXKCfyMw3oVp/ICCdah79Phs5glhSeE7WQ=', 1657201913),
(2, '', 'Yw+Y41UYOeAXRA52/4YGE/CQzSnF2FjOYJKUQvdWyCY=', 1657205110),
(3, '', 'UYktl+IGCe9EJySuH9Ql57Nv7QjWfQrb9kg33Tx2wvM=', 1657205206),
(4, 'aulyanovia@gmail.com', 'Hpst380GHR4BEt0Igeotbnxx7dW3mIs4LhOGcuvdPSw=', 1658044845),
(5, 'aulyanovia@gmail.com', 'RimZV+cxP//ze5RpLLuvm+cQGZtavx0rC0MyQSCoyvs=', 1658045017),
(9, 'fuungspot@gmail.com', 'SDDo0GTHvKtBo7d0elff8VeFFE8PHwFqzJEl+JgwMPE=', 1684310531);

-- --------------------------------------------------------

--
-- Table structure for table `visitor`
--

CREATE TABLE `visitor` (
  `visit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `visitor`
--

INSERT INTO `visitor` (`visit`) VALUES
(278);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_donatur`
--
ALTER TABLE `data_donatur`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_kelompok`
--
ALTER TABLE `data_kelompok`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `progress`
--
ALTER TABLE `progress`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `proposal`
--
ALTER TABLE `proposal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_donatur`
--
ALTER TABLE `data_donatur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `data_kelompok`
--
ALTER TABLE `data_kelompok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `progress`
--
ALTER TABLE `progress`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `proposal`
--
ALTER TABLE `proposal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
