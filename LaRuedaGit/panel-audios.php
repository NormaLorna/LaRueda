<?php


  require "conexion.php";
  $titulo1 = "Administracion del sistema de altas, bajas y modificaciones de Audios";
  $titulo2= "Bienvenido:  ";
  require "validar.php";
  
  $sql3="SELECT 
               aud_id, aud_nombre, aud_detalle, aud_1, aud_2, aud_3, aud_4, aud_5
        FROM 
               audios 
       ORDER BY aud_id DESC LIMIT 50";

  $resultado3=mysqli_query($link,$sql3) or die(mysqli_error($link));
  $cantidad3=mysqli_num_rows($resultado3);
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
          <h2 class="panel"><?php echo $titulo1 ; ?></h2>
          <h2 class="panel"><a href="logout.php">SALIR // </a><a href="agencia.php">VOLVER</a></h2>
    
  
              <tr>
                <th>Nombre</th>
                <th>Detalle</th>
                <th>Audio 1</th>
                <th>Audio 2</th>
                <th>Audio 3</th>
                <th>Audio 4</th>
                <th>Audio 5</th>
                <th colspan="2"> <a href="form-alta-audio.php"> <img src="img/add.png" title="Agregar Audio"></a> </th>
              </tr>
              <?php
              while ($fila3= mysqli_fetch_array($resultado3))  {
              ?>
              <tr> <?php if ($fila3["aud_id"]!=1) { ?>
                <td class="lista"> <?php echo $fila3["aud_nombre"] ?> </td>
                <td class="lista"> <?php echo $fila3["aud_detalle"] ?> </td>
                <td class="lista"><?php echo $fila3["aud_1"] ?></td>
                <td class="lista"><?php echo $fila3["aud_2"] ?></td>
                <td class="lista"><?php echo $fila3["aud_3"] ?></td>
                <td class="lista"><?php echo $fila3["aud_4"] ?></td>
                <td class="lista"><?php echo $fila3["aud_5"] ?></td>
                <td class="lista"> 
                  <a href="form-borrar-audio.php?aud_id=<?php echo $fila3["aud_id"] ?>">
                  <img src="img/borrar.png" title="Borrar Audio"> 
                  </a> </td>
              </tr>
             <?php
                } } //fin del muestreo   
               ?>
        </table> 



      </div>  

      <?php include "pie.php" ?>

  </div>

</div>   

