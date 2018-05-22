<?php

class brValidatorPcEmail extends sfValidatorEmail
{
    protected function configure($options = array(), $messages = array())
    {
        $this->addMessage('invalid_pc', 'Not PC mail address');

        parent::configure($options, $messages);
    }

    protected function doClean($value)
    {
        $value = parent::doClean($value);

        if (preg_match(
                "/@(docomo|softbank|disney|ezweb|[dhtkrsnqc]\.vodafone|pdx|d[kij]\.pdx|wm\.pdx)\.ne\.jp$/i", $value) ||
            preg_match("/@(jp-[dhtkrsnqc]\.ne\.jp|i\.softbank\.jp|willcom\.com|[a-z]+\.biz\.ezweb\.ne\.jp)$/i", $value)) {
            throw new sfValidatorError($this, 'invalid_pc');
        }

        return $value;
    }
}
