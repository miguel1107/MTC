<?php
session_start();
if(!isset($_SESSION["usuario"])){ header("location:index.php");}else{
	$horaactual=  date("H:i:s");
	$fechaactual=date("Y-m-d");
	//$horaactual= CURRENT_TIMESTAMP;
	include("comun/function.php");
	include ("conectar.php");
	$link=Conectarse();
	$certificado='no';
	switch ($_POST["tipotra"]) {
		case '1':
			$loc="location:listado_tramite.php";	
			$fechafin=suma_fechas($_POST["fechaexamen"],181);
			$estadotramite='1';
			$realizar=1;
			 	//************************
			$sq345="Select max(numero) from numeros where tipo='TRAMITE' ";
			$rs345=pg_query($link,$sq345); 
			while($reg345=pg_fetch_array($rs345)) { 
				$numerotramite=$reg345[0];
			}
			$nnrotramite=$numerotramite;
			$tramite=$nnrotramite;
			$certificado='si';
		 	//************************
			break;

		case '2':
			$loc="location:listado_tramite.php";
			$fechafin=suma_fechas($_POST["fechaexamen"],181);
			$estadotramite='1';
			$realizar=1;
				//************************
			$sq345="Select max(numero) from numeros where tipo='TRAMITE' ";
			$rs345=pg_query($link,$sq345); 
			while($reg345=pg_fetch_array($rs345)) { 
				$numerotramite=$reg345[0];
			}
			$nnrotramite=$numerotramite;
			$tramite=$nnrotramite;
			$certificado='si';
			if ($_POST['categoria']!=1) {
				$certificado='si';
			}
			    //************************
			break;

		case '3':
			$loc="location:listado_tramite.php";
			$fechafin=suma_fechas($_POST["fechaexamen"],181);
				 // $estadotramite='3';
			$estadotramite='1';
			$realizar=1;
			$certificado='si';
			$sq345="Select max(numero) from numeros where tipo='TRAMITE' ";
			$rs345=pg_query($link,$sq345); 
			while($reg345=pg_fetch_array($rs345)) { 
				$numerotramite=$reg345[0];
			}
			$nnrotramite=$numerotramite;
			$tramite=$nnrotramite;
			    //************************
			break;

		case '4':
			$loc="location:list_soli.php";
			$fechafin=date('d/m/Y');
			$estadotramite='4';
			$realizar=1;
			if($_POST["sw"]==3){
				$tramite=$_POST["idtramite"];
			}else{
				$sq3="Select max(numero) from numeros where tipo='SOLICITUD'";
					$rs3=pg_query($link,$sq3); // or die ("Error :$sq");
					while($reg3=pg_fetch_array($rs3)) { 
						$usuario=$reg3[0];
					}
					$tramite=$usuario;
					$suma=$usuario+1;
					$sql89="update numeros set numero='".$suma."' where tipo='SOLICITUD'";
					$sr89=pg_query($sql89); //or die ("Error : $sql");
			}
			break;

		case 'CANJE 2':
			$loc="location:listado_tramite.php";
			$fechafin=suma_fechas($_POST["fechaexamen"],181);
			$estadotramite='1';
			$realizar=1;
			  //************************
			$sq345="Select max(numero) from numeros where tipo='TRAMITE' ";
			$rs345=pg_query($link,$sq345); 
			while($reg345=pg_fetch_array($rs345)) { 
				$numerotramite=$reg345[0];
			}
			$nnrotramite=$numerotramite;
			$tramite=$nnrotramite;
			  //$tramite=$_POST["idtramite"];
			break;

		case 'CANJE 3':
			$loc="location:listado_tramite.php";
			$fechafin=suma_fechas($_POST["fechaexamen"],181);
			$estadotramite='1';
			$realizar=1;
			$sq345="Select max(numero) from numeros where tipo='TRAMITE' ";
			$rs345=pg_query($link,$sq345); 
			while($reg345=pg_fetch_array($rs345)) { 
				$numerotramite=$reg345[0];
			}
			$nnrotramite=$numerotramite;
			$tramite=$nnrotramite;
		    //************************
			break;

		case '7':
			$loc="location:list_soli.php";
			$fechafin=date('d/m/Y');
			$estadotramite='4';
			$realizar=1;
			if($_POST["sw"]==3){
				$tramite=$_POST["idtramite"];
			}else{
				$sq3="Select max(numero) from numeros where tipo='SOLICITUD'";
				  $rs3=pg_query($link,$sq3); // or die ("Error :$sq");
				  while($reg3=pg_fetch_array($rs3)) { 
				  	$usuario=$reg3[0];
				  }
				  $tramite=$usuario;
				  $suma=$usuario+1;
				  $sql89="update numeros set numero='".$suma."' where tipo='SOLICITUD'";
				  $sr89=pg_query($sql89); //or die ("Error : $sql");
			}
			break;
	}
			
	if($_POST["nroficha"]!='' && $_POST["fechaexamen"]!='' &&  $_POST["idcentro"]!=''){
		if ($_POST["tipotra"]=='1' || $_POST["tipotra"]=='2' || $_POST["tipotra"]=='CANJE 2' || $_POST["tipotra"]=='3' || $_POST["tipotra"]=='CANJE 3'){
			if($_POST["sw"]!=3){
				$sq3="Select max(numero) from numeros where tipo='TRAMITE' ";
				$rs3=pg_query($link,$sq3); // or die ("Error :$sq");
				while($reg3=pg_fetch_array($rs3)) { 
					$usuario=$reg3[0];
				}
				$idpost=$usuario;
				$suma=$usuario+1;
				$sql89="update numeros set numero='".$suma."' where tipo='TRAMITE'";
				$sr89=pg_query($sql89);
			}
		}
	}
	if(isset($realizar)){
		if($_POST["sw"]!=3){
			$sqk="Select max(numero) from numeros where tipo='SOLICITUDES' ";
			$rsk=pg_query($link,$sqk); 
			while($regk=pg_fetch_array($rsk)) { 
				$usuk=$regk[0];
			}
			$soli=$usuk;
			$solicitud=$soli;
			$sumasoli=$solicitud+1;
			$sql89="update numeros set numero='".$sumasoli."' where tipo='SOLICITUDES'";
			$sr89=pg_query($sql89); 
		}
		if($_POST["sw"]==3){
			$tramite=$_POST["idtramite"];
			$sql89="update postulante set nombres=E'".addslashes($_POST["txtnom"])."',apepat=E'".addslashes($_POST["apepat"])."',apemat=E'".addslashes($_POST["apemat"])."',fecnac='".$_POST["fefe"]."',edad='".$_POST["edad"]."',profesion='".$_POST["profe"]."',estadocivil='".$_POST["estadocivil"]."',dni='".$_POST["dni22"]."',lm='".$_POST["lm"]."',ce='".$_POST["ce22"]."',ci='".$_POST["ci"]."',sexo='".$_POST["sexo"]."',estatura='".$_POST["estatura"]."',domicilio='".$_POST["direccion"]."', correo='".$_POST['correo']."',telefono='".$_POST['telefono']."', iddistrito='".$_POST['distrito']."',donacion='".$_POST['donacion']."' where idpostulante='".$_POST["idpostulante"]."'";
			$sr89=pg_query($link,$sql89); //or die ("Error : $sql");
			
			if ($_POST["categoria"]=='7'){
				$sql_especial ="update tramite_espe set nrofichacurso ='".$_POST["nrofichacurso"]."', id_curso_especial='".$_POST["idcentrocurso"]."', tipotramite = '".$_POST["tipotra"]."',fechacurso = '".$_POST["fechacurso"]."', usuario = '".$_SESSION["usu"]."', licencia = '".$_POST["licencia"]."' where idtramite='".$tramite."'";
				$sr_especial=pg_query($link,$sql_especial); 
			}

			if($_POST["tipotra"]=='4'){
				$sq4="UPDATE tramite set idcategoria=".$_POST["categoria"].",sisgedo='".$_POST["sisgedo"]."' where idtramite='".$tramite."'";
				// echo $sq4;exit;
				$sq41=pg_query($link,$sq4);
			}
			
			
			if($_POST["tipotra"]!='4'){				
				$sql2="update tramite set nroficha='".$_POST["nroficha"]."',fechaini='".$_POST["fechaexamen"]."',fechafin='".$fechafin."',resultado='".$_POST["resultado"]."',restriccion='".$_POST["restricciones"]."',observacion='".$_POST["observacion"]."',idpostulante=".$_POST["idpostulante"].",idcategoria=".$_POST["categoria"].",idcentro=".$_POST["idcentro"].",fecha_inscripcion='".$_POST["expe_fecha"]."', tipotramite='".$_POST["tipotra"]."',sisgedo='".$_POST["sisgedo"]."' where idtramite='".$tramite."'";
				$sr2=pg_query($sql2);
				if ($_POST["categoria"]=='7'){
					$sql_especial ="update tramite_espe set nrofichacurso ='".$_POST["nrofichacurso"]."', id_curso_especial='".$_POST["idcentrocurso"]."', tipotramite = '".$_POST["tipotra"]."',fechacurso = '".$_POST["fechacurso"]."', usuario = '".$_SESSION["usu"]."', licencia = '".$_POST["licencia"]."' where idtramite='".$tramite."'";
					$sr_especial=pg_query($link,$sql_especial); 
				} 
			}else{
				$sql2="update tramite set resultado='".$_POST["resultado"]."',restriccion='".$_POST["restricciones"]."',observacion='".$_POST["observacion"]."',idpostulante=".$_POST["idpostulante"].",idcategoria=".$_POST["categoria"].",fecha_inscripcion='".$_POST["expe_fecha"]."', tipotramite='".$_POST["tipotra"]."' where idtramite='".$tramite."' ,sisgedo='".$_POST["sisgedo2"]."' ";
				$sr2=pg_query($link, $sql2); 
				
				if ($_POST["categoria"]=='7'){
					$sql_especial ="update tramite_espe set nrofichacurso ='".$_POST["nrofichacurso"]."', id_curso_especial='".$_POST["idcentrocurso"]."', tipotramite = '".$_POST["tipotra"]."',fechacurso = '".$_POST["fechacurso"]."', usuario = '".$_SESSION["usu"]."', licencia = '".$_POST["licencia"]."' where idtramite='".$tramite."'";
					$sr_especial=pg_query($link,$sql_especial); 
				}
			}			
			
			// if($_POST["tipotra"]=='1' || $_POST["tipotra"]=='2' || $_POST["tipotra"]=='CANJE 2' || $_POST["tipotra"]=='3' || $_POST["tipotra"]=='CANJE 3'){
			// 	header("location:listado_tramite.php");
			// }else{
			// 	header("location:list_soli.php");
			// }
		}else{
			if ($_POST["dni22"]=="" && $_POST["ce22"]=="") {
				if($_POST['dni']==""){
					$record=pg_query($link,"select * from postulante where ce='".$_POST["ce"]."'");	
				}else if($_POST['ce']==""){
					$record=pg_query($link,"select * from postulante where dni='".$_POST["dni"]."'");
				}	
			}else{
				if($_POST['dni22']==""){
					$record=pg_query($link,"select * from postulante where ce='".$_POST["ce22"]."'");	
				}else if($_POST['ce22']==""){
					$record=pg_query($link,"select * from postulante where dni='".$_POST["dni22"]."'");
				}
			}
			
//			echo pg_num_rows($record);exit;
			if(pg_num_rows($record) > 0){
				$sql89="update postulante set nombres=E'".addslashes($_POST["txtnom"])."',apepat=E'".addslashes($_POST["apepat"])."',apemat=E'".addslashes($_POST["apemat"])."',fecnac='".$_POST["fefe"]."',edad='".$_POST["edad"]."',profesion='".$_POST["profe"]."',estadocivil='".$_POST["estadocivil"]."',dni='".$_POST["dni22"]."',lm='".$_POST["lm"]."',ce='".$_POST["ce22"]."',ci='".$_POST["ci"]."',sexo='".$_POST["sexo"]."',estatura='".$_POST["estatura"]."',domicilio='".$_POST["direccion"]."', correo='".$_POST['correo']."',telefono='".$_POST['telefono']."', iddistrito='".$_POST['distrito']."' where dni='".$_POST["dni"]."',iddistrito='".$_POST["distrito"]."' ";
				$sr89=pg_query($link,$sql89); 
					  //////////// 	
				$sq3="SELECT idpostulante from postulante where dni='".$_POST["dni22"]."' ";
				$rs3=pg_query($link,$sq3); // or die ("Error :$sq");
				$reg3=pg_fetch_array($rs3);
				$usuarioidpost=$reg3[0];
				if($_POST["tipotra"]!='4'  || $_POST["tipotra"]=='7'){
					$sql2="insert into tramite (idtramite,nroficha,fechaini,fechafin,resultado,restriccion,observacion,idpostulante,idcategoria,idcentro,fecha_inscripcion,tipotramite,estado,nrosolicitud,usuario,sisgedo,hora) values(".$tramite.",'".$_POST["nroficha"]."','".$_POST["fechaexamen"]."','".$fechafin."','".$_POST["resultado"]."','".$_POST["restricciones"]."','".$_POST["observacion"]."',".$usuarioidpost.",".$_POST["categoria"].",".$_POST["idcentro"].",'".$_POST["expe_fecha"]."','".$_POST["tipotra"]."','".$estadotramite."','".$solicitud."','".$_SESSION["usu"]."','".$_POST["sisgedo"]."','".$horaactual."')";
					if ($_POST["categoria"]=='17'){
						$sql_especial ="insert into tramite_espe (idtramite,nrofichacurso,id_curso_especial,tipotramite,fechacurso, usuario, licencia) values(".$tramite.",'".$_POST["nrofichacurso"]."','".$_POST["idcentrocurso"]."','".$_POST["tipotra"]."','".$_POST["fechacurso"]."','".$_SESSION["usu"]."','".$_POST["licencia"]."',,'".$_POST["sisgedo"]."','".$horaactual."')";
						$sr_especial=pg_query($link,$sql_especial); 
					}
				}else{						
					$sql2="insert into tramite (idtramite,resultado,restriccion,observacion,idpostulante,idcategoria,fecha_inscripcion,tipotramite,estado,nrosolicitud,usuario,sisgedo,hora) values(".$tramite.",'".$_POST["resultado"]."','".$_POST["restricciones"]."','".$_POST["observacion"]."',".$usuarioidpost.",".$_POST["categoria"].",'".$_POST["expe_fecha"]."','".$_POST["tipotra"]."','".$estadotramite."','".$solicitud."','".$_SESSION["usu"]."','".$_POST["sisgedo"]."','".$horaactual."')";
					if ($_POST["categoria"]=='17'){
						$sql_especial ="insert into tramite_espe (idtramite,nrofichacurso,id_curso_especial, tipotramite,fechacurso, usuario,licencia) values(".$tramite.",'".$_POST["nrofichacurso"]."','".$_POST["idcentrocurso"]."','".$_POST["tipotra"]."','".$_POST["fechacurso"]."','".$_SESSION["usu"]."','".$_POST["licencia"]."')";
						$sr_especial=pg_query($link,$sql_especial); 
					}
				}							
				$sr2=pg_query($link,$sql2); 
			}else{
				$sql="insert into postulante (nombres,apepat,apemat,fecnac,edad,profesion,estadocivil,dni,lm,ce,ci,sexo,estatura,domicilio,correo,telefono,iddistrito,estado,donacion) values(E'".addslashes($_POST["txtnom"])."',E'".addslashes($_POST["apepat"])."',E'".addslashes($_POST["apemat"])."','".$_POST["fefe"]."','".$_POST["edad"]."','".$_POST["profe"]."','".$_POST["estadocivil"]."','".$_POST["dni"]."','".$_POST["lm"]."','".$_POST["ce"]."','".$_POST["ci"]."','".$_POST["sexo"]."','".$_POST["estatura"]."','".$_POST["direccion"]."','".$_POST["correo"]."','".$_POST["telefono"]."','".$_POST["distrito"]."','1','".$_POST["donacion"]."')";

				$sr=pg_query($link, $sql); 

				$sq3="Select max(idpostulante) from postulante ";
				$rs3=pg_query($link,$sq3); 
				while($reg3=pg_fetch_array($rs3)) { 
					$usuario=$reg3[0];
				}
				$idpost=$usuario;
				if($_POST["tipotra"]!='4' || $_POST["tipotra"]=='7'){			
					$sql2="insert into tramite (idtramite,nroficha,fechaini,fechafin,resultado,restriccion,observacion,idpostulante,idcategoria,idcentro,fecha_inscripcion,tipotramite,estado,nrosolicitud,usuario,sisgedo,hora) values('".$tramite."',".$_POST["nroficha"].",'".$_POST["fechaexamen"]."','".$fechafin."','".$_POST["resultado"]."','".$_POST["restricciones"]."','".$_POST["observacion"]."',".$idpost.",".$_POST["categoria"].",".$_POST["idcentro"].",'".$_POST["expe_fecha"]."','".$_POST["tipotra"]."','".$estadotramite."','".$solicitud."','".$_SESSION["usu"]."','".$_POST["sisgedo"]."','".$horaactual."')";
					
					$sr2=pg_query($link,$sql2);	

					if ($_POST["categoria"]=='7'){
						$sql_especial ="insert into tramite_espe (idtramite,nrofichacurso,id_curso_especial, tipotramite,fechacurso, usuario, licencia) values(".$tramite.",'".$_POST["nrofichacurso"]."','".$_POST["idcentrocurso"]."','".$_POST["tipotra"]."','".$_POST["fechacurso"]."','".$_SESSION["usu"]."','".$_POST["licencia"]."')";
						$sr_especial=pg_query($link,$sql_especial); 
					}
				}else{
					$sql2="insert into tramite (idtramite,resultado,restriccion,observacion,idpostulante,idcategoria,fecha_inscripcion,tipotramite,estado,nrosolicitud,usuario,sisgedo,hora) values('".$tramite."','".$_POST["resultado"]."','".$_POST["restricciones"]."','".$_POST["observacion"]."',".$idpost.",".$_POST["categoria"].",'".$_POST["expe_fecha"]."','".$_POST["tipotra"]."','".$estadotramite."','".$solicitud."','".$_SESSION["usu"]."','".$_POST["sisgedo"]."','".$horaactual."')";
					$sr2=pg_query($link,$sql2); 

					if ($_POST["categoria"]=='7'){
						$sql_especial ="insert into tramite_espe (idtramite,nrofichacurso,id_curso_especial, tipotramite,fechacurso, usuario, licencia) values(".$tramite.",'".$_POST["nrofichacurso"]."','".$_POST["idcentrocurso"]."','".$_POST["tipotra"]."','".$_POST["fechacurso"]."','".$_SESSION["usu"]."','".$_POST["licencia"]."')";
						$sr_especial=pg_query($link,$sql_especial); 
					}
				}
			}
		}
		if ($certificado=='si') {
			$fecha=$_POST['fechacurso'];
			//$fechas=strtotime($fecha);
			//$fecha1=date('Y-m-d',$fechas);
			//****
			//$fechass = new DateTime($fecha1);
			//$fechass->add(new DateInterval('P360D'));
			//$newmax=$fechass->format('d-m-Y');
			$newmax=suma_fechas($fecha,360);
			//echo $newmax.'-'.$fechanew;exit;
			$mesexte=substr($fecha, 3,2);
			if (substr($mesexte, 0, 1)=='0') {
				$mes=(int)(substr($mesexte, 1, 1));

			}else{
				$mes=(int)($mesexte);			
			}
			if ($mes<8) {
				$est='0';
			}else if($mes>=8){
				$est='1';
			}
			if ($_POST["sw"]==3) {
				$idtra=$_POST["idtramite"];
				$bussql="SELECT * FROM certificado_curso WHERE idtramite='".$idtra."'";
				$rrrr=pg_query($link,$bussql);
				if (pg_num_rows($rrrr)==0) {
					$sqlser="INSERT INTO certificado_curso(licencia, fecha_certificado, numero_ficha, idcurso,idtramite,estado,fechafin_certificado) VALUES ('".$_POST['licencia']."', '".$_POST['fechacurso']."', '".$_POST['nrofichacurso']."', '".$_POST['idcentrocurso']."', '".$tramite."','".$est."','".$newmax."');";
					// if ($est=='0') {
					// 	$aprobado='APROBADO('.$_POST['nomcentrocurso'].')';
					// 	$sqleva="INSERT INTO evaluacion(opcion, resultado, fecha, puntaje, idtramite, idexamen,idevaluador, fechapro, usuario, situacion, historia, ip_acceso,idhora, hora)VALUES ('1','".$aprobado."', '".$fechaactual."', '', '".$idtra."','1','', '".$_POST['fechacurso']."','".$_SESSION["usuario"]."', 'APERTURADO','','".$_SERVER['REMOTE_ADDR']."','','".$horaaactual."');";
					// }
				}else{
					$sqlser="UPDATE certificado_curso SET licencia='".$_POST['licencia']."', fecha_certificado='".$_POST['fechacurso']."', numero_ficha='".$_POST['nrofichacurso']."', idcurso='".$_POST['idcentrocurso']."',idtramite='".$tramite."',estado='".$est."', fechafin_certificado='".$newmax."' WHERE idtramite='".$idtra."'" ;
				}
				
			}else{
				$sqlser="INSERT INTO certificado_curso(licencia, fecha_certificado, numero_ficha, idcurso,idtramite,estado,fechafin_certificado) VALUES ('".$_POST['licencia']."', '".$_POST['fechacurso']."', '".$_POST['nrofichacurso']."', '".$_POST['idcentrocurso']."', '".$tramite."','".$est."','".$newmax."');" ;
				// if ($est=='0') {
				// 	$aprobado='APROBADO('.$_POST['nomcentrocurso'].')';
				// 	$sqleva="INSERT INTO evaluacion(opcion, resultado, fecha, puntaje, idtramite, idexamen,idevaluador, fechapro, usuario, situacion, historia, ip_acceso,idhora, hora)VALUES ('1','".$aprobado."', '".$fechaactual."', '', '".$idtra."','1','', '".$_POST['fechacurso']."','".$_SESSION["usuario"]."', 'APERTURADO','','".$_SERVER['REMOTE_ADDR']."','','".$horaaactual."');";
				// }
			}
			
			$ss=pg_query($link,$sqlser);
		}
		header($loc);
	}
}
?>