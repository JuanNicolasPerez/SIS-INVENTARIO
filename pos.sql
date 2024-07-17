-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-06-2024 a las 23:18:25
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `categoria` text COLLATE utf8_spanish_ci NOT NULL,
  `feha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id`, `categoria`, `feha`) VALUES
(1, 'Marcadores', '2024-05-26 00:09:14'),
(2, 'CUADERNOS', '2024-05-29 13:44:22'),
(3, 'LIBROS', '2024-05-29 13:44:36'),
(4, 'aromatizante ', '2024-05-31 15:33:36');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `documento` int(11) NOT NULL,
  `email` text COLLATE utf8_spanish_ci NOT NULL,
  `telefono` text COLLATE utf8_spanish_ci NOT NULL,
  `direccion` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `compras` int(11) NOT NULL,
  `ultima_compra` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `documento`, `email`, `telefono`, `direccion`, `fecha_nacimiento`, `compras`, `ultima_compra`, `fecha`) VALUES
(1, 'Ramos Sergio', 24545701, 'ramosser4@gmail.com', '(54) 387-6452551', 'Las Amerias', '1992-08-25', 37, '2024-05-30 02:10:19', '2024-05-30 02:10:19'),
(2, 'Juan Villegas', 12452130, 'yunino2624@gmail.com', '(54) 123-5454254', 'Calle Hipolito', '2015-08-13', 10, '2024-05-31 20:26:22', '2024-05-31 20:26:22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `codigo` text COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `imagen` text COLLATE utf8_spanish_ci NOT NULL,
  `stock` int(11) NOT NULL,
  `precio_compra` float NOT NULL,
  `precio_venta` float NOT NULL,
  `ventas` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `id_categoria`, `codigo`, `descripcion`, `imagen`, `stock`, `precio_compra`, `precio_venta`, `ventas`, `fecha`) VALUES
(1, 1, '101', 'Marcadores x6', 'vistas/img/productos/101/361png', 1, 1500, 1860, 19, '2024-05-29 13:16:58'),
(2, 1, '102', 'Marcadores x12', 'vistas/img/productos/102/391png', 6, 2500, 3100, 14, '2024-05-28 23:32:26'),
(3, 2, '201', 'Cuaderno A4', 'vistas/img/productos/201/764png', 16, 15000, 18600, 4, '2024-05-30 02:10:19'),
(4, 3, '301', 'La Hoja', 'vistas/img/productos/301/630png', 12, 10000, 12400, 3, '2024-05-30 02:10:19'),
(5, 3, '302', 'La Hoja Grande', 'vistas/img/productos/302/790png', 7, 15000, 18600, 3, '2024-05-30 02:10:19'),
(6, 3, '303', 'La Aldea', 'vistas/img/productos/303/238png', 41, 1200, 1488, 4, '2024-05-30 02:10:19'),
(7, 2, '202', 'Cuaderno Carta', 'vistas/img/productos/202/153png', 20, 15000, 18600, 0, '2024-05-29 13:53:50'),
(8, 2, '203', 'Cuaderno oficio', 'vistas/img/productos/203/638png', 10, 20000, 24800, 0, '2024-05-29 13:54:14'),
(9, 2, '204', 'Cuaderno Tapa Dura', 'vistas/img/productos/204/825png', 20, 30000, 37200, 0, '2024-05-29 13:55:07'),
(10, 1, '103', 'Marcadores x36', 'vistas/img/productos/103/130png', 13, 8500, 10540, 0, '2024-05-29 13:55:34'),
(11, 1, '104', 'Marcadores x48', 'vistas/img/productos/104/432png', 10, 9500, 11780, 0, '2024-05-29 13:55:58'),
(12, 1, '105', 'Fibron Negro', 'vistas/img/productos/105/611png', 5, 2000, 2480, 0, '2024-05-29 19:57:33'),
(13, 2, '7908132220163', 'SAPHIRU', 'vistas/img/productos/7908132220163/533png', 2, 2135, 2647.4, 0, '2024-05-29 23:26:23'),
(14, 4, '7908132220200', 'jabon', 'vistas/img/productos/7908132220200/429png', 12, 10000, 12400, 0, '2024-05-31 15:42:40');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `usuario` text COLLATE utf8_spanish_ci NOT NULL,
  `password` text COLLATE utf8_spanish_ci NOT NULL,
  `perfil` text COLLATE utf8_spanish_ci NOT NULL,
  `foto` text COLLATE utf8_spanish_ci NOT NULL,
  `estado` int(11) NOT NULL,
  `ultimo_login` datetime NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `usuario`, `password`, `perfil`, `foto`, `estado`, `ultimo_login`, `fecha`) VALUES
(1, 'Administrador', 'admin', '$2a$07$usesomesillystringforeN7/2NBfGxbAuv02IPrTFBImFJd5PJ1m', 'Administrador', 'vistas/img/usuarios/admin/801png', 1, '2024-05-31 21:21:02', '2024-06-01 00:21:02'),
(17, 'Juan Nicolas Perez', 'Nicolas', '$2a$07$usesomesillystringforeN7/2NBfGxbAuv02IPrTFBImFJd5PJ1m', 'Vendedor', 'vistas/img/usuarios/Nicolas/528jpg', 1, '2024-05-31 21:23:14', '2024-06-01 00:23:14'),
(18, 'Juan Nicolas Perez', 'Perez', '$2a$07$usesomesillystringforeN7/2NBfGxbAuv02IPrTFBImFJd5PJ1m', 'Vendedor', 'vistas/img/usuarios/Perez/242jpg', 1, '2024-05-29 23:27:17', '2024-05-30 02:27:17'),
(19, 'Juan Nicolas Perez', 'Juan', '$2a$07$usesomesillystringforeN7/2NBfGxbAuv02IPrTFBImFJd5PJ1m', 'Supervisor', 'vistas/img/usuarios/Juan/845jpg', 1, '2024-05-31 12:43:36', '2024-05-31 15:43:36');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` int(11) NOT NULL,
  `codigo` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_vendedor` int(11) NOT NULL,
  `productos` text COLLATE utf8_spanish_ci NOT NULL,
  `impuesto` float NOT NULL,
  `neto` float NOT NULL,
  `total` float NOT NULL,
  `metodo_pago` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id`, `codigo`, `id_cliente`, `id_vendedor`, `productos`, `impuesto`, `neto`, `total`, `metodo_pago`, `fecha`) VALUES
(11, 10001, 1, 1, '[{\"id\":\"1\",\"descripcion\":\"Marcadores x6\",\"cantidad\":\"1\",\"stock\":\"3\",\"precio\":\"1860\",\"total\":\"1860\"},{\"id\":\"2\",\"descripcion\":\"Marcadores x12\",\"cantidad\":\"1\",\"stock\":\"7\",\"precio\":\"3100\",\"total\":\"3100\"}]', 0, 4960, 4960, 'Efectivo', '2024-03-18 20:07:13'),
(12, 10002, 1, 17, '[{\"id\":\"1\",\"descripcion\":\"Marcadores x6\",\"cantidad\":\"1\",\"stock\":\"2\",\"precio\":\"1860\",\"total\":\"1860\"},{\"id\":\"2\",\"descripcion\":\"Marcadores x12\",\"cantidad\":\"1\",\"stock\":\"6\",\"precio\":\"3100\",\"total\":\"3100\"}]', 496, 4960, 5456, 'TC-3304', '2024-04-10 11:30:13'),
(13, 10003, 2, 1, '[{\"id\":\"1\",\"descripcion\":\"Marcadores x6\",\"cantidad\":\"1\",\"stock\":\"1\",\"precio\":\"1860\",\"total\":\"1860\"}]', 446.4, 1860, 2306.4, 'Efectivo', '2024-05-28 10:16:58'),
(14, 10004, 1, 1, '[{\"id\":\"3\",\"descripcion\":\"Cuaderno A4\",\"cantidad\":\"1\",\"stock\":\"19\",\"precio\":\"18600\",\"total\":\"18600\"},{\"id\":\"5\",\"descripcion\":\"La Hoja Grande\",\"cantidad\":\"1\",\"stock\":\"9\",\"precio\":\"18600\",\"total\":\"18600\"}]', 0, 37200, 37200, 'Efectivo', '2024-05-14 10:46:46'),
(15, 10005, 1, 1, '[{\"id\":\"4\",\"descripcion\":\"La Hoja\",\"cantidad\":\"1\",\"stock\":\"14\",\"precio\":\"12400\",\"total\":\"12400\"},{\"id\":\"3\",\"descripcion\":\"Cuaderno A4\",\"cantidad\":\"1\",\"stock\":\"18\",\"precio\":\"18600\",\"total\":\"18600\"}]', 0, 31000, 31000, 'TC-4119', '2024-05-13 10:47:11'),
(16, 10006, 1, 1, '[{\"id\":\"3\",\"descripcion\":\"Cuaderno A4\",\"cantidad\":\"2\",\"stock\":\"16\",\"precio\":\"18600\",\"total\":\"37200\"},{\"id\":\"4\",\"descripcion\":\"La Hoja\",\"cantidad\":\"2\",\"stock\":\"12\",\"precio\":\"12400\",\"total\":\"24800\"},{\"id\":\"5\",\"descripcion\":\"La Hoja Grande\",\"cantidad\":\"2\",\"stock\":\"7\",\"precio\":\"18600\",\"total\":\"37200\"},{\"id\":\"6\",\"descripcion\":\"La Aldea\",\"cantidad\":\"4\",\"stock\":\"41\",\"precio\":\"1488\",\"total\":\"5952\"}]', 0, 105152, 105152, 'Efectivo', '2024-05-06 23:10:19');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
