<?php
session_start();
if(!isset($_SESSION["usuario"])) header("location:index.php");
if(isset($_GET["wadf"]))echo "<script> window.opener.document.davila.submit(); window.close()</script>";

//include ("traducefecha.php");
//include("comun/function.php");
include ("conectar.php");
$link=Conectarse();
?>
<html><head><title>:: EDITAR OPCION POSTULANTE ::</title>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" media="screen" href="estilos/tabscreen.css">
<link rel="stylesheet" type="text/css" media="all" href="estilos/menumx.css">
<link rel="stylesheet" type="text/css" media="print" href="estilos/tabprint.css">
<link rel="stylesheet" type="text/css" media="all" href="estilos/estilos.css">
<script type="text/javascript" src="estilos/libjsgen.js"> </script>
<script type="text/javascript" src="estilos/popcalendar.js"> </script>
<script type="text/javascript" src="estilos/script.js"></script>
<script language="JavaScript">
<!--
function validar(form1)
{
	  var campo = form1.newopcion.value;
		if (campo.length!=1) {
			alert("Por Favor,Ingrese la Opción del Postulante.");
			form1.newopcion.focus();
			return (false);
		}
	 
	  return true;
}
//-->
</script>
<style type="text/css">
<!--
a:link {
	color: #FFFFFF;
}
a:visited {
	color: #FFFFFF;
}
.Estilo6 {color: #336699}
-->
</style>
</head>
<body>
<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="15" bgcolor="#B1D6E5">
  <tbody>
    <tr>
      <td  valign="top"><form name="form1" method="post" action="update_opcion.php" onSubmit="return validar(this)">
        <table class="frmline" align="center" border="0" cellpadding="0" cellspacing="0" width="70%">
          <tbody>
            <tr>
              <td colspan="5"><table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
                <tbody>
                  <tr>
                    <td colspan="3" width="100%"><table border="0" cellpadding="3" cellspacing="0" width="100%">
                      <tbody>
                        <tr>
                          <th align="left" bgcolor="#6600ff" width="20%"> </th>
                          <th height="26" width="50%"> <span class="G">EDITAR OPCION DEL POSTULANTE</span></th>
                          <th align="right" width="25%"> </th>
                        </tr>
                      </tbody>
                    </table></td>
                  </tr>
                </tbody>
              </table></td>
            </tr>
            <tr valign="middle">
              <td colspan="3"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td>&nbsp;</td>
                </tr>
              </table></td>
            </tr>
            <tr valign="middle">
              <td height="9" colspan="3"><table width="80%" border="1" align="center" cellpadding="1" cellspacing="1">
                <?php
$sql2="SELECT * FROM postulante p INNER JOIN tramite t ON p.idpostulante=t.idpostulante INNER JOIN categoria c ON t.idcategoria=c.idcategoria INNER JOIN evaluacion e ON e.idtramite=t.idtramite  order by p.idpostulante DESC "; 
		// echo $sql2;exit;
    $rs2=pg_query($link,$sql2);
		$reg=pg_fetch_array($rs2)
		
		?>
                <tr>
                  <td width="57%"><div align="center"><strong>APELLIDOS Y NOMBRES </strong></div></td>
                  <td width="12%"><div align="center"><strong>CATEG.</strong></div></td>
                  <td width="15%"><div align="center"><strong>OPCION</strong></div></td>
                  <td width="16%"><div align="center"><strong>OPCION</strong></div></td>
                </tr>
                <tr bgcolor="#FFFFFF" onMouseOver="javascript:this.style.backgroundColor='#FFCC99';" onMouseOut="javascript:this.style.backgroundColor='#FFFFFF';">
                  <td><?=$reg[2]?>
                          <?=$reg[3]?>
                          <?=$reg[1]?>
                          <input name="idttra"  type="hidden"  value="<?=$_GET["idttra"]?>"></td>
                  <td><div align="center">
                    <?=$reg[30]?>
                  </div></td>
                  <td><div align="center">
                    <?=$reg[35]?>
                  </div></td>
                  <td><div align="center">
                    <input type="hidden" name="idexamen" value="<?=$reg[40]?>">
                    <input type="hidden" name="idtramite" value="<?=$_GET["id"]?>">
                    <input type="hidden" name="fechaexamen" value="<?=$_GET["fecha"]?>">
                    <input name="newopcion" type="text" id="newopcion" size="5" maxlength="5">
                  </div></td>
                </tr>
              </table></td>
            </tr>
            <tr valign="middle">
              <td height="9" colspan="3">&nbsp;</td>
            </tr>
            <tr valign="middle">
              <td width="11%">&nbsp;</td>
              <td width="11%" align="right">&nbsp;</td>
              <td width="61%">&nbsp;</td>
            </tr>
            <tr>
              <td colspan="5" height="30"><table border="0" cellpadding="3" cellspacing="1" width="100%">
                <tbody>
                  <tr>
                    <td class="spaceRow" colspan="7" height="1"><img src="main.php7_files/spacer.htm" alt="" height="1" width="1"></td>
                  </tr>
                  <tr align="center">
                    <td class="catBottom" colspan="7" height="28"><table border="0" cellpadding="0" cellspacing="0" width="100%">
                      <tbody>
                        <tr>
                          <td align="left"><div align="center">
                            <input class="boton" name="btn_Grabar" value="::: Grabar Opci&oacute;n :::" type="submit">
                          </div></td>
                        </tr>
                      </tbody>
                    </table></td>
                  </tr>
                </tbody>
              </table></td>
            </tr>
          </tbody>
        </table>
      </form></td>
    </tr>
  </tbody>
</table>
</body></html>