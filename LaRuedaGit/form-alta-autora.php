
<?php
  $titulo = "Formulario de alta de Autora";
  require "conexion.php"; #esto es el primer paso de la guia de 5 pasos conecto
  require "validar.php"; 
  
    $sql2="SELECT 
                  autora_nombre, autora_id, autora_email
           FROM autoras"; 
   
   #segundo paso creo SQL
  
  $resultado2=mysqli_query($link,$sql2);
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

        <form action="alta-autora.php" method="post" enctype="multipart/form-data"> 
             <table class="paneles">
              
              <tr>
                  <td class="listaP">Nombre</td>
                  <td class="listaP"> <input class="rellenar" type="text" name="autora_nombre" id="autora_nombre"> </td>
              </tr>
              <tr>
                  <td class="listaP"> Email</td>
                <td class="listaP"> <textarea  class="rellenar" name="autora_email" id="autora_email"></textarea>  </td>
              </tr>
              
              <tr>
                <td  class="listaP" colspan="2" >
                <input type="submit" value="Agregar  Autora"> 
                </td>
              </tr>


             </table>

        </form>

    </div>
     <?php include "pie.php" ?>

  </div>

</div>   