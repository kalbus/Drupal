(function ($, Drupal) {

  'use strict';

  Drupal.behaviors.tema_custom = {
    attach: function () {
      //todos los sscript que queramos llamar, los vamos a llamar aqui
      alert('Hola tema custom');
    }
  }
})(jQuery, Drupal);
