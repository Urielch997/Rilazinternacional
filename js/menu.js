$(document).ready(main);

var contador = 1;

function main () {
	$('.icon-menu').click(function(){
		if (contador == 1) {
			$('.menudes').animate({
				left: '0'
			});
			contador = 0;
		} else {
			contador = 1;
			$('.menudes').animate({
				left: '-100%'
			});
		}
	});

	// Mostramos y ocultamos submenus
	$('.submenu').click(function(){
		$(this).children('.children').slideToggle();
	});
}

$("#lista").hover(function(){
   $("#menu").css("height","400px")
    $("#menu2").css("height","0")
},function(){
   $("#menu").hover(function(){
        $("#menu").css("height","400px")},function(){
            $("#menu").css("height","0")
        }
   )
});


$("#lista2").hover(function(){
   $("#menu2").css("height","400px")
    $("#menu").css("height","0")
},function(){
   $("#menu2").hover(function(){
        $("#menu2").css("height","400px")},function(){
            $("#menu2").css("height","0")
        }
   )
});

$('#audit').hover(function(){
        $("#list").css("height","100px")
        $("#list2").css("height","0")
		$("#list3").css("height","0")
},function(){
        $("#list").css("height","0")}
);

$('#gest').hover(function(){
        $("#list2").css("height","100px");
        $("#list").css("height","0")
		$("#list3").css("height","0")
},function(){
        $("#list2").css("height","0");
});

$('#toshi').hover(function(){
        $("#list3").css("height","200px")
        $("#list2").css("height","0");
        $("#list").css("height","0")
},function(){
             $("#list3").css("height","0")
});

$('#lex').hover(function(){
        $("#list4").css("height","100px")
        $("#list2").css("height","0");
        $("#list").css("height","0")
},function(){
        $("#list4").css("height","0")
});


/**Menu de videos */
$('.listado-video').click(function(){
	$(this).children('.children').slideToggle();
});

$('#lexmark').hover(function(){
  $('#info-lex').css('display','flex');
  $('#info-toshi').css('display','none');
},function(){
  $('#toshiba').hover(function(){
    $('#info-lex').css('display','none');
    $('#info-toshi').css('display','flex');
  });
});
