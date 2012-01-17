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

</head>
<body>
<?php include_once '../Commons/Header/Header.php'; ?>
<div class="container_12" id="Contenido">
<?php 
$turnos = true;
include_once '../Commons/Menu/Clinicas.php'; 
?>

<div class="grid_10 prefix_2">
<h3>Turnos Aprobados</h3>
<table>
	<tr>
		<th>Profesional</th>
		<th>Paciente</th>
		<th>Fecha</th>
		<th>Estado</th>
		<th>Eliminar</th>
	</tr>
	<?php 
	include_once '../../Servicio/turnoservicio.php';
	include_once '../../Dominio/turno.php';
		$turnoServicio = new TurnoServicio();
		$listaTurnos = $turnoServicio->ListarProfesional(1);
		foreach($listaTurnos as $Turno){
			echo "<tr>";
			echo "<td>" . $Turno->Medico->Apellido . ", " . $Turno->Medico->Nombre . "</td>";
			echo "<td>" . $Turno->Paciente->Apellido . ", " . $Turno->Paciente->Nombre . "</td>";
			echo "<td>" . $Turno->Fecha . "</td>";
			echo "<td>" . $Turno->Estado . "</td>";
			echo '<td><a href="eliminar.php?id=' . $Turno->IdTurno .'" >Eliminar</a></td>';
			echo "</tr>";
		}
	?>
</table>
</div>
<div class="grid_12 prefix_1 publicidad">
<?php include_once '../Commons/Publicidad/index.php'; ?>
</div>
</div>
<?php include_once '../Commons/Footer/index.php'; ?>
</body>
</html>