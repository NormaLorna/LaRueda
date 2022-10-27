

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
        <form action="alta-suscrip.php" method="post" enctype="multipart/form-data">

      <table  id="formulario" align="center">

      <h1>Por favor dejanos los datos de tu suscripción, para ingresarte a nuestra lista de amigos. <br> (Los datos ingresados son confidenciales.)</h1>
         <tr>
           <td> Nombre </td>
           <td> <input type="text" name="suscrip_nombre" id="consultat"></td>
         </tr>

         <br>

         <tr>
           <td> Email </td>
           <td> <input type="text" name="suscrip_email" id="consultat"></td> 
         </tr>
         <tr>
           <td> Número de operación (De mercadopago) </td>
           <td> <input type="text" name="suscrip_operacion" id="consultat"></td> 
         </tr>
         <tr>
           <td>Ingrese importe y período (Ejemplo: 100 por 3 meses.)</td>
           <td> <input type="text" name="suscrip_nota" id="consultat"></td> 
         </tr>
         <tr>            
            <td colspan="2" align="center" >
              <input type="submit" id="botones"  value="Ingresar"  >
            </td>
         </tr>
            
      </table>  
    </form> 
    
        
      </div>  

      <?php include "pie.php" ?>

  </div>

</div>   

