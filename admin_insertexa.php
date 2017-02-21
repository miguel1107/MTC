<?php
session_start();
if(!isset($_SESSION["usuario"])) header("location:index.php");

include ("conectar.php");

$link=Conectarse();
if($_POST["opcion"]==2){
	$sql="update preguntas set categoria='".$_POST["categoria"]."',pregunta='".$_POST["pregunta"]."',tipo='".$_POST["tipo"]."',respuesta='".$_POST["respuesta"]."' where idpregunta='".$_POST["idpre"]."' ";
	$sr=pg_query($sql) or die ("Error : $sql");
	
	/////////////////////
	 for($w=1;$w<=4;$w++){
				  if($w=='1'){
				  $cc='A';
				  }elseif($w=='2'){
				  $cc='B';				  
				  }elseif($w=='3'){
				  $cc='C';
				  }else{
				  $cc='D';	  
					  }
	/////////////////////
	if($_POST["respuesta"]==$cc){
	$valor='T';
	}else{
	$valor='F';
	}
	/////////////////////
	$sql5="update alternativas set descripcion='".$_POST["alter".$w.""]."',respuesta='".$valor."' where idalternativa='".$_POST["alternativa".$w.""]."'  and idpregunta='".$_POST["idpre"]."'";
	$sr5=pg_query($sql5);
	}
	
header("location:admin_examen.php?mensaje=K");
	
}else{

////////////////////////////////////
			if($_FILES['imagen']['size']>0){
			$filename=$_FILES['imagen']['name'];
			$temporal=$_FILES['imagen']['tmp_name'];
			$tem=$_FILES["imagen"]['type'];
			//$file=pathinfo($filename);
			$file=basename($filename);
			$path="exa/img/".$file."";
			$nom=$file;
			move_uploaded_file($temporal,$path);
			}else{
			$file='';
			}

			///// EN LA CONSULTA '".$fechasis.$file."'
			
/////////////////////////////////////

	$sql="insert into preguntas (categoria,pregunta,tipo,puntos,respuesta,imagen ) values('".$_POST["categoria"]."','".$_POST["pregunta"]."','".$_POST["tipo"]."','1','".$_POST["respuesta"]."','".$file."')";
	$sr=pg_query($sql);// or die ("Error : $sql");
	
	$sql55="select max(idpregunta) from preguntas";
	$rs=pg_query($link,$sql55) or die ("Error :$sq");
	while($reg=pg_fetch_array($rs)) { 
	$usuario=$reg[0];
	}
	$pregu=$usuario;
	/////////////////////
	 for($w=1;$w<=3;$w++){
				  if($w=='1'){
				  $cc='A';
				  }elseif($w=='2'){
				  $cc='B';				  
				  }elseif($w=='3'){
				  $cc='C';
				  }else{
				  $cc='D';	  
				  }
	/////////////////////
	if($_POST["respuesta"]==$cc){
	$valor='T';
	}else{
	$valor='F';
	}
	/////////////////////
	$sql5="insert into alternativas (idalternativa,idpregunta,descripcion,respuesta) values('".$cc."','".$pregu."','".$_POST["alter".$cc.""]."','".$valor."')";
	$sr5=pg_query($sql5);
	}
header("location:admin_exanew.php?mensaje=Y");
}
?>