function verFicha(tra) {
	console.log(tra);
	var url="detalle_imprimir.php?id="+tra;
	location='listado_tramite.php';
	window.open(url);
}