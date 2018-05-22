<?php

/**
 * CampaignEnquete form.
 *
 * @package    cosmedecorte
 * @subpackage form
 * @author     BROADTECH INC.
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 12 2011-05-12 03:42:19Z oda $
 */
class CampaignEnqueteForm extends BaseCampaignEnqueteForm
{
    public function configure()
    {
        $cont = sfContext::getInstance()->getConfiguration();

        if ($cont->getDeviceTypeString() == 'pc') {

        // Q01
        $this->getWidget('q01')->
            setLabel('Q01')->
            setOption('renderer_class' , 'brWidgetFormSelectRadio');
        $this->getValidator('q01')->setOption('required', true)->
            setMessage('required', '必須選択項目です。');
        $fields[] = 'q01';

        // Q02
        $this->setWidget('q02', new sfWidgetFormChoice(
                array('choices' => sfContext::getInstance()->
                                   getConfiguration()->getQ02(),
                      'renderer_options' => array('formatter'
                                         => array($this, 'formatRadio')),
                      'multiple' => true,
                      'expanded' => true )));
        $this->setValidator(
            'q02', new sfValidatorChoice(
                array('choices' => array_keys(sfContext::getInstance()->
                                              getConfiguration()->getQ02()),
                      'multiple' => true,
                      'required' => true),
                array('required' => '必須選択項目です。')));
        $fields[] = 'q02';

        // Q03
        $this->getWidget('q03')->
            setLabel('Q03')->
            setOption('renderer_class' , 'brWidgetFormSelectRadio');
        $this->getValidator('q03')->setOption('required', true)->
            setMessage('required', '必須選択項目です。');
        $fields[] = 'q03';

        // Q04
        $this->setWidget('q04', new sfWidgetFormChoice(
                array('choices' => sfContext::getInstance()->
                                   getConfiguration()->getQ04(),
                      'renderer_options' => array('formatter'
                                         => array($this, 'formatRadio01')),
                      'multiple' => true,
                      'expanded' => true )));
        $this->setValidator(
            'q04', new sfValidatorChoice(
                array('choices' => array_keys(sfContext::getInstance()->
                                              getConfiguration()->getQ04()),
                      'multiple' => true,
                      'required' => true),
                array('required' => '必須選択項目です。')));
        $fields[] = 'q04';

        // Q05
        $this->getWidget('q05')->
            setLabel('Q05')->
            setOption('renderer_class' , 'brWidgetFormSelectRadio');
        $this->getValidator('q05')->setOption('required', true)->
            setMessage('required', '必須選択項目です。');
        $fields[] = 'q05';

        // Q06
        $this->setWidget('q06', new sfWidgetFormChoice(
                array('choices' => sfContext::getInstance()->
                                   getConfiguration()->getQ06(),
                      'renderer_options' => array('formatter'
                                         => array($this, 'formatRadio01')),
                      'multiple' => true,
                      'expanded' => true )));
        $this->setValidator(
            'q06', new sfValidatorChoice(
                array('choices' => array_keys(sfContext::getInstance()->
                                              getConfiguration()->getQ06()),
                      'multiple' => true,
                      'required' => true),
                array('required' => '必須選択項目です。')));
        $fields[] = 'q06';

        } else {

        // Q01
        $this->getWidget('q01')->
            setLabel('Q01')->
            setOption('renderer_class' , 'brWidgetFormSelectRadio2');
        $this->getValidator('q01')->setOption('required', true)->
            setMessage('required', '必須選択項目です。');
        $fields[] = 'q01';

        // Q02
        $this->setWidget('q02', new sfWidgetFormChoice(
                array('choices' => sfContext::getInstance()->
                                   getConfiguration()->getQ02(),
                      'renderer_options' => array('formatter'
                                         => array($this, 'formatter')),
                      'multiple' => true,
                      'expanded' => true )));
        $this->setValidator(
            'q02', new sfValidatorChoice(
                array('choices' => array_keys(sfContext::getInstance()->
                                              getConfiguration()->getQ02()),
                      'multiple' => true,
                      'required' => true),
                array('required' => '必須選択項目です。')));
        $fields[] = 'q02';

        // Q03
        $this->getWidget('q03')->
            setLabel('Q03')->
            setOption('renderer_class' , 'brWidgetFormSelectRadio2');
        $this->getValidator('q03')->setOption('required', true)->
            setMessage('required', '必須選択項目です。');
        $fields[] = 'q03';


        $cont = sfContext::getInstance()->getConfiguration();

        // Q04
        $this->setWidget('q04', new sfWidgetFormChoice(
                array('choices' => sfContext::getInstance()->
                                   getConfiguration()->getQ04(),
                      'renderer_options' => array('formatter'
                                         => array($this, 'formatter')),
                      'multiple' => true,
                      'expanded' => true )));
        $this->setValidator(
            'q04', new sfValidatorChoice(
                array('choices' => array_keys(sfContext::getInstance()->
                                              getConfiguration()->getQ04()),
                      'multiple' => true,
                      'required' => true),
                array('required' => '必須選択項目です。')));
        $fields[] = 'q04';

        // Q05
        $this->getWidget('q05')->
            setLabel('Q05')->
            setOption('renderer_class' , 'brWidgetFormSelectRadio2');
        $this->getValidator('q05')->setOption('required', true)->
            setMessage('required', '必須選択項目です。');
        $fields[] = 'q05';

        // Q06
        $this->setWidget('q06', new sfWidgetFormChoice(
                array('choices' => sfContext::getInstance()->
                                   getConfiguration()->getQ06(),
                      'renderer_options' => array('formatter'
                                         => array($this, 'formatter')),
                      'multiple' => true,
                      'expanded' => true )));
        $this->setValidator(
            'q06', new sfValidatorChoice(
                array('choices' => array_keys(sfContext::getInstance()->
                                              getConfiguration()->getQ06()),
                      'multiple' => true,
                      'required' => true),
                array('required' => '必須選択項目です。')));
        $fields[] = 'q06';


        }

        // 会員規約同意
        $this->setWidget('agree', new sfWidgetFormInputCheckbox(
                      array('value_attribute_value'=>1)));
        $this->setValidator('agree', new sfValidatorNumber(
                      array('required' => true ),
                      array('required' => '必須選択項目です。' )));
        $fields[] = 'agree';

        $this->useFields($fields);
    }

    public function formatRadio01($widget, $inputs)
    {
        foreach ((array)$inputs as $key => $input) {
            if ($key == 'campaign_enquete_q04_5' || $key == 'campaign_enquete_q06_7') {
                $radio_list[] = '<br />'.$input['input'].
                                $widget->getOption('label_separator').
                                $input['label'];
            } else { 
                $radio_list[] = $input['input'].
                                $widget->getOption('label_separator').
                                $input['label'];
            }
        }
        return implode($widget->getOption('label_separator'), $radio_list);
    }


    public function formatter($widget, $inputs) {
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
