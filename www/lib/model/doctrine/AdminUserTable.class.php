<?php

/**
 * AdminUserTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class AdminUserTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object AdminUserTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('AdminUser');
    }
}