<?php 
	require_once __DIR__.'/../model/categoria.php';


	$accion=$_POST['action'];
	
	switch ($accion) {
		case 'cargacombo':
			$cat=new categoria();
			$id=$_POST['id'];
			$rs=$cat->cargacombo($id);
			echo "<option value='0'>---SELECCIONE CATEGORIA</option>";
			while ($n=pg_fetch_array($rs)) {
				echo "<option value='".$n[0]."'>". $n[1]."</option>";
			}
			break;
		
		default:
			# code...
			break;
	}
?>