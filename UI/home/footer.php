<div id="galeriacontainer">
<div class="prev"><img src="style/prev.jpg" alt="prev" /></div>
<div id="galeria" class="gal">
	<ul style="width=3000">
	<?php 
	if(is_dir("../carousel")){
		if ($fotos = opendir($dir)) {
			while ($archivo = readdir($fotos)) {
				$nombre = substr($archivo, 0, count($archivo) - 4);
				echo "<li><img src=".$archivo." alt".$nombre." /></li>";
			}
			closedir($gd);
	}
	?>
    </ul>
</div>
<div class="next"><img src="style/next.jpg" alt="next" /></div>
</div>
<div class="separator"></div>
      <div id="footer">
            Copyright &copy;  algo
      </div>
      <div style="text-align: center; font-size: 0.75em;">Algo mas</div>
  </div>
</body>
</html>