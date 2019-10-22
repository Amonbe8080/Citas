<?php  
    session_start();
    if (!isset($_SESSION['usuario'])) {
        header("location:LoginUsuario.php");
    } 
    require_once '../Controladores/ctrDoctor.php';
    $ctr = new ControlDoc(); 
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Doctor</title>
        <link href="../Assets/Style/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="../Assets/Style/css/login.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <?php 
            include_once 'MenuPrincipal.php';
        ?>
        
        <form class="text-center pt-5 pb-5 form-signin" action="DoctorCRUD.php" method="POST">
           
        <?php
            if (@$_POST['accion']=="Registrar") {
                $ctr->registrar();
            }
            if (@$_POST['accion'] == "Modificar") {
                $ctr->modificar();
            }
            if (isset($_GET['del'])) {
                $ctr->eliminar();
            }

            require_once '../accesoDatos/Conexion.php';
            $con = new Conexion();
            @$dni = $_GET['dni'];
            $res = $con->conectar()->query("SELECT * FROM doctor WHERE dni_doctor = '$dni'");
            $row = $res->fetch_object();
        ?>
            <h5 class="text-left">DNI</h5>
            <input type="number" name="dni" class="form-control mb-4" value="<?php echo @$row->dni_doctor;?>" 
                   <?php if (isset($_GET['dni']))echo "readonly";?> required>
   
            <h5 class="text-left">Nombre Completo</h5>
            <input type="text" name="nombre" value="<?php echo @$row->nombre;?>" class="form-control mb-4" required>

            <h5 class="text-left">Especialización</h5>
            <input type="text" name="espec" value="<?php echo @$row->espec;?>" class="form-control mb-4" required>
            
            <h5 class="text-left">Telefono de contacto al paciente</h5>
            <input type="tel" name="tel1" value="<?php echo @$row->telefono_1;?>" class="form-control mb-4" required>  

            <a href="?clear" class="btn btn-success">Limpiar</a>
            
            <input type="submit" class="btn btn-primary" value="Registrar" <?php if (isset($_GET['dni'])) {
                          echo "hidden";}?> name="accion"/>
            
            <input type="submit" <?php if (!isset($_GET['dni'])) {
                          echo "hidden";}?> class="btn btn-warning text-white" value="Modificar" name="accion"/>
        </form>  
        <table class="table w-80">
            <thead class="bg-primary  text-white">
              <tr>
                <th scope="col">DNI</th>
                <th scope="col">Nombre</th>
                <th scope="col">Especialización</th>
                <th scope="col">Teléfono</th>
                <th scope="col">Acciones</th>
              </tr>
            </thead>
            <tbody>
                <tr>
                    <?php $ctr->listarDoctores();?> 
            </tbody>
        </table>
        
          
        <script type="text/javascript">
            function Confirmation() {
                    if (!confirm('¿Esta seguro de eliminar el registro?')) { 
                        return false;
                    }
            }
        </script>
    </body>
</html>
