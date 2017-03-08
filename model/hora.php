<?php
require_once __DIR__.'/../conectar.php';

	/**
	* 
	*/
	class hora{
		
		function __construct(){
			
		}

		public function returnHora(){
			$link=Conectarse();
			$sss="SELECT * FROM hora order by idhora";
			$rs=pg_query($link,$sss);
			return $rs;
		}

	}


?>