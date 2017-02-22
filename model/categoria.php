<?php
require_once __DIR__.'/../conectar.php';

	/**
	* 
	*/
	class categoria{
		
		function __construct(){
			
		}

		public function cargacombo($id){
			$link=Conectarse();
			$sql="SELECT c.idcategoria,c.nombre FROM catxtipo ct inner join categoria c on c.idcategoria=ct.id_cat WHERE id_tipo='".$id."' order by id_tipo";
			$rs=pg_query($link,$sql);
			return $rs;
		}

	}


?>