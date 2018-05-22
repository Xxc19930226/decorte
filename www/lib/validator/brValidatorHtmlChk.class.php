<?php

class brValidatorHtmlChk extends sfValidatorSchema {
    public function __construct($options = array(), $messages = array()) {
        parent::__construct(null, $options, $messages);
    }

    protected function configure($options = array(), $messages = array()) {
        $this->setMessage('required', 'Required.');
        $this->addMessage('repetition', 'Repetition.');
    }


    protected function doClean($values) {
        $error = null;

        if ($values['mail_html_flag'] == 1 && 
            $values['mail_pc'] == '' && $values['mail_mobile'] == '') {
            $error = new sfValidatorError($this, 'required', array());
        } elseif ($values['mail_html_flag'] == 1 &&
                  $values['mail_pc_flag'] == '' && $values['mail_mobile_flag'] == '') {
            $error = new sfValidatorError($this, 'repetition', array());
        } 
        if (!$error)
            return $values;

        if ($this->getOption('throw_global_error'))
            throw $error;

        throw new sfValidatorErrorSchema($this, array('mail_html_flag' => $error));
    }
}
