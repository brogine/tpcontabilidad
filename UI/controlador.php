<?php
if(isset($_REQUEST['REQUEST_URI'])){
	$uri = $_REQUEST['REQUEST_URI'];
	if ($uri == '/index.php/login') {
	    $loginServicio = new LoginServicio();
	    $login = new Login($_POST['txtPassword'], $_POST['txtUsuario']);
	    $loginServicio->Validar($login);
	} elseif ($uri == '/index.php/show' && isset($_GET['id'])) {
	    show_action($_GET['id']);
	} else {
	    header('Status: 404 Not Found');
	    echo '<html><body><h1>Page Not Found</h1></body></html>';
	}
}
?>