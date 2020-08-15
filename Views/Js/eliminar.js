function borrarpub(id){
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
                url:'../controles/eliminarpub.php',
                data:{id:id},
                type:'POST',
                success:function(resultado){
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

function delbol(id,q,pagina){
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
            url:'../controles/eliminarbol.php',
            data:{id:id},
            type:'POST',
            success:function(resultado){
                load(q,pagina);
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