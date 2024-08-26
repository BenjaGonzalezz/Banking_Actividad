<?php
require_once "../Model/UsuarioDAO.php";

$function = $_GET['function'];

switch ($function) {
    case "Guardar":
        GuardarUsuario();
        break;
}
function GuardarUsuario()
{
    $id_usuario = $_POST['id_usuario'];
    $nombrecompleto = $_POST['nombrecompleto'];
    $email = $_POST['email'];
    $contraseña = $_POST['contraseña'];
    $resultado = (new Usuario())->GuardarUsuarioModel($id_usuario, $nombrecompleto, $email, $contraseña);
    echo json_encode($resultado);

}

?>