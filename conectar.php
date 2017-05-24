<?php
function Conectarse(){
	$enlace=pg_connect("host=localhost port=5432 dbname=prueba user=postgres password=1107");	
	return $enlace;
}
?>