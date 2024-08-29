<?php
require_once "../Connection/Connection.php";

class Usuario{ 

    function LoginUsuarioModel($email, $contraseña){
        $connection = connection();
        $sql = "SELECT * FROM usuario WHERE email='$email' and contraseña= '$contraseña'";
        $respuesta = $connection->query($sql);
        $resultado = $respuesta ->fetch_assoc();
        if($resultado == null ){
            return $resultado;
        }else{
             $_SESSION["email"] = $email; 
             return "resultado correcto";
            }    
        }
    
    function RegisterUsuarioModel($nombrecompleto, $email, $contraseña){
            $connection = connection();
            $sql = "INSERT INTO usuario(nombrecompleto, email, contraseña) VALUES('$nombrecompleto', '$email', '$contraseña');";
            $respuesta = $connection->query($sql);
            return $respuesta;
        }
    

    function ActualizarContraseñaModel($contraseña, $email){
        $sql = "UPDATE usuario SET contraseña = '$contraseña' WHERE email = '$email';"; 
        $connection = connection();
        $respuesta = $connection->query($sql);
        return $respuesta;
    }
}






?>
