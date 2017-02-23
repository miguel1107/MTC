<?php 
	require_once __DIR__.'/../model/escuelaprofesional.php';

	$filtrocentro=strtoupper($_GET["term"]);
	$newfiltro='%'.$filtrocentro.'%';
	$cm=new escuelaprofesional();
	$ls=$cm->autocomplete($newfiltro);
	$array = array();
	while ($n=pg_fetch_array($ls)) {
		$r= array('label' => $n[0] , 'value' => $n[0],'id'=>$n[1]);
		array_push($array,$r);
	}
	echo json_encode($array);
	
?>