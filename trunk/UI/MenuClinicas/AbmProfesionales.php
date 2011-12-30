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
var numero = 1;
function agregarHorarios(){
	var table = document.getElementById("tablaTurnos");
	 
    var rowCount = table.rows.length;
    var row = table.insertRow(rowCount);

    var cell1 = row.insertCell(0);
    var element1 = document.createElement("input");
    element1.type = "checkbox";
    cell1.appendChild(element1);

    var cell2 = row.insertCell(1);
    cell2.innerHTML = rowCount + 1;

    var cell3 = row.insertCell(2);
    var element2 = document.createElement("input");
    element2.type = "text";
    cell3.appendChild(element2);
}

function quitarHorarios(idFila){
	var Tabla = document.getElementById("tabla");
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
<select>
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
<select>
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

<div class="publicidad">
<?php include_once '../Commons/Publicidad/index.php'; ?>
</div>
</div>
<div id="Pie">
<?php include_once '../Commons/Footer/index.php'; ?>
</div>

</body>

</html>