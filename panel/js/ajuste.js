var defaul = '#757575';
	
function cambiar(c){
	document.getElementById("nav").style.background = c;
		
	if (document.getElementById("nav").style.background != defaul){
			document.getElementById("che").style.display = 'initial';
	}
}

function texto(c){
	document.getElementById("content").style.color = c;
		
}

function add(){
	var linkk = document.getElementById("enlacedes").value;
	var nombreLink = document.getElementById("botontitulo").value;
	addnom = new Array(linkk , nombreLink);
	if(linkk.length == 0 ){
		alert("Debe agregar un link");
	}else if(nombreLink.length == 0){
		alert("Debe agregar un nombre");
	}else{
		if (sessionStorage.getItem("Hola") == null){
				sessionStorage.setItem("Hola",addnom);
				
				x = Array(sessionStorage.getItem("Hola").split(","));
				for (var i = 0; i < x.length; i++){
					document.getElementById("view").innerHTML += "<label>" + x[i] + "<a href='#' onclick='borrar(this)'><span class='icon-cross'></span></a></label>";
					console.log(x[i]);
				}
				x= [];
				sessionStorage.removeItem("Hola");
		}	
	
	}
}





	