$(document).ready(function() {
	$('#numsisgedo').focus();
});

function verSolicitud(act) {
	if ($('#numsisgedo').val()=='') {
		alert("INGRESE NUMERO DE SISGEDO");
		$('#numsisgedo').focus();
	}else if ($('#numsisgedo').val().length>10) {
		alert("ERROR DE LONGITUD AL INGRESAR EL NÚMERO DE SISGEDO, INTENTE DENUEVO");
		$('#numsisgedo').focus();
	}else{
		var tramite=$('#numtramite').val();
		var sisgedo=$('#numsisgedo').val();
		if (act=='insertar') {
			$.ajax({
				url: 'controller/ctrTramite.php',
				type: 'POST',
				data: {
					action: 'actualizasisgedo',
					idtra: tramite,
					sisg: sisgedo
				},
			})
			.done(function(data) {
				if (data=='false') {
					alert("EL NÚMERO DE SISGEDO YA EXITE!!");
					$('#numsisgedo').focus();
					return false;
				}else{
					var url='reportes/index.php?tra='+tramite+'&&sis='+sisgedo;
					window.open(url);
				}
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
				
			});
		}else{
			var url='reportes/index.php?tra='+tramite+'&&sis='+sisgedo;
			window.open(url);
		}
	}
}