<?php

/**
 * MailAuthor form.
 *
 * @package    cosmedecorte
 * @subpackage form
 * @author     BROADTECH INC.
 * @version    SVN: $Id: MailAuthorForm.class.php 80 2011-05-26 06:31:28Z oda $
 */
class MailAuthorForm extends BaseMailAuthorForm
{
    public function configure()
    {
        // 差出人名
        $this->getWidget('name')->setLabel('差出人名');

        // メールアドレス
        $this->getWidget('address')->setLabel('メールアドレス');

        $this->useFields(array('name', 'address'));
    }
}
