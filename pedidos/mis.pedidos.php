<!DOCTYPE html>
<html lang="es">

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
    <div class="d-flex flex-column min-vh-100">
        <header>
            <nav class="navbar navbar-expand-lg navbar-primary bg-info">
                <div class="container-fluid">
                    <a class="navbar-brand px-2 text-white" href="../index.administrador.php">Siglo del Hombre</a>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    </div>
                </div>
            </nav>
        </header>

        <main class="flex-fill">
            <div class="container mt-4">
                <h2>Pedidos</h2>
                <a href="/pedidos/agregar.pedido.php" class="btn btn-info mb-3">Agregar Nuevo Pedido</a>
                <a onclick="window.print()" class="btn btn-info mb-3">Imprimir Informe</a>
                <div>
                    <?php

                    require "../conexion.php";

                    $sql = "SELECT pedido.id_pedido, usuario.nombre, pedido.fecha, pedido.total, metodo_de_pago.metodo
                            FROM pedido
                            INNER JOIN usuario ON pedido.id_usuario=usuario.id_usuario
                            INNER JOIN metodo_de_pago ON pedido.id_metodo_de_pago=metodo_de_pago.id_metodo_de_pago
                            ORDER BY pedido.fecha";

                    $result = $mysqli->query($sql);

                    if (!$result) {
                        echo "<div class='alert alert-danger'>Error en la consulta: " . $mysqli->error . "</div>";
                    } else {
                        if ($result->num_rows > 0) {
                            echo '<table class="table table-striped">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>ID Pedido</th>
                                            <th>Usuario</th>
                                            <th>Fecha</th>
                                            <th>Pago</th>
                                            <th>Total</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>';

                            while ($row = $result->fetch_assoc()) {
                                echo '<tr>
                                        <td>' . htmlspecialchars($row["id_pedido"]) . '</td>
                                        <td>' . htmlspecialchars($row["nombre"]) . '</td>
                                        <td>' . htmlspecialchars($row["fecha"]) . '</td>
                                        <td>' . htmlspecialchars($row["metodo"]) . '</td>
                                        <td>' . htmlspecialchars($row["total"]) . '</td>
                                        <td>
                                            <a href="consultar.pedido.php?id=' . urlencode($row["id_pedido"]) . '" class="btn btn-success btn-sm">Consultar</a>
                                            <a href="devolucion.pedido.php?id=' . urlencode($row["id_pedido"]) . '" class="btn btn-danger btn-sm">Devolución</a>
                                        </td>
                                    </tr>';
                            }
                            echo '</tbody></table>';
                        } else {
                            echo "<div class='alert alert-info'>No hay registros de pedidos.</div>";
                        }

                        $result->free();
                    }

                    $mysqli->close();
                    ?>
                </div>
            </div>
        </main>

        <footer class="bg-dark text-white py-3">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <p>&copy; 2024 Librería Siglo del Hombre. Todos los derechos reservados.</p>
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