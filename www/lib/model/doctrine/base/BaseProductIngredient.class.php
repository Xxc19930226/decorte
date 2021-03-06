<?php

/**
 * BaseProductIngredient
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $product_id
 * @property string $symbol
 * @property string $content
 * @property integer $display_order
 * @property Product $Product
 * 
 * @method integer           getId()            Returns the current record's "id" value
 * @method integer           getProductId()     Returns the current record's "product_id" value
 * @method string            getSymbol()        Returns the current record's "symbol" value
 * @method string            getContent()       Returns the current record's "content" value
 * @method integer           getDisplayOrder()  Returns the current record's "display_order" value
 * @method Product           getProduct()       Returns the current record's "Product" value
 * @method ProductIngredient setId()            Sets the current record's "id" value
 * @method ProductIngredient setProductId()     Sets the current record's "product_id" value
 * @method ProductIngredient setSymbol()        Sets the current record's "symbol" value
 * @method ProductIngredient setContent()       Sets the current record's "content" value
 * @method ProductIngredient setDisplayOrder()  Sets the current record's "display_order" value
 * @method ProductIngredient setProduct()       Sets the current record's "Product" value
 * 
 * @package    cosmedecorte
 * @subpackage model
 * @author     BROADTECH INC.
 * @version    SVN: $Id: Builder.php 12 2011-05-12 03:42:19Z oda $
 */
abstract class BaseProductIngredient extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('product_ingredient');
        $this->hasColumn('id', 'integer', null, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             ));
        $this->hasColumn('product_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('symbol', 'string', 64, array(
             'type' => 'string',
             'length' => 64,
             ));
        $this->hasColumn('content', 'string', 2048, array(
             'type' => 'string',
             'length' => 2048,
             ));
        $this->hasColumn('display_order', 'integer', null, array(
             'type' => 'integer',
             ));

        $this->option('orderBy', 'display_order');
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Product', array(
             'local' => 'product_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}