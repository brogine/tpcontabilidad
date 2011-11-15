<?php
include_once 'persona.php';
include_once 'contacto.php';
// Clase Cliente Hereda de Persona
class Cliente extends Persona {
    // Variables Cliente
    
    public  $Contacto;
    
    // Constructor vacío Cliente
    public function __construct(){
        $argv = func_get_args();
        switch(func_num_args())
        {
            case 5:
                self::__construct1($argv[0], $argv[1], $argv[2], $argv[3], $argv[4]);
                break;
            default:
                break;
        }    
    }
    
    // Constructor completo Cliente
    public function __construct1($dniCuitCuil, $apellido, $nombre, $password,Contacto $contacto){
        $this->DniCuitCuil = $dniCuitCuil;
    	$this->Apellido = $apellido;
        $this->Nombre = $nombre;
        $this->Password = $password;
        $this->Contacto = $contacto;
        
        
    }
}
    
?>