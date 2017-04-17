<?php 
	require_once __DIR__.'/../conectar.php';
	/**
	* 
	*/
	class plazo{
		
		function __construct(){
		}

		public function paraCupo(){
			$link=Conectarse();
			$sql="SELECT progexam FROM plazo WHERE id='2'";
			$rs=pg_query($link,$sql);
			return $rs;
		}

		public function editPlazo($dias){
			$link=Conectarse();
			$sql="UPDATE plazo SET progexam='".$dias."' where id='1'";
			//echo($sql);exit;
			$rs=pg_query($link,$sql)or die('false');
			if ($rs!='false') {
				return ('1');	
			}else{
				return('0');
			}
		}

		public function editCupo($dias){
			$link=Conectarse();
			$sql="UPDATE plazo SET progexam='".$dias."' where id='2'";
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