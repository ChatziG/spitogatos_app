-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Εξυπηρετητής: 127.0.0.1:3308:3308
-- Χρόνος δημιουργίας: 07 Νοε 2022 στις 14:09:57
-- Έκδοση διακομιστή: 10.4.25-MariaDB
-- Έκδοση PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Βάση δεδομένων: `spitogatos_db`
--

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `estates`
--

CREATE TABLE `estates` (
  `estate_id` int(11) NOT NULL,
  `userName` varchar(50) NOT NULL,
  `location` enum('Αθήνα','Θεσσαλονίκη','Πάτρα','Ηράκλειο') NOT NULL,
  `price` int(11) NOT NULL,
  `availability` enum('ενοικίαση','πώληση') NOT NULL,
  `area` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `estates`
--

INSERT INTO `estates` (`estate_id`, `userName`, `location`, `price`, `availability`, `area`) VALUES
(1, 'giannis123', 'Πάτρα', 180, 'ενοικίαση', 35),
(2, 'julia86', 'Αθήνα', 100000, 'πώληση', 80),
(3, 'giannis123', 'Θεσσαλονίκη', 180000, 'πώληση', 120),
(4, 'julia86', 'Ηράκλειο', 250, 'ενοικίαση', 43),
(8, 'giannis123', 'Αθήνα', 346, 'ενοικίαση', 34),
(11, 'julia86', 'Αθήνα', 450, 'ενοικίαση', 55),
(27, 'giannis123', 'Πάτρα', 260, 'ενοικίαση', 40),
(28, 'johndoe34', 'Αθήνα', 50000, 'πώληση', 50),
(29, 'jane24', 'Θεσσαλονίκη', 300, 'ενοικίαση', 37),
(30, 'giannis123', 'Θεσσαλονίκη', 100000, 'πώληση', 75);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `users`
--

INSERT INTO `users` (`id`, `username`, `first_name`, `last_name`, `password`) VALUES
(1, 'giannis123', 'Giannis', 'Chatz', '123qwe'),
(2, 'julia86', 'Julia', 'Johnson', 'qwery123'),
(9, 'johndoe34', 'John', 'Doe', '1234'),
(10, 'jane24', 'Jane', 'Doe', '4321');

--
-- Ευρετήρια για άχρηστους πίνακες
--

--
-- Ευρετήρια για πίνακα `estates`
--
ALTER TABLE `estates`
  ADD PRIMARY KEY (`estate_id`),
  ADD KEY `userName` (`userName`);

--
-- Ευρετήρια για πίνακα `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`,`username`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT για άχρηστους πίνακες
--

--
-- AUTO_INCREMENT για πίνακα `estates`
--
ALTER TABLE `estates`
  MODIFY `estate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT για πίνακα `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Περιορισμοί για άχρηστους πίνακες
--

--
-- Περιορισμοί για πίνακα `estates`
--
ALTER TABLE `estates`
  ADD CONSTRAINT `estates_ibfk_1` FOREIGN KEY (`userName`) REFERENCES `users` (`username`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
