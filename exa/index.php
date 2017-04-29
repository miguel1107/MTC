<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SisLico | 1.0.0 Sistema de Licencias de Conducir</title>
<link href="../estilos/intranet.css" rel="stylesheet" type="text/css">

<script LANGUAGE="JavaScript">

function pantallaCompleta(pagina) {
window.open(pagina, '', 'fullscreen=yes, scrollbars=auto');
}

</script>
<style type="text/css">
<!--
body {
	background-color: #C7E1EC;
}
a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
}
a:hover {
	text-decoration: none;
}
a:active {
	text-decoration: none;
}
.Estilo2 {font-size: 12px; }
-->
</style></head>
<script language="JavaScript" type="text/JavaScript">
<!---
function cerrar(){ 
var capa=document.getElementById("pantalla"); 
   capa.style.display="none"; 
   capa.style.visibility="hidden"; 
} 
//-->
</script>
<script language="JavaScript">
<!--

function pageStart() {
	document.body.scroll = "no";
	var width  = 700;
	var height = 480;
	var so = navigator.platform;

  if (window.screen && window.screen.availHeight) {
    height = window.screen.availHeight - 58; // 58
    width = window.screen.availWidth - 4;
  }

	var jan = window.open('http://siga.regionlambayeque.gob.pe/mysiga/content/index.php', 'wndDiretoV3', 'width=' + width + ', height=' + height + ', toolbar=no, copyhistory=no, location=no, status=yes, menubar=no, scrollbars=no, resizable=yes, top=0, left=0', 1);
	if (so.substring(0,5) != "Linux") {
		width  = screen.availWidth;
		height = screen.availHeight;
		jan.window.resizeTo(width, height);
		jan.focus();
		
	}
}


function AbreVentana(sURL){
  var w=640, h=480;

  if (window.screen && window.screen.availHeight) {
    h = window.screen.availHeight - 58; // 58
    w = window.screen.availWidth - 4;
  }

  var ventana=window.open(sURL, "Licencias", "status=yes,resizable=yes,toolbar=no,scrollbars=yes,top=0,left=0,width=" + w + ",height=" + h, 1 );
  ventana.focus();
}
function AbreVentana2(sURL){
  var w=640, h=480;

  if (window.screen && window.screen.availHeight) {
    h = window.screen.availHeight - 58; // 58
    w = window.screen.availWidth - 4;
  }

  var ventana=window.open(sURL, "Examenes", "status=yes,resizable=yes,toolbar=no,scrollbars=yes,top=0,left=0,width=" + w + ",height=" + h, 1 );
  ventana.focus();
}
-->
</script>
<script language="JavaScript">
<!--
function validar(form)
{
	if (form.login.value=="")
	 {
	 alert("Debe ingresar Login");
	 form.login.focus();
	 return false;
	 }
	 if (form.clave.value=="")
	 {
	 alert("Debe Ingresar clave");
	 form.clave.focus();
	 return false;
	 }
	 if (form.imagen.value=="")
	 {
	 alert("Debe Ingresar Código de Seguridad");
	 form.imagen.focus();
	 return false;
	 }
	return true;
}
//-->
</script> 

<body>
<table width="100%" height="100%" border="0">
  <tr>
    <td valign="middle"><table width="634" height="409" border="0" align="center">
      <tr>
        <td width="256" rowspan="3" valign="top"><BR>
            <img src="../imag/intra2.gif" width="244" height="173"></td>
        <td width="368" height="177">&nbsp;</td>
      </tr>
      <tr>
        <td height="186" background="../imag/open_index1.gif"><table width="76%" border="0" align="center" cellspacing="10">
            
            <tr>
              <td><div align="center"><a href="javascript:pantallaCompleta('principal.php');" class="Estilo2" >Examen de Licencias de Conducir </a></div></td>
            </tr>
        </table></td>
      </tr>
      <tr>
        <td height="38">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
</table>
<a href="javascript:AbreVentana('principal.html')"></a>
</body>
</html>
