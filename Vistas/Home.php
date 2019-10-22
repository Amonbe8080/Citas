<?php
    session_start();
    if (!isset($_SESSION['usuario'])) {
        header("location:LoginUsuario.php");
    }   
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link href="../Assets/Style/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <title>Home</title>
    </head>
    <body>  
        <?php 
            include_once 'MenuPrincipal.php';
            require_once '../accesoDatos/Conexion.php';
            $con = new Conexion();
            $dni = $_SESSION['usuario'];
            $query="SELECT * FROM usuario WHERE dni = '$dni'";

            $res = $con->conectar()->query($query);
        ?>
        
        <div class="container">
            <div class="jumbotron mt-3 w-100" >
            <div class="row no-gutters">
              <div class="col-md-4">
                <img src="https://cdn.dribbble.com/users/1418633/screenshots/5106121/hi-dribbble-studiotale.gif" class="card-img rounded-circle" width="250" height="250">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title"><?php echo "Bienvenido ".$_SESSION['name_usuario'];?></h5>
                   <p class="card-text">
                     <p class="lead ">Nos preguntamos como has estado de tus ultimos sintomas.</p>
                        <div class="custom-control custom-checkbox mr-sm-2">
                          <?php 
                            if (mysqli_num_rows($res)>=1) {
                              $res= $res->fetch_object();
                              $sintomas = $res->sintomas;
                              $cargarSintomas = ["Gripa","Fiebre","Vomito","Mareo","Colicos","Diarrea"];
                              $sintomas = explode(',', $sintomas);

                              for ($index = 0; $index < count($cargarSintomas); $index++) {
                                  if ($sintomas[$index]!="") {
                                      echo "<input type='checkbox' checked class='custom-control-input'/>";
                                      echo "<label class='custom-control-label mr-5'>$cargarSintomas[$index]</label>";
                                  }
                              }
                          }?>
                      </div>
                    </p>
                  </p>
                </div>
              </div>
            </div>
          </div>
       </div>
    </body>
</html>
