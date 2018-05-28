(function ($, Drupal) {
  'use stric';//esto es para hacer que todas las variabels sean definidas
  Drupal.behaviors.demo_modulo = {
    attach: function (context, settings) {
      $('#accordion').accordion();
    }
  };
})(jQuery, Drupal);
