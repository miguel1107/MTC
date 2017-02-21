<?php
session_start();
if(!isset($_SESSION["usuario"])) header("location:index.php");

include ("conectar.php");
$link=Conectarse();
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>CURSO DE PROFESIONALIZACIÓN</title>
<link rel="stylesheet" type="text/css" media="screen" href="estilos/tabscreen.css">
<link rel="stylesheet" type="text/css" media="all" href="estilos/menumx.css">
<link rel="stylesheet" type="text/css" media="print" href="estilos/tabprint.css">
<link rel="stylesheet" type="text/css" media="all" href="estilos/estilos.css">
<script language="JavaScript">
<!--
function validar(form1)
{
	if (form2.nomescuela.value=="")
	 {
	 alert("Debe seleccionar la escuela de conductores");
	 form2.nomescuela.focus();
	 return false;
	 }
	 if (form2.fecha_prog_cur.value=="")
	 {
	 alert("Debe ingresar fecha cuando rindió su curso de profesionalización");
	 form2.fecha_prog_cur.focus();
	 return false;
	 }

    if (fecha_prog_cur != undefined && form2.fecha_prog_cur.value != "" ){
              if (!/^\d{2}\/\d{2}\/\d{4}$/.test(fecha_prog_cur.value)){
                  alert("formato de fecha no válido (dd/mm/aaaa)");
  					form2.fecha_prog_cur.focus();
                  return false;
              }
              var dia  =  parseInt(fecha_prog_cur.value.substring(0,2),10);
              var mes  =  parseInt(fecha_prog_cur.value.substring(3,5),10);
              var anio =  parseInt(fecha_prog_cur.value.substring(6),10);
          switch(mes){
              case 1:
              case 3:
              case 5:
              case 7:
              case 8:
              case 10:
              case 12:
                  numDias=31;
                  break;
              case 4: case 6: case 9: case 11:
                  numDias=30;
                  break;
             case 2:
                if (comprobarSiBisisesto(anio)){ numDias=29 }else{ numDias=28};
                  break;
              default:
                  alert("Fecha introducida errónea");
				  form2.fecha_prog_cur.focus();
                  return false;
          }
              if (dia>numDias || dia==0){
                  alert("Fecha introducida errónea");
  				form2.fecha_prog_cur.focus();
                  return false;
              }
             // return true;
          }
      }
	  
    function comprobarSiBisisesto(anio){
     if ( ( anio % 100 != 0) && ((anio % 4 == 0) || (anio % 400 == 0))) {
          return true;
          }
     else {
         return false;
          }
		 return true;
	}
//-->
</script>
 
<script>
function cerrar(){
//alert(window.parent.document.form1.xxxdni.value);
window.parent.window.location.href = "prognuevo_reglas.php?idpos=<?=$_GET["idpostu"]?>";
}
</script>
<style type="text/css">
<!--
body {
	background-color: #CFE5EE;
}
-->
</style></head>
<body>
<?php if(!isset($_GET["confirmacion"])){ ?>
<form name="form2" method="post" action="insert_curpro.php" onSubmit="return validar(this)">
  <table width="100%" border="0">
    <tr>
      <td>&nbsp;</td>
      <td width="14%" nowrap>&nbsp;</td>
      <td><strong>CURSO DE PROFESIONALIZACI&Oacute;N</strong></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td nowrap>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td width="2%">&nbsp;</td>
      <td nowrap>Escuela de Conductores:</td>
      <td width="81%"><input name="nomescuela" class="cajatexto" id="nomescuela"  size="60" maxlength="100" type="text">
        <input type="hidden" name="idtrami" id="idtrami" value="<?=$_GET["idtrami"]?>">
      <input type="hidden" name="idcatego" id="idcatego" value="<?=$_GET["idcatego"]?>">
      <input type="hidden" name="idpostu" id="idpostu" value="<?=$_GET["idpostu"]?>"></td><td width="3%">&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>Fecha:</td>
      <td><input name="fecha_prog_cur" class="cajatexto" id="fecha_prog_cur"  size="15" maxlength="10" type="text">
      &nbsp;Ejm.(28/06/2010)</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>
        <div align="center">
          <input type="submit" name="Submit" value=":: Grabar ::">
          &nbsp;&nbsp;&nbsp;
          <input name="cerrar2" type="button" id="cerrar2" onClick="cerrar()" value=":: Cerrar ::">
          &nbsp;&nbsp;&nbsp; </div></td><td>&nbsp;</td>
    </tr>
  </table>
</form>
<? }else{ ?>
<table width="100%" border="0">
  <tr>
    <td width="2%">&nbsp;</td>
    <td width="24%">&nbsp;</td>
    <td width="71%">&nbsp;</td>
    <td width="3%">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><strong>SU CURSO DE PROFESIONALIZACI&Oacute;N SE REGISTRO CORRECTAMENTE...!</strong></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><div align="right">
      <input name="cerrar" type="button" id="cerrar" onClick="cerrar()" value=":: Cerrar ::">
    </div></td>
    <td>&nbsp;</td>
  </tr>
</table>
<? }?>
</body>
</html>