<?php 
	require_once __DIR__.'/../model/tramite.php';
	


	$accion=$_POST['action'];
	
	switch ($accion) {
		case 'actualizasisgedo':
			$idtra=$_POST["idtra"];
			$sisg=$_POST["sisg"];
			$tramite= new tramite();
			$tra=$tramite->retornaTramite($sisg);
			$rs;
			if ($tra=='') {
				$rs=$tramite->actualizaSisgedo($sisg,$idtra);
				$rs= "true";
			}else{
				$rs= "false";
			}
			echo $rs;exit;
			break;
		default:
			# code...
			break;
	}
?>