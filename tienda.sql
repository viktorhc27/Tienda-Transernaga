-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-11-2021 a las 17:52:08
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
(8, 'sofas', 1, '2021-11-19 19:14:26', '2021-11-24 18:06:31', 'sofas.jpg'),
(9, 'mesas', 1, '2021-11-19 19:14:28', '2021-11-19 19:14:28', 'mesas.webp'),
(10, 'camas', 1, '2021-11-19 19:14:30', '2021-11-19 19:14:30', 'camas.jpg'),
(11, 'escritorios', 1, '2021-11-19 19:14:33', '2021-11-19 19:14:33', 'escritorios.webp'),
(12, 'comodas', 1, '2021-11-19 19:14:36', '2021-11-19 19:14:36', 'comodas.jpg'),
(13, 'Armarios', 1, '2021-11-19 19:15:30', '2021-11-19 19:15:30', 'armarios.jpg');

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
(1, '/resources/images/productos/3', '2021-11-19 19:21:27', '2021-11-19 19:21:27', 'closet 2 puertas tabaco 2.png'),
(2, '/resources/images/productos/3', '2021-11-19 19:21:27', '2021-11-19 19:21:27', 'closet 2 puertas tabaco 3.png'),
(3, '/resources/images/productos/3', '2021-11-19 19:21:27', '2021-11-19 19:21:27', 'closet 2 puertas tabaco.png'),
(4, '/resources/images/productos/4', '2021-11-19 19:27:20', '2021-11-19 19:27:20', 'closet 3 puertas blanco natural 2.jpg'),
(5, '/resources/images/productos/4', '2021-11-19 19:27:20', '2021-11-19 19:27:20', 'closet 3 puertas blanco natural.jpg'),
(6, '/resources/images/productos/5', '2021-11-19 19:28:51', '2021-11-19 19:28:51', 'closet 6 puertas blanco natural 2.jpg'),
(7, '/resources/images/productos/5', '2021-11-19 19:28:51', '2021-11-19 19:28:51', 'closet 6 puertas blanco natural 3.jpg'),
(8, '/resources/images/productos/5', '2021-11-19 19:28:51', '2021-11-19 19:28:51', 'closet 6 puertas blanco natural.jpg'),
(9, '/resources/images/productos/6', '2021-11-19 19:32:13', '2021-11-19 19:32:13', 'closet 6 puertas chocolate 2.jpg'),
(10, '/resources/images/productos/6', '2021-11-19 19:32:13', '2021-11-19 19:32:13', 'closet 6 puertas chocolate 3.jpg'),
(11, '/resources/images/productos/6', '2021-11-19 19:32:13', '2021-11-19 19:32:13', 'closet 6 puertas chocolate.jpg'),
(12, '/resources/images/productos/7', '2021-11-19 19:41:09', '2021-11-19 19:41:09', '1.jpg'),
(13, '/resources/images/productos/7', '2021-11-19 19:41:09', '2021-11-19 19:41:09', '2.png'),
(14, '/resources/images/productos/8', '2021-11-19 19:44:00', '2021-11-19 19:44:00', 'comoda polux chocolate 2.jpg'),
(15, '/resources/images/productos/8', '2021-11-19 19:44:00', '2021-11-19 19:44:00', 'comoda polux chocolate 3.jpg'),
(16, '/resources/images/productos/8', '2021-11-19 19:44:00', '2021-11-19 19:44:00', 'comoda polux chocolate.jpg'),
(17, '/resources/images/productos/9', '2021-11-19 19:50:17', '2021-11-19 19:50:17', 'comoda polux nogal 2.jpg'),
(18, '/resources/images/productos/9', '2021-11-19 19:50:17', '2021-11-19 19:50:17', 'comoda polux nogal 3.jpg'),
(19, '/resources/images/productos/9', '2021-11-19 19:50:17', '2021-11-19 19:50:17', 'comoda polux nogal.jpg');

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
(1, 'akomoda', '', '2021-11-19 19:10:43', '2021-11-19 19:10:43'),
(2, 'medular', '', '2021-11-19 19:12:38', '2021-11-19 19:12:38'),
(3, 'sander', '', '2021-11-19 19:12:54', '2021-11-19 19:12:54'),
(4, 'taf', '', '2021-11-19 19:12:59', '2021-11-19 19:12:59'),
(5, 'sait', '', '2021-11-19 19:13:02', '2021-11-19 19:13:02'),
(6, 'moldex', '', '2021-11-19 19:13:05', '2021-11-19 19:13:05'),
(7, 'perca', '', '2021-11-19 19:13:18', '2021-11-19 19:13:18');

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
(3, 'TR123432', 'closet 2 puertas', 100000, 150000, '', '200', '100', '40', NULL, '5', 5, 'closet 2 puertas tabaco 2.png', 'Cafe', 0, '2021-11-19 19:21:27', '2021-11-19 19:21:27', 13, 2),
(4, 'TR21313', 'Closet 3 puertas', 120000, 135000, '', '200', '150', '100', NULL, '10', 8, 'closet 3 puertas blanco natural 2.jpg', 'crema', 0, '2021-11-19 19:27:20', '2021-11-19 19:27:20', 13, 4),
(5, 'TR1233', 'closet 6 puertas', 200000, 230000, '', '', '', '', NULL, '50', 10, 'closet 6 puertas blanco natural 2.jpg', 'crema', 0, '2021-11-19 19:28:51', '2021-11-19 19:28:51', 13, 2),
(6, 'TR34234', 'Closet 6 puertas', 230000, 250000, '', '120', '300', '120', NULL, '50', 8, 'closet 6 puertas chocolate 2.jpg', 'chocolate', 0, '2021-11-19 19:32:13', '2021-11-19 19:32:13', 12, 3),
(7, 'TR234234', 'Closet belgica', 200000, 30000, '', '200', '300', '20', NULL, '80', 10, '1.jpg', 'Cafe', 0, '2021-11-19 19:41:09', '2021-11-19 19:41:09', 13, 5),
(8, 'TR23132', 'Comoda 8 cajones', 220000, 280000, '', '150', '130', '100', NULL, '40', 8, 'comoda polux chocolate 2.jpg', 'chocolate', 0, '2021-11-19 19:44:00', '2021-11-19 19:44:00', 12, 2),
(9, 'TR2243234', 'comoda nogal', 300000, 350000, '', '100', '140', '70', NULL, '70', 8, 'comoda polux nogal 2.jpg', 'cafe claro', 0, '2021-11-19 19:50:17', '2021-11-19 19:50:17', 12, 7);

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
(3, 1),
(3, 2),
(3, 3),
(4, 4),
(4, 5),
(5, 6),
(5, 7),
(5, 8),
(6, 9),
(6, 10),
(6, 11),
(7, 12),
(7, 13),
(8, 14),
(8, 15),
(8, 16),
(9, 17),
(9, 18),
(9, 19);

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
(1, 'Admin', 'admin', '2', '123', 'admin@correo.cl', '$2y$10$zKsBAeVGIVpCLE.T1ARQfe73kTf0UHnOGnUu8vyeHUBZiG5n3NPhO', '123', 'hombre', '2021-10-04 18:52:07', '2021-10-04 18:52:07', 2, NULL),
(2, 'usuario', 'user', '2', '123', 'user@correo.cl', '$2y$10$B1hTFm9Z0PULFj7ynOv0Nu3zZ8z2BFUzjWix5v19hklCNWvfvbUM2', '213', 'hombre', '2021-10-06 00:47:18', '2021-10-06 00:47:18', 1, NULL),
(173, 'ensablador', 'ensamblador', '2', '12', 'ensamblador@correo.cl', '$2y$10$Q5PgDzp3tsfcyBzQl8jkbOwyYQ7VzpNLB0tVnn7j/VcA9HwLKUKIK', '123, , , N° 123', 'hombre', '2021-11-18 23:08:45', '2021-11-18 23:08:45', 3, NULL);

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
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

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
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `marcas`
--
ALTER TABLE `marcas`
  MODIFY `mar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `pro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `ro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `us_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=174;

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