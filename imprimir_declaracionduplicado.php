<?php
session_start();
if(!isset($_SESSION["usuario"])) header("location:index.php");
require ("traducefecha.php");
include ("conectar.php");
$link=Conectarse();
require('pdf/fpdf.php');

$pdf=new FPDF();
$pdf->AddPage();
$pdf->SetTitle('PDF via PHP');
//Set font and colors
$pdf->SetFont('Arial','B',9); //$pdf->SetFont('family','style',size);
$pdf->SetFillColor(255,255,255); //Color de Fondo 0 - 255 
$pdf->SetTextColor(77); //Color de Texto 0 - 255 ,tambien SetTextColor(255,255,255);
$pdf->SetDrawColor(0,0,0); //Color de Linea 0 - 255
$pdf->SetLineWidth(.3); //Grosor de Linea


$sql2="SELECT * FROM postulante p INNER JOIN tramite t ON p.idpostulante=t.idpostulante WHERE t.idtramite='".$_GET["idtramite"]."'";
		// echo $sql2;exit;
		$rs2=pg_query($link,$sql2);
		$fila2 =pg_fetch_array($rs2);

		$echotra;
		$tra=$fila2[31];
		  $long=strlen($tra);  
		  if ($long==1) {
		    $sq="SELECT nombre FROM tipo_tramite WHERE id_tipo='".$tra."'";
		    $f=pg_query($link,$sq);
		    $filatra=pg_fetch_array($f);
		    $echotra =$filatra[0];
		  }else{
		    $echotra=$tra;
		  } 
		//$result=pg_query($sql)or die ("Error : $sql");
		///**************
		$xsql27="select c.nombre from categoria c inner join tramite t  on c.idcategoria=t.idcategoria where t.idtramite='".$_GET["idtramite"]."'";
		$xrs27=pg_query($link,$xsql27);
		$xfila27 =pg_fetch_array($xrs27);		

$sql275="SELECT * FROM usuario_licencia WHERE idpostulante='".$fila2[0]."'";
		$rs275=pg_query($link,$sql275);
		$fila275 =pg_fetch_array($rs275);
///////////////////////////////			

$pdf->Image('imag/LOGO.jpg',20,15,20);
$pdf->Image('imag/banner_top1.jpg',165,15,20);

     
$pdf->SetXY(78,20); 
$pdf->Cell(50,5,'GOBIENRO REGIONAL DE LAMBAYEQUE',0,1,'',1);


   
       /*if($fila2[26]=='NUEVO'){
	   $pdf->SetXY(150,20); 
		$pdf->Cell(50,5,'OBTENCION',0,1,'L',1);
	   }else{
		$pdf->SetXY(160,20); 
		$pdf->Cell(50,5,$fila2[26],0,1,'L',1);
		}*/
/* $pdf->SetXY(180,20); 
$pdf->Cell(50,5, $xfila27[0],0,1,'L',1);  */
$pdf->SetXY(55,25); 
$pdf->Cell(50,5,'GERENCIA REGIONAL DE TRANSPORTES Y COMUNICACIONES DE',0,1,'L',1); 

$pdf->SetXY(100,30); 
$pdf->Cell(30,5,'LAMBAYEQUE',0,1,'L',1);    

$pdf->SetXY(62,37); 
$pdf->Cell(50,5,'DIRECCION EJECUTIVA DE CIRCULACION TERRESTRE',0,1,'',1);

/*$pdf->SetXY(20,50); 
$pdf->Cell(50,5,'SEÑOR',0,1,'L',1);        
$pdf->SetXY(20,55); 
$pdf->Cell(50,5,'DIRECTOR DE CIRCULACION TERRESTRE - LAMBAYEQUE',0,1,'L',1);                   
$pdf->SetXY(20,60); 
$pdf->Cell(50,5,'S.D',0,1,'L',1);       
$pdf->SetFont('Arial','',9);        */    
$pdf->SetFont('Arial','BU',16);
$pdf->SetXY(73,50); 
$pdf->Cell(50,5,'DECLARACION JURADA',0,1,'',1);
$pdf->SetFont('Arial','',9);
$pdf->SetXY(98,57); 
$pdf->Cell(50,5,'(Duplicado)',0,1,'',1);


$pdf->SetFont('Arial','',9);	
$pdf->SetXY(20,70); 
$pdf->Cell(20,5,'Yo:',0,1,'L',1);                   
$pdf->SetFont('Arial','B',9);	
$pdf->SetXY(30,70); 
$pdf->Cell(50,5,utf8_decode($fila2[1])."   ".utf8_decode($fila2[2])."   ".utf8_decode($fila2[3]),0,1,'L',1);                   
$pdf->SetFont('Arial','',9);	
       
$pdf->SetXY(20,77); 
$pdf->Cell(50,5,'Identificado (a) D.N.I. / C.E. N°:',0,1,'L',1);  		
$pdf->SetFont('Arial','B',9);            
$pdf->SetXY(70,77); 
$pdf->Cell(20,5,$fila2[8],0,1,'L',1);  		        
$pdf->SetFont('Arial','',9);    
$pdf->SetXY(20,84); 
$pdf->Cell(50,5,'Domiciliado en :  ',0,1,'L',1);  
/*$pdf->SetFont('Arial','B',9);		            
$pdf->SetXY(20,84); 
$pdf->Cell(50,5,' en la calle ',0,1,'L',1);  		            
*/
$pdf->SetFont('Arial','B',9);   
$pdf->SetXY(50,84); 
$pdf->MultiCell(110,5,utf8_decode($fila2[14]),0,1,'R',1);  		            

$pdf->SetFont('Arial','',9);
$pdf->SetXY(20,91);
$pdf->Cell(50,5,'Realizando el Tramite de : ',0,1,'L',1);
$pdf->SetFont('Arial','B',9);
$pdf->SetXY(62,90);
$pdf->Cell(20,7,$echotra." - ".$xfila27[0],0,1,'L',1);
/*$pdf->SetXY(163,84); 
$pdf->Cell(50,5,' ; ante usted',0,1,'L',1); */ 		            
$pdf->SetXY(20,100); 
$pdf->Cell(50,5,'DECLARACION BAJO JURAMENTO:',0,1,'L',1);  
$pdf->SetFont('Arial','',9);		            
/*$pdf->SetXY(20,110); 
$pdf->Cell(30,5,'Que estando en tramite',0,1,'L',1);
$pdf->SetFont('Arial','B',9);
if($fila2[26]=='NUEVO'){
$pdf->SetXY(74,110); 
$pdf->Cell(30,5,'OBTENCION',0,1,'L',1);
}else{
 $pdf->SetXY(74,110); 
$pdf->Cell(50,5,$fila2[26],0,1,'L',1);
 }

$pdf->SetXY(110,110); 
$pdf->Cell(50,5,$xfila27[0],0,1,'L',1);
$pdf->SetFont('Arial','',9);
$pdf->SetXY(143,110); 
$pdf->Cell(50,5,'de mi licencia de conducir,',0,1,'L',1);   */
$pdf->SetXY(47,110); 
$pdf->MultiCell(170,5,'De  no estar  privado  por  resolución  judicial  firme  con calidad  de  cosas  juzgada  del derecho  a  ',0,1,'J',1);

$pdf->SetXY(20,115); 
$pdf->MultiCell(172,5,'conducir  vehiculos  del  transporte  terrestre ,  ni contar  con  mandatos  de  reexaminación  médica y  psicológica,   de  acuerdo  a  lo  normado  en   el  D.S. Nº 007-2016-MTC ,    que  aprueba  el   Reglamento  Nacional de  Emisión      de Licencias de Conducir.',0,1,'J',1);   

$pdf->SetXY(20,132); 
$pdf->MultiCell(170,5,'En señal de conformidad y de acuerdo a lo normado en la Ley N° 27444, Ley del Procedimiento Administrativo General y Modificatoria, firmo la presente en la ciudad de Chiclayo, a los ',0,1,'J',1);  
 				
$datosdias=date('d');
$pdf->SetXY(111,137); 
$pdf->Cell(10,5,$datosdias,0,1,'L',1); 	
$pdf->SetXY(116,137); 
$pdf->Cell(10,5,' dias del mes de ',0,1,'L',1); 		   


            $mess=date('m'); 
			switch($mess){
					case '1': $pdf->SetXY(140,137); 
							 $pdf->Cell(50,5,'Enero',0,1,'L',1);  break;
					case '2': $pdf->SetXY(140,137); 
							 $pdf->Cell(50,5,'Febrero',0,1,'L',1);  break;
					case '3': $pdf->SetXY(140,137); 
							 $pdf->Cell(50,5,'Marzo',0,1,'L',1);   break;
					case '4': $pdf->SetXY(140,137); 
							 $pdf->Cell(50,5,'Abril',0,1,'L',1);   break;
					case '5': $pdf->SetXY(140,137); 
							 $pdf->Cell(50,5,'Mayo',0,1,'L',1);   break;
					case '6': $pdf->SetXY(140,137); 
							 $pdf->Cell(50,5,'Junio',0,1,'L',1);   break;
					case '7': $pdf->SetXY(140,137); 
							 $pdf->Cell(50,5,'Julio',0,1,'L',1);  break;
					case '8': $pdf->SetXY(140,137); 
							 $pdf->Cell(15,5,'Agosto',0,1,'L',1);   break;
					case '9': $pdf->SetXY(140,137); 
							 $pdf->Cell(50,5,'Setiembre',0,1,'L',1);   break;
					case '10': $pdf->SetXY(140,137); 
							 $pdf->Cell(50,5,'Octubre',0,1,'L',1);   break;
					case '11': $pdf->SetXY(140,137); 
							 $pdf->Cell(50,5,'Noviembre',0,1,'L',1);  break;
					case '12': $pdf->SetXY(140,137); 
							 $pdf->Cell(50,5,'Diciembre',0,1,'L',1);  break;
			
			} 
			

$pdf->SetXY(150,137); 
$pdf->Cell(5,5,'del año ',0,1,'L',1);
$datoano=date('Y.');
$pdf->SetXY(162,137); 
 
$pdf->Cell(5,5,$datoano,0,1,'L',1);
 $pdf->SetXY(60,180); 
$pdf->Cell(5,5,'___________________________________',0,1,'L',1);
 $pdf->SetXY(85,185); 
$pdf->Cell(5,5,'FIRMA',0,1,'L',1);
 $pdf->SetXY(160,190); 
$pdf->Cell(5,5,'Huella Digital',0,1,'L',1);
//cuadro 111
$pdf->SetXY(155,150);
$pdf->Cell(30,40,'',1,0,'C');

$pdf->SetFont('Arial','B',12);
$pdf->SetXY(140,225); 
$pdf->Cell(14,4,'N° TRAMITE :',0,1,'L',1);
//$pdf->SetXY(185,8); 
//$pdf->Cell(10,4,'REGISTRO ',0,1,'L',1);
$pdf->SetFont('Arial','B',11);
$pdf->SetXY(173,225); 
$pdf->Cell(14,4,$fila2[20],0,1,'R',1);

$actual = date('d/m/Y H:i:s');
$pdf->SetFont('Arial','',8);
$pdf->SetXY(160,240); 
$pdf->Cell(20,3,'Impreso por: ' .$_SESSION["usu"] ,0,1,'L',1);
$pdf->SetXY(160,245); 
$pdf->Cell(12,3,$actual ,0,1,'L',1);
			
//$pdf->Rect(5,5,185,120); //Dibuja un rectangulo: Rect($x, $y, $w, $h, $style='')
$pdf->Output('report_licencias.pdf','I'); 
?>