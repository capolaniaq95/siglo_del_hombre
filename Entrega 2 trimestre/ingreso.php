<?php

require "conexion.php";

$correo = $_POST['email'];
$password = $_POST['password'];
$rol = $_POST['rol'];

if ($rol == 'Administrador'){
	$rol_id = 1;
}
else{
	$rol_id = 2;
}

$query = "SELECT * FROM usuario WHERE correo='$correo' AND password='$password' AND rol=$rol_id";

$queryuser = mysqli_query($mysqli, $query);

$nr = mysqli_num_rows($queryuser);


if ($nr == 1) {
	if($rol_id == 1){
		header("Location: inventario.php");
	}
	else{
		header("Location: index.php");
	}
} else {
    echo "<script> alert('Usuario, contraseña o rol incorrecto.');window.location='login.php' </script>";
}

?>