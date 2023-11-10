<?php declare(strict_types = 1);

namespace Drupal\speaker\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\taxonomy\Entity\Vocabulary;

/**
 * Provides a Speaker form.
 */
final class SpeakerProfileFilterForm extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId(): string {
    return 'speaker_speaker_profile_filter';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $request = \Drupal::request();
    $names = $this->getNameOfEntity();
    $topics = $this->getTopicOfEntity();

  $form['filter'] = [
    '#type' => 'container',
    '#attributes' => [
      'class' => ['form--inline', 'clearfix'],
    ],
  ];

  $form['filter']['name'] = [
    '#type' => 'select',
    '#title' => $this->t('Name'),
    '#options' => $names,
    '#default_value' => $request->get('name') ?? 0,
  ];

  $form['filter']['topic'] = [
    '#type' => 'select',
    '#title' => $this->t('Topics'),
    '#options' => $topics,
    '#default_value' => $request->get('topic') ?? 0,
  ];

  $form['actions']['wrapper'] = [
    '#type' => 'container',
    '#attributes' => ['class' => ['form-item']],
  ];

  $form['actions']['wrapper']['submit'] = [
    '#type' => 'submit',
    '#value' => 'Filter',
  ];

  if ($request->getQueryString()) {
    $form['actions']['wrapper']['reset'] = [
      '#type' => 'submit',
      '#value' => 'Reset',
      '#submit' => ['::resetForm'],
    ];
  }

  return $form;
}

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state): void {
  }

  protected function getNameOfEntity(): array {
    $names = [];

    $storage = \Drupal::entityTypeManager()->getStorage('speaker_speaker_profile');
    $entities = $storage->loadMultiple();

    foreach($entities as $entity) {
      $names[$entity->name->value] = $entity->name->value;
    }
    return $names;
  }

  protected function getTopicOfEntity(): array {
    $topics = [];

    $vocabulary = Vocabulary::load('topics_of_expertise');

    $terms = \Drupal::entityTypeManager()->getStorage('taxonomy_term')
      ->loadTree($vocabulary->id());
   
    foreach($terms as $term) {
      $topics[$term->tid] = $term->name;
  }
  return $topics;
}

  
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $query = [];
  
    $name = $form_state->getValue('name') ?? 0;
    if ($name) {
      $query['name'] = $name;
    }
  
    $topic = $form_state->getValue('topic') ?? 0;
    if ($topic) {
      $query['topic'] = $topic;
    }
  
    $form_state->setRedirect('entity.speaker_speaker_profile.collection', $query);
  }
  
  public function resetForm(array $form, FormStateInterface &$form_state) {
    $form_state->setRedirect('entity.speaker_speaker_profile.collection');
  }

  /**
   * {@inheritdoc}
   */


}
