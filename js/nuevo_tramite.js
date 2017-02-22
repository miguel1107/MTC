function mostrarcurso(){
	idtipo=$('#tipotramite').val();
 	var options={
 		type: 'post',
 		url: 'controller/ctrCategoria.php',
 		data: {
 			id:idtipo,
 			action: 'cargacombo'
 		},
 	};
 	$.ajax(options)
 	.done(function(data) {
 		$('#categoria').html(data);
 	})
 	.fail(function() {
 		console.log("error");
 	})
 	.always(function() {
 		console.log("complete");
 	});
}

function cursoespecial() {
	var cat=$('#categoria').val();
	alert(cat);
}

$(document).ready(function() {
	$("#nomcentro").autocomplete({
		source:'controller/ctrCentromedico.php',
		// select(function(event) {
		// 	console.log('select');
		// });
		select : function(event,ui) {
			console.log(ui);
			//event.preventDefault();
			$('#nomcentro').val(ui.item.label);
			$('#idcentro').val(ui.item.id);
		},
	});
});
	

	
