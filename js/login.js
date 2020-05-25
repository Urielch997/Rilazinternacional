$('#login').submit(function (e){
    e.preventDefault();
    var datos= $(this).serializeArray();
    $.ajax({
      data:datos,
      type:"POST",
      url:"controles/acceso.php",
      beforeSend:function(){
        $("#singin").attr("disabled",true).html("Iniciando...");
      }

    }).done(function (valor){
      $("#singin").attr("disabled",false).html("Iniciar");
      let msj = JSON.parse(valor);
      if(msj.mensaje == "ok"){
          location.href="Views/Publicaciones";
      }else{
        swal("Error", msj.mensaje, "error")
      }
    })
})
