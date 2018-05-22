<?php

/**
 * BaseSalonShop
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property string $mail_subject1
 * @property string $mail_subject1_mb
 * @property string $mail_subject2
 * @property string $mail_subject3
 * @property text $mail_body1
 * @property text $mail_body1_mb
 * @property text $mail_body_top2
 * @property text $mail_body_bottom2
 * @property text $mail_body_top3
 * @property text $mail_body_bottom3
 * @property Doctrine_Collection $AdminUser
 * @property Doctrine_Collection $Reserves
 * @property Doctrine_Collection $Menus
 * 
 * @method integer             getId()                Returns the current record's "id" value
 * @method string              getName()              Returns the current record's "name" value
 * @method string              getEmail()             Returns the current record's "email" value
 * @method string              getMailSubject1()      Returns the current record's "mail_subject1" value
 * @method string              getMailSubject1Mb()    Returns the current record's "mail_subject1_mb" value
 * @method string              getMailSubject2()      Returns the current record's "mail_subject2" value
 * @method string              getMailSubject3()      Returns the current record's "mail_subject3" value
 * @method text                getMailBody1()         Returns the current record's "mail_body1" value
 * @method text                getMailBody1Mb()       Returns the current record's "mail_body1_mb" value
 * @method text                getMailBodyTop2()      Returns the current record's "mail_body_top2" value
 * @method text                getMailBodyBottom2()   Returns the current record's "mail_body_bottom2" value
 * @method text                getMailBodyTop3()      Returns the current record's "mail_body_top3" value
 * @method text                getMailBodyBottom3()   Returns the current record's "mail_body_bottom3" value
 * @method Doctrine_Collection getAdminUser()         Returns the current record's "AdminUser" collection
 * @method Doctrine_Collection getReserves()          Returns the current record's "Reserves" collection
 * @method Doctrine_Collection getMenus()             Returns the current record's "Menus" collection
 * @method SalonShop           setId()                Sets the current record's "id" value
 * @method SalonShop           setName()              Sets the current record's "name" value
 * @method SalonShop           setEmail()             Sets the current record's "email" value
 * @method SalonShop           setMailSubject1()      Sets the current record's "mail_subject1" value
 * @method SalonShop           setMailSubject1Mb()    Sets the current record's "mail_subject1_mb" value
 * @method SalonShop           setMailSubject2()      Sets the current record's "mail_subject2" value
 * @method SalonShop           setMailSubject3()      Sets the current record's "mail_subject3" value
 * @method SalonShop           setMailBody1()         Sets the current record's "mail_body1" value
 * @method SalonShop           setMailBody1Mb()       Sets the current record's "mail_body1_mb" value
 * @method SalonShop           setMailBodyTop2()      Sets the current record's "mail_body_top2" value
 * @method SalonShop           setMailBodyBottom2()   Sets the current record's "mail_body_bottom2" value
 * @method SalonShop           setMailBodyTop3()      Sets the current record's "mail_body_top3" value
 * @method SalonShop           setMailBodyBottom3()   Sets the current record's "mail_body_bottom3" value
 * @method SalonShop           setAdminUser()         Sets the current record's "AdminUser" collection
 * @method SalonShop           setReserves()          Sets the current record's "Reserves" collection
 * @method SalonShop           setMenus()             Sets the current record's "Menus" collection
 * 
 * @package    cosmedecorte
 * @subpackage model
 * @author     BROADTECH INC.
 * @version    SVN: $Id: Builder.php 12 2011-05-12 03:42:19Z oda $
 */
abstract class BaseSalonShop extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('salon_shop');
        $this->hasColumn('id', 'integer', null, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             ));
        $this->hasColumn('name', 'string', 50, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 50,
             ));
        $this->hasColumn('email', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('mail_subject1', 'string', 100, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 100,
             ));
        $this->hasColumn('mail_subject1_mb', 'string', 100, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 100,
             ));
        $this->hasColumn('mail_subject2', 'string', 100, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 100,
             ));
        $this->hasColumn('mail_subject3', 'string', 100, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 100,
             ));
        $this->hasColumn('mail_body1', 'text', null, array(
             'type' => 'text',
             'notnull' => true,
             ));
        $this->hasColumn('mail_body1_mb', 'text', null, array(
             'type' => 'text',
             'notnull' => true,
             ));
        $this->hasColumn('mail_body_top2', 'text', null, array(
             'type' => 'text',
             'notnull' => true,
             ));
        $this->hasColumn('mail_body_bottom2', 'text', null, array(
             'type' => 'text',
             'notnull' => true,
             ));
        $this->hasColumn('mail_body_top3', 'text', null, array(
             'type' => 'text',
             'notnull' => true,
             ));
        $this->hasColumn('mail_body_bottom3', 'text', null, array(
             'type' => 'text',
             'notnull' => true,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('AdminUser', array(
             'local' => 'id',
             'foreign' => 'shop_id'));

        $this->hasMany('SalonReserve as Reserves', array(
             'local' => 'id',
             'foreign' => 'shop_id'));

        $this->hasMany('SalonShopMenu as Menus', array(
             'local' => 'id',
             'foreign' => 'shop_id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}