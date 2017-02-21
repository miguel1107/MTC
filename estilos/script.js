function imprimir(foto,ancho,alto) {
	nuevaVentana1 = window.open (foto,"newwindow1","height="+alto+",width="+ancho+", resizable=0,noresize=no,toolbar=0,location=0,directories=0,status=0,menubar=0,scrollbars=yes")
}
function printPage() { 
	if (confirm("¿Imprimir página?")) {
    	window.print();
  	}
}
function CA(isOn){
	for (var i=0;i<frmList.elements.length;i++){
		var e = frmList.elements[i];
		if ((e.name != 'allbox') && (e.type=='checkbox')){
			if (isOn != 1){
				e.checked = frmList.allbox.checked;
				if (frmList.allbox.checked){
					hL(e);
				}else{
					dL(e);
				}
			}else{
				e.tabIndex = i;
				if (e.checked){
					hL(e);
				}else{
					dL(e);
				}
			}
		}
	}
}

function CCA(CB){
		if (CB.checked)
			hL(CB);
		else
			dL(CB);
			
	var TB=TO=0;
	for (var i=0;i<window.document.frmList.elements.length;i++){
		var e = window.document.frmList.elements[i];
		if ((e.name != 'allbox') && (e.type=='checkbox')){
			TB++;
			if (e.checked) TO++;
		}
	}
	/*if (TO==TB)
		igrid.window.document.frmList.allbox.checked=true;
	else
		igrid.window.document.frmList.allbox.checked=false;*/
}
function hL(E){
	while (E.tagName!="TR"){
		E=E.parentNode;
	}
	E.className = "H";
}

function dL(E){
	while (E.tagName!="TR"){
		E=E.parentNode;
	}
	E.className = "";
}
function vChk(frm){ 
	var sw=0;
	for(var i=0;i<frm.length;i++){
		if(frm.elements[i].checked){
			sw=1;
		}		
	}
	if(sw!=1){
		alert("No hay ningun registro seleccionado.");
		return(false);
	}
	rpta=confirm("Esta seguro de Eliminar estos Registros?");
	if (rpta==false){
		return(false);
	}
}
function vChkprograma(frm){ 
	var sw=0;
	for(var i=0;i<frm.length;i++){
		if(frm.elements[i].checked){
			sw=1;
		}		
	}
	if(sw!=1){
		alert("No hay ningun registro seleccionado.");
		return(false);
	}
	//rpta=confirm("Esta seguro de Realizar esta Operación?");
	rpta=true;
	if (rpta==false){
		return(false);
	}
}


function vKeyNum(){
	if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;
}
////***ANULAR VALES
function anularvale(frm){ 
	var sw=0;
	for(var i=0;i<frm.length;i++){
		if(frm.elements[i].checked){
			sw=1;
		}		
	}
	if(sw!=1){
		alert("No hay ningun registro seleccionado.");
		return(false);
	}
	rpta=confirm("Esta seguro de Anular estos Trámites?");
	if (rpta==false){
		return(false);
	}
}
////***ANULAR VALES


////***RESTAURAR TRAMITE
function restaurar_tramite(frm){ 
	var sw=0;
	for(var i=0;i<frm.length;i++){
		if(frm.elements[i].checked){
			sw=1;
		}		
	}
	if(sw!=1){
		alert("No hay ningun registro seleccionado.");
		return(false);
	}
	rpta=confirm("Esta seguro de Restaurar este Tramite?");
	if (rpta==false){
		return(false);
	}
}
////***RESTAURAR TRAMITE
function G(UR){
	if (!e)
	var e=window.event;
	if (e)
		e.cancelBubble=true;
	if(UR)
		//location.href=UR+"&"+_UM;
		location.href=UR;
}

/*function Submprograma(act,first,dosub,e){
	if (act=='select'){
		if (!e)	var e=window.event;
		//e.cancelBubble=true;
	}
	if (act=='notbulkmail'){
		frm.action="/cgi-bin/notbulk";
	}else if (act=='report'){
		frm.action="/cgi-bin/kill";
		frm.ReportLevel.value="1";
	}
	num=vChkprograma(igrid.window.document.frmList);
	if (num!=false){
		igrid.window.document.frmList.action="111.php";
		igrid.window.document.frmList.submit();
	}
}*/
function Subm(act,first,dosub,pagina,e){
	/*
	delete
	programa
	editar
    detalle
	buscar
	*/
	if (!e)	var e=window.event;
	
	if (act=='delete'){
		num=vChk(igrid.window.document.frmList);
	}
	
	if (act=='select'){
		num=vChkprograma(igrid.window.document.frmList);
	}
	////***anularvale
	if (act=='anular'){
		num=anularvale(igrid.window.document.frmList);
	}
	
	if (act=='restaurar'){
		num=restaurar_tramite(igrid.window.document.frmList);
	}
	////***anularvale
	if (num!=false){
		igrid.window.document.frmList.action=pagina;
		igrid.window.document.frmList.submit();
	}
	/*if (act=='notbulkmail'){
		frm.action="/cgi-bin/notbulk";
	}else if (act=='report'){
		frm.action="/cgi-bin/kill";
		frm.ReportLevel.value="1";
	}*//*
	num=vChk(igrid.window.document.frmList);
	if (num!=false){
		//igrid.window.document.frmList.action="111.php";
		igrid.window.document.frmList.submit();
	}*/
}
function Err(Err,bC,EP){
	bC=bC?1:0;
	if (!EP)
	EP="";
	var UR="http://sea1fd.sea1.hotmail.msn.com/cgi-bin/dasp/error_modalshell.asp?Err="+Err+"&IsConf="+bC+"&"+EP;
	var RV=OW("Error","399","217","","","no","no","no","no","no",UR,"modal");
	if ( !RV.help && !RV.url )
	return RV.state;
	if (RV.help)
	CPH(RV.help);
	if (RV.url)	{
		if ('undefined' != typeof(DoSaveMSG) )
			DoSaveMSG(RV.url);
		else
			location.href=RV.url;
	}
}

function numChecked(){
	j=0;
	for(i=0;i<frm.length;i++){
		e=frm.elements[i];
		if (e.type=='checkbox' && e.name != 'allbox' && e.checked)
		j++;		
	}
	return j;
}
function slct1st(){
	j=0;
	for(i=0;i<frm.length;i++){
		e=frm.elements[i];
		if (e.type=='checkbox' && e.name != 'allbox' && e.checked)
		if(j==1) e.checked=false;
		else j=1;
	}
	return j;
}

function OW(strName,iW,iH,TOP,LEFT,R,S,SC,T,TB,URL,TYPE,dArg){
	if (TYPE=="modal" || TYPE=="modalIframe"){
		var sF=""
		var _rv
		sF+=T?'unadorned:'+T+';':'';
		sF+=TB?'help:'+TB+';':'';
		sF+=S?'status:'+S+';':'';
		sF+=SC?'scroll:'+SC+';':'';
		sF+=R?'resizable:'+R+';':'';
		sF+=iW?'dialogWidth:'+iW+'px;':'';
		sF+=iH?'dialogHeight:'+iH+'px;':'';
		sF+=TOP?'dialogTop:'+TOP+'px;':'';
		sF+=LEFT?'dialogLeft:'+LEFT+'px;':'';
		if (TYPE=="modal")
			_rv=window.showModalDialog(URL+"&r="+Math.round(Math.random()*1000000),dArg?dArg:"",sF);
		else{
			var da=new Object()
			da.w=iW;
			da.h=iH;
			da.url=URL;
			_rv=window.showModalDialog("/cgi-bin/dasp/ModalIframe.asp?r="+Math.round(Math.random()*1000000),da,sF);
		}
		if ("undefined" != typeof(_rv) )
			return _rv;
	}else{
		var sF=""
		sF += iW?'width='+iW+',':'';
		sF+=iH?'height='+iH+',':'';
		sF+=R?'resizable='+R+',':'';
		sF+=S?'status='+S+',':'';
		sF+=SC?'scrollbars='+SC+',':'';
		sF+=T?'titlebar='+T+',':'';
		sF+=TB?'toolbar='+TB+',':'';
		sF+=TB?'menubar='+TB+',':'';
		sF+=TOP?'top='+TOP+',':'';
		sF+=LEFT?'left='+LEFT+',':'';
		var HMW=window.open(URL?URL:'about:blank',strName?strName:'',sF);
		if ( (document.window != null) && (!HMW.opener) )
		HMW.opener=document.window;
		HMW.focus();
	}
}