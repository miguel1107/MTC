function AceptaTodo(evt,obj,lgd) 
    {
		var nav4 = window.Event ? true : false;
        var key = nav4 ? evt.which : evt.keyCode;
		if (key==13){
			tabu(form1,obj);
			return false;
		}
		if(obj.value.length >= lgd) {
			if(key!=8 && key!=0)
			return false;
		}
    }
	
function AceptaNumero(evt,obj,lgd) 
    {
        var nav4 = window.Event ? true : false;
        var key = nav4 ? evt.which : evt.keyCode; 
		if (key==13){
			tabu(form1,obj);
			return false;
		}
		if(obj.value.length >= lgd) {
			if(key!=8 && key!=0)
			return false;
		}
        return (key <= 13 || key==46 ||  (key >= 38 && key <= 57)); 

    }
	
function AceptaNoNumero(evt,obj,lgd) 
    {
		var nav4 = window.Event ? true : false;
        var key = nav4 ? evt.which : evt.keyCode;
		if (key==13){
			tabu(form1,obj);
			return false;
		}
		if(obj.value.length >= lgd) {
			if(key!=8 && key!=0)
			return false;
		}
        return (key <= 13 || key==46 ||  (key < 38 || key > 57)); 
    }
	
function tabu(form,field)
	{
		var next=0, found=false
		for(var i=0;i<form.length;i++)	{
			if(field.name==form.elements[i].name){
				next=i+1;
				found=true
				break;
			}
		}
		while(found){
			if( form.elements[next].disabled==false &&  form.elements[next].type!='hidden' &&  form.elements[next].type!='file'){
				form.elements[next].focus();
				break;
			}
			else{
				if(next<form.length-1)
					next=next+1;
				else
					break;
			}
		}
	}
	
function CambiarMayusculas(val) 
    {
	    var nomvar=val.value;
		val.value=nomvar.toUpperCase();
    }
