<?php declare(strict_types = 1);

namespace Drupal\speaker;

use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Entity\EntityListBuilder;

/**
 * Provides a list controller for the speaker profile entity type.
 */
final class SpeakerProfileListBuilder extends EntityListBuilder {

  /**
   * {@inheritdoc}
   */
  public function buildHeader(): array {
    $header['id'] = $this->t('ID');
    $header['name'] = $this->t('Name');
    $header['topics_of_expertise'] = $this->t('Topics Of Expertise');
    return $header + parent::buildHeader();
  }

  /**
   * {@inheritdoc}
   */
  public function buildRow(EntityInterface $entity): array {
    /** @var \Drupal\speaker\SpeakerProfileInterface $entity */
    $row['id'] = $entity->toLink();
    $row['name'] = $entity->get('name')->value;
    return $row + parent::buildRow($entity);
  }

  /**
   * {@inheritdoc}
   */
  public function render() {
    $build['form'] = \Drupal::formBuilder()->getForm('Drupal\speaker\Form\SpeakerProfileFilterForm');
    $build += parent::render();
    return $build;
  }

  /**
   * {@inheritdoc}
   */
  protected function getEntityIds() {
    $query = \Drupal::entityQuery('speaker_speaker_profile');
    $request = \Drupal::request();
  
    $name = $request->get('name') ?? 0;
    if ($name) {
      $query->condition('name', $name)
        ->accessCheck(TRUE);
    }
  
    $topic = $request->get('topic') ?? 0;
    if ($topic) {
      $query->condition('topics_of_expertise', $topic);
    }
  
    return $query->accessCheck(TRUE)->execute();
  }

}
