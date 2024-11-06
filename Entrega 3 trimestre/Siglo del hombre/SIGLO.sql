CREATE TABLE `autor` (
  `id_autor` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id_autor`)
);

-- --------------------------------------------------------
-- Table `categoria`
CREATE TABLE `categoria` (
  `id_categoria` INT NOT NULL AUTO_INCREMENT,
  `categoria` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id_categoria`)
);

-- --------------------------------------------------------
-- Table `libro`
CREATE TABLE `libro` (
  `id_libro` INT NOT NULL AUTO_INCREMENT,
  `titulo` VARCHAR(255) NOT NULL,
  `descripcion` VARCHAR(255) NOT NULL,
   `editorial` VARCHAR(255) NOT NULL,
    `imagen` VARCHAR(255) NOT NULL,
    `stock_minimo` INT NOT NULL,
  `precio` DECIMAL(10,2) NOT NULL,
  `id_categoria` INT NOT NULL,
  `id_autor` INT NOT NULL,
  PRIMARY KEY (`id_libro`),
  FOREIGN KEY (`id_categoria`) REFERENCES `categoria`(`id_categoria`),
  FOREIGN KEY (`id_autor`) REFERENCES `autor`(`id_autor`)
);

-- --------------------------------------------------------
-- Table `USUARIO

CREATE TABLE `tipo_de_usuario`(
	`id_tipo` INT AUTO_INCREMENT,
    `tipo` VARCHAR(50),
    PRIMARY KEY(`id_tipo`)
);



CREATE TABLE `usuario` (
  `id_usuario` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(255) NOT NULL,
    `correo` VARCHAR(255) NOT NULL,
    `direccion` VARCHAR(255),
    `password` VARCHAR(50),
    `rol` INT NOT NULL,
    `id_tipo` INT NOT NULL,
  PRIMARY KEY (`id_usuario`),
    FOREIGN KEY (`id_tipo`) REFERENCES `tipo_de_usuario`(`id_tipo`)
);


CREATE TABLE `metodo_de_pago` (
  `id_metodo_de_pago` int(11) NOT NULL AUTO_INCREMENT,
  `metodo` varchar(50) NOT NULL,
  PRIMARY KEY (id_metodo_de_pago)
);

-- --------------------------------------------------------
-- Table `factura`
CREATE TABLE `pedido` (
  `id_pedido` INT NOT NULL AUTO_INCREMENT,
  `id_usuario` INT NOT NULL,
    `id_metodo_de_pago` INT NOT NULL,
  `fecha` DATE NOT NULL,
    `total` FLOAT NOT NULL,
    `estado` ENUM('publicado', 'cancelado') NOT NULL,
  PRIMARY KEY (`id_pedido`),
  FOREIGN KEY (`id_usuario`) REFERENCES `usuario`(`id_usuario`),
    FOREIGN KEY (`id_metodo_de_pago`) REFERENCES `metodo_de_pago`(`id_metodo_de_pago`)
);

-- --------------------------------------------------------
-- Table `factura_detalle`
CREATE TABLE `linea_de_pedido` (
  `id_linea_de_pedido` INT NOT NULL AUTO_INCREMENT,
  `id_pedido` INT NOT NULL,
  `id_libro` INT NOT NULL,
  `cantidad` INT NOT NULL,
  `total_linea` DECIMAL(10,2) NOT NULL,
  PRIMARY KEY (`id_linea_de_pedido`),
  FOREIGN KEY (`id_pedido`) REFERENCES `pedido`(`id_pedido`),
  FOREIGN KEY (`id_libro`) REFERENCES `libro`(`id_libro`)
);

CREATE TABLE `devolucion` (
  `id_devolucion` int(11) NOT NULL AUTO_INCREMENT,
  `id_linea_de_pedido` int(11) NOT NULL,
  `motivo` varchar(50) NOT NULL,
  PRIMARY KEY (id_devolucion)
);

CREATE TABLE `ubicacion` (
  `id_ubicacion` int(11) NOT NULL AUTO_INCREMENT,
  `ubicacion` varchar(50) NOT NULL,
  PRIMARY KEY (id_ubicacion)
);

-- Table `movimiento_inventario`
CREATE TABLE `movimiento_inventario` (
  `id_movimiento` INT NOT NULL AUTO_INCREMENT,
  `fecha` DATE NOT NULL,
    `ubicacion_origen` 	INT NOT NULL,
    `ubicacion_destino` INT NOT NULL,
  `tipo_movimiento` ENUM('entrada', 'salida', 'transferencia') NOT NULL,
  PRIMARY KEY (`id_movimiento`),
    FOREIGN KEY(`ubicacion_origen`) REFERENCES `ubicacion`(`id_ubicacion`),
    FOREIGN KEY(`ubicacion_destino`) REFERENCES `ubicacion`(`id_ubicacion`)
);

-- --------------------------------------------------------
-- Table `linea_movimiento_inventario`
CREATE TABLE `linea_movimiento_inventario` (
  `id_linea_movimiento` INT NOT NULL AUTO_INCREMENT,
  `id_movimiento` INT NOT NULL,
  `id_libro` INT NOT NULL,
  `cantidad` INT NOT NULL,
  PRIMARY KEY (`id_linea_movimiento`),
  FOREIGN KEY (`id_movimiento`) REFERENCES `movimiento_inventario`(`id_movimiento`),
  FOREIGN KEY (`id_libro`) REFERENCES `libro`(`id_libro`)
);