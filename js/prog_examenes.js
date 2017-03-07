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
		if (data<120) {
			
		}else{
			alert("ERROR!! SE SUPERO EL NUMERO DIARIO DE EXAMENES, PRUEBE CAMBIANDO DE FECHA");
			
		}
	});
}

function validar(fomr1) {
	if (form1.fecha_prog1.value==""){
    	alert("Debe ingresar la fecha de Programación");
		form1.fecha_prog1.focus();
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
	if (con=='0' && man='0') {
		alert("Seleccionar Tipo de Examen");
		return false;
	}
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