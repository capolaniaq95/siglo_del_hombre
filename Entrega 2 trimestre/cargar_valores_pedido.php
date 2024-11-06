<?php

require "conexion.php";

$sql = "SELECT usuario.id_usuario, usuario.nombre FROM usuario WHERE rol=2";

$resultado = $mysqli->query($sql);

$options_costumer = "<option value=''>Selecciona un usuario</option>";

if ($resultado->num_rows > 0){
    while($fila = $resultado->fetch_assoc()){
        $options_costumer .= "<option value='" . $fila['id_usuario'] . "'>" . $fila['nombre'] . "</option>";
    }
}

$sql = "SELECT libro.id_libro, libro.titulo, libro.precio FROM libro";

$resultado = $mysqli->query($sql);

$options_libro = "<option value=''>Selecciona un libro</option>";
$libros = [];
if ($resultado->num_rows > 0){
    while($fila = $resultado->fetch_assoc()){
        $options_libro .= "<option value='" . $fila['id_libro'] . "' data-precio='" . $fila['precio'] . "'>" . $fila['titulo'] . "</option>";
        $libros[$fila['id_libro']] = (float) $fila['precio'];
    }
}


$sql = "SELECT * FROM metodo_de_pago";

$resultado = $mysqli->query($sql);
$options_pagos = "<option value=''>Selecciona metodo de pago</option>";

if ($resultado->num_rows > 0){
    while($fila = $resultado->fetch_assoc()){
        $options_pagos .= "<option value='" . $fila['id_metodo_de_pago'] . "'>" . $fila['metodo'] . "</option>";
    }
}


$mysqli->close();

?>