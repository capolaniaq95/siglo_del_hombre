<?php
require "conexion.php";

$categoria_resultado = $mysqli->query("SELECT id_categoria, categoria FROM categoria");
if (!$categoria_resultado) {
    echo "Error al obtener categorías: " . $mysqli->error;
    exit();
}

$autor_resultado = $mysqli->query("SELECT id_autor, nombre FROM autor");
if (!$autor_resultado) {
    echo "Error al obtener autores: " . $mysqli->error;
    exit();
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $categoria = $_POST["categoria"];
    $autor = $_POST["autor"];
    $titulo = $_POST["titulo"];
    $descripcion = $_POST["descripcion"];
    $fecha_publicacion = $_POST["fecha_publicacion"];
    $editorial = $_POST["editorial"];
    $precio = $_POST["precio"];
    $imagen = $_FILES["imagen"]["name"];

    
    $imagen_directorio = "ruta/directorio/imagenes/" . basename($imagen);
    move_uploaded_file($_FILES["imagen"]["tmp_name"], $imagen_directorio);

 
    $sql = "INSERT INTO libro (id_categoria, id_autor, titulo, descripcion, fecha_publicacion, editorial, precio, imagen) VALUES ('$categoria', '$autor', '$titulo', '$descripcion', '$fecha_publicacion', '$editorial', '$precio', '$imagen')";
    if ($mysqli->query($sql) === TRUE) {
        echo '<script>alert("Libro ingresado exitosamente.");</script>';
        echo '<script>window.location.href = "listalibros.php";</script>';
        exit();
    } else {
        echo "Error al guardar el libro: " . $mysqli->error;
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
  <title>Ingresar Libro</title>
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
        <h2 class="text-center mb-4" style="color: #0EADD2;">Ingresar Nuevo Libro</h2>
        <div class="custom-form-container">
          <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data">
            <div class="form-group">
              <label for="categoria">Categoría</label>
              <select class="form-control" id="categoria" name="categoria" required>
                <?php while ($categoria = $categoria_resultado->fetch_assoc()) : ?>
                  <option value="<?php echo $categoria['id_categoria']; ?>"><?php echo $categoria['categoria']; ?></option>
                <?php endwhile; ?>
              </select>
            </div>
            <div class="form-group">
              <label for="autor">Autor</label>
              <select class="form-control" id="autor" name="autor" required>
                <?php while ($autor = $autor_resultado->fetch_assoc()) : ?>
                  <option value="<?php echo $autor['id_autor']; ?>"><?php echo $autor['nombre']; ?></option>
                <?php endwhile; ?>
              </select>
            </div>
            <div class="form-group">
              <label for="titulo">Título</label>
              <input type="text" class="form-control" id="titulo" name="titulo" required>
            </div>
            <div class="form-group">
              <label for="descripcion">Descripción</label>
              <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required></textarea>
            </div>
            <div class="form-group">
              <label for="fecha_publicacion">Fecha de Publicación</label>
              <input type="date" class="form-control" id="fecha_publicacion" name="fecha_publicacion" required>
            </div>
            <div class="form-group">
              <label for="editorial">Editorial</label>
              <input type="text" class="form-control" id="editorial" name="editorial" required>
            </div>
            <div class="form-group">
              <label for="precio">Precio</label>
              <input type="number" step="0.01" class="form-control" id="precio" name="precio" required>
            </div>
            <div class="form-group">
              <label for="imagen">Imagen</label>
              <input type="file" class="form-control-file" id="imagen" name="imagen" required>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
