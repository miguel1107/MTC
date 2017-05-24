<?php
session_start();
if(!isset($_SESSION["xxx"])) header("location:admin_reportes.php");
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
.Estilo2 {color: #336699}
-->
</style>
</head>
<body>

	<table align="center" bgcolor="#336699" border="0" cellpadding="0" cellspacing="0" width="100%">
 <tbody><tr>
   <td height="36" bgcolor="#FFFFFF"><table border="0" cellpadding="0" cellspacing="0" width="78%">
     <tbody>
       <tr>
         <td class="tabs"><table border="0" cellpadding="0" cellspacing="0" width="18%">
           <tbody>
             <tr>
               <td class="tabsline" width="29"><img src="imag/admin_tabinion.gif" border="0" height="36" width="29"></td>
               <td width="70" align="center" background="imag/admin_div1.gif" ><nobr><b><b>Reportes</b></b></nobr></td>
               <td width="58" class="tabson" ><img src="imag/admin_div44.gif" alt="" border="0" height="36" width="29"></td>
               <td width="80" align="center" ><nobr><b><b><span class="G"></span></b></b></nobr><b><a href="admin_examen.php"></a></b></td>
               <td width="6" class="tabson" >&nbsp;</td>
               <td width="80" align="center" ><nobr><b><a href="admin_busevaluador.php"></a></b></nobr></td>
               <td width="4" class="tabson" >&nbsp;</td>
               <td width="1"  background="imag/admin_div3.gif" ><nobr><b><b><a href="admin_cargo.php"></a><span class="G"><a href="admin_listcar.php"></a> </span></b></b></nobr> </td>
               <td width="4" class="tabsline" >&nbsp;</td>
               <td class="tabsline" width="123"></td>
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
        <td width="972" height="461">&nbsp;</td>
      </tr>
      
    </table></td>
  </tr>
</tbody></table>

</body></html>