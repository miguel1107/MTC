<?php 
	require_once __DIR__.'/../model/postulante.php';
	


	$accion=$_POST['action'];
	
	switch ($accion) {
		case 'buscadni':
			$dni=$_POST['dni'];
			$pos=new postulante();
			$rs=$pos->returnDni($dni);
			if(pg_num_rows($rs)==0){
				echo "0";
			}else{
				echo "1";
			}
			break;
		case 'buscace':
			$ce=$_POST['ce'];
			$pos=new postulante();
			$rs=$pos->returnCe($ce);
			if(pg_num_rows($rs)==0){
				echo "0";
			}else{
				echo "1";
			}
			break;
		// case 'buscasis':
		// 	$sisgedo=$_POST['sis'];
		// 	$pos=new postulante();
		// 	$rs=$pos->returnSis($sisgedo);
		// 	if(pg_num_rows($rs)==0){
		// 		echo "0";
		// 	}else{
		// 		echo "1";
		// 	}
		// 	break;
		default:
			# code...
			break;
	}
?>