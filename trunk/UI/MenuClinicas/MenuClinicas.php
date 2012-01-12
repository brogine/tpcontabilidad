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
<?php 
$inicio = true;
include_once '../Commons/Header/Header.php'; 
?>
<div class="container_12 prefix_1" id="Contenido">
<?php include_once '../Commons/Menu/Clinicas.php'; ?>
<div class="grid_7 prefix_2">
	<iframe src="../Commons/Turnos/index.php" frameborder="0" height="600px" width="600px"></iframe>
</div>
<div class="grid_3">
	<p>Bienvenido <?php (isset($_SESSION['mtNombre']) ? $_SESSION['mtNombre']: '');?></p>
</div>
<div class="grid_12 prefix_1 publicidad">
<?php include_once '../Commons/Publicidad/index.php'; ?>
</div>
</div>
<?php include_once '../Commons/Footer/index.php'; ?>
</body>
</html>