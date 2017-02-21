function mostrarcurso(){
	idtipo=$('#tipotramite').val();
	console.log(idtipo);
 	var options={
 		type: 'post',
 		url: 'model/categoria.php',
 		data: {
 			id:idtipo,
 			action: 'cargacombo'
 		},
 	};
 	$.ajax(options)
 	.done(function(data) {
 		alert(data);
 	})
 	.fail(function() {
 		console.log("error");
 	})
 	.always(function() {
 		console.log("complete");
 	});
 	
}