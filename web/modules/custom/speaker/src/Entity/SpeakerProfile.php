<?php declare(strict_types = 1);

namespace Drupal\speaker\Entity;

use Drupal\Core\Entity\RevisionableContentEntityBase;
use Drupal\speaker\SpeakerProfileInterface;
use Drupal\Core\Field\BaseFieldDefinition;
use Drupal\Core\Entity\EntityTypeInterface;

/**
 * Defines the speaker profile entity class.
 *
 * @ContentEntityType(
 *   id = "speaker_speaker_profile",
 *   label = @Translation("Speaker Profile"),
 *   label_collection = @Translation("Speaker Profiles"),
 *   label_singular = @Translation("speaker profile"),
 *   label_plural = @Translation("speaker profiles"),
 *   label_count = @PluralTranslation(
 *     singular = "@count speaker profiles",
 *     plural = "@count speaker profiles",
 *   ),
 *   handlers = {
 *     "list_builder" = "Drupal\speaker\SpeakerProfileListBuilder",
 *     "views_data" = "Drupal\views\EntityViewsData",
 *     "access" = "Drupal\speaker\SpeakerProfileAccessControlHandler",
 *     "form" = {
 *       "add" = "Drupal\speaker\Form\SpeakerProfileForm",
 *       "edit" = "Drupal\speaker\Form\SpeakerProfileForm",
 *       "delete" = "Drupal\Core\Entity\ContentEntityDeleteForm",
 *       "delete-multiple-confirm" = "Drupal\Core\Entity\Form\DeleteMultipleForm",
 *     },
 *     "route_provider" = {
 *       "html" = "Drupal\Core\Entity\Routing\AdminHtmlRouteProvider",
 *     },
 *   },
 *   base_table = "speaker_speaker_profile",
 *   data_table = "speaker_speaker_profile_field_data",
 *   revision_table = "speaker_speaker_profile_revision",
 *   revision_data_table = "speaker_speaker_profile_field_revision",
 *   show_revision_ui = TRUE,
 *   translatable = TRUE,
 *   admin_permission = "administer speaker profiles",
 *   entity_keys = {
 *     "id" = "id",
 *     "revision" = "revision_id",
 *     "langcode" = "langcode",
 *     "label" = "id",
 *     "uuid" = "uuid",
 *   },
 *   revision_metadata_keys = {
 *     "revision_log_message" = "revision_log",
 *     "revision_user" = "revision_user",
 *     "revision_created" = "revision_created",
 *   },
 *   links = {
 *     "collection" = "/admin/content/speaker-profile",
 *     "add-form" = "/speaker-profile/add",
 *     "canonical" = "/speaker-profile/{speaker_speaker_profile}",
 *     "edit-form" = "/speaker-profile/{speaker_speaker_profile}/edit",
 *     "delete-form" = "/speaker-profile/{speaker_speaker_profile}/delete",
 *     "delete-multiple-form" = "/admin/content/speaker-profile/delete-multiple",
 *   },
 *   field_ui_base_route = "entity.speaker_speaker_profile.settings",
 * )
 */
final class SpeakerProfile extends RevisionableContentEntityBase implements SpeakerProfileInterface {

    public static function baseFieldDefinitions(EntityTypeInterface $entity_type): array {
        $fields = parent::baseFieldDefinitions($entity_type);
        
        $fields['name'] = BaseFieldDefinition::create('string')
          ->setTranslatable(TRUE)
          ->setRevisionable(TRUE)
          ->setLabel(t('Name'))
          ->setRequired(TRUE)
          ->setSetting('max_length', 255)
          ->setDisplayOptions('form', [
            'type' => 'string_textfield',
            'weight' => -5,
          ])
          ->setDisplayConfigurable('form', TRUE)
          ->setDisplayOptions('view', [
            'label' => 'hidden',
            'type' => 'string',
            'weight' => -5,
          ])
          ->setDisplayConfigurable('view', TRUE);
    
        $fields['biography'] = BaseFieldDefinition::create('text_long')
        ->setTranslatable(TRUE)
        ->setRevisionable(TRUE)
        ->setLabel(t('Biography'))
        ->setDisplayOptions('form', [
          'type' => 'text_textarea',
          'weight' => 10,
        ])
        ->setDisplayConfigurable('form', TRUE)
        ->setDisplayOptions('view', [
          'type' => 'text_default',
          'label' => 'above',
          'weight' => 10,
        ])
        ->setDisplayConfigurable('view', TRUE);
    
        $fields['topics_of_expertise'] = BaseFieldDefinition::create('entity_reference')
        ->setTranslatable(TRUE)
        ->setRevisionable(TRUE)
        ->setLabel(t('Topics of Expertise'))
        ->setSetting('target_type', 'taxonomy_term')
        ->setSetting('handler', 'default:taxonomy_term')
        ->setSetting('handler_settings',
        ['target_bundles' => [
            'topics_of_expertise' => 'topics_of_expertise']]
        )
        ->setDisplayOptions('form', [
          'type' => 'entity_reference_autocomplete',
          'settings' => [
            'match_operator' => 'CONTAINS',
            'size' => 60,
            'autocomplete_type' => 'tags',
            'placeholder' => '',
          ],
          'weight' => 15,
        ])
        ->setDisplayConfigurable('form', TRUE)
        ->setDisplayOptions('view', [
          'label' => 'above',
          'type' => 'author',
          'weight' => 15,
        ])
        ->setDisplayConfigurable('view', TRUE);
    
        $fields['portrait'] = BaseFieldDefinition::create('image')
        ->setTranslatable(TRUE)
        ->setRevisionable(TRUE)
        ->setLabel(t('Portrait'))
        ->setDisplayOptions('view', [
        'label'   => 'above',
        'type'    => 'image',
        'weight'  => 0,
        ])
        ->setDisplayOptions('form', [
        'type'    => 'image_image',
        'weight'  => 0,
        ]);
        return $fields;
    
      }

}
