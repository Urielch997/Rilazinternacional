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

        $(".list-menu").each(function(e){
            $(this).children().click(function(e){
              e.preventDefault();
              var usuario = $("#usuario").val();
              var tipous = $("#tipousuario").val();
              let child = $(this);
              var tipousu = $('#portipo');
              var usu = $("#porusuario");
              if(usu.prop('checked')){
                $.ajax({
                  url:"../controles/restriccionesMenu.php",
                  data:{"id":usuario,"seccion":child.index(),"inst":1},
                  type:"POST",
                  success:function(){
                    selectUser(usuario);
                  }
                })
              }else if(tipousu.prop('checked')){
                limpiarAvisos();
                $.ajax({
                  url:"../controles/restriccionesMenu.php",
                  data:{"id":tipous,"seccion":child.index(),"inst":3},
                  type:"POST",
                  success:function(){ 
                    porTipo(tipous);
                  }
                }) 
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
                        ViewRestric(datos);
                    }
                  })
        }




       function ViewRestric(datos){
          let d = JSON.parse(datos);
          var numOb =  Object.keys(d).length;
          console.log(d);
          $(".list-menu").each(function(){
              let child = $(this).children();
              child.removeClass("active");
              child.each(function(){
                for (var i = 0; i < numOb; i++) {
                if(d != "NO"){
                  if($(this).index()==d[i]){
                      $(this).addClass("active");
                  }
                }
                }

              })
          })
        }

        $("#tipousuario").attr("disabled",true);
        $('input[type="radio"]').on('change', this, function(){
          var tipousu = $('#portipo');
          var usu = $("#porusuario");
            if(usu.prop('checked')){
                limpiarAvisos();
                selectUser($("#usuario").val());
                $("#tipousuario").attr("disabled",true);
                $("#usuario").attr("disabled",false);
            }else{
                limpiarAvisos();
                porTipo($("#tipousuario").val());
                $("#usuario").attr("disabled",true);
                $("#tipousuario").attr("disabled",false);
            }
        });

        $("#tipousuario").change(function(){
            var id = $(this).val();
            limpiarAvisos();
            porTipo(id);
        });

        function limpiarAvisos(){
          $(".list-menu").each(function(e){
            let child = $(this).children();
            child.each(function(){ 
                $(this).find("#count").remove();
            })
          })
        }

        function porTipo(id){
          $.ajax({
              data:{"id":id,"sru":3},
              type:"POST",
              url:"../controles/restriccionesMenu.php",
              success:function(datos){
                let data = JSON.parse(datos);
                console.log(data);
                var numOb = Object.keys(data["Tablas"]).length;
                var tabal = Array();
                for(var i = 0;  i<numOb; i++){
                   tabal.push(data["Tablas"][i]);
                }
                Array.prototype.sortNumbers = function(){
                  return this.sort(
                      function(a,b){
                          return a - b
                      }
                  );
              }
              console.log(tabal.sortNumbers());
                var ctn = 0;
                var table;
                $(".list-menu").each(function(e){
                  let child = $(this).children();
                  child.removeClass("active");
                  child.each(function(){ 
                      for (var i = 0; i < numOb; i++) {
                          if($(this).index() == tabal[i]){
                                if(table == tabal[i] || table == null){
                                  ctn += 1;
                                  table = tabal[i];
                                  console.log(ctn);
                                }else{
                                  ctn = 1;
                                  table = tabal[i];
                                }
                              $(this).find("label").remove();
                              $(this).append("<label class='badge badge-primary badge-pill' id='count'>"+ctn+"</label>");
                              if(ctn == data["count"]){
                                $(this).addClass("active");
                              }
                           }
                      }
                      
                  })
                })
            }
          })
}

});
