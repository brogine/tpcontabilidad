<div id="site_content">
      <div class="sidebar">
        <h3>Ingresar</h3>
        <h5>Sólamente usuarios logueados</h5>
        <form method="post" id="frmLogin" action="#" id="search_form">
            <label>Usuario:</label>
            <input type="text" name="txtUsuario" id="txtUsuario" />
            <label>Password:</label>
            <input type="password" name="txtPassword" id="txtPassword" />
            <h5><input type="checkbox" name="chkRecordarme" id="chkRecordarme" /> Recordarme</h5>
            <input type="submit" id="btnIngresar" value="Aceptar" />
        </form>
        <?php
        if(isset($error)){ echo $error; }
        ?>
      </div>
      <div id="content">
        <h1>Quiero sacar un turno...</h1>
        <h5>Rubro 	
	        <select id="cmbRubro" name="cmbRubro" >
				<?php
					include_once '../Servicio/rubroservicio.php';
					$servicioRubros = new RubroServicio();
					$listaRubros = $servicioRubros->Listar();
					foreach($listaRubros as $rubro):
						echo "<option value=".$rubro->Id.">".$rubro->Descripcion."</option>";
					endforeach;
				?>
			</select>
        </h5>
        <p>Nulla in neque nulla. Maecenas sed arcu mauris, id venenatis leo.</p>
        <p>Donec blandit tincidunt sapien, vel volutpat nulla scelerisque vel.</p>
        <p>Ut a purus nec eros rutrum ornare. Suspendisse sit amet risus urna.</p>
        <h2>Maecenas ut placerat augue.</h2>
        <p>Quisque ornare nunc eget quam pellentesque molestie.</p>
        <ul>
          <li>Ut eget venenatis</li>
          <li>Nam felis metus</li>
          <li>pulvinar volutpat cursus non</li>
          <li>lacinia id ligula</li>
          <li>Suspendisse in sollicitudin ligula</li>
        </ul>
      </div>