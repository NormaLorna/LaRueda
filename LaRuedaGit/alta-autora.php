<?php
  $titulo = "Registrar autora";
  require "validar.php";
  //Rutina para insertar datos en tabla autora

  $autora_nombre=$_POST['autora_nombre'];
  $autora_email=$_POST['autora_email'];
  date_default_timezone_set('America/Argentina/Buenos_Aires');
  $autora_alta= date("Y-m-d G-i-s");

  require "conexion.php";
  $sql="INSERT INTO 
                   autoras
            VALUES (
                      NULL,
                      '".$autora_nombre."',
                      '".$autora_email."',
                      '".$autora_alta."'
                      )"; // die($sql);
    mysqli_query ($link,$sql);

   $sql2= "SELECT 
                 autora_id, autora_nombre, autora_email
           FROM 
                  autoras"; 
        $resultado=mysqli_query($link,$sql2) or die(mysqli_error($link));
        $cantidad=mysqli_num_rows ($resultado); 
        $fila=mysqli_fetch_assoc($resultado);
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
      
        <h1 colspan="2">Se ha agregado la siguiente Autora</h1>
         <table class="paneles">
           
            <tr>
                <td class="listaP">Autora</td> 
                <td class="listaP"> <?php echo $autora_nombre; ?>  </td>
            </tr>
            <tr>
                <td class="listaP">Email</td> 
                <td class="listaP"> <?php echo $autora_email; ?>  </td>
            </tr>
            <tr>
                <td class="listaP"> <a href="panel-autoras.php">
              Volver </a>
                </td>
                <td  class="listaP"> <a href="form-alta-autora.php"> 
              Agregar otra Autora </a>
                </td>
            </tr>
        </table>
           <?php 
        };
           
       ?>
      <?php include "pie.php" ?>

  </div>

</div>   