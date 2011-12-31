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

<link href="../Commons/Footer/Footer.css" type="text/css" rel="stylesheet"/>
<script type="text/javascript">
function agregarHorarios(){
	var table = document.getElementById("tablaTurnos");
	 
    var rowCount = table.rows.length;
    var row = table.insertRow(rowCount);

	var selectedDays = "";
	if(document.frmProfesional.chkLunes.checked){
		selectedDays = "Lunes, ";
	}
	if(document.frmProfesional.chkMartes.checked){
		selectedDays = selectedDays + " Martes, ";	
	}
	if(document.frmProfesional.chkMiercoles.checked){
		selectedDays = selectedDays + " Miércoles, ";	
	}
	if(document.frmProfesional.chkJueves.checked){
		selectedDays = selectedDays + " Jueves, ";	
	}
	if(document.frmProfesional.chkViernes.checked){
		selectedDays = selectedDays + " Viernes, ";	
	}
	if(document.frmProfesional.chkSabado.checked){
		selectedDays = selectedDays + " Sábado, ";	
	}
	if(document.frmProfesional.chkDomingo.checked){
		selectedDays = selectedDays + " Domingo, ";	
	}
    var celdaDias = row.insertCell(0);
    celdaDias.innerHTML = selectedDays;

    var celdaDesde = row.insertCell(1);
    celdaDesde.innerHTML = document.frmProfesional.cboDesde.value;

    var celdaHasta = row.insertCell(2);
    celdaHasta.innerHTML = document.frmProfesional.cboHasta.value;

    var celdaQuitar = row.insertCell(3);
    var link = document.createElement("input");
    link.type = "button";
    link.setAttribute('onclick', "quitarHorarios(" + rowCount + ");");
    link.value = "Quitar";
    celdaQuitar.appendChild(link);
}

function quitarHorarios(filaClickeada){
	var Tabla = document.getElementById("tablaTurnos");
	Tabla.deleteRow(filaClickeada);
}
</script>

</head>
<body id="body">
<?php
$profesionales = true;
include_once '../Commons/Header/Header.php'; 
?>
<div id="Contenido">
<?php include_once '../Commons/Menu/Clinicas.php'; ?>
<label for="txtNombre"> Nombre:
<input type="text" id="txtNombre" name="txtNombre" />
</label>
<label for="txtApellido"> Apellido:
<input type="text" id="txtApellido" name="txtApellido" />
</label>
<label for="cboEspecialidades"> Especialidad:
<select id="cboEspecialidades" name="cboEspecialidades">

</select>
</label>
<form method="post" action="" name="frmProfesional">
<fieldset>
<legend>Horarios de Trabajo:</legend>
<label for="diasSemana"> Seleccione los días: <br />
<input type="checkbox" name="chkLunes" value="Lun"> Lunes<br>
<input type="checkbox" name="chkMartes" value="Mar"> Martes<br>
<input type="checkbox" name="chkMiercoles" value="Mie"> Miércoles<br>
<input type="checkbox" name="chkJueves" value="Jue"> Jueves<br>
<input type="checkbox" name="chkViernes" value="Vie"> Viernes<br>
<input type="checkbox" name="chkSabado" value="Sab"> Sábado<br>
<input type="checkbox" name="chkDomingo" value="Dom"> Domingo<br>
</label>
<label for="cboDesde">Hora desde:
<select name="cboDesde">
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
<select name="cboHasta">
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
<input type="button" onclick="agregarHorarios();" id="btnAgregar" name="btnAgregar" value="Agregar" />
</fieldset>

<table id="tablaTurnos">
	<tr>
		<th>Días</th>
		<th>Hora Desde</th>
		<th>Hora Hasta</th>
		<th>Quitar</th>
	</tr>
</table>

<input type="submit" value="Guardar" id="btnGuardar" name="btnGuardar" />
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