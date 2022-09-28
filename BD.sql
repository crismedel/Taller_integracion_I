-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-09-2022 a las 19:20:23
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `test`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `arrendador`
--

CREATE TABLE `arrendador` (
  `ID_Cuenta` int(11) DEFAULT NULL,
  `Rut_Arrendador` int(9) NOT NULL,
  `Nombre` char(45) DEFAULT NULL,
  `Apellidos` char(45) DEFAULT NULL,
  `Edad` int(2) DEFAULT NULL,
  `Genero` enum('Hombre','Mujer') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `arrendador`
--

INSERT INTO `arrendador` (`ID_Cuenta`, `Rut_Arrendador`, `Nombre`, `Apellidos`, `Edad`, `Genero`) VALUES
(2, 212576360, 'Cristobal', 'Medel Campos', 19, 'Hombre');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `arriendo`
--

CREATE TABLE `arriendo` (
  `ID_Arriendo` int(11) NOT NULL,
  `Rut_Arrendador` int(9) DEFAULT NULL,
  `Direccion` char(50) DEFAULT NULL,
  `Num_Depto` int(4) DEFAULT NULL,
  `Tipo_Arriendo` char(30) DEFAULT NULL,
  `Valor` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `arriendo`
--

INSERT INTO `arriendo` (`ID_Arriendo`, `Rut_Arrendador`, `Direccion`, `Num_Depto`, `Tipo_Arriendo`, `Valor`) VALUES
(1, 212576360, 'av.alemania 1234', NULL, 'pension', 250000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuenta`
--

CREATE TABLE `cuenta` (
  `ID_Cuenta` int(11) NOT NULL,
  `Nombre_Usuario` char(35) DEFAULT NULL,
  `Correo` char(45) DEFAULT NULL,
  `Contraseña` char(16) DEFAULT NULL,
  `Num_Contacto` int(9) DEFAULT NULL,
  `Tipo_usuario` enum('Arrendador','Estudiante') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cuenta`
--

INSERT INTO `cuenta` (`ID_Cuenta`, `Nombre_Usuario`, `Correo`, `Contraseña`, `Num_Contacto`, `Tipo_usuario`) VALUES
(1, 'Cris', 'cmedel2021@alu.uct.cl', '12345', 123456789, 'Estudiante'),
(2, 'Cris2', 'cmedel2021@alu.uct.cl', '12345', 123456789, 'Arrendador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

CREATE TABLE `estudiante` (
  `ID_Cuenta` int(11) DEFAULT NULL,
  `Rut_Estudiante` int(9) NOT NULL,
  `Nombre` char(45) DEFAULT NULL,
  `Apellidos` char(45) DEFAULT NULL,
  `Edad` int(2) DEFAULT NULL,
  `Genero` enum('Hombre','Mujer') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estudiante`
--

INSERT INTO `estudiante` (`ID_Cuenta`, `Rut_Estudiante`, `Nombre`, `Apellidos`, `Edad`, `Genero`) VALUES
(1, 212576360, 'Cristobal', 'Medel Campos', 19, 'Hombre');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `favoritos`
--

CREATE TABLE `favoritos` (
  `Rut_Estudiante` int(9) DEFAULT NULL,
  `ID_Favorito` int(11) NOT NULL,
  `ID_Arriendo` int(11) DEFAULT NULL,
  `Direccion` char(50) DEFAULT NULL,
  `Num_Depto` int(4) DEFAULT NULL,
  `Tipo_Arriendo` char(30) DEFAULT NULL,
  `Valor` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `favoritos`
--

INSERT INTO `favoritos` (`Rut_Estudiante`, `ID_Favorito`, `ID_Arriendo`, `Direccion`, `Num_Depto`, `Tipo_Arriendo`, `Valor`) VALUES
(212576360, 1, 1, 'av.alemania 1234', NULL, 'pension', 250000);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `arrendador`
--
ALTER TABLE `arrendador`
  ADD PRIMARY KEY (`Rut_Arrendador`);

--
-- Indices de la tabla `arriendo`
--
ALTER TABLE `arriendo`
  ADD PRIMARY KEY (`ID_Arriendo`),
  ADD KEY `Rut_Arrendador` (`Rut_Arrendador`);

--
-- Indices de la tabla `cuenta`
--
ALTER TABLE `cuenta`
  ADD PRIMARY KEY (`ID_Cuenta`);

--
-- Indices de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD PRIMARY KEY (`Rut_Estudiante`),
  ADD KEY `ID_Cuenta` (`ID_Cuenta`);

--
-- Indices de la tabla `favoritos`
--
ALTER TABLE `favoritos`
  ADD PRIMARY KEY (`ID_Favorito`),
  ADD KEY `Rut_Estudiante` (`Rut_Estudiante`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `arriendo`
--
ALTER TABLE `arriendo`
  MODIFY `ID_Arriendo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `cuenta`
--
ALTER TABLE `cuenta`
  MODIFY `ID_Cuenta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `favoritos`
--
ALTER TABLE `favoritos`
  MODIFY `ID_Favorito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `favoritos`
--
ALTER TABLE `favoritos`
  ADD CONSTRAINT `favoritos_ibfk_1` FOREIGN KEY (`Rut_Estudiante`) REFERENCES `estudiante` (`Rut_Estudiante`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
