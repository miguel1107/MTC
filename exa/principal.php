<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Examen de Licencias de Conducir</title>
<script language="JavaScript">

var isnn,isie
if(navigator.appName=='Microsoft Internet Explorer') //check the browser
{  isie=true }

if(navigator.appName=='Netscape')
{  isnn=true }




<!--
function cierresesion()
{
   setInterval("window.close()",2500)
   return true;	
}

function PromocionesPopUp()
{
	if(typeof(campanhaPopUps)=='function') 
		campanhaPopUps(2,'00000000','45064600','0','');

}
//-->

   function openpagetxns()
   {
      window.open ("BNet_Operaciones_","openpagetxns","directories=0,copyhistory=0,width=450,height=430,location=0,menubar=0,resizable=0,scrollbars=1,status=0,titlebar=1,toolbar=0");
   }

   

   function changeScrollbarColor() 
   {
      if (document.all) {
      document.body.style.scrollbarBaseColor = '#666699';
      }
   }


   //original author unknown
   //modified by, and displayed on www.a1javascripts.com
   if (window.Event) 
   document.captureEvents(Event.MOUSEUP); 

   function nocontextmenu() 
   { 
   event.cancelBubble = true 
   event.returnValue = false; 
   return false; 
   } 

   function norightclick(e) 
   { 
     if (window.Event) 
     { 
       if (e.which == 2 || e.which == 3) 
       return false; 
     } 
     else 
       if (event.button == 2 || event.button == 3) 
       { 
         alert('Operación no Autorizada - © Departamento de Licenias de Conducir')
         event.cancelBubble = true 
         event.returnValue = false; 
         return false; 
       } 
   }


   function key(k)   
   {
	
   }
   
   if (document.layers) 
   { 
       
     document.captureEvents(Event.MOUSEDOWN); 
           
   } 

   if (document.layers) window.captureEvents(Event.KEYPRESS);
   document.onkeydown=key;  
   document.onmousedown = norightclick; 
   document.onmouseup = norightclick;
   

function clear2(obj)
{
	if (obj) obj.value= '';
}

function numKeyPressed2(obj, id, ocontrol)
{
	n= getValue(obj, id);
	if (ocontrol && (ocontrol.value.length < 4) ) ocontrol.value += n;
}

function getValue(obj, id)
{  
   return eval( obj + '.numpressed(' +id+ ');' )
}

function show()
{
	this.reorder();
	this.writenumpad();
}

function numpressed(j)
{
	return this.C[j];
}

function reorder()
{
	tmp= new Array(this.BC);
    for (i=0; i<this.BC; i++) tmp[i]=i
	
	this.C= Array(this.BC); 
		
	for (i=this.BC-1; i>=0; i--)
	{
		index = Math.floor(Math.random() * i);
		this.C[i]= tmp[index]
		if ( index != i )
			tmp[index]= tmp[i];	
	}
}

function writenumpadbut(j)
{
	but_id= this.numpad_bprefix+j;
	s= '\<td width="25">\<font size= "1" class="enlace">\<a id="'+but_id+'" href="javascript:numKeyPressed(\''+this.name+'\','+j+')" style="text-decoration: none">'+ '&nbsp;&nbsp;' +this.C[j]+ '&nbsp;&nbsp;' +'\</a>\</font>\</td>'
	
	document.write(s)	
}

function writenumpadtr_in()
{
	document.write('\<tr height="20" align="center" BGCOLOR="#4682b4" >')
}

function writenumpadtr_out()
{
	document.write('\</tr>')                                           
}

function writenumpad()
{
	document.write('\<table width="75" BORDER="1" cellspacing="0" cellpadding="0" bordercolor="#D5D5D5">')
	
	for (i=0; i< this.BC; i++)
	{
		if (i%3==0) this.writenumpadtr_in()
		this.writenumpadbut(i)	
		if (i%3==2) this.writenumpadtr_out()
	}
	
	document.write('\<td class="tablacalc2" BGCOLOR="#4682b4" colspan="2">\<font size="1" class="enlace">\<a id="bclear" href="javascript:clear(\''+this.name+'\')" style="text-decoration: none">&nbsp;&nbsp;Limpiar&nbsp;&nbsp;\</a>\</font>\</td>')
	
	document.write('\</tr>\</table>')
}

function numpad(numpad_id)
{
	this.BC= 10;	
	
	this.reorder= reorder;
	this.show= show;
	this.numpressed= numpressed;
	
	this.writenumpad= writenumpad
	this.writenumpadbut= writenumpadbut
	this.writenumpadtr_in= writenumpadtr_in
	this.writenumpadtr_out= writenumpadtr_out
	
	if (numpad_id == '')
		alert('error: numpad_id empty')
	
	this.numpad_bprefix= numpad_id
	
	this.name= 'np_' + numpad_id
}
<!--
//Desabilita click derecho (sin alertas)
var message="";
function clickIE() {if (document.all) {(message);return false;}}
function clickNS(e) {if 
(document.layers||(document.getElementById&&!document.all)) {
if (e.which==2||e.which==3) {(message);return false;}}}
if (document.layers) 
{document.captureEvents(Event.MOUSEDOWN);document.onmousedown=clickNS;}
else{document.onmouseup=clickNS;document.oncontextmenu=clickIE;}

document.oncontextmenu=new Function("return false")
// --> 
</script>
<script language="JavaScript" src="security.js"></script>

</head>

<frameset rows="134,*" cols="*" framespacing="0" frameborder="no" border="0">
  <frame src="main1.php" name="topFrame" scrolling="No" noresize="noresize" id="topFrame" title="Examen de Reglas de Transito" />
  <frame src="ingreso.php" name="mainFrame" id="mainFrame" title="Examen de Reglas de Transito" />
</frameset>
<noframes><body>
</body>
</noframes></html>
