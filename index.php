<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>index</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4" style="padding: 30px;">
      <div class="col">
        <div class="card card-custom h-100">
          <img src="./images/thumb_1200_1695.png" class="card-img-top" alt="Libro 1" style="height: 25rem;">
          <div class="card-body">
            <h5 class="card-title">Libro 1</h5>
            <p class="card-text">Descripción del libro 1.</p>
          </div>
          <div class="card-footer">
            <small class="text-muted">Última actualización hace 3 minutos</small>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card card-custom h-100">
          <img src="./images/9221003367bb8bc334463a2556e63e24.jpg" class="card-img-top" alt="Libro 2" style="height: 25rem;">
          <div class="card-body">
            <h5 class="card-title">Libro 2</h5>
            <p class="card-text">Descripción del libro 2.</p>
          </div>
          <div class="card-footer">
            <small class="text-muted">Última actualización hace 3 minutos</small>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card card-custom h-100">
          <img src="./images/51K95AV4x2L._SX195_.jpg" class="card-img-top" alt="Libro 4" style="height: 25rem;">
          <div class="card-body">
            <h5 class="card-title">Libro 4</h5>
            <p class="card-text">Descripción del libro 4.</p>
          </div>
          <div class="card-footer">
            <small class="text-muted">Última actualización hace 3 minutos</small>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card card-custom h-100">
          <img src="./images/6e771219a8f91566a1c9a200bc8c3103.jpg" class="card-img-top" alt="Libro 5" style="height: 25rem;">
          <div class="card-body">
            <h5 class="card-title">Libro 5</h5>
            <p class="card-text">Descripción del libro 5.</p>
          </div>
          <div class="card-footer">
            <small class="text-muted">Última actualización hace 3 minutos</small>
          </div>
        </div>
      </div>
    </div>
  </section>

  <footer class="bg-light text-center text-lg-start mt-4">
    <div class="container-fluid p-4 bg-dark" style="background-color: #6c757d;">
      <div class="row">
        <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
          <h5 class="text-uppercase text-white">Footer Content</h5>
          <p class="text-white">Here you can use rows and columns to organize your footer content. Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
        </div>
        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
          <h5 class="text-uppercase text-white">Links</h5>
          <ul class="list-unstyled mb-0">
            <li>
              <a href="#!" class="text-white">Link 1</a>
            </li>
            <li>
              <a href="#!" class="text-white">Link 2</a>
            </li>
            <li>
              <a href="#!" class="text-white">Link 3</a>
            </li>
            <li>
              <a href="#!" class="text-white">Link 4</a>
            </li>
          </ul>
        </div>
        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
          <h5 class="text-uppercase text-white">Links</h5>
          <ul class="list-unstyled mb-0">
            <li>
              <a href="#!" class="text-white">Link 1</a>
            </li>
            <li>
              <a href="#!" class="text-white">Link 2</a>
            </li>
            <li>
              <a href="#!" class="text-white">Link 3</a>
            </li>
            <li>
              <a href="#!" class="text-white">Link 4</a>
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