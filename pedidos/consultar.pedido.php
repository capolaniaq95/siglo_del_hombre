<?php
require "../conexion.php";

// Verificar si se ha enviado un ID de pedido a través de GET
if (isset($_GET['id']) && !empty($_GET['id']) && is_numeric($_GET['id'])) {
    $id_pedido = intval($_GET['id']);

    // Consultar los detalles del pedido
    $sql = "SELECT pedido.id_pedido, pedido.fecha, usuario.nombre AS cliente, pedido.total, metodo_de_pago.metodo
            FROM pedido
            INNER JOIN usuario ON pedido.id_usuario = usuario.id_usuario
            INNER JOIN metodo_de_pago ON pedido.id_metodo_de_pago = metodo_de_pago.id_metodo_de_pago
            WHERE pedido.id_pedido = ?";
    $stmt = $mysqli->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("i", $id_pedido);
        $stmt->execute();
        $resultado_pedido = $stmt->get_result();

        // Verificar si el pedido existe
        if ($resultado_pedido->num_rows > 0) {
            $pedido = $resultado_pedido->fetch_assoc();
            
            // Consultar las líneas del pedido
            $sql = "SELECT libro.titulo AS libro, linea_pedido.cantidad, linea_pedido.precio, linea_pedido.subtotal
                    FROM linea_pedido
                    INNER JOIN libro ON linea_pedido.id_libro = libro.id_libro
                    WHERE linea_pedido.id_pedido = ?";
            $stmt = $mysqli->prepare($sql);
            $stmt->bind_param("i", $id_pedido);
            $stmt->execute();
            $resultado_lineas = $stmt->get_result();
        } else {
            echo "<div class='alert alert-danger'>No se encontró el pedido con el ID especificado.</div>";
            exit();
        }
    } else {
        echo "<div class='alert alert-danger'>Error en la preparación de la consulta SQL: " . $mysqli->error . "</div>";
        exit();
    }

    $stmt->close();
} else {
    echo "<div class='alert alert-danger'>ID de pedido no especificado o inválido.</div>";
    exit();
}

$mysqli->close();
?>
