<?php

require "conexion.php";


$sql = "SELECT usuario.id_usuario, usuario.correo, usuario.direccion, usuario.celular, usuario.nombre, tipo_de_usuario.tipo
FROM usuario
INNER JOIN tipo_de_usuario ON usuario.id_tipo=tipo_de_usuario.id_tipo";

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
    <title>inventario</title>
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
                        <button type="button" class="btn btn-info" onclick="window.location.href='registro_nuevo_usuario.php'">Agregar nuevo registro</button>
                    </div>
                </div>
                <h2 class="text-center mb-4">Usuarios</h2>
                <table class="table table-hover">
                    <thead class="thead-primary">
                        <tr style="background-color: #17a2b8; color: white;">
                            <th scope="col">ID Usuario</th>
                            <th scope="col">Correo</th>
                            <th scope="col">Direccion</th>
                            <th scope="col">Celular</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Tipo</th>
                            <th scope0="col" style="width: 100px">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($resultado->num_rows > 0) : ?>
                            <?php while ($fila = $resultado->fetch_assoc()) : ?>
                                <tr>
                                    <td><?php echo $fila["id_usuario"]; ?></td>
                                    <td><?php echo $fila["correo"]; ?></td>
                                    <td><?php echo $fila["direccion"]; ?></td>
                                    <td><?php echo $fila["celular"]; ?></td>
                                    <td><?php echo $fila["nombre"]; ?></td>
                                    <td><?php echo $fila["tipo"]; ?></td>
                                    <td style="width: 100px">
                                        <a href="editar_usuario.php?id=<?php echo $fila["id_usuario"]; ?>" class="btn btn-sm btn-primary">
                                            <i class="fas fa-edit"></i> Editar
                                        </a>
                                        <a href="eliminar_usuario.php?id=<?php echo $fila["id_usuario"]; ?>" class="btn btn-sm btn-danger">
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