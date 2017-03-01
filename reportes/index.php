<?php
	include ("../conectar.php");
	$link=Conectarse();
	$tra=$_GET['tra'];
	$sis=$_GET['sis'];
	$sql="SELECT t.tipotramite,t.idcategoria,p.*
		FROM tramite t
		INNER JOIN postulante p on p.idpostulante=t.idpostulante
		WHERE t.idtramite='".$tra."'";
	$rs=pg_query($link,$sql);
	$datos=pg_fetch_array($rs);
	$tt=$datos[0];

		$echotra;
        $long=strlen($tt);
        if ($long==1) {
          $sql1="SELECT * FROM tipo_tramite WHERE id_tipo='".$tt."'";
          $rs1=pg_query($link,$sql1);
          $fila =pg_fetch_array($rs1);
          $echotra=$fila[1];
        }else if($long>1){
          $echotra=$tt;
        }
    $cat=$datos[1];
    $nom=$datos[3];
    $app=$datos[4];
    $apm=$datos[5];
?>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Formulario</title>
	<link rel="stylesheet" href="estilo.css">	
</head>
<body>
	<section class="flc">
		<!-- <div class="flc-head">
			<hr class="flc-head-hr">
			<hr class="flc-head-hr">
			<div class="flc-head-cont">
				<div class="flc-head-cont-cod">594588</div>
				<div class="flc-head-cont-tit">NORMAS LEGALES</div>
				<div class="flc-head-cont-dat">Martes 26 de Julio de 2016 / <img src="logo.jpg" alt="logo"></div>
			</div>
			<hr class="flc-head-hr">
			<hr class="flc-head-hr">
		</div> -->
		<div class="flc-slide">
			<img src="encabezado.JPG" alt="Portada del Miniterio">
		</div>
		<div class="flc-subtit">
			<p>" Año Internacional del Turismo Sostenible para el Desarrollo"</p>
			<p>"Año del buen servicio al ciudadano"</p>
		</div>
		<div class="flc-datos">
			<div class="flc-datos-iz">
				<div class="flc-datos-iz-tit">FORMULARIO DE SOLICITUD DE LICENCIA DE CONDUCIR</div>
				<div class="flc-datos-iz-subtit">(Con carácter de declaración jurada)</div>
			</div>
			<div class="flc-datos-de">
				<table>
					<tr>
						<td>N° SOLICITUD</td>
						<td><?php echo $sis; ?></td>
					</tr>
					<tr>
						<td>FECHA DE REGISTRO</td>
						<td></td>
					</tr>
					<tr>
						<td>CÓDIGO ZONAL</td>
						<td></td>
					</tr>
				</table>
			</div>
		</div>
		<table class="flc-tabla">
			<tr>
				<td style="width: 10%; padding: 0; border: none;"></td>
				<td style="width: 10%; padding: 0; border: none;"></td>
				<td style="width: 10%; padding: 0; border: none;"></td>
				<td style="width: 10%; padding: 0; border: none;"></td>
				<td style="width: 10%; padding: 0; border: none;"></td>
				<td style="width: 10%; padding: 0; border: none;"></td>
				<td style="width: 10%; padding: 0; border: none;"></td>
				<td style="width: 10%; padding: 0; border: none;"></td>
				<td style="width: 10%; padding: 0; border: none;"></td>
				<td style="width: 10%; padding: 0; border: none;"></td>
			</tr>
			<tr>
				<td colspan="10">A. SERVICIO SOLICITADO</td>
			</tr>
			<tr>
				<td colspan="10">
					<table>
						<tr>
							<td colspan="4"></td>
							<td colspan="5">
								<div class="flc-tabla-title">CANJE</div>
							</td>
						</tr>
						<tr>
							<td class="flc-tabla-check">
								<div class="flc-tabla-check-box"><?php if ($echotra=='NUEVO') {echo "X";} ?></div>
								<div class="flc-tabla-check-txt">NUEVO</div>
							</td>
							<td class="flc-tabla-check">
								<div class="flc-tabla-check-box"><?php if ($echotra=='REVALIDACION') {echo "X";} ?></div>
								<div class="flc-tabla-check-txt">REVALIDACION</div>
							</td>
							<td class="flc-tabla-check">
								<div class="flc-tabla-check-box"><?php if ($echotra=='RECATEGORIZACION') {echo "X";} ?></div>
								<div class="flc-tabla-check-txt">RECATEGORIZACIÓN</div>
							</td>
							<td class="flc-tabla-check">
								<div class="flc-tabla-check-box"><?php if ($echotra=='DUPLICADO') {echo "X";} ?></div>
								<div class="flc-tabla-check-txt">DUPLICADO</div>
							</td>
							<td class="flc-tabla-check">
								<div class="flc-tabla-check-box"><?php if ($echotra=='DIPLOMÁTICO EXTRANJEROS') {echo "X";} ?></div>
								<div class="flc-tabla-check-txt">DIPLOMÁTICO EXTRANJEROS</div>
							</td>
							<td class="flc-tabla-check">
								<div class="flc-tabla-check-box"><?php if ($echotra=='EXPEDIDA EN OTRO PAÍS') {echo "X";} ?></div>
								<div class="flc-tabla-check-txt">EXPEDIDA EN OTRO PAÍS</div>
							</td>
							<td class="flc-tabla-check">
								<div class="flc-tabla-check-box"><?php if ($echotra=='MODIFICACÓN DE LA INFORMACIÓN') {echo "X";} ?></div>
								<div class="flc-tabla-check-txt">MODIFICACÓN DE LA INFORMACIÓN</div>
							</td>
							<td class="flc-tabla-check">
								<div class="flc-tabla-check-box"><?php if ($echotra=='MILITAR O POLICIAL') {echo "X";} ?></div>
								<div class="flc-tabla-check-txt">MILITAR O POLICIAL</div>
							</td>
							<td class="flc-tabla-check">
								<div class="flc-tabla-check-box"><?php if ($echotra=='REFUGIADOS O AISLADOS') {echo "X";} ?></div>
								<div class="flc-tabla-check-txt">REFUGIADOS O AISLADOS</div>
							</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td colspan="4">
					<p>Indicar qué categoría de licencia de conducir solicita</p>
					<br>
					<p>LICENCIA DE CONDUCIR CLASE "A"</p>
					<br>
					<p>LICENCIA DE CONDUCIR CLASE "B"</p>
				</td>
				<td colspan="6" style="font-size: 0; padding: 18pt 12pt 2pt 12pt">
					<div class="flc-tabla-title" style="margin-bottom: 10pt">CATEGORÍAS</div>
					<div class="flc-tabla-check2"><i><span><?php if($cat=='1'){echo "X";}?></span></s></i><span>I</span></div>
					<div class="flc-tabla-check2"><i><span><?php if($cat=='2'){echo "X";}?></span></i><span>II A</span></div>
					<div class="flc-tabla-check2"><i><span><?php if($cat=='3'){echo "X";}?></span></i><span>II B</span></div>
					<div class="flc-tabla-check2"><i><span><?php if($cat=='4'){echo "X";}?></span></i><span>III A</span></div>
					<div class="flc-tabla-check2"><i><span><?php if($cat=='5'){echo "X";}?></span></i><span>III B</span></div>
					<div class="flc-tabla-check2"><i><span><?php if($cat=='6'){echo "X";}?></span></i><span>III C</span></div>
					<div class="flc-tabla-check2"><i><span><?php if($cat==''){echo "X";}?></span></i><span>I</span></div>
					<div class="flc-tabla-check2"><i><span><?php if($cat=='2'){echo "X";}?></span></i><span>II A</span></div>
					<div class="flc-tabla-check2"><i><span><?php if($cat=='3'){echo "X";}?></span></i><span>II B</span></div>
					<div class="flc-tabla-check2"><i><span><?php if($cat==''){echo "X";}?></span></i><span>II C</span></div>
				</td>
			</tr>
			<tr>
				<td colspan="10">B. DATOS DEL SOLICITANTE</td>
			</tr>
			<tr>
				<td colspan="7" class="flc-tabla-dato">
					<div>
						<span style="width: 40%">Nombres</span>
						<span style="width: 30%">Apellido Paterno</span>
						<span>Apellido Materno</span>
					</div>
				</td>
				<td colspan="3" class="flc-tabla-dato">
					<p>DISTRITO</p>
					<div></div>
				</td>
			</tr>
			<tr>
				<td colspan="7" class="flc-tabla-dato">
					<p>Dirección</p>
					<div>
						<span style="width: 40%">Departamento</span>
						<span style="width: 30%">Avenida/Calle/Jr.</span>
						<span>No.</span>
					</div>
				</td>
				<td colspan="3" class="flc-tabla-dato">
					<p>PROVINCIA</p>
					<div></div>
				</td>
			</tr>
			<tr>
				<td colspan="7" class="flc-tabla-dato">
					<p>DNI/C.E.</p>
					<div></div>
				</td>
				<td colspan="3" class="flc-tabla-dato">
					<p>REGIÓN</p>
					LAMBAYEQUE
					<div></div>
				</td>
			</tr>
			<tr>
				<td colspan="7" class="flc-tabla-dato">
					<p>CORREO ELECTRÓNICO</p>
					<div></div>
				</td>
				<td colspan="3" class="flc-tabla-dato">
					<p>TELÉFONO</p>
					<div></div>
				</td>
			</tr>
		</table>
		<div class="flc-foot">
			<div class="flc-foot-acep">
				<span></span>
				<p>Acepto recibir notificaciones de alerta antes del vencimiento de mi lincencia u otra información de los servicios brindados por Ministerio de Transportes y Comunicaciones</p>
			</div>
			<div class="flc-foot-entr">
				C. LUGAR DE ENTREGA DE LICENCIA DE CONDUCIR: <span>LAMBAYEQUE</span>
			</div>
			<div class="flc-foot-decl">
				Declaro bajo juramento conocer que, la tramitación y obtención de una licencia de conducir por parte del infractor cuya licencia se encuentra suspendida, cancelada o se encuentre inhabilitada para obtenerla motivará ser sancionado hasta con la inhabilitacion definitiva para obtener una licencia de conducir (Art. 317 del D.S. 025-2009-MTC).<br>
				Y conocer que, en caso de comprobar fraude o falsedad en la declaración, información o en la documentación presentada por el administrador, la autoridad administrativa podrá declarar la nulidad del acto administrativo sustentado en dicha declaración, información o documento así como imponer una multa de entre dos a cinco unidad impositivas tributarias, sin prejuicio del inicio de la acción penal en caso corresponda (Art. 32 de la Ley N° 27444)
			</div>
			<div class="flc-foot-fihu">
				<div class="flc-foot-fihu-fi">
					<span></span>
					Firma del Postulante
				</div>
				<div class="flc-foot-fihu-hu">
					<span></span>
					Huella Digital
				</div>
			</div>
		</div>
	</section>
</body>
</html>