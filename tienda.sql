-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-12-2021 a las 23:48:27
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 7.4.26

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
(8, 'sofas', 1, '2021-11-19 19:14:26', '2021-12-14 18:51:12', 'sofas.jpg'),
(9, 'mesas', 1, '2021-11-19 19:14:28', '2021-12-14 19:11:32', 'mesas.webp'),
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
  `di_numero` varchar(45) DEFAULT NULL,
  `di_latitud` float DEFAULT NULL,
  `di_longitud` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `direcciones`
--

INSERT INTO `direcciones` (`di_id`, `di_nombre`, `di_numero`, `di_latitud`, `di_longitud`) VALUES
(4, 'calle', NULL, -18.479, -70.2925),
(5, 'inacap', NULL, -18.4691, -70.3028),
(6, 'estadio', NULL, NULL, NULL),
(29, 'ewq', NULL, -18.4777, -70.3226),
(30, 'ewq', NULL, -18.4777, -70.3226),
(31, 'ewq', NULL, -18.4777, -70.3226),
(32, 'ewq', NULL, -18.4777, -70.3226),
(33, 'ewq', NULL, -18.4777, -70.3226),
(34, 'ewq', NULL, -18.4777, -70.3226),
(35, 'ewq', NULL, -18.4777, -70.3226),
(36, 'ewq', NULL, -18.4777, -70.3226),
(37, 'ewq', NULL, -18.4777, -70.3226),
(38, 'ewq', NULL, -18.4777, -70.3226),
(39, 'w', NULL, -18.594, -69.4785),
(40, 'w', NULL, -18.594, -69.4785),
(41, 'd', NULL, -18.594, -69.4785),
(42, 'ds', NULL, -18.4769, -70.316),
(43, 'casa', NULL, -18.4717, -70.3051),
(44, 's', NULL, -18.594, -69.4785),
(45, 's', NULL, -18.594, -69.4785),
(46, 's', NULL, -18.594, -69.4785),
(47, 'ert', NULL, -18.4688, -70.2973),
(48, 'ss', NULL, NULL, NULL),
(49, 's', NULL, -18.594, -69.4785),
(50, 'calle', NULL, -18.4805, -70.3158),
(51, 'estadio', NULL, -18.4882, -70.2992),
(52, 'inacap', NULL, -18.4691, -70.3028),
(53, 'casa', NULL, -18.4717, -70.3051),
(54, 'inacap', NULL, -18.4691, -70.3028);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direccion_usuarios`
--

CREATE TABLE `direccion_usuarios` (
  `usuarios_us_id` int(11) NOT NULL,
  `direcciones_di_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `direccion_usuarios`
--

INSERT INTO `direccion_usuarios` (`usuarios_us_id`, `direcciones_di_id`) VALUES
(191, 4),
(192, 5),
(192, 4),
(209, 13),
(239, 43),
(2, 12),
(1, 50),
(175, 51);

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
(4, 'Preparado para Reparto'),
(5, 'En Reparto'),
(6, 'Recibido'),
(7, 'Solicitud Cancelacion'),
(8, 'Cancelado');

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
(56, '/resources/images/productos/37', '2021-12-06 22:47:13', '2021-12-06 22:47:13', 'mueble cafe blanco 4 puertas.png'),
(57, '/resources/images/productos/38', '2021-12-06 22:55:23', '2021-12-06 22:55:23', 'closet 4 puertas 1 espejo.png'),
(58, '/resources/images/productos/39', '2021-12-06 23:08:20', '2021-12-06 23:08:20', 'closet 4 puertas 1 espejo.png'),
(59, '/resources/images/productos/40', '2021-12-06 23:08:28', '2021-12-06 23:08:28', 'closet 4 puertas 1 espejo.png'),
(60, '/resources/images/productos/41', '2021-12-06 23:09:50', '2021-12-06 23:09:50', 'closet 4 puertas 1 espejo.png'),
(61, '/resources/images/productos/42', '2021-12-07 14:52:43', '2021-12-07 14:52:43', 'Napr_baseColor.png'),
(62, '/resources/images/productos/42', '2021-12-07 14:52:43', '2021-12-07 14:52:43', 'Napr_normal.png'),
(63, '/resources/images/productos/43', '2021-12-07 14:55:28', '2021-12-07 14:55:28', 'Tumb_KL-010_baseColor.jpeg'),
(64, '/resources/images/productos/43', '2021-12-07 14:55:28', '2021-12-07 14:55:28', 'Tumb_KL-010_metallicRoughness.png'),
(65, '/resources/images/productos/44', '2021-12-07 14:56:05', '2021-12-07 14:56:05', 'Tumb_KL-010_baseColor.jpeg'),
(66, '/resources/images/productos/44', '2021-12-07 14:56:05', '2021-12-07 14:56:05', 'Tumb_KL-010_metallicRoughness.png'),
(67, '/resources/images/productos/45', '2021-12-07 15:07:30', '2021-12-07 15:07:30', 'Napr_normal.png'),
(68, '/resources/images/productos/47', '2021-12-07 15:21:38', '2021-12-07 15:21:38', 'Napr_baseColor.png'),
(69, '/resources/images/productos/48', '2021-12-07 15:26:37', '2021-12-07 15:26:37', 'Napr_baseColor.png'),
(70, '/resources/images/productos/49', '2021-12-07 15:27:29', '2021-12-07 15:27:29', 'Napr_baseColor.png'),
(71, '/resources/images/productos/50', '2021-12-12 18:51:08', '2021-12-12 18:51:08', 'foto.png'),
(72, '/resources/images/productos/51', '2021-12-12 18:55:10', '2021-12-12 18:55:10', 'foto.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `kardex`
--

CREATE TABLE `kardex` (
  `kar_id` int(11) NOT NULL,
  `tipo` varchar(45) DEFAULT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  `unidades` int(11) DEFAULT NULL,
  `fecha` timestamp NULL DEFAULT NULL,
  `pro_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(1, 'akomoda', 'akomoda.png', '2021-11-19 19:10:43', '2021-11-19 19:10:43'),
(2, 'medular', 'medular.PNG', '2021-11-19 19:12:38', '2021-11-19 19:12:38');

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
(3, 'TR123432', 'closet 2 puertas', 100000, 150000, '', '200', '100', '40', NULL, '5', 0, 'closet 2 puertas tabaco 2.png', 'Cafe', 1, '2021-11-19 19:21:27', '2021-11-19 19:21:27', 13, 2),
(4, 'TR21313', 'Closet 3 puertas', 120000, 135000, '', '200', '150', '100', NULL, '10', 0, 'closet 3 puertas blanco natural 2.jpg', 'crema', 1, '2021-11-19 19:27:20', '2021-11-19 19:27:20', 13, 1),
(5, 'TR1233', 'closet 6 puertas', 200000, 230000, '', '', '', '', NULL, '50', 0, 'closet 6 puertas blanco natural 2.jpg', 'crema', 1, '2021-11-19 19:28:51', '2021-11-19 19:28:51', 13, 2),
(6, 'TR34234', 'Closet 6 puertas', 230000, 250000, '', '120', '300', '120', NULL, '50', 0, 'closet 6 puertas chocolate 2.jpg', 'chocolate', 1, '2021-11-19 19:32:13', '2021-11-19 19:32:13', 12, 2),
(50, 'TR22424', 'mesa', 30000, 40000, 'scene.gltf', '30', '23', '23', NULL, '324', 0, 'foto.png', 'blanco', 1, '2021-12-12 18:51:08', '2021-12-12 18:51:08', 9, 1),
(51, 'TR234', 'preuba', 234, 32434, 'untitled.glb', '234', '234', '234', NULL, '234', 0, 'foto.png', 'blanco', 1, '2021-12-12 18:55:10', '2021-12-12 18:55:10', 9, 1);

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
(50, 71),
(51, 72);

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
(1, 'Admin', 'ap_admin', 'ao', '21344223', 'admin@correo.cl', '$2y$10$zKsBAeVGIVpCLE.T1ARQfe73kTf0UHnOGnUu8vyeHUBZiG5n3NPhO', 'calle2', 'hombre', '2021-10-04 18:52:07', '2021-10-04 18:52:07', 2, '1'),
(2, 'usuario', 'user', '2', '123', 'user@correo.cl', '$2y$10$B1hTFm9Z0PULFj7ynOv0Nu3zZ8z2BFUzjWix5v19hklCNWvfvbUM2', '213', 'hombre', '2021-10-06 00:47:18', '2021-10-06 00:47:18', 1, '1'),
(173, 'ensablador', 'ensamblador', '2', '12', 'ensamblador@correo.cl', '$2y$10$Q5PgDzp3tsfcyBzQl8jkbOwyYQ7VzpNLB0tVnn7j/VcA9HwLKUKIK', '123, , , N° 123', 'hombre', '2021-11-18 23:08:45', '2021-11-18 23:08:45', 3, '1'),
(174, 'admin3', 'apellido', 'as', '233213', 'admin2@correo.cl', '$2y$10$G9I9jqBFGibXecCrfzTy5ueglEftEUQDWbDGKG3h6RgJMZTSeFgvW', 'caz, undefined, undefined, N° 123', 'hombre', '2021-11-28 18:06:10', '2021-11-28 18:06:10', 2, '1'),
(175, 'repartidor', 'repartidor', 'repartidor', '123', 'repartidor@correo.cl', '$2y$10$Gan2X/t1Rrvo9iWBvgIB6.eKb7jeKhDpXF1.PiHdBgbDuQMOHuva.', '1234', 'hombre', '2021-12-04 18:56:39', '2021-12-04 18:56:39', 4, '1'),
(192, 'victor', 'huanca', 'cusicanqui', '1234', 'victor@correo.cl', '$2y$10$./DTtk6NXKOA2OXneHOJ3O9VVu5WBacqS0LAm9bmoC7x.ufC6chB2', NULL, 'hombre', '2021-12-05 12:28:48', '2021-12-05 12:28:48', 1, '1'),
(241, 'pepe', 'w', 'w', '123', 'pepe@correo.cl', NULL, 'casa', 'hombre', '2021-12-14 18:39:02', '2021-12-14 18:39:02', 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_stock`
--

CREATE TABLE `usuarios_stock` (
  `prostock_id` int(11) NOT NULL,
  `productos_pro_id` int(11) NOT NULL,
  `usuarios_us_id` int(11) NOT NULL,
  `documento` varchar(45) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `create_time` timestamp NULL DEFAULT NULL,
  `update_time` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `estados_id` int(11) NOT NULL,
  `direcciones_di_id` int(11) NOT NULL
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
  ADD KEY `fk_direccion_usuarios_Direcciones1_idx` (`direcciones_di_id`);

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
-- Indices de la tabla `kardex`
--
ALTER TABLE `kardex`
  ADD PRIMARY KEY (`kar_id`),
  ADD KEY `fk_kardex_productos1_idx` (`pro_id`);

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
-- Indices de la tabla `usuarios_stock`
--
ALTER TABLE `usuarios_stock`
  ADD PRIMARY KEY (`prostock_id`,`productos_pro_id`,`usuarios_us_id`),
  ADD KEY `fk_productos_has_usuarios_usuarios1_idx` (`usuarios_us_id`),
  ADD KEY `fk_productos_has_usuarios_productos1_idx` (`productos_pro_id`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`usuarios_us_id`,`productos_pro_id`,`venta_id`),
  ADD KEY `fk_usuarios_has_productos_productos1_idx` (`productos_pro_id`),
  ADD KEY `fk_usuarios_has_productos_usuarios1_idx` (`usuarios_us_id`),
  ADD KEY `fk_ventas_estados1_idx` (`estados_id`),
  ADD KEY `fk_ventas_Direcciones1_idx` (`direcciones_di_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `armados_tipo`
--
ALTER TABLE `armados_tipo`
  MODIFY `arm_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `direcciones`
--
ALTER TABLE `direcciones`
  MODIFY `di_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT de la tabla `estados`
--
ALTER TABLE `estados`
  MODIFY `id_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `imagen`
--
ALTER TABLE `imagen`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT de la tabla `kardex`
--
ALTER TABLE `kardex`
  MODIFY `kar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de la tabla `marcas`
--
ALTER TABLE `marcas`
  MODIFY `mar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `pro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `ro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `us_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=242;

--
-- AUTO_INCREMENT de la tabla `usuarios_stock`
--
ALTER TABLE `usuarios_stock`
  MODIFY `prostock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `usuarios_us_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=242;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `direccion_usuarios`
--
ALTER TABLE `direccion_usuarios`
  ADD CONSTRAINT `fk_direccion_usuarios_Direcciones1` FOREIGN KEY (`direcciones_di_id`) REFERENCES `direcciones` (`di_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_direccion_usuarios_usuarios1` FOREIGN KEY (`usuarios_us_id`) REFERENCES `usuarios` (`us_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `kardex`
--
ALTER TABLE `kardex`
  ADD CONSTRAINT `fk_kardex_productos1` FOREIGN KEY (`pro_id`) REFERENCES `productos` (`pro_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
-- Filtros para la tabla `usuarios_stock`
--
ALTER TABLE `usuarios_stock`
  ADD CONSTRAINT `fk_productos_has_usuarios_productos1` FOREIGN KEY (`productos_pro_id`) REFERENCES `productos` (`pro_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_productos_has_usuarios_usuarios1` FOREIGN KEY (`usuarios_us_id`) REFERENCES `usuarios` (`us_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `fk_usuarios_has_productos_productos1` FOREIGN KEY (`productos_pro_id`) REFERENCES `productos` (`pro_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuarios_has_productos_usuarios1` FOREIGN KEY (`usuarios_us_id`) REFERENCES `usuarios` (`us_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ventas_Direcciones1` FOREIGN KEY (`Direcciones_di_id`) REFERENCES `direcciones` (`di_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ventas_estados1` FOREIGN KEY (`estados_id`) REFERENCES `estados` (`id_estado`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;