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
        echo "No se encontraron resultados para la ubicacion ID $id_ubicacion.";
        exit();
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["eliminar_ubicacion"]) && isset($_POST["id"])) {
    $id_ubicacion = $_POST["id"];

    $sql_delete = "DELETE FROM ubicacion WHERE id_ubicacion ='$id_ubicacion'";
    if ($mysqli->query($sql_delete) === TRUE) {
        echo '<script>alert("Ubicacion eliminada exitosamente.");</script>';
        echo '<script>window.location.href = "ubicaciones.php";</script>';
        exit();
    } else {
        echo "Error al eliminar la ubicacion: " . $mysqli->error;
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
    <title>Eliminar Ubicacion</title>
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
                            <a class="nav-link text-white" href="metodos_de_pago.php">Métodos de pago</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2 class="text-center mb-4" style="color: #0EADD2;">Eliminar ubicacion</h2>
                <div class="alert alert-warning" role="alert">
                    ¿Estás seguro que quieres eliminar esta ubicacion?
                </div>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                    <input type="hidden" name="id" value="<?php echo isset($_GET["id"]) ? $_GET["id"] : ''; ?>">
                    <button type="submit" name="eliminar_ubicacion" class="btn btn-danger">Eliminar</button>
                    <a href="ubicaciones.php" class="btn btn-secondary">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
