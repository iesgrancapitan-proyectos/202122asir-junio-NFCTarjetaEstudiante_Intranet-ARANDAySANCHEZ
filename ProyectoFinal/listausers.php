<?php 
include ('seguridad.php');
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style_listauser.css">
    <title>Consulta Servicio</title>
    <link rel="shortcut icon" href="IMG/favicon2.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat+Alternates:wght@600&display=swap" rel="stylesheet"></head>

</head>

<body id="page">
    <div class="container-btn-mode">
        <div id="id-sun" class="btn-mode sun active">
            <i class="fas fa-sun"></i>
        </div>
        <div id="id-moon" class="btn-mode moon">
            <i class="fas fa-moon"></i>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-light " id="mainNav">
        <div id="divnav" class="container px-4 px-lg-5">
            <img id="logonav" src="IMG/logonav.png" alt="IES GRAN CAPITÁN" alt="" />
        </div>
    </nav>

    <header id="medio" class="masthead">
    <?php $unidad2 = $_POST['unidades']; ?>
    <h1 id="unidad"> Consultando <em style="color:#3B3B3A"><?php echo $unidad2 ?></em> </h1>
        <div id="divcentral" class="container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center">
            <div class="d-flex justify-content-center">
                <div id="divcentral2" class="text-center">
                <form method='POST' action='alta_tarjeta.php'>
                <div id="divtabla"class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <th scope="col">NIE</th>
                            <th scope="col">ID_Tarjeta</th>
                        </thead>
                        <tbody>
                            <?php
                            include('conexionbd.php');
                            $unidad2 = $_POST['unidades'];
                            
                            $queryusuario = mysqli_query($conn,"SELECT idtarjeta FROM tabla_nfc_estudiantes where idtarjeta is NULL and Unidad = '$unidad2'");
                            $nr = mysqli_num_rows($queryusuario);
                            
                            if (($nr > 0)) {  
                                
                                if (isset($_REQUEST['Acceder'])){
                                $unidad = $_POST['unidades'];
                                include('conexionbd.php');
                                $query = "SELECT * from tabla_nfc_estudiantes where Unidad = '$unidad' order by NIE";
                                $query2 ="SELECT * from tabla_nfc_tarjeta";
                                $result = mysqli_query($conn,$query);
                                $result2= mysqli_query($conn,$query2);
                                $row2= mysqli_fetch_array($result2);
                                while($row= mysqli_fetch_array($result)){
                                    if ($row['idtarjeta'] != NULL && $row2['activo']= "si"){
                                        echo "<tr> <td>".$row['NIE'] . " </td> ";
                                        #echo "Tarjeta asignada, debe dar de baja la tarjeta en primer lugar ";
                                        echo " <td> " .$row['idtarjeta']. " </td></tr>";
                                        
                                    }
                                
                                    else {
                                    echo "<tr> <td> <input type='radio' name='nie' required value=".$row['NIE']."> ".$row['NIE']."</option> </td>" . " <td> Tarjeta no asignada </td></th>";}
                                    
                                }
                            }
                        }
                        else{
                                echo "<h1 class='form-control'style='color: red;'>Todos los usuarios de la unidad tienen asignada tarjeta</h1>";
                                header( "refresh:3;url=alta.php" );
                        }
                        
                            ?>
                        </tbody>
                    </table>
                </div>
                <a class="btn btn-primary" href="alta.php">Volver</a>
                <input type="submit" class="btn btn-primary" name= "enviar" value="Asignar tarjeta"> 
                
                
            </form>
                    
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
    <script src="indextablas.js"></script>
    <footer id="foter" class="footer bg-black small text-center text-white-50">
        <div class="container px-4 px-lg-5">Copyright &copy; Manu Aranda | Fran Sánchez 2022</div>
    </footer>
</body>


</html>