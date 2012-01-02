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
        if(isset($resultado))
        {
	    	switch ($resultado) {
				case "Clinica":
					$resultado = '<script>location.href="/megaturnos/UI/MenuClinicas/MenuClinicas.php";</script>';
				break;
				case "Paciente":
					$resultado = '<script>location.href="/megaturnos/UI/MenuClinicas/MenuClientes.php";</script>';
				break;
				default:
					$resultado = "Datos de Login incorrectos.";
				break;
			}
        } else {
        	$resultado = "Datos de Login incorrectos.";
        }
		return $resultado;
    }
}

?>