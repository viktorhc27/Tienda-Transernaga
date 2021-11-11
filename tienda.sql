-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-11-2021 a las 19:25:05
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
-- Base de datos: `tienda`
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
  `update_time` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`cat_id`, `cat_nombre`, `cat_estado`, `create_time`, `update_time`) VALUES
(1, 'categoria1', 1, '2021-10-09 23:11:57', '2021-10-09 23:11:57'),
(2, 'categoria2', 1, '2021-11-08 21:18:40', '2021-11-08 21:18:40');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direcciones`
--

CREATE TABLE `direcciones` (
  `dir_id` int(11) NOT NULL,
  `dir_nombre` varchar(50) NOT NULL,
  `dir_numero` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direcciones_usuarios`
--

CREATE TABLE `direcciones_usuarios` (
  `dir_id` int(11) NOT NULL,
  `us_id` int(11) NOT NULL,
  `dirus_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagen`
--

CREATE TABLE `imagen` (
  `img_id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `ruta` varchar(455) DEFAULT NULL,
  `create_time` timestamp NULL DEFAULT current_timestamp(),
  `update_time` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `imagen`
--

INSERT INTO `imagen` (`img_id`, `nombre`, `ruta`, `create_time`, `update_time`) VALUES
(22, '1.jpg', '/resources/images/productos/33', '2021-10-11 00:02:57', '2021-10-11 00:02:57'),
(23, '2.jpg', '/resources/images/productos/33', '2021-10-11 00:02:57', '2021-10-11 00:02:57'),
(24, '3.jpg', '/resources/images/productos/33', '2021-10-11 00:02:57', '2021-10-11 00:02:57'),
(25, '4.jpg', '/resources/images/productos/33', '2021-10-11 00:02:57', '2021-10-11 00:02:57'),
(26, '1.jpg', '/resources/images/productos/34', '2021-10-11 07:03:36', '2021-10-11 07:03:36'),
(27, '2.jpg', '/resources/images/productos/34', '2021-10-11 07:03:36', '2021-10-11 07:03:36'),
(28, '3.jpg', '/resources/images/productos/34', '2021-10-11 07:03:36', '2021-10-11 07:03:36'),
(29, '2.jpg', '/resources/images/productos/35', '2021-10-11 18:19:46', '2021-10-11 18:19:46'),
(30, '3.jpg', '/resources/images/productos/35', '2021-10-11 18:19:46', '2021-10-11 18:19:46'),
(31, '3.jpg', '/resources/images/productos/36', '2021-10-11 20:01:41', '2021-10-11 20:01:41'),
(32, '4.jpg', '/resources/images/productos/36', '2021-10-11 20:01:41', '2021-10-11 20:01:41');

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
(36, '123', '213', 321, 231, NULL, '231', '312', '321', NULL, '321', 231, NULL, '321', 127, '2021-10-11 20:01:41', '2021-10-11 20:01:41', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_has_armados_tipo`
--

CREATE TABLE `productos_has_armados_tipo` (
  `productos_pro_id` int(11) NOT NULL,
  `armados_tipo_arm_id` int(11) NOT NULL,
  `productos_armados_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_has_imagen`
--

CREATE TABLE `productos_has_imagen` (
  `productos_pro_id` int(11) NOT NULL,
  `imagen_img_id` int(11) NOT NULL,
  `productos_imagenes_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `productos_has_imagen`
--

INSERT INTO `productos_has_imagen` (`productos_pro_id`, `imagen_img_id`, `productos_imagenes_id`) VALUES
(33, 22, 0),
(33, 23, 0),
(33, 24, 0),
(33, 25, 0),
(34, 26, 0),
(34, 27, 0),
(34, 28, 0),
(35, 29, 0),
(35, 30, 0),
(36, 31, 0),
(36, 32, 0);

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
(1, 'usuarios', '2021-10-04 00:50:18', '2021-10-04 00:50:18'),
(2, 'admin', '2021-10-04 00:50:51', '2021-10-04 00:50:51');

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
  `roles_ro_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`us_id`, `us_nombre`, `us_apellApp`, `us_apellApm`, `us_telefono`, `us_correo`, `us_password`, `us_direccion`, `us_sexo`, `create_time`, `update_time`, `roles_ro_id`) VALUES
(1, 'victor', 'huanca', 'cusica', '123', 'victor@correo.cl', '$2y$10$zKsBAeVGIVpCLE.T1ARQfe73kTf0UHnOGnUu8vyeHUBZiG5n3NPhO', '123', 'hombre', '2021-10-04 18:52:07', '2021-10-04 18:52:07', 2),
(2, 'usuario', '1', '2', '123', 'user@correo.cl', '$2y$10$B1hTFm9Z0PULFj7ynOv0Nu3zZ8z2BFUzjWix5v19hklCNWvfvbUM2', '213', 'hombre', '2021-10-06 00:47:18', '2021-10-06 00:47:18', 1),
(3, 'qw', 'wq', '', '12', 'c@corr.l', '$2y$10$HS0/MryxTTGw1iSE7Q8IuO0DTD/jnBbb4B6ySGpN21X5692I7YJXq', '123', 'hombre', '2021-10-06 01:50:06', '2021-10-06 01:50:06', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `usuarios_us_id` int(11) NOT NULL,
  `productos_pro_id` int(11) NOT NULL,
  `venta_id` int(11) NOT NULL,
  `ven_total` double NOT NULL,
  `ven_cantidad` int(11) DEFAULT NULL,
  `create_time` timestamp NULL DEFAULT NULL,
  `update_time` timestamp NULL DEFAULT NULL,
  `tipo_armado` varchar(25) DEFAULT NULL,
  `ven_codigo` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  ADD PRIMARY KEY (`dir_id`);

--
-- Indices de la tabla `direcciones_usuarios`
--
ALTER TABLE `direcciones_usuarios`
  ADD PRIMARY KEY (`dirus_id`);

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
  ADD PRIMARY KEY (`productos_pro_id`,`armados_tipo_arm_id`,`productos_armados_id`),
  ADD KEY `fk_productos_has_armados_tipo_armados_tipo1_idx` (`armados_tipo_arm_id`),
  ADD KEY `fk_productos_has_armados_tipo_productos1_idx` (`productos_pro_id`);

--
-- Indices de la tabla `productos_has_imagen`
--
ALTER TABLE `productos_has_imagen`
  ADD PRIMARY KEY (`productos_pro_id`,`imagen_img_id`,`productos_imagenes_id`),
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
  ADD KEY `fk_usuarios_has_productos_usuarios1_idx` (`usuarios_us_id`);

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
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `direcciones`
--
ALTER TABLE `direcciones`
  MODIFY `dir_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `direcciones_usuarios`
--
ALTER TABLE `direcciones_usuarios`
  MODIFY `dirus_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `imagen`
--
ALTER TABLE `imagen`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `marcas`
--
ALTER TABLE `marcas`
  MODIFY `mar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `pro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `ro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `us_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `direcciones_usuarios`
--
ALTER TABLE `direcciones_usuarios`
  ADD CONSTRAINT `direcciones_usuarios_ibfk_1` FOREIGN KEY (`dirus_id`) REFERENCES `direcciones` (`dir_id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `fk_usuarios_has_productos_usuarios1` FOREIGN KEY (`usuarios_us_id`) REFERENCES `usuarios` (`us_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;