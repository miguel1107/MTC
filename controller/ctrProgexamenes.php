<?php 
	require_once __DIR__.'/../model/evaluacion.php';
	require_once __DIR__.'/../model/hora.php';
	require_once __DIR__.'/../model/plazo.php';


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
			if ($examen=='4') {
				$rs=$eva->cosultaCupos($fecha,$examen,$idho);
				$data=pg_fetch_array($rs);
				$dat=$data[0];
				if ($dat=="") {
					$h=0;
				}else{
					$h=$dat;
				}
				$cupo=120-$h;
				$r="<span class='Estilo2'>".$cupo."</span>";
			}else if ($examen=='1') {
				$r= "<option value='0'>---Seleccione Hora---</option>";
				$hora=new hora();
				$pla=new plazo();
				$rr=$hora->returnHora();
				while ($da=pg_fetch_array($rr)) {
					$idho=$da[0];
					//$rs=$eva->cosultaCupos($fecha,$examen,$idho);
					$rs=$eva->cosultaCupos($fecha,$examen,'1');
					$data=pg_fetch_array($rs);
					$dat=$data[0];
					if ($dat=="") {
						$h=0;
					}else{
						$h=$dat;
					}
					$rrr=$pla->paraCupo();
					$das=pg_fetch_array($rrr);
					$cu=(int) $das[0];
					$cupo=$cu-$h;
					$r=$r."<option value='".$da[0]."'>". $da[1]."(".$cupo." disponibles)</option>";	
				}	
			}
			echo $r;
			break;
		default:
			# code...
			break;
	}
?>