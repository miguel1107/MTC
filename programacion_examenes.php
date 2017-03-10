<?php
  session_start();
  if(!isset($_SESSION["usuario"])) header("location:index.php");
  include ("conectar.php");
  $link=Conectarse();
  $tienecursopro='No';
?>
<html>
<head>
  <title></title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <link rel="stylesheet" type="text/css" media="screen" href="estilos/tabscreen.css">
  <link rel="stylesheet" type="text/css" media="all" href="estilos/menumx.css">
  <link rel="stylesheet" type="text/css" media="print" href="estilos/tabprint.css">
  <link rel="stylesheet" type="text/css" media="all" href="estilos/estilos.css">
  <link href="estilos/networkbar.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" type="text/css" media="all" href="estilos/jquery-ui.css">

  <script language="JavaScript" src="estilos/networkbar.js"></script>
  <script type="text/javascript" src="estilos/libjsgen.js"> </script>
  <script type="text/javascript" src="estilos/popcalendar.js"> </script>

  <script src="js/jquery-2.0.3.min.js"></script>
  <script src="js/jquery-ui-1.10.3.custom.min.js"> </script>
  <script src="js/jquery-ui.js"> </script>
  <script src="js/prog_examenes.js"></script>
  <script>
    var Dafu='';
    function consulta(fecha,tipo,chk){
      console.log(fecha.value+"-"+tipo+"-"+chk);
      var FechaCPF;
      FechaCPF=fecha.value;

      // if(chk=='Desactivar'){
      //   for (var i=0 ; i<=6 ; i++){
      //     form1.idexamen[i].checked=false;
      //   }
      // }else{
        if (chk.checked==true ){
          if(form1.fecha_prog1.value==''){
            alert("Seleccionar Primero la Fecha");
            chk.checked=false;
            exit();
          }
          miventana=window.open("CalcularPostulante.php?fechann=" + FechaCPF + "&tiponn=" + tipo + "","CFE","");
          Dafu='Kako';
          disabledbutton();
        }else{
          miventana=window.open("CalcularPostulanteV.php?nada=nada","CFE","");
          disabledbutton();
          Dafu='';
        }
      //}
    }


    function disabledbutton(){
      setTimeout(function(){ 
        var datos1 = document.getElementById("variablePadre").value ;
        array_datos = datos1.split("/")

        var xreg = array_datos[0]
        var total = xreg || 0;
        if(total < 120){   
          document.getElementById("#layer-reg").style.display='block'; 
          //document.getElementById("#layer-reg").attr({display: 'block'}); 
        }else{
          document.getElementById("#layer-reg").style.display='none';  
        }
      }, 100);
    }
</script>

<style type="text/css">
  .Estilo2 {
   font-family: Geneva, Arial, Helvetica, sans-serif;
   font-weight: bold;
 }
 .Estilo4 {color: #FF0000}
</style>
<script languaje="JavaScript">
  function MM_goToURL() { //v3.0
    var i, args=MM_goToURL.arguments; document.MM_returnValue = false;
    for (i=0; i<(args.length-1); i+=2) eval(args[i]+".location='"+args[i+1]+"'");
  }
</script>


<script language="JavaScript">
  <!--
  // function validar(form1){
  //   var w='';
  //   w='n';
  //   if (form1.fecha_prog1.value==""){
  //     alert("Debe ingresar la fecha de Programaci�n");
  //     form1.fecha_prog1.focus();
  //     return false;
  //   }
  //   if (Dafu!='Kako'){
  //     alert("Seleccionar Tipo de Examen");
  //     return false;
  //   }

  //   var mydate=new Date();
  //   var year=mydate.getYear();
  //   if (year < 1000)
  //     year+=1900;
  //     var day=mydate.getDay();
  //     var month=mydate.getMonth()+1;
  //   if (month<10)
  //     month="0"+month;
  //     var daym=mydate.getDate();
  //   if (daym<10)
  //     daym="0"+daym;
  //     var fecc=(""+daym+"/"+month+"/"+year+"")

  //     var usuario=form1.valorsesion.value;
  //     var fecha=form1.fecha_prog1.value;
  //     if(usuario!=1){
  //      if(fecha==fecc){
  //        alert("Usted no Puede Realizar Programaciones en el Mismo Dia");
  //        form1.fecha_prog1.focus();
  //        return false;
  //      }
  //    }
  //   return true;
  // }
</script>
<script>
  function Menu(idtrami,idcatego,idpostu){
    document.all("curpro").src="curso_pro.php?idtrami="+idtrami+"&idcatego="+idcatego+"&idpostu="+idpostu;
    nbOpenItem(3);
  }

  function lista_pro(){
    window.open('lista_pro.php','LISTADO DE PROGRAMACIONES','width=300, height=400, toolbar=no, location=no,status=no, menubar=no , directories=no, titlebar=no, resizable=no' ); return false
  }
</script>
</head>
<body class="os2hop">

  <div id="selectMonth" style="z-index: 999; position: absolute; visibility: hidden;"></div>
  <div id="selectYear" style="z-index: 999; position: absolute; visibility: hidden;"></div>

  <table align="center" bgcolor="#336699" border="0" cellpadding="0" cellspacing="0" width="101%">
    <tbody>
      <tr>
        <td>
          <table border="0" cellpadding="0" cellspacing="0" width="20%">
            <tbody>
              <tr>
                <td class="tabs">
                  <table border="0" cellpadding="0" cellspacing="0" width="48%">
                    <tbody>
                      <tr>
                        <td class="tabsline" width="20"><img src="imag/tabinion2.gif" border="0" height="36" width="29"></td>	
                        <td width="119" align="center" background="imag/div3.gif" >
                          <span >
                            <nobr>
                              <b>
                                <a href="buscar_reg_examen.php">
                                  <b>
                                    <span class="G">Buscar Postulante</span>
                                  </b>
                                </a>
                              </b>
                            </nobr>
                          </span>
                        </td>	
                        <td><img src="imag/div22.gif" alt="" border="0" height="36" width="29"></td>	 
                        <td width="119" align="center" background="imag/div1.gif">
                          <nobr>
                            <b>
                              <a href="listado_reg_examen.php">
                                <b>Lista de  Postulante</b>
                              </a>
                            </b>
                          </nobr>
                        </td>
                        <td class="tabson" width="52"><img src="imag/div44.gif" alt="" border="0" height="36" width="29"></td>
                        <td class="tabsline" width="175"></td>
                      </tr>	
                    </tbody>
                  </table>
                </td>
              </tr>
            </tbody>
          </table>
        </td>
      </tr>
    </tbody>
  </table>

  <table width="101%" height="94%" border="0" cellpadding="0" cellspacing="10" bgcolor="#CFE5EE">
    <tbody>
      <tr>
        <td height="165" valign="top">
          <table width="100%" height="100%" border="0" align="center" cellspacing="10">
            <tr>
              <td width="972" height="323" valign="top">
                <form name="form1" method="post" action="insert_ex_reglas.php" onSubmit="return validar(this)">
                  <table class="frmline" align="center" border="0" cellpadding="0" cellspacing="0" width="90%">
                    <tbody>
                      <tr>
                        <td colspan="8">
                          <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
                            <tbody>
                              <tr>
                                <td colspan="3" width="100%">
                                  <table border="0" cellpadding="3" cellspacing="0" width="100%">
                                    <tbody>
                                      <tr>
                                        <th align="left" bgcolor="#6600ff" width="20%"> </th>
                                        <th height="26" width="50%"> <span class="G">PROGRAMACION DE EXAMENES  </span></th>
                                        <th align="right" width="25%"> </th>
                                      </tr>
                                    </tbody>
                                  </table>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </td>
                      </tr>
                      <tr>
                        <td colspan="6">
                          <table width="100%" border="0" cellpadding="0" cellspacing="0">
                            <tbody>
                              <tr>
                                <td  height="10" width="1%">&nbsp;</td>
                                <td class="marco seccion" align="left" width="90%">&nbsp;DATOS DEL POSTULANTE </td>
                                <td width="1%" height="20" align="right" background="main.php15_files/titulo3.jpg">&nbsp;</td>
                              </tr>
                            </tbody>
                          </table>
                        </td>
                      </tr>
                      <?php
                        $cant=count($_POST["chk"]);
                        if($cant > 0){
                          foreach($_POST["chk"] as $k =>$v){
  		                      $sql="SELECT max(t.idtramite) FROM postulante p INNER JOIN tramite t ON p.idpostulante=t.idpostulante WHERE p.idpostulante='".$v."' and t.estado!=55 and t.tipotramite !='DUPLICADO' and t.idtramite<'9966737'";
                            $rs=pg_query($link,$sql) or die ("Error :$sql");
                            while($reg1=pg_fetch_array($rs)) { 
                              $id=$reg1[0];
                            }
                            $idtra=$id;
                            $sql1="SELECT p.nombres,p.apepat,p.apemat,p.dni,p.ce,t.idcategoria,t.idtramite,t.fechafin FROM tramite t inner join postulante p on p.idpostulante=t.idpostulante where t.idtramite= '".$idtra."'" ;
                            $rs1=pg_query($link,$sql1);
                            $row=pg_fetch_array($rs1);

                          }
                          
                        }
                      ?>
                      <tr valign="middle">
                        <td class="marco" width="1%">&nbsp;</td>
                        <td class="etiqueta" align="right" width="20%">Nombres&nbsp;&nbsp;</td>
                        <td class="objeto" width="1%">&nbsp;</td>
                        <td colspan="2" class="objeto"><input name="xxxnom" type="text"  disabled="disabled" class="cajatexto" id="xxxnom" value="<?=$row[0]?>" size="40" maxlength="60">
                          <input name="idtramite" value="<?=$idtra?>" type="hidden">
                          <input name="idcategoria" value="<?=$row[5]?>" type="hidden"></td>
                        <td class="objeto" width="2%">
                          <input type="hidden" name="valorsesion" value="<?=$_SESSION["cargo"]?>">
                        </td>
                      </tr>
                      <tr valign="middle">
                        <td class="marco" width="1%">&nbsp;</td>
                        <td class="etiqueta" align="right" width="20%">Apellidos&nbsp;&nbsp;</td>
                        <td class="objeto" width="1%">&nbsp;</td>
                        <td colspan="2" class="objeto"><input name="xxxape"  type="text" disabled="disabled" class="cajatexto" id="xxxape" value="<?=$row[1]?> <?=$row[2]?>" size="40" maxlength="60"></td>
                        <td class="objeto" width="2%">&nbsp;</td>
                      </tr>
                      <tr valign="middle">
                        <td class="marco" width="1%">&nbsp;</td>
                        <td class="etiqueta" align="right" width="20%">DNI/C.E&nbsp;&nbsp;</td>
                        <td class="objeto" width="1%">&nbsp;</td>
                        <td colspan="2" class="objeto"><input name="xxxdni"  type="text" disabled="disabled" class="cajatexto" id="xxxdni" value="<?php if($row[3]==""){echo $row[4];}elseif($row[4]==""){echo $row[3];} ?>" size="15" maxlength="8"></td>
                        <td class="objeto" width="2%">&nbsp;</td>
                      </tr>
                      <tr valign="middle">
                        <td class="marco">&nbsp;</td>
                        <td class="etiqueta" align="right">Fecha de Examen  &nbsp;</td>
                        <td class="objeto">&nbsp;</td>
                        <td width="23%" class="objeto">
                          <input name="fecha_prog1" class="cajatexto" id="fecha_prog1"  size="15" maxlength="10" type="datepicker" onchange="consultaCupo()" readonly>
                        </td>
                        <td valign="middle" class="objeto">
                          <body>
                            <table width="565" height="18" border="1" align="center" cellpadding="0" cellspacing="0">
                              <tr>
                                <td width="34" height="16" valign="top" id="cupo">
                                </td>
                                <td width="399" valign="top">
                                   <span class="Estilo2">Cupos disponibles</span>
                                </td>
                              </tr>
                            </table>
                          </body>
                          <!-- <iframe name="CFE" src="CalcularPostulanteV.php" width="570" height="25" scrolling="no" frameborder="0"></iframe>-->                        
                        </td>
                        <td class="objeto">&nbsp;</td>
                      </tr>
                      <tr valign="middle">
                        <td class="marco">&nbsp;</td>
                        <td class="etiqueta" align="right">Hora de Examen  &nbsp;</td>
                        <td class="objeto">&nbsp;</td>
                        <td class="objeto" width="23%">
                          <select name="hora" id="hora" class="objeto"></select>
                        </td>
                        <td class="objeto" width="2%">&nbsp;</td>
                        <td class="objeto" width="2%">&nbsp;</td>
                      </tr>
                      <tr valign="middle">
                        <td colspan="6" class="marco">&nbsp;&nbsp; 
                          <table width="90%" height="100%" border="0" align="center" cellpadding="0" cellspacing="4" bgcolor="#FFFFFF">
                            <tr>
                               <td>
                               <?php
                                  $ssql="SELECT ec.idcategoria, t.nombre,t.idexamen FROM examen_catagoria ec INNER JOIN tipo_examen t ON ec.idexamen=t.idexamen WHERE ec.idcategoria='".$row[5]."'";
                                  $rs=pg_query($link,$ssql) or die ("error : $ssql");
                                  $i=0;
                               ?>
                                <table width="100%" border="1" align="center" cellpadding="0" cellspacing="0">
                                  <tr>
                                    <td width="59%"><div align="center" class="Estilo2">TIPO DE EXAMEN</div></td>
                                    <td width="17%"><div align="center"><strong>ESTADO DE EXAMEN</strong></div></td>
                                    <td width="10%"><div align="center"><strong>OPCION</strong></div></td>
                                    <td width="14%"><div align="center"><strong>RESULTADO</strong></div></td>
                                  </tr>
                                  <?php 
                                    while ($reg=pg_fetch_array($rs)) {
                                      $ssql8="SELECT t.idtramite,p.nombres,p.apepat,p.apemat,e.fecha,t.idcategoria,e.idevaluacion,p.dni,e.opcion,e.resultado ,e.idexamen FROM postulante p INNER JOIN tramite t ON p.idpostulante=t.idpostulante INNER JOIN evaluacion e ON t.idtramite=e.idtramite  WHERE t.idtramite='".$row[6]."' and e.idexamen='".$reg[2]."'  order by e.opcion ASC";
                                      $rs8=pg_query($link,$ssql8) or die ("error : $ssql8");
                                      while ($reg8=pg_fetch_array($rs8)) {
                                        $aux='';
                                  ?>
                                  <tr>
                                    <td>&nbsp;&nbsp;
                                      <nobr>
                                        <?=$reg[1]?>
                                      </nobr>
                                    </td>
                                    <td>
                                      <div align="center">
                                        <?php
                                          $resul=$reg8[9]; 
                                          if($resul==''){
                                            if ($reg8[10]=='1') {
                                              $esperacon="si";
                                            }
                                            if ($reg8[10]=='2') {
                                              $esperacon="si";
                                            }
                                            if ($reg8[10]=='3') {
                                              $esperacon="si";
                                            }
                                            if ($reg8[10]=='4') {
                                              $esperaman="si";
                                            }
                                            echo "<font color=red> En espera ...<font>";
                                          }else{
                                            if ($reg8[10]=='1'  ||  $reg8[10]=='2'  ||$reg8[10]=='3'  ) {
                                              if (substr($resul,0,8)=='APROBADO') {
                                                $aprobocon='si';
                                              }else {
                                                $aprobocon='no';
                                                $opcion=$reg8[8];
                                              }
                                            }else if ($reg8[10]=='4') {
                                               if (substr($resul,0,8)=='APROBADO') {
                                                $aproboman='si';
                                              }else {
                                                $aproboman='no';
                                                $opcion=$reg8[8];
                                              }
                                            }
                                            echo 'Procesado';
                                          } 
                                        ?>
                                      </div>  
                                    </td>
                                    <td>
                                      <div align="center">
                                        <font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">
                                          <?=$reg8[8]?>
                                        </font>
                                      </div>
                                    </td>
                                    <td nowrap>
                                      <nobr></nobr>
                                      <font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">
                                        <?=$resul?> &nbsp;
                                        <? if(substr($reg8[9],9,1)=='(') $tienecursopro='Si'; ?>
                                      </font>
                                    </td>
                                  </tr>
                                  <?php      
                                      }
                                    }
                                    
                                  ?>
                                </table>
                              </td>
                            </tr>
                          </table>
                          <br>
                          <br>
                          <?php
                            if ($row[7]>date('Y-m-d')) {
                          ?>
                          <table width="50%" height="100%" border="0" align="center" cellpadding="0" cellspacing="4" bgcolor="#FFFFFF">
                            <tr>
                              <td>
                                <table width="50%" border="1" align="center" cellpadding="0" cellspacing="0">
                                  <tr>
                                    <td width="5%"><div align="center"></div></td>
                                    <td width="45%"><div align="center" class="Estilo2">TIPO DE EXAMEN</div></td>
                                  </tr>
                                  <?php 
                                    $sql2="SELECT * FROM certificado_curso cc inner join curso_especial ce on cc.idcurso=ce.id_curso_especial WHERE cc.idtramite='".$idtra."'";
                                    $rs2=pg_query($link,$sql2);
                                    $row=pg_num_rows($rs2);
                                    $da2=pg_fetch_array($rs2);
                                    $estado=$da2[6];
                                    if ($estado=='0') {
                                      $aprobocon='si';
                                    }elseif ($estado=='1') {
                                      $aprobocon='no';
                                    }
                                    $fechafincer=$da2[7];
                                    
                                  ?>
                                  <!-- <?php echo $esperacon.'-'.$esperaman.'-'.$aprobocon.'-'.$aproboman.'-'.$opcion ?> -->
                                  <tr>
                                    <td>
                                      <?php 
                                        if ($aprobocon=='no' && $opcion<=3 && $esperacon=='no') {
                                      ?>
                                      <input type="checkbox" name="conocimiento" id="conocimiento" value="1"  checked>
                                      <?php     
                                        }else if ($aprobocon=='si' || $esperacon=='si') {
                                          $disabledcon='si';
                                      ?>
                                      <input type="checkbox" name="conocimiento" id="conocimiento" value="1"  disabled>
                                      <?php 
                                        }
                                      ?>
                                    </td>
                                    <td>EXÁMEN DE CONOCIMIENTOS</td>
                                  </tr>
                                  <tr>
                                    <td>
                                      <?php 
                                        if ($aprobocon=='si' && $esperaman=='no') {
                                      ?>
                                      <input type="checkbox" name="manejo" id="manejo" value="4" checked >
                                      <script>desabilitaCombo();</script>
                                      <?php 
                                        }else if ($aproboman=='no' && $esperaman=='no') {
                                      ?>
                                      <input type="checkbox" name="manejo" id="manejo" value="4" checked >
                                      <script>desabilitaCombo();</script>
                                      <?php 
                                        }else if ($esperaman=='si' || $aproboman=='si' || $esperacon=='si' || $aprobocon=='no') {
                                          $disabledman='si';
                                      ?>
                                      <input type="checkbox" name="manejo" id="manejo" value="4" disabled>
                                      <?php
                                        }else if ($esperaman=='si' && $aprobocon=='si'&& $aproboman=='no') {
                                      ?>
                                      <input type="checkbox" name="manejo" id="manejo" value="4" disabled>
                                      <?php 
                                        }
                                      ?>
                                    </td>
                                    <td>EXÁMEN DE MANEJO</td>
                                  </tr>
                                </table>
                              </td>
                            </tr>
                          </table>
                          <br>
                          <br>
                          <?php
                            }else{
                          ?>
                          <table width="90%" border="0" align="center">
                            <tr>
                              <td><span class="Estilo4"></span></td>
                            </tr>
                            <tr>
                              <td><div align="center"><span class="Estilo4">
                               USTED YA NO SE PUEDE PROGRAMARSE, SU EXAMEN MÉDICO YA EXPIRO</span></div></td>
                             </tr>
                          </table>
                          <br>
                          <br>
                          <?php
                            }
                          ?>
                        </td>
                      </tr>
                      <br>
                      <br>
                      <tr>
                        <td colspan="8" height="30">
                          <table border="0" cellpadding="3" cellspacing="1" width="100%">
                            <tbody>
                              <tr>
                                <td class="spaceRow" colspan="7" height="1"><img src="main.php15_files/spacer.htm" alt="" height="1" width="1">
                                </td>
                              </tr>
                              <tr align="center">
                                <td class="catBottom" colspan="7" height="28">
                                  <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                    <tbody>
                                      <tr>
                                        <td align="left" width="100%">
                                            <input class="boton" name="btn_volver2" value=".:: Volver ::." onClick="location='buscar_reg_examen.php'" type="button">
                                            <input class="boton" name="btn_Buscar" id="registrar" value=".:: Registrar ::." type="submit" <?php if ($disabledman=='si' && $disabledcon=='si') { echo 'style="display: none;"';} ?> >
                                        </td>
                                        <td width="50%"></td>
                                        <td align="right" width="25%"></td>
                                      </tr>
                                    </tbody>
                                  </table>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </form>        
              </td>
            </tr>
          </table>
        </td>
      </tr>
    </tbody>
  </table>
  <div class="nb_item" id="nb_item_3">
    <iframe name="curpro" id="curpro" src="curso_pro.php" width="500" height="145" frameborder="0" scrolling="no"></iframe>
  </div>
  <!-- <div id="nbFlash" style="visibility: visible;">
    <? if(isset($_GET["idpos"])){ ?>
        <script>nbInit('<?php echo $_SERVER['REQUEST_URI']?>');</script>
    <? }else{?>
        <script>nbInit('<?=$_SERVER['REQUEST_URI']."?idpos=".$v.""?>');</script>
    <? }?>
  </div> -->
  <script type="text/javascript" src="estilos/jquery.min.js"></script>
  <script type="text/javascript" src="estilos/jquery-ui.js"></script>
  <script type="text/javascript">
    function noExcursion(date){ 
      var day = date.getDay();
      return [(day != 0 && day != 6), ''];
    };
    var disabledSpecificDays = ["7-4-2016","7-5-2016","7-6-2016","7-7-2016","7-8-2016","7-28-2016","7-29-2016","8-30-2016","10-5-2016","10-6-2016","10-7-2016","11-1-2016","12-8-2016"];

    function noWeekendsOrHolidays(date) {
      var m = date.getMonth();
      var d = date.getDate();
      var y = date.getFullYear();
      for (var i = 0; i < disabledSpecificDays.length; i++) {
        if ($.inArray((m + 1) + '-' + d + '-' + y, disabledSpecificDays) != -1 || new Date() > date) {
          return [false];
        }
      }
      var noWeekend = $.datepicker.noWeekends(date);
       return !noWeekend[0] ? noWeekend : [true];
    }

    $(document).ready(function(){
      <?php
        $fecha = date('d/m/Y');
        $nuevafecha = date('d/m/Y', strtotime('+1 day')) ; // Suma 1 días
        $newmax = date('d/m/Y', strtotime('+8 day')) ; // Suma 1 días
       ?>
      $( "#fecha_prog1" ).datepicker({
        dateFormat: 'dd/mm/yy',
        changeMonth: true,
        changeYear: true,
        constrainInput: true,
        //beforeShowDay: fechas,
        //beforeShowDay: $.datepicker.noWeekends, 
        <?php if ($exa == '1') { ?> beforeShowDay: noExcursion , 
        <?php } else {?>    beforeShowDay: noWeekendsOrHolidays,  <?php } ?> 
        //beforeShowDay: noWeekendsOrHolidays,  
        minDate: '<?php if ($_SESSION["cargo"]=='1' || $exa == '1') { echo 0;} else echo $nuevafecha;?>',
        maxDate: '<?php echo $newmax;?>',
        onSelect: function () {
          consultaCupo();
        },
        onClose: function(date){
          console.log(date);
        } 
      });
    })
  </script>
</body>
</html>