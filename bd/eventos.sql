-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 24-01-2022 a las 20:42:48
-- Versión del servidor: 5.7.24
-- Versión de PHP: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `eventos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dias_trab`
--

CREATE TABLE `dias_trab` (
  `dias` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `dias_trab`
--

INSERT INTO `dias_trab` (`dias`) VALUES
(1),
(2),
(3),
(4),
(5),
(6),
(7),
(8),
(9),
(10),
(11),
(12),
(13),
(14),
(15),
(16),
(17),
(18),
(19),
(20),
(21),
(22),
(23),
(24),
(25),
(26),
(27),
(28),
(29),
(30),
(31);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventoscalendar`
--

CREATE TABLE `eventoscalendar` (
  `id` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `evento` varchar(250) DEFAULT NULL,
  `notas` varchar(150) DEFAULT NULL,
  `tipo_sol` varchar(150) DEFAULT NULL,
  `horas` varchar(50) DEFAULT '',
  `color_evento` varchar(20) DEFAULT NULL,
  `fecha_inicio` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sisparm`
--

CREATE TABLE `sisparm` (
  `id` int(11) NOT NULL,
  `sistema` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `sisparm`
--

INSERT INTO `sisparm` (`id`, `sistema`, `status`) VALUES
(106, 'CIDIMARQ', 1),
(107, 'OTROS', 1),
(108, 'SCB', 1),
(109, 'SGA', 1),
(110, 'SGV', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipparm`
--

CREATE TABLE `tipparm` (
  `id` int(11) NOT NULL,
  `tipo_sol` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `CODREQ` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tipparm`
--

INSERT INTO `tipparm` (`id`, `tipo_sol`, `CODREQ`) VALUES
(128, 'Requerimiento', 1),
(129, 'Incidencia', 3),
(130, 'Proyecto', 4),
(131, 'Mantenimiento', 5),
(132, 'Restauraciones', 6);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `eventoscalendar`
--
ALTER TABLE `eventoscalendar`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sisparm`
--
ALTER TABLE `sisparm`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipparm`
--
ALTER TABLE `tipparm`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `eventoscalendar`
--
ALTER TABLE `eventoscalendar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=216;

--
-- AUTO_INCREMENT de la tabla `sisparm`
--
ALTER TABLE `sisparm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT de la tabla `tipparm`
--
ALTER TABLE `tipparm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
