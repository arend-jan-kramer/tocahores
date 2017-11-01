
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

 require('./jquery');
 require('./bootstrap');

// window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Vue.component('example', require('./components/Example.vue'));
//
// const app = new Vue({
//     el: '#app'
// });


(function($){
  var delay = 5000;
  // var delay = 30000;
  var url = "http://project.tocahores/";
  var t;

  // if(window.location.href != url) {
  //   t = setTimeout(function(){
  //     window.location.href = url;
  //   }, delay);
  //
  //   $(this).mousemove(function(){
  //   clearTimeout(t);
  //     t = setTimeout(function(){
  //       window.location.href = url;
  //     }, delay);
  //   });
  // }

  $('#datum, input').on('keyup',function(){
    var d = new Date();

    var birth = new Date($(this).val());

    d.setFullYear(d.getFullYear() - 14);

    if(d.getFullYear() < birth.getFullYear() ){
      $('option[value=4]').show();
    }else {
      $('option[value=4]').hide();
    }
    // console.log(d.getFullYear(), birth.getFullYear() );
  });

  $('#autofill input, #autofill textarea').on('keypress click', function(e){
    if(e.shiftKey && $(this).val().length == 0){
      switch($(this).attr('name')){
        case 'inp_first_name':
        $(this).val('Mikel');
        break;
        case 'inp_last_name':
        $(this).val('Medhurst');
        break;
        case 'inp_date_of_birth':
        $(this).val('8-18-1995');
        break;
        case 'inp_address':
        $(this).val('Carnissesingel');
        break;
        case 'inp_city':
        $(this).val('Rotterdam');
        break;
        case 'inp_reason':
        $(this).val('Dit is een standaard reden voor de opnamen.');
        break;
      }
    }
  });
  $('.radiobutton input').on('click', function(){
    // var id = $(this).val();
    // console.log($(this).val());
    $.get('/get/dossier/'+$(this).val(), function(data){
      $.each( data.patient, function( key, value ) {
        $('#popup #'+key).html(value);
        // console.log(key+' '+value);
      });
      $.each( data.dossier, function( key, value ) {
        $('#popup #'+key).html(value);
        // console.log(key+' '+value);
      });
      $('#popup #removepatiendossier').val(data.patient.id);
      $('#popup').modal('show');
    });
  });

  $('#dossier_id').on('change', function(){
    // console.log($('option:selected').attr('class'));
    // console.log($(this).val());
    // console.log($('.getName').val());
    if($('option:selected').attr('class') !== undefined){
      $.get('/dossier/'+$('.getName').val()+'/'+$(this).val(), function(data){
        $('.group .description').val(data.description).prop( "disabled", true ).addClass('lock');
      });
    } else {
      $('.group .description').val('').prop( "disabled", false ).removeClass('lock');
    }
  });
})(jQuery);
