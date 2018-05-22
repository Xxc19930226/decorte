<?php

/**
 * BaseMailLog
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $mail_id
 * @property string $address
 * @property Mail $Mail
 * 
 * @method integer getId()      Returns the current record's "id" value
 * @method integer getMailId()  Returns the current record's "mail_id" value
 * @method string  getAddress() Returns the current record's "address" value
 * @method Mail    getMail()    Returns the current record's "Mail" value
 * @method MailLog setId()      Sets the current record's "id" value
 * @method MailLog setMailId()  Sets the current record's "mail_id" value
 * @method MailLog setAddress() Sets the current record's "address" value
 * @method MailLog setMail()    Sets the current record's "Mail" value
 * 
 * @package    cosmedecorte
 * @subpackage model
 * @author     BROADTECH INC.
 * @version    SVN: $Id: Builder.php 12 2011-05-12 03:42:19Z oda $
 */
abstract class BaseMailLog extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('mail_log');
        $this->hasColumn('id', 'integer', null, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             ));
        $this->hasColumn('mail_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('address', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));


        $this->index('mail_log_mail_id_address', array(
             'fields' => 
             array(
              0 => 'mail_id',
              1 => 'address',
             ),
             'type' => 'unique',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Mail', array(
             'local' => 'mail_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}