-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: Mar 28, 2023 at 11:09 PM
-- Server version: 10.10.2-MariaDB-1:10.10.2+maria~ubu2204
-- PHP Version: 8.0.26

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
  `genre` varchar(255) NOT NULL,
  `imagePath` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `artist`
--

INSERT INTO `artist` (`id`, `name`, `genre`, `imagePath`) VALUES
(1, 'Hardwell', 'dance and house', '/img/Artist1.png'),
(2, 'Armin van Buuren', 'trance and techo', '/img/Artist2.png'),
(3, 'Martin Garrix', 'dance and electronic', '/img/Artist3.png'),
(4, 'Tiësto', 'trance, techno, minimal, house and electro', '/img/Artist4.png'),
(5, 'Nicky Romero', 'electrohouse and progressive house', '/img/Artist5.png'),
(6, 'Afrojack', 'house', '/img/Artist6.png');

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
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `small_title` varchar(255) DEFAULT NULL,
  `imagePath` varchar(255) DEFAULT NULL,
  `pageLink` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `description`, `small_title`, `imagePath`, `pageLink`) VALUES
(1, 'A stroll through Haarlem', 'The city of Haarlem is holding a tour to showcase fun and important historical sites. Join us on this tour between the dates of 26-29 of July this year. If you are interested in Haarlem\'s history this tour is for you!', 'Explore the city', '/img/festival-stroll-haarlem.png', '/tour'),
(2, 'Food event', 'Enjoy the wide variety of culinary delights that the city of Haarlem has to offer. Join us as we explore the city one bite at a time.', 'Food', '/img/festival-yummie-event.png', '/food'),
(3, 'Let\'s dance', 'The city of Haarlem welcomes you to a dance party! from popular DJs to up and coming artists, we have it all at Haarlem Dance event. Welcome to the party everyone!', 'Life of the party', '/img/festival-dance-event.png', '/dance');

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
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `imagePath` varchar(255) DEFAULT NULL,
  `capacity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `name`, `address`, `imagePath`, `capacity`) VALUES
(1, 'Lichtfabriek', 'Minckelersweg 2', '/img/danceLocation1.png', 1500),
(2, 'Caprera Openluchttheater', 'Hoge Duin en Daalseweg 2', '/img/danceLocation2.png', 2000),
(3, 'Club Stalker', 'Kromme Elleboogsteeg 2', '/img/danceLocation3.png', 200),
(4, 'Jopenkerk', 'Gedemte Voldergracht 2', '/img/danceLocation4.png', 300),
(5, 'XO the club', 'Grote Markt 8', '/img/danceLocation5.png', 200),
(6, 'Club Ruis', 'Smedestraat 31', '/img/danceLocation6.png', 200);

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE `page` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `html` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`id`, `name`, `html`) VALUES
(1, 'martinGarrix', 'martijn'),
(2, 'sub2', 'sub2'),
(5, 'dance', '<div class=\"pb-[2.5rem] mt-[100px] mb-[150px] lg:w-[1280px] md:w-[100vw] sm:w-[100vw]\" id=\"content-container\">\r\n    <div class=\"grid grid-cols-2 grid-rows-1 h-[600px]\">\r\n      <div class=\"flex flex-col justify-center text-[#F7F7FB] font-[\'Lato\']\">\r\n        <h1 id=\"HeroHeader\" class=\"text-[64px]\">Let\'s Dance</h1>\r\n        <p class=\"w-[80%] text-[20px]\">\r\n          Dance for us is not just an activity, it’s a way of life.\r\n          Come dance the best Dutch produced music out there right here, right now!\r\n        </p>\r\n        <button\r\n          class=\'w-max h-[40px] mt-[15px] text-[#F7F7FB] flex items-center gap-[10px] border-2 border-[#F7F7FB] px-4 py-5 transition ease-in-out cursor-pointer\'>Buy\r\n          Tickets</button>\r\n      </div>\r\n      <div class=\"flex items-center justify-center\">\r\n        <image src=\"/img/danceImg1.png\" class=\"w-[500px]\">\r\n      </div>\r\n    </div>\r\n\r\n    <div id=\"content-wrapper\">\r\n    \r\n    </div>\r\n\r\n  </div>\r\n\r\n  <script src=\"/js/dance/index.js\"></script>\r\n'),
(6, 'home', '  <div id=\"content-container\" class=\"lg:w-[1280px] md:w-[100vw] sm:w-[100vw] pb-[2.5rem]\">\r\n\r\n    <!-- Festival main screeen, background image -->\r\n    <div class=\" w-screen h-[100vh] h-14\">\r\n      <img src=\"/img/festival-homepage.png\" class=\"absolute w-full h-full object-cover z-0\" alt=\"Image description\">\r\n      <div class=\"absolute top-0 left-0 w-full h-full flex items-center justify-center z-10\">\r\n        <p\r\n          class=\"absolute left-40 pl-20 pb-30 font-extrabold tracking-wide text-violet-700 text-6xl text-center opacity-50 \">\r\n          T H E F E S T\r\n          I V A L</p>\r\n        <div class=\"absolute left-20 pl-20 mt-20 text-center text-white\">\r\n          <p class=\"font-extrabold tracking-wide text-3xl mt-10 pl-10\">T H E F E S T I V A L</p>\r\n          <p class=\"text-xl pt-5  tracking-wide\">Enjoy the cultural and historical parts of Haarlem with this festival!\r\n          </p>\r\n        </div>\r\n      </div>\r\n    </div>\r\n\r\n\r\n    <!-- Festival events -->\r\n    <div id=\"events\" class=\" flex justify-center w-[100%] flex-col items-center ml-[150px] bg-white z-0\">\r\n\r\n      \r\n\r\n    </div>\r\n\r\n    <!-- Festival locations-->\r\n    <div class=\"flex items-center mt-[100px] ml-[200px]\">\r\n      <div class=\"flex-none \">\r\n        <img src=\"/img/Vector5.png\" class=\"absolutew-[100px] h-[100px] mt-[50px] ml-[200px] \">\r\n        <img src=\"/img/Vector1.png\" class=\"absolute w-[100px] h-[100px] mt-[150px] ml-[70px]\">\r\n        <img src=\"/img/Vector2.png\" class=\"absolute w-[100px] h-[100px] mt-[200px] ml-[100px] \">\r\n      </div>\r\n      <div class=\"flex-initial ml-[120px] \">\r\n        <p class=\" font-extrabold tracking-wide text-3xl \">Locations</p>\r\n        <img src=\"/img/festival-map-locations.png\" class=\"w-[700px] h-[500px] mt-10\">\r\n      </div>\r\n      <div class=\"flex-none\">\r\n        <img src=\"/img/Vector2.png\" class=\"absolute w-[100px] h-[100px] mt-[100px] ml-[100px] \">\r\n        <img src=\"/img/Vector1.png\" class=\"absolute w-[100px] h-[100px] mt-[180px] ml-[120px]\">\r\n      </div>\r\n    </div>\r\n\r\n    <!-- Festival schedule -->\r\n    <div class=\"flex justify-center mt-[100px] mb-[100px] ml-[600px]\">\r\n      <div>\r\n        <h1 class=\"absolute font-extrabold text-3xl \">Schedule</h1>\r\n      </div>\r\n      <div\r\n        class=\"w-maxcontent h-[175px] bg-blue-100 drop-shadow-lg flex justify-center rounded-[15px] flex-row gap-16 mt-20 leading-5 p-6 lg:pl-[75px] lg:pr-[75px] md:pl-[20px] sm:flex-row\">\r\n        <ul class=\"list-none flex flex-col\">\r\n          <h2 class=\"font-extrabold mb-2\">Events</h2>\r\n          <li class=\"text-sm w-20 pt-6\">Dance!</li>\r\n          <li class=\"text-sm w-20 pt-2\">Yummie!</li>\r\n          <li class=\"text-sm w-40 pt-2\">Stroll through Haarlem</li>\r\n        </ul>\r\n        <ul class=\"list-none flex flex-col w-20\">\r\n          <h2 class=\"font-extrabold mb-2\">Thursday 26 Jul</h2>\r\n          <li class=\"text-sm w-20 pt-2\">10:00-16:00</li>\r\n          <li class=\"text-sm w-20 pt-2\">16:30-23:30</li>\r\n          <li class=\"text-sm w-20 pt-2\">n/a</li>\r\n        </ul>\r\n        <ul class=\"list-none flex flex-col w-20\">\r\n          <h2 class=\"font-extrabold mb-2\">Friday 27 Jul</h2>\r\n          <li class=\"text-sm w-20 pt-2\">10:00-16:00</li>\r\n          <li class=\"text-sm w-20 pt-2\">16:30-23:30</li>\r\n          <li class=\"text-sm w-20 pt-2\">n/a</li>\r\n        </ul>\r\n        <ul class=\"list-none flex flex-col w-20\">\r\n          <h2 class=\"font-extrabold mb-2\">Saturday 28 Jul</h2>\r\n          <li class=\"text-sm w-20 pt-2\">10:00-16:00</li>\r\n          <li class=\"text-sm w-20 pt-2\">16:30-23:30</li>\r\n          <li class=\"text-sm w-20 pt-2\">14:00-00:30</li>\r\n        </ul>\r\n        <ul class=\"list-none flex flex-col w-20\">\r\n          <h2 class=\"font-extrabold mb-2\">Sunday 29 Jul</h2>\r\n          <li class=\"text-sm w-20 pt-2\">10:00-16:00</li>\r\n          <li class=\"text-sm w-20 pt-2\">16:30-23:30</li>\r\n          <li class=\"text-sm w-20 pt-2\">14:00-23:00</li>\r\n        </ul>\r\n        <ul class=\"list-none flex flex-col w-20\">\r\n          <h2 class=\"font-extrabold mb-2\">Monday 30 Jul</h2>\r\n          <li class=\"text-sm w-20 pt-2\">n/a</li>\r\n          <li class=\"text-sm w-20 pt-2\">16:30-23:30</li>\r\n          <li class=\"text-sm w-20 pt-2\">n/a</li>\r\n        </ul>\r\n        <ul class=\"list-none flex flex-col w-20\">\r\n          <h2 class=\"font-extrabold mb-2\">Tuesday 31 Jul</h2>\r\n          <li class=\"text-sm w-20 pt-2\">n/a</li>\r\n          <li class=\"text-sm w-20 pt-2\">16:30-23:30</li>\r\n          <li class=\"text-sm w-20 pt-2\">n/a</li>\r\n        </ul>\r\n      </div>\r\n    </div>\r\n\r\n  </div>\r\n  <script src=\"/js/homepage/index.js\"></script>'),
(7, 'food', '    <div class=\"grid justify-items-center\" id=\"content-container\">\r\n        <div id=\"introSection\" class=\"pt-[150px] pb-[50px] grid grid-cols-2 ml-[150px]\">\r\n            <div id=\"introduction\">\r\n                <h1 class=\"text-[42px] font-bold\"><span class=\"text-[#42BFDD]\">Yummie!</span> Food Event</h1>\r\n                <p class=\"text-2xl\">27 July - 31 July</p>\r\n                <p class=\"text-base w-[700px] pt-[25px]\">Welcome to the Haarlem Food Festival! Come and join us for an\r\n                    amazing\r\n                    culinary experience.\r\n                    This event is a celebration of the culinary delights that the Netherlands has to offer,\r\n                    showcasing different cuisines and the talented chefs who prepare it. <br><br>\r\n                    We look forward to seeing you there!</p>\r\n                <p class=\"text-sm text-[#656262] w-[300px] pt-[5px]\">** €10,- deposit pp. and mandatory reservation.\r\n                    Deposit\r\n                    will be\r\n                    deducted upon payment.**</p>\r\n            </div>\r\n            <img class=\"w-[400px] h-[400px] ml-[180px]\" src=\"/img/circleFoodImage.png\" alt=\"circleFoodImage\">\r\n        </div>\r\n\r\n        <div id=\"restaurants\" class=\"grid justify-center w-[100%] flex-col ml-[500px]\">\r\n        </div>\r\n    </div>\r\n    <script src=\"/js/food/index.js\"></script>'),
(8, 'tour', ' <div class=\"lg:w-[1280px] md:w-[100vw] sm:w-[100vw] mt-[100px]\" id=\"content-container\">\r\n        <div class=\"mt-[100px]\" id=\"introSection\">\r\n            <h1 class=\"text-[36px] font-bold w-[600px]\">Come join us on a stroll through <span class=\"text-[#42BFDD]\">Haarlem’s</span> historic city centre</h1>\r\n            <p class=\"text-xl w-[600px] mt-[20px]\">Take the tour through Haarlem with one of our expert guides, and discover the city’s historic sites.</p>\r\n        </div>\r\n        <div class=\"grid grid-cols-3 mt-[100px] \">\r\n            <img class=\"w-[900px] h-[300px] col-span-2\" src=\"/img/tourImg1.png\">\r\n            <div class=\"col-span-1 ml-[80px]\" id=\"buyTicketsSection1\">\r\n                <h1 class=\"text-[36px] mb-[10px] mt-[20px]\">Buy Tickets</h1>\r\n                <p class=\"mb-[10px]\">Personal tickets €17,50. <br> Family ticket(max 4 participants) €60,00. <br> Date: 26-29 July.</p>\r\n                <button class=\"bg-[#42BFDD] text-white text-[24px] font-bold py-[10px] px-[20px] mt-[20px] rounded-[10px]\">Buy Tickets</button>\r\n            </div>\r\n        </div>\r\n        <div class=\"grid grid-cols-5 mt-[100px] gap-[50px]\" id=\"mapSection\">\r\n            <div class=\"col-span-3\">\r\n                <h1 class=\"text-[36px] font-bold\">Have a look at the route we will be following</h1>\r\n                <img class=\"w-[600px] h-[400px] mt-[40px] ml-[60px]\" src=\"/img/tourRoute.png\">\r\n                <a href=\"/tour/tourOverview\"><button class=\"bg-[#42BFDD] text-white text-[24px] font-bold py-[10px] px-[20px] mt-[20px] rounded-[10px] mt-[40px] ml-[110px]\">View more info on the route and location</button></a>\r\n            </div>\r\n            <img class=\"w-[500px] h-[600px] col-span-2\" src=\"/img/tourImg2.png\">\r\n        </div>\r\n        <div class=\"grid grid-cols-5 mt-[100px]\" id=\"dateSection\">\r\n            <div class=\"col-span-3\" id=\"date\">\r\n                <h1 class=\"text-[36px] font-bold\">Dates</h1>\r\n                <p class=\"text-xl mt-[20px] w-[700px]\">There are multiple tours taking place from 26-29 July. Tours are given in English, Dutch, and French at a frequency of three timeslots per day these timeslots are: 10:00, 13:00, and 16:00. We expect the tour to take around 120 to 150 minutes.</p>\r\n                <div class=\"bg-[#42BFDD] rounded-[10px] w-[700px] h-[200px] mt-[50px]\" id=\"schedule\">\r\n                    <h2 class=\"ml-[20px] pt-[20px] text-[24px] text-white\">Schedule</h2>              \r\n                    <div class=\"grid grid-cols-3 mt-[20px]  bg-[#FFFFFF] pl-[100px]\">\r\n                        <div class=\"col-span-1\">\r\n                            <p>26th July - 29th July 2023</p>\r\n                        </div>\r\n                        <div class=\"col-span-1\">\r\n                            <p class=\"ml-[20px]\">First Timeslot</p>\r\n                            <p class=\"ml-[20px]\">Second Timeslot</p>\r\n                            <p class=\"ml-[20px]\">Third Tiomeslot</p>\r\n                        </div>\r\n                        <div class=\"col-span-1\">\r\n                        <p class=\"ml-[20px]\">10:00</p>\r\n                            <p class=\"ml-[20px]\">13:00</p>\r\n                            <p class=\"ml-[20px]\">16:00</p>\r\n                        </div>\r\n                    </div>\r\n                </div>\r\n            </div>\r\n            <div class=\"col-span-2 ml-[50px]\" id=\"buyTicketsSection2\">\r\n                <h1 class=\"text-[36px] mb-[10px]\">Buy Tickets</h1>\r\n                <p class=\"mb-[10px]\">Personal tickets €17,50. <br> Family ticket(max 4 participants) €60,00. <br> Date: 26-29 July.</p>\r\n                <button class=\"bg-[#42BFDD] text-white text-[24px] font-bold py-[10px] px-[20px] mt-[20px] rounded-[10px]\">Buy Tickets</button>\r\n            </div>\r\n        </div>\r\n        <div class=\"mt-[100px]\" id=\"kidsAppSection\"> \r\n            <h1 class=\"text-[36px] font-bold\">Open to ages 12 and up</h1>\r\n            <p class=\"w-[700px] mt-[20px]\">If you are with children you can participate in Teylers museum special event. Discover professor Teylers secret using an interactive application on your mobile. <span class=\"text-[#42BFDD]\">Download the app on the app store.</span></p>\r\n        </div>\r\n        <div class=\"mt-[50px] grid grid-cols-3 mb-[100px]\">\r\n            <img class=\"w-[1000px] h-[700px] col-span-2\" src=\"/img/appPreview.png\">\r\n            <img class=\"w-[300px] h-[300px] mt-[300px] ml-[50px] col-span-1\" src=\"/img/downloadApp.png\">\r\n        </div>\r\n    </div>'),
(9, 'tourOverview', '<div class=\"lg:w-[1280px] md:w-[100vw] sm:w-[100vw] mt-[100px] mb-[100px]\" id=\"content-container\">\r\n        <h1 class=\"text-[36px] font-bold mt-[100px]\">Haarlem Tour Route</h1>       \r\n               \r\n        <div id=content-wrapper>\r\n            \r\n        </div>\r\n    </div>\r\n\r\n    <script src=\"/js/tour/tourOverview.js\"></script>');

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
(1, 'Ratatouille', 'French, Seafood, Eurpean', 4.7, 'Ratatouille is Haarlem’s only Michelin starred restaurant. Located in the city centre, and owned by a talented chef Jozua Jaring, the restaurant specialises in creating delicious French dishes using fresh, local ingredients. The menu features a wide variety of classic and modern takes on French favourites Offering indoor and outdoor seating, Ratatouille appeals to a broad range of tastes and is sure to please a wide variety of diners.', 'Spaarne 96', '+31 23 542 7270', 52),
(2, 'Mr&Mrs', 'Dutch, Seafood, European', 4.7, 'lorem ipsum', 'Lange Veerstraat 4, 2011 DB Haarlem', '+31 23 531 5935', 40),
(3, 'Specktakel', 'European, International, Asian', 4.5, 'lorem ipsum', 'Klokhuisplein 9, 2011 HK Haarlem', '+31 023 512 3910', 60),
(4, 'Toujours', 'Dutch, Seafood, European', 4.4, 'lorem ipsum', 'Oude Groenmarkt 10-12, 2011 HL Haarlem', '+31 023 532 1699', 48),
(5, 'ML', 'Dutch, Seafood, European', 4.1, 'lorem ipsum', 'Klokhuisplein 9, 2011 HK Haarlem', '+31 023 512 3910', 60),
(6, 'Grand Cafe Brinkmann', 'Modern, Dutch, European', 4.1, 'lorem ipsum', 'Grote Markt 13, 2011 RC Haarlem', '+31 023 532 3111', 100),
(7, 'Fris', 'Dutch, French, European', 4.1, 'lorem ipsum', 'Twijnderslaan 7, 2012 BG Haarlem', '+31 023 531 0717', 45);

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
  `address` varchar(255) NOT NULL,
  `imagePath` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stroll_location`
--

INSERT INTO `stroll_location` (`id`, `name`, `description`, `address`, `imagePath`) VALUES
(1, 'St. Bavo Church', 'The first time St. Bavo Church was mentioned was in 1245 and at that time it was considered a prominent church because of its belfry, and because Influential people like Arnoud van Sassenheim acted there as priests.\r\n\r\nA lot of the furniture dates back from before the iconoclasm of 1566 like the choir fence, choir benches, and copper lectern with pelican. ', 'Grote Markt 22', '/img/stBavoChurch.png'),
(2, 'Grote Markt', NULL, 'Grote Markt', NULL),
(3, 'The Hallen', NULL, 'Grote Markt 16', NULL),
(4, 'Proveniershof', NULL, 'Grote Houtsstraat 140', NULL),
(5, 'Jopenkerk', NULL, 'Emrikweg 21', NULL),
(6, 'Waalse kerk', NULL, 'Begijnhof 30', NULL),
(7, 'Molen de Adriaan', NULL, 'Papentorenvest 1a', NULL),
(8, 'Amsterdamse Poort', NULL, 'Amsterdamsevaart', NULL),
(9, 'Hof van Bakenes', NULL, 'Korte Begijnestraat 21ZW', NULL);

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
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artist`
--
ALTER TABLE `artist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `page`
--
ALTER TABLE `page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
  ADD CONSTRAINT `event_edm_ibfk_1` FOREIGN KEY (`venue`) REFERENCES `location` (`id`),
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
