<?php declare(strict_types = 1);

namespace Drupal\speaker;

use Drupal\Core\Access\AccessResult;
use Drupal\Core\Entity\EntityAccessControlHandler;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Session\AccountInterface;

/**
 * Defines the access control handler for the speaker profile entity type.
 *
 * phpcs:disable Drupal.Arrays.Array.LongLineDeclaration
 *
 * @see https://www.drupal.org/project/coder/issues/3185082
 */
final class SpeakerProfileAccessControlHandler extends EntityAccessControlHandler {

  /**
   * {@inheritdoc}
   */
  protected function checkAccess(EntityInterface $entity, $operation, AccountInterface $account): AccessResult {
    return match($operation) {
      'view' => AccessResult::allowedIfHasPermissions($account, ['view speaker profile', 'administer speaker profile types'], 'OR'),
      'update' => AccessResult::allowedIfHasPermissions($account, ['edit speaker profile', 'administer speaker profile types'], 'OR'),
      'delete' => AccessResult::allowedIfHasPermissions($account, ['delete speaker profile', 'administer speaker profile types'], 'OR'),
      default => AccessResult::neutral(),
    };
  }

  /**
   * {@inheritdoc}
   */
  protected function checkCreateAccess(AccountInterface $account, array $context, $entity_bundle = NULL): AccessResult {
    return AccessResult::allowedIfHasPermissions($account, ['create speaker profile', 'administer speaker profile types'], 'OR');
  }

}
