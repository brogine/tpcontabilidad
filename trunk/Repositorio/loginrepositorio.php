<?php
include_once 'Conexion/conexion.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/megaturnos/Dominio/login.php';

class LoginRepositorio{
    private $Conexion;
    
    public function __construct(){
        $this->Conexion = new Conexion();
    }
    
    public function Validar(Login $Login)
    {
    	$Consulta = "SELECT
			CASE 
				WHEN c.Nombre IS NULL THEN 'Paciente' 
				WHEN p.Nombre IS NULL THEN 'Clinica'
				END AS Tipo
			FROM login l
			LEFT JOIN clinicas c
			ON l.Email = c.Email
			LEFT JOIN personas p
			ON l.Email = p.Email
			WHERE l.Email = '".$Login->Email."' AND l.Pass = MD5('".$Login->Password."') ";
    	$result = $this->Conexion->ConsultaConRetorno($Consulta);
    	if(mysqli_num_rows($result) == 1){
    		$DataRow = mysqli_fetch_array($result);
    		return $DataRow['Tipo'];
    	}
    }
}

?>