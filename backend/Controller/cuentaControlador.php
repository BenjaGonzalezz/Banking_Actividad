<?php


require_once "../Model/cuenta.php";


$function = $_GET['function'];

switch ($function) {
    case "crear":
       crearCuenta();
        break;
    case "agregar":
       agregarSaldo();
        break;
    case "obtener":
        obtenerCuenta();
        break; 
}

function crearCuenta(){

        $resultado = (new cuenta())->crearCuenta(); 

}

function agregarSaldo(){

    $n_cuenta = $_POST['n_cuenta'];
    $monto = $_POST['monto'];

    $resultado = (new cuenta())->recargarCuenta($n_cuenta, $monto);

}


function obtenerCuenta(){   
    $resultado = (new cuenta())->obtenerCuenta();   
    echo json_encode($resultado);
}