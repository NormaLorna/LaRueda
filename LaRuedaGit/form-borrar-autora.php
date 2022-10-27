<?php
  $titulo = "Confirmación de baja de una Autora";
  $autora_id=$_GET['autora_id'];
  require "conexion.php";
  require "validar.php";
  $sql4="SELECT 
              autora_id, autora_nombre, autora_email
        FROM 
              autoras
        WHERE 
              autora_id=".$autora_id;
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
            <form action="borrar-autora.php" method="post" onsubmit="return confirmarBaja()"> 
               <table id="noticia">
                <tr>
                <td class="lista">Id</td>
                <td  class="lista"> <?php echo $fila4["autora_id"] ?> </td>
                </tr>
                <tr>
                <td class="lista">Título</td>
                <td class="lista" class="lista"><?php echo $fila4["autora_nombre"] ?> </td>
                </tr>
                 <tr>
                <td class="lista">Email</td>
                <td class="lista"> <?php echo $fila4["autora_email"] ?> </td>
                </tr>
                <td colspan="2" class="centrar"> 
                <input type="hidden" id="autora_id" name="autora_id" value="<?php echo $autora_id ?> "> 
                <input id="botones" type="submit" value="Confirmar baja"> </td>
                </tr>
              </table>
           </form>
       </div>
     

        




      <?php include "pie.php" ?>

  </div>

</div>   