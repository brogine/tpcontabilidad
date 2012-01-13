<div class="Cuadro">
	<h2>Ingresar</h2>
	<h4>Sólamente usuarios con cuenta</h4>
        
	<form method="post" id="frmLogin" action="<?=$_SERVER['PHP_SELF'];?>">
		<label class="Texto" for="txtEmailLogin">Email:</label>
		<input type="text" name="txtEmailLogin" id="txtEmailLogin" class="texto" />
		<label class="Texto" for="TxtContrasenia">Password:</label>
		<input type="password" name="txtContrasenia" id="txtContrasenia" class="texto" />
		<label class="Texto"><input type="checkbox" name="chkRecordarme" id="chkRecordarme" /> Recordarme</label>
		<input type="submit" id="btnIngresar" name="btnIngresar" value="Ingresar" class="botonenviar" />
	</form>
    
    <?php 
    if($_POST && count($_POST) > 0)
    {
    	if(isset($_POST['btnIngresar'])){
	    	if(isset($_POST['txtEmailLogin']) && isset($_POST['txtContrasenia']))
	    	{
	    		include_once '../../Dominio/login.php';
		      	include_once '../../Servicio/loginservicio.php';
		      	/* RECIBO LOS DATOS DEL FORMULARIO*/
		      	$Login = new Login($_POST['txtEmailLogin'], $_POST['txtContrasenia']);
		      	$loginServicio = new LoginServicio();
		      	$loginServicio->Validar($Login);
		      	if($loginServicio->succ_msg != ""){
		      		echo "<div class='succ-msg'>$loginServicio->succ_msg</div>";
		      	}
		      	if($loginServicio->err_msg != ""){
		      		echo "<div class='error-msg'>$loginServicio->err_msg</div>";
		      	}
	    	}
    	}
    }
    ?>
    
</div>