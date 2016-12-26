-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Дек 24 2016 г., 14:29
-- Версия сервера: 10.1.19-MariaDB
-- Версия PHP: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `test_job`
--

-- --------------------------------------------------------

--
-- Структура таблицы `job`
--

CREATE TABLE `job` (
  `id` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `title` text NOT NULL,
  `desc` text NOT NULL,
  `price` int(11) NOT NULL,
  `address` text NOT NULL,
  `views` int(11) NOT NULL DEFAULT '0',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `job`
--

INSERT INTO `job` (`id`, `idUser`, `title`, `desc`, `price`, `address`, `views`, `date`) VALUES
(1, 1, 'Вынести мусор', 'Дома валяется мусор, лень выносить.', 50, 'ул. Родионова, д. 193, кв. 35', 63, '2016-12-19 07:33:09'),
(2, 2, 'Присмотреть за котом', 'Нужно присмотреть за котом на 2 дня, его не с кем оставить.', 300, 'ул. Белинского, д. 110, кв. 14', 1, '2016-12-19 23:07:06'),
(3, 3, 'Убрать снег около дома', 'Нужно убрать снег на территории 8 кв.м.', 100, 'ул. Владимирская, д. 115', 0, '2016-12-21 00:33:09'),
(4, 1, 'Купить продукты', 'Купить продукты из списка и доставить по адресу.', 100, 'ул. Бекетова, д. 15, кв. 2', 1, '2016-12-22 16:54:44'),
(5, 2, 'Составить веселую компанию', 'Приглашаем на вечеринку веселых и задорных людей.', 2500, 'ул. Максима Горького, д.148, кв. 15', 1, '2016-12-23 09:54:31'),
(6, 3, 'Продать антона', 'Взять и продать!', 255500, 'Проспект Шляпкино, д.666, кв 77', 19, '2016-12-24 13:13:04');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `firstname` text NOT NULL,
  `phone` text NOT NULL,
  `rep` int(11) NOT NULL DEFAULT '0',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `adSum` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `firstname`, `phone`, `rep`, `date`, `adSum`) VALUES
(1, 'User', '123456', 'АНТОШКА666', '+79991231235', 0, '2016-12-24 07:32:22', 3),
(2, 'User2', '123456', 'Владислав', '+02', 0, '2016-12-24 08:08:56', 2),
(3, 'User3', '123456', 'Егор', '+03', 0, '2016-12-24 08:09:52', 2);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `job`
--
ALTER TABLE `job`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
