<?php
session_start();
if(!isset($_SESSION["usuario"])) header("location:index.php");
include ("traducefecha.php");
include ("conectar.php");
$link=Conectarse();
$tra=$_GET['id'];
$sql2="SELECT p.nombres, p.apepat, p.apemat, t.fechaini, t.fechafin, t.nroficha, t.idcentro,t.idtramite,t.tipotramite, c.nombre , t.usuario, p.dni, t.nrosolicitud,t.sisgedo  FROM postulante p INNER JOIN tramite t ON p.idpostulante=t.idpostulante inner join categoria c on t.idcategoria=c.idcategoria WHERE t.idtramite='".$tra."'";
// echo $sql2;exit;
$rs2=pg_query($link,$sql2);
$fila2 =pg_fetch_array($rs2);


$sql33="select fecha,* from evaluacion where opcion =(select max (opcion) from evaluacion where idtramite ='".$tra."') and idtramite ='".$tra."' and idexamen =4";
$rs3 = pg_query($link,$sql33);
$filaexamen = pg_fetch_array($rs3);


$sql27="SELECT * FROM centro_medico WHERE idcentro='".$fila2[6]."'";
// echo $sql27;exit;
$rs27=pg_query($link,$sql27);
$fila27 =pg_fetch_array($rs27);
$hora =  date("H:i:s");

//--
$link=Conectarse();
	$sql22="SELECT p.nombres, p.apepat, p.apemat, t.fechaini, t.fechafin, t.nroficha, t.idcentro,t.idtramite,t.tipotramite, c.nombre , t.nrosolicitud FROM postulante p INNER JOIN tramite t ON p.idpostulante=t.idpostulante inner join categoria c on t.idcategoria=c.idcategoria WHERE t.idtramite='".$tra."'";
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
	$tra=$_GET['id'];
	$sql2="SELECT p.nombres, p.apepat, p.apemat, t.fechaini, t.fechafin, t.nroficha, t.idcentro,t.idtramite,t.tipotramite, c.nombre , t.nrosolicitud FROM postulante p INNER JOIN tramite t ON p.idpostulante=t.idpostulante inner join categoria c on t.idcategoria=c.idcategoria WHERE t.idtramite='".$tra."'";
	$rs2=pg_query($link,$sql2);
	$fila2 =pg_fetch_array($rs2);
	//--
	$echotra;
	$tra=$fila2[8];
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
    $this->SetY(-28);
	$this->SetFont('Arial','B',20);
	$this->SetX(15);
	$this->Cell(75,5,$echotra,0,0,'R',1);
	$this->Cell(10,5,$fila2[9],0,1,'L',1);
	$this->SetY(-15);
	$this->SetFont('Arial','B',9);
	$this->Cell(30,5,'Fecha Impresion:',0,0,'R',0);
	$fechadiaria=date('d/m/Y');
	$this->Cell(20,5,$fechadiaria,0,0,'L',0);
	$this->Cell(40,5,'',0,0,'L',0);
	$this->Cell(20,5,'_________________________',0,1,'L',0);
	$this->Cell(110,5,'',0,0,'L',0);
	$this->Cell(10,5,utf8_decode ($_SESSION["usu"]),0,1,'L',0);
	
}
}
//$pdf=new FPDF();
$pdf=new PDF('L');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetTitle('PDF via PHP');
//Set font and colors
$pdf->SetFont('Arial','B',9); //$pdf->SetFont('family','style',size);
$pdf->SetFillColor(255,255,255); //Color de Fondo 0 - 255 
$pdf->SetTextColor(77); //Color de Texto 0 - 255 ,tambien SetTextColor(255,255,255);
$pdf->SetDrawColor(70); //Color de Linea 0 - 255
$pdf->SetLineWidth(.3); //Grosor de Linea

$pdf->Rect(8,4,138,201);
$pdf->Rect(150,4,140,201);
$pdf->SetY(6); 
$pdf->SetX(11);
$pdf->Cell(135,5,'GOBIERNO REGIONAL DE LAMBAYEQUE',0,0,'C',0);
$pdf->Cell(140,5,'FECHA DE PROGRAMACION DE EXAMENES',0,1,'C',0);
$pdf->SetX(11);
$pdf->Cell(135,5,'GERENCIA REGIONAL DE TRANSPORTES Y COMUNICACIONES',0,1,'C',0);
$pdf->SetX(11);
// $pdf->Cell(135,5,'DE LAMBAYEQUE',0,1,'C',0);
// $pdf->SetX(11);
$pdf->Cell(138,7,'DIRECCION EJECUTIVA DE CIRCULACION TERRESTRE',0,1,'C',0);
$pdf->SetX(11);
$pdf->Cell(135,7,'  ',0,0,'C',0);
$pdf->Cell(20,7,'',0,0,'L',0);
$pdf->Cell(30,7,'_____________________',0,0,'L',1);
//para mostrar el usuario
/*$pdf->SetX(15);
$pdf->Cell(135,7,'  ',0,0,'C',0);
$pdf->Cell(20,7,'',0,0,'L',0);
$pdf->Cell(30,8,'HOLA',0,0,'L',1);*/
//

$pdf->Cell(40,5,'',0,0,'L',0);
$pdf->Cell(30,5,'_____________________',0,1,'L',1);
$pdf->Image('imag/foto.jpg',10,28,27,35,'JPG');

$pdf->SetFont('Arial','',9);
$pdf->SetX(40);
$pdf->Cell(42,5,'NRO TRAMITE:',0,0,'L',1);
$pdf->SetFont('Arial','B',9);
$pdf->MultiCell(64,5,utf8_decode ($fila2[07]),0,'L',0);

$pdf->SetFont('Arial','',9);
$pdf->SetX(40);
$pdf->Cell(42,5,'SISGEDO:',0,0,'L',1);
$pdf->SetFont('Arial','B',9);
$pdf->MultiCell(64,5,utf8_decode ($fila2[13]),0,'L',0);

$pdf->SetFont('Arial','',9);
$pdf->SetX(40);
$pdf->Cell(42,5,'APELLIDOS Y NOMBRES:',0,0,'L',1);
$pdf->SetFont('Arial','B',9);
$pdf->MultiCell(64,5,utf8_decode ($fila2[1]).' '.utf8_decode ($fila2[2]).' '.utf8_decode ($fila2[0]),0,'L',0);

$pdf->SetFont('Arial','',9);
$pdf->SetX(40);
$pdf->Cell(42,5,'DNI:',0,0,'L',1);
$pdf->SetFont('Arial','B',9);
$pdf->MultiCell(64,5,utf8_decode ($fila2[11]) ,0,'L',0);

$pdf->SetFont('Arial','',9);
$pdf->SetX(40);
$pdf->Cell(42,5,'FECHA DE VENCIMIENTO:',0,0,'L',1);
$pdf->SetFont('Arial','B',9);
$pdf->Cell(65,5,normal($fila2[3]).'  -  '.normal($fila2[4]),0,1,'L',0);

$pdf->SetFont('Arial','',9);
$pdf->SetX(40);
$pdf->Cell(42,5,'N� Y FECHA EX. MEDICO:',0,0,'L',1);
$pdf->SetFont('Arial','B',9);
$pdf->MultiCell(64,5,$fila2[5].' '.utf8_decode ($fila27[1]),0,'J',0);

$pdf->SetFont('Arial','',9);
$pdf->SetX(40);
$pdf->Cell(42,5,'TIPO TRAMITE:',0,0,'L',1);
$pdf->SetFont('Arial','B',9);
$pdf->Cell(65,5,$echotra.' '.$fila2[9],0,0,'L',0);
$pdf->Cell(20,7,'',0,0,'L',0);
$pdf->Cell(30,7,'_____________________',0,0,'L',1);
$pdf->Cell(40,5,'',0,0,'L',0);
$pdf->Cell(30,7,'_____________________',0,1,'L',1);
$pdf->SetX(12);
$pdf->Cell(130,7,'REGLAS DE TRANSITO',1,1,'C',1);
$pdf->SetX(12);
$pdf->Cell(43,6,'',1,0,'L',1);
$pdf->Cell(44,6,'',1,0,'L',1);
$pdf->Cell(43,6,'',1,1,'L',1);
$pdf->SetX(12);
$pdf->Cell(43,6,'',1,0,'L',1);
$pdf->Cell(44,6,'',1,0,'L',1);
$pdf->Cell(43,6,'',1,1,'L',1);
$pdf->SetX(12);
$pdf->Cell(43,6,'',1,0,'L',1);
$pdf->Cell(44,6,'',1,0,'L',1);
$pdf->Cell(43,6,'',1,1,'L',1);
$pdf->SetX(12);
$pdf->Cell(130,7,'MANEJO',1,1,'C',1);
$pdf->SetX(12);
$pdf->Cell(43,7,'',1,0,'L',1);
$pdf->Cell(44,7,'',1,0,'L',1);
$pdf->Cell(43,7,'',1,1,'L',1);
$pdf->SetX(12);
$pdf->Cell(43,7,'',1,0,'L',1);
$pdf->Cell(44,7,'',1,0,'L',1);
$pdf->Cell(43,7,'',1,1,'L',1);
$pdf->SetX(12);
$pdf->Cell(43,7,'',1,0,'L',1);
$pdf->Cell(44,7,'',1,0,'L',1);
$pdf->Cell(43,7,'',1,0,'L',1);
$pdf->Cell(55,7,'',0,0,'L',0);
$pdf->Cell(30,7,'_____________________',0,1,'L',1);

//---
$pdf->Cell(0,10,'  Firma postulante           Huella postulante',0,1,'L',0);
$pdf->Cell(0,55,'_________________________',0,1,'L',0);
$pdf->Image('imag/huella.png',45,133,30,40,'PNG');
//$pdf->Cell(60,78,'HUELLA',0,0,'L',1);

//$pdf->Cell(0,0,'Huella y Firma del postulante',0,1,'L',0);



//--
$pdf->SetFont('Arial','',9);
$pdf->SetXY(160, 30);
$pdf->Cell(10,5,' Usuario : '.utf8_decode ($fila2[10]),0,0,'L',1);

if ($fila2[8]=='NUEVO' || $fila2[8]=='RECATEGORIZACION' || $fila2[8]==1 || $fila2[8]==2){
	$pdf->SetXY(160, 34);
	$pdf->Cell(10,5,' Fecha Examen : '.(!empty( $filaexamen[0]) ?date_format( date_create( $filaexamen[0]), 'd/m/Y' ):'' ),0,0,'L',0);
	$pdf->SetXY(160, 38);
	$pdf->Cell(10,5,' Hora Impresion :'. $hora ,0,0,'L',0);
}else{
	$pdf->SetXY(160, 34);
	$pdf->Cell(10,5,' Hora Impresion :'. $hora ,0,0,'L',0);
}
/*$pdf->SetXY(160, 42);
$pdf->Cell(10,5,' SITUACION :'. $hora ,0,0,'L',0);
*/


$pdf->SetFont('Arial','B',14);
$pdf->SetXY(170,178); 
$pdf->Cell(30,7,'http://transportes.regionlambayeque.gob.pe/',0,1,'L',1);

$pdf->SetFont('Arial','',8);
$pdf->SetXY(190, 185);
$pdf->Cell(10,3,'Impreso por: ' . $_SESSION["usu"]. '  ' . date('d/m/Y H:i:s'),0,0,'L',1);

$pdf->Output('report_licencias.pdf','I');
?>
