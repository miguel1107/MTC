<?php 
	require_once __DIR__.'/../model/centromedico.php';

		$filtrocentro=strtoupper($_GET["term"]);
		$newfiltro='%'.$filtrocentro.'%';
		$cm=new centromedico();
		$ls=$cm->autocomplete($newfiltro);
		// $ar = array();
		// while ($r=pg_fetch_array($ls)) {
		// 	array_push($ar,$r);
		// }
		foreach ($ls as $key => $value) {
			echo $value->nombre;
		}
		echo json_encode($ar);
	

?>