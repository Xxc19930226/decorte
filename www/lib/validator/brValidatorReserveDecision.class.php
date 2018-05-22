<?php

class brValidatorReserveDecision extends sfValidatorSchema {
    public function __construct($options = array(), $messages = array()) {
        parent::__construct(null, $options, $messages);
    }

    protected function configure($options = array(), $messages = array()) {
        $this->addRequiredOption('number1');
        $this->addRequiredOption('number2'); 

        $this->setMessage('required', 'Required.');
        $this->addMessage('required2', 'Required2.');
    }

    protected function doClean($values) {
        if (!is_array($values)) {
            throw new InvalidArgumentException(
                'You must pass an array parameter to the clean() method ' .
                '(this validator can only be used as a post validator).');
        }

        $number1_key = $this->getOption('number1');
        $number1_value = $values[$number1_key];

        $number2_key = $this->getOption('number2');
        $number2_value = $values[$number2_key];

        $error = null;
        
        if ($number1_value == "" && $number2_value != "") 
            $error = new sfValidatorError($this, 'required', array());
        elseif ($number1_value != "" && $number2_value == "") 
            $error = new sfValidatorError($this, 'required2', array());

        if (!$error)
            return $values;

        if ($this->getOption('throw_global_error'))
            throw $error;

        throw new sfValidatorErrorSchema($this, array($number1_key => $error));
    }
}