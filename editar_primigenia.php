<?php
session_start();
if(!isset($_SESSION["usuario"])) header("location:index.php");

include ("traducefecha.php");
include("comun/function.php");
include ("conectar.php");
$link=Conectarse();
?>
<html><head><title></title>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" media="screen" href="estilos/tabscreen.css">
<link rel="stylesheet" type="text/css" media="all" href="estilos/menumx.css">
<link rel="stylesheet" type="text/css" media="print" href="estilos/tabprint.css">
<link rel="stylesheet" type="text/css" media="all" href="estilos/estilos.css">
<script type="text/javascript" src="estilos/libjsgen.js"> </script>
<script type="text/javascript" src="estilos/popcalendar.js"> </script>
<script type="text/javascript" src="estilos/script.js"></script>

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

	<table align="center" bgcolor="#336699" border="0" cellpadding="0" cellspacing="0" width="100%">
 <tbody><tr><td height="36"><table border="0" cellpadding="0" cellspacing="0" width="78%">
   <tbody>
     <tr>
       <td class="tabs"><table border="0" cellpadding="0" cellspacing="0" width="48%">
         <tbody>
           <tr>
             <td class="tabsline" width="20"><img src="imag/tabinion2.gif" border="0" height="36" width="29"></td>
             <td width="119" align="center" background="imag/div3.gif" ><span class=" G"><nobr><b><b><a href="asig_primigenia.php">Buscar DNI</a> </b></b></nobr></span></td>
             <td class="tabsline" width="20"><img src="imag/div22.gif" width="29" height="36"></td>
             <td width="119" align="center" background="imag/div1.gif" ><span class="Estilo6" ><nobr><b><b>Asignar Primigenia</b></b></nobr></span></td>
             <td class="tabson" width="52"><span class="tabsline"><img src="imag/div44.gif" width="29" height="36"></span></td>
             <td class="tabsline" width="175"></td>
             <td width="175" >&nbsp;</td>
             <td class="tabsline" width="175">&nbsp;</td>
           </tr>
         </tbody>
       </table></td>
     </tr>
   </tbody>
 </table></td>
 </tr>
</tbody></table>

<table width="100%" height="93%" border="0" cellpadding="0" cellspacing="10" bgcolor="#CFE5EE">
<tbody>
  <tr>
    <td height="465" valign="top"><table width="100%" height="100%" border="0" align="center">
      <tr>
        <td width="972" height="461"><table width="100%" height="80%" border="0" cellpadding="0" cellspacing="8" bgcolor="#B1D6E5">
          <tbody>
            <tr>
              <td height="443" valign="top"><form name="form1" method="post" action="update_primigenia.php">
                <table class="frmline" align="center" border="0" cellpadding="0" cellspacing="0" width="90%">
                  <tbody>
                    <tr>
                      <td colspan="5"><table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
                          <tbody>
                            <tr>
                              <td colspan="3" width="100%"><table border="0" cellpadding="3" cellspacing="0" width="100%">
                                  <tbody>
                                    <tr>
                                      <th align="left" bgcolor="#6600ff" width="20%"> </th>
                                      <th height="26" width="50%"> <span class="G">EDITAR PRIMIGENIA</span></th>
                                      <th align="right" width="25%"> </th>
                                    </tr>
                                  </tbody>
                              </table></td>
                            </tr>
                          </tbody>
                      </table></td>
                    </tr>
                    
                    <tr valign="middle">
                      <td colspan="3"><table width="658" border="0" align="center" cellpadding="0" cellspacing="0">
                          <tr>
                            <td>&nbsp;</td>
                          </tr>
                                                  <tr>
                            <td><div align="center"><strong> EDITAR PRIMIGENIA</strong></div></td>
                          </tr>
                        
                          
                          <tr>
                            <td>&nbsp;</td>
                          </tr>
                      </table></td>
                    </tr>
                    <tr valign="middle">
                      <td height="9" colspan="3"><table width="94%" border="1" align="center" cellpadding="1" cellspacing="1">
                          <?php
					//INNER JOIN usuario_licencia u ON p.idpostulante=u.idpostulante  u.primigenia
					//	  $cant=count($_POST["chk"]);
 		$sql2="SELECT p.nombres,p.apepat,p.apemat,c.nombre,t.idtramite,t.idtramite,p.idpostulante   FROM postulante p INNER JOIN tramite t ON p.idpostulante=t.idpostulante INNER JOIN categoria c ON t.idcategoria=c.idcategoria where p.idpostulante='".$_GET["cod"]."' "; //e.idexamen='".$_GET["categoria"]."' and e.fecha='".$_GET["xxxfecha"]."' ";
		$rs2=pg_query($link,$sql2);
		$reg=pg_fetch_array($rs2)
		
		?>
                          <tr>
                            <td width="32%"><div align="center"><strong>APELLIDOS Y NOMBRES </strong></div></td>
                            <td width="21%"><div align="center"><strong>CATEG.</strong></div></td>
                            <td width="12%"><div align="center"><strong>TRAMITE</strong></div></td>
                            <td width="24%"><div align="center"><strong>N&ordm; PRIMIGENIA </strong></div></td>
                          </tr>
                    
                          <tr bgcolor="#FFFFFF" onMouseOver="javascript:this.style.backgroundColor='#FFCC99';" onMouseOut="javascript:this.style.backgroundColor='#FFFFFF';">
                            <td><?=$reg[1]?>
                                <?=$reg[2]?>
                                <?=$reg[0]?>
                                <input name="codigo<?=$i?>" type="hidden"  value="<?=$reg[6]?>">
                                <input type="hidden" name="idtramite" value="<?=$reg[4]?>"></td>
                            <td><div align="center">
                                <?=$reg[3]?>
                            </div></td>
                            <td><div align="center">
                                <?=$reg[4]?>
                            </div></td>
  <td><div align="center">
   
    <input type="hidden" name="idlicencia" value="<?=$_GET["id"]?>">
	<input type="hidden" name="fechaexamen" value="<?=$_GET["fecha"]?>">
    <input name="primi" type="text" id="primi" value="<?=$_GET["pri"]?>" size="15" maxlength="20">
   
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
                                        <input class="boton" name="btn_Grabar" value="::: Grabar Resultados  :::" type="submit">
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
                            </form>
              </td>
            </tr>
          </tbody>
        </table></td>
      </tr>
      
    </table></td>
  </tr>
</tbody></table>
</body></html>