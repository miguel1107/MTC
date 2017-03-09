<?php
	include ("/../conectar.php");
	//$link=Conectarse();
	/**
	* 
	*/
	class tramite{
		
		function __construct(){
		}

		public function actualizaSisgedo($sis,$idtra){
			$link=Conectarse();
			$sql="UPDATE tramite SET sisgedo='".$sis."' WHERE idtramite='".$idtra."' ";
			$rs=pg_query($link,$sql);
			return $rs or die('false');
		}

		public function retornaTramite($sisgedo){
			$link=Conectarse();
			$sql="SELECT idtramite FROM tramite WHERE sisgedo='".$sisgedo."'";
			$rs=pg_query($link,$sql);
			$dat=pg_fetch_array($rs);
			$tra=$dat[0];
			return $tra;
		}
	}


?>