var isnn,isie
if(navigator.appName=='Microsoft Internet Explorer') //check the browser
{  isie=true }

if(navigator.appName=='Netscape')
{  isnn=true }

function right(e) //to trap right click button 
{
	if (isnn && (e.which == 3 || e.which == 2 ))
		return false;
	else if (isie && (event.button == 2 || event.button == 3)) 
	{
		alert("Operación no Autorizada - © Departamento de Licencias de Conducir");
		return false;
	}
		return true;
}

function key(k)   
{
	if(isie) {
		if(event.keyCode==16 || event.keyCode==17 || event.keyCode==18 || event.keyCode==93 || (event.keyCode>=112 && event.keyCode<=123 && event.keyCode!=116)) {
			alert("Operación no Autorizada - © Departamento de Licencias de Conducir") 
			return false;
		 } 
	}

	if(isnn){
		alert("Operación no Autorizada - © Departamento de Licencias de Conducir") 
		return false; }   
}

if (document.layers) window.captureEvents(Event.KEYPRESS);  
if (document.layers) window.captureEvents(Event.MOUSEDOWN);
if (document.layers) window.captureEvents(Event.MOUSEUP);
document.onkeydown=key;  
document.onmousedown=right;
document.onmouseup=right;
window.document.layers=right;
