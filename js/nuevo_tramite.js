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
	var tramite=$('#tipotramite').val();
	var cat=$('#categoria').val();
	var hoy =new Date();
	var mes=(hoy.getMonth()+1);
	if (parseInt(mes)>=4) {
		console.log(mes);
		divC = document.getElementById("especial");
 		divC.style.display="block";
	}else if (parseInt(mes)<4) {
		divC = document.getElementById("especial");
 		divC.style.display="none";
	}
}

$(document).ready(function() {
	$("#nomcentro").autocomplete({
		source:'controller/ctrCentromedico.php',
		select : function(event,ui) {
			console.log(ui);
			event.preventDefault();
			$('#nomcentro').val(ui.item.label);
			$('#idcentro').val(ui.item.id);
		},
	});
});
