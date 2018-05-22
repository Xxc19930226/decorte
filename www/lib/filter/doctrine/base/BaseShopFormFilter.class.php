<?php

/**
 * Shop filter form base class.
 *
 * @package    cosmedecorte
 * @subpackage filter
 * @author     BROADTECH INC.
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 12 2011-05-12 03:42:19Z oda $
 */
abstract class BaseShopFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'                  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'zip_code'              => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'prefecture'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'address'               => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'tel'                   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'fax'                   => new sfWidgetFormFilterInput(),
      'url1'                  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'url2'                  => new sfWidgetFormFilterInput(),
      'aq_flag'               => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'maquiexpert_flag'      => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'salon_flag'            => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'created_at'            => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'            => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'favorite_members_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Member')),
    ));

    $this->setValidators(array(
      'name'                  => new sfValidatorPass(array('required' => false)),
      'zip_code'              => new sfValidatorPass(array('required' => false)),
      'prefecture'            => new sfValidatorPass(array('required' => false)),
      'address'               => new sfValidatorPass(array('required' => false)),
      'tel'                   => new sfValidatorPass(array('required' => false)),
      'fax'                   => new sfValidatorPass(array('required' => false)),
      'url1'                  => new sfValidatorPass(array('required' => false)),
      'url2'                  => new sfValidatorPass(array('required' => false)),
      'aq_flag'               => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'maquiexpert_flag'      => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'salon_flag'            => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'created_at'            => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'            => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'favorite_members_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Member', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('shop_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function addFavoriteMembersListColumnQuery(Doctrine_Query $query, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $query
      ->leftJoin($query->getRootAlias().'.ShopFavorite ShopFavorite')
      ->andWhereIn('ShopFavorite.member_id', $values)
    ;
  }

  public function getModelName()
  {
    return 'Shop';
  }

  public function getFields()
  {
    return array(
      'id'                    => 'Text',
      'name'                  => 'Text',
      'zip_code'              => 'Text',
      'prefecture'            => 'Text',
      'address'               => 'Text',
      'tel'                   => 'Text',
      'fax'                   => 'Text',
      'url1'                  => 'Text',
      'url2'                  => 'Text',
      'aq_flag'               => 'Boolean',
      'maquiexpert_flag'      => 'Boolean',
      'salon_flag'            => 'Boolean',
      'created_at'            => 'Date',
      'updated_at'            => 'Date',
      'favorite_members_list' => 'ManyKey',
    );
  }
}
