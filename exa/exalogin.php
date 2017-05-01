<?php
session_start();
//if(!isset($_SESSION["usuario"])) header("location:../index.php");
include ("../conectar.php");
$link=conectarse();
//if($_SESSION["nombre"]=='AI'){ 


if($_SESSION["tipotramite"]=='NUEVO' || $_SESSION["tipotramite"]=='1'|| $_SESSION["tipotramite"]=='REVALIDACION' || $_SESSION["tipotramite"]=='3'){    
      //PRIMERA OPCION PARA DAR EXAMEN NUEVOS
     /////////////////////////////////////////////////
	$prega1=array();
	reset($prega1);
	$sqla1="SELECT * from preguntas where tipo='GENERAL' order by idpregunta ASC ";

	$rsa1=pg_query($link,$sqla1) or die ("error : $ssql");
	while($rega1=pg_fetch_array($rsa1)) { 
		$prega1[]=$rega1[0];
	}

   $num = Array();
   reset($num);
   for($i=1;$i<=40;$i++)
   {
	 $num[$i]=$prega1[rand(0,count($prega1)-1)];
	  if($i>1)
	  {
		 for($x=1; $x<$i; $x++)
		 {
		   if($num[$i]==$num[$x])
		   {
			 $i--;
			 break;
		   }
		}
	 }
   }


/////////////////////////////////////////////
					
////////////////////////////////////////////
 		 $_SESSION["hora"]=1;
		 $_SESSION["minuto"]=59;
		 $_SESSION["segundo"]=59;
		 
		$_SESSION["preguntas"]=array();
		 foreach($num as $valor)
		 {
		$_SESSION["preguntas"][]=$valor;
		 }
		//  foreach($num1 as $valor1)
		//  {
		// $_SESSION["preguntas"][]=$valor1;
		//  }	


//echo count($_SESSION["preguntas"]);
//exit(); 
/////////////////////////////////////////////				
// }else{ SEGUNDA OPCION PARA DAR EXAMEN RECATEGORIZACION
/*}elseif($_SESSION["tipotramite"]=='RECATEGORIZACION' || $_SESSION["tipotramite"]=='CANJE RECATEGORIZACION' ){
///////////////////////////////////////////
	$prega1=array();
	reset($prega1);
	$sqla1="select * from preguntas where tipo='TRANSITO' order by idpregunta ASC ";
	$rsa1=pg_query($link,$sqla1) or die ("error : $ssql");
	while($rega1=pg_fetch_array($rsa1)) { 
		$prega1[]=$rega1[0];
	}
////////////////////////////////////////////
	 $num = Array();
	 reset($num);
	 for($i=1;$i<=5;$i++)
	 {
	   $num[$i]=$prega1[rand(0,count($prega1)-1)];
		if($i>1)
		{
		   for($x=1; $x<$i; $x++)
		   {
			 if($num[$i]==$num[$x])
			 {
			   $i--;
			   break;
			 }
		  }
	   }
	 }
/////////////////////////////////////////////
	  
	  $sqla2="select * from preguntas where tipo='MANEJO' order by idpregunta ASC ";
	  $rsa2=pg_query($link,$sqla2) or die ("error : $ssql");
	  $prega2=array();
	  reset($prega2);				
	  while($rega2=pg_fetch_array($rsa2)) { 
		  $prega2[]=$rega2[0];
	  }
////////////////////////////////////////////
	
	 $num1 = Array();
	 reset($num1);
	 for($i=1;$i<=5;$i++)
	 {
	   $num1[$i]=$prega2[rand(0,count($prega2)-1)];
		if($i>1)
		{
		   for($x=1; $x<$i; $x++)
		   {
			 if($num1[$i]==$num1[$x])
			 {
			   $i--;
			   break;
			 }
		  }
	   }
	 }
/////////////////////////////////////////////	
	  $sqla3="select * from preguntas where tipo='CARGA' order by idpregunta ASC ";
	  $rsa3=pg_query($link,$sqla3) or die ("error : $ssqa3");
	  $prega3=array();
	  reset($prega3);				
	  while($rega3=pg_fetch_array($rsa3)) { 
		  $prega3[]=$rega3[0];
	  }
////////////////////////////////////////////
	 $num2 = Array();
	 reset($num1);
	 for($i=1;$i<=20;$i++)
	 {
	   $num2[$i]=$prega3[rand(0,count($prega3)-1)];
		if($i>1)
		{
		   for($x=1; $x<$i; $x++)
		   {
			 if($num2[$i]==$num2[$x])
			 {
			   $i--;
			   break;
			 }
		  }
	   }
	 }
/////////////////////////////////////////////	
	$sqla4="select * from preguntas where tipo='MECANICA' order by idpregunta ASC ";
		$rsa4=pg_query($link,$sqla4) or die ("error : $ssql");
		$prega4=array();
		reset($prega4);				
		while($rega4=pg_fetch_array($rsa4)) { 
			$prega4[]=$rega4[0];
		}
////////////////////////////////////////////
	 $num3 = Array();
	 reset($num3);
	 for($i=1;$i<=10;$i++)
	 {
	   $num3[$i]=$prega4[rand(0,count($prega4)-1)];
		if($i>1)
		{
		   for($x=1; $x<$i; $x++)
		   {
			 if($num3[$i]==$num3[$x])
			 {
			   $i--;
			   break;
			 }
		  }
	   }
	 }
/////////////////////////////////////////////	
	$sqla5="select * from preguntas where tipo='PRIMEROS AUXILIOS' order by idpregunta ASC ";
					$rsa5=pg_query($link,$sqla5) or die ("error : $ssql");
					$prega5=array();
					reset($prega5);				
					while($rega5=pg_fetch_array($rsa5)) { 
						$prega5[]=$rega5[0];
					}
////////////////////////////////////////////
	 $num4 = Array();
	 reset($num4);
	 for($i=1;$i<=10;$i++)
	 {
	   $num4[$i]=$prega5[rand(0,count($prega5)-1)];
		if($i>1)
		{
		   for($x=1; $x<$i; $x++)
		   {
			 if($num4[$i]==$num4[$x])
			 {
			   $i--;
			   break;
			 }
		  }
	   }
	 }
////////////////////////////////////////////
 		 $_SESSION["hora"]=1;
		 $_SESSION["minuto"]=59;
		 $_SESSION["segundo"]=59;
		 $_SESSION["preguntas"]=array();

		 foreach($num as $valor)
		 {
		   $_SESSION["preguntas"][]=$valor;
		 }
		 foreach($num1 as $valor1)
		 {
		   $_SESSION["preguntas"][]=$valor1;
		 }
		  foreach($num2 as $valor2)
		 {
		   $_SESSION["preguntas"][]=$valor2;
		 }
		 foreach($num3 as $valor3)
		 {
		   $_SESSION["preguntas"][]=$valor3;
		 }
		  foreach($num4 as $valor4)
		 {
		   $_SESSION["preguntas"][]=$valor4;
		 }	 */
/////////////////////////////////////////////	
// } 
}else{ 



 /* // TERCERA OPCION PARA DAR EXAMEN REVALIDACION

/////////////////////////////////////////////////
	$prega1=array();
	reset($prega1);
	$sqla1="select * from preguntas where tipo='TRANSITO' order by idpregunta ASC ";
	$rsa1=pg_query($link,$sqla1) or die ("error : $ssql");
	while($rega1=pg_fetch_array($rsa1)) { 
		$prega1[]=$rega1[0];
	}
////////////////////////////////////////////
	 $num = Array();
	 reset($num);
	 for($i=1;$i<=20;$i++)
	 {
	   $num[$i]=$prega1[rand(0,count($prega1)-1)];
		if($i>1)
		{
		   for($x=1; $x<$i; $x++)
		   {
			 if($num[$i]==$num[$x])
			 {
			   $i--;
			   break;
			 }
		  }
	   }
	 }

////////////////////////////////////////////
 		 $_SESSION["hora"]=0;
		 $_SESSION["minuto"]=39;
		 $_SESSION["segundo"]=39;
		 
		$_SESSION["preguntas"]=array();
		 foreach($num as $valor)
		 {
		$_SESSION["preguntas"][]=$valor;
		 }*/
	/*	 foreach($num1 as $valor1)
		 {
		$_SESSION["preguntas"][]=$valor1;
		 }	 
	*/
/////////////////////////////////////////////		

}   // FIN DE LAS OPCIONES PARA DAR EXAMEN  
echo $_SESSION["preguntas"];
if($_SESSION["tipotramite"]=='REVALIDACION' || $_SESSION["tipotramite"]=='3' || $_SESSION["tipotramite"]=='CANJE REVALIDACION'){
header("Location:examennnreva.php?idevaluacion=".$_SESSION["idevaluacion"]."&fechago='".$_SESSION["fechago"]."'&idexamen=".$_SESSION["idexamen"]."&idtramite=".$_SESSION["idtramite"]."&codigopost=".$_SESSION["codigopost"]."&idcategoria=".$_SESSION["idcategoria"]."&tipotramite=".$_SESSION["tipotramite"]."&usukpost=".$_SESSION["usukpost"]."");
}else{
header("Location:examennn.php?idevaluacion=".$_SESSION["idevaluacion"]."&fechago='".$_SESSION["fechago"]."'&idexamen=".$_SESSION["idexamen"]."&idtramite=".$_SESSION["idtramite"]."&codigopost=".$_SESSION["codigopost"]."&idcategoria=".$_SESSION["idcategoria"]."&tipotramite=".$_SESSION["tipotramite"]."&usukpost=".$_SESSION["usukpost"]."");
}

?>