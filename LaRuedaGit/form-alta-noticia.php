
<?php
  $titulo = "Formulario de alta de una noticia";
  require "conexion.php";
  require "validar.php";

  $sql=" SELECT seccion_id, seccion_nombre
         FROM seccion ";
  $resultado=mysqli_query($link,$sql) or die(mysqli_error($link));
  
  $sql1=" SELECT autora_id, autora_nombre
         FROM autoras";
  $resultado1=mysqli_query($link,$sql1) or die(mysqli_error($link));

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

        <form action="alta-noticia.php" method="post" enctype="multipart/form-data"> 
             <table class="paneles">

               <tr>
                  <td class="listaP">Sección</td>
                  <td class="listaP"> 
                  <select name="seccion_id" id="seccion_id">

                   <?php 

                   while($fila=mysqli_fetch_assoc($resultado))
                   {
                   ?>    
                    <option value="<?php echo $fila['seccion_id']; ?>">
                     
                     <?php 
                     echo $fila['seccion_nombre']; 
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

                  while($fila1=mysqli_fetch_assoc($resultado1))
                  {
                   ?>    
                    <option value="<?php echo $fila1['autora_id']; ?>">
                     
                    <?php 
                    echo $fila1['autora_nombre']; 
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
                  <td class="listaP"> <input class="rellenar" type="text" name="noti_titulo" id="noti_titulo"> </td>
              </tr>
              <tr>
                  <td class="listaP"> Copete</td>
                <td class="listaP"> <textarea  class="rellenar" name="noti_copete" id="noti_copete"></textarea>  </td>
              </tr>
              <tr>
                  <td class="listaP">Desarrollo</td>
                <td class="listaP"> <textarea  class="rellenar" name="noti_desarrollo" id="noti_desarrollo"></textarea>  </td>
              </tr>
              
              <tr>
                <td class="listaP">Foto Portada</td>
                <td class="listaP"> <input type="file" name="noti_foto" id="noti_foto"></td>
              </tr> 
              <tr>
                <td class="listaP"> Foto 2 </td>
                <td class="listaP"> <input type="file" name="noti_foto2" id="noti_foto2"></td>
              </tr> 
              <tr>
                <td class="listaP"> Foto 3 </td>
                <td class="listaP"> <input type="file" name="noti_foto3" id="noti_foto3"></td>
              </tr> 
              <tr>
                <td class="listaP">Audio</td>
                <td class="listaP"> <input type="file" name="noti_audio" id="noti_audio"></td>
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
                <td  class="listaP" colspan="2" >
                <input type="submit" value="Agregar Noticia"> 
                </td>
              </tr>


             </table>

        </form>

</div>











      <?php include "pie.php" ?>

  </div>

</div>   