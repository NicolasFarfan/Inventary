<?php include("conectar.php"); ?>         <!--Conecta con el servidor web local (Apache2 o NGiNX), MySQl y la base de datos!-->

<?php include('header.php'); ?>

<body style="padding: 0; margin: 0; text-align: center; background-color: #8bdfec">
<br>
    <div style=" background-color: #d6eaf8; padding: 20px; border: 1px solid #ccc; border-radius: 10px; width: 80%; margin: 40px auto;">
    <h2 >Ingrese los Datos del Producto a Agregar</h2>
    
      <form action="guardar.php" method="POST">	
        <div style="padding:2px; padding-left: 15px;">
          <label for="Nombre">Nombre:</label>
          <input type="text" name="Nombre"  style="background-color: white; " required  autocomplete="off">
        </div>

        <div style="padding:2px;padding-left: 10px;"> 
          <label for="Cantidad">Cantidad: </label>
          <input type="number" name="Cantidad" min="0" style="background-color: white;">
        </div>

        <div style="padding:2px;padding-left: 30px;">
          <label for="Precio">Precio: </label>
          <input type="number" name="Precio" min="0" style="background-color: white;"> 
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
          <input type="text" id="new_seccion" name="new_seccion" placeholder="Agregar nueva sección" autocomplete="off">
        </div>
        <div>
          <a href="index.php"><button type="button" >Inicio</button></a>
          <input type="submit" name="guardar" value="Agregar">
          </div>
      </form>
      <br>
      </div>
        
<?php include('footer.php'); ?>