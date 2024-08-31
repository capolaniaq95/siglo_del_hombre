<?php
require "conexion.php";

// Consultar pedidos existentes
$sql = "SELECT id_pedido, CONCAT('Pedido #', id_pedido, ' - ', fecha) AS descripcion FROM pedido";
$resultado_pedidos = $mysqli->query($sql);
$options_pedidos = "<option value=''>Selecciona un pedido</option>";
if ($resultado_pedidos->num_rows > 0) {
    while ($fila = $resultado_pedidos->fetch_assoc()) {
        $options_pedidos .= "<option value='" . htmlspecialchars($fila['id_pedido']) . "'>" . htmlspecialchars($fila['descripcion']) . "</option>";
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_pedido = $_POST['pedido'];
    $productos = $_POST['productos'];
    $cantidades = $_POST['cantidades'];
    $motivo = $_POST['motivo'];
    
    // Aquí iría la lógica para procesar la devolución (guardarla en base de datos, etc.)
    // Por ahora, solo se muestra un mensaje de éxito

    $mensaje = "Devolución procesada correctamente.";
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Devolución</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2>Formulario de Devolución</h2>
        <?php if (isset($mensaje)) : ?>
            <div class="alert alert-info"><?php echo htmlspecialchars($mensaje); ?></div>
        <?php endif; ?>
        <form action="devolucion.php" method="POST">
            <div class="form-group">
                <label for="pedido">Pedido</label>
                <select name="pedido" id="pedido" class="form-control" required>
                    <?php echo $options_pedidos; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="motivo">Motivo de la Devolución</label>
                <input type="text" class="form-control" id="motivo" name="motivo" required>
            </div>

            <h4>Productos a Devolver</h4>
            <div class="table-responsive">
                <table class="table table-bordered" id="returnLinesTable">
                    <thead class="thead-dark">
                        <tr>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Las filas se agregarán dinámicamente con JavaScript -->
                    </tbody>
                </table>
            </div>
            <button type="button" class="btn btn-secondary" id="addReturnLineBtn">Agregar Línea</button>

            <button type="submit" class="btn btn-success mt-3">Enviar Devolución</button>
        </form>
    </div>

    <script>
        document.getElementById('addReturnLineBtn').addEventListener('click', function() {
            const tableBody = document.getElementById('returnLinesTable').getElementsByTagName('tbody')[0];
            const newRow = tableBody.insertRow();
            newRow.innerHTML = `
                <tr>
                    <td>
                        <select name="productos[]" class="form-control productSelect">
                            <?php echo $options_productos; ?>
                        </select>
                    </td>
                    <td><input type="number" class="form-control quantity" name="cantidades[]" required></td>
                    <td><button type="button" class="btn btn-danger removeRow">Eliminar</button></td>
                </tr>
            `;
            newRow.querySelector('.removeRow').addEventListener('click', function() {
                tableBody.deleteRow(newRow.rowIndex - 1);
            });
        });

        document.getElementById('returnLinesTable').addEventListener('click', function(event) {
            if (event.target && event.target.classList.contains('removeRow')) {
                event.target.closest('tr').remove();
            }
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>

               