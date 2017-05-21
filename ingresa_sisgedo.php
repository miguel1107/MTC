<?php 
  session_start();
  if(!isset($_SESSION["usuario"])) header("location:index.php");

  include ("traducefecha.php");
  //include("comun/function.php");
  include ("conectar.php");
  $link=Conectarse();
  $cant=count($_POST["chk"]);
  if($cant > 0){
    foreach($_POST["chk"] as $k =>$v){
      $numtra=$v;
    }
  }
  $sql="SELECT sisgedo FROM tramite WHERE idtramite='".$numtra."'";
  $rs=pg_query($link,$sql);
  $data=pg_fetch_array($rs);
  $sisg=$data[0];
  if ($sisg!='') {
    $accion='mostrar';
  }else{
    $accion='insertar';
  }
?>
<html>
<head>
  <title></title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <link rel="stylesheet" type="text/css" media="screen" href="estilos/tabscreen.css">
  <link rel="stylesheet" type="text/css" media="all" href="estilos/menumx.css">
  <link rel="stylesheet" type="text/css" media="print" href="estilos/tabprint.css">
  <link rel="stylesheet" type="text/css" media="all" href="estilos/estilos.css">
  <script type="text/javascript" src="estilos/libjsgen.js"> </script>
  <script type="text/javascript" src="estilos/popcalendar.js"> </script>
  <script type="text/javascript" src="estilos/script.js"></script>
  <script src="js/jquery-2.0.3.min.js"></script>
  <script src="js/jquery-ui-1.10.3.custom.min.js"> </script>
  <script src="js/jquery-ui.js"> </script>
  <script src="js/listatramite.js"></script>
  <style type="text/css">
    <!--
    .Estilo2 {color: #336699}
    .Estilo3 {
      font-size: 130%;
      font-weight: bold;
    }
    .Estilo9 {font-size: 10px; }
    .Estilo11 {
      font-size: 18px;
      font-family: "Times New Roman", Times, serif;
    }
    .Estilo12 {
      font-size: 16px;
      font-weight: bold;
    }
    .Estilo26 {font-size: 36px;
      font-weight: bold;
      color: #999999;
      font-style: italic;
    }
    #Layer2 {position:absolute;
      left:164px;
      top:440px;
      width:640px;
      height:70px;
      z-index:1;
    }
    -->
  </style>
</head>
<body>
  <table align="center" bgcolor="#336699" border="0" cellpadding="0" cellspacing="0" width="100%">
    <tbody>
      <tr>
        <td height="36">
          <table border="0" cellpadding="0" cellspacing="0" width="52%">
            <tbody>
              <tr>
                <td class="tabsline" width="20"><img src="imag/tabinion2.gif" border="0" height="36" width="29"></td>
                <td width="119" align="center" background="imag/div3.gif" ><nobr><b><a href="buscar_postulante.php"><b><span class="G">BUSCAR POSTULANTE</span></b></a></b></nobr></td>
                <td class="tabson" width="52"><img src="imag/div222.gif" alt="" border="0" height="36" width="29"></td>
                <td width="119" align="center" background="imag/div3.gif" ><span ><nobr><b><a href="nuevo_postulante.php"><b>&nbsp;<span class="G">NUEVO TRAMITE</span></b></a></b></nobr></span></td>
                <td class="tabson" width="52"><img src="imag/div222.gif" alt="" border="0" height="36" width="29"></td>
                <td width="119" align="center" background="imag/div3.gif" ><nobr><b><a href="listado_postulante.php"><b><span class="G">DATOS DEL POSTULANTE</span></b></a></b></nobr></td>
                <td class="tabson" width="52"><img src="imag/div22.gif" alt="" border="0" height="36" width="29"></td>
                <td width="175" background="imag/div1.gif" ><nobr><b><a href="listado_tramite.php"><b><span class="G Estilo2">LISTADO DE TRAMITE</span></b></a></b></nobr> </td>
                <td class="tabsline" width="175"><span class="tabson"><img src="imag/div2.gif" alt="" border="0" height="36" width="29"></span></td>
                <td  background="imag/div3.gif" ><nobr><b><a href="list_soli.php"><b><span class="G">LISTADO DE SOLICITUDES</span></b></a></b></nobr> </td>
                <td class="tabsline" ><span class="tabson"><img src="imag/div222.gif" alt="" border="0" height="36" width="29"></span></td>
                <td width="175" background="imag/div3.gif" ><nobr><b><a href="listado_tramites_anulados.php"><b><span class="G">TRAMITES ANULADOS</span></b></a></b></nobr></td>
                <td class="tabsline" width="175"><span class="tabson"><img src="imag/div4.gif" alt="" border="0" height="36" width="29"></span></td>
                <td class="tabsline" width="175"></td>
              </tr>
            </tbody>
          </table>
        </td>
      </tr>
    </tbody>
  </table>
  <table width="100%" height="93%" border="0" cellpadding="0" cellspacing="10" bgcolor="#CFE5EE">
  <tbody>
    <tr>
      <td height="165" valign="top"><table width="100%" border="0" align="center">
        <tr>
          <td width="727" height="245">
          <!-- <form name="form1" method="post" action="listado_postulante.php"> -->
            <table class="frmline" align="center" border="0" cellpadding="0" cellspacing="0" width="80%">
              <tbody>
                <tr>
                  <td colspan="7"><table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
                    <tbody>
                      <tr>
                        <td colspan="3" width="100%"><table border="0" cellpadding="3" cellspacing="0" width="100%">
                          <tbody>
                            <tr>
                              <th align="left" bgcolor="#6600ff" width="20%"> </th>
                              <th height="26" width="50%"> <span class="G">SISGEDO</span></th>
                              <th align="right" width="25%"> </th>
                            </tr>
                          </tbody>
                        </table></td>
                      </tr>
                    </tbody>
                  </table></td>
                </tr>
                <tr>
                  <td colspan="5"><table border="0" cellpadding="0" cellspacing="0">
                    <tbody>
                      <tr>
                        <td background="main.php15_files/titulo1.jpg" height="10" width="10">&nbsp;</td>
                        <td class="marco seccion" align="left" width="90%">&nbsp;NÚMERO DE SISGEDO </td>
                        <td align="right" background="main.php15_files/titulo3.jpg" height="20">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                      </tr>
                    </tbody>
                  </table></td>
                </tr>
                <tr valign="middle">
                  <td class="marco" width="1%">&nbsp;</td>
                  <td class="etiqueta" align="right" width="22%">Número de tramite&nbsp;&nbsp;</td>
                  <td class="objeto" width="1%">&nbsp;</td>
                  <td class="objeto" width="78%"><input name="numtramite" size="40" class="cajatexto" id="numtramite" maxlength="60" onKeyPress="return formato(event,form,this,80)" type="text" value="<?php echo $numtra; ?>" readonly ></td>
                  <td class="objeto" width="1%">&nbsp;</td>
                </tr>
                <tr valign="middle">
                  <td class="marco" width="1%">&nbsp;</td>
                  <td class="etiqueta" align="right" width="22%">Número de SISGEDO &nbsp;&nbsp;</td>
                  <td class="objeto" width="1%">&nbsp;</td>
                  <td class="objeto" width="78%"><input name="numsisgedo" size="10" class="cajatexto" id="numsisgedo" maxlength="10" onKeyPress="return buscarpostulante(event,this,10)" type="text" value="<?php echo $sisg; ?>"  <?php if ($sisg!='') {echo 'disabled';}?>></td>
                  <td class="objeto" width="1%">&nbsp;</td>
                </tr>                
                <tr>
                  <td colspan="7" height="30"><table border="0" cellpadding="3" cellspacing="1" width="100%">
                    <tbody>
                      <tr>
                        <td class="spaceRow" colspan="7" height="1"></td>
                      </tr>
                      <tr align="center">
                        <td class="catBottom" colspan="7" height="28"><table border="0" cellpadding="0" cellspacing="0" width="100%">
                          <tbody>
                            <tr>
                              <td align="left" width="100%"><input name="_action" value="" type="hidden">
                                <input name="_setfocus" value="" type="hidden">
                                <input class="boton" name="btn_Buscar" value=".:: Ver Solicitud ::." type="submit" onclick="verSolicitud('<?php echo $accion; ?>')">
                              </td>
                                <td width="50%"></td>
                                <td align="right" width="25%"></td>
                              </tr>
                            </tbody>
                          </table></td>
                        </tr>
                      </tbody>
                    </table></td>
                  </tr>
                </tbody>
              </table>
            <!-- </form> -->
          </td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
      </table></td>
    </tr>
  </tbody></table>
</body>
</html>