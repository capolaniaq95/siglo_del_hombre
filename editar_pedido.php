<?php
require "conexion.php";

$order_id = $_GET['id']; 


$sql = "SELECT * FROM pedido WHERE id_pedido='$order_id'";

$resultado = $mysqli->query($sql);

$pedido[] = $resultado->fetch_assoc();

$sql = "SELECT * FROM linea_de_pedido WHERE id_pedido='$order_id'";


$resultado = $mysqli->query($sql);

$lineaspedido = [];

while($fila = $resultado->fetch_assoc()){
	$lineaspedido[] = $fila;
}

var_dump($pedido);
var_dump($lineaspedido);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Pedido</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
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

<div class="container mt-5">
    <h2>Modificar Pedido</h2>
    <form action="guardar_pedido.php" method="POST">
        <input type="hidden" name="order_id" value="<?php echo $pedido['id_pedido']; ?>">
        <div class="form-group">
            <label for="orderNumber">Número de Pedido</label>
            <input type="text" class="form-control" id="orderNumber" name="orderNumber" value="<?php echo $pedido['id_pedido']; ?>" readonly>
        </div>
        <div class="form-group">
            <label for="orderDate">Fecha del Pedido</label>
            <input type="date" class="form-control" id="orderDate" name="orderDate" value="<?php echo $pedido['fecha']; ?>">
        </div>
        <div class="form-group">
            <label for="PayMethod">Método de Pago</label>
            <select name="PayMethod" id="PayMethod" class="form-control">
                <?php echo $options_pagos; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="customer">Nombre del Cliente</label>
            <select name="customer" id="cliente" class="form-control">
                <?php echo $options_costumer; ?>
            </select>
        </div>

        <h4>Líneas de Pedido</h4>
        <div class="table-responsive">
            <table class="table table-bordered" id="orderLinesTable">
                <thead class="thead-dark">
                    <tr>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Precio Unitario</th>
                        <th>Subtotal</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($lineaspedido['orderLines'] as $line): ?>
                    <tr>
                        <td>
                            <select name="productos[]" class="form-control libroSelect" onchange="actualizarPrecio(this)">
                                <?php echo $options_libro; ?>
                            </select>
                        </td>
                        <td><input type="number" class="form-control" name="cantidades[]" value="<?php echo $line['cantidad']; ?>" onchange="calcularSubtotal(this)"></td>
                        <td><input type="number" class="form-control" name="precios[]" value="<?php echo $line['precio_unitario']; ?>"></td>
                        <td><input type="number" class="form-control" name="subtotales[]" value="<?php echo $line['subtotal']; ?>" readonly></td>
                        <td><button type="button" class="btn btn-danger" onclick="eliminarFila(this)">Eliminar</button></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <button type="button" class="btn btn-secondary" id="addLineBtn">Agregar Línea</button>

        <div class="form-group mt-3">
            <label for="totalAmount">Total</label>
            <input type="number" class="form-control" id="totalAmount" name="totalAmount" value="<?php echo $order_data['total']; ?>" readonly>
        </div>

        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        <button type="reset" class="btn btn-secondary">Cancelar</button>
    </form>
</div>

<script>
    function eliminarFila(btn) {
        var row = btn.parentNode.parentNode;
        row.parentNode.removeChild(row);
        calcularTotal();
    }

    document.getElementById('addLineBtn').addEventListener('click', function() {
        var table = document.getElementById('orderLinesTable').getElementsByTagName('tbody')[0];
        var newRow = table.insertRow();
        newRow.innerHTML = 
            <tr>
                <td>
                    <select name="productos[]" class="form-control libroSelect" onchange="actualizarPrecio(this)">
                        <?php echo $options_libro; ?>
                    </select>
                </td>
                <td><input type="number" class="form-control" name="cantidades[]" onchange="calcularSubtotal(this)"></td>
                <td><input type="number" class="form-control" name="precios[]"></td>
                <td><input type="number" class="form-control" name="subtotales[]" readonly></td>
                <td><button type="button" class="btn btn-danger" onclick="eliminarFila(this)">Eliminar</button></td>
            </tr>
        ;
    });

    function calcularSubtotal(input) {
        var row = input.parentNode.parentNode;
        var cantidad = row.querySelector('[name="cantidades[]"]').value;
        var precio = row.querySelector('[name="precios[]"]').value;
        var subtotal = row.querySelector('[name="subtotales[]"]');
        subtotal.value = cantidad * precio;
        calcularTotal();
    }

    function calcularTotal() {
        var total = 0;
        var subtotales = document.querySelectorAll('[name="subtotales[]"]');
        subtotales.forEach(function(subtotal) {
            total += parseFloat(subtotal.value) || 0;
        });
        document.getElementById('totalAmount').value = total;
    }
</script>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>