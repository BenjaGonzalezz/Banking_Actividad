<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $codigo_ingresado = $_POST['codigo'];

    // Verificar el código
    if ($codigo_ingresado == $_SESSION['codigo_recuperacion']) {
        header('Location: ../../frontend/page/RecuperarContra/cambiaContra.html');
        exit();
        // Redirigir al usuario a una página para cambiar la contraseña
    } else {
        echo 'Código incorrecto.';
        header('Location: ../../frontend/page/RecuperarContra/incorrecto.html');
    }
} else {
    echo 'Método de solicitud no permitido.';
}
?>
