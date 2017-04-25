<?php 
	require_once __DIR__.'/../model/plazo.php';


	$accion=$_POST['action'];
	
	switch ($accion) {
		case 'editPlazo':
			$dias=$_POST['pl'];
			$plazo=new plazo();
			$rs=$plazo->editPlazo($dias);
			if ($rs=='1') {
				echo('1');
			}else{
				echo('0');
			}
			break;
		case 'editCupo':
			$dias=$_POST['pl'];
			$plazo=new plazo();
			$rs=$plazo->editCupo($dias);
			if ($rs=='1') {
				echo('1');
			}else{
				echo('0');
			}
			break;
		case 'editCupoM':
			$dias=$_POST['pl'];
			$plazo=new plazo();
			$rs=$plazo->editCupoM($dias);
			if ($rs=='1') {
				echo('1');
			}else{
				echo('0');
			}
			break;
		default:
			# code...
			break;
	}
?>