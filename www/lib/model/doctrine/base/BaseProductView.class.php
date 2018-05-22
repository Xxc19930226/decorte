<?php

/**
 * BaseProductView
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $member_id
 * @property integer $product_id
 * @property Member $Member
 * @property Product $Product
 * 
 * @method integer     getMemberId()   Returns the current record's "member_id" value
 * @method integer     getProductId()  Returns the current record's "product_id" value
 * @method Member      getMember()     Returns the current record's "Member" value
 * @method Product     getProduct()    Returns the current record's "Product" value
 * @method ProductView setMemberId()   Sets the current record's "member_id" value
 * @method ProductView setProductId()  Sets the current record's "product_id" value
 * @method ProductView setMember()     Sets the current record's "Member" value
 * @method ProductView setProduct()    Sets the current record's "Product" value
 * 
 * @package    cosmedecorte
 * @subpackage model
 * @author     BROADTECH INC.
 * @version    SVN: $Id: Builder.php 12 2011-05-12 03:42:19Z oda $
 */
abstract class BaseProductView extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('product_view');
        $this->hasColumn('member_id', 'integer', null, array(
             'type' => 'integer',
             'primary' => true,
             ));
        $this->hasColumn('product_id', 'integer', null, array(
             'type' => 'integer',
             'primary' => true,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Member', array(
             'local' => 'member_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $this->hasOne('Product', array(
             'local' => 'product_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}