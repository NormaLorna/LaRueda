<?php
  $titulo = "Borrado de una Noticia";
  $noti_id=$_POST['noti_id'];
  require "conexion.php";
  $sql5= "DELETE FROM 
                    noticias
         WHERE  
               noti_id=".$noti_id;
  mysqli_query($link,$sql5) or die (mysqli_error($link));                      
    $chequeo5= mysqli_affected_rows($link);
    mysqli_close($link);
    header("refresh:3; url=panel-noticias.php") 
  
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
              <td > Se borró <?php echo $chequeo5 ?> noticia </td>
           </tr>
        </table>
        <?php 
        };
           
        ?>

     </div>
      <?php include "pie.php" ?>

  </div>

</div>   