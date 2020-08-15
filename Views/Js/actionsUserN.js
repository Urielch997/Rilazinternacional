function cargar(IdU,nombre,username,numTele,direc,correo){

    document.formUsuario.txtidUPro.value=IdU;
    document.formUsuario.txtnombre.value=nombre;
    document.formUsuario.txtusername.value=username;

    document.formUsuario.txtdireccion.value=direc;
    document.formUsuario.txtnumtelefono.value=numTele;
    document.formUsuario.txtcoreeo.value=correo;


}
function cargarAdmin(IdU,nombre,username,numTele,direc,correo){
  document.formUsuarioAdmin.txtidUPro.value=IdU;
  document.formUsuarioAdmin.txtnombre.value=nombre;
  document.formUsuarioAdmin.txtusername.value=username;
  document.formUsuarioAdmin.txtdireccion.value=direc;
  document.formUsuarioAdmin.txtnumtelefono.value=numTele;
  document.formUsuarioAdmin.txtcoreeo.value=correo;
}

function cargarActivar(IdU,nombre){
  document.activarUsuario.txtidUPro.value=IdU;
  document.activarUsuario.txtnombre.value=nombre;
}

$(document).ready(function() {


  $("#btnACtivar").click(function(){

    var url="../Controllers/usuarioControllers.php?btnACtivar";
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
          confirmButton: 'btn btn-success',
          cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
      })

      swalWithBootstrapButtons.fire({
        title: 'Activar Usuario?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Si, Activalo!',
        cancelButtonText: 'No, Cancelalo!',
        reverseButtons: true
      }).then((result) => {
        if (result.value) {
          swalWithBootstrapButtons.fire(
            'Usuario Activado!',
            'Ahora puede Accesar a la Pagnia!',
            'success'
          );
             //comienza ajax
             $.ajax({
                type: "POST",
                url:url,
                data: $("#activarUsuario").serialize(),
                success: function(data){
                    $("#salida").html(data);

                  }
            });
            $("#s").hide();
            //fin de ajax

        } else if (
          /* Read more about handling dismissals below */
          result.dismiss === Swal.DismissReason.cancel
        ) {
          swalWithBootstrapButtons.fire(
            'Cancelado!',
            'No se guardo ningun cambio',
            'error'
          )
        }
      })
    $("#SeleccionarActivar").modal('toggle');
});
  $("#deleteProfileadmin").click(function(){
    var url="../Controllers/usuarioControllers.php?deleteProfileadmin";
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
          confirmButton: 'btn btn-success',
          cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
      })

      swalWithBootstrapButtons.fire({
        title: 'Desactivar Usuario?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Si!',
        cancelButtonText: 'No, Cancelalo!',
        reverseButtons: true
      }).then((result) => {
        if (result.value) {
          swalWithBootstrapButtons.fire(
            'Modificado!',
            'Los datos se Ingresaron Correctamente.',
            'success'
          );
             //comienza ajax
             $.ajax({
                type: "POST",
                url:url,
                data: $("#formUsuarioAdmin").serialize(),
                success: function(data){
                    $("#salida").html(data);
                    $('#formUsuarioAdmin')[0].reset();
               }
            });
            //fin de ajax
            $("#s").hide();
        } else if (
          /* Read more about handling dismissals below */
          result.dismiss === Swal.DismissReason.cancel
        ) {
          swalWithBootstrapButtons.fire(
            'Cancelado!',
            'No se guardo ningun cambio',
            'error'
          )
        }
      })
    $("#Seleccionar").modal('toggle');

});


  $("#updateProfileadmin").click(function(){
    var url="../Controllers/usuarioControllers.php?updateProfileAdmin";
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
          confirmButton: 'btn btn-success',
          cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
      })

      swalWithBootstrapButtons.fire({
        title: 'Modificar Tus Datos?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Si, Modificalo!',
        cancelButtonText: 'No, Cancelalo!',
        reverseButtons: true
      }).then((result) => {
        if (result.value) {
          swalWithBootstrapButtons.fire(
            'Modificado!',
            'Los datos se Ingresaron Correctamente.',
            'success'
          );
             //comienza ajax
             $.ajax({
                type: "POST",
                url:url,
                data: $("#formUsuarioAdmin").serialize(),
                success: function(data){
                    $("#salida").html(data);
                    $('#formUsuarioAdmin')[0].reset();
               }
            });
            //fin de ajax
            $("#s").hide();
        } else if (
          /* Read more about handling dismissals below */
          result.dismiss === Swal.DismissReason.cancel
        ) {
          swalWithBootstrapButtons.fire(
            'Cancelado!',
            'No se guardo ningun cambio',
            'error'
          )
        }
      })
    $("#Seleccionar").modal('toggle');

});

    $("#updateProfile").click(function(){
        var url="../Controllers/usuarioControllers.php?updateProfile";
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
              confirmButton: 'btn btn-success',
              cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
          })

          swalWithBootstrapButtons.fire({
            title: 'Modificar  Datos?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Si, Modificalo!',
            cancelButtonText: 'No, Cancelalo!',
            reverseButtons: true
          }).then((result) => {
            if (result.value) {
              swalWithBootstrapButtons.fire(
                'Modificado!',
                'Los datos se Ingresaron Correctamente.',
                'success'
              );
                 //comienza ajax
                 $.ajax({
                    type: "POST",
                    url:url,
                    data: $("#formUsuario").serialize(),
                    success: function(data){
                        $("#salida").html(data);
                        $('#formUsuario')[0].reset();
                   }
                });
                //fin de ajax
                $("#s").hide();
            } else if (
              /* Read more about handling dismissals below */
              result.dismiss === Swal.DismissReason.cancel
            ) {
              swalWithBootstrapButtons.fire(
                'Cancelado!',
                'No se guardo ningun cambio',
                'error'
              )
            }
          })
        $("#Seleccionar").modal('toggle');

    });

    $("#IngresoProfile").click(function(){
      var url="../Controllers/usuarioControllers.php?updateProfileAdminIngreso";
      var nombre = $("#txtnombreNU").val();
      var username = $("#txtusername").val();
      var pass = $("#txtpass").val();
      var direc = $("#txtdireccion").val();
      if(nombre == "" || nombre == null){
          $("#nombre").addClass("is-focused");
      }else{
      const swalWithBootstrapButtons = Swal.mixin({
          customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger'
          },
          buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
          title: 'Ingresar Nuevo Usuario?',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Si, Ingresar!',
          cancelButtonText: 'No, Cancelalo!',
          reverseButtons: true
        }).then((result) => {
          if (result.value) {
            swalWithBootstrapButtons.fire(
              'Ingresado!',
              'Los datos se Ingresaron Correctamente.',
              'success'
            );

               //comienza ajax
               $.ajax({
                  type: "POST",
                  url:url,
                  data: $("#formUsuarioIngreso").serialize(),
                  success: function(data){
                      $("#salida").html(data);
                      $('#formUsuarioIngreso')[0].reset();
                 }
              });
              //fin de ajax
              $("#s").hide();
          } else if (
            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel
          ) {
            swalWithBootstrapButtons.fire(
              'Cancelado!',
              'No se guardo ningun cambio',
              'error'
            )
          }

        })
        }



        });


  });
