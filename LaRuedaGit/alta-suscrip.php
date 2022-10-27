<?php
  $titulo = "Registrar suscriptor";
  
  //Rutina para insertar datos en tabla autora

  $suscrip_nombre=$_POST['suscrip_nombre'];
  $suscrip_email=$_POST['suscrip_email'];
  $suscrip_operacion=$_POST['suscrip_operacion'];
  $suscrip_nota=$_POST['suscrip_nota'];
  date_default_timezone_set('America/Argentina/Buenos_Aires');
  $suscrip_alta= date("Y-m-d G-i-s");

  require "conexion.php";
  $sql="INSERT INTO 
                  suscriptores
            VALUES (
                      NULL,
                      '".$suscrip_nombre."',
                      '".$suscrip_email."',
                      '".$suscrip_operacion."',
                      '".$suscrip_nota."',
                      '".$suscrip_alta."'
                      )"; // die($sql);
    mysqli_query ($link,$sql);

   $sql2= "SELECT 
                 suscrip_id, suscrip_nombre, suscrip_email, suscrip_nota
           FROM 
                  suscriptores"; 
        $resultado=mysqli_query($link,$sql2) or die(mysqli_error($link));
        $cantidad=mysqli_num_rows ($resultado); 
        $fila=mysqli_fetch_assoc($resultado);
        $chequeo= mysqli_affected_rows($link);
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
        
        <th colspan="2"><h1>Suscripción</h1></th>
    
    <?php 

     if ($chequeo>=1) 
      { 
        ?>
      
         <table id="noticia">
           
            <tr>
              <td class="listaAT">Nombre</td> 
              <td class="listaA"> <?php echo $suscrip_nombre; ?>  </td>
            </tr>
            <tr>
              <td class="listaAT">Email </td>
              <td class="listaA"> <?php echo $suscrip_email; ?> </td>
            </tr>
            <tr>
              <td class="listaAT">Numero de operación</td> 
              <td class="listaA"> <?php echo $suscrip_operacion; ?>  </td>
            </tr>
            <tr>
              <td class="listaAT">Importe y período </td>
              <td class="listaA"> <?php echo $suscrip_nota; ?> </td>
            </tr>
            <tr>
             
              <td id="botones" ><a class="twoFA" href="suscripciones.php"> 
                       Volver </a>
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

