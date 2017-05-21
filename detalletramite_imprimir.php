<?php
session_start();
if(!isset($_SESSION["usuario"])) header("location:index.php");
require ("traducefecha.php");
include ("conectar.php");
$link=Conectarse();
		$sql2="SELECT * FROM postulante p INNER JOIN tramite t ON p.idpostulante=t.idpostulante  INNER JOIN categoria c on c.idcategoria=t.idcategoria  WHERE t.idtramite='".$_GET["idtramite"]."'";
		
		$rs2=pg_query($link,$sql2);
		$fila2 =pg_fetch_array($rs2);

		$tra=$_GET['id'];
		$sql27="SELECT p.nombres, p.apepat, p.apemat, t.fechaini, t.fechafin, t.nroficha, t.idcentro,t.idtramite,t.tipotramite, c.nombre , t.usuario, p.dni, t.nrosolicitud,t.sisgedo  FROM postulante p INNER JOIN tramite t ON p.idpostulante=t.idpostulante inner join categoria c on t.idcategoria=c.idcategoria WHERE t.idtramite='".$_GET["idtramite"]."'";
		// echo $sql27;exit;
		$rs2=pg_query($link,$sql27);
		$fila27 =pg_fetch_array($rs2);

		$sql27="SELECT * FROM centro_medico WHERE idcentro='".$fila2[27]."'";
		$rs27=pg_query($link,$sql27);
		$fila27 =pg_fetch_array($rs27);
		$dafu1=$fila2[26];
		$dafu2=$fila2[32];
		
		 if ( $fila2[23] =="17"){
		$sql_especial="select * from tramite_espe WHERE idtramite='".$_GET["idtramite"]."'";
		$rs_especial=pg_query($link,$sql_especial);
		$fila_especial =pg_fetch_array($rs_especial);
		}

		//--
$link=Conectarse();
	$sql22="SELECT p.nombres, p.apepat, p.apemat, t.fechaini, t.fechafin, t.nroficha, t.idcentro,t.idtramite,t.tipotramite, c.nombre , t.nrosolicitud FROM postulante p INNER JOIN tramite t ON p.idpostulante=t.idpostulante inner join categoria c on t.idcategoria=c.idcategoria WHERE t.idtramite='".$_GET["idtramite"]."'";
	// echo $sql22;exit;
	$rs2=pg_query($link,$sql22);
	$fila22 =pg_fetch_array($rs2);
	//--
	$echotra;
	$tra=$fila22[8];
	  $long=strlen($tra);  
	  if ($long==1) {
	    $sq="SELECT nombre FROM tipo_tramite WHERE id_tipo='".$tra."'";
	    $f=pg_query($link,$sq);
	    $filatra=pg_fetch_array($f);
	    $echotra =$filatra[0];
	  }else{
	    $echotra=$tra;
	  }     
//--

require('pdf/fpdf.php');

class PDF extends FPDF
{
function Footer()
{
	$link=Conectarse();
	$sql2="SELECT * FROM postulante p INNER JOIN tramite t ON p.idpostulante=t.idpostulante  INNER JOIN categoria c on c.idcategoria=t.idcategoria  WHERE t.idtramite='".$_GET["idtramite"]."'";
	// echo $sql2;exit;
	$rs2=pg_query($link,$sql2);
	$fila2 =pg_fetch_array($rs2);

$link=Conectarse();
	$tra=$_GET['id'];
	$sql27="SELECT p.nombres, p.apepat, p.apemat, t.fechaini, t.fechafin, t.nroficha, t.idcentro,t.idtramite,t.tipotramite, c.nombre , t.usuario, p.dni, t.nrosolicitud,t.sisgedo  FROM postulante p INNER JOIN tramite t ON p.idpostulante=t.idpostulante inner join categoria c on t.idcategoria=c.idcategoria WHERE t.idtramite='".$_GET["idtramite"]."'";
	// echo $sql27;exit;
	$rs2=pg_query($link,$sql27);
	$fila27 =pg_fetch_array($rs2);
		$echotra;
	$tra=$fila27[8];
	  $long=strlen($tra);  
	  if ($long==1) {
	    $sq="SELECT nombre FROM tipo_tramite WHERE id_tipo='".$tra."'";
	    $f=pg_query($link,$sq);
	    $filatra=pg_fetch_array($f);
	    $echotra =$filatra[0];
	  }else{
	    $echotra=$tra;
	  }                     
	//--


    $this->SetY(-20);
	$this->SetFont('Arial','B',20);
	$this->SetX(30);
	$this->Cell(85,5,$echotra,0,0,'R',1);
	$this->Cell(10,5,$fila2[39],0,1,'L',1);
	$this->SetFont('Arial','B',9);
	$this->Cell(19,5,'',0,0,'R',0);
	$this->Cell(15,2,'Fecha de Impresion:',0,0,'R',0);
	$fechadiaria=date('d/m/Y');
	$this->Cell(20,2,$fechadiaria,0,1,'L',0);
	
	 if ( $fila2[23] =="17"){
		$sql_especial="select * from tramite_espe WHERE idtramite='".$_GET["idtramite"]."'";
		$rs_especial=pg_query($link,$sql_especial);
		$fila_especial =pg_fetch_array($rs_especial);
		}

	$this->Cell(200,-8,'',0,1,'R',0);
	$this->Cell(190,1,'Firma Jefe Dpto. Expedición',0,0,'R',0);
	$this->Cell(1,-12,'________________________',0,0,'R',0);
}
}
//$pdf=new FPDF();
$pdf=new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetTitle('PDF via PHP');
//Set font and colors
$pdf->SetFont('Arial','B',9); //$pdf->SetFont('family','style',size);
$pdf->SetFillColor(255,255,255); //Color de Fondo 0 - 255 
$pdf->SetTextColor(77); //Color de Texto 0 - 255 ,tambien SetTextColor(255,255,255);
$pdf->SetDrawColor(0); //Color de Linea 0 - 255
$pdf->SetLineWidth(.3); //Grosor de Linea


$pdf->SetY(10); 
$pdf->Cell(132,7,'REGLAS DE TRANSITO ',1,0,'C',1);
$pdf->Cell(2,7,'',0,0,'C',0);
$pdf->Cell(60,7,'Duplicado - Canje - Recategorización ',1,1,'C',1);
$pdf->Cell(20,12,'Orden',1,0,'C',1);
$pdf->Cell(32,12,'Fechas',1,0,'C',1);
$pdf->Cell(40,12,'Resultado',1,0,'C',1);
$pdf->Cell(40,12,'Firma Evaluador ',1,0,'C',1);
$pdf->Cell(2,12,'',0,0,'C',0);
$pdf->Cell(60,12,'',1,1,'C',1);
$pdf->Cell(20,12,'1er. Exam.',1,0,'L',1);
$pdf->Cell(32,12,'',1,0,'L',1);
$pdf->Cell(40,12,'',1,0,'L',1);
$pdf->Cell(40,12,'',1,0,'L',1);
$pdf->Cell(2,12,'',0,0,'C',0);
$pdf->Cell(60,12,'',1,1,'C',1);
$pdf->Cell(20,12,'2do. Exam.',1,0,'L',1);
$pdf->Cell(32,12,'',1,0,'L',1);
$pdf->Cell(40,12,'',1,0,'L',1);
$pdf->Cell(40,12,'',1,0,'L',1);
$pdf->Cell(2,12,'',0,0,'C',0);
$pdf->Cell(60,12,'',1,1,'C',1);
$pdf->Cell(20,12,'3er. Exam.',1,0,'L',1);
$pdf->Cell(32,12,'',1,0,'L',1);
$pdf->Cell(40,12,'',1,0,'L',1);
$pdf->Cell(40,12,'',1,0,'L',1);
$pdf->Cell(2,12,'',0,0,'C',0);
$pdf->Cell(60,12,'',1,1,'C',1);
// $pdf->Cell(96,7,'Reglam. Serv. Público - Carga Pasajeros ',1,0,'C',1);
// $pdf->Cell(2,7,'',0,0,'C',0);
// $pdf->Cell(96,7,'',1,1,'C',1);
// $pdf->Cell(32,7,'1er. Exam.',1,0,'L',1);
// $pdf->Cell(32,7,'',1,0,'L',1);
// $pdf->Cell(32,7,'',1,0,'L',1);
// $pdf->Cell(2,7,'',0,0,'C',0);
// $pdf->Cell(96,7,'',1,1,'C',1);
// $pdf->Cell(32,7,'2do. Exam.',1,0,'L',1);
// $pdf->Cell(32,7,'',1,0,'L',1);

// $pdf->Cell(32,7,'',1,0,'L',1);
// $pdf->Cell(32,7,'',1,0,'L',1);
// $pdf->Cell(2,7,'',0,0,'C',0);
// $pdf->Cell(96,7,'',1,1,'C',1);
//$pdf->Cell(194,2,'',0,0,'C',0);
$pdf->Cell(132,7,'MANEJO',1,0,'C',1);
$pdf->Cell(2,7,'',0,0,'C',0);
$pdf->Cell(60,7,'Antecedentes',1,1,'C',1);
$pdf->Cell(20,12,'1er. Exam.',1,0,'L',1);
$pdf->Cell(32,12,'',1,0,'L',1);
$pdf->Cell(40,12,'',1,0,'L',1);
$pdf->Cell(40,12,'',1,0,'L',1);
$pdf->Cell(2,12,'',0,0,'C',0);
$pdf->Cell(60,12,'',1,1,'C',1);
$pdf->Cell(20,12,'2do. Exam.',1,0,'L',1);
$pdf->Cell(32,12,'',1,0,'L',1);
$pdf->Cell(40,12,'',1,0,'L',1);
$pdf->Cell(40,12,'',1,0,'L',1);
$pdf->Cell(2,12,'',0,0,'C',0);
$pdf->Cell(60,12,'',1,1,'C',1);
$pdf->Cell(20,12,'3er. Exam.',1,0,'L',1);
$pdf->Cell(32,12,'',1,0,'L',1);
$pdf->Cell(40,12,'',1,0,'L',1);
$pdf->Cell(40,12,'',1,0,'L',1);
$pdf->Cell(2,12,'',0,0,'C',0);
$pdf->Cell(60,12,'',1,1,'C',1);


$pdf->Rect(10,155,192,135);
$pdf->SetFont('Arial','B',10);
$pdf->SetXY(145,160); 
$pdf->Cell(30,2,'Nº TRAMITE:'.$fila2[20],0,1,'L',1);
$pdf->SetXY(145,163); 
$pdf->Cell(30,5,'N° SISGEDO:  '.$fila2[36],0,1,'L',1);
$pdf->Image('imag/foto.jpg',12,164,25,30,'JPG');
$pdf->Image('imag/LOGO.jpg',39,164,13,15,'JPG');
$pdf->Image('imag/banner_top1.jpg',125,164,13,15,'JPG');
$pdf->SetX(65);
$pdf->Cell(50,5,'  GOBIERNO REGIONAL LAMBAYEQUE ',0,1,'C',1);
$pdf->SetFont('Arial','B',6); 
$pdf->SetX(65); 
$pdf->Cell(50,3,'GERENCIA REGIONAL DE TRANSPORTES Y',0,0,'C',1);
$pdf->Cell(30,3,'',0,0,'L',0);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(20,3,'Nº Licencia',0,0,'C',1);

$sql2735="SELECT * FROM usuario_licencia WHERE idpostulante='".$fila2[0]."'";
$rs2735=pg_query($link,$sql2735);
$fila2735 =pg_fetch_array($rs2735); 

if ( $fila2[23] =="17"){
	$pdf->Cell(20,3,$fila_especial[6],0,1,'L',1); 
}else{ 
	$pdf->Cell(20,3,'__________',0,1,'L',1);

}

//if($fila2735[1]!=''){
//$pdf->Cell(20,3,$fila2735[1],0,1,'L',1);
//}else{
//$pdf->Cell(20,3,'__________',0,1,'L',1);
//}
$pdf->SetFont('Arial','B',6);
$pdf->SetX(65);
$pdf->Cell(50,3,'COMUNICACIONES DE LAMBAYEQUE',0,1,'C',1);
$pdf->SetX(65); 
$pdf->Cell(50,3,'DIRECCION EJECUTIVA DE CIRCULACION TERRESTRE',0,0,'C',1);
$pdf->Cell(37,5,'',0,0,'C',0);
$pdf->SetFont('Arial','B',9); 
$pdf->Cell(25,5,'EXAMEN MEDICO',0,1,'C',1);
$pdf->SetX(40);
$pdf->Cell(100,5,'REGISTRO DEL CONDUCTOR ',0,0,'C',1);
$pdf->SetXY(139,194);
$pdf->Cell(25,5,'Nº Ficha ',1,0,'C',1);
$pdf->Cell(35,5,$fila2[21],1,1,'C',1);
$pdf->SetX(40);
$pdf->Cell(100,5,'',0,0,'L',1);
$pdf->SetXY(139,199);
$pdf->Cell(25,5,'Fecha',1,0,'C',1);
// $feeccha=normal($fila2[17]);
$pdf->Cell(35,5,$fila2[23],1,1,'C',1);
// $pdf->Cell(35,5,$feeccha,1,1,'C',1);
$pdf->SetX(12);
$pdf->Cell(53,5,'______________',0,0,'L',0);
$pdf->SetXY(40,193);
$pdf->Cell(41,5,'APELLIDOS Y NOMBRES:',0,0,'L',1);
$nompost=$fila2[2].' '.$fila2[3].' '.$fila2[1];
if (strlen($nompost) < 28){
$pdf->MultiCell(59,5,utf8_decode(trim($fila2[2])).' '.utf8_decode(trim($fila2[3])).' '. utf8_decode(trim($fila2[1])),0, 'L', 0, 0);
} else {
$pdf->MultiCell(59,5,utf8_decode(trim($fila2[2])).' '.utf8_decode(trim($fila2[3])).' '.utf8_decode(trim($fila2[1])),0, 'L', 0, 0);
//$pdf->MultiCell(59,5,$fila2[2].' '.$fila2[3].' '.$fila2[1],0);
}
$pdf->SetXY(139,204);
$pdf->Cell(25,5,'Resultado',1,0,'C',0);
$pdf->Cell(35,5,$fila2[22],1,1,'C',1);
$pdf->SetXY(40,202);
$pdf->Cell(41,5,'FECHA DE NACIMIENTO: ',0,0,'L',0);
$fech=normal($fila2[4]);
$pdf->Cell(20,5,$fech,0,0,'L',1);
$pdf->Cell(10,5,'EDAD:',0,0,'R',0);
$pdf->Cell(29,5,$fila2[5].' años',0,0,'L',0);
$pdf->SetXY(139,209);
$pdf->Cell(25,5,'Restricciones',1,0,'C',0);
$pdf->Cell(35,5,$fila2[24],1,1,'C',1);
$pdf->SetXY(40,207);
$pdf->Cell(41,5,'ESTADO CIVIL:',0,0,'L',0);
$pdf->Cell(59,5,$fila2[7],0,0,'L',0);
// $pdf->Cell(60,5,$fila2[21],1,1,'C',0);
// $pdf->SetXY(40,211);
// $pdf->Cell(41,5,'PROF. U OCUPACION: ',0,0,'L',0);
// $pdf->MultiCell(55,5,utf8_decode($fila2[6]),0,1,'L',1);
$pdf->SetX(12);
$pdf->Cell(53,5,'______________',0,0,'L',0);
$pdf->SetX(40,211);
$pdf->Cell(41,5,'D.N.I : ',0,0,'L',1);
$pdf->Cell(20,5,$fila2[8],0,0,'L',1);
$pdf->Cell(10,5,'C.E. : ',0,0,'R',1);
$pdf->Cell(26,5,$fila2[9],0,1,'L',1);
$pdf->Cell(23,5,'HUELLA',0,0,'R',0);
$pdf->SetX(40,214);
$pdf->Cell(41,5,'ESTATURA:',0,0,'L',1);
$pdf->Cell(20,5,$fila2[13],0,0,'L',1);
$pdf->Cell(10,5,'',0,0,'R',1);
$pdf->Cell(26,5,$fila2[10],0,1,'L',1);
$pdf->SetX(40,217);
$pdf->Cell(41,5,'SEXO:',0,0,'L',1);
$pdf->Cell(20,5,$fila2[12],0,0,'L',1);
$pdf->Cell(10,5,'',0,0,'R',1);
$pdf->Cell(26,5,$fila2[11],0,1,'L',1);
$pdf->SetXY(40,222);
$pdf->Cell(41,5,'PROF. U OCUPACION: ',0,0,'L',0);
$pdf->MultiCell(120,5,utf8_decode($fila2[6]),0,1,'L',0);
$pdf->SetX(40);
$pdf->Cell(42,5,'DONACION DE ORGANOS:',0,0,'L',1);
$pdf->Cell(20,5,$fila2[19],0,0,'L',1);
$pdf->Cell(10,5,'',0,0,'R',1);
$pdf->Cell(26,5,$fila2[11],0,1,'L',1);
$pdf->SetX(40);
$pdf->Cell(41,5,'DOMICILIO:',0,0,'L',1);
$pdf->MultiCell(100,5,utf8_decode($fila2[14]),0,1,'L',1);
$pdf->Cell(136,5,'',0,0,'C',0);
$pdf->Cell(50,5,'',0,0,'L',0); // aca ba la linea
//$pdf->Ln();
$pdf->SetX(20);
$pdf->Cell(25,7,'Nº de Licencia',1,0,'C',1);
$pdf->Cell(25,7,'Clase',1,0,'C',1);
$pdf->Cell(25,7,'Categ.',1,0,'C',1);
$pdf->Cell(25,7,'Fecha Exp.',1,0,'C',1);
$pdf->Cell(25,7,'Fecha Venc.',1,0,'C',1);
$pdf->Cell(5,7,'',0,0,'C',0);
$pdf->Cell(42,7,'',0,1,'C',1); //aca va el nombre de la firma
$pdf->SetX(20);
$pdf->Cell(25,7,'',1,0,'C',1);
$pdf->Cell(25,7,'',1,0,'C',1);
$pdf->Cell(25,7,'',1,0,'C',1);
$pdf->Cell(25,7,'',1,0,'C',1);
$pdf->Cell(25,7,'',1,1,'C',1);
$pdf->SetX(20);
$pdf->Cell(25,7,'',1,0,'C',1);
$pdf->Cell(25,7,'',1,0,'C',1);
$pdf->Cell(25,7,'',1,0,'C',1);
$pdf->Cell(25,7,'',1,0,'C',1);
$pdf->Cell(25,7,'',1,0,'C',1);
$pdf->Cell(5,7,'',0,0,'C',0);
$pdf->Cell(47,-2,'________________________',0,0,'R',0);
$pdf->SetX(155);
$pdf->Cell(38,7,'Firma del postulante',0,1,'R',0);
$pdf->SetX(20);
$pdf->Cell(25,7,'',1,0,'C',1);
$pdf->Cell(25,7,'',1,0,'C',1);
$pdf->Cell(25,7,'',1,0,'C',1);
$pdf->Cell(25,7,'',1,0,'C',1);
$pdf->Cell(25,7,'',1,0,'C',1);
$pdf->Cell(5,7,'',0,0,'C',0);
// $pdf->SetXY(166,266);
// $pdf->Cell(30,3,'________________________',0,1,'R',0);
// $pdf->Cell(185,7,'Firma Jefe Dpto. Expedición',0,0,'R',0);
$pdf->Output('report_licencias.pdf','I');
?>