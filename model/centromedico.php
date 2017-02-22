<?php
require_once __DIR__.'/../conectar.php';
	/**
	* 
	*/
	class centromedico{
		
		function __construct(){
			
		}

		public function autocomplete($term){
			$link=Conectarse();
			$sql="SELECT nombre,idcentro  FROM centro_medico WHERE nombre LIKE '".$term."' and estado='1' LIMIT 5";
			$rs=pg_query($sql);
			return $rs;
		}

	}


?>