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
    $id = $_POST['id'];
    $ = $_POST[''];
    $ = $_POST[''];
    $ = $_POST[''];
    $ = $_POST[''];
    $resultado = (new Usuario())->();
    echo json_encode($resultado);

}

?>