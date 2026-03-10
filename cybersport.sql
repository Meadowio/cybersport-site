-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 16 2024 г., 16:23
-- Версия сервера: 8.0.30
-- Версия PHP: 8.0.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `cybersport`
--

-- --------------------------------------------------------

--
-- Структура таблицы `InsertUser`
--

CREATE TABLE `InsertUser` (
  `id` int NOT NULL,
  `name` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `InsertUser`
--

INSERT INTO `InsertUser` (`id`, `name`, `password`) VALUES
(72, 'Meadowio', 'qwerty');

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id` int NOT NULL,
  `image` varchar(256) NOT NULL,
  `news-text` varchar(256) NOT NULL,
  `url` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `image`, `news-text`, `url`) VALUES
(1, 'img(news)/news1.jpg', 'РХТУ им. Д.И. Менделеева в пятый раз подряд стал чемпионом МСКЛ', 'https://cybermos.ru/news/cybersport/rtu-mirea-v-pyatyy-raz-podryad-stal-chempionom-mskl/'),
(2, 'img(news)/news2.jpg', 'Призовой фонд «Московского Киберспорта» превысит 1 млн рублей', 'https://cybermos.ru/news/cybersport/prizovoy-fond-moskovskogo-kibersporta-prevysit-1-mln-rubley/'),
(3, 'img(news)/news3.jpg', 'Спортивные разряды присвоили 52 участникам «Московского Киберспорта»', 'https://cybermos.ru/news/cybersport/sportivnye-razryady-prisvoili-52-uchastnikam-moskovskogo-kibersporta/'),
(4, 'img(news)/news4.jpg', 'Более 18 тыс. человек приняли участие в турнирах «Московского Киберспорта»', 'https://cybermos.ru/news/cybersport/bolee-18-tys-chelovek-prinyali-uchastie-v-turnirakh-moskovskogo-kibersporta/'),
(5, 'img(news)/news5.jpeg', '', 'https://mosgorsport.ru/news/otkryt-nabor-v-online-sektsiyu-po-kibersportu/');

-- --------------------------------------------------------

--
-- Структура таблицы `tournaments`
--

CREATE TABLE `tournaments` (
  `id` int NOT NULL,
  `url` varchar(256) NOT NULL,
  `image` varchar(256) NOT NULL,
  `game_name` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `name` varchar(256) NOT NULL,
  `image_game` varchar(256) NOT NULL,
  `date` date NOT NULL,
  `organizator` varchar(256) NOT NULL,
  `registr` varchar(256) NOT NULL,
  `registr_date` varchar(256) NOT NULL,
  `size_prize` varchar(256) NOT NULL,
  `prize` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `tournaments`
--

INSERT INTO `tournaments` (`id`, `url`, `image`, `game_name`, `name`, `image_game`, `date`, `organizator`, `registr`, `registr_date`, `size_prize`, `prize`) VALUES
(1, '#', 'img(game)/tournament/Preview4.jpg', 'МК24. Dota2. Турнир №1', 'МК24. Dota2. Турнир №1', 'img(game)/Dota-2.svg', '2024-05-24', 'Организатор: ', 'Регистрация:', 'c 05 февраля 00:00 до 24 мая 17:55 ', 'Сумма призовых', '20 000 рублей'),
(2, '#', 'img(game)/tournament/Preview5.jpg', 'МК24. Мир Танков. Турнир №2', 'МК24. Мир Танков. Турнир №2', 'img(game)/mirTankov.png', '2024-05-25', 'Организатор: ', 'Регистрация:', 'c 04 февраля 00:00 до 25 мая 17:55 ', 'Сумма призовых', '28 000 Рублей'),
(3, '#', 'img(game)/tournament/Preview.jpg', 'МК24. League of Legends. Турнир №3', 'МК24. League of Legends. Турнир №3', 'img(game)/LoL.svg', '2024-05-31', 'Организатор: ', 'Регистрация:', 'c 05 февраля 00:00 до 31 мая 17:55 ', 'Сумма призовых', '20 000 рублей'),
(4, '#', 'img(game)/tournament/Preview5.jpg', 'МК24. Мир Танков. Турнир №4', 'МК24. Мир Танков. Турнир №4', 'img(game)/mirTankov.png', '2024-06-01', 'Организатор: ', 'Регистрация:', 'c 01 мая 00:00 до 01 июня 17:55 ', 'Сумма призовых', '28 000 Рублей'),
(5, '#', 'img(game)/tournament/Preview.jpg', 'МК24. TFT. Турнир №5', 'МК24. TFT. Турнир №5', 'img(game)/TFT.svg', '2024-06-02', 'Организатор: ', 'Регистрация:', 'c 01 мая 00:00 до 02 июня 17:55', 'Сумма призовых', '12 000 Рублей'),
(6, '#', 'img(game)/tournament/Preview4.jpg', 'МК24. Dota2. Турнир №6', 'МК24. Dota2. Турнир №6', 'img(game)/Dota-2.svg', '2024-06-07', 'Организатор: ', 'Регистрация:', 'c 01 мая 00:00 до 07 июня 17:55 ', 'Сумма призовых', '20 000 Рублей'),
(7, '#', 'img(game)/tournament/Preview.jpg', 'МК24. Dota2. Турнир №6', 'МК24. Dota2. Турнир №', 'img(game)/Dota-2.svg', '2024-06-07', 'Организатор: ', 'Регистрация:', 'Скоро появится...', 'Сумма призовых', '');

-- --------------------------------------------------------

--
-- Структура таблицы `tournaments_new`
--

CREATE TABLE `tournaments_new` (
  `id` int NOT NULL,
  `url` varchar(256) NOT NULL,
  `image` varchar(256) NOT NULL,
  `game_name` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `name` varchar(256) NOT NULL,
  `image_game` varchar(256) NOT NULL,
  `date` date NOT NULL,
  `organizator` varchar(256) NOT NULL,
  `registr` varchar(256) NOT NULL,
  `registr_date` varchar(256) NOT NULL,
  `size_prize` varchar(256) NOT NULL,
  `prize` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `tournaments_new`
--

INSERT INTO `tournaments_new` (`id`, `url`, `image`, `game_name`, `name`, `image_game`, `date`, `organizator`, `registr`, `registr_date`, `size_prize`, `prize`) VALUES
(1, '#', 'img(game)/tournament/Preview4.jpg', 'Dota2', 'МК24. Dota2. Турнир №1', 'img(game)/Dota-2.svg', '2024-05-24', 'Организатор: ', 'Регистрация:', 'Пока неизвестно... ', 'Сумма призовых:', '20 000 рублей'),
(2, '#', 'img(game)/tournament/Preview5.jpg', 'Мир Танков', 'МК24. Мир Танков. Турнир №2', 'img(game)/mirTankov.png', '2024-05-25', 'Организатор: ', 'Регистрация:', 'Пока неизвестно... ', 'Сумма призовых:', '28 000 Рублей'),
(7, '#', 'img(game)/tournament/Preview.jpg', 'МК24. Dota2. Турнир №6', 'МК24. Dota2. Турнир №', 'img(game)/Dota-2.svg', '2024-06-07', 'Организатор: ', 'Регистрация:', 'Скоро появится...', 'Сумма призовых', '');

-- --------------------------------------------------------

--
-- Структура таблицы `tournaments_requests`
--

CREATE TABLE `tournaments_requests` (
  `id` int NOT NULL,
  `game_name` varchar(256) NOT NULL,
  `date` date NOT NULL,
  `info` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `tournaments_requests`
--

INSERT INTO `tournaments_requests` (`id`, `game_name`, `date`, `info`) VALUES
(2, 'League of Legends', '2024-05-27', 'Турнир 5х5 с призовым 5к'),
(4, 'Teamfight Tactics', '2024-06-14', 'вчрапарпар');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `InsertUser`
--
ALTER TABLE `InsertUser`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tournaments`
--
ALTER TABLE `tournaments`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tournaments_new`
--
ALTER TABLE `tournaments_new`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tournaments_requests`
--
ALTER TABLE `tournaments_requests`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `InsertUser`
--
ALTER TABLE `InsertUser`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `tournaments`
--
ALTER TABLE `tournaments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `tournaments_new`
--
ALTER TABLE `tournaments_new`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `tournaments_requests`
--
ALTER TABLE `tournaments_requests`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
