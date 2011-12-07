<?php
include_once '../../Repositorio/loginrepositorio.php';
include_once '../../Dominio/login.php';

class LoginServicio{
    private $loginRepositorio;
    
    public function __construct(){
        $this->loginRepositorio = new LoginRepositorio();
    }
    
    public function Validar(Login $Login)
    {
        $resultado = $this->loginRepositorio->Validar($Login);
    	switch ($resultado) {
			case "Clinica":
				header ("Location: /MenuClinicas/MenuClinicas.php");
			break;
			case "Paciente":
        		header('Location: /MenuClientes/MenuClientes.php');
			break;
			default:
				$resultado = "Error de Login";
			break;
		}
		return $resultado;
    }
}

?>