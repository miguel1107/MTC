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

-->

</style>
<link href="estilos/barra.css" rel="stylesheet" type="text/css">
<title>:: WEBMASTER - GRTC ::</title><meta http-equiv="Content-Type" content="text/html; charset=utf-8"><style type="text/css">
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

if($_GET["fecha"]!=''){
				//$link=conectarse();	
				
			$_pagi_sql="select me.idtramite,p.nombres,p.apepat,p.apemat,me.fecha,t.idcategoria,me.idevaluacion,p.dni,e.opcion,e.resultado ,e.idexamen,t.tipotramite,me.fechapro,me.usuario, me.situacion, me.hora , e.ip_acceso from postulante p INNER JOIN tramite t ON p.idpostulante=t.idpostulante INNER JOIN evaluacion e ON t.idtramite=e.idtramite INNER JOIN monitoreo_eval me on me.idtramite = e.idtramite where e.fechapro = '".$_GET["fecha"]."' order by e.fechapro DESC ";			
										
}else
{
			$_pagi_sql="select me.idtramite,p.nombres,p.apepat,p.apemat,me.fecha,t.idcategoria,me.idevaluacion,p.dni,e.opcion,e.resultado ,e.idexamen,t.tipotramite,me.fechapro,me.usuario, me.situacion, me.hora , e.ip_acceso from postulante p INNER JOIN tramite t ON p.idpostulante=t.idpostulante INNER JOIN evaluacion e ON t.idtramite=e.idtramite inner join monitoreo_eval me on me.idtramite = e.idtramite order by e.fechapro DESC ";		
		
				}
		//		 $rs=pg_query($link,$ssql) or die ("error : $ssql");	

//$_pagi_sql = "";
//cantidad de resultados por p�gina (opcional, por defecto 20)

//echo $_pagi_sql;
$_pagi_cuantos = 50;
$_pagi_nav_num_enlaces = 5;
include("paginator.inc.php");
?>
<table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#99CCFF">
  <tr>
    <td width="100%" height="66" colspan="2" valign="top" bgcolor="#FFFFFF"><form  name="frmList" action="" method="post" target="_parent" ><table width="100%"  border="1" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC">

          <tr bgcolor="#ebf3fb"><?php /*?><?PHP echo $_pagi_sql ?><?php */?>
            <th width="30"><!--<input  border="0" name="allbox" type="checkbox" onClick="CA()">--></th>

            <th width="79"><div align="center" class="Estilo4"><font size="1" face="Verdana, Arial, Helvetica, sans-serif"><nobr>No TRAMITE</nobr></font></div></th>

            <th width="67" bgcolor="#ebf3fb"><div align="center" class="Estilo4"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">NOMBRES</font></div></th>

            <th width="84" bgcolor="#ebf3fb"><font size="1" class="Estilo4", face="Verdana, Arial, Helvetica, sans-serif">APELLIDOS</font></th>
            <th width="42"><font size="1" class="Estilo4", face="Verdana, Arial, Helvetica, sans-serif">DNI</font></th>
            <th width="79"><font size="1" class="Estilo4", face="Verdana, Arial, Helvetica, sans-serif">TIPO TRAMITE</font></th> 
            <th width="79"><font size="1" class="Estilo4", face="Verdana, Arial, Helvetica, sans-serif">CATEGORIA</font></th>
              <th width="60"><font size="1" class="Estilo4", face="Verdana, Arial, Helvetica, sans-serif">OPCION</font></th>
              
              <th width="122"><font size="1" class="Estilo4", face="Verdana, Arial, Helvetica, sans-serif"><nobr>FECHA DE EXAMEN</nobr></font></th>
            
           
          
        <!--    <th width="181" height="22"><font size="1" class="Estilo4", face="Verdana, Arial, Helvetica, sans-serif">RESULTADO</font></th>-->
            <th width="236"><font size="1" class="Estilo4", face="Verdana, Arial, Helvetica, sans-serif">TIPO DE EXAMEN</font></th>
            <th width="236"><font size="1" class="Estilo4", face="Verdana, Arial, Helvetica, sans-serif"><nobr>USUARIO PROGR.</nobr></font></th>
            <th width="236"><font size="1" class="Estilo4", face="Verdana, Arial, Helvetica, sans-serif"><nobr>FECHA PROGR.</nobr></font></th>
              <th width="236"><font size="1" class="Estilo4", face="Verdana, Arial, Helvetica, sans-serif"><nobr>HORA PROGR.</nobr></font></th>
            <th width="236"><font size="1" class="Estilo4", face="Verdana, Arial, Helvetica, sans-serif"><nobr>ACCION</nobr></font></th>
             <th width="236"><font size="1" class="Estilo4", face="Verdana, Arial, Helvetica, sans-serif"><nobr>IP EQUIPO</nobr></font></th>
          </tr>
 <? //  while($reg=pg_fetch_array($_pagi_result)) { ?>
          <?  while($reg=pg_fetch_array($_pagi_result)) {  ?>
		<? if($reg[9]!=''){?>
          <tr bgcolor="#FFF794" onMouseOver="pintar(this,'#D6DEEC')" onMouseOut="pintar(this,'#FFF794')">
		  <? }else{?>
		  <tr bgcolor="#FFFFFF" onMouseOver="pintar(this,'#D6DEEC')" onMouseOut="pintar(this,'#FFffff')">
		  <? }?>
            <td align="center"><font color="#FFFFFF" size="1" face="Verdana, Arial, Helvetica, sans-serif">
              <input type="checkbox" border="0" value="<?=$reg[6]?>" name="chk[]" onClick="checkform(frmList,this)">
            </font></td>

            <td height="22" align="center" >
              <div align="center"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><nobr>  <?=$reg[0]?></nobr>  </font></div></td>
            <td>

              <div align="left"><nobr><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">
                <?=$reg[1]?>
            </font></nobr></div></td>

            <td><div align="left"><nobr><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">
                <?=$reg[2]?> <?=$reg[3]?>
            </font></nobr></div></td>
            <td><div align="center"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">
            <nobr>  <?=$reg[7]?></nobr>
            </font></div></td> 
            <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><nobr>
              <div align="left">
                <?=$reg[11]?>
                </div>
            </nobr> </font></td>  
			<?  $sq35="Select nombre from categoria where idcategoria='".$reg[5]."' ";
				$rs35=pg_query($con,$sq35); // or die ("Error :$sq");
				while($reg35=pg_fetch_array($rs35)) { 
				$codigo=$reg35[0];
				}
$cat=$codigo;
?>
			<td><div align="center"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">
           <nobr> <?=$cat?></nobr>
            </font></div></td>
            
            <td><div align="center"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">
            <nobr>  <?=$reg[8]?></nobr>
            </font></div></td>
            <td><div align="center"><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">
             <nobr> <?=normal($reg[4])?></nobr>
            </font></div></td>
      
         <!--   <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">
             <nobr> <?=$reg[9]?></nobr>
            </font></td>-->
            <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><nobr>  
              <div align="left">
                <? //if($reg[10]=='1' || $reg[10]=='2'){echo "EXAMEN DE REGLAS";}elseif($reg[10]=='3'){echo "EXAMEN DE MECANICA";}else{echo "EXAMEN DE MANEJO";}
				// PARA SE MUESTRE EL TIPO DE EXAMEN
			$xxsq35="Select nombre from tipo_examen where idexamen='".$reg[10]."' ";
			$xxrs35=pg_query($con,$xxsq35); // or die ("Error :$sq");
			while($xxreg35=pg_fetch_array($xxrs35)) { 
			$xxcodigo=$xxreg35[0];
			}
			$xxcat=$xxcodigo;
			
			echo $xxcat;
			  ?>
              </div>
              </nobr>
              </font></td>
              
              <!-- ESTO ME MUESTRA EL USUARIO-->
		    <td><div align="center"><font  size="1" face="Verdana, Arial, Helvetica, sans-serif">
              <?=$reg[13]?>&nbsp;
            </font></div></td>
		    <td><div align="center"><font  size="1" face="Verdana, Arial, Helvetica, sans-serif">
		      <?=normal($reg[12])?>
	        </font></div></td>
             <td><div align="center"><font  size="1" face="Verdana, Arial, Helvetica, sans-serif">
		      <?=$reg[15]?>
	        </font></div></td>
            <td><div align="center"><font  size="1" face="Verdana, Arial, Helvetica, sans-serif">
		      <?=$reg[14]?>
	        </font></div></td>
             <td><div align="center"><font  size="1" face="Verdana, Arial, Helvetica, sans-serif">
		      <?=$reg[16]?>
	        </font></div></td>
	      </tr>

          <? }?>
        </table>
        <table width="100%"  border="0"   align="center" cellpadding="0" cellspacing="0">

          <TR bgcolor="#FFFFFF">
            <TD width="100%" height="20" colspan="3" bgcolor="#EBF3FB"><table width="100%"  border="0"   align="center" cellpadding="0" cellspacing="0">
              <TR bgcolor="#FFFFFF">
                <td width="50%" height="20" bgcolor="#EBF3FB"><div align="left" class="ord"> <font face='verdana' size='-2'>&nbsp;&nbsp; <? echo $_pagi_navegacion;?></font></div></Td>
                <td width="50%" height="20" bgcolor="#EBF3FB"><strong><font face='verdana' size='-2'>
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