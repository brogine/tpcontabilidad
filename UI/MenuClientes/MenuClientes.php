<html>
<head>
<link href="MenuClientes.css" type="text/css" rel="stylesheet" />
<link href="../Commons/Header/Header.css" type="text/css" rel="stylesheet" />
<script language="JavaScript" src ="Ubicacion.js"> </script>
</head>

<body>
<div class="MCPrincipal">
<?php include_once '../Commons/Header/Header.php';?>


<div class="NuevoTurno">
<p>Nuevo Turno</p>
<label for="cboPais">Pais: </label>
		<select id="cboPais" onclick="Search(this.value, cboProvincia);">
      	<?php 
      	include_once '../../Servicio/ubicacionservicio.php';
      	$ubicacionServicio = new UbicacionServicio();
      	$listaPaises = $ubicacionServicio->ListarPaises();
      	if(isset($listaPaises)){
      		foreach ($listaPaises as $Pais){
      			echo "<option value='$Pais->IdPais'>$Pais->Descripcion</option>";
      		}
      	}
      	?>
      	</select>
      	<label for="cboProvincia">Provincia: </label>
      	<select id="cboProvincia" onclick="Search(this.value, cboLocalidad);">
      	</select>
      	<label for="cboLocalidad">Localidad: </label>
      	<select id="cboLocalidad">
      	</select>
</div>

<div class="TurnosPendientes">
<p>Turnos Pendientes</p>

</div>

</div>
</body>
</html>
