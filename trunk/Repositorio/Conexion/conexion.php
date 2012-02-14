<?PHP

class Conexion
{  
	private $Server; 
	private $User;
	private $Pass;
	private $BDD;
	private static $Conex;
	
	public function __construct(){
		// La variable $Conex va a ser la que defina nuestro patron singleton
		if (is_null (self::$Conex)) {
			$this->LeerXml("Configuracion.xml");
    		self::$Conex = mysqli_connect($this->Server, $this->User, $this->Pass, $this->BDD) or die(mysqli_connect_error());
		}
		return self::$Conex;
	}
  
  	public function StoreProcedureConRetorno($StoreProcedure, $Parametros = '')
  	{
  		if(!$this->Conex){
  			$this->Conex = mysqli_connect($this->Server, $this->User, $this->Pass, $this->BDD) or die(mysqli_connect_error());
  		}
		$Resultado = $this->Conex->query("Call $StoreProcedure($Parametros)");
		return $Resultado;
  	}
  
  	public function StoreProcedureSinRetorno($StoreProcedure, $Parametros = '')
  	{
    	if(!$this->Conex){
  			$this->Conex = mysqli_connect($this->Server, $this->User, $this->Pass, $this->BDD) or die(mysqli_connect_error());
  		}
		$this->Conex->query("Call $StoreProcedure($Parametros)");
  	}
  	
  	public function ConsultaConRetorno($Consulta)
  	{
  		if(!$this->Conex){
  			$this->Conex = mysqli_connect($this->Server, $this->User, $this->Pass, $this->BDD) or die(mysqli_connect_error());
  		}
		$Resultado = $this->Conex->query($Consulta);
		return $Resultado;
  	}
  	
  	public function ConsultaSinRetorno($Consulta)
  	{
  		if(!$this->Conex){
  			$this->Conex = mysqli_connect($this->Server, $this->User, $this->Pass, $this->BDD) or die(mysqli_connect_error());
  		}
  		$this->Conex->query($Consulta);
  	}
  	
  	public function MultipleConsulta($Consulta){
  		if(!$this->Conex){
  			$this->Conex = mysqli_connect($this->Server, $this->User, $this->Pass, $this->BDD) or die(mysqli_connect_error());
  		}
  		return mysqli_multi_query($this->Conex, $Consulta) or die(mysqli_error($this->Conex));
  	}
  	
  	public function GetLastID()
  	{
  		if(!$this->Conex){
  			$this->Conex = mysqli_connect($this->Server, $this->User, $this->Pass, $this->BDD) or die(mysqli_connect_error());
  		}
  		return mysqli_insert_id($this->Conex);
  	}
  
  	private function LeerXml($Archivo)
  	{
	    $xml = new DOMDocument('1.0', 'utf-8');
	    $xml->Load($_SERVER['DOCUMENT_ROOT']."/megaturnos/Repositorio/Conexion/".$Archivo);
	    $DatosRoot = $xml->getElementsByTagName("configuraciones");
	    $Datos = $xml->getElementsByTagName("config");
	    foreach ($Datos as $Value)
	    {
	        $Nodos = $Value->getElementsByTagName("Server");
	        $this->Server=$Nodos->item(0)->nodeValue;
	        $Nodos = $Value->getElementsByTagName("User");
	        $this->User = $Nodos->item(0)->nodeValue;
	        $Nodos = $Value->getElementsByTagName("Pass");
	        $this->Pass = $Nodos->item(0)->nodeValue;
	        $Nodos = $Value->getElementsByTagName("BDD");
	        $this->BDD = $Nodos->item(0)->nodeValue;
	    }
  	}
}
?>
