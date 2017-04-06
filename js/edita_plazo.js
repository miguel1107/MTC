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
			url: 'edita_plazo.php',
			type: 'POST',
			data: {pl: pl},
		})
		.done(function(data) {
			if (data==1) {
				location='buscar_reg_examen.php';
			}else{
				location.reload(true);
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