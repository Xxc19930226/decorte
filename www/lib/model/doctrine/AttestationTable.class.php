<?php

/**
 * AttestationTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class AttestationTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object AttestationTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Attestation');
    }

    public function getUnique($id, $unique, $ua)
    {
        $att = new Attestation();
        $att->setId($unique);
        $att->setMailType($ua);
        $att->setMemberId($id);
        $att->save();
        return $unique;
    }

    public function rminder($id)
    {
        $unique = md5(uniqid(rand(), true));
        $att = new Attestation();
        $att->setId($unique);
        $att->setMemberId($id);
        $att->save();
        return $unique;
    }


}