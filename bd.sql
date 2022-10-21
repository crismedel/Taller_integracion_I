-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-10-2022 a las 06:45:50
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
-- Base de datos: `pagina_web`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `arriendo`
--

CREATE TABLE `arriendo` (
  `ID_Arriendo` int(11) NOT NULL,
  `Rut_Arrendador` int(9) DEFAULT NULL,
  `ID_Publicacion` int(11) DEFAULT NULL,
  `Direccion` char(50) DEFAULT NULL,
  `Num_Depto` int(4) DEFAULT NULL,
  `Tipo_Arriendo` char(30) DEFAULT NULL,
  `Valor` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `favoritos`
--

CREATE TABLE `favoritos` (
  `Rut_Estudiante` int(9) DEFAULT NULL,
  `ID_Favorito` int(11) NOT NULL,
  `ID_Publicacion` int(11) DEFAULT NULL,
  `Direccion` char(50) DEFAULT NULL,
  `Num_Depto` int(4) DEFAULT NULL,
  `Tipo_Arriendo` char(30) DEFAULT NULL,
  `Valor` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicacion`
--

CREATE TABLE `publicacion` (
  `ID_Cuenta` int(11) DEFAULT NULL,
  `ID_Publicacion` int(11) NOT NULL,
  `Direccion` char(50) DEFAULT NULL,
  `Num_Depto` int(4) DEFAULT NULL,
  `Tipo_Arriendo` char(30) DEFAULT NULL,
  `Valor` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `arrendador`
--
ALTER TABLE `arrendador`
  ADD PRIMARY KEY (`Rut_Arrendador`),
  ADD KEY `ID_Cuenta` (`ID_Cuenta`);

--
-- Indices de la tabla `arriendo`
--
ALTER TABLE `arriendo`
  ADD PRIMARY KEY (`ID_Arriendo`),
  ADD KEY `ID_Publicacion` (`ID_Publicacion`),
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
  ADD KEY `ID_Publicacion` (`ID_Publicacion`),
  ADD KEY `Rut_Estudiante` (`Rut_Estudiante`);

--
-- Indices de la tabla `publicacion`
--
ALTER TABLE `publicacion`
  ADD PRIMARY KEY (`ID_Publicacion`),
  ADD KEY `ID_Cuenta` (`ID_Cuenta`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `arriendo`
--
ALTER TABLE `arriendo`
  MODIFY `ID_Arriendo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cuenta`
--
ALTER TABLE `cuenta`
  MODIFY `ID_Cuenta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `favoritos`
--
ALTER TABLE `favoritos`
  MODIFY `ID_Favorito` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `publicacion`
--
ALTER TABLE `publicacion`
  MODIFY `ID_Publicacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `arrendador`
--
ALTER TABLE `arrendador`
  ADD CONSTRAINT `arrendador_ibfk_1` FOREIGN KEY (`ID_Cuenta`) REFERENCES `cuenta` (`ID_Cuenta`);

--
-- Filtros para la tabla `arriendo`
--
ALTER TABLE `arriendo`
  ADD CONSTRAINT `arriendo_ibfk_1` FOREIGN KEY (`ID_Publicacion`) REFERENCES `publicacion` (`ID_Publicacion`),
  ADD CONSTRAINT `arriendo_ibfk_2` FOREIGN KEY (`Rut_Arrendador`) REFERENCES `arrendador` (`Rut_Arrendador`);

--
-- Filtros para la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD CONSTRAINT `estudiante_ibfk_1` FOREIGN KEY (`ID_Cuenta`) REFERENCES `cuenta` (`ID_Cuenta`);

--
-- Filtros para la tabla `favoritos`
--
ALTER TABLE `favoritos`
  ADD CONSTRAINT `favoritos_ibfk_1` FOREIGN KEY (`ID_Publicacion`) REFERENCES `publicacion` (`ID_Publicacion`),
  ADD CONSTRAINT `favoritos_ibfk_2` FOREIGN KEY (`Rut_Estudiante`) REFERENCES `estudiante` (`Rut_Estudiante`);

--
-- Filtros para la tabla `publicacion`
--
ALTER TABLE `publicacion`
  ADD CONSTRAINT `publicacion_ibfk_1` FOREIGN KEY (`ID_Cuenta`) REFERENCES `cuenta` (`ID_Cuenta`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
