<?php

/**
 * ProductSearchWrongWord form base class.
 *
 * @method ProductSearchWrongWord getObject() Returns the current form's model object
 *
 * @package    cosmedecorte
 * @subpackage form
 * @author     BROADTECH INC.
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 12 2011-05-12 03:42:19Z oda $
 */
abstract class BaseProductSearchWrongWordForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'right_word_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('RightWord'), 'add_empty' => false)),
      'word'          => new sfWidgetFormInputText(),
      'created_at'    => new sfWidgetFormDateTime(),
      'updated_at'    => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'right_word_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('RightWord'))),
      'word'          => new sfValidatorString(array('max_length' => 255)),
      'created_at'    => new sfValidatorDateTime(),
      'updated_at'    => new sfValidatorDateTime(),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'ProductSearchWrongWord', 'column' => array('word')))
    );

    $this->widgetSchema->setNameFormat('product_search_wrong_word[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ProductSearchWrongWord';
  }

}
