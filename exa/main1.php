<?
session_start();
?>
<html><head>

<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>SisLice | 1.0.0 Sistema de Licencias de Conducir</title>
<style type="text/css">
<!--
#Layer1 {
	position:absolute;
	left:882px;
	top:58px;
	width:97px;
	height:21px;
	z-index:2;
}
#Layer2 {
	position:absolute;
	left:876px;
	top:57px;
	width:105px;
	height:24px;
	z-index:2;
}
-->
</style>
<link href="../estilos/estilos.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.Estilo2 {color: #FFFFFF}
.Estilo3 {color: #006699}
.Estilo1 {color: #355279}
-->
</style>
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


   //original author unknown
   //modified by, and displayed on www.a1javascripts.com
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
         alert('Operación no Autorizada - © Departamento de Licencias de Conducir')
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


</head>
<body onLoad="pantallaCompleta('exa/principal.php');">
<table border="0" cellpadding="0" cellspacing="0" width="100%">
  <tbody><tr> 
    <td></td>
  </tr>
  
  <tr> 
    <td  height="21"> <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tbody><tr> 
          <td width="13%" background="../imag/bg_banner.gif" height="106"><div align="left"><img src="../imag/banner_top1.png" width="70" height="75"></div></td>
          <td width="57%" background="../imag/bg_banner.gif"><div align="left"><img src="../imag/pdrtc1.gif" width="278" height="58"></div></td>
          <td width="30%" background="../imag/bg_banner.gif"><div align="right"><img src="../imag/lc.gif" width="302" height="70"></div></td>
        </tr>
      </tbody></table></td>
  </tr>
  <tr> 
    <td><img src="../downloads_files/transparent.gif" height="2" width="1"></td>
  </tr>
    <tr> 
    <td bgcolor="#000000"><img src="../downloads_files/transparent_002.gif" height="1" width="1"></td>
  </tr>
  
  <tr> 
    <td bgcolor="#003366" height="22">
      <table width="100%" height="21" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#FFFFFF" id="datos">
        <tbody>
          <tr>
            <td width="42%" height="18" align="left" valign="top">SisLice | 1.0.0 Sistema de Licencias de Conducir</td>
            <td align="center" valign="top" width="17%"><div align="center"><span class="acctitle"> <img src="../imag/icon_home.gif" width="15" height="15" border="0"><a href="ingreso.php" target="mainFrame"> WEB-Inicio  </a></span> </div></td>
            <td width="41%" align="right" bgcolor="#FFFFFF">EXAMEN DE REGLAS DE TRANSITO Y MANEJO [ 
			<?   
			if($_SESSION["idcategoria"]=='1'){echo "AI";}
			elseif($_SESSION["idcategoria"]=='2'){ echo "AII";}
			elseif($_SESSION["idcategoria"]=='3'){ echo "AIII";}
			elseif($_SESSION["idcategoria"]=='4'){ echo "REV. AI";}
			elseif($_SESSION["idcategoria"]=='5'){ echo "REV. AII";}
			elseif($_SESSION["idcategoria"]=='6'){ echo "REV. AIII";}
			else{echo "DRTC";} 
			/*switch ($_SESSION["idcategoria"]) {
     case '1': echo "AI";  break;
	 case '2': echo "AII";  break;
	 case '3': echo "AIII";  break;
	 case '4': echo "REV-AI";  break;
	 case '5': echo "REV-AII";  break;
	 case '6': echo "REV-AIII";  break;
 }
	*/		
			?>
              ]</td>
          </tr>
        </tbody>
      </table></td>
  </tr>
</tbody></table>

</body></html>