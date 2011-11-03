<?PHP
include_once 'Conexion/conexion.php';
include_once '../Dominio/profesional.php';
class ProfesionalRepositorio
{
	private $conexion;
	private $PersonaRepo;
	
	public function __construct()
	{
		$this->conexion = new Conexion();
		$this->PersonaRepo = new PersonaRepositorio();
	}
	
	public function Agregar(Profesional $Profesional)
	{
		$parametros = array();
		$parametros = $this->PersonaRepo->CompletarDatosPersonalesBasicos($Profesional, $parametros);
	    $parametros[4]=$Profesional->Titulo;
	    $parametros[5]=$Profesional->Especialidad;
	    $parametros[6]=$Profesional->TelGuardia;
	    $parametros[7]=$Profesional->Estado;
	    $this->Conexion->StoreProcedureSinRetorno('ProfesionalesAlta',$parametros); 
	}
	
	public function Modificar(Profesional $Profesional)
	{
	    $parametros = array();
		$parametros = $this->PersonaRepo->CompletarDatosPersonalesBasicos($Profesional, $parametros);
	    $parametros[4]=$Profesional->Titulo;
	    $parametros[5]=$Profesional->Especialidad;
	    $parametros[6]=$Profesional->TelGuardia;
	    $parametros[7]=$Profesional->Estado;
	    $this->Conexion->StoreProcedureSinRetorno('ProfesionalesMod',$parametros); 
	}
	
	public function Buscar(Profesional $Profesional)
	{
		$tabla = $this->conexion->StoreProcedureConRetorno('ProfesionalesBuscar',$Profesional->DniCuitCuil);
		$datarow = mysqli_fetch_array($tabla);
		return $this->Mapear($datarow);
	}
	
	public function Borrar(Profesional $Profesional)
	{
	    $Datarow= $this->conexion->StoreProcedureSinRetorno('ProfesionalesBorrar',$Profesional->DniCuitCuil);
	}
	
	public function ListarPorEspecialidad(Profesional $Profesional)
	{  
		$lista = array();
	    $result = $this->conexion->StoreProcedureConRetorno('ProfesionalesListar',$Profesional->Especialidad);
	    while($Datarow=mysql_fetch_array($result))
	    	{
			$lista[i]=$this->Mapear($Datarow);
	    	}
	    
	    return $lista;
	    }
	
	public function Mapear($Datarow)
	{
	    $profesional = new Profesional();
	   	$PersonaRepo->Mapear($profesional,$Datarow);
	    $profesional->Especialidad=$Datarow['Especialidad'];
	    $profesional->Titulo=$Datarow['Titulo'];
	    $profesional->TelGuardia=$Datarow['TelGuardia'];
	    $profesional->Estado=$Datarow['Estado'];
	    return $profesional;
	}
}
?>