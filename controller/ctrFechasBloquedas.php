<?php 
	require_once __DIR__.'/../model/fechasBloqueadas.php';


	$accion=$_POST['action'];
	$plazo=new fechasbloqueadas();
	switch ($accion) {
		case 'lista':
			$s;
			$rs=$plazo->lista();
			while ($reg=pg_fetch_array($rs)) {
				$time = strtotime($reg[0]);
				$newformat = date('m-d-Y',$time);
				if (substr($newformat, 0,1)=='0') {
					$newformat=substr($newformat, 1);
					if (substr($newformat, 2,1)=='0') {
						$newformat=substr($newformat,0,2).substr($newformat,3);
					}
				}else{
					if (substr($newformat, 3,1)=='0') {
						$newformat=substr($newformat,0,3).substr($newformat,4);
					}
				}
				$s=$s.','.$newformat;
			}
			echo $s;
			break;
		case 'nuevo':
			$fecha=$_POST["fecha"];
			$rs=$plazo->registrar($fecha);
			echo($rs);
			break;
		case 'edit':
			$id=$_POST["id"];
			$fecha=$_POST["fecha"];
			$rs=$plazo->modificar($id,$fecha);
			echo $rs;
			break;
		default:
			# code...
			break;
	}
?>