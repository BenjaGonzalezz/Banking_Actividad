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
    
    function RegisterUsuarioModel($id_usuario, $nombrecompleto, $email, $contraseña){
            $connection = connection();
            $sql = "INSERT INTO usuario(id_usuario, nombrecompleto, email, contraseña) VALUES($id_usuario, $nombrecompleto, $email, $contraseña);";
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