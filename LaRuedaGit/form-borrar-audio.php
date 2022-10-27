<?php
require "validar.php";
?>

<?php
  $titulo = "Confirmación de baja de un Audio";
  $aud_id=$_GET['aud_id'];
  require "conexion.php";
  $sql4="SELECT 
               aud_id, aud_nombre, aud_1, aud_2, aud_3, aud_4, aud_5
        FROM 
               audios 
        WHERE 
              aud_id=".$aud_id;
  $resultado4=mysqli_query($link,$sql4) or die(mysqli_error($link));
  $fila4=mysqli_fetch_assoc($resultado4);
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

      <h2><?php echo $titulo ; ?></h2>

       <div  class="tablas">
    <!-- inicio del desarrollo -->
            <form action="borrar-audio.php" method="post" onsubmit="return confirmarBaja()"> 
               <table id="noticia">
                 <tr>
                <td class="lista">Id</td>
              <td  class="lista"> <?php echo $fila4["aud_id"] ?> </td>
            </tr>
            <tr>
                <td class="lista">Nombre</td>
              <td class="lista" class="lista"><?php echo $fila4["aud_nombre"] ?> </td>
            </tr>
            <tr>
                <td class="lista">Audio 1</td>
              <td class="lista"> <?php echo $fila4["aud_1"] ?> </td>
            </tr>
            <tr>
                <td class="lista">Audio 2</td>
              <td class="lista"> <?php echo $fila4["aud_2"] ?> </td>
            </tr>
            <tr>
                <td class="lista">Audio 3</td>
              <td class="lista"> <?php echo $fila4["aud_3"] ?> </td>
            </tr>
            <tr>
                <td class="lista">Audio 4</td>
              <td class="lista"> <?php echo $fila4["aud_4"] ?> </td>
            </tr>
            <tr>
                <td class="lista">Audio 5</td>
              <td class="lista"> <?php echo $fila4["aud_5"] ?> </td>
            </tr>
            
            <tr>
             <td colspan="2" class="centrar"> 
             <input type="hidden" id="aud_id" name="aud_id" value="<?php echo $aud_id ?> "> 
             <input id="botones"  type="submit" value="Confirmar baja"> </td>
            </tr>
              </table>
           </form>
       </div>
     

        




      <?php include "pie.php" ?>

  </div>

</div>   