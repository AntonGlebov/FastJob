
-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Дек 26 2016 г., 19:46
-- Версия сервера: 10.0.20-MariaDB
-- Версия PHP: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `u102295625_job`
--

-- --------------------------------------------------------

--
-- Структура таблицы `job`
--

CREATE TABLE IF NOT EXISTS `job` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idUser` int(11) NOT NULL,
  `title` text NOT NULL,
  `desc` text NOT NULL,
  `price` int(11) NOT NULL,
  `address` text NOT NULL,
  `views` int(11) NOT NULL DEFAULT '0',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Дамп данных таблицы `job`
--

INSERT INTO `job` (`id`, `idUser`, `title`, `desc`, `price`, `address`, `views`, `date`) VALUES
(1, 1, 'Вынести мусор', 'Дома валяется мусор, лень выносить.', 50, 'ул. Родионова, д. 193, кв. 35', 63, '2016-12-19 07:33:09'),
(2, 2, 'Присмотреть за котом', 'Нужно присмотреть за котом на 2 дня, его не с кем оставить.', 300, 'ул. Белинского, д. 110, кв. 14', 1, '2016-12-19 23:07:06'),
(3, 3, 'Убрать снег около дома', 'Нужно убрать снег на территории 8 кв.м.', 100, 'ул. Владимирская, д. 115', 1, '2016-12-21 00:33:09'),
(4, 1, 'Купить продукты', 'Купить продукты из списка и доставить по адресу.', 100, 'ул. Бекетова, д. 15, кв. 2', 1, '2016-12-22 16:54:44'),
(5, 2, 'Составить веселую компанию', 'Приглашаем на вечеринку веселых и задорных людей.', 2500, 'ул. Максима Горького, д.148, кв. 15', 5, '2016-12-23 09:54:31');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `firstname` text NOT NULL,
  `phone` text NOT NULL,
  `rep` int(11) NOT NULL DEFAULT '0',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `adSum` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `firstname`, `phone`, `rep`, `date`, `adSum`) VALUES
(1, 'User', '123456', 'Антон', '+79991231235', 0, '2016-12-24 07:32:22', 3),
(2, 'User2', '123456', 'Владислав', '+79991234567', 0, '2016-12-24 08:08:56', 2),
(3, 'User3', '123456', 'Егор', '+79999999999', 0, '2016-12-24 08:09:52', 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
