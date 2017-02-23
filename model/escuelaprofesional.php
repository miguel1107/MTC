<?php
require_once __DIR__.'/../conectar.php';
	/**
	* 
	*/
	class escuelaprofesional{
		
		function __construct(){
			
		}

		public function autocomplete($term){
			$link=Conectarse();
			$sql="SELECT nombre,idescuela  FROM escuela_profesional WHERE nombre LIKE '".$term."' and estado='1' LIMIT 5";
			$rs=pg_query($link,$sql);
			return $rs;
		}

	}


?>