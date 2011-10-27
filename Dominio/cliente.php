<?php

// Clase Cliente Hereda de Persona
class Cliente extends Persona {
    // Variables Cliente
    public $Turnos = array();
    
    // Constructor vacío Cliente
    public function __construct(){
        $argv = func_get_args();
        switch(func_num_args())
        {
            case 4:
                self::__construct1($argv[0], $argv[1], $argv[2], $argv[3], $argv[4], $argv[5], $argv[6], $argv[7]);
                break;
            default:
                break;
        }    
    }
    
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