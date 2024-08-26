<?php
require_once "../Connection/Connection.php";

class Usuario{ 

    function GuardarUsuarioModel($id_usuario, $nombrecompleto, $email, $contraseña) 
    {
         $sql = "INSERT INTO usuario(id_usuario, nombrecompleto, email, contraseña) VALUES($id_usuario, $nombrecompleto, $email, $contraseña);";
         $connection = connection();
         $respuesta = $connection->query($sql);
         return $respuesta;
         if ($respuesta == false){
            if ($connection->errno == 1060){
                $respuesta=$this->ActualizarContraseñaModel($contraseña, $email);
            }
        }
    }

    function ActualizarContraseñaModel($contraseña, $email){
        $sql = "UPDATE usuario SET contraseña = '$contraseña' WHERE email = '$email';"; 
        $connection = connection();
        $respuesta = $connection->query($sql);
        return $respuesta;
    }
}

?>