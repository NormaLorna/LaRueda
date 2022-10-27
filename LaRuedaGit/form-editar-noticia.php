<?php
  $titulo = "Formulario de modificación de una noticia";


  require "conexion.php";
  require "validar.php";

  $noti_id=$_GET['noti_id'];
  $sql2="SELECT autora_nombre, autora_id FROM autoras"
         AND
  $sql7="SELECT seccion_nombre, seccion_id FROM seccion"; 
   
   #segundo paso creo SQL
  
  $resultado2=mysqli_query($link,$sql2);
  $resultado7=mysqli_query($link,$sql7);  

  $sql8=" SELECT 
             noti_titulo, noti_copete, noti_desarrollo, autora_id, noti_foto, noti_foto2, noti_foto3, noti_audio, noti_audio2, noti_video, seccion_id
          FROM 
             noticias
          WHERE noti_id=".$noti_id;
  $resultado8=mysqli_query($link,$sql8) or die(mysqli_error($link));
  $fila8= mysqli_fetch_assoc($resultado8);
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
     
        <form action="editar-noticia.php" method="post" enctype="multipart/form-data">
           <table class="paneles">

             <tr>
                  <td class="listaP">Sección</td>
                  <td class="listaP"> 
                  <select name="seccion_id" id="seccion_id">

                   <?php 

                   while($fila7=mysqli_fetch_assoc($resultado7))
                   {
                   ?>    
                    <option value="<?php echo $fila7['seccion_id']; ?>">
                     
                     <?php 
                     echo $fila7['seccion_nombre']; 
                     ?>

                    </option>

                   <?php
                  }
                   ?>

                  </select> 
                  </td>
            </tr>
            <tr>
                  <td class="listaP">Autora</td>
                  <td class="listaP"> 
                  <select name="autora_id" id="autora_id">

                  <?php 

                  while($fila2=mysqli_fetch_assoc($resultado2))
                  {
                   ?>    
                    <option value="<?php echo $fila2['autora_id']; ?>">
                     
                    <?php 
                    echo $fila2['autora_nombre']; 
                    ?>

                    </option>

                    <?php
                     }
                     ?>

                  </select> 
                  </td>
            </tr>
            <tr>
                  <td class="listaP">Título</td>
                  <td class="listaP"> <input type="text" value="<?php echo $fila8["noti_titulo"]; ?>" name="noti_titulo" class="consultaT"></td>
              </tr>
              <tr>
                  <td class="listaP"> Copete</td>
                  <td class="listaP"> <textarea name="noti_copete"  class="consultaC"><?php echo $fila8["noti_copete"]; ?></textarea>  </td>
              </tr>
              <tr>
                <td class="listaP">Desarrollo</td>
                <td class="listaP"><textarea name="noti_desarrollo"  class="consulta"><?php echo $fila8["noti_desarrollo"]; ?></textarea>  </td>
              </tr>
              <tr>
                <td class="listaP"> Foto Portada</td>
                <td class="listaP"> <img class="fotoNoti" src="./fotos/<?php echo $fila8["noti_foto"]; ?>" ></td>
              </tr> 
              <tr>
                <td class="listaP">Foto Portada</td>
                <td class="listaP"><input type="file" name="noti_foto" id="noti_foto"></td>
              </tr> 
              <tr>
                <td class="listaP"> Foto 2</td>
                <td class="listaP"> <img class="fotoNoti" src="./fotos/<?php echo $fila8["noti_foto2"]; ?>" ></td>
              </tr> 
              <tr>
                <td class="listaP"> Foto 2 </td>
                <td class="listaP"><input type="file" name="noti_foto2" id="noti_foto2"></td>
              </tr> 
              <tr>
                <td class="listaP"> Foto 3</td>
                <td class="listaP"> <img class="fotoNoti" src="./fotos/<?php echo $fila8["noti_foto3"]; ?>" ></td>
              </tr> 
              <tr>
                <td class="listaP"> Foto 3 </td>
                <td class="listaP"><input type="file" name="noti_foto3" id="noti_foto3"></td>
              </tr> 
              <tr>
                <td class="listaP">Audio</td>
                <td class="listaP">  

                     <?php 
                     if ($fila8["noti_audio"] !="") 
                     { ?>
                      <audio controls>
                      <source src="audios/<?php echo $fila8["noti_audio"] ?>" type="audio/mp3" />
                      </audio>
                     <?php   
                     } 
                                             
                     ?></td>
              </tr> 
              <tr>
                <td class="listaP">Audio</td>
                <td class="listaP"> <input type="file" name="noti_audio" id="noti_audio"></td>
              </tr> 
              <tr>
                <td class="listaP">Audio2</td>
                <td class="listaP">  

               <?php
                     if ($fila8["noti_audio2"] !="") 
                     { ?> 
                     <audio controls>
                      <source src="audios/<?php echo $fila8["noti_audio2"] ?>" type="audio/mp3" />
                      </audio>
                     <?php   
                     } 
                                              
                     ?></td>
              </tr> 

              <tr>
                <td class="listaP"> Audio 2</td>
                <td class="listaP"> <input type="file" name="noti_audio2" id="noti_audio2"></td>
              </tr> 
              <tr>
                <td class="listaP"> Video</td>
                <td class="listaP"> <input class="rellenar" type="text" name="noti_video" id="noti_video"></td>
              </tr> 
             
              <tr>            
                 <td colspan="2" class="listaP"> 
                 <input type="hidden" id="noti_id" name="noti_id" value="<?php echo $noti_id ?> "> 
                 <input id="botones" type="submit" value="Confirmar edición"> </td>
              </tr>
            
      </table>  
    </form> 

  <?php include "pie.php" ?>

  </div>

</div>   