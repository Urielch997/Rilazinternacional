$("#publicacion").submit(function(e){
      e.preventDefault();
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
            alert(id);
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
})
