<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Registrate</title>
         <link href="../Assets/Style/css/bootstrap.css" rel="stylesheet" type="text/css"/>
         <link href="../Assets/Style/css/login.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <?php 
            include_once 'MenuPrincipal.php';
        ?>
        <form class="text-center pt-5 pb-5 form-signin" action="RegUsuario.php" method="POST">
            <?php
              if (isset($_POST['accion']) == "Registrar") {
                    require_once '../Controladores/ctrUsuario.php';     
                    $ctr = new ctrUsuario();
                    $ctr->registrar();
                }else{
                    echo "<p class='h3 mb-2 text-primary'>Contamos con lo mejor para ti.</p>";
                } 
            ?>
            <img class="mb-4 rounded-circle" src="https://cdn.dribbble.com/users/2008861/screenshots/5801592/dialogue-intro-for-dribs.gif" alt="" width="250" height="250">

            <h5 class="text-left">Cédula de Ciudadanía</h5>
            <input type="number" autocomplete="off" name="dni" class="form-control mb-4" placeholder="Máximo 11 caracteres" maxlength="11" min="0" required autofocus>
            
            <h5 class="text-left">Usuario</h5>
            <input type="text" autocomplete="off" name="usuario" class="form-control mb-4" placeholder="Ej: Juan042 - Kir223" required>
            
            <h5 class="text-left">Clave</h5>
            <input type="password" autocomplete="off" name="clave" class="form-control mb-4" placeholder="Mínimo 4 caracteres" minlength="4" required>

            <small id="passwordHelpBlock" class="form-text text-muted">
                Para otorgar un mejor servicio selecciona algunos sintomas que hayas sentido (Opcional).
            </small>
            
            <div class="d-inline-flex">
                <div class=" d-inline text-left align-left mr-4">
                    <div class="custom-control custom-checkbox mr-sm-2">
                        <input type="checkbox" name="chkGripa" class="custom-control-input" id="Gripa">
                        <label class="custom-control-label" for="Gripa">Gripa</label>
                    </div>  
                    <div class="custom-control custom-checkbox mr-sm-2">
                        <input type="checkbox" name="chkFiebre" class="custom-control-input" id="Fiebre">
                        <label class="custom-control-label" for="Fiebre">Fiebre</label>
                    </div> 
                </div>

                <div class=" d-inline text-center mr-4">
                    <div class="custom-control custom-checkbox mr-sm-2">
                        <input type="checkbox" name="chkVomito" class="custom-control-input" id="Vomito">
                        <label class="custom-control-label" for="Vomito">Vomito</label>
                    </div>   
                    <div class="custom-control custom-checkbox mr-sm-2">
                        <input type="checkbox" name="chkMareo" class="custom-control-input" id="Mareo">
                        <label class="custom-control-label" for="Mareo">Mareo</label>
                    </div>    
                </div>

                <div class=" d-inline text-right">
                    <div class="custom-control custom-checkbox mr-sm-2">   
                             <input type="checkbox" name="chkColicos" class="custom-control-input" id="Colicos">
                            <label class="custom-control-label" for="Colicos">Cólicos</label>
                    </div>
                    <div class="custom-control custom-checkbox mr-sm-2">   
                             <input type="checkbox" name="chkDiarrea" class="custom-control-input" id="Diarrea">
                            <label class="custom-control-label" for="Diarrea">Diarrea</label>
                    </div>
                </div>  
            </div>
            
            <input type="submit" class="btn btn-lg btn-primary btn-block mt-4" value="Registrar" name="accion"/>
            <p class="text-center mt-4"> ¿Ya tienes una cuenta?
                <a href="LoginUsuario.php">Iniciar Sesión</a>
            </p>
            
        </form>
        
        <?php 
            include_once 'Footer.php';
        ?>
    </body>
</html>
