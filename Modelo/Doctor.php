<?php

class Doctor {
   private $dni_doctor;
   private $nombre;
   private $espec;
   private $telefono_1;
   
   function __construct(){
       
   }

   function getDni_doctor() {
       return $this->dni_doctor;
   }

   function getNombre() {
       return $this->nombre;
   }

   function getEspec() {
       return $this->espec;
   }

   function getTelefono_1() {
       return $this->telefono_1;
   }

   function setDni_doctor($dni_doctor) {
       $this->dni_doctor = $dni_doctor;
   }

   function setNombre($nombre) {
       $this->nombre = $nombre;
   }

   function setEspec($espec) {
       $this->espec = $espec;
   }

   function setTelefono_1($telefono_1) {
       $this->telefono_1 = $telefono_1;
   }
}
