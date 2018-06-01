<?php

namespace Drupal\demo_modulo\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormBuilder;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Provides a 'SubscriptionBlock' block.
 *
 * @Block(
 *  id = "subscription_block",
 *  admin_label = @Translation("Subscription"),
 * )
 */
class SubscriptionBlock extends BlockBase implements ContainerFactoryPluginInterface {

  protected $form_builder;
  /**
   * SubscriptionBlock constructor.
   * @param array $configuration
   * @param $plugin_id
   * @param $plugin_definition
   */
  public function __construct(array $configuration, $plugin_id, $plugin_definition, FormBuilder $form_builder)
  {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
    $this->form_builder = $form_builder;
  }

  /**
   * @param ContainerInterface $container
   * @param array $configuration
   * @param string $plugin_id
   * @param mixed $plugin_definition
   * @return ContainerFactoryPluginInterface|void
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition)
  {
    // TODO: Implement create() method.
    return new static($configuration, $plugin_id, $plugin_definition, $container->get('form_builder'));
  }

  /**
   * {@inheritdoc}
   */
  public function build() {
    $build = [];
    $form = $this->form_builder->getForm('Drupal\demo_modulo\Form\SubscriptionForm');
    //$email = $config->get('email');

    $build['subscription_block']= $form;

    return $build;
  }

}
