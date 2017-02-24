<?php
session_cache_limiter('nocache,private');             
session_start();
include("Cvalidacion.php");
$val=new Cvalidacion();
$valor=$val->valida();
unset($val);
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>SisLice | 1.0.0 Sistema de Licencias de Conducir</title>
  <link href="estilos/intranet.css" rel="stylesheet" type="text/css">
  <script type="text/javascript" src="estilos/botonderecho.js"> </script>
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
    alert("Debe Ingresar C�digo de Seguridad");
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
      <td valign="middle"><table width="385" height="281" border="0" align="center">
        <tr>
          <td background="imag/cuenta11.gif"><form name="form1" method="post" enctype="application/x-www-form-urlencoded" onSubmit="return validar(this)" action="login.php">
            <table width="84%" border="0" align="center" cellpadding="0" cellspacing="8" >
              
             <tr>
              <td colspan="3" align="center" > <strong>..:: DATOS DE ACCES0 ::..</strong>
                
              </td>
            </tr>
            <tr>
              <td colspan="3" class="enc" align="center"></td>
            </tr>
            <?php 
            if ((isset($_GET["error"])) && ($_GET["error"]==1))
            {
              echo "<tr><td class=\"error\" colspan=\"2\" align=\"center\">Acceso denegado!</td></tr>";
            }
            ?>
            <tr>
              <td width="50%" class="enc"><?php $_SESSION["valor"]=$valor; ?>
                Ingrese Usuario : </td>
                <td colspan="2" class="contf"><input name="login" type="text" class="caja" size="20" /></td>
              </tr>
              <tr>
                <td class="enc">Ingrese Clave : </td>
                <td colspan="2" class="contf"><input name="clave" type="password" class="caja" size="20" /></td>
              </tr>
            <!--  <tr>
                <td class="enc">Codigo de Seguridad:</td>
                <td colspan="2" class="contf"><img src="verify.png" width="100" height="22" /></td>
              </tr>
              <tr>
                <td valign="top" class="enc">Ingrese C&oacute;digo de Seguridad:</td>
                <td colspan="2" class="contf"><input name="imagen" type="text" class="caja" size="20" />
                    <br />
                  [Se diferencias may&uacute;sculas de min&uacute;sculas]</td>
                </tr>-->
                
                <tr>
                  <td colspan="3" class="enc"><div align="center">
                    <?php if(isset($_GET["error"]))
                    {
                      if($_GET["error"] == "V")
                       echo "<TABLE  width=100%><TR><TD align=center><Font size=1 color=red>[ Usuario o Clave Incorrecta ]</Font></TD></TR></TABLE>";
                     elseif($_GET["error"] == "U")
                       echo "<TABLE  width=100%><TR><TD align=center><Font size=1 color=red>[ Usuario No Existe o NO TIENE PERMISO PARA ACCEDER DESDE ESTE EQUIPO]</Font></TD></TR></TABLE>";
                     elseif($_GET["error"] == "N")
                       echo "<TABLE width=100%><TR><TD align=center><Font size=1 color=red>[ Ingrese Los Datos Solicitados ]</Font></TD></TR></TABLE>";
                     else
                       echo "<TABLE width=100%><TR><TD align=center><Font size=1 color=red>[ Su Usuario esta INHABILITADO consulte con el Administrador ]</Font></TD></TR></TABLE>";
                   }
                   ?>
                 </div></td>
               </tr>
               <tr>
                <td class="enc">
                  <div align="right">
                    <input name="reset2" type="reset"  class="btn" value="Restablecer" />
                  </div></td>
                  <td width="7%" class="enc"><div align="center"></div></td>
                  <td width="43%" class="enc">
                    <div align="left">
                      <input name="submit" type="submit" class="btn" value="Ingresar" />
                    </div></td>
                  </tr>
                  <tr>
                    <td colspan="3" class="enc"><div align="center"></div></td>
                  </tr>
                </table>
              </form></td>
            </tr>
          </table></td>
        </tr>
      </table>
    </body>
    </html>
