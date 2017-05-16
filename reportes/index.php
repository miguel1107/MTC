<?php
	session_start();
	include ("../conectar.php");
	$link=Conectarse();
	$tra=$_GET['tra'];
	$sis=$_GET['sis'];
		$sql="SELECT t.tipotramite,t.idcategoria,t.fecha_inscripcion,p.*,t.usuario
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
    $fecins=$datos[2];
    $cat=$datos[1];
    	$categoria;
    	if ($long==1) {
          $sql3="SELECT * FROM categoria WHERE idcategoria='".$cat."'";
          $rs3=pg_query($link,$sql3);
          $filass =pg_fetch_array($rs3);
          $categoria=$filass[1];
        }else if($long>1){
          $categoria=$tt;
        }
    $nom=$datos[4];
    $app=$datos[5];
    $apm=$datos[6];
    $dni=$datos[11];
    $ce=$datos[13];
    $dir=$datos[17];
    $correo=$datos[18];
    $tel=$datos[19];
    $dis=$datos[20];
    $us=$datos[22];
    if ($dis!="") {
    	$sql2="SELECT * FROM provincia p inner join distrito d on d.idprovincia=p.idprovincia where d.iddistrito='".$dis."'";
	   	$ls=pg_query($link,$sql2);
	   	$da=pg_fetch_array($ls);
	   	$distrito=$da[4];
	   	$provincia=$da[1];	
    }

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Formulario</title>
	<link rel="stylesheet" href="estilo.css">	
</head>
<body>

	<section class="flc1 page">
		<!-- <div class="flc1-head">
			<hr class="flc1-head-hr">
			<hr class="flc1-head-hr">
			<div class="flc1-head-cont">
				<div class="flc1-head-cont-cod">594588</div>
				<div class="flc1-head-cont-tit">NORMAS LEGALES</div>
				<div class="flc1-head-cont-dat">Martes 26 de Julio de 2016 / <img src="logo.jpg" alt="logo"></div>
			</div>
			<hr class="flc1-head-hr">
			<hr class="flc1-head-hr">
		</div> -->
		<div class="flc1-slide">
			<img src="final.jpg" alt="Portada del Miniterio">
		</div>
		<div class="flc1-subtit">
			<p>"Año Internacional del Turismo Sostenible para el Desarrollo"</p>
			<p>"Año del Buen Servicio al Ciudadano"</p>
		</div>
		<div class="flc1-datos">
			<div class="flc1-datos-iz">
				<div class="flc1-datos-iz-tit">FORMULARIO DE SOLICITUD DE LICENCIA DE CONDUCIR</div>
				<div class="flc1-datos-iz-subtit">(Con carácter de declaración jurada)</div>
			</div>
			<div class="flc1-datos-de">
				<table>
					<tr>
						<td>N° SOLICITUD (SISGEDO)</td>
						<td><?php echo $sis; ?></td>
					</tr>
					<tr>
						<td>FECHA DE REGISTRO</td>
						<td><?php echo $fecins ?></td>
					</tr>
					<tr>
						<td>CÓDIGO ZONAL</td>
						<td></td>
					</tr>
				</table>
			</div>
		</div>
		<table class="flc1-tabla">
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
								<div class="flc1-tabla-title">CANJE</div>
							</td>
						</tr>
						<tr>
							<td class="flc1-tabla-check">
								<div class="flc1-tabla-check-box"><?php if ($echotra=='NUEVO') {echo "X";} ?></div>
								<div class="flc1-tabla-check-txt">NUEVO</div>
							</td>
							<td class="flc1-tabla-check">
								<div class="flc1-tabla-check-box"><?php if ($echotra=='REVALIDACION') {echo "X";} ?></div>
								<div class="flc1-tabla-check-txt">REVALIDACIÓN</div>
							</td>
							<td class="flc1-tabla-check">
								<div class="flc1-tabla-check-box"><?php if ($echotra=='RECATEGORIZACION') {echo "X";} ?></div>
								<div class="flc1-tabla-check-txt">RECATEGORIZACIÓN</div>
							</td>
							<td class="flc1-tabla-check">
								<div class="flc1-tabla-check-box"><?php if ($echotra=='DUPLICADO') {echo "X";} ?></div>
								<div class="flc1-tabla-check-txt">DUPLICADO</div>
							</td>
							<td class="flc1-tabla-check">
								<div class="flc1-tabla-check-box"></div>
								<div class="flc1-tabla-check-txt">DIPLOMÁTICO EXTRANJEROS</div>
							</td>
							<td class="flc1-tabla-check">
								<div class="flc1-tabla-check-box"></div>
								<div class="flc1-tabla-check-txt">EXPEDIDA EN OTRO PAÍS</div>
							</td>
							<td class="flc1-tabla-check">
								<div class="flc1-tabla-check-box"></div>
								<div class="flc1-tabla-check-txt">MODIFICACÓN DE LA INFORMACIÓN</div>
							</td>
							<td class="flc1-tabla-check">
								<div class="flc1-tabla-check-box"></div>
								<div class="flc1-tabla-check-txt">MILITAR O POLICIAL</div>
							</td>
							<td class="flc1-tabla-check">
								<div class="flc1-tabla-check-box"></div>
								<div class="flc1-tabla-check-txt">REFUGIADOS O AISLADOS</div>
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
					<div class="flc1-tabla-title" style="margin-bottom: 10pt">CATEGORÍAS</div>
					<div class="flc1-tabla-check2"><i><?php if($cat=='1'){echo "X";}?></i><span>I</span></div>
					<div class="flc1-tabla-check2"><i><?php if($cat=='2'){echo "X";}?></i><span>II A</span></div>
					<div class="flc1-tabla-check2"><i><?php if($cat=='3'){echo "X";}?></i><span>II B</span></div>
					<div class="flc1-tabla-check2"><i><?php if($cat=='4'){echo "X";}?></i><span>III A</span></div>
					<div class="flc1-tabla-check2"><i><?php if($cat=='5'){echo "X";}?></i><span>III B</span></div>
					<div class="flc1-tabla-check2"><i><?php if($cat=='6'){echo "X";}?></i><span>III C</span></div>
					<div class="flc1-tabla-check2"><i><?php if($cat==''){echo "X";}?></i><span>I</span></div>
					<div class="flc1-tabla-check2"><i><?php if($cat==''){echo "X";}?></i><span>II A</span></div>
					<div class="flc1-tabla-check2"><i><?php if($cat==''){echo "X";}?></i><span>II B</span></div>
					<div class="flc1-tabla-check2"><i><?php if($cat==''){echo "X";}?></i><span>II C</span></div>
				</td>
			</tr>
			<tr>
				<td colspan="10">B. DATOS DEL SOLICITANTE</td>
			</tr>
			<tr>
				<td colspan="7" class="flc1-tabla-dato">
					<p>NOMBRES Y APELLIDOS</p>
					<p class="flc1-tabla-dato-txt">
						<span style="width: 100%"><?php echo $nom; ?>&nbsp;,<?php echo $app ?>&nbsp;<?php echo $apm ?></span>
					</p>
					<div>
						<span style="width: 60%">Nombres / Apellido Paterno / Apellido Materno</span>
					</div>
				</td>
				<td colspan="3" class="flc1-tabla-dato">
					<p>DISTRITO</p>
					<p class="flc1-tabla-dato-txt">
						<span> <?php echo $distrito; ?></span>
					</p>
					<div></div>
				</td>
			</tr>
			<tr>
				<td colspan="7" class="flc1-tabla-dato">
					<p>Dirección</p>
					<p class="flc1-tabla-dato-txt">
						<span style="width: 100%"><?php echo $dir; ?></span>
					</p>
					<div>
						<span style="width: 100%">Departamento / Avenida/Calle/Jr.   /   No.</span>
					</div>
				</td>
				<td colspan="3" class="flc1-tabla-dato">
					<p>PROVINCIA</p>
					<p class="flc1-tabla-dato-txt">
						<span> <?php echo $provincia; ?></span>
					</p>
					<div></div>
				</td>
			</tr>
			<tr>
				<td colspan="7" class="flc1-tabla-dato">
					<p>DNI/C.E.</p>
					<p class="flc1-tabla-dato-txt">
						<span style="width: 50%">
							<?php
								if ($dni=="") {
								 	echo $ce;
								}else if ($ce==""){ 
									echo $dni;
								} 
								
							?>
						</span>
					</p>
					<div></div>
				</td>
				<td colspan="3" class="flc1-tabla-dato">
					<p>REGIÓN</p>
					<p class="flc1-tabla-dato-txt">
						<span style="width: 100%">LAMBAYEQUE</span>
					</p>
					<div></div>
				</td>
			</tr>
			<tr>
				<td colspan="7" class="flc1-tabla-dato">
					<p>CORREO ELECTRÓNICO</p>
					<p class="flc1-tabla-dato-txt">
						<span><?php echo $correo; ?></span>
					</p>
					<div></div>
				</td>
				<td colspan="3" class="flc1-tabla-dato">
					<p>TELÉFONO</p>
					<p class="flc1-tabla-dato-txt">
						<span style="width: 40%"><?php echo $tel ?></span>
					</p>
					<div></div>
				</td>
			</tr>
		</table>
		<div class="flc1-foot">
			<div class="flc1-foot-acep">
				<span></span>
				<p>Acepto recibir notificaciones de alerta antes del vencimiento de mi lincencia u otra información de los servicios brindados por Ministerio de Transportes y Comunicaciones</p>
			</div>
			<div class="flc1-foot-entr">
				C. LUGAR DE ENTREGA DE LICENCIA DE CONDUCIR <span> LAMBAYEQUE</span>
			</div>
			<div class="flc1-foot-decl">
				Declaro bajo juramento conocer que, la tramitación y obtención de una licencia de conducir por parte del infractor cuya licencia se encuentra suspendida, cancelada o se encuentre inhabilitada para obtenerla motivará ser sancionado hasta con la inhabilitacion definitiva para obtener una licencia de conducir (Art. 317 del D.S. 025-2009-MTC).<br>
				Y conocer que, en caso de comprobar fraude o falsedad en la declaración, información o en la documentación presentada por el administrador, la autoridad administrativa podrá declarar la nulidad del acto administrativo sustentado en dicha declaración, información o documento así como imponer una multa de entre dos a cinco unidad impositivas tributarias, sin prejuicio del inicio de la acción penal en caso corresponda (Art. 32 de la Ley N° 27444)
			</div>
			<div class="flc1-foot-fihu">
				<div class="flc1-foot-fihu-fi">
					<span></span>
					Firma del Postulante
				</div>
				<div class="flc1-foot-fihu-hu">
					<span></span>
					Huella Digital
				</div>
			</div>
		</div>
		<div class="fl2-s2-no" width="10%"><?php echo $_SESSION["usu"].'-'. date('d/m/Y H:i:s').'-N° Tra:'.$tra?></div>
	</section>

	<section class="flc2 page">

		<div class="flc2-s1">
			<p class="flc2-s1-ti">D. RESPONSABLES DEL SERVICIO DE LICENCIAS DE CONDUCIR</p>
			<div class="flc2-s1-co">
				<div>
					<span><?php echo $us; ?></span>
				</div>
				<p>Sello o firma del responsable de aceptar el trámite y asignar el número de registro</p>
			</div>
			<div class="flc2-s1-co">
				<div>
					<span></span>
				</div>
				<p>Sello o firma del responsable de impresión y laminado del documento de respuesta</p>
			</div>
			<div class="flc2-s1-co">
				<div>
					<span></span>
				</div>
				<p>Sello o firma del responsable del control de calidad del documento de respuesta</p>
			</div>
			<div class="flc2-s1-co">
				<div>
					<span></span>
				</div>
				<p>Sello o firma del responsable del área de emisión del documento de respuesta</p>
			</div>
		</div>

		<div class="flc2-s2">
			<p class="flc2-s2-ti">E. RESPONSABLES DEL SERVICIO DE LICENCIAS DE CONDUCIR</p>
			<div class="flc2-s2-co">
				<div>
					<span>Firma del Jefe de Licencias de Conductor</span>
				</div>
			</div>
			<div class="flc2-s2-co">
				<div>
					<span>Firma del Director de Circulación Terrestre</span>
				</div>
			</div>
		</div>
		<div class="fl2-s2-no" width="100%"><?php echo $_SESSION["usu"].' - '.date('d/m/Y H:i:s').'- N°Tra :'.$tra ?></div>
		<div style="width: 100px; height: 480px; ">  </div>
		<div class="flc2-sep">---------------------------------------------------------------------------------------------------------------------------------------</div>
	

		<table class="flc2-s3">
			<tr>
				<td style="width: 81.6%" class="flc2-s3-ti">
					SOLICITUD PARA ATENCION DE SERVICIOS<br>
					<span>DE LICENCIA DE CONDUCIR</span>
					<p><?php echo $_SESSION["usu"].' - '.date('d/m/Y H:i:s').' - N°Tra :'.$tra?></p>
				</td>
				<td style="width: 0.5%" class="flc2-s3-se"></td>
				<td style="width: 20.5%" class="flc2-s3-de">
					N° DE<br>REGISTRO (SISGEDO):<br><?php echo $sis ?>
				</td>
			</tr>
		</table>

		<div class="flc2-s4">
			<div class="flc2-s4-wrap">
				<table>
					<tr>
						<td rowspan="2" style="width: 70%" class="flc2-s4-dat">
							<p>Nombres y Apellidos del Solicitante</p>
							<div><?php echo $nom.' '.$app.' '.$apm; ?>  -  <?php if ($dni=="") {
								 	echo $ce;
								}else if ($ce==""){ 
									echo $dni;
								} ?></div>
							<span>
								Firma de conformidad de usuario A Recibir<br>
								el Documento de Respuesta
							</span>
							<div><?php echo $echotra.' - '.$categoria; ?></div>
						</td>
						<td class="flc2-s4-fec">
							Fecha de Recepción
							<span><?php echo $fecins ?></span>
						</td>
					</tr>
					<tr>
						<td align="center"><strong>SELLO</strong>
							<br>
							<br>
							<br>
							<br>
							<br>
							<br>
							<br>
						</td>
					</tr>
				</table>
			</div>
		</div>

	</section>
</body>
</html>