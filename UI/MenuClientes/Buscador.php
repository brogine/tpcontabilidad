<?php
$Localidad = $_GET['q'];
include '../../Servicio/ubicacionservicio.php';
$UbicaServ = new UbicacionServicio();

$lista = $UbicaServ->ListarLocalidadesPorNombre($Localidad);
    echo "<ul>";
    foreach ($lista as $localidad)
    {
    	echo "<li class='Item'>";
    	echo "<p id='$localidad->IdLocalidad' onclick='Completar($localidad->IdLocalidad);'>";
    	echo $localidad->Provincia->Nombre." - ";
    	echo $localidad->Nombre;
		echo "</li>";
    }
    echo "</ul>";
?>