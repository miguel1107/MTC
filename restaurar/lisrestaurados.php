<?php
session_start();
if(!isset($_SESSION["usuario"])) header("location:index.php");
include ("../traducefecha.php");
include ("../conectar.php");
$con=Conectarse();
?>
<html>
<head>
<script  language="javascript" src="../estilos/script.js"></script>
<script language="javascript" src="../estilos/checkall.js"></script>
<link href="file:///C|/wamp/www/estilos/button.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.Estilo4 {color: #006666}
.Estilo5 {color: #FF9900}

-->

</style>
<link href="../estilos/barra.css" rel="stylesheet" type="text/css">
<title>:: WEBMASTER - GRTC ::</title><meta http-equiv="Content-Type" content="text/html; charset=utf-8"><style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
}
-->
</style></head>
<body>
<?php
//echo $_SESSION["usuario"];
$_pagi_sql = "select t.idtramite, p.nombres, p.apepat, p.apemat , t.fecha_inscripcion, c.nombre , p.dni,t.fechaini,t.fechafin ,cm.nombre,t.tipotramite,t.tipotramite,t.estado,t.nrosolicitud,t.usuario from postulante p INNER JOIN tramite t on p.idpostulante=t.idpostulante INNER JOIN categoria c on t.idcategoria=c.idcategoria INNER JOIN centro_medico cm ON t.idcentro=cm.idcentro where t.estado<>'1' and p.nombres like '%".$_GET["frase"]."%' and p.apepat like '%".$_GET["frase1"]."%' and p.apemat like '%".$_GET["frase2"]."%' and p.dni like '".$_GET["frase3"]."%' and CAST (t.idtramite  AS varchar(11)) like '".$_GET["frase4"]."%' and t.tipotramite <> 'DUPLICADO' and t.tipotramite <> 'REVALIDACION' order by t.fecha_inscripcion DESC,t.idtramite  DESC";

//echo $_pagi_sql;
//cantidad de resultados por p�gina (opcional, por defecto 20)
$_pagi_cuantos = 50;
$_pagi_nav_num_enlaces = 5;
include("../paginator.inc.php");
?>
<table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#99CCFF">
  <tr>

    <td colspan="2" bgcolor="#FFFFFF"><form  name="frmList" action="" method="post"  target="_parent"><table width="100%"  border="1" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC">

          <tr bgcolor="#ebf3fb">
            <th height="23" colspan="13"><table width="100%"  border="0"   align="center" cellpadding="0" cellspacing="0">
              <TR bgcolor="#FFFFFF">
                <td width="189" height="20" bgcolor="#EBF3FB"><div align="left" class="ord"> <font face='verdana' size='-2'>&nbsp;&nbsp; <? echo $_pagi_navegacion;?></font></div></Td>
                <td width="189" height="20" bgcolor="#EBF3FB"><strong><font face='verdana' size='-2'>
                  <?=$_pagi_result2?>
                  Registros </font></strong></Td>
              </TR>
            </table></th>
          </tr>
          <tr bgcolor="#ebf3fb">
            <th width="24" height="22"><!--<input  border="0" name="checkall" type="checkbox" onClick="checkform(frmList,this)">--></th>

            <th width="56"><div align="center" class="Estilo4"><font size="1" face="Verdana, Arial, Helvetica, sans-serif"><nobr>No TRAMITE</nobr></font></div></th>

            <th width="70" bgcolor="#ebf3fb"><div align="center" class="Estilo4"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">NOMBRES</font></div></th>

            <th width="113" bgcolor="#ebf3fb"><font size="1" class="Estilo4" face="Verdana, Arial, Helvetica, sans-serif">APELLIDOS</font></th>
            <th width="65"><font size="1" class="Estilo4" face="Verdana, Arial, Helvetica, sans-serif">FECHA </font></th>
            <th width="56"><div align="center" class="Estilo4"><font size="1" face="Verdana, Arial, Helvetica, sans-serif"><nobr>TIPO TRAMITE </nobr></font></div></th>
            <th width="72" class="Estilo4"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">CATEGORIA</font></th>
            <th width="46"><span class="Estilo4"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">DNI</font></span></th>

            <TH width="116"><font size="1" class="Estilo4" face="Verdana, Arial, Helvetica, sans-serif"><nobr>FECHA EXAMEN MEDICO</nobr></font></TH>
            <TH width="156"><font size="1" class="Estilo4" face="Verdana, Arial, Helvetica, sans-serif">CENTRO MEDICO</font></TH>
            <TH width="156"><font size="1" class="Estilo4" face="Verdana, Arial, Helvetica, sans-serif"><nobr>No SOLICITUD</nobr></font></TH>
            <TH width="156"><font size="1" class="Estilo4" face="Verdana, Arial, Helvetica, sans-serif">ESTADO</font></TH>
            <TH width="156"><font size="1" class="Estilo4" face="Verdana, Arial, Helvetica, sans-serif"><nobr>GENERADO </nobr></font></TH>
          </tr>

                  <?php  while($reg=pg_fetch_array($_pagi_result)) { ?>

		<?php if($reg[12]=='0' || $reg[12]=='2'){?>
          <tr bgcolor="#FFF794" onMouseOver="pintar(this,'#D6DEEC')" onMouseOut="pintar(this,'#FFF794')">
		   <?php }else{?>
		    <tr bgcolor="#FFFFFF"  onMouseOver="pintar(this,'#D6DEEC')" onMouseOut="pintar(this,'#FFffff')" >
		   <?php }?>
            <td align="center"><font color="#FFFFFF" size="1" face="Verdana, Arial, Helvetica, sans-serif">
              <input type="checkbox" border="0" value="<?=$reg[0]?>" name="chk[]" onClick="uncheck(frmList,this)">
            </font></td>

            <td height="22" align="center">

              <div align="center"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">

            <nobr>    <?=$reg[0]?></nobr>

            </font></div></td>

            <td>

              <div align="left"><nobr><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">
  
                <?=$reg[1]?>
  
            </font></nobr></div></td>

            <td><div align="left"><nobr><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">
                <?=$reg[2]?>  <?=$reg[3]?>
            </font></nobr></div></td>
            <td><div align="center"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">
            <nobr>  <?=normal($reg[4])?></nobr>
            </font></div></td>
            <td>

              <div align="left"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">
               <nobr> <?=$reg[11]?></nobr>
              </font></div></td>
            <td><div align="center"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">
            <nobr>  <?=$reg[5]?></nobr>
            </font></div></td>
            <td><div align="center"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">
            <nobr>  <?=$reg[6]?></nobr>
            </font></div></td>

            <td><div align="center"><nobr><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">
              <?=normal($reg[7])?>
   -
              <?=normal($reg[8])?>
            </font></nobr></div></td>
            <td><nobr>
              <div align="left"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">
                <?=$reg[9]?>
              </font></div>
            </nobr></td>
            <td><div align="center"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">
              <?=$reg[13]?>&nbsp;
            </font></div></td>
            <td><div align="center"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">
              <? if($reg[12]=='1'){echo "ACTIVO";}else{echo "FINALIZADO";}?>
            </font></div></td>
            <td><div align="center"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">
              <?=$reg[14];?>&nbsp;
            </font></div></td>
          </tr>

          <?php }?>
        </table>
        <table width="100%"  border="0"   align="center" cellpadding="0" cellspacing="0">

          <TR bgcolor="#FFFFFF">
            <TD width="100%" height="18" colspan="3" bgcolor="#EBF3FB"><table width="100%"  border="0"   align="center" cellpadding="0" cellspacing="0">
              <TR bgcolor="#FFFFFF">
                <td width="189" height="20" bgcolor="#EBF3FB"><div align="left" class="ord"> <font face='verdana' size='-2'>&nbsp;&nbsp; <? echo $_pagi_navegacion;?></font></div></Td>
                <td width="189" height="20" bgcolor="#EBF3FB"><strong><font face='verdana' size='-2'>
                  <?=$_pagi_result2?>
                  Registros </font></strong></Td>
              </TR>
            </table></TD>
          </TR>
        </table>

    </form>    </td>
  </tr>
</table>
</body>
</html>