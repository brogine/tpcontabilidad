<?php

// Clase Contacto
class Contacto {
    
    // Variables Contacto
    public $Telefono;
    public $Celular;
    public $Email;
    
    // Constructor Contacto Vacío
    public function __construct(){
        
    }
    
    // Constructor Contacto Completo
    public function __construct1($telefono, $celular, $email){
        $this->Telefono = $telefono;
        $this->Celular = $celular;
        $this->Email = $email;
    }
    
}
    
?>