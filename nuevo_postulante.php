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

?>
<html><head><title></title>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" media="screen" href="estilos/tabscreen.css">
<link rel="stylesheet" type="text/css" media="screen" href="css/autocomplete.css">
<link rel="stylesheet" type="text/css" media="all" href="estilos/menumx.css">
<link rel="stylesheet" type="text/css" media="print" href="estilos/tabprint.css">
<link rel="stylesheet" type="text/css" media="all" href="estilos/estilos.css">
<script type="text/javascript" src="estilos/libjsgen.js"> </script>
<script type="text/javascript" src="estilos/popcalendar.js"> </script>
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
	function validar(form1)
	{
		console.log("--------------------------------------");
		console.log("Apellido Paterno: " + form1.apepat.value);
		console.log("Apellido Materno: " + form1.apemat.value);
		console.log("Nombre: " + form1.txtnom.value);
		console.log("--------------------------------------");
		var $apaterno = form1.apepat.value;
		var $amaternos = form1.apemat.value;
		var $name = form1.txtnom.value;
		var $salida1 = '';
		var $salida2 = '';
		var $cont=0;
		console.log('tamaño de nombre: ' + $apaterno.length);
		for (var i = 0; i < $apaterno.length; i++) {
			var $aux = $apaterno.substring(i, (i+1));
			if($aux != "'") {
				$salida1 = $salida1+$aux;				
			}else {
				$cont = i;
				break;
			}
		};
		for (var i = $cont + 1; i < $apaterno.length; i++) {
			var $aux = $apaterno.substring(i, (i+1));
			$salida2 = $salida2+ $aux;
		};
		console.log("=====================");
		console.log("salida1: "+ $salida1);
		console.log("salida 2: "+ $salida2);
		console.log("======================");

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
		if (form1.fefe.value=="")
		{
			alert("Debe Ingresar Fecha de Programacion");
			form1.fefe.focus();
			return false;
		} 
		if (form1.edad.value=="")
		{
			alert("Debe Ingresar su Edad");
			form1.edad.focus();
			return false;
		} 
		if (form1.profe.value=="")
		{
			alert("Debe Ingresar su Profesion");
			form1.profe.focus();
			return false;
		} 

		if (form1.estadocivil.value=="")
		{
			alert("Debe Ingresar su Estado Civil");
			form1.estadocivil.focus();
			return false;
		}

		if (form1.dni.value!="")
		{
			var campo = form1.dni.value;
			if (campo.length!=8) {
				alert("Por Favor, Ingrese el DNI con 8 digitos.");
				form1.dni.focus();
				return (false);
			}
		}
		if (form1.ce.value!="")
		{
			var campo = form1.ce.value;
			if (campo.length!=9) {
				alert("Por Favor, Ingrese el Carnet Extranjeria con 9 digitos.");
				form1.ce.focus();
				return (false);
			}
		}
		if (form1.estatura.value=="")
		{
			alert("Debe Ingresar Estatura");
			form1.estatura.focus();
			return false;
		} 
		if (form1.direccion.value=="")
		{
			alert("Debe Ingresar Direccion");
			form1.direccion.focus();
			return false;
		}
		if (form1.correo.value==""){
			alert("Debe Ingresar Correo");
			form1.cooreo.focus();
			return false;
		}else{
			var co=form1.correo.value;
			if (co.includes('@')) {
			}else{
				alert('Le falta el @ al correo');
				form1.correo.focus;
			}
			
		}
		if (form1.tipotra.value!="4")
		{
			if (form1.fechaexamen.value==""){
				alert("Debe Ingresar Fecha de Exomen");
				form1.fechaexamen.focus();
				return false;
			}
			if (form1.nroficha.value==""){
				alert("Debe Ingresar No de Exomen");
				form1.nroficha.focus();
				return false;
			}
			if (form1.idcentro.value==""){
				alert("Debe Seleccionar Centro Modico");
				form1.idcentro.focus();
				return false;
			}
		}

	  /*ramite = document.getElementById("tipotramite");
	  if ( tramite.value  != ""){
	  	if (sel.value=="17" && tramite.value  != "RECATEGORIZACION" ){*/

	  		if (form1.categoria.value=="7" && form1.tipotra.value!="4")
	  		{
	  			if (form1.licencia.value==""){
	  				alert("Debe Ingresar Nro de Licencia");
	  				form1.licencia.focus();
	  				return false;
	  			}
	  			if (form1.nrofichacurso.value==""){
	  				alert("Debe Ingresar Nro de Ficha de Curso");
	  				form1.nrofichacurso.focus();
	  				return false;
	  			}
	  			if (form1.fechacurso.value==""){
	  				alert("Debe Ingresar Fecha del Curso");
	  				form1.fechacurso.focus();
	  				return false;
	  			}
	  			if (form1.idcentrocurso.value==""){
	  				alert("Debe Seleccionar Centro de Capacitacion");
	  				form1.idcentrocurso.focus();
	  				return false;
	  			}
	  		}else

	  		{
		/* if (form1.licencia.value==""){
		 alert("Debe Ingresar Nro de Licencia");
		 form1.licencia.focus();
		 return false;
		}*/

	}
	  ///***

	  var clave = form1.tipotra.value;  
	  var clave1 = form1.categoria.value;  
	/*if (clave=='NUEVO' && clave1!=1) { 
		alert("El tipo de Tromite no conciden, Verifique");
		form1.categoria.focus(); 
		return false;
	}*/
	if (clave=='2' && clave1==1) { 
		alert("El tipo de Tromite no conciden, Verifique");
		form1.categoria.focus(); 
		return false;
	}	
	  ///****
	  

	  
	  if (fefe != undefined && form1.fefe.value != "" ){
		 //calcular_edad();
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
             // return true;

         }
		  ////***
		  if (fechaexamen != undefined && form1.fechaexamen.value != "" ){
		  	if(form1.fechaexamen.value != ""){
		  		if (!/^\d{2}\/\d{2}\/\d{4}$/.test(fechaexamen.value)){
		  			alert("formato de fecha no volido (dd/mm/aaaa)");
		  			form1.fechaexamen.focus();
		  			return false;
		  		}
		  		var dia  =  parseInt(fechaexamen.value.substring(0,2),10);
		  		var mes  =  parseInt(fechaexamen.value.substring(3,5),10);
		  		var anio =  parseInt(fechaexamen.value.substring(6),10);
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
		  			form1.fechaexamen.focus();
		  			return false;
		  		}
		  		if (dia>numDias || dia==0){
		  			alert("Fecha introducida erronea");
		  			form1.fechaexamen.focus();
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
<script>
	function nombre(sel){
		var m=sel.label;
		for(var i=form1.categoria.options.length; i>=0; i--) {
			form1.categoria.remove(i);
		}
		if(m==1){  //NUEVO
			var cat = new Option();
			cat.value = "";
			cat.text = "---- Seleccione Opcion ----";
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
			
			var cat = new Option();
			cat.value = "7";
			cat.text = "AIV-especial";
			form1.categoria.options[form1.categoria.options.length] = cat;
		}else if(m==2){ //RECATEGORIZACION
			var cat = new Option();
			cat.value = "";
			cat.text = "---- Seleccione Opcion ----";
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
			
		}else if(m==3){  // REVALIDACION
			var cat = new Option();
			cat.value = "";
			cat.text = "---- Seleccione Opcion ----";
			form1.categoria.options[form1.categoria.options.length] = cat;
			var cat = new Option();
			cat.value = "4";
			cat.text = "AI";
			form1.categoria.options[form1.categoria.options.length] = cat;
			var cat = new Option();
			cat.value = "12";
			cat.text = "AII-a";
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
			
			var cat = new Option();
			cat.value = "7";
			cat.text = "AIV-especial";
			form1.categoria.options[form1.categoria.options.length] = cat;
		}else if(m==4){  //NUEVO
			var cat = new Option();
			cat.value = "";
			cat.text = "---- Seleccione Opcion ----";
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
			
			var cat = new Option();
			cat.value = "7";
			cat.text = "AIV-especial";
			form1.categoria.options[form1.categoria.options.length] = cat;
		}
	}
</script>

<script>
// function mostrarcurso() {
// 	tramite = document.getElementById("tipotramite");
// 	sel= document.getElementById("categoria");
// 	if ( tramite.value  != ""){
// 		if (sel.value=="7"){
// 		  	if (tramite.value  != "RECATEGORIZACION" ){
// 			   	divC = document.getElementById("especial");
// 			   	divC.style.display = "";
// 		  	}else{ 
// 				if (tramite.value  != "DUPLICADO" ){
// 					divC = document.getElementById("especial");
// 		        	divC.style.display="none";
// 				}
// 		  	}
// 		}else{
// 		   divC = document.getElementById("especial");
// 		   divC.style.display="none";
// 		}
// 	}	
// }
</script>

<SCRIPT LANGUAGE="JavaScript">
	<!--
	function buscarpostulante(evt,obj,lgd) {
		var nav4 = window.Event ? true : false;
		var key = nav4 ? evt.which : evt.keyCode;
		if (key==13){
			location.href=("nuevo_postulante.php?sw=4&liqui="+ obj.value +"");
			//tabu(form1,obj);
			return false;
		}
		if(obj.value.length >= lgd) {
			if(key!=9 && key!=0)
				return false;
		}
		return (key <= 13 || key==46 ||  (key >= 38 && key <= 57));
	}

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
							<td width="119" align="center" background="imag/div3.gif" ><nobr><b><a href="buscar_postulante.php"><b>&nbsp;&nbsp;<span class="G">Buscar</span>&nbsp;</b></a></b></nobr></td>	
							<td class="tabson" width="52"><img src="imag/div22.gif" alt="" border="0" height="36" width="29"></td>							
							<td width="119" align="center" background="imag/div1.gif" ><nobr><b><a href="nuevo_postulante.php"><b>Nuevo  Tramite</b></a></b></nobr></td>
							<td class="tabson" width="52"><img src="imag/div2.gif" alt="" border="0" height="36" width="29"></td>
							<td width="119" align="center" background="imag/div3.gif"><nobr><b><a href="listado_postulante.php"><b><span class="G">Lista   Postulante</span>&nbsp;&nbsp;</b></a></b></nobr></td>
							<td class="tabson" width="52"><img src="imag/div222.gif" alt="" border="0" height="36" width="29"></td>
							<td width="175" background="imag/div3.gif" >					    </td>
							<td width="175" background="imag/div3.gif" ><nobr><b><a href="listado_tramite.php"><b><span class="G">Lista de Tramite</span></b></a></b></nobr></td>
							<td class="tabsline" ><span class="tabson"><img src="imag/div222.gif" alt="" border="0" height="36" width="29"></span></td>
							<td  background="imag/div3.gif" ><nobr><b><a href="list_soli.php"><b><span class="G">Lista Solicitudes  </span></b></a></b></nobr> </td>
							<td class="tabsline" ><span class="tabson"><img src="imag/div222.gif" alt="" border="0" height="36" width="29"></span></td>
							<td  background="imag/div3.gif" ><nobr><b><a href="listado_tramites_anulados.php"><b><span class="G">Tramites Anulados</span></b></a></b></nobr> </td>
							<td class="tabsline" ><span class="tabson"><img src="imag/div222.gif" alt="" border="0" height="36" width="29"></span></td>
							<td  background="imag/div3.gif" ><nobr><b><a href="restaurar/listado_tramite_restaurados.php"><b><span class="G">Tramites Restaurados</span></b></a></b></nobr> </td>
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
						<?php 	
						$idpostulante=0;
						$fecha=date('d/m/Y');
		/////////////////////////////////////
						$sq3="Select max(numero) from numeros where tipo='TRAMITE' ";
		$rs3=pg_query($link,$sq3); // or die ("Error :$sq");
		while($reg3=pg_fetch_array($rs3)) 
			{	$usuario=$reg3[0];	}
		$idpost=$usuario;
		/////////////////////////////////////		

		$id=$idpost;
		if($_GET["sw"]==1){ 		// NUEVO
			$id=autogenerado($pag,"idproducto",6); 
		}
		if($_GET["sw"]==2){ 	// EDITAR
	///////////////////////////////////////////////
			$cant=count($_POST["chk"]);
			if($cant > 0)
			{
				foreach($_POST["chk"] as $k =>$v)
				{
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
			  //pg_free_result($rs);
				}
			}
		}

		if($_GET["sw"]==3){
			$sw=3;
			$cant=count($_POST["chk"]);
			if($cant > 0)
			{
				foreach($_POST["chk"] as $k =>$v)
				{
					$sql2="SELECT * FROM tramite WHERE idtramite='".$v."'";
					$rs2=pg_query($link,$sql2);
					$fila2 =pg_fetch_object($rs2);
					$id= $fila2->idtramite;
					$nrof= $fila2->nroficha;		
					$fechai= $fila2->fechaini;
					$fechaf= $fila2->fechafin;		
					$resu= $fila2->resultado;
					$rest= $fila2->restriccion;
					$obse = $fila2->observacion;
					$idpo = $fila2->idpostulante;
					$idcategoria = $fila2->idcategoria;
					$idcentro = $fila2->idcentro;
					$fecha = $fila2->fecha_inscripcion;
					$tiptra = $fila2->tipotramite;
					//--
						$nomcento;
					
	                	$sq="SELECT nombre FROM centro_medico WHERE idcentro='".$idcentro."'";
	                    $f=pg_query($link,$sq);
	                    $filatra=pg_fetch_array($f);
	                    $nomcento= $filatra[0];


                    //--

					if ($idcategoria =="7")
					{
						$sql_especial="select * from tramite_espe WHERE idtramite='".$v."'";
						$rs_especial=pg_query($link,$sql_especial);
						$fila_especial =pg_fetch_object($rs_especial);
						$nrofichacurso = $fila_especial->nrofichacurso;
						$id_curso= $fila_especial->id_curso_especial;
						$fechacurso = $fila_especial->fechacurso;
						$licencia = $fila_especial->licencia;

					}
				}
			}

	//foreach($_POST["chk"] as $k =>$v)
		//{
			$sql="SELECT * FROM postulante WHERE idpostulante='".$idpo."'";
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
		//pg_free_result($rs);

		}
	  //onSubmit="return true "

		if($_GET["sw"]==4){
			$filtro=$_GET["liqui"];
			$long=strlen($filtro);
			if ($long==9) {
				$sql="SELECT * FROM postulante WHERE ce='".$filtro."'";	
			}else if($long==8){
				$sql="SELECT * FROM postulante WHERE dni='".$filtro."'";	
			}
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
			//--
				$nomdis;
			
            	$sq2="SELECT nombre FROM distrito WHERE iddistrito='".$dis."'";
                $f2=pg_query($link,$sq2);
                $filatra2=pg_fetch_array($f2);
                $nomdis= $filatra2[0];
            //--

		}

		?>	

		<form name="form1" action="insertpost.php" method="post"  onSubmit="return validar(this)"><table class="frmline" align="center" border="0" cellpadding="0" cellspacing="0" width="50%">
			<tbody>
				<tr>
					<td colspan="7"><table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
						<tbody>
							<tr>
								<td colspan="3" width="100%"><table border="0" cellpadding="3" cellspacing="0" width="100%">
									<tbody>
										<tr>
											<th align="left" bgcolor="#6600ff" width="20%"> </th>
											<th height="26" width="50%"> <span class="G">EXPEDIENTES :: [ NUEVO TRAMITE ] </span></th>
											<th align="right" width="25%"> </th>
										</tr>
									</tbody>
								</table></td>
							</tr>
						</tbody>
					</table></td>
				</tr>
				<tr>
					<td colspan="5"><table width="700" border="0" cellpadding="0" cellspacing="0">
						<tbody>
							<tr>
								<td  height="10" width="6">&nbsp;</td>
								<td  align="left" width="221"><span class="Estilo1">&nbsp;DATOS DEL REGISTRO</span></td>
								<td width="159" height="20" align="right" ><div align="left">
									<input name="dni2" type="text" class="cajatexto" id="dni2" style="text-align: right;" onKeyPress="return buscarpostulante(event,this,9)"   value="<?=$dni?>" size="9">
								</div></td>
								<td width="216" align="right" ><span class="Estilo1">&nbsp;N&ordm; REGISTRO: </span></td>
								<td width="19" align="right" >&nbsp;</td>
								<td width="79" align="right" ><strong><?=$id?>
									<input name="idtramite" type="hidden" value="<?=$id?>"><input name="sw" type="hidden" value="<?=$sw?>"><input name="idpostulante" type="hidden" value="<?=$idpostulante?>"></strong>&nbsp;</td>
								</tr>
							</tbody>
						</table></td>
					</tr>
					<tr valign="middle">
						<td class="marco">&nbsp;</td>
						<td class="etiqueta" align="right">&nbsp;</td>
						<td class="objeto">&nbsp;</td>
						<td class="objeto"><?php if(isset($_GET["error"]))
							{
								if($_GET["error"] == "F")
									echo "<TABLE ><TR><TD align=center><Font size=2 color=red>[No se guardo el Registro, Es obligatorio llenar Fecha de Examen, N&ordm; de Ficha y Centro M&eacute;dico ]</Font></TD></TR></TABLE>";
							}
							?></td>
							<td class="objeto">&nbsp;</td>
						</tr>

						<tr valign="middle">
							<td class="marco" width="1%">&nbsp;</td>
							<td class="etiqueta" align="right" width="20%">FECHA DE REGISTRO &nbsp;&nbsp;</td>
							<td class="objeto" width="1%">&nbsp;</td>
							<td width="72%" class="objeto">
								<input name="expe_fecha" class="cajatexto" id="Fecha de Registro" onKeyPress="return formato(event,form,this,10)" value="<?php if($_GET["sw"]==3){ echo normal($fecha);}else{echo $fecha;}?>" size="20" maxlength="10" readonly type="text">
								&nbsp;</td>
								<td class="objeto" width="6%">&nbsp;</td>
							</tr>

							<tr valign="middle">
								<td height="19" class="marco">&nbsp;</td>
								<td class="etiqueta" align="right">TIPO DE TRAMITE &nbsp;</td>
								<td class="objeto">&nbsp;</td>
								<td class="objeto">
									<select name="tipotra" id="tipotramite" class="cajatexto" onchange="mostrarcurso()">
										<option value="0">---Seleccione Tipo---</option>
										<?php 
										$tipo= new tipotramite();
										$rs=$tipo->retornaLista();
										while ($n=pg_fetch_array($rs)) {
											?>
											<option value="<?php echo $n[0]; ?>"> <?php echo $n[1]; ?></option>
											<?php 
										}
										?>
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
									<td width="1%" height="18" class="marco">&nbsp;</td>
									<td class="etiqueta" align="right" width="20%">CATEGORA &nbsp;&nbsp;</td>
									<td class="objeto" width="1%">&nbsp;</td>
									<td class="objeto" width="72%">
										<select name="categoria" id="categoria" class="cajatexto" onchange="cursoespecial()">
										</select>
			  <!-- <?php if($_GET["sw"]==3){?>
			  <select name="categoria" class="cajatexto" id="categoria"  onkeypress="return formato(event,form,this)" onChange="mostrarcurso()">
            <option value=''>---- Seleccione Opcion ----</option>
					<?php if($idcategoria==1 || $idcategoria==2 || $idcategoria==3 || $idcategoria==7 || $idcategoria==8 || $idcategoria==9 || $idcategoria==10 || $idcategoria==11 || $idcategoria==17 ){?>
                        <option value="1" <?php if($idcategoria=='1') echo"selected"; ?>>AI</option>
                        <option  value="7" <?php if($idcategoria=='7') echo"selected"; ?>>AII-a</option>
                        <option  value="8" <?php if($idcategoria=='8') echo"selected"; ?>>AII-b</option>
                        <option  value="9" <?php if($idcategoria=='9') echo"selected"; ?>>AIII-a</option>
                        <option  value="10" <?php if($idcategoria=='10') echo"selected"; ?>>AIII-b</option>
                        <option  value="11" <?php if($idcategoria=='11') echo"selected"; ?>>AIII-c</option>
                        <option  value="17" <?php if($idcategoria=='17') echo"selected"; ?>>AIV-especial</option>
                    <?php }else{?>
                        <option  value="4" <?php if($idcategoria=='4') echo"selected"; ?>>AI.</option>
                        <option  value="12" <?php if($idcategoria=='12') echo"selected"; ?>>AII.-a</option>
                        <option value="13" <?php if($idcategoria=='13') echo"selected"; ?>>AII.-b</option>
                        <option value="14" <?php if($idcategoria=='14') echo"selected"; ?>>AIII.-a</option>
                        <option value="15" <?php if($idcategoria=='15') echo"selected"; ?>>AIII.-b</option>
                        <option value="16" <?php if($idcategoria=='16') echo"selected"; ?>>AIII.-c</option>
                        <option value="17" <?php if($idcategoria=='17') echo"selected"; ?>>AIV.-especial</option>
                   <?php }?>
                </select>
			 <?php }else{ //  OPCION TIPO?>
                <select name="categoria" class="cajatexto" id="categoria"  onkeypress="return formato(event,form,this)" onChange="mostrarcurso()">
                      <option value=''>---- Seleccione Opcion ----</option>
                      <option value="1" <?php if($tiptra=='AI') echo"selected"; ?>>AI</option>
                      <option value="7" <?php if($tiptra=='AII-a') echo"selected"; ?>>AII-a</option>
                      <option value="8" <?php if($tiptra=='AII-b') echo"selected"; ?>>AII-b</option>
                      <option value="9" <?php if($tiptra=='AIII-a') echo"selected"; ?>>AIII-a</option>
                      <option value="10" <?php if($tiptra=='AIII-b') echo"selected"; ?>>AIII-b</option>
                      <option value="11" <?php if($tiptra=='AIII-c') echo"selected"; ?>>AIII-c</option>
                      <option value="17" <?php if($tiptra=='AIV') echo"selected"; ?>>AIV-especial</option>
                          </select>
                          <?php }?> -->			  
                      </td>
                      <td class="objeto" width="6%">&nbsp;</td>
                  </tr>

                  <tr>
                  	<td colspan="5" class="marco seccionblank">&nbsp;</td>
                  </tr>
                  <tr>
                  	<td height="20" colspan="5"><table width="50%" border="0" cellpadding="0" cellspacing="0">
                  		<tbody>
                  			<tr>
                  				<td  height="10" width="10">&nbsp;</td>
                  				<td  align="left" width="90%"><span class="Estilo1">&nbsp;DATOS PERSONALES </span></td>
                  				<td align="right" height="20"><?=$idcategoria?></td>
                  			</tr>
                  		</tbody>
                  	</table></td>
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
                  			&nbsp; <img src="imag/calendaricon.gif" onclick='popUpCalendar(this, form1.fefe, "dd/mm/yyyy")'   border="0" height="15" width="15"> </td>
                  			<td class="objeto">&nbsp;</td>
                  		</tr>

                  		<tr valign="middle">
                  			<td class="marco">&nbsp;</td>
                  			<td class="etiqueta" align="right">Edad &nbsp;&nbsp;</td>
                  			<td class="objeto">&nbsp;</td>
<!--              <td class="objeto"><input name="edad"  type="text" class="cajatexto" id="edad" onKeyPress="return AceptaNumero(event);"  value="<?=$edad?>" size="5" maxlength="2"></td>
-->              <td class="objeto"><input name="edad"  type="text" class="cajatexto" id="edad" value="<?=$edad?>" size="5" maxlength="2" readonly></td>
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
			<option value="'0">--Seleccion un estado--</option>
			<option value="SOLTERO" <?php if ($estado=='SOLTERO') {echo 'selected';} ?> >SOLTERO</option>
			<option value="CASADO" <?php if ($estado=='CASADO') {echo 'selected';} ?>>CASADO</option>
			<option value="VIUDO" <?php if ($estado=='VIUDO') {echo 'selected';} ?>>VIUDO</option>
			<option value="DIVORCIADO" <?php if ($estado=='DIVORCIADO') {echo 'selected';} ?>>DIVORCIADO</option>
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
					Masculino</td>
					<td>
						<input name="sexo" type="radio" value="F" checked>
						Femenino</td>
						<?php }else{?>
						<td>
							<input name="sexo" type="radio" value="M" checked>
							Masculino</td>
							<td><input name="sexo" type="radio" value="F" >
								Femenino</td>

								<?php }?>
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
									<input name="dni" type="text" class="cajatexto" id="dni" style="text-align: right;"  onKeyPress="return solonumeros(event)" value="<?=$dni?>" size="8" maxlength="8" <?php if ($_GET["sw"]==4) {echo 'readonly';} ?> >
								</td>
								<td width="32">C.E</td>
								<td width="90">
									<!-- <input name="ce" type="text" class="cajatexto" id="ce" style="text-align: right;" onFocus="replaceChars(this,',','')" onBlur="commaSplit(this,0,8,0)" onKeyPress="return formato(event,form,this,15,0)" value="<?=$ce?>" size="12" maxlength="20"> -->
									<input name="ce" type="text" class="cajatexto" id="ce" style="text-align: right;" onFocus="replaceChars(this,',','')" onBlur="commaSplit(this,0,8,0)" onKeyPress="return solonumeros(event)" value="<?=$ce?>" size="12" maxlength="9" <?php if ($_GET["sw"]==4) {echo 'readonly';} ?> >
								</td>
								<td width="19">&nbsp;</td>
								<td width="23">&nbsp;</td>
							</tr>
                 <!-- <tr>
                    <td>LM</td>
                    <td><input name="lm" type="text" class="cajatexto" id="lm" style="text-align: right;"  onKeyPress="return formato(event,form,this,10)" value="<?=$lm?>" size="12" maxlength="10"></td>
                    <td>C.I</td>
                    <td><input name="ci" type="text" class="cajatexto" id="ci" style="text-align: right;" onFocus="replaceChars(this,',','')" onBlur="commaSplit(this,0,8,0)" onKeyPress="return formato(event,form,this,15,0)" value="<?=$ci?>" size="12" maxlength="20"></td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>-->
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
    		<select name="provincia" id="provincia" class="cajatexto" onchange="cargadistrito()" style="width: 100px;">
				<option value="0">---Provincia---</option>
				<?php 
				$pro= new provincia();
				$rs2=$pro->retornaLista();
				while ($n2=pg_fetch_array($rs2)) {
					?>
					<option value="<?php echo $n2[0]; ?>"> <?php echo $n2[1]; ?></option>
					<?php 
				}
				?>
			</select>
			<select name="distrito" id="distrito" class="cajatexto" style="width: 100px;"></select>

    		<input name="direccion"  type="text" class="cajatexto" id="direccion" onKeyPress="return formato(event,form,this,80)" value="<?=$dom?>" size="64"></td>
    	<td class="objeto">&nbsp;</td>
    </tr>

    <tr valign="middle">
    	<td class="marco">&nbsp;</td>
    	<td class="etiqueta" align="right">Teléfono &nbsp;&nbsp;</td>
    	<td class="objeto">&nbsp;</td>
    	<td class="objeto"><input name="telefono"  type="text" class="cajatexto" id="telefono" onKeyPress="return formato(event,form,this,80)" value="<?=$tel?>" size="9" maxlength="9"></td>
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
    	<td class="marco">&nbsp;</td>
    	<td class="etiqueta" align="right">&nbsp;</td>
    	<td class="objeto">&nbsp;</td>
    	<td class="objeto">&nbsp;</td>
    	<td class="objeto">&nbsp;</td>
    </tr>
    <tr>
    	<td colspan="5">
    		<div id="medico" style="display: block;">
				<table width="100%" border="0" cellpadding="0" cellspacing="0">
					<tbody>
						<tr>
					    	<td colspan="5">
					    		<table width="50%" border="0" cellpadding="0" cellspacing="0">
					    			<tbody>
					    				<tr>
						    				<td  height="10" width="10">&nbsp;</td>
						    				<td  align="left" width="215"><span class="Estilo1">&nbsp;DATOS DEL EXAMEN MEDICO </span></td>
						    				<td width="125" height="20" align="right"></td>
						    			</tr>
						    		</tbody>
					    		</table>
					    	</td>
					    </tr>
					    <tr valign="middle">
					    	<td class="marco">&nbsp;</td>
					    	<td class="etiqueta" align="right">&nbsp;</td>
					    	<td class="objeto">&nbsp;</td>
					    	<td class="objeto">&nbsp;</td>
					    	<td class="objeto">&nbsp;</td>
					    </tr>
					    <tr valign="middle">
					    	<td class="marco" width="1%">&nbsp;</td>
					    	<td class="etiqueta" align="right" width="20%">Fecha de Examen&nbsp;&nbsp;</td>
					    	<td class="objeto" width="1%">&nbsp;</td>
					    	<td class="objeto" width="72%">
					    		<input name="fechaexamen" type="text" class="cajatexto" id="fechaexamen" onKeyPress="return formato(event,form,this,80)" value="<?php if($_GET["sw"]==3 && $fechai!='') echo ereg_replace('-','/',normal($fechai));?>" size="15" maxlength="10"  <?php if($_GET["sw"]!=3  || $_SESSION["cargo"] == 1){?> enabled <?php } else { ?> disabled <?php } ?> >			  
					    		<? if($_GET["sw"]!=3 || $_SESSION["cargo"] ==1){?>  &nbsp; <img src="imag/calendaricon.gif" onclick='popUpCalendar(this, form1.fechaexamen, "dd/mm/yyyy")'   border="0" height="15" width="15"><? }?>
					    	</td>
					    	<td class="objeto" width="6%">&nbsp;</td>
					    </tr>
					    <tr valign="middle">
					    	<td class="marco" width="1%">&nbsp;</td>
					    	<td class="etiqueta" align="right" width="20%">N° de Ficha &nbsp;&nbsp;</td>
					    	<td class="objeto" width="1%">&nbsp;</td>
					    	<td class="objeto" width="72%">
					    		<input name="nroficha" type="text" class="cajatexto" id="nroficha" onKeyPress="return formato(event,form,this,9)" value="<?=$nrof?>" size="9">

								<input name="idcentro" type="hidden" class="cajatexto" value="<?php echo $idcentro; ?>" id="idcentro" style="width: 250px;" >
								<input name="nomcentro" type="text" class="cajatexto" value="<?php echo $nomcento; ?>" id="nomcentro" style="width: 250px;">
							</td>
							<td class="objeto" width="6%">&nbsp;</td>
						</tr>
						<tr valign="middle">
							<td class="marco" width="1%">&nbsp;</td>
							<td class="etiqueta" align="right" width="20%">Resultado&nbsp;&nbsp;</td>
							<td class="objeto" width="1%">&nbsp;</td>
							<td class="objeto" width="72%"><select name="resultado" class="cajatexto" id="resultado"  onkeypress="return formato(event,form,this)">
								<option value="APTO" <? if($resu=='APTO') echo"selected"; ?>APTO</option>
								<option value="NO APTO" <? if($resu=='NO APTO') echo"selected"; ?>NO APTO</option>
							</select></td>
							<td class="objeto" width="6%">&nbsp;</td>
						</tr>
						<tr valign="middle">
							<td class="marco" width="1%">&nbsp;</td>
							<td class="etiqueta" align="right" width="20%">Restricciones&nbsp;&nbsp;</td>
							<td class="objeto" width="1%">&nbsp;</td>
							<td class="objeto" width="72%"><select name="restricciones" class="cajatexto" id="restricciones"  onkeypress="return formato(event,form,this)">
								<option value="SIN RESTRICCIONES" <? if($rest=='SIN RESTRICCIONES') echo"selected"; ?>SIN RESTRICCIONES</option>
								<option value="CON RESTRICCIONES" <? if($rest=='CON RESTRICCIONES') echo"selected"; ?>CON RESTRICCOINES</option>
							</select></td>
							<td class="objeto" width="6%">&nbsp;</td>
						</tr>
						<tr valign="middle">
							<td class="marco" width="1%">&nbsp;</td>
							<td class="etiqueta" align="right" width="20%">Observacion&nbsp;&nbsp;</td>
							<td class="objeto" width="1%">&nbsp;</td>
							<td class="objeto" width="72%"><input name="observacion"  type="text" class="cajatexto" id="observacion" onKeyPress="return formato(event,form,this,80)" value="<?=$obse?>" size="60" maxlength="60"></td>
							<td class="objeto" width="6%">&nbsp;</td>
						</tr>
						<tr>
							<td colspan="5" class="marco seccionblank">&nbsp;</td>
						</tr>
					</tbody>
				</table>
			</div>
    	</td>
    </tr>

	<!-- CURSO DE PROFESIONALIZACION -->
	<tr>
		<td colspan="5">
			<?php if($_GET["sw"]==3) { ?>
				<div id="especial">              
			<?php } else { ?>
				<div id="especial" style="display: none;">              
			<?php }?>
					<table width="100%" border="0" cellpadding="0" cellspacing="0">
						<tbody>
							<tr>
								<td colspan="5"  align="left" width="215">
									<span class="Estilo1">
										&nbsp;DATOS DEL CURSO DE ESPECIALIZACION - CATEGORIA ESPECIAL
									</span>
								</td>
							</tr> 
						</tbody>
					</table>
					<table width="100%" border="0" cellpadding="0" cellspacing="0">
						<tbody>    
							<tr valign="middle">
								<td class="marco">&nbsp;</td>
								<td class="etiqueta" align="right">&nbsp;</td>
								<td class="objeto">&nbsp;</td>
								<td class="objeto">&nbsp;</td>
							</tr>
							<tr valign="middle">
								<td class="marco" width="1%">&nbsp;</td>
								<td class="etiqueta" align="right" width="20%">NUMERO DE LICENCIA</td>
								<td class="objeto" width="1%">&nbsp;</td>
								<td class="objeto" width="72%"><input name="licencia"  type="text" class="cajatexto" id="licencia" onKeyPress="return formato(event,form,this,80)" value="<?=$licencia?>" size="60" maxlength="60"></td>
								<td class="objeto" width="6%">&nbsp;</td>
							</tr>
							<tr valign="middle">
								<td class="marco" width="1%">&nbsp;</td>
								<td class="etiqueta" align="right" width="20%">Fecha de Curso de Profesionalizacion&nbsp;&nbsp;</td>
								<td class="objeto" width="1%">&nbsp;</td>
								<td class="objeto" width="72%">
								<input type="text" name="fechacurso" id="fechacurso" class="cajatexto" placeholder="24/04/2015">
									<!-- <input name="fechacurso" type="text" class="cajatexto" id="fechacurso" onKeyPress="return formato(event,form,this,80)" value="<?php if($_GET["sw"]==3 && $fechacurso!='') echo ereg_replace('-','/',normal($fechacurso)); ?>" size="15" maxlength="10">			  
									&nbsp; <img src="imag/calendaricon.gif" onclick='popUpCalendar(this, form1.fechaexamen, "dd/mm/yyyy")'   border="0" height="15" width="15"> -->
								</td>
							</tr>
								<tr valign="middle">
									<td class="marco" width="1%">&nbsp;</td>
									<td class="etiqueta" align="right" width="20%">N° de Ficha &nbsp;&nbsp;</td>
									<td class="objeto" width="1%">&nbsp;</td>
									<td class="objeto" width="72%">
										<input name="nrofichacurso" type="text" class="cajatexto" id="nrofichacurso" onKeyPress="return formato(event,form,this,9)" value="<?php echo $nrofichacurso ?>" size="9">
										<input name="idcentrocurso" type="hidden" class="cajatexto" id="idcentrocurso" style="width: 250px;" >
										<input name="nomcentrocurso" type="text" class="cajatexto" id="nomcentrocurso" style="width: 250px;">
										<!-- <?php
											$sqx="select * from curso_especial where estado='1' ";
                      						$rsx=pg_query($link,$sqx);// or die ("error : $sqx");
                      					?> 
                      					<select name="idcentrocurso" class="cajatexto" id="idcentrocurso">
                      						<option  value="">--------Seleccione --------</option>
                      						<?php while($rex=pg_fetch_array($rsx)) {?>
                      						<option value="<?php echo $rex[0]; ?>"  <?php if($rex[0]==$id_curso) echo "SELECTED"?>><?php echo $rex[1] ?>   </option>
                      						<?php } ?>
                      					</select>     --> 
                  					</td>
				            </tr>
				        </tbody>
      				</table>
  				</div>
			</td>
		</tr>

		<tr>
			<td colspan="5" class="marco seccionblank">&nbsp;</td>
		</tr>
		<!-- FIN DE REGISTRO DE CURSO DE PROFESIONALIZACION-->
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