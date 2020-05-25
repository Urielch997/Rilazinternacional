var msj = $('#mensaje');

$('#login').submit(function(e){
    e.preventDefault();
    var parametros = $(this).serializeArray();
    $.ajax({
        data:parametros,
        type:'POST',
        url:'controles/sesion.php',
        success:function(valor){
            $("#text").html(valor);
            mostrar();
        }
    })

});

function mostrar(){
    msj.fadeIn();
    setTimeout("cerrar()",2000);
}

function cerrar(){
    msj.fadeOut();
}
