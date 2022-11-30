-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 192.168.4.20
-- Generation Time: Nov 30, 2022 at 02:10 AM
-- Server version: 10.6.10-MariaDB
-- PHP Version: 7.4.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `A2022_tcurihual`
--

-- --------------------------------------------------------

--
-- Table structure for table `comentarios`
--

CREATE TABLE `comentarios` (
  `ID_Publicacion` int(11) DEFAULT NULL,
  `ID_Comentario` int(11) NOT NULL,
  `Nombre_Usuario` varchar(35) DEFAULT NULL,
  `Comentario` varchar(255) DEFAULT NULL,
  `Fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cuenta`
--

CREATE TABLE `cuenta` (
  `ID_Cuenta` int(11) NOT NULL,
  `Nombre` varchar(45) DEFAULT NULL,
  `Apellido` varchar(45) DEFAULT NULL,
  `Fecha_Nacimiento` date DEFAULT NULL,
  `Genero` enum('Hombre','Mujer','No Especifica') NOT NULL,
  `Correo` varchar(45) DEFAULT NULL,
  `Contrasena` varchar(255) DEFAULT NULL,
  `Num_Contacto` varchar(15) DEFAULT NULL,
  `Tipo_usuario` enum('Arrendador','Estudiante') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `favoritos`
--

CREATE TABLE `favoritos` (
  `ID_Cuenta` int(11) DEFAULT NULL,
  `ID_Favorito` int(11) NOT NULL,
  `ID_Publicacion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `publicacion`
--

CREATE TABLE `publicacion` (
  `ID_Cuenta` int(11) DEFAULT NULL,
  `ID_Publicacion` int(11) NOT NULL,
  `Titulo_Arriendo` varchar(255) DEFAULT NULL,
  `Direccion` varchar(50) DEFAULT NULL,
  `Num_Depto` int(4) DEFAULT NULL,
  `Tipo_Arriendo` enum('Departamento','Casa','Habitacion') DEFAULT NULL,
  `Cant_Habitaciones` int(5) DEFAULT NULL,
  `Descripcion` varchar(255) DEFAULT NULL,
  `Valor` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `soporte`
--

CREATE TABLE `soporte` (
  `ID_Soporte` int(11) NOT NULL,
  `Nombre` varchar(60) DEFAULT NULL,
  `Correo` varchar(45) DEFAULT NULL,
  `Motivo` varchar(255) DEFAULT NULL,
  `Asunto` varchar(255) DEFAULT NULL,
  `Mensaje` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`ID_Comentario`),
  ADD KEY `ID_Publicacion` (`ID_Publicacion`);

--
-- Indexes for table `cuenta`
--
ALTER TABLE `cuenta`
  ADD PRIMARY KEY (`ID_Cuenta`);

--
-- Indexes for table `favoritos`
--
ALTER TABLE `favoritos`
  ADD PRIMARY KEY (`ID_Favorito`),
  ADD KEY `ID_Cuenta` (`ID_Cuenta`),
  ADD KEY `favoritos_ibfk_1` (`ID_Publicacion`);

--
-- Indexes for table `publicacion`
--
ALTER TABLE `publicacion`
  ADD PRIMARY KEY (`ID_Publicacion`),
  ADD KEY `ID_Cuenta` (`ID_Cuenta`);

--
-- Indexes for table `soporte`
--
ALTER TABLE `soporte`
  ADD PRIMARY KEY (`ID_Soporte`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `ID_Comentario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cuenta`
--
ALTER TABLE `cuenta`
  MODIFY `ID_Cuenta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `favoritos`
--
ALTER TABLE `favoritos`
  MODIFY `ID_Favorito` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `publicacion`
--
ALTER TABLE `publicacion`
  MODIFY `ID_Publicacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `soporte`
--
ALTER TABLE `soporte`
  MODIFY `ID_Soporte` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`ID_Publicacion`) REFERENCES `publicacion` (`ID_Publicacion`);

--
-- Constraints for table `favoritos`
--
ALTER TABLE `favoritos`
  ADD CONSTRAINT `favoritos_ibfk_1` FOREIGN KEY (`ID_Publicacion`) REFERENCES `publicacion` (`ID_Publicacion`),
  ADD CONSTRAINT `favoritos_ibfk_2` FOREIGN KEY (`ID_Cuenta`) REFERENCES `cuenta` (`ID_Cuenta`);

--
-- Constraints for table `publicacion`
--
ALTER TABLE `publicacion`
  ADD CONSTRAINT `publicacion_ibfk_1` FOREIGN KEY (`ID_Cuenta`) REFERENCES `cuenta` (`ID_Cuenta`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
