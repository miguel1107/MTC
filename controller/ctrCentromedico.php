<?php 
	require_once __DIR__.'/../model/centromedico.php';

		$filtrocentro=strtoupper($_GET["term"]);
		$newfiltro='%'.$filtrocentro.'%';
		$cm=new centromedico();
		$ls=$cm->autocomplete($newfiltro);
		$ar = array();
		while ($r=pg_fetch_array($ls)) {
			array_push($ar,$r);
		}
		//echo count($ar);
		// for ($i=0; $i < count($ar) ; $i++) { 
		// 	echo $ar[$i][0].',';
		// }
		foreach ($ls as $key => $val) {
			$val->label=$val->nombre;
		}
		echo json_encode($ar);
	

?>