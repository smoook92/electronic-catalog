-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Май 26 2024 г., 14:29
-- Версия сервера: 8.0.34-26-beget-1-1
-- Версия PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `database`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--
-- Создание: Май 25 2024 г., 07:40
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(2, 'Процессоры'),
(3, 'Тест 2');

-- --------------------------------------------------------

--
-- Структура таблицы `contacts`
--
-- Создание: Май 25 2024 г., 07:40
--

DROP TABLE IF EXISTS `contacts`;
CREATE TABLE `contacts` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `phone`, `message`) VALUES
(1, 'test', 'test@test.test', '1234123213213', 'adsfdasfds'),
(2, 'Тест', 'test@test.test', '1231312312312', 'Тестовое сообщение');

-- --------------------------------------------------------

--
-- Структура таблицы `content`
--
-- Создание: Май 25 2024 г., 07:40
--

DROP TABLE IF EXISTS `content`;
CREATE TABLE `content` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `content`
--

INSERT INTO `content` (`id`, `title`, `body`) VALUES
(1, 'Тестовый контент', 'Тестовый текст для контента');

-- --------------------------------------------------------

--
-- Структура таблицы `korzina`
--
-- Создание: Май 25 2024 г., 07:40
--

DROP TABLE IF EXISTS `korzina`;
CREATE TABLE `korzina` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `product_id` int DEFAULT NULL,
  `quantity` int NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `korzina`
--

INSERT INTO `korzina` (`id`, `user_id`, `product_id`, `quantity`, `created_at`) VALUES
(1, 1, 1, 2, '2024-05-25 08:46:55');

-- --------------------------------------------------------

--
-- Структура таблицы `novosti`
--
-- Создание: Май 25 2024 г., 07:40
--

DROP TABLE IF EXISTS `novosti`;
CREATE TABLE `novosti` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `novosti`
--

INSERT INTO `novosti` (`id`, `title`, `content`, `created_at`) VALUES
(1, 'Тестовая новость', 'Тестовый текст на тестовую новость', '2024-05-25 08:17:14'),
(2, 'Тестовая новость 2', 'Тестовый текст', '2024-05-25 11:28:55'),
(3, 'Тестовая новость 2', 'Тестовый текст', '2024-05-25 11:34:31');

-- --------------------------------------------------------

--
-- Структура таблицы `otzivi`
--
-- Создание: Май 25 2024 г., 07:40
--

DROP TABLE IF EXISTS `otzivi`;
CREATE TABLE `otzivi` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `product_id` int DEFAULT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `otzivi`
--

INSERT INTO `otzivi` (`id`, `user_id`, `product_id`, `content`, `created_at`) VALUES
(1, 1, 1, 'Тестовый комментарий', '2024-05-25 08:47:16');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--
-- Создание: Май 25 2024 г., 07:40
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  `price` decimal(10,2) NOT NULL,
  `category_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `category_id`) VALUES
(1, 'AMD Ryzen 7 2700', 'Восьмиядерный процессор AMD Ryzen 7 2700 предназначен для работы с офисной системой. Имеет поддержку шестнадцати потоков с базовой частотой 3,2 ГГц. При этом за счет инновационной технологии осуществляется разгон до 4,1 ГГц, что гарантирует высокую производительность.', '50000.00', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--
-- Создание: Май 25 2024 г., 07:40
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(1, 'root', 'root@root.root', 'root');

-- --------------------------------------------------------

--
-- Структура таблицы `zakazi`
--
-- Создание: Май 25 2024 г., 07:40
--

DROP TABLE IF EXISTS `zakazi`;
CREATE TABLE `zakazi` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `zakazi`
--

INSERT INTO `zakazi` (`id`, `user_id`, `description`, `created_at`) VALUES
(1, 1, 'Тестовый заказ', '2024-05-25 08:45:56');

-- --------------------------------------------------------

--
-- Структура таблицы `zakzvon`
--
-- Создание: Май 25 2024 г., 07:40
--

DROP TABLE IF EXISTS `zakzvon`;
CREATE TABLE `zakzvon` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `zakzvon`
--

INSERT INTO `zakzvon` (`id`, `name`, `phone`, `description`, `created_at`) VALUES
(1, 'Тест', '13123213123', 'Тестовый звонок', '2024-05-25 08:46:39');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `korzina`
--
ALTER TABLE `korzina`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Индексы таблицы `novosti`
--
ALTER TABLE `novosti`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `otzivi`
--
ALTER TABLE `otzivi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `zakazi`
--
ALTER TABLE `zakazi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `zakzvon`
--
ALTER TABLE `zakzvon`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `content`
--
ALTER TABLE `content`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `korzina`
--
ALTER TABLE `korzina`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `novosti`
--
ALTER TABLE `novosti`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `otzivi`
--
ALTER TABLE `otzivi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `zakazi`
--
ALTER TABLE `zakazi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `zakzvon`
--
ALTER TABLE `zakzvon`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `korzina`
--
ALTER TABLE `korzina`
  ADD CONSTRAINT `korzina_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `korzina_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Ограничения внешнего ключа таблицы `otzivi`
--
ALTER TABLE `otzivi`
  ADD CONSTRAINT `otzivi_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `otzivi_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Ограничения внешнего ключа таблицы `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Ограничения внешнего ключа таблицы `zakazi`
--
ALTER TABLE `zakazi`
  ADD CONSTRAINT `zakazi_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
