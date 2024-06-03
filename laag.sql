-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2024 at 04:29 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laag`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` int(6) UNSIGNED NOT NULL,
  `street_address` varchar(255) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `postal_code` varchar(20) NOT NULL,
  `country` varchar(100) NOT NULL,
  `payment_id` int(6) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(6) UNSIGNED NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `rrp` decimal(10,0) NOT NULL DEFAULT 0,
  `quantity` int(11) NOT NULL,
  `img` text NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `description`, `price`, `rrp`, `quantity`, `img`, `date_added`) VALUES
(1, 'TESLA MODEL S', 'A high-performance electric car designed for maximum power and efficiency.', 4200000, 4200000, 5, 'https://www.exoticmotorsportsok.com/imagetag/488/main/l/Used-2014-Tesla-Model-S-P85+-1617175020.jpg', '2024-05-08 00:00:00'),
(2, 'FORD MUSTANG', 'A durable and stylish sports car suitable for all driving enthusiasts.', 3499000, 3499000, 7, 'https://img.philkotse.com/crop/600x338/2023/12/26/20231226134326-1523_wm.jpg', '2024-05-08 00:00:00'),
(3, 'TOYOTA CAMRY', 'A reliable and efficient sedan for everyday use.', 2457000, 245700, 8, 'https://www.cars.com/i/large/in/v2/635f91b9-e2ba-5c91-95e0-1d6a4d805993/e5c51300-9ade-423b-863b-e9f5f7682778/iWS1VoCbrS0TIen86PXuRN6Vz9o.jpg', '2024-05-08 00:00:00'),
(4, 'CHEVROLET CORVETTE', 'A luxury sports car with excellent performance and stunning design.', 12571000, 12571000, 3, 'https://cdn05.carsforsale.com/7b298494861a66c199f3eb67b11a68cf/800x600/2023-chevrolet-corvette-stingray-2dr-convertible-w-1lt.jpg', '2024-05-08 00:00:00'),
(5, 'HONDA ACCORD', 'A popular sedan known for its reliability and fuel efficiency.', 2288000, 2288000, 10, 'https://img.philkotse.com/crop/600x338/2024/04/03/20240403142157-fbc4_wm.jpg', '2024-05-08 00:00:00'),
(6, 'BMW 3 SERIES', 'A premium sedan with advanced features and superior performance.', 3790000, 3790000, 6, 'https://img.autotrader.co.za/28366576/Crop640x480', '2024-05-08 00:00:00'),
(7, 'AUDI A4', 'A stylish and luxurious sedan with cutting-edge technology.', 3850000, 3850000, 9, 'https://images.clickdealer.co.uk/vehicles/5577/5577582/full/130183537.jpg', '2024-05-08 00:00:00'),
(8, 'MERCEDES-BENZ C-CLASS', 'A high-end sedan offering comfort, performance, and luxury.', 3990000, 3990000, 5, 'https://hermes.carsalesportal.co.za/storage/stocks/westvaal-nelspruit/2023-09/2019-mercedes-benz-c-class-sedan-c-180-9g-tronic-115053-1.jpg', '2024-05-08 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'admin', '$2y$10$kGp4g1TjBK4XwLIwRbBHSeZ4W5FpPbYoB1ap5NfFUjUPAcE3KR5QG', '2024-04-29 16:39:58'),
(2, 'baslao', '$2y$10$26m/9gmMDpV4k0Y9UXLHI.TnvIRgoyNdkeQ/NC.XN6v3Q5ZgMz0dO', '2024-05-29 09:12:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payment_id` (`payment_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `addresses_ibfk_1` FOREIGN KEY (`payment_id`) REFERENCES `payments` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
