<?php 
	require_once __DIR__.'/../model/centromedico.php';

	$filtrocentro=strtoupper($_GET["term"]);
	$newfiltro='%'.$filtrocentro.'%';
	$cm=new centromedico();
	$ls=$cm->autocomplete($newfiltro);
	$array = array();
	while ($n=pg_fetch_array($ls)) {
		$r= array('label' => $n[0] , 'value' => $n[0],'id'=>$n[1]);
		array_push($array,$r);
	}
	// $ar = array();
	// while ($r=pg_fetch_array($ls)) {
	// 	array_push($ar,$r);
	// }
	// $arr=pg_fetch_object($ls);
	//echo count($ar);
	// for ($i=0; $i < count($ar) ; $i++) {
	// 	echo $ar[$i][0].',';
	// }
	// foreach ($arr as $key => $val) {
	// 	$val->label=$val->nombre;
	// }
	echo json_encode($array);
	
?>