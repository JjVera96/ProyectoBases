-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-11-2016 a las 20:35:02
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
  `Fecha_Vencimiento` date NOT NULL,
  `Precio` int(20) NOT NULL,
  `Disponibilidad` int(10) NOT NULL,
  `Cod_Proveedor` int(15) NOT NULL,
  `Formula` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `drogas`
--

INSERT INTO `drogas` (`Codigo`, `Nombre`, `Fabricante`, `Presentacion`, `Tipo`, `Fecha_Vencimiento`, `Precio`, `Disponibilidad`, `Cod_Proveedor`, `Formula`) VALUES
(1, 'Acetaminofem', 'MK', '50 mg', 'pasta', '2017-12-30', 2000, 90, 6, 'no'),
(2, 'Aciclovir', 'MK', '800 mg', 'pasta', '2017-12-30', 500, 50, 6, 'no'),
(3, 'Januvia', 'Jujo Laboratori', '50 mg', 'pasta', '2017-03-30', 1000, 10, 6, 'no'),
(4, 'Ondax', 'Jujo Laboratori', '8 mg/ml', 'ampolla', '2017-05-25', 5000, 20, 1, 'si'),
(5, 'Sucralfato', 'Fercho Drogas', '1 g', 'pasta', '2016-12-15', 2500, 30, 10, 'si'),
(6, 'Asa', 'Jujo Laboratori', '500 mg', 'pasta', '2017-02-25', 10000, 10, 3, 'no'),
(7, 'Plavix', 'Mk', '75 mg', 'pasta', '2018-06-25', 1500, 35, 9, 'no'),
(8, 'Naloxona', 'Fercho Drogas', '0.4 mg/ml', 'ampolla', '2017-06-30', 5000, 20, 7, 'si'),
(9, 'Tramadol', 'Fercho Drogas', '100 mg', 'pasta', '2018-06-05', 1200, 20, 2, 'no'),
(10, 'Trimetoprim', 'Jujos Laborator', '80 mg/ml', 'ampolla', '2017-01-01', 200, 100, 2, 'no'),
(11, 'Gliclazida', 'Mk', '30 mg', 'pasta', '2016-12-21', 500, 47, 6, 'si'),
(12, 'Ganciclovir', 'MK', '250 mg', 'pasta', '2017-09-30', 100, 250, 11, 'si'),
(13, 'Valaciclovir', 'MK', '500 mg', 'pasta', '2018-02-20', 550, 150, 12, 'no'),
(14, 'NetFormina', 'Siklas', '1000 mg', 'pasta', '2019-02-01', 250, 135, 10, 'si'),
(15, 'Metotrexato', 'Virginia Compan', '5 mg/ml', 'ampolla', '2017-05-18', 350, 105, 6, 'no'),
(16, 'Trimebutina', 'LDS', '200 mg', 'pasta', '2016-12-25', 650, 200, 3, 'no'),
(17, 'Domperidona', 'MK', '10 mg', 'pasta', '2017-02-15', 100, 550, 12, 'no'),
(18, 'Mesaprida', 'MK', '5 mg/ml', 'ampolla', '2019-12-12', 250, 90, 3, 'si'),
(19, 'Fentanyl', 'SSAS', '50 mg/ml', 'ampolla', '2017-06-30', 250, 250, 9, 'si'),
(20, 'Naloxona', 'SSAS', '0.4 mg/ml', 'ampolla', '0208-12-12', 650, 30, 10, 'si'),
(21, 'Alopurinol', 'MK', '300 mg', 'pasta', '2017-07-25', 1200, 50, 11, 'no'),
(22, 'Colchicino', 'Siklas', '0.4 mg', 'pasta', '2019-03-31', 750, 60, 11, 'si'),
(23, 'Today', 'MK condons', 'Paquete 5', 'condon', '2016-12-12', 2500, 10, 11, 'no'),
(24, 'Duo', 'MK', 'Paquete 5', 'condon', '2016-12-12', 10, 1800, 10, 'no'),
(25, 'Winny', 'Papeles Naciona', 'Paquete 50 Tall', 'paÃ±ales', '2018-06-30', 10000, 20, 2, 'no');

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
  `Contra` int(4) NOT NULL,
  `Primer_Nombre` varchar(15) NOT NULL,
  `Segundo_Nombre` varchar(15) DEFAULT NULL,
  `Primer_Apellido` varchar(15) NOT NULL,
  `Segundo_Apellido` varchar(15) NOT NULL,
  `Fecha_Nacimiento` date NOT NULL,
  `Cargo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `personal`
--

INSERT INTO `personal` (`Codigo`, `Contra`, `Primer_Nombre`, `Segundo_Nombre`, `Primer_Apellido`, `Segundo_Apellido`, `Fecha_Nacimiento`, `Cargo`) VALUES
(1087559573, 1996, 'Juan', 'Jose', 'Vera', 'Arango', '1996-11-07', 'Administrador'),
(1088016836, 1993, 'Jhon', 'Albert', 'Arango', 'Duque', '1993-07-19', 'Empleado'),
(1088032142, 1997, 'Juan', 'Sebastian', 'Calvo', 'Usma', '1997-11-10', 'Empleado'),
(1088328484, 1995, 'Nicolas', NULL, 'Cardona', 'Montaño', '1995-08-03', 'Empleado'),
(1088331292, 1995, 'Luis', 'Alberto', 'Borrero', 'Velez', '1995-11-15', 'Empleado'),
(1088333977, 1996, 'Aldair', NULL, 'Bernal', 'Betancour', '1996-03-29', 'Empleado'),
(1090337309, 1994, 'Jhon', 'Alexander', 'Zapata', 'Trejos', '1994-12-15', 'Empleado'),
(1093221692, 1993, 'Richard', 'Andres', 'Murillo', 'Arboleda', '1993-08-09', 'Empleado'),
(1093226665, 1996, 'Alejandro', '', 'Escobar', 'Valencia', '1996-05-21', 'Empleado'),
(1112777358, 1992, 'Jose', 'Alejandro', 'Cardona', 'Valdes', '1992-10-16', 'Empleado'),
(1112778553, 1993, 'Dubel', 'Fernando', 'Giraldo', 'Duque', '1993-03-30', 'Administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `Codigo` int(15) NOT NULL,
  `Nombre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`Codigo`, `Nombre`) VALUES
(1, 'MultiDrogras'),
(2, 'DrogasRebaja'),
(3, 'CopiDrogas'),
(4, 'Droguero'),
(5, 'FerDrogas'),
(6, 'JuanDrogas'),
(7, 'DrogasVirginia'),
(8, 'NeaDrogas'),
(9, 'PitoDrogas'),
(10, 'YanembaDrogas'),
(11, 'Jujos Laboratorios');

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
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`Codigo_Venta`, `Cod_Personal`, `Cod_Droga`, `Cantidad`, `Total`) VALUES
(1, 1087559573, 1, 1, 2000),
(2, 1087559573, 1, 1, 2000),
(3, 1087559573, 1, 2, 4000),
(4, 1087559573, 1, 1, 2000),
(5, 1087559573, 1, 10, 20000),
(6, 1087559573, 1, 10, 20000),
(7, 1088016836, 1, 100, 200000);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `drogas`
--
ALTER TABLE `drogas`
  ADD PRIMARY KEY (`Codigo`);

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
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
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
  MODIFY `Codigo_Venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
