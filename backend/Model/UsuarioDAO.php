<?php
require_once "../Connection/Connection.php";

class Usuario{ 

    function GuardarUsuarioModel() 
    {
         $sql = "INSERT INTO ebanking() VALUES();";
         $connection = connection();
         $respuesta = $connection->query($sql);
         return $respuesta;
         if ($respuesta == false){
            if ($connection->errno == 1060){
                $respuesta=$this->ActualizarUsuarioModel();
            }
        }
    }

    function ActualizarUsuarioModel(){
        $sql = "UPDATE  SET  = '$',  = '$', = '$',  = $ WHERE  = $;"; 
        $connection = connection();
        $respuesta = $connection->query($sql);
        return $respuesta;
    }
}

?>