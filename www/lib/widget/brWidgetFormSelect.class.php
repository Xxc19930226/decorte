<?php

class brWidgetFormSelect extends sfWidgetFormSelect
{
    protected function getOptionsForSelect($value, $choices)
    {
        $mainAttributes = $this->attributes;
        $this->attributes = array();

        if (!is_array($value)) {
            $value = array($value);
        }

        $value = array_map('strval', array_values($value));
        $value_set = array_flip($value);

        $options = array();
        foreach ($choices as $key => $option) {
            if (is_array($option)) {
                $options[] = $this->renderContentTag(
                    'optgroup',
                    implode("\n", $this->getOptionsForSelect($value, $option)),
                    array('label' => self::escapeOnce($key)));
            } else {
                $attributes = array('value' => self::escapeOnce($key));
                $attributes['class'] = 'opt_' . $attributes['value'];
                if (isset($value_set[strval($key)])) {
                    $attributes['selected'] = 'selected';
                }

                $options[] = $this->renderContentTag(
                    'option', self::escapeOnce($option), $attributes);
            }
        }

        $this->attributes = $mainAttributes;

        return $options;
    }
}
