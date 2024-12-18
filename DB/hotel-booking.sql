-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2024 at 07:26 PM
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
-- Database: `hotel-booking`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `adminname` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `mypassword` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `adminname`, `email`, `mypassword`, `created_at`) VALUES
(1, 'Mario', 'testing@gmail.com', '$2y$10$0R8jCkL0JjsIcIbtR87hBuTJbusTgqfYV9YCIfqILpFsx/1SgBsuC', '2024-12-15 14:11:39'),
(2, 'newAdmin', 'newEmail@gmail.com', '$2y$10$7b3mncWFoztd4iScBX/cJeD4gDVaVgFpAb58053d5fnCOR9C8VutW', '2024-12-16 10:49:48'),
(3, 'test', 'testing2@gmail.com', '$2y$10$kja/kUZwxLRYdwZrAM9TGOujb3I8jycH0GRROvFHa2C2awt5NZCEC', '2024-12-18 16:00:42');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(5) NOT NULL,
  `check_in` varchar(200) NOT NULL,
  `check_out` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone_number` int(40) NOT NULL,
  `full_name` varchar(40) NOT NULL,
  `hotel_name` varchar(200) NOT NULL,
  `room_name` varchar(200) NOT NULL,
  `user_id` int(5) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `check_in`, `check_out`, `email`, `phone_number`, `full_name`, `hotel_name`, `room_name`, `user_id`, `created_at`) VALUES
(1, '12/26/2024', '12/31/2024', 'testing@gmail.com', 761234, 'testing', 'Sheraton', 'Suite Room', 1, '2024-12-14 21:06:02');

-- --------------------------------------------------------

--
-- Table structure for table `hotels`
--

CREATE TABLE `hotels` (
  `id` int(5) NOT NULL,
  `name` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `location` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hotels`
--

INSERT INTO `hotels` (`id`, `name`, `image`, `description`, `location`, `created_at`, `status`) VALUES
(1, 'Sheraton', 'services-1.jpg', 'Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.', 'Cairo', '2024-12-14 15:57:42', 1),
(2, 'The Plaza Hotel', 'image_4.jpg', 'Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.', 'New York', '2024-12-14 15:57:42', 1),
(3, 'The Ritz', 'image_4.jpg', 'Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.', 'Paris', '2024-12-14 15:57:42', 1);

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(5) NOT NULL,
  `name` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `num_persons` int(5) NOT NULL,
  `size` int(5) NOT NULL,
  `view` varchar(200) NOT NULL,
  `num_beds` int(5) NOT NULL,
  `hotel_id` int(5) NOT NULL,
  `hotel_name` varchar(200) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `name`, `image`, `num_persons`, `size`, `view`, `num_beds`, `hotel_id`, `hotel_name`, `status`, `created_at`) VALUES
(1, 'Suite Room', 'room-1.jpg', 3, 50, 'Sea View', 2, 1, 'Sheraton', 1, '2024-12-14 16:30:22'),
(2, 'Standard Room', 'room-2.jpg', 4, 60, 'Sea View', 2, 2, 'The Plaza Hotel', 1, '2024-12-14 16:30:22'),
(3, 'Family Room', 'room-3.jpg', 5, 45, 'Sea View', 2, 3, 'The Ritz', 1, '2024-12-14 16:30:22');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(5) NOT NULL,
  `username` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `mypassword` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `mypassword`, `created_at`) VALUES
(1, 'testing', 'testing@gmail.com', '$2y$10$0R8jCkL0JjsIcIbtR87hBuTJbusTgqfYV9YCIfqILpFsx/1SgBsuC', '2024-12-14 14:43:48'),
(2, 'testing2', 'testing2@gmail.com', '$2y$10$0yaKMCnejy0j.T0QEPYJj.1iqAkP44hZVJcV6EJQWl4jWOLINb0K.', '2024-12-15 12:49:31'),
(3, 'test', 't@gmail.com', '$2y$10$IHYXGfoz9vQo.kqxyFhCQe9cnuG7knNm2IhjZr5pnpklnlSl1YsD2', '2024-12-18 18:18:11');

-- --------------------------------------------------------

--
-- Table structure for table `utilities`
--

CREATE TABLE `utilities` (
  `id` int(5) NOT NULL,
  `name` varchar(200) NOT NULL,
  `icon` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `room_id` int(5) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `utilities`
--

INSERT INTO `utilities` (`id`, `name`, `icon`, `description`, `room_id`, `created_at`) VALUES
(1, 'Tea Coffee', 'flaticon-diet', 'A small river named Duden flows by their place and supplies it with the necessary', 1, '2024-12-14 17:24:41'),
(2, 'Hot Showers', 'flaticon-workout', 'A small river named Duden flows by their place and supplies it with the necessary', 2, '2024-12-14 17:24:41'),
(3, 'Laundry', 'flaticon-first', 'A small river named Duden flows by their place and supplies it with the necessary', 3, '2024-12-14 17:24:41'),
(4, 'Air Conditioning', 'flaticon-first', 'A small river named Duden flows by their place and supplies it with the necessary', 1, '2024-12-14 17:24:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `utilities`
--
ALTER TABLE `utilities`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hotels`
--
ALTER TABLE `hotels`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `utilities`
--
ALTER TABLE `utilities`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
