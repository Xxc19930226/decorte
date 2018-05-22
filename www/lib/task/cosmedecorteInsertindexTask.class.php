<?php

class cosmedecorteInsertindexTask extends sfBaseTask
{
    protected function configure()
    {
        $this->addOptions(
            array(new sfCommandOption(
                      'application', null,
                      sfCommandOption::PARAMETER_REQUIRED,
                      'The application name'),
                  new sfCommandOption(
                      'env', null,
                      sfCommandOption::PARAMETER_REQUIRED,
                      'The environment', 'dev'),
                  new sfCommandOption(
                      'connection', null,
                      sfCommandOption::PARAMETER_REQUIRED,
                      'The connection name', 'doctrine')));
        $this->addArguments(
            array(new sfCommandArgument(
                      'slug', sfCommandArgument::REQUIRED),
                  new sfCommandArgument(
                      'keyword', sfCommandArgument::REQUIRED)));

        $this->namespace = 'cosmedecorte';
        $this->name = 'insert-index';
        $this->briefDescription = '';
        $this->detailedDescription = '';
    }

    protected function execute($arguments = array(), $options = array())
    {
        $db_manager = new sfDatabaseManager($this->configuration);
        $conn =
            $db_manager->getDatabase($options['connection'])->getConnection();

        $slug = $arguments['slug'];
        $raw_keyword = trim($arguments['keyword']);

        if ($slug && $raw_keyword) {
            $product = ProductTable::getInstance()->findOneBySlug($slug);
            if (!$product) {
                echo "[$slug]に該当する商品が見つかりません\n";
                return 1;
            }

            $keywords = explode(' ', $raw_keyword);

            foreach ($keywords as $keyword) {
                $index = new ProductSearchIndex();
                $index->setKeyword($keyword);
                $index->setProduct($product);
                $product->getSearchIndexes()->add($index);
            }

            $product->save();
        }
  }
}
