<?php
require "conexion.php";
require "funciones_total_subtotal.php";

$orderNumber = $_POST['orderNumber'];
$orderDate = $_POST['orderDate'];
$PayMethod = $_POST['PayMethod'];
$cliente = $_POST['costumer'];
$productos = $_POST['productos'];
$cantidades = $_POST['cantidades'];
$precios = $_POST['precios'];
$totalAmount = get_total($cantidades, $precios);

// Insertar los valores en la tabla pedido

$pedido_sql = "INSERT INTO `pedido`(`id_usuario`, `id_metodo_de_pago`, `total`, `fecha`, `estado`)
VALUES ('$cliente','$PayMethod','$totalAmount','$orderDate','publicado')";

$resultado = $mysqli->query($pedido_sql);

$id_pedido = "SELECT id_pedido FROM pedido WHERE
id_usuario='$cliente' AND id_metodo_de_pago='$PayMethod' AND total='$totalAmount' AND fecha='$orderDate'";

$resultado = $mysqli->query($id_pedido);

$id_pedido = $resultado->fetch_assoc();

$id_pedido = $id_pedido['id_pedido'];

// Insertar los valores en la tabla lineas de pedido

for ($i = 0; $i < count($productos); $i++){

	$subtotal = get_subtotal($cantidades[$i], $precios[$i]);

	$lineas_sql = "INSERT INTO `linea_de_pedido`(`id_pedido`, `id_libro`, `total_linea`, `cantidad`)
	VALUES ('$id_pedido','$productos[$i]','$subtotal','$cantidades[$i]')";

}

	echo "<script>
	alert('Registro ingresado satisfactoriamente');
	window.location='formulario_pedidos.php';
	</script>";

