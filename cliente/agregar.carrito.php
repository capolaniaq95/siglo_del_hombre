<?php
session_start();

// Verificar que el ID del libro se haya enviado
if (isset($_POST['id_libro'])) {
    $idLibro = intval($_POST['id_libro']);

    // Asegurarse de que la sesión de carrito exista
    if (!isset($_SESSION['carrito'])) {
        $_SESSION['carrito'] = array();
    }

    // Verificar si el libro ya está en el carrito
    if (array_key_exists($idLibro, $_SESSION['carrito'])) {
        $_SESSION['carrito'][$idLibro]++;
    } else {
        $_SESSION['carrito'][$idLibro] = 1;
    }

    // Redirigir al usuario de vuelta a la página de libros o a otra página
    header('Location: libros.php');
    exit();
} else {
    // En caso de error, redirigir a una página de error o mostrar un mensaje
    echo "Error: No se ha enviado el ID del libro.";
}
