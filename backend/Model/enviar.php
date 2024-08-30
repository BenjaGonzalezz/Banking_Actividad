<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];

    // Verificar que el correo sea válido
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die('Correo electrónico no válido');
    }

    // Generar un código único
    $codigo = rand(100000, 999999); // Puedes usar una mejor función para generar códigos

    // Guardar el código en la base de datos o en sesión (aquí simplificamos)
    session_start();
    $_SESSION['codigo_recuperacion'] = $codigo;
    $_SESSION['email_recuperacion'] = $email;

    // Configuración del correo
    $asunto = 'Código de recuperación de contraseña';
    $mensaje = "Tu código de recuperación es: $codigo";
    $cabeceras = 'From: actividadiae@gmail.com' . "\r\n" .
                 'Reply-To: actividadiae@gmail.com' . "\r\n" .
                 'X-Mailer: PHP/' . phpversion();

    // Enviar el correo
    if (mail($email, $asunto, $mensaje, $cabeceras)) {
        echo 'Código enviado, revisa tu correo.';
        header('Location: ../../frontend/page/RecuperarContra/Rcontra.html');
        exit();
    } else {
        echo 'Error al enviar el código.';
    }
} else {
    echo 'Método de solicitud no permitido.';
}
?>