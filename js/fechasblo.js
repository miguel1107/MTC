jQuery(document).ready(function($) {
	$( "#fecha" ).datepicker({
        dateFormat: 'dd/mm/yy',
        changeMonth: true,
        changeYear: true,
        constrainInput: true,
        onSelect: function () {
          
        },
        onClose: function(date){
          console.log(date);
        } 
      });
});

function registrafecha() {
	var fecha=$('#fecha').val();
	$.ajax({
		url: 'controller/ctrFechasBloquedas.php',
		type: 'POST',
		data: {
			action: 'nuevo',
			fecha: fecha
		},
	})
	.done(function(data) {
		if (data==1) {
			alert("REGISTRO CORRECTO");
			location="bloqueo_fecha.php";
		}else{
			alert("ERROR AL INSERTAR");
			$('#fecha').val("");
			$('#fecha').focus();
		}
	})
	.fail(function() {
		console.log("error");
	})
	.always(function() {
		console.log("complete");
	});
}

function modificafecha() {
	var id=$('#idfe').val();
	var fecha=$('#fecha').val();
	$.ajax({
		url: 'controller/ctrFechasBloquedas.php',
		type: 'POST',
		data: {
			action: 'edit',
			id: id,
			fecha: fecha
		},
	})
	.done(function(data) {
		if (data==1) {
			alert("MODIFICACIÓN CORRECTA");
			location="bloqueo_fecha.php";
		}else{
			alert("ERROR AL MODIFICAR");
			$('#fecha').val("");
			$('#fecha').focus();
		}
	})
	.fail(function() {
		console.log("error");
	})
	.always(function() {
		console.log("complete");
	});
	
}