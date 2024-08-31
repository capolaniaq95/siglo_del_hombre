<?php
require "../conexion.php";

$sql = "SELECT id_producto, producto, precio FROM producto";
$resultado_productos = $mysqli->query($sql);
$options_producto = "<option value=''>Selecciona un producto</option>";
if ($resultado_productos->num_rows > 0) {
    while ($fila = $resultado_productos->fetch_assoc()) {
        $options_producto .= "<option value='" . htmlspecialchars($fila['id_producto']) . "' data-precio='" . htmlspecialchars($fila['precio']) . "'>" . htmlspecialchars($fila['producto']) . "</option>";
    }
}


$sql = "SELECT `id_ubicacion`, `nombre` FROM `ubicacion`";
$resultado_ubicacion = $mysqli->query($sql);
$options_ubicacion = "<option value=''>Selecciona un producto</option>";
if ($resultado_productos->num_rows > 0) {
    while ($fila = $resultado_ubicacion->fetch_assoc()) {
        $options_ubicacion .= "<option value='" . htmlspecialchars($fila['id_ubicacion']) . "'>" . htmlspecialchars($fila['nombre']) . "</option>";
    }
}


?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de movimiento inventario</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="d-flex flex-column min-vh-100">
        <header>
            <nav class="navbar navbar-expand-lg navbar-light bg-success">
                <div style="text-align: center; width: 100%; font-size: 1.5em;">
                    <a class="navbar-brand text-white" href="index.php" style="font-size: 1.5rem;">Ferretería Luis Vagales</a>
                </div>
            </nav>
        </header>
        <div class="container mt-5">
            <h2>Formulario de movimiento de inventario</h2>
            <?php if (isset($mensaje)) : ?>
                <div class="alert alert-info"><?php echo htmlspecialchars($mensaje); ?></div>
            <?php endif; ?>
            <form action="guardar.movimiento.inventario.php" method="POST">
                <div class="form-group">
                    <label for="orderDate">Fecha</label>
                    <input type="datetime-local" class="form-control" id="orderDate" name="orderDate" required>
                </div>
                <div class="form-group">
                    <label for="customerName">ubicacion origen</label>
                    <select name="origen" id="origen" class="form-control" required>
                        <?php echo $options_ubicacion; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="customerName">Ubicacion Destino</label>
                    <select name="destino" id="destino" class="form-control" required>
                        <?php echo $options_ubicacion; ?>
                    </select>
                </div>
                <h4>Líneas de Pedido</h4>
                <div class="table-responsive">
                    <table class="table table-bordered" id="orderLinesTable">
                        <thead class="thead-dark">
                            <tr>
                                <th>Producto</th>
                                <th>Cantidad</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <select name="productos[]" class="form-control productSelect" onchange="updatePrice(this)">
                                        <?php echo $options_producto; ?>
                                    </select>
                                </td>
                                <td><input type="number" class="form-control quantity" name="cantidades[]" onchange="calculateSubtotal(this)" required></td>
                                <td><button type="button" class="btn btn-danger removeRow">Eliminar</button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="form-group">
                    <button type="button" class="btn btn-secondary" id="addLineBtn">Agregar Línea</button>
                </div>
                <div class="form-group">
                    <button type="reset" class="btn btn-secondary">Cancelar</button>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Guardar movimiento</button>
                </div>

            </form>
        </div>

        <script>
            document.getElementById('addLineBtn').addEventListener('click', function() {
                const tableBody = document.getElementById('orderLinesTable').getElementsByTagName('tbody')[0];
                const newRow = tableBody.insertRow();
                newRow.innerHTML = `
                <tr>
                    <td>
                        <select name="productos[]" class="form-control productSelect" onchange="updatePrice(this)">
                            <?php echo $options_producto; ?>
                        </select>
                    </td>
                    <td><input type="number" class="form-control quantity" name="cantidades[]" onchange="calculateSubtotal(this)" required></td>
                    <td><button type="button" class="btn btn-danger removeRow">Eliminar</button></td>
                </tr>
            `;
                newRow.querySelector('.removeRow').addEventListener('click', function() {
                    tableBody.deleteRow(newRow.rowIndex - 1);
                    updateTotal();
                });
            });

            document.getElementById('orderLinesTable').addEventListener('click', function(event) {
                if (event.target && event.target.classList.contains('removeRow')) {
                    event.target.closest('tr').remove();
                    updateTotal();
                }
            });
        </script>

        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>