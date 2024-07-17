<?php

require 'conexion.php';

$mensaje = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $correo = $_POST['correo'];
    $direccion = $_POST['direccion'];
    $celular = $_POST['celular'];
    $nombre = $_POST['nombre'];
    $password = $_POST['password'];
    $id_tipo = $_POST['id_tipo'];

	if ($id_tipo == 'Administrador'){
		$id_tipo = 1;
	}else {
		$id_tipo = 2;
	}


    $sql = "INSERT INTO usuario (correo, direccion, celular, nombre, password, rol, id_tipo)
            VALUES ('$correo', '$direccion', '$celular', '$nombre', '$password', '$id_tipo', '$id_tipo')";

    if ($mysqli->query($sql) === TRUE) {
        $mensaje = 'Registro guardado correctamente.';
    } else {
        $mensaje = 'Error al guardar el registro: ' . $mysqli->error;
    }

    $mysqli->close();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .registro-caja {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
            border: 2px solid #0EAAD2;
            margin-top: 50px;
        }

        .registro-caja h2 {
            color: #0EADD2;
            text-align: center;
            margin-bottom: 30px;
        }



        .btn-registrar {
            background-color: #0EADD2;
            border-color: #0EADD2;
            color: #fff;
        }

        .btn-registrar:hover {
            background-color: #0EADD2;
            border-color: #0EADD2;
            color: #fff;
        }

        .btn-registrar:focus {
            box-shadow: none;
        }

        header {
            background-color: #0EADD2;
            color: #fff;
            padding: 15px 0;
            text-align: center;
        }
    </style>
</head>

<body>
    <header>
        <div class="container-fluid">
			<a class="navbar-brand px-2 text-white" href="inventario.php">Siglo del Hombre</a>
        </div>
    </header>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="registro-caja">
                    <h2 class="mt-4">Registro de Usuario</h2>
                    <?php if (!empty($mensaje)) : ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo $mensaje; ?>
                        </div>
                    <?php endif; ?>
                    <form method="POST">
                        <div class="form-group">
                            <label for="nombre">Nombre:</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" required>
                        </div>
                        <div class="form-group">
                            <label for="direccion">Dirección:</label>
                            <input type="text" class="form-control" id="direccion" name="direccion" required>
                        </div>
                        <div class="form-group">
                            <label for="correo">Correo:</label>
                            <input type="email" class="form-control" id="correo" name="correo" required>
                        </div>
                        <div class="form-group">
                            <label for="celular">Celular:</label>
                            <input type="text" class="form-control" id="celular" name="celular" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Contraseña:</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="form-group">
                            <label for="rol">Rol:</label>
                            <select class="form-control" id="rol" name="id_tipo" required>
                                <option value="Administrador">Administrador</option>
                                <option value="Cliente">Cliente</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-registrar btn-block mt-3">Registrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>