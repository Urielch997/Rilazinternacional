$("#publicacion").submit(function(e){
      e.preventDefault();
      var messageLength = CKEDITOR.instances['ckeditor'].getData().replace(/<[^>]*>/gi, '').length;
      if($("#titulo").val() == ""){
        swal("Error","Debe escribir un titulo para la publicacion","error");
      }else if($("#footer").val() == ""){
        swal("Error","Debe escribir un pie de contenido","error");
      }else if($("#imagen").val() < 1){
        swal("Error","Ingrese una foto de portada para el articulo","error");
      }else if(!messageLength){
        swal("Error","Escriba un articulo","error");
      }else{
      
      for ( instance in CKEDITOR.instances )
       {
         CKEDITOR.instances[instance].updateElement();
         var parametros = $(this).serializeArray();
         var imagen = new FormData($("#publicacion")[0]);

         $.each(parametros,function(key,input){
          imagen.append(input.name,input.value);
         });
      $.ajax({
        data:imagen,
        url:"../controles/nuevaPublicacion.php",
        type:"POST",
        contentType: false,       // The content type used when sending data to the server.
        cache: false,             // To unable request pages to be cached
        processData:false,
        success:function(data){
            var id = data;
            swal({
              title: "Publicado",
              text: "Se ha publicado el articulo",
              type: "success",
              showCancelButton: true,
              confirmButtonClass: "btn-primary",
              confirmButtonText: "Ver publicacion",
              closeOnConfirm: false
            }).then((result) => {
            if (result.value) {
              location.href="viewPublication.php?idPublicacion=" + id;
            }
          })

          //asdadsaad
        }
      })
    }
  }
})
