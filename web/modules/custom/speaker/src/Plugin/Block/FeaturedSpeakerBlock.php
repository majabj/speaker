<?php

namespace Drupal\speaker\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\taxonomy\Entity\Term;
use Drupal\Core\Render\Markup;
use Drupal\Core\Routing\CurrentRouteMatch;


/**
 * Provides Featured Speaker Block.
 * @Block(
 * id = "featured_profile_block",
 * admin_label = @Translation("Featured Speaker Block"),
 * category = @Translation("Example of Featured Speaker Block"))
 */

 class FeaturedSpeakerBlock extends BlockBase {
    /**
     * {@inheritDoc}
     */
   public function build() {
     $entity_type_id = 'speaker_speaker_profile'; // Replace with your custom entity type machine name.
 
     $entity_ids = \Drupal::entityTypeManager()
       ->getStorage($entity_type_id)
       ->getQuery()
       ->accessCheck(true)
       ->execute();
 
     if (!empty($entity_ids)) {
       $random_entity_id = array_rand($entity_ids);
       $random_entity = \Drupal::entityTypeManager()
         ->getStorage($entity_type_id)
         ->load($random_entity_id);
 
         $file_path = 'http://localhost/speaker/web/sites/default/files/2023-11/Jupiter-4k_0.png';
       // Build render array for the block.
       $build = [
         '#markup' => Markup::create('<div class="random-speaker-profile-block">' .
           '<h2>' . $random_entity->label() . '</h2>' .
 
           ($random_entity->hasField('portrait') && !empty($random_entity->portrait->entity->getFileUri()) ? '<img src="' . $file_path . '" alt="' . $random_entity->portrait->alt . '" />' : '') .
 
           ($random_entity->hasField('name') ? '<p>Name: ' . $random_entity->name->value . '</p>' : '') .
 
           ($random_entity->hasField('topics_of_expertise') ? '<p>Topic of expertise: ' . $random_entity->topics_of_expertise->entity->getName() . '</p>' : '') .
 
           '</div>'),
           '#cache' => [
            'max-age' => 0,

           ]
       ];
       $variables = [
        'content' => 'Hello, this is custom block content!',
      ];
     } else {
       // No entities found.
       $build = [];
     }
 
     return [
        '#theme' => 'my_custom_block',
        '#random_entity' => $random_entity,
        '#cache' => [
            'max-age' => 0,],
        ];
   }
 }
 