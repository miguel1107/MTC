function mostrarcurso(){
	idtipo=$('#tipotramite').val();
	console.log(idtipo);
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
 		var json=data;
	    var parsed = JSON.parse(json);
	    var arr = [];
	    for(var x in parsed){
			arr.push(parsed[x]);
	    }
 		llenacombo();
 	})
 	.fail(function() {
 		console.log("error");
 	})
 	.always(function() {
 		console.log("complete");
 	});
}

function llenacombo(array){

}