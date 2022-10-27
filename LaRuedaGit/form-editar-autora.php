<?php
  $titulo = "Formulario de modificación de un autor";

  require "conexion.php";
  require "validar.php";

  $autora_id=$_GET['autora_id'];

  $sql8=" SELECT 
             autora_nombre, autora_email
         FROM 
             autoras
          WHERE autora_id=".$autora_id;
  $resultado8=mysqli_query($link,$sql8) or die(mysqli_error($link));
  $fila8= mysqli_fetch_assoc($resultado8);
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
     
        <form action="editar-autora.php" method="post" enctype="multipart/form-data">
           <table class="paneles">

              <tr>
                  <td class="listaP">Autora</td>
                  <td class="listaP"> <input type="text" value="<?php echo $fila8["autora_nombre"]; ?>" name="autora_nombre" class="consultaT"></td>
              </tr>
              <tr>
                  <td class="listaP">Email</td>
                  <td class="listaP"> <input type="text" value="<?php echo $fila8["autora_email"]; ?>" name="autora_email" class="consultaT"></td>
              </tr>
             
             
              <tr>            
                 <td colspan="2" class="listaP"> 
                 <input type="hidden" id="autora_id" name="autora_id" value="<?php echo $autora_id ?> "> 
                 <input id="botones" type="submit" value="Confirmar edición"> </td>
              </tr>
            
      </table>  
    </form> 

  <?php include "pie.php" ?>

  </div>

</div>   