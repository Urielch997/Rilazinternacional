$( document ).ready(function() {
    ajax(0,1,"Lexmark",0);
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
  ajax(mfp,1,"Lexmark",estado);
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


function ajax(valor,page,tipo,estado){
    tipo='Lexmark';
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
