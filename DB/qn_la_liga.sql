-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-11-2019 a las 14:26:24
-- Versión del servidor: 10.1.31-MariaDB
-- Versión de PHP: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `qn_la_liga`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `qn_football_pool`
--

CREATE TABLE `qn_football_pool` (
  `id` int(11) NOT NULL,
  `score_home` int(11) NOT NULL,
  `score_visit` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `match_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `qn_match`
--

CREATE TABLE `qn_match` (
  `id` int(11) NOT NULL,
  `id_team_home` int(11) NOT NULL,
  `id_team_visit` int(11) NOT NULL,
  `fixture` int(11) NOT NULL,
  `match_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `qn_result`
--

CREATE TABLE `qn_result` (
  `id` int(11) NOT NULL,
  `score_home` int(11) NOT NULL,
  `score_visit` int(11) NOT NULL,
  `match_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `qn_rol`
--

CREATE TABLE `qn_rol` (
  `id` int(11) NOT NULL,
  `rol` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `qn_rol`
--

INSERT INTO `qn_rol` (`id`, `rol`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `qn_scorer`
--

CREATE TABLE `qn_scorer` (
  `id` int(11) NOT NULL,
  `points` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `qn_standing`
--

CREATE TABLE `qn_standing` (
  `id` int(11) NOT NULL,
  `team_id` int(11) NOT NULL,
  `points` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `qn_team`
--

CREATE TABLE `qn_team` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `qn_user`
--

CREATE TABLE `qn_user` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `dni` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `created` datetime NOT NULL,
  `rol_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `qn_football_pool`
--
ALTER TABLE `qn_football_pool`
  ADD PRIMARY KEY (`id`),
  ADD KEY `match_id` (`match_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indices de la tabla `qn_match`
--
ALTER TABLE `qn_match`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_team_home` (`id_team_home`),
  ADD KEY `id_team_visit` (`id_team_visit`),
  ADD KEY `fixture` (`fixture`),
  ADD KEY `match_date` (`match_date`);

--
-- Indices de la tabla `qn_result`
--
ALTER TABLE `qn_result`
  ADD PRIMARY KEY (`id`),
  ADD KEY `match_id` (`match_id`);

--
-- Indices de la tabla `qn_rol`
--
ALTER TABLE `qn_rol`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `qn_scorer`
--
ALTER TABLE `qn_scorer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indices de la tabla `qn_standing`
--
ALTER TABLE `qn_standing`
  ADD PRIMARY KEY (`id`),
  ADD KEY `team_id` (`team_id`);

--
-- Indices de la tabla `qn_team`
--
ALTER TABLE `qn_team`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `name` (`name`);

--
-- Indices de la tabla `qn_user`
--
ALTER TABLE `qn_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dni` (`dni`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `rol_id` (`rol_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `qn_football_pool`
--
ALTER TABLE `qn_football_pool`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `qn_match`
--
ALTER TABLE `qn_match`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `qn_result`
--
ALTER TABLE `qn_result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `qn_rol`
--
ALTER TABLE `qn_rol`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `qn_scorer`
--
ALTER TABLE `qn_scorer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `qn_standing`
--
ALTER TABLE `qn_standing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `qn_team`
--
ALTER TABLE `qn_team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `qn_user`
--
ALTER TABLE `qn_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `qn_football_pool`
--
ALTER TABLE `qn_football_pool`
  ADD CONSTRAINT `qn_football_pool_ibfk_1` FOREIGN KEY (`match_id`) REFERENCES `qn_match` (`id`),
  ADD CONSTRAINT `qn_football_pool_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `qn_user` (`id`);

--
-- Filtros para la tabla `qn_match`
--
ALTER TABLE `qn_match`
  ADD CONSTRAINT `qn_match_ibfk_1` FOREIGN KEY (`id_team_home`) REFERENCES `qn_team` (`id`),
  ADD CONSTRAINT `qn_match_ibfk_2` FOREIGN KEY (`id_team_visit`) REFERENCES `qn_team` (`id`);

--
-- Filtros para la tabla `qn_result`
--
ALTER TABLE `qn_result`
  ADD CONSTRAINT `qn_result_ibfk_1` FOREIGN KEY (`match_id`) REFERENCES `qn_match` (`id`);

--
-- Filtros para la tabla `qn_scorer`
--
ALTER TABLE `qn_scorer`
  ADD CONSTRAINT `qn_scorer_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `qn_user` (`id`);

--
-- Filtros para la tabla `qn_standing`
--
ALTER TABLE `qn_standing`
  ADD CONSTRAINT `qn_standing_ibfk_1` FOREIGN KEY (`team_id`) REFERENCES `qn_team` (`id`);

--
-- Filtros para la tabla `qn_user`
--
ALTER TABLE `qn_user`
  ADD CONSTRAINT `qn_user_ibfk_1` FOREIGN KEY (`rol_id`) REFERENCES `qn_rol` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
