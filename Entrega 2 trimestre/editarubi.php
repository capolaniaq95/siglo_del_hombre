<?php
require "conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $id_ubicacion = $_GET["id"];

    $sql = "SELECT * FROM ubicacion WHERE id_ubicacion='$id_ubicacion'";
    $resultado = $mysqli->query($sql);

    if (!$resultado) {
        echo "Error en la consulta: " . $mysqli->error;
        exit();
    }

    if ($resultado->num_rows === 0) {
        echo "No se encontraron resultados para la ubicación con ID $id_ubicacion.";
        exit();
    }

    $ubicacion = $resultado->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id_ubicacion"])) {
    $id_ubicacion = $_POST["id_ubicacion"];
    $nombre_bodega = $_POST["nombre_bodega"];

    $sql_update = "UPDATE ubicacion SET ubicacion='$nombre_bodega' WHERE id_ubicacion='$id_ubicacion'";
    if ($mysqli->query($sql_update) === TRUE) {
        echo '<script>alert("Ubicación actualizada exitosamente.");</script>';
        echo '<script>window.location.href = "ubicaciones.php";</script>';
        exit();
    } else {
        echo "Error al actualizar la ubicación: " . $mysqli->error;
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
    <title>Editar Ubicación</title>
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
                <h2 class="text-center mb-4" style="color: #0EADD2;">Editar Ubicación</h2>
                <div class="custom-form-container">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                        <input type="hidden" name="id_ubicacion" value="<?php echo $ubicacion['id_ubicacion']; ?>">
                        <div class="form-group">
                            <label for="nombre_bodega">Nombre de la Bodega</label>
                            <input type="text" class="form-control" id="nombre_bodega" name="nombre_bodega" value="<?php echo $ubicacion['ubicacion']; ?>" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <a href="ubicaciones.php" class="btn btn-secondary">Cancelar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
