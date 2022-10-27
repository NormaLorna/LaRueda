<?php
    $titulo = "Modificación de una Autora";
    require "conexion.php";
    require "validar.php";

     //Rutina para modificar datos en tabla productos         
    $autora_id= $_POST["autora_id"];
    $autora_nombre= $_POST["autora_nombre"];
    $autora_email=$_POST["autora_email"];
   
   
    
    $sql11="UPDATE 
                autoras
           SET 
               autora_nombre= '".$autora_nombre."',
                autora_email= '".$autora_email."'
            
            WHERE autora_id= ".$autora_id; 

    $resultado11=mysqli_query($link,$sql11) or die(mysqli_error($link));
    $chequeo=mysqli_affected_rows($link);

   
    mysqli_close($link);
    // die($sql);
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

       <?php 

     if ($chequeo>=1) 
      { 
        ?>
      
         <table id="noticia">
           <th colspan="2"><h2>Se ha modificado la siguiente noticia</h2></th>
           
            <tr>
              <td  class="listaP">Nombre</td> 
              <td  class="listaP"> <?php echo $autora_nombre; ?>  </td>
            </tr>
            <tr>
              <td  class="listaP">Email</td>
              <td  class="listaP"> <?php echo $autora_email; ?> </td>
            </tr>
            <tr>
              <td colspan="2" class="listaP"> <a href="panel-autoras.php" >
                   Ir al panel de Autoras </a>
              </td> 
              
           </tr>
         </table>
    <?php 
      };
           
    ?>
     
  </div>
        




      <?php include "pie.php" ?>

  </div>

</div>   