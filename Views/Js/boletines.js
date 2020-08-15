$(document).ready(function(){
    load($("#buscar-bol").val(),1);
});


function load(q,pag){
    $.ajax({
        url:'../controles/boletin.php',
        data:{"q":q,"pag":pag},
        type:"POST",
        beforeSend:function(){
            $("#datos-bol").html('<img src="../img/preloader.gif">');
    },
        success:function(datos){
            $("#datos-bol").html(datos);
        }
    });
}

