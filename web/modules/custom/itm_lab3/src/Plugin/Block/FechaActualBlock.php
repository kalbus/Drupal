<?php

namespace Drupal\itm_lab3\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'FechaActualBlock' block.
 *
 * @Block(
 *  id = "fecha_actual_block",
 *  admin_label = @Translation("Fecha actual"),
 * )
 */
class FechaActualBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  //sirve
  function format_date($timestamp, $type = 'medium', $format = '', $timezone = NULL, $langcode = NULL) {
    return \Drupal::service('date.formatter')
      ->format($timestamp, $type, $format, $timezone, $langcode);
  }

  public function build() {
    $build = [];

    $request_time = \Drupal::time()->getRequestTime();
    $formato = $this->format_date($request_time, $type = 'long', $format = '', $timezone = NULL, $langcode = NULL);
    $build['fecha_actual_block']=
      [
        '#markup' => $this->t('La fecha actual es : @fecha',
          ['@fecha' => $formato]
        )
      ];

    return $build;
  }

}
