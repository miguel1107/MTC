<?php
session_start();
if(!isset($_SESSION["usuario"])) header("location:index.php");
require ("traducefecha.php");
include ("conectar.php");
$link=Conectarse();
		$sql2="SELECT * FROM postulante p INNER JOIN tramite t ON p.idpostulante=t.idpostulante  INNER JOIN categoria c on c.idcategoria=t.idcategoria  WHERE t.idtramite='".$_GET["idtramite"]."'";
		
		$rs2=pg_query($link,$sql2);
		$fila2 =pg_fetch_array($rs2);

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

require('pdf/fpdf.php');

class PDF extends FPDF
{
function Footer()
{
	$link=Conectarse();
	$sql2="SELECT * FROM postulante p INNER JOIN tramite t ON p.idpostulante=t.idpostulante  INNER JOIN categoria c on c.idcategoria=t.idcategoria  WHERE t.idtramite='".$_GET["idtramite"]."'";
	$rs2=pg_query($link,$sql2);
	$fila2 =pg_fetch_array($rs2);
    $this->SetY(-20);
	$this->SetFont('Arial','B',20);
	$this->SetX(30);
	$this->Cell(85,5,$fila2[26],0,0,'R',1);
	$this->Cell(10,5,$fila2[32],0,1,'L',1);
	$this->SetFont('Arial','B',9);
	$this->Cell(159,5,'',0,0,'R',0);
	$this->Cell(15,5,'Fecha:',0,0,'R',0);
	$fechadiaria=date('d/m/Y');
	$this->Cell(20,5,$fechadiaria,0,1,'L',0);
	
	 if ( $fila2[23] =="17"){
		$sql_especial="select * from tramite_espe WHERE idtramite='".$_GET["idtramite"]."'";
		$rs_especial=pg_query($link,$sql_especial);
		$fila_especial =pg_fetch_array($rs_especial);
		}
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
$pdf->Cell(96,7,'REGLAS DE TRANSITO ',1,0,'C',1);
$pdf->Cell(2,7,'',0,0,'C',0);
$pdf->Cell(96,7,'Duplicado - Canje - Recategorización ',1,1,'C',1);
$pdf->Cell(32,7,'Fechas',1,0,'C',1);
$pdf->Cell(32,7,'Resultado',1,0,'C',1);
$pdf->Cell(32,7,'Firma Evaluador ',1,0,'C',1);
$pdf->Cell(2,7,'',0,0,'C',0);
$pdf->Cell(96,7,'',1,1,'C',1);
$pdf->Cell(32,7,'1er. Exam.',1,0,'L',1);
$pdf->Cell(32,7,'',1,0,'L',1);
$pdf->Cell(32,7,'',1,0,'L',1);
$pdf->Cell(2,7,'',0,0,'C',0);
$pdf->Cell(96,7,'',1,1,'C',1);
$pdf->Cell(32,7,'2do. Exam.',1,0,'L',1);
$pdf->Cell(32,7,'',1,0,'L',1);
$pdf->Cell(32,7,'',1,0,'L',1);
$pdf->Cell(2,7,'',0,0,'C',0);
$pdf->Cell(96,7,'',1,1,'C',1);
$pdf->Cell(32,7,'3er. Exam.',1,0,'L',1);
$pdf->Cell(32,7,'',1,0,'L',1);
$pdf->Cell(32,7,'',1,0,'L',1);
$pdf->Cell(2,7,'',0,0,'C',0);
$pdf->Cell(96,7,'',1,1,'C',1);
$pdf->Cell(96,7,'Reglam. Serv. Público - Carga Pasajeros ',1,0,'C',1);
$pdf->Cell(2,7,'',0,0,'C',0);
$pdf->Cell(96,7,'',1,1,'C',1);
$pdf->Cell(32,7,'1er. Exam.',1,0,'L',1);
$pdf->Cell(32,7,'',1,0,'L',1);
$pdf->Cell(32,7,'',1,0,'L',1);
$pdf->Cell(2,7,'',0,0,'C',0);
$pdf->Cell(96,7,'',1,1,'C',1);
$pdf->Cell(32,7,'2do. Exam.',1,0,'L',1);
$pdf->Cell(32,7,'',1,0,'L',1);
$pdf->Cell(32,7,'',1,0,'L',1);
$pdf->Cell(2,7,'',0,0,'C',0);
$pdf->Cell(96,7,'',1,1,'C',1);
$pdf->Cell(32,7,'3er. Exam.',1,0,'L',1);
$pdf->Cell(32,7,'',1,0,'L',1);
$pdf->Cell(32,7,'',1,0,'L',1);
$pdf->Cell(2,7,'',0,0,'C',0);
$pdf->Cell(96,7,'',1,1,'C',1);
$pdf->Cell(96,7,'Teórico Práctico de Mecánica Automotriz ',1,0,'C',1);
$pdf->Cell(2,7,'',0,0,'C',0);
$pdf->Cell(96,7,'Antecedentes',1,1,'C',1);
$pdf->Cell(32,7,'1er. Exam.',1,0,'L',1);
$pdf->Cell(32,7,'',1,0,'L',1);
$pdf->Cell(32,7,'',1,0,'L',1);
$pdf->Cell(2,7,'',0,0,'C',0);
$pdf->Cell(96,7,'',1,1,'C',1);
$pdf->Cell(32,7,'2do. Exam.',1,0,'L',1);
$pdf->Cell(32,7,'',1,0,'L',1);
$pdf->Cell(32,7,'',1,0,'L',1);
$pdf->Cell(2,7,'',0,0,'C',0);
$pdf->Cell(96,7,'',1,1,'C',1);
$pdf->Cell(32,7,'3er. Exam.',1,0,'L',1);
$pdf->Cell(32,7,'',1,0,'L',1);
$pdf->Cell(32,7,'',1,0,'L',1);
$pdf->Cell(2,7,'',0,0,'C',0);
$pdf->Cell(96,7,'',1,1,'C',1);
$pdf->Cell(96,7,'Manejo',1,0,'C',1);
$pdf->Cell(2,7,'',0,0,'C',0);
$pdf->Cell(96,7,'',1,1,'C',1);
$pdf->Cell(32,7,'1er. Exam.',1,0,'L',1);
$pdf->Cell(32,7,'',1,0,'L',1);
$pdf->Cell(32,7,'',1,0,'L',1);
$pdf->Cell(2,7,'',0,0,'C',0);
$pdf->Cell(96,7,'',1,1,'C',1);
$pdf->Cell(32,7,'2do. Exam.',1,0,'L',1);
$pdf->Cell(32,7,'',1,0,'L',1);
$pdf->Cell(32,7,'',1,0,'L',1);
$pdf->Cell(2,7,'',0,0,'C',0);
$pdf->Cell(96,7,'',1,1,'C',1);
$pdf->Cell(32,7,'3er. Exam.',1,0,'L',1);
$pdf->Cell(32,7,'',1,0,'L',1);
$pdf->Cell(32,7,'',1,0,'L',1);
$pdf->Cell(2,7,'',0,0,'C',0);
$pdf->Cell(96,7,'',1,1,'C',1);

$pdf->Rect(10,159,192,128);
$pdf->SetFont('Arial','B',10);
$pdf->SetXY(160,160); 
$pdf->Cell(30,5,'Nº '.$fila2[15],0,1,'L',1);
$pdf->Image('imag/foto.jpg',12,164,25,30,'JPG');
$pdf->Image('imag/LOGO.JPG',39,164,13,15,'JPG');
$pdf->Image('imag/banner_top1.JPG',120,164,13,15,'JPG');
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
$pdf->Cell(50,3,'COMUNICACIONES',0,1,'C',1);
$pdf->SetX(65); 
$pdf->Cell(50,3,'DIRECCION EJECUTIVA DE CIRCULACION TERRESTRE',0,0,'C',1);
$pdf->Cell(37,5,'',0,0,'C',0);
$pdf->SetFont('Arial','B',9); 
$pdf->Cell(25,5,'Examen Médico',0,1,'C',1);
$pdf->SetX(40);
$pdf->Cell(100,5,'REGISTRO DEL CONDUCTOR ',0,0,'L',1);
$pdf->Cell(25,5,'Nº Ficha ',1,0,'L',1);
$pdf->Cell(35,5,'Fecha',1,1,'L',1);
$pdf->SetX(40);
$pdf->Cell(100,5,'DATOS PERSONALES',0,0,'L',1);
$pdf->Cell(25,5,$fila2[16],1,0,'C',1);
$feeccha=normal($fila2[17]);
$pdf->Cell(35,5,$feeccha,1,1,'C',1);
$pdf->SetX(12);
$pdf->Cell(53,5,'______________',0,0,'L',0);
$pdf->SetX(40);
$pdf->Cell(41,10,'APELLIDOS Y NOMBRES:',0,0,'L',1);
$nompost=$fila2[2].' '.$fila2[3].' '.$fila2[1];
if (strlen($nompost) < 28){
$pdf->MultiCell(59,5,utf8_decode(trim($fila2[2])).' '.utf8_decode(trim($fila2[3])).' '. utf8_decode(trim($fila2[1])),0, 'L', 0, 0);
} else {
$pdf->MultiCell(59,5,utf8_decode(trim($fila2[2])).' '.utf8_decode(trim($fila2[3])).' '.utf8_decode(trim($fila2[1])),0, 'L', 0, 0);
//$pdf->MultiCell(59,5,$fila2[2].' '.$fila2[3].' '.$fila2[1],0);
}
$pdf->SetXY(140,190);
$pdf->Cell(25,10,'Resultado',1,0,'L',1);
$pdf->Cell(35,10,'Restricciones',1,1,'L',1);
$pdf->SetX(40);
$pdf->Cell(41,5,'FECHA DE NACIMIENTO: ',0,0,'L',1);
$fech=normal($fila2[4]);
$pdf->Cell(20,5,$fech,0,0,'L',1);
$pdf->Cell(10,5,'EDAD:',0,0,'R',1);
$pdf->Cell(29,5,$fila2[5].' años',0,0,'L',1);
$pdf->Cell(25,5,$fila2[19],1,0,'C',1);
$pdf->Cell(35,5,$fila2[20],1,1,'C',1);
$pdf->SetX(40);
$pdf->Cell(41,5,'PROF. U OCUPACION:',0,0,'L',1);
$pdf->Cell(59,5,$fila2[6],0,0,'L',1);
$pdf->Cell(60,5,$fila2[21],1,1,'C',1);
$pdf->SetX(40);
$pdf->Cell(41,5,'ESTADO CIVIL: ',0,0,'L',1);
$pdf->Cell(39,5,$fila2[7],0,1,'L',1);
$pdf->SetX(12);
$pdf->Cell(53,5,'______________',0,0,'L',0);
$pdf->SetX(40);
$pdf->Cell(41,5,'D.N.I : ',0,0,'L',1);
$pdf->Cell(20,5,$fila2[8],0,0,'L',1);
$pdf->Cell(10,5,'L.M. : ',0,0,'R',1);
$pdf->Cell(26,5,$fila2[9],0,1,'L',1);
$pdf->SetX(40);
$pdf->Cell(41,5,'ESTATURA:',0,0,'L',1);
$pdf->Cell(20,5,$fila2[13],0,0,'L',1);
$pdf->Cell(10,5,'C.E. : ',0,0,'R',1);
$pdf->Cell(26,5,$fila2[10],0,1,'L',1);
$pdf->SetX(40);
$pdf->Cell(41,5,'SEXO:',0,0,'L',1);
$pdf->Cell(20,5,$fila2[12],0,0,'L',1);
$pdf->Cell(10,5,'C.I. :  ',0,0,'R',1);
$pdf->Cell(26,5,$fila2[11],0,1,'L',1);
$pdf->SetX(40);
$pdf->Cell(41,5,'DOMICILIO:',0,0,'L',1);
$pdf->MultiCell(100,5,utf8_decode($fila2[14]),0,1,'L',1);
$pdf->Cell(136,5,'',0,0,'C',0);
$pdf->Cell(50,5,'___________________',0,1,'C',1);
//$pdf->Ln();
$pdf->SetX(20);
$pdf->Cell(25,7,'Nº de Licencia',1,0,'C',1);
$pdf->Cell(25,7,'Clase',1,0,'C',1);
$pdf->Cell(25,7,'Categ.',1,0,'C',1);
$pdf->Cell(25,7,'Fecha Exp.',1,0,'C',1);
$pdf->Cell(25,7,'Fecha Venc.',1,0,'C',1);
$pdf->Cell(5,7,'',0,0,'C',0);
$pdf->Cell(42,7,'Firma del Interesado',0,1,'C',1);
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
$pdf->Cell(30,7,'________________________',0,1,'L',0);
$pdf->SetX(20);
$pdf->Cell(25,7,'',1,0,'C',1);
$pdf->Cell(25,7,'',1,0,'C',1);
$pdf->Cell(25,7,'',1,0,'C',1);
$pdf->Cell(25,7,'',1,0,'C',1);
$pdf->Cell(25,7,'',1,0,'C',1);
$pdf->Cell(5,7,'',0,0,'C',0);
$pdf->Cell(30,7,'Firma Jefe Dpto. Expedición',0,1,'L',0);
$pdf->Output('report_licencias.pdf','I');
?>