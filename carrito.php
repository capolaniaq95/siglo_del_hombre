<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
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
            <h1>Carrito</h1>
            <form action="procesar_pedido.php" method="POST">
                <div class="row">
                    <?php
                    if (isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])) {
                        // Conectar a la base de datos
                        $mysqli = new mysqli('localhost', 'root', '', 'siglo_del_hombre');

                        if ($mysqli->connect_error) {
                            die('Error en la conexión: ' . $mysqli->connect_error);
                        }

                        // Prepara los IDs de los libros del carrito para la consulta SQL
                        $idsLibros = array_keys($_SESSION['carrito']);
                        $idsLibrosStr = implode(',', array_map('intval', $idsLibros));

                        // Ejecutar la consulta SQL para obtener los detalles de los libros
                        $sql = "SELECT id_libro, titulo, precio FROM libro WHERE id_libro IN ($idsLibrosStr)";
                        $result = $mysqli->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $idLibro = (int)$row['id_libro'];
                                $titulo = htmlspecialchars($row['titulo'], ENT_QUOTES, 'UTF-8');
                                $precio = htmlspecialchars($row['precio'], ENT_QUOTES, 'UTF-8');
                                $cantidad = isset($_SESSION['carrito'][$idLibro]['cantidad']) ? (int)$_SESSION['carrito'][$idLibro]['cantidad'] : 0;

                                echo '<div class="col-md-4 mb-3">';
                                echo '<div class="card">';
                                echo '<div class="card-body">';
                                echo '<h5 class="card-title">' . $titulo . '</h5>';
                                echo '<p class="card-text">Precio: $' . $precio . '</p>';
                                echo '<p class="card-text">Cantidad: ' . $cantidad . '</p>';
                                echo '<input type="hidden" name="libros[' . $idLibro . '][titulo]" value="' . $titulo . '">';
                                echo '<input type="hidden" name="libros[' . $idLibro . '][precio]" value="' . $precio . '">';
                                echo '<input type="number" name="libros[' . $idLibro . '][cantidad]" value="' . $cantidad . '" min="1">';
                                echo '</div>';
                                echo '</div>';
                                echo '</div>';
                            }
                        } else {
                            echo '<p>No hay libros en el carrito.</p>';
                        }

                        $mysqli->close();
                    } else {
                        echo '<p>No hay libros en el carrito.</p>';
                    }
                    ?>
                </div>
                <button type="submit" class="btn btn-primary">Procesar Pedido</button>
            </form>
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