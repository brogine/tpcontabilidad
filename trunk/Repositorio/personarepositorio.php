<?PHP
include_once 'Conexion/conexion.php';
include_once '../../Dominio/persona.php';
class PersonaRepositorio

{
	private $Conexion;
    public function __construct()
    {
        $this->Conexion = new Conexion();
    }

    
    public function CompletarDatosPersonalesBasicos(Persona $Persona,$array)
    {
    	$parametros=$array; 
        $parametros[0]=$Persona->DniCuitCuil;
        $parametros[1]=$Persona->Apellido;
        $parametros[2]=$Persona->Nombre;
        $parametros[3]=$Persona->Password;
        
        return $array;
    }
    
    public function Mapear(Persona $Persona,$Datarow)
    {
    	
        $Persona->DniCuitCuil=$Datarow['DniCuitCuil'];
        $Persona->Apellido=$Datarow['Apellido'];
        $Persona->Nombre=$Datarow['Nombre'];
        $Persona->Password=$Datarow['Password'];
        return $Persona;        
    }
}
?>