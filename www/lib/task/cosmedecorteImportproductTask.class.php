<?php

class cosmedecorteImportproductTask extends sfBaseTask
{
    protected static $effect_slugs =
        array(34 => 'moisture_care',
              35 => 'pores_care',
              36 => 'pimple_care',
              37 => 'whitening_care',
              38 => 'aging_care',
              39 => 'puffy_care',
              40 => 'sensitive_care',
              41 => 'eye_care',
              42 => 'stain_care',
              43 => 'shiny_care',
              44 => 'horny_care',
              45 => 'sebum_care',
              46 => 'tightening_care',
              47 => 'uv_care',
              48 => 'cover',
              49 => 'natural',
              50 => 'lasting',
              51 => 'mat',
              52 => 'shiny',
              53 => 'uv_cut',
              54 => 'moisture',
              55 => 'whitening',
              56 => 'translucent',
              57 => 'lift_up',
              58 => 'control');

    protected static $keywords =
        array(59 => array('保湿', '潤い'),
              60 => array('乾燥'),
              61 => array('肌アレ'),
              62 => array('キメ'),
              63 => array('毛穴'),
              64 => array('毛穴のたるみ'),
              65 => array('毛穴の黒ずみ', '毛穴の開き'),
              66 => array('ニキビ'),
              67 => array('吹き出物', '吹出物', '吹き出もの', 'ふきでもの', 'フキデモノ'),
              68 => array('美白'),
              69 => array('シミ'),
              70 => array('そばかす'),
              71 => array('エイジング'),
              72 => array('リフトアップ'),
              73 => array('たるみ'),
              74 => array('しわ'),
              75 => array('ほうれい線'),
              76 => array('むくみ'),
              77 => array('低刺激'),
              78 => array('敏感肌'),
              79 => array('目元', 'リンクル'),
              80 => array('首', 'デコルテ', '胸元'),
              81 => array('透明感'),
              82 => array('ツヤ'),
              83 => array('くすみ'),
              84 => array('ふき取り'),
              85 => array('UVケア'),
              86 => array('ハリ', '弾力'),
              87 => array('角質ケア'),
              88 => array('テカリ'),
              89 => array('引き締め'),
              90 => array('カバー力'),
              91 => array('薄づき', 'ナチュラル'),
              92 => array('崩れにくい'),
              93 => array('ラスティング'),
              94 => array('よれにくい'),
              95 => array('マット'),
              96 => array('ツヤ'),
              97 => array('ウォータープルーフ'),
              98 => array('UVカット'),
              99 => array('くすみ'),
              100 => array('くすまない'),
              101 => array('乾き'),
              102 => array('ぱさつかない'),
              103 => array('コントロール'),
              104 => array('美白'),
              105 => array('リフトアップ'));

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
                      'no-keywords', null, sfCommandOption::PARAMETER_NONE,
                      'Whether keywords to be updated', null)));
        $this->addArguments(
            array(new sfCommandArgument(
                      'csv_file', sfCommandArgument::REQUIRED)));

        $this->namespace = 'cosmedecorte';
        $this->name = 'import-product';
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
            $slug = trim($data[19]);
            if (!$slug) {
                continue;
            }

            $parent_slug = trim($data[20]);

            if (!$parent_slug) {
                /*
                 * 親商品の場合
                 */
                $product = ProductTable::getInstance()->findOneBySlug($slug);
                if ($product) {
                    echo $slug . ": 更新.....\n";
                } else {
                    $product = new Product();
                    $product->setSlug($slug);
                    echo $slug . ": 追加.....\n";
                }

                $product->setName(trim($data[1]));
                $daytime_flag = trim($data[9]);
                if ($daytime_flag) {
                    $product->setDaytimeFlag(true);
                } else {
                    $product->setDaytimeFlag(false);
                }
                $night_flag = trim($data[10]);
                if ($night_flag) {
                    $product->setNightFlag(true);
                } else {
                    $product->setNightFlag(false);
                }
                $product->setOutline(trim($data[11]));
                $product->setExplanation(trim($data[12]));
                $product->setCapacity(trim($data[13]));
                $set_flag = trim($data[14]);
                if ($set_flag) {
                    $product->setSetFlag(true);
                } else {
                    $product->setSetFlag(false);
                }
                $product->setColors(trim($data[15]));
                $product->setNewColors(trim($data[16]));
                $product->setPrice(
                    preg_replace('/[\\\\,\?]/', '', trim($data[17])));
                $product->setHowTo(trim($data[18]));
                $quasi_drug_flag = trim($data[23]);
                if ($quasi_drug_flag) {
                    $product->setQuasiDrugFlag(true);
                } else {
                    $product->setQuasiDrugFlag(false);
                }
                $product->setSupplement1(trim($data[24]));
                $product->setSupplement2(trim($data[25]));
                $color_ball_flag = trim($data[22]);
                if ($color_ball_flag) {
                    $product->setColorBallFlag(true);
                } else {
                    $product->setColorBallFlag(false);
                }
                $product->setLinePriority(trim($data[26]));

                $line_slug = trim($data[2]);
                $line = LineTable::getInstance()->findOneBySlug($line_slug);
                if (!$line) {
                    echo "  不正なライン: $line_slug\n";
                    echo "  スキップ.....\n";
                    continue;
                }
                $product->setLine($line);

                $category_slug = trim($data[3]);
                $category = CategoryTable::getInstance()->
                    findOneBySlug($category_slug);
                if (!$category) {
                    echo "  不正なカテゴリ: $category_slug\n";
                    echo "  スキップ.....\n";
                    continue;
                }
                $product->setCategory($category);

                $sub_category_slug = trim($data[4]);
                $sub_category = SubCategoryTable::getInstance()->
                    findOneBySlug($sub_category_slug);
                if (!$sub_category) {
                    echo "  不正なカテゴリ: $sub_category_slug\n";
                    echo "  スキップ.....\n";
                    continue;
                }
                $product->setSubCategory($sub_category);

                $category_priority = '';
                switch ($category_slug) {
                case 'skincare':
                    $category_priority = trim($data[27]);
                    if (!$category_priority) {
                        $category_priority = trim($data[31]);
                    }
                    break;
                case 'basemake':
                    $category_priority = trim($data[28]);
                    break;
                case 'pointmake':
                    $category_priority = trim($data[29]);
                    break;
                case 'hair_body':
                    $category_priority = trim($data[30]);
                    if (!$category_priority) {
                        $category_priority = trim($data[32]);
                    }
                    break;
                case 'fragrance':
                    $category_priority = trim($data[33]);
                    break;
                case 'accessory':
                    break;
                }
                $product->setCategoryPriority($category_priority);

                $table = EffectTable::getInstance();
                $product->getEffects()->clear();
                for ($i = 34; $i <= 58; $i++) {
                    $flag = trim($data[$i]);
                    if ($flag) {
                        $effect_slug = self::$effect_slugs[$i];
                        $effect = $table->findOneBySlug($effect_slug);
                        $product->getEffects()->add($effect);
                    }
                }

                if (!$options['no-keywords']) {
                    echo "  キーワード更新\n";
                    $index = '';
                    for ($i = 59; $i <= 104; $i++) {
                        $flag = trim($data[$i]);
                        if ($flag) {
                            foreach (self::$keywords[$i] as $keyword) {
                                if ($index) {
                                    $index .= ' ';
                                }
                                $index .= $keyword;
                            }
                        }
                    }
                    $product->setSearchIndex($index);
                }

                $product->save();
            } else {
                /*
                 * 子商品の場合
                 */
                $child_product =
                    ChildProductTable::getInstance()->findOneBySlug($slug);
                if ($child_product) {
                    echo $slug . "(子商品): 更新.....\n";
                } else {
                    $child_product = new ChildProduct();
                    $child_product->setSlug($slug);
                    echo $slug . "(子商品): 追加.....\n";
                }

                $child_product->setSubNumber(trim($data[21]));
                $child_product->setName(trim($data[1]));
                $child_product->setCapacity(trim($data[13]));
                $child_product->setPrice(
                    preg_replace('/[\\\\,\?]/', '', trim($data[17])));

                $parent =
                    ProductTable::getInstance()->findOneBySlug($parent_slug);
                if (!$parent) {
                    echo "  不正な親商品: $parent_slug\n";
                    echo "  スキップ.....\n";
                    continue;
                }
                $child_product->setParent($parent);

                $child_product->save();
            }
        }

        fclose($fp);
    }
}
