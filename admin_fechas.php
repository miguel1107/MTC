<?php
session_start();
if(!isset($_SESSION["usuario"])) header("location:index.php");

include ("traducefecha.php");
include("comun/function.php");
include ("conectar.php");
$link=Conectarse();
if($_SESSION["cargo"]!='1' && $_SESSION["cargo"]!='6') header("location:denegado.php");

  if($_GET["sw"]==2){
    $cant=count($_POST["chk"]);
    if($cant > 0){
      foreach($_POST["chk"] as $k =>$v){
        $sql="SELECT * FROM fechasbloqueadas WHERE id='".$v."'";
        $rs=pg_query($link,$sql);
        $fila =pg_fetch_object($rs);
        $id= $fila->id;
        $fe= $fila->fecha;
      }
    }
  }
?>
<html><head><title></title>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" media="screen" href="estilos/tabscreen.css">
<link rel="stylesheet" type="text/css" media="all" href="estilos/menumx.css">
<link rel="stylesheet" type="text/css" media="print" href="estilos/tabprint.css">
<link rel="stylesheet" type="text/css" media="all" href="estilos/estilos.css">

  <link href="estilos/networkbar.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" type="text/css" media="all" href="estilos/jquery-ui.css">

 <script language="JavaScript" src="estilos/networkbar.js"></script>
  <script type="text/javascript" src="estilos/popcalendar.js"> </script>
<script type="text/javascript" src="estilos/popcalendar.js"> </script>
<script type="text/javascript" src="estilos/libjsgen.js"> </script>
<script type="text/javascript" src="estilos/script.js"></script>
<script src="js/jquery-2.0.3.min.js"></script>
  <script src="js/jquery-ui-1.10.3.custom.min.js"> </script>
  <script src="js/jquery-ui.js"> </script>
<script src="js/fechasblo.js"></script>
<style type="text/css">
  .Estilo2 {color: #336699}
</style>
</head>
<body class="os2hop">

	<table align="center" bgcolor="#336699" border="0" cellpadding="0" cellspacing="0" width="100%">
    <tbody>
      <tr>
        <td>
          <table border="0" cellpadding="0" cellspacing="0" width="22%">
            <tbody>
              <tr>
                <td class="tabs">
				          <table border="0" cellpadding="0" cellspacing="0" width="20%">
				            <tbody> 
                      <tr>
                        <td class="tabsline" width="20"><img src="imag/admin_tabinion2.gif" border="0" height="36" width="29"></td>
                         <td width="119" align="center" background="imag/admin_div3.gif" ><nobr><b><b><a href="admin_bususuario.php"><b><span class="G">Usuarios</span></b></a><a href="admin_usuario.php"></a></b></b></nobr></td>
                         <td class="tabson" ><img src="imag/admin_div222.gif" alt="" border="0" height="36" width="29"></td>
                         <td width="175"  align="center" background="imag/admin_div3.gif" > <a href="admin_busexamen.php"><span class="G"><strong>Examenes</strong></span></a></td>
                           <td class="tabsline" width="175"><span class="tabson"><img src="imag/admin_div222.gif" alt="" border="0" height="36" width="29"></span></td>
                         <td width="119" align="center" background="imag/admin_div3.gif" ><nobr><b><a href="admin_busevaluador.php"><b><span class="G"> Evaluadores</span></b></a></b></nobr></td>
                           <td class="tabson" ><img src="imag/admin_div222.gif" alt="" border="0" height="36" width="29"></td>
                           <td  background="imag/admin_div3.gif" ><nobr><b><b><a href="admin_buscargo.php"><b><span class="G">Cargos</span></b></a><span class="G"><a href="admin_cargo.php"></a> </span></b></b></nobr> </td>
                           <td class="tabsline" ><span class="tabson"><img src="imag/admin_div222.gif" alt="" border="0" height="36" width="29"></span></td>
                           <td width="175" background="imag/admin_div3.gif" ><a href="admin_buscentro.php"><span class="G"><strong>Centros  </strong></span></a></td>
                           <td width="175" background="imag/admin_div3.gif" ><span class="tabson"><img src="imag/admin_div222.gif" alt="" border="0" height="36" width="29"></span></td>
                           
                          <td width="175"  align="center" background="imag/admin_div3.gif" > <a href="curso_especial/admin_buscursoespecial.php"><span class="G"><strong>Curso    A IV </strong></span></a></td>
                           <td width="175" background="imag/admin_div3.gif" ><span class="tabson"><img src="imag/admin_div222.gif" alt="" border="0" height="36" width="29"></span></td> 
                           <td width="175" background="imag/admin_div3.gif" ><a href="admin_busmonitoreo.php"><b><span class="G"><strong>Monitoreo</strong></span></a></td>
                           <td width="175" background="imag/admin_div3.gif" ><span class="tabson"><img src="imag/admin_div222.gif" alt="" border="0" height="36" width="29"></span></td> 
                           <td width="175"  align="center" background="imag/admin_div3.gif" > <a href="admin_busmonitoreoeval.php"><span class="G"><strong>Evaluacion Monitoreo</strong></span></a></td>
                           <td class="tabsline" width="175"><span class="tabson"><img src="imag/admin_div222.gif" alt="" border="0" height="36" width="29"></span></td>
                           <td width="175"  align="center" background="imag/admin_div3.gif" > <a href="cambia_plazo.php"><span class="G"><strong>Plazo a Programar</strong></span></a></td>
                           <td class="tabsline" width="175"><span class="tabson"><img src="imag/admin_div222.gif" alt="" border="0" height="36" width="29"></span></td>
                           <td width="175"  align="center" background="imag/admin_div3.gif" > <a href="cambia_cupo.php"><span class="G"><strong>Cambia Cupo</strong></span></a></td>
                           <td class="tabsline" width="175"><span class="tabson"><img src="imag/admin_div222.gif" alt="" border="0" height="36" width="29"></span></td>
                           <td width="175"  align="center" background="imag/admin_div3.gif" > <a href="cambia_cupo_manejo.php"><span class="G"><strong>Cupos Manejo</strong></span></a></td>
                           <td class="tabsline" width="175"><span class="tabson"><img src="imag/admin_div22.gif" alt="" border="0" height="36" width="29"></span></td>
                           <td width="175"  align="center" background="imag/admin_div1.gif" > <a href="bloqueo_fecha.php"><span class="G Estilo2"><strong>Bloqueo Fecha</strong></span></a></td>
                           <td class="tabsline" width="175"><span class="tabson"><img src="imag/admin_div2.gif" alt="" border="0" height="36" width="29"></span></td>
                      </tr> 	
        		        </tbody>
                  </table>
                </td>
              </tr>
            </tbody>
          </table>
        </td>
      </tr>
    </tbody>
  </table>
  <table width="101%" height="93%" border="0" cellpadding="0" cellspacing="10" bgcolor="#CFE5EE">
    <tbody>
      <tr>
        <td height="165" valign="top">
          <table width="100%" border="0" align="center">
            <tr>
              <td width="70%" height="172">
                <!-- <form name="form1" method="get" action="edita_plazo.php" onSubmit="return true"> -->
                  <table class="frmline" align="center" border="0" cellpadding="0" cellspacing="0" width="80%">
                    <tbody>
                      <tr>
                        <td colspan="7">
                          <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
                            <tbody>
                              <tr>
                                <td colspan="3" width="100%">
                                  <table border="0" cellpadding="3" cellspacing="0" width="100%">
                                    <tbody>
                                      <tr>
                                        <th align="left" bgcolor="#6600ff" width="20%"> </th>
                                        <th height="26" width="50%"> <span class="G">Nueva Fecha</span></th>
                                        <th align="right" width="25%"> </th>
                                      </tr>
                                    </tbody>
                                  </table>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </td>
                      </tr>
                      <tr>
                        <td colspan="5">
                          <table border="0" cellpadding="0" cellspacing="0">
                            <tbody>
                              <tr>
                                <td background="main.php15_files/titulo1.jpg" height="10" width="10">&nbsp;</td>
                                <td class="marco seccion" align="left" width="90%">&nbsp;Nuevo </td>
                                <td align="right" background="main.php15_files/titulo3.jpg" height="20">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                              </tr>
                            </tbody>
                          </table>
                        </td>
                      </tr>
                      <tr valign="middle">
                        <td class="marco" width="1%">&nbsp;</td>
                        <td class="etiqueta" align="right" width="22%">Fecha&nbsp;&nbsp;</td>
                        <td class="objeto" width="1%">&nbsp;</td>
                        <td class="objeto" width="78%"><input name="fecha" class="cajatexto" id="fecha"  size="15" maxlength="10" type="datepicker" value="<?php if ($fe=='') {echo '';}else{echo ereg_replace('-','/',normal($fe));} ?>" readonly><input type="hidden" name="idfe" id="idfe" value="<?php echo $id; ?>"></td>
                        <td class="objeto" width="1%">&nbsp;</td>
                      </tr>
                      <tr>
                        <td colspan="7" height="30">
                          <table border="0" cellpadding="3" cellspacing="1" width="100%">
                            <tbody>
                              <tr>
                                <td class="spaceRow" colspan="7" height="1">
                                  <img src="main.php15_files/spacer.htm" alt="" height="1" width="1">
                                </td>
                              </tr>
                              <tr align="center">
                                <td class="catBottom" colspan="7" height="28">
                                  <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                    <tbody>
                                      <tr>
                                        <td align="left" width="100%">
                                          <?php
                                            if ($_GET["sw"]==2) {
                                          ?>
                                            <input class="boton" name="btn_Buscar" value=".:: Modificar ::." type="submit" onclick="modificafecha()">
                                          <?php
                                            }else{
                                          ?>
                                            <input class="boton" name="btn_Buscar" value=".:: Registrar ::." type="submit" onclick="registrafecha()">
                                          <?php
                                            }
                                          ?>
                                          
                                        </td>
                                        <td width="50%"></td>
                                        <td align="right" width="25%"></td>
                                      </tr>
                                    </tbody>
                                  </table>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                <!-- </form> -->
              </td>
            </tr>
          </table>
        </td>
      </tr>
    </tbody>
  </table>
</body></html>