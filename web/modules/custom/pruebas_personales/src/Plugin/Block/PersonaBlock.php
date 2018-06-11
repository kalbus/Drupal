<?php

namespace Drupal\pruebas_personales\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Provides a 'PersonaBlock' block.
 *
 * @Block(
 *  id = "persona_block",
 *  admin_label = @Translation("Persona block"),
 * )
 */
class PersonaBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function defaultConfiguration() {
    return [
            'correo_personal' => 'example@gmail.com',
                        'seleccion_de_personas' => 'geniales',
          ] + parent::defaultConfiguration();
  }

  /**
   * {@inheritdoc}
   */
  public function blockForm($form, FormStateInterface $form_state) {
    $form['correo_personal'] = [
      '#type' => 'email',
      '#title' => $this->t('Correo personal'),
    '#description' => $this->t('Digite su correo personal'),
      '#default_value' => $this->configuration['correo_personal'],
      '#weight' => '0',
    ];
    $form['nombre_de_la_persona'] = [
      '#type' => 'text',
      '#title' => $this->t('Nombre de la persona'),
    '#description' => $this->t('Digite el nombre de la persona'),
      '#default_value' => $this->configuration['nombre_de_la_persona'],
      '#weight' => '0',
    ];
    $form['seleccion_de_personas'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Seleccion de personas'),
    '#description' => $this->t('seleccionar personas'),
      '#default_value' => $this->configuration['seleccion_de_personas'],
      '#weight' => '0',
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function blockSubmit($form, FormStateInterface $form_state) {
    $this->configuration['correo_personal'] = $form_state->getValue('correo_personal');
    $this->configuration['nombre_de_la_persona'] = $form_state->getValue('nombre_de_la_persona');
    $this->configuration['seleccion_de_personas'] = $form_state->getValue('seleccion_de_personas');
  }

  /**
   * {@inheritdoc}
   */
  public function build() {
    $build = [];
    $build['persona_block_correo_personal']['#markup'] = '<p>' . $this->configuration['correo_personal'] . '</p>';
    $build['persona_block_nombre_de_la_persona']['#markup'] = '<p>' . $this->configuration['nombre_de_la_persona'] . '</p>';
    $build['persona_block_seleccion_de_personas']['#markup'] = '<p>' . $this->configuration['seleccion_de_personas'] . '</p>';

    return $build;
  }

}
