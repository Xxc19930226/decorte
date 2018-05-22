<?php

class brValidatorReminderMail extends sfValidatorSchema {
    public function __construct($options = array(), $messages = array()) {
        parent::__construct(null, $options, $messages);
    }

    protected function configure($options = array(), $messages = array())
    {
        $this->addRequiredOption('model');
        $this->addRequiredOption('column');

        $this->setMessage('invalid', 'An object with the same "%column%" already exist.');
    }

    protected function doClean($values)
    {
        $originalValues = $values;

        if (!$originalValues['mail'])
            return $values;

        $table = Doctrine_Core::getTable($this->getOption('model'));
        if (!is_array($this->getOption('column')))
        {
            $this->setOption('column', array($this->getOption('column')));
        }

        if (!is_array($values))
        {
            //use first column for key
            $columns = $this->getOption('column');
            $values = array($columns[0] => $values);
        }

        $q = Doctrine_Core::getTable($this->getOption('model'))->createQuery('a');

        foreach ($this->getOption('column') as $column)
        {
            $colName = $table->getColumnName($column);
            $q->orWhere('a.' . $colName . ' = ?', $originalValues['mail']);
        }
        $object = $q->addwhere('temp_flag = ?', false)->fetchOne();

        if ($object) {
            return $originalValues;
        } else {
            $error = new sfValidatorError($this, 'invalid', array());
        }
        
        throw new sfValidatorErrorSchema($this, array('mail' => $error));

    }
}
