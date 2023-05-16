<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/php/provaMongo/vendor/autoload.php";

function conectar()
{
    try {
        $servidor = "localhost";
        $usuario = "admin";
        $password = "123456";
        $bd = "institut";
        $puerto = "27017";

        $cadenaConexion = "mongodb://" .
            $usuario . ":" .
            $password . "@" .
            $servidor . ":" .
            $puerto . "/" .
            $bd;
        $cliente = new MongoDB\Client($cadenaConexion);
        return $cliente->selectDatabase($bd);

    } catch (\Throwable $th) {
        return $th->getMessage();
    }
}
?>