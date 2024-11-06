<?php

require "conexion.php";

if (isset($_POST['query'])) {
	$query = $_POST['query'];
	$sql = "SELECT usuario.name FROM usuario
WHERE nombre LIKE '%" . $mysqli->real_escape_string($query) . "%'";

	$resultado = $mysqli->query($sql);

	if ($resultado->num_rows > 0) {
		while ($fila = $resultado->fetch_assoc()) {
		  echo '<div class="user-item">' . $fila["nombre"] . '</div>';
		}
	  } else {
		echo '<div class="user-item">No hay resultados</div>';
	  }
	$mysqli->close();

}

?>