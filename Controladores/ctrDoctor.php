<?php

class ControlDoc{
    
    public function registrar(){
        require_once '../Modelo/Doctor.php';
        require_once '../accesoDatos/DoctorCAD.php';

        $dni_doctor = htmlspecialchars($_POST['dni']);
        $nombre = htmlspecialchars($_POST['nombre']);
        $espec = htmlspecialchars($_POST['espec']);
        $tel1 = htmlspecialchars($_POST['tel1']);

        $doctorModel = new Doctor();
        $ctr = new DoctorCAD();

        $doctorModel->setDni_doctor($dni_doctor);
        $doctorModel->setNombre($nombre);
        $doctorModel->setEspec($espec);
        $doctorModel->setTelefono_1($tel1);

        if ($ctr->registrar($doctorModel)) {
             echo "<div class='alert alert-success' role='alert'>
                    Doctor registrado correctamente
                  </div>";
            header('Refresh: 1; url=../Vistas/DoctorCRUD.php');
        }else{
             echo "<div class='alert alert-danger' role='alert'>
                    Ha ocurrido un error
                  </div>";
        }
    }
    
    public function modificar(){
        require_once '../accesoDatos/DoctorCAD.php';
        require_once '../Modelo/Doctor.php';

        $modelDoctor = new Doctor();
        $ctr = new DoctorCAD();

        $modelDoctor->setDni_doctor(($_POST['dni']));
        $modelDoctor->setNombre(htmlspecialchars($_POST['nombre']));
        $modelDoctor->setEspec(htmlspecialchars($_POST['espec']));
        $modelDoctor->setTelefono_1(htmlspecialchars($_POST['tel1']));

        if ($ctr->modificar($modelDoctor)) {
             echo "<div class='alert alert-success' role='alert'>
                    Doctor modificado correctamente
                  </div>";
            header('Refresh: 1; url=../Vistas/DoctorCRUD.php');
        }else{
            echo "<div class='alert alert-danger' role='alert'>
                    Ha ocurrido un error
                  </div>";
        }
    }
    
    public function agendar(){
        require_once '../accesoDatos/DoctorCAD.php';
        
        $dni_usuario = $_SESSION['usuario'];
        $dni_doctor = htmlspecialchars($_POST['dni_doctor']);
        $fecha = htmlspecialchars($_POST['fecha']);
        $hora = htmlspecialchars($_POST['hora']);
        
        $ctr = new DoctorCAD();
        if ($ctr->pedirCita($dni_usuario, $dni_doctor, $fecha, $hora)) {
            echo "<div class='alert alert-success' role='alert'>
                    Tu cita ha sido agendada correctamente
                  </div>";
        }else{
            "<div class='alert alert-danger' role='alert'>
                    Ha ocurrido un error
                  </div>";
        }
    }
    
    public function eliminar(){
        require_once '../Modelo/Doctor.php';
        require_once '../accesoDatos/DoctorCAD.php';

        $dni_doctor = htmlspecialchars($_GET['del']);
        $doctorModel = new Doctor();
        $doctorModel->setDni_doctor($dni_doctor);
        $ctr = new DoctorCAD();

        if ($ctr->borrar($doctorModel)) {
             echo "<div class='alert alert-success' role='alert'>
                    Doctor eliminado correctamente
                  </div>";
            header('Refresh: 1; url=../Vistas/DoctorCRUD.php');
        }else{
            echo "<div class='alert alert-danger' role='alert'>
                    Ha ocurrido un error
                  </div>";
        }  
    }
    
    public function listarDoctores(){
        require_once '../accesoDatos/Conexion.php';
         
        $con = new Conexion();
        $res = $con->conectar()->query("SELECT * FROM doctor");
        while ($row = $res->fetch_object()) {
            echo "<th scope='row'>$row->dni_doctor</th>
                  <td>$row->nombre</td>
                  <td>$row->espec</td>
                  <td>$row->telefono_1</td>
                  <td>
                  <a href='?dni=$row->dni_doctor' class='btn btn-outline-success'>Seleccionar</a>
                  <a href='?del=$row->dni_doctor' class='btn btn-outline-danger' onclick='return Confirmation()'>Eliminar</a>
                  </td>
                  </tr>";
        }
    }
                        
    public function selectDoctor(){
        require_once '../accesoDatos/Conexion.php';
        $con = new Conexion();
        
        $res = $con->conectar()->query("SELECT * FROM doctor ORDER BY espec");
        while ($row = $res->fetch_object()) { 
            if ($esp== $row->espec) {
               echo "<option value='$row->dni_doctor'>$row->nombre</option>";
            }else{
                echo "</optgroup>";
                echo "<optgroup label='$row->espec'>";
                echo "<option value='$row->dni_doctor'>$row->nombre</option>";  
            }
            
            $esp = $row->espec;       
        }
    }
}






