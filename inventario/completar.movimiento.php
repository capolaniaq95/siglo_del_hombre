<?php

require '../conexion.php';

if (isset($_GET['id'])){

	$id_movimiento = $_GET['id'];

	$sql = "UPDATE `movimiento_inventario` SET `estado`='Completado' WHERE id_movimiento=$id_movimiento";
	
	$result = $mysqli->query($sql);
	$sql = "SELECT libro.id_libro, libro.estado, linea_movimiento_inventario.cantidad
			FROM linea_movimiento_inventario
			INNER JOIN libro
			ON linea_movimiento_inventario.id_libro = libro.id_libro
			WHERE linea_movimiento_inventario.id_movimiento = $id_movimiento";


	$result = $mysqli->query($sql);


	while ($linea_movimiento = $result->fetch_assoc()){

		$cantidad = intval($linea_movimiento['cantidad']);
		$id_libro = intval($linea_movimiento['id_libro']);

		$sql = "SELECT libro.titulo, libro.stock
				FROM libro
				WHERE id_libro=$id_libro";

		$result = $mysqli->query($sql);
		$libro = $result->fetch_assoc();

        $stock = intval($libro['stock']) - $cantidad;

        $titulo = $libro['titulo'];
       if ($stock > 0){
        $estado = 'Disponible';
        }else {
        $estado = 'No Disponible';
        echo "<div class='alert alert-danger'>Cantidad del libro $titulo(id=$id_libro) menor o igual a 0.</div>";
        }

        $update_stock = "UPDATE `libro` SET `stock`=$stock,`estado`='$estado' WHERE `id_libro`=$id_libro";
        $result_update = $mysqli->query($update_stock);

	}

}




?>