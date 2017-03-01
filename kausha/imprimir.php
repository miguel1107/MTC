<?php

$datos = array();


function cargarVista(){
	ob_start();

	require 'index.php';

	$html = ob_get_contents();
}