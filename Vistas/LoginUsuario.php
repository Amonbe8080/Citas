
<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
         <link href="../Assets/Style/css/bootstrap.css" rel="stylesheet" type="text/css"/>
         <link href="../Assets/Style/css/login.css" rel="stylesheet" type="text/css"/>
    </head>
    <body >
        <?php 
            include_once 'MenuPrincipal.php';
        ?>
        <form class="form-signin text-center pb-5" action="LoginUsuario.php" method="POST" >
          <p class="h3 mb-2 text-primary">No dejes que lo peor pase,</p>
          <h4>Reserva ya tu cita.</h4>
          <img class="mb-4 rounded-circle" src="https://cdn.dribbble.com/users/2008861/screenshots/5876693/facetime-to-delivery-drible.gif" alt="" width="250" height="250">
          <label for="inputEmail" class="sr-only">Usuario</label>
          <input type="text" autocomplete="off" id="inputEmail" name="usuario" class="form-control mb-3" placeholder="Usuario" required autofocus>
          
          <label for="inputPassword" class="sr-only">Contraseña</label>
          <input type="password" name="clave" id="inputPassword" class="form-control" placeholder="Clave" required>
          <?php
            require_once '../Controladores/ctrUsuario.php';
            if (@$_POST['accion']=="Ingresar") {
                $ctr = new ctrUsuario();
                $ctr->login();
            }
            if (isset($_SESSION['usuario'])) {
                header("location:Home.php");
            }
           ?>
          <input type="submit" class="btn btn-lg btn-primary btn-block" value="Ingresar" name="accion"/>
          
          <p class="text-center mt-4"> ¿Aun no estas registrado?
              <a href="RegUsuario.php">Registrate</a>
          </p>
        </form>
        
        <?php 
            include_once 'Footer.php';
        ?>
    </body>
</html>
