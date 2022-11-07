-- phpMyAdmin SQL Dump
-- version 4.6.6deb5ubuntu0.5
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Время создания: Окт 28 2022 г., 06:32
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
  `jd` double(15,8) NOT NULL,
  `exptime` int(11) DEFAULT NULL,
  `observer` varchar(20) CHARACTER SET utf8 NOT NULL,
  `date` date NOT NULL,
  `time_ut` time NOT NULL,
  `type_obs` int(11) NOT NULL DEFAULT '0' COMMENT '0-photometry, 1 -spectrometry',
  `url` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `glass_database`
--

INSERT INTO `glass_database` (`newid`, `id`, `name`, `RA`, `DECL`, `type`, `telescope`, `jd`, `exptime`, `observer`, `date`, `time_ut`, `type_obs`, `url`) VALUES
(1, '16S-3.1', 'no name', '13:30:00', '05:00:00', 'sky', 'Big_Shmidt', 2446942.67296404, 600, 'Solodovnikov', '1987-05-27', '04:09:04', 0, '<a href= \"https://drive.google.com/file/d/1S8Z1GJX5-rBVoQMWUv-OvgrQSYQ9OdZE/view?usp=sharing\"> Download </a>'),
(2, '16S-2.2', 'no name', '13:30:00', '10:00:00', 'sky', 'Big_Shmidt', 2446942.68129737, 600, 'Solodovnikov', '1987-05-27', '04:21:04', 0, '<a href= \"https://drive.google.com/file/d/18sXEO6W0-YFmKyrO5srVVZPHqkka-BNr/view?usp=sharing\"> Download </a>'),
(3, '13S-3.8', 'no name', '12:00:00', '-05:00:00', 'sky', 'Big_Shmidt', 2446849.92484993, 600, 'Solodovnikov', '1987-02-23', '10:11:47', 0, '<a href= \"https://drive.google.com/file/d/179fcyJSswrNw0fxWbpIUT2LPcbpk9wtA/view?usp=sharing\"> Download </a>'),
(4, '13S-2.12', 'no name', '12:00:00', '30:00:00', 'sky', 'Big_Shmidt', 2446849.98596104, 600, 'Solodovnikov', '1987-02-23', '11:39:47', 0, '<a href= \"https://drive.google.com/file/d/1Z8jNOtjcP8TiwEq81Je0VxTYPcFWLTEY/view?usp=sharing\"> Download </a>'),
(5, '13S-2.1', 'no name', '05:00:00', '-20:00:00', 'sky', 'Big_Shmidt', 2446849.77901660, 600, 'Solodovnikov', '1987-02-23', '06:41:47', 0, '<a href= \"https://drive.google.com/file/d/1722Gj7Z46cwIF0_qY6g6FSYYkHpsJ_7f/view?usp=sharing\"> Download </a>'),
(6, '18S-2.5', 'no name', '16:30:00', '10:00:00', 'sky', 'Big_Shmidt', 2446949.75865985, 600, 'Solodovnikov', '1987-06-03', '06:12:28', 0, '<a href= \"https://drive.google.com/file/d/1E_K1EOGRQez1UVuYYB3oyDHbM6NxIlAQ/view?usp=sharing\"> Download </a>'),
(7, '12-799', 'NGC6611', '18:17:00', '-15:18:00', 'galaxy', 'ASI-2', 2434568.21017379, 2400, 'unknown', '1953-07-09', '17:02:39', 0, '<a href= \"https://drive.google.com/file/d/1bSwZBlBHLQew-yKpEeDyJ-2KLgVWhXkD/view?usp=sharing\"> Download </a>'),
(8, '12-808', 'NGC6611', '18:14:00', '-12:22:48', 'galaxy', 'ASI-2', 2434570.26372575, 3480, 'unknown', '1953-07-11', '18:19:46', 0, '<a href= \"https://drive.google.com/file/d/1QQnmQ6IQpKDX9FjwOoei9zDniT9RX7PT/view?usp=sharing\"> Download </a>'),
(9, '10-1359', 'NGC4486', '12:30:00', '12:13:48', 'galaxy', 'ASI-2', 2435278.17945262, 7200, 'unknown', '1955-06-19', '16:18:25', 0, '<a href= \"https://drive.google.com/file/d/1793THpmOoupLqULu2E82X14l_FMNBsGk/view?usp=sharing\"> Download </a>'),
(10, '10-971', 'NGC3321', '12:51:00', '22:12:36', 'galaxy', 'ASI-2', 2434754.50856154, 2400, 'Gavrilov', '1954-01-12', '00:12:20', 0, '<a href= \"https://drive.google.com/file/d/1K8zX1x4pJ5WlkvtGNLft7OlRTnaZBaQu/view?usp=sharing\"> Download </a>'),
(11, '12-5337', 'NGC281', '00:52:00', '56:22:12', 'nebula', 'ASI-2', 2445670.99103176, 480, 'Rozhkovskij', '1983-12-02', '11:47:05', 0, '<a href= \"https://drive.google.com/file/d/1Kv1IuvTHyFxqj-UpzP--MKlc2cbQTGg0/view?usp=sharing\"> Download </a>'),
(12, '11-2396', 'M45', '03:46:00', '24:04:12', 'star cluster', 'ASI-2', 2438084.17187906, 4500, 'unknown', '1963-02-23', '16:07:30', 0, '<a href= \"https://drive.google.com/file/d/1WqxUPNx8tgeZc0tjFLkJOdfnQMdSvI3u/view?usp=sharing\"> Download </a>'),
(13, '7-100', 'M42', '05:35:00', '-05:13:48', 'nebula', 'ASI-2', 2433679.16570295, 3600, 'Toropova', '1951-02-01', '15:58:37', 0, '<a href= \"https://drive.google.com/file/d/1h03JWVrdzd72wuz2xVSWnyIcYmH7ovsQ/view?usp=sharing\"> Download </a>'),
(14, '12-5399', 'IC4592', '16:11:00', '-19:16:12', 'nebula', 'ASI-2', 2445882.49180923, 2220, 'Rozhkovskij', '1984-06-30', '23:48:12', 0, '<a href= \"<a href= \"https://drive.google.com/file/d/1S8Z1GJX5-rBVoQMWUv-OvgrQSYQ9OdZE/view?usp=sharing\"> Download </a>\"> Download </a>'),
(15, '10-1814', 'Be-stars', '00:47:00', '63:17:60', 'Be-stars', 'ASI-2', 2435982.33182557, 600, 'unknown', '1957-05-23', '19:57:50', 0, '<a href= \"https://drive.google.com/file/d/1EpH0qPQPSuKedB6RMnkV_71mwUUNLi94/view?usp=sharing\"> Download </a>'),
(16, '77S-77986', 'alf-Cyg', '20:21:00', '40:00:00', 'star', 'Big_Shmidt', 0.00000000, 1200, 'Solodovnikov', '0000-01-01', '00:00:00', 0, '<a href= \"<a href= \"https://drive.google.com/file/d/1S8Z1GJX5-rBVoQMWUv-OvgrQSYQ9OdZE/view?usp=sharing\"> Download </a>\"> Download </a>'),
(17, '70S-2.1', 'zet-Aqr', '22:29:00', '-00:00:36', 'star', 'Big_Shmidt', 0.00000000, 600, 'Solodovnikov', '0000-01-01', '00:00:00', 0, '<a href= \"https://drive.google.com/file/d/1hZNso3P-VhR3j37lVYQvlKGqmHGeca5n/view?usp=sharing\"> Download </a>'),
(18, '10S-3.5', 'NGC253', '00:40:00', '-26:00:00', 'galaxy', 'Big_Shmidt', 2446658.54358114, 600, 'Solodovnikov', '1986-08-16', '01:02:45', 0, '<a href=\"https://drive.google.com/file/d/1vayBAHtsWoAX2EoMK3STphpTrbhXe6W5/view?usp=sharing\"> Download </a>'),
(19, '10S-3.4', 'bet Cet', '00:41:00', '-18:00:00', 'star', 'Big_Shmidt', 2446658.52274780, 600, 'Solodovnikov', '1986-08-16', '00:32:45', 0, '<a href= \"https://drive.google.com/file/d/1JMduWYliDwvot-_5H_BOncwdvyn3Rozh/view?usp=sharing\"> Download </a>'),
(20, '65S-2.1', 'no name', '00:00:00', '-05:00:00', 'star', 'Big_Shmidt', 0.00000000, 900, 'Solodovnikov', '0000-01-01', '00:00:00', 0, '<a href= \"https://drive.google.com/file/d/1ekvx-7-CNkr6lcDg7Bo2uoeXTx5RdXx3/view?usp=sharing\"> Download </a>'),
(21, '66S-2.5', 'no name', '01:00:00', '50:00:00', 'star', 'Big_Shmidt', 0.00000000, 480, 'Solodovnikov', '0000-01-01', '00:00:00', 0, '<a href= \"https://drive.google.com/file/d/1rHIWLE3YntHcUvRS6Vg1GJOTc8y8Ie0N/view?usp=sharing\"> Download </a>'),
(22, '9-177', 'NGC5195', '13:30:00', '47:06:36', 'galaxy', 'ASI-2', 2433739.81049603, 3600, 'Rozhkovskij', '1951-04-03', '07:27:07', 0, '<a href= \"https://drive.google.com/file/d/1TyQ2jmx0iK9a1pqu5hHjR9wQynwMe7iT/view?usp=sharing\"> Download </a>'),
(23, '14S-2.1', 'M44', '08:37:20', '19:47:56', 'star cluster', 'Big_Shmidt', 2446850.85752870, 540, 'Solodovnikov', '1987-02-24', '08:34:50', 0, '<a href= \"<a href= \"https://drive.google.com/file/d/1S8Z1GJX5-rBVoQMWUv-OvgrQSYQ9OdZE/view?usp=sharing\"> Download </a>\"> Download </a>'),
(24, '9-177', 'NGC598', '01:33:00', '30:23:24', 'galaxy', 'ASI-2', 0.00000000, 1800, 'Rozhkovskij', '0000-01-01', '00:00:00', 0, '<a href= \"https://drive.google.com/file/d/1nWmnF6K7LwjTEZCYSNP07d3C9kasj1_E/view?usp=sharing\"> Download </a>'),
(25, '1-2726', 'Kopff', '23:18:00', '-11:11:24', 'comet', 'ASI-2', 2438705.11538737, 720, 'Rozhkovskij', '1964-11-05', '14:46:09', 0, '<a href= \"https://drive.google.com/file/d/1xSs8EcGviFdHltfzo2e8Zc3-md4j4zf3/view?usp=sharing\"> Download </a>'),
(26, '9-351', 'IC1805', '02:32:00', '61:17:24', 'nebula', 'ASI-2', 2433973.10659094, 600, 'Rozhkovskij', '1951-11-22', '14:33:29', 0, '<a href= \"https://drive.google.com/file/d/1Z7YiRehleO8cvrs0lr7pvYzwmXIPrp42/view?usp=sharing\"> Download </a>'),
(27, '70S-3.2', 'eta-Del', '20:34:00', '13:04:12', 'star', 'Big_Shmidt', 0.00000000, 600, 'Solodovnikov', '0000-01-01', '00:00:00', 0, '<a href= \"https://drive.google.com/file/d/1RQ2J0o2CrF5EVeKj-DrW7z9niqaUcKOw/view?usp=sharing\"> Download </a>'),
(28, '1-1637', 'Crommelin', '07:22:30', '51:19:48', 'comet', 'ASI-2', 2435729.44534996, 900, 'unknown', '1956-09-12', '22:41:18', 0, '<a href= \"https://drive.google.com/file/d/1BpNxFVikvlC6Kv7JuCaLMf3kXb0CMlas/view?usp=sharing\"> Download </a>'),
(29, '6-2036', 'Ced167', '19:24:00', '22:23:24', 'nebula', 'ASI-2', 2436086.18111078, 1800, 'Rozhkovskij', '1957-09-04', '16:20:48', 0, '<a href= \"https://drive.google.com/file/d/1Bsmhevurc3dvOTDf2QMHxZQv0QaIeXW0/view?usp=sharing\"> Download </a>'),
(30, '1-1705', 'Arend-Roland', '01:24:00', '24:18:00', 'comet', 'ASI-2', 2435800.13915284, 600, 'Gorodetskij', '1956-11-22', '15:20:23', 0, '<a href= \"https://drive.google.com/file/d/1ZFgZ6I3tku9Fdb09kyC5juDNLVSK2z6y/view?usp=sharing\"> Download </a>'),
(31, '9-80', 'alpha-rho-Tau ', '04:35:00', '16:18:00', 'star', 'ASI-2', 2433620.27168404, 120, 'Toropova', '1950-12-04', '18:31:14', 0, '<a href= \"https://drive.google.com/file/d/1RIc_QxBgdaRcIceoSQgEBMlCiIGvJWiv/view?usp=sharing\"> Download </a>');

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
  MODIFY `newid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
