<?php

class cosmedecorteImportcafelinkTask extends sfBaseTask
{
    protected function configure()
    {
        $this->addOptions(
            array(new sfCommandOption(
                      'application', null,
                      sfCommandOption::PARAMETER_REQUIRED,
                      'The application name'),
                  new sfCommandOption(
                      'env', null, sfCommandOption::PARAMETER_REQUIRED,
                      'The environment', 'prod'),
                  new sfCommandOption(
                      'connection', null, sfCommandOption::PARAMETER_REQUIRED,
                      'The connection name', 'doctrine')));
        $this->addArguments(
            array(new sfCommandArgument(
                      'csv_file', sfCommandArgument::REQUIRED)));

        $this->namespace = 'cosmedecorte';
        $this->name = 'import-cafe-link';
        $this->briefDescription = '';
        $this->detailedDescription = '';
    }

    protected function execute($arguments = array(), $options = array())
    {
        $db_manager = new sfDatabaseManager($this->configuration);
        Doctrine_Manager::getInstance()->setCurrentConnection('doctrine');
        $conn =
            $db_manager->getDatabase($options['connection'])->getConnection();

        $csv_file = $arguments['csv_file'];

        $fp = fopen($csv_file, 'r');

        while ($data = fgetcsv($fp)) {
            $slug = trim($data[0]);
            $url = trim($data[1]);

            $product = ProductTable::getInstance()->findOneBySlug($slug);
            if (!$product) {
                echo $slug . ": 商品が見つかりません\n";
                continue;
            }

            $product->setCafeLinkUrl($url);
            $product->save();
        }

        fclose($fp);
    }
}
