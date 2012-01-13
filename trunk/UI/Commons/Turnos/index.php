<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
	<link rel='stylesheet' type='text/css' href='reset.css' />
    <!--
	<link rel='stylesheet' type='text/css' href='http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/themes/base/jquery-ui.css' />
	-->
    <link rel='stylesheet' type='text/css' href='libs/css/smoothness/jquery-ui-1.8.11.custom.css' />
	<link rel='stylesheet' type='text/css' href='jquery.weekcalendar.css' />

	<!--
	<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js'></script>
    <script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/jquery-ui.min.js'></script>
    -->
    
    <script type='text/javascript' src='libs/jquery-1.4.4.min.js'></script>
    <script type='text/javascript' src='libs/jquery-ui-1.8.11.custom.min.js'></script>
    
	<script type="text/javascript" src="libs/date.js"></script>
	<script type='text/javascript' src='jquery.weekcalendar.js'></script>
	<script type='text/javascript' src='config.php'></script>
</head>
<body>
	<div id='calendar'></div>
	<div id="event_edit_container">
	<input type="hidden" />
		<form>
			<ul>
				<li>
					<span>Fecha: </span><span class="date_holder"></span> 
				</li>
				<li>
					<label for="start">Hora de Inicio: </label><select name="start"><option value="">Elegir hora de inicio</option></select>
				</li>
				<li>
					<label for="end">Hora estimada de Fin: </label><select name="end"><option value="">Elegir hora de fin</option></select>
				</li>
			</ul>
		</form>
	</div>
</body>
</html>
