<?php
require_once __DIR__.'/../conectar.php';

	/**
	* 
	*/
	class fechasbloqueadas{
		
		function __construct(){
			
		}

		public function lista(){
			$link=Conectarse();
			$sql="SELECT fecha FROM fechasbloqueadas";
			$rs=pg_query($link,$sql);
			return $rs;
		}

	}


?>