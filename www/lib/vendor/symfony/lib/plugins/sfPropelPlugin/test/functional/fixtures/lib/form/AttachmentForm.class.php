<?php

/**
 * Attachment form.
 *
 * @package    form
 * @subpackage attachment
 * @version    SVN: $Id: AttachmentForm.class.php 12 2011-05-12 03:42:19Z oda $
 */
class AttachmentForm extends BaseAttachmentForm
{
  public function configure()
  {
    $this->widgetSchema['file'] = new sfWidgetFormInputFile();
    $this->validatorSchema['file'] = new sfValidatorFile(array(
      'path' => sfConfig::get('sf_cache_dir'),
      'mime_type_guessers' => array(),
    ));
  }
}
