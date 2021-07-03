-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 03 2021 г., 07:57
-- Версия сервера: 5.6.47
-- Версия PHP: 7.2.29

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
(35, '1 окт. 14.30-16.00 Рогова А.', '', '', ''),
(36, '', 'cd 1', '', ''),
(37, '', 'cd 2', '', ''),
(38, '', 'cd 3', '', ''),
(39, '', '', 'orc 1', ''),
(40, '', '', 'orc 2', ''),
(41, '', '', 'Корона МираМар', ''),
(42, '', '', '', 'dinner 1'),
(44, '', '', '', 'dinner 2'),
(45, '', '', 'Королева Импровизации', ''),
(46, '', 'Египетский фольклор СД ', '', ''),
(47, 'mk 4', '', '', ''),
(48, 'мк 5', '', '', ''),
(49, 'мк 6', '', '', ''),
(50, 'мк 7', '', '', ''),
(51, 'мк 8', '', '', ''),
(52, 'мк 9', '', '', '');

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
  `certificate` varchar(250) NOT NULL,
  `coment` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `festival_participant`
--

INSERT INTO `festival_participant` (`id`, `password`, `email`, `fio`, `date`, `phone`, `country`, `city`, `age`, `skill`, `studio`, `manager`, `discount`, `package`, `photo`, `certificate`, `coment`) VALUES
(14, 'пас1', 'лог1', 'Вася Пряников', '01.01.1990', '+7(333) 333-3333', 'Страна', 'Город', 'Взрослые 1 (20-30 лет)', 'Любители продолжающие', 'Студия', 'Руководитель', 20, 'maxi', 'photo!!14!!Вася Пряников.png', 'certificate!!14!!Вася Пряников.png', 'комментарий 1\r\nс новой строки\r\n3-я строка'),
(15, 'пас2', 'лог2', 'лог2', '01.05.2021', '', '', '', 'Дети (7-10лет)', 'Профессионалы', '', '', 0, 'mini', '', '', '');

-- --------------------------------------------------------

--
-- Структура таблицы `festival_payment`
--

CREATE TABLE `festival_payment` (
  `id` int(10) NOT NULL,
  `date` date NOT NULL,
  `user_id` int(10) NOT NULL,
  `amount` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `festival_payment`
--

INSERT INTO `festival_payment` (`id`, `date`, `user_id`, `amount`) VALUES
(4, '2021-05-01', 14, 500),
(7, '2021-03-02', 14, 1000),
(8, '2021-05-06', 15, 5000);

-- --------------------------------------------------------

--
-- Структура таблицы `festival_price`
--

CREATE TABLE `festival_price` (
  `id` int(10) NOT NULL,
  `date` date NOT NULL,
  `meta_type` varchar(250) NOT NULL,
  `meta` varchar(250) NOT NULL,
  `price` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `festival_price`
--

INSERT INTO `festival_price` (`id`, `date`, `meta_type`, `meta`, `price`) VALUES
(510, '2021-05-02', 'master', '33', 2000),
(511, '2021-05-02', 'master', '34', 2000),
(512, '2021-05-02', 'master', '35', 2000),
(513, '2021-05-02', 'master', '47', 2000),
(514, '2021-05-02', 'master', '48', 2000),
(515, '2021-05-02', 'master', '49', 2000),
(516, '2021-05-02', 'master', '50', 2000),
(517, '2021-05-02', 'master', '51', 2000),
(518, '2021-05-02', 'master', '52', 2000),
(519, '2021-05-02', 'cd', '36', 2000),
(520, '2021-05-02', 'cd', '37', 2000),
(521, '2021-05-02', 'cd', '38', 2000),
(522, '2021-05-02', 'cd', '46', 2000),
(523, '2021-05-02', 'orchestra', '39', 2000),
(524, '2021-05-02', 'orchestra', '40', 2000),
(525, '2021-05-02', 'orchestra', '41', 2000),
(526, '2021-05-02', 'orchestra', '45', 2000),
(527, '2021-05-02', 'food', '42', 2000),
(528, '2021-05-02', 'food', '44', 2000),
(529, '2021-05-02', 'package', 'mini', 2000),
(530, '2021-05-02', 'package', 'midi', 2000),
(531, '2021-05-02', 'package', 'maxi', 2000),
(532, '2021-05-02', 'package', 'junior', 2000),
(533, '2021-05-02', 'package', 'study', 2000),
(534, '2021-05-02', 'package', 'all_ws', 2000),
(535, '2021-05-02', 'package', 'group', 0);

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
(57, 44, ''),
(59, 35, ''),
(59, 38, ''),
(59, 40, '<br /><b>Notice</b>:  Undefined offset: 0 in <b>D:OpenServerdomainslocalhost20210421-festivaluser.php</b> on line <b>464</b><br />'),
(59, 44, ''),
(15, 33, ''),
(15, 36, ''),
(15, 39, '<br /><b>Notice</b>:  Undefined offset: 0 in <b>D:OpenServerdomainslocalhost20210421-festivalincludesuser_files.php</b> on line <b>100</b><br />'),
(15, 42, ''),
(14, 34, ''),
(14, 35, ''),
(14, 47, ''),
(14, 48, ''),
(14, 49, ''),
(14, 50, ''),
(14, 51, ''),
(14, 52, ''),
(14, 40, '<br /><b>Notice</b>:  Undefined offset: 0 in <b>D:OpenServerdomainslocalhost20210421-festivaluser.php</b> on line <b>464</b><br />');

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
-- Индексы таблицы `festival_payment`
--
ALTER TABLE `festival_payment`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `festival_price`
--
ALTER TABLE `festival_price`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `festival_meta`
--
ALTER TABLE `festival_meta`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT для таблицы `festival_participant`
--
ALTER TABLE `festival_participant`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `festival_payment`
--
ALTER TABLE `festival_payment`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `festival_price`
--
ALTER TABLE `festival_price`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=536;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
