<?php

/**
 * MailGroup form.
 *
 * @package    cosmedecorte
 * @subpackage form
 * @author     BROADTECH INC.
 * @version    SVN: $Id: MailGroupForm.class.php 111 2011-06-08 05:00:22Z oda $
 */
class MailGroupForm extends BaseMailGroupForm
{
    public function configure()
    {
        // グループ名
        $this->getWidget('name')->setLabel('グループ名');

        $logic_forms = new sfForm();

        if (!sfContext::getInstance()->getRequest()->isXmlHttpRequest()) {
            $logics = $this->getObject()->getLogics();
            $logic_idx = 0;
            foreach ($logics as $logic) {
                $logic_form = new MailGroupLogicForm($logic);
                $logic_forms->embedForm($logic_idx++, $logic_form);
            }
        }

        $this->embedForm('logics', $logic_forms);

        $this->useFields(array('name', 'logics'));
    }

    public function addLogicForm($idx)
    {
        $logic = new MailGroupLogic();
        $logic->setGroup($this->getObject());
        $this->getObject()->getLogics()->add($logic);

        $logic_form = new MailGroupLogicForm($logic);
        $this->embeddedForms['logics']->embedForm($idx, $logic_form);
        $this->embedForm('logics', $this->embeddedForms['logics']);

        return $logic_form;
    }

    public function reembedForms(sfForm $form = null)
    {
        if (!$form) {
            $form = $this;
        }

        foreach ($form->getEmbeddedForms() as $name => $emb_form) {
            $this->reembedForms($emb_form);
            $form->embedForm($name, $emb_form);
        }
    }

    public function bind(
        array $tainted_values = null, array $tainted_files = null)
    {
        /*
         * クライアントから送信された値に従って埋め込みフォーム及び関連オブ
         * ジェクトを再構築するため、一旦全てリセットする。
         */
        $this->embedForm('logics', new sfForm());
        $this->getObject()->getLogics()->clear();

        if (isset($tainted_values['logics']) &&
            is_array($tainted_values['logics'])) {
            // 空のロジックを削除
            foreach ($tainted_values['logics'] as
                     $logic_idx => $logic_values) {
                if (!isset($logic_values['terms']) ||
                    !is_array($logic_values['terms']) ||
                    count($logic_values['terms']) == 0) {
                    unset($tainted_values['logics'][$logic_idx]);
                }
            }

            // 配列の添字を順に振り直し
            $tainted_values['logics'] =
                array_values($tainted_values['logics']);

            foreach ($tainted_values['logics'] as
                     $logic_idx => $logic_values) {
                $logic_form = $this->addLogicForm($logic_idx);

                if (isset($logic_values['terms']) &&
                    is_array($logic_values['terms'])) {
                    // 配列の添字を順に振り直し
                    $logic_values['terms'] =
                        array_values($logic_values['terms']);
                    $tainted_values['logics'][$logic_idx]['terms'] =
                        array_values($logic_values['terms']);

                    foreach ($logic_values['terms'] as
                             $term_idx => $term_values) {
                        $logic_form->addTermForm($term_idx);
                    }
                }
            }

            $this->reembedForms();
        }

        parent::bind($tainted_values, $tainted_files);
    }
}
