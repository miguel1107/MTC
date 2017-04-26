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

		public function registrar($fecha){
			$link=Conectarse();
			$sql="INSERT INTO fechasbloqueadas(fecha) VALUES ('".$fecha."'); ";
			//echo($sql);exit;
			$rs=pg_query($link,$sql)or die('false');
			if ($rs!='false') {
				return ('1');	
			}else{
				return('0');
			}
		}

		public function modificar($id,$fecha){
			$link=Conectarse();
			$sql="UPDATE fechasbloqueadas SET fecha='".$fecha."' where id='".$id."'";
			//echo($sql);exit;
			$rs=pg_query($link,$sql)or die('false');
			if ($rs!='false') {
				return ('1');	
			}else{
				return('0');
			}
		}
	}


?>