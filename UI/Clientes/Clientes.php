<?php 
      if($_POST && count($_POST) > 0)
      {
	      include_once '../../Dominio/paciente.php';
	      include_once '../../Servicio/pacienteservicio.php';
	      include_once '../../Dominio/contacto.php';
	      include_once '../../Dominio/login.php';
	      /* RECIBO LOS DATOS DEL FORMULARIO*/
	      
	      $Nombre = $_POST['txtNombre'];
	      $Apellido = $_POST['txtApellido'];
	      $Email = $_POST['txtEmail'];
	      $Telefono = $_POST['txtTelefono'];
	      $Pass = $_POST['txtPass'];
	      
	      /* CREO UN OBJETO CONTACTO*/
	      
	      $Contacto = new Contacto($Email, $Telefono);
	        $Login = new Login($Email, $Pass);
	      /*CREO EL OBJETO CLIENTE Y LO COMPLETO*/
	         
	      $Paciente = new Paciente(null,$Apellido, $Nombre, $Contacto, $Login);
	      /*LO PASO POR PARAMETRO AL SERVICIO*/
	      $PacienteServ = new PacienteServicio();
	      if($PacienteServ->Agregar($Paciente)){
	      	$succ_msg = 'Agregado con éxito.';
	      } else {
	      	$err_msg = 'No se guardaron los datos.';
	      }
      }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>

<link rel="stylesheet" type="text/css" media="all" href="../Commons/reset.css" />
<link rel="stylesheet" type="text/css" media="all" href="../Commons/text.css" />
<link rel="stylesheet" type="text/css" media="all" href="../Commons/960.css" />
<link href="../Commons/Login/Login.css" rel="stylesheet" type="text/css" />
<link href="Clientes.css" rel="stylesheet" type="text/css" />
<link href="../Commons/Header/Header.css" rel="stylesheet" type="text/css" />
<link href="../Commons/Footer/Footer.css" type="text/css" rel="stylesheet"/>

<link href="../Commons/Publicidad/Publicidad.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="../Commons/Publicidad/jquery.js"></script>
<script type="text/javascript" src="../Commons/Publicidad/jCarouselLite.js"></script>
<script type="text/javascript" src="../Commons/Publicidad/captify.tiny.js"></script>
<script type="text/javascript" src="../Commons/Publicidad/Publicidad.js"></script>
<title>Clientes</title>
</head>

<body>
<div>
<?php include '../Commons/Header/Header.php';?>
</div>
<div class="container_12" id="Contenido">
      <div class="grid_5 prefix_1">
      <div class="CuadroCliente">
      <h3>Registro de Nuevo Cliente</h3>
      <form action="<?=$_SERVER['PHP_SELF'];?>" method="POST">
	      <label for="txtNombre">Ingrese Su Nombre:</label>
	      <input type="text" id="txtNombre" class="texto" name="txtNombre">
	      <label for="txtApellido">Ingrese Su Apellido:</label>
	      <input type="text" id="txtApellido" class="texto" name="txtApellido">
	      <label for="txtEmail">Ingrese Su E-mail:</label>
	      <input type="text" id="txtEmail" class="texto" name="txtEmail">
	      <label for="txtTelefono">Ingrese Un Telefono (Opcional):</label>
	      <input type="text" id="txtTelefono" class="texto" name="txtTelefono">
	      <label for="txtPassword">Ingrese Un Password:</label>
	      <input type="password" id="txtPass" class="texto" name="txtPass"><br />
	      <input type="submit" id="btnRegistrar" name="btnRegistrar" class="botonenviar" value="Registrame!" />
	  </form>
	  <?php
		if(isset($error_msg)) echo "<div class='error-msg'>$error_msg</div>";
		if(isset($succ_msg)) echo "<div class='succ-msg'>$succ_msg</div>";
	  ?>
	  </div>
      </div>
  	<div class="grid_5 prefix_1">
   <?php include '../Commons/Login/Login.php';?>
   </div>
	<div class="grid_12 prefix_1 publicidad">
	<?php include '../Commons/Publicidad/index.php'; ?>
	</div>
</div>
<?php include '../Commons/Footer/index.php'; ?>
</body>
</html>