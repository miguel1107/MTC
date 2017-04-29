<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 TRANSITIONAL//EN"><html><head><title> La Personal de J.A.L.L. Programas: GENERAR NUMEROS ALEATORIOS.</title><meta name="description" content="Java Script que un n�mero aleatorio comprendido entre otros 2 arbitrariamente elegidos."><meta name="keywords" content="Java, Script, Scripting, JScript, Javascript, java script, patrones, expresiones regulares, GPL, ja.lopez, ja_lopezl"><meta name="author" content="Jos� Antonio L�pez Lorenzo, J.A.L.L."><meta http-equiv="Content-Type" content="text/html; charset=utf-8"><meta http-equiv="content-language" content="es"><script type="text/javascript" src="../javascript/index.js"></script><link href="../estilo/index2.css" rel="stylesheet" type="text/css"><style> INPUT { border : 1px solid Black; text-align : right; padding-right : 5px; font-weight : bold; text-align:center; }</style>
<script type="text/javascript">
function aleatorio()
{
// script: GENERAR UN N�MERO ALEATORIO ENTRE OTROS DOS
// http://personal-de-jall.blogcindario.com/
// ja_lopezl@yahoo.es
var n = 0;
var aux = 0;
var reg =/,/g;
var maxi=document.formulario.maximo.value;
var mini=document.formulario.minimo.value;
if (mini.search(reg)!= -1 || maxi.search(reg) != -1)
{
alert ("Use 'puntos' en lugar de 'comas' para separar la parte decimal");
return true;
}
maxi=parseFloat(maxi);
mini=parseFloat(mini);
var dif = maxi - mini;
if (mini >= maxi)
{
alert ("El numero mayor debe ser MAYOR que el menor");
document.formulario.maximo.select();
document.formulario.maximo.focus();
return true;
}
if (mini <0)
{
alert ("No se aceptan n�meros negativos");
document.formulario.minimo.select();
document.formulario.minimo.focus();
return true;
}
do
{
aux = Math.random() * Math.ceil(dif);
}
while (aux > dif)
n = mini + aux;
document.formulario.resultado.value = n;
}
function GenerarAleatorios(n,m){
// script: GENERAR ALEATORIAMENTE LISTA DE N�MEROS
// http://personal-de-jall.blogcindario.com/
// ja_lopezl@yahoo.es
if (parseInt(n) <= parseInt(m)){
var listaAleatorios = new Array();
var provListaAleatorios = new Array();
provListaAleatorios[0] = parseInt(Math.random()*m);
listaAleatorios[0] = provListaAleatorios[0];
for (i = 1 ; i < n ; i++){
var chequeo = 1;
provListaAleatorios[i] = parseInt(Math.random()*m);
for (j = 0 ; j < i ; j++){
if(listaAleatorios[j] == provListaAleatorios[i]){
chequeo = 0;
}
}
if (chequeo == 0){
i--;
continue;
}
else {
listaAleatorios[i] = provListaAleatorios[i];
}
}
var lista = listaAleatorios.join(" - ");
document.formulario2.resultado2.value = lista;
delete listaAleatorios;
delete provListaAleatorios;
}
else {
document.formulario2.resultado2.value = "ERROR";
return false;
}
}
function AleatoriosCifras(n){
// script: GENERAR ALEATORIAMENTE N�MEROS de N CIFRAS
// http://personal-de-jall.blogcindario.com/
// ja_lopezl@yahoo.es
var multiplicador = Math.pow(10,n);
var numAleat = 0;
do{
numAleat = Math.random();
numAleat = parseInt(numAleat * multiplicador);
}while (numAleat < (multiplicador/10))
document.formulario3.resultado3.value = numAleat;
}
</script>
</head><body onload="window.defaultStatus='La Web Personal de JALL'; return true" leftmargin="0" rightmargin="0" topmargin="0" bottommargin="0" marginwidth="0" marginheight="0"> <a name="top"></a><table border="0" cellspacing="0" cellpadding="0" align="center" height="100%" bgcolor="#333399"><tr> <td style="width:12px; background-image : url(../imagenes/shadow-mr2.gif);background-color : #E5E6FF;">&nbsp; </td> <td align="center" style="border:1px solid #333399"><table border="0" cellspacing="0" cellpadding="0" height="100%" bgcolor="#333399"><tr> <td width="767" height="57" align="center" style="background-image : url(../imagenes/menu.jpg);background-color : #9090FF;"> <img src="../imagenes/cabecera.jpg" width="564" height="56"></td></tr>
<tr> <td valign="top" bgcolor="#E5E6FF" border="0"><table border="0" cellspacing="0" cellpadding="0" height="100%"><tr> <td width="545" height="100%" valign="top"><h1>&nbsp;</h1><div class="contenido"><h2>GENERAR UN NoMERO ALEATORIO ENTRE OTROS DOS</h2><p> Si usa nomeros decimales (por ejemplo, 12,45) ponga, como separador de la parte decimal y de la entera, un punto (".") y no una coma (",").<form name="formulario">

<div align="center"> Menor: <input type="text" name="minimo" size="5" style="background-color : #E6E6FA;"> - Mayor: <input type="text" name="maximo" size="5" style="background-color : #C3C3F3;"> <br><p align="center"> El nomero pedido es: <input type="text" name="resultado" size="19" style="background-color : #F0E68C;"></p><p align="center"> <input type="button" onclick="aleatorio()" value="GENERAR ALEATORIO"></p></div></form><h2>GENERAR ALEATORIAMENTE LISTA DE NoMEROS</h2><p> Dados los M primeros nomeros naturales (incluido el cero), generaremos una lista de <b>N</b> (0 &lt; N &lt;= M) elementos con dichos nomeros. <b>Nota</b>.- Segun este criterio, los 15 primeros naturales seroan 0, 1 ... 14 <b>Nota</b>.- Si usted toma N = M lo que obtiene es una lista desordenada <br>de los M primeros naturales.<h4>EJEMPLO</h4><form name="formulario2"><div align="center"> Elija el nomero de elementos: <select name="numelementos" style="background-color : #E6E6FA;"> <option value="1"> 1</option> <option value="2"> 2

</option> <option value="3"> 3</option> <option value="4"> 4</option> <option value="5"> 5</option> <option value="6"> 6</option> <option value="7"> 7</option> <option value="8"> 8</option> <option value="9"> 9</option> <option value="10"> 10</option> <option value="11"> 11</option> <option value="12"> 12</option> <option value="13"> 13</option> <option value="14"> 14</option> <option value="15"> 15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>
</select> &nbsp;&nbsp;&nbsp;Elija el nomero de naturales: <select name="numenatur" style="background-color : #E6E6FA;"> <option value="1"> 1</option> <option value="2"> 2</option> <option value="3"> 3</option> <option value="4"> 4</option> <option value="5"> 5</option> <option value="6"> 6</option> <option value="7"> 7</option> <option value="8"> 8</option> <option value="9"> 9</option> <option value="10"> 10</option> <option value="11"> 11</option> <option value="12"> 12</option> <option value="13"> 13</option> <option value="14"> 14</option> <option value="15"> 15</option>
  <option value="17">16</option>
  <option value="18">18</option>
  <option value="19">19</option>
  <option value="20">20</option>
  <option value="21">21</option>
  <option value="22">22</option>
  <option value="23">23</option>
  <option value="24">24</option>
  <option value="25">25</option>
  <option value="26">26</option>
  <option value="27">27</option>
  <option value="28">28</option>
  <option value="29">29</option>
  <option value="30">30</option>
  <option value="31">31</option>
  <option value="32">32</option>
  <option value="33">33</option>
  <option value="34">34</option>
  <option value="35">35</option>
  <option value="36">36</option>
  <option value="37">37</option>
  <option value="38">38</option>
  <option value="39">39</option>
  <option value="40">40</option>
</select> <br><p align="center">

La lista pedida es: <br> <input type="text" name="resultado2" size="50" style="background-color : #F0E68C;"></p><p align="center"> <input type="button" onclick="GenerarAleatorios(this.form.numelementos.value,this.form.numenatur.value)" value="GENERAR ALEATORIO"></p></div></form><h2>GENERAR UN NoMERO ALEATORIO DE N CIFRAS</h2><p>
<hr style="width:60%"><div align="center"></div></td></tr></table></td></tr><tr> <td align="center" style="background-image : url(../imagenes/menu.jpg);background-color : #9090FF;"> <font size="-3" color="white"> Dedicado a <b>ANGELES</b> y a <b>RAMON</b>. <br>Realizado por <a href="&#109;&#97;&#105;&#108;&#116;&#111;&#58;&#106;&#97;&#95;&#108;&#111;&#112;&#101;&#122;&#108;&#64;&#121;&#97;&#104;&#111;&#111;&#46;&#101;&#115;" class="cabecera">Joso Antonio Lopez Lorenzo (JALL)</a> <br>Vigo - Galicia - Espaoa -Europa</font></td></tr>

</table></td> <td style="width:12px; background-image : url(../imagenes/shadow-mr.gif);background-color : #E5E6FF;">&nbsp; </td></tr></table></body></html>
