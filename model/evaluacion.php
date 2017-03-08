<?php
require_once __DIR__.'/../conectar.php';

	/**
	* 
	*/
	class evaluacion{
		
		function __construct(){
			
		}

		public function cosultaCupos($fecha,$examen){
			$link=Conectarse();
			$sql="SELECT count(*), fecha FROM evaluacion WHERE idexamen='".$examen."' and fecha='".$fecha."' group by fecha";
			$rs=pg_query($link,$sql);
			return $rs;
		}

	}


?>