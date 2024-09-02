<?php
require_once "../Model/UsuarioDAO.php";



$function = $_GET['function'];

switch ($function) {
    case "hacerTransaccion":
        hacerTransaccion();
        break;
}

function hacerTransaccion(){
    
    $n_cuentaremitente = $_POST['n_cuentaremitente'];
    $n_cuentadestino = $_POST['n_cuentadestino'];
    $monto = $_POST['monto'];
    $concepto = $_POST['concepto'];

    $resultado = (new transaccion())->hacerTransaccionModel($n_cuentaremitente, $n_cuentadestino, $monto, $concepto);
    echo json_encode($resultado);

}