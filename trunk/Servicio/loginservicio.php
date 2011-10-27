<?php

class LoginServicio{
    private $loginRepositorio;
    
    public function __construct(){
        $this->loginRepositorio = new LoginRepositorio();
    }
    
    public function Validar($Login)
    {
        //$resultado = $this->loginRepositorio->Validar(md5($Login->Usuario), md5($Login->Password));
        //if($resultado){
            header('Location: /UI/includes/mapage.php');
        //}
        
    }
    
}

?>