<?php
require("AlumneController.php");

$datos = mostrarDatos();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <ul>
        <?php
        foreach ($datos as $item) {
            echo "<li>" . $item->nom . " - " . $item->cognom . "</li>";
        }
        ?>
    </ul>
</body>

</html>