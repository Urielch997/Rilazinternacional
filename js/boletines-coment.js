$(document).ready(function(){
       coment();
        $('[data-toggle="tooltip"]').tooltip();
});

function coment(){
   var id = $("#idbol").val()
    $.ajax({
        url:'../controles/bol-coment.php',
        type:'POST',
        data:{"id":id,'q':'g'},
        beforeSend:function(){
            $("#comentarios").addClass("d-flex justify-content-center flex-wrap");
            $("#comentarios").html("<img src='../img/preloader.gif'>");
        },success:function(datos){
            $("#comentarios").removeClass("d-flex justify-content-center flex-wrap");
            $("#comentarios").html(datos);
        }
    })
}

$("#comentar").submit(function(e){
    e.preventDefault();
    var parametros = $(this).serialize();
    if($("#coment").val() == "" || $("#coment").val() == null){
        Swal("Error!","Debe escribir un comentario","error");
    }else{
        console.log($("#coment").val());
        comentar(parametros);
        $("#coment").val("");
    }
})

function comentar(parametros){
    $.ajax({
        type:"POST",
        url:"../controles/bol-coment.php",
        data:parametros + "&q=i",
        beforeSend:function(){
            Swal("Espere!","Su comentario se esta procesando.","info");
        },
        success:function(){
            Swal("Enviado!","Su comentario se envio para ser revisado y aprobado.","success");
        }
    })
}

$('#comentarios').on("click",".thumb", function(){
    var like;
    var id= this.id;
    var idPub = $("#idbol").val();
    var iduser = $("#iduser").val();
    var pos = $(this).siblings("span");
    $.ajax({
        url:'../controles/liked-post.php',
        type:'POST',
        data:{'id':id,'iduser':iduser,'idPub':idPub, 'q':'insert'},
        success:function(){
            loadLike(idPub,id, function(datos){
                if(datos == 0){
                    like = '';
                }else{
                    like = datos;
                }
                pos.html(like);
            });
        }
    })
  });

function loadLike(id,cm,callback){
    $.ajax({
        url:'../controles/liked-post.php',
        type:'POST',
        data:{'id':id,'q':'select','coment':cm},
        success:function(datos){
            callback(datos);
        }
    })
}

$("#comentarios").on("click","#reply",function(){
    var content = $(this).parent();
    var two = content.parent();
    var tree = two.parent();
    tree.siblings("div").toggle();
})

