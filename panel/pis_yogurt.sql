-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-07-2022 a las 19:26:04
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pis_yogurt`
--
CREATE DATABASE IF NOT EXISTS `pis_yogurt` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `pis_yogurt`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `idcliente` int(11) NOT NULL,
  `nombre` varchar(200) DEFAULT NULL,
  `cedula` varchar(10) DEFAULT NULL,
  `celular` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`idcliente`, `nombre`, `cedula`, `celular`) VALUES
(1, 'Juan Romero Bravo', '0958986804', '0969801337'),
(2, 'Nicole Jaramillo Jara', '0938493739', '0988393929'),
(5, 'Julio Manuel Moran Ferruzola', '0988298282', '0999188283');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_fabricacion`
--

CREATE TABLE `detalle_fabricacion` (
  `iddetallefabricacion` int(11) NOT NULL,
  `idfabricacion` int(11) DEFAULT NULL,
  `idingrediente` int(11) DEFAULT NULL,
  `cant_ingrediente` int(11) DEFAULT NULL,
  `precio` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalle_fabricacion`
--

INSERT INTO `detalle_fabricacion` (`iddetallefabricacion`, `idfabricacion`, `idingrediente`, `cant_ingrediente`, `precio`) VALUES
(1, 1, 1, 25, 0.95),
(2, 1, 2, 5, 35),
(3, 1, 3, 30, 1.2),
(4, 2, 1, 25, 0.95),
(5, 2, 2, 5, 35),
(6, 2, 5, 30, 1.2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_venta`
--

CREATE TABLE `detalle_venta` (
  `iddetalleventa` int(11) NOT NULL,
  `idventa` int(11) DEFAULT NULL,
  `idproducto` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `precio` double DEFAULT NULL,
  `subtotal` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalle_venta`
--

INSERT INTO `detalle_venta` (`iddetalleventa`, `idventa`, `idproducto`, `cantidad`, `precio`, `subtotal`) VALUES
(7, 3, 1, 3, 2.25, 6.75),
(8, 3, 2, 2, 2.25, 4.5),
(9, 3, 6, 5, 2.5, 12.5),
(10, 4, 2, 6, 2.25, 13.5),
(11, 4, 6, 10, 2.5, 25),
(12, 5, 1, 1, 2.25, 2.25),
(13, 5, 2, 3, 2.25, 6.75),
(14, 6, 2, 5, 2.25, 11.25),
(15, 6, 6, 3, 2.5, 7.5),
(16, 7, 1, 7, 2.25, 15.75),
(19, 10, 1, 5, 2.25, 11.25),
(20, 10, 2, 5, 2.25, 11.25),
(21, 11, 1, 4, 2.25, 9),
(22, 11, 6, 2, 2.5, 5),
(23, 11, 2, 9, 2.25, 20.25);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fabricacion`
--

CREATE TABLE `fabricacion` (
  `idfabricacion` int(11) NOT NULL,
  `fecha` datetime DEFAULT NULL,
  `idproducto` int(11) DEFAULT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `fabricacion`
--

INSERT INTO `fabricacion` (`idfabricacion`, `fecha`, `idproducto`, `cantidad`) VALUES
(1, '2022-07-20 07:10:39', 1, 50),
(2, '2022-07-20 07:41:35', 2, 50);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingrediente`
--

CREATE TABLE `ingrediente` (
  `idingrediente` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `imagen` varchar(300) DEFAULT NULL,
  `stock` int(11) NOT NULL,
  `precio` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ingrediente`
--

INSERT INTO `ingrediente` (`idingrediente`, `nombre`, `imagen`, `stock`, `precio`) VALUES
(1, 'Leche Entera de 1 Litro', 'leche-vita-entera-1-litro.jpg', 150, 0.95),
(2, 'Azucar Blanca San Carlos 50 Kg', 'AB-Saco-50-kg.png', 65, 35),
(3, 'Libra de Mora', 'libra-mora.jpg', 70, 1.2),
(5, 'Libra de Fresa', 'fresas.jpg', 70, 1.2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `idproducto` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `imagen` varchar(200) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `pvp` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`idproducto`, `nombre`, `imagen`, `stock`, `pvp`) VALUES
(1, 'Yogurt Sabor a Mora de 2 Litros', 'yogurt-sabor-a-mora-2-litros.jpg', 280, 2.25),
(2, 'Yogurt Sabor a Fresa de 2 Litros', 'yogurt-sabor-a-fresa-2-litro.jpg', 150, 2.25),
(6, 'Yogurt Sabor a Durazno de 2 Litros', 'durazno-2-litro.jpg', 80, 2.5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL,
  `nombre` varchar(200) DEFAULT NULL,
  `clave` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `nombre`, `clave`) VALUES
(1, 'alucas', 'd93591bdf7860e1e4ee2fca799911215'),
(3, 'mcardenasmo', '25d55ad283aa400af464c76d713c07ad');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `idventa` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `idcliente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`idventa`, `fecha`, `idcliente`) VALUES
(3, '2022-07-13 03:01:25', 1),
(4, '2022-07-13 03:08:24', 5),
(5, '2022-07-13 03:09:38', 1),
(6, '2022-07-13 03:13:19', 2),
(7, '2022-07-13 03:16:23', 2),
(10, '2022-07-13 03:18:50', 5),
(11, '2022-07-13 03:20:27', 5);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idcliente`),
  ADD UNIQUE KEY `cedula` (`cedula`);

--
-- Indices de la tabla `detalle_fabricacion`
--
ALTER TABLE `detalle_fabricacion`
  ADD PRIMARY KEY (`iddetallefabricacion`);

--
-- Indices de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD PRIMARY KEY (`iddetalleventa`);

--
-- Indices de la tabla `fabricacion`
--
ALTER TABLE `fabricacion`
  ADD PRIMARY KEY (`idfabricacion`);

--
-- Indices de la tabla `ingrediente`
--
ALTER TABLE `ingrediente`
  ADD PRIMARY KEY (`idingrediente`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`idproducto`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`),
  ADD UNIQUE KEY `usuario_unico` (`nombre`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`idventa`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idcliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `detalle_fabricacion`
--
ALTER TABLE `detalle_fabricacion`
  MODIFY `iddetallefabricacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  MODIFY `iddetalleventa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `fabricacion`
--
ALTER TABLE `fabricacion`
  MODIFY `idfabricacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `ingrediente`
--
ALTER TABLE `ingrediente`
  MODIFY `idingrediente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `idproducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `idventa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
