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
<div class="container_12 prefix_1" id="Contenido">
<?php 
$profesionales = true;
include_once '../Commons/Menu/Clinicas.php'; 
?>
<div class="grid_10 prefix_2">
<h3>Profesionales</h3>
<table>
	<tr>
		<th>Nombre y Apellido</th>
		<th>Especialidad</th>
		<th>Editar</th>
	</tr>
	<?php
		include_once '../../Servicio/medicoservicio.php';
		include_once '../../Dominio/medico.php';
		$mediServ = new MedicoServicio();
		$listaMedicos = $mediServ->ListarPorClinica(1);
		foreach($listaMedicos as $Medico){
			echo "<tr>";
			echo "<td>" . $Medico->Apellido . ", " . $Medico->Nombre . "</td>";
			echo "<td>" . $Medico->Especialidad . "</td>";
			echo '<td><a href="editar.php?id=' . $Medico->IdPersona .'" >Editar</a></td>';
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