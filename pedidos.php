<?php

require 'conexion.php';

$sql = "SELECT pedido.id_pedido, usuario.nombre, metodo_de_pago.metodo, pedido.fecha, pedido.total, pedido.estado 
FROM pedido
INNER JOIN usuario ON pedido.id_usuario=usuario.id_usuario
INNER JOIN metodo_de_pago ON pedido.id_metodo_de_pago=metodo_de_pago.id_metodo_de_pago
ORDER BY pedido.fecha";

$resultado = $mysqli->query($sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Pedidos</title>
    <style>
        table {
             table-layout: fixed;
        }

    </style>

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

    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="row justify-content-center mb-3">
                    <div class="col-sm-10">
                        <button type="button" class="btn btn-info" onclick="window.location.href='formulario_pedidos.php'">Agregar nuevo registro</button>
                    </div>
                </div>
                <h2 class="text-center mb-4">Pedidos</h2>
                <table class="table table-hover text-center mx-auto">
                    <thead class="thead-primary">
                        <tr style="background-color: #17a2b8; color: white;">
                            <th scope="col">ID Pedido</th>
                            <th scope="col">Usuario</th>
                            <th scope="col">Método de Pago</th>
                            <th scope="col">Total</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Estado</th>
                            <th scope="col" style="width: 200px">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($resultado->num_rows > 0) : ?>
                            <?php while ($fila = $resultado->fetch_assoc()) : ?>
                                <tr>
                                    <td><?php echo $fila["id_pedido"]; ?></td>
                                    <td><?php echo $fila["nombre"]; ?></td>
                                    <td><?php echo $fila["metodo"]; ?></td>
                                    <td><?php echo $fila["total"]; ?></td>
                                    <td><?php echo $fila["fecha"]; ?></td>
                                    <td><?php echo $fila["estado"]; ?></td>
                                    <td style="width: 200px">
                                        <a href="editar_pedido.php?id=<?php echo $fila["id_pedido"]; ?>" class="btn btn-sm btn-primary">
                                            <i class="fas fa-edit"></i> Editar
                                        </a>
                                        <a href="eliminar_pedido.php?id=<?php echo $fila["id_pedido"]; ?>" class="btn btn-sm btn-danger">
                                            <i class="fas fa-trash-alt"></i> Eliminar
                                        </a>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="6" class="text-center">No hay resultados</td>
                            </tr>
                        <?php endif; ?>
                        <?php $mysqli->close(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>