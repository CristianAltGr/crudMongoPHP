<?php
use MongoDB\BSON\ObjectID;

include "Connexio.php";

function mostrarDatos()
{
    try {
        $conexion = conectar();
        $coleccion = $conexion->alumnes;
        $datos = $coleccion->find();
        return $datos;
    } catch (\Throwable $th) {
        return $th->getMessage();
    }
}

function mostrarAlumne($id)
{
    try {
        $idObjeto = new MongoDB\BSON\ObjectID($id);
        $conexion = conectar();
        $coleccion = $conexion->alumnes;
        $document = $coleccion->findOne(['_id' => $idObjeto]);


        return $document;
    } catch (\Throwable $th) {
        return $th->getMessage();
    }
}

function alumneUpdate($id, $nom, $cognom, $mail, $data_naixement)
{

    $idObjeto = new MongoDB\BSON\ObjectID($id);
    $conexion = conectar();
    $coleccion = $conexion->alumnes;

    $updateResult = $coleccion->updateOne(
        ['_id' => $idObjeto],
        [
            '$set' => [
                'nom' => $nom,
                'cognom' => $cognom,
                'data_naixement' => $data_naixement,
                'mail' => $mail
            ]
        ]
    );

    return ($updateResult->getModifiedCount()) > 0 ? true : false;
}

function alumneAdd($nom, $cognom, $mail, $data_naixement)
{

    $conexion = conectar();
    $coleccion = $conexion->alumnes;

    $insertOneResult = $coleccion->insertOne([
        'nom' => $nom,
        'cognom' => $cognom,
        'data_naixement' => $data_naixement,
        'mail' => $mail
    ]);

    return ($insertOneResult->getInsertedCount()) > 0 ? true : false;
}

function alumneDelete($id)
{
    $idObjeto = new MongoDB\BSON\ObjectID($id);
    $conexion = conectar();
    $coleccion = $conexion->alumnes;
    $deleteResult = $coleccion->deleteOne(['_id' => $idObjeto]);

    return ($deleteResult->getDeletedCount()) > 0 ? true : false;
}