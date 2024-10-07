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


$secretKey = 'abc123';
function crearToken($email){
    global $secretKey;
    $token = base64_encode(json_encode(['email' =>$email,'exp'=> time()+10 ]));
$signature = hash_hmac('sha256',$token,$secretKey);
return $token.'.'.$signature;
}

function verificarToken($token){
    global $secretKey;
    list($encodedPayload,$signature) = explode('.',$token);

    if(hash_hmac('sha256',$encodedPayload, $secretKey)!==$signature){
        return null;
    }
    $payload = json_decode(base64_decode($encodedPayload),true);


    if ($payload['exp'] < time()) {
        return null; 
        }
        return $payload; 
        }
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_SERVER['REQUEST_URI'] ===
        '/token/token.php') {
        
        $username = $_POST['email'] ?? '';
        $password = $_POST['contraseña'] ?? '';
        if ($username === 'pepe' && $password === 'asd123') {
        $token = crearToken($username);
        echo json_encode(['token' => $token]);
        } else {
        http_response_code(401);
        echo json_encode(['error' => 'Credenciales inválidas']);
        }
        } elseif ($_SERVER['REQUEST_METHOD'] === 'GET' && $_SERVER['REQUEST_URI'] ===
        '/token/token.php') {
        $headers = getallheaders();
        $token = $headers['Authorization'] ?? '';
        $decoded = verificarToken(str_replace('Bearer ', '', $token));
        if ($decoded) {
        echo json_encode(['message' => 'Acceso permitido', 'username' =>
        $decoded['username']]);
        } else {
        http_response_code(401);
        echo json_encode(['error' => 'Token inválido']);
        }
        } else {
        http_response_code(404);
        echo json_encode(['error' => 'Ruta no encontrada']);
}

?>
