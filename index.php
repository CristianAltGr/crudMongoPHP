<?php
/**
 * Aquest arxiu espera 3 tipus de peticions:
 * - Peticions sense cap paràmetre: retornarà la vista principal (MainView.php)
 * - Peticions per GET: accions per mostrar les vistes de formulari de nou alumne, editar alumne i esborrar alumne. També la petició d'esborrar un alumne.
 * - Peticions per POST: accions que venen d'un formulari: afegir un nou alumne o modificar un alumne.
 *
 * En funció de la petició, farà unes crides o unes altres al controlador (AlumneController.php)
 */

require("AlumneController.php");

$msg = null;

if (isset($_GET['action'])) {

	if ($_GET['action'] == 'delete') {
		if (isset($_GET['id'])) {
			$msg = deleteAlumne($_GET['id']);
		}
		loadMainView($msg);
	} else if ($_GET['action'] == 'new') {
		loadNewAlumneView();
	} else if ($_GET['action'] == 'edit') {
		if (isset($_GET['id'])) {
			loadEditAlumneView($_GET['id']);
		}
	} else if ($_GET['action'] == 'show') {
		if (isset($_GET['id'])) {
			loadShowAlumneView($_GET['id']);
		}
	} else {
		loadMainView($msg);
	}
} else if (isset($_POST['action'])) {
	if ($_POST['action'] == 'add') {
		// Exemple de com utilitzar els missatges que el model ens retorna.
		// Aquests els desem a la variable $msg i els enviem a la vista principal

		if (isset($_POST['nom']) && isset($_POST['cognom']) && isset($_POST['mail']) && isset($_POST['data_naixement'])) {
			$msg = addAlumne($_POST['nom'], $_POST['cognom'], $_POST['mail'], $_POST['data_naixement']);
		}
		loadMainView($msg);
	} else if ($_POST['action'] == 'up') {
		if (isset($_POST['id']) && isset($_POST['nom']) && isset($_POST['cognom']) && isset($_POST['data_naixement'])) {
			$msg = upAlumne($_POST['id'], $_POST['nom'], $_POST['cognom'], $_POST['mail'], $_POST['data_naixement']);
		}
		loadMainView($msg);
	} else {
		loadMainView($msg);
	}
} else {
	loadMainView($msg);
}
?>