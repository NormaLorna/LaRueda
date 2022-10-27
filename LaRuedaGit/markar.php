<?php
//$usu_id=$_POST['usu_id'];
$usu_login=$_POST['usu_login'];
$usu_clave=$_POST['usu_clave'];
require "conexion.php";
$sql="SELECT 
            usu_nombre, usu_id
      FROM 
            usuarios
      WHERE 
            usu_login='".$usu_login."'
      AND   
            usu_clave='".$usu_clave."'";
 
   $resultado=mysqli_query($link,$sql) or die(mysqli_error($link));      
   $cantidad=mysqli_num_rows($resultado); 
   $fila= mysqli_fetch_assoc($resultado);
   

   //cuenta cantidad de registros que produce un query

   if ($cantidad==0){
                            header("location:redaccion.php?error=0");  // header se utiliza para redireccionar 
   	                }

    else            {
                             // Rutina de autenticación
                            session_start(); // estoy iniciando la sesion
                             $_SESSION['login']=1;  // le doy un certificado y lo mando al admin
                             $_SESSION['usu_nombre']=$fila['usu_nombre'];
                             
                             

                             // ingresar a sistema 
                            header("location:agencia.php");
                    }


?> 