<?php 
	require_once __DIR__.'/../model/evaluacion.php';


	$accion=$_POST['action'];
	
	switch ($accion) {
		case 'consulta':
			$fecha=$_POST['fecha'];
			$con=$_POST['con'];
			$man=$_POST['man'];
			if ($con=='0') {
				$examen=$man;
			}else if ($man=='0') {
				$examen=$con;
			}
			$eva=new evaluacion();
			$rs=$eva->cosultaCupos($fecha,$examen);
			$data=pg_fetch_array($rs);
			$dat=$data[0];
			if ($dat=="") {
				echo "0";
			}else{
				echo $dat;
			}
			break;
		default:
			# code...
			break;
	}
?>