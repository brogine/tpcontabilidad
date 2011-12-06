<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<link href="../Commons/Login/Login.css" rel="stylesheet" type="text/css" />
<link href="Clientes.css" rel="stylesheet" type="text/css" />
<link href="../Commons/Header/Header.css" rel="stylesheet" type="text/css" />

<link href="../Commons/Publicidad/Publicidad.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="../Commons/Publicidad/jquery.js"></script>
<script type="text/javascript" src="../Commons/Publicidad/jCarouselLite.js"></script>
<script type="text/javascript" src="../Commons/Publicidad/captify.tiny.js"></script>
<script type="text/javascript" src="../Commons/Publicidad/Publicidad.js"></script>

<link href="../Commons/Footer/Footer.css" type="text/css" rel="stylesheet"/>

<title>Clientes</title>
</head>

<body>
<div>
<?php 
include '../Commons/Header/Header.php';
?>
</div>
<div id="Principal">

      <div class="CuadroCliente">
      
      <h3>Registro de Nuevo Cliente</h3>
      <form action="<?php $_SERVER['PHP_SELF']?>" class="form_settings" method="POST">
	      <label for="txtDni">Ingrese Su Dni:</label>
	      <input type="text" id="txtDni" class="texto" name="txtDni">
	      <label for="txtNombre">Ingrese Su Nombre:</label>
	      <input type="text" id="txtNombre" class="texto" name="txtNombre">
	      <label for="txtApellido">Ingrese Su Apellido:</label>
	      <input type="text" id="txtApellido" class="texto" name="txtApellido">
	      <label for="txtEmail">Ingrese Su E-mail:</label>
	      <input type="text" id="txtEmail" class="texto" name="txtEmail">
	      <label for="txtTelefono">Ingrese Un Telefono (Opcional):</label>
	      <input type="text" id="txtTelefono" class="texto" name="txtTelefono">
	      <label for="txtPassword">Ingrese Un Password:</label>
	      <input type="text" id="txtPassword" class="texto" name="txtPassword">
	      <input type="submit" id="btnRegistrar" name="btnRegistrar" class="botonenviar" value="Registrame!" />
	  </form>
	  
      </div>

      <?php 
      
      if($_POST)
      {
      	include_once '../../Dominio/cliente.php';
      	include_once '../../Servicio/clienteservicio.php';
      	include_once '../../Dominio/contacto.php';
      	/* RECIBO LOS DATOS DEL FORMULARIO*/
      	
      	$nombre=$_POST['txtNombre'];
      	$apellido=$_POST['txtApellido'];
      	$dni = $_POST['txtDni'];
      	$email=$_POST['txtEmail'];
      	$Telefono=$_POST['txtTelefono'];
      	$Pass = $_POST['txtTelefono'];
      	/* CREO UN OBJETO CONTACTO*/
      	
      	$Contacto = new Contacto();
      	$Contacto->Telefono=$Telefono;
      	$Contacto->Email=$email;
      	/*CREO EL OBJETO CLIENTE Y LO COMPLETO*/
         	
      	$Cliente = new Cliente($dni, $apellido, $nombre, $Pass, $Contacto);
      	/*LO PASO POR PARAMETRO AL SERVICIO*/
      	$ClienteServ = new ClienteServicio();
        $Cli = $ClienteServ->Buscar($Cliente->DniCuitCuil);
      	if ($Cli->DniCuitCuil!="" && $Cli->Contacto->Email!="")
      	{
        echo "Ese Ususario ya Existe";
      	}
      	else
      	{
      		$ClienteServ->Agregar($Cliente);
      	}
      }
      ?>
   
   
   <div id="login">
   <?php 
   include '../Commons/Login/Login.php';
   
   ?>
   </div>
<div class="publicidad">
<?php include_once '../Commons/Publicidad/index.php'; ?>
</div>
</div>
<div id="Pie">
<?php include_once '../Commons/Footer/index.php'; ?>
</div>
</body>

</html>