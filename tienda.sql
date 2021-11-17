-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-11-2021 a las 04:01:02
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mydb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `armados_tipo`
--

CREATE TABLE `armados_tipo` (
  `create_time` timestamp NULL DEFAULT current_timestamp(),
  `update_time` timestamp NULL DEFAULT NULL,
  `arm_id` int(11) NOT NULL,
  `arm_nombre` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `cat_id` int(11) NOT NULL,
  `cat_nombre` varchar(45) DEFAULT NULL,
  `cat_estado` tinyint(4) DEFAULT NULL,
  `create_time` timestamp NULL DEFAULT current_timestamp(),
  `update_time` timestamp NULL DEFAULT NULL,
  `imagen` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`cat_id`, `cat_nombre`, `cat_estado`, `create_time`, `update_time`, `imagen`) VALUES
(1, 'categoria1', 1, '2021-10-09 23:11:57', '2021-10-09 23:11:57', NULL),
(2, 'categoria2', 1, '2021-11-08 21:18:40', '2021-11-08 21:18:40', NULL),
(3, 'categoria 3', 1, '2021-11-16 17:47:08', '2021-11-16 17:47:08', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direcciones`
--

CREATE TABLE `direcciones` (
  `di_id` int(11) NOT NULL,
  `di_nombre` varchar(45) DEFAULT NULL,
  `di_numero` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direccion_usuarios`
--

CREATE TABLE `direccion_usuarios` (
  `usuarios_us_id` int(11) NOT NULL,
  `Direcciones_di_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados`
--

CREATE TABLE `estados` (
  `id_estado` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estados`
--

INSERT INTO `estados` (`id_estado`, `nombre`) VALUES
(1, 'Esperando confirmación'),
(2, 'Confirmado'),
(3, 'En Preparación'),
(4, 'En Reparto'),
(5, 'Recibido'),
(6, 'Solicitud Cancelacion'),
(7, 'Cancelado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagen`
--

CREATE TABLE `imagen` (
  `img_id` int(11) NOT NULL,
  `ruta` varchar(455) DEFAULT NULL,
  `create_time` timestamp NULL DEFAULT current_timestamp(),
  `update_time` timestamp NULL DEFAULT NULL,
  `nombre` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `imagen`
--

INSERT INTO `imagen` (`img_id`, `ruta`, `create_time`, `update_time`, `nombre`) VALUES
(1, '/resources/images/productos/37', '2021-11-16 17:51:18', '2021-11-16 17:51:18', '635779-0000-001.webp'),
(22, '/resources/images/productos/33', '2021-10-11 00:02:57', '2021-10-11 00:02:57', '1.jpg'),
(23, '/resources/images/productos/33', '2021-10-11 00:02:57', '2021-10-11 00:02:57', '2.jpg'),
(24, '/resources/images/productos/33', '2021-10-11 00:02:57', '2021-10-11 00:02:57', '3.jpg'),
(25, '/resources/images/productos/33', '2021-10-11 00:02:57', '2021-10-11 00:02:57', '4.jpg'),
(26, '/resources/images/productos/34', '2021-10-11 07:03:36', '2021-10-11 07:03:36', '1.jpg'),
(27, '/resources/images/productos/34', '2021-10-11 07:03:36', '2021-10-11 07:03:36', '2.jpg'),
(28, '/resources/images/productos/34', '2021-10-11 07:03:36', '2021-10-11 07:03:36', '3.jpg'),
(29, '/resources/images/productos/35', '2021-10-11 18:19:46', '2021-10-11 18:19:46', '2.jpg'),
(30, '/resources/images/productos/35', '2021-10-11 18:19:46', '2021-10-11 18:19:46', '3.jpg'),
(31, '/resources/images/productos/36', '2021-10-11 20:01:41', '2021-10-11 20:01:41', '3.jpg'),
(32, '/resources/images/productos/36', '2021-10-11 20:01:41', '2021-10-11 20:01:41', '4.jpg'),
(33, '/resources/images/productos/41', '2021-11-16 18:04:01', '2021-11-16 18:04:01', '635779-0000-001.webp'),
(34, '/resources/images/productos/41', '2021-11-16 18:04:01', '2021-11-16 18:04:01', '635779-0000-002.webp'),
(35, '/resources/images/productos/41', '2021-11-16 18:04:01', '2021-11-16 18:04:01', '635779-0000-003.webp'),
(36, '/resources/images/productos/42', '2021-11-16 18:04:03', '2021-11-16 18:04:03', '635779-0000-001.webp'),
(37, '/resources/images/productos/42', '2021-11-16 18:04:03', '2021-11-16 18:04:03', '635779-0000-002.webp'),
(38, '/resources/images/productos/42', '2021-11-16 18:04:03', '2021-11-16 18:04:03', '635779-0000-003.webp'),
(39, '/resources/images/productos/43', '2021-11-16 18:04:30', '2021-11-16 18:04:30', '635779-0000-001.webp'),
(40, '/resources/images/productos/43', '2021-11-16 18:04:30', '2021-11-16 18:04:30', '635779-0000-002.webp'),
(41, '/resources/images/productos/43', '2021-11-16 18:04:30', '2021-11-16 18:04:30', '635779-0000-003.webp');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

CREATE TABLE `marcas` (
  `mar_id` int(11) NOT NULL,
  `mar_nombre` varchar(45) DEFAULT NULL,
  `mar_imagen` varchar(45) DEFAULT NULL,
  `create_time` timestamp NULL DEFAULT NULL,
  `update_time` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `marcas`
--

INSERT INTO `marcas` (`mar_id`, `mar_nombre`, `mar_imagen`, `create_time`, `update_time`) VALUES
(1, 'marca', NULL, '2021-10-09 23:12:19', '2021-10-09 23:12:19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `pro_id` int(11) NOT NULL,
  `pro_codigo` varchar(455) NOT NULL,
  `pro_nombre` varchar(45) DEFAULT NULL,
  `pro_precio_compra` int(11) DEFAULT NULL,
  `pro_precio_venta` int(11) DEFAULT NULL,
  `pro_modelo` varchar(45) DEFAULT NULL,
  `pro_altura` varchar(45) DEFAULT NULL,
  `pro_ancho` varchar(45) DEFAULT NULL,
  `pro_profundidad` varchar(45) DEFAULT NULL,
  `pro_descripcion` varchar(45) DEFAULT NULL,
  `pro_peso` varchar(45) DEFAULT NULL,
  `pro_stock` int(11) DEFAULT NULL,
  `pro_img` varchar(45) DEFAULT NULL,
  `pro_color` varchar(45) DEFAULT NULL,
  `pro_estado` tinyint(4) DEFAULT NULL,
  `create_time` timestamp NULL DEFAULT NULL,
  `update_time` timestamp NULL DEFAULT NULL,
  `categorias_cat_id` int(11) NOT NULL,
  `marcas_mar_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`pro_id`, `pro_codigo`, `pro_nombre`, `pro_precio_compra`, `pro_precio_venta`, `pro_modelo`, `pro_altura`, `pro_ancho`, `pro_profundidad`, `pro_descripcion`, `pro_peso`, `pro_stock`, `pro_img`, `pro_color`, `pro_estado`, `create_time`, `update_time`, `categorias_cat_id`, `marcas_mar_id`) VALUES
(33, '213213', 'Mesa', 10000, 20000, 'cama.glb', '123', '231', '321', NULL, '21', 3, '1.jpg', '32', 127, '2021-10-19 14:56:21', '2021-10-19 14:56:26', 1, 1),
(34, '123', 'sila', 324, 432, NULL, '234', '234', '234', NULL, '23', 324, NULL, '324', 127, '2021-10-11 07:03:36', '2021-10-11 07:03:36', 2, 1),
(35, '3244', 'silla', 30000, 40000, NULL, '231', '321', '321', NULL, '32', 23, NULL, '32', 127, '2021-10-11 18:19:46', '2021-10-11 18:19:46', 1, 1),
(36, '123', '213', 321, 231, NULL, '231', '312', '321', NULL, '321', 231, NULL, '321', 127, '2021-10-11 20:01:41', '2021-10-11 20:01:41', 1, 1),
(39, '123', 'fefewf', 234, 234, NULL, '32', '432', '324', NULL, '23', 324, NULL, '34', NULL, '2021-11-16 18:02:40', '2021-11-16 18:02:40', 2, 1),
(40, '123', 'fefewf', 234, 234, NULL, '32', '432', '324', NULL, '23', 324, NULL, '34', NULL, '2021-11-16 18:02:52', '2021-11-16 18:02:52', 2, 1),
(41, '123', 'fefewf', 234, 234, NULL, '32', '432', '324', NULL, '23', 324, NULL, '34', NULL, '2021-11-16 18:04:01', '2021-11-16 18:04:01', 2, 1),
(42, '123', 'fefewf', 234, 234, NULL, '32', '432', '324', NULL, '23', 324, NULL, '34', NULL, '2021-11-16 18:04:03', '2021-11-16 18:04:03', 2, 1),
(43, '213', '231', 43, 43, NULL, '34', '213', '213', NULL, '231', 213, NULL, '213', NULL, '2021-11-16 18:04:30', '2021-11-16 18:04:30', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_has_armados_tipo`
--

CREATE TABLE `productos_has_armados_tipo` (
  `productos_pro_id` int(11) NOT NULL,
  `armados_tipo_arm_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_has_imagen`
--

CREATE TABLE `productos_has_imagen` (
  `productos_pro_id` int(11) NOT NULL,
  `imagen_img_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `productos_has_imagen`
--

INSERT INTO `productos_has_imagen` (`productos_pro_id`, `imagen_img_id`) VALUES
(33, 22),
(33, 23),
(33, 24),
(33, 25),
(34, 26),
(34, 27),
(34, 28),
(35, 29),
(35, 30),
(36, 31),
(36, 32),
(40, 0),
(41, 33),
(41, 34),
(41, 35),
(42, 36),
(42, 37),
(42, 38),
(43, 39),
(43, 40),
(43, 41);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `ro_id` int(11) NOT NULL,
  `rol_nombre` varchar(45) DEFAULT NULL,
  `create_time` timestamp NULL DEFAULT current_timestamp(),
  `update_time` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`ro_id`, `rol_nombre`, `create_time`, `update_time`) VALUES
(1, 'Usuarios', '2021-10-04 00:50:18', '2021-10-04 00:50:18'),
(2, 'Admin', '2021-10-04 00:50:51', '2021-10-04 00:50:51'),
(3, 'Ensamblador', '2021-11-16 17:30:27', '2021-11-16 17:30:27'),
(4, 'Repartidor', '2021-11-16 17:30:27', '2021-11-16 17:30:27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `us_id` int(11) NOT NULL,
  `us_nombre` varchar(45) DEFAULT NULL,
  `us_apellApp` varchar(45) DEFAULT NULL,
  `us_apellApm` varchar(45) DEFAULT NULL,
  `us_telefono` varchar(45) DEFAULT NULL,
  `us_correo` varchar(45) DEFAULT NULL,
  `us_password` varchar(455) DEFAULT NULL,
  `us_direccion` varchar(45) DEFAULT NULL,
  `us_sexo` varchar(45) DEFAULT NULL,
  `create_time` timestamp NULL DEFAULT NULL,
  `update_time` timestamp NULL DEFAULT NULL,
  `roles_ro_id` int(11) NOT NULL,
  `us_estado` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`us_id`, `us_nombre`, `us_apellApp`, `us_apellApm`, `us_telefono`, `us_correo`, `us_password`, `us_direccion`, `us_sexo`, `create_time`, `update_time`, `roles_ro_id`, `us_estado`) VALUES
(1, 'victor', 'huanca', 'cusica', '123', 'victor@correo.cl', '$2y$10$zKsBAeVGIVpCLE.T1ARQfe73kTf0UHnOGnUu8vyeHUBZiG5n3NPhO', '123', 'hombre', '2021-10-04 18:52:07', '2021-10-04 18:52:07', 2, NULL),
(2, 'usuario', '1', '2', '123', 'user@correo.cl', '$2y$10$B1hTFm9Z0PULFj7ynOv0Nu3zZ8z2BFUzjWix5v19hklCNWvfvbUM2', '213', 'hombre', '2021-10-06 00:47:18', '2021-10-06 00:47:18', 1, NULL),
(143, 'pedro', 'fs', 'fsdf', '12', 'fs@correo.cl', '$2y$10$jM2upgS/n.s/3StdkJhSqey1ycxdx2cR3sRl.CHcsHZ1NNKCxi1P.', ', , , N° ', 'hombre', '2021-11-17 02:29:05', '2021-11-17 02:29:05', 4, NULL),
(147, 'felipe', '213', '321', '123', '312', '$2y$10$8pPPy5VpNEOfp.oOwtpS9.9DYIwVlAvZYCQwaMSNqlUysigcnnf5.', ', , , N° ', 'hombre', '2021-11-17 02:36:14', '2021-11-17 02:36:14', 3, NULL),
(161, 'carlos', '123', '123', '123', '312', '$2y$10$LoVTdUJfuuzYANp4Yq5LIuSFhBbM/4XNccOErsU21OicvcdntcYyq', '123, 123, 123, N° 123, , , N° ', 'hombre', '2021-11-17 06:45:23', '2021-11-17 06:45:23', 3, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `usuarios_us_id` int(11) NOT NULL,
  `productos_pro_id` int(11) NOT NULL,
  `venta_id` varchar(45) NOT NULL,
  `ven_total` double NOT NULL,
  `ven_cantidad` int(11) DEFAULT NULL,
  `create_time` timestamp NULL DEFAULT NULL,
  `update_time` timestamp NULL DEFAULT NULL,
  `tipo_armado` varchar(45) DEFAULT NULL,
  `ven_codigo` varchar(45) DEFAULT NULL,
  `estados_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`usuarios_us_id`, `productos_pro_id`, `venta_id`, `ven_total`, `ven_cantidad`, `create_time`, `update_time`, `tipo_armado`, `ven_codigo`, `estados_id`) VALUES
(1, 33, 'TR6193C118B4EC8', 20000, 1, '2021-11-16 18:32:56', '2021-11-16 18:32:56', 'domicilio', 'TR6193C118B4EC8', 1),
(1, 34, 'TR6193C52F242AF', 2160, 5, '2021-11-16 18:50:23', '2021-11-16 18:50:23', 'domicilio', 'TR6193C52F242AF', 1),
(1, 35, 'TR6193C52F242AF', 280000, 7, '2021-11-16 18:50:23', '2021-11-16 18:50:23', 'domicilio', 'TR6193C52F242AF', 1),
(1, 39, 'TR6193C52F242AF', 234, 1, '2021-11-16 18:50:23', '2021-11-16 18:50:23', 'domicilio', 'TR6193C52F242AF', 1),
(1, 40, 'TR6193C52F242AF', 1872, 8, '2021-11-16 18:50:23', '2021-11-16 18:50:23', 'domicilio', 'TR6193C52F242AF', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `armados_tipo`
--
ALTER TABLE `armados_tipo`
  ADD PRIMARY KEY (`arm_id`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indices de la tabla `direcciones`
--
ALTER TABLE `direcciones`
  ADD PRIMARY KEY (`di_id`);

--
-- Indices de la tabla `direccion_usuarios`
--
ALTER TABLE `direccion_usuarios`
  ADD KEY `fk_direccion_usuarios_usuarios1_idx` (`usuarios_us_id`),
  ADD KEY `fk_direccion_usuarios_Direcciones1_idx` (`Direcciones_di_id`);

--
-- Indices de la tabla `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`id_estado`);

--
-- Indices de la tabla `imagen`
--
ALTER TABLE `imagen`
  ADD PRIMARY KEY (`img_id`);

--
-- Indices de la tabla `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`mar_id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`pro_id`),
  ADD KEY `fk_productos_categorias1_idx` (`categorias_cat_id`),
  ADD KEY `fk_productos_marcas1_idx` (`marcas_mar_id`);

--
-- Indices de la tabla `productos_has_armados_tipo`
--
ALTER TABLE `productos_has_armados_tipo`
  ADD PRIMARY KEY (`productos_pro_id`,`armados_tipo_arm_id`),
  ADD KEY `fk_productos_has_armados_tipo_armados_tipo1_idx` (`armados_tipo_arm_id`),
  ADD KEY `fk_productos_has_armados_tipo_productos1_idx` (`productos_pro_id`);

--
-- Indices de la tabla `productos_has_imagen`
--
ALTER TABLE `productos_has_imagen`
  ADD PRIMARY KEY (`productos_pro_id`,`imagen_img_id`),
  ADD KEY `fk_productos_has_imagen_imagen1_idx` (`imagen_img_id`),
  ADD KEY `fk_productos_has_imagen_productos1_idx` (`productos_pro_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`ro_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`us_id`),
  ADD KEY `fk_usuarios_roles1_idx` (`roles_ro_id`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`usuarios_us_id`,`productos_pro_id`,`venta_id`),
  ADD KEY `fk_usuarios_has_productos_productos1_idx` (`productos_pro_id`),
  ADD KEY `fk_usuarios_has_productos_usuarios1_idx` (`usuarios_us_id`),
  ADD KEY `fk_ventas_estados1_idx` (`estados_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `armados_tipo`
--
ALTER TABLE `armados_tipo`
  MODIFY `arm_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `direcciones`
--
ALTER TABLE `direcciones`
  MODIFY `di_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `estados`
--
ALTER TABLE `estados`
  MODIFY `id_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `imagen`
--
ALTER TABLE `imagen`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `marcas`
--
ALTER TABLE `marcas`
  MODIFY `mar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `pro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `ro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `us_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=162;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `direccion_usuarios`
--
ALTER TABLE `direccion_usuarios`
  ADD CONSTRAINT `fk_direccion_usuarios_Direcciones1` FOREIGN KEY (`Direcciones_di_id`) REFERENCES `direcciones` (`di_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_direccion_usuarios_usuarios1` FOREIGN KEY (`usuarios_us_id`) REFERENCES `usuarios` (`us_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `fk_productos_categorias1` FOREIGN KEY (`categorias_cat_id`) REFERENCES `categorias` (`cat_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_productos_marcas1` FOREIGN KEY (`marcas_mar_id`) REFERENCES `marcas` (`mar_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `productos_has_armados_tipo`
--
ALTER TABLE `productos_has_armados_tipo`
  ADD CONSTRAINT `fk_productos_has_armados_tipo_armados_tipo1` FOREIGN KEY (`armados_tipo_arm_id`) REFERENCES `armados_tipo` (`arm_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_productos_has_armados_tipo_productos1` FOREIGN KEY (`productos_pro_id`) REFERENCES `productos` (`pro_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `productos_has_imagen`
--
ALTER TABLE `productos_has_imagen`
  ADD CONSTRAINT `fk_productos_has_imagen_imagen1` FOREIGN KEY (`imagen_img_id`) REFERENCES `imagen` (`img_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_productos_has_imagen_productos1` FOREIGN KEY (`productos_pro_id`) REFERENCES `productos` (`pro_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_usuarios_roles1` FOREIGN KEY (`roles_ro_id`) REFERENCES `roles` (`ro_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `fk_usuarios_has_productos_productos1` FOREIGN KEY (`productos_pro_id`) REFERENCES `productos` (`pro_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuarios_has_productos_usuarios1` FOREIGN KEY (`usuarios_us_id`) REFERENCES `usuarios` (`us_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ventas_estados1` FOREIGN KEY (`estados_id`) REFERENCES `estados` (`id_estado`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;