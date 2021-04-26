-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-04-2021 a las 06:03:03
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `restaurantebar`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `ID_Categoria` int(11) NOT NULL,
  `NombreCate` varchar(45) NOT NULL,
  `DescripcionCate` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`ID_Categoria`, `NombreCate`, `DescripcionCate`) VALUES
(2, 'Bebidas', 'nada'),
(3, 'Almuerzos', 'nada'),
(5, 'Malteadas', 'Mateadlas '),
(6, 'Hamburguesas', 'pues hamburguesa ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consecutivos`
--

CREATE TABLE `consecutivos` (
  `id_consecutivo` int(11) NOT NULL,
  `Prefijo` varchar(2) NOT NULL,
  `Numero` int(11) NOT NULL,
  `Descripción` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_pedidos`
--

CREATE TABLE `detalle_pedidos` (
  `iddetalle_pedidos` int(11) NOT NULL,
  `num_pedido` varchar(45) DEFAULT NULL,
  `producto` varchar(45) DEFAULT NULL,
  `tipo` varchar(45) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `precio` double DEFAULT NULL,
  `total` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalle_pedidos`
--

INSERT INTO `detalle_pedidos` (`iddetalle_pedidos`, `num_pedido`, `producto`, `tipo`, `cantidad`, `precio`, `total`) VALUES
(1, '181', 'Prueba', 'Comida', 1, 40999, 40999),
(2, '7377', 'Prueba', 'Comida', 1, 40999, 40999),
(3, '7377', 'hit', 'Bebidas', 1, 2000, 2000),
(6, '8873', 'Prueba', 'Comida', 1, 40999, 40999),
(7, '8873', 'hit', 'Bebidas', 1, 2000, 2000),
(8, '8873', 'Prueba', 'Comida', 1, 40999, 40999),
(10, '197', 'hit', 'Bebidas', 1, 2000, 2000),
(11, '7654', 'Terruño', 'Hamburguesas', 1, 8000, 8000),
(13, '908', 'hit', 'Bebidas', 1, 2000, 2000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mesas`
--

CREATE TABLE `mesas` (
  `idmesas` int(11) NOT NULL,
  `idzonas` int(11) NOT NULL,
  `nummesa` int(11) NOT NULL,
  `numpedido` float NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `mesas`
--

INSERT INTO `mesas` (`idmesas`, `idzonas`, `nummesa`, `numpedido`) VALUES
(2, 1, 1, 0),
(3, 1, 2, 2898),
(4, 1, 3, 0),
(5, 3, 1, 0),
(6, 3, 2, 0),
(7, 3, 3, 0),
(8, 3, 4, 0),
(9, 3, 5, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `idpedidos` int(11) NOT NULL,
  `num_pedido` varchar(100) NOT NULL,
  `mesero` varchar(60) NOT NULL,
  `mesa` int(11) NOT NULL,
  `zona` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `confirmado` int(11) NOT NULL DEFAULT 0,
  `pagado` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`idpedidos`, `num_pedido`, `mesero`, `mesa`, `zona`, `fecha`, `confirmado`, `pagado`) VALUES
(1, '8769', 'Adriana', 1, 0, '2020-11-07 00:00:00', 0, 0),
(2, '4367', 'Adriana', 1, 0, '2020-11-13 00:00:00', 0, 0),
(3, '181', 'Adriana', 1, 0, '2020-11-13 00:00:00', 1, 1),
(4, '7377', 'Adriana', 1, 0, '2020-11-19 00:00:00', 1, 1),
(5, '8873', 'Adriana', 1, 0, '2021-01-31 00:00:00', 1, 1),
(6, '2898', 'Adriana', 2, 0, '2021-01-31 00:00:00', 1, 0),
(7, '8027', 'Adriana', 1, 0, '2021-01-31 00:00:00', 0, 0),
(8, '197', 'Adriana', 1, 0, '2021-02-01 00:00:00', 1, 1),
(9, '942', 'Adriana', 3, 0, '2021-02-01 00:00:00', 0, 0),
(10, '7654', 'Adriana', 3, 0, '2021-02-01 00:00:00', 0, 0),
(11, '908', 'Adriana', 3, 0, '2021-02-01 00:00:00', 0, 0),
(12, '1831', 'Adriana', 3, 0, '2021-02-26 00:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `ID_Producto` int(11) NOT NULL,
  `ID_Categoria` int(11) NOT NULL,
  `NombreProducto` varchar(255) NOT NULL,
  `Ingredientes` text DEFAULT NULL,
  `Cantidad` int(11) NOT NULL DEFAULT 1,
  `Precio` double NOT NULL DEFAULT 1000
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`ID_Producto`, `ID_Categoria`, `NombreProducto`, `Ingredientes`, `Cantidad`, `Precio`) VALUES
(4, 2, 'dfg', 'dfg', 234, 234),
(8, 2, 'KinKong', 'NNN', 10, 15000),
(9, 2, 'Cocacola', 'as', 10, 2000),
(10, 5, 'asd', 'sdfs', 2, 3444);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id_rol` int(11) NOT NULL,
  `nombre_rol` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_rol`, `nombre_rol`) VALUES
(1, 'sinAsignar'),
(2, 'admin'),
(3, 'mesero'),
(4, 'facturador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `user` varchar(100) NOT NULL,
  `pass` varchar(45) NOT NULL,
  `correo` varchar(45) NOT NULL,
  `genero` varchar(45) NOT NULL DEFAULT 'No se especifico',
  `fecha_nacimiento` datetime NOT NULL,
  `id_rol` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `user`, `pass`, `correo`, `genero`, `fecha_nacimiento`, `id_rol`) VALUES
(1, 'Juan', '1234', 'tenjo2001@gmail.com', 'Hombre', '2001-02-13 00:00:00', 2),
(2, 'Adriana', '1234', 'adriana@gmail.com', 'femenino', '2020-11-23 21:37:16', 3),
(3, 'paula', '1234', 'paulaap.123@hotmail.com', 'Mujer', '0000-00-00 00:00:00', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `zonas`
--

CREATE TABLE `zonas` (
  `idzonas` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `numMesas` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `zonas`
--

INSERT INTO `zonas` (`idzonas`, `nombre`, `numMesas`) VALUES
(1, 'Central', ''),
(2, 'Vip', ''),
(3, 'Patio', '5');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`ID_Categoria`);

--
-- Indices de la tabla `consecutivos`
--
ALTER TABLE `consecutivos`
  ADD PRIMARY KEY (`id_consecutivo`);

--
-- Indices de la tabla `detalle_pedidos`
--
ALTER TABLE `detalle_pedidos`
  ADD PRIMARY KEY (`iddetalle_pedidos`);

--
-- Indices de la tabla `mesas`
--
ALTER TABLE `mesas`
  ADD PRIMARY KEY (`idmesas`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`idpedidos`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`ID_Producto`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `zonas`
--
ALTER TABLE `zonas`
  ADD PRIMARY KEY (`idzonas`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `ID_Categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `consecutivos`
--
ALTER TABLE `consecutivos`
  MODIFY `id_consecutivo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalle_pedidos`
--
ALTER TABLE `detalle_pedidos`
  MODIFY `iddetalle_pedidos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `mesas`
--
ALTER TABLE `mesas`
  MODIFY `idmesas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `idpedidos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `ID_Producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `zonas`
--
ALTER TABLE `zonas`
  MODIFY `idzonas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
