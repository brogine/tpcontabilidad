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
				echo '<script>location.href="/megaturnos/UI/MenuClinicas/MenuClinicas.php";</script>';
			break;
			case "Paciente":
				echo '<script>location.href="/megaturnos/UI/MenuClinicas/MenuClientes.php";</script>';
			break;
			default:
				$resultado = "Error de Login";
			break;
		}
		return $resultado;
    }
}

?>