<?php
//-------------FUNCION PARA CONECTARSE A LA BASE DE DATOS---------------
/*function Conectarse()
{
	$link=pg_connect("dbname=dblicencias port=5432 user=postgres password=postgres ");
return $link;
}*/

function suma_fechas($fecha,$ndias)
{
      if (preg_match("/[0-9]{1,2}\/[0-9]{1,2}\/([0-9][0-9]){1,2}/",$fecha))
              list($dia,$mes,$año)=split("/", $fecha);
      if (preg_match("/[0-9]{1,2}-[0-9]{1,2}-([0-9][0-9]){1,2}/",$fecha))
              list($dia,$mes,$año)=split("-",$fecha);
        $nueva = mktime(0,0,0, $mes,$dia,$año) + $ndias * 24 * 60 * 60;
        $nuevafecha=date("d-m-Y",$nueva);
      return ($nuevafecha);  
}
//-----------------------------------------------------------------------
//-------------CIERRA LA CONEXION DEL LA BASE DATOS----------------------
function CloseConexion(){
Global $link;
	pg_close($link);
}
//-----------------------------------------------------------------------
//-------------HALLA EL CODIGO AUTOGENERADO------------------------------
function autogenerado($tabla,$campocodigo,$numcaracteres){
Global $link;
	//para extraer de la derecha se multiplica por -1
	$numcaracteres=$numcaracteres*(-1);
	$rsTabla=pg_query($link,"select max($campocodigo) from $tabla");
	$ATabla=pg_fetch_array($rsTabla);
	$nreg=$ATabla[0];
	if($nreg>0)	{
		$rsTabla=pg_query($link,"select max($campocodigo) from $tabla");
		//pg_data_seek($rsTabla,$nreg-1);
		$ATabla=pg_fetch_array($rsTabla);
	}else{
	$ATabla=36765;
	}
	$cod=$ATabla[0]+1;
	//$cod=36765;
	$cod="000000".$cod;
	$generado=substr($cod,$numcaracteres);
	pg_free_result($rsTabla);
	return $generado;
}
//-----------------------------------------------------------------------
//-------------HALLA EL CODIGO AUTOGENERADO PARA TABLAS BASICAS-----------
function autogeneradobasico($tabla,$campocodigo,$numcaracteres){
Global $link;
	//para extraer de la derecha se multiplica por -1
	$numcaracteres=$numcaracteres*(-1);
	$rsTabla=pg_query($link,"select max($campocodigo) from $tabla");
	$ATabla=pg_fetch_array($rsTabla);
	$nreg=$ATabla[0];
	if($nreg>0)	{
		$rsTabla=pg_query($link,"select max($campocodigo) from $tabla");
		//pg_data_seek($rsTabla,$nreg-1);
		$ATabla=pg_fetch_array($rsTabla);
	}
	$cod=$ATabla[0]+1;
	//$cod=36765;
	$cod="000000".$cod;
	$generado=substr($cod,$numcaracteres);
	pg_free_result($rsTabla);
	return $generado;
}
//-----------------------------------------------------------------------
//-------------PAGINA LAS LISTAS-----------------------------------------
function paginar($sql,$tabla,$mantenimiento) {
Global $ordenarpor;
Global $ordenactual;
Global $sentido;
Global $pagina;
	$limite=5;
	$rs=pg_query($sql) or die("Error en la consulta");
	$totalfilas = pg_num_rows($rs); 
	if(empty($pagina))$pagina = 1; 
	$filainicial =  $pagina*$limite-($limite);

if(empty($ordenarpor))$ordenarpor = "1"; //por defecto el primer campo
//Sentido de ordenamiento Ascendente o Descendente
if($ordenactual==$ordenarpor){
	if($sentido=="Desc")		{
		$sentido="Asc";
	}else{
		$sentido="Desc";
	}
}else{
		$sentido="Asc";
}
$ordenactual=$ordenarpor; 
//empezando de $limite mostrar $limitevalor registros
	$rs_lim=pg_query("$sql Order By $ordenarpor $sentido Limit $filainicial, $limite") or die ("Error en el ordenamiento...");
	MostrarTabla($rs_lim,$tabla,$pagina,$ordenactual,$sentido);	
	
	if($pagina != 1) { 
		$paginaprevia= $pagina - 1; 
	} 
	echo "<table border=0 cellpadding=0 cellspacing=0 width=100%><tr align=center><td>";
	echo "<font size=2><b>P&aacute;ginas:&nbsp;</b></font>";
	$numpaginas = ceil($totalfilas/$limite); 
	for($i=1; $i <= $numpaginas; $i++) {
		if($i!=$pagina){
			echo "&nbsp;<font size=2><b><A HREF=".$PHP_SELF."?pagina=".$i."&ordenarpor=".$ordenarpor."&ordenacual=".$ordenactual."&sentido=".$sentido.">".$i."</A></b></font>&nbsp;";  
		}else{
			echo "&nbsp;<font size=2 color=ff0000><b>$i</b></font>&nbsp;";  
		}
	} 
	echo "</td></tr></table>";
	if(($totalfilas-($limite*$pagina)) > 0){ 
		$paginasgte = $pagina + 1; 
	}
pg_free_result($rs);
}
//-----------------------------------------------------------------------
//-------------MUESTRA LA LISTA DE REGISTROS-----------------------------
function MostrarTabla($rs,$tabla,$pagina,$ordenactual,$sentido){	
	$campos=pg_num_fields($rs);
	$numfilas=pg_num_rows($rs);
	$ancho='95%';if($campos<=3)$ancho='80%';
	echo "<form name=frmList action='grabar.php' method=post>";
	echo "<center>";
	echo "<table cellPadding=2 cellSpacing=0 width=$ancho>";
	echo "<tr><td width=60%><input type='hidden' name='pag' value='$tabla'>";
	include('mante.php');
	echo "</td><td width=40% align=right><font color='000000'>Registros:<b> ".$numfilas."</b>&nbsp;</font></td>";
	echo "</tr></table>";
	echo "<table cellPadding=2 cellSpacing=0 class=Mtabletd width=$ancho>";
	echo "<tr class=Mtr2>";
		echo "<td>&nbsp;<input name='allbox' type='checkbox' onClick='CA();' title='Seleccionar o anular la selección de todos los registros'></td>";
		for($i=0;$i<$campos;$i++){
			$campo=pg_field_name($rs,$i);
			echo "<td><a class=MA href=".$PHP_SELF."?pagina=".$pagina."&ordenarpor=".($i+1)."&ordenactual=".$ordenactual."&sentido=".$sentido." title='Ordenar por ".$campo."'>".$campo."</a></td>";
		} 
		echo "<td>OPCION</td>";
	echo "</tr>";
	while($filas=pg_fetch_array($rs)){
		echo "<tr>";
			echo "<td width=30>&nbsp;<input type='checkbox' name='check[]' value=".$filas[0]." onClick='CCA(this);'></td>";
			for($i=0;$i<$campos;$i++){
				if($i==0){
					echo "<td><a href=".strtolower($tabla).".php?id=".$filas[0]."&sw=2>$filas[$i]</a></td>";
				}else{
					echo "<td>".$filas[$i]."</td>";
				}
			}
			echo "<td><a href=".strtolower($tabla).".php?id=".$filas[0]."&sw=2>Editar</a></td>";
		echo "</tr>";
	}
	echo "</table>";
	echo "</center>";
	echo "</form>";
}
//-----------------------------------------------------------------------
//-------------LLENA EL COMBO--------------------------------------------
function llenarcombo($link,$tabla,$campos,$condicion,$seleccionado,$parametroselect,$name){
//Global $link;
$rs = pg_query($link,"select $campos from $tabla".$condicion);
echo "<select name=".$name." ".$parametroselect." class=Text>";
	echo "<option value=''>---- Seleccione Opción ----</option>";
	while($cur = pg_fetch_array($rs)){
		$seleccionar="";
		if($cur[0]==$seleccionado) $seleccionar="selected";
		echo "<option label=".$cur[0]." value=".$cur[0]." ".$seleccionar.">".$cur[1]."</option>";
	}
echo "</select>";
//pg_free_result($rs);
}
////////////////////////////////////////////////////////////////
function llenarcomboeva($link,$tabla,$campos,$condicion,$seleccionado,$parametroselect,$name,$estado){
//Global $link;
$rs = pg_query($link,"select $campos from $tabla where tipo= '$estado'".$condicion);
echo "<select name=".$name." ".$parametroselect." class=Text>";
	echo "<option value=''>---- Seleccione Opción ----</option>";
	while($cur = pg_fetch_array($rs)){
		$seleccionar="";
		if($cur[0]==$seleccionado) $seleccionar="selected";
		echo "<option value=".$cur[0]." ".$seleccionar.">".$cur[1]."</option>";
	}
echo "</select>";
//pg_free_result($rs);
}
//////////////////////////////////////////////////////////////////
function llenarcombopost($link,$tabla,$campos,$condicion,$seleccionado,$parametroselect,$name,$estado){
//Global $link;
$rs = pg_query($link,"select $campos from $tabla where estado like '$estado%'".$condicion);
echo "<select name=".$name." ".$parametroselect." class=Text>";
	echo "<option value=''>---- Seleccione Opción ----</option>";
	while($cur = pg_fetch_array($rs)){
		$seleccionar="";
		if($cur[0]==$seleccionado) $seleccionar="selected";
		echo "<option value=".$cur[0]." ".$seleccionar.">".$cur[1]."</option>";
	}
echo "</select>";
//pg_free_result($rs);
}
//-----------------------------------------------------------------------
//----------FUNCION PARA MOSTRAR LOS TITULOS-----------------------------
function Title($title){
	echo "<table width=95% align=center border=0 cellspacing=2 cellpadding=0>";
  echo "<tr align=center class='T'><td><font size=2><b>$title</b></td></tr>";
	echo "</table>";
}
//-----------------------------------------------------------------------
//----------FUNCION PARA MOSTRAR UNA PANTALLA DE Mensaje-------------------
function Msg($title,$message){
	echo "<html><head><title>Message</title><link href='../comun/style.css' rel=stylesheet type='text/css'></head><body>";
	echo "<div align=center><br><br><br>";
	echo "<table width=40% border=0 cellspacing=0 cellpadding=2>";
	echo "<tr class=T><td align=center height=30>$title</td></tr>";
	echo "<tr><td align=center height=150>$message</td></tr>";
	echo "<tr><td>&nbsp;</td></tr>";
	echo "<tr class=T><td>&nbsp;</td></tr>";
	echo "</table>";
	echo "</div></body></html>";
}

function cantidad_dias($t1,$t2){

/* convierte una fecha al timestamp tipo unix y como resultado da el numero de segundo */

$tot_segundos = (strtotime($t1)-strtotime($t2));    /* total de segundos */

$dias=(int)($tot_segundos/86400);    /* obtiene el numero de dias */
$tot_segundos=$tot_segundos- ($dias*86400);   /* lo resto para obtener el saldo */

$hora=(int)($tot_segundos/3600);   /* obtiene el numero de hora */
$tot_segundos=$tot_segundos- ($hora*3600);

$minuto=(int)($tot_segundos/60);     /* numero de minutos */
$tot_segundos=$tot_segundos- ($minuto*60);

$segundo = $tot_segundos;

/* el resultado se concatena en la variable $tiempo */

//$tiempo=$dias." Dias ".$hora.":".$minuto;
//return $tiempo;
return $dias;
}
	
?>