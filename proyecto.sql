-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-11-2016 a las 00:16:54
-- Versión del servidor: 5.7.14
-- Versión de PHP: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `drogas`
--

CREATE TABLE `drogas` (
  `Codigo` int(15) NOT NULL,
  `Nombre` varchar(15) NOT NULL,
  `Fabricante` varchar(15) NOT NULL,
  `Presentacion` varchar(15) NOT NULL,
  `Tipo` varchar(15) NOT NULL,
  `Fecha Vencimiento` date NOT NULL,
  `Precio` int(20) NOT NULL,
  `Disponibilidad` int(10) NOT NULL,
  `Cod_Proveedor` int(15) NOT NULL,
  `Formula` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `Cod_Personal` int(15) NOT NULL,
  `Cod_Droga` int(15) NOT NULL,
  `Fecha` date NOT NULL,
  `Cantidad` int(10) NOT NULL,
  `Precio_Compra` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

CREATE TABLE `personal` (
  `Codigo` int(20) NOT NULL,
  `Contra` varchar(4) NOT NULL,
  `Primer Nombre` varchar(15) NOT NULL,
  `Segundo Nombre` varchar(15) DEFAULT NULL,
  `Primer Apellido` varchar(15) NOT NULL,
  `Segundo Apellido` varchar(15) NOT NULL,
  `Fecha Nacimiento` date NOT NULL,
  `Cargo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `personal`
--

INSERT INTO `personal` (`Codigo`, `Contra`, `Primer Nombre`, `Segundo Nombre`, `Primer Apellido`, `Segundo Apellido`, `Fecha Nacimiento`, `Cargo`) VALUES
(1087559573, '1996', 'Juan', 'Jose', 'Vera', 'Arango', '1996-11-07', 'Administrador'),
(1088016836, '1993', 'Jhon', 'Albert', 'Arango', 'Duque', '1993-07-19', 'Empleado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `Codigo` int(15) NOT NULL,
  `Nombre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `Codigo_Venta` int(11) NOT NULL,
  `Cod_Personal` int(20) NOT NULL,
  `Cod_Droga` int(20) NOT NULL,
  `Cantidad` int(20) NOT NULL,
  `Total` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`Cod_Droga`,`Cod_Personal`);

--
-- Indices de la tabla `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`Codigo`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`Codigo_Venta`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `Codigo_Venta` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
