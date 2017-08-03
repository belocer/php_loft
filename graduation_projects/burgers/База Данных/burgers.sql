-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Авг 03 2017 г., 10:28
-- Версия сервера: 5.7.11
-- Версия PHP: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `burgers`
--

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `street` varchar(100) NOT NULL,
  `home` varchar(100) NOT NULL,
  `housing` varchar(100) NOT NULL,
  `appt` varchar(100) NOT NULL,
  `floor` varchar(100) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `payment` varchar(10) NOT NULL,
  `callback` varchar(10) NOT NULL,
  `payment_cart` varchar(10) NOT NULL,
  `comment` text NOT NULL,
  `users_id` int(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `name`, `email`, `phone`, `street`, `home`, `housing`, `appt`, `floor`, `date_time`, `payment`, `callback`, `payment_cart`, `comment`, `users_id`) VALUES
(13, 'Денис', 'belocerkovecden@mail.ru', '+7 (928) 304 85 94', 'Титова', '66', '0', '0', '0', '2017-08-02 11:34:46', 'on', '', '', 'Привет!', 7),
(14, 'Ирина', 'belocerkovecira@mail.ru', '+7 (928) 814 61 36', 'Титова', '66', '0', '0', '0', '2017-08-02 11:43:55', 'on', '', '', 'Иди идти шагать шалындраться пошёл на хер', 8),
(17, 'Роман', 'roman@mail.ru', '+7 (888) 888 88 88', 'ццццц', '23', '0', '0', '0', '2017-08-02 11:50:57', '', '', 'on', '0', 9),
(23, 'Роман', 'roman@mail.ru', '+7 (888) 888 88 88', 'ццццц', '23', '0', '0', '0', '2017-08-02 12:42:31', '', '', 'on', '0', 9),
(27, 'Ирина', 'belocerkovecira@mail.ru', '+7 (928) 814 61 36', 'Титова', '66', '0', '0', '0', '2017-08-02 15:01:46', 'on', '', '', '00000000000011', 8),
(28, 'Ирина', 'belocerkovecira@mail.ru', '+7 (928) 814 61 36', 'Титова', '66', '0', '0', '0', '2017-08-02 15:24:20', '', '', 'on', '00000вав54а9в8а4 ывап', 8),
(29, 'Анастасия', 'belocerkvecnas@mail.ru', '+7 (988) 888 88 88', 'Ленина', '425', '2', '15', '4', '2017-08-03 06:49:23', 'on', '', '', 'Студентка, комсомолка, и просто красавица.', 10);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`) VALUES
(7, 'Денис', 'belocerkovecden@mail.ru', '+7 (928) 304 85 94'),
(8, 'Ирина', 'belocerkovecira@mail.ru', '+7 (928) 814 61 36'),
(9, 'Роман', 'roman@mail.ru', '+7 (888) 888 88 88'),
(10, 'Анастасия', 'belocerkvecnas@mail.ru', '+7 (988) 888 88 88');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
