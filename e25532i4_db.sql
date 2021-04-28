-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 28 2021 г., 19:49
-- Версия сервера: 5.6.47
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `e25532i4_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `festival_meta`
--

CREATE TABLE `festival_meta` (
  `id` int(10) NOT NULL,
  `master` varchar(250) NOT NULL,
  `cd` varchar(250) NOT NULL,
  `orchestra` varchar(250) NOT NULL,
  `food` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `festival_meta`
--

INSERT INTO `festival_meta` (`id`, `master`, `cd`, `orchestra`, `food`) VALUES
(33, 'mk 1', '', '', ''),
(34, 'mk 2', '', '', ''),
(35, 'mk 3', '', '', ''),
(36, '', 'cd 1', '', ''),
(37, '', 'cd 2', '', ''),
(38, '', 'cd 3', '', ''),
(39, '', '', 'orc 1', ''),
(40, '', '', 'orc 2', ''),
(41, '', '', 'orc 3', ''),
(42, '', '', '', 'dinner 1'),
(44, '', '', '', 'dinner 2');

-- --------------------------------------------------------

--
-- Структура таблицы `festival_participant`
--

CREATE TABLE `festival_participant` (
  `id` int(10) NOT NULL,
  `password` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `fio` varchar(250) NOT NULL,
  `date` varchar(10) NOT NULL,
  `phone` varchar(250) NOT NULL,
  `country` varchar(250) NOT NULL,
  `city` varchar(250) NOT NULL,
  `age` varchar(250) NOT NULL,
  `skill` varchar(250) NOT NULL,
  `studio` varchar(250) NOT NULL,
  `manager` varchar(250) NOT NULL,
  `discount` int(10) NOT NULL,
  `package` varchar(250) NOT NULL,
  `photo` varchar(250) NOT NULL,
  `certificate` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `festival_participant`
--

INSERT INTO `festival_participant` (`id`, `password`, `email`, `fio`, `date`, `phone`, `country`, `city`, `age`, `skill`, `studio`, `manager`, `discount`, `package`, `photo`, `certificate`) VALUES
(14, 'пас1', 'лог1', 'ФИО', '01.04.2021', '+7(333) 333-3333', 'Страна', 'Город', 'Юниоры', 'Любители продолжающие', 'Студия', 'Руководитель', 20, 'junior', 'photo!!14!!ФИО.png', 'certificate!!14!!ФИО.png'),
(16, 'пас3', 'лог3', 'фио', '26.04.2021', '+7(111) 111-1111', 'РФ', 'СПБ', 'возр', 'Любители продолжающие', 'студ', 'рук', 0, '', '1619465272.png', 'certificate!!16!!фио.png'),
(58, 'art', 'RudenokArt@yandex.ru', '', '', '', '', '', '', '', '', '', 0, '', '', '');

-- --------------------------------------------------------

--
-- Структура таблицы `festival_user_category`
--

CREATE TABLE `festival_user_category` (
  `user` int(10) NOT NULL,
  `category` int(10) NOT NULL,
  `orchestra` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `festival_user_category`
--

INSERT INTO `festival_user_category` (`user`, `category`, `orchestra`) VALUES
(16, 34, ''),
(16, 36, ''),
(16, 37, ''),
(16, 39, 'Композиция'),
(14, 33, ''),
(14, 35, ''),
(14, 42, ''),
(57, 33, ''),
(57, 34, ''),
(57, 35, ''),
(57, 36, ''),
(57, 37, ''),
(57, 38, ''),
(57, 39, 'Композиция для orc 1 '),
(57, 40, 'Композиция для orc 1 '),
(57, 41, 'Композиция для orc 1 '),
(57, 42, ''),
(57, 44, '');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `festival_meta`
--
ALTER TABLE `festival_meta`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `festival_participant`
--
ALTER TABLE `festival_participant`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `festival_meta`
--
ALTER TABLE `festival_meta`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT для таблицы `festival_participant`
--
ALTER TABLE `festival_participant`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
