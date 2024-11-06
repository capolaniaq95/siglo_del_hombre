<?php
require "conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"])) {
    $id_usuario = $_POST["id"];
    
    
    $sql_delete_linea_pedido = "DELETE FROM linea_de_pedido WHERE id_pedido IN (SELECT id_pedido FROM pedido WHERE id_usuario='$id_usuario')";
    if ($mysqli->query($sql_delete_linea_pedido) === TRUE) {
       
        $sql_delete_pedidos = "DELETE FROM pedido WHERE id_usuario='$id_usuario'";
        if ($mysqli->query($sql_delete_pedidos) === TRUE) {
            
            $sql_delete_usuario = "DELETE FROM usuario WHERE id_usuario='$id_usuario'";
            if ($mysqli->query($sql_delete_usuario) === TRUE) {
                echo '<script>alert("Usuario eliminado exitosamente.");</script>';
                echo '<script>window.location.href = "usuarios.php";</script>';
                exit();
            } else {
                echo "Error al eliminar el usuario: " . $mysqli->error;
            }
        } else {
            echo "Error al eliminar los pedidos asociados al usuario: " . $mysqli->error;
        }
    } else {
        echo "Error al eliminar las líneas de pedido asociadas al usuario: " . $mysqli->error;
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
    <title>Eliminar Usuario</title>
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
                <h2 class="text-center mb-4" style="color: #0EADD2;">Eliminar Usuario</h2>
                <?php
                
                if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
                    $id_usuario = $_GET["id"];
                    $usuario_resultado = $mysqli->query("SELECT nombre FROM usuario WHERE id_usuario='$id_usuario'");
                    if ($usuario_resultado->num_rows > 0) {
                        $usuario = $usuario_resultado->fetch_assoc();
                        $nombre_usuario = $usuario["nombre"];
                    } else {
                        echo "El usuario no existe.";
                        exit();
                    }
                }
                ?>
                <div class="alert alert-warning" role="alert">
                    ¿Estás seguro que quieres eliminar al usuario <strong><?php echo $nombre_usuario; ?></strong>?
                </div>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                    <input type="hidden" name="id" value="<?php echo $id_usuario; ?>">
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                    <a href="usuarios.php" class="btn btn-secondary">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
</body>

</html>

