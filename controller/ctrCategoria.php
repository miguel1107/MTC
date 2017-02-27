<?php 
	require_once __DIR__.'/../model/categoria.php';


	$accion=$_POST['action'];
	
	switch ($accion) {
		case 'cargacombo':
			$cat=new categoria();
			$id=$_POST['id'];
			$cate=$_POST['cat'];
			$rs=$cat->cargacombo($id);
			echo "<option value='0'>---SELECCIONE CATEGORIA</option>";
			while ($n=pg_fetch_array($rs)) {
				if ($cate==0) {
					echo "<option value='".$n[0]."'>". $n[1]."</option>";
				}else{
					if ($cate==$n[0]) {
						echo "<option value='".$n[0]."' selected>". $n[1]."</option>";
					}
				}
				
			}
			break;
		
		default:
			# code...
			break;
	}
?>