-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Хост: 10.0.0.57
-- Время создания: Сен 29 2022 г., 13:13
-- Версия сервера: 5.7.37-40
-- Версия PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `f0724104_katalog`
--

-- --------------------------------------------------------

--
-- Структура таблицы `admin`
--

CREATE TABLE `admin` (
  `ID` int(11) NOT NULL,
  `FIO` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `login` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `admin`
--

INSERT INTO `admin` (`ID`, `FIO`, `login`, `Password`) VALUES
(1, 'Пухляк Константин Анатольевич', '89041436616', 'Kaba4ok!2!Kek'),
(5, 'Носков Игорь Николаевич', '89246091712', 'Qwer1234');

-- --------------------------------------------------------

--
-- Структура таблицы `otzov`
--

CREATE TABLE `otzov` (
  `Id` int(11) NOT NULL,
  `FIO` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Telefon` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `Pohta` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `OtzovPol` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Data` date NOT NULL,
  `Smotr` tinyint(1) NOT NULL,
  `IDAdmin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `otzov`
--

INSERT INTO `otzov` (`Id`, `FIO`, `Telefon`, `Pohta`, `OtzovPol`, `Data`, `Smotr`, `IDAdmin`) VALUES
(19, 'Пухляк Константин Анатольевич', '+79042128763', 'dgfb12gf@outlook.com', 'Сайт сделан для обучения.', '2022-09-27', 1, 1),
(23, 'Пухляк Константин Анатольевич', '+79041436616', 'kostya.puhlyak@yandex.ru', 'Работают все функции', '2022-09-29', 0, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `swiper`
--

CREATE TABLE `swiper` (
  `ID` int(11) NOT NULL,
  `Zagolov` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `InfoSlader` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `File` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `IDAdmin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `swiper`
--

INSERT INTO `swiper` (`ID`, `Zagolov`, `InfoSlader`, `File`, `IDAdmin`) VALUES
(1, 'Новое поступление', 'Не пропуcтите', 'shop_property_file_343_1292.jpg', 1),
(2, 'Bicycle', 'Ледяная тьма колоды Juniardi Satyanagara\n659 руб.', 'shop_property_file_298_770.jpg', 1),
(4, 'Bicycle Dragon', 'Эта колода премиум-класса порадует любителей жанра, а также коллекционеров карт.', 'd1f616e4bab42127a391e82d4098a647.jpg', 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `otzov`
--
ALTER TABLE `otzov`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `IDAdmin` (`IDAdmin`);

--
-- Индексы таблицы `swiper`
--
ALTER TABLE `swiper`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `IDAdmin` (`IDAdmin`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `admin`
--
ALTER TABLE `admin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `otzov`
--
ALTER TABLE `otzov`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT для таблицы `swiper`
--
ALTER TABLE `swiper`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `otzov`
--
ALTER TABLE `otzov`
  ADD CONSTRAINT `otzov_ibfk_1` FOREIGN KEY (`IDAdmin`) REFERENCES `admin` (`ID`) ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `swiper`
--
ALTER TABLE `swiper`
  ADD CONSTRAINT `swiper_ibfk_1` FOREIGN KEY (`IDAdmin`) REFERENCES `admin` (`ID`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
