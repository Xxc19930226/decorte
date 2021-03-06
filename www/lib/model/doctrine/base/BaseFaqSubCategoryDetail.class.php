<?php

/**
 * BaseFaqSubCategoryDetail
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $faq_sub_category_id
 * @property integer $faq_detail_id
 * @property FaqSubCategory $FaqSubCategory
 * @property FaqDetail $FaqDetail
 * 
 * @method integer              getFaqSubCategoryId()    Returns the current record's "faq_sub_category_id" value
 * @method integer              getFaqDetailId()         Returns the current record's "faq_detail_id" value
 * @method FaqSubCategory       getFaqSubCategory()      Returns the current record's "FaqSubCategory" value
 * @method FaqDetail            getFaqDetail()           Returns the current record's "FaqDetail" value
 * @method FaqSubCategoryDetail setFaqSubCategoryId()    Sets the current record's "faq_sub_category_id" value
 * @method FaqSubCategoryDetail setFaqDetailId()         Sets the current record's "faq_detail_id" value
 * @method FaqSubCategoryDetail setFaqSubCategory()      Sets the current record's "FaqSubCategory" value
 * @method FaqSubCategoryDetail setFaqDetail()           Sets the current record's "FaqDetail" value
 * 
 * @package    cosmedecorte
 * @subpackage model
 * @author     BROADTECH INC.
 * @version    SVN: $Id: Builder.php 12 2011-05-12 03:42:19Z oda $
 */
abstract class BaseFaqSubCategoryDetail extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('faq_sub_category_detail');
        $this->hasColumn('faq_sub_category_id', 'integer', null, array(
             'type' => 'integer',
             'primary' => true,
             ));
        $this->hasColumn('faq_detail_id', 'integer', null, array(
             'type' => 'integer',
             'primary' => true,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('FaqSubCategory', array(
             'local' => 'faq_sub_category_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $this->hasOne('FaqDetail', array(
             'local' => 'faq_detail_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}