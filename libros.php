<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Libros</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <style>
    .card-custom {
      border: 1px solid #dee2e6;
      border-radius: 0.5rem;
      box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
      transition: transform 0.2s;
    }

    .card-custom:hover {
      transform: scale(1.05);
    }

    .card-img-top {
      height: 25rem;
      object-fit: cover;
    }

    .card-body {
      padding: 1.5rem;
    }

    .card-footer {
      background-color: #f8f9fa;
    }
  </style>
</head>

<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-primary bg-info">
      <div class="container-fluid">
        <!-- Alinea el título a la izquierda -->
        <a class="navbar-brand px-2 text-white" href="index.php">Siglo del Hombre</a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Alinea los elementos del menú a la izquierda utilizando "mr-auto" -->
          <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link text-white" href="libros.php">Libros</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="login.php">Ingresar</a>
            </li>
            <?php
            session_start();
            if (isset($_SESSION["id_usuario"])):
            ?>
              <li class="nav-item">
                <a class="nav-link text-white" href="mis.pedidos.php">Mis Pedidos</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="devolucion.php">Mis Devoluciones</a>
              </li>
              <?php
              if ($_SESSION["id_tipo"] == 1):
              ?>
                <li class="nav-item">
                  <a class="nav-link text-white" href="index.administrador.php">Administrador</a>
                </li>
              <?php
              endif
              ?>
              <li class="nav-item">
                <a class="nav-link text-white" href="logout.php">Logout</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="carrito.php">
                  <i class="fas fa-shopping-cart"></i>
                </a>
              </li>
            <?php
            endif
            ?>
          </ul>
        </div>
      </div>
    </nav>
  </header>


  <section>
    <div class="container" style="padding: 30px;">
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">

        <?php
        // Conexión a la base de datos
        $mysqli = new mysqli('localhost', 'root', '', 'siglo_del_hombre');

        // Verificar la conexión
        if ($mysqli->connect_error) {
          die('Error en la conexión: ' . $mysqli->connect_error);
        }

        // Consulta para obtener los libros con información de autor y categoría
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
                JOIN categoria c ON l.id_categoria = c.id_categoria";

        $result = $mysqli->query($sql);

        if ($result === false) {
          die('Error en la consulta: ' . $mysqli->error);
        }

        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            $imagenRuta = $row['imagen'];
            $idLibro = htmlspecialchars($row["id_libro"], ENT_QUOTES, 'UTF-8');

            echo '<div class="col">';
            echo '<div class="card card-custom h-100">';
            echo '<img src="' . $imagenRuta . '" class="card-img-top" alt="' . htmlspecialchars($row["titulo"], ENT_QUOTES, 'UTF-8') . '">';
            echo '<div class="card-body">';
            echo '<h5 class="card-title">' . htmlspecialchars($row["titulo"], ENT_QUOTES, 'UTF-8') . '</h5>';
            echo '<p class="card-text"><strong>Descripción: </strong>' . htmlspecialchars($row["descripcion"], ENT_QUOTES, 'UTF-8') . '</p>';
            echo '<p class="card-text"><strong>Autor: </strong>' . htmlspecialchars($row["autor"], ENT_QUOTES, 'UTF-8') . '</p>';
            echo '<p class="card-text"><strong>Género: </strong>' . htmlspecialchars($row["genero"], ENT_QUOTES, 'UTF-8') . '</p>';
            echo '<p class="card-text"><strong>Precio: </strong>$' . htmlspecialchars($row["precio"], ENT_QUOTES, 'UTF-8') . '</p>';
            echo '</div>';
            echo '<div class="card-footer">';
            echo '<form method="post" action="agregar.carrito.php">';
            echo '<input type="hidden" name="id_libro" value="' . $idLibro . '">';
            echo '<button type="submit" class="btn" style="background-color: #17a2b8; color: white;">Agregar al Carrito</button>
';

            echo '</form>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
          }
        } else {
          echo "<div class='col-12'><p>No se encontraron libros.</p></div>";
        }

        // Cerrar la conexión
        $mysqli->close();
        ?>

      </div>
    </div>
  </section>

  <footer class="bg-light text-center text-lg-start mt-4">
    <div class="container-fluid p-4 bg-dark" style="background-color: #6c757d;">
      <div class="row">
        <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
          <h5 class="text-uppercase text-white">Contenido del Pie de Página</h5>
          <p class="text-white">Aquí puedes usar filas y columnas para organizar el contenido del pie de página. Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
        </div>
        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
          <h5 class="text-uppercase text-white">images/cienaños</h5>
          <ul class="list-unstyled mb-0">
            <li>
              <a href="#!" class="text-white">Enlace 1</a>
            </li>
            <li>
              <a href="#!" class="text-white">Enlace 2</a>
            </li>
            <li>
              <a href="#!" class="text-white">Enlace 3</a>
            </li>
            <li>
              <a href="#!" class="text-white">Enlace 4</a>
            </li>
          </ul>
        </div>
        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
          <h5 class="text-uppercase text-white">Enlaces</h5>
          <ul class="list-unstyled mb-0">
            <li>
              <a href="#!" class="text-white">Enlace 1</a>
            </li>
            <li>
              <a href="#!" class="text-white">Enlace 2</a>
            </li>
            <li>
              <a href="#!" class="text-white">Enlace 3</a>
            </li>
            <li>
              <a href="#!" class="text-white">Enlace 4</a>
            </li>
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