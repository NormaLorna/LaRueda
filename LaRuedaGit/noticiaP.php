
<?php
  require "conexion.php";
   
    
    $noti_id=$_GET['noti_id'];
    $sql="SELECT
                  noti_id, noti_titulo, noti_copete, noti_alta, noti_audio, noti_audio2,  noti_desarrollo, autoras.autora_id, autoras.autora_nombre, autoras.autora_email, noti_foto, noti_foto2, noti_foto3, seccion.seccion_id, seccion.seccion_nombre, noti_video
           FROM 
                  noticias, autoras, seccion
           WHERE 
                  noticias.autora_id=autoras.autora_id 
           
           AND
                  noticias.seccion_id=seccion.seccion_id

           AND    noti_id=".$noti_id;

    $resultado=mysqli_query($link,$sql) or die(mysqli_error($link));
    $fila= mysqli_fetch_assoc($resultado);

    $originalDate = $fila["noti_alta"];
    $newDate = date("d - M -Y - G:i", strtotime($originalDate));

?>

<!DOCTYPE HTML>
<html lang="es">
<head>

<meta property="og:type" content="article" />
<meta property="og:title" content="<?php echo $fila['noti_titulo']; ?>"/>
<meta property="og:description" content="<?php echo $fila['noti_copete']; ?>" />
<meta property="og:image"  content="https://www.laruedanoticias.com.ar/fotos/<?php echo $fila["noti_foto"]; ?>"   />
<meta property="og:image:url"  content="https://www.laruedanoticias.com.ar/noticia.php?noti_id=<?php $noti_id; echo $fila['noti_foto']; ?>" />
<meta property="og:image:secure_url"    content="https://www.laruedanoticias.com.ar/noticia.php?noti_id=<?php $noti_id; echo $fila['noti_foto']; ?>" />


</head>

<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v7.0" nonce="WNtY8X5A"></script>
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

      <div class="noticiampliada"> 
        <h4><?php echo $fila["seccion_nombre"] ?> </h4>

        <h6><?php echo $newDate ?></h6>

        <h2><?php echo $fila["noti_titulo"] ?></h2>
        <div class="copete"> <i>
          <?php echo $fila["noti_copete"] ?> </i> 
        </div>
        <?php 
        if ($fila["noti_foto"] !="1") 
        {  ?>
        <img class="fotos" alt="<?php echo $fila["noti_titulo"]; ?>" 
          src="fotos/<?php echo $fila["noti_foto"]; ?>" > 
        <?php 
        } ?> 

        <div class="redecom"> 
            <?php 
            if ($fila["autora_id"] !="")  
            {   
            ?>
            <h6 class="redecomh6"> <br><?php echo $fila["autora_nombre"] ?> <br>
            <?php echo $fila["autora_email"] ?>
            <?php 
            } ?> <br> <br> </h6> 
            <div class="fb-share-button" data-href="https://www.laruedanoticias.com.ar" data-layout="button_count" data-size="small"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fwww.laruedanoticias.com.ar%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Compartir</a></div>
            <div>
            <a href="https://www.facebook.com/laruedacomunicacionpopular/" onclick="this.target='_blank' "><img src="img/fb.png" class="feibutw" title="compartir en Facebook" alt="Facebook"></a>
            <a href="https://twitter.com/laruedanoticias" onclick="this.target='_blank' "><img src="img/twiter.png" class="feibutw" title="Compartir en Twiter" alt="Twiter"></a>  
            </div>
        </div>
        <?php 
        if ($fila["noti_audio"] !="") 
        { ?>
         <audio controls>
         <source src="audios/<?php echo $fila["noti_audio"] ?>" type="audio/mp3" />
         </audio>
          
        <?php
        if ($fila["noti_audio2"] !="") 
        { ?> 
         <audio controls>
         <source src="audios/<?php echo $fila["noti_audio2"] ?>" type="audio/mp3" />
         </audio>
        <?php   
        } 
        }                         
        ?>
        <br>

        <p class="desarrollo" ><?php echo $fila["noti_desarrollo"] ?> </p>  

        <br>

        <?php if ($fila["noti_foto2"]!="")
        { ?> 
        <img class="fotos" alt="<?php echo $fila["noti_titulo"]; ?>" 
          src="fotos/<?php echo $fila["noti_foto2"]; ?>" >
        <?php  
        }?> 
        <?php if ($fila["noti_foto3"]!="")
        {  ?> 
        <img class="fotos" alt="<?php echo $fila["noti_titulo"]; ?>" 
          src="fotos/<?php echo $fila["noti_foto3"]; ?>" >
        <?php
        } ?>  
        
        

          <iframe width="560" height="315" src="https://www.youtube.com/embed/HrfKJvbiW9s" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        <!-- <iframe class="video" src="<?php  echo $fila["noti_video"]; ?>" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe> -->
       

        <?php include "anuncios.php" ?>

      </div> 

    <?php include "pie.php" ?>

  </div>

</div>   