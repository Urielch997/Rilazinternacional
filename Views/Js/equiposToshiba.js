 $(document).ready(function () {
      $('#equipos2').hide();
      $('#equipos3').hide();
      $('#pagina1').addClass('active btn-primary');
      //$('#equipos1').hide();
      $('#pagina1').click(function () {
        $('#equipos2').hide(500);
        $('#equipos3').hide(500);
        $('#equipos1').show(500);
         //añadiendo clase de selccion
        $('#pagina1').addClass('active btn-primary');
        //removiendo clase de seleccion 
        $('#pagina2').removeClass('active btn-primary');
        $('#pagina3').removeClass('active btn-primary');
      });
      $('#pagina2').click(function () {
        $('#equipos1').hide(500);
        $('#equipos3').hide(500);
        $('#equipos2').show(500);
        //removiendo clase de seleccion 
        $('#pagina1').removeClass('active btn-primary');
        $('#pagina3').removeClass('active btn-primary');
        //añadiendo clase de selccion
        $('#pagina2').addClass('active btn-primary');
      });
      $('#pagina3').click(function () {
        $('#equipos1').hide(500);
        $('#equipos2').hide(500);
        $('#equipos3').show(500);
         //removiendo  clase de selccion
        $('#pagina1').removeClass('active btn-primary');
        $('#pagina2').removeClass('active btn-primary');
         //añadiendo clase de selccion
        $('#pagina3').addClass('active btn-primary');
      });
    });