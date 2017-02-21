function nbInitVars() {
	nbPosition = new Array (0,0,0,0);
	nbSpeed = new Array (0,0,0,0);
	nbAccel = new Array (0,0,0,0);
	nbHidden = new Array (true,true,true,true);
	nbOpen = new Array (false,false,false,false);
	nbTimeout = new Array (0,0,0,0)
}
function nbTrace() {
	for (i=0; i<4; i++) {
		if ((!nbHidden[i]) && (!nbOpen[i])) {
			nbSpeed[i] += nbAccel[i];
			nbPosition[i] += nbSpeed[i];
			if (nbPosition[i] > 50) {
				nbOpen[i] = true;
				nbTimeout[i] = 400;
				nbSpeed[i] = 0;
				nbAccel[i] = 0;
				nbPosition[i] = 51
			};
			if (nbPosition[i] < 1) {
				nbHidden[i] = true;
				nbSpeed[i] = 0;
				nbAccel[i] = 0;
				nbPosition[i] = 0;
				document.getElementById("nb_item_" + (i + 1)).style.display = "none";
				//window.location.href=<?php echo $_SERVER['HTTP_REFERER'];?>;
				window.location.href = nbPagina;
			};
			document.getElementById("nb_item_" + (i + 1)).style.top = nbPosition[i] + 50
		};
		if (nbOpen[i]) {
			nbTimeout[i]--;
			if (nbTimeout[i] == 0) {
				//nbOpen[i] = false;
				nbAccel[i] = -2
			}
		}
	};
	setTimeout("nbTrace()",15);
}
function nbInit(pagnew) {
	nbPagina = pagnew;
	document.getElementById('nbFlash').style.visibility = 'visible';
	nbInitVars();
	nbTrace();
}

function nbOpenItem(idNum) {
	for (i=0; i<4; i++) {
		if (!nbHidden[i]) {
			nbAccel[i] = -2;
			nbOpen[i] = false
		}
	};
	nbAccel[idNum-1] = 2;
	nbHidden[idNum-1] = false;
	document.getElementById("nb_item_" + idNum).style.display = "block"
	//document.all("nb_item_3").style.display = "block"
}