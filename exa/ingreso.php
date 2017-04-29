<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin t&iacute;tulo</title>
<script type="text/javascript" src="estilos/libjsgen.js"> </script>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	background-color: #C7E1EC;
}
-->
</style>

<script type="application/x-javascript">
function validar(formulario){
if (formulario.dato.value.length != 10)
{ alert("Debe introducir una contrase�a de 10 d�gitos")}
}
</script>
<script type="text/javascript" src="estilos/libjsgen.js"> </script>
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
<script language="JavaScript">
<!--
function solonumeros(e)
{
 var key;
 if(window.event) // IE
 {
  key = e.keyCode;
 }
  else if(e.which) // Netscape/Firefox/Opera
 {
  key = e.which;
 }
 if (key < 48 || key > 57)
    {
      return false;
    }
 return true;
}
function validar(form1)
{
	 if (form1.tramite.value=="")
	 {
	 alert("Debe ingresar el N�mero de su Tramite");
	 form1.tramite.focus();
	 return false;
	 }
	 return true;
}
//-->

</script> 

<link href="../estilos/intranet.css" rel="stylesheet" type="text/css">
</head>

<body  >
<!--oncontextmenu="return false" onkeydown="return false"     DESACTIVA TODO EL TECLADO-->
<table width="394" height="343" border="0" align="center">
  <tr>
    <td width="7" height="51">&nbsp;</td>
    <td width="377">&nbsp;</td>
  </tr>
  <tr>
    <td height="286">&nbsp;</td>
    <td background="../imag/cuentaexamen.gif"><form name="form1" method="post" action="loginexa.php" onSubmit="return validar(this)" >
      <table width="229" border="0" align="center">
        
        <tr>
          <td width="107">Ingresar N&ordm; Tramite: </td>
          <td width="112">
            <input name="tramite" type="text" class="caja"  onkeypress="javascript:return solonumeros(event)" id="tramite"  size="15" maxlength="9" />          </td>
        </tr>
        <tr>
          <td >&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td colspan="2"><div align="center">
              <input type="button" name="Submit" value=":: Cerrar ::" onClick="window.top.close()">
              &nbsp;&nbsp;&nbsp;&nbsp;
              <input name="reset2" type="submit"  class="btn" value=":: Ingresar ::" />
          </div></td>
        </tr>
        <tr>
          <td colspan="2"></td>
        </tr>
        
        <tr>
          <td colspan="2"></td>
        </tr>
        <tr>
          <td colspan="2"><div align="center">
            <?php if(isset($_GET["error"]))
		{
		if($_GET["error"] == "V")
			echo "<TABLE  width=100%><TR><TD align=center><Font size=2 color=red>[ No coincide con la Fecha de Programaci�n]</Font></TD></TR></TABLE>";
		elseif($_GET["error"] == "U")
			echo "<TABLE  width=100%><TR><TD align=center><Font size=2 color=red>[ Usuario No Existe ]</Font></TD></TR></TABLE>";
		elseif($_GET["error"] == "N")
			echo "<TABLE  width=100%><TR><TD align=center><Font size=2 color=red>[ N�mero de Tramite no Existe ]</Font></TD></TR></TABLE>";
			elseif($_GET["error"] == "WX")
			echo "<TABLE  width=100%><TR><TD align=center><Font size=2 color=red>[ Usted ya Rendio Su Examen Consulte con el Administrador ]</Font></TD></TR></TABLE>";
		}
		?>
          </div></td>
        </tr>
      </table>
        </form>
    </td>
  </tr>
</table>
</body>
</html>