-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-08-2019 a las 20:12:56
-- Versión del servidor: 10.3.16-MariaDB
-- Versión de PHP: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `clap`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `almacen`
--

CREATE TABLE `almacen` (
  `id` int(100) NOT NULL,
  `nombre_producto` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `almacen`
--

INSERT INTO `almacen` (`id`, `nombre_producto`) VALUES
(10, 'Azucar'),
(11, 'Aceite'),
(12, 'Leche'),
(13, 'Harina'),
(14, 'Lentejas'),
(15, 'Pasta'),
(16, 'Arroz');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacion`
--

CREATE TABLE `asignacion` (
  `id` int(10) NOT NULL,
  `id_nombre_producto` varchar(30) NOT NULL,
  `id_fecha` date NOT NULL,
  `id_pago` bigint(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `asignacion`
--

INSERT INTO `asignacion` (`id`, `id_nombre_producto`, `id_fecha`, `id_pago`) VALUES
(40, 'Azucar', '2019-08-12', 222222222222),
(41, 'Aceite', '2019-08-12', 222222222222),
(42, 'Leche', '2019-08-12', 222222222222),
(43, 'Harina', '2019-08-12', 222222222222),
(44, 'Lentejas', '2019-08-12', 222222222222),
(45, 'Pasta', '2019-08-12', 222222222222),
(46, 'Arroz', '2019-08-12', 222222222222);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `beneficiario`
--

CREATE TABLE `beneficiario` (
  `id` int(10) NOT NULL,
  `id_persona` int(10) NOT NULL,
  `piso` int(2) NOT NULL,
  `apartamento` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `beneficiario`
--

INSERT INTO `beneficiario` (`id`, `id_persona`, `piso`, `apartamento`) VALUES
(3, 2070522, 1, 11),
(1, 3482897, 2, 22),
(11, 3625774, 7, 71),
(2, 5305566, 4, 44),
(14, 5512054, 1, 11),
(9, 6057474, 8, 81),
(15, 6414486, 2, 21),
(6, 6919651, 6, 61),
(5, 7956097, 7, 73),
(8, 10116806, 5, 51),
(7, 10803781, 6, 62),
(4, 12459871, 2, 21),
(12, 12640335, 7, 72),
(13, 20675538, 1, 11),
(10, 35500159, 2, 24);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago`
--

CREATE TABLE `pago` (
  `id` int(10) NOT NULL,
  `referencia` bigint(13) NOT NULL,
  `id_beneficiario` int(10) NOT NULL,
  `fecha_pago` date NOT NULL,
  `entrega` tinyint(1) NOT NULL,
  `fecha_caja` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pago`
--

INSERT INTO `pago` (`id`, `referencia`, `id_beneficiario`, `fecha_pago`, `entrega`, `fecha_caja`) VALUES
(25, 222222222222, 5512054, '2019-08-12', 1, '2019-08-12'),
(26, 333333333333, 6414486, '2019-08-12', 0, '2019-08-12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `id` int(10) NOT NULL,
  `cedula` int(8) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `correo` varchar(30) NOT NULL,
  `telefono` bigint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`id`, `cedula`, `nombre`, `apellido`, `correo`, `telefono`) VALUES
(4, 2070522, 'Aide ', 'Camejo', 'camejoaide@gmail.com', 2124725182),
(2, 3482897, 'Oswaldo', 'Medina', 'pmedina@gmail.com', 2124728431),
(1, 3485791, 'Rosario', 'Barazarte', 'rosabarazarte@gmail.com', 4241090814),
(12, 3625774, 'Manuel', 'Rodriguez', 'mrodriguezg@hotmail.com', 2124725035),
(3, 5305566, 'David', 'Gonzalez', 'gonzd@gmail.com', 4141065615),
(15, 5512054, 'Juan', 'Chacon', 'marcelino@gmail.com', 4141065615),
(10, 6057474, 'Luciano', 'Bonavino', 'lubonma@hotmail.com', 2124722130),
(16, 6414486, 'Carmen', 'Chacon', 'carmen@gmail.com', 4164279288),
(7, 6919651, 'Fernando', 'Valdemir', 'valdemirf@hotmail.com', 4141192480),
(6, 7956097, 'Juan', 'Exposito', 'jjexposito@gmail.com', 2124729597),
(9, 10116806, 'Alvaro', 'Lopez', 'lopezalvarorr@gmail.com', 4166184591),
(8, 10803781, 'Gabriel', 'Pulido', 'gpulidons@gmail.com', 2124720890),
(5, 12459871, 'Matias', 'Torres', 'torresmcs@hotmail.com', 2124723317),
(13, 12640335, 'Flavia', 'Messina', 'Fmessinaita@gmail.com', 2124729769),
(14, 20675538, 'Gabriel', 'Chacon', 'unixpontetia@gmail.com', 4165276732),
(11, 35500159, 'Zaida', 'Romero', 'zromerito@hotmail.com', 2124728496);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id` int(10) NOT NULL,
  `id_nombre_producto` varchar(30) NOT NULL,
  `fecha` date NOT NULL,
  `cantidad` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `id_nombre_producto`, `fecha`, `cantidad`) VALUES
(24, 'Azucar', '2019-08-12', 2),
(25, 'Aceite', '2019-08-12', 2),
(26, 'Leche', '2019-08-12', 2),
(27, 'Harina', '2019-08-12', 2),
(28, 'Lentejas', '2019-08-12', 2),
(29, 'Pasta', '2019-08-12', 2),
(30, 'Arroz', '2019-08-12', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(10) NOT NULL,
  `id_persona` int(8) NOT NULL,
  `usuario` varchar(10) NOT NULL,
  `contrasena` int(10) NOT NULL,
  `rol` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `id_persona`, `usuario`, `contrasena`, `rol`) VALUES
(11, 10116806, '10116806', 10116806, 0),
(10, 10803781, '10803781', 10803781, 0),
(7, 12459871, '12459871', 12459871, 0),
(15, 12640335, '12640335', 12640335, 0),
(16, 20675538, '20675538', 20675538, 0),
(6, 2070522, '2070522', 2070522, 0),
(4, 3482897, '3482897', 3482897, 0),
(13, 35500159, '35500159', 35500159, 0),
(14, 3625774, '3625774', 3625774, 0),
(5, 5305566, '5305566', 5305566, 0),
(17, 5512054, '5512054', 1234, 0),
(12, 6057474, '6057474', 6057474, 0),
(18, 6414486, '6414486', 6414486, 0),
(9, 6919651, '6919651', 6919651, 0),
(8, 7956097, '7956097', 7956097, 0),
(3, 3485791, 'Admin', 1234, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `almacen`
--
ALTER TABLE `almacen`
  ADD PRIMARY KEY (`nombre_producto`),
  ADD KEY `nombre_producto` (`nombre_producto`),
  ADD KEY `id` (`id`);

--
-- Indices de la tabla `asignacion`
--
ALTER TABLE `asignacion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `id_entrega` (`id_pago`),
  ADD KEY `id_producto` (`id_nombre_producto`),
  ADD KEY `id_producto_fecha` (`id_fecha`);

--
-- Indices de la tabla `beneficiario`
--
ALTER TABLE `beneficiario`
  ADD PRIMARY KEY (`id_persona`),
  ADD KEY `id` (`id`);

--
-- Indices de la tabla `pago`
--
ALTER TABLE `pago`
  ADD PRIMARY KEY (`referencia`),
  ADD KEY `id` (`id`),
  ADD KEY `id_beneficiario` (`id_beneficiario`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`cedula`),
  ADD KEY `id` (`id`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `id_producto_fecha` (`fecha`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`usuario`),
  ADD KEY `id` (`id`),
  ADD KEY `id_persona` (`id_persona`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `almacen`
--
ALTER TABLE `almacen`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `asignacion`
--
ALTER TABLE `asignacion`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de la tabla `beneficiario`
--
ALTER TABLE `beneficiario`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `pago`
--
ALTER TABLE `pago`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asignacion`
--
ALTER TABLE `asignacion`
  ADD CONSTRAINT `asignacion_ibfk_3` FOREIGN KEY (`id_fecha`) REFERENCES `producto` (`fecha`),
  ADD CONSTRAINT `asignacion_ibfk_5` FOREIGN KEY (`id_pago`) REFERENCES `pago` (`referencia`);

--
-- Filtros para la tabla `beneficiario`
--
ALTER TABLE `beneficiario`
  ADD CONSTRAINT `beneficiario_ibfk_1` FOREIGN KEY (`id_persona`) REFERENCES `persona` (`cedula`);

--
-- Filtros para la tabla `pago`
--
ALTER TABLE `pago`
  ADD CONSTRAINT `pago_ibfk_1` FOREIGN KEY (`id_beneficiario`) REFERENCES `beneficiario` (`id_persona`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_persona`) REFERENCES `persona` (`cedula`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
