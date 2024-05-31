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
(1, 'Tesla Model S', 'A high-performance electric car designed for maximum power and efficiency.', 79999, 84999, 10, 'https://w0.peakpx.com/wallpaper/298/736/HD-wallpaper-tesla-model-s-ii-electric-cars.jpg', '2024-05-08 00:00:00'),
(2, 'Ford Mustang', 'A durable and stylish sports car suitable for all driving enthusiasts.', 55999, 58999, 15, 'https://images5.alphacoders.com/421/421895.jpg', '2024-05-08 00:00:00'),
(3, 'Toyota Camry', 'A reliable and efficient sedan for everyday use.', 24999, 26999, 25, 'https://eskipaper.com/images/toyota-camry-1.jpg', '2024-05-08 00:00:00'),
(4, 'Chevrolet Corvette', 'A luxury sports car with excellent performance and stunning design.', 69999, 72999, 5, 'https://di-uploads-pod12.dealerinspire.com/stingraychevy/uploads/2020/03/Screen-Shot-2020-03-27-at-11.58.54-AM.png', '2024-05-08 00:00:00'),
(5, 'Honda Accord', 'A popular sedan known for its reliability and fuel efficiency.', 23999, 25999, 20, 'https://cdn.motor1.com/images/mgl/7XlBW/s1/2018-honda-accord-touring.jpg', '2024-05-08 00:00:00'),
(6, 'BMW 3 Series', 'A premium sedan with advanced features and superior performance.', 40999, 42999, 8, 'https://www.carsome.my/news/wp-content/uploads/wp/a832b-fb-3-srs-2019.jpg', '2024-05-08 00:00:00'),
(7, 'Audi A4', 'A stylish and luxurious sedan with cutting-edge technology.', 37999, 39999, 12, 'https://www.hdwallpapers.in/download/blue_audi_a4_45_tfsi_quattro_s_line_2020_4k_5k_hd_cars-5120x2880.jpg', '2024-05-08 00:00:00'),
(8, 'Mercedes-Benz C-Class', 'A high-end sedan offering comfort, performance, and luxury.', 41999, 43999, 7, 'https://imgd.aeplcdn.com/664x374/n/cw/ec/116201/c-class-exterior-right-front-three-quarter-3.jpeg?isig=0&q=80', '2024-05-08 00:00:00');

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
