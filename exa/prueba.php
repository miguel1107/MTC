<?

session_start();



include ("../conectar.php");
$link=Conectarse();

echo count($_SESSION["preguntas"]);

foreach ($_SESSION["preguntas"] as $valor) 
{

		$ssql="select * from preguntas where idpregunta='".$valor."'  order by idpregunta ASC";
				$rs=pg_query($link,$ssql) or die ("error : $ssql"); 
	
     //$i++; 
     while($reg=pg_fetch_array($rs))
     {
     	echo $reg[2];
     	echo "<br />" ;
     	echo "<br />" ;
     }


}

?>