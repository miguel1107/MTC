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

//$pag=$_POST["pagina"];
$ppaa="pasar_reporte.php?fechaini=".$_POST["xxxfecha"]."&tipotra=".$_POST["tipotra"];

echo "<script>AbreVentana('".$ppaa."')</script>

";
?>