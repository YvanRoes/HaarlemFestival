-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: Mar 26, 2023 at 07:39 PM
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
  `imagePath` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `description`, `small_title`, `imagePath`) VALUES
(1, 'A stroll through Haarlem', 'The city of Haarlem is holding a tour to showcase fun and important historical sites. Join us on this tour between the dates of 26-29 of July this year. If you are interested in Haarlem\'s history this tour is for you!', 'Explore the city', '/img/festival-stroll-haarlem.png'),
(2, 'Food event', 'Enjoy the wide variety of culinary delights that the city of Haarlem has to offer. Join us as we explore the city one bite at a time.', 'Food', '/img/festival-yummie-event.png'),
(3, 'Let\'s dance', 'The city of Haarlem welcomes you to a dance party! from popular DJs to up and coming artists, we have it all at Haarlem Dance event. Welcome to the party everyone!', 'Life of the party', '/img/festival-dance-event.png');

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
(3, NULL, 'danceIndex', '<style>\r\n  @import url(\'https://fonts.googleapis.com/css2?family=Lato&display=swap\');\r\n\r\n  * {\r\n    padding: 0px;\r\n    margin: 0px;\r\n    /* outline: 1px solid red; */\r\n  }\r\n</style>\r\n\r\n<title>Home</title>\r\n<script src=\"https://cdn.tailwindcss.com\"></script>\r\n\r\n<body class=\"h-[100vh] overflow-x-hidden bg-[#121212] flex flex-col items-center h-fit w-screen\">\r\n  <?php\r\n  include __DIR__ . \'/../header.php\';\r\n  generateHeader(\'dance\', \'light\');\r\n  ?>\r\n  <div id=\"content-wrapper\">\r\n    \r\n  </div>\r\n  <?php\r\n  include __DIR__ . \'/../danceFooter.php\';\r\n  ?>\r\n  <script src=\"/js/dance/index.js\"></script>\r\n</body>\r\n'),
(5, NULL, 'dance', '<div class=\"pb-[2.5rem] mt-[100px] mb-[150px] lg:w-[1280px] md:w-[100vw] sm:w-[100vw]\" id=\"content-container\">\r\n<div class=\"grid grid-cols-2 grid-rows-1 h-[600px]\">\r\n<div class=\"flex flex-col justify-center text-[#F7F7FB] font-[\'Lato\']\">\r\n<h1 class=\"text-[64px]\" id=\"HeroHeader\">Let&#39;s Dance</h1>\r\n\r\n<p class=\"w-[80%] text-[20px]\">Dance for us is not just an activity, it&rsquo;s a way of life. Come dance the best Dutch produced music out there right here, right now!</p>\r\n<button class=\"w-max h-[40px] mt-[15px] text-[#F7F7FB] flex items-center gap-[10px] border-2 border-[#F7F7FB] px-4 py-5 transition ease-in-out cursor-pointer\">Buy Tickets</button></div>\r\n\r\n<div class=\"flex items-center justify-center\"><img class=\"w-[500px]\" src=\"/img/danceImg1.png\" /></div>\r\n</div>\r\n\r\n<div class=\"flex justify-center mt-[100px]\">\r\n<h1 class=\"text-[64px] text-[#F7F7FB] font-[\'Lato\']\">The Artists</h1>\r\n</div>\r\n\r\n<div class=\"grid grid-cols-3 grid-rows-2\">\r\n<div class=\"flex flex-col justify-center items-center\"><img class=\"w-[300px]\" src=\"/img/artist1.png\" /></div>\r\n\r\n<div class=\"flex flex-col justify-center items-center mt-[100px]\"><img class=\"w-[300px]\" src=\"/img/artist2.png\" /></div>\r\n\r\n<div class=\"flex flex-col justify-center items-center mt-[200px]\"><img class=\"w-[300px]\" src=\"/img/artist3.png\" /></div>\r\n\r\n<div class=\"flex flex-col justify-center items-center\"><img class=\"w-[300px]\" src=\"/img/artist4.png\" /></div>\r\n\r\n<div class=\"flex flex-col justify-center items-center mt-[100px]\"><img class=\"w-[300px]\" src=\"/img/artist5.png\" /></div>\r\n\r\n<div class=\"flex flex-col justify-center items-center mt-[200px]\"><img class=\"w-[300px]\" src=\"/img/artist6.png\" /></div>\r\n</div>\r\n\r\n<div class=\"flex justify-center mt-[100px]\">\r\n<h1 class=\"text-[64px] text-[#F7F7FB] font-[\'Lato\']\">The Planning</h1>\r\n</div>\r\n\r\n<div class=\"grid grid-cols-6 mt-[50px] text-[24px] text-[#F7F7FB] font-[\'Lato\'] \">\r\n<h2 class=\"outline outline-1 outline-white pl-[3px]\">Date</h2>\r\n\r\n<h2 class=\"outline outline-1 outline-white pl-[3px]\">Location</h2>\r\n\r\n<h2 class=\"col-span-2 outline outline-1 outline-white pl-[3px]\">Artist</h2>\r\n\r\n<h2 class=\"outline outline-1 outline-white pl-[3px]\">Tickets</h2>\r\n\r\n<h2 class=\"outline outline-1 outline-white pl-[3px]\">Price</h2>\r\n\r\n<h2 class=\"outline outline-1 outline-white pl-[3px]\">Fri, Jul. 27 20:00</h2>\r\n\r\n<h2 class=\"outline outline-1 outline-white pl-[3px]\">LichtFabriek</h2>\r\n\r\n<h2 class=\"col-span-2 outline outline-1 outline-white pl-[3px]\">Nicky Romero/ Afrojack</h2>\r\n\r\n<h2 class=\"outline outline-1 outline-white pl-[3px]\">1500</h2>\r\n\r\n<h2 class=\"outline outline-1 outline-white pl-[3px]\">&euro;75.00</h2>\r\n</div>\r\n\r\n<p class=\"text-[#656262] mt-[10px]\">* The capacity of the Club sessions is very limited. Availability for All-Access pas holders can not be garanteed due to safety regulations. Tickets available represents total capacity. (90% is sold as single tickets. 10% of total capacity is left for Walk ins/All-Acces passholders.)</p>\r\n\r\n<div class=\"flex justify-center\"><button class=\"mt-[100px] w-[200px] h-[50px] text-white outline outline-3 white\">Buy Tickets</button></div>\r\n\r\n<div class=\"flex justify-center mt-[100px] mb-[50px]\">\r\n<h1 class=\"text-[64px] text-[#F7F7FB] font-[\'Lato\']\">Locations</h1>\r\n</div>\r\n\r\n<div class=\"grid grid-cols-2 gap-x-[20px] gap-y-[20px]\">\r\n<div class=\"grid grid-cols-2 grid-rows-2 outline outline-1 outline-white\">\r\n<h2 class=\"text-[24px] text-[#F7F7FB] font-[\'Lato\'] mt-[20px] ml-[10px]\">LichtFabriek</h2>\r\n<img class=\"grid justify-self-end row-span-2 w-[253px] h-[161px]\" src=\"/img/danceLocation1.png\" />\r\n<h2 class=\"text-[20px] text-[#F7F7FB] font-[\'Lato\'] ml-[10px]\">Minckelersweg 2, 2031 EM Haarlem</h2>\r\n</div>\r\n\r\n<div class=\"grid grid-cols-2 grid-rows-2 outline outline-1 outline-white\">\r\n<h2 class=\"text-[24px] text-[#F7F7FB] font-[\'Lato\'] mt-[20px] ml-[10px]\">Jopenkerk</h2>\r\n<img class=\"grid justify-self-end row-span-2 w-[253px] h-[161px]\" src=\"/img/danceLocation2.png\" />\r\n<h2 class=\"text-[20px] text-[#F7F7FB] font-[\'Lato\'] ml-[10px]\">Gedempte Voldersgracht 2, 2011 WD Haarlem</h2>\r\n</div>\r\n\r\n<div class=\"grid grid-cols-2 grid-rows-2 outline outline-1 outline-white\">\r\n<h2 class=\"text-[24px] text-[#F7F7FB] font-[\'Lato\'] mt-[20px] ml-[10px]\">Caprera Openluchttheater</h2>\r\n<img class=\"grid justify-self-end row-span-2 w-[253px] h-[161px]\" src=\"/img/danceLocation3.png\" />\r\n<h2 class=\"text-[20px] text-[#F7F7FB] font-[\'Lato\'] ml-[10px]\">Hoge Duin en Daalseweg 2, 2061 AG Bloemendaal</h2>\r\n</div>\r\n\r\n<div class=\"grid grid-cols-2 grid-rows-2 outline outline-1 outline-white\">\r\n<h2 class=\"text-[24px] text-[#F7F7FB] font-[\'Lato\'] mt-[20px] ml-[10px]\">XO the Club</h2>\r\n<img class=\"grid justify-self-end row-span-2 w-[253px] h-[161px]\" src=\"/img/danceLocation4.png\" />\r\n<h2 class=\"text-[20px] text-[#F7F7FB] font-[\'Lato\'] ml-[10px]\">Grote Markt 8, 2011 RD Haarlem</h2>\r\n</div>\r\n\r\n<div class=\"grid grid-cols-2 grid-rows-2 outline outline-1 outline-white\">\r\n<h2 class=\"text-[24px] text-[#F7F7FB] font-[\'Lato\'] mt-[20px] ml-[10px]\">Club Stalker</h2>\r\n<img class=\"grid justify-self-end row-span-2 w-[253px] h-[161px]\" src=\"/img/danceLocation5.png\" />\r\n<h2 class=\"text-[20px] text-[#F7F7FB] font-[\'Lato\'] ml-[10px]\">Kromme Elleboogsteeg 20, 2011 TS Haarlem</h2>\r\n</div>\r\n\r\n<div class=\"grid grid-cols-2 grid-rows-2 outline outline-1 outline-white\">\r\n<h2 class=\"text-[24px] text-[#F7F7FB] font-[\'Lato\'] mt-[20px] ml-[10px]\">Club Ruis</h2>\r\n<img class=\"grid justify-self-end row-span-2 w-[253px] h-[161px]\" src=\"/img/danceLocation6.png\" />\r\n<h2 class=\"text-[20px] text-[#F7F7FB] font-[\'Lato\'] ml-[10px]\">Smedestraat 31, 2011 RE Haarlem</h2>\r\n</div>\r\n</div>\r\n</div>\r\n'),
(6, NULL, 'home', '<div class=\"pb-[2.5rem] w-[1280px]\" id=\"content-container\"><!-- Festival main screeen, background image -->\r\n<div class=\"w-screen h-[100vh] h-14\"><img alt=\"Image description\" class=\"absolute w-full h-full object-cover z-0\" src=\"/img/festival-homepage.png\" />\r\n<div class=\"absolute top-0 left-0 w-full h-full flex items-center justify-center z-10\">\r\n<p class=\"absolute left-40 pl-20 pb-30 font-extrabold tracking-wide text-violet-700 text-6xl text-center opacity-50 \">T H E F E S T I V A L</p>\r\n\r\n<div class=\"absolute left-20 pl-20 mt-20 text-center text-white\">\r\n<p class=\"font-extrabold tracking-wide text-3xl mt-10 pl-10\">T H E F E S T I V A L</p>\r\n\r\n<p class=\"text-xl pt-5  tracking-wide\">Enjoy the cultural and historical parts of Haarlem with this festival!</p>\r\n</div>\r\n</div>\r\n</div>\r\n<!-- Festival events -->\r\n\r\n<div class=\"flex justify-center w-[100%] flex-col  bg-white z-0 ml-[150px]\" id=\"events\"><!-- stroll event -->\r\n<div class=\"flex item-center center\">\r\n<div class=\"flex-none\"><img class=\"w-[300px] h-[350px] ml-[100px]\" src=\"/img/festival-stroll-haarlem.png\" /></div>\r\n\r\n<div class=\"flex-initial\"><img class=\"w-[150px] h-[150px] mt-[150px] ml-[30px] \" src=\"/img/Arrow-1.png\" /> <img class=\"absolute w-[100px] h-[100px] mb-[20px] \" src=\"/img/Vector1.png\" /></div>\r\n\r\n<div class=\"flex-initial w-[500px] mt-[0px] ml-[30px] \"><img class=\"w-[100px] h-[100px] mt-[0px] ml-[300px] \" src=\"/img/Vector1.png\" />\r\n<h3 class=\"font-extrabold text-violet-700 mt-[20px]\">Explore the city</h3>\r\n\r\n<h1 class=\"font-extrabold text-3xl mt-[20px]\">A stroll through Haarlem</h1>\r\n\r\n<p class=\"text-left text-sm mt-[20px]\">The city of Haarlem is holding a tour to showcase fun and important historical sites. Join us on this tour between the dates of 26-29 of July this year. If you are interested in Haarlem&#39;s history this tour is for you!</p>\r\n<button class=\"bg-blue-500 text-white drop-shadow-sm font-bold py-2 px-8 mt-[20px]\">Explore now!</button></div>\r\n\r\n<div class=\"flex-none\"><img class=\"absolute w-[100px] h-[100px] mt-[60px] ml-[150px]  \" src=\"/img/Vector2.png\" /> <img class=\"absolute w-[100px] h-[100px] mt-[70px] ml-[100px] \" src=\"/img/Vector5.png\" /> <img class=\"absolute w-[100px] h-[100px] mt-[200px] ml-[300px] \" src=\"/img/Vector1.png\" /></div>\r\n</div>\r\n<!-- yummie event -->\r\n\r\n<div class=\"flex item-center center mt-20\">\r\n<div class=\"flex-none\"><img class=\"absolute w-[100px] h-[100px] mt-[100px] ml-[150px]  \" src=\"/img/Vector2.png\" /> <img class=\"absolute w-[100px] h-[100px] mt-[120px] ml-[100px] \" src=\"/img/Vector1.png\" /></div>\r\n\r\n<div class=\"flex-none ml-[350px] w-[500px] pt-20\"><img class=\"w-[100px] h-[100px] mr-[100px] ml-[300px] \" src=\"/img/Vector5.png\" />\r\n<h3 class=\"font-extrabold text-violet-700 mt-[20px]\">Food</h3>\r\n\r\n<h1 class=\"font-extrabold text-3xl mt-[20px]\">Yummie!Food event</h1>\r\n\r\n<p class=\"text-left text-sm mt-[20px] \">Enjoy the wide variety of culinaty delights that the city of Haarlem has to offer. Join us as we explore the city one bite at a time.</p>\r\n<button class=\"bg-blue-500 text-white drop-shadow-sm font-bold py-2 px-8 mt-[20px]\">Explore now!</button></div>\r\n\r\n<div class=\"flex-initial pt-20\"><img class=\"w-[250px] h-[150px] mt-[100px] ml-[30px] \" src=\"/img/Arrow-2.png\" /> <img class=\"absolute w-[100px] h-[100px] ml-[150px] \" src=\"/img/Vector2.png\" /></div>\r\n\r\n<div class=\"flex-initial w-[500px] mt-[0px] ml-[50px] \"><img class=\"w-[300px] h-[350px] mb-100\" src=\"/img/festival-yummie-event.png\" /></div>\r\n</div>\r\n<!-- dance event -->\r\n\r\n<div class=\"flex item-center center mt-[100px]\">\r\n<div class=\"flex-none ml-[100px] w-[500px] pt-20\"><img class=\"w-[100px] h-[100px] mr-[100px] ml-[300px] \" src=\"/img/Vector5.png\" />\r\n<h3 class=\"font-extrabold text-violet-700 mt-[20px]\">Life of the party</h3>\r\n\r\n<h1 class=\"font-extrabold text-3xl mt-[20px]\">Let&#39;s dance</h1>\r\n\r\n<p class=\"text-left text-sm mt-[20px] \">The city of haarlem welcomes you to a dance party! from popular DJs to up and coming artists, we have it all at Haarlem Dance event. Welcome to the party everyone!</p>\r\n<button class=\"bg-blue-500 text-white drop-shadow-sm font-bold py-2 px-8 mt-[20px]\">Explore now!</button></div>\r\n\r\n<div class=\"flex-initial pt-20\"><img class=\"w-[250px] h-[150px] mt-[100px] ml-[30px] \" src=\"/img/Arrow-3.png\" /> <img class=\"absolute w-[100px] h-[100px] ml-[150px] \" src=\"/img/Vector1.png\" /></div>\r\n\r\n<div class=\"flex-initial w-[400px]  ml-[50px] \"><img class=\"w-[300px] h-[350px] mb-100\" src=\"/img/festival-dance-event.png\" /></div>\r\n\r\n<div class=\"flex-none\"><img class=\"absolute w-[100px] h-[100px] ml-[50px] \" src=\"/img/Vector1.png\" /> <img class=\"absolute w-[100px] h-[100px] mt-[70px] \" src=\"/img/Vector5.png\" /></div>\r\n</div>\r\n</div>\r\n<!-- Festival locations-->\r\n\r\n<div class=\"flex item-center center mt-[100px]\">\r\n<div class=\"flex-none \"><img class=\"absolutew-[100px] h-[100px] mt-[50px] ml-[200px] \" src=\"/img/Vector5.png\" /> <img class=\"absolute w-[100px] h-[100px] mt-[150px] ml-[70px]\" src=\"/img/Vector1.png\" /> <img class=\"absolute w-[100px] h-[100px] mt-[200px] ml-[100px] \" src=\"/img/Vector2.png\" /></div>\r\n\r\n<div class=\"flex-initial ml-[120px] \">\r\n<p class=\"font-extrabold tracking-wide text-3xl \">Locations</p>\r\n<img class=\"w-[700px] h-[500px] mt-10\" src=\"/img/festival-map-locations.png\" /></div>\r\n\r\n<div class=\"flex-none\"><img class=\"absolute w-[100px] h-[100px] mt-[100px] ml-[100px] \" src=\"/img/Vector2.png\" /> <img class=\"absolute w-[100px] h-[100px] mt-[180px] ml-[120px]\" src=\"/img/Vector1.png\" /></div>\r\n</div>\r\n<!-- Festival schedule -->\r\n\r\n<div class=\"flex justify-center mt-[100px] mb-[100px]\">\r\n<div>\r\n<h1 class=\"absolute font-extrabold text-3xl \">Schedule</h1>\r\n</div>\r\n\r\n<div class=\"w-maxcontent h-[175px] bg-blue-100 drop-shadow-lg flex justify-center rounded-[15px] flex-row gap-16 mt-20 leading-5 p-6 lg:pl-[75px] lg:pr-[75px] md:pl-[20px] sm:flex-row\">\r\n<h2 class=\"font-extrabold mb-2\">Events</h2>\r\n\r\n<ul class=\"list-none flex flex-col\">\r\n	<li class=\"text-sm w-20 pt-6\">Dance!</li>\r\n	<li class=\"text-sm w-20 pt-2\">Yummie!</li>\r\n	<li class=\"text-sm w-40 pt-2\">Stroll through Haarlem</li>\r\n</ul>\r\n\r\n<h2 class=\"font-extrabold mb-2\">Thursday 26 Jul</h2>\r\n\r\n<ul class=\"list-none flex flex-col w-20\">\r\n	<li class=\"text-sm w-20 pt-2\">10:00-16:00</li>\r\n	<li class=\"text-sm w-20 pt-2\">16:30-23:30</li>\r\n	<li class=\"text-sm w-20 pt-2\">n/a</li>\r\n</ul>\r\n\r\n<h2 class=\"font-extrabold mb-2\">Friday 27 Jul</h2>\r\n\r\n<ul class=\"list-none flex flex-col w-20\">\r\n	<li class=\"text-sm w-20 pt-2\">10:00-16:00</li>\r\n	<li class=\"text-sm w-20 pt-2\">16:30-23:30</li>\r\n	<li class=\"text-sm w-20 pt-2\">n/a</li>\r\n</ul>\r\n\r\n<h2 class=\"font-extrabold mb-2\">Saturday 28 Jul</h2>\r\n\r\n<ul class=\"list-none flex flex-col w-20\">\r\n	<li class=\"text-sm w-20 pt-2\">10:00-16:00</li>\r\n	<li class=\"text-sm w-20 pt-2\">16:30-23:30</li>\r\n	<li class=\"text-sm w-20 pt-2\">14:00-00:30</li>\r\n</ul>\r\n\r\n<h2 class=\"font-extrabold mb-2\">Sunday 29 Jul</h2>\r\n\r\n<ul class=\"list-none flex flex-col w-20\">\r\n	<li class=\"text-sm w-20 pt-2\">10:00-16:00</li>\r\n	<li class=\"text-sm w-20 pt-2\">16:30-23:30</li>\r\n	<li class=\"text-sm w-20 pt-2\">14:00-23:00</li>\r\n</ul>\r\n\r\n<h2 class=\"font-extrabold mb-2\">Monday 30 Jul</h2>\r\n\r\n<ul class=\"list-none flex flex-col w-20\">\r\n	<li class=\"text-sm w-20 pt-2\">n/a</li>\r\n	<li class=\"text-sm w-20 pt-2\">16:30-23:30</li>\r\n	<li class=\"text-sm w-20 pt-2\">n/a</li>\r\n</ul>\r\n\r\n<h2 class=\"font-extrabold mb-2\">Tuesday 31 Jul</h2>\r\n\r\n<ul class=\"list-none flex flex-col w-20\">\r\n	<li class=\"text-sm w-20 pt-2\">n/a</li>\r\n	<li class=\"text-sm w-20 pt-2\">16:30-23:30</li>\r\n	<li class=\"text-sm w-20 pt-2\">n/a</li>\r\n</ul>\r\n</div>\r\n</div>\r\n</div>\r\n<script src=\"/js/homepage/index.js\"></script>'),
(7, NULL, 'food', '<div class=\"lg:w-[1280px] md:w-[100vw] sm:w-[100vw] ml-[400px]\" id=\"content-container\">&nbsp;\r\n<div class=\"grid-cols-2 flex items-center pt-[150px] pb-[50px]\" id=\"introSection\">\r\n<div id=\"introduction\">\r\n<h1 class=\"text-[42px] font-bold\"><span class=\"text-[#42BFDD]\">Yummie!</span> Food Event</h1>\r\n\r\n<p class=\"text-2xl\">27 July - 31 July</p>\r\n\r\n<p class=\"text-base w-[700px] pt-[25px]\">Welcome to the Haarlem Food Festival! Come and join us for an amazing culinary experience. This event is a celebration of the culinary delights that the Netherlands has to offer, showcasing different cuisines and the talented chefs who prepare it.<br />\r\n<br />\r\nWe look forward to seeing you there!</p>\r\n\r\n<p class=\"text-sm text-[#656262] w-[300px] pt-[5px]\">** &euro;10,- deposit pp. and mandatory reservation. Deposit will be deducted upon payment.**</p>\r\n</div>\r\n<img alt=\"circleFoodImage\" class=\"w-[400px] h-[400px] ml-[180px]\" src=\"/img/circleFoodImage.png\" /></div>\r\n\r\n<div class=\"flex-col\" id=\"restaurants\">\r\n<div class=\"pb-[50px]\" id=\"ratatouilleSection\">\r\n<div class=\"flex\">\r\n<h1 class=\"text-3xl font-bold pl-[15px]\">Ratatouille</h1>\r\n<img alt=\"michelinIcon\" class=\"w-[24px] h-[26px] mt-[5px] ml-[5px]\" src=\"/img/michelinIcon.png\" /></div>\r\n\r\n<div class=\"flex justify-items-start pl-[15px] pb-[10px]\"><img alt=\"4.7rating\" class=\"w-[115px] h-[25px]\" src=\"/img/4.7Rating.png\" />\r\n<p class=\"text-[20px] font-medium pl-[10px]\">4.7/5</p>\r\n\r\n<p class=\"text-[20px] text-[#FC5B84] font-medium pl-[10px]\">French, Seafood, European</p>\r\n</div>\r\n\r\n<div class=\"grid-cols-[500px_minmax(500px,_1fr)_400px] grid justify-items-start gap-[50px]\"><img alt=\"ratatouilleImage1\" class=\"w-[500px] h-[650px]\" src=\"/img/ratatouilleImg1.png\" />\r\n<div class=\"flex flex-col gap-[50px]\"><img alt=\"ratatouilleImage2\" class=\"w-[500px] h-[325px]\" src=\"/img/ratatouilleImg2.png\" /> <img alt=\"ratatouilleImage3\" class=\"w-[500px] h-[275px]\" src=\"/img/ratatouilleImg3.png\" /></div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"pb-[50px]\" id=\"mr&amp;mrsSection\">\r\n<h1 class=\"text-3xl font-bold pl-[15px]\">Restaurant Mr &amp; Mrs</h1>\r\n\r\n<div class=\"flex justify-items-start pl-[15px] pb-[10px]\"><img alt=\"4.7rating\" class=\"w-[115px] h-[25px]\" src=\"/img/4.7Rating.png\" />\r\n<p class=\"text-[20px] font-medium pl-[10px]\">4.7/5</p>\r\n\r\n<p class=\"text-[20px] text-[#FC5B84] font-medium pl-[10px]\">Dutch, Seafood, European</p>\r\n</div>\r\n\r\n<div class=\"flex flex-row mb-[50px]\"><img alt=\"mr&amp;mrsImage1\" class=\"w-[500px] h-[275px] mr-[50px]\" src=\"/img/mr&amp;mrsImg1.png\" /> <img alt=\"mr&amp;mrsImage2\" class=\"w-[500px] h-[275px]\" src=\"/img/mr&amp;mrsImg2.png\" /></div>\r\n<img alt=\"mr&amp;mrsImage3\" class=\"w-[1050px] h-[325px]\" src=\"/img/mr&amp;mrsImg3.png\" /></div>\r\n\r\n<div class=\"pb-[50px]\" id=\"specktakelSection\">\r\n<h1 class=\"text-3xl font-bold pl-[15px]\">Specktakel</h1>\r\n\r\n<div class=\"flex justify-items-start pl-[15px] pb-[10px]\"><img alt=\"4.5rating\" class=\"w-[115px] h-[25px]\" src=\"/img/4.5Rating.png\" />\r\n<p class=\"text-[20px] font-medium pl-[10px]\">4.5/5</p>\r\n\r\n<p class=\"text-[20px] text-[#FC5B84] font-medium pl-[10px]\">European, International, Asian</p>\r\n</div>\r\n\r\n<div class=\"grid-cols-[500px_minmax(500px,_1fr)_400px] grid justify-items-start gap-[50px]\"><img alt=\"specktakelImage1\" class=\"w-[500px] h-[650px]\" src=\"/img/specktakelImg3.png\" />\r\n<div class=\"flex flex-col gap-[50px]\"><img alt=\"specktakelImage2\" class=\"w-[500px] h-[325px]\" src=\"/img/specktakelImg2.png\" /> <img alt=\"specktakelImage3\" class=\"w-[500px] h-[275px]\" src=\"/img/specktakelImg1.png\" /></div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"pb-[50px]\" id=\"toujoursSection\">\r\n<h1 class=\"text-3xl font-bold pl-[15px]\">Toujours</h1>\r\n\r\n<div class=\"flex justify-items-start pl-[15px] pb-[10px]\"><img alt=\"4.4rating\" class=\"w-[115px] h-[25px]\" src=\"/img/4.4Rating.png\" />\r\n<p class=\"text-[20px] font-medium pl-[10px]\">4.4/5</p>\r\n\r\n<p class=\"text-[20px] text-[#FC5B84] font-medium pl-[10px]\">Dutch, Seafood, European</p>\r\n</div>\r\n\r\n<div class=\"flex flex-row mb-[50px]\"><img alt=\"toujoursImage1\" class=\"w-[500px] h-[275px] mr-[50px]\" src=\"/img/toujoursImg1.png\" /> <img alt=\"toujoursImage2\" class=\"w-[500px] h-[275px]\" src=\"/img/toujoursImg2.png\" /></div>\r\n<img alt=\"toujoursImage3\" class=\"w-[1050px] h-[325px]\" src=\"/img/toujoursImg3.png\" /></div>\r\n\r\n<div class=\"pb-[50px]\" id=\"mlSection\">\r\n<div class=\"flex\">\r\n<h1 class=\"text-3xl font-bold pl-[15px]\">Restaurant ML</h1>\r\n<img alt=\"michelinIcon\" class=\"w-[24px] h-[26px] mt-[5px] ml-[5px]\" src=\"/img/michelinIcon.png\" /></div>\r\n\r\n<div class=\"flex justify-items-start pl-[15px] pb-[10px]\"><img alt=\"4.1rating\" class=\"w-[115px] h-[25px]\" src=\"/img/4.1Rating.png\" />\r\n<p class=\"text-[20px] font-medium pl-[10px]\">4.1/5</p>\r\n\r\n<p class=\"text-[20px] text-[#FC5B84] font-medium pl-[10px]\">Dutch, Seafood, European</p>\r\n</div>\r\n\r\n<div class=\"grid-cols-[500px_minmax(500px,_1fr)_400px] grid justify-items-start gap-[50px]\"><img alt=\"mlImage1\" class=\"w-[500px] h-[650px]\" src=\"/img/mlImg1.png\" />\r\n<div class=\"flex flex-col gap-[50px]\"><img alt=\"mlImage2\" class=\"w-[500px] h-[325px]\" src=\"/img/mlImg2.png\" /> <img alt=\"mlImage3\" class=\"w-[500px] h-[275px]\" src=\"/img/mlImg3.png\" /></div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"pb-[50px]\" id=\"grandCafeBrinkmannSection\">\r\n<h1 class=\"text-3xl font-bold pl-[15px]\">Grand Caf&eacute; Brinkmann</h1>\r\n\r\n<div class=\"flex justify-items-start pl-[15px] pb-[10px]\"><img alt=\"4.1rating\" class=\"w-[115px] h-[25px]\" src=\"/img/4.1Rating.png\" />\r\n<p class=\"text-[20px] font-medium pl-[10px]\">4.1/5</p>\r\n\r\n<p class=\"text-[20px] text-[#FC5B84] font-medium pl-[10px]\">Modern, Dutch, European</p>\r\n</div>\r\n\r\n<div class=\"flex flex-row mb-[50px]\"><img alt=\"cafeImage1\" class=\"w-[500px] h-[275px] mr-[50px]\" src=\"/img/grandcafebrinkmannImg1.png\" /> <img alt=\"cafeImage2\" class=\"w-[500px] h-[275px]\" src=\"/img/grandcafebrinkmannImg2.png\" /></div>\r\n<img alt=\"cafeImage3\" class=\"w-[1050px] h-[325px]\" src=\"/img/grandcafebrinkmannImg3.png\" /></div>\r\n\r\n<div class=\"pb-[50px]\" id=\"frisSection\">\r\n<div class=\"flex\">\r\n<h1 class=\"text-3xl font-bold pl-[15px]\">Restaurant Fris</h1>\r\n<img alt=\"michelinIcon\" class=\"w-[24px] h-[26px] mt-[5px] ml-[5px]\" src=\"/img/michelinIcon.png\" /></div>\r\n\r\n<div class=\"flex justify-items-start pl-[15px] pb-[10px]\"><img alt=\"4.1rating\" class=\"w-[115px] h-[25px]\" src=\"/img/4.1Rating.png\" />\r\n<p class=\"text-[20px] font-medium pl-[10px]\">4.1/5</p>\r\n\r\n<p class=\"text-[20px] text-[#FC5B84] font-medium pl-[10px]\">Dutch, French, European</p>\r\n</div>\r\n\r\n<div class=\"grid-cols-[500px_minmax(500px,_1fr)_400px] grid justify-items-start gap-[50px]\"><img alt=\"frisImage1\" class=\"w-[500px] h-[650px]\" src=\"/img/frisImg3.png\" />\r\n<div class=\"flex flex-col gap-[50px]\"><img alt=\"frisImage2\" class=\"w-[500px] h-[325px]\" src=\"/img/frisImg2.png\" /> <img alt=\"frisImage3\" class=\"w-[500px] h-[275px]\" src=\"/img/frisImg1.png\" /></div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n');

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
(7, 'Fris', 'Dutch, French, European', 4.1, 'lorem ipsum', 'Twijnderslaan 7, 2012 BG Haarlem', '+31 023 531 0717', 45),
(8, 'q', 'q', 1.1, 'q', 'q', '1', 1);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `page`
--
ALTER TABLE `page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
