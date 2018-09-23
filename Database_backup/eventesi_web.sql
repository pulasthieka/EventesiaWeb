-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2018 at 03:40 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eventesi_web`
--

-- --------------------------------------------------------

--
-- Table structure for table `bands`
--

CREATE TABLE `bands` (
  `name` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(500) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'eventesia',
  `number` int(11) NOT NULL,
  `category` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `price` text COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(1500) COLLATE utf8_unicode_ci NOT NULL,
  `profilepic` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `smallpic` varchar(60) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Logo.png',
  `calendar` varchar(800) COLLATE utf8_unicode_ci DEFAULT NULL,
  `videos` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `color` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'ffcc0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bands`
--

INSERT INTO `bands` (`name`, `password`, `number`, `category`, `price`, `description`, `profilepic`, `smallpic`, `calendar`, `videos`, `color`) VALUES
('Piyath Rajapaksa', 'eventesia', 1, 'Singers', 'Rs 40,000', 'Sri Lankan solo singer, songwriter,musician and an instrumentalist. He is the winner in the seventh season of Sirasa Superstar, an idol program in Sri Lanka.', 'Piyath.jpg', 'WE+small.png', '<iframe src="https://calendar.google.com/calendar/embed?showTitle=0&amp;showPrint=0&amp;showTabs=0&amp;showCalendars=0&amp;showTz=0&amp;height=600&amp;wkst=2&amp;bgcolor=%23ffffff&amp;src=cpnekanayake%40gmail.com&amp;color=%2329527A&amp;ctz=Asia%2FColombo" style="border-width:0" width="100%" height="601" frameborder="0" scrolling="no"></iframe>\r\n', 'https://www.youtube.com/embed/6eyf9MNJvrg', '#0E4B77'),
('PointFive', 'eventesia', 2, 'Bands', '75000', ' PointFive is about five freelancers who are born for music. These guys as teens, started the whole music thing in the backyard and then gradually moved on to play at various gigs, parties from mere killing-the-boredom jamming sessions.\r\n\r\nAnd it did not take so long for the idea of forming a commercial band to pop up. After some real discussions, PointFive was launched.\r\n                      <p>\r\n                      <blockquote>\r\n\r\n                       <strong> Members</strong><br>\r\n                            Nadeemal Perera (Vocalist) <br> \r\n    Dilshan Perera (Bass Guitarist) <br> \r\n    Himesh Senanayake (Drummer)<br> \r\n    Omeshka Diaz (Keyboardist)<br> \r\n    Prakash Ranasinghe (Lead Guitarist)<br>\r\n                        \r\n          <br>\r\n                    <strong> Genre</strong>\r\n                     <br>\r\n                     Blues, Jazz, Country, Funk, Techno, Pop, Reggae, Rock n Roll<br></blockquote>\r\n\r\n                     <br>', 'pointfiveCover.jpg', 'pointfive.jpg', '<iframe src="https://calendar.google.com/calendar/embed?src=u6368smj2jo2jgbpiotpgdogtk%40group.calendar.google.com&ctz=Asia/Colombo" style="border: 0" width="100%" height="600" frameborder="0" scrolling="no"></iframe>', '', '#ff8821'),
('Clickz Lab', 'eventesia', 3, 'Photographers', 'Rs.7,000 ', 'Memories are invaluable. Call us to to capture yours\r\n<p>\r\n                      <blockquote>\r\n\r\n                       <strong> Members</strong><br>\r\n                         <ul>Sandil Gunathilake<br> \r\n    \r\n                    </blockquote>\r\n                      <p>         \r\n                        \r\n                      </p>', 'Clickz.png', 'photography1.jpg', ' <iframe src="https://calendar.google.com/calendar/embed?src=sandil.2396.2363%40gmail.com&ctz=Asia%2FColombo" style="order:0" width="100%" height="600px" frameborder="0" scrolling="no"></iframe>', '', '#222222'),
('ECANS', 'eventesia', 4, 'Others', '15000', 'ECANS is a dance troupe who won first place in the Dancing Category at Friends in Action  2017', 'ECANS.jpg', 'ecans_small.jpg', NULL, '', '#CC0000'),
('Plague', 'eventesia', 5, 'Bands', 'Guest Performance - 15,000 (upwards)\r\n<br>\r\nDinner Dance - 55,000 (upwards)\r\n<br>\r\nWeddings - Rs.80,000 (upwards)\r\n<br>\r\nSounds - Rs.25,000 .<br>\r\n\r\n<span style="font-size:x-small;line-height:normal;">Note that the above price ranges are only for show\'s happening in Colombo, if it is an outstation show there will be an added value to the prices and also note that the above prices does not include sounds and that the sounds would have to be ordered  separately.</span>\r\n', '', 'plague.jpg', 'plague_small.jpg', ' <iframe src="https://calendar.google.com/calendar/embed?src=sopassrue7g3b3e7m6jaggll0g%40group.calendar.google.com&ctz=Asia/Colombo" style="order:0" width="100%" height="600px" frameborder="0" scrolling="no"></iframe>', 'https://www.youtube.com/embed/kE_YGMkGwx0?ecver=1', '#777777'),
('Yohani Jacob ', 'eventesia', 6, 'Singers', 'Negotiable', 'Acustomed to many generes including acoustic, alternative rock , etc. Have been part of many trending events the the past few years including TNL onstage and qualified as a finalist in the Dialog Island Wide Competition 2016.', 'sync1.png', 'eventesia.png', NULL, '', '#ffcc00'),
('Sanity', 'eventesia', 8, 'Bands', 'Negotiable', 'Alternative/Rock band capable of performing versatile genres suiting to the occasion.\r\n', 'sync1.png', 'eventesia.png', NULL, '', '#ffcc00'),
('Vivace', 'eventesia', 9, 'Bands', 'Negotiable', 'Senior Band of Ananda College', 'sync1.png', 'eventesia.png', NULL, '', '#aa0a33'),
('Pruthuvi Perera Photography', 'eventesia', 10, 'Photographers', 'Negotiable', '', 'sync1.png', 'eventesia.png', NULL, '', '#fc0a0f'),
('Pasan Sumanaratne', 'eventesia', 11, 'Singers', 'Negotiable', '', 'sync1.png', 'eventesia.png', NULL, '', '#0E4B78'),
('Acousta pella', 'eventesia', 12, 'Bands', 'Negotiable', '4 piece acoustic group', 'sync1.png', 'eventesia.png', NULL, '', '#21394b'),
('Shihan  Careem', 'eventesia', 7, 'Others', 'Negotiable', 'Beatboxer', 'sync1.png', 'eventesia.png', NULL, '', '#2a3e41'),
('Clockwork Noise', 'eventesia', 13, 'Bands', 'Negotiable', '', 'sync1.png', 'eventesia.png', NULL, 'https://www.youtube.com/embed/TIOzDM-sYAM?ecver=1', '#ab6a35'),
('JJ Twins', 'eventesia', 14, 'Singers', 'Negotiable', 'We\'re Julian and Jason Prins, Twin brothers. We\'re singers and songwriters. ', 'sync1.png', 'eventesia.png', NULL, '', '#FF8000'),
('Shamil Akbar', 'eventesia', 16, 'Others', 'Negotiable', 'Compere', 'Shamil_Akbar.png', 'Shamil_Akbar(Small).png', NULL, '', '#101010'),
('Andrea Jansen', 'eventesia', 15, 'Singers', 'Negotiable', '', 'Andrea_Jansen.png', 'Andrea_Jansen(small).png', NULL, '', '#1e1e1e'),
('Illusion Vibes', 'eventesia', 17, 'Bands', '15000-35000 LKR - 3 Piece  Band (acoustic)  Cajon  box, Guitar, Vocals & Keyboard\r\n<br>\r\n60000-75000 LKR - Full Band \r\n\r\n<br>The Fee Structures is negotiable and subject to the availability of sound equipment.\r\n', '', 'IllusionVibes.png', 'IllusionVibes(small).png', '', '', '#CC6600');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `No` int(11) NOT NULL,
  `EventName` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `LinktoEvent` varchar(1000) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'javascript:void(0)',
  `Location` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'COLOMBO',
  `Date` date DEFAULT NULL,
  `Time` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'All Day',
  `Description` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`No`, `EventName`, `LinktoEvent`, `Location`, `Date`, `Time`, `Description`) VALUES
(1, 'SYNC 2017', 'https://www.facebook.com/events/116644545622511/?acontext=%7B%22action_history%22%3A%22[%7B%5C%22surface%5C%22%3A%5C%22page%5C%22%2C%5C%22mechanism%5C%22%3A%5C%22page_upcoming_events_card%5C%22%2C%5C%22extra_data%5C%22%3A[]%7D]%22%2C%22has_source%22%3Atrue%7D', 'Racecourse Car Park', '2017-09-03', '2.00pm - 6.00pm', 'Sri Lanka\'s first ever open street jamming event! We welcome everyone who loves music; drummers, singers, guitarists, keyboardists everyone! \r\nDrop by to share your music or simply to enjoy the performances and have a day of fun and togetherness. ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bands`
--
ALTER TABLE `bands`
  ADD PRIMARY KEY (`number`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`No`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
