<?php
function connection(){
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "ebanking";
    $puerto = 3306;

    $mysqli = new mysqli($host, $user, $pass, $db, $puerto);
    return $mysqli;
}

?>
