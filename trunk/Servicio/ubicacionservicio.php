<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/megaturnos/Repositorio/ubicacionrepositorio.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/megaturnos/Dominio/localidad.php';

class UbicacionServicio{
    private $ubicacionRepositorio;
    
    public function __construct(){
        $this->ubicacionRepositorio = new UbicacionRepositorio();
    }
    
    public function AgregarLocalidad(Localidad $Localidad){
        $this->ubicacionRepositorio->AgregarLocalidad($Localidad);
    }
    
    public function AgregarProvincia(Provincia $Provincia){
        $this->ubicacionRepositorio->AgregarProvincia($Provincia);
    }
    
    public function AgregarPais(Pais $Pais){
        $this->ubicacionRepositorio->AgregarPais($Pais);
    }
    
    public function ModificarLocalidad(Localidad $Localidad){
        $this->ubicacionRepositorio->ModificarLocalidad($Localidad);
    }
    
    public function ModificarProvincia(Provincia $Provincia){
        $this->ubicacionRepositorio->ModificarProvincia($Provincia);
    }
    
    public function ModificarPais(Pais $Pais){
        $this->ubicacionRepositorio->ModificarPais($Pais);
    }
    
    public function BuscarLocalidad($IdLocalidad){
        return $this->ubicacionRepositorio->BuscarLocalidad($IdLocalidad);
    }
    
    public function BuscarProvincia($IdProvincia){
        return $this->ubicacionRepositorio->BuscarProvincia($IdProvincia);
    }
    
    public function BuscarPais($IdPais){
        return $this->ubicacionRepositorio->BuscarPais($IdPais);
    }
    
    public function ListarLocalidades($IdProvincia){
        return $this->ubicacionRepositorio->ListarLocalidades($IdProvincia);
    }
    
    public function ListarProvincias($IdPais){
        return $this->ubicacionRepositorio->ListarProvincias($IdPais);
    }
    
    public function ListarPaises(){
        return $this->ubicacionRepositorio->ListarPaises();
    }
    public function ListarLocalidadesPorNombre($Nombre)
    {
    	$lista = $this->ubicacionRepositorio->ListarLocalidadesPorNombre($Nombre);
    	
    	
    	foreach ($lista as $localidad)
    	{
    		echo $localidad->Provincia->Descripcion." - ";
    		echo $localidad->Descripcion."<br>";
    	}
    
    }    
}
if($_POST){
	if(isset($_POST['id']) || isset($_POST['src'])){
		$UbicacionServicio = new UbicacionServicio();
		switch ($_POST['src']) { 
			case "cboProvincia": 
				$result = $UbicacionServicio->ListarProvincias($_POST['id']);
				foreach($result as $provincia){
					echo "<option value='$provincia->IdProvincia'>$provincia->Descripcion</option>";
				}
			break; 
			case "cboLocalidad":
				$result = $UbicacionServicio->ListarLocalidades($_POST['id']);
				foreach($result as $localidad){
					echo "<option value='$localidad->IdLocalidad'>$localidad->Descripcion</option>";
				}
			break;
			default:
				break;
		}
	}
}
?>