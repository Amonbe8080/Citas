<?php

class DoctorCAD {
    
    public function registrar($doctorModel){
      require_once 'Conexion.php';
      $con = new Conexion();
      
      $dni_doctor =  $doctorModel->getDni_doctor();
      $nombre =  $doctorModel->getNombre();
      $espec =  $doctorModel->getEspec();
      $telefono_1 =  $doctorModel->getTelefono_1();
      
      $sql = "INSERT INTO `doctor`(`dni_doctor`, `nombre`, `espec`, `telefono_1`) VALUES "
                                . "($dni_doctor,'$nombre','$espec','$telefono_1')"; 
      if ($con->conectar()->query($sql)== 1) {
            return true;
        }else{
            return false;
        }
    }
    
    public function pedirCita($dni_usuario, $dni_doctor, $fecha,$hora){
        require_once 'Conexion.php';
        $con = new Conexion();
        $sql = "INSERT INTO `tb_cita`(`id`,`dni_usuario`, `dni_doctor`, `fecha`, `hora`) VALUES "
                ."('',$dni_usuario,$dni_doctor,'$fecha', '$hora')"; 
        if ($con->conectar()->query($sql)==1) {
            return true;
        }else{
            return false;
        }
    }
    
    public function borrar($doctorModel){
      require_once 'Conexion.php';
      $con = new Conexion();
      
      $dni_doctor = $doctorModel->getDni_doctor();
      
      $sql = "DELETE FROM doctor WHERE dni_doctor = $dni_doctor";
      if ($con->conectar()->query($sql)) {
          return true;
      }else{
          return false;
      }
    }
    
    public function modificar($doctorModel){
        require_once 'Conexion.php';
        $con = new Conexion();

        $nombre = $doctorModel->getNombre();
        $espec = $doctorModel->getEspec();
        $telefono_1 = $doctorModel->getTelefono_1();
        $dni = $doctorModel->getDni_doctor();
        
        $query = "UPDATE `doctor` SET `nombre`='$nombre',"
                                    . "`espec`='$espec',`telefono_1`='$telefono_1' WHERE `dni_doctor`=$dni";
        if ($con->conectar()->query($query)) {
            return true;
        }else{
            return false;
        }
    }
}
