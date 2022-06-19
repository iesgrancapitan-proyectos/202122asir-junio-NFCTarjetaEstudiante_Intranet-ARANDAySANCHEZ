<?php
//Inicio la sesión
session_start();?> 
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style_menuadmin.css">
    <title>Consulta Servicio</title>
    <link rel="shortcut icon" href="IMG/favicon2.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat+Alternates:wght@600&display=swap" rel="stylesheet"></head>

</head>

<body id="page" onload="acceso.nombredelacaja.focus()">
    <div class="container-btn-mode">
        <div id="id-sun" class="btn-mode sun active">
            <i class="fas fa-sun"></i>
        </div>
        <div id="id-moon" class="btn-mode moon">
            <i class="fas fa-moon"></i>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
        <div id="divnav" class="container px-4 px-lg-5">
            <img id="logonav" src="IMG/logonav.png" alt="IES GRAN CAPITÁN" alt="" />
        </div>
    </nav>
    <header id="medio" class="masthead">
        <div id="divcentral" class="container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center">
            <div class="d-flex justify-content-center">
                <div id="divcentral2" class="text-center">
                    <h1 id="letra" class="mx-auto my-0 text-uppercase">Baja de tarjeta NFC</h1>
                    <br>
                    <h5 id="letra2" class="mx-auto text-uppercase letradedia" style="margin-bottom: 20px">Motivo de la baja</h5>
                    <h6 id="letra3" class="mx-auto mt-2 mb-5 letradedia"> Profesor:
                    <?php
                    if (isset($_REQUEST['enviar'])){
                    $nie = $_POST['user'];
                    echo $_POST['user']; 
                    $_SESSION['usuario'] = $nie;}  
                    ?>
                    </h6>
                    <form id="baja" method="POST" action="realizar_baja_profesores.php">
                    <select name="motivo" class="form-select" required>
                        <option name="motivo" value="Baja_profesor">Baja de Profesor</option>
                        <option name="motivo" value="Deterioro">Deterioro</option>
                        <option name="motivo" value="Perdida">Pérdida</option>
                    </select>
                    <br>
                        <a class="btn btn-primary" href="baja_profesores.php">Volver</a>
                        <input type="submit" class="btn btn-primary" value="Baja Tarjeta" name="acceder">
                        
                    </form>
                    <?php
                if (isset($_REQUEST['enviar'])){
                    $idtarjeta= $_POST['idtarjeta'];
                    $_SESSION['idtarjeta'] = $idtarjeta;}                 
                if (isset($_REQUEST['acceder'])){
                    include('conexionbd.php');      
                    
                    $motivo = $_POST['motivo'];
                    $idtarjeta2 = $_SESSION['idtarjeta'];
                    $consulta1 = "SELECT usuario FROM tabla_nfc_profesores WHERE idtarjeta = '$idtarjeta2'";
                    $resultado2 = mysqli_query($conn,$consulta1);
                    while($row= mysqli_fetch_array($resultado2)){
                    $usuario = $row['usuario'];
                    
                    }
                    include('conexionbd.php');
                    $mifecha = date('Y-m-d');
                
                    $consulta = "SELECT * FROM tabla_nfc_tarjeta WHERE IdTarjeta = '$idtarjeta2'";
                    
                    $resultado = mysqli_query($conn,$consulta);
                    while($row= mysqli_fetch_array($resultado)){
                        if ($row['Activo'] == 'si'){
                            
                            include('conexionbd.php');
                            $tabla_nfc_baja = "INSERT INTO tabla_nfc_baja (IdTarjeta, causa, fecha, usuario) Values ('$idtarjeta2','$motivo', '$mifecha','$usuario')";
                            
                            $insertar = mysqli_query($conn, $tabla_nfc_baja);
                            $tabla_nfc_tarjeta = "UPDATE tabla_nfc_tarjeta SET Activo = 'no' where IdTarjeta = '$idtarjeta2'";
                            $insertar2 = mysqli_query($conn, $tabla_nfc_tarjeta);
                            $tabla_nfc_profesores = "UPDATE tabla_nfc_profesores SET idtarjeta = NULL where idtarjeta = '$idtarjeta2'";
                            $insertar3 = mysqli_query($conn, $tabla_nfc_profesores);
                            
                            
                            
                        }
                    
                        else {
                        echo "no";
                       
                    }
                    
                }  
                }
                header( "refresh:2;url=menu_baja.php" );
                ?>
                </div>
            </div>
        </div>
    </header>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
    <script src="index.js"></script>
    <footer class="footer bg-black small text-center text-white-50">
        <div class="container px-4 px-lg-5">Copyright &copy; Manu Aranda | Fran Sánchez 2022</div>
    </footer>
</body>

</html>