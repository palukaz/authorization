open index.php to test project

change actions/config.php to set your DB

SQL:

-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 17 2024 г., 14:09
-- Версия сервера: 8.0.30
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `site`
--

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pass` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sex` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `registration_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `avatar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'assets/default.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Данные о пользователях ';

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `email`, `name`, `pass`, `sex`, `registration_date`, `avatar`) VALUES
(5, 'akamolov.2004@mail.ru', 'Антона', '$2y$10$iT7fSWAGhHSnxitJpoNyPOjPySbUgekq1JKA5w/kvFfVTS3sly.3m', 'Женский', '2024-04-03 19:11:36', 'assets/default.png'),
(8, 'miheeva.2004@mail.ru', 'Валера', '$2y$10$y3RjkcGnu8J2Zsie8gwqj.sYikE1k.yDpixXSJehJOI9AaN4f.3qa', 'Женский', '2024-04-03 23:02:03', 'uploads/avatar_1713128368.jpg'),
(9, 'makarov.2005@mail.ru', 'Анатолий', '$2y$10$LrBc2WRibjv3G6lWCcDk8eNOMBrHy6ut1XbRc7SanHqamRUq5KLaK', 'Мужской', '2024-04-03 23:12:45', 'assets/default.png'),
(10, 'aakamolov.2004@mail.ru', 'Тоша', '$2y$10$L6mSvGNc5TjPUxT1hPTRouXiHOoaLWh108gCzb7BnCpxFa3I/jJ0W', 'Мужской', '2024-04-08 19:33:30', 'uploads/avatar_1712599318.jpg'),
(12, 'kamolov.2004@mail.ru', 'Василий', '$2y$10$vfJm6Zei4tkZu/CtjwpdP.PsXorjZlIfgKLTtfjdkWWmVvWw.eDg.', 'Мужской', '2024-04-16 16:24:40', 'uploads/avatar_1713273894.jpg');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`) USING BTREE;

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
