-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Авг 08 2024 г., 23:28
-- Версия сервера: 8.0.30
-- Версия PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `travel_diary`
--

-- --------------------------------------------------------

--
-- Структура таблицы `trips`
--

CREATE TABLE `trips` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `location` varchar(100) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `cost` decimal(10,2) DEFAULT NULL,
  `cultural_sites` text,
  `places_to_visit` text,
  `mobility_rating` int DEFAULT NULL,
  `safety_rating` int DEFAULT NULL,
  `population_density_rating` int DEFAULT NULL,
  `vegetation_rating` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `trips`
--

INSERT INTO `trips` (`id`, `user_id`, `location`, `image`, `cost`, `cultural_sites`, `places_to_visit`, `mobility_rating`, `safety_rating`, `population_density_rating`, `vegetation_rating`) VALUES
(1, 1, 'г.Москва', 'https://www.advantour.com/russia/images/moscow/moscow_red-square1.jpg', '2000.00', 'Красная площадь', 'Государственный исторический музей', 10, 10, 6, 6),
(2, 2, 'г.Екатеринбург', 'https://fs.tonkosti.ru/88/z7/88z7do7nv9s8woks0ckwkkw4o.jpg', '0.00', 'Плотина городского пруда', 'Памятник Татищеву и де Геннину у плотины', 8, 10, 7, 9),
(3, 3, 'г.Сочи', 'https://cdn.tripster.ru/thumbs2/79875a10-3f9a-11eb-b7f2-8677620a10c4.800x600.jpg', '500.00', 'Олимпийская деревня', 'Олимпийский парк', 10, 10, 6, 8);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'User1', '$2y$10$pmpa.s.3ust7EOgfssLFE.7YE0eNyQDzPzXPLrbsoXklGr/T6iAKK'),
(2, 'User2', '$2y$10$Jc.IN7Xq9B55/JEkvntvLO.fnEApGwrXtWxQCvayS/TxJ4NhHCc3.'),
(3, 'User3', '$2y$10$ArQtPom9584w0ahk6LwrDuLgbrPdzLoZU1AN1mVqbEZ1y4l9btmKq');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `trips`
--
ALTER TABLE `trips`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `trips`
--
ALTER TABLE `trips`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `trips`
--
ALTER TABLE `trips`
  ADD CONSTRAINT `trips_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
