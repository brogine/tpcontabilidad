<?php

// Clase Contacto
class Contacto {
    
    // Variables Contacto
    public $Telefono;
    public $Celular;
    public $Email;
    
    // Constructor Contacto Vacío
    public function __construct(){
    $argv = func_get_args();
        switch(func_num_args())
        {
            case 3:
            	self::__construct1($argv[0], $argv[1], $argv[2]);
            	break;
            default:
                break;
        }
    }
    
    // Constructor Contacto Completo
    public function __construct1($telefono, $celular, $email){
        $this->Telefono = $telefono;
        $this->Celular = $celular;
        $this->Email = $email;
    }
    
}
    
?>