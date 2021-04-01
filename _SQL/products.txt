-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2021 at 03:13 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `emall`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_tag` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_description` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `sold` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `product_tag`, `product_description`, `price`, `stock`, `sold`) VALUES
(1, 'Ariel Liquid Soft & Gentle Laundry Liquid Detergent 900g [Laundry Detergent]', 'Laundry Detergent', 'Deeply penetrates to remove stains better\r\nAriel’s all-new improved washing liquid detergent\r\nFresh smelling scent Does not leave behind powder residue on clothes and machine\r\nBetter color care than powder\r\nRecommended by SHARP, Panasonic & SAMSUNG\r\nBased on internal technical tests More top washing machine makers recommend Ariel for fabric and washing machine than any other brand in Philippines based on Euromonitor 2014', 143.00, 885, 946),
(2, 'Adjustable Skipping Rope Tangle-free Jump Rope Fitness Rope Sports Rope Steel Wire Rope for Skipping 3meter', 'Exercise and Fitness Equipment', 'Cable Length: 3M, 1 X Storage Rope Free, compact, lightweight\r\nQuickly adjusts to your desired length. Appropriate for all ages and for any calorie burning\r\nSmooth Handle: Ensures fast speed; No tangling\r\nSealed ball bearings for even rotation', 109.00, 22, 1907),
(3, 'TYLEX XW12 Mini Wireless Silent Mouse 2.4Ghz Home & Office 1600DPI 10M Working Distance High-Precision Mouse', 'Computer Accessories', '2.4GHz wireless mouse\r\n1000/1200/1600 DPI resolutions\r\nOperating range up to 10 meters\r\nPowered by 2xAAA batteries\r\nRegular size, ideal for home or office use\r\nWith on/off switch\r\nUSB Nano receiver\r\nKey Number 4\r\nSupport Windows XP/Vista/7/8/10/Mac\r\nPerfect Curve\r\nSilent buttons\r\nInfrared Radiation\r\nSmart power-saving technology', 219.00, 114, 139),
(4, 'KTM Full Gloves For Motorcycle', 'Motorcycle Accessories', '1. Special kinesiology of carbon fiber scale, both beautiful and protection design.\r\n2. Three-dimensional breathable fabric, comfortable.\r\n3. Diving cloth embossing design, easy hand.\r\n4. Four high-speed ventilation network design, and a rubber taxiing fully protect block.\r\n5. Ergonomic fall protection, palm stereo anti-eccentrically than generally absorb shock absorber, foam with better protective effect.\r\n6. The rare curved fingers version to design, with both hands, more FuTie gloves manipulation feel 100%.\r\n7. Finger-nails stick, interlining with cowhide shock at the spot safety.\r\n8. The whole palm and add wear-resisting cloth grain no juncture design, strengthening prevent slippery effect and reduce car broke off open seams.\r\n9. Tucks shammy protection, reduce the long time using gloves and locomotive and increase the wear between handle handle. Thumb stick cowhide impact protection.', 140.00, 28, 584);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
