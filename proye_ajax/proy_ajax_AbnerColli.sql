-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-11-2016 a las 09:34:26
-- Versión del servidor: 10.1.9-MariaDB
-- Versión de PHP: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proy_ajax`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evaluations`
--

CREATE TABLE `evaluations` (
  `person_id` int(11) NOT NULL,
  `indicator_id` int(11) NOT NULL,
  `option_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `indicators`
--

CREATE TABLE `indicators` (
  `id` int(11) NOT NULL,
  `name` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `indicator_options`
--

CREATE TABLE `indicator_options` (
  `id` int(11) NOT NULL,
  `option_name` varchar(120) NOT NULL,
  `indicator_id` int(11) NOT NULL,
  `times` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persons`
--

CREATE TABLE `persons` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `last_name` varchar(150) NOT NULL,
  `mother_last_name` varchar(150) NOT NULL,
  `father_id` int(11) DEFAULT NULL,
  `mother_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `email`) VALUES
(1, 'Juan Ucan', 'juan123', 'ju_juan@hotmail.com'),
(2, 'Admin', 'admin123', 'admin@admin.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `evaluations`
--
ALTER TABLE `evaluations`
  ADD KEY `option_id` (`option_id`),
  ADD KEY `indicator_id` (`indicator_id`),
  ADD KEY `person_id` (`person_id`);

--
-- Indices de la tabla `indicators`
--
ALTER TABLE `indicators`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indices de la tabla `indicator_options`
--
ALTER TABLE `indicator_options`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `indicator_id` (`indicator_id`);

--
-- Indices de la tabla `persons`
--
ALTER TABLE `persons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `father_id` (`father_id`),
  ADD KEY `father_id_2` (`father_id`),
  ADD KEY `mother_id` (`mother_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `indicators`
--
ALTER TABLE `indicators`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;
--
-- AUTO_INCREMENT de la tabla `indicator_options`
--
ALTER TABLE `indicator_options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
--
-- AUTO_INCREMENT de la tabla `persons`
--
ALTER TABLE `persons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `evaluations`
--
ALTER TABLE `evaluations`
  ADD CONSTRAINT `evaluations_ibfk_1` FOREIGN KEY (`person_id`) REFERENCES `persons` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `evaluations_ibfk_2` FOREIGN KEY (`indicator_id`) REFERENCES `indicators` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `evaluations_ibfk_3` FOREIGN KEY (`option_id`) REFERENCES `indicator_options` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `indicator_options`
--
ALTER TABLE `indicator_options`
  ADD CONSTRAINT `indicator_options_ibfk_1` FOREIGN KEY (`indicator_id`) REFERENCES `indicators` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `persons`
--
ALTER TABLE `persons`
  ADD CONSTRAINT `persons_ibfk_1` FOREIGN KEY (`father_id`) REFERENCES `persons` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `persons_ibfk_2` FOREIGN KEY (`mother_id`) REFERENCES `persons` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
