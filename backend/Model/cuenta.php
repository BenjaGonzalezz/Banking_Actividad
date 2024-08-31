<?php

require_once "../Connection/Connection.php";


class cuenta {
    function crearCuenta(){
        $connection = connection();
        try{
            session_start();
            $idusuario = $_SESSION['id_usuario'];

            $sql = "INSERT INTO cuenta (id_usuario) VALUES ('$idusuario');";
            $respuesta = $connection->query($sql);
            return $respuesta;
        }catch (Exception $error){
            throw new Exception("Error al crear la cuenta" . $error->getMessage());
        }
        
    }
    function obtenerSaldo($n_cuenta){
        $connection = connection();
        try{
            
            $sql = "SELECT saldo FROM cuenta WHERE n_cuenta = '$n_cuenta';";
            $respuesta = $connection->query($sql);
            $resultado = $respuesta->fetch_assoc();
            return $resultado;
            

        }catch (Exception $error){
            throw new Exception("Error al obtener el saldo" . $error->getMessage());
        }
        
    }
    function recargarCuenta($n_cuenta, $monto){
        $connection = connection();


            $valorActual = $this->obtenerSaldo($n_cuenta);
            $valorNuevo = $valorActual['saldo'] + $monto;
            $sql = "UPDATE cuenta SET saldo = '$valorNuevo' WHERE n_cuenta = '$n_cuenta';";
            $respuesta = $connection->query($sql);

            return $respuesta;

    }

}