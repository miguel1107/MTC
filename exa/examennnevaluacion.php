<?php
session_start();
//if(!isset($_SESSION["usuario"])) header("location:../index.php");
include ("../conectar.php");
$link=Conectarse();
?>
<html>
<head>
    <script >
       function sortear(m,n,r )
         {   //m=document.datos.m.value ; n=document.datos.n.value;
			var h;
			var resul='';
             for(i=1 ; i<=n; i++)
            {  
			h=Math.round(m*Math.random());
			 resul=r[1];
			//document.write("Elemento "+i+"="+Math.round(m*Math.random())+"<BR>")  
			document.write("Elemento "+i+"="+resul+"<BR>")
			}  
         }
      </script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin t&iacute;tulo</title>
<link href="../estilos/intranet.css" rel="stylesheet" type="text/css">

<script language="javascript">

var CronoID = null
var CronoEjecutandose = false
var decimas, segundos, minutos , hora

function DetenerCrono (){
  if(CronoEjecutandose)
  clearTimeout(CronoID)
  CronoEjecutandose = false
}

function InicializarCrono () {
//inicializa contadores globales
decimas = 9//0
segundos = 59//0
minutos = 1//59//0
hora = 0//1//0
//pone a cero los marcadores
document.crono.display.value = '02:00:00'
//document.crono.parcial.value = '02:00:00'
}
/*
function MostrarCrono () {
      
  //incrementa el crono
  decimas++
if ( decimas > 9 ) {
decimas = 0
segundos++
if ( segundos > 59 ) {
segundos = 0
minutos++
if ( minutos > 59 ) {
minuto = 0
hora++
if ( hora > 2 ) {
//hora = 2
//hora++
alert('Fin de la cuenta')
DetenerCrono()
return true
}
}
}
}*/

function MostrarCrono () {
      
  //incrementa el crono
 if ( hora == 0 && minutos == 0 && segundos == 0) {
 	document.crono.display.value = "00:00:00";
	alert('Fin de la cuenta');
	DetenerCrono()
	return true
	}
	
  decimas--
if ( 0 > decimas ) {
	decimas = 9
	segundos--
	if ( 0 > segundos ) {
		segundos = 59
		minutos--
		if ( 0 > minutos ) {
			minutos = 59
			hora--
			if ( hora == 0 && minutos == 0 && segundos == 0) {
				alert('Fin de la cuenta');
				DetenerCrono()
				return true
			}
		}
	}
}
//configura la salida
var ValorCrono = ""
ValorCrono = (hora < 10) ? "0" + hora : hora
ValorCrono += (minutos < 10) ? ":0" + minutos : ":" + minutos
ValorCrono += (segundos < 10) ? ":0" + segundos : ":" + segundos
//ValorCrono += ":" + decimas 

  document.crono.display.value = ValorCrono

  CronoID = setTimeout("MostrarCrono()", 100)
CronoEjecutandose = true
return true
}

function IniciarCrono () {
DetenerCrono()
InicializarCrono()
MostrarCrono()
}

function ObtenerParcial() {
//obtiene cuenta parcial
document.crono.parcial.value = document.crono.display.value
}

</script>
</head>

<body onLoad="IniciarCrono()">
<form name="crono">
<div align="center"><center>
<p><input type="text" size="8" name="display" value="00:00:00" style="font-size:large"></p>
</center></div>
</form>

<form  name="form1" method="post" action="insertexamen.php" >
  <table width="85%" border="0" align="center" cellspacing="10">
    <?
$link=conectarse();
$sql3="select * from preguntas ";
$rs3=pg_query($link,$sql3) or die ("error : $sql");
$numeroRegistros=pg_num_rows($rs3);
//////////elementos para el orden 
    if(!isset($orden)) 
    { 
       $orden="idpregunta"; 
    } 
    //////////fin elementos de orden
    //////////calculo de elementos necesarios para paginacion 
    //tama&ntilde;o de la pagina 
    $tamPag=300; 
    //pagina actual si no esta definida y limites 
    if(!isset($_GET["pagina"])) 
    { 
       $pagina=1; 
       $inicio=1; 
       $final=$tamPag; 
    }else{ 
       $pagina = $_GET["pagina"]; 
    } 
    //calculo del limite inferior 
    $limitInf=($pagina-1)*$tamPag; 
    //calculo del numero de paginas 
    $numPags=ceil($numeroRegistros/$tamPag); 
    if(!isset($pagina)) 
    { 
       $pagina=1; 
       $inicio=1; 
       $final=$tamPag; 
    }else{ 
       $seccionActual=intval(($pagina-1)/$tamPag); 
       $inicio=($seccionActual*$tamPag)+1; 
       if($pagina<$numPags) 
       { 
          $final=$inicio+$tamPag-1; 
       }else{ 
          $final=$numPags; 
       } 
       if ($final>$numPags){ 
          $final=$numPags; 
       } 
    } 
//////////fin de dicho calculo 
?>
    <?php
				$link=conectarse();
				//$ssql="select * from preguntas where categoria='".$_SESSION["nombre"]."' order by idpregunta ASC LIMIT ".$tamPag." OFFSET ".$limitInf;
				/*$aa='AI';
				if($aa=='AI'){
				$resul=array();
				$sqla1="select * from preguntas where tipo='TRANSITO' order by idpregunta ASC ";
				$rsa1=pg_query($link,$sqla1) or die ("error : $ssql");
				while($rega1=pg_fetch_array($rsa1)) { 
					$prega1[]=$rega1[0];
	 			}
				$num = Array();
 reset($num);
 for($i=1;$i<=50;$i++)
 {
   $num[$i]=rand(1,count($prega1));
    if($i>1)
    {
       for($x=1; $x<$i; $x++)
       {
         if($num[$i]==$num[$x])
         {
           $i--;
           break;
         }
      }
   }
 }
 
				
				$sqla2="select * from preguntas where tipo='MANEJO' order by idpregunta ASC ";
				$rsa2=pg_query($link,$sqla2) or die ("error : $ssql");
				while($rega2=pg_fetch_array($rsa2)) { 
					$prega2[]=$rega2[0];
	 			}*/
			//	}elseif($aa=='AII'){
				$ssql="select * from preguntas where tipo='MECANICA'  order by idpregunta ASC LIMIT ".$tamPag." OFFSET ".$limitInf;
				//}
				$rs=pg_query($link,$ssql) or die ("error : $ssql");
				 ?>
    <?php  while($reg=pg_fetch_array($rs)) { 
	$preguntas[]=$reg[0];
   $ssql5="select * from alternativas where idpregunta=".$reg[0]." order by idalternativa ASC ";
	$rs5=pg_query($link,$ssql5) or die ("error : $ssql"); 
  
   ?>
      
    <tr>
      <td colspan="3"><table width="100%" border="0" bgcolor="#B1D6E5">
        <tr>
          <td width="8%"><?=$reg[0]?>.-            </td>
          <td colspan="3"><?=$reg[2]?><input type="hidden" name="chk[]" value="<?=$reg[0]?>"> 
          -------Respuesta----
            <?=$reg[5]?>-------
            <?=$reg[3]?></td>
          <td width="4%"><?=$reg[1]?></td>
        </tr>
		 <? while($reg5=pg_fetch_array($rs5)){?>
        <tr>
          <td><?=$reg5[1]?></td>
          <td width="4%"><input name="<?=$reg5[1]?>" type="radio" value="<?=$reg5[0]?>"></td>
          <td width="4%"><?=$reg5[0]?></td>
          <td width="80%"><?=$reg5[2]?></td>
          <td><input name="wilfredo" type="hidden" value="<?=$reg5[1]?>"><?=$reg5[1]?></td>
        </tr>
  <? }?>
      </table></td>
    </tr><? }?>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  
    <tr>
      <td colspan="3"><div align="center">
          <? 
  /*  if($pagina>1) 
    { 
       echo "<a class='p' href='".$_SERVER["PHP_SELF"]."?pagina=".($pagina-1)."&frase=".$_GET["frase"]."&orden=".$orden."&criterio=".$txt_criterio."'>"; 
       echo "<font face='verdana' size='-2'>anterior</font>"; 
       echo "</a> "; 
    } 
    for($i=$inicio;$i<=$final;$i++) 
    { 
       if($i==$pagina) 
       { 
          echo "<font face='verdana' size='-2'><b>".$i."</b> </font>"; 
       }else{ 
          echo "<a class='p' href='".$_SERVER["PHP_SELF"]."?pagina=".$i."&frase=".$_GET["frase"]."&orden=".$orden."'>"; 
          echo "<font face='verdana' size='-2'>".$i."</font></a> "; 
       } 
    } 
    if($pagina<$numPags) 
   { 
       echo " <a class='p' href='".$_SERVER["PHP_SELF"]."?pagina=".($pagina+1)."&frase=".$_GET["frase"]."&orden=".$orden."'>"; 
       echo "<font face='verdana' size='-2'>siguiente</font></a>"; 
   } 
//////////fin de la paginacion 
*/?>
      </div></td>
    </tr>
    
    <tr>
      <td colspan="3"><div align="center">
        <input type="submit" name="Submit" value=":: Finalizar Examen ::">
      </div></td>
    </tr>
  </table>
</form>
</body>
</html>
