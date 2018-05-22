<?php

/**
 * BaseMailAuthor
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $name
 * @property string $address
 * @property Doctrine_Collection $Mails
 * 
 * @method integer             getId()      Returns the current record's "id" value
 * @method string              getName()    Returns the current record's "name" value
 * @method string              getAddress() Returns the current record's "address" value
 * @method Doctrine_Collection getMails()   Returns the current record's "Mails" collection
 * @method MailAuthor          setId()      Sets the current record's "id" value
 * @method MailAuthor          setName()    Sets the current record's "name" value
 * @method MailAuthor          setAddress() Sets the current record's "address" value
 * @method MailAuthor          setMails()   Sets the current record's "Mails" collection
 * 
 * @package    cosmedecorte
 * @subpackage model
 * @author     BROADTECH INC.
 * @version    SVN: $Id: Builder.php 12 2011-05-12 03:42:19Z oda $
 */
abstract class BaseMailAuthor extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('mail_author');
        $this->hasColumn('id', 'integer', null, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             ));
        $this->hasColumn('name', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('address', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('Mail as Mails', array(
             'local' => 'id',
             'foreign' => 'author_id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}