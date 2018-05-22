<?php

/**
 * Mail form.
 *
 * @package    cosmedecorte
 * @subpackage form
 * @author     BROADTECH INC.
 * @version    SVN: $Id: MailForm.class.php 105 2011-05-30 07:41:40Z oda $
 */
class MailForm extends BaseMailForm
{
    public function configure()
    {
        // 件名
        $this->getWidget('subject')->setLabel('件名');

        // 本文
        $this->setWidget('body', new sfWidgetFormTextarea());
        $this->getWidget('body')->setLabel('本文');
        $this->setValidator('body', new sfValidatorString());
        $this->getValidator('body')->setOption('required', true);

        // 差出人
        $this->getWidget('author_id')->setLabel('差出人');

        // 宛先グループ
        $this->getWidget('group_id')->setLabel('宛先グループ');

        // 配信日時
        $this->getWidget('delivered_at')->
            setLabel('配信日時')->
            setOption('date', array('format' => '%year%年%month%月%day%日'))->
            setOption('time',
                      array('format_without_seconds' =>
                            '%hour%時%minute%分'));
        $this->setDefault('delivered_at', date('Y/m/d H:i'));

        // 配信対象
        $this->getWidget('address_type')->setLabel('配信対象');

        $this->resetToDefaultMessages();

        $this->useFields(
            array('subject', 'body', 'author_id', 'group_id', 'delivered_at',
                  'address_type'));
    }
}
