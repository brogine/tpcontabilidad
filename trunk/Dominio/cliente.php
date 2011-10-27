<?php

// Clase Cliente Hereda de Persona
class Cliente extends Persona {
    // Variables Cliente
    public $Turnos = array();
    
    // Constructor vacío Cliente
    public function __construct(){ }
    
    // Constructor completo Cliente
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