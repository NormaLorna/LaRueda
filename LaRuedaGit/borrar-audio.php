<?php
require "validar.php";
?>

<?php
  $titulo5 = "Borrado de un Audio";
  $aud_id=$_POST['aud_id'];
  require "conexion.php";
  $sql5= "DELETE FROM 
                    audios
         WHERE  
               aud_id=".$aud_id;
  mysqli_query($link,$sql5) or die (mysqli_error($link));                      
    $chequeo5= mysqli_affected_rows($link);
    mysqli_close($link);
    header("refresh:3; url=panel-audios.php") 
  
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
        <table > <h2><?php echo $titulo5 ; ?></h2>
    <!-- inicio del desarrollo -->
  
           <?php 

           if ($chequeo5>=1) 
        { 
           ?>
  
           <tr>
              <td > Se borró <?php echo $chequeo5 ?> audio </td>
           </tr>
        </table>
        <?php 
        };
           
        ?>

     </div>
      <?php include "pie.php" ?>

  </div>

</div>   