-- phpMyAdmin SQL Dump
-- version 4.6.6deb5ubuntu0.5
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Время создания: Окт 07 2022 г., 08:53
-- Версия сервера: 5.7.36-0ubuntu0.18.04.1
-- Версия PHP: 7.2.24-0ubuntu0.18.04.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `glass_lib`
--

-- --------------------------------------------------------

--
-- Структура таблицы `glass_database`
--

CREATE TABLE `glass_database` (
  `newid` int(10) UNSIGNED NOT NULL,
  `id` varchar(11) CHARACTER SET utf8 NOT NULL COMMENT 'Number of photoplate',
  `name` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT 'no name',
  `RA` varchar(20) CHARACTER SET utf8 NOT NULL,
  `DECL` varchar(20) CHARACTER SET utf8 NOT NULL,
  `type` varchar(20) CHARACTER SET utf8 NOT NULL,
  `telescope` varchar(20) CHARACTER SET utf8 NOT NULL,
  `jd` float DEFAULT NULL,
  `exptime` int(11) DEFAULT NULL,
  `observer` varchar(20) CHARACTER SET utf8 NOT NULL,
  `date` date NOT NULL,
  `time_ut` time NOT NULL,
  `url` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `glass_database`
--

INSERT INTO `glass_database` (`newid`, `id`, `name`, `RA`, `DECL`, `type`, `telescope`, `jd`, `exptime`, `observer`, `date`, `time_ut`, `url`) VALUES
(1, '16S-3.1', 'no name', '13:30:00', '05:00:00', 'sky', 'Big_Shmidt', 2446940, 600, 'Solodovnikov', '1987-05-27', '04:09:04', '<a href= \"https://drive.google.com/file/d/1S8Z1GJX5-rBVoQMWUv-OvgrQSYQ9OdZE/view?usp=sharing\"> Download </a>'),
(2, '16S-2.2', 'no name', '13:30:00', '10:00:00', 'sky', 'Big_Shmidt', 2446940, 600, 'Solodovnikov', '1987-05-27', '04:21:04', '<a href= \"https://drive.google.com/file/d/18sXEO6W0-YFmKyrO5srVVZPHqkka-BNr/view?usp=sharing\"> Download </a>'),
(3, '13S-3.8', 'no name', '12:00:00', '-05:00:00', 'sky', 'Big_Shmidt', 2446850, 600, 'Solodovnikov', '1987-02-23', '10:11:47', '<a href= \"https://drive.google.com/file/d/179fcyJSswrNw0fxWbpIUT2LPcbpk9wtA/view?usp=sharing\"> Download </a>'),
(4, '13S-2.12', 'no name', '12:00:00', '30:00:00', 'sky', 'Big_Shmidt', 2446850, 600, 'Solodovnikov', '1987-02-23', '11:39:47', '<a href= \"https://drive.google.com/file/d/1Z8jNOtjcP8TiwEq81Je0VxTYPcFWLTEY/view?usp=sharing\"> Download </a>'),
(5, '13S-2.1', 'no name', '05:00:00', '-20:00:00', 'sky', 'Big_Shmidt', 2446850, 600, 'Solodovnikov', '1987-02-23', '06:41:47', '<a href= \"https://drive.google.com/file/d/1722Gj7Z46cwIF0_qY6g6FSYYkHpsJ_7f/view?usp=sharing\"> Download </a>'),
(6, '18S-2.5', 'no name', '16:30:00', '10:00:00', 'sky', 'Big_Shmidt', 2446950, 600, 'Solodovnikov', '1987-06-03', '06:12:28', '<a href= \"https://drive.google.com/file/d/1E_K1EOGRQez1UVuYYB3oyDHbM6NxIlAQ/view?usp=sharing\"> Download </a>'),
(7, '12-799', 'NGC6611', '18:17:00', '-15:18:00', 'galaxy', 'ASI-2', 2434570, 2400, 'unknown', '1953-07-09', '17:02:39', '<a href= \"https://drive.google.com/file/d/1bSwZBlBHLQew-yKpEeDyJ-2KLgVWhXkD/view?usp=sharing\"> Download </a>'),
(8, '12-808', 'NGC6611', '18:14:00', '-12:22:48', 'galaxy', 'ASI-2', 2434570, 3480, 'unknown', '1953-07-11', '18:19:46', '<a href= \"https://drive.google.com/file/d/1QQnmQ6IQpKDX9FjwOoei9zDniT9RX7PT/view?usp=sharing\"> Download </a>');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `glass_database`
--
ALTER TABLE `glass_database`
  ADD PRIMARY KEY (`newid`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `glass_database`
--
ALTER TABLE `glass_database`
  MODIFY `newid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
