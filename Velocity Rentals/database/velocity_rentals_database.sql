-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2024 at 03:05 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rental`
--

-- --------------------------------------------------------

--
-- Table structure for table `agencies`
--

CREATE TABLE `agencies` (
  `agency_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(300) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `agencies`
--

INSERT INTO `agencies` (`agency_id`, `username`, `password`, `email`, `address`, `mobile`, `name`) VALUES
(1, 'agency1', 'password1', 'agency1@example.com', '123 Agency Street, City', '9876543211', 'Agency One'),
(2, 'agency2', 'password2', 'agency2@example.com', '456 Agency Avenue, Town', '9876543212', 'Agency Two'),
(3, 'agency3', 'password3', 'agency3@example.com', '789 Agency Road, Village', '9876543213', 'Agency Three'),
(4, 'agency4', 'password4', 'agency4@example.com', '321 Agency Lane, County', '9876543214', 'Agency Four'),
(5, 'agency5', 'password5', 'agency5@example.com', '654 Agency Court, State', '9876543215', 'Agency Five'),
(6, 'agency6', 'password6', 'agency6@example.com', '987 Agency Circle, Country', '9876543216', 'Agency Six'),
(7, 'agency7', 'password7', 'agency7@example.com', '101 Agency Boulevard, Metropolis', '9876543217', 'Agency Seven'),
(8, 'agency8', 'password8', 'agency8@example.com', '210 Agency Square, Capital', '9876543218', 'Agency Eight'),
(9, 'agency9', 'password9', 'agency9@example.com', '543 Agency Plaza, Megalopolis', '9876543219', 'Agency Nine'),
(10, 'agency10', 'password10', 'agency10@example.com', '876 Agency Park, Cityscape', '9876543210', 'Agency Ten'),
(11, 'Agency new', '$2y$10$bUHP06kwHl9NaFsptpVbjesGDaBygs7QM1JnFBaClmR00wcGrKZ0W', 'ajk@gmail.com', 'ajksldfjdskf ,as fkasdf', '1234567890', 'Test Agency');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `booking_id` int(11) NOT NULL,
  `car_id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `booking_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `start_date` date NOT NULL,
  `end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `car_id` int(11) NOT NULL,
  `vehicle_model` varchar(150) NOT NULL,
  `body_type` varchar(50) NOT NULL,
  `fuel` varchar(50) NOT NULL,
  `transmission` varchar(50) NOT NULL,
  `vehicle_number` varchar(25) NOT NULL,
  `seating_capacity` int(11) NOT NULL,
  `rent_per_day` decimal(10,2) NOT NULL,
  `agency_id` int(11) DEFAULT NULL,
  `images` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars`
(`car_id`, `vehicle_model`, `body_type`, `fuel`, `transmission`,
 `vehicle_number`, `seating_capacity`, `rent_per_day`, `agency_id`, `images`)
VALUES

(1, 'Toyota Fortuner', 'SUV', 'Diesel', 'Automatic', 'DL01TF', 7, 5500.00, 1, 'fortuner.jpeg'),
(2, 'Hyundai Creta', 'SUV', 'Petrol', 'Automatic', 'DL02HC', 5, 3200.00, 2, 'creta.jpeg'),
(3, 'Mahindra XUV700', 'SUV', 'Diesel', 'Automatic', 'DL03MX', 7, 4000.00, 3, 'xuv700.jpeg'),
(4, 'Tata Harrier EV', 'SUV', 'Electric', 'Automatic', 'DL04TH', 5, 4500.00, 4, 'harrier.jpeg'),
(5, 'Kia Seltos', 'SUV', 'Petrol', 'Automatic', 'DL05KS', 5, 3000.00, 5, 'seltos.jpeg'),
(6, 'MG Hector Plus', 'SUV', 'Petrol', 'Automatic', 'DL06MG', 6, 3500.00, 6, 'hector.jpeg'),
(7, 'Honda City Hybrid', 'Sedan', 'Hybrid', 'Automatic', 'DL07HC', 5, 2800.00, 7, 'city.jpeg'),
(8, 'Skoda Kodiaq', 'SUV', 'Petrol', 'Automatic', 'DL08SK', 7, 5000.00, 8, 'kodiaq.jpeg'),
(9, 'Volkswagen Taigun', 'SUV', 'Petrol', 'Manual', 'DL09VT', 5, 2600.00, 9, 'taigun.jpeg'),
(10, 'BMW X3', 'SUV', 'Petrol', 'Automatic', 'DL10BMW', 5, 9000.00, 10, 'bmwx3.jpeg'),

(11, 'Toyota Camry', 'Sedan', 'Hybrid', 'Automatic', 'DL11TC', 5, 4200.00, 1, 'camry.jpeg'),
(12, 'Honda CR-V', 'SUV', 'Petrol', 'Automatic', 'DL12CRV', 5, 3700.00, 2, 'crv.jpeg'),
(13, 'Ford Explorer', 'SUV', 'Diesel', 'Automatic', 'DL13FE', 7, 6200.00, 3, 'explorer.jpeg'),
(14, 'Chevrolet Equinox', 'SUV', 'Petrol', 'Automatic', 'DL14CE', 5, 3400.00, 4, 'equinox.jpeg'),
(15, 'Nissan Sentra', 'Sedan', 'Petrol', 'Manual', 'DL15NS', 5, 2500.00, 5, 'sentra.jpeg'),

(16, 'Subaru Impreza', 'Hatchback', 'Petrol', 'Manual', 'DL16SI', 5, 2400.00, 6, 'impreza.jpeg'),
(17, 'Volkswagen Tiguan', 'SUV', 'Diesel', 'Automatic', 'DL17VT', 5, 4800.00, 7, 'tiguan.jpeg'),
(18, 'Hyundai Sonata', 'Sedan', 'Petrol', 'Automatic', 'DL18HS', 5, 3300.00, 8, 'sonata.jpeg'),
(19, 'Kia Sportage', 'SUV', 'Petrol', 'Automatic', 'DL19KS', 5, 3600.00, 9, 'sportage.jpeg'),
(20, 'Mazda CX-9', 'SUV', 'Petrol', 'Automatic', 'DL20CX', 7, 5200.00, 10, 'cx9.jpeg'),

(21, 'Toyota Highlander', 'SUV', 'Petrol', 'Automatic', 'DL21TH', 7, 6000.00, 1, 'highlander.jpeg'),
(22, 'Honda Accord', 'Sedan', 'Hybrid', 'Automatic', 'DL22HA', 5, 3900.00, 2, 'accord.jpeg'),
(23, 'Ford Escape', 'SUV', 'Diesel', 'Automatic', 'DL23FE', 5, 3700.00, 3, 'escape.jpeg'),
(24, 'Chevrolet Malibu', 'Sedan', 'Petrol', 'Automatic', 'DL24CM', 5, 3000.00, 4, 'malibu.jpeg'),
(25, 'Nissan Kicks', 'SUV', 'Petrol', 'Automatic', 'DL25NK', 5, 3200.00, 5, 'kicks.jpeg'),

(26, 'Subaru Crosstrek', 'SUV', 'Petrol', 'Automatic', 'DL26SC', 5, 3500.00, 6, 'crosstrek.jpeg'),
(27, 'Volkswagen Jetta', 'Sedan', 'Petrol', 'Manual', 'DL27VJ', 5, 2700.00, 7, 'jetta.jpeg'),
(28, 'Hyundai Santa Fe', 'SUV', 'Diesel', 'Automatic', 'DL28HSF', 7, 6500.00, 8, 'santafe.jpeg'),
(29, 'Kia Carnival', 'SUV', 'Diesel', 'Automatic', 'DL29KC', 7, 7000.00, 9, 'carnival.jpeg'),
(30, 'Mazda CX-5', 'SUV', 'Petrol', 'Automatic', 'DL30CX', 5, 3800.00, 10, 'cx5.jpeg');


-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mobile` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agencies`
--
ALTER TABLE `agencies`
  ADD PRIMARY KEY (`agency_id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `car_id` (`car_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`car_id`),
  ADD UNIQUE KEY `vehicle_number` (`vehicle_number`),
  ADD KEY `agency_id` (`agency_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agencies`
--
ALTER TABLE `agencies`
  MODIFY `agency_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `car_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`car_id`) REFERENCES `cars` (`car_id`),
  ADD CONSTRAINT `bookings_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`);

--
-- Constraints for table `cars`
--
ALTER TABLE `cars`
  ADD CONSTRAINT `cars_ibfk_1` FOREIGN KEY (`agency_id`) REFERENCES `agencies` (`agency_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
