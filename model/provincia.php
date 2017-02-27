<?php
	//include ("/../conectar.php");
	//$link=Conectarse();
	/**
	* 
	*/
	class provincia{
		
		function __construct(){
		}

		public function retornaLista(){
			$link=Conectarse();
			$sql="SELECT * FROM provincia order by idprovincia";
			$rs=pg_query($link,$sql);
			return $rs;
		}
	}


?>