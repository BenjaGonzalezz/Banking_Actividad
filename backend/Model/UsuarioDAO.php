<?php
require_once "../Connection/Connection.php";

class Usuario { 
    function LoginUsuarioModel($email, $contraseña){
        $connection = connection();
    
        $sql = "SELECT * FROM usuario WHERE email = ?";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $respuesta = $stmt->get_result();
        $resultado = $respuesta->fetch_assoc();
    
        // Verificar si el usuario existe
        if ($resultado === null) {
            return null; 
        }
    
        // Verificar la contraseña usando password_verify()
        if (password_verify($contraseña, $resultado['contraseña'])) {
            session_start();
            $_SESSION['id_usuario'] = $resultado['id_usuario'];
            $_SESSION["email"] = $email;
            return $resultado;
        } else {
            return "Contraseña incorrecta";
        }
    }
    
    
    function RegisterUsuarioModel($nombrecompleto, $email, $contraseña){
        $connection = connection();

        // Hash de la contraseña
        $contraseñaHash = password_hash($contraseña, PASSWORD_BCRYPT);

        $sql = "INSERT INTO usuario(nombrecompleto, email, contraseña) VALUES(?, ?, ?)";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("sss", $nombrecompleto, $email, $contraseñaHash);
        $respuesta = $stmt->execute();
        $stmt->close();

        return $respuesta;
    }

    function ActualizarContraseñaModel($contraseña, $email){
        $connection = connection();

        // Hash de la nueva contraseña
        $contraseñaHash = password_hash($contraseña, PASSWORD_BCRYPT);


        $sql = "UPDATE usuario SET contraseña = ? WHERE email = ?";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("ss", $contraseñaHash, $email);
        $respuesta = $stmt->execute();

        // Cerrar la sentencia
        $stmt->close();

        return $respuesta;
    }
}



?>
