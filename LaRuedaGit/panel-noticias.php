
<?php

  require "conexion.php";
  require "validar.php";
  $tituloPN = "Administracion del sistema de altas, bajas y modificaciones de Noticias";
  $titulo2= "Bienvenido:  ";

  $sql3="SELECT 
               noti_id, noti_titulo, noti_copete, noti_desarrollo
         FROM 
               noticias 
         ORDER BY noti_id DESC LIMIT 100";

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
          <h2 class="panel"><?php echo $tituloPN ; ?></h2>
          <h2 class="panel"><a href="logout.php">SALIR // </a><a href="agencia.php">VOLVER</a></h2>
    
          <tr>
            <th>Título</th>
            <th>Copete</th>
            <th>Desarrollo</th>
              <th colspan="2"> <a href="form-alta-noticia.php"> <img src="img/add.png" title="Agregar Noticia"></a> </th>
          </tr>
          <?php
           while ($fila3= mysqli_fetch_array($resultado3))  {
          ?>
          <tr>
            <td class="lista"> <?php echo $fila3["noti_titulo"] ?> </td>
            <td class="lista"><?php echo $fila3["noti_copete"] ?></td>
            <td class="listadesa"><?php echo $fila3["noti_desarrollo"] ?> </td>
            <td class="lista"> <a href="form-editar-noticia.php?noti_id=<?php echo $fila3["noti_id"] ?>">
            <img src="img/editar2.png" title="Modificar Noticia"></a> </td>
            <td class="lista"> <a href="form-borrar-noticia.php?noti_id=<?php echo $fila3["noti_id"] ?>">
            <img src="img/borrar.png" title="Borrar Noticia"> 
            </a> </td>
          </tr>
           <?php
            } //fin del muestreo
           ?>
          <tr>
            <td colspan="6" class="pieT">
            Se han encontrado <?php echo $cantidad3 ?> registros
            </td>
          </tr>  
        </table>   
      </div>  

      <?php include "pie.php" ?>

  </div>

</div>   

