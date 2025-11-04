<?php
session_start();									// PHP llamará a los gestores de almacenamiento de sesiones open y read
													// Conexión con el SERVIDOR WEB LOCAL: localhost 
													// Luego con la base de datos en MYSQL formulario.
$conn = mysqli_connect('localhost', 'root', '', 'inventario') or die (mysqli_error($mysqli));
?>

