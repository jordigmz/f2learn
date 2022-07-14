GRANT USAGE ON *.* TO `dwes`@`localhost` IDENTIFIED BY PASSWORD '*559CC1EBF0E7C1F7A4EEDE8093C3F69A316DACB4';

GRANT SELECT, INSERT, UPDATE, DELETE ON `f2learn`.* TO `dwes`@`localhost`;
-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 22-11-2021 a las 12:55:23
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
  `fecha_caducidad` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `imagen` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `articulos`
--

INSERT INTO `articulos` (`id`, `nombre`, `precio`, `fecha_caducidad`, `imagen`, `descripcion`, `usuario`) VALUES
(1, 'Libros', 25, '2021-11-22', 'libros.jpg', 'Esto es una descripción del artículo Libros.', 4);

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
  `level` int(11) NOT NULL,
  `language` int(11) NOT NULL,
  `students` int(11) DEFAULT NULL,
  `assessments` int(11) NOT NULL,
  `instructor` varchar(255) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `courses`
--

INSERT INTO `courses` (`id`, `title`, `image`, `description`, `duration`, `level`, `language`, `students`, `assessments`, `instructor`, `price`) VALUES
(1, 'Course 1', 'pic1.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. 1', '60', 1, 1, 3, 1, 'Instructor 1', 110),
(2, 'Course 2', 'pic2.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. 2', '40', 3, 2, 12, 2, 'Instructor 1', 360),
(3, 'Course 3', 'pic3.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. 3', '60', 1, 1, 47, 1, 'Instructor 1', 80),
(4, 'Course 4', 'pic4.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. 4', '80', 2, 1, 15, 2, 'Instructor 1', 90),
(5, 'Course 5', 'pic5.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. 5', '60', 3, 2, 40, 1, 'Instructor 1', 240),
(6, 'Course 6', 'pic6.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. 6', '60', 1, 1, 1, 1, 'Instructor 1', 90),
(7, 'Course 7', 'pic7.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. 7', '180', 2, 2, 0, 2, 'Instructor 1', 120),
(8, 'Course 8', 'pic8.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. 8', '60', 3, 2, 5, 1, 'Instructor 1', 160),
(9, 'Course 9', 'pic9.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. 9', '400', 2, 1, 4, 1, 'Instructor 1', 640);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `description` text COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `category` int(11) NOT NULL,
  `numLikes` int(11) NOT NULL DEFAULT 0,
  `numDownloads` int(11) NOT NULL DEFAULT 0,
  `numVisualizations` int(11) NOT NULL DEFAULT 0
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
  `name` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `password`, `role`) VALUES
(4, 'Admin', 'f2learn.education@gmail.com', 'admin', '$2y$10$S0UaC4upP1hhHLLl3SYUZeP04768Fbk88dKUVpA/yixCh.WtBu3Au', 'ROLE_ADMIN'),
(5, 'Jordi', 'gmzjordi@gmail.com', 'jordi', '$2y$10$XDNFkEWNajBfZzQHt/PEreavVN/w4ea75WGxyqS9eka5z7DPaDhPu', 'ROLE_USER');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `articulo_nombre_uindex` (`nombre`),
  ADD KEY `FK_USUARIO_ARTICULO` (`usuario`);

--
-- Indices de la tabla `assessments`
--
ALTER TABLE `assessments`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

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
  ADD UNIQUE KEY `title` (`title`),
  ADD KEY `FK-LEVEL-COURSE` (`level`),
  ADD KEY `FK-LANGUAGE-COURSE` (`language`),
  ADD KEY `FK-ASSESSMENT-COURSE` (`assessments`);

--
-- Indices de la tabla `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `images_nombre_uindex` (`name`),
  ADD KEY `FK_CATEGORY_IMAGE` (`category`);

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
  ADD UNIQUE KEY `partners_logo_uindex` (`logo`),
  ADD UNIQUE KEY `partners_name_uindex` (`name`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_uindex` (`username`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulos`
--
ALTER TABLE `articulos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `assessments`
--
ALTER TABLE `assessments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD CONSTRAINT `FK_USUARIO_ARTICULO` FOREIGN KEY (`usuario`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `FK-ASSESSMENT-COURSE` FOREIGN KEY (`assessments`) REFERENCES `assessments` (`id`),
  ADD CONSTRAINT `FK-LANGUAGE-COURSE` FOREIGN KEY (`language`) REFERENCES `languages` (`id`),
  ADD CONSTRAINT `FK-LEVEL-COURSE` FOREIGN KEY (`level`) REFERENCES `levels` (`id`);

--
-- Filtros para la tabla `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `FK_CATEGORY_IMAGE` FOREIGN KEY (`category`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
