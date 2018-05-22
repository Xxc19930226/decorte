<?php

/**
 * Product filter form base class.
 *
 * @package    cosmedecorte
 * @subpackage filter
 * @author     BROADTECH INC.
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 12 2011-05-12 03:42:19Z oda $
 */
abstract class BaseProductFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'                     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'line_id'                  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Line'), 'add_empty' => true)),
      'category_id'              => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Category'), 'add_empty' => true)),
      'sub_category_id'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('SubCategory'), 'add_empty' => true)),
      'daytime_flag'             => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'night_flag'               => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'outline'                  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'explanation'              => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'capacity'                 => new sfWidgetFormFilterInput(),
      'set_flag'                 => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'colors'                   => new sfWidgetFormFilterInput(),
      'new_colors'               => new sfWidgetFormFilterInput(),
      'price'                    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'how_to'                   => new sfWidgetFormFilterInput(),
      'quasi_drug_flag'          => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'supplement1'              => new sfWidgetFormFilterInput(),
      'supplement2'              => new sfWidgetFormFilterInput(),
      'color_ball_flag'          => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'line_priority'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'category_priority'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'slug'                     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'search_only_flag'         => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'search_pc_link'           => new sfWidgetFormFilterInput(),
      'search_sub_category'      => new sfWidgetFormFilterInput(),
      'search_keyword_only_flag' => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'search_index'             => new sfWidgetFormFilterInput(),
      'cafe_link_url'            => new sfWidgetFormFilterInput(),
      'cn_shop_link_url'         => new sfWidgetFormFilterInput(),
      'newitem_rel_info'         => new sfWidgetFormFilterInput(),
      'bestcosme_flag'           => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'created_at'               => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'               => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'effects_list'             => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Effect')),
      'friend_products_list'     => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Product')),
      'view_members_list'        => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Member')),
      'favorite_members_list'    => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Member')),
      'product_list'             => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Product')),
    ));

    $this->setValidators(array(
      'name'                     => new sfValidatorPass(array('required' => false)),
      'line_id'                  => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Line'), 'column' => 'id')),
      'category_id'              => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Category'), 'column' => 'id')),
      'sub_category_id'          => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('SubCategory'), 'column' => 'id')),
      'daytime_flag'             => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'night_flag'               => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'outline'                  => new sfValidatorPass(array('required' => false)),
      'explanation'              => new sfValidatorPass(array('required' => false)),
      'capacity'                 => new sfValidatorPass(array('required' => false)),
      'set_flag'                 => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'colors'                   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'new_colors'               => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'price'                    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'how_to'                   => new sfValidatorPass(array('required' => false)),
      'quasi_drug_flag'          => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'supplement1'              => new sfValidatorPass(array('required' => false)),
      'supplement2'              => new sfValidatorPass(array('required' => false)),
      'color_ball_flag'          => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'line_priority'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'category_priority'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'slug'                     => new sfValidatorPass(array('required' => false)),
      'search_only_flag'         => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'search_pc_link'           => new sfValidatorPass(array('required' => false)),
      'search_sub_category'      => new sfValidatorPass(array('required' => false)),
      'search_keyword_only_flag' => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'search_index'             => new sfValidatorPass(array('required' => false)),
      'cafe_link_url'            => new sfValidatorPass(array('required' => false)),
      'cn_shop_link_url'         => new sfValidatorPass(array('required' => false)),
      'newitem_rel_info'         => new sfValidatorPass(array('required' => false)),
      'bestcosme_flag'           => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'created_at'               => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'               => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'effects_list'             => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Effect', 'required' => false)),
      'friend_products_list'     => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Product', 'required' => false)),
      'view_members_list'        => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Member', 'required' => false)),
      'favorite_members_list'    => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Member', 'required' => false)),
      'product_list'             => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Product', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('product_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function addEffectsListColumnQuery(Doctrine_Query $query, $field, $values)
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
      ->leftJoin($query->getRootAlias().'.ProductEffect ProductEffect')
      ->andWhereIn('ProductEffect.effect_id', $values)
    ;
  }

  public function addFriendProductsListColumnQuery(Doctrine_Query $query, $field, $values)
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
      ->leftJoin($query->getRootAlias().'.ProductFriend ProductFriend')
      ->andWhereIn('ProductFriend.product_id2', $values)
    ;
  }

  public function addViewMembersListColumnQuery(Doctrine_Query $query, $field, $values)
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
      ->leftJoin($query->getRootAlias().'.ProductView ProductView')
      ->andWhereIn('ProductView.member_id', $values)
    ;
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
      ->leftJoin($query->getRootAlias().'.ProductFavorite ProductFavorite')
      ->andWhereIn('ProductFavorite.member_id', $values)
    ;
  }

  public function addProductListColumnQuery(Doctrine_Query $query, $field, $values)
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
      ->leftJoin($query->getRootAlias().'.ProductFriend ProductFriend')
      ->andWhereIn('ProductFriend.product_id1', $values)
    ;
  }

  public function getModelName()
  {
    return 'Product';
  }

  public function getFields()
  {
    return array(
      'id'                       => 'Number',
      'name'                     => 'Text',
      'line_id'                  => 'ForeignKey',
      'category_id'              => 'ForeignKey',
      'sub_category_id'          => 'ForeignKey',
      'daytime_flag'             => 'Boolean',
      'night_flag'               => 'Boolean',
      'outline'                  => 'Text',
      'explanation'              => 'Text',
      'capacity'                 => 'Text',
      'set_flag'                 => 'Boolean',
      'colors'                   => 'Number',
      'new_colors'               => 'Number',
      'price'                    => 'Number',
      'how_to'                   => 'Text',
      'quasi_drug_flag'          => 'Boolean',
      'supplement1'              => 'Text',
      'supplement2'              => 'Text',
      'color_ball_flag'          => 'Boolean',
      'line_priority'            => 'Number',
      'category_priority'        => 'Number',
      'slug'                     => 'Text',
      'search_only_flag'         => 'Boolean',
      'search_pc_link'           => 'Text',
      'search_sub_category'      => 'Text',
      'search_keyword_only_flag' => 'Boolean',
      'search_index'             => 'Text',
      'cafe_link_url'            => 'Text',
      'cn_shop_link_url'         => 'Text',
      'newitem_rel_info'         => 'Text',
      'bestcosme_flag'           => 'Boolean',
      'created_at'               => 'Date',
      'updated_at'               => 'Date',
      'effects_list'             => 'ManyKey',
      'friend_products_list'     => 'ManyKey',
      'view_members_list'        => 'ManyKey',
      'favorite_members_list'    => 'ManyKey',
      'product_list'             => 'ManyKey',
    );
  }
}
