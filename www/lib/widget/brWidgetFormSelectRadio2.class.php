<?php

class brWidgetFormSelectRadio2 extends sfWidgetFormSelectRadio
{
  protected function formatChoices($name, $value, $choices, $attributes)
  {
    $inputs = array();
    $count = 1;
    foreach ($choices as $key => $option)
    {
      $baseAttributes = array(
        'name'  => substr($name, 0, -2),
        'type'  => 'radio',
        'value' => self::escapeOnce($key),
        'id'    => $id = $this->generateId($name, self::escapeOnce($count)),
      );

      if (strval($key) == strval($value === false ? 0 : $value))
      {
        $baseAttributes['checked'] = 'checked';
      }

      $inputs[$id] = array(
        'input' => $this->renderTag('input', array_merge($baseAttributes, $attributes)),
        'label' => $this->renderContentTag('label', self::escapeOnce($option), array('for' => $id)),
      );
      $count++;
    }
    return call_user_func($this->getOption('formatter'), $this, $inputs);
  }

  public function formatter($widget, $inputs)
  {
        $rows = array();
        foreach ($inputs as $key=>$input) {
            $rows[] = '<ul>'.$widget->renderContentTag(
                 'span', $input['input'],
                 array('class' => 'seiretufont')).$input['label'].
                 $widget->getOption('label_separator')."</ul>";
        }
        return implode($rows, $widget->getOption('separator'));
  }

}
