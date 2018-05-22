<?php

class cosmedecorteLiveupTask extends sfBaseTask
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
                      'The connection name', 'doctrine'),
                  new sfCommandOption(
                      'delete', null, sfCommandOption::PARAMETER_NONE,
                      'Is delete or not', null),
                  new sfCommandOption(
                      'type', null, sfCommandOption::PARAMETER_OPTIONAL,
                      'Live-up target type', 'product')));
        $this->addArguments(
            array(new sfCommandArgument(
                      'slugs',
                      sfCommandArgument::REQUIRED |
                      sfCommandArgument::IS_ARRAY)));

        $this->namespace        = 'cosmedecorte';
        $this->name             = 'liveup';
        $this->briefDescription = '';
        $this->detailedDescription = '';
    }

    protected function execute($arguments = array(), $options = array())
    {
        $db_manager = new sfDatabaseManager($this->configuration);
        Doctrine_Manager::getInstance()->setCurrentConnection('doctrine');
        $conn =
            $db_manager->getDatabase($options['connection'])->getConnection();

        $target_type = null;
        $target_table = null;
        switch ($options['type']) {
        case 'product':
            $target_type = '商品';
            $target_table = ProductTable::getInstance();
            break;
        case 'child-product':
        case 'child_product':
        case 'childproduct':
            $target_type = '子商品';
            $target_table = ChildProductTable::getInstance();
            break;
        case 'line':
            $target_type = 'ライン';
            $target_table = LineTable::getInstance();
            break;
        case 'category':
            $target_type = 'カテゴリ';
            $target_table = CategoryTable::getInstance();
            break;
        case 'sub-category':
        case 'sub_category':
        case 'subcategory':
            $target_type = 'サブカテゴリ';
            $target_table = SubCategoryTable::getInstance();
            break;
        case 'effect':
            $target_type = '効果';
            $target_table = EffectTable::getInstance();
            break;
        default:
            fputs(STDERR, "不明な type が指定されたため処理を中断します。\n");
            exit;
        }

        if ($options['delete']) {
            Doctrine_Manager::getInstance()->setCurrentConnection('livedb');
        }

        $slugs = $arguments['slugs'];
        foreach ($slugs as $slug) {
            if ($slug == 'all') {
                $objs =
                    $target_table->createQuery()->select('slug')->
                    execute(array(), Doctrine::HYDRATE_ARRAY);
                foreach ($objs as $obj) {
                    $this->processLiveup(
                        $target_type, $target_table,
                        $obj['slug'], $options['delete']);
                }
            } else {
                $this->processLiveup(
                    $target_type, $target_table, $slug, $options['delete']);
            }
        }
    }

    protected function processLiveup(
        $target_type, $target_table, $slug, $is_delete)
    {
        $obj = $target_table->findOneBySlug($slug);
        if (!$obj) {
            echo 'スラッグ[' . $slug .
                ']の' . $target_type .
                "が見つからないためスキップします。\n";
            unset($obj);
            return;
        }

        if ($is_delete) {
            try {
                $obj->delete();
                echo 'スラッグ[' . $slug .
                    ']の' . $target_type . "を本番から削除しました。\n";
            } catch (Exception $e) {
                echo 'スラッグ[' . $slug .
                    ']の' . $target_type .
                    "を本番から削除できませんでした。\n";
            }
        } else {
            try {
                $obj->liveup();
                echo 'スラッグ[' . $slug .
                    ']の' . $target_type . "を本番反映しました。\n";
            } catch (NoLineException $e) {
                echo 'スラッグ[' . $slug . ']の' . $target_type . 'の' .
                    "所属ラインが本番に存在しないためスキップします。\n";
            } catch (NoCategoryException $e) {
                echo 'スラッグ[' . $slug . ']の' . $target_type . 'の' .
                    "所属カテゴリが本番に存在しないためスキップします。\n";
            } catch (NoSubCategoryException $e) {
                echo 'スラッグ[' . $slug . ']の' . $target_type . 'の' .
                    '所属サブカテゴリが本番に存在しないため' .
                    "スキップします。\n";
            } catch (NoEffectException $e) {
                echo 'スラッグ[' . $slug . ']の' . $target_type . 'の' .
                    "所属効果が本番に存在しないためスキップします。\n";
            } catch (NoProductException $e) {
                echo 'スラッグ[' . $slug . ']の' . $target_type . 'の' .
                    "親商品が本番に存在しないためスキップします。\n";
            }
        }
        unset($obj);
    }
}
