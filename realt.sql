-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 09 2022 г., 04:35
-- Версия сервера: 8.0.24
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `realt`
--

-- --------------------------------------------------------

--
-- Структура таблицы `houses`
--

CREATE TABLE `houses` (
  `id` int NOT NULL,
  `name_obj` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `adress` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `price` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `img` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `owner` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `houses`
--

INSERT INTO `houses` (`id`, `name_obj`, `adress`, `description`, `price`, `img`, `owner`) VALUES
(1, 'Объект 1', 'ул. Мамадышская 45-78', '9-ый дом, 180 кв. метров, двухуровневая', '7,500,000', '/img/1930518.jpg', 'Admin'),
(2, 'Объект 2', 'ул. Гагарина 56-56', 'ул. Азата Аббасова, д. 11, Казань', '3,900,000', '/img/1930134.jpg', 'Admin'),
(3, 'Объект 3', 'ул. Ленинградская 97-01', 'частный дом из сруба, 100 кв.метров', '4,500,000', '/img/16.jpg', 'Admin'),
(4, 'Объект 4', 'ул. Галимджана Баруди 59-78', 'Кирпичный дом, 80 кв. метров', '3,200,000', '/img/1944656.jpg', 'Admin'),
(5, 'Объект 5', 'ул. 50 лет Победы 24-32', 'Панельный дом, 45 кв. метров, с двумя лоджиями', '2,500,000', '/img/1930518.jpg', 'Admin'),
(6, 'Объект 6', 'ул. Аббасова 11-22', 'Продается 2-комн. кв., 64 м2, 9/19 этаж', '3,900,000', '/img/dom-gorodishce-141072644-2.jpg', 'Admin'),
(7, 'Объект 7', ' ул. Лушникова 50-7', 'Продается 2-комн. кв., 45.8 м2, 1/5 этаж', '2,600,000', '/img/dom-niva-178145527-2.jpg', 'Admin'),
(116, 'Объект 8', ' ул. Широка 97-01', 'Продается 2-комн. кв., 63 м2, 9/10 этаж', '4,350,000', '/img/novostroyka-usady-197995467-2.jpg', 'Admin'),
(117, 'Объект 9', 'ул. Хо Ши Мина  56-321', 'Продается 4-комн. кв., 83.5 м2, 10/11 этаж', '3,750,000', '/img/R3.jpg', 'Admin'),
(118, 'Объект 10', ' ул. Фучика 6-97', 'Продается 2-комн. кв., 62.8 м2, 2/16 этаж', '5,200,000', '/img/novostroyka-usady-197995467-2.jpg', 'Admin');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `login` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `email`) VALUES
(12, 'Admin', 'Admin', 'test@gmail.com');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `houses`
--
ALTER TABLE `houses`
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
-- AUTO_INCREMENT для таблицы `houses`
--
ALTER TABLE `houses`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
