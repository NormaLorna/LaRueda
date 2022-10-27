
<?php
  $titulo = "Formulario de alta de Audio";
  require "conexion.php"; #esto es el primer paso de la guia de 5 pasos conecto
  require "validar.php"; 
  
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

     <form action="alta-audio.php" method="post" enctype="multipart/form-data">

      <table class="paneles" align="center">

       <tr>
           <td class="listaP"> Nombre del audio </td>
           <td class="listaP"> <input type="text" name="aud_nombre" id="consultat"></td>
       </tr>
       <tr>
           <td class="listaP"> Detalle del audio 
                                           </td>
           <td class="listaP"> <input type="text" name="aud_detalle" id="consultat"></td>
       </tr>
       <tr> 
           <td class="listaP">Audio 1</td>
           <td  class="listaP"><input type="file" name="aud_1" id="aud_1"></td>
         </tr>
         <tr> 
           <td class="listaP">Audio 2</td>
           <td  class="listaP"><input type="file" name="aud_2" id="aud_2" ></td>
         </tr>
         <tr> 
           <td class="listaP">Audio 3</td>
           <td class="listaP"><input type="file" name="aud_3" id="aud_3" ></td>
         </tr>
         <tr> 
           <td class="listaP">Audio 4</td>
           <td class="listaP"><input type="file" name="aud_4" id="aud_4"></td>
         </tr>
         <tr> 
           <td class="listaP">Audio 5</td>
           <td class="listaP"><input type="file" name="aud_5" id="aud_5"></td>
         </tr>
        
         <tr>            
            <td colspan="2" align="center">
              <input type="submit" id="botones"  value="Agregar Audio"  >
            </td>
        </tr>
            
      </table>  
    </form> 
     <?php include "pie.php" ?>

  </div>

</div>   