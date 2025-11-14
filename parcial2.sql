-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-11-2025 a las 17:50:20
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `parcial2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `area_interes`
--

CREATE TABLE `area_interes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `area_interes`
--

INSERT INTO `area_interes` (`id`, `nombre`) VALUES
(1, 'Desarrollo Web'),
(2, 'Ciberseguridad'),
(3, 'Base de Datos'),
(4, 'Inteligencia Artificial'),
(5, 'Redes'),
(6, 'Automatización'),
(7, 'Cloud Computing');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripto`
--

CREATE TABLE `inscripto` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `edad` int(11) NOT NULL,
  `sexo` varchar(20) NOT NULL,
  `pais_residencia` int(11) NOT NULL,
  `nacionalidad` varchar(100) NOT NULL,
  `tema_tecnologico` varchar(255) DEFAULT NULL,
  `correo` varchar(150) NOT NULL,
  `celular` varchar(50) DEFAULT NULL,
  `observaciones` text DEFAULT NULL,
  `fecha_formulario` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `inscripto`
--

INSERT INTO `inscripto` (`id`, `nombre`, `apellido`, `edad`, `sexo`, `pais_residencia`, `nacionalidad`, `tema_tecnologico`, `correo`, `celular`, `observaciones`, `fecha_formulario`) VALUES
(1, 'Luz', 'Gonzalez', 42, 'Otro', 6, 'Mexicana', 'Base de Datos,Redes', 'luzdelcarme@hotmail.com', '6558-2349', '', '2025-11-14 17:21:07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pais`
--

CREATE TABLE `pais` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pais`
--

INSERT INTO `pais` (`id`, `nombre`) VALUES
(1, 'Panamá'),
(2, 'Costa Rica'),
(3, 'Colombia'),
(4, 'México'),
(5, 'Argentina'),
(6, 'Chile'),
(7, 'España'),
(8, 'Estados Unidos');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `area_interes`
--
ALTER TABLE `area_interes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `inscripto`
--
ALTER TABLE `inscripto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pais` (`pais_residencia`);

--
-- Indices de la tabla `pais`
--
ALTER TABLE `pais`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `area_interes`
--
ALTER TABLE `area_interes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `inscripto`
--
ALTER TABLE `inscripto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `pais`
--
ALTER TABLE `pais`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `inscripto`
--
ALTER TABLE `inscripto`
  ADD CONSTRAINT `fk_pais` FOREIGN KEY (`pais_residencia`) REFERENCES `pais` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
