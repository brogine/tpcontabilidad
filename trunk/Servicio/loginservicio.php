<?php

class LoginServicio{
    private $loginRepositorio;
    
    public function __construct(){
        $this->loginRepositorio = new LoginRepositorio();
    }
    
    public function Validar($Login)
    {
        
    }
    
}

?>