<?PHP
class PersonaRepositorio
{
    private $persona;
    private $Conexion;
    public function __construct()
    {
        $this->Conexion = new Conexion();
    }
    
    public function Agregar($Persona)
    {
        $this->persona = $Persona;
        $parametros=array();
        $parametros[0]=$this->persona->DniCuitCuil;
        $parametros[1]=$this->persona->Apellido;
        $parametros[2]=$this->persona->Nombre;
        $parametros[3]=$this->persona->Contacto->Telefono;
        $parametros[4]=$this->persona->Contacto->Celular;
        $parametros[5]=$this->persona->Contacto->Email;
        $parametros[6]=$this->persona->Ubicacion->Localidad->IdLocalidad;
        $parametros[7]=$this->persona->Ubicacion->Domicilio;
        $parametros[8]=$this->persona->Estado;
        //$this->Conexion->StoreProcedureSinRetorno('PersonasAlta',)
        
    }
    
    public function Modificar($Persona)
    {
        $this->persona = $Persona;
        $parametros=array();
        $parametros[0]=$this->persona->DniCuitCuil;
        $parametros[1]=$this->persona->Apellido;
        $parametros[2]=$this->persona->Nombre;
        $parametros[3]=$this->persona->Contacto->Telefono;
        $parametros[4]=$this->persona->Contacto->Celular;
        $parametros[5]=$this->persona->Contacto->Email;
        $parametros[6]=$this->persona->Ubicacion->Localidad->IdLocalidad;
        $parametros[7]=$this->persona->Ubicacion->Domicilio;
        $parametros[8]=$this->persona->Estado;
        //$this->Conexion->StoreProcedureSinRetorno('PersonasMod',)
         
        
    }
    
    public function Buscar($Persona)
    {
        $this->ObjetoPrivado = ObjetoDominio;
        $ObjetoTemporal = $this->Conexion->StoreProcedureConRetorno(NombreStoreProcedure,Parametros);
        if(isset($ObjetoTemporal))
        {
        return $this->Mapear($ObjetoTemporal);
        }
    }
    
    public function Borrar($Persona)
    {
         $this->ObjetoPrivado = ObjetoDominio;
        
    }
    
    public function Listar($Persona)
    {
         $this->ObjetoPrivado = ObjetoDominio;
        
    }
    
    public function Mapear($Datarow)
    {
        $tabla = mysql_fetch_array($Datarow);
        
        
    }
}
?>