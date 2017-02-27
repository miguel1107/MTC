<?php
require_once __DIR__.'/../conectar.php';

	/**
	* 
	*/
	class distrito{
		
		function __construct(){
			
		}

		public function cargacombo($id){
			$link=Conectarse();
			$sql="SELECT * FROM distrito ct WHERE idprovincia='".$id."' order by nombre";
			$rs=pg_query($link,$sql);
			return $rs;
		}

	}


?>