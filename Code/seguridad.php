<?php
//Inicio la sesión
session_start();
//COMPRUEBA QUE EL USUARIO ESTA AUTENTIFICADO
if ($_SESSION["aut"] != "SI") {
 //si no existe, envio a la página de autentificacion
 header("Location: index.html");
 //ademas salgo de este script
 exit();
}
?> 