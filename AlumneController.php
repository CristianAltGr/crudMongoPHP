<?php
require("AlumneModel.php");

function getAlumnes()
{
	return mostrarDatos();
}

function addAlumne($nom, $cognom, $mail, $data_naixement)
{
	return alumneAdd($nom, $cognom, $mail, $data_naixement);
}

function upAlumne($id, $nom, $cognom, $mail, $data_naixement)
{
	return alumneUpdate($id, $nom, $cognom, $mail, $data_naixement);
}

function getAlumne($id)
{
	return mostrarAlumne($id);
}

function deleteAlumne($id)
{
	return alumneDelete($id);
}


function loadMainView($msg = null)
{
	$result = getAlumnes();
	$missatge = $msg;
	require_once("MainView.php");
}

function loadNewAlumneView()
{
	require_once("NewView.php");
}

function loadEditAlumneView($id)
{
	$result = getAlumne($id);
	require_once("EditView.php");
}

function loadShowAlumneView($id)
{
	$result = getAlumne($id);
	require_once("ShowView.php");
}
?>