<?php
require_once __DIR__.'/../conectar.php';
	/**
	* 
	*/
	class cursoespecial{
		
		function __construct(){
			
		}

		public function autocomplete($term){
			$link=Conectarse();
			$sql="SELECT nombre_curso_especial,id_curso_especial  FROM curso_especial WHERE nombre_curso_especial LIKE '".$term."' and estado='1' LIMIT 5";
			$rs=pg_query($link,$sql);
			return $rs;
		}

	}


?>