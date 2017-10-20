
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
  $('#datum, input, textarea').on('keyup, click',function(){
    var d = new Date();

    var birth = new Date($(this).val());

    d.setFullYear(d.getFullYear() - 14);

    if(d.getFullYear() >= birth.getFullYear() ){
      $('option[value=4]').show();
    }else {
      $('option[value=4]').hide();
    }
  });
  $('#autofill input, #autofill textarea').on('keypress click',function(e){
    if(e.shiftKey){
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
  $('.radiobutton input').on('click', function() {
    $.get('/dossier/'+$(this).val(), function(data){
      console.log(data[1]);
      $('#popup #first_name').html(data[1].first_name);
      $('#popup #last_name').html(data[1].last_name);
      $('#popup #address').html(data[1].address);
      $('#popup #address_number').html(data[1].address_number);
      $('#popup #city').html(data[1].city);
      $('#popup #description').html(data[0][0].description);
      $('#popup').modal('show');
    });
  });
})(jQuery);
