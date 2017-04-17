function solonumeros(e) {
	var key = window.Event ? e.which : e.keyCode
	return (key >= 48 && key <= 57)
}

function editaplazo() {
	var pl=$('#plazo').val();
	if (pl=='') {
		alert('Debe ingresar dias');
	}else{
		$.ajax({
			url: 'controller/ctrPlazo.php',
			type: 'POST',
			data: {
				pl: pl,
				action: 'editPlazo'
			},
		})
		.done(function(data) {
			if (data==1) {
				alert('Se cambio el plazo correctamente');
				location.reload(true);
			}else{
				alert('Error al editar');
				$('#plazo').val('');
				$('#plazo').focus();
			}
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
		
	}
}

function editacupo() {
	var pl=$('#plazo').val();
	if (pl=='') {
		alert('Debe ingresar dias');
	}else{
		$.ajax({
			url: 'controller/ctrPlazo.php',
			type: 'POST',
			data: {
				pl: pl,
				action: 'editCupo'
			},
		})
		.done(function(data) {
			if (data==1) {
				alert('Se cambio el plazo correctamente');
				location.reload(true);
			}else{
				alert('Error al editar');
				$('#plazo').val('');
				$('#plazo').focus();
			}
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
		
	}
}