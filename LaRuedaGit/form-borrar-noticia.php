
<?php
  $titulo = "Confirmación de baja de una Noticia";
  $noti_id=$_GET['noti_id'];
  require "conexion.php";
  $sql4="SELECT 
              noti_id, noti_titulo, noti_copete, noti_desarrollo
        FROM 
              noticias
        WHERE 
              noti_id=".$noti_id;
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
            <form action="borrar-noticia.php" method="post" onsubmit="return confirmarBaja()"> 
               <table id="noticia">
                <tr>
                <td class="lista">Id</td>
                <td  class="lista"> <?php echo $fila4["noti_id"] ?> </td>
                </tr>
                <tr>
                <td class="lista">Título</td>
                <td class="lista" class="lista"><?php echo $fila4["noti_titulo"] ?> </td>
                </tr>
                 <tr>
                <td class="lista">Copete</td>
                <td class="lista"> <?php echo $fila4["noti_copete"] ?> </td>
                </tr>
                <tr>
                <td class="lista">Desarrollo</td>
                <td class="lista"><?php echo $fila4["noti_desarrollo"] ?> </td>
                </tr>
                <td colspan="2" class="centrar"> 
                <input type="hidden" id="noti_id" name="noti_id" value="<?php echo $noti_id ?> "> 
                <input id="botones" type="submit" value="Confirmar baja"> </td>
                </tr>
              </table>
           </form>
       </div>
     

        




      <?php include "pie.php" ?>

  </div>

</div>   