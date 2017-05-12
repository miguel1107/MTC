function llenaHora() {
	var exa=$('#categoria').val();
	if (exa==1) {
		var options={
	 		type: 'post',
	 		url: 'controller/ctrHora.php',
	 		data: {
	 			action: 'cargacombo'
 			},
 		};
 		$.ajax(options)
	 	.done(function(data) {
	 		$('#hora').html(data);
	 		divC = document.getElementById("hora");
 			divC.style.display="block";
 			divS = document.getElementById("span");
 			divS.style.display="block";
	 	})
	 	.fail(function() {
	 		console.log("error");
	 	})
	 	.always(function() {
	 		console.log("complete");
	 	});
	}else{
		divC = document.getElementById("hora");
 		divC.style.display="none";
 		divS = document.getElementById("span");
 			divS.style.display="none";
		//$('#hora').style.display='none';
	}
}

function cambiaestado(i) {
	var re="#resultado"+i;
	console.log(re);
	desactiva(i,re);
}

function desactiva(i,name) {
	var estad= $(name+':checked').val()?true:false;
	if (estad==true) {
		$('#nota'+i).prop( "disabled", true );
		$('#estado'+i).text('NO SE PRESENTO');
		$('#estado2'+i).val('NO SE PRESENTO');
		$('.color'+i).prop('color','#000000');
		$('#nota'+i).val('');
		console.log('no se presento');
	}else if (estad==false){
		$('#nota'+i).prop( "disabled", false );
		$('#estado'+i).text('');
		$('#estado2'+i).val('');
		$('#nota'+i).val('');
		$('.color'+i).prop('color','#000000');
		console.log('se presento');
	}
}

function solonumeros(e,i) {
	var key = window.Event ? e.which : e.keyCode
	return (key >= 48 && key <= 57);
}

function asignaresul(i) {
	var nota=($('#nota'+i).val());
	var exa=$('#idexamen').val();
	if (exa==4) {
		if (nota>=0 && nota<=20){
			if (nota<=10) {
				$('#estado'+i).text('DESAPROBADO');
				$('#estado2'+i).val('DESAPROBADO');
				$('.color'+i).prop('color', '#FF6347');
			}else if (nota>10) {
				$('#estado'+i).text('APROBADO');
				$('#estado2'+i).val('APROBADO');
				$('.color'+i).prop('color', '#0000FF');
			}
		}else{
			alert('NOTA INVÁLIDA (Solo se permite Ingresar Notas entre los Rangos de 0 a 20)');
			$('#nota'+i).val('');
			$('#nota'+i).focus();
		}
	}else if (exa==1) {
		if (nota>=0 && nota<=40){
			if (nota<=34) {
				$('#estado'+i).text('DESAPROBADO');
				$('#estado2'+i).val('DESAPROBADO');
				$('.color'+i).prop('color', '#FF6347');
			}else if (nota>34) {
				$('#estado'+i).text('APROBADO');
				$('#estado2'+i).val('APROBADO');
				$('.color'+i).prop('color', '#0000FF');
			}
		}else{
			alert('NOTA INVÁLIDA (Solo se permite Ingresar Notas entre los Rangos de 0 a 40)');
			$('#nota'+i).val('');
			$('#nota'+i).focus();
		}
	}
}