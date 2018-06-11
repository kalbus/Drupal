<?php

namespace Drupal\itm_lab3\Plugin\Field\FieldFormatter;

use Drupal\Component\Utility\Html;
use Drupal\Core\Field\FieldItemInterface;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\FormatterBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Plugin implementation of the 'bandera_field_formatter' formatter.
 *
 * @FieldFormatter(
 *   id = "bandera_field_formatter",
 *   label = @Translation("Bandera field formatter"),
 *   field_types = {
 *     "pais_field_type"
 *   }
 * )
 */
class BanderaFieldFormatter extends FormatterBase {

  /**
   * {@inheritdoc}
   */
  public static function defaultSettings() {
    return [
      // Implement default settings.
    ] + parent::defaultSettings();
  }

  /**
   * {@inheritdoc}
   */
  public function settingsForm(array $form, FormStateInterface $form_state) {
    return [
      // Implement settings form.
    ] + parent::settingsForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function settingsSummary() {
    $summary = [];
    // Implement settings summary.

    return $summary;
  }

  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode) {
    $elements = [];

    $elements['#attached']['library'][] = 'itm_lab3/itm_lab3.flags';

    foreach ($items as $delta => $item) {

      $elements[$delta] = [
        '#markup' => $this->viewValue($item)
      ];

    }

    return $elements;
  }

  /**
   * Generate the output appropriate for one field item.
   *
   * @param \Drupal\Core\Field\FieldItemInterface $item
   *   One field item.
   *
   * @return string
   *   The textual output generated.
   */
  protected function viewValue(FieldItemInterface $item) {
    // The text value has no text format assigned to it, so the user input
    // should equal the output, including newlines.
    $lista = \Drupal::service('country_manager')-> getList();
    $nombre_pais = $lista[$item->value];
    $paisLowerCase = strtolower($item->value);
    $spanInicial = "<span class='flag-icon flag-icon-";
    $spanFinal = "'></span>";

    return $spanInicial . $paisLowerCase . $spanFinal .$nombre_pais;

    //return nl2br(Html::escape($item->value));
  }

}
