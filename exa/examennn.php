<?php
session_start();
include ("../conectar.php");
$link=Conectarse();

?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin t&iacute;tulo</title>
<link href="../estilos/intranet.css" rel="stylesheet" type="text/css">

<script language="JavaScript">
function EnviarDatos() {
rpta=confirm("Esta seguro de Finalizar su Examen...!");
if (rpta==true){
		form1.submit();
}}
</script>
<script language="JavaScript">

var isnn,isie
if(navigator.appName=='Microsoft Internet Explorer') //check the browser
{  isie=true }

if(navigator.appName=='Netscape')
{  isnn=true }


<!--
function cierresesion()
{
   setInterval("window.close()",2500)
   return true;	
}

function PromocionesPopUp()
{
	if(typeof(campanhaPopUps)=='function') 
		campanhaPopUps(2,'00000000','45064600','0','');

}
//-->

   function openpagetxns()
   {
      window.open ("BNet_Operaciones_","openpagetxns","directories=0,copyhistory=0,width=450,height=430,location=0,menubar=0,resizable=0,scrollbars=1,status=0,titlebar=1,toolbar=0");
   }

      function changeScrollbarColor() 
   {
      if (document.all) {
      document.body.style.scrollbarBaseColor = '#666699';
      }
   }
   if (window.Event) 
   document.captureEvents(Event.MOUSEUP); 

   function nocontextmenu() 
   { 
   event.cancelBubble = true 
   event.returnValue = false; 
   return false; 
   } 

   function norightclick(e) 
   { 
     if (window.Event) 
     { 
       if (e.which == 2 || e.which == 3) 
       return false; 
     } 
     else 
       if (event.button == 2 || event.button == 3) 
       { 
         alert('Operaci�n no Autorizada - � Departamento de Licenias de Conducir')
         event.cancelBubble = true 
         event.returnValue = false; 
         return false; 
       } 
   }


   function key(k)   
   {
	
   }
   
   if (document.layers) 
   { 
       
     document.captureEvents(Event.MOUSEDOWN); 
           
   } 

   if (document.layers) window.captureEvents(Event.KEYPRESS);
   document.onkeydown=key;  
   document.onmousedown = norightclick; 
   document.onmouseup = norightclick;
   

function clear2(obj)
{
	if (obj) obj.value= '';
}

function numKeyPressed2(obj, id, ocontrol)
{
	n= getValue(obj, id);
	if (ocontrol && (ocontrol.value.length < 4) ) ocontrol.value += n;
}

function getValue(obj, id)
{  
   return eval( obj + '.numpressed(' +id+ ');' )
}

function show()
{
	this.reorder();
	this.writenumpad();
}

function numpressed(j)
{
	return this.C[j];
}

function reorder()
{
	tmp= new Array(this.BC);
    for (i=0; i<this.BC; i++) tmp[i]=i
	
	this.C= Array(this.BC); 
		
	for (i=this.BC-1; i>=0; i--)
	{
		index = Math.floor(Math.random() * i);
		this.C[i]= tmp[index]
		if ( index != i )
			tmp[index]= tmp[i];	
	}
}

function writenumpadbut(j)
{
	but_id= this.numpad_bprefix+j;
	s= '\<td width="25">\<font size= "1" class="enlace">\<a id="'+but_id+'" href="javascript:numKeyPressed(\''+this.name+'\','+j+')" style="text-decoration: none">'+ '&nbsp;&nbsp;' +this.C[j]+ '&nbsp;&nbsp;' +'\</a>\</font>\</td>'
	
	document.write(s)	
}

function writenumpadtr_in()
{
	document.write('\<tr height="20" align="center" BGCOLOR="#4682b4" >')
}

function writenumpadtr_out()
{
	document.write('\</tr>')                                           
}

function writenumpad()
{
	document.write('\<table width="75" BORDER="1" cellspacing="0" cellpadding="0" bordercolor="#D5D5D5">')
	
	for (i=0; i< this.BC; i++)
	{
		if (i%3==0) this.writenumpadtr_in()
		this.writenumpadbut(i)	
		if (i%3==2) this.writenumpadtr_out()
	}
	
	document.write('\<td class="tablacalc2" BGCOLOR="#4682b4" colspan="2">\<font size="1" class="enlace">\<a id="bclear" href="javascript:clear(\''+this.name+'\')" style="text-decoration: none">&nbsp;&nbsp;Limpiar&nbsp;&nbsp;\</a>\</font>\</td>')
	
	document.write('\</tr>\</table>')
}

function numpad(numpad_id)
{
	this.BC= 10;	
	
	this.reorder= reorder;
	this.show= show;
	this.numpressed= numpressed;
	
	this.writenumpad= writenumpad
	this.writenumpadbut= writenumpadbut
	this.writenumpadtr_in= writenumpadtr_in
	this.writenumpadtr_out= writenumpadtr_out
	
	if (numpad_id == '')
		alert('error: numpad_id empty')
	
	this.numpad_bprefix= numpad_id
	
	this.name= 'np_' + numpad_id
}
<!--
//Desabilita click derecho (sin alertas)
var message="";
function clickIE() {if (document.all) {(message);return false;}}
function clickNS(e) {if 
(document.layers||(document.getElementById&&!document.all)) {
if (e.which==2||e.which==3) {(message);return false;}}}
if (document.layers) 
{document.captureEvents(Event.MOUSEDOWN);document.onmousedown=clickNS;}
else{document.onmouseup=clickNS;document.oncontextmenu=clickIE;}

document.oncontextmenu=new Function("return false")
// --> 
</script>
<script language="JavaScript" src="security.js"></script>
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
minutos = 39//59//0
hora = 0//1//0
//pone a cero los marcadores
document.crono.display.value = '02:00:00'
//document.crono.parcial.value = '02:00:00'
}

function MostrarCrono () {
      
  //incrementa el crono
 if ( hora == 0 && minutos == 0 && segundos == 0) {
 	document.crono.display.value = "00:00:00";
	//alert('Su examen a Finalizado ...!');
	form1.submit();
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
<style type="text/css">
<!--
.Estilo4 {font-size: 12px}
-->
</style>
</head>
<body onLoad="IniciarCrono()">
<form name="crono">
<div align="center"><center>
<p><input type="text" size="8" name="display" value="00:00:00" style="font-size:large"></p>
</center></div>
</form>

<form  name="form1" method="post" action="insertexamen.php" onSubmit="return mensaje(this)"  >
  <table width="100%" border="0" align="center" cellspacing="10">
<?php
//$link=conectarse();
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
 

//exit();

 foreach($_SESSION["preguntas"] as $valor)
 {
	$ssql="select * from preguntas where idpregunta='".$valor."'  order by idpregunta ASC";
	$rs=pg_query($link,$ssql) or die ("error : $ssql"); 
	?>
    <? $i++; while($reg=pg_fetch_array($rs)) { 
	//$preguntas[]=$reg[0];
  
    $ssql5="select * from alternativas where idpregunta=".$reg[0]." order by idalternativa ASC ";
	$rs5=pg_query($link,$ssql5) or die ("error : $ssql"); 

  
   ?>
      
    <tr>
      <td colspan="3"><table width="100%" border="0" bgcolor="#B1D6E5">
        <tr>
          <td width="5%" valign="top"><?=$i?>.-</td>
          <td colspan="3"><div align="justify"><span class="Estilo4">
            <?=$reg[2]?>
            <input type="hidden" name="chk[]" value="<?=$reg[0]?>">
		     </span></div></td>
          <td width="4%">&nbsp;</td>
          </tr>
		 <?php if($reg[6]!=''){?> 
         <tr>
           <td></td>
           <td>&nbsp;</td>
           <td>&nbsp;</td>
           <td><img src="img/<?=$reg[6]?>"/></td>
           <td>&nbsp;</td>
          </tr>
		 <?php }?>
		 

		<?php while($reg5=pg_fetch_array($rs5)){?>
         <tr>
          <td></td>
          <td width="3%" valign="top"><input name="<?=$reg5[1]?>" type="radio" value="<?=$reg5[0]?>"></td>
          <td width="5%" valign="top"><span class="Estilo4">(<?=$reg5[0]?>)</span></td>
          <?php if ($reg5[2] != ''){?> 
          <td width="83%" valign="top"><span class="Estilo4"> <?=$reg5[2]?></span></td>
          <?php } else {?>
          <td width="83%" valign="top"><span class="Estilo4"> <img src="img/<?=$reg5[4]?>"/></span></td>
          <?php } ?>
          <td><input name="CSI" type="hidden" value="<?=$reg5[1]?>"></td>
          </tr>
       <?php }?>


      </table></td>
    </tr><? }}?>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  
    <tr>
      <td colspan="3"><div align="center">
        <input type="button" name="Submit"  value=":::::: Finalizar Examen ::::::" onClick="EnviarDatos()">
      </div></td>
    </tr>
    
    <tr>
      <td colspan="3">
	  <input type="hidden" name="idevaluacion" value="<?=$_GET["idevaluacion"]?>">
      <input type="hidden" name="fechago" value="<?=$_GET["fechago"]?>">
      <input type="hidden" name="idexamen" value="<?=$_GET["idexamen"]?>">
      <input type="hidden" name="idtramite" value="<?=$_GET["idtramite"]?>">
      <input type="hidden" name="codigopost" value="<?=$_GET["codigopost"]?>">
      <input type="hidden" name="idcategoria" value="<?=$_GET["idcategoria"]?>">
	  <input type="hidden" name="tipotramite" value="<?=$_GET["tipotramite"]?>">	  
      <input type="hidden" name="usukpost" value="<?=$_GET["usukpost"]?>">
	  </td>
    </tr>
  </table>
</form>
</body>
</html>