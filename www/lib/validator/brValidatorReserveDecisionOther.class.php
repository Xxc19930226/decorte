<?php

class brValidatorReserveDecisionOther extends sfValidatorSchema {
    public function __construct($options = array(), $messages = array()) {
        parent::__construct(null, $options, $messages);
    }

    protected function doClean($values) {
        $error = null;

        if ($values['other_flag1']) {
           if ($values['other_date1'] == '' || $values['other_start_time1'] == '' || 
               $values['other_date2'] == '' || $values['other_start_time2'] == '' ) 
               $error = new sfValidatorError($this, 'required', array());
        } elseif ($values['other_date1']) {
           if ($values['other_flag1'] == '' || $values['other_start_time1'] == '' ||
               $values['other_date2'] == '' || $values['other_start_time2'] == '' )
               $error = new sfValidatorError($this, 'required', array());
        } elseif ($values['other_date2']) {
           if ($values['other_flag1'] == '' || $values['other_start_time1'] == '' ||
               $values['other_date1'] == '' || $values['other_start_time2'] == '' )
               $error = new sfValidatorError($this, 'required', array());
        } elseif ($values['other_start_time1']) {
           if ($values['other_flag1'] == '' || $values['other_date2'] == '' ||
               $values['other_date1'] == '' || $values['other_start_time2'] == '' )
               $error = new sfValidatorError($this, 'required', array());
        } elseif ($values['other_start_time2']) {
           if ($values['other_flag1'] == '' || $values['other_date2'] == '' ||
               $values['other_date1'] == '' || $values['other_start_time1'] == '' )
               $error = new sfValidatorError($this, 'required', array());
        }


        if (!$error)
            return $values;

        if ($this->getOption('throw_global_error'))
            throw $error;

        throw new sfValidatorErrorSchema($this, array('other_date1' => $error));
    }
}
