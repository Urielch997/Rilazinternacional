$( document ).ready(function() {
  if(document.getElementById("portafolio")){
        ajax(0,1,"Toshiba",0);
  }else{
        tablaequip(1);
  }

});

var mfp,estado = 0;

$('input[type="checkbox"]').on('change', function(e){
    fill();
})

function fill(){
   if(document.getElementById("checkbox").checked==1){
      mfp=0;
  }else if(document.getElementById("checkbox2").checked==1){
      mfp=1;
  }else if(document.getElementById("checkbox3").checked==1){
      mfp=2;
  }else{
    mfp=0;
  }

  if(document.getElementById("estado").checked == 1){
    estado=1;
  }else if(document.getElementById("estado2").checked == 1){
    estado=2;
  }else{
    estado=0;
  }
  ajax(mfp,1,"Toshiba",estado);
}


$("#checkbox").click(function(){
   document.getElementById("checkbox2").checked = 0;
   document.getElementById("checkbox3").checked = 0;
});

$("#checkbox2").click(function(){
   document.getElementById("checkbox").checked = 0;
   document.getElementById("checkbox3").checked = 0;
});

$("#checkbox3").click(function(){
   document.getElementById("checkbox2").checked = 0;
   document.getElementById("checkbox").checked = 0;
});



$("#estado").click(function(){
  var estado = document.getElementById("estado");
   document.getElementById("estado2").checked = 0;
});

$("#estado2").click(function(){
  document.getElementById("estado").checked = 0;
});


if(document.getElementById("portafolio")){

function ajax(valor,page,tipo,estado){
  tipo="Toshiba";
        $.ajax({
                data: {valor1:valor,page1:page,tipo1:tipo,estado1:estado},
                method:"GET",
				url:'controles/mostrarequipos.php',
				 beforeSend: function(valor1){
				 $('#cont2').html('<div class="carga"><img src="img/pro.gif">Cargando...</div>');
			  },
				success:function(valor1){
					$("#cont2").html(valor1).fadeIn(6000);
				}
			})
}
}

function tablaequip(page){
        $.ajax({
                data: {page1:page},
                method:"GET",
				url:'../controles/mostrarTabla.php',
        beforeSend:function(){
          $("#hola").html("<img src='../Views/img/preload-equip.gif'/>")
        },
				success:function(page1){
					$("#hola").html(page1).fadeIn(6000);
				}
			})
}

function eliminar(id){
     var tabla = "equipos";
        $.ajax({
        data:{id1:id,tabla1:tabla},
        method:"GET",
        url:"../controles/eliminar.php",
        success:function(data){
            Swal("Eliminado!","Articulo eliminado.","success")
            $("#hola").html(tablaequip(1));
        }
        })
}

function sweetdel(id){
  swal({
    title: "¿Estas seguro?",
    text: "Esta accion no se puede revertir!",
    type: "warning",
    showCancelButton: true,
    confirmButtonClass: "btn-danger",
    confirmButtonText: "Eliminar!",
    closeOnConfirm: false
  }).then((result) => {
  if (result.value) {
        eliminar(id);
  }
})

}

$("#form").submit(function( event ) {
  $('#guardar').attr("disabled", true);

 var parametros = $(this).serializeArray();
 var imagen = new FormData($("#form")[0]);

 $.each(parametros,function(key,input){
 	imagen.append(input.name,input.value);
 });
	 $.ajax({
			type: "POST",
			url: "../controles/uploadequipos.php",
			data: imagen,
			contentType: false,       // The content type used when sending data to the server.
			cache: false,             // To unable request pages to be cached
			processData:false,
			success: function(datos){
          let msj = JSON.parse(datos);
          console.log(msj)
          if(msj.Mensaje == "Datos registrados!"){
            swal("Exito!",msj.Mensaje, "success")
          }else{
            swal("Error", msj.Mensaje, "error")
          }

      $("#hola").html(tablaequip(1));
      $("#form")[0].reset();
			$('#guardar').attr("disabled", false);
		  }
	});
  event.preventDefault();
})

$( "#correo" ).submit(function( event ) {
  $('#enviar').attr("disabled", true);

 var parametros = $(this).serializeArray();
 var imagen = new FormData($("#correo")[0]);

 $.each(parametros,function(key,input){
 	imagen.append(input.name,input.value);
 });
	 $.ajax({
			type: "POST",
			url: "controles/email.php",
			data: imagen,
			contentType: false,       // The content type used when sending data to the server.
			cache: false,             // To unable request pages to be cached
			processData:false,
			success: function(datos){
			swal("Error", datos, "error")
      $("body").html(tablaequip(1));
			$('#enviar').attr("disabled", false);
		  }
	});
  event.preventDefault();
})


function sweetdelvar(){
  swal({
    title: "¿Estas seguro?",
    text: "Eliminar varios articulos!",
    type: "warning",
    showCancelButton: true,
    confirmButtonClass: "btn-danger",
    confirmButtonText: "Eliminar!",
    closeOnConfirm: false
  }).then((result) => {
  if (result.value) {
    let check = new Array();
    $("input:checkbox:checked").each(function(){
      check.push($(this).val());
    })
    eliminarVar(check);
  }
})
}

function eliminarVar(check){
  $.ajax({
    url:"../controles/delequipvar.php",
    type:"POST",
    data:{ids:check},
    success:function(datos){
      Swal("Eliminados!","Se han eliminado los articulos.","success")
      $("#hola").html(tablaequip(1));
    }
  })
}
