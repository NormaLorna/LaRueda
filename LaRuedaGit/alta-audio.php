
<?php
require "validar.php";

  $titulo = "Subir nuevo Audio";
  //Rutina para subir Audios 

  $ruta3="audioteca/";
  $aud_1=$_FILES['aud_1']['name'];
  $aud_1TMP=$_FILES['aud_1']['tmp_name'];
  move_uploaded_file($aud_1TMP, $ruta3.$aud_1);

  $aud_2=$_FILES['aud_2']['name'];
  $aud_2TMP=$_FILES['aud_2']['tmp_name'];
  move_uploaded_file($aud_2TMP, $ruta3.$aud_2);

  $aud_3=$_FILES['aud_3']['name'];
  $aud_3TMP=$_FILES['aud_3']['tmp_name'];
  move_uploaded_file($aud_3TMP, $ruta3.$aud_3);

  $aud_4=$_FILES['aud_4']['name'];
  $aud_4TMP=$_FILES['aud_4']['tmp_name'];
  move_uploaded_file($aud_4TMP, $ruta3.$aud_4);

  $aud_5=$_FILES['aud_5']['name'];
  $aud_5TMP=$_FILES['aud_5']['tmp_name'];
  move_uploaded_file($aud_5TMP, $ruta3.$aud_5);

  


  date_default_timezone_set('America/Argentina/Buenos_Aires');
  $aud_alta= date("Y-m-d G-i-s");

  $aud_nombre=$_POST['aud_nombre'];
  $aud_detalle=$_POST['aud_detalle'];

  require "conexion.php";
  $sql="INSERT INTO 
                   audios
            VALUES (
                      NULL,
                      '".$aud_nombre."',
                      '".$aud_detalle."',
                      '".$aud_1."',
                      '".$aud_2."',
                      '".$aud_3."',
                      '".$aud_4."',
                      '".$aud_5."',
                      
                      '".$aud_alta."'
                      )";  //die($sql);


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
      
        <h1 colspan="2">Se ha agregado el siguiente Audio</h1>
         <table class="paneles">
           
            <tr>
                <td class="listaP">Audio</td> 
                <td class="listaP"> <?php echo $aud_nombre; ?>  </td>
            </tr>
            <tr>
                <td class="listaP">Detalle</td> 
                <td class="listaP"> <?php echo $aud_detalle; ?>  </td>
            </tr>
             <tr>
                <td class="listaP">Audio 1</td> 
                <td class="listaP"><?php echo $aud_1; ?></td>
            </tr>
             <tr>
                <td class="listaP">Audio 2</td> 
                <td class="listaP"><?php echo $aud_2; ?></td>
            </tr>
             <tr>
                <td class="listaP">Audio 3</td> 
                <td class="listaP"> <?php echo $aud_3; ?>  </td>
            </tr>
             <tr>
                <td class="listaP">Audio 4</td> 
                <td class="listaP"><?php echo $aud_4; ?></td>
            </tr>
             <tr>
                <td class="listaP">Audio 5</td> 
                <td class="listaP"><?php echo $aud_5; ?> </td>
            </tr>
            <tr>
                <td class="listaP"> <a href="panel-audios.php">
              Volver </a>
                </td>
                <td  class="listaP"> <a href="form-alta-audio.php"> 
              Agregar otro Audio </a>
                </td>
            </tr>
        </table>
           <?php 
        };
           
       ?>
      <?php include "pie.php" ?>

  </div>

</div>   