<?php
/**
 * Created by PhpStorm.
 * User: katip
 * Date: 28/5/2018
 * Time: 08:36
 */
//Drupal\nombredelmodulo\controller
namespace Drupal\demo_modulo\Controller;
use Drupal\Core\Controller\ControllerBase;

class EjemploModulosController extends ControllerBase
{
  /**
   * @return array
   */
  public  function testDemo(){
    $items = [
      [
        'title' => 'Hola gente',
        'description' => 'Esta es una prueba de testDemo llamando al tema parte 1',
        'hola' => 'Hola mundo'
      ],
      [
        'title' => 'Hola gente 2',
        'description' => 'Esta es la prueba #2 de testDemo llamando al tema parte 2',
        'hola' => 'Hola mundo 2'
      ],
      [
        'title' => 'Hola gente 3',
        'description' => 'Esta es la prueba #2 de testDemo llamando al tema parte 3',
        'hola' => 'Hola mundo 3'
      ]
    ];
    $build = [
      //markup es lo que se va a imprimir en pantalla
      'items' => [
      ],
      '#prefix' => '<div id="accordion" class="container">',
      '#suffix' => '</div>',
      '#attached' => [
        'library' => [
          'core/jquery.ui.accordion',
          'demo_modulo/demo_modulo.accordion'
        ]
      ]
    ];

    foreach ($items as $item){
      $build['items'][] = [
        '#theme' => 'demo_modulo',
        '#title' => $item['title'],
        '#description' => $item['description']
      ];
    }

    return $build;
  }
}
