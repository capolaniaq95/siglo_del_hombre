-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-09-2024 a las 03:25:17
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
  `nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `autor`
--

INSERT INTO `autor` (`id_autor`, `nombre`) VALUES
(1, 'Gabriel Garcia Marquez'),
(2, 'Isabel Allende'),
(3, 'Mario Vargas Llosa'),
(4, 'Jorge Luis Borges'),
(5, 'Pablo Neruda'),
(6, 'Jane Austen'),
(7, 'George Orwell'),
(8, 'J.K. Rowling'),
(9, 'Fyodor Dostoevsky'),
(10, 'Carlos Ruiz Zafón'),
(11, 'Victor Hugo'),
(12, 'carlos'),
(13, 'carlos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL,
  `categoria` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `categoria`) VALUES
(1, 'Novela'),
(2, 'Cuento'),
(3, 'Poesía'),
(4, 'Ensayo'),
(5, 'Teatro'),
(6, 'drama');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `devolucion`
--

CREATE TABLE `devolucion` (
  `id_devolucion` int(11) NOT NULL,
  `id_pedido` int(11) NOT NULL,
  `motivo` varchar(50) NOT NULL,
  `descripcion` text NOT NULL,
  `fecha` varchar(50) NOT NULL,
  `estado` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `devolucion`
--

INSERT INTO `devolucion` (`id_devolucion`, `id_pedido`, `motivo`, `descripcion`, `fecha`, `estado`) VALUES
(10, 38, 'No me gusto el estado del libro', 'mal estado', '2024-09-07T02:53:32', ''),
(11, 38, 'No me gusto el estado del libro', 'mal estado', '2024-09-07T02:54:42', ''),
(12, 80, 'No me gusto el estado del libro', 'mal estado', '2024-09-07T02:55:51', ''),
(13, 79, 'No me gusto el estado del libro', 'hola', '2024-09-07T02:59:49', 'Proceso');

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
(1, 'El Aleph', 'Cuentos mï¿½gicos y surrealistas', 'Sur', 'https://i.postimg.cc/mDCJfy9L/miserables.jpg', 5500, 2, 4, -73, 'No Disponible'),
(2, 'Rayuela', 'Novela experimental', 'Sudamericana', 'https://i.postimg.cc/vH3jsB4V/Rayuela.jpg', 23000, 1, 3, -4, 'No Disponible'),
(3, 'Pedro Pï¿½ramo', 'Realismo mï¿½gico en la narrativa mexicana', 'Fondo de Cultura Econï¿½mica', 'https://i.postimg.cc/mkSnhZVK/pedro-paramo.jpg', 12000, 2, 7, 0, ''),
(4, 'Crimen y Castigo', 'Novela psicolï¿½gica de Dostoievski', 'Alba Editorial', 'https://i.postimg.cc/MGhNFFv3/crimen-y-castigo.jpg', 30000, 1, 8, -5, 'No Disponible'),
(5, 'Don Quijote de la Mancha', 'Obra cumbre de la literatura espaï¿½ola', 'Espasa Calpe', 'https://i.postimg.cc/sgHtpXyr/don-quijote.jpg', 50000, 2, 9, -4, 'No Disponible'),
(6, 'Orgullo y Prejuicio', 'Romance clï¿½sico de Jane Austen', 'Penguin Classics', 'https://i.postimg.cc/1th7HVjL/orgullo-prejuicio.jpg', 10000, 1, 6, -4, 'No Disponible'),
(7, '1984', 'Distopï¿½a futurista de George Orwell', 'Debolsillo', 'https://i.postimg.cc/jSSpwfpc/1984.jpg', 55000, 2, 7, 0, ''),
(8, 'La Sombra del Viento', 'Misterio y literatura en el Barrio Gï¿½tico de Barcelona', 'Planeta', 'https://i.postimg.cc/66VgMzwz/9221003367bb8bc334463a2556e63e24.jpg', 27000, 1, 10, 0, ''),
(9, 'Harry Potter y la Piedra Filosofal', 'Fantasï¿½a juvenil de J.K. Rowling', 'Salamandra', 'https://i.postimg.cc/1th7HVjL/orgullo-prejuicio.jpg', 20000, 2, 8, 0, 'No Disponible'),
(10, 'Los Miserables', 'ï¿½pica novela de Victor Hugo', 'Anaya', 'https://i.postimg.cc/jSSpwfpc/1984.jpg', 36000, 1, 10, 0, 'No Disponible'),
(11, 'EnseÃ±ar a luis vagales', 'pruebas', 'panamericana', 'https://i.postimg.cc/Cx52Lg86/sombra-viento.jpg', 15000, 5, 2, -9, 'No Disponible'),
(12, 'Don don quijote', 'purbeas imagen relacional', 'panamericana', 'https://i.postimg.cc/mkfQz9Cm/aleph.jpg', 12050, 1, 1, -3, 'No Disponible');

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
(1, 10, 0, 8),
(2, 10, 0, 6),
(3, 11, 2, 8),
(4, 11, 1, 6),
(5, 12, 2, 6),
(6, 12, 2, 8),
(7, 12, 2, 3),
(8, 13, 3, 4),
(9, 13, 3, 6);

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
(26, 38, 8, 2, 54000),
(27, 38, 6, 1, 10000),
(28, 39, 7, 12, 660000),
(29, 40, 10, 3, 108000),
(30, 41, 12, 3, 36150),
(31, 42, 12, 3, 36150),
(32, 42, 12, 3, 36150),
(33, 44, 12, 3, 36150),
(34, 44, 12, 3, 36150),
(35, 44, 12, 3, 36150),
(36, 44, 12, 3, 36150),
(37, 44, 12, 3, 36150),
(38, 44, 11, 2, 30000),
(39, 49, 9, 1, 20000),
(52, 62, 1, 2, 46000),
(53, 62, 1, 1, 30000),
(54, 64, 1, 2, 46000),
(55, 64, 1, 1, 30000),
(56, 65, 1, 1, 23000),
(57, 65, 1, 1, 30000),
(58, 65, 1, 1, 10000),
(59, 66, 1, 1, 23000),
(60, 66, 1, 1, 30000),
(61, 66, 1, 1, 10000),
(62, 66, 1, 1, 20000),
(63, 67, 1, 1, 30000),
(64, 67, 1, 1, 10000),
(65, 67, 1, 1, 20000),
(66, 68, 1, 2, 46000),
(67, 68, 1, 2, 60000),
(68, 68, 1, 1, 20000),
(69, 70, 2, 2, 46000),
(70, 70, 4, 2, 60000),
(71, 70, 6, 1, 10000),
(72, 70, 9, 1, 20000),
(73, 71, 2, 2, 46000),
(74, 71, 4, 2, 60000),
(75, 71, 6, 1, 10000),
(76, 71, 9, 1, 20000),
(77, 72, 11, 3, 45000),
(78, 73, 11, 2, 30000),
(79, 73, 11, 2, 30000),
(80, 76, 5, 4, 200000),
(81, 76, 2, 2, 46000),
(82, 77, 4, 2, 60000),
(83, 77, 6, 1, 10000),
(84, 78, 4, 3, 90000),
(85, 78, 6, 3, 30000),
(86, 79, 4, 3, 90000),
(87, 79, 6, 3, 30000),
(88, 80, 6, 2, 20000),
(89, 80, 8, 2, 54000),
(90, 80, 3, 2, 24000),
(91, 81, 4, 2, 60000),
(92, 81, 6, 1, 10000);

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
(22, 18, 10, 1),
(23, 19, 11, 2),
(24, 20, 10, 3),
(25, 21, 10, 4),
(26, 23, 10, 1),
(27, 24, 10, 2),
(28, 25, 10, 1),
(29, 26, 10, 3),
(30, 33, 12, 3),
(31, 34, 12, 3),
(32, 34, 11, 2),
(33, 35, 9, 1),
(34, 36, 9, 1),
(35, 37, 9, 1),
(36, 51, 1, 2),
(37, 51, 1, 1),
(38, 52, 1, 2),
(39, 52, 1, 1),
(40, 53, 1, 1),
(41, 53, 1, 1),
(42, 53, 1, 1),
(43, 54, 1, 1),
(44, 54, 1, 1),
(45, 54, 1, 1),
(46, 54, 1, 1),
(47, 55, 1, 1),
(48, 55, 1, 1),
(49, 55, 1, 1),
(50, 56, 1, 2),
(51, 56, 1, 2),
(52, 56, 1, 1),
(53, 58, 2, 2),
(54, 58, 4, 2),
(55, 58, 6, 1),
(56, 58, 9, 1),
(57, 60, 11, 3),
(58, 61, 11, 2),
(59, 63, 11, 2),
(60, 64, 5, 4),
(61, 64, 2, 2),
(62, 67, 4, 3),
(63, 67, 6, 3),
(64, 68, 6, 2),
(65, 68, 8, 2),
(66, 68, 3, 2),
(67, 69, 4, 2),
(68, 69, 6, 1);

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
  `estado` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `movimiento_inventario`
--

INSERT INTO `movimiento_inventario` (`id_movimiento`, `fecha`, `ubicacion_origen`, `ubicacion_destino`, `tipo_movimiento`, `estado`) VALUES
(18, '2024-08-31T21:54', 2, 1, 'entrada', 'Completado'),
(19, '2024-08-31T21:55', 1, 3, 'salida', 'Completado'),
(20, '2024-08-31T21:57', 1, 3, 'salida', 'Completado'),
(21, '2024-08-31T22:02', 2, 1, 'entrada', 'Completado'),
(22, '2024-09-01T00:03', 1, 3, 'salida', 'Completado'),
(23, '2024-09-01T00:05', 2, 1, 'entrada', 'Completado'),
(24, '2024-09-01T00:06', 2, 1, 'entrada', 'Completado'),
(25, '2024-09-01T01:07', 2, 1, 'entrada', 'Completado'),
(26, '2024-09-01T00:07', 1, 3, 'salida', 'Completado'),
(27, '2024-09-02T20:42', 1, 3, 'entrada', 'Proceso'),
(28, '2024-09-02T20:49', 1, 3, 'salida', 'Proceso'),
(29, '2024-09-02T20:49', 1, 3, 'salida', 'Proceso'),
(30, '2024-09-02T20:49', 1, 3, 'salida', 'Proceso'),
(31, '2024-09-02T20:49', 1, 3, 'salida', 'Proceso'),
(32, '2024-09-02T20:49', 1, 3, 'salida', 'Proceso'),
(33, '2024-09-02T20:49', 1, 3, 'salida', 'Proceso'),
(34, '2024-09-02T20:49', 1, 3, 'salida', 'Proceso'),
(35, '2024-09-02T21:16', 1, 3, 'salida', 'Proceso'),
(36, '2024-09-02T21:16', 2, 1, 'Entrada', 'Completado'),
(37, '2024-09-02T21:17', 2, 1, 'Entrada', 'Completado'),
(38, '2024-09-03 06:55:26', 1, 3, 'salida', 'Completado'),
(39, '2024-09-03 06:56:46', 1, 3, 'salida', 'Completado'),
(40, '2024-09-03 06:59:03', 1, 3, 'salida', 'Completado'),
(41, '2024-09-03 07:01:29', 1, 3, 'salida', 'Completado'),
(42, '2024-09-03 07:01:29', 1, 3, 'salida', 'Completado'),
(43, '2024-09-03 07:03:47', 1, 3, 'salida', 'Completado'),
(44, '2024-09-03 07:05:56', 1, 3, 'salida', 'Completado'),
(45, '2024-09-03 07:05:56', 1, 3, 'salida', 'Completado'),
(46, '2024-09-03 07:05:56', 1, 3, 'salida', 'Completado'),
(47, '2024-09-03 07:05:56', 1, 3, 'salida', 'Completado'),
(48, '2024-09-03 07:05:56', 1, 3, 'salida', 'Completado'),
(49, '2024-09-03 07:15:40', 1, 3, 'salida', 'Completado'),
(50, '2024-09-03 07:17:34', 1, 3, 'salida', 'Completado'),
(51, '2024-09-03 07:17:34', 1, 3, 'salida', 'Completado'),
(52, '2024-09-03 07:19:02', 1, 3, 'salida', 'Completado'),
(53, '2024-09-05 04:08:35', 1, 3, 'salida', 'Completado'),
(54, '2024-09-05 04:55:54', 1, 3, 'salida', 'Completado'),
(55, '2024-09-05 05:01:00', 1, 3, 'salida', 'Completado'),
(56, '2024-09-05 05:10:21', 1, 3, 'salida', 'Proceso'),
(57, '2024-09-05 05:17:09', 1, 3, 'salida', 'Proceso'),
(58, '2024-09-05 05:17:50', 1, 3, 'salida', 'Proceso'),
(59, '2024-09-05 05:23:51', 1, 3, 'salida', 'Proceso'),
(60, '2024-09-04T22:25', 1, 3, 'salida', 'Completado'),
(61, '2024-09-12T21:49', 1, 3, 'salida', 'Completado'),
(62, '', 1, 3, 'salida', 'Completado'),
(63, '2024-09-12T21:49', 1, 3, 'salida', 'Completado'),
(64, '2024-09-05T22:10', 1, 3, 'salida', 'Completado'),
(65, '2024-09-06 05:14:01', 1, 3, 'salida', 'Completado'),
(66, '2024-09-06 05:16:22', 1, 3, 'salida', 'Proceso'),
(67, '2024-09-06 05:20:49', 1, 3, 'salida', 'Completado'),
(68, '2024-09-06 05:28:09', 1, 3, 'salida', 'Proceso'),
(69, '2024-09-12T22:35', 1, 3, 'salida', 'Proceso');

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
(38, 2, 1, '2024-08-21T23:01', 64000, 'publicado'),
(39, 2, 1, '2024-08-21T23:39', 660000, 'publicado'),
(40, 16, 3, '2024-08-16T21:11', 108000, 'publicado'),
(41, 16, 2, '2024-09-02T20:42', 66150, 'publicado'),
(42, 16, 3, '2024-09-02T20:49', 66150, 'publicado'),
(43, 16, 3, '2024-09-02T20:49', 66150, 'publicado'),
(44, 16, 6, '2024-09-02T20:49', 66150, 'publicado'),
(45, 16, 6, '2024-09-02T20:49', 66150, 'publicado'),
(46, 16, 6, '2024-09-02T20:49', 66150, 'publicado'),
(47, 16, 6, '2024-09-02T20:49', 66150, 'publicado'),
(48, 16, 6, '2024-09-02T20:49', 66150, 'publicado'),
(49, 15, 4, '2024-09-02T21:16', 20000, 'publicado'),
(50, 2, 2, '2024-09-03 06:55:26', 86000, 'publicado'),
(51, 2, 1, '2024-09-03 06:56:46', 76000, 'publicado'),
(52, 2, 1, '2024-09-03 06:59:03', 76000, 'publicado'),
(53, 2, 3, '2024-09-03 07:01:29', 86000, 'publicado'),
(54, 2, 3, '2024-09-03 07:01:29', 86000, 'publicado'),
(55, 2, 2, '2024-09-03 07:03:47', 30000, 'publicado'),
(56, 2, 2, '2024-09-03 07:05:56', 76000, 'publicado'),
(57, 2, 2, '2024-09-03 07:05:56', 76000, 'publicado'),
(58, 2, 2, '2024-09-03 07:05:56', 76000, 'publicado'),
(59, 2, 2, '2024-09-03 07:05:56', 76000, 'publicado'),
(60, 2, 2, '2024-09-03 07:05:56', 76000, 'publicado'),
(61, 2, 3, '2024-09-03 07:15:40', 82000, 'publicado'),
(62, 2, 2, '2024-09-03 07:17:34', 76000, 'publicado'),
(63, 2, 2, '2024-09-03 07:17:34', 76000, 'publicado'),
(64, 2, 1, '2024-09-03 07:19:02', 76000, 'publicado'),
(65, 2, 4, '2024-09-05 04:08:35', 63000, 'publicado'),
(66, 2, 3, '2024-09-05 04:55:54', 83000, 'publicado'),
(67, 2, 4, '2024-09-05 05:01:00', 60000, 'publicado'),
(68, 2, 3, '2024-09-05 05:10:21', 126000, 'publicado'),
(69, 2, 4, '2024-09-05 05:17:09', 136000, 'publicado'),
(70, 2, 4, '2024-09-05 05:17:50', 136000, 'publicado'),
(71, 2, 2, '2024-09-05 05:23:51', 136000, 'publicado'),
(72, 17, 4, '2024-09-04T22:25', 45000, 'publicado'),
(73, 15, 4, '2024-09-12T21:49', 30000, 'publicado'),
(75, 15, 4, '2024-09-12T21:49', 30000, 'publicado'),
(76, 19, 1, '2024-09-05T22:10', 246000, 'publicado'),
(77, 2, 3, '2024-09-06 05:14:01', 70000, 'publicado'),
(78, 2, 4, '2024-09-06 05:16:22', 120000, 'publicado'),
(79, 2, 4, '2024-09-06 05:20:49', 120000, 'publicado'),
(80, 2, 2, '2024-09-06 05:28:09', 98000, 'publicado'),
(81, 15, 2, '2024-09-12T22:35', 70000, 'publicado');

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
  MODIFY `id_devolucion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `libro`
--
ALTER TABLE `libro`
  MODIFY `id_libro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `lineas_devolucion`
--
ALTER TABLE `lineas_devolucion`
  MODIFY `id_linea_devolucion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `linea_de_pedido`
--
ALTER TABLE `linea_de_pedido`
  MODIFY `id_linea_de_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT de la tabla `linea_movimiento_inventario`
--
ALTER TABLE `linea_movimiento_inventario`
  MODIFY `id_linea_movimiento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT de la tabla `metodo_de_pago`
--
ALTER TABLE `metodo_de_pago`
  MODIFY `id_metodo_de_pago` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `movimiento_inventario`
--
ALTER TABLE `movimiento_inventario`
  MODIFY `id_movimiento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

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
