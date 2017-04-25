<?php 
	require_once __DIR__.'/../model/fechasBloqueadas.php';


	$accion=$_POST['action'];
	
	switch ($accion) {
		case 'lista':
			$plazo=new fechasbloqueadas();
			$s;
			$rs=$plazo->lista();
			while ($reg=pg_fetch_array($rs)) {
				$time = strtotime($reg[0]);
				$newformat = date('m-d-Y',$time);
				if (substr($newformat, 0,1)=='0') {
					$newformat=substr($newformat, 1);
				}
				$s=$s.','.$newformat;
			}
			echo $s;
			break;
		default:
			# code...
			break;
	}
?>