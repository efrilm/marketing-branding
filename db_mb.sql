-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2022 at 03:41 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_mb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_background`
--

CREATE TABLE `tb_background` (
  `id` int(11) NOT NULL,
  `bg_home` varchar(225) DEFAULT NULL,
  `bg_product_digital` varchar(225) DEFAULT NULL,
  `bg_service` varchar(225) DEFAULT NULL,
  `bg_service_feature` varchar(225) DEFAULT NULL,
  `bg_portfolio` varchar(225) NOT NULL,
  `updated` datetime DEFAULT NULL,
  `bg_about` varchar(225) NOT NULL,
  `bg_contact` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_background`
--

INSERT INTO `tb_background` (`id`, `bg_home`, `bg_product_digital`, `bg_service`, `bg_service_feature`, `bg_portfolio`, `updated`, `bg_about`, `bg_contact`) VALUES
(1, 'banner12.jpg', 'banner24.jpg', 'banner611.jpg', 'banner84.jpg', 'banner511.jpg', '2022-04-18 16:58:15', 'banner91.jpg', 'banner71.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_category`
--

CREATE TABLE `tb_category` (
  `id_category` int(11) NOT NULL,
  `category_seo` varchar(225) NOT NULL,
  `category_name` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_category`
--

INSERT INTO `tb_category` (`id_category`, `category_seo`, `category_name`) VALUES
(1, 'website-development', 'Website Development '),
(3, 'digital-marketing', 'Digital Marketing'),
(4, 'mobile-apps', 'Mobile Apps');

-- --------------------------------------------------------

--
-- Table structure for table `tb_client`
--

CREATE TABLE `tb_client` (
  `id_client` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `client_name` varchar(225) NOT NULL,
  `client_email` varchar(225) DEFAULT NULL,
  `client_photo` varchar(225) NOT NULL,
  `cooperation_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_client`
--

INSERT INTO `tb_client` (`id_client`, `company_id`, `client_name`, `client_email`, `client_photo`, `cooperation_date`) VALUES
(2, 1, 'PT Pidoli Mandailng  Travel', 'pt.pidolimandailingtravel@gmail.com', '4552.png', '2022-03-03');

-- --------------------------------------------------------

--
-- Table structure for table `tb_company`
--

CREATE TABLE `tb_company` (
  `id` int(11) NOT NULL,
  `company_name` varchar(225) DEFAULT NULL,
  `company_location` varchar(225) DEFAULT NULL,
  `company_logo` varchar(225) DEFAULT NULL,
  `company_field` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_company`
--

INSERT INTO `tb_company` (`id`, `company_name`, `company_location`, `company_logo`, `company_field`) VALUES
(1, 'PT Pidoli Mandailing Travel', 'Jakarta Selatan', '4552.png', 'Travel'),
(3, 'PT Eshoppy', 'Jakarta Pusat', 'logo1.png', 'E-Commerce');

-- --------------------------------------------------------

--
-- Table structure for table `tb_feature`
--

CREATE TABLE `tb_feature` (
  `id_feature` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `feature_title` varchar(225) NOT NULL,
  `feature_description` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_feature`
--

INSERT INTO `tb_feature` (`id_feature`, `service_id`, `feature_title`, `feature_description`) VALUES
(5, 3, 'Custom Feature', 'Anda Dapat Meminta Fitur Yang Anda Diinginkan'),
(6, 4, 'Online Payment', 'Pembayaran dilakukan secara online seperti Virtual Account, Gopay, Q-Ris, dll. '),
(7, 4, 'Cek Ongkir', 'Cek Ongkir disini untuk mengetahui harga ongkos kirim suatu produk dengan jasa ekspedisi'),
(8, 4, 'Katalog', 'Katalog untuk menyusun produk anda secara teratur.\r\n\r\n ');

-- --------------------------------------------------------

--
-- Table structure for table `tb_portfolio`
--

CREATE TABLE `tb_portfolio` (
  `id_portfolio` int(11) NOT NULL,
  `portfolio_seo` varchar(225) NOT NULL,
  `portfolio_name` varchar(225) NOT NULL,
  `category_id` int(11) NOT NULL,
  `client_name` varchar(225) NOT NULL,
  `client_location` varchar(225) NOT NULL,
  `time_frame` varchar(20) NOT NULL,
  `year` int(11) NOT NULL,
  `description` text NOT NULL,
  `portfolio_photo` text NOT NULL,
  `created_date` date NOT NULL,
  `created_time` time NOT NULL,
  `update_date` date NOT NULL,
  `update_time` time NOT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_portfolio`
--

INSERT INTO `tb_portfolio` (`id_portfolio`, `portfolio_seo`, `portfolio_name`, `category_id`, `client_name`, `client_location`, `time_frame`, `year`, `description`, `portfolio_photo`, `created_date`, `created_time`, `update_date`, `update_time`, `is_active`) VALUES
(1, 'pidoli-mandailing-travel', 'Pidoli Mandailing Travel', 1, 'PT Pidoli Mandailng  Travel', 'Jakarta Selatan', '60 Day', 2021, '&lt;p&gt;Pidoli Mandailing Travel Adalah Website Travel dan Hotel. Pidoli Mandailing Travel Berlokasi di Jakarta Selatan.&lt;/p&gt;', 'WhatsApp_Image_2022-04-10_at_11_17_15_PM_(1).jpeg', '2022-03-24', '19:57:51', '2022-04-10', '18:22:29', 1),
(2, 'eshoopy-web', 'eShoopy Web', 1, 'eShoopy', 'Jakarta Pusat', '60 Day', 2021, '&lt;p&gt;Eshoppy Adalah Website E-commerce dalam bidang Fashion&lt;/p&gt;', 'WhatsApp_Image_2022-04-10_at_11_17_16_PM.jpeg', '2022-04-10', '18:24:04', '0000-00-00', '00:00:00', 1),
(3, 'varana-website', 'Varana Website', 1, 'Jagorawi Golf Estate', 'Cibinong', '30 DAY', 2021, '&lt;p&gt;Varana Merupakan Website Perumahan Yang Berlokasi di cibinong bogor&lt;/p&gt;', 'WhatsApp_Image_2022-04-10_at_11_17_15_PM.jpeg', '2022-04-10', '18:25:35', '0000-00-00', '00:00:00', 1),
(4, 'eshoopy-mobile-apps', 'eShoopy Mobile Apps', 4, 'eShoopy', 'Jakarta Pusat', '60 Day', 2021, '&lt;p&gt;Eshoppy Merupakan Mobile Apps E-commerce yang bergerak dibidang Fashion&lt;/p&gt;&lt;p&gt;&lt;br&gt;&lt;/p&gt;', 'WhatsApp_Image_2022-04-10_at_11_17_15_PM_(2).jpeg', '2022-04-10', '18:27:26', '0000-00-00', '00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_service`
--

CREATE TABLE `tb_service` (
  `id_service` int(11) NOT NULL,
  `service_name` varchar(225) NOT NULL,
  `service_seo` varchar(225) NOT NULL,
  `service_description` varchar(225) NOT NULL,
  `service_photo` varchar(225) NOT NULL,
  `category_id` int(11) NOT NULL,
  `is_active` int(11) NOT NULL,
  `created_date` date NOT NULL,
  `created_time` time NOT NULL,
  `update_date` date DEFAULT NULL,
  `update_time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_service`
--

INSERT INTO `tb_service` (`id_service`, `service_name`, `service_seo`, `service_description`, `service_photo`, `category_id`, `is_active`, `created_date`, `created_time`, `update_date`, `update_time`) VALUES
(3, 'Pembuatan Website', 'pembuatan-website', 'Website yang baik adalah website yang dikerjakan oleh orang-orang yang tepat. Website yang baik tidak hanya bisa tampil di internet. namun lebih dari itu, kecepatan website,  Mobile Responsive, desain website. Desain Website ', 'web_dev.jpg', 1, 1, '2022-03-26', '14:34:42', '2022-03-26', '14:34:42'),
(4, 'Pembuatan Website E-Commerce', 'pembuatan-website-e-commerce', 'Website -Commerce Untuk Mendatangkan Lebih Banyak Pembeli Produk Atau Jasa Layanan yang anda tawarkan secara online.', 'web_commerce.jpg', 1, 1, '2022-03-26', '17:06:21', '2022-03-26', '17:06:21');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `first_name` varchar(225) NOT NULL,
  `last_name` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `no_phone` varchar(225) NOT NULL,
  `image` text NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(11) NOT NULL,
  `created_date` date NOT NULL,
  `created_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `first_name`, `last_name`, `email`, `password`, `no_phone`, `image`, `role_id`, `is_active`, `created_date`, `created_time`) VALUES
(2, 'Efril', 'mulanda', 'efril.mulanda@gmail.com', '$2y$10$DvvgZdKnUhZeYGLb/3WHaup3vE1.KutSZkuzX9FkGyDX1jtEd5X2q', '0893248327', 'default.png', 1, 1, '2022-03-13', '18:12:33');

-- --------------------------------------------------------

--
-- Table structure for table `tb_web_config`
--

CREATE TABLE `tb_web_config` (
  `id_config` int(11) NOT NULL,
  `title` varchar(225) DEFAULT NULL,
  `company_name` varchar(225) DEFAULT NULL,
  `company_field` varchar(225) DEFAULT NULL,
  `keywords` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  `gmaps` varchar(225) DEFAULT NULL,
  `no_phone` varchar(20) DEFAULT NULL,
  `no_whatsapp` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `logo` varchar(244) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `instagram` varchar(225) DEFAULT NULL,
  `update_date` date DEFAULT NULL,
  `upfate_time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_web_config`
--

INSERT INTO `tb_web_config` (`id_config`, `title`, `company_name`, `company_field`, `keywords`, `description`, `address`, `gmaps`, `no_phone`, `no_whatsapp`, `email`, `logo`, `facebook`, `instagram`, `update_date`, `upfate_time`) VALUES
(1, 'Marketing Branding', 'Cyber Project', 'Jasa, Marketing, Web Development', 'Jasa, Marketing, Website Development ', 'Marketing Branding Adalah Jasa', 'Perumahan Arkananta', '23244354', '08932897', '08983276', 'efril.mulanda@gmail.com', 'blackLogo.png', 'facebook snd', 'Instagram danger', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_background`
--
ALTER TABLE `tb_background`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_category`
--
ALTER TABLE `tb_category`
  ADD PRIMARY KEY (`id_category`);

--
-- Indexes for table `tb_client`
--
ALTER TABLE `tb_client`
  ADD PRIMARY KEY (`id_client`);

--
-- Indexes for table `tb_company`
--
ALTER TABLE `tb_company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_feature`
--
ALTER TABLE `tb_feature`
  ADD PRIMARY KEY (`id_feature`);

--
-- Indexes for table `tb_portfolio`
--
ALTER TABLE `tb_portfolio`
  ADD PRIMARY KEY (`id_portfolio`);

--
-- Indexes for table `tb_service`
--
ALTER TABLE `tb_service`
  ADD PRIMARY KEY (`id_service`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tb_web_config`
--
ALTER TABLE `tb_web_config`
  ADD PRIMARY KEY (`id_config`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_background`
--
ALTER TABLE `tb_background`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_category`
--
ALTER TABLE `tb_category`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_client`
--
ALTER TABLE `tb_client`
  MODIFY `id_client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_company`
--
ALTER TABLE `tb_company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_feature`
--
ALTER TABLE `tb_feature`
  MODIFY `id_feature` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_portfolio`
--
ALTER TABLE `tb_portfolio`
  MODIFY `id_portfolio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_service`
--
ALTER TABLE `tb_service`
  MODIFY `id_service` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_web_config`
--
ALTER TABLE `tb_web_config`
  MODIFY `id_config` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
