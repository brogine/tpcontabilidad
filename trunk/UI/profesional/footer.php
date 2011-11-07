<div class="separator"></div>
<div id="galeriacontainer">
<div class="prev"><img src="style/prev.jpg" alt="prev" /></div>
<div id="galeria" class="gal">
	<ul style="width=3000">
	<?php 
	$dir = "../carousel";
	if(is_dir($dir)){
		if ($fotos = opendir($dir)) {
			while (($archivo = readdir($fotos)) !== false) {
				$ext = substr($archivo, count($archivo) - 4, 3);
				if($ext == "jpg" || $ext == "png" || $ext == "gif")	{
					$nombre = substr($archivo, 0, count($archivo) - 5);
					echo "<li><img src='$dir/$archivo' alt='$nombre' /></li>";
				}
			}
			closedir($fotos);
		}
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