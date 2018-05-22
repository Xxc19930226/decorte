<?php

/**
 * MemberTable
 *
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class MemberTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object MemberTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Member');
    }

    public function login($mail, $password)
    {
        $member =
            $this->createQuery('m')->
            where('mail_pc = ? OR mail_mobile = ?', array($mail, $mail))->
            addwhere('temp_flag = ?', false)->
            fetchOne();
        if (!$member) {
            return null;
        }

        if ($member->getPassword() !== $password) {
            return null;
        }

        $ua = sfContext::getInstance()->
              getConfiguration()->getDomeinType($mail);
        if ($ua=='pc') {
            if (!$member->getMailPcApprovalFlag()) {
                return null;
            }
        } else {
            if (!$member->getJob() && !$member->getNickName()) {
                // old member
            } else if (!$member->getMailMobileApprovalFlag()) {
                return null;
            }
        }
        return $member;
    }

    public function searchPc($mail_pc)
    {
        $member =
            $this->createQuery('m')->
            where('mail_pc = ?', $mail_pc)->
            addwhere('temp_flag = ?', false)->
            fetchOne();
        if (!$member) {
            return null;
        }
        return $member;
    }

    public function searchMb($mail_mb)
    {
        $member =
            $this->createQuery('m')->
            where('mail_mobile = ?', $mail_mb)->
            addwhere('temp_flag = ?', false)->
            fetchOne();
        if (!$member) {
            return null;
        }
        return $member;
    }

    public function searchMail($mail)
    {
        $member =
            $this->createQuery('m')->
            where('mail_pc = ? OR mail_mobile = ?', array($mail, $mail))->
            addwhere('temp_flag = ?', false)->
            fetchOne();
        if (!$member) {
            return null;
        }
        return $member;
    }
}