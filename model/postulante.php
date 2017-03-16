<?php
require_once __DIR__.'/../conectar.php';

	/**
	* 
	*/
	class postulante{
		
		function __construct(){
			
		}

		public function returnDni($dni){
			$link=Conectarse();
			$sql="SELECT * FROM postulante WHERE dni='".$dni."'";
			$rs=pg_query($link,$sql);
			return $rs;
		}

		public function returnCe($ce){
			$link=Conectarse();
			$sql="SELECT * FROM postulante WHERE ce='".$ce."'";
			$rs=pg_query($link,$sql);
			return $rs;
		}

		public function returnSis($sisgedo){
			$link=Conectarse();
			$sql="SELECT * FROM tramite WHERE sisgedo='".$sisgedo."'";
			$rs=pg_query($link,$sql);
			return $rs;
		}
	}


?>