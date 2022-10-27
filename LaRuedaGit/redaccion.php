

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


      <div class="formularioL"> 
    
           <form action="markar.php"  method="post" enctype="multipart/form-data">
           <h2> Login <br></h2>
           <input type="text"  name="usu_login" id="usu_login" required pattern="[A-Za-z0-9]+"> <br><br>
           <h2>  Clave<br></h2>
           <input type="text"  name="usu_clave" id="usu_clave" required pattern="[A-Za-z0-9]+"> <br><br>
           <input type="submit" value="Ingresar"> <br>
            
           </form>
           <?php
           if (isset($_GET['error'])) {  // la funcion isset es una función que verifica que la variable esta seteada
           ?>
          
      Usuario y/o clave incorrecto
    
     <?php
                                      } 
     ?> 
       

      </div>  
     
   <?php include "pie.php" ?>

   </div>

</div>   