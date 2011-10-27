<?php

// Clase Profesional Hereda de Persona
class Profesional extends Persona {
    
    // Variables Profesional
    
    // Constructor vacío Profesional
    public function __construct(){ }
    
    // Constructor completo Profesional
    public function __construct1($turnos, $apellido, $nombre, $dniCuitCuil, $contacto, $ubicacion, $login, $estado){
        $this->Turnos = $turnos;
        $this->Apellido = $apellido;
        $this->Nombre = $nombre;
        $this->DniCuitCuil = $dniCuitCuil;
        $this->Contacto = $contacto;
        $this->Ubicacion = $ubicacion;
        $this->Login = $login;
        $this->Estado = $estado;
    }
    
}
    
?>