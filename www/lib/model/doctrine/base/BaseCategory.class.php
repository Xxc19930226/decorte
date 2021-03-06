<?php

/**
 * BaseCategory
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $name
 * @property integer $priority
 * @property string $slug
 * @property Doctrine_Collection $Products
 * @property Doctrine_Collection $SubCategories
 * @property Doctrine_Collection $Effects
 * @property Doctrine_Collection $ProductPopular
 * 
 * @method integer             getId()             Returns the current record's "id" value
 * @method string              getName()           Returns the current record's "name" value
 * @method integer             getPriority()       Returns the current record's "priority" value
 * @method string              getSlug()           Returns the current record's "slug" value
 * @method Doctrine_Collection getProducts()       Returns the current record's "Products" collection
 * @method Doctrine_Collection getSubCategories()  Returns the current record's "SubCategories" collection
 * @method Doctrine_Collection getEffects()        Returns the current record's "Effects" collection
 * @method Doctrine_Collection getProductPopular() Returns the current record's "ProductPopular" collection
 * @method Category            setId()             Sets the current record's "id" value
 * @method Category            setName()           Sets the current record's "name" value
 * @method Category            setPriority()       Sets the current record's "priority" value
 * @method Category            setSlug()           Sets the current record's "slug" value
 * @method Category            setProducts()       Sets the current record's "Products" collection
 * @method Category            setSubCategories()  Sets the current record's "SubCategories" collection
 * @method Category            setEffects()        Sets the current record's "Effects" collection
 * @method Category            setProductPopular() Sets the current record's "ProductPopular" collection
 * 
 * @package    cosmedecorte
 * @subpackage model
 * @author     BROADTECH INC.
 * @version    SVN: $Id: Builder.php 12 2011-05-12 03:42:19Z oda $
 */
abstract class BaseCategory extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('category');
        $this->hasColumn('id', 'integer', null, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             ));
        $this->hasColumn('name', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('priority', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('slug', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));


        $this->index('slug', array(
             'fields' => 
             array(
              0 => 'slug',
             ),
             'type' => 'unique',
             ));
        $this->index('name', array(
             'fields' => 
             array(
              0 => 'name',
             ),
             ));
        $this->option('orderBy', 'priority');
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('Product as Products', array(
             'local' => 'id',
             'foreign' => 'category_id'));

        $this->hasMany('SubCategory as SubCategories', array(
             'local' => 'id',
             'foreign' => 'category_id'));

        $this->hasMany('Effect as Effects', array(
             'local' => 'id',
             'foreign' => 'category_id'));

        $this->hasMany('ProductPopular', array(
             'local' => 'id',
             'foreign' => 'category_id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}