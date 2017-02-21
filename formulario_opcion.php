<?php
session_start();
if(!isset($_SESSION["usuario"])) header("location:index.php");
if($_SESSION["cargo"]!='1' && $_SESSION["cargo"]!='6') header("location:denegado.php");
?>
<?
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

<script>
function consulta(fecha,Tselec)
{
var FechaCPF;
var selec;

if(Tselec=='0'){
		miventana=window.open("CalcularPostulanteV.php?nada=nada","CFE","");	
		form1.idexamen.value='';
		exit();
}

FechaCPF=fecha.value;
selec=Tselec.value;

if (selec=='') {
	miventana=window.open("CalcularPostulanteV.php?nada=nada","CFE","");	
}
else {
	if(form1.fefe.value==''){
		miventana=window.open("CalcularPostulanteV.php?nada=nada","CFE","");	
		alert("Seleccionar Primero la Fecha");
		form1.idexamen.value='';
	}
	else{
		miventana=window.open("CalcularPostulante.php?fechann=" + FechaCPF + "&tiponn=" + selec + "","CFE","");
	}
}

}

</script>
<script>
function nombre(sel){

	var m=sel.label;


	for(var i=form1.categoria.options.length; i>=0; i--) {
		form1.categoria.remove(i);
	}

	if(m==1){
		var cat = new Option();
		cat.value = "";
		cat.text = "---- Seleccione Opci�n ----";
		form1.categoria.options[form1.categoria.options.length] = cat;
		var cat = new Option();
		cat.value = "1";
		cat.text = "AI";
		form1.categoria.options[form1.categoria.options.length] = cat;
	}
	else if(m==2){
		var cat = new Option();
		cat.value = "";
		cat.text = "---- Seleccione Opci�n ----";
		form1.categoria.options[form1.categoria.options.length] = cat;
		var cat = new Option();
		cat.value = "7";
		cat.text = "AII-a";
		form1.categoria.options[form1.categoria.options.length] = cat;
		
		var cat = new Option();
		cat.value = "8";
		cat.text = "AII-b";
		form1.categoria.options[form1.categoria.options.length] = cat;
		
		var cat = new Option();
		cat.value = "9";
		cat.text = "AIII-a";
		form1.categoria.options[form1.categoria.options.length] = cat;
		
		var cat = new Option();
		cat.value = "10";
		cat.text = "AIII-b";
		form1.categoria.options[form1.categoria.options.length] = cat;
		var cat = new Option();
		cat.value = "11";
		cat.text = "AIII-c";
		form1.categoria.options[form1.categoria.options.length] = cat;
		
	}
	else if(m==3){
		var cat = new Option();
		cat.value = "";
		cat.text = "---- Seleccione Opci�n ----";
		form1.categoria.options[form1.categoria.options.length] = cat;
		var cat = new Option();
		cat.value = "4";
		cat.text = "AI";
		form1.categoria.options[form1.categoria.options.length] = cat;
		var cat = new Option();
		cat.value = "12";
		cat.text = "AII.-a";
		form1.categoria.options[form1.categoria.options.length] = cat;
		
		var cat = new Option();
		cat.value = "13";
		cat.text = "AII-b";
		form1.categoria.options[form1.categoria.options.length] = cat;
		
		var cat = new Option();
		cat.value = "14";
		cat.text = "AIII-a";
		form1.categoria.options[form1.categoria.options.length] = cat;
		
		var cat = new Option();
		cat.value = "15";
		cat.text = "AIII-b";
		form1.categoria.options[form1.categoria.options.length] = cat;
		var cat = new Option();
		cat.value = "16";
		cat.text = "AIII-c";
		form1.categoria.options[form1.categoria.options.length] = cat;
	}
	else if(m==4){
		var cat = new Option();
		cat.value = "";
		cat.text = "---- Seleccione Opci�n ----";
		form1.categoria.options[form1.categoria.options.length] = cat;
		var cat = new Option();
		cat.value = "1";
		cat.text = "AI";
		form1.categoria.options[form1.categoria.options.length] = cat;

		var cat = new Option();
		cat.value = "7";
		cat.text = "AII-a";
		form1.categoria.options[form1.categoria.options.length] = cat;
		var cat = new Option();
		cat.value = "8";
		cat.text = "AII-b";
		form1.categoria.options[form1.categoria.options.length] = cat;
		
		var cat = new Option();
		cat.value = "9";
		cat.text = "AIII-a";
		form1.categoria.options[form1.categoria.options.length] = cat;
		var cat = new Option();
		cat.value = "10";
		cat.text = "AIII-b";
		form1.categoria.options[form1.categoria.options.length] = cat;
		var cat = new Option();
		cat.value = "11";
		cat.text = "AIII-c";
		form1.categoria.options[form1.categoria.options.length] = cat;
	}
}
</script>

<script language="JavaScript">
<!--
function validar(form1)
{
	if (form1.idtramite.value=="")
	 {
	 alert("Debe ingresar N�mero de Tramite");
	 form1.idtramite.focus();
	 return false;
	 }
	 if (form1.fefe.value=="")
	 {
	 alert("Debe Ingresar Fecha de Programaci�n");
	 form1.fefe.focus();
	 return false;
	 } 
	 if (form1.tipotra.value=="")
	 {
	 alert("Debe ingresar Tipo de Tramite");
	 form1.tipotra.focus();
	 return false;
	 }
	 if (form1.categoria.value=="")
	 {
	 alert("Debe ingresar Tipo de Categoria");
	 form1.categoria.focus();
	 return false;
	 }
	 
 if (form1.idexamen.value=="")
	 {
	 alert("Debe ingresar el tipo de Examen ");
	 form1.idexamen.focus();
	 return false;
	 }
 if (form1.opcionn.value=="")
	 {
	 alert("Debe ingresar la Opci�n ");
	 form1.opcionn.focus();
	 return false;
	 }
	 if (form1.apepat.value=="")
	 {
	 alert ("Debe Ingresar Apellido Paterno");
	 form1.apepat.focus();
	 return false;
	 }
	 if (form1.apemat.value=="")
	 {
	 alert("Debe Ingresar Apellido Materno");
	 form1.apemat.focus();
	 return false;
	 }
	  if (form1.txtnom.value=="")
	 {
	 alert("Debe Ingresar  Nombre");
	 form1.txtnom.focus();
	 return false;
	 } 
	  if (form1.dni.value=="")
	 {
	 alert("Debe Ingresar DNI");
	 form1.dni.focus();
	 return false;
	 } 
	 if (form1.fefe11.value=="")
	 {
	 alert("Debe Ingresar Fecha de Nacimiento");
	 form1.fefe11.focus();
	 return false;
	 } 
	 if (form1.profe.value=="")
	 {
	 alert("Debe Ingresar Profesi�n");
	 form1.profe.focus();
	 return false;
	 } 
	 if (form1.estadocivil.value=="")
	 {
	 alert("Debe Ingresar su Estado Civil");
	 form1.estadocivil.focus();
	 return false;
	 } 
	  if (form1.estatura.value=="")
	 {
	 alert("Debe Ingresar Estatura");
	 form1.estatura.focus();
	 return false;
	 }  
	 if (form1.direccion.value=="")
	 {
	 alert("Debe Ingresar Direcci�n");
	 form1.direccion.focus();
	 return false;
	 } 
	 	 if (form1.fechaexamen22.value=="")
	 {
	 alert("Debe Ingresar Fecha de Examen");
	 form1.fechaexamen22.focus();
	 return false;
	 } 
	  if (form1.nroficha.value=="")
	 {
	 alert("Debe Ingresar N�mero de Centro M�dico");
	 form1.nroficha.focus();
	 return false;
	 }
	  if (form1.idcentro.value=="")
	 {
	 alert("Debe Ingresar Centro M�dico");
	 form1.idcentro.focus();
	 return false;
	 }
	var clave = form1.tipotra.value;  
	 var clave1 = form1.categoria.value;  
	if (clave=='NUEVO' && clave1!=1) { 
		alert("El tipo de Tr�mite no conciden, Verifique");
		form1.categoria.focus(); 
		return false;
	}	
	
	
var mydate=new Date();
var year=mydate.getYear();
if (year < 1000)
year+=1900;
var day=mydate.getDay();
var month=mydate.getMonth()+1;
if (month<10)
month="0"+month;
var daym=mydate.getDate();
if (daym<10)
daym="0"+daym;
var fecc=(""+daym+"/"+month+"/"+year+"")
	 
	 var usuario=form1.valorsesion.value;
	 var fecha=form1.fefe.value;
	 if(usuario!=1){
		 if(fecha==fecc){
		 alert("Usted no Puede Realizar Programaciones en el Mismo D�a");
		 form1.fefe.focus();
		 return false;
	     }
	 }
 /*if ((clave=='RECATEGORIZACION' && clave1!=2) && (clave=='RECATEGORIZACION' && clave1!=3) ){ 
	alert("El tipo de Tr�mite no conciden, Verifique");
		form1.categoria.focus(); 
		return false;
	}*/	
	//inicio para validar fecha
	 if (fefe11 != undefined && form1.fefe11.value != "" ){
              if (!/^\d{2}\/\d{2}\/\d{4}$/.test(fefe11.value)){
                  alert("formato de fecha no v�lido (dd/mm/aaaa)");
  					form1.fefe11.focus();
                  return false;
              }
              var dia  =  parseInt(fefe11.value.substring(0,2),10);
              var mes  =  parseInt(fefe11.value.substring(3,5),10);
              var anio =  parseInt(fefe11.value.substring(6),10);
          switch(mes){
              case 1:
              case 3:
              case 5:
              case 7:
              case 8:
              case 10:
              case 12:
                  numDias=31;
                  break;
              case 4: case 6: case 9: case 11:
                  numDias=30;
                  break;
             case 2:
                if (comprobarSiBisisesto(anio)){ numDias=29 }else{ numDias=28};
                  break;
              default:
                  alert("Fecha introducida err�nea");
				  form1.fefe11.focus();
                  return false;
          }
              if (dia>numDias || dia==0){
                  alert("Fecha introducida err�nea");
  				form1.fefe11.focus();
                  return false;
              }
             // return true;
          }
		  ////***
    if (fechaexamen22 != undefined && form1.fechaexamen22.value != "" ){
			if(form1.fechaexamen22.value != ""){
              if (!/^\d{2}\/\d{2}\/\d{4}$/.test(fechaexamen22.value)){
                  alert("formato de fecha no v�lido (dd/mm/aaaa)");
  					form1.fechaexamen22.focus();
                  return false;
              }
              var dia  =  parseInt(fechaexamen22.value.substring(0,2),10);
              var mes  =  parseInt(fechaexamen22.value.substring(3,5),10);
              var anio =  parseInt(fechaexamen22.value.substring(6),10);
          switch(mes){
              case 1:
              case 3:
              case 5:
              case 7:
              case 8:
              case 10:
              case 12:
                  numDias=31;
                  break;
              case 4: case 6: case 9: case 11:
                  numDias=30;
                  break;
             case 2:
                if (comprobarSiBisisesto(anio)){ numDias=29 }else{ numDias=28};
                  break;
              default:
                  alert("Fecha introducida err�nea");
				  form1.fechaexamen22.focus();
                  return false;
          }
              if (dia>numDias || dia==0){
                  alert("Fecha introducida err�nea");
  				form1.fechaexamen22.focus();
                  return false;
              }
              return true;
          }
		  }
		  /////**
		 }
	  
    function comprobarSiBisisesto(anio){
      if ( ( anio % 100 != 0) && ((anio % 4 == 0) || (anio % 400 == 0))) {
          return true;
          }
      else {
         return false;
          }
		 return true;
	}
//-->
</script> 

<style type="text/css">
<!--
.Estilo1 {	color: #666666;
	font-weight: bold;
}
.Estilo2 {color: #336699}
-->
</style>
</head>
<body class="os2hop">


	<table align="center" bgcolor="#336699" border="0" cellpadding="0" cellspacing="0" width="100%">
 <tbody><tr><td>
	<table border="0" cellpadding="0" cellspacing="0" width="36%">
			<tbody><tr><td class="tabs">
				<table border="0" cellpadding="0" cellspacing="0" width="78%">
				<tbody><tr>
											<td class="tabsline" width="20"><img src="imag/tabinion2.gif" border="0" height="36" width="29"></td>	
						<td width="119" align="center" background="imag/div3.gif" ><a href="formularioexamenbuscar.php"><b><b><span class="G"><nobr>Buscar Postulante </nobr></span></b></b></a></td>	
													<td class="tabson" ><img src="imag/div22.gif" alt="" border="0" height="36" width="29"></td>							
		  <td width="119" align="center" background="imag/div1.gif" ><a href="formulario_opcion.php"><span class="Estilo2"><nobr><b><b>Nueva Programacion </b></b></nobr></span></a></td>
						                            <td class="tabson" ><span class="tabsline"><img src="imag/div44.gif" alt="" border="0" height="36" width="29"></span></td>
                                                   
                                                    <td width="119" align="center" >&nbsp;</td>
                                                    <td class="tabson" >&nbsp;</td>
                        <td >&nbsp;</td>
				        <td class="tabsline" >&nbsp;</td>
				        <td class="tabsline" width="175"></td>
				</tr>	
        		</tbody></table>
			</td></tr>
    </tbody></table>
 </td></tr>
</tbody></table>

<table width="100%" height="93%" border="0" cellpadding="0" cellspacing="10" bgcolor="#CFE5EE">
<tbody>
  <tr>
    <td height="165" valign="top"><table width="100%" border="0" align="center">
      <tr>
        <td width="727" height="245"><form name="form1" method="post" action="insertformularioopcion.php" onSubmit="return validar(this)">
          <table class="frmline" align="center" border="0" cellpadding="0" cellspacing="0" width="50%">
            <tbody>
              <tr>
                <td colspan="8"><table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
                    <tbody>
                      <tr>
                        <td colspan="3" width="100%"><table border="0" cellpadding="3" cellspacing="0" width="100%">
                            <tbody>
                              <tr>
                                <th align="left" bgcolor="#6600ff" width="20%"> </th>
                                <th height="26" width="50%"> <span class="G">NUEVA PROGRAMACION :: [ PROGRAMACION EXAMEN ] </span></th>
                                <th align="right" width="25%"> </th>
                              </tr>
                            </tbody>
                        </table></td>
                      </tr>
					  <?php 	
$record=pg_query($link,"select * from postulante where dni='".$_POST["frase2"]."'");
if(pg_num_rows($record) > 0){
/////////////////////////////////////////////
		 $sq="SELECT max(t.idtramite) FROM postulante p INNER JOIN tramite t ON p.idpostulante=t.idpostulante WHERE p.dni='".$_POST["frase2"]."' and t.estado<>55 and t.tipotramite<>'DUPLICADO'and t.idtramite<'9966737'";
		$rs=pg_query($link,$sq) or die ("Error :$sq");
		while($reg=pg_fetch_array($rs)) { 
			$idusuario=$reg[0];
		}
		$idtraaa=$idusuario;
									  
		$sql="SELECT * FROM postulante p INNER JOIN tramite t ON p.idpostulante=t.idpostulante WHERE p.dni='".$_POST["frase2"]."' and t.idtramite=".$idtraaa."";
		$rs=pg_query($link,$sql);
		$fila =pg_fetch_object($rs);
		$idpostulante= $fila->idpostulante;
		$nom= $fila->nombres;		
		$apep= $fila->apepat;
		$apem= $fila->apemat;		
		$dni = $fila->dni;
		$sex = $fila->sexo;
		$fecnac = $fila->fecnac;
		$est = $fila->estatura;
		$estciv = $fila->estadocivil;
		$docc = $fila->domicilio;
		$proff = $fila->profesion;
		$docc = $fila->domicilio;
		$idtra=$fila->idtramite;
		$tiptra=$fila->tipotramite;
		$idcat=$fila->idcategoria;
		$nrof=$fila->nroficha;
		$fini=$fila->fechaini;
		$idcen=$fila->idcentro;
		$obse=$fila->observacion;
		//pg_free_result($rs);
		
}	
	?>
                    </tbody>
                </table></td>
              </tr>
              <tr>
                <td colspan="6"><table width="700" border="0" cellpadding="0" cellspacing="0">
                    <tbody>
                      <tr>
                        <td  height="10" width="6">&nbsp;</td>
                        <td  align="left" width="221"><span class="Estilo1">&nbsp;DATOS DEL REGISTRO</span></td>
                        <td width="159" height="20" align="right" ></td>
                        <td width="248" align="right" ><? /*$fecha=date('Y-m-d'); // tu sabr�s como la obtienes, solo asegurate que tenga este formato
$dias= 15; // los d�as a restar

echo date("Y-m-d", strtotime("$fecha -$dias day")); */ ?></td>
                        <td width="10" align="right" >&nbsp;</td>
                        <td width="56" align="right" >&nbsp;</td>
                      </tr>
                    </tbody>
                </table></td>
              </tr>
              <tr valign="middle">
                <td class="marco">&nbsp;</td>
                <td class="etiqueta" align="right">&nbsp;</td>
                <td class="objeto">&nbsp;</td>
                <td colspan="2" class="objeto"><?php if(isset($_GET["mensaje"]))
		{
		if($_GET["mensaje"] == "F")
			echo "<TABLE ><TR><TD align=center><Font size=2 color=red>[ Se programo al Postulante Correctamente ]</Font></TD></TR></TABLE>";
				}
		?></td>
                <td class="objeto"><input type="hidden" name="valorsesion" value="<?=$_SESSION["cargo"]?>"></td>
              </tr>
              <tr valign="middle">
                <td class="marco">&nbsp;</td>
                <td class="etiqueta" align="right">N&ordm; DE TRAMITE &nbsp;</td>
                <td class="objeto">&nbsp;</td>
                <td colspan="2" class="objeto"><input name="idtramite"  type="text" class="cajatexto" id="idtramite" onKeyPress="return formato(event,form,this,8)" value="<?=$idtra?>" size="15" maxlength="8"></td>
                <td class="objeto">&nbsp;</td>
              </tr>
              <tr valign="middle">
                <td class="marco" width="1%">&nbsp;</td>
                <td class="etiqueta" align="right" width="24%">FECHA DE PROG. &nbsp;</td>
                <td class="objeto" width="1%">&nbsp;</td>
                <td width="17%" class="objeto"><input name="fefe"  type="text" class="cajatexto" id="fefe" onKeyPress="return formato(event,form,this,80)" size="15" maxlength="10">
                  <img src="imag/calendaricon.gif" onclick='popUpCalendar(this, form1.fefe, "dd/mm/yyyy");consulta(form1.fefe,"0");'   border="0" height="15" width="15"></td>
                <td width="49%" class="objeto"><iframe name="CFE" src="CalcularPostulanteV.php" width="285" height="20" scrolling="no" frameborder="0"></iframe></td>
                <td class="objeto" width="8%">&nbsp;</td>
              </tr>
              
              <tr valign="middle">
                <td height="19" class="marco">&nbsp;</td>
                <td class="etiqueta" align="right">TIPO DE TRAMITE &nbsp;</td>
                <td class="objeto">&nbsp;</td>
                <td colspan="2" class="objeto"><select name="tipotra" class="cajatexto" id="tipotramite"  onkeypress="return formato(event,form,this)">
                  
              <option value=''>---- Seleccione Opcion ----</option>
			 <? //if($tiptra=='NUEVO' || $tiptra=='RECATEGORIZACION' || $tiptra=='CANJE RECATEGORIZACION' || $tiptra=='REVALIDACION' || $tiptra=='CANJE REVALIDACION') {?>
				<option onClick="nombre(this)" label="1" value="NUEVO" <? if($tiptra=='NUEVO') echo"selected"; ?>>NUEVO</option>
                <option onClick="nombre(this)" label="2" value="RECATEGORIZACION" <? if($tiptra=='RECATEGORIZACION') echo"selected"; ?>>RECATEGORIZACION</option>
				<option onClick="nombre(this)" label="2" value="CANJE RECATEGORIZACION" <? if($tiptra=='CANJE RECATEGORIZACION') echo"selected"; ?>>CANJE RECATEGORIZACION</option>
			<option onClick="nombre(this)" label="3" value="REVALIDACION" <? if($tiptra=='REVALIDACION') echo"selected"; ?>>REVALIDACION</option>
			<option onClick="nombre(this)" label="3" value="CANJE REVALIDACION" <? if($tiptra=='CANJE REVALIDACION') echo"selected"; ?>>CANJE REVALIDACION</option>
			
                                  </select>
								  
                    <?php if(isset($_GET["error"]))
		{
		if($_GET["error"] == "N")
			echo "<TABLE ><TR><TD align=center><Font size=1 color=red>[ No coincide el Tipo de Tramite con la Categoria que a Seleccionado ]</Font></TD></TR></TABLE>";
				}
		?></td>
                <td class="objeto">&nbsp;</td>
              </tr>
              <tr valign="middle">
                <td height="18" class="marco">&nbsp;</td>
                <td class="etiqueta" align="right">CATEGORA &nbsp;</td>
                 <td class="objeto">&nbsp;</td>
                <td colspan="2" class="objeto">  
				<? //if($_GET["sw"]==3){?>
			  <select name="categoria" class="cajatexto" id="categoria"  onkeypress="return formato(event,form,this)">
            <option value=''>---- Seleccione Opcion ----</option>
			  <? if($idcat==1 || $idcat==2 || $idcat==3 || $idcat==7 || $idcat==8 || $idcat==9 || $idcat==10 || $idcat==11){?>
			<!--<option value="1" <? if($idcat=='1') echo"selected"; ?>>AI</option>
            <option  value="2" <? if($idcat=='2') echo"selected"; ?>>AII</option>
			<option  value="3" <? if($idcat=='3') echo"selected"; ?>>AIII</option>-->
			
			<option value="1" <? if($idcat=='1') echo"selected"; ?>>AI</option>
			<!--<option value="2" <? if($idcat=='2') echo"selected"; ?>>AII</option>
			<option value="3" <? if($idcat=='3') echo"selected"; ?>>AIII</option>-->
            <option  value="7" <? if($idcat=='7') echo"selected"; ?>>AII-a</option>
			<option  value="8" <? if($idcat=='8') echo"selected"; ?>>AII-b</option>
			<option  value="9" <? if($idcat=='9') echo"selected"; ?>>AIII-a</option>
			<option  value="10" <? if($idcat=='10') echo"selected"; ?>>AIII-b</option>
			<option  value="11" <? if($idcat=='11') echo"selected"; ?>>AIII-c</option>
			  <? }else{?>
			<!--<option  value="4" <? if($idcat=='4') echo"selected"; ?>>AI.</option>
			<option  value="5" <? if($idcat=='5') echo"selected"; ?>>AII.</option>
			<option value="6" <? if($idcat=='6') echo"selected"; ?>>AIII.</option>-->
			
			<option  value="4" <? if($idcat=='4') echo"selected"; ?>>AI.</option>
			<!--<option  value="5" <? if($idcat=='5') echo"selected"; ?>>AII.</option>
			<option  value="6" <? if($idcat=='6') echo"selected"; ?>>AIII.</option>-->
			<option  value="12" <? if($idcat=='12') echo"selected"; ?>>AII.-a</option>
			<option value="13" <? if($idcat=='13') echo"selected"; ?>>AII.-b</option>
			<option value="14" <? if($idcat=='14') echo"selected"; ?>>AIII.-a</option>
			<option value="15" <? if($idcat=='15') echo"selected"; ?>>AIII.-b</option>
			<option value="16" <? if($idcat=='16') echo"selected"; ?>>AIII.-c</option>idcat
			<? }?>
                </select>  </td>
                <td class="objeto">&nbsp;</td>
              </tr>
			  
              <tr valign="middle">
                <td height="18" class="marco">&nbsp;</td>
                <td align="right" class="etiqueta">TIPO DE EXAMEN &nbsp;</td>
                <td class="objeto">&nbsp;</td>
                <td colspan="2" class="objeto"><?php llenarcombo($link,'tipo_examen','idexamen, nombre',' ORDER BY 1', $idexamen, 'onChange=consulta(form1.fefe,this);','idexamen'); ?></td>
                <td class="objeto">&nbsp;</td>
              </tr>
              <tr valign="middle">
                <td width="1%" height="18" class="marco">&nbsp;</td>
                <td class="etiqueta" align="right" width="24%">OPCION &nbsp;</td>
                <td class="objeto" width="1%">&nbsp;</td>
                <td colspan="2" class="objeto"><select name="opcionn" class="cajatexto" id="select"  onkeypress="return formato(event,form,this)">
                  <option value="" >---Seleccione---</option>
				   <option value="1" >1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                </select></td>
                <td class="objeto" width="8%">&nbsp;</td>
              </tr>
              
              <tr>
                <td height="20" colspan="6"><table width="50%" border="0" cellpadding="0" cellspacing="0">
                    <tbody>
                      <tr>
                        <td  height="10" width="10">&nbsp;</td>
                        <td  align="left" width="90%"><span class="Estilo1">&nbsp;DATOS PERSONALES </span></td>
                        <td align="right" height="20"></td>
                      </tr>
                    </tbody>
                </table></td>
              </tr>
              
              <tr valign="middle">
                <td class="marco" width="1%">&nbsp;</td>
                <td class="etiqueta" align="right" width="24%">Apellidos Paterno &nbsp;&nbsp;</td>
                <td class="objeto" width="1%">&nbsp;</td>
                <td colspan="2" class="objeto"><input name="apepat"  type="text" class="cajatexto" id="apepat" onKeyPress="return formato(event,form,this,80)" value="<?=$apep?>" size="50" maxlength="60">
                  <input type="hidden" name="idpostulante" value="<?=$idpostulante?>"></td>
                <td class="objeto" width="8%">&nbsp;</td>
              </tr>
              <tr valign="middle">
                <td class="marco">&nbsp;</td>
                <td class="etiqueta" align="right">Apellidos Materno &nbsp;&nbsp;</td>
                <td class="objeto">&nbsp;</td>
                <td colspan="2" class="objeto"><input name="apemat"  type="text" class="cajatexto" id="apemat" onKeyPress="return formato(event,form,this,80)" value="<?=$apem?>" size="50" maxlength="60"></td>
                <td class="objeto">&nbsp;</td>
              </tr>
              <tr valign="middle">
                <td class="marco">&nbsp;</td>
                <td class="etiqueta" align="right">Nombres&nbsp;&nbsp;</td>
                <td class="objeto">&nbsp;</td>
                <td colspan="2" class="objeto"><input name="txtnom"  type="text" class="cajatexto" id="txtnom" onKeyPress="return formato(event,form,this,80)" value="<?=$nom?>" size="50" maxlength="60"></td>
                <td class="objeto">&nbsp;</td>
              </tr>
              

              <tr valign="middle">
                <td height="18" class="marco">&nbsp;</td>
                <td class="etiqueta" align="right">DNI</td>
                <td class="objeto">&nbsp;</td>
                <td colspan="2" bgcolor="#EFEFEF"><input name="dni" type="text" class="cajatexto" id="dni" style="text-align: right;"  onKeyPress="return formato(event,form,this,8)"value="<?=$dni?>" size="12" maxlength="8"></td>
                <td bgcolor="#EFEFEF">&nbsp;</td>
              </tr>
              
              <tr valign="middle">
                <td height="18" class="marco">&nbsp;</td>
                <td align="right" class="etiqueta">Fecha de Nacimiento &nbsp;</td>
                <td class="objeto">&nbsp;</td>
                <td colspan="2" class="objeto"><input name="fefe11"  type="text" class="cajatexto" id="fefe11" onKeyPress="return formato(event,form,this,80)" value="<? if($fecnac!='') echo ereg_replace('-','/',normal($fecnac));?>" size="15" maxlength="10">                  &nbsp; <img src="imag/calendaricon.gif" onclick='popUpCalendar(this, form1.fefe11, "dd/mm/yyyy")'   border="0" height="15" width="15"> </td>
                <td class="objeto">&nbsp;</td>
              </tr>
              <tr valign="middle">
                <td height="18" class="marco">&nbsp;</td>
                <td align="right" class="etiqueta">Sexo &nbsp;&nbsp;</td>
                <td class="objeto">&nbsp;</td>
                <td colspan="2" class="objeto"><table width="200" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                      <? if ($sex=='F'){?>
                      <td><input name="sexo" type="radio" value="M" >
                        Masculino</td>
                      <td><input name="sexo" type="radio" value="F" checked>
                        Femenino</td>
                      <? }else{?>
                      <td><input name="sexo" type="radio" value="M" checked>
                        Masculino</td>
                      <td><input name="sexo" type="radio" value="F" >
                        Femenino</td>
                      <? }?>
                    </tr>
                </table></td>
                <td class="objeto">&nbsp;</td>
              </tr>
              <tr valign="middle">
                <td height="18" class="marco">&nbsp;</td>
                <td width="24%" align="right" class="etiqueta">Profesi&oacute;n o Ocup. &nbsp;&nbsp;</td>
                <td width="1%" class="objeto">&nbsp;</td>
                <td colspan="2" class="objeto"><input name="profe"  type="text" class="cajatexto" id="profe" onKeyPress="return formato(event,form,this,80)" value="<?=$proff?>" size="64" maxlength="60"></td>
                <td class="objeto">&nbsp;</td>
              </tr>
              <tr valign="middle">
                <td height="18" class="marco">&nbsp;</td>
                <td align="right" class="etiqueta">Estado Civil &nbsp;&nbsp;</td>
                <td class="objeto">&nbsp;</td>
                <td colspan="2" class="objeto"><input name="estadocivil"  type="text" class="cajatexto" id="xxxdepe4" onKeyPress="return formato(event,form,this,80)" value="<?=$estciv?>" size="30" maxlength="40"></td>
                <td class="objeto">&nbsp;</td>
              </tr>
              <tr valign="middle">
                <td height="18" class="marco">&nbsp;</td>
                <td align="right" class="etiqueta">Estatura &nbsp;&nbsp;</td>
                <td class="objeto">&nbsp;</td>
                <td colspan="2" class="objeto"><input name="estatura" type="text" class="cajatexto" id="estatura"  onKeyPress="return formato(event,form,this,80)" value="<?=$est?>" size="8" maxlength="4"></td>
                <td class="objeto">&nbsp;</td>
              </tr>
              <tr valign="middle">
                <td height="18" class="marco">&nbsp;</td>
                <td align="right" class="etiqueta">Domicilio &nbsp;&nbsp;</td>
                <td class="objeto">&nbsp;</td>
                <td colspan="2" class="objeto"><input name="direccion"  type="text" class="cajatexto" id="direccion" onKeyPress="return formato(event,form,this,80)" value="<?=$docc?>" size="64"></td>
                <td class="objeto">&nbsp;</td>
              </tr>
              <tr valign="middle">
                <td  height="10">&nbsp;</td>
                <td height="20" colspan="4"  align="left"><span class="Estilo1">&nbsp;DATOS EXAMEN MEDICO </span></td>
                <td bgcolor="#FFFFFF" >&nbsp;</td>
              </tr>
              <tr valign="middle">
                <td height="18" class="marco">&nbsp;</td>
                <td width="24%" align="right" class="etiqueta">Fecha de Examen&nbsp;&nbsp;</td>
                <td width="1%" class="objeto">&nbsp;</td>
                <td colspan="2" class="objeto"><input name="fechaexamen22" type="text" class="cajatexto" id="fechaexamen22" onKeyPress="return formato(event,form,this,80)" value="<? if($fini!='') echo  ereg_replace('-','/',normal($fini));?>" size="15" maxlength="10">
  &nbsp; <img src="imag/calendaricon.gif" onclick='popUpCalendar(this, form1.fechaexamen22, "dd/mm/yyyy")'   border="0" height="15" width="15"></td>
                <td class="objeto">&nbsp;</td>
              </tr>
              <tr valign="middle">
                <td height="18" class="marco">&nbsp;</td>
                <td width="24%" align="right" class="etiqueta">N&ordm;  de Ficha &nbsp;&nbsp;</td>
                <td width="1%" class="objeto">&nbsp;</td>
                <td colspan="2" class="objeto"><input name="nroficha" type="text" class="cajatexto" id="nroficha" onKeyPress="return formato(event,form,this,8)" value="<?=$nrof?>" size="9" maxlength="8">
                    <?php llenarcombo($link,'centro_medico','idcentro, nombre',' ORDER BY 2', $idcen, '','idcentro'); ?></td>
                <td class="objeto">&nbsp;</td>
              </tr>
              <tr valign="middle">
                <td height="18" class="marco">&nbsp;</td>
                <td width="24%" align="right" class="etiqueta">Resultado&nbsp;&nbsp;</td>
                <td width="1%" class="objeto">&nbsp;</td>
                <td colspan="2" class="objeto"><select name="resultado" class="cajatexto" id="resultado"  onkeypress="return formato(event,form,this)">
                    <option value="APTO">APTO</option>
                    <option value="NO APTO">NO APTO</option>
                </select></td>
                <td class="objeto">&nbsp;</td>
              </tr>
              <tr valign="middle">
                <td height="18" class="marco">&nbsp;</td>
                <td width="24%" align="right" class="etiqueta">Restricciones&nbsp;&nbsp;</td>
                <td width="1%" class="objeto">&nbsp;</td>
                <td colspan="2" class="objeto"><select name="restricciones" class="cajatexto" id="restricciones" onChange="MM_jumpMenu(form,this,'/sisgedo/app/main.php')" onkeypress="return formato(event,form,this)">
                    <option value="SIN RESTRICCIONES">SIN RESTRICCIONES</option>
                    <option value="CON RESTRICCOINES">CON RESTRICCOINES</option>
                </select></td>
                <td class="objeto">&nbsp;</td>
              </tr>
              <tr valign="middle">
                <td height="18" class="marco">&nbsp;</td>
                <td width="24%" align="right" class="etiqueta">Observacion&nbsp;&nbsp;</td>
                <td width="1%" class="objeto">&nbsp;</td>
                <td colspan="2" class="objeto"><input name="observacion"  type="text" class="cajatexto" id="observacion" onKeyPress="return formato(event,form,this,80)" value="<?=$obse?>" size="60" maxlength="60"></td>
                <td class="objeto">&nbsp;</td>
              </tr>
              



              <tr>
                <td colspan="6" class="marco seccionblank"><div align="center"></div></td>
              </tr>
              
              <tr>
                <td colspan="8" height="30"><table border="0" cellpadding="3" cellspacing="1" width="100%">
                    <tbody>
                      <tr>
                        <td class="spaceRow" colspan="7" height="1"><img src="main.php7_files/spacer.htm" alt="" height="1" width="1"></td>
                      </tr>
                      <tr align="center">
                        <td class="catBottom" colspan="7" height="28"><table border="0" cellpadding="0" cellspacing="0" width="100%">
                            <tbody>
                              <tr>
                                <td align="left" width="100%"><input class="boton" name="btn_Grabar" value=".:: Grabar ::." type="submit">                                </td>
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
        </form>
        </td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
    </table></td>
  </tr>
</tbody></table>

</body></html>