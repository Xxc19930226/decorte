<?php

/**
 * User form.
 *
 * @package    form
 * @subpackage User
 * @version    SVN: $Id: UserForm.class.php 12 2011-05-12 03:42:19Z oda $
 */
class UserForm extends BaseUserForm
{
  public function configure()
  {
    $profileForm = new ProfileForm($this->object->getProfile());
    unset($profileForm['id'], $profileForm['user_id']);

    $this->embedForm('Profile', $profileForm);
  }
}