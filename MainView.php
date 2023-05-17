<!doctype html>
<html lang="ca">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
		integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	<title>Aproximació a MVC - CRUD PDO</title>
	<script src="https://kit.fontawesome.com/1f28589abd.js" crossorigin="anonymous"></script>


	<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
</head>

<body>
	<div class="container">
		<div class="py-5 text-center">
			<h1>Aproximació a MVC</h1>
			<h3>CRUD amb PDO</h3>
		</div>
		<?php

		if (isset($msg)) {
			if ($msg) {
				echo "<div class='alert alert-success' role='alert'>
							<p>Operació amb exit</p>
					   </div>";
			} else if (isset($missatge["Error"])) {
				echo "<div class='alert alert-danger' role='alert'>
					  	<p>Error en l'oper</p>
					  </div>";
			}
		}
		?>
		<div class="table-responsive-sm">
			<table id="alumnesTable" class="table table-striped" width="100%">
				<thead class="thead-dark">
					<tr>
						<th class="align-middle">NOM</th>
						<th class="align-middle">COGNOMS</th>
						<th class="align-middle">CURS</th>
						<th class="align-middle">DATA NAIXEMENT</th>
						<th class="align-middle text-right"><a class="btn btn-primary" role="button"
								href="?action=new">Afegir</a></th>
					</tr>
				</thead>
				<tbody>
					<?php

					foreach ($result as $row) {
						echo "<tr>";
						echo "<td class='align-middle'>" . $row->nom . "</td>";
						echo "<td class='align-middle'>" . $row->cognom . "</td>";
						echo "<td class='align-middle'>" . $row->mail . "</td>";
						echo "<td class='align-middle'>" . date('d/m/Y', strtotime($row->data_naixement)) . "</td>";
						echo "<td class='align-middle'>";
						echo "<a class='btn btn-success' role='button' href='?action=show&id=" . $row->_id . "'>Mostrar " . '<i class="fa-solid fa-eye"></i>' . "</a> ";
						echo "<a class='btn btn-warning' role='button' href='?action=edit&id=" . $row->_id . "'>Editar " . '<i class="fa-solid fa-pen-to-square"></i>' . "</a> ";
						echo "<a class='btn btn-danger' role='button' href='?action=delete&id=" . $row->_id . "'>Eliminar " . '<i class="fa-solid fa-trash"></i>' . "</a> ";
						echo "</td>";
						echo "</tr>";
					}
					?>
				</tbody>
				<tfoot>
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
				</tfoot>
			</table>
		</div>
	</div>
	<script>
		$(document).ready(function () {
			$('#alumnesTable').DataTable({
				"language": {
					"url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Catalan.json"
				}
			});
		});
		//Super importante poner el script de debajo en este punto no es un recurso que va al head sino no funciona
	</script>
	<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
</body>

</html>