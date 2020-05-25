$( "#correo" ).submit(function( event ) {

 var parametros = $(this).serialize();
	 $.ajax({
			type: "POST",
			url: "controles/correo.php",
            data: parametros,
            beforeSend: function(){
				Swal.fire({
  position: 'center',
  title: 'Espere..',
  showConfirmButton: false,
  timer: 1500
})
			  },
			success: function(datos){
			Swal.fire({
                title: "Enviado",
                icon: 'success'         
           })
		  }
	});
  event.preventDefault();
})
