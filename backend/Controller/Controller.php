<?php
require_once "../Model/UsuarioDAO.php";

$function = $_GET['function'];

switch ($function) {
    case "LoginUsuario":
        LoginUsuario();
        break;
    case "RegisterUsuario":
        RegisterUsuario();
        break;
    case"crearToken";
    crearToken();
    break;
}



function RegisterUsuario(){
    
    $nombrecompleto = $_POST['nombrecompleto'];
    $email = $_POST['email'];
    $contraseña = $_POST['contraseña'];

    // Hashing de la contraseña

    $contraseñaHash = password_hash($contraseña, PASSWORD_BCRYPT);

    $resultado = (new Usuario())->RegisterUsuarioModel($nombrecompleto, $email, $contraseñaHash);
    echo json_encode($resultado);
}

function LoginUsuario(){
    $email = $_POST['email'];
    $contraseña = $_POST['contraseña'];
    $resultado = (new Usuario())->LoginUsuarioModel($email, $contraseña);
    if (!$resultado) {
        echo json_encode(['error' => 'Usuario no encontrado']);
    } else {
        // Devuelve la información del usuario, como el token y el correo
        echo json_encode(['token' => 'some_generated_token', 'email' => $email]);
    }
}
?>