<?php
session_start();
//if(!isset($_SESSION["usuario"])) header("location:../index.php");
include ("../conectar.php");
$link=Conectarse();
?>
<html>
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin t&iacute;tulo</title>
<link href="../estilos/intranet.css" rel="stylesheet" type="text/css">
<script language="JavaScript">
	
var isnn;
var isie;
var message = "";

if(navigator.appName=='Microsoft Internet Explorer') //check the browser
{  isie=true }

if(navigator.appName=='Netscape')
{  isnn=true }

function clickIE()
{	if (document.all)
	{	(message); 
		return false; 
	} 
} 

function clickNS(e)
{	if (document.layers || (document.getElementById && !document.all))
	{	if (e.which == 2 || e.which == 3)
		{	(message); 
			return false; 
		} 
	} 
} 

if (document.layers)
{	document.captureEvents(Event.MOUSEDOWN); 
	document.onmousedown = clickNS; 
	
} 
else 
{	document.onmouseup = clickNS; 
	document.oncontextmenu = clickIE; 
} 
// Control del SHIFT del teclado
document.oncontextmenu = new Function("return false")

function mouseDown(e) {
 var shiftPressed=0;
 if (parseInt(navigator.appVersion)>3) {
  if (navigator.appName=="Netscape")
       shiftPressed=(e.modifiers-0>3);
  else shiftPressed=event.shiftKey;
  if (shiftPressed) {
   alert ('Tecla deshabilitada.');
   return false;
  }
 }
 return true;
}


if (parseInt(navigator.appVersion)>3) {
 document.onmousedown = mouseDown;
 if (navigator.appName=="Netscape") 
  document.captureEvents(Event.MOUSEDOWN);
}


function escBackSpace() 
 { //alert("PASO");
    if(event.keyCode == 8)
       {
          if  (document.activeElement.getAttribute("type") != "text")
           {
             //event.keyCode = 0;
             event.returnValue=false;
           }
        }    
 }

if (parseInt(navigator.appVersion)>3) {
//Control de CTRL  +  N 
 document.onkeydown = myFunc;
}

function myFunc(){ 

//78 N - Nuevo
//85 U - Nuevo
//70 F - Buscar
//72 H - Historial
//73 I - Favoritos

escBackSpace();

if(event.keyCode == 85 || 
  // event.keyCode == 78 || 
   event.keyCode == 116 || 
   event.keyCode == 72 ||
   event.keyCode == 73 ){ 
if(event.ctrlKey){ 
event.returnValue = false;
event.keyCode = 0;
}
}
}
                                       
function MakeArray(n) 
{	this.length = n; 
    for (var i = 1; i <= n; i++) 
    {	this[i] = 0		}
    return this 
}

//**********************************************************************
// Protege oxultando la URL de los links que se van a visitar
//**********************************************************************
document.onmouseover = function ( e ) 
{   
	if ( !e ) 
		e = window.event;   
	var el = e.target ? e.target : e.srcElement;   
	while ( el != null && el.tagName != "A" ) 
		el = el.parentNode;   
	if ( el == null ) 
		return;   
	if ( e.preventDefault ) 
		e.preventDefault();   
	else 
		e.returnValue = true;
};

</script>
<script language="javascript">
<!--
var CronoID = null;
var CronoEjecutandose = false;
var decimas;//, segundos, minutos , hora

function DetenerCrono (){
  if(CronoEjecutandose)
  clearTimeout(CronoID);
  CronoEjecutandose = false;
}

function InicializarCrono () {
//inicializa contadores globales
decimas = 9;//0
segundos = 59;//0
minutos = 59;//59//0
hora = 1;//1//0
//pone a cero los marcadores
document.crono.display.value = '02:00:00';
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
 if ( <?=$_SESSION["hora"];?> == 0 && <?=$_SESSION["minuto"];?> == 0 && <?=$_SESSION["segundo"];?> == 0) {
 	document.crono.display.value = "00:00:00";
	alert('Fin de la cuenta');
	DetenerCrono();
	return true;
	}
	
  decimas--;
if ( 0 > decimas ) {
	decimas = 9;
	segundos--;
	alert(segundos);
	<? $_SESSION["segundo"]?> = segundos ; 
	alert(<?=$_SESSION["segundo"];?>);
	if ( 0 > <?=$_SESSION["segundo"];?> ) {
		<? $_SESSION["segundo"]=59; ?>
		<? $_SESSION["minuto"]=($_SESSION["minuto"]-1); ?>;
		alert(<?=$_SESSION["minuto"];?>);
		if ( 0 > <?=$_SESSION["minuto"];?> ) {
			<? $_SESSION["minuto"]=59; ?>
			<? $_SESSION["hora"]=($_SESSION["hora"]-1); ?>;
			alert(<?=$_SESSION["hora"];?>);
			if ( <?=$_SESSION["hora"];?> == 0 && <?=$_SESSION["minuto"];?> == 0 && <?=$_SESSION["segundo"];?> == 0) {
				alert('Fin de la cuenta');
				DetenerCrono();
				return true;
			}
		}
	}
}
//configura la salida
var ValorCrono = ""
ValorCrono = (<?=$_SESSION["hora"];?> < 10) ? "0" + <?=$_SESSION["hora"];?> : <?=$_SESSION["hora"];?>;
ValorCrono += (<?=$_SESSION["minuto"];?> < 10) ? ":0" + <?=$_SESSION["minuto"];?> : ":" + <?=$_SESSION["minuto"];?>;
ValorCrono += (<?=$_SESSION["segundo"];?> < 10) ? ":0" + <?=$_SESSION["segundo"];?> : ":" + <?=$_SESSION["segundo"];?>;
//ValorCrono += ":" + decimas 

  document.crono.display.value = ValorCrono;

  CronoID = setTimeout("MostrarCrono()", 100);
CronoEjecutandose = true;
return true;
}

function IniciarCrono () {
DetenerCrono();
InicializarCrono();
MostrarCrono();
}

function ObtenerParcial() {
//obtiene cuenta parcial
document.crono.parcial.value = document.crono.display.value;
}
-->
</script>
</head>

<body onLoad="IniciarCrono()">
<form name="crono">
<div align="center"><center>
<p><input type="text" size="8" name="display" value="00:00:00" style="font-size:large"></p>
</center></div>
</form>

<form  name="form1" method="post" action="insertexamen.php" >
  <table width="100%" border="0" align="center" cellspacing="10">
    <?php
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
    $tamPag=15; 
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
 <?
 
 foreach($_SESSION["preguntas"] as $valor)
		 {
		$ssql="select * from preguntas where idpregunta='".$valor."'  order by idpregunta ASC";// LIMIT ".$tamPag." OFFSET ".$limitInf;
				//}
				$rs=pg_query($link,$ssql) or die ("error : $ssql"); 
				 ?>
    <?php $i++; while($reg=pg_fetch_array($rs)) { 
	$preguntas[]=$reg[0];
   $ssql5="select * from alternativas where idpregunta=".$reg[0]." order by idalternativa ASC ";
	$rs5=pg_query($link,$ssql5) or die ("error : $ssql"); 
  
   ?>
      
    <tr>
      <td colspan="3"><table width="100%" border="0" bgcolor="#B1D6E5">
        <tr>
          <td width="8%"><?=$i?>-<?=$reg[0]?>.-            </td>
          <td colspan="3"><?=$reg[2]?><input type="hidden" name="chk[]" value="<?=$reg[0]?>"> ---<?=$reg[3]?>
         </td>
          <td width="4%"><?=$reg[1]?></td>
        </tr>
		 <? while($reg5=pg_fetch_array($rs5)){?>
        <tr>
          <td></td>
          <td width="4%"><input name="<?=$reg5[1]?>" type="radio" value="<?=$reg5[0]?>"></td>
          <td width="4%"><?=$reg5[0]?></td>
          <td width="80%"><?=$reg5[2]?></td>
          <td><input name="wilfredo" type="hidden" value="<?=$reg5[1]?>">            <?=$reg5[1]?></td>
        </tr>
  <? }?>
      </table></td>
    </tr><? }}?>
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
<pre>
<?
//var_dump($prega1);
?>
</pre>

<pre>
<?
//var_dump($num);
//var_dump($num);

?>
</pre>
<pre>
<?
//var_dump($num1);
?>
</pre>
</body>
</html>
