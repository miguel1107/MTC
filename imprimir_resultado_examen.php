<?php
session_start();
if(!isset($_SESSION["usuario"])) header("location:index.php");
require ("traducefecha.php");
include ("conectar.php");


  $fec=$_GET['xxxfecha'];
  $link=Conectarse();
  $fec=$_GET['xxxfecha'];
  $sql22="SELECT p.nombres,p.apepat,p.apemat,c.nombre,e.opcion,e.fecha ,e.idevaluador,e.idtramite ,e.resultado,c.idcategoria,e.idevaluacion,e.idexamen,t.tipotramite,e.puntaje,p.dni FROM postulante p INNER JOIN tramite t ON p.idpostulante=t.idpostulante INNER JOIN evaluacion e ON t.idtramite=e.idtramite INNER JOIN categoria c ON t.idcategoria=c.idcategoria where e.fecha='10-07-2017' ";
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
 
 // $sql2="SELECT * FROM evaluacion E INNER JOIN tramite T ON E.idtramite=T.idtramite  INNER JOIN categoria c on c.idcategoria=t.idcategoria  WHERE t.idtramite='".$_GET["idtramite"]."'";
 //    // echo $sql2;exit;
 //    $rs2=pg_query($link,$sql2);
 //    $fila2 =pg_fetch_array($rs2);

require('pdf/fpdf.php');
class PDF extends FPDF
{
function Header()
{
    //Put the watermark
    $this->SetFont('Arial','B',10);
    // $this->SetTextColor(245,245,245);
  
     // $this->Image('imag/foto.jpg' , 50 ,8, 50, 18,'JPG');
    $this->Image('imag/LOGO.jpg' , 210,8, 13, 18,'JPG');
    $this->Image('imag/banner_top1.jpg' , 60,8, 18, 18,'JPG');
    $this->SetX(120);
    $this->Cell(50,5,'GOBIERNO REGIONAL DE LAMBAYEQUE',0,1,'C',0);
    $this->SetX(120);
    $this->Cell(50,5,'GERENCIA REGIONAL DE TRANSPORTES Y COMUNICACIONES DE',0,1,'C',0);
    $this->SetX(120);
    $this->Cell(50,5,'LAMBAYEQUE',0,1,'C',0);
      $this->SetFont('times', 'B', 11);
        $this->Cell(98, 8, '', 0);
        $this->Cell(100, 8,"".utf8_decode(''), 0);
        $this->Ln();
        $this->Cell(110, 8, '', 0);
        $this->Cell(100, 8,"".utf8_decode(''), 0);
     //$this->Line(10,10,206,10);
    $this->SetDrawColor(96,96,96);
    //$this->SetFillColor(230,230,0);
    //$this->SetTextColor(220,50,50);
        $this->Line(40,27.5,250,27.5,true);
    $this->Ln(25);
}
 

function Footer()
    {
      global $emp_nombre;
     $this->SetY(-15);
     $this->SetX(-500);
     $this->SetFont('Arial','I',8);
     $this->Cell(0,8,'Pagina '.$this->PageNo().'/{nb}',0,'T','C');

     $this->Cell(-170,8, 'Impreso por: '.$_SESSION["usu"].', el ' . date('d-m-Y') . ' a las ' . date('H:i:s'),0,0,'C');
    }

    
 
}

// Creación del objeto de la clase heredada
$pdf = new PDF('L','mm','A4');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(115, 8, '', 0);
$pdf->Cell(100, 8, 'LISTADO DE RESULTADOS', 0);
$pdf->Ln(15);


$pdf->SetFont('Arial', 'B', 10);

$pdf->Cell(10, 8, '', 0);
$pdf->Cell(10, 8,"".utf8_decode('Nº'), 1,0,'C');
$pdf->Cell(90, 8, 'Nombres y Apellidos', 1,0,'C');
$pdf->Cell(20, 8, 'DNI', 1,0,'C');
$pdf->Cell(58, 8, 'TIPO TRAMITE', 1,0,'C');
$pdf->Cell(16, 8, 'CATEG.', 1,0,'C');
$pdf->Cell(20, 8, 'NOTA', 1,0,'C');
$pdf->Cell(30, 8, 'RESULTADO', 1,0,'C');

$pdf->Ln(8);

$pdf->SetFont('Arial', '', 8);
//CONSULTA
  $link=Conectarse();
  $fec=$_GET['xxxfecha'];

  $examen = $_GET['idexamen'];
  // $examen=$_GET['categoria'];
  if ($examen=='1') {
  $hor=$_GET['hora'];
  }else if ($examen=='4') {
     $hor='0';
   }
 
  $query1 = "SELECT E.idevaluacion,(P.apepat || ' ' || P.apemat || ' ' || P.nombres) as Nombres_y_Apellidos,
                P.dni,E.resultado,E.puntaje,E.idexamen,C.idcategoria,T.tipotramite
                from postulante as P inner join tramite as T on (T.idpostulante = P.idpostulante) INNER JOIN evaluacion  as E on T.idtramite=E.idtramite inner join categoria C on T.idcategoria=C.idcategoria where E.idexamen='4' and E.fecha='10-07-2017' order by apepat ASC";
                // echo $query1;exit;
   
    $consulta = pg_query ($link,$query1) or die ("Fallo en la consulta");
    

$item = 0;
while($resultado = pg_fetch_array($consulta)){
  $item = $item+1;
  $pdf->Cell(10, 8, '', 0);
  $pdf->Cell(10, 8, $item, 1,0,'C');
  $pdf->Cell(90, 8,"".utf8_decode($resultado['nombres_y_apellidos']), 1,0,'C');
  $pdf->Cell(20, 8,"".utf8_decode($resultado['dni']), 1,0,'C');
  $pdf->Cell(58, 8,$echotra, 1,0,'C');
  $pdf->Cell(16, 8,"".utf8_decode($resultado['idcategoria']), 1,0,'C');
  $pdf->Cell(20, 8,"".utf8_decode($resultado['puntaje']), 1,0,'C');
  $pdf->Cell(30, 8,"".utf8_decode($resultado['resultado']), 1,0,'C');
  $pdf->Ln(8);
}

$pdf->Output();
?>