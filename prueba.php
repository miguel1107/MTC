<?php 
  session_start();
  if(!isset($_SESSION["usuario"])) header("location:index.php");

  include ("traducefecha.php");
  //include("comun/function.php");
  include ("conectar.php");
  $link=Conectarse();
  $cant=count($_POST["chk"]);
  if($cant > 0){
    foreach($_POST["chk"] as $k =>$v){
      $numtra=$v;
    }
  }

?>
<script src="js/solicitud.js"></script>
<script>
  var tra="<?php echo $numtra; ?>"
  verFicha(tra);
</script>