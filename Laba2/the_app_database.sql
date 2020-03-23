-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 23 2020 г., 21:11
-- Версия сервера: 10.3.13-MariaDB
-- Версия PHP: 7.1.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `the_app_database`
--

-- --------------------------------------------------------

--
-- Структура таблицы `application`
--

CREATE TABLE `application` (
  `id_app` int(11) NOT NULL,
  `about` varchar(50) NOT NULL,
  `id_service` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `application`
--

INSERT INTO `application` (`id_app`, `about`, `id_service`) VALUES
(1, 'tttt', 2),
(2, 'qqqq', 2),
(3, 'eeeee', 2),
(4, 'rrrrrrr', 1),
(5, 'pppp', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `client`
--

CREATE TABLE `client` (
  `id_client` int(11) NOT NULL,
  `id_app` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `client`
--

INSERT INTO `client` (`id_client`, `id_app`, `Name`) VALUES
(1, 1, 'User1'),
(3, 3, 'User3'),
(4, 4, 'User4'),
(5, 1, 'dudidudunu@gmail.com');

-- --------------------------------------------------------

--
-- Структура таблицы `service`
--

CREATE TABLE `service` (
  `id_service` int(11) NOT NULL,
  `about` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `service`
--

INSERT INTO `service` (`id_service`, `about`) VALUES
(1, 'up'),
(2, 'down'),
(3, 'left');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`id_app`),
  ADD KEY `id_service` (`id_service`);

--
-- Индексы таблицы `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id_client`),
  ADD KEY `id_application` (`id_app`);

--
-- Индексы таблицы `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id_service`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `application`
--
ALTER TABLE `application`
  MODIFY `id_app` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `client`
--
ALTER TABLE `client`
  MODIFY `id_client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `service`
--
ALTER TABLE `service`
  MODIFY `id_service` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `application`
--
ALTER TABLE `application`
  ADD CONSTRAINT `application_ibfk_1` FOREIGN KEY (`id_service`) REFERENCES `service` (`id_service`);

--
-- Ограничения внешнего ключа таблицы `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `client_ibfk_1` FOREIGN KEY (`id_app`) REFERENCES `application` (`id_app`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
