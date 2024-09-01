<?php

require_once "../Connection/Connection.php";


class cuenta {
    function crearCuenta(){
        $connection = connection();

            session_start();
            $idusuario = $_SESSION['id_usuario'];

            $sql = "INSERT INTO cuenta (id_usuario) VALUES ('$idusuario');";
            $respuesta = $connection->query($sql);
            return $respuesta;

        
    }
    function obtenerSaldo($n_cuenta){
        $connection = connection();

            $sql = "SELECT saldo FROM cuenta WHERE n_cuenta = '$n_cuenta';";
            $respuesta = $connection->query($sql);
            $resultado = $respuesta->fetch_assoc();
            return $resultado;  
    }


    function recargarCuenta($n_cuenta, $monto){
        $connection = connection();


            $valorActual = $this->obtenerSaldo($n_cuenta);
            $valorNuevo = $valorActual['saldo'] + $monto;
            $sql = "UPDATE cuenta SET saldo = '$valorNuevo' WHERE n_cuenta = '$n_cuenta';";
            $respuesta = $connection->query($sql);

            return $respuesta;

    }

    function obtenerCuenta(){
        $connection = connection();
        $sql = "
        SELECT cuenta.*, usuario.nombrecompleto 
        FROM cuenta 
        JOIN usuario ON cuenta.id_usuario = usuario.id_usuario";
        $respuesta = $connection->query($sql);
        $cuenta = $respuesta->fetch_all(MYSQLI_ASSOC);
        return $cuenta;
    }
}