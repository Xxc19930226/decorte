<?php

class brValidatorDecisionFlag extends sfValidatorSchema {
    public function __construct($options = array(), $messages = array()) {
        parent::__construct(null, $options, $messages);
    }

    protected function configure($options = array(), $messages = array()) {
        $this->addRequiredOption('number1');
        $this->addRequiredOption('number2'); 
        $this->addRequiredOption('number3'); 
        $this->addRequiredOption('number4'); 

        $this->setMessage('required', 'Required.');
        $this->addMessage('oneselect', 'One selection.');
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

        $number3_key = $this->getOption('number3');
        $number3_value = $values[$number3_key];

        $number4_key = $this->getOption('number4');
        $number4_value = $values[$number4_key];

        $error = null;
        
        if ($this->getOption('required') && 
            $number1_value == "" && $number2_value == "" && $number3_value == "" && 
            $number4_value == "") 
            $error = new sfValidatorError($this, 'required', array());

        if ($number1_value) {
            if ($number2_value != "" || $number3_value != "" || $number4_value != "") {
                $error = new sfValidatorError($this, 'oneselect', array());
            }
        } elseif ($number2_value) {
            if ($number1_value != "" || $number3_value != "" || $number4_value != "") {
                $error = new sfValidatorError($this, 'oneselect', array());
            }
        } elseif ($number3_value) {
            if ($number1_value != "" || $number2_value != "" || $number4_value != "") {
                $error = new sfValidatorError($this, 'oneselect', array());
            }
        } elseif ($number4_value) {
            if ($number1_value != "" || $number2_value != "" || $number3_value != "") {
                $error = new sfValidatorError($this, 'oneselect', array());
            }
        }  

        if (!$error)
            return $values;

        if ($this->getOption('throw_global_error'))
            throw $error;

        throw new sfValidatorErrorSchema($this, array($number1_key => $error));
    }
}
