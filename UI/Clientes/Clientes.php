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
<?php include '../Commons/Header/Header.php';?>
</div>
<div id="Contenido">

      <div class="CuadroCliente">
      
      <h3>Registro de Nuevo Cliente</h3>
      <form action="<?php $_SERVER['PHP_SELF']?>" class="form_settings" method="POST">
	      <label for="txtNombre">Ingrese Su Nombre:</label>
	      <input type="text" id="txtNombre" class="texto" name="txtNombre">
	      <label for="txtApellido">Ingrese Su Apellido:</label>
	      <input type="text" id="txtApellido" class="texto" name="txtApellido">
	      <label for="txtEmail">Ingrese Su E-mail:</label>
	      <input type="text" id="txtEmail" class="texto" name="txtEmail">
	      <label for="txtTelefono">Ingrese Un Telefono (Opcional):</label>
	      <input type="text" id="txtTelefono" class="texto" name="txtTelefono">
	      <label for="txtPassword">Ingrese Un Password:</label>
	      <input type="password" id="txtPass" class="texto" name="txtPass">
	      <input type="submit" id="btnRegistrar" name="btnRegistrar" class="botonenviar" value="Registrame!" />
	  </form>
	  
      </div>

      <?php 
      
      if($_POST)
      {
      	include_once $_SERVER['DOCUMENT_ROOT'].'/megaturnos/Dominio/paciente.php';
      	include_once $_SERVER['DOCUMENT_ROOT'].'/megaturnos/Servicio/pacienteservicio.php';
      	include_once $_SERVER['DOCUMENT_ROOT'].'/megaturnos/Dominio/contacto.php';
      	include_once $_SERVER['DOCUMENT_ROOT'].'/megaturnos/Dominio/login.php';
      	/* RECIBO LOS DATOS DEL FORMULARIO*/
      	
      	$Nombre=$_POST['txtNombre'];
      	$Apellido=$_POST['txtApellido'];
      	$Email=$_POST['txtEmail'];
      	$Telefono=$_POST['txtTelefono'];
      	$Pass = $_POST['txtPass'];
      	
      	/* CREO UN OBJETO CONTACTO*/
      	
      	$Contacto = new Contacto($Email, $Telefono);
        $Login = new Login($Email, $Pass);
      	/*CREO EL OBJETO CLIENTE Y LO COMPLETO*/
         	
      	$Paciente = new Paciente(null,$Apellido, $Nombre, $Contacto, $Login);
      	/*LO PASO POR PARAMETRO AL SERVICIO*/
      	$PacienteServ = new PacienteServicio();
        $PacienteServ->Agregar($Paciente);
      }
      ?>
   
   
   <div id="login">
   <?php include '../Commons/Login/Login.php';?>
   </div>
	<div class="publicidad">
	<?php include '../Commons/Publicidad/index.php'; ?>
	</div>
</div>
<div id="Pie">
<?php include '../Commons/Footer/index.php'; ?>
</div>
</body>
</html>