-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2024 at 03:51 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siglo_del_hombre`
--

-- --------------------------------------------------------

--
-- Table structure for table `autor`
--

CREATE TABLE `autor` (
  `id_autor` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `autor`
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
-- Table structure for table `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL,
  `categoria` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `categoria`
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
-- Table structure for table `devolucion`
--

CREATE TABLE `devolucion` (
  `id_devolucion` int(11) NOT NULL,
  `id_linea_de_pedido` int(11) NOT NULL,
  `motivo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `libro`
--

CREATE TABLE `libro` (
  `id_libro` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `editorial` varchar(255) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `precio` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `id_autor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `libro`
--

INSERT INTO `libro` (`id_libro`, `titulo`, `descripcion`, `editorial`, `imagen`, `precio`, `id_categoria`, `id_autor`) VALUES
(1, 'El Aleph', 'Cuentos mágicos y surrealistas', 'Sur', 'aleph.jpg', 5500, 2, 4),
(2, 'Rayuela', 'Novela experimental', 'Sudamericana', 'rayuela.jpg', 23000, 1, 3),
(3, 'Pedro Páramo', 'Realismo mágico en la narrativa mexicana', 'Fondo de Cultura Económica', 'pedro-paramo.jpg', 12000, 2, 7),
(4, 'Crimen y Castigo', 'Novela psicológica de Dostoievski', 'Alba Editorial', 'crimen-castigo.jpg', 30000, 1, 8),
(5, 'Don Quijote de la Mancha', 'Obra cumbre de la literatura española', 'Espasa Calpe', 'don-quijote.jpg', 50000, 2, 9),
(6, 'Orgullo y Prejuicio', 'Romance clásico de Jane Austen', 'Penguin Classics', 'orgullo-prejuicio.jpg', 10000, 1, 6),
(7, '1984', 'Distopía futurista de George Orwell', 'Debolsillo', '1984.jpg', 55000, 2, 7),
(8, 'La Sombra del Viento', 'Misterio y literatura en el Barrio Gótico de Barcelona', 'Planeta', 'sombra-viento.jpg', 27000, 1, 10),
(9, 'Harry Potter y la Piedra Filosofal', 'Fantasía juvenil de J.K. Rowling', 'Salamandra', 'harry-potter.jpg', 20000, 2, 8),
(10, 'Los Miserables', 'Épica novela de Victor Hugo', 'Anaya', 'miserables.jpg', 36000, 1, 10),
(11, 'EnseÃ±ar a luis vagales', 'pruebas', 'panamericana', '/images/prueba.jpeg', 15000, 5, 2);

-- --------------------------------------------------------

--
-- Table structure for table `linea_de_pedido`
--

CREATE TABLE `linea_de_pedido` (
  `id_linea_de_pedido` int(11) NOT NULL,
  `id_pedido` int(11) NOT NULL,
  `id_libro` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `total_linea` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `linea_de_pedido`
--

INSERT INTO `linea_de_pedido` (`id_linea_de_pedido`, `id_pedido`, `id_libro`, `cantidad`, `total_linea`) VALUES
(26, 38, 8, 2, 54000),
(27, 38, 6, 1, 10000),
(28, 39, 7, 12, 660000);

-- --------------------------------------------------------

--
-- Table structure for table `linea_movimiento_inventario`
--

CREATE TABLE `linea_movimiento_inventario` (
  `id_linea_movimiento` int(11) NOT NULL,
  `id_movimiento` int(11) NOT NULL,
  `id_libro` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `linea_movimiento_inventario`
--

INSERT INTO `linea_movimiento_inventario` (`id_linea_movimiento`, `id_movimiento`, `id_libro`, `cantidad`) VALUES
(1, 1, 1, 5),
(2, 1, 3, 3),
(3, 1, 5, 2),
(4, 2, 2, 1),
(5, 2, 4, 2),
(6, 2, 6, 1),
(7, 3, 7, 4),
(8, 3, 9, 1),
(9, 3, 10, 2),
(10, 4, 8, 3),
(11, 4, 10, 1),
(12, 5, 1, 2),
(13, 5, 3, 1),
(14, 5, 5, 3),
(15, 6, 2, 2),
(16, 6, 4, 1),
(17, 7, 6, 3),
(18, 7, 8, 1),
(19, 8, 9, 2),
(20, 8, 10, 1),
(21, 9, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `metodo_de_pago`
--

CREATE TABLE `metodo_de_pago` (
  `id_metodo_de_pago` int(11) NOT NULL,
  `metodo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `metodo_de_pago`
--

INSERT INTO `metodo_de_pago` (`id_metodo_de_pago`, `metodo`) VALUES
(1, 'Tarjeta de Credito Bancolombia 2'),
(2, 'PayPal'),
(3, 'Transferencia Bancaria'),
(4, 'Efectivo'),
(6, 'bitcoin');

-- --------------------------------------------------------

--
-- Table structure for table `movimiento_inventario`
--

CREATE TABLE `movimiento_inventario` (
  `id_movimiento` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `ubicacion_origen` int(11) NOT NULL,
  `ubicacion_destino` int(11) NOT NULL,
  `tipo_movimiento` enum('entrada','salida','transferencia') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `movimiento_inventario`
--

INSERT INTO `movimiento_inventario` (`id_movimiento`, `fecha`, `ubicacion_origen`, `ubicacion_destino`, `tipo_movimiento`) VALUES
(1, '2024-06-01', 1, 2, 'entrada'),
(2, '2024-06-02', 2, 3, 'salida'),
(3, '2024-06-03', 3, 1, 'transferencia'),
(4, '2024-06-04', 1, 2, 'entrada'),
(5, '2024-06-05', 2, 3, 'salida'),
(6, '2024-06-06', 3, 1, 'transferencia'),
(7, '2024-06-07', 1, 2, 'entrada'),
(8, '2024-06-08', 2, 3, 'salida'),
(9, '2024-06-09', 3, 1, 'transferencia'),
(10, '2024-06-10', 1, 2, 'entrada');

-- --------------------------------------------------------

--
-- Table structure for table `pedido`
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
-- Dumping data for table `pedido`
--

INSERT INTO `pedido` (`id_pedido`, `id_usuario`, `id_metodo_de_pago`, `fecha`, `total`, `estado`) VALUES
(38, 2, 1, '2024-08-21T23:01', 64000, 'publicado'),
(39, 2, 1, '2024-08-21T23:39', 660000, 'publicado');

-- --------------------------------------------------------

--
-- Table structure for table `tipo_de_usuario`
--

CREATE TABLE `tipo_de_usuario` (
  `id_tipo` int(11) NOT NULL,
  `tipo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tipo_de_usuario`
--

INSERT INTO `tipo_de_usuario` (`id_tipo`, `tipo`) VALUES
(1, 'Administrador'),
(2, 'Cliente');

-- --------------------------------------------------------

--
-- Table structure for table `ubicacion`
--

CREATE TABLE `ubicacion` (
  `id_ubicacion` int(11) NOT NULL,
  `ubicacion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `ubicacion`
--

INSERT INTO `ubicacion` (`id_ubicacion`, `ubicacion`) VALUES
(1, 'Almacén Central'),
(2, 'Sucursal Norte'),
(3, 'Sucursal Sur'),
(4, 'Sucursal Este'),
(5, 'Sucursal Oeste');

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
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
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre`, `correo`, `direccion`, `password`, `rol`, `id_tipo`, `celular`) VALUES
(2, 'Maria Garcia', 'carlos@gmail.com', 'Avenida Siempre Viva 742', '123456', 1, 1, '+57 313232306'),
(15, 'Edgar Polania', 'vagales@gmail.com', 'calle 34', '123456', 2, 2, '+57 3214990480'),
(16, 'luis vagales', 'vagales@gmail.com', 'calle 34', '123456', 2, 2, '+57 3214990480');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `autor`
--
ALTER TABLE `autor`
  ADD PRIMARY KEY (`id_autor`);

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indexes for table `devolucion`
--
ALTER TABLE `devolucion`
  ADD PRIMARY KEY (`id_devolucion`),
  ADD KEY `id_linea_de_pedido` (`id_linea_de_pedido`);

--
-- Indexes for table `libro`
--
ALTER TABLE `libro`
  ADD PRIMARY KEY (`id_libro`),
  ADD KEY `id_categoria` (`id_categoria`),
  ADD KEY `id_autor` (`id_autor`);

--
-- Indexes for table `linea_de_pedido`
--
ALTER TABLE `linea_de_pedido`
  ADD PRIMARY KEY (`id_linea_de_pedido`),
  ADD KEY `id_pedido` (`id_pedido`),
  ADD KEY `id_libro` (`id_libro`);

--
-- Indexes for table `linea_movimiento_inventario`
--
ALTER TABLE `linea_movimiento_inventario`
  ADD PRIMARY KEY (`id_linea_movimiento`),
  ADD KEY `id_movimiento` (`id_movimiento`),
  ADD KEY `id_libro` (`id_libro`);

--
-- Indexes for table `metodo_de_pago`
--
ALTER TABLE `metodo_de_pago`
  ADD PRIMARY KEY (`id_metodo_de_pago`);

--
-- Indexes for table `movimiento_inventario`
--
ALTER TABLE `movimiento_inventario`
  ADD PRIMARY KEY (`id_movimiento`),
  ADD KEY `ubicacion_origen` (`ubicacion_origen`),
  ADD KEY `ubicacion_destino` (`ubicacion_destino`);

--
-- Indexes for table `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id_pedido`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_metodo_de_pago` (`id_metodo_de_pago`);

--
-- Indexes for table `tipo_de_usuario`
--
ALTER TABLE `tipo_de_usuario`
  ADD PRIMARY KEY (`id_tipo`);

--
-- Indexes for table `ubicacion`
--
ALTER TABLE `ubicacion`
  ADD PRIMARY KEY (`id_ubicacion`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_tipo` (`id_tipo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `autor`
--
ALTER TABLE `autor`
  MODIFY `id_autor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `devolucion`
--
ALTER TABLE `devolucion`
  MODIFY `id_devolucion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `libro`
--
ALTER TABLE `libro`
  MODIFY `id_libro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `linea_de_pedido`
--
ALTER TABLE `linea_de_pedido`
  MODIFY `id_linea_de_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `linea_movimiento_inventario`
--
ALTER TABLE `linea_movimiento_inventario`
  MODIFY `id_linea_movimiento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `metodo_de_pago`
--
ALTER TABLE `metodo_de_pago`
  MODIFY `id_metodo_de_pago` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `movimiento_inventario`
--
ALTER TABLE `movimiento_inventario`
  MODIFY `id_movimiento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `tipo_de_usuario`
--
ALTER TABLE `tipo_de_usuario`
  MODIFY `id_tipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ubicacion`
--
ALTER TABLE `ubicacion`
  MODIFY `id_ubicacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `devolucion`
--
ALTER TABLE `devolucion`
  ADD CONSTRAINT `devolucion_ibfk_1` FOREIGN KEY (`id_linea_de_pedido`) REFERENCES `linea_de_pedido` (`id_linea_de_pedido`);

--
-- Constraints for table `libro`
--
ALTER TABLE `libro`
  ADD CONSTRAINT `libro_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`),
  ADD CONSTRAINT `libro_ibfk_2` FOREIGN KEY (`id_autor`) REFERENCES `autor` (`id_autor`);

--
-- Constraints for table `linea_de_pedido`
--
ALTER TABLE `linea_de_pedido`
  ADD CONSTRAINT `linea_de_pedido_ibfk_1` FOREIGN KEY (`id_pedido`) REFERENCES `pedido` (`id_pedido`),
  ADD CONSTRAINT `linea_de_pedido_ibfk_2` FOREIGN KEY (`id_libro`) REFERENCES `libro` (`id_libro`);

--
-- Constraints for table `linea_movimiento_inventario`
--
ALTER TABLE `linea_movimiento_inventario`
  ADD CONSTRAINT `linea_movimiento_inventario_ibfk_1` FOREIGN KEY (`id_movimiento`) REFERENCES `movimiento_inventario` (`id_movimiento`),
  ADD CONSTRAINT `linea_movimiento_inventario_ibfk_2` FOREIGN KEY (`id_libro`) REFERENCES `libro` (`id_libro`);

--
-- Constraints for table `movimiento_inventario`
--
ALTER TABLE `movimiento_inventario`
  ADD CONSTRAINT `movimiento_inventario_ibfk_1` FOREIGN KEY (`ubicacion_origen`) REFERENCES `ubicacion` (`id_ubicacion`),
  ADD CONSTRAINT `movimiento_inventario_ibfk_2` FOREIGN KEY (`ubicacion_destino`) REFERENCES `ubicacion` (`id_ubicacion`);

--
-- Constraints for table `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `pedido_ibfk_2` FOREIGN KEY (`id_metodo_de_pago`) REFERENCES `metodo_de_pago` (`id_metodo_de_pago`);

--
-- Constraints for table `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_tipo`) REFERENCES `tipo_de_usuario` (`id_tipo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;