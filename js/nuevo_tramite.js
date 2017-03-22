function mostrarcurso(cat,tip){
	if (tip==0) {
		idtipo=$('#tipotramite').val();
	}else{
		idtipo=tip;
	}
 	var options={
 		type: 'post',
 		url: 'controller/ctrCategoria.php',
 		data: {
 			id:idtipo,
 			cat:cat,
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
	var tra=$('#tipotramite').val();
	var cat=$('#categoria').val();
	var hoy =new Date();
	var mes=(hoy.getMonth()+1);
	if (tra=='1' && cat=='1') {
		//lic=document.getElementById('licencia');
		$('#licencia').attr('disabled', 'disabled');
	}else{
		//lic=document.getElementById('licencia');
		$('#licencia').removeAttr('disabled');
	}
	if (parseInt(mes)>=4) {
		console.log(mes);
		divC = document.getElementById("especial");
 		divC.style.display="block";
	}else if (parseInt(mes)<4) {
		if (tra=='1' || tra=='2') {
			divC = document.getElementById("especial");
 			divC.style.display="block";
 			divM = document.getElementById("medico");
 			divM.style.display="block";	
		}
		else if(tra=='3'){
			//if (cat=='1') {
				divC = document.getElementById("especial");
 				divC.style.display="block";
 				divM = document.getElementById("medico");
 				divM.style.display="block";
			//}else{
				// divC = document.getElementById("especial");
 			// 	divC.style.display="block";
 			// 	divM = document.getElementById("medico");
 			// 	divM.style.display="block";	
			//}
		}else if( tra='4'){
			divC = document.getElementById("especial");
 			divC.style.display="none";
 			divM = document.getElementById("medico");
 			divM.style.display="none";	
		}
	}
}

function solonumeros(e) {
	var key = window.Event ? e.which : e.keyCode
	return (key >= 48 && key <= 57)
}	

function cargadistrito(di,pro) {
	if (pro==0) {
		var prov=$('#provincia').val();
	}else{
		prov=pro;
	}
	var	options={
		type: 'post',
 		url: 'controller/ctrDistrito.php',
 		data: {
 			id:prov,
 			dis:di,
 			action: 'cargacombo'
 		},
	};
	$.ajax(options)
	.done(function(data) {
		$('#distrito').html(data);
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
		source:'autocompletes/centromedico.php',
		select : function(event,ui) {
			console.log(ui);
			event.preventDefault();
			$('#nomcentro').val(ui.item.label);
			$('#idcentro').val(ui.item.id);
		},
	});

	$("#nomcentrocurso").autocomplete({
		source:'autocompletes/escuelaprofesional.php',
		select : function(event,ui) {
			console.log(ui);
			event.preventDefault();
			$('#nomcentrocurso').val(ui.item.label);
			$('#idcentrocurso').val(ui.item.id);
		},
	});

	$('#dni').blur(function() {
		var dni=$(this).val();
		if (dni!="") {
			var options={
			type: 'post',
	 		url: 'controller/ctrPostulante.php',
	 		data: {
	 			dni:dni,
	 			action: 'buscadni'
	 		},
		}
		$.ajax(options)
		.done(function(data) {
			if (data==1) {
				alert("DNI YA EXISTE");
				$('#dni').val("");
				$('#dni').focus();
			}
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
		}		
	});

	$('#ce').blur(function() {
		var ce=$(this).val();
		if (ce!="") {
			var options={
				type: 'post',
		 		url: 'controller/ctrPostulante.php',
		 		data: {
		 			ce:ce,
		 			action: 'buscace'
		 		},
			}
			$.ajax(options)
			.done(function(data) {
				if (data==1) {
					alert("C.E YA EXISTE");
					$('#ce').val("");
					$('#ce').focus();
				}
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});
		}
	});

	$('#sisgedo').blur(function() {
		var sis=$(this).val();
		if (sis!="") {
			var options={
				type: 'post',
		 		url: 'controller/ctrPostulante.php',
		 		data: {
		 			sis:sis,
		 			action: 'buscasis'
		 		},
			}
			$.ajax(options)
			.done(function(data) {
				if (data==1) {
					alert("SISGEDO YA EXISTE");
					$('#sisgedo').val("");
					$('#sisgedo').focus();
				}
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});
		}
	});

});


