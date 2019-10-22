<?php

class UsuarioCAD {
    public function registrar($usuarioModel){
        require_once 'Conexion.php';
        
        $dni = $usuarioModel->getDni();
        $usuario = $usuarioModel->getUsuario();
        $clave = $usuarioModel->getClave();
        $sintomas = $usuarioModel->getSintomas();
        
        $con = new Conexion();
        $query="INSERT INTO `usuario`(`dni`, `usuario`, `clave`, `sintomas`) VALUES "
                                    . "($dni,'$usuario',md5('$clave'),'$sintomas')";
        if ($con->conectar()->query($query)) {
            return true;
        }else{
            return false;
        }
    }
    
    public function login($usuario, $clave){
        require_once 'Conexion.php';
        
        $con = new Conexion();
        $query="SELECT * FROM usuario WHERE usuario = '$usuario' AND clave= md5('$clave')";
        
        $res = $con->conectar()->query($query);
        if (mysqli_num_rows($res)>=1) {
            $res= $res->fetch_object();
            session_start();
            $_SESSION['usuario'] = $res->dni;
            $_SESSION['name_usuario'] = $res->usuario;
            return true;
        }else{
            return false;
        }
        
    }
}
