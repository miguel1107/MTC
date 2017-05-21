function consultaCupo() {
	var fe=$("#fecha_prog1").val();
	if($("#conocimiento").prop('checked')){
		var con=$("#conocimiento").val();
	}else{
		con='0';
	}
	if($("#manejo").prop('checked')){
		var man=$("#manejo").val();
	}else{
		man='0';
	}
	var options={
		type: 'post',
 		url: 'controller/ctrProgexamenes.php',
 		data: {
 			fecha:fe,
 			con:con,
 			man: man,
 			action: 'consulta'
 		},
	};
	$.ajax(options)
	.done(function(data) {
		if (man=='4') {
			$('#cupo').html(data);
		}else{
			$('#hora').html(data);
		}
	});
}



function consultaCupoedit() {
	var fe=$("#xxxfecha").val();
	var ex=$("#idexamen").val();
	if(ex=='1'){
		var con=ex;
	}else{
		con='0';
	}
	if(ex=='4'){
		var man=ex;
	}else{
		man='0';
	}
	console.log(ex+'-'+con+'.'+man);
	var options={
		type: 'post',
 		url: 'controller/ctrProgexamenes.php',
 		data: {
 			fecha:fe,
 			con:con,
 			man: man,
 			action: 'consulta'
 		},
	};
	$.ajax(options)
	.done(function(data) {
		if (man=='4') {
			$('#cupoe').html(data);
		}else{
			$('#horae').html(data);
		}
	});
}

function validar(fomr1) {
	if ($('#fecha_prog1').val()==''){
    	alert("Debe ingresar la fecha de Programación");
		$('#fecha_prog1').focus();
		return false;
    }
    if ($('#hora').val()=='0'){
    	alert("Debe ingresar la hora de Programación");
		$('#hora').focus();
		return false;
    }
	if($("#conocimiento").prop('checked')){
		var con=$("#conocimiento").val();
	}else{
		con='0';
	}
	if($("#manejo").prop('checked')){
		var man=$("#manejo").val();
	}else{
		man='0';
	}
	if (con=='0'&& man=='0') {
		alert("Seleccionar Tipo de Examen");
		return false;
	}
	return true;
}

function registraExamen() {
	$.ajax({
		url: 'insert_ex_reglas.php',
		type: 'POST',
	})
	.done(function() {
		console.log("success");
	})
	.fail(function() {
		console.log("error");
	})
	.always(function() {
		console.log("complete");
	});
}

function desabilitaCombo() {
	console.log('disabled');
	$('#hora').attr('disabled', 'disabled')
}

function marcadoman(){
	$("#manejo").prop("checked", "checked");
}

function marcadocon(){
	$("#conocimiento").prop("checked", "checked");
}