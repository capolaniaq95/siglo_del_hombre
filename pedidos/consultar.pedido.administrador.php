<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de compras</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="d-flex flex-column min-vh-100">
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
                                <a class="nav-link text-white" href="pedido.php">Pedidos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="Metodo.pago.php">Metodo de Pago</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        <main class="flex-fill">
            <div class="container mt-4">
            <div class="d-flex align-items-center mb-1">
                <div class="pr-2">
                    <h2>Consultar pedido</h2>
                </div>
                <div class="ml-auto">
                    <a href="" class="btn btn-danger">Devolucion</a>
                    <a href="" class="btn btn-success">Entrada</a>
                </div>
            </div>
                <?php
                require "../conexion.php";

                if (isset($_GET['id'])){
                    $id_pedido = $_GET['id'];

                    $query = "SELECT usuario.nombre, metodo_de_pago.metodo, pedido.fecha, pedido.total FROM `pedido`
                             INNER JOIN usuario
                             ON pedido.id_usuario=usuario.id_usuario
                             INNER JOIN metodo_de_pago
                             ON pedido.id_metodo_de_pago=metodo_de_pago.id_metodo_de_pago
                             WHERE pedido.id_pedido=$id_pedido";
                    
                    $result = $mysqli->query($query);

                    $pedido = $result->fetch_assoc();

                    $cliente = $pedido['nombre'];
                    $metodo = $pedido['metodo'];
                    $fecha = $pedido['fecha'];
                    $total = $pedido['total'];
                    
                    $sql = "SELECT libro.titulo, libro.precio, linea_de_pedido.cantidad, linea_de_pedido.total_linea
                            FROM `linea_de_pedido`
                            INNER JOIN libro
                            ON linea_de_pedido.id_libro=libro.id_libro
                            WHERE id_pedido=$id_pedido";

                    $result_linea = $mysqli->query($sql);
            
                ?>
                    <form action="guardar.carrito.pedido.php" method="POST">
                        <div class="form-group">
                            <label for="orderDate">Fecha</label>
                            <input type="text" class="form-control" id="orderDate" name="orderDate" value="<?php echo $fecha; ?>" readonly required>
                        </div>
                        <div class="form-group">
                            <label for="customerName">Nombre del Cliente</label>
                            <input type="text" class="form-control" id="orderDate" name="costomer" value="<?php echo $cliente; ?>" readonly required>
                        </div>
                        <div class="form-group">
                            <label for="paymentmethod">Metodo de Pago</label>
                            <input type="text" class="form-control" id="orderDate" name="orderDate" value="<?php echo $metodo; ?>" readonly required>
                        </div>

                        <h4>Líneas de Pedido</h4>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="orderLinesTable">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Libro</th>
                                        <th>Cantidad</th>
                                        <th>Precio Unitario</th>
                                        <th>Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while($linea_pedido = $result_linea->fetch_assoc()):
                                        $libro = $linea_pedido['titulo'];
                                        $cantidad = intval($linea_pedido['cantidad']);
                                        $precio = floatval($linea_pedido['precio']);
                                        $subtotal = floatval($linea_pedido['total_linea']);
                                    ?>
                                        <tr>
                                            <td><input type="text" class="form-control" name="libros[]" value="<?php echo $libro; ?>" readonly required></td>
                                            <td><input type="number" class="form-control cantidad-input" name="cantidades[]" value="<?php echo $cantidad; ?>" readonly required></td>
                                            <td><input type="number" class="form-control precio-input" name="precios[]" value="<?php echo $precio; ?>" readonly required></td>
                                            <td><input type="number" class="form-control subtotal" name="subtotales[]" value="<?php echo $subtotal; ?>" readonly required></td>
                                        </tr>
                                    <?php endwhile; ?>
                                </tbody>
                            </table>
                        </div>

                        <div class="form-group mt-3">
                            <label for="totalAmount">Total</label>
                            <input type="text" class="form-control" id="totalamount" name="totalamount" value="<?php echo $total; ?>" readonly required>
                        </div>

                        <!-- <button type="submit" class="btn btn-success">Guardar Pedido</button> -->
                        <a href="pedido.php" class="btn btn-secondary">Atras</a>
                    </form>
                <?php
                }
                ?>
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

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            updateAll();

            // Reasignar eventos después de asegurarse de que jQuery está completamente cargado
            $('.cantidad-input').on('input', function () {
                updateSubtotal(this.closest('tr'));
                updateTotal();
            });

            $('#orderLinesTable').on('click', '.removeRow', function () {
                $(this).closest('tr').remove();
                updateTotal();
            });

            function updateSubtotal(row) {
                const cantidad = parseFloat($(row).find('.cantidad-input').val()) || 0;
                const precio = parseFloat($(row).find('.precio-input').val()) || 0;
                const subtotal = cantidad * precio;
                $(row).find('.subtotal').val(subtotal.toFixed(2));
            }

            function updateTotal() {
                let total = 0;
                $('.subtotal').each(function () {
                    total += parseFloat($(this).val()) || 0;
                });
                $('#totalAmount').val(total.toFixed(2));
            }

            function updateAll() {
                $('#orderLinesTable tbody tr').each(function () {
                    updateSubtotal(this);
                });
                updateTotal();
            }
        });
    </script>
</body>

</html>
