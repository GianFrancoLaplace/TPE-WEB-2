-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-10-2023 a las 16:57:09
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gimnasio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

CREATE TABLE `marcas` (
  `ID` int(11) NOT NULL,
  `Nombre` varchar(45) NOT NULL,
  `Descripcion` text NOT NULL,
  `Pais Origen` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `marcas`
--

INSERT INTO `marcas` (`ID`, `Nombre`, `Descripcion`, `Pais Origen`) VALUES
(1, 'Generation Fit', 'Generation Fit es una empresa de nutrición joven y con actitud. Ha llegado al mercado argentino con el apoyo de los principales distribuidores del mercado. Actualmente Generation Fit se encuentra en continua evolución y día a día mejora sus productos para satisfacer las necesidades de sus seguidores.', 'Argentina'),
(2, 'Gentech', 'Gentech Argentina fabrica Suplementos Naturales Deportivos para aumentar la masa muscular, mejorar el rendimiento y perder grasa rápidamente.\r\nGentech actualmente es el auspiciante oficial de la A.F.A. y sobresale en el mundo deportivo por su relación estrecha con el mundo del Crossfit.', 'Estados Unidos'),
(3, 'Optimum Nutrition', 'Es la marca más reconocida de los Estados Unidos. Sus productos tienen varios premium internacionales y se encuentran aprobados por la FDA en USA y por el ministerio de Salud de la República Argentina', 'Estados Unidos'),
(4, 'Star Nutrition', 'Actualmente Star Nutrition (Laboratorio Nutriciencia) es la marca de Suplementos Naturales más vendida de toda la Argentina.\r\nUtilizan materias primas importadas para fabricar sus productos. La marca se encuentra muy relacionada con el deporte a nivel profesional y llevan a cabo varios eventos nacionales.', 'Argentina'),
(5, 'HTN', 'Cualquiera que sea tu objetivo, desde mejorar tu performance, ganar masa muscular, correr tu primera maratón, romperla en tu clase de Crossfit, o simplemente, mejorar tu bienestar diario, la función de HTN Nutrition es apoyarte nutricionalmente en el proceso.', 'Estados Unidos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `ID` int(11) NOT NULL,
  `Nombre` varchar(45) NOT NULL,
  `Descripcion` text NOT NULL,
  `Precio` double NOT NULL,
  `Peso` double NOT NULL,
  `Categoria` varchar(45) NOT NULL,
  `ID_Marca` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`ID`, `Nombre`, `Descripcion`, `Precio`, `Peso`, `Categoria`, `ID_Marca`) VALUES
(1, 'Proteína 5 Lbs Fit Whey', 'Excelente calidad. Recuperación, rendimiento. Masa muscular. Saborizada. Se prepara con agua o leche de tipo descremada.', 19028, 2.25, 'Proteina', 1),
(2, 'Usa Whey Protein', 'Elaborado en base proteínas extraídas del suero de la leche del más alto valor biológico, aportando aminoácidos esenciales, vitaminas y minerales.', 15600, 0.945, 'Proteina', 5),
(3, 'Xplode Cell Pack', 'XPLODE CELL PACK integra en 1 solo suplemento Creatina micronizada, Carbohidratos, Aminoácidos y otros optimizadores del rendimiento como el Ginseng, que logran una mayor y más rápida absorción de los nutrientes en el cuerpo, aportando energía, resistencia y recuperación. ', 12300, 1.44, 'Creatina', 5),
(4, 'Whey Protein Star Nutrition', 'Previene la fatiga muscular. Conserva el tamaño del músculo. Aumenta la masa muscular. Para todo tipo de deportes.', 29890, 0.907, 'Proteina', 4),
(5, 'Creatina de Gentech Micronizada Monohidrato', 'Excelente calidad. Recuperación, rendimiento. Masa muscular. Saborizada. Se prepara con agua o leche de tipo descremada.', 19756, 0.5, 'Creatina', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_Productos_Marca` (`ID_Marca`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `marcas`
--
ALTER TABLE `marcas`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `fk_Productos_Marca` FOREIGN KEY (`ID_Marca`) REFERENCES `marcas` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
