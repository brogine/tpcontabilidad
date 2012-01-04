<?php 

if($_POST && count($_POST) > 0){
	if($_POST['btnGuardar']){
		
		//Variables recibidas por POST
		$Apellido = $_POST['txtApellido'];
		$Nombre = $_POST['txtNombre'];
		$Email = $_POST['txtEmail'];
		$Telefono = $_POST['txtTelefono'];
		$IdEspecialidad = $_POST['cboEspecialidades'];
		
		//Value Objects
		$Contacto = new Contacto($Email, $Telefono);
		$ClinicaServ = new ClinicaServicio();
		$Clinica = $ClinicaServ->Buscar($_SESSION['mtID']);
		$EspServ = new EspecialidadServicio();
		$Especialidad = $EspServ->Buscar($IdEspecialidad);
		
		//Objeto Completo
		$nMedico = new Medico($Apellido, $Nombre, $Contacto, $Clinica, $Especialidad);
		
		//Instancia del servicio y guardado del objeto
		$MedicoServ = new MedicoServicio();
		$resultado = $MedicoServ->Agregar($nMedico);
		
		if (is_numeric($resultado)) {
			$nMedico->IdPersona = $resultado;
			
			//Proceso los datos de la Table	
			$rowsTabla = explode("/", $_POST['tablaArgs']);
			$horarioServ = new HorarioServicio();
			foreach ($rowsTabla as $tmpHorario) {
				$camposHorario = explode('-', $tmpHorario);
				/*
				 * $camposHorario[0] = Dia Semana
				 * $camposHorario[1] = Hora Desde
				 * $camposHorario[2] = Hora Hasta
				 * $camposHorario[3] = Duración (Min)
				 */
				$nHorario = new Horario($nMedico, $camposHorario[1], $camposHorario[2], $camposHorario[0], $camposHorario[3]);
				$nHorario->DiaSemana = $nHorario->DiaSemanaToSql($nHorario->DiaSemana);
				$horarioServ->Agregar($nHorario);
			}
        	$succ_msg = "Profesional agregado con éxito.";
      	} else {
      		$err_msg = $resultado;
      	}
	}
}

?>

<html>
<head>

<link href="../Commons/Header/Header.css" type="text/css" rel="stylesheet"/>
<link href="MenuClinicas.css" type="text/css" rel="stylesheet"/>

<link href="../Commons/Menu/Menu.css" type="text/css" rel="stylesheet"/>

<link href="../Commons/Publicidad/Publicidad.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="../Commons/Publicidad/jquery.js"></script>
<script type="text/javascript" src="../Commons/Publicidad/jCarouselLite.js"></script>
<script type="text/javascript" src="../Commons/Publicidad/captify.tiny.js"></script>
<script type="text/javascript" src="../Commons/Publicidad/Publicidad.js"></script>

<script type="text/javascript" src="AbmProfesionales.js"></script>

<link href="../Commons/Footer/Footer.css" type="text/css" rel="stylesheet"/>

</head>
<body id="body">
<?php
$profesionales = true;
include_once '../Commons/Header/Header.php'; 
?>
<div id="Contenido">
	<?php include_once '../Commons/Menu/Clinicas.php'; 
		if(isset($error_msg)) echo "<div class='error-msg'>$error_msg</div>";
		if(isset($succ_msg)) echo "<div class='succ-msg'>$succ_msg</div>";
	?>
	
	<form method="post" action="" name="frmProfesional">
		<fieldset class="form">
		<legend>Datos del Profesional</legend>
		<div class="left">
		<ol>
		    <li><label for="txtNombre"> Nombre: <input class="texto" type="text" id="txtNombre" name="txtNombre" /> </label></li>
		    <li><label for="txtApellido"> Apellido: <input class="texto" type="text" id="txtApellido" name="txtApellido" /> </label></li>
		    <li><label for="cboEspecialidades"> Especialidad: <select id="cboEspecialidades" name="cboEspecialidades">
				<?php 
					include_once '../../Servicio/especialidadservicio.php';
					$especialidadesServicio = new EspecialidadServicio();
					$listaEspecialidades = $especialidadesServicio->Listar();
					if(isset($listaEspecialidades)){
						foreach ($listaEspecialidades as $Especialidad){
							echo "<option value=$Especialidad->IdEspecialidad>".$Especialidad->Nombre."</option>";
						}
					}
				?>
			</select></label></li>    
		</ol>
		</div>
		<div class="right">
			<ol>
		    	<li><label for="txtEmail"> Email: <input class="texto" type="text" id="txtEmail" name="txtEmail" /> </label></li>
		    	<li><label for="txtTelefono"> Telefono: <input class="texto" type="text" id="txtTelefono" name="txtTelefono" /> </label></li>
		    </ol>
		</div>
		</fieldset>
		<fieldset class="form">
		<legend>Horarios de Trabajo</legend>
			<div class="left">
		<label for="diasSemana"> Seleccione los días: <br />
		<input type="checkbox" name="chkLunes" value="Lun"> Lunes<br>
		<input type="checkbox" name="chkMartes" value="Mar"> Martes<br>
		<input type="checkbox" name="chkMiercoles" value="Mie"> Miércoles<br>
		<input type="checkbox" name="chkJueves" value="Jue"> Jueves<br>
		<input type="checkbox" name="chkViernes" value="Vie"> Viernes<br>
		<input type="checkbox" name="chkSabado" value="Sab"> Sábado<br>
		<input type="checkbox" name="chkDomingo" value="Dom"> Domingo<br>
		</label>
		</div>
		<div class="right">
		<label for="cboDesde">Hora desde:
		<select name="cboDesde" style="width:100px">
			<?php 
			for ($i = 0; $i <= 23; $i++) {
			    echo "<option>" . $i . ":00</option>";
			    echo "<option>" . $i . ":15</option>";
			    echo "<option>" . $i . ":30</option>";
			    echo "<option>" . $i . ":45</option>";
			} 
			?>
		</select>
		</label><label for="cboHasta">Hora hasta:
		<select name="cboHasta" style="width:100px">
			<?php 
			for ($i = 0; $i <= 23; $i++) {
			    echo "<option>" . $i . ":00</option>";
			    echo "<option>" . $i . ":15</option>";
			    echo "<option>" . $i . ":30</option>";
			    echo "<option>" . $i . ":45</option>";
			}
			?>
		</select>
		</label><label for="txtDuracion">Duración promedio del turno:
		<input type="text" class="texto" name="txtDuracion" id="txtDuracion" style="width:40px" /> en minutos.
		</label>
		<input type="button" onclick="agregarHorarios();" id="btnAgregar" name="btnAgregar" value="Agregar" class="botonenviar" />
		</div>
		</fieldset>
		<table id="tablaTurnos">
			<tr>
				<th>Días</th>
				<th>Hora Desde</th>
				<th>Hora Hasta</th>
				<th>Duración (Min)</th>
				<th>Quitar</th>
			</tr>
		</table>
		<input type="hidden" name="tablaArgs" id="tablaArgs" />
		<p align="center"><input type="submit" value="Guardar" id="btnGuardar" name="btnGuardar" class="botonenviar" onclick="getDatosTabla();" /></p>
	</form>
	
	<div class="publicidad">
	<?php include_once '../Commons/Publicidad/index.php'; ?>
	</div>
</div>
<div id="Pie">
<?php include_once '../Commons/Footer/index.php'; ?>
</div>

</body>

</html>