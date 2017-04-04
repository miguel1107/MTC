<?php
function Conectarse(){
	$enlace=pg_connect("host=localhost port=5432 dbname=dblicencias user=postgres password=postgres");	
	return $enlace;
}
?>