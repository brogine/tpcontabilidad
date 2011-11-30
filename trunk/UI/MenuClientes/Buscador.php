<?php
$Localidad=$_GET['q'];
include '../../Servicio/ubicacionservicio.php';
$UbicaServ = new UbicacionServicio();
$UbicaServ->ListarLocalidadesPorNombre($Localidad)
?>