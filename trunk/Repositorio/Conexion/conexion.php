<?PHP

class Conexion
{  
public $Server; 
public $User;
public $Pass;
public $BDD;
public $Conex;  
  public function Conexion()
  {
    $this->LeerXml("Configuracion.xml");
    
    if(!isset($this->Conex))
    {
        $this->Conex = (mysql_connect($this->Server,$this->User,$this->Pass) or die mysql_error());
            mysql_select_db($this->BDD,$this->Conex) or die(mysql_error()); 
    }
    
  }
  
  public function StoreProcedureConRetorno($StoreProcedure,$Parametros)
  {
   $Resultado = mysql_query("Call $StoreProcedure($Parametros)",$this->Conex);
   return $Resultado
    mysql_close();
  }
  
  public function StoreProcedureSinRetorno($StoreProcedure,$Parametros)
  {
   mysql_query("Call $StoreProcedure($Parametros)",$this->Conex);
   mysql_close();
  }
  
  
  private function LeerXml($Archivo)
  {
    $xml = new DOMDocument('1.0', 'utf-8');
    $xml->Load("Conexion/".$Archivo);
    $Datos = $xml->getElementsByTagName("Configuracion");
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
