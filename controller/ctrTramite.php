<?php 
	require_once __DIR__.'/../model/tramite.php';
	


	$accion=$_POST['action'];
	
	switch ($accion) {
		case 'actualizasisgedo':
			$idtra=$_POST["idtra"];
			$sisg=$_POST["sisg"];
			$tramite= new tramite();
			$tra=$tramite->retornaTramite($sisg);
			if ($tra=='') {
				$rs=$tramite->actualizaSisgedo($sisg,$idtra);
				echo "true";
			}else{
				echo "false";
			}
			
			break;
		default:
			# code...
			break;
	}
?>