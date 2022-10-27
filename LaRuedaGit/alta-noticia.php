<?php
  $titulo = "Alta de una Noticia";
  //Rutina para subir imágenes 

  $ruta="fotos/";
  $noti_foto=$_FILES['noti_foto']['name'];
  $noti_fotoTMP=$_FILES['noti_foto']['tmp_name'];
  move_uploaded_file($noti_fotoTMP, $ruta.$noti_foto);

  $noti_foto2=$_FILES['noti_foto2']['name'];
  $noti_foto2TMP=$_FILES['noti_foto2']['tmp_name'];
  move_uploaded_file($noti_foto2TMP, $ruta.$noti_foto2);

  $noti_foto3=$_FILES['noti_foto3']['name'];
  $noti_foto3TMP=$_FILES['noti_foto3']['tmp_name'];
  move_uploaded_file($noti_foto3TMP, $ruta.$noti_foto3);

  $ruta2="audios/";
  $noti_audio=$_FILES['noti_audio']['name'];
  $noti_audioTMP=$_FILES['noti_audio']['tmp_name'];
  move_uploaded_file($noti_audioTMP, $ruta2.$noti_audio);

  $noti_audio2=$_FILES['noti_audio2']['name'];
  $noti_audio2TMP=$_FILES['noti_audio2']['tmp_name'];
  move_uploaded_file($noti_audio2TMP, $ruta2.$noti_audio2);

  //Rutina para insertar datos en tabla noticias

  $seccion_id=$_POST['seccion_id'];
  $autora_id=$_POST['autora_id'];
  $noti_titulo=$_POST['noti_titulo'];
  $noti_copete=$_POST['noti_copete'];
  $noti_desarrollo=$_POST['noti_desarrollo'];
  $noti_video=$_POST['noti_video'];
 
  date_default_timezone_set('America/Argentina/Buenos_Aires');
  $noti_alta= date("Y-m-d G-i-s");

    require "conexion.php";
    require "validar.php";

  $sql="INSERT INTO 
                   noticias 
            VALUES (
                      NULL,
                      ".$seccion_id.",
                      ".$autora_id.",
                     '".$noti_titulo."',
                     '".$noti_copete."',
                     '".$noti_desarrollo."',
                     '".$noti_foto."',
                     '".$noti_foto2."',
                     '".$noti_foto3."',
                     '".$noti_audio."',
                     '".$noti_audio2."',
                     '".$noti_video."',
                     '".$noti_alta."'
                    )";  // die($sql);


    mysqli_query ($link, $sql) or die(mysqli_error($link));
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

        <?php 

         if ($chequeo>=1) 
        { 
        ?>
      
        <h1 colspan="2">Se ha agregado la siguiente Noticia</h1>
         <table class="paneles">
           
           
           <tr>
                <td class="listaP">Sección</td> 
                <td class="listaP"> <?php echo $seccion_id; ?>  </td>
            </tr>
            <tr>
                <td class="listaP">Autora</td> 
                <td class="listaP"> <?php echo $autora_id; ?>  </td>
            </tr>
            <tr>
                <td class="listaP">Título</td> 
                <td class="listaP"> <?php echo $noti_titulo; ?>  </td>
            </tr>
            <tr>
                <td class="listaP">Copete</td> 
                <td class="listaP"> <?php echo $noti_copete; ?>  </td>
            </tr>
            <tr>
                <td class="listaP">Desarrollo</td> 
                <td class="listaP"> <?php echo $noti_desarrollo; ?>  </td>
            </tr>
           
            </tr>
            <tr>
                <td class="listaP">Foto Portada</td>
                <td class="listaP">  <img class="fotoNoti" src="fotos/<?php echo $noti_foto; ?>" > </td>
            </tr>
            <tr>
                <td class="listaP">Foto 2</td>
                <td class="listaP">  <img class="fotoNoti"  src="fotos/<?php echo $noti_foto2; ?>" > </td>
            </tr>
            <tr>
                <td class="listaP">Foto 3</td>
                <td class="listaP">  <img class="fotoNoti"  src="fotos/<?php echo $noti_foto3; ?>" > </td>
            </tr>
            <tr>
                <td class="listaP">Audio</td>
                <td class="listaP"> <?php echo $noti_audio; ?> </td>
            </tr>
            <tr>
                <td class="listaP">Audio 2</td>
                <td class="listaP"> <?php echo $noti_audio2; ?> </td>
            </tr>
            <tr>
                <td class="listaP">Video</td>
                <td class="listaP"> <?php echo $noti_video; ?> </td>
            </tr>


             <tr>
              
              <td class="listaP"> <a href="panel-noticias.php">
              Volver </a>
              </td>
              <td  class="listaP"> <a href="form-alta-noticia.php"> 
              Agregar otra Noticia </a>
              </td>
          </tr>
           </table>
           <?php 
        };
           
       ?>














      <?php include "pie.php" ?>

  </div>

</div>   