<?PHP
include_once 'Conexion/conexion.php';
include_once '../Dominio/profesional.php';
class ProfesionalRepositorio{
	
	private $profesional;
	private $conexion;
	
	public function __construct()
	{
		$this->conexion = new Conexion();
	}
	
	public function Agregar($Profesional)
	{
	    $this->profesional = $Profesional;
	    $parametros array();
	    PersonaRepositorio->Agregar($Profesional)
	    $parametros[0]=$this->profesional->Titulo;
	    $parametros[1]=$this->profesional->Especialidad;
	    $parametros[2]=$this->profesional->TelGuardia;
	    $parametros[3]=$this->profesional->Estado;
	    $this->Conexion->StoreProcedureSinRetorno('ProfesionalesAlta',$parametros)

	    
	}
	
	public function Modificar($Profesional)
	{
	   $this->profesional = $Profesional;
	    $parametros array();
	    PersonaRepositorio->Agregar($Profesional)
	    $parametros[0]=$this->profesional->Titulo;
	    $parametros[1]=$this->profesional->Especialidad;
	    $parametros[2]=$this->profesional->TelGuardia;
	    $parametros[3]=$this->profesional->Estado;
	    $this->Conexion->StoreProcedureSinRetorno('ProfesionalesMod',$parametros) 
	}
	a
	public function Buscar($Profesional)
	{
		$tabla = mysql_fetch_array('ProfesionalesBuscar',$Profesional->DniCuitCuil);
		$profesional = $this->Mapear($tabla);
		return $profesional;
 
	}
	
	public function Borrar($Profesional)
	{
	    $Datarow= $Conexion->StoreProcedureConRetorno('BuscarProfesional',$Profesional->DniCuitCuil)
	    $profesional = $this->Mapear($Datarow);
	    return $profesional;
	    
	}
	
	public function Listar($Profesional)
	{
            $i=0;	
	    $lista = array();
	    $result = $this->conexion->StoreProcedureConRetorno('ListaProfesionales',$Profesional->Especialidad);
	    for($Datarow=mysql_fetch_array($result))
	    {
		$lista[i]=$this->Mapear($Datarow);
		$i++;
	    }
	    return $lista;
	    }
	
	public function Mapear($Datarow)
	{
	    $profesional = new Profesional();
	    $PR = new PersonaRepositorio();
	    $profesional = $PR->Mapear($Datarow);
	    $profesional->Especialidad=$Datarow['Especialidad'];
	    $profesional->Titulo=$Datarow['Titulo'];
	    $profesional->TelGuardia=$Datarow['TelGuardia'];
	    $profesional->Estado=$Datarow['Estado'];
	    return $profesional;
	}
}
?>