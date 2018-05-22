<?php

/**
 * RedirectUrl form.
 *
 * @package    cosmedecorte
 * @subpackage form
 * @author     BROADTECH INC.
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 12 2011-05-12 03:42:19Z oda $
 */
class RedirectUrlForm extends BaseRedirectUrlForm
{
    public function configure()
    {
        // 転送元URL
        $this->setValidator(
            'source', new sfValidatorRegex(
                array('pattern' => '/^https*:\/\//')));

        // 転送先URL(PC)
        $this->setValidator(
            'destination', new sfValidatorRegex(
                array('pattern' => '/^https*:\/\//')));

        // 転送先URL(SP)
        $this->setValidator(
            'destination_sp', new sfValidatorRegex(
                array('required' => false,
                      'pattern' => '/^https*:\/\//')));

        // 転送先URL(MB)
        $this->setValidator(
            'destination_mb', new sfValidatorRegex(
                array('required' => false,
                      'pattern' => '/^https*:\/\//')));

        $this->useFields(
            array('source', 'destination',
                  'destination_sp', 'destination_mb'));

        $this->resetToDefaultMessages();
    }
}
