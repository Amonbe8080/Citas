<?php


class Usuario {
    private $dni;
    private $usuario;
    private $clave;
    private $sintomas;
    
    function __construct() {
        
    }
  
    function getDni() {
        return $this->dni;
    }

    function getUsuario() {
        return $this->usuario;
    }

    function getClave() {
        return $this->clave;
    }

    function getSintomas() {
        return $this->sintomas;
    }

    function setDni($dni) {
        $this->dni = $dni;
    }

    function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    function setClave($clave) {
        $this->clave = $clave;
    }

    function setSintomas($sintomas) {
        $this->sintomas = $sintomas;
    }


}
