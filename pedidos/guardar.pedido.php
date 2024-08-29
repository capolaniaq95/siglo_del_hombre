<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
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

        <div class="container mt-4">
            <h2>Pedido agregado</h2>
            <?php
            require '../conexion.php';


            $orderDate = $_REQUEST['orderDate'];
            $customer = intval($_REQUEST['customer']);
			$payment = intval($_REQUEST['payment']);
            $productos = array($_REQUEST['libros']);
            $cantidades = array($_REQUEST['cantidades']);
            $precios = array($_REQUEST['precios']);
            $subtotales = array($_REQUEST['subtotales']);
            $totalAmount = floatval($_REQUEST['totalAmount']);


            $sql = "INSERT INTO `pedido`(`id_usuario`,`id_metodo_de_pago`, `fecha`, `total`)
                    VALUES ($customer, $payment, '$orderDate', $totalAmount)";

            //$query_insert_movimiento_salida = "INSERT INTO `movimiento_inventario`( `fecha`, `ubicacion_destino`, `ubicacion_origen`)
            //                                          VALUES ('$orderDate', 10, 11)";
			//&& $mysqli->query($query_insert_movimiento_salida) == TRUE

            if ($mysqli->query($sql) === TRUE) {

                $query_id_pedido = "SELECT `id_pedido` FROM `pedido`
                                    WHERE pedido.id_usuario=$customer
									AND pedido.id_metodo_de_pago=$payment
                                    AND pedido.fecha='$orderDate'
                                    AND pedido.total=$totalAmount";

                $result = $mysqli->query($query_id_pedido);
                $pedido = $result->fetch_assoc();

                $id_pedido = $pedido['id_pedido'];

                /*$query_id_inventario = "SELECT `id_movimiento_inventario`
                                        FROM `movimiento_inventario`
                                        WHERE movimiento_inventario.fecha='$orderDate'
                                        AND movimiento_inventario.ubicacion_destino=10
                                        AND movimiento_inventario.ubicacion_origen=11";
				

                $result = $mysqli->query($query_id_inventario);
                $movimiento = $result->fetch_assoc();
                $id_inventario = $movimiento['id_movimiento_inventario'];
				*/

                if ($result->num_rows > 0) {
                    for ($i = 0; $i < count($productos[0]); $i++) {

                        $id_producto = intval($productos[0][$i]);
                        $cantidad = intval($cantidades[0][$i]);
                        $sub_total = intval($subtotales[0][$i]);

                        $insert_linea_pedido = "INSERT INTO `linea_de_pedido`(`id_pedido`, `id_libro`, `cantidad`, `total_linea`)
                                                VALUES ($id_pedido, $id_producto, $cantidad, $sub_total)";

                        $result = $mysqli->query($insert_linea_pedido);

                        /*$insertar_linea_movimiento_inventario = "INSERT INTO `linea_de_movimiento`(`id_movimiento_inventario`, `id_producto`, `cantidad`)
                        VALUES ($id_inventario, $id_producto, $cantidad)";
                        $mysqli->query($insertar_linea_movimiento_inventario);

                        $query_cantidad_producto = "SELECT producto.cantidad, producto.estado
                                                    FROM producto
                                                    WHERE producto.id_producto=$id_producto";

                        $result = $mysqli->query($query_cantidad_producto);
                        $result = $result->fetch_assoc();
                        $stock = intval($result['cantidad']) - $cantidad;

                        if ($stock > 0){
                            $estado = 'Disponible';
                        }else {
                            $estado = 'No Disponible';
                            echo "<div class='alert alert-danger'>Cantidad del producto con id=$id_producto menor a 0.</div>";
                        }
                        $update_stock = "UPDATE `producto` SET `cantidad`=$stock,`estado`='$estado' WHERE `id_producto`=$id_producto";
                        $result_update = $mysqli->query($update_stock);*/

                    }
                    echo "<div class='alert alert-success'>Pedido agregado correctamente.</div>";
                    echo "<a href='pedido.php' class='btn btn-primary'>Volver a la lista de pedidos</a>";
                    $mysqli->close();
                    exit;
                } else {

                    echo "error al generar pedido";
                }
            } else {
                echo '<div class="error">Error: ' . $sql . '<br>' . $mysqli->error . '</div>';
            }
            ?>
</body>

</html>