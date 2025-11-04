<?php
include('conectar.php');	

if (isset($_POST['guardar'])) {		                                                         # Verificacion si se repite el dato de Nombre(para no repetir producto)
  $Nombre = strtoupper ($_POST['Nombre']);                                                 # srtoupper para ingresar el dato en MAYUSCULAS
  $query_existente = "SELECT * FROM productos WHERE Nombre = '$Nombre'";
  $result_existente = mysqli_query($conn, $query_existente);
  if (mysqli_num_rows($result_existente) > 0) {                                            # Verificacion de el ingreso de datos para guardar
    echo "<br><center><h1 style='color: red;'>El Producto ya Existe</h2></center>";}
    else{                                                                               
      $Cantidad = $_POST['Cantidad'];
      $Precio = $_POST['Precio'];
      if(isset($_POST['Seccion']) && $_POST['Seccion'] == '') {                            # Verificacion si se selecciono una opcion
        $Seccion = strtoupper ($_POST['new_seccion']);                                                 # Sino crea una nueva seccion en otra lista
      } else {
        $Seccion = strtoupper ($_POST['Seccion']);
      }
      $query = "INSERT INTO productos( Nombre, Cantidad, Precio, Seccion) VALUES ('$Nombre', '$Cantidad', '$Precio', '$Seccion')";	// Alta de datos con SQL
      $result = mysqli_query($conn, $query);
      echo "<br><center><h1>El Producto se Agrego Correctamente</h2 ></center>";
    }									
}
?>

<?php include ('header.php')?>

<body style=" padding: 0; margin: 0; text-align: center; background-color: #8bdfec">
<br>

<!-- Votones para volver a agregar.php e ir a tabla.php-->
<link>
  <a href="agregar.php">
    <center>
      <button>Volver</button>
    </center>
  </a>
    <br>
  <a href="tabla.php">
    <center>
      <button>Ver Productos</button>
    </center>
  </a>

  <?php include('footer.php'); ?>
