GRANT ALL PRIVILEGES ON *.* TO `dwes`@`localhost` IDENTIFIED BY PASSWORD '*559CC1EBF0E7C1F7A4EEDE8093C3F69A316DACB4' WITH GRANT OPTION;

GRANT SELECT, INSERT, UPDATE, DELETE ON `f2learn`.* TO `dwes`@`localhost`;
-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 13-02-2022 a las 10:47:45
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `f2learn`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

CREATE TABLE `articulos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `precio` int(11) NOT NULL,
  `fecha_caducidad` datetime NOT NULL,
  `imagen` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `articulos`
--

INSERT INTO `articulos` (`id`, `nombre`, `precio`, `fecha_caducidad`, `imagen`, `descripcion`, `usuario`) VALUES
(13, 'Libros', 25, '2022-05-27 00:00:00', 'libros.jpg', 'Pack de libros', 1),
(16, 'Festival', 25, '2022-02-19 00:00:00', 'evento3.jpg', 'Música por la noche', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `assessments`
--

CREATE TABLE `assessments` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `assessments`
--

INSERT INTO `assessments` (`id`, `name`) VALUES
(1, 'Yes'),
(2, 'No');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `date` datetime DEFAULT current_timestamp(),
  `title` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `description` text COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `blog`
--

INSERT INTO `blog` (`id`, `image`, `date`, `title`, `description`) VALUES
(1, 'pic1.jpg', '2021-01-14 12:40:54', 'This Story Behind Education Will Haunt You Forever.', 'It is used every day in all types of businesses; Email newsletters, websites, print and online advertisements, presentations, social media updates, flyers, and brochures; the list goes on and on\r\n\r\nDavid Ogilvy, the advertising legend once said that, On average, five times as many people read the headline as read the body copy. When you have written your headline, you have spent eighty cents out of your dollar.\" As Ogilvy points out, your headline is the first (and sometimes the only) thing that your audience will read.\r\n\r\nYou just need to enter the keyword and select the keyword type to generate a list of 6 title ideas and suggestions. If you’re not satisfied with the results, you can always hit the refresh button to generate a new list of unique titles.\r\n\r\nOnce you’ve gotten all the titles and have chosen the best one, the next thing you need to do is to craft a magnetic content. Great content marketers excel at creating content that their readers crave, but even the best struggle with delivering content to the right person at the right time.'),
(2, 'pic2.jpg', '2021-03-07 12:40:54', 'What Will Education Be Like In The Next 50 Years?', 'It is used every day in all types of businesses; Email newsletters, websites, print and online advertisements, presentations, social media updates, flyers, and brochures; the list goes on and on\r\n\r\nDavid Ogilvy, the advertising legend once said that, On average, five times as many people read the headline as read the body copy. When you have written your headline, you have spent eighty cents out of your dollar.\" As Ogilvy points out, your headline is the first (and sometimes the only) thing that your audience will read.\r\n\r\nYou just need to enter the keyword and select the keyword type to generate a list of 6 title ideas and suggestions. If you’re not satisfied with the results, you can always hit the refresh button to generate a new list of unique titles.\r\n\r\nOnce you’ve gotten all the titles and have chosen the best one, the next thing you need to do is to craft a magnetic content. Great content marketers excel at creating content that their readers crave, but even the best struggle with delivering content to the right person at the right time.'),
(3, 'pic3.jpg', '2021-04-11 12:40:54', 'Master The Skills Of Education And Be.', 'It is used every day in all types of businesses; Email newsletters, websites, print and online advertisements, presentations, social media updates, flyers, and brochures; the list goes on and on\r\n\r\nDavid Ogilvy, the advertising legend once said that, On average, five times as many people read the headline as read the body copy. When you have written your headline, you have spent eighty cents out of your dollar.\" As Ogilvy points out, your headline is the first (and sometimes the only) thing that your audience will read.\r\n\r\nYou just need to enter the keyword and select the keyword type to generate a list of 6 title ideas and suggestions. If you’re not satisfied with the results, you can always hit the refresh button to generate a new list of unique titles.\r\n\r\nOnce you’ve gotten all the titles and have chosen the best one, the next thing you need to do is to craft a magnetic content. Great content marketers excel at creating content that their readers crave, but even the best struggle with delivering content to the right person at the right time.'),
(4, 'pic4.jpg', '2021-06-18 12:40:54', 'Eliminate Your Fears And Doubts.', 'It is used every day in all types of businesses; Email newsletters, websites, print and online advertisements, presentations, social media updates, flyers, and brochures; the list goes on and on\r\n\r\nDavid Ogilvy, the advertising legend once said that, On average, five times as many people read the headline as read the body copy. When you have written your headline, you have spent eighty cents out of your dollar.\" As Ogilvy points out, your headline is the first (and sometimes the only) thing that your audience will read.\r\n\r\nYou just need to enter the keyword and select the keyword type to generate a list of 6 title ideas and suggestions. If you’re not satisfied with the results, you can always hit the refresh button to generate a new list of unique titles.\r\n\r\nOnce you’ve gotten all the titles and have chosen the best one, the next thing you need to do is to craft a magnetic content. Great content marketers excel at creating content that their readers crave, but even the best struggle with delivering content to the right person at the right time.'),
(5, 'pic5.jpg', '2021-08-21 12:40:54', 'Seven Reasons You Should Fall In Love With Education.', 'It is used every day in all types of businesses; Email newsletters, websites, print and online advertisements, presentations, social media updates, flyers, and brochures; the list goes on and on\r\n\r\nDavid Ogilvy, the advertising legend once said that, On average, five times as many people read the headline as read the body copy. When you have written your headline, you have spent eighty cents out of your dollar.\" As Ogilvy points out, your headline is the first (and sometimes the only) thing that your audience will read.\r\n\r\nYou just need to enter the keyword and select the keyword type to generate a list of 6 title ideas and suggestions. If you’re not satisfied with the results, you can always hit the refresh button to generate a new list of unique titles.\r\n\r\nOnce you’ve gotten all the titles and have chosen the best one, the next thing you need to do is to craft a magnetic content. Great content marketers excel at creating content that their readers crave, but even the best struggle with delivering content to the right person at the right time.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `numImages` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`id`, `name`, `numImages`) VALUES
(1, 'courses', 6),
(2, 'book', 4),
(3, 'education', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `phone` varchar(40) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `message` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `phone`, `subject`, `message`, `date`) VALUES
(7, 'Jorge Gómez Tortosa', 'gmzjordi@gmail.com', '123456789', 'Esto es un asunto de prueba', 'Esto es un mensaje de prueba también', '2021-11-20 19:12:58');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `description` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `duration` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `students` int(11) DEFAULT NULL,
  `price` int(11) NOT NULL,
  `language` int(11) DEFAULT NULL,
  `instructor` int(11) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `assessments` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `courses`
--

INSERT INTO `courses` (`id`, `title`, `image`, `description`, `duration`, `students`, `price`, `language`, `instructor`, `level`, `assessments`) VALUES
(1, 'Course 1', 'pic1.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. 1', '60', 6, 110, 1, 1, 1, 1),
(2, 'Course 2', 'pic2.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. 2', '40', 0, 360, 2, 1, 2, 2),
(3, 'Course 3', 'pic3.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. 3', '60', 0, 80, 2, 1, 1, 2),
(4, 'Course 4', 'pic4.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. 4', '80', 0, 90, 1, 1, 2, 1),
(5, 'Course 5', 'pic5.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. 5', '60', 0, 240, 1, 1, 2, 2),
(6, 'Course 6', 'pic6.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. 6', '60', 0, 90, 2, 1, 3, 1),
(7, 'Course 7', 'pic7.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. 7', '180', 0, 120, 1, 1, 3, 1),
(8, 'Course 8', 'pic8.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. 8', '60', 0, 160, 2, 1, 1, 2),
(9, 'Course 9', 'pic9.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. 9', '400', 0, 640, 1, 1, 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20220211112730', '2022-02-11 12:27:34', 63),
('DoctrineMigrations\\Version20220211113141', '2022-02-11 12:31:46', 521),
('DoctrineMigrations\\Version20220212092659', '2022-02-12 10:27:48', 25);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `description` text COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `category` int(11) NOT NULL,
  `numLikes` int(11) NOT NULL,
  `numDownloads` int(11) NOT NULL,
  `numVisualizations` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `images`
--

INSERT INTO `images` (`id`, `name`, `description`, `category`, `numLikes`, `numDownloads`, `numVisualizations`) VALUES
(1, 'image_1.jpg', 'Description image 1', 2, 35, 17, 50),
(2, 'image_2.jpg', 'Description image 2', 1, 23, 5, 41),
(3, 'image_3.jpg', 'Description image 3', 3, 15, 2, 40),
(4, 'image_4.jpg', 'Description image 4', 3, 33, 23, 44),
(5, 'image_5.jpg', 'Description image 5', 2, 12, 2, 26),
(6, 'image_6.jpg', 'Description image 6', 1, 12, 4, 24),
(7, 'image_7.jpg', 'Description image 7', 3, 13, 7, 26),
(8, 'image_8.jpg', 'Description image 8', 1, 26, 7, 48),
(9, 'image_9.jpg', 'Description image 9', 3, 44, 18, 62),
(10, 'image_10.jpg', 'Description image 10', 2, 3, 0, 11),
(11, 'image_11.jpg', 'Description image 11', 3, 14, 6, 29),
(12, 'image_12.jpg', 'Description image 12', 1, 21, 16, 54);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscriptions`
--

CREATE TABLE `inscriptions` (
  `id` int(11) NOT NULL,
  `student` int(11) DEFAULT NULL,
  `course` int(11) DEFAULT NULL,
  `date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `languages`
--

CREATE TABLE `languages` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `languages`
--

INSERT INTO `languages` (`id`, `name`) VALUES
(1, 'English'),
(2, 'Spanish');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `levels`
--

CREATE TABLE `levels` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `levels`
--

INSERT INTO `levels` (`id`, `name`) VALUES
(1, 'Beginner'),
(2, 'Intermediate'),
(3, 'Advanced');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partners`
--

CREATE TABLE `partners` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `description` text COLLATE utf8mb4_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `partners`
--

INSERT INTO `partners` (`id`, `name`, `logo`, `description`) VALUES
(1, 'Partner 1', 'logo1.png', 'Description partner 1'),
(2, 'Partner 2', 'logo2.png', 'Description partner 2'),
(3, 'Partner 3', 'logo3.png', 'Description partner 3'),
(4, 'Partner 4', 'logo4.png', 'Description partner 4'),
(5, 'Partner 5', 'logo5.png', 'Description partner 5'),
(6, 'Partner 6', 'logo6.png', 'Description partner 6');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `roles` longtext COLLATE utf8_spanish_ci NOT NULL COMMENT '(DC2Type:json)',
  `is_verified` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `image`, `username`, `password`, `roles`, `is_verified`) VALUES
(1, 'Admin', 'f2learn.education@gmail.com', 'pic1.jpg', 'admin', '$2y$13$0ERyKYvh0ZU0sbPRlBrxEe97.BR0Ny.bU8r0h9wBFJ9fbjiVjj52a', '[\"ROLE_ADMIN\"]', 1),
(2, 'Jordi', 'gmzjordi@gmail.com', 'guest.jpg', 'jordi', '$2y$13$zXyxubFAsLYYLa.T8XOTDuLQu/VBRLe265J5Q3gOd4FeC5Zx.l.su', '[\"ROLE_USER\"]', 1),
(6, 'Jordi API', 'jordi@api.com', 'guest.jpg', 'jordiapi', '$2y$13$d9ntwjkTAVWhFqW3OJHVm.w2nghyp6pBENAGXmx7w7rs0JrK6Gkzu', '[\"ROLE_USER\"]', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_9C6F85973A909126` (`nombre`),
  ADD KEY `IDX_9C6F85972265B05D` (`usuario`);

--
-- Indices de la tabla `assessments`
--
ALTER TABLE `assessments`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_C01551432B36786B` (`title`);

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_A9A55A4C2B36786B` (`title`),
  ADD KEY `IDX_A9A55A4CD4DB71B5` (`language`),
  ADD KEY `IDX_A9A55A4C31FC43DD` (`instructor`),
  ADD KEY `IDX_A9A55A4C9AEACC13` (`level`),
  ADD KEY `IDX_A9A55A4C4BFCEC0A` (`assessments`);

--
-- Indices de la tabla `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Indices de la tabla `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_E01FBE6A5E237E06` (`name`),
  ADD KEY `IDX_E01FBE6A64C19C1` (`category`);

--
-- Indices de la tabla `inscriptions`
--
ALTER TABLE `inscriptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_course_inscription` (`course`),
  ADD KEY `fk_student_inscription` (`student`);

--
-- Indices de la tabla `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_EFEB51645E237E06` (`name`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_1483A5E9E7927C74F85E0677` (`email`,`username`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulos`
--
ALTER TABLE `articulos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `assessments`
--
ALTER TABLE `assessments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `inscriptions`
--
ALTER TABLE `inscriptions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `levels`
--
ALTER TABLE `levels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `partners`
--
ALTER TABLE `partners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD CONSTRAINT `FK_9C6F85972265B05D` FOREIGN KEY (`usuario`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `FK_A9A55A4C31FC43DD` FOREIGN KEY (`instructor`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `FK_A9A55A4C4BFCEC0A` FOREIGN KEY (`assessments`) REFERENCES `assessments` (`id`),
  ADD CONSTRAINT `FK_A9A55A4C9AEACC13` FOREIGN KEY (`level`) REFERENCES `levels` (`id`),
  ADD CONSTRAINT `FK_A9A55A4CD4DB71B5` FOREIGN KEY (`language`) REFERENCES `languages` (`id`);

--
-- Filtros para la tabla `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `fk_category_image` FOREIGN KEY (`category`) REFERENCES `categories` (`id`);

--
-- Filtros para la tabla `inscriptions`
--
ALTER TABLE `inscriptions`
  ADD CONSTRAINT `fk_course_inscription` FOREIGN KEY (`course`) REFERENCES `courses` (`id`),
  ADD CONSTRAINT `fk_student_inscription` FOREIGN KEY (`student`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
