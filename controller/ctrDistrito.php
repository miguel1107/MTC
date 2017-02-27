<?php 
	require_once __DIR__.'/../model/distrito.php';


	$accion=$_POST['action'];
	
	switch ($accion) {
		case 'cargacombo':
			$cat=new distrito();
			$id=$_POST['id'];
			$di=$_POST['dis'];
			$rs=$cat->cargacombo($id);
			echo "<option value='0'>---Distrito---</option>";
			while ($n=pg_fetch_array($rs)) {
				if ($di==0) {
					echo "<option value='".$n[0]."'>". $n[1]."</option>";
				}else{
					if ($di==$n[0]) {
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