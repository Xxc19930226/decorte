<?php

/**
 * ReserveDecision form.
 *
 * @package    cosmedecorte
 * @subpackage form
 * @author     BROADTECH INC.
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 12 2011-05-12 03:42:19Z oda $
 */
class ReserveDecisionForm extends BaseReserveDecisionForm
{
    public function configure()
    {
        $fields[] = 'hope_flag1';
        $fields[] = 'hope_flag2';
        $fields[] = 'hope_flag3';
        $fields[] = 'other_flag1';

        $this->getWidget('other_date1')->setLabel('上記以外');
        $fields[] = 'other_date1';

        $this->getWidget('other_date2')->setLabel('上記以外');
        $fields[] = 'other_date2';

        $hours = array(11, 12, 13, 14, 15, 16, 17, 18);
        $minutes = array(15, 30, 45);

        $this->getWidget('hope_start_time1')->setLabel('開始');
        $this->setWidget('hope_start_time1', new sfWidgetFormTime(
                array('format_without_seconds' => '%hour%時%minute%分',
                      'empty_values' => array('hour'=>'00', 'minute'=>'00'),
                      'hours' => array_combine($hours, $hours),
                      'minutes' => array_combine($minutes, $minutes))));
        $this->setValidator(
            'hope_start_time1', new sfValidatorTime(
                  array('required' => false),
                  array('invalid' => '開始時間が不正な値です。')));
        $fields[] = 'hope_start_time1';

        $this->getWidget('hope_start_time2')->setLabel('開始');
        $this->setWidget('hope_start_time2', new sfWidgetFormTime(
                array('format_without_seconds' => '%hour%時%minute%分',
                      'empty_values' => array('hour'=>'00', 'minute'=>'00'),
                      'hours' => array_combine($hours, $hours),
                      'minutes' => array_combine($minutes, $minutes))));
        $this->setValidator(
            'hope_start_time2', new sfValidatorTime(
                  array('required' => false),
                  array('invalid' => '開始時間が不正な値です。')));
        $fields[] = 'hope_start_time2';

        $this->getWidget('hope_start_time3')->setLabel('開始');
        $this->setWidget('hope_start_time3', new sfWidgetFormTime(
                array('format_without_seconds' => '%hour%時%minute%分',
                      'empty_values' => array('hour'=>'00', 'minute'=>'00'),
                      'hours' => array_combine($hours, $hours),
                      'minutes' => array_combine($minutes, $minutes))));
        $this->setValidator(
            'hope_start_time3', new sfValidatorTime(
                  array('required' => false),
                  array('invalid' => '開始時間が不正な値です。')));
        $fields[] = 'hope_start_time3';

        $this->getWidget('other_start_time1')->setLabel('開始');
        $this->setWidget('other_start_time1', new sfWidgetFormTime(
                array('format_without_seconds' => '%hour%時%minute%分',
                      'empty_values' => array('hour'=>'00', 'minute'=>'00'),
                      'hours' => array_combine($hours, $hours),
                      'minutes' => array_combine($minutes, $minutes))));
        $this->setValidator(
            'other_start_time1', new sfValidatorTime(
                  array('required' => false),
                  array('invalid' => '開始時間が不正な値です。')));
        $fields[] = 'other_start_time1';

        $this->getWidget('other_start_time2')->setLabel('開始');
        $this->setWidget('other_start_time2', new sfWidgetFormTime(
                array('format_without_seconds' => '%hour%時%minute%分',
                      'empty_values' => array('hour'=>'00', 'minute'=>'00'),
                      'hours' => array_combine($hours, $hours),
                      'minutes' => array_combine($minutes, $minutes))));
        $this->setValidator(
            'other_start_time2', new sfValidatorTime(
                  array('required' => false),
                  array('invalid' => '開始時間が不正な値です。')));
        $fields[] = 'other_start_time2';

        $this->getWidget('registrant')->setLabel('登録者');
        $this->getValidator('registrant')->setOption('required', true);
        $fields[] = 'registrant';

        $this->validatorSchema->setPostValidator(
            new sfValidatorAnd(
                array(new brValidatorReserveDecision(
                          array('number1' => 'hope_start_time1',
                                'number2' => 'hope_flag1'),
                          array('required' => '開始時間を選択して下さい。',
                                'required2' => '確定にチェックして下さい。')),
                      new brValidatorReserveDecision(
                          array('number1' => 'hope_start_time2',
                                'number2' => 'hope_flag2'),
                          array('required' => '開始時間を選択して下さい。',
                                'required2' => '確定にチェックして下さい。')),
                      new brValidatorReserveDecision(
                          array('number1' => 'hope_start_time3',
                                'number2' => 'hope_flag3'),
                          array('required' => '開始時間を選択して下さい。',
                                'required2' => '確定にチェックして下さい。')),
                      new brValidatorReserveDecisionOther(
                          array('required' => 'other_flag1'),
                          array('required' => '上記以外（時間）と上記以外（曜日）を入力後、確定にチェックして下さい。')),
                      new brValidatorDecisionFlag(
                          array('number1' => 'hope_flag1',
                                'number2' => 'hope_flag2',
                                'number3' => 'hope_flag3',
                                'number4' => 'other_flag1'),
                          array('required' => '希望日時または上記以外の確定にチェックして下さい。',
                                'oneselect' => 'ひとつだけ確定にチェックして下さい。'))
        )));

        $this->useFields($fields);
    }

}
