$(document).ready(function(){
    getEmail(); 
});

$('#saveEmail').click(function(){
    var correos = $('#correo').val();
    $.ajax({
        data:{'correo':correos,'q':'i'},
        url:'../controles/config-con.php',
        type:'POST',
        success:function(datos){
            swal('Guardado','Se han guardado los correos','success');
            getEmail();
        }
    })
});

function getEmail(){
    $.ajax({
        data:{'q':'g'},
        url:'../controles/config-con.php',
        type:'POST',
        success:function(datos){
            $("#correo").val(datos);
        }
    });
}