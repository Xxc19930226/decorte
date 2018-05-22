<?php

class cosmedecorteExportingredientTask extends sfBaseTask
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

        $this->namespace = 'cosmedecorte';
        $this->name = 'export-ingredient';
        $this->briefDescription = '';
        $this->detailedDescription = '';
    }

    protected function execute($arguments = array(), $options = array())
    {
        $db_manager = new sfDatabaseManager($this->configuration);
        Doctrine_Manager::getInstance()->setCurrentConnection('doctrine');
        $conn =
            $db_manager->getDatabase($options['connection'])->getConnection();

        $products = ProductTable::getInstance()->findAll();
        foreach ($products as $product) {
            $ingredients = $product->getIngredients();
            if (count($ingredients) == 0) {
                continue;
            }

            foreach ($ingredients as $ingredient) {
                $slug = $product->getSlug();
                $symbol = $ingredient->getSymbol();
                $symbol = preg_replace('/\\\\\n/', "\n", $symbol);
                $content = $ingredient->getContent();
                $content = preg_replace('/\\\\\n/', "\n", $content);
                $display_order = $ingredient->getDisplayOrder();

                echo $slug . ',';
                echo '"' . $symbol . '",';
                echo '"' . $content . '",';
                echo $display_order . "\n";
            }
        }
    }
}
