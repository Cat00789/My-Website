-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 03, 2019 at 04:55 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `omb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_credential`
--

CREATE TABLE `admin_credential` (
  `admin_id` int(11) NOT NULL,
  `admin_username` varchar(100) NOT NULL,
  `admin_password` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_credential`
--

INSERT INTO `admin_credential` (`admin_id`, `admin_username`, `admin_password`) VALUES
(1, 'admin', '12345'),
(2, 'dahun', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `booking_id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `movie_id` varchar(100) NOT NULL,
  `seat_id` varchar(100) NOT NULL,
  `dt` varchar(100) NOT NULL,
  `timing` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`booking_id`, `email`, `movie_id`, `seat_id`, `dt`, `timing`) VALUES
(21, 'tulu@gmail.com', '13', '52', 'Sep-Tue-2019', '10.15 A.M');

-- --------------------------------------------------------

--
-- Table structure for table `complaint`
--

CREATE TABLE `complaint` (
  `complaint_id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `topic` varchar(100) NOT NULL,
  `reason` varchar(1000) NOT NULL,
  `dt_complaint` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

CREATE TABLE `movie` (
  `movie_id` int(11) NOT NULL,
  `movie_name` varchar(100) NOT NULL,
  `movie_des` varchar(1000) NOT NULL,
  `movie_path` varchar(1000) NOT NULL,
  `movie_release` varchar(1000) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`movie_id`, `movie_name`, `movie_des`, `movie_path`, `movie_release`, `status`) VALUES
(8, 'Avenger End Game', 'After the devastating events of Avengers: Infinity War,\r\nthe universe is in ruins due to the efforts of the Mad Titan, Thanos.\r\nWith the help of remaining allies, the Avengers must assemble once \r\nmore in order to undo Thanos'' actions and restore order to the \r\nuniverse once and for all, no matter what consequences may be in store.', 'bg.jpg', '28 April, 2019', 'Inactive'),
(9, 'SONIC THE HEDGEHOG Trailer (2019)', 'Itâ€™s been 28 years since Sonic the Hedgehog first arrived on home gaming consoles. In some senses, a feature film is long overdue. But if history has taught us anything, that might be for the best. Take Sonicâ€™s semi-contemporary, Mario, who was given the large screen treatment two years after Sonic debuted on Segaâ€™s consoles.\r\n\r\nItâ€™s tough not to see echos of that Hoskins/Leguizamo adaptive train wreck in the first trailer for the upcoming live action Sonic, and yet here we are. Itâ€™s another furry fish out of water in a real world setting. This time itâ€™s decked out in fuzzy blue CGI and voiced by the very funny Ben â€œJean-Ralphioâ€ Schwartz, who also â€œconsultedâ€ on BB-8â€™s bleeps and bloops.', 'sonic.jpg', '29 June, 2019', 'none'),
(10, 'MEN IN BLACK: INTERNATIONAL - Official Trailer', 'The Men in Black have always protected the Earth from the scum of the universe. In this new adventure, they tackle their biggest threat to date: a mole in the Men in Black organization.', 'MIB.jpeg', '20 May, 2019', 'none'),
(11, 'Misson Mangal', 'P', 'mangal_batla.jpg', '15 August', 'Inactive'),
(12, '83', 'ranveer', '83.jpg', '15 August', 'Inactive'),
(13, 'Misson Mangal', 'Aksay Kumar', 'mangal_batla.jpg', '15 August', 'Inactive'),
(14, 'Misson Mangal', 'ak', 'mangal_batla.jpg', '15 August', '1');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `movie_id` varchar(20) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `dt` varchar(100) NOT NULL,
  `timing` varchar(20) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `email`, `movie_id`, `amount`, `dt`, `timing`, `status`) VALUES
(5, 'uttiya@gmail.com', '8', '800', 'Jul-Wed-2019', '10.15 A.M', '1'),
(6, 'admin', '11', '150', 'Aug-Sun-2019', '10.15 A.M', 'none'),
(7, 'uttiya@gmail.com', '13', '0', 'Aug-Mon-2019', '12.15 P.M', '1'),
(8, 'uttiya@gmail.com', '13', '0', 'Aug-Mon-2019', '3.15 P.M', 'none'),
(9, 'kuheli@gmail.com', '13', '400', 'Aug-Tue-2019', '10.15 A.M', 'none'),
(10, 'kuheli1994@gmail.com', '13', '0', 'Sep-Tue-2019', '10.15 A.M', '1'),
(11, 'kuheli1994@gmail.com', '13', '700', 'Sep-Tue-2019', '10.15 A.M', 'none'),
(12, 'tulu@gmail.com', '13', '400', 'Sep-Tue-2019', '10.15 A.M', '1'),
(13, 'tulu@gmail.com', '13', '0', 'Sep-Tue-2019', '5.15 P.M', 'none');

-- --------------------------------------------------------

--
-- Table structure for table `seat`
--

CREATE TABLE `seat` (
  `seat_id` int(11) NOT NULL,
  `seat_allocate` varchar(11) NOT NULL,
  `seat_no` varchar(100) NOT NULL,
  `seat_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seat`
--

INSERT INTO `seat` (`seat_id`, `seat_allocate`, `seat_no`, `seat_type`) VALUES
(1, '1', '1', 'Standard'),
(2, '1', '2', 'Standard'),
(3, '1', '3', 'standard'),
(4, '1', '4', 'standard'),
(6, '1', '5', 'standard'),
(7, '1', '6', 'standard'),
(8, '1', '7', 'standard'),
(9, '1', '8', 'standard'),
(10, '1', '9', 'standard'),
(11, '1', '10', 'standard'),
(12, '1', '11', 'standard'),
(13, '1', '12', 'standard'),
(14, '1', '13', 'standard'),
(15, '1', '14', 'standard'),
(16, '1', '15', 'standard'),
(17, '1', '16', 'standard'),
(18, '1', '17', 'standard'),
(19, '1', '18', 'standard'),
(20, '1', '19', 'standard'),
(21, '1', '20', 'standard'),
(22, '1', '21', 'standard'),
(23, '1', '22', 'standard'),
(24, '1', '23', 'standard'),
(25, '1', '24', 'standard'),
(26, '1', '25', 'standard'),
(27, '1', '26', 'standard'),
(28, '1', '27', 'standard'),
(29, '1', '28', 'standard'),
(30, '1', '29', 'standard'),
(31, '1', '30', 'standard'),
(32, '2', '1', 'Gold'),
(33, '2', '2', 'Gold'),
(34, '2', '3', 'Gold'),
(35, '2', '4', 'Gold'),
(36, '2', '5', 'Gold'),
(37, '2', '6', 'Gold'),
(38, '2', '7', 'Gold'),
(39, '2', '8', 'Gold'),
(40, '2', '9', 'Gold'),
(41, '2', '10', 'Gold'),
(42, '2', '11', 'Gold'),
(43, '2', '12', 'Gold'),
(44, '2', '13', 'Gold'),
(45, '2', '14', 'Gold'),
(46, '2', '15', 'Gold'),
(47, '2', '16', 'Gold'),
(48, '2', '17', 'Gold'),
(49, '2', '18', 'Gold'),
(50, '2', '19', 'Gold'),
(51, '2', '20', 'Gold'),
(52, '3', '1', 'Diamond'),
(53, '3', '2', 'Diamond'),
(54, '3', '3', 'Diamond'),
(55, '3', '4', 'Diamond'),
(56, '3', '5', 'Diamond'),
(57, '3', '6', 'Diamond'),
(58, '3', '7', 'Diamond'),
(59, '3', '8', 'Diamond'),
(60, '3', '9', 'Diamond'),
(61, '3', '10', 'Diamond');

-- --------------------------------------------------------

--
-- Table structure for table `user_register`
--

CREATE TABLE `user_register` (
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `password` varchar(500) NOT NULL,
  `address` varchar(500) NOT NULL,
  `security_question` varchar(500) NOT NULL,
  `security_answer` varchar(100) NOT NULL,
  `dt` varchar(20) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_register`
--

INSERT INTO `user_register` (`user_id`, `name`, `email`, `phone`, `password`, `address`, `security_question`, `security_answer`, `dt`, `status`) VALUES
(14, 'kuheli Panda', 'uttiya@gmail.com', '09800768644', 'e10adc3949ba59abbe56e057f20f883e', 'BISHNUPUR', 'friend', 'gour', 'Sep-Tue-2019 05:12:3', '1'),
(15, 'tulu', 'tulu@gmail.com', '46464644', 'e10adc3949ba59abbe56e057f20f883e', 'BISHNUPUR', 'friend', 'gour', 'Sep-Tue-2019 05:21:2', '1');

-- --------------------------------------------------------

--
-- Table structure for table `video_url`
--

CREATE TABLE `video_url` (
  `video_id` int(11) NOT NULL,
  `video_name` varchar(100) NOT NULL,
  `video_url` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `video_url`
--

INSERT INTO `video_url` (`video_id`, `video_name`, `video_url`) VALUES
(2, 'Avenger End Game', 'TcMBFSGVi1c'),
(3, 'SONIC THE HEDGEHOG Trailer (2019)', 'at1-L_g0TB0'),
(6, 'MEN IN BLACK: INTERNATIONAL - Official Trailer', 'BV-WEb2oxLk');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_credential`
--
ALTER TABLE `admin_credential`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `complaint`
--
ALTER TABLE `complaint`
  ADD PRIMARY KEY (`complaint_id`);

--
-- Indexes for table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`movie_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `seat`
--
ALTER TABLE `seat`
  ADD PRIMARY KEY (`seat_id`);

--
-- Indexes for table `user_register`
--
ALTER TABLE `user_register`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `video_url`
--
ALTER TABLE `video_url`
  ADD PRIMARY KEY (`video_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_credential`
--
ALTER TABLE `admin_credential`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `complaint`
--
ALTER TABLE `complaint`
  MODIFY `complaint_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `movie`
--
ALTER TABLE `movie`
  MODIFY `movie_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `seat`
--
ALTER TABLE `seat`
  MODIFY `seat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
--
-- AUTO_INCREMENT for table `user_register`
--
ALTER TABLE `user_register`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `video_url`
--
ALTER TABLE `video_url`
  MODIFY `video_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
