<?php
  $titulo = "Borrado de un Autor";
  $autora_id=$_POST['autora_id'];
  require "conexion.php";
  require "validar.php";
  $sql5= "DELETE FROM 
                    autoras
         WHERE  
               autora_id=".$autora_id;
  mysqli_query($link,$sql5) or die (mysqli_error($link));                      
    $chequeo5= mysqli_affected_rows($link);
    mysqli_close($link);
    header("refresh:3; url=panel-autoras.php") 
  
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
        <table > <h2><?php echo $titulo ; ?></h2>
    <!-- inicio del desarrollo -->
  
           <?php 

           if ($chequeo5>=1) 
        { 
           ?>
  
           <tr>
              <td > Se borró <?php echo $chequeo5 ?> autora </td>
           </tr>
        </table>
        <?php 
        };
           
        ?>

     </div>
      <?php include "pie.php" ?>

  </div>

</div>   