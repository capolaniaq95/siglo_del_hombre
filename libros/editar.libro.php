<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Producto</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>

<body>
    <div class="d-flex flex-column min-vh-100">
	<header>
    <nav class="navbar navbar-expand-lg navbar-primary bg-info">
        <div class="container-fluid">
            <!-- Alinea el título a la izquierda -->
            <a class="navbar-brand px-2 text-white" href="../index.administrador.php">Siglo del Hombre</a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Alinea los elementos del menú a la izquierda utilizando "mr-auto" -->
                <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
                <li class="nav-item">
                        <a class="nav-link text-white" href="libro.php">Libros</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="autor.php">Autores</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="categoria.php">Categorias Libro</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
        <main class="flex-fill">
            <div class="container mt-4">

                <div class="container mt-4">
                    <h2>Editar Libro</h2>
                    <?php
					require "../conexion.php";

                    if (isset($_GET['id'])) {
                        $id_libro = $_GET['id'];

                        $sql = "SELECT `titulo`, `descripcion`, `editorial`, `imagen`, `precio`, `id_categoria`, `id_autor` 
								FROM `libro`
								WHERE id_libro=$id_libro";
				
                        $result = $mysqli->query($sql);

                        if ($result && $result->num_rows > 0) {
                            $producto = $result->fetch_assoc();
                        } else {
                            echo "<div class='alert alert-danger'>Producto no encontrado.</div>";
                            $mysqli->close();
                            exit;
                        }

                        $result->free();
                    } else {
                        echo "<div class='alert alert-danger'>ID de producto no proporcionado.</div>";
                        $mysqli->close();
                        exit;
                    }

                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        $producto = $mysqli->real_escape_string($_POST['producto']);
                        $precio = $mysqli->real_escape_string($_POST['precio']);
                        $descripcion = $mysqli->real_escape_string($_POST['descripcion']);
                        $cantidad = $mysqli->real_escape_string($_POST['cantidad']);
                        $estado = $mysqli->real_escape_string($_POST['estado']);

                        $sql = "UPDATE producto SET producto='$producto', precio='$precio', descripcion='$descripcion' WHERE id_producto='$id_producto'";
                        if ($mysqli->query($sql) === TRUE) {
                            echo "<div class='alert alert-success'>Producto actualizado correctamente.</div>";
                            echo "<a href='productos.php' class='btn btn-primary'>Volver a la lista de productos</a>";
                            $mysqli->close();
                            exit;
                        } else {
                            echo "<div class='alert alert-danger'>Error al actualizar el producto: " . $mysqli->error . "</div>";
                        }
                    }
                    ?>

                    <form action="" method="post">
                        <div class="form-group">
                            <label for="producto">Nombre del Producto</label>
                            <input type="text" class="form-control" id="producto" name="producto" value="<?php echo htmlspecialchars($producto['producto']); ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="precio">Precio</label>
                            <input type="text" class="form-control" id="precio" name="precio" value="<?php echo htmlspecialchars($producto['precio']); ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="descripcion">Descripción</label>
                            <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required><?php echo htmlspecialchars($producto['descripcion']); ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="descripcion">Cantidad</label>
                            <input type="text" class="form-control" id="cantidad" name="cantidad" value="<?php echo htmlspecialchars($producto['cantidad']); ?>" readonly required>
                        </div>
                        <div class="form-group">
                            <label for="estado">Estado</label>
                            <select class="form-control" id="estado" name="estado" readonly required>
                                <option value="Disponible" <?php echo ($producto['estado'] == 'Disponible') ? 'selected' : ''; ?>>Disponible</option>
                                <option value="No Disponible" <?php echo ($producto['estado'] == 'No Disponible') ? 'selected' : ''; ?>>No Disponible</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-success">Actualizar Producto</button>
                    </form>
                    <a href="productos.php" class="btn btn-secondary mt-3">Cancelar</a>
                </div>
        </main>

        <footer class="bg-dark text-white py-3">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <p>&copy; 2024 Ferretería Vagales. Todos los derechos reservados.</p>
                    </div>
                    <div class="col-md-6 text-right">
                        <a href="contacto.html" class="text-white">Contacto</a> |
                        <a href="privacidad.html" class="text-white">Política de Privacidad</a> |
                        <a href="terminos.html" class="text-white">Términos de Servicio</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy5Yk4pKjmb6/8tJTxXKoO4YHh5tFO4kD2Jg2w2" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-rbsA7j6Fn5vK6e1jlg00uYFnbAM4A2E3xOSKq6xE7cqp9SZO+L/5Q/XfAkG4P1tn" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jG7s3e3SddU6zLZnCTunZ2a6D4iwHeL6vU2f9mB79mKwwm4eD" crossorigin="anonymous"></script>
</body>

</html>