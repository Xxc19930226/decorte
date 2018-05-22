<?php

class cosmedecorteImportingredientTask extends sfBaseTask
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
        $this->name = 'import-ingredient';
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

        $prev_slug = null;
        while ($data = fgetcsv($fp)) {
            $slug = trim($data[0]);
            $symbol = trim($data[1]);
            $content = trim($data[2]);
            $display_order = trim($data[3]);

            if (!$content) {
                continue;
            }

            if (!$slug) {
                if (!$prev_slug) {
                    continue;
                }

                $slug = $prev_slug;
            }

            $prev_slug = $slug;

            $product = ProductTable::getInstance()->findOneBySlug($slug);
            if (!$product) {
                echo $slug . ": 商品が見つかりません\n";
                continue;
            }

            //$product->getIngredients()->clear();
            $ingredient = new ProductIngredient();
            $ingredient->setSymbol($symbol);
            $ingredient->setContent($content);
            $ingredient->setDisplayOrder($display_order);
            $ingredient->setProduct($product);
            $product->getIngredients()->add($ingredient);

            $product->save();
        }

        fclose($fp);
    }
}
