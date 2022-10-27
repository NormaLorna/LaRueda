<?php
  require "conexion.php";
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

      <div class="cuerpoF">
          
          <h2 class="panel"><a href="logout.php">SALIR</a></h2>

          <a class="tabla" href="panel-noticias.php">Administración de Noticias <img src="img/editar3.png" title="Ingresar"> </a>
          <a class="tabla" href="panel-audios.php">Aministrador de audios <img src="img/editar3.png" title="Ingresar"> </a>
          <a class="tabla" href="panel-autoras.php">Administración de Autoras <img src="img/editar3.png" title="Ingresar"> </a>
          <a class="tabla" href="panel-usuarios.php">Administración de Usuarios <img src="img/editar3.png" title="Ingresar"> </a>
          <a class="tabla" href="panel-suscri.php">Listado de suscriptores <img src="img/editar3.png" title="Ingresar"> </a>
     
      </div>


      <?php include "pie.php" ?>

  </div>

</div>   