<?php
require "cargar_valores_pedido.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Factura</title>
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
                            <a class="nav-link text-white" href="metodos_de_pago.php">metodos de pago</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div class="container mt-5">
        <h2>Formulario de Pedido</h2>
        <form action="guardar_pedido.php" method="POST">
            <div class="form-group">
                <label for="orderNumber">Número de Pedido</label>
                <input type="text" class="form-control" id="orderNumber" placeholder="Ingrese el número de pedido" name="orderNumber">
            </div>
            <div class="form-group">
                <label for="orderDate">Fecha del Pedido</label>
                <input type="date" class="form-control" id="orderDate" name="orderDate">
            </div>
            <div class="form-group">
                <label for="PayMethod">Metodo de Pago</label>
                <select name="PayMethod" id="PayMethod" class="form-control" >
                    <?php echo $options_pagos; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="customerName">Nombre del Cliente</label>
                <select name="costumer" id="cliente" class="form-control" >
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
                        <tr>
                            <td>
                                <select name="productos[]" id="libroSelect" class="form-control libroSelect" onchange="actualizarPrecio(this)">
                                    <?php echo $options_libro; ?>
                                </select>
                            </td>
                            <td><input type="number" class="form-control" placeholder="Cantidad" name="cantidades[]" onchange="calcularSubototal(this)"></td>
                            <td><input type="number" class="form-control" placeholder="Precio Unitario" id="precio" name="precios[]"></td>
                            <td><input type="number" class="form-control" placeholder="Subtotal" name="subtotales[]" readonly></td>
                            <td><button type="button" class="btn btn-danger">Eliminar</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <button type="button" class="btn btn-secondary" id="addLineBtn">Agregar Línea</button>


            <div class="form-group mt-3">
                <label for="totalAmount">Total</label>
                <input type="number" class="form-control" id="totalAmount" name="totalAmount" readonly>
            </div>

            <button type="submit" class="btn btn-primary">Guardar Factura</button>
            <button type="reset" class="btn btn-secondary">Cancelar</button>
        </form>
    </div>

    <script>

        document.getElementById('addLineBtn').addEventListener('click', function() {
            var table = document.getElementById('orderLinesTable').getElementsByTagName('tbody')[0];
            var newRow = table.insertRow();
            newRow.innerHTML = `
                <tr>
                    <td>
                        <select name="productos[]" id="libroSelect" class="form-control libroSelect" onchange="actualizarPrecio(this)">
                            <?php echo $options_libro; ?>
                        </select>
                    </td>
                    <td><input type="number" class="form-control" placeholder="Cantidad" name="cantidades[]" onchange="calcularSubototal(this)"></td>                        <td><input type="number" class="form-control" placeholder="Precio Unitario" id="precio" name="precios[]"></td>
                    <td><input type="number" class="form-control" placeholder="Subtotal" name="subtotales[]" readonly></td>
                    <td><button type="button" class="btn btn-danger">Eliminar</button></td>
                </tr>
            `;
            newRow.querySelector('.btn-danger').addEventListener('click', function() {
                table.deleteRow(newRow.rowIndex - 1);
            });
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>