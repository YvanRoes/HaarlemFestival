-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: Mar 15, 2023 at 09:11 PM
-- Server version: 10.10.2-MariaDB-1:10.10.2+maria~ubu2204
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Haarlem-Festival`
--

-- --------------------------------------------------------

--
-- Table structure for table `artist`
--

CREATE TABLE `artist` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `genre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `artist`
--

INSERT INTO `artist` (`id`, `name`, `genre`) VALUES
(1, 'Hardwell', 'dance and house'),
(2, 'Armin van Buuren', 'trance and techo'),
(3, 'Martin Garrix', 'dance and electronic'),
(4, 'Tiësto', 'trance, techno, minimal, house and electro'),
(5, 'Nicky Romero', 'electrohouse and progressive house'),
(6, 'Afrojack', 'house');

-- --------------------------------------------------------

--
-- Table structure for table `artist_event_edm`
--

CREATE TABLE `artist_event_edm` (
  `artist_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `event_edm`
--

CREATE TABLE `event_edm` (
  `id` int(11) NOT NULL,
  `venue` int(11) NOT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `event_stroll`
--

CREATE TABLE `event_stroll` (
  `id` int(11) NOT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `event_yummie`
--

CREATE TABLE `event_yummie` (
  `id` int(11) NOT NULL,
  `restaurant` int(11) NOT NULL,
  `price_adult` double NOT NULL,
  `price_child` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE `page` (
  `id` int(11) NOT NULL,
  `folder` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `html` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`id`, `folder`, `name`, `html`) VALUES
(1, NULL, 'martinGarrix', 'martijn'),
(2, NULL, 'sub2', 'sub2'),
(3, NULL, 'danceIndex', '<style>\r\n  @import url(\'https://fonts.googleapis.com/css2?family=Lato&display=swap\');\r\n\r\n  * {\r\n    padding: 0px;\r\n    margin: 0px;\r\n    /* outline: 1px solid red; */\r\n  }\r\n</style>\r\n\r\n<title>Dance</title>\r\n<script src=\"https://cdn.tailwindcss.com\"></script>\r\n\r\n<body class=\"h-[100vh] overflow-x-hidden bg-[#121212] flex flex-col items-center h-fit w-screen\">\r\n  <div id=\"content-wrapper\">\r\n    \r\n  </div>\r\n  <script src=\"/js/dance/index.js\"></script>\r\n</body>');

-- --------------------------------------------------------

--
-- Table structure for table `personal_program`
--

CREATE TABLE `personal_program` (
  `user_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `category` varchar(255) DEFAULT NULL,
  `michelin_star` double NOT NULL,
  `description` text DEFAULT NULL,
  `address` varchar(1000) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `capacity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`id`, `name`, `category`, `michelin_star`, `description`, `address`, `phone_number`, `capacity`) VALUES
(1, 'Ratatouille', 'French, Seafood, Eurpean', 4.7, 'Ratatouille is Haarlem’s only Michelin starred restaurant. Located in the city centre, and owned by a talented chef Jozua Jaring, the restaurant specialises in creating delicious French dishes using fresh, local ingredients. The menu features a wide variety of classic and modern takes on French favourites Offering indoor and outdoor seating, Ratatouille appeals to a broad range of tastes and is sure to please a wide variety of diners.', 'Spaarne 96', '31235427270', 52);

-- --------------------------------------------------------

--
-- Table structure for table `route`
--

CREATE TABLE `route` (
  `location_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stroll_location`
--

CREATE TABLE `stroll_location` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stroll_location`
--

INSERT INTO `stroll_location` (`id`, `name`, `description`, `address`) VALUES
(1, 'St. Bavo Church', 'The first time St. Bavo Church was mentioned was in 1245 and at that time it was considered a prominent church because of its belfry, and because Influential people like Arnoud van Sassenheim acted there as priests.\r\n\r\nA lot of the furniture dates back from before the iconoclasm of 1566 like the choir fence, choir benches, and copper lectern with pelican. ', 'Grote Markt 22'),
(2, 'Grote Markt', NULL, 'Grote Markt'),
(3, 'The Hallen', NULL, 'Grote Markt 16'),
(4, 'Proveniershof', NULL, 'Grote Houtsstraat 140'),
(5, 'Jopenkerk', NULL, 'Emrikweg 21'),
(6, 'Waalse kerk', NULL, 'Begijnhof 30'),
(7, 'Molen de Adriaan', NULL, 'Papentorenvest 1a'),
(8, 'Amsterdamse Poort', NULL, 'Amsterdamsevaart'),
(9, 'Hof van Bakenes', NULL, 'Korte Begijnestraat 21ZW');

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `id` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ticket_edm`
--

CREATE TABLE `ticket_edm` (
  `id` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `event_edm_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ticket_stroll`
--

CREATE TABLE `ticket_stroll` (
  `id` int(11) NOT NULL,
  `event_stroll_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ticket_yummie`
--

CREATE TABLE `ticket_yummie` (
  `id` int(11) NOT NULL,
  `event_yummie_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(25) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(256) DEFAULT NULL,
  `role` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`) VALUES
(1, 'admin', 'admin@gmail.com', '5d7845ac6ee7cfffafc5fe5f35cf666d', 9),
(2, 'customer', 'customer@gmail.com', '5d7845ac6ee7cfffafc5fe5f35cf666d', 0),
(3, 'employee', 'employee@gmail.com', '5d7845ac6ee7cfffafc5fe5f35cf666d', 1),
(4, 'Test', 'test@gmail.com', '5d7845ac6ee7cfffafc5fe5f35cf666d', 0);

-- --------------------------------------------------------

--
-- Table structure for table `venue`
--

CREATE TABLE `venue` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `capacity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `venue`
--

INSERT INTO `venue` (`id`, `name`, `location`, `capacity`) VALUES
(1, 'Lichtfabriek', 'Minckelersweg 2', 1500),
(2, 'Caprera Openluchttheater', 'Hoge Duin en Daalseweg 2', 2000),
(3, 'Club Stalker', 'Kromme Elleboogsteeg 2', 200),
(4, 'Jopenkerk', 'Gedemte Voldergracht 2', 300),
(5, 'XO the club', 'Grote Markt 8', 200),
(6, 'Club Ruis', 'Smedestraat 31', 200);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artist`
--
ALTER TABLE `artist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `artist_event_edm`
--
ALTER TABLE `artist_event_edm`
  ADD KEY `artist_id` (`artist_id`),
  ADD KEY `event_id` (`event_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_edm`
--
ALTER TABLE `event_edm`
  ADD PRIMARY KEY (`id`),
  ADD KEY `venue` (`venue`);

--
-- Indexes for table `event_stroll`
--
ALTER TABLE `event_stroll`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_yummie`
--
ALTER TABLE `event_yummie`
  ADD PRIMARY KEY (`id`),
  ADD KEY `restaurant` (`restaurant`);

--
-- Indexes for table `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_program`
--
ALTER TABLE `personal_program`
  ADD KEY `user_id` (`user_id`),
  ADD KEY `event_id` (`event_id`);

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `route`
--
ALTER TABLE `route`
  ADD KEY `location_id` (`location_id`),
  ADD KEY `event_id` (`event_id`);

--
-- Indexes for table `stroll_location`
--
ALTER TABLE `stroll_location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `ticket_edm`
--
ALTER TABLE `ticket_edm`
  ADD KEY `id` (`id`),
  ADD KEY `event_edm_id` (`event_edm_id`);

--
-- Indexes for table `ticket_stroll`
--
ALTER TABLE `ticket_stroll`
  ADD KEY `id` (`id`),
  ADD KEY `event_stroll_id` (`event_stroll_id`);

--
-- Indexes for table `ticket_yummie`
--
ALTER TABLE `ticket_yummie`
  ADD KEY `event_yummie_id` (`event_yummie_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `venue`
--
ALTER TABLE `venue`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artist`
--
ALTER TABLE `artist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `page`
--
ALTER TABLE `page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `stroll_location`
--
ALTER TABLE `stroll_location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `venue`
--
ALTER TABLE `venue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `artist_event_edm`
--
ALTER TABLE `artist_event_edm`
  ADD CONSTRAINT `artist_event_edm_ibfk_1` FOREIGN KEY (`artist_id`) REFERENCES `artist` (`id`),
  ADD CONSTRAINT `artist_event_edm_ibfk_2` FOREIGN KEY (`event_id`) REFERENCES `event_edm` (`id`);

--
-- Constraints for table `event_edm`
--
ALTER TABLE `event_edm`
  ADD CONSTRAINT `event_edm_ibfk_1` FOREIGN KEY (`venue`) REFERENCES `venue` (`id`),
  ADD CONSTRAINT `event_edm_ibfk_2` FOREIGN KEY (`id`) REFERENCES `events` (`id`);

--
-- Constraints for table `event_stroll`
--
ALTER TABLE `event_stroll`
  ADD CONSTRAINT `event_stroll_ibfk_1` FOREIGN KEY (`id`) REFERENCES `events` (`id`);

--
-- Constraints for table `event_yummie`
--
ALTER TABLE `event_yummie`
  ADD CONSTRAINT `event_yummie_ibfk_1` FOREIGN KEY (`restaurant`) REFERENCES `restaurant` (`id`),
  ADD CONSTRAINT `event_yummie_ibfk_2` FOREIGN KEY (`id`) REFERENCES `events` (`id`);

--
-- Constraints for table `personal_program`
--
ALTER TABLE `personal_program`
  ADD CONSTRAINT `personal_program_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `personal_program_ibfk_2` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`);

--
-- Constraints for table `route`
--
ALTER TABLE `route`
  ADD CONSTRAINT `route_ibfk_1` FOREIGN KEY (`location_id`) REFERENCES `stroll_location` (`id`),
  ADD CONSTRAINT `route_ibfk_2` FOREIGN KEY (`event_id`) REFERENCES `event_stroll` (`id`);

--
-- Constraints for table `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `ticket_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `ticket_edm`
--
ALTER TABLE `ticket_edm`
  ADD CONSTRAINT `ticket_edm_ibfk_1` FOREIGN KEY (`id`) REFERENCES `ticket` (`id`),
  ADD CONSTRAINT `ticket_edm_ibfk_2` FOREIGN KEY (`event_edm_id`) REFERENCES `event_edm` (`id`);

--
-- Constraints for table `ticket_stroll`
--
ALTER TABLE `ticket_stroll`
  ADD CONSTRAINT `ticket_stroll_ibfk_1` FOREIGN KEY (`id`) REFERENCES `ticket` (`id`),
  ADD CONSTRAINT `ticket_stroll_ibfk_2` FOREIGN KEY (`event_stroll_id`) REFERENCES `event_stroll` (`id`);

--
-- Constraints for table `ticket_yummie`
--
ALTER TABLE `ticket_yummie`
  ADD CONSTRAINT `ticket_yummie_ibfk_1` FOREIGN KEY (`event_yummie_id`) REFERENCES `event_yummie` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
