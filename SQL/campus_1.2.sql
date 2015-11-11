-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2015 at 05:58 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `campus`
--

-- --------------------------------------------------------

--
-- Table structure for table `ad`
--

CREATE TABLE IF NOT EXISTS `ad` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` text NOT NULL,
  `owner` int(11) NOT NULL,
  `cheched` tinyint(1) NOT NULL DEFAULT '0',
  `ts` time NOT NULL,
  `location` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ads_location_fkey` (`location`),
  KEY `owner_fkey` (`owner`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE IF NOT EXISTS `address` (
  `city` varchar(64) NOT NULL,
  `street` varchar(128) NOT NULL,
  `house` varchar(16) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`city`, `street`, `house`, `id`) VALUES
('г. Москва', 'Каширское шоссе', 'д.31', 0),
('г. Москва', 'ул. Москворечье', 'д.2, к.1', 1),
('г. Москва', 'ул. Москворечье', 'д.2, к.2', 2),
('г. Москва', 'ул. Москворечье', 'д.19, к.3', 3),
('г. Москва', 'ул. Москворечье', 'д.19, к.4', 4),
('г. Москва', 'ул. Кошкина', 'д.11, к.1', 5),
('г. Москва', 'ул. Шкулева', 'д.27, ст.2', 6),
('г. Москва', 'ул. Пролетарский проспект', 'д.8, к.2', 7);

-- --------------------------------------------------------

--
-- Table structure for table `ad_cat`
--

CREATE TABLE IF NOT EXISTS `ad_cat` (
  `ad` int(11) NOT NULL,
  `cat` int(11) NOT NULL,
  KEY `a_fkey` (`ad`),
  KEY `c_fkey` (`cat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `area`
--

CREATE TABLE IF NOT EXISTS `area` (
  `staff_id` int(11) NOT NULL,
  `address_id` int(11) NOT NULL,
  `start` date NOT NULL,
  `exp` date DEFAULT NULL,
  PRIMARY KEY (`staff_id`,`address_id`),
  KEY `afa_key` (`address_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `area`
--

INSERT INTO `area` (`staff_id`, `address_id`, `start`, `exp`) VALUES
(1, 1, '2015-11-10', NULL),
(1, 2, '2015-11-10', NULL),
(2, 2, '2015-11-10', NULL),
(3, 2, '2015-11-10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `aid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `ts` time NOT NULL,
  `data` text NOT NULL,
  KEY `comments_aid_fkey` (`aid`),
  KEY `comments_uid_fkey` (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `favorite`
--

CREATE TABLE IF NOT EXISTS `favorite` (
  `aid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  KEY `fad_fkey` (`aid`),
  KEY `fus_fkey` (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `owner` int(11) NOT NULL,
  `description` text NOT NULL,
  `serv` int(11) NOT NULL,
  `ordate` date DEFAULT NULL,
  `timeint` tinyint(4) DEFAULT NULL,
  `state` varchar(16) NOT NULL DEFAULT 'waiting',
  `ts` time NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ord_fkey` (`owner`),
  KEY `serv_fkey` (`serv`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `owner`, `description`, `serv`, `ordate`, `timeint`, `state`, `ts`) VALUES
(1, 2, 'Потек унитаз', 1, '2015-11-11', 1, 'waiting', '16:05:26');

-- --------------------------------------------------------

--
-- Table structure for table `photo`
--

CREATE TABLE IF NOT EXISTS `photo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `path` varchar(256) NOT NULL,
  `ad` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `p_fkey` (`ad`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE IF NOT EXISTS `service` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id`, `name`, `description`) VALUES
(1, 'Сантехник', ''),
(2, 'Электрик', ''),
(3, 'Плотник', '');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE IF NOT EXISTS `staff` (
  `uid` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `exp` date DEFAULT NULL,
  `start` date NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post` varchar(256) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `staff_sid_fkey` (`sid`),
  KEY `staff_uid_fkey` (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`uid`, `sid`, `exp`, `start`, `id`, `post`) VALUES
(5, 1, NULL, '2015-11-10', 1, 'Пост'),
(8, 1, NULL, '2015-11-10', 2, 'Пост'),
(9, 1, NULL, '2015-11-10', 3, 'Пост');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `surname` varchar(64) NOT NULL,
  `patronymic` varchar(64) DEFAULT NULL,
  `login` varchar(64) NOT NULL,
  `passwd` varchar(64) NOT NULL,
  `mail` varchar(64) NOT NULL,
  `home` int(11) NOT NULL,
  `room` int(11) DEFAULT NULL,
  `role` varchar(16) NOT NULL DEFAULT 'user',
  `bdate` date DEFAULT NULL,
  `floor` int(11) DEFAULT NULL,
  `gender` char(1) DEFAULT NULL,
  `picture` varchar(256) DEFAULT NULL,
  `contacts` varchar(64) DEFAULT NULL COMMENT 'Телефонный номер (номера) пользователя',
  PRIMARY KEY (`id`),
  KEY `users_home_id_fkey` (`home`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `patronymic`, `login`, `passwd`, `mail`, `home`, `room`, `role`, `bdate`, `floor`, `gender`, `picture`, `contacts`) VALUES
(1, 'Админ', 'Админов', 'Админович', 'admin@campus.mephi.ru', '21232f297a57a5a743894a0e4a801fc3', 'admin@campus.mephi.ru', 1, 1, 'admin', NULL, NULL, 'М', NULL, NULL),
(2, 'Олежка', 'Судаков', NULL, 'campus@campus.mephi.ru', '162832ab572046b2dd00c343cf5096c7', 'campus@campus.mephi.ru', 2, 2, 'campus', NULL, NULL, NULL, NULL, NULL),
(3, 'Иван', 'Макеев', 'Станиславович', 'local@campus.mephi.ru', 'f5ddaf0ca7929578b408c909429f68f2', 'local@campus.mephi.ru', 0, 0, 'local', '1995-02-24', NULL, 'М', NULL, NULL),
(4, 'Настя', 'Косткина', 'Дмитриевна', 'moder@campus.mephi.ru', '9ab97e0958c6c98c44319b8d06b29c94', 'moder@campus.mephi.ru', 4, 4, 'moder', NULL, NULL, 'Ж', NULL, NULL),
(5, 'Илью-сантехник', 'Романов', NULL, 'staff@campus.mephi.ru', '1253208465b1efa876f982d8a9e73eef', 'staff@campus.mephi.ru', 0, 0, 'staff', NULL, NULL, 'М', NULL, NULL),
(6, 'Женька', 'Харитонов', 'Александрович', 'manage@campus.mephi.ru', '70682896e24287b0476eff2a14c148f0', 'manage@campus.mephi.ru', 4, 7, 'manage', NULL, NULL, 'М', NULL, NULL),
(7, 'Саня', 'Нестеров', NULL, 'campus1@campus.mephi.com', '162832ab572046b2dd00c343cf5096c7', 'campus1@campus.mephi.com', 3, 33, 'campus', NULL, NULL, 'М', NULL, NULL),
(8, 'Диман', 'Коротких', NULL, 'staff1@campus.mephi.ru', '1253208465b1efa876f982d8a9e73eef', 'staff1@campus.mephi.ru', 1, 10, 'staff', NULL, NULL, NULL, NULL, NULL),
(9, 'Саня', 'Савельев', NULL, 'staff2@campus.mephi.ru', '1253208465b1efa876f982d8a9e73eef', 'staff2@campus.mephi.ru', 6, 6, 'staff', NULL, NULL, NULL, NULL, NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ad`
--
ALTER TABLE `ad`
  ADD CONSTRAINT `owner_fkey` FOREIGN KEY (`owner`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `ads_location_fkey` FOREIGN KEY (`location`) REFERENCES `address` (`id`);

--
-- Constraints for table `ad_cat`
--
ALTER TABLE `ad_cat`
  ADD CONSTRAINT `c_fkey` FOREIGN KEY (`cat`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `a_fkey` FOREIGN KEY (`ad`) REFERENCES `ad` (`id`);

--
-- Constraints for table `area`
--
ALTER TABLE `area`
  ADD CONSTRAINT `afs_key` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`id`),
  ADD CONSTRAINT `afa_key` FOREIGN KEY (`address_id`) REFERENCES `address` (`id`);

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comments_uid_fkey` FOREIGN KEY (`uid`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `comments_aid_fkey` FOREIGN KEY (`aid`) REFERENCES `ad` (`id`);

--
-- Constraints for table `favorite`
--
ALTER TABLE `favorite`
  ADD CONSTRAINT `fus_fkey` FOREIGN KEY (`uid`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `fad_fkey` FOREIGN KEY (`aid`) REFERENCES `ad` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `ord_fkey` FOREIGN KEY (`owner`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `serv_fkey` FOREIGN KEY (`serv`) REFERENCES `service` (`id`);

--
-- Constraints for table `photo`
--
ALTER TABLE `photo`
  ADD CONSTRAINT `p_fkey` FOREIGN KEY (`ad`) REFERENCES `ad` (`id`);

--
-- Constraints for table `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `staff_uid_fkey` FOREIGN KEY (`uid`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `staff_sid_fkey` FOREIGN KEY (`sid`) REFERENCES `service` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_home_id_fkey` FOREIGN KEY (`home`) REFERENCES `address` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
