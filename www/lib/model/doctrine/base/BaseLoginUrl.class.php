<?php

/**
 * BaseLoginUrl
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $id
 * @property integer $member_id
 * @property Member $Member
 * 
 * @method string   getId()        Returns the current record's "id" value
 * @method integer  getMemberId()  Returns the current record's "member_id" value
 * @method Member   getMember()    Returns the current record's "Member" value
 * @method LoginUrl setId()        Sets the current record's "id" value
 * @method LoginUrl setMemberId()  Sets the current record's "member_id" value
 * @method LoginUrl setMember()    Sets the current record's "Member" value
 * 
 * @package    cosmedecorte
 * @subpackage model
 * @author     BROADTECH INC.
 * @version    SVN: $Id: Builder.php 12 2011-05-12 03:42:19Z oda $
 */
abstract class BaseLoginUrl extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('login_url');
        $this->hasColumn('id', 'string', 255, array(
             'type' => 'string',
             'primary' => true,
             'length' => 255,
             ));
        $this->hasColumn('member_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Member', array(
             'local' => 'member_id',
             'foreign' => 'id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}