<?php
session_start();
if(!isset($_SESSION["usuario"])) header("location:index.php");
include ("conectar.php");
$link=Conectarse();

$num=1;
while($_POST["total"] >= $num){
	if($_POST["resultado".$num.""]!="" ) {
		if($_POST["categoria"]!='1'){
			$sql2="update evaluacion set resultado='".$_POST["resultado".$num.""]."' where fecha='".$_POST["fechaexamen"]."' and idexamen='".$_POST["categoria"]."' and idtramite= '".$_POST["post".$num.""]."'";
		}else{
			$sql2="update evaluacion set resultado='".$_POST["resultado".$num.""]."' where fecha='".$_POST["fechaexamen"]."' and idexamen='".$_POST["tipocate".$num.""]."' and idtramite= '".$_POST["post".$num.""]."'";
		}
		$sr2=pg_query($link,$sql2); // or die ("Error : $sql");

		if($_POST["categoria"]=='3'){
			$sq7="select opcion,resultado,idevaluacion from evaluacion where fecha='".$_POST["fechaexamen"]."' and idexamen='".$_POST["categoria"]."' and idtramite= '".$_POST["post".$num.""]."'";
			$rs7=pg_query($link,$sq7); // or die ("Error :$sq");
			while($reg7=pg_fetch_array($rs7)) { 
				$opc=$reg7[0];
				$res=$reg7[1];
				$ideva=$reg7[2];
			}
			$opcion=$opc;
			$resultado=$res;
			if($opcion=='3' && $resultado=='DESAPROBADO'){
				$sql289="update tramite set estado='0' where idtramite='".$_POST["post".$num.""]."'";
				$sr289=pg_query($link,$sql289); // or die ("Error : $sql");
			}elseif($opcion <='3' && $resultado=='NO SE PRESENTO'){
				//$op=opcion-1;
				//$sql289="update evaluacion set opcion='".$opcion."' where idevaluacion='".$ideva."'";
				//$sr289=pg_query($link,$sql289); // or die ("Error : $sql");
				$sql289="update tramite set estado='1' where idtramite='".$_POST["post".$num.""]."'";
				$sr289=pg_query($link,$sql289);
			}elseif($opcion <='3' && $resultado=='APROBADO'){
				$sql289="update tramite set estado='1' where idtramite='".$_POST["post".$num.""]."'";
				$sr289=pg_query($link,$sql289);			
			}
		}
		if($_POST["categoria"]=='4'){
			$sq7="select opcion,resultado from evaluacion where fecha='".$_POST["fechaexamen"]."' and idexamen='".$_POST["categoria"]."' and idtramite= '".$_POST["post".$num.""]."'";
			$rs7=pg_query($link,$sq7); // or die ("Error :$sq");
			while($reg7=pg_fetch_array($rs7)) { 
				$opc=$reg7[0];
				$res=$reg7[1];
			}
				$opcion=$opc;
				$resultado=$res;
			if($opcion <='3' && $resultado=='APROBADO'){
				$sql289="update tramite set estado='2' where idtramite='".$_POST["post".$num.""]."'";
				$sr289=pg_query($link,$sql289); // or die ("Error : $sql");
			}elseif($opcion =='3' && $resultado=='DESAPROBADO'){
				$sql289="update tramite set estado='0' where idtramite='".$_POST["post".$num.""]."'";
				$sr289=pg_query($link,$sql289); // or die ("Error : $sql");
			}elseif($opcion <='3' && $resultado=='NO SE PRESENTO'){
				$sql289="update tramite set estado='1' where idtramite='".$_POST["post".$num.""]."'";
				$sr289=pg_query($link,$sql289); // or die ("Error : $sql");
			}
		}

	}
	$num++;
}
header("location:asignar_resultado.php?xxxfecha=".$_POST["fechaexamen"]."&categoria=".$_POST["categoria"]."");

?>
