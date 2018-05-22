<?php

/**
 * SalonShop form.
 *
 * @package    cosmedecorte
 * @subpackage form
 * @author     BROADTECH INC.
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 12 2011-05-12 03:42:19Z oda $
 */
class SalonShopForm extends BaseSalonShopForm
{
    public function configure()
    {
        $this->setWidget(
            'mail_body1', new sfWidgetFormTextArea());
        $this->setWidget(
            'mail_body1_mb', new sfWidgetFormTextArea());
        $this->setWidget(
            'mail_body_top2', new sfWidgetFormTextArea());
        $this->setWidget(
            'mail_body_bottom2', new sfWidgetFormTextArea());
        $this->setWidget(
            'mail_body_top3', new sfWidgetFormTextArea());
        $this->setWidget(
            'mail_body_bottom3', new sfWidgetFormTextArea());

        $this->useFields(
            array('name', 'mail_subject1', 'mail_subject1_mb', 'mail_subject2',
                  'mail_subject3', 'mail_body1', 'mail_body1_mb',
                  'mail_body_top2', 'mail_body_bottom2', 'mail_body_top3',
                  'mail_body_bottom3'));
    }
}
