<?php

class cosmedecorteOutputmembercsvTask extends sfBaseTask
{
    protected function configure()
    {
        $this->addOptions(
            array(new sfCommandOption(
                      'application', null,
                      sfCommandOption::PARAMETER_REQUIRED,
                      'The application name', 'frontend'),
                  new sfCommandOption(
                      'env', null, sfCommandOption::PARAMETER_REQUIRED,
                      'The environment', 'prod'),
                  new sfCommandOption(
                      'connection', null, sfCommandOption::PARAMETER_REQUIRED,
                      'The connection name', 'doctrine')));

        $this->namespace = 'cosmedecorte';
        $this->name = 'output-member-csv';
        $this->briefDescription = '';
        $this->detailedDescription = '';
    }

    protected function execute($arguments = array(), $options = array())
    {
        $db_manager = new sfDatabaseManager($this->configuration);
        Doctrine_Manager::getInstance()->setCurrentConnection('doctrine');
        $conn =
            $db_manager->getDatabase($options['connection'])->getConnection();

        $today = date('Ymd');

        $members = MemberTable::getInstance()->
            createQuery()->select('mail_pc')->
            where('temp_flag = ?', false)->
            addWhere('mail_pc_flag = ?', true)->
            addWhere('mail_pc_approval_flag = ?', true)->
            addWhere('job != ?', '')->
            addWhere('nick_name != ?', '')->
            fetchArray();
        $fp = fopen('decorte_pc_' . $today . '.csv', 'w');
        foreach ($members as $member) {
            fprintf($fp, "%s\n", $member['mail_pc']);
        }
        fclose($fp);

        $members = MemberTable::getInstance()->
            createQuery()->select('mail_pc')->
            where('temp_flag = ?', false)->
            addWhere('mail_pc_flag = ?', true)->
            addWhere('mail_pc_approval_flag = ?', true)->
            addWhere('job = ?', '')->
            addWhere('nick_name = ?', '')->
            fetchArray();
        $fp = fopen('decorte_oldpc_' . $today . '.csv', 'w');
        foreach ($members as $member) {
            fprintf($fp, "%s\n", $member['mail_pc']);
        }
        fclose($fp);

        $members = MemberTable::getInstance()->
            createQuery()->select('mail_mobile')->
            where('temp_flag = ?', false)->
            addWhere('mail_mobile_flag = ?', true)->
            addWhere('mail_mobile_approval_flag = ?', true)->
            addWhere('job != ?', '')->
            addWhere('nick_name != ?', '')->
            fetchArray();
        $fp = fopen('decorte_mobile_' . $today . '.csv', 'w');
        foreach ($members as $member) {
            fprintf($fp, "%s\n", $member['mail_mobile']);
        }
        fclose($fp);

        $members = ExistingMobileTable::getInstance()->
            createQuery('em')->
            leftJoin('em.ExistingWithdrawal ew')->
            select('em.mail_mobile, ew.id')->
            where('mail_block_flag = ?', false)->
            fetchArray();
        $fp = fopen('decorte_oldmobile_' . $today . '.csv', 'w');
        foreach ($members as $member) {
            fprintf(
                $fp, "%s,%s\n",
                $member['mail_mobile'],
                $member['ExistingWithdrawal']['0']['id']);
        }
        fclose($fp);
    }
}
