<?php include('conectar.php'); ?>

<?php include('header.php'); ?>


<body style="	padding: 0; margin: 0; text-align: center; background-color: #8bdfec ">

<!-- Formulario para EDITAR un registro !-->
<div style=" background-color: #d6eaf8; padding: 20px; border: 1px solid #ccc; border-radius: 10px; width: 80%; margin: 20px auto;">
  <center> <h2>Producto a cambiar</h2> </center>
  <form action="editar.php">
    <label for="Id">ID:</label>
    <input type="number" name="Id" min="1" required> 
    <input type="submit" value="Editar">
    <a href="index.php"><button type="button" >Inicio</button></a>
  </form>
</div>
<!-- Marco de la tabla de los Productos -->
<table style="border-collapse: collapse;text-align: center; background-color: beige; color: #24303c; width: calc(75% - 50px); margin: auto; margin-top: 12px; font-size: 16px;">
    <thead style="border-bottom: #24303c; color: #ededed; background-color:	#ff5f34 ;">
      <tr style="text-align:center">
        <th> ID </th>	
        <th> Nombre </th>
        <th> Cantidad </th>
        <th> Precio</th>
        <th> Sección </th>
      </tr>
    </thead>
  <tbody>

<!-- Registros de los Productos -->
<?php
  $query = "SELECT * FROM productos ORDER BY seccion ASC";						
  $result_tasks = mysqli_query($conn, $query);			
  while($row = mysqli_fetch_assoc($result_tasks)) { ?>
    <tr>													
      <td><?php echo $row['Id']; ?></td>
      <td><?php echo $row['Nombre']; ?></td>
      <td><?php echo $row['Cantidad']; ?></td>
      <td><?php echo $row['Precio']; ?></td>
      <td><?php echo $row['Seccion']?></td>
      </tr>
    <?php } ?>
  </tbody>
</table>

<?php include('footer.php'); ?>