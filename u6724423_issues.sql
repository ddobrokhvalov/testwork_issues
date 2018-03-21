-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Время создания: Мар 21 2018 г., 16:02
-- Версия сервера: 5.6.39-83.1
-- Версия PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `u6724423_issues`
--

-- --------------------------------------------------------

--
-- Структура таблицы `issues`
--

DROP TABLE IF EXISTS `issues`;
CREATE TABLE `issues` (
  `id` int(11) NOT NULL,
  `username` varchar(255) CHARACTER SET utf8 NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `text` text CHARACTER SET utf8 NOT NULL,
  `image` varchar(255) CHARACTER SET utf8 NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `issues`
--

INSERT INTO `issues` (`id`, `username`, `email`, `text`, `image`, `status`) VALUES
(5, 'Пользователь 2', 'mail3@test.ru', 'fsdfsdfd', '/images/upload/img/Desert.jpg', 0),
(6, 'Пользователь 1', 'mail1@test.ru', 'fsdretretrtre', '/images/upload/img/Lighthouse.jpg', 1),
(7, 'Пользователь 3', 'mail2@test.ru', 'thghgfhgfh', '/images/upload/img/Chrysanthemum.jpg', 0),
(8, 'Пользователь 1', 'mail1@test.ru', 'xfyhjxfyhxfhy', '/images/upload/img/belka.jpg', 1),
(9, 'Пользователь 1', 'mail1@test.ru', 'xfyjnxfyhxyh', '/images/upload/img/belka[1].jpg', 1),
(10, 'Пользователь 1', 'mail1@test.ru', 'cfyhjmcyhmcgyhm', '/images/upload/img/TEST.txt', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `is_admin` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `username`, `email`, `is_admin`) VALUES
(2, 'admin', '202cb962ac59075b964b07152d234b70', 'Администратор', 'admin@test.ru', 1),
(3, 'user1', '7c6a180b36896a0a8c02787eeafb0e4c', 'Пользователь 1', 'mail1@test.ru', 0),
(4, 'user2', '7c6a180b36896a0a8c02787eeafb0e4c', 'Пользователь 2', 'mail3@test.ru', 0),
(5, 'user3', '7c6a180b36896a0a8c02787eeafb0e4c', 'Пользователь 3', 'mail2@test.ru', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `issues`
--
ALTER TABLE `issues`
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
-- AUTO_INCREMENT для таблицы `issues`
--
ALTER TABLE `issues`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
