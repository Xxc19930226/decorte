<?php

class brValidatorMailRequiredNew extends sfValidatorSchema {
    public function __construct($options = array(), $messages = array()) {
        parent::__construct(null, $options, $messages);
    }

    protected function doClean($values) {
        $error = null;

        $sp_ua = sfContext::getInstance()->
                     getConfiguration()->getDeviceType();
        $ua = sfContext::getInstance()->
                     getConfiguration()->getRawDeviceString();

        if ($values['mail_pc'] == '' && $values['mail_mobile'] == '' &&
            $sp_ua==1 && $ua=='sp' ) {
            $error = new sfValidatorError($this, 'required', array());
        } 

        if (!$error)
            return $values;

        if ($this->getOption('throw_global_error'))
            throw $error;

        throw new sfValidatorErrorSchema($this, array('mail_pc' => $error));
    }
}
