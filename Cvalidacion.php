<?php
class Cvalidacion
{
	function valida()
	{
	$im = ImageCreate(100, 22); 
	$white = ImageColorAllocate($im, 255, 255, 255);
	$black = ImageColorAllocate($im, 66, 578, 0);
	srand((double)microtime()*1000000); 
	$string = md5(rand(0,9999)); 
	$new_string = substr($string, 17, 5);
	$font_height = ImageFontHeight(6);
	$font_width = ImageFontWidth(6);
	// obtenemos las dimensiones de la imagen
	$image_height = ImageSY($im);
	$image_width = ImageSX($im);
	// obtenemos el tamaño del string
	$length = $font_width * strlen($new_string);
	// calculaamos las coordenadas del texto del boton que este centrado
	$image_center_x = ($image_width/2)-($length/2);
	$image_center_y = ($image_height/2)-($font_height/2);
	ImageString($im, 6, $image_center_x, $image_center_y, $new_string, $black);
	imageline ( $im, 0, 0, 10, 22, $black);
	imageline ( $im, 10, 0, 20, 22, $black);
	imageline ( $im, 20, 0, 30, 22, $black);
	imageline ( $im, 30, 0, 40, 22, $black);
	imageline ( $im, 40, 0, 50, 22, $black);
	imageline ( $im, 50, 0, 60, 22, $black);
	imageline ( $im, 60, 0, 70, 22, $black);
	imageline ( $im, 70, 0, 80, 22, $black);
	imageline ( $im, 80, 0, 90, 22, $black);
	imageline ( $im, 90, 0, 100, 22, $black);
	imagerectangle ( $im, 0, 0, 100, 22, $black);
	ImagePNG($im, "verify.png");
	ImageDestroy($im);
	return $new_string;
	}
}
?>