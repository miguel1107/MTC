$(document).ready(function() {
	$('#numsisgedo').focus();
});

function verSolicitud() {
	if ($('#numsisgedo').val()=='') {
		alert("INGRESE NUMERO DE SISGEDO");
		$('#numsisgedo').focus();
	}else{
		var tramite=$('#numtramite').val();
		var sisgedo=$('#numsisgedo').val();
		var url='reportes/index.php?tra='+tramite+'&&sis='+sisgedo;
		window.open(url);
	}
}