<?php
require "conexion.php";


if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $id_metodo = $_GET["id"];

    
    $sql = "SELECT * FROM metodo_de_pago WHERE id_metodo_de_pago='$id_metodo'";
    $resultado = $mysqli->query($sql);

    
    if ($resultado->num_rows > 0) {
        $metodo = $resultado->fetch_assoc();
    } else {
        echo "El método de pago no existe.";
        exit();
    }
}


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["editar_metodo"])) {
    $id_metodo = $_POST["id"];
    $nuevo_metodo = $_POST["metodo"];

    $sql = "UPDATE metodo_de_pago SET metodo='$nuevo_metodo' WHERE id_metodo_de_pago='$id_metodo'";
    if ($mysqli->query($sql) === TRUE) {
        echo '<script>alert("Método de pago actualizado exitosamente.");</script>';
        echo '<script>window.location.href = "metodos_de_pago.php";</script>';
        exit();
    } else {
        echo "Error al actualizar el método de pago: " . $mysqli->error;
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
    <title>Editar Método de Pago</title>
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
                <h2 class="text-center mb-4">Editar Método de Pago</h2>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                    <input type="hidden" name="id" value="<?php echo isset($id_metodo) ? $id_metodo : ''; ?>">
                    <div class="form-group">
                        <label for="metodo">Nuevo Método de Pago:</label>
                        <input type="text" class="form-control" id="metodo" name="metodo" value="<?php echo isset($metodo) ? $metodo['metodo'] : ''; ?>" required>
                    </div>
                    <button type="submit" name="editar_metodo" class="btn btn-primary">Guardar Cambios</button>
                    <a href="metodos_de_pago.php" class="btn btn-secondary">Cancelar</a>
                </form>
            </div>
        </div>
    </div>

</body>

</html>
