<?php
session_start();
?>
<html><head>
<script type="text/javascript" src="estilos/botonderecho.js"> </script>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<link rel="stylesheet" type="text/css" href="downloads_files/text.css"><title>SisLice | 1.0.0 Sistema de Licencias de Conducir</title>
<script language="JavaScript">
<!--
var gImages=new Array;
var gIndex=0;
var DCS=new Object();
var WT=new Object();
var DCSext=new Object();

var gDomain="statse.webtrendslive.com";
var gDcsId="dcso5lwmi11e5hqd5assnbb0w_3t8j";

function dcsVar(){
	var dCurrent=new Date();
	WT.tz=dCurrent.getTimezoneOffset()/60*-1;
	if (WT.tz==0){
		WT.tz="0";
	}
	WT.bh=dCurrent.getHours();
	WT.ul=navigator.appName=="Netscape"?navigator.language:navigator.userLanguage;
	if (typeof(screen)=="object"){
		WT.cd=navigator.appName=="Netscape"?screen.pixelDepth:screen.colorDepth;
		WT.sr=screen.width+"x"+screen.height;
	}
	if (typeof(navigator.javaEnabled())=="boolean"){
		WT.jo=navigator.javaEnabled()?"Yes":"No";
	}
	if (document.title){
		WT.ti=document.title;
	}
	WT.js="Yes";
	if (typeof(gVersion)!="undefined"){
		WT.jv=gVersion;
	}
	WT.sp="44878";
	DCS.dcsdat=dCurrent.getTime();
	DCS.dcssip=window.location.hostname;
	DCS.dcsuri=window.location.pathname;
	if (window.location.search){
		DCS.dcsqry=window.location.search;
	}
	if ((window.document.referrer!="")&&(window.document.referrer!="-")){
		if (!(navigator.appName=="Microsoft Internet Explorer"&&parseInt(navigator.appVersion)<4)){
			DCS.dcsref=window.document.referrer;
		}
	}
}

function A(N,V){
	return "&"+N+"="+dcsEscape(V);
}

function dcsEscape(S){
	if (typeof(RE)!="undefined"){
		var retStr = new String(S);
		for (R in RE){
			retStr = retStr.replace(RE[R],R);
		}
		return retStr;
	}
	else{
		return escape(S);
	}
}

function dcsCreateImage(dcsSrc){
	if (document.images){
		gImages[gIndex]=new Image;
		gImages[gIndex].src=dcsSrc;
		gIndex++;
	}
	else{
		document.write('<IMG BORDER="0" NAME="DCSIMG" WIDTH="1" HEIGHT="1" SRC="'+dcsSrc+'">');
	}
}

function dcsMeta(){
	var myDocumentElements;
	if (document.all){
		myDocumentElements=document.all.tags("meta");
	}
	else if (document.documentElement){
		myDocumentElements=document.getElementsByTagName("meta");
	}
	if (typeof(myDocumentElements)!="undefined"){
		for (var i=1;i<=myDocumentElements.length;i++){
			myMeta=myDocumentElements.item(i-1);
			if (myMeta.name){
				if (myMeta.name.indexOf('WT.')==0){
					WT[myMeta.name.substring(3)]=myMeta.content;
				}
				else if (myMeta.name.indexOf('DCSext.')==0){
					DCSext[myMeta.name.substring(7)]=myMeta.content;
				}
				else if (myMeta.name.indexOf('DCS.')==0){
					DCS[myMeta.name.substring(4)]=myMeta.content;
				}
			}
		}
	}
}

function dcsTag(){
	var P="http"+(window.location.protocol.indexOf('https:')==0?'s':'')+"://"+gDomain+(gDcsId==""?'':'/'+gDcsId)+"/dcs.gif?";
	for (N in DCS){
		if (DCS[N]) {
			P+=A(N,DCS[N]);
		}
	}
	for (N in WT){
		if (WT[N]) {
			P+=A("WT."+N,WT[N]);
		}
	}
	for (N in DCSext){
		if (DCSext[N]) {
			P+=A(N,DCSext[N]);
		}
	}
	if (P.length>2048&&navigator.userAgent.indexOf('MSIE')>=0){
		P=P.substring(0,2040)+"&WT.tu=1";
	}
	dcsCreateImage(P);
}

dcsVar();
dcsMeta();
dcsTag();
//-->
</script>
<!-- END OF Data Collection Server TAG -->
<style type="text/css">
<!--
#Layer1 {
	position:absolute;
	left:882px;
	top:58px;
	width:97px;
	height:21px;
	z-index:2;
}
#Layer2 {
	position:absolute;
	left:876px;
	top:57px;
	width:105px;
	height:24px;
	z-index:2;
}
-->
</style>
<link href="estilos/estilos.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.Estilo2 {color: #FFFFFF}
.Estilo3 {color: #006699}
.Estilo1 {color: #355279}
-->
</style>
</head>
<body >

<table border="0" cellpadding="0" cellspacing="0" width="100%">
  <tbody><tr> 
    <td></td>
  </tr>
  
  <tr> 
    <td  height="21"> <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tbody><tr> 
          <td width="13%" background="imag/bg_banner.gif" height="106"><div align="left"><img src="imag/banner_top1.png" width="70" height="75"></div></td>
          <td width="57%" background="imag/bg_banner.gif"><div align="left"><img src="imag/pdrtc1.gif" width="278" height="58"></div></td>
          <td width="30%" background="imag/bg_banner.gif"><div align="right"><img src="imag/lc.gif" width="302" height="70"></div></td>
        </tr>
      </tbody></table></td>
  </tr>
  <tr> 
    <td></td>
  </tr>
    <tr> 
    <td bgcolor="#000000"></td>
  </tr>
  
  <tr> 
    <td bgcolor="#003366" height="23">
      <table width="100%" height="21" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#FFFFFF" id="datos">
        <tbody>
		    <tr>
            <td width="42%" height="18" align="left" valign="top">
			<?php
			if(isset($_SESSION["usuario"])){
			?>
			<table width="287" height="19" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="9">&nbsp;</td>
                  <td width="11">|</td>
                 
                  <td width="89"><a href="admin_bususuario.php" target="mainFrame">Administraci&oacute;n</a></td>
                  <td width="9">|</td>
                  <td width="66"><a href="admin_reportes.php" target="mainFrame">Reportes</a></td>
                  <td width="14">|</td>
                  <td width="51">&nbsp;</td>
                  <td width="155">&nbsp;</td>
                </tr>
              </table>
			  <?php }else{?>
			  <table width="309" height="18" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="9">&nbsp;</td>
                  <td>SisLiCo | 2.0.0 Sistema de Licencias de Conducir</td>
                  </tr>
              </table>
			  <?php }?>            </td>
            <td align="center" valign="top" width="19%"><span class="acctitle">
			<?php if(isset($_SESSION["usuario"])){?> 
            <img src="imag/icon_home.gif" width="15" height="15" border="0"> 
            <a href="main_menu.php" target="mainFrame" class="G">WEB-Inicio</a> 
			<?php }else{ ?> 
            <img src="imag/icon_home.gif" width="15" height="15" border="0"> WEB-Inicio<?php }?></span> </td>
            <td width="39%" align="right" bgcolor="#FFFFFF"><span class="G  Estilo1"> 
			<?=$_SESSION["nombre"]?> [ <?php if(isset($_SESSION["usuario"])){ echo $_SESSION["usuario"]; ?> - EQUIPO AUTORIZADO <?PHP }else{echo "GRTC";}?>  ]</span> 
			

			

			
			
			</td>
          </tr>
        </tbody>
      </table></td>
  </tr>
</tbody></table>


</body></html>