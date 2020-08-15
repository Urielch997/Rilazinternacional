$(document).ready(function(){
    cargarComentarios();
});



$("#comentar").submit(function(e){
    e.preventDefault();
    var parametros = $(this).serialize();
    if($("#coment").val() == "" || $("#coment").val() == null){
        Swal("Error!","Debe escribir un comentario","error");
    }else{
        comentar(parametros)
        $("#coment").val("");
    }
})

function comentar(parametros){
    $.ajax({
        type:"POST",
        url:"../controles/comentar.php",
        data:parametros,
        beforeSend:function(){
            swal("Espere","Su comentario se esta procesando","info");
        },
        success:function(){
            swal("Enviado!","Su comentario fue enviado a revision y aprobacion","success");
        }
    })
}

function cargarComentarios(){
    var idpub = $("#idpub").val();
    $.ajax({
        type:"POST",
        url:"../controles/comentar.php",
        data:{"sql":idpub},
        success:function(datos){
            $("#comentarios").html(datos);
        }
    })
}