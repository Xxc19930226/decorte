<?php

/**
 * BaseProduct
 *
 * This class has been auto-generated by the Doctrine ORM Framework
 *
 * @property integer $id
 * @property string $name
 * @property integer $line_id
 * @property integer $category_id
 * @property integer $sub_category_id
 * @property boolean $daytime_flag
 * @property boolean $night_flag
 * @property string $outline
 * @property string $explanation
 * @property string $capacity
 * @property boolean $set_flag
 * @property integer $colors
 * @property integer $new_colors
 * @property integer $price
 * @property string $how_to
 * @property boolean $quasi_drug_flag
 * @property string $supplement1
 * @property string $supplement2
 * @property boolean $color_ball_flag
 * @property integer $line_priority
 * @property integer $category_priority
 * @property string $slug
 * @property boolean $search_only_flag
 * @property string $search_pc_link
 * @property varchar $search_sub_category
 * @property boolean $search_keyword_only_flag
 * @property text $search_index
 * @property string $cafe_link_url
 * @property string $cn_shop_link_url
 * @property string $newitem_rel_info
 * @property boolean $bestcosme_flag
 * @property Line $Line
 * @property Category $Category
 * @property SubCategory $SubCategory
 * @property Doctrine_Collection $Effects
 * @property Doctrine_Collection $FriendProducts
 * @property Doctrine_Collection $ViewMembers
 * @property Doctrine_Collection $FavoriteMembers
 * @property Doctrine_Collection $Product
 * @property Doctrine_Collection $Ingredients
 * @property Doctrine_Collection $Children
 * @property Doctrine_Collection $SearchIndexes
 * @property Doctrine_Collection $ProductAccessLogs
 * @property Doctrine_Collection $ProductPopular
 *
 * @method integer             getId()                       Returns the current record's "id" value
 * @method string              getName()                     Returns the current record's "name" value
 * @method integer             getLineId()                   Returns the current record's "line_id" value
 * @method integer             getCategoryId()               Returns the current record's "category_id" value
 * @method integer             getSubCategoryId()            Returns the current record's "sub_category_id" value
 * @method boolean             getDaytimeFlag()              Returns the current record's "daytime_flag" value
 * @method boolean             getNightFlag()                Returns the current record's "night_flag" value
 * @method string              getOutline()                  Returns the current record's "outline" value
 * @method string              getExplanation()              Returns the current record's "explanation" value
 * @method string              getCapacity()                 Returns the current record's "capacity" value
 * @method boolean             getSetFlag()                  Returns the current record's "set_flag" value
 * @method integer             getColors()                   Returns the current record's "colors" value
 * @method integer             getNewColors()                Returns the current record's "new_colors" value
 * @method integer             getPrice()                    Returns the current record's "price" value
 * @method string              getHowTo()                    Returns the current record's "how_to" value
 * @method boolean             getQuasiDrugFlag()            Returns the current record's "quasi_drug_flag" value
 * @method string              getSupplement1()              Returns the current record's "supplement1" value
 * @method string              getSupplement2()              Returns the current record's "supplement2" value
 * @method boolean             getColorBallFlag()            Returns the current record's "color_ball_flag" value
 * @method integer             getLinePriority()             Returns the current record's "line_priority" value
 * @method integer             getCategoryPriority()         Returns the current record's "category_priority" value
 * @method string              getSlug()                     Returns the current record's "slug" value
 * @method boolean             getSearchOnlyFlag()           Returns the current record's "search_only_flag" value
 * @method string              getSearchPcLink()             Returns the current record's "search_pc_link" value
 * @method varchar             getSearchSubCategory()        Returns the current record's "search_sub_category" value
 * @method boolean             getSearchKeywordOnlyFlag()    Returns the current record's "search_keyword_only_flag" value
 * @method text                getSearchIndex()              Returns the current record's "search_index" value
 * @method string              getCafeLinkUrl()              Returns the current record's "cafe_link_url" value
 * @method string              getCnShopLinkUrl()            Returns the current record's "cn_shop_link_url" value
 * @method string              getNewitemRelInfo()           Returns the current record's "newitem_rel_info" value
 * @method boolean             getBestcosmeFlag()            Returns the current record's "bestcosme_flag" value
 * @method Line                getLine()                     Returns the current record's "Line" value
 * @method Category            getCategory()                 Returns the current record's "Category" value
 * @method SubCategory         getSubCategory()              Returns the current record's "SubCategory" value
 * @method Doctrine_Collection getEffects()                  Returns the current record's "Effects" collection
 * @method Doctrine_Collection getFriendProducts()           Returns the current record's "FriendProducts" collection
 * @method Doctrine_Collection getViewMembers()              Returns the current record's "ViewMembers" collection
 * @method Doctrine_Collection getFavoriteMembers()          Returns the current record's "FavoriteMembers" collection
 * @method Doctrine_Collection getProduct()                  Returns the current record's "Product" collection
 * @method Doctrine_Collection getIngredients()              Returns the current record's "Ingredients" collection
 * @method Doctrine_Collection getChildren()                 Returns the current record's "Children" collection
 * @method Doctrine_Collection getSearchIndexes()            Returns the current record's "SearchIndexes" collection
 * @method Doctrine_Collection getProductAccessLogs()        Returns the current record's "ProductAccessLogs" collection
 * @method Doctrine_Collection getProductPopular()           Returns the current record's "ProductPopular" collection
 * @method Product             setId()                       Sets the current record's "id" value
 * @method Product             setName()                     Sets the current record's "name" value
 * @method Product             setLineId()                   Sets the current record's "line_id" value
 * @method Product             setCategoryId()               Sets the current record's "category_id" value
 * @method Product             setSubCategoryId()            Sets the current record's "sub_category_id" value
 * @method Product             setDaytimeFlag()              Sets the current record's "daytime_flag" value
 * @method Product             setNightFlag()                Sets the current record's "night_flag" value
 * @method Product             setOutline()                  Sets the current record's "outline" value
 * @method Product             setExplanation()              Sets the current record's "explanation" value
 * @method Product             setCapacity()                 Sets the current record's "capacity" value
 * @method Product             setSetFlag()                  Sets the current record's "set_flag" value
 * @method Product             setColors()                   Sets the current record's "colors" value
 * @method Product             setNewColors()                Sets the current record's "new_colors" value
 * @method Product             setPrice()                    Sets the current record's "price" value
 * @method Product             setHowTo()                    Sets the current record's "how_to" value
 * @method Product             setQuasiDrugFlag()            Sets the current record's "quasi_drug_flag" value
 * @method Product             setSupplement1()              Sets the current record's "supplement1" value
 * @method Product             setSupplement2()              Sets the current record's "supplement2" value
 * @method Product             setColorBallFlag()            Sets the current record's "color_ball_flag" value
 * @method Product             setLinePriority()             Sets the current record's "line_priority" value
 * @method Product             setCategoryPriority()         Sets the current record's "category_priority" value
 * @method Product             setSlug()                     Sets the current record's "slug" value
 * @method Product             setSearchOnlyFlag()           Sets the current record's "search_only_flag" value
 * @method Product             setSearchPcLink()             Sets the current record's "search_pc_link" value
 * @method Product             setSearchSubCategory()        Sets the current record's "search_sub_category" value
 * @method Product             setSearchKeywordOnlyFlag()    Sets the current record's "search_keyword_only_flag" value
 * @method Product             setSearchIndex()              Sets the current record's "search_index" value
 * @method Product             setCafeLinkUrl()              Sets the current record's "cafe_link_url" value
 * @method Product             setCnShopLinkUrl()            Sets the current record's "cn_shop_link_url" value
 * @method Product             setNewitemRelInfo()           Sets the current record's "newitem_rel_info" value
 * @method Product             setBestcosmeFlag()            Sets the current record's "bestcosme_flag" value
 * @method Product             setLine()                     Sets the current record's "Line" value
 * @method Product             setCategory()                 Sets the current record's "Category" value
 * @method Product             setSubCategory()              Sets the current record's "SubCategory" value
 * @method Product             setEffects()                  Sets the current record's "Effects" collection
 * @method Product             setFriendProducts()           Sets the current record's "FriendProducts" collection
 * @method Product             setViewMembers()              Sets the current record's "ViewMembers" collection
 * @method Product             setFavoriteMembers()          Sets the current record's "FavoriteMembers" collection
 * @method Product             setProduct()                  Sets the current record's "Product" collection
 * @method Product             setIngredients()              Sets the current record's "Ingredients" collection
 * @method Product             setChildren()                 Sets the current record's "Children" collection
 * @method Product             setSearchIndexes()            Sets the current record's "SearchIndexes" collection
 * @method Product             setProductAccessLogs()        Sets the current record's "ProductAccessLogs" collection
 * @method Product             setProductPopular()           Sets the current record's "ProductPopular" collection
 *
 * @package    cosmedecorte
 * @subpackage model
 * @author     BROADTECH INC.
 * @version    SVN: $Id: Builder.php 12 2011-05-12 03:42:19Z oda $
 */
abstract class BaseProduct extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('product');
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
        $this->hasColumn('line_id', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('category_id', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('sub_category_id', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('daytime_flag', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => true,
             ));
        $this->hasColumn('night_flag', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => true,
             ));
        $this->hasColumn('outline', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('explanation', 'string', 1024, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 1024,
             ));
        $this->hasColumn('capacity', 'string', 50, array(
             'type' => 'string',
             'length' => 50,
             ));
        $this->hasColumn('set_flag', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => true,
             ));
        $this->hasColumn('colors', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('new_colors', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('price', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('how_to', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('quasi_drug_flag', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => true,
             ));
        $this->hasColumn('supplement1', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('supplement2', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('color_ball_flag', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => true,
             ));
        $this->hasColumn('line_priority', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('category_priority', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('slug', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('search_only_flag', 'boolean', null, array(
             'type' => 'boolean',
             ));
        $this->hasColumn('search_pc_link', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('search_sub_category', 'varchar', 20, array(
             'type' => 'varchar',
             'length' => 20,
             ));
        $this->hasColumn('search_keyword_only_flag', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => true,
             ));
        $this->hasColumn('search_index', 'text', null, array(
             'type' => 'text',
             ));
        $this->hasColumn('cafe_link_url', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('cn_shop_link_url', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
        ));
        $this->hasColumn('newitem_rel_info', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('bestcosme_flag', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => true,
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
        $this->index('outline', array(
             'fields' =>
             array(
              0 => 'outline',
             ),
             ));
        $this->index('explanation', array(
             'fields' =>
             array(
              0 => 'explanation',
             ),
             ));
        $this->index('capacity', array(
             'fields' =>
             array(
              0 => 'capacity',
             ),
             ));
        $this->index('price', array(
             'fields' =>
             array(
              0 => 'price',
             ),
             ));
        $this->index('how_to', array(
             'fields' =>
             array(
              0 => 'how_to',
             ),
             ));
        $this->index('line_priority', array(
             'fields' =>
             array(
              0 => 'line_priority',
             ),
             ));
        $this->index('category_priority', array(
             'fields' =>
             array(
              0 => 'category_priority',
             ),
             ));
        $this->index('search_sub_category', array(
             'fields' =>
             array(
              0 => 'search_sub_category',
             ),
             ));
        $this->index('search_index', array(
             'fields' =>
             array(
              'search_index' =>
              array(
              'length' => 255,
              ),
             ),
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Line', array(
             'local' => 'line_id',
             'foreign' => 'id'));

        $this->hasOne('Category', array(
             'local' => 'category_id',
             'foreign' => 'id'));

        $this->hasOne('SubCategory', array(
             'local' => 'sub_category_id',
             'foreign' => 'id'));

        $this->hasMany('Effect as Effects', array(
             'refClass' => 'ProductEffect',
             'local' => 'product_id',
             'foreign' => 'effect_id'));

        $this->hasMany('Product as FriendProducts', array(
             'refClass' => 'ProductFriend',
             'local' => 'product_id1',
             'foreign' => 'product_id2'));

        $this->hasMany('Member as ViewMembers', array(
             'refClass' => 'ProductView',
             'local' => 'product_id',
             'foreign' => 'member_id'));

        $this->hasMany('Member as FavoriteMembers', array(
             'refClass' => 'ProductFavorite',
             'local' => 'product_id',
             'foreign' => 'member_id'));

        $this->hasMany('Product', array(
             'refClass' => 'ProductFriend',
             'local' => 'product_id2',
             'foreign' => 'product_id1'));

        $this->hasMany('ProductIngredient as Ingredients', array(
             'local' => 'id',
             'foreign' => 'product_id'));

        $this->hasMany('ChildProduct as Children', array(
             'local' => 'id',
             'foreign' => 'parent_id'));

        $this->hasMany('ProductSearchIndex as SearchIndexes', array(
             'local' => 'id',
             'foreign' => 'product_id'));

        $this->hasMany('ProductAccessLog as ProductAccessLogs', array(
             'local' => 'id',
             'foreign' => 'product_id'));

        $this->hasMany('ProductPopular', array(
             'local' => 'id',
             'foreign' => 'product_id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}