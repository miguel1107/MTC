<?php
echo"
<script language='JavaScript'>
function AbreVentana(sURL){
  var w=640, h=480;

  if (window.screen && window.screen.availHeight) {
    h = window.screen.availHeight - 58; // 58
    w = window.screen.availWidth - 4;
  }

  var ventana=window.open(sURL, 'Estadisticas', 'status=yes,resizable=yes,toolbar=no,scrollbars=yes,top=0,left=0,width=' + w + ',height=' + h, 1 );
  ventana.focus();
}
</script>";

if($_POST["opcion"]=='1'){  
$pag=$_POST["pagina"];
$ppaa="pasar_estadi.php?fechaini=".$_POST["fechaini"]."&fechafin=".$_POST["fechafin"]."&sexo=".$_POST["sexo"]."&tipotra=".$_POST["tipotra"]."&txtnom=".$_POST["txtnom"]."&txtapepat=".$_POST["txtapepat"]."&txtapemat=".$_POST["txtapemat"]."&impreportexcel=".$_POST["impreportexcel"]."&opcion=".$_POST["opcion"];
}elseif($_POST["opcion"]=='2'){
$pag=$_POST["pagina"];
$ppaa="pasar_estadi.php?fechaini=".$_POST["fechaini"]."&fechafin=".$_POST["fechafin"]."&sexo=".$_POST["sexo"]."&tipotra=".$_POST["tipotra"]."&impreportexcel=".$_POST["impreportexcel"]."&opcion=".$_POST["opcion"];

}elseif($_POST["opcion"]=='3'){
$pag=$_POST["pagina"];
$ppaa="pasar_estadi.php?fechaini=".$_POST["fechaini"]."&fechafin=".$_POST["fechafin"]."&resultado=".$_POST["resultado"]."&tipoexamen=".$_POST["tipoexamen"]."&impreportexcel=".$_POST["impreportexcel"]."&opcion=".$_POST["opcion"];
}elseif($_POST["opcion"]=='4'){
$pag=$_POST["pagina"];
$ppaa="pasar_estadi.php?fechaini=".$_POST["fechaini"]."&categoria=".$_POST["categoria"]."&impreportexcel=".$_POST["impreportexcel"]."&opcion=".$_POST["opcion"];
}elseif($_POST["opcion"]=='5'){///////////////

$pag=$_POST["pagina"];
$ppaa="pasar_estadi.php?fechaini=".$_POST["fechaini"]."&fechafin=".$_POST["fechafin"]."&impreportexcel=".$_POST["impreportexcel"]."&opcion=".$_POST["opcion"]."&estadi=".$_POST["estadi"];;
}
/////////////////

?>
<?
echo "<script>AbreVentana('".$ppaa."')</script>
<script languaje='JavaScript'>
location.href='".$pag."';
</script>
";
?>