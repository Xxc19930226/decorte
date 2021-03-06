<?php

/**
 * BaseProductSearchKeywordLog
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $parent_id
 * @property integer $sub_number
 * @property string $keyword
 * @property ProductSearchLog $Parent
 * 
 * @method integer                 getId()         Returns the current record's "id" value
 * @method integer                 getParentId()   Returns the current record's "parent_id" value
 * @method integer                 getSubNumber()  Returns the current record's "sub_number" value
 * @method string                  getKeyword()    Returns the current record's "keyword" value
 * @method ProductSearchLog        getParent()     Returns the current record's "Parent" value
 * @method ProductSearchKeywordLog setId()         Sets the current record's "id" value
 * @method ProductSearchKeywordLog setParentId()   Sets the current record's "parent_id" value
 * @method ProductSearchKeywordLog setSubNumber()  Sets the current record's "sub_number" value
 * @method ProductSearchKeywordLog setKeyword()    Sets the current record's "keyword" value
 * @method ProductSearchKeywordLog setParent()     Sets the current record's "Parent" value
 * 
 * @package    cosmedecorte
 * @subpackage model
 * @author     BROADTECH INC.
 * @version    SVN: $Id: Builder.php 12 2011-05-12 03:42:19Z oda $
 */
abstract class BaseProductSearchKeywordLog extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('product_search_keyword_log');
        $this->hasColumn('id', 'integer', null, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             ));
        $this->hasColumn('parent_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('sub_number', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('keyword', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('ProductSearchLog as Parent', array(
             'local' => 'parent_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}