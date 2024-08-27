<?php
require_once "../Model/UsuarioDAO.php";

$function = $_GET['function'];

switch ($function) {
    case "Login":
        LoginUsuario();
        break;
    case "Register":
        RegisterUsuario();
        break;
}
function RegisterUsuario()
{
    $id_usuario = $_POST['id_usuario'];
    $nombrecompleto = $_POST['nombrecompleto'];
    $email = $_POST['email'];
    $contraseña = $_POST['contraseña'];
    $resultado = (new Usuario())->RegisterUsuarioModel($id_usuario, $nombrecompleto, $email, $contraseña);
    echo json_encode($resultado);

}

function LoginUsuario(){
    $email = $_POST['email'];
    $contraseña = $_POST['contraseña'];
    $resultado = (new Usuario())->LoginUsuarioModel($email, $contraseña);
    echo json_encode($resultado);

}
?>