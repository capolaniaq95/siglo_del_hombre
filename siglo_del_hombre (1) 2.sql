-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-09-2024 a las 04:07:07
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `siglo_del_hombre`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autor`
--

CREATE TABLE `autor` (
  `id_autor` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `imagen` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `autor`
--

INSERT INTO `autor` (`id_autor`, `nombre`, `imagen`) VALUES
(1, 'Gabriel Garcia Marquez', 'https://i.postimg.cc/8cMgH42t/Gabriel-garcia-marquez.jpg'),
(2, 'Isabel Allende', ''),
(3, 'Mario Vargas Llosa', ''),
(4, 'Jorge Luis Borges', ''),
(5, 'Pablo Neruda', ''),
(6, 'Jane Austen', ''),
(7, 'George Orwell', ''),
(8, 'J.K. Rowling', ''),
(9, 'Fyodor Dostoevsky', ''),
(10, 'Carlos Ruiz Zafón', ''),
(11, 'Victor Hugo', ''),
(12, 'carlos', ''),
(13, 'carlos', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL,
  `categoria` varchar(255) NOT NULL,
  `imagen` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `categoria`, `imagen`) VALUES
(1, 'Novela', ''),
(2, 'Cuento', ''),
(3, 'Poesía', ''),
(4, 'Ensayo', ''),
(5, 'Teatro', ''),
(6, 'drama', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `devolucion`
--

CREATE TABLE `devolucion` (
  `id_devolucion` int(11) NOT NULL,
  `id_pedido` int(11) NOT NULL,
  `motivo` varchar(50) NOT NULL,
  `descripcion` text NOT NULL,
  `estado` varchar(50) NOT NULL,
  `referencia` varchar(50) NOT NULL,
  `fecha` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `devolucion`
--

INSERT INTO `devolucion` (`id_devolucion`, `id_pedido`, `motivo`, `descripcion`, `estado`, `referencia`, `fecha`) VALUES
(12, 82, 'libros en mal estado', 'llegaron mojados', 'Aceptada', 'Pedido82', '2024-09-12T04:41:02'),
(14, 83, 'libros en mal estado', 'llegaron vomitados', 'Rechazada', 'Pedido83', '2024-09-12T05:02:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libro`
--

CREATE TABLE `libro` (
  `id_libro` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `editorial` varchar(255) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `precio` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `id_autor` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `estado` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `libro`
--

INSERT INTO `libro` (`id_libro`, `titulo`, `descripcion`, `editorial`, `imagen`, `precio`, `id_categoria`, `id_autor`, `stock`, `estado`) VALUES
(1, 'El Aleph', 'Cuentos mï¿½gicos y surrealistas', 'Sur', 'https://i.postimg.cc/mDCJfy9L/miserables.jpg', 5500, 2, 4, -4, 'No Disponible'),
(2, 'Rayuela', 'Novela experimental', 'Sudamericana', 'https://i.postimg.cc/vH3jsB4V/Rayuela.jpg', 23000, 1, 3, 0, 'No Disponible'),
(3, 'Pedro Pï¿½ramo', 'Realismo mï¿½gico en la narrativa mexicana', 'Fondo de Cultura Econï¿½mica', 'https://i.postimg.cc/mkSnhZVK/pedro-paramo.jpg', 12000, 2, 7, 0, 'No Disponible'),
(4, 'Crimen y Castigo', 'Novela psicolï¿½gica de Dostoievski', 'Alba Editorial', 'https://i.postimg.cc/MGhNFFv3/crimen-y-castigo.jpg', 30000, 1, 8, 0, 'No Disponible'),
(5, 'Don Quijote de la Mancha', 'Obra cumbre de la literatura espaï¿½ola', 'Espasa Calpe', 'https://i.postimg.cc/sgHtpXyr/don-quijote.jpg', 50000, 2, 9, 0, 'No Disponible'),
(6, 'Orgullo y Prejuicio', 'Romance clï¿½sico de Jane Austen', 'Penguin Classics', 'https://i.postimg.cc/1th7HVjL/orgullo-prejuicio.jpg', 10000, 1, 6, -20, 'No Disponible'),
(7, '1984', 'Distopï¿½a futurista de George Orwell', 'Debolsillo', 'https://i.postimg.cc/jSSpwfpc/1984.jpg', 55000, 2, 7, 0, 'No Disponible'),
(8, 'La Sombra del Viento', 'Misterio y literatura en el Barrio Gï¿½tico de Barcelona', 'Planeta', 'https://i.postimg.cc/66VgMzwz/9221003367bb8bc334463a2556e63e24.jpg', 27000, 1, 10, 0, 'No Disponible'),
(9, 'Harry Potter y la Piedra Filosofal', 'Fantasï¿½a juvenil de J.K. Rowling', 'Salamandra', 'https://i.postimg.cc/1th7HVjL/orgullo-prejuicio.jpg', 20000, 2, 8, 0, 'No Disponible'),
(10, 'Los Miserables', 'ï¿½pica novela de Victor Hugo', 'Anaya', 'https://i.postimg.cc/jSSpwfpc/1984.jpg', 36000, 1, 10, -2, 'No Disponible'),
(11, 'EnseÃ±ar a luis vagales', 'pruebas', 'panamericana', 'https://i.postimg.cc/Cx52Lg86/sombra-viento.jpg', 15000, 5, 2, -5, 'No Disponible'),
(12, 'Don don quijote', 'purbeas imagen relacional', 'panamericana', 'https://i.postimg.cc/mkfQz9Cm/aleph.jpg', 12050, 1, 1, 9, 'Disponible');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lineas_devolucion`
--

CREATE TABLE `lineas_devolucion` (
  `id_linea_devolucion` int(11) NOT NULL,
  `id_devolucion` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `id_libro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `lineas_devolucion`
--

INSERT INTO `lineas_devolucion` (`id_linea_devolucion`, `id_devolucion`, `cantidad`, `id_libro`) VALUES
(1, 12, 12, 6),
(2, 12, 2, 10),
(3, 12, 12, 6),
(4, 12, 2, 10),
(5, 14, 5, 11),
(6, 14, 4, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `linea_de_pedido`
--

CREATE TABLE `linea_de_pedido` (
  `id_linea_de_pedido` int(11) NOT NULL,
  `id_pedido` int(11) NOT NULL,
  `id_libro` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `total_linea` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `linea_de_pedido`
--

INSERT INTO `linea_de_pedido` (`id_linea_de_pedido`, `id_pedido`, `id_libro`, `cantidad`, `total_linea`) VALUES
(93, 82, 6, 12, 120000),
(94, 82, 10, 2, 72000),
(95, 82, 1, 4, 22000),
(96, 83, 11, 5, 75000),
(97, 83, 6, 4, 40000),
(98, 84, 3, 1, 12000),
(99, 84, 7, 1, 55000),
(100, 85, 9, 1, 20000),
(101, 85, 3, 1, 12000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `linea_movimiento_inventario`
--

CREATE TABLE `linea_movimiento_inventario` (
  `id_linea_movimiento` int(11) NOT NULL,
  `id_movimiento` int(11) NOT NULL,
  `id_libro` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `linea_movimiento_inventario`
--

INSERT INTO `linea_movimiento_inventario` (`id_linea_movimiento`, `id_movimiento`, `id_libro`, `cantidad`) VALUES
(69, 70, 12, 10),
(70, 71, 12, 1),
(71, 72, 6, 12),
(72, 72, 10, 2),
(73, 72, 1, 4),
(74, 73, 11, 5),
(75, 73, 6, 4),
(76, 74, 3, 1),
(77, 74, 7, 1),
(78, 75, 9, 1),
(79, 75, 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `metodo_de_pago`
--

CREATE TABLE `metodo_de_pago` (
  `id_metodo_de_pago` int(11) NOT NULL,
  `metodo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `metodo_de_pago`
--

INSERT INTO `metodo_de_pago` (`id_metodo_de_pago`, `metodo`) VALUES
(1, 'Tarjeta de Credito Bancolombia 2'),
(2, 'PayPal'),
(3, 'Transferencia Bancaria'),
(4, 'Efectivo'),
(6, 'bitcoin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimiento_inventario`
--

CREATE TABLE `movimiento_inventario` (
  `id_movimiento` int(11) NOT NULL,
  `fecha` varchar(50) NOT NULL,
  `ubicacion_origen` int(11) NOT NULL,
  `ubicacion_destino` int(11) NOT NULL,
  `tipo_movimiento` varchar(50) NOT NULL,
  `estado` varchar(50) NOT NULL,
  `referencia` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `movimiento_inventario`
--

INSERT INTO `movimiento_inventario` (`id_movimiento`, `fecha`, `ubicacion_origen`, `ubicacion_destino`, `tipo_movimiento`, `estado`, `referencia`) VALUES
(70, '2024-09-11 05:18:02', 2, 1, 'entrada', 'Completado', 'AdministradorID2'),
(71, '2024-09-11 05:33:32', 1, 3, 'salida', 'Completado', 'AdministradorID2'),
(72, '2024-09-12 03:45:49', 1, 3, 'salida', 'Completado', ''),
(73, '2024-09-12 03:51:19', 1, 3, 'salida', 'Completado', ''),
(74, '2024-09-12 04:01:10', 1, 3, 'salida', 'Proceso', ''),
(75, '2024-09-12 04:16:31', 1, 3, 'salida', 'Proceso', 'Pedido85');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `id_pedido` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_metodo_de_pago` int(11) NOT NULL,
  `fecha` varchar(50) NOT NULL,
  `total` int(11) NOT NULL,
  `estado` enum('publicado','cancelado') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`id_pedido`, `id_usuario`, `id_metodo_de_pago`, `fecha`, `total`, `estado`) VALUES
(82, 15, 2, '2024-09-12 03:45:49', 214000, 'publicado'),
(83, 18, 6, '2024-09-12 03:51:19', 115000, 'publicado'),
(84, 21, 4, '2024-09-12 04:01:10', 67000, 'publicado'),
(85, 20, 3, '2024-09-12 04:16:31', 32000, 'publicado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_de_usuario`
--

CREATE TABLE `tipo_de_usuario` (
  `id_tipo` int(11) NOT NULL,
  `tipo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `tipo_de_usuario`
--

INSERT INTO `tipo_de_usuario` (`id_tipo`, `tipo`) VALUES
(1, 'Administrador'),
(2, 'Cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ubicacion`
--

CREATE TABLE `ubicacion` (
  `id_ubicacion` int(11) NOT NULL,
  `ubicacion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `ubicacion`
--

INSERT INTO `ubicacion` (`id_ubicacion`, `ubicacion`) VALUES
(1, 'Stock'),
(2, 'Virtual Vendors'),
(3, 'Virtual Customer');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `rol` int(11) NOT NULL,
  `id_tipo` int(11) NOT NULL,
  `celular` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre`, `correo`, `direccion`, `password`, `rol`, `id_tipo`, `celular`) VALUES
(2, 'Maria Garcia', 'carlos@gmail.com', 'Avenida Siempre Viva 742', '123456', 1, 1, '+57 313232306'),
(15, 'Edgar Polania', 'vagales@gmail.com', 'calle 34', '123456', 2, 2, '+57 3214990480'),
(16, 'luis vagales', 'vagales111111111@gmail.com', 'calle 34', '123456', 2, 2, '+57 3214990480'),
(17, 'Edgar Polania', 'carlos_a95@gmail.com', 'calle 34', '123456', 2, 2, '+57 3214990480'),
(18, 'Carmen', 'carmen@gmail.com', 'calle 23', '12345', 2, 2, '+57 3214990480'),
(19, 'Carmen', 'carmen@gmail.com', 'calle 23', '123456', 2, 2, '+57 3214990480'),
(20, 'cristina', 'cristina@gmail.com', 'diagonal', '123456', 2, 2, '+57 3214990480'),
(21, 'luis vagales', 'cristina@gmail.com', 'dg 62 h bis', '321432', 2, 2, '+57 3214990480'),
(22, 'Julia', 'julia@gmail.com', 'calle 12', '123456', 2, 1, '+57 3214990480'),
(24, 'guillermito', 'armando@gmail.com', 'dg 62 h bis', '654321', 1, 1, '+57 3214990480');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `autor`
--
ALTER TABLE `autor`
  ADD PRIMARY KEY (`id_autor`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `devolucion`
--
ALTER TABLE `devolucion`
  ADD PRIMARY KEY (`id_devolucion`),
  ADD KEY `id_pedido` (`id_pedido`);

--
-- Indices de la tabla `libro`
--
ALTER TABLE `libro`
  ADD PRIMARY KEY (`id_libro`),
  ADD KEY `id_categoria` (`id_categoria`),
  ADD KEY `id_autor` (`id_autor`);

--
-- Indices de la tabla `lineas_devolucion`
--
ALTER TABLE `lineas_devolucion`
  ADD PRIMARY KEY (`id_linea_devolucion`),
  ADD KEY `id_devolucion` (`id_devolucion`),
  ADD KEY `id_libro` (`id_libro`);

--
-- Indices de la tabla `linea_de_pedido`
--
ALTER TABLE `linea_de_pedido`
  ADD PRIMARY KEY (`id_linea_de_pedido`),
  ADD KEY `id_pedido` (`id_pedido`),
  ADD KEY `id_libro` (`id_libro`);

--
-- Indices de la tabla `linea_movimiento_inventario`
--
ALTER TABLE `linea_movimiento_inventario`
  ADD PRIMARY KEY (`id_linea_movimiento`),
  ADD KEY `id_movimiento` (`id_movimiento`),
  ADD KEY `id_libro` (`id_libro`);

--
-- Indices de la tabla `metodo_de_pago`
--
ALTER TABLE `metodo_de_pago`
  ADD PRIMARY KEY (`id_metodo_de_pago`);

--
-- Indices de la tabla `movimiento_inventario`
--
ALTER TABLE `movimiento_inventario`
  ADD PRIMARY KEY (`id_movimiento`),
  ADD KEY `ubicacion_origen` (`ubicacion_origen`),
  ADD KEY `ubicacion_destino` (`ubicacion_destino`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id_pedido`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_metodo_de_pago` (`id_metodo_de_pago`);

--
-- Indices de la tabla `tipo_de_usuario`
--
ALTER TABLE `tipo_de_usuario`
  ADD PRIMARY KEY (`id_tipo`);

--
-- Indices de la tabla `ubicacion`
--
ALTER TABLE `ubicacion`
  ADD PRIMARY KEY (`id_ubicacion`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_tipo` (`id_tipo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `autor`
--
ALTER TABLE `autor`
  MODIFY `id_autor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `devolucion`
--
ALTER TABLE `devolucion`
  MODIFY `id_devolucion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `libro`
--
ALTER TABLE `libro`
  MODIFY `id_libro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `lineas_devolucion`
--
ALTER TABLE `lineas_devolucion`
  MODIFY `id_linea_devolucion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `linea_de_pedido`
--
ALTER TABLE `linea_de_pedido`
  MODIFY `id_linea_de_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT de la tabla `linea_movimiento_inventario`
--
ALTER TABLE `linea_movimiento_inventario`
  MODIFY `id_linea_movimiento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT de la tabla `metodo_de_pago`
--
ALTER TABLE `metodo_de_pago`
  MODIFY `id_metodo_de_pago` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `movimiento_inventario`
--
ALTER TABLE `movimiento_inventario`
  MODIFY `id_movimiento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT de la tabla `tipo_de_usuario`
--
ALTER TABLE `tipo_de_usuario`
  MODIFY `id_tipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `ubicacion`
--
ALTER TABLE `ubicacion`
  MODIFY `id_ubicacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `devolucion`
--
ALTER TABLE `devolucion`
  ADD CONSTRAINT `devolucion_ibfk_1` FOREIGN KEY (`id_pedido`) REFERENCES `pedido` (`id_pedido`);

--
-- Filtros para la tabla `libro`
--
ALTER TABLE `libro`
  ADD CONSTRAINT `libro_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`),
  ADD CONSTRAINT `libro_ibfk_2` FOREIGN KEY (`id_autor`) REFERENCES `autor` (`id_autor`);

--
-- Filtros para la tabla `lineas_devolucion`
--
ALTER TABLE `lineas_devolucion`
  ADD CONSTRAINT `lineas_devolucion_ibfk_1` FOREIGN KEY (`id_libro`) REFERENCES `libro` (`id_libro`),
  ADD CONSTRAINT `lineas_devolucion_ibfk_2` FOREIGN KEY (`id_devolucion`) REFERENCES `devolucion` (`id_devolucion`);

--
-- Filtros para la tabla `linea_de_pedido`
--
ALTER TABLE `linea_de_pedido`
  ADD CONSTRAINT `linea_de_pedido_ibfk_1` FOREIGN KEY (`id_pedido`) REFERENCES `pedido` (`id_pedido`),
  ADD CONSTRAINT `linea_de_pedido_ibfk_2` FOREIGN KEY (`id_libro`) REFERENCES `libro` (`id_libro`);

--
-- Filtros para la tabla `linea_movimiento_inventario`
--
ALTER TABLE `linea_movimiento_inventario`
  ADD CONSTRAINT `linea_movimiento_inventario_ibfk_1` FOREIGN KEY (`id_movimiento`) REFERENCES `movimiento_inventario` (`id_movimiento`),
  ADD CONSTRAINT `linea_movimiento_inventario_ibfk_2` FOREIGN KEY (`id_libro`) REFERENCES `libro` (`id_libro`);

--
-- Filtros para la tabla `movimiento_inventario`
--
ALTER TABLE `movimiento_inventario`
  ADD CONSTRAINT `movimiento_inventario_ibfk_1` FOREIGN KEY (`ubicacion_origen`) REFERENCES `ubicacion` (`id_ubicacion`),
  ADD CONSTRAINT `movimiento_inventario_ibfk_2` FOREIGN KEY (`ubicacion_destino`) REFERENCES `ubicacion` (`id_ubicacion`);

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `pedido_ibfk_2` FOREIGN KEY (`id_metodo_de_pago`) REFERENCES `metodo_de_pago` (`id_metodo_de_pago`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_tipo`) REFERENCES `tipo_de_usuario` (`id_tipo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
