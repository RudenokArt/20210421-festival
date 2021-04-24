-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 24 2021 г., 20:09
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
-- Структура таблицы `festival_participant`
--

CREATE TABLE `festival_participant` (
  `id` int(10) NOT NULL,
  `password` varchar(250) NOT NULL,
  `ФИО` varchar(250) NOT NULL,
  `Дата рождения` varchar(250) NOT NULL,
  `Возрастная категория` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `Телефон` varchar(250) NOT NULL,
  `Страна` varchar(250) NOT NULL,
  `Город` varchar(250) NOT NULL,
  `Студия` varchar(250) NOT NULL,
  `Руководитель` varchar(250) NOT NULL,
  `Скидка` varchar(250) NOT NULL,
  `Уровень мастерства` varchar(250) NOT NULL,
  `Сертификат` varchar(250) NOT NULL,
  `Пакет` varchar(250) NOT NULL,
  `С точки (вход)` varchar(250) NOT NULL,
  `Коментарий` varchar(250) NOT NULL,
  `1 окт. 9.00-11.00 Мохамед` varchar(250) DEFAULT NULL,
  `1 окт. 11.15-13.15 Оксана` varchar(250) DEFAULT NULL,
  `1 окт. 14.30-16.00 Рогова А.` varchar(250) DEFAULT NULL,
  `1 окт. 16.15-18.15 Мохамед` varchar(250) DEFAULT NULL,
  `1 окт. 18,30-20.30 Оксана` varchar(250) DEFAULT NULL,
  `2 окт. 9.00-11.00 Аида` varchar(250) DEFAULT NULL,
  `2 окт. 11.15-13.15 Оксана` varchar(250) DEFAULT NULL,
  `3 окт. 9.00-11.00 Аида` varchar(250) DEFAULT NULL,
  `3 окт. 11.15-13.15 Мохамед` varchar(250) DEFAULT NULL,
  `Классический ориенталь` varchar(250) DEFAULT NULL,
  `CD Эстрадная песня CD` varchar(250) DEFAULT NULL,
  `Ориентал Классика CD` varchar(250) DEFAULT NULL,
  `Беледи/Шааби CD` varchar(250) DEFAULT NULL,
  `Египетский Фольклор CD` varchar(250) DEFAULT NULL,
  `Неегипетский Фольклор CD` varchar(250) DEFAULT NULL,
  `Шоу/табла CD` varchar(250) DEFAULT NULL,
  `Показательное выступление CD` varchar(250) DEFAULT NULL,
  `Ориентал Классика ОРКЕСТР` varchar(250) DEFAULT NULL,
  `Беледи/импровизация + Табла соло ОРКЕСТР` varchar(250) DEFAULT NULL,
  `Беледи/Шааби ОРКЕСТР` varchar(250) DEFAULT NULL,
  `Показательное выступление ОРКЕСТР` varchar(250) DEFAULT NULL,
  `Корона МираМар Оркестр` varchar(250) DEFAULT NULL,
  `пятница обед 1` varchar(250) DEFAULT NULL,
  `пятница обед 2` varchar(250) DEFAULT NULL,
  `суббота обед 1` varchar(250) DEFAULT NULL,
  `суббота обед 2` varchar(250) DEFAULT NULL,
  `воскресенье обед 1` varchar(250) DEFAULT NULL,
  `воскресенье обед 2` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `festival_participant`
--

INSERT INTO `festival_participant` (`id`, `password`, `ФИО`, `Дата рождения`, `Возрастная категория`, `email`, `Телефон`, `Страна`, `Город`, `Студия`, `Руководитель`, `Скидка`, `Уровень мастерства`, `Сертификат`, `Пакет`, `С точки (вход)`, `Коментарий`, `1 окт. 9.00-11.00 Мохамед`, `1 окт. 11.15-13.15 Оксана`, `1 окт. 14.30-16.00 Рогова А.`, `1 окт. 16.15-18.15 Мохамед`, `1 окт. 18,30-20.30 Оксана`, `2 окт. 9.00-11.00 Аида`, `2 окт. 11.15-13.15 Оксана`, `3 окт. 9.00-11.00 Аида`, `3 окт. 11.15-13.15 Мохамед`, `Классический ориенталь`, `CD Эстрадная песня CD`, `Ориентал Классика CD`, `Беледи/Шааби CD`, `Египетский Фольклор CD`, `Неегипетский Фольклор CD`, `Шоу/табла CD`, `Показательное выступление CD`, `Ориентал Классика ОРКЕСТР`, `Беледи/импровизация + Табла соло ОРКЕСТР`, `Беледи/Шааби ОРКЕСТР`, `Показательное выступление ОРКЕСТР`, `Корона МираМар Оркестр`, `пятница обед 1`, `пятница обед 2`, `суббота обед 1`, `суббота обед 2`, `воскресенье обед 1`, `воскресенье обед 2`) VALUES
(7, 'pas', 'Иванов', '04/01/2021', '', 'mail1', '+7(111) 111-1111', 'РФ', 'Москва', 'студия', 'руководитель', '20%', 'Любители - начинающие', 'Да', 'junior', 'Вход', '', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', 'трек1', 'трек1', 'трек1', 'трек1', 'трек1', '1', '1', '1', '1', '1', '1');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `festival_participant`
--
ALTER TABLE `festival_participant`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `festival_participant`
--
ALTER TABLE `festival_participant`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
