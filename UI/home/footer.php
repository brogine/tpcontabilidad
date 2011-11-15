<div class="separator"></div>
<div id="galeriacontainer">
<div class="prev"><img src="style/prev.jpg" alt="prev" /></div>
<div id="galeria" class="gal">
	<ul style="width=3000">
	<?php 
	/* 
	 * Este código genera los thumbnails para las imagenes
	 * 
	include_once $_SERVER['DOCUMENT_ROOT'].'/megaturnos/Seguridad/imagenes.php';
	$dir = $_SERVER['DOCUMENT_ROOT'].'/megaturnos/UI/carousel';
	if(is_dir($dir) && is_dir($dir.'/thumbs')){
		if ($fotos = opendir($dir)) {
			if($thumbs = opendir($dir.'/thumbs')) {
				while (($archivo = readdir($fotos)) !== false) {
					if(!is_file($dir."/thumbs/$archivo")){
						$ext = substr($archivo, count($archivo) - 4, 3);
						if($ext == "jpg" || $ext == "png" || $ext == "gif")	{
							$nombre = substr($archivo, 0, count($archivo) - 5);
							$thumb=new thumbnail("$dir/$nombre.$ext"); //Nombre Temporal
							$thumb->size_width(170); //Ancho
							$thumb->size_height(145); //Alto
							$thumb->size_auto(200); //Tamaño maximo
							$thumb->jpeg_quality(75); //Calidad Imagen (1-100)
							$thumb->save($dir."/thumbs/$nombre.$ext"); //Guardar Imagen
							echo "<li><img src='$dir/$archivo' alt'$nombre' /></li>";
						}
					}
				}
				closedir($thumbs);
			}
			closedir($fotos);
		}
	}
	*
	*
	* Este código levanta las thumbnails para la galería
	*/
	$dir = './carousel/thumbs';
	if(is_dir($dir)){
		if ($fotos = opendir($dir)) {
			while (($archivo = readdir($fotos)) !== false) {
				$ext = substr($archivo, count($archivo) - 4, 3);
				if($ext == "jpg" || $ext == "png" || $ext == "gif")	{
					$nombre = substr($archivo, 0, count($archivo) - 5);
					echo "<li><img src='$dir/$archivo' alt'$nombre' /></li>";
				}
			}
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