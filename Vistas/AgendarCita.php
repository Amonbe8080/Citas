<?php
    require_once '../Controladores/ctrDoctor.php';
    $ctr = new ControlDoc();
    session_start();
    if (!isset($_SESSION['usuario'])) {
        header("location:LoginUsuario.php");
    } 
    
    $datemin = date('Y-m-d');
    $diamax = date('d')+4;
    $datemax = date('Y-m');
    $datemax = $datemax."-".$diamax;
    
    
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Adjucare | Agendar Cita</title>
        <link href="../Assets/Style/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="../Assets/Style/css/login.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <?php 
            include_once 'MenuPrincipal.php';
        ?>
        <form class="form-signin text-center pb-5" action="AgendarCita.php" method="POST">
            <p class="h3 mb-2 text-primary">No dejes que lo peor pase</p>
            <img class="mb-4 rounded-circle" src="https://cdn.dribbble.com/users/218857/screenshots/3607019/vocsn_dribbble.jpg" alt="" width="250" height="250">
            <?php 
                if (@$_POST['accion']=="Agendar") {
                    $ctr->agendar();
                }
            ?>
            <h5 class="text-left">Doctor</h5>
                
            <select class="custom-select" name="dni_doctor" required >
                <?php $ctr->selectDoctor(); ?>
            </select>
            
            <h5 class="text-left">Fecha a reservar</h5>
            <input type="date" class="custom-control w-100" name="fecha" min="<?php echo $datemin;?>" max="<?php echo $datemax;?>" required/>
            
            <small class="form-text text-muted">
                Solo se abren 5 dias en semana para seleccionar fecha.
            </small>
            
            <h5 class="text-left">Hora</h5>
            <select class="custom-select" name="hora" required >
                <option></option>
                <optgroup label="Mañana">
                    <option>8:30am - 9:30am</option>
                    <option>9:30am - 10:30am</option>
                    <option>10:30am - 11:30am</option>
                </optgroup>
                <optgroup label="Tarde">
                    <option>1:30pm - 2:30pm</option>
                    <option>2:30pm - 3:30pm</option>
                    <option>3:30pm - 4:30pm</option>
                    <option>4:30pm - 5:30pm</option>
                </optgroup>
                <optgroup label="Noche">
                    <option>6:30pm - 7:30pm</option>
                    <option>7:30pm - 8:30pm</option>
                    <option>9:30pm - 10:30pm</option>
                </optgroup>
            </select>
            
            <input type="submit" value="Agendar" class="btn btn-primary mt-4" name="accion"/>
            
            <p class="text-center mt-4"> ¿Aun no sabes que tienes?
              <a href="#">Consultar</a>
            </p>
        </form>
        
        <?php 
            include_once 'Footer.php';
        ?>
    </body>
</html>
