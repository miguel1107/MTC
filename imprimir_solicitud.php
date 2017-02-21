<?php
session_start();
//if(!isset($_SESSION["usuario"])) header("location:index.php");
require ("traducefecha.php");
//require ("convertirnumerolet.php");
include ("conectar.php");
$link=Conectarse();
require('pdf/fpdf.php');

class PDF extends FPDF
{
//Pie de página
function Footer()
{
$link=Conectarse();
$sql2="SELECT * FROM postulante p INNER JOIN tramite t ON p.idpostulante=t.idpostulante inner join categoria c
on t.idcategoria=c.idcategoria  WHERE t.idtramite='".$_GET["id"]."'";
		//echo $sql2;INNER JOIN usuario_licencia u ON p.idpostulante=u.idpostulante
		$rs2=pg_query($link,$sql2);
		$fila2=pg_fetch_array($rs2);
	    if ( $fila2[23] =="17"){
		$sql_especial="select * from tramite_espe WHERE idtramite='".$_GET["id"]."'";
		$rs_especial=pg_query($link,$sql_especial);
		$fila_especial =pg_fetch_array($rs_especial);
		}
		
    //Posición: a 1,5 cm del final
$this->SetFont('Arial','B',9);
$this->SetXY(65,-29); 
/*$this->MultiCell(80,4,utf8_decode ($fila2[1])." ".utf8_decode ($fila2[2])." ".utf8_decode ($fila2[3]),0,'C','L',1);	 //nombre usuario parte inferior*/


$this->MultiCell(80,4,utf8_decode ($fila2[1])." ".utf8_decode ($fila2[2])." ".utf8_decode ($fila2[3]) ."  -  ".utf8_decode ($fila2[8]),0,'C','L',1);	

//tipo de trámite en la parte inferior
$this->SetXY(30,-4); 
$this->Cell(80,0,$fila2[26]." ".$fila2[32],0,1,'R',1);   // tipo de tramite del usuario

    $this->SetXY(3,-31);
    //Arial italic 8
    $this->SetFont('Arial','',6);
    //Número de página
    //$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
	//MultiCell(float w, float h, string txt [, mixed border [, string align [, int fill]]])
$this->MultiCell(52,2.5,'Decreto Supremo Nº 025-2009-MTC (29/06/2009) Art. 317º, código M.60.- Tramitar u obtener duplicado, recategorización, revalidación, canje o nueva licencia de cualquier clase, por el infractor cuya licencia de conducir se encuentre suspendida o cancelada o se encuentre inhabilitada para obtenerla, acarreará la suspención de la licencia de conducir por el doble del tiempo que se encontraba suspendida o a la inhabiliatción definitiva del conductor si la licencia de conducir se encontraba cancelada o el conductor estaba inhabilitado.',0,'J','L',1);
$this->SetXY(59,-32);
$this->MultiCell(50,2,'Apellidos y Nombres del solicitante',0,'L','L',1);
//$this->SetXY(65,-17);
//$this->Cell(60,0,'..................................................................................................................................................................',0,0,'L',1);
$this->SetXY(65,-14);
$this->Cell(60,1,'__________________________________________________________________________________',0,0,'L',1);
$this->SetXY(90,-12);
$this->MultiCell(45,2,'Firma de conformidad del usuario Al Recibir el Documento de Respuesta',0,'C','L',1);
$this->SetXY(172,-32);
$this->MultiCell(30,2,'Fecha de Recepción',0,0,'L',1);

$this->SetXY(135,-27);
//$this->Cell(20,3,'Fecha de Recepción',0,0,'L',1);
$this->Ln();
// $this->SetFont('Arial','',10);
 $this->SetFont('Arial','B',10);
$this->SetXY(180,-28);
 if($fila2[26]=='NUEVO'){
// $this->Cell(10,3,'',0,0,'L',0);
 $this->Cell(10,3,$fila2[25],0,0,'L',0);
 
 }elseif($fila2[26]=='RECATEGORIZACION'){
 $this->Cell(10,3,$fila2[25],0,0,'L',0);
 
 //$this->Cell(10,3,'',0,0,'L',0);
 }else{
 $this->Cell(10,3,$fila2[25],0,0,'L',0);
 
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
$pdf->SetTextColor(0,0,0); // 77 Color de Texto 0 - 255 ,tambien SetTextColor(255,255,255);
$pdf->SetDrawColor(0,0,0); //Color de Linea 0 - 255
$pdf->SetLineWidth(.3); //Grosor de Linea

//$pdf->Rect(70,273,40,15);
$pdf->Rect(2,264,54,32);    
$pdf->Rect(57,264,109,32);    //RECTANGULO INFERIOR
$pdf->Rect(168,264,40,10); 
$pdf->Rect(168,275,40,21); 

$sql2="SELECT * FROM postulante p INNER JOIN tramite t ON p.idpostulante=t.idpostulante inner join categoria c
on t.idcategoria=c.idcategoria  WHERE t.idtramite='".$_GET["id"]."'";
		//echo $sql2;INNER JOIN usuario_licencia u ON p.idpostulante=u.idpostulante
		$rs2=pg_query($link,$sql2);
		$fila2=pg_fetch_array($rs2);
		
		if ( $fila2[23] =="17"){
		$sql_especial="select * from tramite_espe WHERE idtramite='".$_GET["id"]."'";
		$rs_especial=pg_query($link,$sql_especial);
		$fila_especial =pg_fetch_array($rs_especial);
		}
///////////////////////////////////
	if($fila2[idpostulante]!=''){
		$sql275="SELECT * FROM usuario_licencia WHERE idpostulante='".$fila2[idpostulante]."'";
		//echo $fila2[idpostulante];
		$rs275=pg_query($link,$sql275);
		$fila275 =pg_fetch_array($rs275);
		}

$pdf->SetXY(2,3);
$pdf->Cell(28,17,'',1,0,'C');

$pdf->SetXY(7,5); 
$pdf->Cell(3,4,'GOB. REG.',0,1,'L',1);//certificado	
$pdf->SetXY(5,8); 
$pdf->Cell(10,4,'LAMBAYEQUE',0,1,'L',1);//certificado	
$pdf->SetXY(5,11); 
$pdf->Cell(13,4,'FORMULARIO',0,1,'L',1);//certificado	
$pdf->SetXY(7,14); 
$pdf->Cell(10,4,'001/15.18',0,1,'L',1);//certificado	

$pdf->SetXY(31,3);
$pdf->Cell(148,17,'',1,0,'C');

$pdf->SetFont('Arial','B',10);
$pdf->SetXY(67,5); 
$pdf->Cell(50,5,'SOLICITUD PARA ATENCION DE SERVICIOS',0,1,'L',1);
$pdf->SetFont('Arial','B',14);
$pdf->SetXY(70,10); 
$pdf->Cell(50,5,'DE LICENCIAS DE CONDUCIR ',0,1,'L',1);

$pdf->SetFont('Arial','B',8);
$pdf->SetXY(180,3);
$pdf->Cell(28,17,'',1,0,'C');

$pdf->SetXY(181,5); 
$pdf->Cell(14,4,'N° DE REGISTRO',0,1,'L',1);
//$pdf->SetXY(185,8); 
//$pdf->Cell(10,4,'REGISTRO ',0,1,'L',1);
$pdf->SetFont('Arial','B',11);
$pdf->SetXY(186,9); 
$pdf->Cell(12,4,$fila2[28],0,1,'L',1);

$actual = date('d/m/Y H:i:s');

$pdf->SetFont('Arial','',5);
$pdf->SetXY(180,13); 
$pdf->Cell(20,3,'Impreso por: ' .$_SESSION["usu"] ,0,1,'L',1);
$pdf->SetXY(180,16); 
$pdf->Cell(12,3,$actual ,0,1,'L',1);

//CLASE DE SERVICIO
$pdf->SetFont('Arial','B',6); //$pdf->SetFont('family','style',size);
 $pdf->SetXY(3,21); 
$pdf->Cell(50,5,'A. CLASE DE SERVICIO DEL SOLICITANTE:(Indique la clase de servicio que solicita)',0,1,'L',1);

//cuadro 111 GRANDE 01
$pdf->SetXY(2,22);
$pdf->Cell(206,141,'',1,0,'C');
$pdf->SetXY(2,34);
$pdf->Cell(206,0,'',1,0,'C');
//cuadro 222  GRANDE  2
$pdf->SetXY(2,164);
$pdf->Cell(206,17,'',1,0,'C');
//cuadroo 333
$pdf->SetXY(2,183);
$pdf->Cell(206,36,'',1,0,'C');
//cuadroo 444
$pdf->SetXY(2,220);
$pdf->Cell(206,23,'',1,0,'C');

$pdf->SetFont('Arial','B',6); //$pdf->SetFont('family','style',size);
 $pdf->SetXY(3,35); 
$pdf->Cell(60,3,'B. DATOS DEL TITULAR:(Indique sus Apellidos y Nombres de Acuerdo a su D.N.I)',0,1,'L',1);

$pdf->SetFont('Arial','B',9); //$pdf->SetFont('family','style',size);
$pdf->SetXY(7,42);
$pdf->Cell(115,9,'',1,0,'C');
$pdf->SetXY(7,47);
$pdf->Cell(115,0,'',1,0,'C');
$pdf->SetXY(10,43); 
$pdf->Cell(50,3,utf8_decode ($fila2[2]),0,1,'L',1);
$pdf->SetFont('Arial','',6);
$pdf->SetXY(50,48); 
$pdf->Cell(50,2,'Apellido Paterno',0,1,'L',1);

//dibujar cuadro
$pdf->SetXY(7,54);
$pdf->Cell(115,9,'',1,0,'C');
$pdf->SetXY(7,59);
$pdf->Cell(115,0,'',1,0,'C');
$pdf->SetFont('Arial','B',9);
$pdf->SetXY(10,55); 
$pdf->Cell(50,3,utf8_decode ($fila2[3]),0,1,'L',1);
$pdf->SetFont('Arial','',6);
$pdf->SetXY(50,60); 
$pdf->Cell(30,2,'Apellido Materno',0,1,'L',1);
$pdf->SetXY(10,60); 

$pdf->SetXY(7,66);
$pdf->Cell(115,9,'',1,0,'C');
$pdf->SetXY(7,71);
$pdf->Cell(115,0,'',1,0,'C');
$pdf->SetFont('Arial','B',9);
$pdf->SetXY(10,67);
$pdf->Cell(50,3,utf8_decode ($fila2[1]),0,1,'L',1);
$pdf->SetFont('Arial','',6);
$pdf->SetXY(54,72); 
$pdf->Cell(30,2,'Nombres',0,1,'L',1);


if($fila2[10]!=''){

$pdf->Image('imag/cuadri2.jpg',54,91,4);
$pdf->SetXY(59,91); 
$pdf->Cell(5,5,'C.E',0,1,'L',1);

$pdf->Image('imag/cuadri1.jpg',40,91,4);
$pdf->SetXY(45,91); 
$pdf->Cell(5,5,'D.N.I',0,1,'L',1);

}elseif($fila2[8]!=''){

$pdf->Image('imag/cuadri2.jpg',40,91,4);
$pdf->SetXY(45,91); 
$pdf->Cell(5,5,'D.N.I',0,1,'L',1);

$pdf->Image('imag/cuadri1.jpg',54,91,4);
$pdf->SetXY(59,91); 
$pdf->Cell(5,5,'C.E',0,1,'L',1);

}else{
$pdf->Image('imag/cuadri1.jpg',54,91,4);
$pdf->SetXY(59,91); 
$pdf->Cell(5,5,'C.E',0,1,'L',1);

$pdf->Image('imag/cuadri1.jpg',40,91,4);
$pdf->SetXY(45,91); 
$pdf->Cell(5,5,'D.N.I',0,1,'L',1);
}
$pdf->SetFont('Arial','',6);
$pdf->SetXY(4,92); 
$pdf->Cell(25,2,'Tipo de Documento de Identidad:',0,1,'L',1);

$pdf->Image('imag/cuadri1.jpg',68,91,4);
$pdf->SetXY(73,91); 
$pdf->Cell(5,5,'C.I',0,1,'L',1);

//NUMERO DNI
$pdf->SetFont('Arial','',5);
$pdf->SetXY(7,100); 
$pdf->Cell(20,0,'Número',0,1,'L',1);
$pdf->SetXY(5,98);
$pdf->Cell(55,12,'',1,0,'C');
$pdf->SetXY(5,102);
$pdf->Cell(55,0,'',1,0,'C');
// DNI
$pdf->SetFont('Arial','B',10);
if($fila2[10]!=''){
$pdf->SetXY(17,104); 
$pdf->Cell(20,5,$fila2[10],0,1,'L',1);
}else{
$pdf->SetXY(17,104); 
$pdf->Cell(20,5,$fila2[8],0,1,'L',1);
}

//FECHA NACIMIENTO
$pdf->SetFont('Arial','',5);
$pdf->SetXY(82,100); 
$pdf->Cell(20,0,'Fecha Nacimiento',0,1,'L',1);
$pdf->SetXY(80,98);
$pdf->Cell(45,12,'',1,0,'C');
$pdf->SetXY(80,102);
$pdf->Cell(45,0,'',1,0,'C');
$pdf->SetFont('Arial','B',9);
$pdf->SetXY(93,104); 
$fecha=normal($fila2[4]);
$pdf->Cell(15,3,$fecha,0,1,'L',1);


//$pdf->SetXY(7,80);
//$pdf->Cell(115,30,'',1,0,'C');

//dibujar cuadro
//$pdf->SetXY(150,25);
//$pdf->Cell(35,15,'',1,0,'C');

$pdf->SetFont('Arial','',6);
$pdf->SetXY(137,36); 
$pdf->Cell(25,5,'Fecha de Recepción ',0,1,'L',1);
//$pdf->SetFont('Arial','B',10);
//$pdf->SetXY(156,36);
//$pdf->Cell(15,4,date('d/m/Y'),0,1,'L',1);
//

$pdf->SetFont('Arial','B',7);
$pdf->SetXY(137,47); 
$pdf->Cell(25,5,'Nº SISGEDO',0,1,'L',1);
$pdf->SetFont('Arial','B',10);
$pdf->SetXY(156,50);
$pdf->Cell(15,4,$fila275[5],0,1,'L',1);

//dibujar duadro
$pdf->SetXY(155,31);
//$pdf->Cell(24,6,'',1,0,'C');

$pdf->SetFont('Arial','B',10);
if($fila2[26]=='NUEVO'){
$pdf->SetXY(157,42);

$pdf->Cell(25,0,$fila2[25],0,1,'L',1);
}elseif($fila2[26]=='RECATEGORIZACION'){
$pdf->SetXY(157,42);
//$pdf->Cell(25,0,date('d/m/Y'),0,1,'L',1);
$pdf->Cell(25,0,$fila2[25],0,1,'L',1);

}else{
$fechaactual=date('d/m/Y');
$pdf->SetXY(155,42);
$pdf->Cell(25,0,$fila2[25],0,1,'L',1);

//$pdf->Cell(25,0,$fechaactual,0,1,'L',1);
}

//dibujar cuadro
//$pdf->SetXY(148,42);
//$pdf->Cell(40,12,'',1,0,'C');
/*
$pdf->SetFont('Arial','',8);
$pdf->SetXY(153,43); 
$pdf->Cell(30,5,'Licencia Primigenia',0,1,'L',1);
$pdf->SetXY(160,48); 
$pdf->Cell(25,5,$fila275[1],0,1,'L',1);
$pdf->SetXY(163,55); 
$pdf->Cell(10,3,$fila275[4],0,1,'L',1);
*/
/*
$pdf->SetXY(140,60); 
$pdf->Cell(40,3,'Código del Departamento de Origen ',0,1,'L',1);
$pdf->SetXY(190,60); 
$pdf->Cell(10,5,$fila275[3],1,1,'L',1);
*/
$pdf->SetFont('Arial','',5);
$pdf->SetXY(66,124); 
$pdf->Cell(50,5,'Firma del solicitante',0,1,'L',1); 
$pdf->SetFont('Arial','',5);
$pdf->SetXY(172,124); 
$pdf->Cell(30,5,'Impresión Dactilar',0,1,'L',1); 
//$pdf->Image('imag/cuadri111.jpg',85,120,60);

//fecha de recepcion
$pdf->SetXY(135,36);
$pdf->Cell(65,10,'',1,0,'C');

// numero de sisgedo
$pdf->SetFont('Arial','B',7);
$pdf->SetXY(135,47);
$pdf->Cell(65,10,'',1,0,'C');


//numero de licecia de conducir
$pdf->SetFont('Arial','',6);
$pdf->SetXY(136,58); 
$pdf->Cell(20,5,'Número de Licencia de Conducir',0,1,'L',1); 
$pdf->SetXY(135,58);
$pdf->Cell(65,10,'',1,0,'C');

if ( $fila2[23] =="17"){
	$pdf->SetFont('Arial','B',10);
	$pdf->SetXY(156,62); 
	$pdf->Cell(25,5,$fila_especial[6],0,1,'L',1); 
}else{ 
	$pdf->SetFont('Arial','B',10);
	$pdf->SetXY(156,62); 
	$pdf->Cell(25,5,$fila275[1],0,1,'L',1);
 }
// restricciones
$pdf->SetFont('Arial','',6);
$pdf->SetXY(136,70); 
$pdf->Cell(20,3,'Restricciones',0,1,'L',1); 
$pdf->SetXY(135,69);
$pdf->Cell(65,10,'',1,0,'C');

$pdf->SetFont('Arial','B',12);
if($fila2[20]=='SIN RESTRICCIONES'){
//echo "S/R";
$pdf->SetXY(160,71); 
$pdf->Cell(20,5,'S/R',0,1,'L',1); 
}else{
$pdf->SetXY(160,71); 
$pdf->Cell(20,5,'C/C',0,1,'L',1); 
//echo "C/C";
}

//$pdf->SetXY(5,105);
//$pdf->Cell(55,12,'',1,0,'C');

//CLASE A CATEGORIA


$pdf->SetFont('Arial','B',9);
$pdf->SetXY(150,84); 
$pdf->Cell(30,0,'Clase "A" Categoría:',0,1,'L',1);

$pdf->SetXY(135,80);
$pdf->Cell(65,30,'',1,0,'C');

if($fila2[32]=='AI'){
$pdf->Image('imag/cuadri2.jpg',140,88,4);
}else{
$pdf->Image('imag/cuadri1.jpg',140,88,4);
}
if($fila2[32]=='AII-a'){
$pdf->Image('imag/cuadri2.jpg',140,93,4);
}else{
$pdf->Image('imag/cuadri1.jpg',140,93,4);
}
if($fila2[32]=='AII-b'){
$pdf->Image('imag/cuadri2.jpg',140,98,4);
}else{
$pdf->Image('imag/cuadri1.jpg',140,98,4);
}
if($fila2[32]=='AIII-a'){
$pdf->Image('imag/cuadri2.jpg',180,88,4);
}else{
$pdf->Image('imag/cuadri1.jpg',180,88,4);
}
if($fila2[32]=='AIII-b'){
$pdf->Image('imag/cuadri2.jpg',180,93,4);
}else{
$pdf->Image('imag/cuadri1.jpg',180,93,4);
}
if($fila2[32]=='AIII-c'){
$pdf->Image('imag/cuadri2.jpg',180,98,4);
}else{
$pdf->Image('imag/cuadri1.jpg',180,98,4);
}
if($fila2[32]=='AIV'){
$pdf->Image('imag/cuadri2.jpg',155,103,4);
}else{
$pdf->Image('imag/cuadri1.jpg',155,103,4);
}
$pdf->SetFont('Arial','',9);
$pdf->SetXY(145,89); 
$pdf->Cell(25,2,'Uno Particular',0,1,'L',1);

$pdf->SetXY(145,93); 
$pdf->Cell(5,5,'II a',0,1,'L',1);

$pdf->SetXY(145,98); 
$pdf->Cell(5,5,'II b',0,1,'L',1);

$pdf->SetFont('Arial','',9);
$pdf->SetXY(185,89); 
$pdf->Cell(5,2,'III a',0,1,'L',1);

$pdf->SetXY(185,93); 
$pdf->Cell(5,5,'III b',0,1,'L',1);

$pdf->SetXY(185,98); 
$pdf->Cell(5,5,'III c',0,1,'L',1);

$pdf->SetXY(160,103); 
$pdf->Cell(5,5,'IV - ESPECIAL',0,1,'L',1);
//$pdf->Cell(5,5,'III a',0,1,'L',1);
//$pdf->SetXY(7,85);
//$pdf->Cell(115,0,'',1,0,'C');


$pdf->SetFont('Arial','',8);

//TELEFONO  E EMAIL
$pdf->SetXY(20,87); 
$pdf->Cell(20,0,'Teléfono',0,1,'L',1);
$pdf->SetXY(75,87); 
$pdf->Cell(20,0,'E-mail',0,1,'L',1);
$pdf->SetXY(7,77);
$pdf->Cell(115,12,'',1,0,'C');
$pdf->SetXY(7,85);
$pdf->Cell(115,0,'',1,0,'C');
$pdf->SetXY(7,77);
$pdf->Cell(40,12,'',1,0,'C');


//DIRECCION ACTUAL
$pdf->SetXY(3,113);
$pdf->Cell(202,9,'',1,0,'C');
$pdf->SetXY(3,119);
$pdf->Cell(202,0,'',1,0,'C');
$pdf->SetFont('Arial','',5);
$pdf->SetXY(85,121); 
$pdf->Cell(20,0,'DIRECCION ACTUAL',0,1,'L',1);
$pdf->SetFont('Arial','',8);
$pdf->SetXY(5,115); 
$pdf->MultiCell(190,3,utf8_decode ($fila2[14]),0,1,'L',1);

//USUARIO QUE REALIZA EL TRAMITE
$pdf->SetXY(10, 201);
$pdf->Cell(35,7,'_____________________',9,1,'C',0);

$pdf->SetXY(10,205);
$pdf->SetFont('Arial','',6);
$pdf->Cell(35,7,utf8_decode ($fila2[29]),9,1,'C',0);

//cuadro  FIRMA  IMPRESION DACTILAR
$pdf->SetXY(3,124);
$pdf->Cell(155,38,'',1,0,'C');
$pdf->SetXY(170,124);
$pdf->Cell(35,38,'',1,0,'C');
$pdf->SetXY(3,124);
$pdf->Cell(60,38,'',1,0,'C');

$pdf->SetFont('Arial','',6);
$pdf->SetXY(4,125); 
$pdf->MultiCell(57,3,'Declaro bajo juramento no haber sido intervenido por la PNP, con infracción que amerite retención de Licencia de Conducir y/o por haber acumulado cien (100) puntos en infracciones que den mérito a suspención, cancelación e inhabilitación temporal o definitiva del conductor para obtener Licencia de Conducir Art. 313º del D.S. Nº 025-2009-MTC.
Y conocer que, la tramitación y obtención de Licencia de Conducir, estando en proceso de cancelación, o inhabilitación motivará ser sancionado hasta con inhabilitación definitiva. Art. 317º del D.S. Nº025-20209-MTC.',0,'J','L',1); 
$pdf->SetFont('Arial','',6);
$pdf->SetXY(4,165); 
$pdf->MultiCell(201,3,'Declaro bajo juramento tener pleno conocimiento de la ley Nº 27444 "Ley del Procedimiento Administrativo General" Art. 32 inc.3 y Decreto Supremo Nº 007-2016-MTC art. 14.
En caso de comprobar fraude o falsedad en declaración, información o en la documentación prestada por el administrado, la entidad considera no satisfecha la exigencia respectiva para todos sus efectos, procediendo a comunicar el hecho a la autoridad jerárquicamente superior, si lo hubiere, para que se declare la nulidad del acto administrativo sustentado en dicha declaración, información o documento; imponga a quien haya empleado dicha declaración, información o documento una multa a favor de la entidad entre dos y cinco unidades impositivas tributarias vigentes a la fecha de pago; y, además, si la conducta se adecua a los supuestos imprevistos en el título XIX delitos contra la Fe Publica del Código Penal, esta deberá ser comunicada al Ministerio Público para que interponga la acción penal correspondiente.
',0,'J','L',1);

$pdf->SetFont('Arial','B',6); //$pdf->SetFont('family','style',size);
$pdf->SetXY(3,186); 
$pdf->Cell(50,0,'C. RESPONSABLES DEL SERVICIO DE LICENCIAS DE CONDUCIR',0,1,'L',1);
$pdf->SetXY(5,188);
$pdf->Cell(45,23,'',1,0,'C');
$pdf->SetXY(56,188);
$pdf->Cell(45,23,'',1,0,'C');
$pdf->SetXY(108,188);
$pdf->Cell(45,23,'',1,0,'C');
$pdf->SetXY(159,188);
$pdf->Cell(45,23,'',1,0,'C');

$pdf->SetFont('Arial','',6);
$pdf->SetXY(3,212); 
$pdf->MultiCell(50,3,'',0,1,'L',1);
$pdf->SetXY(3,212); 
$pdf->MultiCell(50,3,'Sello o firma del Responsable de Aceptar el Trámite y asignar el numero de Registro.',0,'C','L',1);
$pdf->SetXY(53,212); 
$pdf->MultiCell(50,3,'Sello o firma del Responsable de Impresión y laminado del documento de respuesta.',0,'C','L',1);
$pdf->SetXY(106,212); 
$pdf->MultiCell(50,3,'Sello o firma  del Responsable del Control de Calidad del documento de respuesta.',0,'C','L',1);
 $pdf->SetXY(159,212); 
$pdf->MultiCell(45,3,'Sello o firma del Responsable del Área de Emisión del documento de respuesta.',0,'C','L',1);

$pdf->SetFont('Arial','B',6);
$pdf->SetXY(3,221); 
$pdf->Cell(50,5,'D. SOLO PARA USO DE LAS DIRECCIONES DE CIRCULACION TERRESTRE EN PROVINCIAS',0,1,'L',1);

$pdf->SetXY(5,226);
$pdf->Cell(99,15,'',1,0,'C');
$pdf->SetXY(107,226);
$pdf->Cell(99,15,'',1,0,'C');

//$pdf->SetXY(33,243);
//$pdf->Cell(145,5,'',1,0,'C');

$pdf->SetFont('Arial','',6);
$pdf->SetXY(7,227); 
$pdf->Cell(50,5,'Firma del Jefe de Licencias de Conducir',0,1,'L',1);
$pdf->SetXY(109,227); 
$pdf->Cell(50,5,'Firma del Director de Circulación Terrestre',0,1,'L',1);
/*
$pdf->SetXY(40,246); 
$pdf->Cell(100,0,'Declaro bajo juramento tener pleno conocimiento de la Ley Nº 27444 Ley del procedimiento Administrativo General Art. 32 Inc.3',0,1,'L',1);
*/
$pdf->SetXY(2,245); 
$pdf->Cell(50,0,'- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -  - - -- - - -  - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -- - - - -- - - - - - - - - - - -- - - - -- - - - - - - - - - - -- - - - - - - - - - - - -- - - - - - - - - - -  - - -',0,1,'L',1);
$pdf->SetFont('Arial','B',9);
$pdf->SetXY(2,247);
$pdf->Cell(28,15,'',1,0,'C');

$pdf->SetXY(7,249); 
$pdf->Cell(3,4,'GOB. REG.',0,1,'L',1);//certificado	
$pdf->SetXY(4,252); 
$pdf->Cell(10,4,'LAMBAYEQUE',0,1,'L',1);//certificado	
$pdf->SetXY(5,255); 
$pdf->Cell(13,4,'FORMULARIO',0,1,'L',1);//certificado	
$pdf->SetXY(7,258); 
$pdf->Cell(10,3,'001/15.18',0,1,'L',1);//certificado	

$pdf->SetXY(31,247);
$pdf->Cell(148,15,'',1,0,'C');

$pdf->SetFont('Arial','B',10);
$pdf->SetXY(67,249); 
$pdf->Cell(50,5,'SOLICITUD PARA ATENCION DE SERVICIOS',0,1,'L',1);
$pdf->SetFont('Arial','B',14);
$pdf->SetXY(70,253); 
$pdf->Cell(50,5,'DE LICENCIAS DE CONDUCIR ',0,1,'L',1);

$actual = date('d/m/Y H:i:s');

$pdf->SetFont('Arial','',5);
$pdf->SetXY(100,257); 
$pdf->Cell(12,3,$actual ,0,1,'L',1);


$pdf->SetFont('Arial','B',9);

$pdf->SetXY(180,247);
$pdf->Cell(28,15,'',1,0,'C');

$pdf->SetXY(188,248); 
$pdf->MultiCell(12,4,'N° DE',0,1,'L',1);
$pdf->SetXY(185,252); 
$pdf->Cell(10,4,'REGISTRO ',0,1,'L',1);
$pdf->SetXY(188,257); 
$pdf->Cell(12,4,utf8_decode ($fila2[28]),0,1,'L',1);


/*
 if($fila2[26]=='NUEVO'){echo "";}elseif($fila2[26]=='RECATEGORIZACION'){echo "";}else{echo date('d/m/Y');}
*/
$pdf->SetFont('Arial','B',25);
$pdf->SetXY(54,27); 
$pdf->Cell(60,5,utf8_decode ($fila2[26])." ".utf8_decode ($fila2[32]),0,'C','L',1);

$pdf->Output('report_licencias.pdf','I'); 
?>