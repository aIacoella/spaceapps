-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 20, 2018 at 06:24 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bridge`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `img` int(11) NOT NULL,
  `content` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `img_id` int(11) NOT NULL,
  `path` tinytext NOT NULL,
  `tag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`img_id`, `path`, `tag`) VALUES
(2, 'beinspiredBG.jpg', 1),
(3, 'bridge.svg', 1),
(4, 'heic0502a.jpg', 1),
(5, 'img1_0.png', 1),
(6, 'inspireBG.jpg', 1),
(7, 'j1354.jpg', 1),
(8, 'pia22092.jpg', 1),
(9, 'potw1008a.jpg', 1),
(10, 'potw1010a_0.jpg', 1),
(11, 'potw1015a.jpg', 1),
(12, 'potw1036a.jpg', 1),
(13, 'potw1148a.jpg', 1),
(14, 'potw1746a.jpg', 1),
(15, 'potw1748a.jpeg', 1),
(16, 'potw1749a.jpg', 1),
(17, 'potw1750a-1.jpg', 1),
(18, 'potw1801a.jpg', 1),
(19, 'potw1802a.jpg', 1),
(20, 'potw1804a.jpg', 1),
(21, 'potw1805a.jpg', 1),
(22, 'potw1806a.jpg', 1),
(23, 'potw1807a.jpg', 1),
(24, 'potw1809a.jpg', 1),
(25, 'potw1810a.jpg', 1),
(26, 'potw1813a.jpg', 1),
(27, 'potw1814a.jpg', 1),
(28, 'potw1815a.jpg', 1),
(29, 'potw1817a.jpg', 1),
(30, 'potw1818a.jpg', 1),
(31, 'potw1819a.jpg', 1),
(32, 'potw1820a.jpg', 1),
(33, 'potw1821a.jpg', 1),
(34, 'potw1822a.jpg', 1),
(35, 'potw1823a.jpg', 1),
(36, 'potw1824a.jpg', 1),
(37, 'potw1825a.jpg', 1),
(38, 'potw1826a.jpg', 1),
(39, 'potw1827a.jpg', 1),
(40, 'potw1828a.jpg', 1),
(41, 'potw1829a.jpg', 1),
(42, 'potw1830a.jpg', 1),
(43, 'potw1831a.jpg', 1),
(44, 'potw1832a.jpg', 1),
(45, 'potw1833a.jpg', 1),
(46, 'potw1836a.jpg', 1),
(47, 'potw1838a.jpg', 1),
(48, 'potw1839a.jpg', 1),
(49, 'potw1840a.jpg', 1),
(50, 'stsci-gallery-1022a-2000x960.jpg', 1),
(51, 'stsci-h-p1742a-m-2000x1333.png', 1),
(52, 'stsci-h-p1821a-m-1699x2000.png', 1),
(53, 'updater.php', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `tag_id` int(11) NOT NULL,
  `name` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`tag_id`, `name`) VALUES
(1, 'human\r\n'),
(2, 'galaxy'),
(3, 'star'),
(4, 'infinity'),
(5, 'time'),
(6, 'galaxy'),
(7, 'star'),
(8, 'infinity'),
(9, 'time');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `img` (`img`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`img_id`),
  ADD KEY `tag` (`tag`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`tag_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `tag_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`img`) REFERENCES `images` (`img_id`);

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`tag`) REFERENCES `tags` (`tag_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
