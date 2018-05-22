<?php

/**
 * Product form base class.
 *
 * @method Product getObject() Returns the current form's model object
 *
 * @package    cosmedecorte
 * @subpackage form
 * @author     BROADTECH INC.
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 12 2011-05-12 03:42:19Z oda $
 */
abstract class BaseProductForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                       => new sfWidgetFormInputHidden(),
      'name'                     => new sfWidgetFormInputText(),
      'line_id'                  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Line'), 'add_empty' => true)),
      'category_id'              => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Category'), 'add_empty' => true)),
      'sub_category_id'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('SubCategory'), 'add_empty' => true)),
      'daytime_flag'             => new sfWidgetFormInputCheckbox(),
      'night_flag'               => new sfWidgetFormInputCheckbox(),
      'outline'                  => new sfWidgetFormInputText(),
      'explanation'              => new sfWidgetFormTextarea(),
      'capacity'                 => new sfWidgetFormInputText(),
      'set_flag'                 => new sfWidgetFormInputCheckbox(),
      'colors'                   => new sfWidgetFormInputText(),
      'new_colors'               => new sfWidgetFormInputText(),
      'price'                    => new sfWidgetFormInputText(),
      'how_to'                   => new sfWidgetFormInputText(),
      'quasi_drug_flag'          => new sfWidgetFormInputCheckbox(),
      'supplement1'              => new sfWidgetFormInputText(),
      'supplement2'              => new sfWidgetFormInputText(),
      'color_ball_flag'          => new sfWidgetFormInputCheckbox(),
      'line_priority'            => new sfWidgetFormInputText(),
      'category_priority'        => new sfWidgetFormInputText(),
      'slug'                     => new sfWidgetFormInputText(),
      'search_only_flag'         => new sfWidgetFormInputCheckbox(),
      'search_pc_link'           => new sfWidgetFormInputText(),
      'search_sub_category'      => new sfWidgetFormInputText(),
      'search_keyword_only_flag' => new sfWidgetFormInputCheckbox(),
      'search_index'             => new sfWidgetFormInputText(),
      'cafe_link_url'            => new sfWidgetFormInputText(),
      'cn_shop_link_url'         => new sfWidgetFormInputText(),
      'newitem_rel_info'         => new sfWidgetFormInputText(),
      'bestcosme_flag'           => new sfWidgetFormInputCheckbox(),
      'created_at'               => new sfWidgetFormDateTime(),
      'updated_at'               => new sfWidgetFormDateTime(),
      'effects_list'             => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Effect')),
      'friend_products_list'     => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Product')),
      'view_members_list'        => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Member')),
      'favorite_members_list'    => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Member')),
      'product_list'             => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Product')),
    ));

    $this->setValidators(array(
      'id'                       => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'name'                     => new sfValidatorString(array('max_length' => 255)),
      'line_id'                  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Line'), 'required' => false)),
      'category_id'              => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Category'), 'required' => false)),
      'sub_category_id'          => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('SubCategory'), 'required' => false)),
      'daytime_flag'             => new sfValidatorBoolean(),
      'night_flag'               => new sfValidatorBoolean(),
      'outline'                  => new sfValidatorString(array('max_length' => 255)),
      'explanation'              => new sfValidatorString(array('max_length' => 1024)),
      'capacity'                 => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'set_flag'                 => new sfValidatorBoolean(),
      'colors'                   => new sfValidatorInteger(array('required' => false)),
      'new_colors'               => new sfValidatorInteger(array('required' => false)),
      'price'                    => new sfValidatorInteger(),
      'how_to'                   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'quasi_drug_flag'          => new sfValidatorBoolean(),
      'supplement1'              => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'supplement2'              => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'color_ball_flag'          => new sfValidatorBoolean(),
      'line_priority'            => new sfValidatorInteger(),
      'category_priority'        => new sfValidatorInteger(),
      'slug'                     => new sfValidatorString(array('max_length' => 255)),
      'search_only_flag'         => new sfValidatorBoolean(array('required' => false)),
      'search_pc_link'           => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'search_sub_category'      => new sfValidatorPass(array('required' => false)),
      'search_keyword_only_flag' => new sfValidatorBoolean(),
      'search_index'             => new sfValidatorPass(array('required' => false)),
      'cafe_link_url'            => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'cn_shop_link_url'         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'newitem_rel_info'         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'bestcosme_flag'           => new sfValidatorBoolean(),
      'created_at'               => new sfValidatorDateTime(),
      'updated_at'               => new sfValidatorDateTime(),
      'effects_list'             => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Effect', 'required' => false)),
      'friend_products_list'     => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Product', 'required' => false)),
      'view_members_list'        => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Member', 'required' => false)),
      'favorite_members_list'    => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Member', 'required' => false)),
      'product_list'             => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Product', 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'Product', 'column' => array('slug')))
    );

    $this->widgetSchema->setNameFormat('product[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Product';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['effects_list']))
    {
      $this->setDefault('effects_list', $this->object->Effects->getPrimaryKeys());
    }

    if (isset($this->widgetSchema['friend_products_list']))
    {
      $this->setDefault('friend_products_list', $this->object->FriendProducts->getPrimaryKeys());
    }

    if (isset($this->widgetSchema['view_members_list']))
    {
      $this->setDefault('view_members_list', $this->object->ViewMembers->getPrimaryKeys());
    }

    if (isset($this->widgetSchema['favorite_members_list']))
    {
      $this->setDefault('favorite_members_list', $this->object->FavoriteMembers->getPrimaryKeys());
    }

    if (isset($this->widgetSchema['product_list']))
    {
      $this->setDefault('product_list', $this->object->Product->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->saveEffectsList($con);
    $this->saveFriendProductsList($con);
    $this->saveViewMembersList($con);
    $this->saveFavoriteMembersList($con);
    $this->saveProductList($con);

    parent::doSave($con);
  }

  public function saveEffectsList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['effects_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->Effects->getPrimaryKeys();
    $values = $this->getValue('effects_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('Effects', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('Effects', array_values($link));
    }
  }

  public function saveFriendProductsList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['friend_products_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->FriendProducts->getPrimaryKeys();
    $values = $this->getValue('friend_products_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('FriendProducts', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('FriendProducts', array_values($link));
    }
  }

  public function saveViewMembersList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['view_members_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->ViewMembers->getPrimaryKeys();
    $values = $this->getValue('view_members_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('ViewMembers', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('ViewMembers', array_values($link));
    }
  }

  public function saveFavoriteMembersList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['favorite_members_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->FavoriteMembers->getPrimaryKeys();
    $values = $this->getValue('favorite_members_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('FavoriteMembers', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('FavoriteMembers', array_values($link));
    }
  }

  public function saveProductList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['product_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->Product->getPrimaryKeys();
    $values = $this->getValue('product_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('Product', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('Product', array_values($link));
    }
  }

}
