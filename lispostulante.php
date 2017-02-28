<?php
session_start();
if(!isset($_SESSION["usuario"])) header("location:index.php");
include ("traducefecha.php");
include ("conectar.php");
$con=Conectarse();
?>
<html>
  <head>
        <script  language="javascript" src="estilos/script.js"></script>
        <script language="javascript" src="estilos/checkall.js"></script>
        <link href="../../estilos/button.css" rel="stylesheet" type="text/css">
        <style type="text/css">

        .Estilo3 {
	               color: #006699;
	               font-weight: bold;
        }
        .Estilo4 {color: #006666}
        .Estilo5 {color: #FF9900}

        </style>
              <title>:: WEBMASTER - DRTC ::</title><meta http-equiv="Content-Type" content="text/html; charset=utf-8"><style type="text/css">
              body {
	                 margin-left: 0px;
	                 margin-top: 0px;
	                 margin-right: 0px;
	                 margin-bottom: 0px;
              }
                </style>
    </head>
<body>
<?php
$_pagi_sql = "select * from postulante where  nombres like '".$_GET["frase"]."%' and apepat like '".$_GET["frase12"]."%' and apemat like '".$_GET["frase122"]."%' and dni like '".$_GET["frase2"]."%' and estado='1' order by idpostulante DESC ";
//cantidad de resultados por página (opcional, por defecto 20)
$_pagi_cuantos = 50;
$_pagi_nav_num_enlaces = 5;
include("paginator.inc.php");
?>
<table width="100%"  border="0" cellpadding="0" cellspacing="0" bordercolor="#99CCFF">
  <tr>

    <td  colspan="2" bgcolor="#FFFFFF"><form  name="frmList" action="" method="post"  target="_parent"><table width="100%"  border="1" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC">

          <tr bgcolor="#ebf3fb">
            <td height="23" colspan="8"><table width="100%"  border="0"   align="center" cellpadding="0" cellspacing="0">
              <TR bgcolor="#FFFFFF">
                <td width="189" height="20" bgcolor="#EBF3FB"><div align="left" class="ord"> <font face='verdana' size='-2'>&nbsp;&nbsp; <? echo $_pagi_navegacion;?></font></div></Td>
                <td width="189" height="20" bgcolor="#EBF3FB"><strong><font face='verdana' size='-2'>
                <td width="50%"><div align="left" class="ord">
                    <font face='verdana' size='-2'>&nbsp;&nbsp; <?php echo $_pagi_navegacion;?></font></div>          </td>
                <td width="50%"><strong><font face='verdana' size='-2'>
                  <?=$_pagi_result2?>
                  Registros </font></strong></Td>
              </TR>
            </table></td>
          </tr>
          <tr bgcolor="#ebf3fb">
            <th width="30"><!--<input  border="0" name="allbox" type="checkbox" onClick="CA()">-->-</th>

            <th width="63"><div align="center" class="Estilo4"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">CODIGO</font></div></th>

            <th width="143" bgcolor="#ebf3fb"><div align="center" class="Estilo4"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">NOMBRES</font></div></th>
            <th width="182" height="23" bgcolor="#ebf3fb"><font size="1" class="Estilo4" face="Verdana, Arial, Helvetica, sans-serif">APELLIDOS</font></th>
            <th width="57"><span class="Estilo4"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">DNI</font></span></th>
            <th width="83"><font size="1" class="Estilo4" face="Verdana, Arial, Helvetica, sans-serif"><nobr>FECHA NAC.</nobr></font></th>
            <th width="99"><div align="center" class="Estilo4"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">PROFESION</font></div></th>
            

            <TH width="102"><font size="1" class="Estilo4" face="Verdana, Arial, Helvetica, sans-serif">DIRECCION</font></TH>
          </tr>

		  <?php  while($reg=pg_fetch_array($_pagi_result)) { ?>

          <tr bgcolor="#FFFFFF" onMouseOver="pintar(this,'#D6DEEC')" onMouseOut="pintar(this,'#ffffff')">
            <td align="center">
              <font color="#FFFFFF" size="1" face="Verdana, Arial, Helvetica, sans-serif">
                <input type="checkbox" border="0" value="<?=$reg[0]?>" name="chk[]" onClick="uncheck(frmList,this)">
              </font>
            </td>
            <td height="22" align="center">
              <div align="center">
                <font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">
                  <nobr><?=$reg[0]?></nobr>
                </font>
              </div>
            </td>
            <td>
              <div align="left">
                <font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">
                  <nobr> <?php echo $reg[1]?></nobr>
                </font>
              </div>
            </td>
            <td>
              <div align="left">
                <font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">
                  <nobr> <?php echo $reg[2]?> <?php echo $reg[3]?></nobr>
                </font>
              </div>
            </td>
            <td><div align="center"><font size="1" face="Verdana, Arial, Helvetica, sans-serif"><a href="editardep.php?cod=<?=$reg[0]?>&dir=<?=$reg[8]?>" class="Estilo5"></a> </font><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">
              <nobr><?php echo $reg[8]?></nobr>
            </font></div></td>
            <td><div align="center"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">
             <nobr> <?=normal($reg[4])?></nobr>
            </font></div></td>
            <td><div align="left"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"> </font><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"> <nobr>
              <?php echo $reg[6]?>
            </nobr> </font></div></td>
            

            <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">
             <nobr> <?php echo $reg[14]?></nobr>
            </font></td>
          </tr>

          <?php } ?>
        </table>
        <table width="100%"  border="0"   align="center" cellpadding="0" cellspacing="0">

          <TR bgcolor="#FFFFFF">
            <TH width="100%" height="20" colspan="3" bgcolor="#EBF3FB"><div align="left">
              <table width="100%"  border="0"   align="center" cellpadding="0" cellspacing="0">
                <TR bgcolor="#FFFFFF">
                  <td width="189" height="20" bgcolor="#EBF3FB"><div align="left" class="ord"> <font face='verdana' size='-2'>&nbsp;&nbsp; <? echo $_pagi_navegacion;?></font></div></Td>
                  <td width="189" height="20" bgcolor="#EBF3FB"><strong><font face='verdana' size='-2'>
                    <?=$_pagi_result2?>
                    Registros </font></strong></Td>
                </TR>
              </table>
            </div>            </TH>
          </TR>
        </table>

    </form>    </td>
  </tr>
</table>
</body>
</html>