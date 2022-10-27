<?php
    
  require "conexion.php";
   $sql7= "SELECT 
          aud_id, aud_1, aud_2, aud_3, aud_nombre, aud_detalle,  aud_alta
           FROM 
           audios
           ORDER BY 
                   aud_id DESC ";
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
    </div>

    <div class="terceras">

       <article class="audios">
         
      <?php
        while ($fila7= mysqli_fetch_assoc($resultado7))  
            {
            $originalDate = $fila7["aud_alta"];
            $newDate = date("d - M -Y - G:i", strtotime($originalDate)); ?>
                       
  
           <?php 
              if ($fila7["aud_id"] !="1") {   
           ?>  
              <h1 class="audi"><?php echo $fila7["aud_nombre"] ?></h1>
              <h6><?php echo $newDate ?> </h6> 
              <p><?php echo $fila7["aud_detalle"] ?></p>
              <audio controls>
              <source src="audioteca/<?php echo $fila7["aud_1"] ?>" type="audio/mp3" />
              </audio> 
            
          <?php 
             if ($fila7["aud_2"] !="") {   
          ?>
              <audio controls>
              <source src="audioteca/<?php echo $fila7["aud_2"] ?>" type="audio/mp3" />
              </audio> 
             
          <?php   
             } 
       
             if ($fila7["aud_3"] !="") 
            {   
          ?> 
              <audio controls>
              <source src="audioteca/<?php echo $fila7["aud_3"] ?>" type="audio/mp3" />
              </audio>
             
          <?php   
             } 
             } 
          ?>

          <?php 
              }          
          ?>
           <article>
             <br>

           </article>

           </article>
          
         </div>

        
      </div>  

      <?php include "pie.php" ?>

  </div>

</div>   

