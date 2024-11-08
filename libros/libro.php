<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de productos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <style>
        .image-column {
            max-width: 150px; 
        }
        .image-column a {
            display: block;
            text-overflow: ellipsis;
            overflow: hidden;
            white-space: nowrap;
            max-width: 150px;
        }
    </style>
</head>

<body>
    <div class="d-flex flex-column min-vh-100">
        <header>
            <nav class="navbar navbar-expand-lg navbar-primary bg-info">
                <div class="container-fluid">
                    <a class="navbar-brand px-2 text-white" href="../index.administrador.php">Siglo del Hombre</a>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
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
                <h2>Libros</h2>
                <div class="d-flex bd-highlight mb-1">
                    <div class="pr-2 bd-highlight">
                        <a href="agregar.libro.php" class="btn btn-info mb-3">Agregar Nuevo libro</a>
                        <a onclick="window.print()" class="btn btn-info mb-3">Imprimir Informe</a>
                    </div>
                    <div class="ml-auto pr-2 bd-highlight">
                        <form class="form-inline my-2 my-lg-0" method="POST" action="libro.php">
                                <select class="form-control mr-1" id="filtro" name="filtro">
                                    <option value="id_libro">ID</option>
                                    <option value="autor">Autor</option>
                                    <option value="categoria">Categoria</option>
                                    <option value="titulo">Titulo</option>
                                    <option value="editorial">Editorial</option>
                                    <option value="estado">Estado</option>
                                </select>
                            <input class="form-control mr-sm-1" type="search" placeholder="Buscar" aria-label="Search" name="search">
                            <button class="btn btn-success my-1 my-sm-0" type="submit">Buscar</button>
                        </form>
                    </div>
                </div>

                <div>
                    <?php
                    require '../conexion.php';

                    if (isset($_GET['page'])){
                        $page = (int) $_GET['page'];

                        $page = (int) ($page - 1) * 10;


                        $sql = "SELECT libro.id_libro, categoria.categoria, autor.nombre, libro.titulo, libro.descripcion, libro.editorial, libro.precio, libro.imagen, libro.stock, libro.estado
                                FROM libro
                                INNER JOIN categoria ON libro.id_categoria=categoria.id_categoria
                                INNER JOIN autor ON libro.id_autor=autor.id_autor
                                ORDER by id_libro 
                                DESC
                                LIMIT 10 OFFSET $page";

                    }
                    else if (isset($_POST["search"])){
                        
                        $by = $_POST['filtro'];
                        $search = $_POST['search'];

                        if ($by == 'autor'){
                            $by = 'autor.nombre';
                        }else if ($by == 'categoria'){
                            $by = 'categoria.categoria';
                        } else {
                            $by = 'libro.' . $by;
                        }

                        $sql = "SELECT libro.id_libro, categoria.categoria, autor.nombre, libro.titulo, libro.descripcion, libro.editorial, libro.precio, libro.imagen, libro.stock, libro.estado
                                FROM libro
                                INNER JOIN categoria ON libro.id_categoria=categoria.id_categoria
                                INNER JOIN autor ON libro.id_autor=autor.id_autor
                                WHERE $by LIKE '%$search%'
                                ORDER BY libro.id_libro
                                DESC
                                LIMIT 10";

                    }
                    else{

                    $sql = "SELECT libro.id_libro, categoria.categoria, autor.nombre, libro.titulo, libro.descripcion, libro.editorial, libro.precio, libro.imagen, libro.stock, libro.estado
                    FROM libro
                    INNER JOIN categoria ON libro.id_categoria=categoria.id_categoria
                    INNER JOIN autor ON libro.id_autor=autor.id_autor
                    ORDER by id_libro 
                    DESC
                    LIMIT 10";

                    }

                    $result = $mysqli->query($sql);

                    if (!$result) {
                        echo "<div class='alert alert-danger'>Error en la consulta: " . $mysqli->error . "</div>";
                    } else {
                        if ($result->num_rows > 0) {
                            echo '<table class="table table-striped">
                                    <thead class="thead-dark">
                                        <tr>
                                          <th scope="col">ID libro</th>
                                          <th scope="col">Categoria</th>
                                          <th scope="col">Autor</th>
                                          <th scope="col">Libro</th>
                                          <th scope="col">Descripcion</th>
                                          <th scope="col">Editorial</th>
                                          <th scope="col">Precio</th>
                                          <th scope="col">Stock</th>
                                          <th scope="col">Estado</th>
                                          <th scope="col" class="image-column">Imagen</th>
                                          <th scope="col" style="width: 200px">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>';

                            while ($row = $result->fetch_assoc()) {
                                echo '<tr>
                                        <td>' . htmlspecialchars($row["id_libro"]) . '</td>
                                        <td>' . htmlspecialchars($row["categoria"]) . '</td>
                                        <td>' . htmlspecialchars($row["nombre"]) . '</td>
                                        <td>' . htmlspecialchars($row["titulo"]) . '</td>
                                        <td>' . htmlspecialchars($row["descripcion"]) . '</td>
                                        <td>' . htmlspecialchars($row["editorial"]) . '</td>
                                        <td>' . htmlspecialchars($row["precio"]) . '</td>
                                        <td>' . htmlspecialchars($row["stock"]) . '</td>
                                        <td>' . htmlspecialchars($row["estado"]) . '</td>
                                        <td class="image-column">
                                            <a href="' . htmlspecialchars($row["imagen"]) . '" target="_blank">
                                                Ver Imagen
                                            </a>
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-start">
                                                <a href="editar.libro.php?id=' . urlencode($row["id_libro"]) . '" class="btn btn-success btn-sm mr-2">Editar</a>
                                                <a href="eliminar.libro.php?id=' . urlencode($row["id_libro"]) . '" class="btn btn-danger btn-sm">Eliminar</a>
                                            </div>
                                        </td>
                                    </tr>';
                            }
                            echo '</tbody></table>';
                        } else {
                            echo "<div class='alert alert-info'>No hay registros de libros.</div>";
                        }

                        $result->free();
                    }
                    ?>
                </div>
            </div>
        </main>

        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <?php
                    $query_total = "SELECT COUNT(id_libro) as libros FROM libro";

                    if (isset($_GET['page'])){
                        $previous_page = (int) ($_GET['page'] - 1);
                        if ($previous_page == 0){
                            $previous_page= 1;
                        }
                    }else{
                        $previous_page= 1;
                    }
                    echo '<li class="page-item">
                    <a class="page-link" href="libro.php?page=' . urlencode($previous_page) . '">Anterior</a>
                        </li>';
                    $result_total = $mysqli->query($query_total);

                    $total_results = $result_total->fetch_assoc();

                    $total_results = (int) $total_results["libros"];

                    $pages = ($total_results / 10);

                    $pages = ceil($pages);

                    for ($i = 1; $i <=$pages; $i++){
                        echo '<li class="page-item">
                                <a class="page-link" href="libro.php?page=' . urlencode($i) . '">' . htmlspecialchars($i). '</a>
                                </li>';
                    }
                    if (isset($_GET['page'])){
                        $next_page = (int) $_GET['page'] + 1;
                        if ($next_page > $pages){
                            $next_page = $pages;
                        }
                    }else {
                        $next_page = 2;
                    }
                    echo '<li class="page-item">
                        <a class="page-link" href="libro.php?page=' . urlencode($next_page) . '">Siguiente</a>
                    </li>';
                    ?>
            </ul>
        </nav>

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