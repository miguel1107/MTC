<?php
	session_start();
	if(!isset($_SESSION["usuario"])) header("location:index.php");

	include ("traducefecha.php");
	include("comun/function.php");
	include ("conectar.php");
	$link=Conectarse();


		//cambios
	require_once 'model/tipotramite.php';
	require_once 'model/provincia.php';
		//--
	if($_GET["sw"]==2){
		$cant=count($_POST["chk"]);
		if($cant > 0){
			foreach($_POST["chk"] as $k =>$v){
				$sql="SELECT * FROM postulante WHERE idpostulante='".$v."'";
				$rs=pg_query($link,$sql);
				$fila =pg_fetch_object($rs);
				$idpostulante= $fila->idpostulante;
				$nom= $fila->nombres;		
				$apep= $fila->apepat;
				$apem= $fila->apemat;		
				$fecnac= $fila->fecnac;
				$edad= $fila->edad;
				$prof = $fila->profesion;
				$estado = $fila->estadocivil;
				$dni = $fila->dni;
				$lm = $fila->lm;
				$ce = $fila->ce;
				$ci = $fila->ci;
				$sex = $fila->sexo;
				$est = $fila->estatura;
				$dom = $fila->domicilio;
				$correo=$fila->correo;
				$tel=$fila->telefono;
				$dis=$fila->iddistrito;
				$dona=$fila->donacion;
				if (!empty($dis)) {
					$nomdis;
					$sq2="SELECT p.nombre, p.idprovincia, d.nombre,d.iddistrito from distrito d inner join provincia p on p.idprovincia=d.idprovincia where d.iddistrito='".$dis."' ";
					$f2=pg_query($link,$sq2);
					$filatra2=pg_fetch_array($f2);
					$provi=$filatra2[1];
				}
			}
		}
	}
?>

<html><head><title></title>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" media="screen" href="estilos/tabscreen.css">
<link rel="stylesheet" type="text/css" media="screen" href="css/autocomplete.css">
<link rel="stylesheet" type="text/css" media="all" href="estilos/menumx.css">
<link rel="stylesheet" type="text/css" media="print" href="estilos/tabprint.css">
<link rel="stylesheet" type="text/css" media="all" href="estilos/estilos.css">
<link href="estilos/networkbar.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" media="all" href="estilos/jquery-ui.css">
<script type="text/javascript" src="estilos/libjsgen.js"> </script>
<script type="text/javascript" src="estilos/popcalendar.js"> </script>
<script language="JavaScript" src="estilos/networkbar.js"></script>
<style type="text/css">
	<!--
	.Estilo1 {
		color: #666666;
		font-weight: bold;
	}
-->
</style>
</head>

<body class="os2hop">
	<div id="selectMonth" style="z-index: 999; position: absolute; visibility: hidden;"></div><div id="selectYear" style="z-index: 999; position: absolute; visibility: hidden;"></div>
	
	<script src="js/jquery-2.0.3.min.js"></script>
	<script src="js/jquery-ui-1.10.3.custom.min.js"> </script>
	<script src="js/jquery-ui.js"> </script>
	<script src="js/nuevo_tramite.js"></script>
	<script type="text/javascript">
	var di="<?php echo $dis; ?>";
	var pr="<?php echo $provi; ?>";
	console.log(di+'-'+pr);
	cargadistrito(di,pr);
</script>
	<script type="text/javascript" language="javascript">
		function AceptaNumero(evt) 
		{
			var nav4 = window.Event ? true : false;
			var key = nav4 ? evt.which : evt.keyCode; 
			return (key <= 13 || key==46 ||  (key >= 38 && key <= 57)); 

		}
	</script>

	<script languaje="JavaScript">
		function MM_goToURL() { //v3.0
			var i, args=MM_goToURL.arguments; document.MM_returnValue = false;
			for (i=0; i<(args.length-1); i+=2) eval(args[i]+".location='"+args[i+1]+"'");
		}
	</script>

<script language="JavaScript">
	<!--
	function validar(form1){
		if (form1.apepat.value==""){
			alert ("Debe Ingresar Apellido Paterno");
			form1.apepat.focus();
			return false;
		}
		if (form1.apemat.value==""){
			alert("Debe Ingresar Apellido Materno");
			form1.apemat.focus();
			return false;
		}
		if (form1.txtnom.value==""){
			alert("Debe Ingresar  Nombre");
			form1.txtnom.focus();
			return false;
		}
		if (form1.fefe.value==""){
			alert("Debe Ingresar Fecha de Programacion");
			form1.fefe.focus();
			return false;
		} 
		if (fefe != undefined && form1.fefe.value != "" ){

			if (!/^\d{2}\/\d{2}\/\d{4}$/.test(fefe.value)){
				alert("formato de fecha no volido (dd/mm/aaaa)");
				form1.fefe.focus();
				return false;
			}
			var dia  =  parseInt(fefe.value.substring(0,2),10);
			var mes  =  parseInt(fefe.value.substring(3,5),10);
			var anio =  parseInt(fefe.value.substring(6),10);
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
				alert("Fecha introducida erronea");
				form1.fefe.focus();
				return false;

			}
			if (dia>numDias || dia==0){
				alert("Fecha introducida erronea");
				form1.fefe.focus();
				return false;
			}
		}
		if (form1.edad.value==""){
			alert("Debe Ingresar su fecha de nacimiento");
			form1.edad.focus();
			return false;
		}
		if (form1.profe.value==""){
			alert("Debe Ingresar su Profesion");
			form1.profe.focus();
			return false;
		} 
		if (form1.estadocivil.value=="0"){
			alert("Debe Ingresar su Estado Civil");
			form1.estadocivil.focus();
			return false;
		}
		if (form1.dni.value!=""){
			var campo = form1.dni.value;
			if (campo.length!=8) {
				alert("Por Favor, Ingrese el DNI con 8 digitos.");
				form1.dni.focus();
				return (false);
			}
		}else if(form1.dni.value=="" && form1.ce.value==""){
			alert("Debe ingresar Dni/C.E");
			form1.dni.focus();
			return false;
		}
		if (form1.ce.value!=""){
			var campo = form1.ce.value;
			if (campo.length!=9) {
				alert("Por Favor, Ingrese el Carnet Extranjeria con 9 digitos.");
				form1.ce.focus();
				return (false);
			}
		}else if(form1.dni.value=="" && form1.ce.value==""){
			alert("Debe ingresar Dni/C.E");
			form1.dni.focus();
			return false;
		}
		if (form1.estatura.value==""){
			alert("Debe Ingresar Estatura");
			form1.estatura.focus();
			return false;
		} 
		// if (form1.provincia.value=="0"){
		// 	alert("Debe escoger una provincia");
		// 	form1.provincia.focus();
		// 	return false;
		// }
		// if (form1.distrito.value=="0"){
		// 	alert("Debe escoger un distrito");
		// 	form1.distrito.focus();
		// 	return false;
		// }
		if (form1.direccion.value==""){
			alert("Debe Ingresar Direccion");
			form1.direccion.focus();
			return false;
		}
		// if (form1.telefono.value==""){
		// 	alert("Debe Ingresar telefono");
		// 	form1.telefono.focus();
		// 	return false;
		// }
		// if (form1.correo.value==""){
		// 	alert("Debe Ingresar Correo");
		// 	form1.cooreo.focus();
		// 	return false;
		// }else{
		// 	var co=form1.correo.value;
		// 	if (co.includes('@')) {
		// 		if (co.includes('.')) {
		// 		}else{
		// 			alert('Le falta el . al correo');
		// 			form1.correo.focus;
		// 			return false;	
		// 		}
		// 	}else{
		// 		alert('Le falta el @ al correo');
		// 		form1.correo.focus;
		// 		return false;
		// 	}
		// }
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
<SCRIPT LANGUAGE="JavaScript">
	<!--
	function calcular_edad(){

	    //calculo la fecha de hoy

	    var fecha=document.getElementById("fefe").value;

	    var fechaActual = new Date()
	    var diaActual = fechaActual.getDate();
	    var mmActual = fechaActual.getMonth() + 1;
	    var yyyyActual = fechaActual.getFullYear();
	    FechaNac = fecha.split("/");
	    var diaCumple = FechaNac[0];
	    var mmCumple = FechaNac[1];
	    var yyyyCumple = FechaNac[2];
		//retiramos el primer cero de la izquierda
		if (mmCumple.substr(0,1) == 0) {
			mmCumple= mmCumple.substring(1, 2);
		}
		//retiramos el primer cero de la izquierda
		if (diaCumple.substr(0, 1) == 0) {
			diaCumple = diaCumple.substring(1, 2);
		}
		var edad = yyyyActual - yyyyCumple;

		//validamos si el mes de cumpleaoos es menor al actual
		//o si el mes de cumpleaoos es igual al actual
		//y el dia actual es menor al del nacimiento
		//De ser asi, se resta un aoo
		if ((mmActual < mmCumple) || (mmActual == mmCumple && diaActual < diaCumple)) {
			edad--;
		}

		document.getElementById("edad").value = edad;
		//return edad
	} 

// -->
</SCRIPT>

<table align="center" bgcolor="#336699" border="0" cellpadding="0" cellspacing="0" width="100%">
	<tbody><tr><td>
		<table border="0" cellpadding="0" cellspacing="0" width="52%">
			<tbody><tr><td class="tabs">
				<table border="0" cellpadding="0" cellspacing="0" width="52%">
					<tbody>
						<tr>
							<td class="tabsline" width="20"><img src="imag/tabinion2.gif" border="0" height="36" width="29"></td>	
							<td width="119" align="center" background="imag/div3.gif" ><nobr><b><a href="buscar_postulante.php"><b>&nbsp;&nbsp;<span class="G">BUSCAR POSTULANTE</span>&nbsp;</b></a></b></nobr></td>	
							<td class="tabson" width="52"><img src="imag/div22.gif" alt="" border="0" height="36" width="29"></td>							
							<td width="119" align="center" background="imag/div1.gif" ><nobr><b><a href="nuevo_postulante.php"><b>NUEVO TRAMITE</b></a></b></nobr></td>
							<td class="tabson" width="52"><img src="imag/div2.gif" alt="" border="0" height="36" width="29"></td>
							<td width="119" align="center" background="imag/div3.gif"><nobr><b><a href="listado_postulante.php"><b><span class="G">DATOS POSTULANTE</span>&nbsp;&nbsp;</b></a></b></nobr></td>
							<td class="tabson" width="52"><img src="imag/div222.gif" alt="" border="0" height="36" width="29"></td>
							<td width="175" background="imag/div3.gif" >					    </td>
							<td width="175" background="imag/div3.gif" ><nobr><b><a href="listado_tramite.php"><b><span class="G">LISTADO TRAMITE</span></b></a></b></nobr></td>
							<td class="tabsline" ><span class="tabson"><img src="imag/div222.gif" alt="" border="0" height="36" width="29"></span></td>
							<td  background="imag/div3.gif" ><nobr><b><a href="list_soli.php"><b><span class="G">LISTADO DE SOLICITUDES</span></b></a></b></nobr> </td>
							<td class="tabsline" ><span class="tabson"><img src="imag/div222.gif" alt="" border="0" height="36" width="29"></span></td>
							<td  background="imag/div3.gif" ><nobr><b><a href="listado_tramites_anulados.php"><b><span class="G">TRAMITES ANULADOS</span></b></a></b></nobr> </td>
							<td class="tabsline" ><span class="tabson"><img src="imag/div222.gif" alt="" border="0" height="36" width="29"></span></td>
							<td  background="imag/div3.gif" ><nobr><b><a href="restaurar/listado_tramite_restaurados.php"><b><span class="G">TRAMITES RESTAURADOS</span></b></a></b></nobr> </td>
							<td class="tabsline" ><span class="tabson"><img src="imag/div4.gif" alt="" border="0" height="36" width="29"></span></td>
						</tr>	
					</tbody>
				</table>
			</td></tr></tbody>
		</table>
	</td></tr></tbody>
</table>

<table width="100%" height="94%" border="0" cellpadding="0" cellspacing="10" bgcolor="#CFE5EE">
	<tbody>
		<tr>
			<td height="165" valign="top"><table width="100%" border="0" align="center">
				<tr>
					<td height="245">
		<form name="form1" action="update_postulante.php" method="post"  onSubmit="return validar(this)">
			<table class="frmline" align="center" border="0" cellpadding="0" cellspacing="0" width="50%">
				<tbody>
					<tr>
						<td colspan="7">
							<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
								<tbody>
									<tr>
										<td colspan="3" width="100%">
											<table border="0" cellpadding="3" cellspacing="0" width="100%">
												<tbody>
													<tr>
														<th align="left" bgcolor="#6600ff" width="20%"> </th>
														<th height="26" width="50%"> <span class="G">EDITAR :: [ POSTULANTE ] </span></th>
														<th align="right" width="25%"> </th>
													</tr>
												</tbody>
											</table>
										</td>
									</tr>
								</tbody>
							</table>
						</td>
					</tr>
                  		<tr>
							<td colspan="5" class="marco seccionblank">&nbsp;</td>
                  		</tr>
						<tr>
		                  	<td height="20" colspan="5">
		                  		<table width="50%" border="0" cellpadding="0" cellspacing="0">
		                  			<tbody>
		                  				<tr>
			                  				<td  height="10" width="10">&nbsp;</td>
			                  				<td  align="left" width="90%"><span class="Estilo1">&nbsp;DATOS PERSONALES </span></td>
			                  				<td align="right" height="20"></td>
		                  				</tr>
		                  			</tbody>
		                  		</table>
		                  	</td>
						</tr>
						<tr valign="middle">
							<td class="marco" width="1%">&nbsp;</td>
		                  	<td class="etiqueta" align="right" width="20%">&nbsp;</td>
		                  	<td class="objeto" width="1%">&nbsp;</td>
		                  	<td class="objeto" width="72%">&nbsp;</td>
		                  	<td class="objeto" width="6%">&nbsp;</td>
		                </tr>
		                <tr valign="middle">
		                  	<td class="marco" width="1%">&nbsp;</td>
		                  	<td class="etiqueta" align="right" width="20%">Id postulante &nbsp;&nbsp;</td>
		                  	<td class="objeto" width="1%">&nbsp;</td>
		                  	<td class="objeto">
		                  		<input name="idpostulante"  type="text" class="cajatexto" id="idpostulante" onKeyPress="return formato(event,form,this,80)" value="<?=$idpostulante?>" size="50" maxlength="60" readonly></td>
                  			<td class="objeto" width="6%">&nbsp;</td>
                  		</tr>
						<tr valign="middle">
		                  	<td class="marco" width="1%">&nbsp;</td>
		                  	<td class="etiqueta" align="right" width="20%">Apellidos Paterno &nbsp;&nbsp;</td>
		                  	<td class="objeto" width="1%">&nbsp;</td>
		                  	<td class="objeto">
		                  		<input name="apepat"  type="text" class="cajatexto" id="apepat" onKeyPress="return formato(event,form,this,80)" value="<?=$apep?>" size="50" maxlength="60"></td>
                  			<td class="objeto" width="6%">&nbsp;</td>
                  		</tr>
	                  	<tr valign="middle">
	                  		<td class="marco">&nbsp;</td>
	                  		<td class="etiqueta" align="right">Apellidos Materno &nbsp;&nbsp;</td>
	                  		<td class="objeto">&nbsp;</td>
	                  		<td class="objeto"><input name="apemat"  type="text" class="cajatexto" id="apemat" onKeyPress="return formato(event,form,this,80)" value="<?=$apem?>" size="50" maxlength="60"></td>
	                  		<td class="objeto">&nbsp;</td>
	                  	</tr>
	                  	<tr valign="middle">
	                  		<td class="marco">&nbsp;</td>
	                  		<td class="etiqueta" align="right">Nombres&nbsp;&nbsp;</td>
	                  		<td class="objeto">&nbsp;</td>
	                  		<td class="objeto"><input name="txtnom"  type="text" class="cajatexto" id="txtnom" onKeyPress="return formato(event,form,this,80)" value="<?=$nom?>" size="50" maxlength="60"></td>
	                  		<td class="objeto">&nbsp;</td>
	                  	</tr>
                  		<tr valign="middle">
	                  		<td class="marco">&nbsp;</td>
	                  		<td class="etiqueta" align="right">Fecha de Nacimiento &nbsp;</td>
	                  		<td class="objeto">&nbsp;</td>
	                  		<td class="objeto">
                  				<input name="fefe"  type="text" class="cajatexto" id="fefe" onKeyPress="return formato(event,form,this,80)" value="<?php if($_GET["sw"]==3 || $_GET["sw"]==2 || $_GET["sw"]==4 ) echo ereg_replace('-','/',normal($fecnac));?>" size="15" maxlength="10"  onKeyUp="javascript:calcular_edad();">
                  				&nbsp; 
                  				<img src="imag/calendaricon.gif" onclick='popUpCalendar(this, form1.fefe, "dd/mm/yyyy")'   border="0" height="15" width="15"> 
                  			</td>
                  			<td class="objeto">&nbsp;</td>
                  		</tr>
                  		<tr valign="middle">
                  			<td class="marco">&nbsp;</td>
                  			<td class="etiqueta" align="right">Edad &nbsp;&nbsp;</td>
                  			<td class="objeto">&nbsp;</td>
							<td class="objeto">
								<input name="edad" type="text" class="cajatexto" id="edad" value="<?=$edad?>" size="5" maxlength="2" readonly>
							</td>
							<td class="objeto">&nbsp;</td>
						</tr>
						<tr valign="middle">
							<td class="marco" width="1%">&nbsp;</td>
							<td class="etiqueta" align="right" width="20%">Profesión o Ocup. &nbsp;&nbsp;</td>
							<td class="objeto" width="1%">&nbsp;</td>
							<td class="objeto" width="72%"><input name="profe"  type="text" class="cajatexto" id="profe" onKeyPress="return formato(event,form,this,80)" value="<?=$prof?>" size="64" maxlength="60"></td>
							<td class="objeto" width="6%">&nbsp;</td>
						</tr>
						<tr valign="middle">
							<td class="marco">&nbsp;</td>
							<td align="right" class="etiqueta">Estado Civil &nbsp;&nbsp;</td>
							<td class="objeto">&nbsp;</td>
							<td class="objeto">
								<select name="estadocivil"  class="cajatexto" id="cestadocivil">
									<option value="0">--Seleccion un estado--</option>
									<option value="SOLTERO" <?php if ($estado=='SOLTERO') {echo 'selected';} ?> >SOLTERO(A)</option>
									<option value="CASADO" <?php if ($estado=='CASADO') {echo 'selected';} ?>>CASADO(A)</option>
									<option value="VIUDO" <?php if ($estado=='VIUDO') {echo 'selected';} ?>>VIUDO(A)</option>
									<option value="DIVORCIADO" <?php if ($estado=='DIVORCIADO') {echo 'selected';} ?>>DIVORCIADO(A)</option>
									<option value="CONVIVIENTE" <?php if ($estado=='CONVIVIENTE') {echo 'selected';} ?>>CONVIVIENTE</option>
								</select>
								<!-- <input name="estadocivil"  type="text" class="cajatexto" id="xxxdepe4" onKeyPress="return formato(event,form,this,80)" value="<?=$estado?>" size="30" maxlength="40"> -->
							</td>
							<td class="objeto">&nbsp;</td>
						</tr>
						<tr valign="middle">
							<td height="18" class="marco">&nbsp;</td>
							<td class="etiqueta" align="right">Sexo &nbsp;&nbsp;</td>
							<td class="objeto">&nbsp;</td>
							<td class="objeto">
								<table width="200" border="0" cellpadding="0" cellspacing="0">
									<tr>
										<?php if ($sex=='F'){?> 
										<td>
											<input name="sexo" type="radio" value="M" >
											Masculino
										</td>
										<td>
											<input name="sexo" type="radio" value="F" checked>
											Femenino
										</td>
										<?php }else{?>
										<td>
											<input name="sexo" type="radio" value="M" checked>
											Masculino
										</td>
										<td>
											<input name="sexo" type="radio" value="F" >
											Femenino
										</td>
										<?php } ?>
									</tr>
								</table>
							</td>
							<td class="objeto">&nbsp;</td>
						</tr>
						<tr valign="middle">
							<td class="marco">&nbsp;</td>
							<td class="etiqueta" align="right">&nbsp;</td>
							<td class="objeto">&nbsp;</td>
							<td class="objeto">&nbsp;</td>
							<td class="objeto">&nbsp;</td>
						</tr>
						<tr valign="middle">
							<td class="marco">&nbsp;</td>
							<td class="etiqueta" align="right">Documento de Identidad  &nbsp;&nbsp;</td>
							<td class="objeto">&nbsp;</td>
							<td class="objeto">
								<table width="307" border="0" cellpadding="0" cellspacing="0">
									<tr>
										<td width="36">DNI</td>
										<td width="107">
											<!-- <input name="dni" type="text" class="cajatexto" id="dni" style="text-align: right;"  onKeyPress="return formato(event,form,this,8)"value="<?=$dni?>" size="8" maxlength="8"> -->
											<input name="dni" type="text" class="cajatexto" id="dni" style="text-align: right;"  onKeyPress="return solonumeros(event)" value="<?=$dni?>" size="8" maxlength="8" <?php if ($_GET["sw"]==3) {echo 'disabled';} ?> >
											<input name="dni2" type="hidden" class="cajatexto" id="dni2" style="text-align: right;"  onKeyPress="return solonumeros(event)" value="<?=$dni?>" size="8" maxlength="8" <?php if ($_GET["sw"]==4 || $_GET["sw"]==3) {echo 'readonly';} ?> >
										</td>
										<td width="32">C.E</td>
										<td width="90">
											<!-- <input name="ce" type="text" class="cajatexto" id="ce" style="text-align: right;" onFocus="replaceChars(this,',','')" onBlur="commaSplit(this,0,8,0)" onKeyPress="return formato(event,form,this,15,0)" value="<?=$ce?>" size="12" maxlength="20"> -->
											<input name="ce" type="text" class="cajatexto" id="ce" style="text-align: right;" onFocus="replaceChars(this,',','')" onBlur="commaSplit(this,0,8,0)" onKeyPress="return solonumeros(event)" value="<?=$ce?>" size="12" maxlength="9" <?php if ($_GET["sw"]==3) {echo 'disabled';} ?> >
											<input name="ce2" type="hidden" class="cajatexto" id="ce2" style="text-align: right;" onFocus="replaceChars(this,',','')" onBlur="commaSplit(this,0,8,0)" onKeyPress="return solonumeros(event)" value="<?=$ce?>" size="12" maxlength="9" <?php if ($_GET["sw"]==4 || $_GET["sw"]==3) {echo 'readonly';} ?> >
										</td>
										<td width="19">&nbsp;</td>
										<td width="23">&nbsp;</td>
									</tr>
            					</table>
							</td>	
        					<td class="objeto">&nbsp;</td>
    					</tr>
					    <tr valign="middle">
					    	<td class="marco">&nbsp;</td>
					    	<td class="etiqueta" align="right">&nbsp;</td>
					    	<td class="objeto">&nbsp;</td>
					    	<td class="objeto">&nbsp;</td>
					    	<td class="objeto">&nbsp;</td>
					    </tr>
					    <tr valign="middle">
					    	<td class="marco">&nbsp;</td>
					    	<td class="etiqueta" align="right">Estatura &nbsp;&nbsp;</td>
					    	<td class="objeto">&nbsp;</td>
					    	<td class="objeto"><input name="estatura" type="text" class="cajatexto" id="estatura"  onKeyPress="return formato(event,form,this,80)" value="<?=$est?>" size="8" maxlength="4"></td>
					    	<td class="objeto">&nbsp;</td>
					    </tr>
					    <tr valign="middle">
					    	<td class="marco">&nbsp;</td>
					    	<td class="etiqueta" align="right">Domicilio &nbsp;&nbsp;</td>
					    	<td class="objeto">&nbsp;</td>
					    	<td class="objeto">
					    		<select name="provincia" id="provincia" class="cajatexto" onchange="cargadistrito(0,0)" style="width: 100px;">
					    			<option value="0">---Provincia---</option>
					    			<?php 
					    			$pro= new provincia();
					    			$rs2=$pro->retornaLista();
					    			while ($n2=pg_fetch_array($rs2)) {
					    				?>
					    				<option value="<?php echo $n2[0]; ?> " <?php if($n2[0]==$provi){echo "selected";} ?>> <?php echo $n2[1]; ?></option>
				    				<?php 
					    				}
					    			?>
						    	</select>
    							<select name="distrito" id="distrito" class="cajatexto" style="width: 100px;"></select>
    							<input name="direccion"  type="text" class="cajatexto" id="direccion" onKeyPress="return formato(event,form,this,80)" value="<?=$dom?>" size="64">
    						</td>
    						<td class="objeto">&nbsp;</td>
    					</tr>
				    	<tr valign="middle">
				    		<td class="marco">&nbsp;</td>
				    		<td class="etiqueta" align="right">Teléfono &nbsp;&nbsp;</td>
				    		<td class="objeto">&nbsp;</td>
				    		<td class="objeto"><input name="telefono"  type="text" class="cajatexto" id="telefono"  value="<?=$tel?>" size="9" maxlength="9" onKeyPress="return solonumeros(event)"></td>
				    		<td class="objeto">&nbsp;</td>
				    	</tr>
				    	<tr valign="middle">
				    		<td class="marco">&nbsp;</td>
				    		<td class="etiqueta" align="right">Correo &nbsp;&nbsp;</td>
				    		<td class="objeto">&nbsp;</td>
				    		<td class="objeto"><input name="correo"  type="text" class="cajatexto" id="correo" onKeyPress="return formato(event,form,this,80)" value="<?=$correo?>" size="64" maxlength="64"></td>
				    		<td class="objeto">&nbsp;</td>
				    	</tr>
				    	<tr valign="middle">
							<td height="18" class="marco">&nbsp;</td>
							<td class="etiqueta" align="right">Donación de Órganos &nbsp;&nbsp;</td>
							<td class="objeto">&nbsp;</td>
							<td class="objeto">
								<table width="200" border="0" cellpadding="0" cellspacing="0">
									<tr>
										<?php if ($dona=='SI'){?> 
										<td>
											<input name="donacion" type="radio" value="NO" <?php if ($_GET["sw"]==3) {echo 'disabled';} else { if ($ss==1) {echo 'disabled';} else { if($ss==0){echo 'enabled';}}}?>>
											NO
										</td>
										<td>
											<input name="donacion" type="radio" value="SI" checked>
											SI
										</td>
										<?php }else{?>
										<td>
											<input name="donacion" type="radio" value="NO" checked>
											NO
										</td>
										<td>
											<input name="donacion" type="radio" value="SI" <?php if ($_GET["sw"]==3) {echo 'disabled';} else { if ($ss==1) {echo 'disabled';} else { if($ss==0){echo 'enabled';}}}?>>
											SI
										</td>
										<?php } ?>
									</tr>
								</table>
							</td>
							<td class="objeto">&nbsp;</td>
						</tr>
				    	<tr valign="middle">
				    		<td class="marco">&nbsp;</td>
				    		<td class="etiqueta" align="right">&nbsp;</td>
				    		<td class="objeto">&nbsp;</td>
				    		<td class="objeto">&nbsp;</td>
				    		<td class="objeto">&nbsp;</td>
				    	</tr>
    					<tr>
				          	<td colspan="7" height="30">
				          		<table border="0" cellpadding="3" cellspacing="1" width="100%">
				          			<tbody>
				          				<tr align="center">
				          					<td class="catBottom" colspan="7" height="28">
				          						<table border="0" cellpadding="0" cellspacing="0" width="100%">
				          							<tbody>
				          								<tr>
				          									<td align="left" width="100%">
				          										<input class="boton" name="btn_Grabar" value=".:: Grabar ::." type="submit">
				          									</td>
				          									<td width="50%"></td>
          													<td align="right" width="25%"></td>
				          								</tr>
				          							</tbody>
				          						</table>
				          					</td>
				          				</tr>
				          			</tbody>
				          		</table>
          					</td>
          				</tr>
      				</table>
  				</form>
			</td>
		</tr>
	</table></td>
</tr>
</tbody></table>
</body></html>