<?php
    
  require "conexion.php";

   $sec_idP=3;

   $sql7= "SELECT 
           noti_id, noti_titulo, noti_copete, noti_desarrollo, noti_alta, noti_foto, noti_video, seccion.seccion_id
           FROM 
           noticias, seccion
           WHERE 
           noticias.seccion_id=seccion.seccion_id
           AND          
           seccion.seccion_id=".$sec_idP."
           ORDER BY 
                   noti_id DESC ";
  //die($sql2);
            
    $resultado7=mysqli_query($link,$sql7) or die(mysqli_error($link));                 
   
    //print_r($fila2)
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
         <h1><br> Policiales </h1> 

      </div>
     
                  
      <div class="terceras">
           <?php while ($fila7= mysqli_fetch_array($resultado7))  { 
           
           $originalDate = $fila7["noti_alta"];
           $newDate = date("d - M -Y - G:i", strtotime($originalDate)); ?>
      <article class="notiter">
           
           <h4>  <?php echo $newDate ?> </h4>

           <?php if ($fila7["noti_video"]!="") { ?> 
           <iframe class="video" src="<?php  echo $fila7["noti_video"]; ?>" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
           <?php } else { ?>
           <img src="fotos/<?php echo $fila7["noti_foto"]; ?>">  <?php } ?>
           <a class="titpor" href="noticia.php?noti_id=<?php echo $fila7["noti_id"] ?>"><h2> <?php  echo $fila7["noti_titulo"]; ?> </h2>
            <?php  echo $fila7["noti_copete"]; ?>
           </a> 
      </article>
           <?php }; ?> 
    </div>
    


      <?php include "pie.php" ?>

  </div>

</div>  