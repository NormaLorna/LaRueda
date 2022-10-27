
<!DOCTYPE HTML>
<html lang="es">
<?php
    
  require "conexion.php";

  $sql10= "SELECT 
           noti_id, noti_titulo, noti_copete, noti_alta, noti_foto, noti_video, seccion.seccion_nombre, seccion.seccion_id 
           FROM 
           noticias, seccion
           WHERE 
           noticias.seccion_id=seccion.seccion_id
           ORDER BY 
                   noti_id DESC LIMIT  0,1"
    AND

  $sql11= "SELECT 
           noti_id, noti_titulo, noti_copete, noti_alta, noti_foto, noti_video, seccion.seccion_nombre, seccion.seccion_id 
           FROM 
           noticias, seccion
           WHERE 
           noticias.seccion_id=seccion.seccion_id
           ORDER BY 
                   noti_id DESC LIMIT  1,4"
   AND 
  $sql12= "SELECT 
           noti_id, noti_titulo, noti_copete, noti_alta, noti_foto, noti_video, seccion.seccion_nombre, seccion.seccion_id 
           FROM 
           noticias, seccion
           WHERE 
           noticias.seccion_id=seccion.seccion_id
           ORDER BY 
                   noti_id DESC LIMIT  5,20"; //die($sql12);

    $resultado10=mysqli_query($link,$sql10) or die(mysqli_error($link));
    $resultado11=mysqli_query($link,$sql11) or die(mysqli_error($link));
    $resultado12=mysqli_query($link,$sql12) or die(mysqli_error($link)); 
    //print_r($fila2)
    mysqli_close($link);  

?>

<div class="contenedor">

   <div class="cuerpo">

   <?php include "encabezado1.php" ?>

   <div class="fecha">

       <b><?php date_default_timezone_set('America/Argentina/Buenos_Aires');
         $hoy = date("F j, Y,     G:i:s ");
         print_r($hoy);
         ?>
       </b>

    </div>
    <div class="portada">

       <?php while ($fila10= mysqli_fetch_array($resultado10))  { 
                $originalDate = $fila10["noti_alta"];
                $newDate = date("d - M -Y - G:i", strtotime($originalDate)); ?>

        <h3 class="seccion"><?php echo $fila10["seccion_nombre"]; ?></h3>
         
        <h4 class="fechia"> <?php echo $newDate ?> </h4>

        <?php if ($fila10["noti_video"]!="") { ?> 
     
        <iframe class="videoP" src="<?php  echo $fila10["noti_video"]; ?>" width="600" height="450" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

            <?php } else { ?>
        <img src="fotos/<?php echo $fila10["noti_foto"]; ?>">  <?php } ?>
        <a class="titportada" href="noticia.php?noti_id=<?php echo $fila10["noti_id"] ?>"> <?php  echo $fila10["noti_titulo"]; ?>  
        </a> 
      <?php }; ?> 

    </div>
      
	
	  <div class="segundas">

      <?php while ($fila11= mysqli_fetch_array($resultado11))  { 
     
      $originalDate = $fila11["noti_alta"];
      $newDate = date("d - M -Y - G:i", strtotime($originalDate)); ?>

      <article class="notiseg">
	   	  <h3 class="seccion"><?php echo $fila11["seccion_nombre"]; ?></h3>
      	<h4 class="fechia"> <?php echo $newDate ?> </h4>
      	<?php if ($fila11["noti_video"]!="") { ?> 
     
        <iframe class="videoS" src="<?php  echo $fila11["noti_video"]; ?>" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>

            <?php } else { ?>
        <img src="fotos/<?php echo $fila11["noti_foto"]; ?>">  <?php } ?>
      	<a class="titpor" href="noticia.php?noti_id=<?php echo $fila11["noti_id"] ?>"> <?php  echo $fila11["noti_titulo"]; ?> 
        </a> 
        
		  </article>
      <?php }; ?> 

	  </div>

	  <?php include "anuncios.php" ?>

    <div class="terceras">

           <?php while ($fila12= mysqli_fetch_array($resultado12))  { 
           $originalDate = $fila12["noti_alta"];
           $newDate = date("d - M -Y - G:i", strtotime($originalDate)); ?>
      <article class="notiter">
	   	     <h3 class="seccion"><?php echo $fila12["seccion_nombre"]; ?></h3>
      	   <h4 class="fechia">  <?php echo $newDate ?> </h4>

           <?php if ($fila12["noti_video"]!="") { ?> 
      	   <iframe class="videoT" src="<?php  echo $fila12["noti_video"]; ?>" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
           <?php } else { ?>
           <img src="fotos/<?php echo $fila12["noti_foto"]; ?>">  <?php } ?>
           <a class="titpor" href="noticia.php?noti_id=<?php echo $fila12["noti_id"] ?>">
             <?php  echo $fila12["noti_titulo"]; ?> 
           </a> 
		  </article>
		       <?php }; ?> 
	  </div>

<?php include "pie.php" ?>

   </div>

</div>   