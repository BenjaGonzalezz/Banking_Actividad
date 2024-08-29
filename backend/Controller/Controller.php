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
}
function RegisterUsuario()
{
    $nombrecompleto = $_POST['nombrecompleto'];
    $email = $_POST['email'];
    $contraseña = $_POST['contraseña'];
    $resultado = (new Usuario())->RegisterUsuarioModel($nombrecompleto, $email, $contraseña);
    echo json_encode($resultado);

}

function LoginUsuario(){
    $email = $_POST['email'];
    $contraseña = $_POST['contraseña'];
    $resultado = (new Usuario())->LoginUsuarioModel($email, $contraseña);
    echo json_encode($resultado);

}
?>