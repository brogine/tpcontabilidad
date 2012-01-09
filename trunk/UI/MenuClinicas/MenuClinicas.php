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

</head>
<body id="body">
<?php 
$inicio = true;
include_once '../Commons/Header/Header.php'; 
?>
<div id="Contenido">
<?php include_once '../Commons/Menu/Clinicas.php'; ?>

<div class="right"><p>Bienvenido <?php (isset($_SESSION['mtNombre']) ? $_SESSION['mtNombre']: '');?></p></div>
<iframe src="../Commons/Turnos/index.php" frameborder="0" height="500px" width="500px"></iframe>
<div class="publicidad">
<?php include_once '../Commons/Publicidad/index.php'; ?>
</div>
</div>
<div id="Pie">
<?php include_once '../Commons/Footer/index.php'; ?>
</div>

</body>

</html>