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


</style>
<title>:: WEBMASTER - DRTC ::</title><meta http-equiv="Content-Type" content="text/html; charset=utf-8"><style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}

</style></head>
<body>
<?php
if ($_GET["frase3"]!=''){
$_pagi_sql = "select t.idtramite, p.nombres, p.apepat, p.apemat , t.fecha_inscripcion, c.nombre ,t.fechaini, t.tipotramite,t.nrosolicitud,p.dni,p.fecnac,t.usuario from postulante p INNER JOIN tramite t on p.idpostulante=t.idpostulante INNER JOIN categoria c on t.idcategoria=c.idcategoria where t.estado<>'55' and t.nrosolicitud=".$_GET["frase3"]." and  t.nrosolicitud<>0 and t.tipotramite <> 'NUEVO' and t.tipotramite <> 'RECATEGORIZACION' and t.tipotramite <> 'CANJE RECATEGORIZACION' and t.tipotramite <> 'REVALIDACION' and t.tipotramite <> 'CANJE REVALIDACION'  order by t.fecha_inscripcion DESC, t.nrosolicitud DESC";
}else{
$_pagi_sql = "select t.idtramite, p.nombres, p.apepat, p.apemat , t.fecha_inscripcion, c.nombre ,t.fechaini, t.tipotramite,t.nrosolicitud,p.dni,p.fecnac,t.usuario from postulante p INNER JOIN tramite t on p.idpostulante=t.idpostulante INNER JOIN categoria c on t.idcategoria=c.idcategoria where t.estado<>'55' and p.nombres like '".$_GET["frase"]."%' and p.apepat like '".$_GET["frase12"]."%' and p.apemat like '".$_GET["frase122"]."%' and dni like '".$_GET["frase2"]."%' and  t.nrosolicitud<>0 and t.tipotramite <> 'NUEVO' and t.tipotramite <> 'RECATEGORIZACION' and t.tipotramite <> 'CANJE RECATEGORIZACION' and t.tipotramite <> 'REVALIDACION' and t.tipotramite <> 'CANJE REVALIDACION'  order by t.fecha_inscripcion DESC, t.nrosolicitud DESC";

}
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
                      <font face='verdana' size='-2'>&nbsp;&nbsp; <?php echo $_pagi_navegacion;?></font>
                    </div>
                  </td>
                  <td width="50%">
                    <strong>
                      <font face='verdana' size='-2'>
                        <?php echo $_pagi_result2?> 
                        Registros
                      </font>
                    </strong>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
          
          <tr bgcolor="#ebf3fb">
            <th width="32">-</th>

            <th width="68"><span class="Estilo4"><font size="1" face="Verdana, Arial, Helvetica, sans-serif"> <nobr>N&ordm; SOLICITUD </nobr></font></span></th>
            <th width="154" bgcolor="#ebf3fb"><div align="center" class="Estilo4"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">NOMBRES</font></div></th>

            <th width="196" height="23" bgcolor="#ebf3fb"><font size="1" class="Estilo4" face="Verdana, Arial, Helvetica, sans-serif">APELLIDOS </font></th>
            <th width="89"><span class="Estilo4"><font size="1" face="Verdana, Arial, Helvetica, sans-serif"><nobr>FEC. NACIMIENTO</nobr> </font></span></th>
            <th width="89"><font size="1" class="Estilo4" face="Verdana, Arial, Helvetica, sans-serif">DNI </font></th>
            <th width="89"><font size="1" class="Estilo4" face="Verdana, Arial, Helvetica, sans-serif">FECHA </font></th>
            <th width="139"><span class="Estilo4"><font size="1" face="Verdana, Arial, Helvetica, sans-serif"><nobr>TIPO DE TRAMITE</nobr></font></span></th>

            <TH width="71"><span class="Estilo4"><font size="1" face="Verdana, Arial, Helvetica, sans-serif"><nobr>CATEGORIA</nobr></font></span></TH>
            <TH width="71"><span class="Estilo4"><font size="1" face="Verdana, Arial, Helvetica, sans-serif"><nobr>GENERADO </nobr></font></span></TH>
          </tr>

          <?php  
          while($reg=pg_fetch_array($_pagi_result)) { ?>

          <tr bgcolor="#FFFFFF" onMouseOver="pintar(this,'#D6DEEC')" onMouseOut="pintar(this,'#FFffff')">
            <td height="22" align="center"><font color="#FFFFFF" size="1" face="Verdana, Arial, Helvetica, sans-serif">
              <input type="checkbox" border="0" value="<?=$reg[0]?>" name="chk[]" onClick="uncheck(frmList,this)">
            </font></td>

            <td align="center"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">
              <?php echo $reg[8]?>
            </font></td>
            <td>

              <div align="left"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">
  
              <nobr>  <?php echo $reg[1]?></nobr>
  
            </font></div></td>

            <td><div align="left"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">
               <nobr> <?php echo $reg[2]?> <?=$reg[3]?></nobr>
            </font></div></td>
            <td><div align="center"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">
              <?php echo normal($reg[10])?>
            </font></div></td>
            <td><div align="center"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">
              <?php echo $reg[9]?>
            </font></div></td>
            <td><div align="center"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">
             <nobr> <?php echo normal($reg[4])?></nobr>
            </font></div></td>
            <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">
              <?php 
                $echotra;
                $tra=$reg[7];
                $long=strlen($tra);
                if ($long==1) {
                  $sql="SELECT * FROM tipo_tramite WHERE id_tipo='".$tra."'";
                  $rs=pg_query($con,$sql);
                  $fila =pg_fetch_array($rs);
                  echo $echotra=$fila[1];
                }else if($long>1){
                  echo $reg[7];
                }
                
              ?>
            </font></td>

            <td><div align="center"><font size="1" face="Verdana, Arial, Helvetica, sans-serif"><a href="editardep.php?cod=<?=$reg[0]?>&dir=<?=$reg[8]?>" class="Estilo5"></a> </font><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"> <nobr>
              <?php echo $reg[5]?>
            </nobr> </font></div></td>
            <td><div align="center"><font size="1" face="Verdana, Arial, Helvetica, sans-serif"><a href="editardep.php?cod=<?=$reg[0]?>&dir=<?=$reg[8]?>" class="Estilo5"></a> </font><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"> <nobr>
              <?php echo $reg[11]?>&nbsp;
            </nobr> </font></div></td>
          </tr>

          <?php } ?>
        </table>
        <table width="100%"  border="0"   align="center" cellpadding="0" cellspacing="0">

          <TR bgcolor="#FFFFFF">
            <td width="189" height="20" bgcolor="#EBF3FB">   
              <div align="left" class="ord">
                <font face='verdana' size='-2'>&nbsp;&nbsp; <?php echo $_pagi_navegacion;?></font>
              </div>
            </Td>
            <td width="189" height="20" bgcolor="#EBF3FB"><strong><font face='verdana' size='-2'>
              <?php echo $_pagi_result2?> 
              Registros
            </font></strong></Td>
          </TR>
        </table>

    </form>    </td>
  </tr>
</table>
<!--

-->
</body>
</html>