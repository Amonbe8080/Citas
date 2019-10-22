<?php
class ctrUsuario {
    function registrar(){
        require_once '../Modelo/Usuario.php';
        require_once '../accesoDatos/UsuarioCAD.php';
        
        $modelUsuario = new Usuario();
        $ctr = new UsuarioCAD();
        
        $sintomas = @$_POST['chkGripa'].",".@$_POST['chkFiebre']
                    .",".@$_POST['chkVomito'].",".@$_POST['chkMareo'].",".@$_POST['chkColicos'].",".@$_POST['chkDiarrea'];
       
        $modelUsuario->setDni(htmlspecialchars($_POST['dni']));
        $modelUsuario->setUsuario(htmlspecialchars($_POST['usuario']));
        $modelUsuario->setClave(htmlspecialchars($_POST['clave']));
        $modelUsuario->setSintomas($sintomas);

        if ($ctr->registrar($modelUsuario)) {
            session_start();
            $_SESSION['usuario'] = $_POST['dni'];
            $_SESSION['name_usuario'] = $_POST['usuario'];
            header("Location: Home.php");
        }else{
            echo "<div class='alert alert-danger' role='alert'>
                    Ha ocurrido un error
                  </div>";
        }
    }
    
    function login(){
        require_once '../accesoDatos/UsuarioCAD.php';

        $ctra = new UsuarioCAD();
        
        $usuario=htmlspecialchars($_POST['usuario']);
        $clave=htmlspecialchars($_POST['clave']);
        
        if ($ctra->login($usuario, $clave)) {
            
        }else{
            echo "<div class='alert alert-danger' role='alert'>
                    Usuario o contraseña incorrectos
                  </div>";
        }
    }
}
