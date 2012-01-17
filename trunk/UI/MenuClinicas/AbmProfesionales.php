<?php 

if($_POST && count($_POST) > 0){
	if($_POST['btnGuardar']){
		
		include_once '../../Dominio/contacto.php';
		include_once '../../Servicio/clinicaservicio.php';
		include_once '../../Dominio/clinica.php';
		include_once '../../Servicio/especialidadservicio.php';
		include_once '../../Dominio/especialidad.php';
		include_once '../../Dominio/medico.php';
		include_once '../../Servicio/medicoservicio.php';
		include_once '../../Dominio/horario.php';
		include_once '../../Servicio/horarioservicio.php';
		
		//Variables recibidas por POST
		$Apellido = $_POST['txtApellido'];
		$Nombre = $_POST['txtNombre'];
		$Email = $_POST['txtEmail'];
		$Telefono = $_POST['txtTelefono'];
		$IdEspecialidad = $_POST['cboEspecialidades'];
		
		//Value Objects
		$Contacto = new Contacto($Email, $Telefono);
		$ClinicaServ = new ClinicaServicio();
		$Clinica = $ClinicaServ->Buscar(4);//$_SESSION['mtID']);
		$EspServ = new EspecialidadServicio();
		$Especialidad = $EspServ->Buscar($IdEspecialidad);
		
		//Objeto Completo
		$nMedico = new Medico(null, $Apellido, $Nombre, $Contacto, $Clinica, $Especialidad);
		
		//Instancia del servicio y guardado del objeto
		$MedicoServ = new MedicoServicio();
		$resultado = $MedicoServ->Agregar($nMedico);
		
		if (is_int($resultado)) {
			$nMedico->IdPersona = $resultado;
			/*
			 * Proceso los datos de la Tabla
			 * Formato: ddd, ddd -hh:mm-hh:mm-dur/...
			 */
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
				if(isset($camposHorario[0]) && isset($camposHorario[1]) && 
						isset($camposHorario[2]) && isset($camposHorario[3])) {
					$nHorario = new Horario($nMedico, 
							strptime($camposHorario[1], "%H:%M"), 
							strptime($camposHorario[2], "%H:%M"),
							null, $camposHorario[3]);
					$nHorario->DiaSemana = $nHorario->DiaSemanaToSql($camposHorario[0]);
					$horarioServ->Agregar($nHorario); 
				}
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

<link href="../Commons/Footer/Footer.css" type="text/css" rel="stylesheet" />

<link rel="stylesheet" type="text/css" media="all" href="../Commons/reset.css" />
<link rel="stylesheet" type="text/css" media="all" href="../Commons/text.css" />
<link rel="stylesheet" type="text/css" media="all" href="../Commons/960.css" />

<link href="../Commons/Header/Header.css" type="text/css" rel="stylesheet" />
<link href="MenuClinicas.css" type="text/css" rel="stylesheet"/>

<link href="../Commons/Menu/Menu.css" type="text/css" rel="stylesheet"/>

<link href="../Commons/Publicidad/Publicidad.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="../Commons/Publicidad/jquery.js"></script>
<script type="text/javascript" src="../Commons/Publicidad/jCarouselLite.js"></script>
<script type="text/javascript" src="../Commons/Publicidad/captify.tiny.js"></script>
<script type="text/javascript" src="../Commons/Publicidad/Publicidad.js"></script>

<script type="text/javascript" src="AbmProfesionales.js"></script>

</head>
<body>
<?php
$profesionales = true;
include_once '../Commons/Header/Header.php'; 
?>
<div class="container_12 prefix_1" id="Contenido">
	<?php include_once '../Commons/Menu/Clinicas.php'; 
		if(isset($error_msg)) echo "<div class='error-msg'>$error_msg</div>";
		if(isset($succ_msg)) echo "<div class='succ-msg'>$succ_msg</div>";
	?>
	
	<form method="post" action="" name="frmProfesional">
		<div class="grid_4 prefix_2">
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
							echo "<option value='".$Especialidad->IdEspecialidad."'>".$Especialidad->Nombre."</option>";
						}
					}
				?>
			</select></label></li>    
		</ol>
		</div>
		<div class="grid_4">
			<ol>
		    	<li><label for="txtEmail"> Email: <input class="texto" type="text" id="txtEmail" name="txtEmail" /> </label></li>
		    	<li><label for="txtTelefono"> Telefono: <input class="texto" type="text" id="txtTelefono" name="txtTelefono" /> </label></li>
		    </ol>
		</div>
		<div class="grid_5 prefix_2">
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
		<div class="grid_4">
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
			</label>
			<label for="cboHasta">Hora hasta:
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
			</label>
			<label for="txtDuracion">Duración promedio del turno:
			<input type="text" class="texto" name="txtDuracion" 
					id="txtDuracion" style="width:40px" /> en minutos.
			</label>
			<input type="button" onclick="agregarHorarios();" id="btnAgregar" 
					name="btnAgregar" value="Agregar" class="botonenviar" />
		</div>
		<div class="grid_10 prefix_2">
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
			<input type="submit" value="Guardar" id="btnGuardar" name="btnGuardar" 
					class="botonenviar" onclick="getDatosTabla();" />
		</div>
	</form>
	
	<div class="grid_12 prefix_1 publicidad">
	<?php include_once '../Commons/Publicidad/index.php'; ?>
	</div>
</div>
<?php include_once '../Commons/Footer/index.php'; ?>
</body>
</html>