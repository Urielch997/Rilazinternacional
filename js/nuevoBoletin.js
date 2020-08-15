$("#boletin").submit(function(e){
    e.preventDefault();
    var messageLength = CKEDITOR.instances['ckeditor'].getData().replace(/<[^>]*>/gi, '').length;
    if($("#titulo").val() == ""){
      swal("Error","Debe escribir un titulo para el boletin","error");
    }else if( !messageLength){
      swal("Error","Debe escribir un boletin","error");
    }else{
    for ( instance in CKEDITOR.instances )
     {
       CKEDITOR.instances[instance].updateElement();
       var parametros = $(this).serializeArray();
       $('#prueba').html(parametros);
    $.ajax({
      data:parametros,
      url:"../controles/nuevoBoletin.php",
      type:"POST",
      success:function(data){
          var id = data;
          swal({
            title: "Publicado",
            text: "Se ha publicado el boletin",
            type: "success",
            showCancelButton: true,
            confirmButtonClass: "btn-primary",
            confirmButtonText: "Ver publicacion",
          }).then((result) => {
          if (result.value) {
            location.href="viewBoletin.php?idbol=" + id;
          }
        })
      }
    })
  }
}
})
