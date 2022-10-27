

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
        <table id="noticia"> 
          <h2 class="panel"><?php echo $tituloPN ; ?></h2>
          <h2 class="panel"><a href="logout.php">SALIR // </a><a href="admin.php">VOLVER</a></h2>
    
        
      </div>  

      <?php include "pie.php" ?>

  </div>

</div>   

