<?	
session_start();

/*echo $_POST["cantidad"];
echo "<br>";
echo $_POST["idcar"];*/

	if(!isset($_SESSION["carrito"]))
		{
			$_SESSION["carrito"]=array();
			$_SESSION["carrito"][]=array($_POST["idcar"],$_POST["cantidad"]);
			$_SESSION["total"]=$_SESSION["total"] + number_format(($_POST["cantidad"]*$_POST["prec"]),2,'.','');
			
		}
	else
		{
		$pos = buscar($_POST["idcar"]);
		if($pos<0){
			$_SESSION["carrito"][]=array($_POST["idcar"],$_POST["cantidad"]);
			$_SESSION["total"]=$_SESSION["total"] + number_format(($_POST["cantidad"]*$_POST["prec"]),2,'.','');
			}
		else{
			$_SESSION["carrito"][$pos][1]+=$_POST["cantidad"];	
			$_SESSION["total"]=$_SESSION["total"] + number_format(($_POST["cantidad"]*$_POST["prec"]),2,'.','');
			}
		
		}
		
	function buscar($idcar)
		{
		$pos=-1;
		$cont=-1;
		foreach($_SESSION["carrito"] as $v=>$p)
			{
			$cont ++;
			if($p[0]==$idcar)
				{
				$pos=$cont;
				break;
				}
			}
		return $pos;
		}
header("Location:mostrarcarta.php?seccioncar=".$_POST["seccar"]."&namesecc=".$_POST["namsec"]."&moscar=".$_POST["idcar"]."&moscan=".$_POST["cantidad"]."&mos=S");
?>