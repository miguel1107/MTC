<?php
require_once __DIR__.'/../conectar.php';

	/**
	* 
	*/
	class evaluacion{
		
		function __construct(){
			
		}

		public function cosultaCupos($fecha,$examen,$hora){
			$link=Conectarse();
			$sql="SELECT count(*), fecha FROM evaluacion WHERE idexamen='".$examen."' and fecha='".$fecha."' and idhora='".$hora."'group by fecha";
			$rs=pg_query($link,$sql);
			return $rs;
		}

	}


?>