


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
      
      <div class="contacto">

        <h1> Podés comunicarte con nosotros:</h1>

        <h2> - Por mail: <br></h2> 
        <a class="boton" href="mailto:laruedacomunicacionpopular@gmail.com" target="_blank">
        Click aquí para enviarnos un mail  </a>   
         
          
          <br>

        <h2> <br> - Por teléfono, al número: 02323 - 427962 </h2>

        <h2> - O a traves de nuestras redes sociales:<br></h2>   <br>  <br>

        <div class="confetw">

        <a href="https://twitter.com/laruedanoticias" class="contac" onclick="this.target='_blank' "><img class="rsc" src="img/twiter.png"> </a>
        <a href="https://www.facebook.com/laruedacomunicacionpopular/" class="contac"onclick="this.target='_blank' "> <img class="rsc" src="img/fb.png"> </a>

        </div>
       
      </div>



      <?php include "pie.php" ?>

  </div>

</div>   