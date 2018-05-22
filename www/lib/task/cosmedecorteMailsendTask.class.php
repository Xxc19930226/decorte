<?php

class cosmedecorteMailsendTask extends sfBaseTask
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
        $this->name = 'mail-send';
        $this->briefDescription = '';
    }

    protected function execute($arguments = array(), $options = array())
    {
        $db_manager = new sfDatabaseManager($this->configuration);
        $conn =
            $db_manager->getDatabase($options['connection'])->getConnection();

        $mailer = $this->getMailer();
        MailTable::getInstance()->deliverUnsent($mailer);
    }
}
