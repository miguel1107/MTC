<?php 
	require_once __DIR__.'/../model/evaluacion.php';
	require_once __DIR__.'/../model/hora.php';


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
			$r= "<option value='0'>---Seleccione Hora---</option>";
			$hora=new hora();
			$rr=$hora->returnHora();
			while ($da=pg_fetch_array($rr)) {
				$idho=$da[0];
				$eva=new evaluacion();
				$rs=$eva->cosultaCupos($fecha,$examen,$idho);
				$data=pg_fetch_array($rs);
				$dat=$data[0];
				if ($dat=="") {
					$h=0;
				}else{
					$h=$dat;
				}
				$cupo=16-$h;
				$r=$r."<option value='".$da[0]."'>". $da[1]."(".$cupo." disponibles)</option>";	
			}
			echo $r;
			break;
		default:
			# code...
			break;
	}
?>