<?php

// Clase Login
class Login {
    // Variables Login
    public $DniCuitCuil;
    public $Usuario;
    public $Password;
    public $Estado;
    
    // Constructor vacío Cliente
    public function __construct(){
        $argv = func_get_args();
        switch(func_num_args())
        {
            case 2:
                self::__construct1($argv[0], $argv[1]);
                break;
            case 4:
                self::__construct2($argv[0], $argv[1], $argv[2], $argv[3]);
                break;
            default:
                break;
        }
    }
    
    public function __construct1($usuario, $password){
        $this->Usuario = $usuario;
        $this->Password = $password;
    }
    
    // Constructor completo Cliente
    public function __construct2($dniCuitCuil, $usuario, $password, $estado){
        $this->DniCuitCuil = $dniCuitCuil;
        $this->Usuario = $usuario;
        $this->Password = $password;
        $this->Estado = $estado;
    }
}
    
?>