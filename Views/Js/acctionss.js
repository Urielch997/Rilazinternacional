$(document).ready(function() {
    var id = $("#usuario").val();
    selectUser(id);
    function mostrar() {
        $.ajax({
            type: "POST",
            url:"../Controllers/restriccioonesController.php",
            data:{mostrar:"selectOpt"},
            success: function(data){
                 $('#mostrar').html(data);
            }
        });
    }
    mostrar();
    $("#opPerfil").change(function(){
        var selectOpt = $('#opPerfil').val();
        var url="../Controllers/restriccioonesController.php";
            //comienza ajax
            $.ajax({
                type: "POST",
                url:url,
                data: {selectOpt1:selectOpt},
                success: function(data){
                     $('#marcas').html(data);
                }
            });
            $.ajax({
                type: "POST",
                url:url,
                data: {selectOpt2:selectOpt},
                success: function(data){
                     $('#TiCon').html(data);
                }
            });
            //fin de ajax
    });
      $("#btnEnviar").click(function(){
            $("#mostrar").hide();
            var url="../Controllers/restriccioonesController.php";
            //comienza ajax
            $.ajax({
                type: "POST",
                url:url,
                data: $("#formulario1").serialize(),
                success: function(data){
                     $('#salida').html(data);
                }
            });
            //fin de ajax
        });
        $("#btnShow").click(function()
        {
            mostrar();
            $("#ingresar").hide();
            $("#ver").show();
        });
        $("#btnShowIng").click(function()
        {
            mostrar();
            $("#ver").hide();
            $("#ingresar").show();
        });
        $("#ver").show();
        $("#ingresar").hide();

    /**buttons of Marca */
    $("#btnInsertarM").click(function(){
      var f = new Date();
      var fecha = f.getFullYear()  + "-" + (f.getMonth() +1) + "-" +f.getDate()+" "+ f.getHours()+"  "+ f.getMinutes();
        var url="../Controllers/marcasControllers.php?btnIns" ;
                $.ajax({
                    type: "POST",
                    url:url,
                    data: $("#formulario3").serialize(),
                    success: function(data){
                        $('#i').html(data);

                    }
                });
          $('#formulario3')[0].reset();
          $("#Ingresar").modal('toggle');

    });
        $("#btnEliminarM").click(function(){
            var url="../Controllers/marcasControllers.php?btnEli";
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                  confirmButton: 'btn btn-success',
                  cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
              })

              swalWithBootstrapButtons.fire({
                title: 'Eliminar?',
                text: "Estas Seguro de eliminar este Registro?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Si, Eliminalo!',
                cancelButtonText: 'No, Cancelalo!',
                reverseButtons: true
              }).then((result) => {
                if (result.value) {
                  swalWithBootstrapButtons.fire(
                    'Eliminado!',
                    'Los datos se Eliminaron Correctamente.',
                    'success'
                  );
                     //comienza ajax
                    $.ajax({
                        type: "POST",
                        url:url,
                        data: $("#formulario2").serialize(),
                        success: function(data){
                            $('#i').html(data);
                        }
                    });

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
              $("#Seleccionar").modal('toggle');


        });

        $("#btnModificarM").click(function()
        {
            var url="../Controllers/marcasControllers.php?btnMod";
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                  confirmButton: 'btn btn-success',
                  cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
              })

              swalWithBootstrapButtons.fire({
                title: 'Modificar?',
                text: "Estas Seguro de modificar este Registro?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Si, Modificalo!',
                cancelButtonText: 'No, Cancelalo!',
                reverseButtons: true
              }).then((result) => {
                if (result.value) {
                  swalWithBootstrapButtons.fire(
                    'Modificado!',
                    'Los datos se guardaron Correctamente.',
                    'success'
                  );
                     //comienza ajax
                    $.ajax({
                        type: "POST",
                        url:url,
                        data: $("#formulario2").serialize(),
                        success: function(data){
                            $('#i').html(data);
                        }
                    });

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
              $("#Seleccionar").modal('toggle');

        });

        $(".list-menu").each(function(){
            $(this).children().click(function(){
              var usuario = $("#usuario").val();
              let child = $(this);
              $.ajax({
                url:"../controles/restriccionesMenu.php",
                data:{"id":usuario,"seccion":child.index(),"inst":1},
                type:"POST",
                success:function(data){
                  $("#result").html(data);
                }
              })
            if(child.hasClass("active") || child.hasClass("disabled")){
                child.removeClass("active");
            }else{
              child.addClass("active");
            }
            });
        });

        $("#usuario").change(function(){
          var id = $(this).val();
          selectUser(id);
        });

        function selectUser(id){
          $.ajax({
              data:{"id":id,"sru":2},
              type:"POST",
              url:"../controles/restriccionesMenu.php",
              success:function(datos){
                let d = JSON.parse(datos);
                var numOb =  Object.keys(d).length;
                $(".list-menu").each(function(){
                    let child = $(this).children();
                    child.removeClass("active");
                    child.each(function(){
                      for (var i = 0; i < numOb; i++) {
                        if($(this).index()==d[i]){
                            $(this).addClass("active");
                        }
                      }

                    })
                })
              }
          })
        }

});
