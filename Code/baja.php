
<?php 
include ('seguridad.php');
 
    
include ('conexionbd.php');
    $borrar = "delete from alumnos";
    $consulta = mysqli_query($conn,$borrar); 
    $borrar2 = "delete from tabla_nfc_tarjeta";
    $consulta = mysqli_query($conn,$borrar2);   
    header("refresh:1;url=importar.php");


?>
            
