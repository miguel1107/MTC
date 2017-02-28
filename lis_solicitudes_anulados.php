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
<!--
.Estilo4 {color: #006666}
.Estilo5 {color: #FF9900}

-->

</style>
<title>:: WEBMASTER - DRTC ::</title><meta http-equiv="Content-Type" content="text/html; charset=utf-8"><style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style></head>
<body>
<?php
//$con="host=localhost dbname=licencia port=5432 user=postgres password=postgres ";
//$conecta=pg_connect($con);
//Sentencia sql (sin limit)
$_pagi_sql = "select t.idtramite, p.nombres, p.apepat, p.apemat , t.fecha_inscripcion, c.nombre ,t.fechaini, t.tipotramite,t.nrosolicitud,p.dni,t.usuario from postulante p INNER JOIN tramite t on p.idpostulante=t.idpostulante INNER JOIN categoria c on t.idcategoria=c.idcategoria where t.estado='55' and  p.nombres like '".$_GET["frase"]."%' and p.apepat like '".$_GET["frase1"]."%' and p.apemat like '".$_GET["frase2"]."%' and dni like '".$_GET["frase3"]."%' and CAST(t.idtramite  AS varchar(11)) like '".$_GET["frase4"]."%' and t.nrosolicitud<>'0' order by t.fecha_inscripcion DESC, t.nrosolicitud DESC ";
//cantidad de resultados por página (opcional, por defecto 20)
$_pagi_cuantos = 50;
$_pagi_nav_num_enlaces = 5;
include("paginator.inc.php");
?>
<table width="100%"  border="0" cellpadding="0" cellspacing="0" bordercolor="#99CCFF">
  <tr>
    <td  colspan="2" bgcolor="#FFFFFF">
      <form  name="frmList" action="" method="post"  target="_parent">
        <table width="100%"  border="1" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC">

          <tr bgcolor="#ebf3fb">
            <td height="23" colspan="10">
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="50%">
                    <div align="left" class="ord">
                      <font face='verdana' size='-2'>&nbsp;&nbsp; <?php  echo $_pagi_navegacion;?></font>
                    </div>
                  </td>
                  <td width="50%">
                    <strong>
                      <font face='verdana' size='-2'>
                        <?=$_pagi_result2?>
                        Registros
                      </font>
                    </strong>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
          
          <tr bgcolor="#ebf3fb">
            <th width="32"><!--<input  border="0" name="allbox" type="checkbox" onClick="CA()">-->-</th>

            <th width="68"><span class="Estilo4"><font size="1" face="Verdana, Arial, Helvetica, sans-serif"><nobr>N&deg; TRAMITE</nobr></font></span></th>
            <th width="68"><span class="Estilo4"><font size="1" face="Verdana, Arial, Helvetica, sans-serif"> <nobr>N&ordm; SOLICITUD </nobr></font></span></th>
            <th width="154" bgcolor="#ebf3fb"><div align="center" class="Estilo4"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">NOMBRES</font></div></th>

            <th width="196" height="23" bgcolor="#ebf3fb"><font size="1" class="Estilo4" face="Verdana, Arial, Helvetica, sans-serif">APELLIDOS </font></th>
            <th width="89"><font size="1" class="Estilo4" face="Verdana, Arial, Helvetica, sans-serif">DNI </font></th>
            <th width="89"><font size="1" class="Estilo4" face="Verdana, Arial, Helvetica, sans-serif">FECHA </font></th>
            <th width="139"><span class="Estilo4"><font size="1" face="Verdana, Arial, Helvetica, sans-serif"><nobr>CATEGORIA</nobr></font></span></th>

            <TH width="71"><span class="Estilo4"><font size="1" face="Verdana, Arial, Helvetica, sans-serif"><nobr>TIPO DE TRAMITE</nobr></font></span></TH>
            <TH width="71"><span class="Estilo4"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">GENERADO</font></span></TH>
          </tr>

             <?php  while($reg=pg_fetch_array($_pagi_result)) { ?>

          <tr bgcolor="#FFFFFF" onMouseOver="pintar(this,'#D6DEEC')" onMouseOut="pintar(this,'#FFffff')">
            <td height="22" align="center"><font color="#FFFFFF" size="1" face="Verdana, Arial, Helvetica, sans-serif">
              <input type="checkbox" border="0" value="<?=$reg[0]?>" name="chk[]" onClick="checkform(frmList,this)">
            </font></td>

            <td align="center"><div align="center"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"> </font><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">
              <?=$reg[0]?>
            </font></div></td>
            <td align="center"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">
              <?=$reg[8]?>
            </font></td>
            <td>

              <div align="left"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">
  
              <nobr>  <?=$reg[1]?></nobr>
  
            </font></div></td>

            <td><div align="left"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">
               <nobr> <?=$reg[2]?> <?=$reg[3]?></nobr>
            </font></div></td>
            <td><div align="center"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"> <nobr>
              <?=$reg[9]?>
            </nobr> </font></div></td>
            <td><div align="center"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">
             <nobr> <?=normal($reg[4])?></nobr>
            </font></div></td>
            <td><div align="center"><font size="1" face="Verdana, Arial, Helvetica, sans-serif"><a href="editardep.php?cod=<?=$reg[0]?>&dir=<?=$reg[8]?>" class="Estilo5"></a> </font><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">
              <nobr><?=$reg[5]?></nobr>
            </font></div></td>

            <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">
              <?=$reg[7]?>
            </font></td>
            <td><div align="center"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">
            </font><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">
            <?=$reg[10]?>&nbsp;
            </font></div>              
              </td>
          </tr>

          <?php }?>
        </table>
        
        <table width="100%"  border="0"   align="center" cellpadding="0" cellspacing="0">
          <TR bgcolor="#FFFFFF">
            <td width="189" height="20" bgcolor="#EBF3FB">   
              <div align="left" class="ord">
                <font face='verdana' size='-2'>&nbsp;&nbsp; <?php echo $_pagi_navegacion;?></font>
              </div>
            </td>
            <td width="189" height="20" bgcolor="#EBF3FB">
              <strong>
                <font face='verdana' size='-2'>
                  <?php echo $_pagi_result2?> 
                  Registros 
                </font>
              </strong>
            </td>
          </TR>
        </table>


    </form>    </td>
  </tr>
</table>
</body>
</html>