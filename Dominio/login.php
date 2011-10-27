<?php

// Clase Login
class Login {
    // Variables Login
    public $DniCuitCuil;
    public $Usuario;
    public $Password;
    public $Estado;
    
    // Constructor vacío Cliente
    public function __construct(){ }
    
    // Constructor completo Cliente
    public function __construct1($dniCuitCuil, $usuario, $password, $estado){
        $this->DniCuitCuil = $dniCuitCuil;
        $this->Usuario = $usuario;
        $this->Password = $password;
        $this->Estado = $estado;
    }
    
}
    
?>