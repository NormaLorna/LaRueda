<?php
  $titulo = "Saliendo del sistema";
  require "conexion.php";
  require "validar.php";
  $titulo1= "Gracias por su visita, vuelva pronto: "

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

        <h1 align="center"><?php echo $titulo ;?> </h1>
        <h2 align="center"><?php echo $titulo1 ; echo  $_SESSION['usu_nombre'];?> </h2>
        <?php
        
        SESSION_UNSET();
        SESSION_DESTROY();
    
    
              header("refresh:5; url=index.php");
          ?>
  
      </div>
     
      <?php include "pie.php" ?>

  </div>

</div>   