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
$(document).ready(function() {
	$("#nomcentro").autocomplete({
	source:'controller/ctrCentromedico.php',
	select : function(event,ui) {
		event.preventDefault();
		$('#idcentro').val(ui.item.idcentro);
		$('#nomcentro').val(ui.item.nombre);
	},
});
	
});
	

	
