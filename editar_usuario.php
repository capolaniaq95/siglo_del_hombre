<?php
require "conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_usuario = $_POST["id_usuario"];
    $correo = $_POST["correo"];
    $direccion = $_POST["direccion"];
    $celular = $_POST["celular"];
    $nombre = $_POST["nombre"];
    $tipo = $_POST["tipo"];

    $sql = "UPDATE usuario SET correo='$correo', direccion='$direccion', celular='$celular', nombre='$nombre', id_tipo='$tipo' WHERE id_usuario='$id_usuario'";
    if ($mysqli->query($sql) === TRUE) {
        echo '<script>alert("Usuario actualizado exitosamente.");</script>';
        echo '<script>window.location.href = "usuarios.php";</script>';
        exit();
    } else {
        echo "Error al actualizar el usuario: " . $mysqli->error;
    }
}

$usuario = null;
if (isset($_GET["id"])) {
    $id_usuario = $_GET["id"];
    $usuario_resultado = $mysqli->query("SELECT * FROM usuario WHERE id_usuario='$id_usuario'");
    if ($usuario_resultado) {
        $usuario = $usuario_resultado->fetch_assoc();
    } else {
        echo "Error al obtener información del usuario: " . $mysqli->error;
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Editar Usuario</title>
    <style>
        .custom-form-container {
            border: 1px solid #0EADD2;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-primary bg-info">
            <div class="container-fluid">
                <a class="navbar-brand px-2 text-white" href="index.php">Siglo del Hombre</a>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="inventario.php">Inventario</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="listalibros.php">Lista de libros</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="pedidos.php">Pedidos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="usuarios.php">Usuarios</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="ubicaciones.php">Ubicaciones</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="devoluciones.php">Devoluciones</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="metodos_de_pago.php">Metodos de pago</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2 class="text-center mb-4" style="color: #0EADD2;">Editar Usuario</h2>
                <div class="custom-form-container">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                        <input type="hidden" name="id_usuario" value="<?php echo $usuario['id_usuario']; ?>">
                        <div class="form-group">
                            <label for="correo">Correo</label>
                            <input type="email" class="form-control" id="correo" name="correo" value="<?php echo $usuario['correo']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="direccion">Dirección</label>
                            <input type="text" class="form-control" id="direccion" name="direccion" value="<?php echo $usuario['direccion']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="celular">Celular</label>
                            <input type="tel" class="form-control" id="celular" name="celular" value="<?php echo $usuario['celular']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $usuario['nombre']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="tipo">Tipo de Usuario</label>
                            <select class="form-control" id="tipo" name="tipo" required>
                                <option value="1" <?php if ($usuario['id_tipo'] == 1) echo 'selected'; ?>>Administrador</option>
                                <option value="2" <?php if ($usuario['id_tipo'] == 2) echo 'selected'; ?>>Usuario</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
