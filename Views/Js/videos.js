$(document).ready(function(){
    loadVid();
});

function loadVid(){
    $.ajax({
        url:'../controles/viewVideo.php',
        type:'POST',
        success:function(data){
            $('#videos').html(data);
        }
    })
}

function eliminarVid(id){
    Swal.fire({
        title: '¿Estas seguro?',
        text: "No se podra revertir esta accion!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Eliminar'
      }).then((result) => {
        if (result.value) {
            $.ajax({
                url:'../controles/deleteVideo.php',
                data:{id:id},
                type:'POST',
                success:function(resultado){
                    loadVid();
                    Swal.fire(
                        'Eliminado!',
                        resultado,
                        'success'
                      )
                }
            })
    
        }
      })
}