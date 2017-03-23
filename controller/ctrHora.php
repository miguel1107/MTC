<?php 
	require_once __DIR__.'/../model/hora.php';


	$accion=$_POST['action'];
	
	switch ($accion) {
		case 'cargacombo':
			$hora=new hora();
			$rs=$hora->returnHora();
			$rr= "<option value='0'>---Seleccione Hora---</option>";
			while ($n=pg_fetch_array($rs)) {
				$rr=$rr."<option value='".$n[0]."'>". $n[1]."</option>";
			}
			echo $rr;
			break;
		
		default:
			# code...
			break;
	}
?>