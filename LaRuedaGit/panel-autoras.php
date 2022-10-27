
<?php
  require "conexion.php";
  require "validar.php";
  $tituloPN = "Administracion del sistema de altas, bajas y modificaciones de Autoras";
  $titulo2= "Bienvenide:  ";

 
  $sql="SELECT 
              autora_id, autora_nombre, autora_email
        FROM 
               autoras ";

  $resultado=mysqli_query($link,$sql) or die(mysqli_error($link));
  $cantidad=mysqli_num_rows($resultado);
  mysqli_close($link);  
    
?>

<div class="contenedor">

  <div class="cuerpo">

      <?php include "encabezado.php" ?>

      <div class="fecha">
       
         <b><?php date_default_timezone_set('America/Argentina/Buenos_Aires');
         $hoy = date("F j, Y,     G:i:s ");
         print_r($hoy);
         ?>
         </b>

      </div>

      <div  class="tablas">
        <table id="noticia"> 
          <h2 class="panel"><?php echo $tituloPN ; ?></h2>
          <h2 class="panel"><a href="logout.php">SALIR // </a><a href="agencia.php">VOLVER</a></h2>
    
          <tr>
            <th>Nombre</th>
            <th>Email</th>
            <th colspan="2"> <a href="form-alta-autora.php"> <img src="img/add.png" title="Agregar Autora"></a> </th>
          </tr>
          <?php
           while ($fila= mysqli_fetch_array($resultado))  {
          ?>
          <tr>
            <td class="lista"> <?php echo $fila["autora_nombre"] ?> </td>
            <td class="lista"><?php echo $fila["autora_email"] ?></td>
            
            <td class="lista"> <a href="form-editar-autora.php?autora_id=<?php echo $fila["autora_id"] ?>">
            <img src="img/editar2.png" title="Modificar Autora"></a> </td>
            <td class="lista"> <a href="form-borrar-autora.php?autora_id=<?php echo $fila["autora_id"] ?>">
            <img src="img/borrar.png" title="Borrar Autora"> 
            </a> </td>
          </tr>
           <?php
            } //fin del muestreo
           ?>
          <tr>
            <td colspan="6" class="pieT">
            Se han encontrado <?php echo $cantidad ?> registros
            </td>
          </tr>  
        </table>   
      </div>  

      <?php include "pie.php" ?>

  </div>

</div>   