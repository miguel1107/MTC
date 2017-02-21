<?php
	//include ("/../conectar.php");
	//$link=Conectarse();
	/**
	* 
	*/
	class tipotramite{
		
		function __construct(){
		}

		public function retornaLista(){
			$link=Conectarse();
			$sql="SELECT * FROM tipo_tramite order by id_tipo";
			$rs=pg_query($link,$sql);
			return $rs;
		}
	}


?>