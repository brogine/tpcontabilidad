<?php

// Clase Cliente Hereda de Persona
class Cliente extends Persona {
    // Variables Cliente
    public $ObraSocial;
    
    // Constructor vacío Cliente
    public function __construct(){
        $argv = func_get_args();
        switch(func_num_args())
        {
            case 7:
                self::__construct1($argv[0], $argv[1], $argv[2], $argv[3], $argv[4], $argv[5], $argv[6]);
                break;
            default:
                break;
        }    
    }
    
    // Constructor completo Cliente
    public function __construct1($apellido, $nombre, $dniCuitCuil, $password, $contacto, $ubicacion, $obraSocial){
        $this->Apellido = $apellido;
        $this->Nombre = $nombre;
        $this->DniCuitCuil = $dniCuitCuil;
        $this->Password = $password;
        $this->Contacto = $contacto;
        $this->Ubicacion = $ubicacion;
        $this->ObraSocial = $obraSocial;
    }
}
    
?>