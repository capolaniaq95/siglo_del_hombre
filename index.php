<?php
// Conectar a la base de datos
$mysqli = new mysqli('localhost', 'root', '', 'siglo_del_hombre');

// Verificar la conexión
if ($mysqli->connect_error) {
  die('Error en la conexión: ' . $mysqli->connect_error);
}

// Consulta para obtener los últimos libros con información de autor y categoría
$sql = "SELECT 
            l.id_libro, 
            l.titulo, 
            l.descripcion,  
            l.precio, 
            l.imagen, 
            a.nombre AS autor, 
            c.categoria AS genero
        FROM libro l
        JOIN autor a ON l.id_autor = a.id_autor
        JOIN categoria c ON l.id_categoria = c.id_categoria
        ORDER BY l.id_libro DESC 
        LIMIT 4"; // Ajusta el LIMIT según necesites

$result = $mysqli->query($sql);

if ($result === false) {
  die('Error en la consulta: ' . $mysqli->error);
}

// Obtener los libros en un array
$libros = [];
if ($result->num_rows > 0) {
  while ($fila = $result->fetch_assoc()) {
    $libros[] = $fila;
  }
}

// Cerrar la conexión
$mysqli->close();
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inicio - Siglo del Hombre</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <style>
    body {
      color: #333;
      font-family: 'Arial', sans-serif;
      margin: 0;
      padding: 0;
    }
    .navbar {
      background-color: #00796b;
      border-bottom: 2px solid #004d40;
    }
    .navbar-brand {
      font-weight: bold;
    }
    .navbar-nav .nav-link {
      font-size: 1.1rem;
      font-weight: 500;
    }
    .carousel-inner img {
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }
    .card-custom {
      border: 2px solid #0288d1; /* Borde de color azul */
      border-radius: 15px;
      overflow: hidden;
      box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
      transition: transform 0.3s ease, border-color 0.3s ease;
    }
    .card-custom:hover {
      transform: scale(1.03);
      border-color: black; /* Color del borde en hover */
    }
    .card-img-top {
      border-radius: 15px 15px 0 0;
      height: 20rem; /* Ajusta la altura según sea necesario */
      object-fit: cover;
      width: 100%;
    }
    .card-body {
      background-color: white;
      padding: 1rem;
    }
    .card-footer {
      background-color: #f8f9fa;
      border-top: 1px solid #e0e0e0;
    }
    .container {
      max-width: 1200px;
      margin-top: 30px;
    }
    .novedades {
      color: black; /* Color azul claro */
      font-size: 1.5rem;
      font-weight: bold;
      margin: 20px 0;
    }
    .btn-custom {
      background-color: #007bff;
      color: white;
    }
    .btn-custom:hover {
      background-color: #0056b3;
    }
  </style>
</head>

<body>
<header>
  <nav class="navbar navbar-expand-lg navbar-primary bg-info">
    <div class="container-fluid">
      <a class="navbar-brand px-2 text-white" href="../index.php">Siglo del Hombre</a>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link text-white" href="/cliente/libros.php">Libros</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="/cliente/autores.php">Autores</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="/cliente/categorias.php">Categorías</a>
          </li>

          <?php
          session_start();
          if (isset($_SESSION["id_usuario"])): ?>
            <li class="nav-item">
              <a class="nav-link text-white" href="/cliente/mis.pedidos.php">Mis Pedidos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="/cliente/mis.devolucion.php">Mis Devoluciones</a>
            </li>
            <?php
            if ($_SESSION["id_tipo"] == 1): ?>
              <li class="nav-item">
                <a class="nav-link text-white" href="index.administrador.php">Administrador</a>
              </li>
            <?php endif; ?>
            <li class="nav-item">
              <a class="nav-link text-white" href="logout.php">Logout</a>
            </li>
            <?php if (isset($_SESSION['carrito'])): ?>
              <li class="nav-item">
                <a class="nav-link text-white" href="/cliente/carrito.php">
                  <i class="fas fa-shopping-cart"></i>
                </a>
              </li>
            <?php endif; ?>
          <?php else: ?>
            <li class="nav-item">
              <a class="nav-link text-white" href="login.php">Ingresar</a>
            </li>
          <?php endif; ?>
        </ul>
        <form class="form-inline my-2 my-lg-0" method="POST" action="/cliente/libros.php">
          <input class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Search" name="search">
          <button class="btn btn-success my-2 my-sm-0" type="submit">Buscar</button>
        </form>
      </div>
    </div>
  </nav>
</header>


  <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block w-100" src="./images/8e5da8bd-5e14-6139-f8a9-663145076970_imagen_web.png" alt="First slide" style="max-height: 25rem;">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="./images/f0c09a4e-776e-9a8d-3c7f-6659fa0bb5e4_imagen_web.jpg" alt="Second slide" style="max-height: 25rem;">
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>

  <section>
    <div class="container">
      <div class="novedades">Novedades</div>
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
        <?php foreach ($libros as $libro): ?>
          <div class="col">
            <div class="card card-custom h-100">
              <img src="<?php echo htmlspecialchars($libro['imagen']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($libro['titulo']); ?>">
              <div class="card-body">
                <h5 class="card-title"><?php echo htmlspecialchars($libro['titulo']); ?></h5>
                <p class="card-text">Autor: <?php echo htmlspecialchars($libro['autor']); ?></p>
                <p class="card-text">Género: <?php echo htmlspecialchars($libro['genero']); ?></p>
                <p class="card-text"><?php echo htmlspecialchars($libro['descripcion']); ?></p>
                <p class="card-text">Precio: $<?php echo htmlspecialchars($libro['precio']); ?></p>
              </div>
              <div class="card-footer">
                <small class="text-muted">Última actualización hace <?php echo rand(1, 60); ?> minutos</small>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <footer class="bg-light text-center text-lg-start mt-4">
    <div class="container-fluid p-4 bg-dark" style="background-color: #6c757d;">
      <div class="row">
        <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
          <h5 class="text-uppercase text-white">Footer Content</h5>
          <p class="text-white">Aquí puedes usar filas y columnas para organizar el contenido del pie de página. Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
        </div>
        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
          <h5 class="text-uppercase text-white">Enlaces</h5>
          <ul class="list-unstyled mb-0">
            <li><a href="#!" class="text-white">Enlace 1</a></li>
            <li><a href="#!" class="text-white">Enlace 2</a></li>
            <li><a href="#!" class="text-white">Enlace 3</a></li>
            <li><a href="#!" class="text-white">Enlace 4</a></li>
          </ul>
        </div>
        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
          <h5 class="text-uppercase text-white">Enlaces</h5>
          <ul class="list-unstyled mb-0">
            <li><a href="#!" class="text-white">Enlace 1</a></li>
            <li><a href="#!" class="text-white">Enlace 2</a></li>
            <li><a href="#!" class="text-white">Enlace 3</a></li>
            <li><a href="#!" class="text-white">Enlace 4</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="text-center p-3 text-white bg-dark" style="max-height: 3rem;">
      © 2023 Copyright:
      <a class="text-white" href="#">Siglo del Hombre</a>
    </div>
  </footer>
</body>

</html>
