-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 12-11-2022 a las 20:55:22
-- Versión del servidor: 8.0.21-0ubuntu0.20.04.4
-- Versión de PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `teatros`
--
CREATE DATABASE IF NOT EXISTS `teatros` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `teatros`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entradas`
--

CREATE TABLE `entradas` (
  `idSesion` smallint UNSIGNED NOT NULL,
  `fila` smallint UNSIGNED NOT NULL,
  `columna` smallint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `entradas`
--

INSERT INTO `entradas` (`idSesion`, `fila`, `columna`) VALUES
(1, 1, 1),
(1, 1, 2),
(1, 1, 3),
(1, 1, 4),
(1, 1, 5),
(1, 1, 6),
(1, 1, 7),
(1, 1, 8),
(1, 1, 9),
(1, 1, 10),
(1, 1, 11),
(1, 1, 12),
(1, 1, 13),
(1, 1, 14),
(1, 1, 15),
(1, 1, 16),
(1, 1, 17),
(1, 1, 18),
(1, 1, 19),
(1, 1, 20),
(1, 2, 1),
(1, 2, 2),
(1, 2, 3),
(1, 2, 4),
(1, 2, 5),
(1, 2, 8),
(1, 2, 11),
(1, 3, 1),
(1, 3, 2),
(1, 3, 3),
(1, 3, 4),
(1, 3, 5),
(1, 3, 9),
(1, 3, 11),
(1, 3, 16),
(1, 3, 17),
(1, 4, 10),
(1, 4, 11),
(1, 4, 13),
(1, 4, 14),
(1, 4, 15),
(1, 4, 16),
(1, 4, 17),
(1, 4, 18),
(1, 4, 19),
(1, 5, 0),
(1, 5, 2),
(1, 5, 8),
(1, 5, 9),
(1, 5, 10),
(1, 5, 11),
(1, 5, 13),
(1, 5, 14),
(1, 5, 15),
(1, 5, 16),
(1, 5, 17),
(1, 6, 3),
(1, 6, 6),
(1, 6, 9),
(1, 6, 10),
(1, 6, 11),
(1, 6, 12),
(1, 7, 5),
(1, 7, 11),
(1, 7, 13),
(1, 7, 16),
(1, 7, 17),
(1, 8, 3),
(1, 8, 5),
(1, 8, 11),
(1, 8, 14),
(1, 9, 2),
(1, 9, 5),
(1, 9, 6),
(1, 9, 8),
(1, 9, 11),
(1, 9, 15),
(1, 10, 1),
(1, 10, 2),
(1, 10, 3),
(1, 10, 4),
(1, 10, 5),
(1, 10, 6),
(1, 10, 7),
(1, 10, 8),
(1, 10, 9),
(1, 10, 11),
(1, 10, 16),
(1, 10, 19),
(1, 10, 20),
(2, 1, 1),
(2, 1, 2),
(2, 1, 3),
(2, 1, 4),
(2, 1, 5),
(2, 1, 6),
(2, 1, 7),
(2, 1, 8),
(2, 1, 9),
(2, 1, 10),
(2, 1, 11),
(2, 1, 12),
(2, 1, 13),
(2, 1, 14),
(2, 2, 0),
(2, 2, 1),
(2, 2, 2),
(2, 2, 3),
(2, 2, 4),
(2, 2, 5),
(2, 2, 6),
(2, 2, 7),
(2, 2, 8),
(2, 2, 9),
(2, 2, 10),
(2, 2, 11),
(2, 2, 12),
(2, 2, 13),
(2, 3, 1),
(2, 3, 2),
(2, 3, 3),
(2, 3, 7),
(2, 3, 8),
(2, 9, 1),
(2, 9, 2),
(2, 9, 3),
(2, 9, 4),
(3, 1, 1),
(3, 1, 2),
(3, 2, 1),
(3, 2, 2),
(4, 1, 1),
(4, 1, 2),
(4, 2, 1),
(4, 2, 2),
(5, 1, 1),
(5, 1, 2),
(5, 1, 8),
(5, 1, 9),
(5, 1, 20),
(5, 2, 1),
(5, 2, 2),
(5, 2, 3),
(5, 2, 20),
(5, 3, 2),
(5, 3, 5),
(5, 4, 13),
(5, 4, 14),
(5, 5, 4),
(5, 5, 8),
(5, 5, 10),
(5, 5, 13),
(5, 5, 14),
(5, 6, 6),
(5, 6, 9),
(5, 6, 13),
(5, 6, 14),
(5, 7, 3),
(5, 7, 13),
(5, 7, 14),
(5, 9, 4),
(5, 9, 18),
(5, 9, 19),
(5, 9, 20),
(5, 10, 1),
(5, 10, 2),
(5, 10, 19),
(5, 10, 20),
(5, 13, 9),
(5, 14, 9),
(5, 19, 9),
(5, 19, 10),
(5, 20, 9),
(5, 20, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sesiones`
--

CREATE TABLE `sesiones` (
  `teatro` smallint UNSIGNED NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `idSesion` smallint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sesiones`
--

INSERT INTO `sesiones` (`teatro`, `fecha`, `hora`, `idSesion`) VALUES
(1, '2022-12-28', '20:30:00', 1),
(2, '2022-02-28', '18:00:00', 2),
(3, '2023-03-29', '20:30:00', 3),
(3, '2023-02-28', '21:00:00', 4),
(1, '2022-12-15', '21:00:00', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `teatros`
--

CREATE TABLE `teatros` (
  `idTeatro` smallint UNSIGNED NOT NULL,
  `Ciudad` varchar(50) NOT NULL,
  `teatro` varchar(100) NOT NULL,
  `filas` smallint UNSIGNED NOT NULL,
  `columnas` smallint UNSIGNED NOT NULL,
  `imagen` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `teatros`
--

INSERT INTO `teatros` (`idTeatro`, `Ciudad`, `teatro`, `filas`, `columnas`, `imagen`) VALUES
(1, 'Córdoba', 'Gran Teatro', 10, 20, 'GranTeatro.jpg'),
(2, 'Córdoba', 'Góngora', 10, 15, 'Gongora.jpg'),
(3, 'Córdoba', 'Axerquia', 2, 2, 'Axerquia.jpg'),
(4, 'Córdoba', 'Avanti', 10, 10, 'Avanti.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `entradas`
--
ALTER TABLE `entradas`
  ADD PRIMARY KEY (`idSesion`,`fila`,`columna`),
  ADD KEY `idSesion` (`idSesion`,`fila`,`columna`),
  ADD KEY `idSesion_2` (`idSesion`,`fila`,`columna`);

--
-- Indices de la tabla `sesiones`
--
ALTER TABLE `sesiones`
  ADD PRIMARY KEY (`idSesion`),
  ADD KEY `teatro` (`teatro`);

--
-- Indices de la tabla `teatros`
--
ALTER TABLE `teatros`
  ADD PRIMARY KEY (`idTeatro`),
  ADD KEY `idCiudad` (`Ciudad`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `sesiones`
--
ALTER TABLE `sesiones`
  MODIFY `idSesion` smallint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `teatros`
--
ALTER TABLE `teatros`
  MODIFY `idTeatro` smallint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `entradas`
--
ALTER TABLE `entradas`
  ADD CONSTRAINT `entradas_ibfk_1` FOREIGN KEY (`idSesion`) REFERENCES `sesiones` (`idSesion`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `sesiones`
--
ALTER TABLE `sesiones`
  ADD CONSTRAINT `sesiones_ibfk_1` FOREIGN KEY (`teatro`) REFERENCES `teatros` (`idTeatro`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
