<?php 
	require_once __DIR__.'/../model/distrito.php';


	$accion=$_POST['action'];
	
	switch ($accion) {
		case 'cargacombo':
			$cat=new distrito();
			$id=$_POST['id'];
			$rs=$cat->cargacombo($id);
			echo "<option value='0'>---Distrito---</option>";
			while ($n=pg_fetch_array($rs)) {
				echo "<option value='".$n[0]."'>". $n[1]."</option>";
			}
			break;
		
		default:
			# code...
			break;
	}
?>