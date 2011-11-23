
<div class='separator'></div>
	<div id='galeriacontainer'>
	<div class='prev'><img src='<?php $_SERVER['DOCUMENT_ROOT']?>/megaturnos/UI/Commons/Publicidad/Imagenes/prev.jpg' alt='prev' /></div>
		<div id='galeria' class='gal'>
		<ul style='width=3000'>
<?php 
/* 
 * Este código genera los thumbnails para las imagenes
 * Tira error pero las genera igual jajaj
 * Y levanta las thumbnails para la galeria
 * 
 */
$dir = $_SERVER['DOCUMENT_ROOT'].'/megaturnos/UI/Commons/Publicidad/carousel';
if(is_dir($dir) && is_dir($dir.'/thumbs')){
	if ($fotos = opendir($dir)) {
		if($thumbs = opendir($dir.'/thumbs')) {
			if(count(glob($dir.'/*.*')) != count(glob($dir.'/thumbs/*.*')))
			{
				while (($archivo = readdir($fotos)) !== false) {
					if(!is_file($dir."/thumbs/$archivo")){
						$ext = substr($archivo, count($archivo) - 4, 3);
						if($ext == "jpg" || $ext == "png" || $ext == "gif")	{
							include_once $_SERVER['DOCUMENT_ROOT'].'/megaturnos/Seguridad/imagenes.php';
							$nombre = substr($archivo, 0, count($archivo) - 5);
							$thumb=new thumbnail("$dir/$nombre.$ext"); //Nombre Temporal
							$thumb->size_width(170); //Ancho
							$thumb->size_height(145); //Alto
							$thumb->size_auto(200); //Tamaño maximo
							$thumb->jpeg_quality(75); //Calidad Imagen (1-100)
							$thumb->save($dir."/thumbs/$nombre.$ext"); //Guardar Imagen
							echo "<li><img src='$dir/thumbs/$archivo' alt'$nombre' /></li>";
						}
					}
				}
			}else{
				while (($archivo = readdir($thumbs)) !== false) {
					$ext = substr($archivo, count($archivo) - 4, 3);
					if($ext == "jpg" || $ext == "png" || $ext == "gif")	{
						$nombre = substr($archivo, 0, count($archivo) - 5);
						echo "<li><img src='$dir/thumbs/$archivo' alt'$nombre' /></li>";
					}
				}
			}
			closedir($thumbs);
		}
		closedir($fotos);
	}
}
?>
</ul>
</div>
<div class='next'><img src='<?php $_SERVER['DOCUMENT_ROOT']?>/megaturnos/UI/Commons/Publicidad/Imagenes/next.jpg' alt='next' /></div>
</div>
