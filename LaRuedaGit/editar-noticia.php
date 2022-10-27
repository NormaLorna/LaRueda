
<?php
    $titulo = "Modificación de una noticia";
    require "conexion.php";
    require "validar.php";

 $sqlnoti_foto=$sqlnoti_foto2=$sqlnoti_foto3=$sqlnoti_audio=$sqlnoti_audio2="";
       // rutina para subir imagenes si fueron enviadas
    $ruta= "fotos/";

    if($_FILES['noti_foto']['name']!="")
               {
                $noti_foto=$_FILES['noti_foto']['name'];
              $noti_fotoTMP=$_FILES['noti_foto']['tmp_name'];
              move_uploaded_file($noti_fotoTMP, $ruta.$noti_foto);
                $sqlnoti_foto=", noti_foto='".$noti_foto."'";
               };
    if($_FILES['noti_foto2']['name']!="")
               {
                $noti_foto2=$_FILES['noti_foto2']['name'];
              $noti_foto2TMP=$_FILES['noti_foto2']['tmp_name'];
              move_uploaded_file($noti_foto2TMP, $ruta.$noti_foto2);
                $sqlnoti_foto2=", noti_foto2='".$noti_foto2."'";// aca está una parte del sql que cuando le asigno abajo al $sql
               };
    if($_FILES['noti_foto3']['name']!="")
               {
                $noti_foto3=$_FILES['noti_foto3']['name'];
              $noti_foto3TMP=$_FILES['noti_foto3']['tmp_name'];
              move_uploaded_file($noti_foto3TMP, $ruta.$noti_foto3);
                $sqlnoti_foto3=", noti_foto3='".$noti_foto3."'";
               };           


$sqlnoti_audio=$sqlnoti_audio2="";

 $ruta2= "audios/";

    if($_FILES['noti_audio']['name']!="")
               {
                $noti_audio=$_FILES['noti_audio']['name'];
              $noti_audioTMP=$_FILES['noti_audio']['tmp_name'];
              move_uploaded_file($noti_audioTMP, $ruta2.$noti_audio);
                $sqlnoti_audio=", noti_audio='".$noti_audio."'";
               };
    if($_FILES['noti_audio2']['name']!="")
               {
                $noti_audio2=$_FILES['noti_audio2']['name'];
              $noti_audio2TMP=$_FILES['noti_audio2']['tmp_name'];
              move_uploaded_file($noti_audio2TMP, $ruta2.$noti_audio2);
                $sqlnoti_audio2=", noti_audio2='".$noti_audio2."'";// aca está una parte del sql que cuando le asigno abajo al $sql
               };

     //Rutina para modificar datos en tabla productos         
    $noti_id= $_POST["noti_id"];
    $noti_titulo= $_POST["noti_titulo"];
    $noti_copete=$_POST["noti_copete"];
    $noti_desarrollo=$_POST["noti_desarrollo"];
    $noti_video= $_POST["noti_video"];
    $seccion_id=$_POST["seccion_id"];
    $autora_id=$_POST["autora_id"];
    $sql="UPDATE 
                noticias
           SET 
                 noti_titulo= '".$noti_titulo."',
                 noti_copete= '".$noti_copete."',
                 noti_desarrollo= '".$noti_desarrollo."',
                 noti_video= '".$noti_video."',
                 seccion_id= ".$seccion_id.",
                 autora_id= ".$autora_id;
             

    $sql.= $sqlnoti_foto; //se combinan los operadores el . y el igual, primero concatena y luego asigna  
    $sql.=$sqlnoti_foto2;  
    $sql.=$sqlnoti_foto3;
    $sql.=$sqlnoti_audio;  
    $sql.=$sqlnoti_audio2;   

    $sql.=" WHERE noti_id= ".$noti_id; 

    $resultado=mysqli_query($link,$sql) or die(mysqli_error($link));
    $chequeo=mysqli_affected_rows($link);

   
    mysqli_close($link);
   //die($sql);
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
              <td class="listaP">Sección</td>
              <td class="listaP"> <?php echo $seccion_id; ?> </td>
            </tr>
             <tr>
              <td class="listaP">Autora </td>
              <td class="listaP"> <?php echo $autora_id; ?> </td>
            </tr>
            <tr>
              <td  class="listaP">Titulo</td> 
              <td  class="listaP"> <?php echo $noti_titulo; ?>  </td>
            </tr>
            <tr>
              <td  class="listaP"> Copete </td>
              <td  class="listaP"> <?php echo $noti_copete; ?> </td>
            </tr>
            <tr>
              <td class="listaP">Desarrollo</td>
              <td class="listaP"> <?php echo $noti_desarrollo; ?> </td>
            </tr>
           
            <tr>
              <td class="listaP">Foto Portada</td>
              <td class="listaP">
               <img src="fotos/<?php echo $noti_foto; ?>"> </td>
            </tr>
            <tr>
              <td class="listaP">Fotos 2 </td>
              <td class="listaP"> 
                <img src="fotos/<?php echo $noti_foto2; ?>"> </td>
            </tr>
            <tr>
              <td class="listaP">Fotos 3 </td>
              <td class="listaP"> 
                <img src="fotos/<?php echo $noti_foto3; ?>"> </td>
            </tr>
            <tr>
              <td class="listaP"> Audio </td>
              <td class="listaP">
                   <audio controls>
                   <source src="audios/<?php echo $noti_audio; ?>" type="audio/mp3" />
                   </audio>
              </td>
            </tr>
            <tr>
              <td class="listaP"> Audios </td>
              <td class="listaP"><audio controls>
                   <source src="audios/<?php echo $noti_audio ?>" type="audio/mp3" />
                   </audio>
              </td>
            </tr>
             <tr>
              <td class="listaP">Video </td>
              <td class="listaP"> <?php echo $noti_video; ?> </td>
            </tr>
             
             
            <tr>
              <td colspan="2" class="listaP"> <a href="panel-noticias.php" >
                   Ir al panel de noticias </a>
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