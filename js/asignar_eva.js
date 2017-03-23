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

function imprimir() {
	var examen=$('#categoria').val();
	var hora=$('#hora').val();
	var fecha=$('#xxxfecha').val();
	var url="imprimir_paraactas_adicionales.php?examen="+examen+"&hora="+hora+"&fecha="+fecha;
	window.open(url);
}