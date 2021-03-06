<?php

/**
 * BaseReserveDecision
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $salon_reserve_id
 * @property string $other_date1
 * @property string $other_date2
 * @property boolean $hope_flag1
 * @property boolean $hope_flag2
 * @property boolean $hope_flag3
 * @property boolean $other_flag1
 * @property string $hope_start_time1
 * @property string $hope_start_time2
 * @property string $hope_start_time3
 * @property string $other_start_time1
 * @property string $other_start_time2
 * @property string $registrant
 * 
 * @method integer         getId()                Returns the current record's "id" value
 * @method integer         getSalonReserveId()    Returns the current record's "salon_reserve_id" value
 * @method string          getOtherDate1()        Returns the current record's "other_date1" value
 * @method string          getOtherDate2()        Returns the current record's "other_date2" value
 * @method boolean         getHopeFlag1()         Returns the current record's "hope_flag1" value
 * @method boolean         getHopeFlag2()         Returns the current record's "hope_flag2" value
 * @method boolean         getHopeFlag3()         Returns the current record's "hope_flag3" value
 * @method boolean         getOtherFlag1()        Returns the current record's "other_flag1" value
 * @method string          getHopeStartTime1()    Returns the current record's "hope_start_time1" value
 * @method string          getHopeStartTime2()    Returns the current record's "hope_start_time2" value
 * @method string          getHopeStartTime3()    Returns the current record's "hope_start_time3" value
 * @method string          getOtherStartTime1()   Returns the current record's "other_start_time1" value
 * @method string          getOtherStartTime2()   Returns the current record's "other_start_time2" value
 * @method string          getRegistrant()        Returns the current record's "registrant" value
 * @method ReserveDecision setId()                Sets the current record's "id" value
 * @method ReserveDecision setSalonReserveId()    Sets the current record's "salon_reserve_id" value
 * @method ReserveDecision setOtherDate1()        Sets the current record's "other_date1" value
 * @method ReserveDecision setOtherDate2()        Sets the current record's "other_date2" value
 * @method ReserveDecision setHopeFlag1()         Sets the current record's "hope_flag1" value
 * @method ReserveDecision setHopeFlag2()         Sets the current record's "hope_flag2" value
 * @method ReserveDecision setHopeFlag3()         Sets the current record's "hope_flag3" value
 * @method ReserveDecision setOtherFlag1()        Sets the current record's "other_flag1" value
 * @method ReserveDecision setHopeStartTime1()    Sets the current record's "hope_start_time1" value
 * @method ReserveDecision setHopeStartTime2()    Sets the current record's "hope_start_time2" value
 * @method ReserveDecision setHopeStartTime3()    Sets the current record's "hope_start_time3" value
 * @method ReserveDecision setOtherStartTime1()   Sets the current record's "other_start_time1" value
 * @method ReserveDecision setOtherStartTime2()   Sets the current record's "other_start_time2" value
 * @method ReserveDecision setRegistrant()        Sets the current record's "registrant" value
 * 
 * @package    cosmedecorte
 * @subpackage model
 * @author     BROADTECH INC.
 * @version    SVN: $Id: Builder.php 12 2011-05-12 03:42:19Z oda $
 */
abstract class BaseReserveDecision extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('reserve_decision');
        $this->hasColumn('id', 'integer', null, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             ));
        $this->hasColumn('salon_reserve_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('other_date1', 'string', 20, array(
             'type' => 'string',
             'length' => 20,
             ));
        $this->hasColumn('other_date2', 'string', 20, array(
             'type' => 'string',
             'length' => 20,
             ));
        $this->hasColumn('hope_flag1', 'boolean', null, array(
             'type' => 'boolean',
             ));
        $this->hasColumn('hope_flag2', 'boolean', null, array(
             'type' => 'boolean',
             ));
        $this->hasColumn('hope_flag3', 'boolean', null, array(
             'type' => 'boolean',
             ));
        $this->hasColumn('other_flag1', 'boolean', null, array(
             'type' => 'boolean',
             ));
        $this->hasColumn('hope_start_time1', 'string', 20, array(
             'type' => 'string',
             'length' => 20,
             ));
        $this->hasColumn('hope_start_time2', 'string', 20, array(
             'type' => 'string',
             'length' => 20,
             ));
        $this->hasColumn('hope_start_time3', 'string', 20, array(
             'type' => 'string',
             'length' => 20,
             ));
        $this->hasColumn('other_start_time1', 'string', 20, array(
             'type' => 'string',
             'length' => 20,
             ));
        $this->hasColumn('other_start_time2', 'string', 20, array(
             'type' => 'string',
             'length' => 20,
             ));
        $this->hasColumn('registrant', 'string', 30, array(
             'type' => 'string',
             'length' => 30,
             ));


        $this->index('salon_reserve_id', array(
             'fields' => 
             array(
              0 => 'salon_reserve_id',
             ),
             'type' => 'unique',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}