<?php
  session_start();
  if(!isset($_SESSION["usuario"])) header("location:index.php");
  include ("traducefecha.php");
  include ("conectar.php");
  $link=Conectarse();
  //echo $_POST["sw"].'g';exit;
?>
<html><head><title></title>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" media="screen" href="estilos/tabscreen.css">
<link rel="stylesheet" type="text/css" media="all" href="estilos/menumx.css">
<link rel="stylesheet" type="text/css" media="print" href="estilos/tabprint.css">
<link rel="stylesheet" type="text/css" media="all" href="estilos/estilos.css">
<link rel="stylesheet" type="text/css" media="all" href="estilos/jquery-ui.css">

<script type="text/javascript" src="estilos/libjsgen.js"> </script>
<script type="text/javascript" src="main.php15_files/libjsgen_extend.js"> </script>
<script type="text/javascript" src="main.php15_files/popcalendar.js"> </script>
<script type="text/javascript" src="estilos/popcalendar.js"> </script>
<script src="js/jquery-2.0.3.min.js"></script>
  <script src="js/jquery-ui-1.10.3.custom.min.js"> </script>
  <script src="js/jquery-ui.js"> </script>
  <script src="js/prog_examenes.js"></script>
<script languaje="JavaScript">
  function MM_goToURL() { //v3.0
    var i, args=MM_goToURL.arguments; document.MM_returnValue = false;
    for (i=0; i<(args.length-1); i+=2) eval(args[i]+".location='"+args[i+1]+"'");
  }
</script>
<script language="JavaScript">
  function validar(form1){
  	if (form1.xxxfecha.value=="")
  	 {
  	 alert("Debe ingresar la nueva Fecha de Programaci�n");
  	 form1.xxxfecha.focus();
  	 return false;
  	 }
  	 return true;
  }
  var Dafu='';
  function consulta(fecha,tipo,chk){
    var FechaCPF;
    FechaCPF=fecha.value;
    if(form1.xxxfecha.value==''){
		  alert("Seleccionar Primero la Fecha");
		  exit();
    }else{	
      miventana=window.open("CalcularPostulante_edicion.php?fechann=" + FechaCPF + "&tiponn=" + tipo + "","CFE","");
      Dafu='Kako';
      disabledbutton(); 
    }
  }

  function consulta1(fecha,tipo,chk){
    var FechaCPF;
    FechaCPF=fecha.value;
    if(form1.xxxfecha.value==''){
		  alert("Seleccionar Primero la Fecha");
		  exit();
    }else{	
      miventana=window.open("CalcularPostulante_edicion.php?fechann=" + FechaCPF + "&tiponn=" + tipo + "","CFE","");
      Dafu='Kako';
      disabledbutton(); 
    }
  }

  function disabledbutton(){
    setTimeout(function(){ 
      var datos = document.getElementById("variablePadre").value ;
      array_datos = datos.split("/")
      var xreg = array_datos[0]
      var total = xreg || 0;
      if( total < 100 ){	
        document.getElementById("layer-reg").style.display = 'block';  
      }else{	
        document.getElementById("layer-reg").style.display = 'none'; 
      }
    }, 100);
  }

  function lista_pro(){
    window.open('lista_pro.php','LISTADO DE PROGRAMACIONES','width=300, height=400, toolbar=no, location=no,status=no, menubar=no , directories=no, titlebar=no, resizable=no' ); 
    return false
  }

</script>
<style type="text/css">
<!--
.Estilo1 {
	color: #FF0000;
	font-weight: bold;
}
-->
</style>
</head>
<body class="os2hop">
  <div id="selectMonth" style="z-index: 999; position: absolute; visibility: hidden;"></div>
  <div id="selectYear" style="z-index: 999; position: absolute; visibility: hidden;"></div>
  <table align="center" bgcolor="#336699" border="0" cellpadding="0" cellspacing="0" width="100%">
    <tbody>
      <tr>
        <td>
          <table border="0" cellpadding="0" cellspacing="0" width="20%">
		        <tbody>
              <tr>
                <td class="tabsline" width="29"><img src="imag/tabinion2.gif" border="0" height="36" width="29"></td>
                <td width="125" align="center" background="imag/div3.gif">
                  <span>
                    <nobr><b><a href="buscar_reg_examen.php"><b><span class="G">Programar Postulante</span></b></a></b></nobr>
                  </span>
                </td>
                <td width="29"><img src="imag/div22.gif" alt="" border="0" height="36" width="29"></td>
                <td width="124" align="center" background="imag/div1.gif" ><nobr><b><a href="listado_reg_examen.php"><b>Lista de  Postulante</b></a></b></nobr></td>
                <td class="tabson" width="29"><img src="imag/div44.gif" alt="" border="0" height="36" width="29"></td>
                <td class="tabsline" width="1"></td>             
		          </tr>	
        		</tbody>
          </table>
        </td>
      </tr>
    </tbody>
  </table>
  <table width="100%" height="93%" border="0" cellpadding="0" cellspacing="10" bgcolor="#CFE5EE">
    <tbody>
      <tr>
        <td height="445" valign="top">
          <table width="100%" border="0" align="center">
          <?php
		        if($_GET["sw"]==2){
              $cant=count($_POST["chk"]);
		 	        if($cant > 0){
				        foreach($_POST["chk"] as $k =>$v){
                  $sql="SELECT p.nombres,p.apepat, p.apemat,p.dni, c.nombre,t.idtramite,c.idcategoria,t.fechafin,ev.idevaluacion,ev.fecha,ev.idexamen, ev.resultado FROM postulante p INNER JOIN tramite t ON p.idpostulante=t.idpostulante INNER JOIN categoria c ON t.idcategoria=c.idcategoria INNER JOIN evaluacion ev ON ev.idtramite=t.idtramite WHERE ev.idevaluacion='".$v."'";
        					$result=pg_query($sql)or die ("Error : $sql");
        					$row=pg_fetch_array($result);
  				      }
              }
		        }
	         ?>
	         <tr>
            <td height="189">
              <form name="form1" method="post" action="update_programacion.php" onSubmit="return validar(this)">
                <input type="hidden" name="txtidexamen" id="txtidexamen" value="<?php echo $row['idexamen']; ?>">
                  <table class="frmline" align="center" border="0" cellpadding="0" cellspacing="0" width="70%">
                    <tbody>
                      <tr>
                        <td colspan="7">
                          <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
                            <tbody>
                              <tr>
                                <td colspan="3" width="100%">
                                  <table border="0" cellpadding="3" cellspacing="0" width="100%">
                                    <tbody>
                                      <tr>
                                        <th align="left" bgcolor="#6600ff" width="20%"> </th>
                                        <th height="26" width="50%">
                                          <span class="G">EDITAR PROGRAMACION DE EXAMEN :: [EXAMEN]</span>
                                        </th>
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
                      <td colspan="5">
                        <table border="0" cellpadding="0" cellspacing="0">
                          <tbody>
                            <tr>
                              <td background="main.php15_files/titulo1.jpg" height="10" width="10">&nbsp;</td>
                              <td class="marco seccion" align="left" width="90%">&nbsp;DATOS DEL POSTULANTE </td>
                              <td align="right" background="main.php15_files/titulo3.jpg" height="20">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            </tr>
                          </tbody>
                        </table>
                      </td>
                    </tr>
                    <tr valign="middle">
                      <td class="marco" width="1%">&nbsp;</td>
                      <td width="22%" align="right" class="etiqueta">Nombres&nbsp;&nbsp;</td>
                      <td width="1%" class="objeto">&nbsp;</td>
                      <td width="78%" class="objeto">
                        <input name="xxxnom" type="text"  disabled="disabled" class="cajatexto" id="xxxnom" value="<?=$row[0]?>" size="40" maxlength="60">
                        <input name="idevaluacion" value="<?=$row[8]?>" type="hidden">
                        <input name="idcategoria" value="<?=$row[6]?>" type="hidden">
                        <input name="xxxidtra" value="<?=$row[5]?>"  type="hidden"   id="xxxidtra"   >
                        <input name="xxxidexamen" value="<?=$row[10]?>"  type="hidden"   id="xxxidexamen"   >
                      </td>
                      <td class="objeto" width="1%">&nbsp;</td>
                    </tr>
                    <tr valign="middle">
                      <td class="marco" width="1%">&nbsp;</td>
                      <td width="22%" align="right" class="etiqueta">Apellidos&nbsp;&nbsp;</td>
                      <td width="1%" class="objeto">&nbsp;</td>
                      <td width="78%" class="objeto">
                        <input name="xxxape"  type="text" disabled="disabled" class="cajatexto" id="xxxape" value="<?=$row[1]?> <?=$row[2]?>" size="40" maxlength="60">
                      </td>
                      <td class="objeto" width="1%">&nbsp;</td>
                    </tr>
                    <tr valign="middle">
                      <td class="marco" width="1%">&nbsp;</td>
                      <td width="22%" align="right" class="etiqueta">DNI&nbsp;&nbsp;</td>
                      <td width="1%" class="objeto">&nbsp;</td>
                      <td width="78%" class="objeto">
                        <input name="xxxdni"  type="text" disabled="disabled" class="cajatexto" id="xxxdni" value="<?=$row[3]?>" size="15" maxlength="8">
                      </td>
                      <td class="objeto" width="1%">&nbsp;</td>
                    </tr>
                    <tr valign="middle">
                      <td class="marco">&nbsp;</td>
                      <td align="right" class="etiqueta">Categoria &nbsp;</td>
                      <td class="objeto">&nbsp;</td>
                      <td class="objeto">
                        <input name="xxxdepe4222" type="text" disabled="disabled" class="cajatexto" id="xxxdepe4222" value="<?=$row[4]?>" size="15" maxlength="8">
                      </td>
                      <td class="objeto">&nbsp;</td>
                    </tr>
                    <tr valign="middle">
                      <td class="marco">&nbsp;</td>
                      <td class="etiqueta" align="right">Fecha Anterior  &nbsp;</td>
                      <td class="objeto">&nbsp;</td>
                      <td class="objeto">
                        <input name="xxxdepe42222" type="text" disabled="disabled" class="cajatexto" id="xxxdepe42222" value="<?=normal($row[9])?>" size="15" maxlength="15">
                      </td>
                      <td class="objeto">&nbsp;</td>
                    </tr>
      			         <?php if(date('Y-m-d') < $row[9] && empty($row[11])){ ?>
                    <tr valign="middle">
                      <td class="marco" width="1%">&nbsp;</td>
                      <td class="etiqueta" align="right" width="22%">Fecha &nbsp;&nbsp; <!-- <img src="imag/calendaricon.gif" onClick='' border="0" height="15" width="15"> -->
                      </td>
                      <td class="objeto" width="1%">&nbsp;</td>
                      <td class="objeto" width="78%">
                        <input name="xxxfecha" class="cajatexto" id="xxxfecha"  size="15" maxlength="10" type="datepicker" onchange="consultaCupoedit()" readonly>
                          Click sobre la caja de texto
                          &nbsp; <!--<img src="imag/calendaricon.gif" onclick='popUpCalendar(this, form1.xxxfecha, "dd/mm/yyyy")'   border="0" height="15" width="15"> -->
                      </td>
                      <td valign="middle" class="objeto">
                          <body>
                            <table width="565" height="18" border="1" align="center" cellpadding="0" cellspacing="0">
                              <tr>
                                <td width="34" height="16" valign="top" id="cupoe">
                                </td>
                                <td width="399" valign="top">
                                   <span class="Estilo2">Cupos disponibles</span>
                                </td>
                              </tr>
                            </table>
                          </body>
                          <!-- <iframe name="CFE" src="CalcularPostulanteV.php" width="570" height="25" scrolling="no" frameborder="0"></iframe>-->                        
                        </td>
                        <td class="objeto" width="1%">&nbsp;</td>
                    </tr>
                    <tr valign="middle">
                        <td class="marco">&nbsp;</td>
                        <td class="etiqueta" align="right">Hora de Examen  &nbsp;</td>
                        <td class="objeto">&nbsp;</td>
                        <td class="objeto" width="23%">
                          <select name="hora" id="horae" class="objeto"></select>
                        </td>
                        <td class="objeto" width="2%">&nbsp;</td>
                        <td class="objeto" width="2%">&nbsp;</td>
                      </tr>
                    <tr valign="middle">
                      <td class="marco">&nbsp;</td>
                      <td class="etiqueta" align="right">Dias disponibles para programacion: &nbsp;<img src="imag/calendaricon.gif" onclick='' border="0" height="15" width="15"></td>
                      <td class="objeto">&nbsp;</td>
                      <td width="23%" class="objeto">
                      <input type="button" name="lista_prog" id="lista_prog" value="VER LISTA" onClick="lista_pro()">                    </td>
                      <td valign="middle" class="objeto"></td>
                      <td class="objeto">&nbsp;</td>
                    </tr> 
                    <?php }elseif($_SESSION["cargo"]=='1'){ ?>
            			    <tr valign="middle">
                        <td class="marco" width="1%">&nbsp;</td>
                        <td class="etiqueta" align="right" width="22%">Fecha &nbsp;&nbsp;</td>
                        <td class="objeto" width="1%">&nbsp;</td>
                        <td class="objeto" width="78%">
                        <!--  onKeyPress="return formato(event,form,this,10)" -->
                        <input type="hidden" name="xxxidtra"  id="xxxidtra"  size="15" maxlength="10" value=""<?=$row[5]?>"" >
                        <input name="xxxfecha" class="cajatexto" id="xxxfecha"  size="15" maxlength="10" type="datepicker" onchange="consultaCupoedit()" readonly>
                        <!-- <input name="xxxfecha" class="cajatexto" id="xxxfecha"  size="15" maxlength="10" type="text" readonly onChange="consulta(form1.xxxfecha,<?=$row['idexamen']?>,'Desactivar')">  -->
                          Click sobre la caja de texto
                          &nbsp; <!--<img src="imag/calendaricon.gif" onclick='popUpCalendar(this, form1.xxxfecha, "dd/mm/yyyy")'   border="0" height="15" width="15">--> 
<!--                         <img src="imag/calendaricon.gif" onclick='' border="0" height="15" width="15">
 -->                        <!--<img src="imag/calendaricon.gif" onclick='popUpCalendar(this, form1.fecha_prog, "dd/mm/yyyy");consulta(form1.fecha_prog,1,"Desactivar");' border="0" height="15" width="15">                       </td>-->
                          <td valign="middle" class="objeto">
                          <body>
                            <table width="565" height="18" border="1" align="center" cellpadding="0" cellspacing="0">
                              <tr>
                                <td width="34" height="16" valign="top" id="cupoe">
                                </td>
                                <td width="399" valign="top">
                                   <span class="Estilo2">Cupos disponibles</span>
                                </td>
                              </tr>
                            </table>
                          </body>
                          <!-- <iframe name="CFE" src="CalcularPostulanteV.php" width="570" height="25" scrolling="no" frameborder="0"></iframe>-->                        
                        </td>
                          <td class="objeto" width="1%">&nbsp;</td>
                      </tr>
                       <tr valign="middle">
                        <td class="marco">&nbsp;</td>
                        <td class="etiqueta" align="right">Hora de Examen  &nbsp;</td>
                        <td class="objeto">&nbsp;</td>
                        <td class="objeto" width="23%">
                          <select name="hora" id="horae" class="objeto"></select>
                        </td>
                        <td class="objeto" width="2%">&nbsp;</td>
                        <td class="objeto" width="2%">&nbsp;</td>
                      </tr>
            			    <tr>
                        <td height="5"></td>
                      </tr>
                      <tr valign="middle">
                        <td class="marco">&nbsp;</td>
                        <td class="etiqueta" align="right">Dias disponibles para programacion: &nbsp;<img src="imag/calendaricon.gif" onclick='' border="0" height="15" width="15"></td>
                        <td class="objeto">&nbsp;</td>
                          <td width="23%" class="objeto">
                            <input type="button" name="lista_prog" id="lista_prog" value="VER LISTA" onClick="lista_pro()" class="cajatexto">
                          </td>
                          <td valign="middle" class="objeto"></td>
                      </tr> 
                    <?php }else{?>
			                <tr>
                        <td colspan="7" height="30">
                          <table border="0" cellpadding="3" cellspacing="1" width="100%">
                            <tbody>
                              <tr>
                                <td class="spaceRow" colspan="7" height="1">
						                      <div align="center" class="Estilo1">"USTED NO PUEDE EDITAR LA FECHA DE PROGRAMACION"
                                    <?php if(empty($row[11])){
                                    ?> 
                                    </br> FALTA INGRESO DE RESULTADO DE EVALUACION DE EXAMEN
                                    <?php } ?>						      
                                  </div>
                                </td>
                              </tr>
					          <?php }?>
                      <tr align="center">
                        <td class="catBottom" colspan="7" height="28">
                          <table border="0" cellpadding="0" cellspacing="0" width="100%">
                            <tbody>
                              <tr>
                                <td align="left" width="78%">
								                <?php if(date('Y-m-d') < $row[9] && empty($row[11])){?>
                                  <div id='layer-reg' >    
								                    <input class="boton" name="btn_Buscar" id="txtsubmit" value=".:: Actualizar ::." type="submit">
                                  </div>           
								                  <?php }elseif($_SESSION["cargo"]=='1'){ ?>
							                    <div id='layer-reg' > 
                                    <input class="boton" name="btn_Buscar" id="txtsubmit" value=".:: Actualizar ::." type="submit">  
                                  </div>  
								                  <?php }else{?>
                                    <input class="boton" name="btn_volver2" value=".:: Volver ::." onClick="location='listado_reg_examen.php'" type="button">
                								  <?php }?>
                								  </td>
                                  <td width="7%"></td>
                                  <td align="right" width="15%"></td>
                              </tr>
                            </tbody>
                          </table>
                        </td>
                        <input type="text" id="idexamen" name="idexamen" value="<?php echo $row[10]; ?>">
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
  <input type="hidden" name="fechasblo" id="fechasblo">
</td>
</tr>
</tbody>
</table>

    <script type="text/javascript" src="estilos/jquery.min.js"></script>
    <script type="text/javascript" src="estilos/jquery-ui.js"></script>
    <script type="text/javascript">

    function noExcursion(date){ 
    var day = date.getDay();
    // o es domingo
    return [(day != 0 && day != 6), ''];
    };


     function retornaFechas() {
      $.ajax({
        url: 'controller/ctrFechasBloquedas.php',
        type: 'POST',
        data: {action: 'lista'},
      })
      .done(function(data) {
        dias=data.split(",");
        $('#fechasblo').val(dias);
      })
      .fail(function() {
        console.log("error");
      })
      .always(function() {
        console.log("complete");
      });
    }

    //var disabledSpecificDays = ["7-4-2016","7-5-2016","7-6-2016","7-7-2016","7-8-2016","7-28-2016","7-29-2016","8-30-2016","10-5-2016","10-6-2016","10-7-2016","11-1-2016","12-8-2016"];

     function noWeekendsOrHolidays(date) {
      var fe=$('#fechasblo').val().substring(1);
      
      var ar=fe.split(",");
      //console.log(ar);
      var disabledSpecificDays = ar;
      //console.log(disabledSpecificDays);
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
      retornaFechas();
      <?php
        $fecha = date('d/m/Y');
        $nuevafecha = date('d/m/Y', strtotime('+1 day')) ; // Suma 1 días
        $sqq="SELECT progexam FROM plazo where id='1' ";
        $rsss=pg_query($link,$sqq);
        $dass=pg_fetch_array($rsss);
        $plazo=$dass[0];
        $str="+".$plazo." day";
        $newmax = date('d/m/Y', strtotime('+'.$plazo.' day')) ;
       ?>
      $( "#xxxfecha" ).datepicker({
        dateFormat: 'dd/mm/yy',
        changeMonth: true,
        changeYear: true,
        constrainInput: true,
        //beforeShowDay: fechas,
        //beforeShowDay: $.datepicker.noWeekends, 
        <?php if ($exa == '1') { ?> beforeShowDay: noExcursion , 
        <?php } else {?>    beforeShowDay: noWeekendsOrHolidays,  <?php } ?> 
        beforeShowDay: noWeekendsOrHolidays,  
        minDate: '<?php if ($_SESSION["cargo"]=='1' || $exa == '1') { echo 0;} else echo $nuevafecha;?>',
        maxDate: '<?php echo $newmax;?>',
        onSelect: function () {
          consultaCupoedit();
        },
        onClose: function(date){
          console.log(date);
        } 
      });
    })

// var disabledDays =  ["13-4-2017","14-4-2017","1-5-2017","29-6-2017","28-7-2017","29-7-2017","30-8-2017","1-11-2017","8-12-2017","25-12-2017"];


// function  nationalDays ( fecha )  { 
//   var m = fecha .getMonth();
//   var d = fecha .getDate();
//   var y = fecha .getFullYear();
//   //console.log('Checking (en bruto): '+ m + '-' + d + '-' + y); 
//   for  ( i =  0 ; i < disabledDays.length ; i ++ )  { 
//     if ( $ . InArray ( ( m + 1 )  +  '-'  + d +  '-'  + y , disabledDays )  =!  - 1  ||  new  fecha ( )  > fecha )  { 
//       //console.log('bad: '+ (m + 1) + '-' + d + '-' + y +' / '+ disabledDays [i]); 
//       return  [ false ] ; 
//     } 
//   } 
//   //console.log('good: '+ (m + 1) + '-' + d + '-' + y); 
//       return  [ true ] ; 
// } 
// function  noWeekendsOrHolidays ( fecha )  { 
//   var noWeekend = $.datepicker. noWeekends ( fecha ) ; 
//   return noWeekend [ 0 ]  ?  nationalDays ( fecha )  : noWeekend ; 
// }

// $( document ) . ready ( function ( )  { 
//   $ ( "#fecha_prog1" ) . datepicker ( { 
//         dateFormat: 'dd/mm/yy',
//         changeMonth: true,
//         changeYear: true,
//         constrainInput: true,
//         beforeShowDay: fechas,
//         beforeShowDay: $.datepicker.noWeekends, 
        
//         beforeShowDay: noWeekendsOrHolidays,  
//         minDate: new fecha (2017,0,1),
//         maxDate: new fecha (2017,5,31)
        
//    } ) ; 
// } ) ;
  </script>


</body></html>