<?php

namespace Drupal\bloques_de_prueba\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'bloques_de_prueba' block.
 *
 * @Block(
 *  id = "bloques_de_prueba",
 *  admin_label = @Translation("Bloque de prueba"),
 * )
 */
class bloques_de_prueba extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $build = [];

    $idUsuario = \Drupal::currentUser()->id();
    //ksm($idUsuario);// imprime la variable en la pantalla
    $account= \Drupal\user\Entity\User::load($idUsuario);
    //dsm($account);

    $nombreUsuario = $account->get('name')->value;
    dsm($nombreUsuario);
    $build['bloques_de_prueba']=[
      '#markup' =>$this->t('Hola @admin pura vida!',
        [
          '@admin'=>$nombreUsuario
        ])
    ];

    return $build;
  }

}
