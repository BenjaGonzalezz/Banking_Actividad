<?php
require_once "../Connection/Connection.php";

class transaccion {

    function hacerTransaccionModel($n_cuentaremitente, $n_cuentadestino, $monto, $concepto) {
        $conexion = connection();

        try {
            // Iniciar una transacción
            $conexion->begin_transaction();

            // Verificar si la cuenta remitente tiene suficiente saldo
            $queryRemitente = $conexion->prepare("SELECT saldo FROM cuenta WHERE n_cuenta = ?");
            $queryRemitente->bind_param('i', $n_cuentaremitente);
            $queryRemitente->execute();
            $queryRemitente->bind_result($saldoRemitente);
            $queryRemitente->fetch();
            $queryRemitente->close();

            if ($saldoRemitente < $monto) {
                throw new Exception("Saldo insuficiente en la cuenta remitente.");
            }

            // Restar el monto de la cuenta remitente
            $queryRestar = $conexion->prepare("UPDATE cuenta SET saldo = saldo - ? WHERE n_cuenta = ?");
            $queryRestar->bind_param('di', $monto, $n_cuentaremitente);
            $queryRestar->execute();
            $queryRestar->close();

            // Sumar el monto a la cuenta destino
            $querySumar = $conexion->prepare("UPDATE cuenta SET saldo = saldo + ? WHERE n_cuenta = ?");
            $querySumar->bind_param('di', $monto, $n_cuentadestino);
            $querySumar->execute();
            $querySumar->close();

            // Registrar la transacción
            $queryRegistro = $conexion->prepare("INSERT INTO transaccion (n_cuentaremitente, n_cuentadestino, monto, concepto) VALUES (?, ?, ?, ?)");
            $queryRegistro->bind_param('iids', $n_cuentaremitente, $n_cuentadestino, $monto, $concepto);
            $queryRegistro->execute();
            $queryRegistro->close();

            // Confirmar la transacción
            $conexion->commit();

            return ["status" => "success", "message" => "Transacción realizada con éxito."];
        } catch (Exception $e) {
            // Revertir en caso de error
            $conexion->rollback();
            return ["status" => "error", "message" => $e->getMessage()];
        } finally {
            // Cerrar la conexión
            $conexion->close();
        }
    }
}
