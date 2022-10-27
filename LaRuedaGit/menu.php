
<div class="hamburger">
	<div class="_layer -top"></div>
	<div class="_layer -mid"></div>
	<div class="_layer -bottom"></div>
</div>


<?php 

               if (!isset($_SESSION['login'])) 
                                    {
?>

<nav class="menuppal">
    <ul>
      <li><a href="index.php">INICIO</a></li>
       <li><a href="politica.php">POLITICA</a></li>
      <li><a href="economia.php">ECONOMÍA</a></li>
      <li><a href="policiales.php">POLICIALES</a></li>
      <li><a href="sociedad.php">SOCIEDAD</a></li>
      <li><a href="justicia.php">JUSTICIA</a></li>
      <li><a href="humor.php">HUMOR</a></li>
      <li><a href="investigaciones.php">INVESTIGACIONES</a></li>
      <li><a href="genero.php">GÉNERO</a></li>
      <li><a href="cultura.php">CULTURA</a></li>
      <li><a href="sociedad.php">SOCIEDAD</a></li>
      <li><a href="#">AUDIOTECA</a></li>
      <li><a href="suscripciones.php">SUSCRIPCIONES</a></li>
      <li><a href="contacto.php">CONTACTO</a></li>
    </ul>
</nav>

<?php
                                    }

    else   {
?>

<nav class="menuppal">
    <ul>
      <li><a href="logout.php">SALIR</a></li>
      <li><a href="admin.php">Aministrador </a></li>
      <li><a href="panel-noticias.php">Aministrador de noticias</a></li>
      <li><a href="panel-audios.php">Aministrador de audios</a></li>
      <li><a href="panel-autoras.php">Aministrador de autoras</a></li>
      <li><a href="panel-usuarios.php">Aministrador de usuarios</a></li>
      <li><a href="suscripciones.php">SUSCRIPCIONES</a></li>
      <li><a href="contacto.php">CONTACTO</a></li>
    </ul>
</nav>

 <?php
 }

 ?>



<script type="text/javascript">


var menu = document.querySelector('.hamburger');

function toggleMenu (event) {
  this.classList.toggle('is-active');
  document.querySelector( ".menuppal" ).classList.toggle("is_active");
  event.preventDefault();
}

menu.addEventListener('click', toggleMenu, false);



</script>