function validate(){
    var file = document.getElementById("video").files[0];
        var formdata = new FormData();
        formdata.append("video", file);
        formdata.append("q",'d');
    if(!file){
        location.href='Publicaciones.php';
    }else{
        $.ajax({
            url:'../controles/subirvideo.php',
            data:formdata,
            type:'POST',
            processData: false,
            contentType: false,
            success:function(){
            }
        })
    }
}

function up(name){
        document.getElementById("nombre").value = name;
    }

function _(el){
	return document.getElementById(el);
}
function uploadFile(){
    var fileInput = document.getElementById('video');
    var filePath = fileInput.value;
    var allowedExtensions = /(.mp4|.ogv|.webm)$/i;
    if(!allowedExtensions.exec(filePath)){
        alert('Solo se permiten formatos de video: mp4, ogv, webm');
        fileInput.value = '';
        return false;
    }else{
        var file = _("video").files[0];
        var titulo =document.getElementById("titulo").value;
        var descripcion = document.getElementById("descripcion").value;
        //alert(file.name+" | "+file.size+" | "+file.type);
        var formdata = new FormData();
        formdata.append("video", file);
        formdata.append("titulo", titulo);
        formdata.append("descripcion", descripcion);
        var ajax = new XMLHttpRequest();
        ajax.upload.addEventListener("progress", progressHandler, false);
        ajax.addEventListener("load", completeHandler, false);
        ajax.addEventListener("error", errorHandler, false);
        ajax.addEventListener("abort", abortHandler, false);
        ajax.open("POST", "../controles/subirvideo.php");
        ajax.send(formdata);
    }
}
function progressHandler(event){
        _("loaded_n_total").innerHTML = "Subido "+event.loaded+" bytes de "+event.total;
        var percent = (event.loaded / event.total) * 100;
        _("barra-progreso").style.width = Math.round(percent).toString()+"%";
        _("status").innerHTML = Math.round(percent)+"% Subido... Porfavor, espere";   
}
function completeHandler(event){
	_("status").innerHTML = '';
    _("barra-progreso").style.width = "100%";
    var data = JSON.parse(event.target.responseText);
    if(data['status'] == 'error'){
        _("uploaded").innerHTML = data['msj'];
    }else{
        _("uploaded").innerHTML = '<video width="100%" height="100%" controls><source src="video/'+data['msj']+'">';
    }
    
}

function errorHandler(event){
	_("status").innerHTML = "Fallo al subir el archivo";
}
function abortHandler(event){
	_("status").innerHTML = "Subida de archivo cancelada";
}