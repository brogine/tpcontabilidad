<?php
include_once '../../Repositorio/loginrepositorio.php';
include_once '../../Dominio/login.php';

class LoginServicio{
    private $loginRepositorio;
    public $succ_msg = "";
    public $err_msg = "";
    
    public function __construct(){
        $this->loginRepositorio = new LoginRepositorio();
    }
    
    public function Validar(Login $Login)
    {
        $resultado = $this->loginRepositorio->Validar($Login);
        if($resultado)
		{
			$this->succ_msg = '<script>location.href="/megaturnos/UI/MenuPrincipal/MenuPrincipal.php";</script>';
		}
		else {
			$this->err_msg = "Datos de Login incorrectos.";
		}
        /*
        if(isset($resultado))
        {
	    	switch ($resultado) {
				case "Clinica":
					$this->succ_msg = '<script>location.href="/megaturnos/UI/MenuPrincipal/MenuPrincipal.php";</script>';
				break;
				case "Paciente":
					$this->succ_msg = '<script>location.href="/megaturnos/UI/MenuPrincipal/MenuPrincipal.php";</script>';
				break;
				default:
					$this->err_msg = "Datos de Login incorrectos.";
				break;
			}
        } else {
        	$this->err_msg = "Datos de Login incorrectos.";
        }
		 * 
		 */
    }
		 
}

?>