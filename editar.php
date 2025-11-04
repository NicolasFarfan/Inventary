<?php 
include("conectar.php");                // Conecta con el servidor web local Apache, MySQl y la base de datos.

$Nombre = ''; 
$Cantidad= ''; 
$Precio= ''; 
$Seccion= ''; 

if (isset($_GET['Id'])) {              // Verificacion de parametro
    $Id = $_GET['Id']; 
    $query = "SELECT * FROM productos WHERE Id=$Id";    // Realiza una consulta de la base de datos
    $result = mysqli_query($conn, $query);              
    if (mysqli_num_rows($result) == 1) {                // Verifica 
                
        $row = mysqli_fetch_array($result); 
        $Nombre =$row['Nombre']; 
        $Cantidad = $row['Cantidad']; 
        $Precio = $row['Precio']; 
        $Seccion = $row['Seccion']; 
    } 
} 
?> 
 
<?php include('header.php'); ?>

<body style=" padding: 0; margin: 0; text-align: center; background-color: #8bdfec"> 
<br><br>
<div style="background-color: #d6eaf8; padding: 20px; border: 1px solid #ccc; border-radius: 10px; width: 80%; margin: 40px auto;"> 
    <br> 
    <h3>Ingrese los nuevos valores</h3> 
    <form method="POST" action="editar.php?Id=<?php echo $_GET['Id']; ?>" > 
        <div style="padding: 2px; padding-left: 15px;"> 
            <label for="Nombre">Nombre: </label> 
            <input name="Nombre" type="text" required autocomplete="off" style="background-color: white;" value="<?php echo $Nombre; ?>"> 
        </div> 
        <div style="padding: 2px; padding-left: 3px"> 
            <label for="Cantidad">Cantidad: </label> 
            <input name="Cantidad" type="number" min="0" style="background-color: white;" value="<?php echo $Cantidad; ?>"> 
        </div> 
        <div style="padding: 2px; padding-left: 30px"> 
            <label for="Precio">Precio:</label> 
            <input name="Precio" type="number" min="0" style="background-color: white;" value="<?php echo $Precio; ?>"> 
        </div> 
        <div style="padding:2px;padding-left: 15px;">
          <label for="Seccion">Sección:</label>
          <select name="Seccion" id="Seccion">
            <option value=""></option>
              <?php 
              $query = "SELECT DISTINCT Seccion FROM productos";
              $result_tasks = mysqli_query($conn, $query);
              while ($row = mysqli_fetch_assoc($result_tasks)) { 
                  echo '<option value="' . $row['Seccion'] . '">' . $row['Seccion'] . '</option>';
              }?>
          </select>
          <input  value="<?php echo $Seccion; ?>" type="text" id="new_seccion" name="new_seccion" placeholder="Agregar nueva sección" autocomplete="off">
        </div>
        <div style="padding: 2px;">
        <a href="tabla.php"> <button type="button" style="background-color: skyblue;" >Volver</button></a> 
        <button name="UPDATE" style="background-color: skyblue;" >Modificar </button> 
        <button name="DELETE" style="background-color: red;" >Borrar </button> 
        </div>
    </form> 
<br>

</div> 
<?php 
if (isset($_POST['UPDATE'])) { 
    $Id = $_GET['Id']; 
    $Nombre= strtoupper ($_POST['Nombre']); 
    $Cantidad = $_POST['Cantidad']; 
    $Precio_compra = $_POST['Precio']; 
    if(isset($_POST['Seccion']) && $_POST['Seccion'] == '') {                            # Verificacion si se selecciono una opcion
        $Seccion = strtoupper ($_POST['new_seccion']);                                                 # Sino crea una nueva seccion en otra lista
      } else {
        $Seccion = strtoupper ($_POST['Seccion']);
      }

    $query = "UPDATE productos set Nombre = '$Nombre', Seccion = '$Seccion', Cantidad = '$Cantidad' , Precio = '$Precio' WHERE Id='$Id'";
    mysqli_query($conn, $query);
    header("Location: tabla.php?mensaje=Producto editado correctamente");
    exit();
    }
if (isset($_POST['DELETE'])) { 
    $Id = $_GET['Id']; 
    $query = "DELETE FROM productos WHERE Id='$Id'"; 
    mysqli_query($conn, $query);
    header("Location: tabla.php?mensaje=Producto eliminado Correactamente");
    exit();
} 
?> 

<?php include('footer.php'); ?>
